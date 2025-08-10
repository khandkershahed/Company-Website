<?php

namespace App\Http\Controllers\Admin;

use Pdf;
use App\Models\User;
use App\Models\Admin\Rfq;
use App\Mail\QuotationMail;
use App\Models\Admin\Brand;
use App\Models\Admin\Region;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\DealSas;
use App\Models\Client\Client;
use App\Mail\AccountCreateMail;
use App\Jobs\SendQuotationEmail;
use App\Models\Admin\RfqQuotation;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\QuotationTerm;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\QuotationProduct;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\CommercialDocument;
use Illuminate\Support\Facades\Validator;

class RFQManageController extends Controller
{

    public function index()
    {
        $data['users'] = User::whereJsonContains('department', 'business')->where('role', 'manager')->latest('id')->get(['id', 'name']);
        $data['rfqs'] = Rfq::with('rfqProducts')->latest('id')->where('rfq_type', 'rfq')->get();
        // dd($data['rfqs']);
        return view('admin.pages.rfq-manage.rfq_index', $data);
    }

    public function dealList()
    {
        $data['users'] = User::whereJsonContains('department', 'business')->where('role', 'manager')->latest('id')->get(['id', 'name']);
        $data['deals'] = Rfq::with('rfqProducts')->where('rfq_type', '!=', 'rfq')->orderBy('rfqs.updated_at', 'desc')->latest('id')->get();
        return view('admin.pages.rfq-manage.deal_index', $data);
    }


    public function show($id)
    {
        $data['users'] = User::where(function ($query) {
            $query->whereJsonContains('department', 'business');
        })->select('id', 'name')->orderBy('id', 'DESC')->get();
        $data['rfq_details'] = Rfq::with('rfqProducts')->where('rfq_code', $id)->first();
        $data['deal_products'] = DealSas::where('rfq_code', $data['rfq_details']->rfq_code)->get();
        // $data['commercial_document'] = CommercialDocument::where('rfq_id', $data['rfq_details']->id)->first();
        //dd($data['rfq_details']->rfq_code);
        $data['sourcing'] = DealSas::where('rfq_code', $data['rfq_details']->rfq_code)->first();
        return view('admin.pages.singleRfq.all', $data);
    }

    public function quotationMail($id)
    {
        // Retrieve RFQ details with related products
        $rfq = Rfq::with('rfqProducts')->where('rfq_code', $id)->first();

        if (!$rfq) {
            Toastr::error('RFQ not found.');
            return redirect()->back();
        }

        // Prepare base data
        $users = User::whereJsonContains('department', 'business')->where('role', 'manager')
            ->select('id', 'name')
            ->orderByDesc('id')
            ->get();

        $email = trim($rfq->email);

        $client = Client::where('email', $email)->first();

        if ($client && $client->user_type === 'job_seeker') {
            $client->delete();
            $client = null; // manually reset since it's now deleted
        }

        if ($rfq->client_type === 'anonymous' && !$client) {
            return view('metronic.pages.cog.crm', [
                'rfq'   => $rfq,
                'users' => $users,
            ]);
        }


        // For identified clients
        $quotationData = [
            'quotation'     => DB::table('rfq_quotations')->where('rfq_id', $rfq->id)->first(),
            'singleproduct' => QuotationProduct::where('rfq_id', $rfq->id)->first(),
            'rfq_terms'     => QuotationTerm::where('rfq_id', $rfq->id)->get(),
            'countries'     => Country::select('country_code','country_name')->get(),
            'rfq_country'   => Country::where('country_name', 'LIKE', '%' . $rfq->country . '%')->first(),
            'brands'        => Brand::latest('id')->select('title', 'image')->inRandomOrder()->limit(5)->get(),
            'rfq'           => $rfq,
            'users'         => $users,
        ];

        return view('metronic.pages.cog.index', $quotationData);
    }




