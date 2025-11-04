<?php

namespace App\Http\Controllers\Admin;

use Pdf;
use Helper;
use Carbon\Carbon;
use App\Models\User;
use NumberFormatter;
use App\Models\Admin\Rfq;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\DealSas;
use App\Models\Admin\Product;
use App\Models\Client\Client;
use App\Models\Frontend\Order;
use App\Notifications\RfqDeal;
use App\Models\Partner\Partner;
use App\Models\Admin\RfqProduct;
use App\Notifications\Quotation;
use App\Notifications\DealRegister;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\CommercialDocument;
use App\Models\Admin\RfqTerms;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class DealControllerOld extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['deals'] = Rfq::where('rfq_type', 'deal')->where('status', 'sas_created')->orderBy('id', 'Desc')->get();
        $data['rfqs'] = Rfq::where('rfq_type', 'deal')->where('status', 'deal_created')->orderBy('id', 'Desc')->get();
        $data['approved_sas'] = Rfq::where('status', 'sas_approved')->where('rfq_type', 'deal')->orderBy('id', 'Desc')->get();
        $data['quoted'] = Rfq::where('status', 'quoted')->where('rfq_type', 'deal')->orderBy('id', 'Desc')->get();
        return view('admin.pages.deal.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = $this->sales_managers ;
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['partners'] = Partner::select('partners.id', 'partners.name')->get();
        return view('metronic.pages.deal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (($request->account) !== null) {

        //     if ($request->account == 'client') {
        //         $validator = Validator::make(
        //             $request->all(),
        //             [
        //                 'email' => 'required|unique:clients',
        //                 'image'   => 'required|image|mimes:png,jpg,jpeg|max:10000',
        //             ],
        //             [
        //                 'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG',
        //                 'unique' => 'This Brand has already been taken.',
        //             ],

        //         );
        //     }
        //     if ($request->account == 'client') {
        //         $validator = Validator::make(
        //             $request->all(),
        //             [
        //                 'email' => 'required|unique:clients',
        //                 'image'   => 'required|image|mimes:png,jpg,jpeg|max:10000',
        //             ],
        //             [
        //                 'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG',
        //                 'unique' => 'This Brand has already been taken.',
        //             ],

        //         );
        //     }
        // }

        $user = User::latest()->get();
        Helper::imageDirectory();

        if (!empty($request->deal_type)) {
            $data['deal_type'] = $request->deal_type;
        } else {
            $data['deal_type'] = 'new';
        }
        // if (($request->account) !== null) {

        //     if ($request->account == 'client') {
        //         $client_id = Client::insertGetId([
        //             'name'     => $request->name,
        //             'email'    => $request->email,
        //             'phone'    => $request->phone,
        //             'status'   => 'inactive',
        //             'password' => Hash::make($request->password),
        //         ]);
        //         $data['client_id'] = $client_id;
        //     } elseif ($request->account == 'partner') {
        //         $partner_id = Partner::insertGetId([
        //             'name'                   => $request->name,
        //             'primary_email_address'  => $request->email,
        //             'phone_number'           => $request->phone,
        //             'status'                 => 'inactive',
        //             'password'               => Hash::make($request->password),
        //         ]);
        //         $data['partner_id'] = $partner_id;
        //     }
        // } else {
        $data['client_id'] =  $request->client_id;
        $data['partner_id'] = $request->partner_id;
        // }
        $data['pq_code'] = 'NG' . '-' . date('dmy');

        // $rfq_code = 'RFQ-' . date('dmy') . Rfq::latest()->value('id');
        // $count = RFQ::where('rfq_code', $rfq_code)->count();
        // if ($count > 0) {
        //     $rfq_code = $rfq_code . Str::random(3);
        // }
        // $data['rfq_code'] = $rfq_code;
        $today = now()->format('ymd');
        $lastCode = RFQ::where('rfq_code', 'like', "$today-%")->latest('id')->first();
        $newNumber = $lastCode ? (int)explode('-', $lastCode->rfq_code)[2] + 1 : 1;
        $data['rfq_code'] = $today . '-' . $newNumber;
        //dd($rfq_code);

        if (!empty($request->image)) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'image' => 'image|mimes:png,jpg,jpeg|max:5000',
                ],
                [
                    'mimes' => 'The :attribute must be a file of type:PNG - JPEG - JPG'
                ],
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',

                ],
                [
                    'mimes' => 'The :attribute must be a file of type:PNG - JPEG - JPG'
                ],
            );
        }

        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImage =  Helper::singleImageUpload($mainFile, $imgPath, 450, 350);
            } else {
                $globalFunImage = ['status' => 0];
            }
            //dd($data['pq_code']);
            $rfq_id = Rfq::insertGetId([

                'sales_man_id_L1'      => $request->sales_man_id_L1,
                'sales_man_id_T1'      => $request->sales_man_id_T1,
                'sales_man_id_T2'      => $request->sales_man_id_T2,
                'client_id'            => $data['client_id'],
                'partner_id'           => $data['partner_id'],
                'solution_id'          => $request->solution_id,
                'rfq_code'             => $data['rfq_code'],
                'client_type'          => $request->client_type,
                'name'                 => $request->name,
                'email'                => $request->email,
                'phone'                => $request->phone,
                'company_name'         => $request->company_name,
                'designation'          => $request->designation,
                'address'              => $request->address,
                'partner_name'         => $request->partner_name,
                'partner_email'        => $request->partner_email,
                'partner_phone'        => $request->partner_phone,
                'partner_company_name' => $request->partner_company_name,
                'partner_designation'  => $request->partner_designation,
                'partner_address'      => $request->partner_address,
                'create_date'          => Carbon::now(),
                'close_date'           => $request->close_date,
                'pq_code'              => $data['pq_code'],
                'pqr_code_one'         => $request->pqr_code_one,
                'pqr_code_two'         => $request->pqr_code_two,
                'validity'             => $request->validity,
                'regular'              => $request->regular,
                'special'              => $request->special,
                'tax_status'           => $request->tax_status,
                'rfq_type'             => 'deal',
                'deal_type'            => $data['deal_type'],
                'payment'              => $request->payment,
                'payment_mode'         => $request->payment_mode,
                'delivery'             => $request->delivery,
                'delivery_location'    => $request->delivery_location,
                'product_order'        => $request->product_order,
                'installation_support' => $request->installation_support,
                'pmt_condition'        => $request->pmt_condition,
                'terms_nine'           => $request->terms_nine,
                'terms_ten'            => $request->terms_ten,
                'terms_eleven'         => $request->terms_eleven,
                'tax'                  => $request->tax,
                'vat'                  => $request->vat,
                'total_price'          => $request->total_price,
                'price_text'           => $request->price_text,
                'status'               => 'deal_created',
                'created_at'           => Carbon::now(),

            ]);
            //dd($request->qty);
            $rfq_id           = $rfq_id;
            $rfq_code         = $data['rfq_code'];
            $item_name        = $request->item_name;
            $qty              = $request->qty;
            $unit_price       = $request->unit_price;
            $regular_discount = $request->regular_discount;



            for ($i = 0; $i < count($item_name); $i++) {
                $datasave = [
                    'rfq_id'           => $rfq_id,
                    'rfq_code'         => $rfq_code,
                    'item_name'        => $item_name[$i],
                    'qty'              => $qty[$i],
                    'unit_price'       => $unit_price[$i],
                    'regular_discount' => $regular_discount[$i],

                ];

                // DB::table('colors')->insert($datasave);
                DealSas::insert($datasave);
            }
            // RfqProduct::insert([

            //     'rfq_id' => $rfq_id,
            //     'photo' => $uploadPath,
            //     'created_at' => Carbon::now(),

            // ]);

            $name = User::where('id', $request->sales_man_id_L1)->value('name');
            Notification::send($user, new DealRegister($name, $rfq_code = $data['rfq_code']));
            Toastr::success('Deal Registered Successfully');
            return redirect()->route('admin.single-rfq.show', $data['rfq_code']);
        } else {

            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->route('admin.deal.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['users'] = User::where(function ($query) {
            $query->whereJsonContains('department', 'business');
        })->select('id', 'name')->orderBy('id', 'DESC')->get();
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['partners'] = Partner::select('partners.id', 'partners.name')->get();
        $data['rfq'] = Rfq::find($id);
        return view('admin.pages.deal.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users'] = User::where(function ($query) {
            $query->whereJsonContains('department', 'business');
        })->select('id', 'name')->orderBy('id', 'DESC')->get();
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['partners'] = Partner::select('partners.id', 'partners.name')->get();
        $data['rfq'] = Rfq::find($id);
        return view('admin.pages.deal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $rfq = Rfq::find($id);
        if (!empty($rfq)) {
            $validator =
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'image' => 'image|mimes:png,jpg,jpeg|max:5000',
                ];
        } else {
            $validator =
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                ];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {


            if (!empty($rfq)) {


                $rfq->update([
                    'sales_man_id_L1'      => $request->sales_man_id_L1,
                    'sales_man_id_T1'      => $request->sales_man_id_T1,
                    'sales_man_id_T2'      => $request->sales_man_id_T2,
                    'close_date'           => $request->close_date,
                    'client_type'          => $request->client_type,
                    'client_id'            => $request->client_id,
                    'partner_id'           => $request->partner_id,
                    'regular'              => $request->regular,
                    'special'              => $request->special,
                    'tax_status'           => $request->tax_status,
                    'name'                 => $request->name,
                    'email'                => $request->email,
                    'phone'                => $request->phone,
                    'company_name'         => $request->company_name,
                    'designation'          => $request->designation,
                    'address'              => $request->address,
                    'partner_name'         => $request->partner_name,
                    'partner_email'        => $request->partner_email,
                    'partner_phone'        => $request->partner_phone,
                    'partner_company_name' => $request->partner_company_name,
                    'partner_designation'  => $request->partner_designation,
                    'partner_address'      => $request->partner_address,
                    'validity'             => $request->validity,
                    'payment'              => $request->payment,
                    'payment_mode'         => $request->payment_mode,
                    'delivery'             => $request->delivery,
                    'delivery_location'    => $request->delivery_location,
                    'product_order'        => $request->product_order,
                    'installation_support' => $request->installation_support,
                    'pmt_condition'        => $request->pmt_condition,
                    'terms_nine'           => $request->terms_nine,
                    'terms_ten'            => $request->terms_ten,
                    'terms_eleven'         => $request->terms_eleven,


                ]);
            }

            Toastr::success('Data has been updated');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        // return redirect()->route('deal.index');
        return redirect()->route('admin.deal.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //dd($id);
        $rfq = RFQ::findOrFail($id);

        if (File::exists(public_path('storage/') . $rfq->image)) {
            File::delete(public_path('storage/') . $rfq->image);
        }
        if (File::exists(public_path('storage/') . $rfq->image)) {
            File::delete(public_path('storage/') . $rfq->image);
        }
        if (File::exists(public_path('storage/thumb/') . $rfq->image)) {
            File::delete(public_path('storage/thumb/') . $rfq->image);
        }
        $rfq->delete();
    }

    public function GetPartner($partner_id)
    {
        $partner = Partner::where('id', $partner_id)->first();
        return json_encode($partner);
    }

    public function GetClient($client_id)
    {
        $client = Client::where('id', $client_id)->first();
        return json_encode($client);
    }

    public function SendQuotation(Request $request, $id)
    {
        $data['pq_code'] = $request->pq_code;
        $data['currency'] = $request->currency;
        $data['pqr_code_one'] = $request->pqr_code_one;
        $data['email'] = $request->email;
        $data['rfq'] = Rfq::where('rfq_code', $id)->where('rfq_type', 'deal')->first();

        $data['rfq_terms'] = RfqTerms::where('rfq_id', $data['rfq']->id)->get();
        // dd($data['rfq_terms']);
        $data['products'] = DealSas::where('rfq_id',  $data['rfq']->id)->get();
        $data['deal_sas'] = DealSas::where('rfq_id',  $data['rfq']->id)->first();

        $fileName = 'Qutotation(' . $data['rfq']->rfq_code . ').pdf';
        $filePath = 'public/files/' . $fileName;
        // $pdf = PDF::loadView('pdf.quotation', $data);


        $pdf = PDF::loadView('pdf.quotation', $data);
        $pdf->setPaper('a4', 'portrait');


        //$pdf_upload = $pdf->save($filePath);
        $pdf_output = $pdf->output();
        Storage::put($filePath, $pdf_output);
        //dd($pdf_upload);
        $email = $data['email'];
        $subject = 'Quotation From Ngen IT';
        $message = "
        Dear {$data['rfq']->name},

        Thank you for being with us. You can find the Quotation From NGen IT which is generated against your RFQ attached with this email.


        Thank You,
        NGEN IT Business Team
        ";

        // Send email with attachment and message
        $mail = Mail::raw($message, function ($message) use ($email, $subject, $pdf_output) {
            $message->to($email)->from('sales@ngenitltd.com,', 'NGEN-Business')
                ->subject($subject)
                ->attachData($pdf_output, 'Quotation-Ngenit.pdf');
        });

        // send the email
        if ($mail) {
            Toastr::success('Quotation Mail Sent Successfully');
        } else {
            Toastr::error($message, 'Quotation Mail Sent Failed', ['timeOut' => 30000]);
        }



        $document_check = CommercialDocument::where('rfq_id', $data['rfq']->id)->first();
        if (!empty($document_check)) {
            CommercialDocument::find($document_check->id)->update([
                'client_pq' => $filePath,
            ]);
            Toastr::success('PDF Uploaded Successfully');
        } else {
            CommercialDocument::create([
                'rfq_id' => $data['rfq']->id,
                'client_pq' => $filePath,
            ]);
            Toastr::success('PDF Uploaded Successfully');
        }

        $user = User::latest()->get();

        $name = Auth::user()->name;
        $rfq_code = $data['rfq']->rfq_code;

        Notification::send($user, new Quotation($name, $rfq_code));

        if (!empty($data['deal_sas']->tax_sales)) {
            $quoted_price = ($data['deal_sas']->grand_total) - ($data['deal_sas']->tax_sales);
        } else {
            $quoted_price = $data['deal_sas']->grand_total;
        }

        $rfq = Rfq::find($data['rfq']->id);
        $rfq->update([
            'currency'  => $request->currency,
            'pq_code'  => $request->pq_code,
            'pqr_code_one'  => $request->pqr_code_one,
            'status'  => 'quoted',
            'quoted_price' => $quoted_price,
        ]);

        return redirect()->back();
    }


    public function dealInvoiceSent(Request $request, $id)
    {
        // dd($request->all());
        //dd($id);
        $data['email'] = $request->email;
        $data['rfq'] = Rfq::where('rfq_code', $id)->where('rfq_type', 'deal')->first();
        $data['products'] = DealSas::where('rfq_id',  $data['rfq']->id)->get();
        $data['deal_sas'] = DealSas::where('rfq_id',  $data['rfq']->id)->first();
        $data['pq_code'] = $data['rfq']->pq_code;
        $data['currency'] = $data['rfq']->currency;
        $data['pqr_code_one'] = $data['rfq']->pqr_code_one;

        $data['work_order_no'] = $request->work_order_no;
        $data['notes'] = $request->notes;


        $data['invoice_no'] = 'NI-' . date('dmY') . Order::latest()->value('order_number');

        // Define file name and path
        $fileName = 'Invoice(' . $data['rfq']->rfq_code . ').pdf';
        $filePath = 'public/files/' . $fileName;

        // Generate PDF
        $pdf = PDF::loadView('pdf.invoice', $data);
        $pdf->setPaper('A4', 'portrait');
        $pdf_output = $pdf->output();

        // Save PDF to storage
        Storage::put($filePath, $pdf_output);

        // Prepare email details
        $email = $data['email'];
        $subject = 'Invoice From Ngen IT';

        // Email message body
        $message = "
        Dear {$data['rfq']->name},

        Thank you for being with us. You can find the Invoice From NGen IT which is generated against your RFQ attached with this email.


        Thank You,
        NGEN IT Sales Team
        ";

        // Send email with attachment and message
        $mail = Mail::raw($message, function ($message) use ($email, $subject, $pdf_output) {
            $message->to($email)->from('sales@ngenitltd.com,', 'NGEN-Business')
                ->subject($subject)
                ->attachData($pdf_output, 'invoice-Ngenit.pdf');
        });

        // send the email
        if ($mail) {
            Toastr::success('Invoice Mail Sent Successfully');
        } else {
            Toastr::error($message, 'Invoice Mail Sent Failed', ['timeOut' => 30000]);
        }


        $document_check = CommercialDocument::where('rfq_id', $data['rfq']->id)->first();
        if (!empty($document_check)) {
            CommercialDocument::find($document_check->id)->update([
                'client_invoice' => $filePath,
            ]);
            Toastr::success('PDF Uploaded Successfully');
        } else {
            CommercialDocument::create([
                'rfq_id' => $data['rfq']->id,
                'client_invoice' => $filePath,
            ]);
            Toastr::success('Invoice PDF Uploaded Successfully');
        }

        $user = User::latest()->get();

        $name = Auth::user()->name;
        $rfq_code = $data['rfq']->rfq_code;

        Notification::send($user, new Quotation($name, $rfq_code));

        $rfq = Rfq::find($data['rfq']->id);
        $rfq->update([
            'status'  => 'invoice_sent',
        ]);
        //return $pdf->download('Quotation-'.$id.'.pdf');
        return redirect()->back();
    }

    public function proofPaymentUpload(Request $request, $id)
    {
        //dd($request->all());
        $data['rfq'] = Rfq::where('rfq_code', $id)->first();
        $document_check = CommercialDocument::where('rfq_id', $data['rfq']->id)->first();

        $mainFileClientPo = $request->file('client_po_pdf');
        if (isset($mainFileClientPo)) {
            $globalFunClientPo = Helper::singleFileUpload($mainFileClientPo);
        } else {
            $globalFunClientPo = ['status' => 0];
        }


        if (!empty($document_check)) {
            CommercialDocument::find($document_check->id)->update([
                'client_payment'          => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
            ]);
            Toastr::success('PDF Uploaded Successfully');
        } else {
            CommercialDocument::create([
                'rfq_id' => $data['rfq']->id,
                'client_payment'          => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
            ]);
            Toastr::success('PDF Uploaded Successfully');
        }
        $rfq = Rfq::where('id', $data['rfq']->id)->first();
        //dd($rfq);
        $rfq->update([
            'status'     => 'proof_of_payment_uploaded',
            'sale_date'  => Carbon::now()->format('dmy'),
            'rfq_type'  => 'order',
        ]);

        return redirect()->back();
    }
}