    public function store(Request $request)
    {
        $rfq_id = $request->rfq_id;
        $rfq_code = $request->rfq_code;
        $data = $request->all();

        $data['terms_titles'] = $request->terms_title ?? []; // Ensure terms_titles is an array
        $data['quotation_products'] = $request->product_name ?? []; // Ensure quotation_products is an array
        $data['vat_display'] = $data['vat_display'] ?? '0'; // Default to '0' if not set
        $data['special_discount_display'] = $data['special_discount_display'] ?? '0'; // Default to '0' if not set
        $rfqQuotation = RfqQuotation::updateOrCreate(
            ['rfq_id' => $rfq_id],
            [
                // 'rfq_id' => $data['rfq_id'] ?? null,
                'rfq_code'                           => $data['rfq_code'] ?? null,
                'quotation_title'                    => $data['quotation_title'] ?? null,
                'country'                            => $data['country'] ?? null,
                'region'                             => $data['region'] ?? null,
                'currency'                           => $data['currency'] ?? null,
                'currency_rate'                      => $data['currency_rate'] ?? null,
                'company_name'                       => $data['company_name'] ?? null,
                'name'                               => $data['name'] ?? null,
                'email'                              => $data['email'] ?? null,
                'receiver_email'                     => $data['receiver_email'] ?? null,
                'receiver_cc_email'                  => $data['receiver_cc_email'] ?? null,
                'phone'                              => $data['phone'] ?? null,
                'address'                            => $data['address'] ?? null,
                'ngen_company_name'                  => $data['ngen_company_name'] ?? null,
                'ngen_company_registration_number'   => $data['ngen_company_registration_number'] ?? null,
                'quotation_date'                     => $data['quotation_date'] ?? null,
                'pq_code'                            => $data['pq_code'] ?? null,
                'pqr_code'                           => $data['pqr_code'] ?? null,
                'sub_total_final_total_price'        => $data['sub_total_final_total_price'] ?? null,
                'special_discount_final_total_price' => $data['special_discount_final_total_price'] ?? null,
                'vat_final_total_price'              => $data['vat_final_total_price'] ?? null,
                'total_final_total_price'            => $data['total_final_total_price'] ?? null,
                'thank_you_text'                     => $data['thank_you_text'] ?? null,
                'sender_name'                        => $data['sender_name'] ?? null,
                'sender_designation'                 => $data['sender_designation'] ?? null,
                'ngen_email'                         => $data['ngen_email'] ?? null,
                'ngen_whatsapp_number'               => $data['ngen_whatsapp_number'] ?? null,
                'ngen_number_two'                    => $data['ngen_number_two'] ?? null,
                'attachment'                         => $data['attachment'] ?? null,
                'office_cost_percentage'             => $data['office_cost_percentage'] ?? null,
                'profit_percentage'                  => $data['profit_percentage'] ?? null,
                'others_cost_percentage'             => $data['others_cost_percentage'] ?? null,
                'remittence_percentage'              => $data['remittence_percentage'] ?? null,
                'packing_percentage'                 => $data['packing_percentage'] ?? null,
                'vat_display'                        => $data['vat_display'] ?? null,
                'vat_text'                           => $data['vat_text'] ?? null,
                'special_discount_display'           => $data['special_discount_display'] ?? null,
                'custom_percentage'                  => $data['custom_percentage'] ?? null,
                'tax_vat_percentage'                 => $data['tax_vat_percentage'] ?? null,
            ]
        );

        foreach ($data['terms_titles'] as $index => $title) {
            $termsId = $data['terms_id'][$index];

            if ($termsId) {
                // Update existing term
                $term = QuotationTerm::find($termsId);
            } else {
                // Create new term
                $term = new QuotationTerm;
            }
            $term->rfq_id = $data['rfq_id']; // Ensure rfq_id is passed in the request
            $term->title = $title;
            $term->description = $data['terms_description'][$index];
            $term->save();
        }
        // dd($data);
        foreach ($data['quotation_products'] as $index => $name) {
            $productId = $data['product_id'][$index];

            if ($productId) {
                // Update existing product
                $product = QuotationProduct::find($productId);
            } else {
                // Create new product
                $product = new QuotationProduct;
            }

            $product->rfq_id                             = $data['rfq_id'];
            $product->product_name                       = $name;
            $product->qty                                = $data['qty'][$index];
            $product->principal_cost                     = $data['principal_cost'][$index];
            $product->principal_unit_total_amount        = $data['principal_unit_total_amount'][$index];
            $product->unit_office_cost                   = $data['unit_office_cost'][$index];
            $product->unit_profit                        = $data['unit_profit'][$index];
            $product->unit_others_cost                   = $data['unit_others_cost'][$index];
            $product->unit_remittance                    = $data['unit_remittance'][$index];
            $product->unit_packing                       = $data['unit_packing'][$index];
            $product->unit_customs                       = $data['unit_customs'][$index];
            $product->unit_tax_vat                       = $data['unit_tax_vat'][$index];
            $product->unit_subtotal                      = $data['unit_subtotal'][$index];
            $product->unit_final_price                   = $data['unit_final_price'][$index];
            $product->unit_final_total_price             = $data['unit_final_total_price'][$index];
            $product->sub_total_principal_amount         = $data['sub_total_principal_amount'] ?? 0;
            $product->sub_total_office_cost              = $data['sub_total_office_cost'] ?? 0;
            $product->sub_total_profit                   = $data['sub_total_profit'] ?? 0;
            $product->sub_total_others_cost              = $data['sub_total_others_cost'] ?? 0;
            $product->sub_total_remittance               = $data['sub_total_remittance'] ?? 0;
            $product->sub_total_packing                  = $data['sub_total_packing'] ?? 0;
            $product->sub_total_customs                  = $data['sub_total_customs'] ?? 0;
            $product->sub_total_tax                      = $data['sub_total_tax'] ?? 0;
            $product->sub_total_subtotal                 = $data['sub_total_subtotal'] ?? 0;
            $product->sub_total_final_total_price        = $data['sub_total_final_total_price'] ?? 0;
            $product->special_discount_percentage        = $data['special_discount_display'] ? $data['special_discount_percentage'] : 0;
            $product->special_discount_principal_amount  = $data['special_discount_display'] ? $data['special_discount_principal_amount'] : 0;
            $product->special_discount_office_cost       = $data['special_discount_display'] ? $data['special_discount_office_cost'] : 0;
            $product->special_discount_profit            = $data['special_discount_display'] ? $data['special_discount_profit'] : 0;
            $product->special_discount_others_cost       = $data['special_discount_display'] ? $data['special_discount_others_cost'] : 0;
            $product->special_discount_remittance        = $data['special_discount_display'] ? $data['special_discount_remittance'] : 0;
            $product->special_discount_packing           = $data['special_discount_display'] ? $data['special_discount_packing'] : 0;
            $product->special_discount_customs           = $data['special_discount_display'] ? $data['special_discount_customs'] : 0;
            $product->special_discount_tax               = $data['special_discount_display'] ? $data['special_discount_tax'] : 0;
            $product->special_discount_subtotal          = $data['special_discount_display'] ? $data['special_discount_subtotal'] : 0;
            $product->special_discount_final_total_price = $data['special_discount_display'] ? $data['special_discount_final_total_price'] : 0;
            $product->vat_percentage                     = $data['vat_display'] == '1' ? $data['vat_percentage']      : 0;
            $product->vat_principal_amount               = $data['vat_display'] == '1' ? $data['vat_principal_amount'] : 0;
            $product->vat_office_cost                    = $data['vat_display'] == '1' ? $data['vat_office_cost'] : 0;
            $product->vat_profit                         = $data['vat_display'] == '1' ? $data['vat_profit'] : 0;
            $product->vat_others_cost                    = $data['vat_display'] == '1' ? $data['vat_others_cost'] : 0;
            $product->vat_remittance                     = $data['vat_display'] == '1' ? $data['vat_remittance'] : 0;
            $product->vat_packing                        = $data['vat_display'] == '1' ? $data['vat_packing'] : 0;
            $product->vat_customs                        = $data['vat_display'] == '1' ? $data['vat_customs'] : 0;
            $product->vat_tax                            = $data['vat_display'] == '1' ? $data['vat_tax'] : 0;
            $product->vat_subtotal                       = $data['vat_display'] == '1' ? $data['vat_subtotal'] : 0;
            $product->vat_final_total_price              = $data['vat_display'] == '1' ? $data['vat_final_total_price'] : 0;
            $product->total_principal_amount             = $data['total_principal_amount'] ?? 0;
            $product->total_office_cost                  = $data['total_office_cost'] ?? 0;
            $product->total_profit                       = $data['total_profit'] ?? 0;
            $product->total_others_cost                  = $data['total_others_cost'] ?? 0;
            $product->total_remittance                   = $data['total_remittance'] ?? 0;
            $product->total_packing                      = $data['total_packing'] ?? 0;
            $product->total_customs                      = $data['total_customs'] ?? 0;
            $product->total_tax                          = $data['total_tax'] ?? 0;
            $product->total_subtotal                     = $data['total_subtotal'] ?? 0;
            $product->total_final_total_price            = $data['total_final_total_price'] ?? 0;

            $product->save();
        }

        $data['rfq'] = Rfq::with('quotationProducts')->where('rfq_code', $rfq_code)->first();
        $data['countries'] = Country::all();
        $data['rfq_country'] = Country::where('country_name', 'LIKE', '%' . $data['rfq']->country . '%')->first();
        $data['quotation']   = DB::table('rfq_quotations')->where('rfq_id', $rfq_id)->first();
        $data['singleproduct']   = QuotationProduct::where('rfq_id', $rfq_id)->first();
        $data['rfq_terms']   = QuotationTerm::where('rfq_id', $rfq_id)->get();
        $data['brands']   = Brand::latest('id')->select('title', 'image')->inRandomOrder()->limit(5)->get();
        Toastr::success('Quotation Saved.');
        return response()->json([
            // 'mysetting' => view('admin.pages.singleRfq.partials.bypass_setting', $data)->render(),
            // 'quotation' => view('admin.pages.singleRfq.partials.bypass_quotation', $data)->render(),
            // 'cog' => view('admin.pages.singleRfq.partials.bypass_cog', $data)->render(),
            'mysetting'      => view('metronic.pages.cog.partials.setting', $data)->render(),
            'quotation'      => view('metronic.pages.cog.partials.quotation', $data)->render(),
            'cog'            => view('metronic.pages.cog.partials.cog', $data)->render(),
            'currency_value' => $data['quotation']->currency,
            'country_value'  => $data['quotation']->country,
            'region_value'   => $data['quotation']->region,
        ]);
    }






    // public function bypassQuotationSend(Request $request)
    // {
    //     set_time_limit(240);
    //     $rfq_id = $request->rfq_id;

    //     $data['rfq'] = Rfq::find($rfq_id); // Use find() if you're fetching by primary key
    //     $data['quotation'] = RfqQuotation::where('rfq_id', $rfq_id)->first();
    //     $data['rfq_terms'] = QuotationTerm::where('rfq_id', $rfq_id)->get();
    //     $data['products'] = QuotationProduct::where('rfq_id', $rfq_id)->get();
    //     $data['singleproduct'] = $data['products']->first();
    //     $data['rfq_code'] = $data['rfq']->rfq_code;
    //     $data['name'] = $data['rfq']->name;
    //     $data['quotation_title'] = $data['quotation']->quotation_title;



    //     if ($data['quotation']->currency == 'taka') {
    //         $data['currency'] = 'Tk';
    //     } else if ($data['quotation']->currency == 'euro') {
    //         $data['currency'] = '&euro';
    //     } else if ($data['quotation']->currency == 'dollar') {
    //         $data['currency'] = '$';
    //     } else if ($data['quotation']->currency == 'pound') {
    //         $data['currency'] = '&pound';
    //     } else {
    //         $data['currency'] = 'Tk';
    //     }

    //     $fileName = 'Qutotation(' . $data['rfq']->rfq_code . ').pdf';
    //     $filePath = 'public/files/' . $fileName;
    //     $pdf = PDF::loadView('pdf.quotation', $data);
    //     $pdf->setPaper('a4', 'portrait');
    //     $pdf_output = $pdf->output();
    //     Storage::put($filePath, $pdf_output);
    //     // return view('pdf.quotation', $data);

    //     // Save the file path to the database
    //     $data['quotation']->update([
    //         'receiver_email' => $request->receiver_email,
    //         'receiver_cc_email' => $request->receiver_cc_email,
    //         'quotation_pdf' => $fileName,
    //     ]);

    //     if ($data['quotation']->attachment == '1') {
    //         Mail::to($data['quotation']->receiver_email)
    //             ->cc(explode(',', $data['quotation']->receiver_cc_email))
    //             ->send(new QuotationMail($data, $pdf_output));
    //     } else {
    //         Mail::to($data['quotation']->receiver_email)
    //             ->cc(explode(',', $data['quotation']->receiver_cc_email))
    //             ->send(new QuotationMail($data));
    //     }

    //     Toastr::success('Quotation Saved.');
    //     Toastr::success('Mail Sent.');
    //     return redirect()->back();
    // }

    public function bypassQuotationSend(Request $request)
    {
        set_time_limit(240);
        $rfq_id = $request->rfq_id;

        $data['rfq'] = Rfq::find($rfq_id); // Use find() if you're fetching by primary key
        $data['quotation'] = DB::table('rfq_quotations')->where('rfq_id', $rfq_id)->first();
        $data['rfq_terms'] = QuotationTerm::where('rfq_id', $rfq_id)->get();
        $data['products'] = QuotationProduct::where('rfq_id', $rfq_id)->get();
        $data['brands'] = Brand::select('title', 'image')->inRandomOrder()->limit(5)->get();
        $data['singleproduct'] = $data['products']->first();
        $data['rfq_code'] = $data['rfq']->rfq_code;
        $data['name'] = $data['rfq']->name;
        $data['quotation_title'] = $data['quotation']->quotation_title;

        if ($data['quotation']->currency == 'taka') {
            $data['currency'] = 'Tk';
        } elseif ($data['quotation']->currency == 'euro') {
            $data['currency'] = '€';
        } elseif ($data['quotation']->currency == 'dollar') {
            $data['currency'] = 'USD';
        } elseif ($data['quotation']->currency == 'pound') {
            $data['currency'] = '£';
        } else {
            $data['currency'] = 'Tk';
        }
        $data['rfq']->update([
            'status'  => 'quoted',
        ]);
        $fileName = 'Qutotation(' . $data['rfq']->rfq_code . ').pdf';
        $filePath = 'public/files/' . $fileName;
        // return view('pdf.quotation', $data);
        ini_set('memory_limit', '256M');
        $pdf = PDF::loadView('pdf.quotation', $data);
        $pdf->setPaper('a4', 'portrait');
        $pdf_output = $pdf->output();
        Storage::put($filePath, $pdf_output);

        // Validate email addresses
        $receiver_email = filter_var($request->receiver_email, FILTER_VALIDATE_EMAIL);
        $receiver_cc_email = $request->receiver_cc_email ? array_filter(explode(',', $request->receiver_cc_email), function ($email) {
            return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
        }) : [];

        if (!$receiver_email) {
            Toastr::error('Invalid receiver email address.');
            return redirect()->back()->withInput();
        }

        // Save the file path to the database
        DB::table('rfq_quotations')->where('rfq_id', $rfq_id)->update([
            'receiver_email' => $receiver_email,
            'receiver_cc_email' => implode(',', $receiver_cc_email),
            'quotation_pdf' => $fileName,
        ]);

        $mail = Mail::to($receiver_email);
        if (!empty($receiver_cc_email)) {
            $mail->cc($receiver_cc_email);
        }

        if ($data['quotation']->attachment == '1') {
            $mail->send(new QuotationMail($data, $pdf_output));
        } else {
            $mail->send(new QuotationMail($data));
        }

        Toastr::success('Quotation Saved.');
        Toastr::success('Mail Sent.');
        return redirect()->back();
    }



    // public function bypassQuotationSend(Request $request)
    // {
    //     set_time_limit(240);
    //     $rfq_id = $request->rfq_id;

    //     $data['rfq'] = Rfq::where('id', $rfq_id)->first();
    //     $data['quotation'] = DB::table('rfq_quotations')->where('rfq_id', $rfq_id)->first();
    //     $data['rfq_code'] = $data['rfq']->code;
    //     $data['quotation_title'] = $data['quotation']->quotation_title;
    //     $data['quotation']->update([
    //         'receiver_email' => $request->receiver_email,
    //         'receiver_cc_email' => $request->receiver_cc_email,
    //     ]);
    //     $data['rfq_terms'] = QuotationTerm::where('rfq_id', $rfq_id)->get();
    //     $data['products'] = QuotationProduct::where('rfq_id', $rfq_id)->get();
    //     $data['singleproduct'] = $data['products']->first();

    //     if ($data['quotation']->currency == 'taka') {
    //         $data['currency'] = 'Tk';
    //     } elseif ($data['quotation']->currency == 'euro') {
    //         $data['currency'] = '&euro;';
    //     } elseif ($data['quotation']->currency == 'dollar') {
    //         $data['currency'] = '$';
    //     } elseif ($data['quotation']->currency == 'pound') {
    //         $data['currency'] = '&pound;';
    //     } else {
    //         $data['currency'] = 'Tk';
    //     }

    //     $fileName = 'Qutotation(' . $data['rfq']->rfq_code . ').pdf';
    //     $filePath = 'public/files/' . $fileName;

    //     // Generate PDF and store in the variable
    //     $pdf = PDF::loadView('pdf.quotation', $data);
    //     $pdf->setPaper('a4', 'portrait');
    //     $pdf_output = $pdf->output();

    //     // Dispatch the job
    //     SendQuotationEmail::dispatch($data, $pdf_output, $filePath);

    //     Toastr::success('Quotation Saved.');
    //     Toastr::success('Mail Sent.');
    //     return redirect()->back();
    // }
    public function destroy($id)
    {
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
    public function quotationProductDelete($id)
    {
        $product = QuotationProduct::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }
    }
    public function quotationTermsDelete($id)
    {
        $product = QuotationTerm::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }
    }


    public function accountCreate(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'account_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
        ], [
            'account_type.required'       => 'The Register As field is required.',
            'name.required'               => 'The name field is required.',
            'email.required'              => 'The email field is required.',
            'phone.required'              => 'The phone field is required.',
            'name.string'                 => 'The name must be a string.',
            'email.email'                 => 'The email must be a valid email.',
            'name.max'                    => 'The name may not be greater than :max characters.',
            'email.unique'                => 'This email has already been taken.',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message);
            }
            return redirect()->back()->withInput();
        }

        // Extracting the first part of the name
        $nameParts = explode(' ', $request->name);
        $firstName = $nameParts[0];

        // Generating the password
        $password = $firstName . $request->phone;

        // Creating the user
        $user = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'password' => Hash::make($password),
            'user_type' => $request->account_type,
        ]);
        if ($user) {
            $rfq = Rfq::findOrFail($request->rfq_id);
            $rfq->update([
                'client_type' => $request->account_type,
            ]);
        }

        // Preparing the email data
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'password' => $password,
            'user_type' => $user->user_type,
        ];

        // Sending the email
        try {
            Mail::to($user->email)->send(new AccountCreateMail($data));
            Toastr::success('Account Creation Mail has been sent successfully.');
        } catch (\Exception $e) {
            Toastr::error('Failed to send Account Creation Mail. Please try again.', 'Failed', ['timeOut' => 30000]);
        }

        // Returning a response
        Toastr::success('Account Created Successfully.');
        return redirect()->back();
    }
}
