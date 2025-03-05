<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Carbon\Carbon;
use App\Models\User;
use App\Rules\Recaptcha;
use App\Mail\RfqAssigned;
use App\Models\Admin\Rfq;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\DealSas;
use App\Models\Admin\Product;
use App\Models\Client\Client;
use App\Models\Admin\RfqTerms;
use App\Models\Partner\Partner;
use Illuminate\Validation\Rule;
use App\Models\Admin\RfqProduct;
use App\Notifications\RfqAssign;
use App\Notifications\RfqCreate;
use App\Notifications\WorkOrder;
use App\Mail\RFQNotificationMail;
use App\Notifications\DealConvert;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RFQNotificationAdminMail;
use App\Models\Admin\QuotationProduct;
use App\Mail\RFQNotificationClientMail;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\CommercialDocument;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class RFQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data['users'] = User::where(function ($query) {
    //         $query->whereJsonContains('department', 'business');
    //     })->where('role', 'manager')->select('id', 'name')->orderBy('id', 'DESC')->get();
    //     $data['rfq_count'] = Rfq::where('rfq_type', 'rfq')->latest()->count();
    //     $data['rfqs'] = Rfq::where('rfq_type', 'rfq')->latest()->get();
    //     $data['pendings'] = Rfq::where('rfq_type', 'rfq')->where('status', 'rfq_created')->latest()->get();
    //     $data['quoteds'] = Rfq::where('rfq_type', 'rfq')->where('status', 'quoted')->orderBy('id', 'DESC')->get();
    //     $data['deals'] = Rfq::where('rfq_type', 'rfq')->where('status', 'assigned')->orderBy('id', 'DESC')->get();
    //     $data['losts'] = Rfq::where('rfq_type', 'rfq')->where('status', 'lost')->orderBy('id', 'DESC')->get();
    //     //dd($data);
    //     // return view('admin.pages.rfq.all', $data);
    //     return view('metronic.pages.rfq.index', $data);
    // }

    public function index(Request $request)
    {
        // Fetch users with 'business' department and 'manager' role
        $users = User::where(function ($query) {
            $query->whereJsonContains('department', 'business');
        })->where('role', 'manager')->select('id', 'name')->orderBy('id', 'DESC')->get();

        // Get the total count of RFQs
        $rfq_count = Rfq::where('rfq_type', 'rfq')->latest()->count();

        // Default RFQ query
        $query = Rfq::where('rfq_type', 'rfq');

        // Apply year filter if provided
        if ($request->has('year') && $request->year != '') {
            $query->whereYear('created_at', $request->year);
        }

        // Apply month filter if provided
        if ($request->has('month') && $request->month != '') {
            $monthNumber = date('m', strtotime($request->month)); // Convert month name to number
            $query->whereMonth('created_at', $monthNumber);
        }

        // Apply status filter if provided (pending, quoted, etc.)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Fetch the filtered RFQs
        $rfqs = $query->latest()->get();

        // Separate RFQs by their status
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds = $rfqs->where('status', 'quoted');
        $losts = $rfqs->where('status', 'lost');

        // Return data to the view
        return view('metronic.pages.rfq.index', [
            'rfqs'      => $rfqs,
            'pendings'  => $pendings,
            'quoteds'   => $quoteds,
            'losts'     => $losts,
            'users'     => $users,
            'rfq_count' => $rfq_count,
            'tab_status' => '',
        ]);
    }

    public function filterRFQ(Request $request)
    {
        // dd($request->search);
        $query = Rfq::where('rfq_type', 'rfq');

        // Apply year filter if provided
        if ($request->has('year') && $request->year != '') {
            $query->whereYear('create_date', $request->year);
        }

        // Apply month filter if provided
        if ($request->has('month') && $request->month != '') {
            $monthNumber = date('m', strtotime($request->month)); // Convert month name to number
            $query->whereMonth('create_date', $monthNumber);
        }

        // Apply status filter if provided
        if ($request->has('status') && $request->status != '') {
            // $query->where('status', $request->status);
            $tab_status = $request->status;
        } else {
            $tab_status = '';
        }

        // Apply search filter if provided
        if ($request->has('search') && $request->search != '') {
            // Search by specific fields, like name or RFQ ID
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('rfq_code', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('company_name', 'like', "%$search%")
                    ->orWhere('country', 'like', "%$search%")
                    ->orWhere('create_date', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%"); // Add more fields to search as necessary
            });
        }

        // Fetch filtered RFQs
        $rfqs = $query->latest()->get();

        // Separate RFQs by their status
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds = $rfqs->where('status', 'quoted');
        $losts = $rfqs->where('status', 'lost');

        // Return the partial view for updated data as JSON
        return response()->json([
            'view' => view('metronic.pages.rfq.partials.rfq_queries', [
                'rfqs'       => $rfqs,
                'pendings'   => $pendings,
                'quoteds'    => $quoteds,
                'losts'      => $losts,
                'tab_status' => $tab_status,
            ])->render(),
        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::where(function ($query) {
            $query->whereJsonContains('department', 'business');
        })->where('role', 'manager')->select('id', 'name')->orderBy('id', 'DESC')->get();
        $data['products'] = Product::latest()->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['partners'] = Partner::select('partners.id', 'partners.name')->get();
        return view('admin.pages.rfq.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'                 => 'required',
                'country'              => 'required',
                'email'                => 'required|string|email', // Validate email format
                // 'email'                => 'required|email:rfc,dns', // Validate email format
                'phone'                => 'required',
                // 'rfq_code'             => 'unique:rfqs',
                'image'                => 'nullable|file|mimes:webp,jpeg,png,jpg|max:2048',
                'g-recaptcha-response' => ['required', new Recaptcha],
            ],
            [
                'required'     => 'This :attribute field is required',
                'email.email'  => 'Proper Email is required',
                'email.rfc'    => 'Proper Email is required',
                'email.dns'    => 'Proper Email is required',
                'mimes'        => 'The :attribute must be a file of type:PNG-JPEG-JPG-WEBP',
            ],
        );
        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                // Toastr::error($message, 'Failed', ['timeOut' => 30000]);
                Session::flash('error', $message);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $userIp = $request->ip();
        $lastRequestTime = session("last_form_submission_{$userIp}");

        if ($lastRequestTime && now()->diffInMinutes($lastRequestTime) < 1) {
            Session::flash('error', 'You can only submit the form once every 5 minutes.');
            // Toastr::error('You can only submit the form once every 5 minutes.');
            return redirect()->back()->withErrors('You can only submit the form once every 5 minutes.');
        }




        $data['deal_type'] = 'new';
        $today = now()->format('dmy');

        $lastCode = RFQ::where('rfq_code', 'like', "RFQ-$today-%")->latest('id')->first();

        if ($lastCode) {
            $lastNumber = (int)explode('-', $lastCode->rfq_code)[2];
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $client = Client::where('email', $request->input('email'))->first();
        $client_type = $client ? (in_array($client->user_type, ['client', 'partner']) ? $client->user_type : 'anonymous') : 'anonymous';

        $data['rfq_code'] = "RFQ-$today-$newNumber";

        $product = Product::find($request->input('product_id'));
        $product_name = $request->input('product_name') ?? $product->name;

        $mainFile = $request->file('image');
        $imgPath = storage_path('app/public/');
        $globalFunImage = $mainFile ? Helper::singleImageUpload($mainFile, $imgPath, 450, 350) : ['status' => 0];

        $rfq_id = Rfq::insertGetId([
            'client_id' => !empty($request->client_id) ? $request->client_id : (!empty($client->id) ? $client->id : null),
            'partner_id'   => $request->input('partner_id'),
            'product_id'   => $request->input('product_id'),
            'solution_id'  => $request->input('solution_id'),
            'rfq_code'     => $data['rfq_code'],
            'rfq_type'     => 'rfq',
            'deal_type'    => $data['deal_type'],
            'client_type'  => $client_type,
            'name'         => $request->input('name'),
            'email'        => $request->input('email'),
            'phone'        => $request->input('phone'),
            'qty'          => $request->input('qty'),
            'company_name' => $request->input('company_name'),
            'country'      => $request->input('country'),
            'designation'  => $request->input('designation'),
            'message'      => $request->input('message'),
            'address'      => $request->input('address'),
            'create_date'  => now(),
            'close_date'   => $request->input('close_date'),
            'image'        => $globalFunImage['status'] == 1 ? $globalFunImage['file_name'] : '',
            'status'       => 'rfq_created',
            'created_at'   => Carbon::now(),
        ]);

        if ($product_name) {
            RfqProduct::insert([
                'rfq_id'       => $rfq_id,
                'product_name' => $product_name,
                'qty'          => $request->qty,
                'created_at'   => Carbon::now(),

            ]);

            QuotationProduct::insert([
                'rfq_id'       => $rfq_id,
                'product_name' => $product_name,
                'qty'          => $request->qty,
                'created_at'   => Carbon::now(),

            ]);
        }

        $name = $request->input('name');
        $rfq_code = $data['rfq_code'];

        $users = User::whereJsonContains('department', ['business', 'logistics'])->get();
        $user_emails = User::whereJsonContains('department', ['business'])
            ->where(function ($query) {
                $query->where('role', 'manager')
                    ->orWhere('role', 'admin');
            })
            ->pluck('email')
            ->toArray();

        Notification::send($users, new RfqCreate($name, $rfq_code));

        $data = [
            'name'         => $name,
            'sku_code'     => !empty($product->sku_code) ?? $product->sku_code,
            'product_name' => $product_name,
            'phone'        => $request->input('phone'),
            'qty'          => $request->input('qty'),
            'company_name' => $request->input('company_name'),
            'address'      => $request->input('address'),
            'message'      => $request->input('message'),
            'rfq_code'     => $rfq_code,
            'email'        => $request->input('email'),
            'country'      => $request->input('country'),
            'link'         => route('single-rfq.show', $rfq_code),
        ];
        // dd($rfq_code);
        // dd($request->all());
        try {
            Mail::to($request->email)->send(new RFQNotificationClientMail($data));
            foreach ($user_emails as $email) {
                Mail::to($email)->send(new RFQNotificationAdminMail($data));
            }
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
            Session::flash('error', 'Email sending failed: ' . $e->getMessage());
        }
        session()->put("last_form_submission_{$userIp}", now());
        Session::flash('success', 'Your RFQ has been submitted successfully.');
        // Toastr::success('Your RFQ has been submitted successfully.');


        return redirect()->back();
    }

    public function rfqCreate(Request $request)
    {
        // Validate the input
        $validator = Validator::make(
            $request->all(),
            [
                'name'                   => 'required',
                'email'                  => 'required|email:rfc,dns',
                // 'rfq_code'               => 'unique:rfqs',
                'image'                  => 'file|mimes:jpeg,png,jpg|max:2048',
                'country'                => 'required',
                'product_name'           => 'required|array|min:1',
                'product_name.*'         => 'required|string',
                'qty'                    => 'required|array|min:1',
                'qty.*'                  => 'required|integer|min:1',
            ],
            [
                'required'               => 'The :attribute field is required.',
                'mimes'                  => 'The :attribute must be a file of type:jpeg,png,jpg.',
                'email'                  => 'The :attribute must be a valid email address.',
                'unique'                 => 'The :attribute must be unique.',
                'product_name.required'  => 'At least one product name must be provided.',
                'qty.required'           => 'At least one quantity must be provided.',
                'qty.*.min'              => 'Each quantity must be greater than 0.',
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
                Session::flash('error', $message);
            }
            return redirect()->back()->withInput();
        }
        $userIp = $request->ip();

        $lastRequestTime = session("last_email_request_{$userIp}");

        if ($lastRequestTime && now()->diffInMinutes($lastRequestTime) < 5) {
            Toastr::error('You can only send one request every 5 minutes.', 'Failed');
            return redirect()->back(); // Block further submissions within the 5-minute window
        }
        // Generate RFQ Code
        $today = now()->format('dmY');
        $lastCode = RFQ::where('rfq_code', 'like', "RFQ-$today-%")->latest('id')->first();
        $newNumber = $lastCode ? (int)explode('-', $lastCode->rfq_code)[2] + 1 : 1;
        $rfq_code = 'RFQ-' . $today . '-' . $newNumber;

        // Check for existing client
        $client = Client::where('email', $request->email)->first();
        $client_type = $client ? (in_array($client->user_type, ['client', 'partner']) ? $client->user_type : 'anonymous') : 'anonymous';

        // Save RFQ
        $rfq_id = RFQ::insertGetId([
            'rfq_code'          => $rfq_code,
            'sales_man_id_L1'   => $request->sales_man_id_L1,
            'sales_man_id_T1'   => $request->sales_man_id_T1,
            'sales_man_id_T2'   => $request->sales_man_id_T2,
            'client_id'         => $request->client_id ?? $client->id ?? null,
            'partner_id'        => $request->partner_id,
            'product_id'        => $request->product_id,
            'solution_id'       => $request->solution_id,
            'client_type'       => $client_type,
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'company_name'      => $request->company_name,
            'designation'       => $request->designation,
            'address'           => $request->address,
            'country'           => $request->country,
            'create_date'       => now(),
            'message'           => $request->message,
            'delivery_location' => $request->delivery_location,
            'budget'            => $request->budget,
            'project_status'    => $request->project_status,
            // 'image'             => $imagePath['status'] == 1 ? $imagePath['file_name']: null,
            'status'            => 'rfq_created',
            'deal_type'         => 'new',
            'created_at'        => now(),
        ]);

        // Save Products to RfqProduct and QuotationProduct
        foreach ($request->product_name as $key => $productName) {
            RfqProduct::create([
                'rfq_id'       => $rfq_id,
                'product_name' => $productName,
                'qty'          => $request->qty[$key],
                'created_at'   => now(),
            ]);
            QuotationProduct::create([
                'rfq_id'       => $rfq_id,
                'product_name' => $productName,
                'qty'          => $request->qty[$key],
                'created_at'   => now(),
            ]);
        }

        // Notify users and send emails
        $name = $request->name;
        $user_emails = User::where(function ($query) {
            $query->whereJsonContains('department', 'business')
                ->orWhereJsonContains('department', 'logistics');
        })->where('role', 'admin')->pluck('email')->toArray();

        Notification::send(
            User::whereIn('email', $user_emails)->get(),
            new RfqCreate($name, $rfq_code)
        );
        $productNames = '';
        foreach ($request->product_name as $key => $item) {
            $productNames .= ($key + 1) . '. ' . $item;
            if ($key < count($request->product_name) - 1) {
                $productNames .= ', ';
            }
        }
        $qty = '';
        foreach ($request->qty as $key => $item) {
            $productNames .= ($key + 1) . '. ' . $item;
            if ($key < count($request->qty) - 1) {
                $productNames .= ', ';
            }
        }
        $data = [
            'name'         => $name,
            'product_name' => $productNames,
            'phone'        => $request->phone,
            'qty'          => $qty,
            'company_name' => $request->company_name,
            'address'      => $request->address,
            'message'      => $request->message,
            'rfq_code'     => $rfq_code,
            'email'        => $request->email,
            'country'      => $request->country,
            'link'         => route('single-rfq.show', $rfq_code),
        ];

        try {
            Mail::to($request->email)->send(new RFQNotificationClientMail($data));
            foreach ($user_emails as $email) {
                Mail::to($email)->send(new RFQNotificationAdminMail($data));
            }
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
            Toastr::error('There was an error sending the email.', 'Error');
        }

        Cart::destroy();
        Toastr::success('Your RFQ has been submitted successfully.');
        return redirect()->route('rfq.success', $rfq_code);
    }

    // public function rfqCreate(Request $request)
    // {
    //     // dd($request->all());
    //     $data['deal_type'] = 'new';
    //     $today = now()->format('dmY');
    //     $lastCode = RFQ::where('rfq_code', 'like', "RFQ-$today-%")->latest('id')->first();
    //     if ($lastCode) {
    //         $lastNumber = (int)explode('-', $lastCode->rfq_code)[2];
    //         $newNumber = $lastNumber + 1;
    //     } else {
    //         $newNumber = 1;
    //     }
    //     $data['rfq_code'] = 'RFQ-' . $today . '-' . $newNumber;

    //     $productNames = '';
    //     foreach ($request->items as $key => $item) {
    //         $productNames .= ($key + 1) . '. ' . $item['product_name'];
    //         if ($key < count($request->items) - 1) {
    //             $productNames .= ', ';
    //         }
    //     }


    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'name' => 'required',
    //             'email' => 'required',
    //             // 'phone' => 'required',
    //             // 'delivery_location' => 'required',
    //             'rfq_code' => 'unique:rfqs',
    //             'image' => 'file|mimes:jpeg,png,jpg|max:2048',
    //         ],
    //         [
    //             'required' => 'The :attribute field is required',
    //             'mimes' => 'The :attribute must be a file of type:PNG-JPEG-JPG'
    //         ],
    //     );

    //         $client = Client::where('email', $request->input('email'))->first();
    //         $client_type = $client ? (in_array($client->user_type, ['client', 'partner']) ? $client->user_type : 'anonymous') : 'anonymous';

    //     if ($validator->passes()) {
    //         $mainFile = $request->file('image');
    //         $imgPath = storage_path('app/public/');
    //         $globalFunImage = $mainFile ? Helper::singleImageUpload($mainFile, $imgPath, 450, 350) : ['status' => 0];

    //         $rfq_id = Rfq::insertGetId([
    //             'rfq_code'                  => $data['rfq_code'],
    //             'sales_man_id_L1'           => $request->sales_man_id_L1,
    //             'sales_man_id_T1'           => $request->sales_man_id_T1,
    //             'sales_man_id_T2'           => $request->sales_man_id_T2,
    //             'client_id'                 => !empty($request->client_id) ? $request->client_id : (!empty($client->id) ? $client->id : null),
    //             'partner_id'                => $request->partner_id,
    //             'product_id'                => $request->product_id,
    //             'solution_id'               => $request->solution_id,
    //             'client_type'               => $client_type,
    //             'name'                      => $request->name,
    //             'email'                     => $request->email,
    //             'phone'                     => $request->phone,
    //             'company_name'              => $request->company_name,
    //             'designation'               => $request->designation,
    //             'address'                   => $request->address,
    //             'country'                   => $request->country,
    //             'create_date'               => Carbon::now(),
    //             'close_date'                => $request->close_date,
    //             'sale_date'                 => $request->sale_date,
    //             'pq_code'                   => $request->pq_code,
    //             'pqr_code_one'              => $request->pqr_code_one,
    //             'pqr_code_two'              => $request->pqr_code_two,
    //             'qty'                       => $request->qty,
    //             'category'                  => json_encode($request->category),
    //             'brand'                     => json_encode($request->brand),
    //             'industry'                  => json_encode($request->industry),
    //             'image'                     => $globalFunImage['status'] == 1 ? $globalFunImage['file_name'] : '',
    //             'message'                   => $request->message,
    //             'rfq_type'                  => 'rfq',
    //             'call'                      => $request->call,
    //             'regular'                   => $request->regular,
    //             'special'                   => $request->special,
    //             'tax_status'                => $request->tax_status,
    //             'deal_type'                 => $data['deal_type'],
    //             'tax'                       => $request->tax,
    //             'vat'                       => $request->vat,
    //             'total_price'               => $request->total_price,
    //             'quoted_price'              => $request->quoted_price,
    //             'price_text'                => $request->price_text,
    //             'currency'                  => $request->currency,
    //             'rfq_department'            => $request->rfq_department,
    //             'delivery_location'         => $request->delivery_location,
    //             'budget'                    => $request->budget,
    //             'project_status'            => $request->project_status,
    //             'approximate_delivery_time' => $request->approximate_delivery_time,
    //             'status'                    => 'rfq_created',
    //             'created_at'                => Carbon::now(),
    //         ]);
    //         if ($request->items) {
    //             foreach ($request->items as $item) {
    //                 RfqProduct::create([
    //                     'rfq_id'       => $rfq_id,
    //                     'product_name' => $item['product_name'],
    //                     'qty'          => $item['qty'],
    //                     'created_at'   => Carbon::now(),

    //                 ]);
    //             }
    //         }
    //         if ($request->items) {
    //             foreach ($request->items as $item) {
    //                 QuotationProduct::create([
    //                     'rfq_id'       => $rfq_id,
    //                     'product_name' => $item['product_name'],
    //                     'qty'          => $item['qty'],
    //                     'created_at'   => Carbon::now(),
    //                 ]);
    //             }
    //         }

    //         $name = $request->name;
    //         $rfq_code = $data['rfq_code'];

    //         $users = User::where(function ($query) {
    //             $query->whereJsonContains('department', 'business')
    //                 ->orwhereJsonContains('department', 'logistics');
    //         })->where('role', 'admin')->get();
    //         // $slug = $data['slug'];
    //         $user_emails = User::where(function ($query) {
    //             $query->whereJsonContains('department', 'business')
    //                 ->orwhereJsonContains('department', 'logistics');
    //         })->where('role', 'admin')->pluck('email')->toArray();
    //         // $user_emails = 'khandkershahed23@gmail.com';

    //         Notification::send($users, new RfqCreate($name, $rfq_code));


    //         $data = [

    //             'name'         => $name,
    //             'product_name' => $productNames,
    //             'phone'        => $request->phone,
    //             'qty'          => $request->qty,
    //             'company_name' => $request->company_name,
    //             'address'      => $request->address,
    //             'message'      => $request->message,
    //             'rfq_code'     => $rfq_code,
    //             'email'        => $request->email,
    //             'link'         => route('single-rfq.show', $rfq_code),

    //         ];
    //         Mail::to($request->input('email'))->send(new RFQNotificationClientMail($data));
    //         if (!empty($user_emails)) {
    //             foreach ($user_emails as $email) {
    //                 Mail::to($email)->send(new RFQNotificationAdminMail($data));
    //             }

    //             // Extract the emails except the ones already sent to and use them as BCC
    //             $bcc_emails = array_diff($user_emails, [$email]);

    //             if (!empty($bcc_emails)) {
    //                 Mail::bcc($bcc_emails)->send(new RFQNotificationAdminMail($data));
    //             }
    //         }

    //         Toastr::success('Your RFQ has been submitted successfully.');
    //     } else {

    //         $messages = $validator->messages();
    //         foreach ($messages->all() as $message) {
    //             Toastr::error($message, 'Failed', ['timeOut' => 30000]);
    //         }
    //     }
    //     return redirect()->route('rfq.success', $rfq_code);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        })->where('role', 'manager')->select('id', 'name')->orderBy('id', 'DESC')->get();
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['partners'] = Partner::select('partners.id', 'partners.name')->get();
        $data['rfq'] = Rfq::find($id);
        return view('admin.pages.rfq.edit', $data);
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
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath, 157, 87);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($rfq)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $rfq->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $rfq->image);
                    File::delete(public_path($uploadPath . '/requestImg/') . $rfq->image);
                }

                $rfq->update([
                    'sales_man_id_L1'      => $request->sales_man_id_L1,
                    'sales_man_id_T1'      => $request->sales_man_id_T1,
                    'sales_man_id_T2'      => $request->sales_man_id_T2,
                    'client_id'            => $request->client_id,
                    'partner_id'           => $request->partner_id,
                    'product_id'           => $request->product_id,
                    'solution_id'          => $request->solution_id,
                    'rfq_code'             => $request->rfq_code,
                    'client_type'          => $request->client_type,
                    'name'                 => $request->name,
                    'email'                => $request->email,
                    'phone'                => $request->phone,
                    'company_name'         => $request->company_name,
                    'designation'          => $request->designation,
                    'address'              => $request->address,
                    'create_date'          => date('Y-m-d H:i:s', strtotime($request->create_date)),
                    'delivery_deadline'    => $request->delivery_deadline,
                    'work_order_no'        => $request->work_order_no,
                    'client_po_no'         => $request->client_po_no,
                    'pq_code'              => $request->pq_code,
                    'pqr_code_one'         => $request->pqr_code_one,
                    'pqr_code_two'         => $request->pqr_code_two,
                    'qty'                  => $request->qty,
                    'message'              => $request->message,
                    'call'                 => $request->call,
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
                    'tax'                  => $request->tax,
                    'vat'                  => $request->vat,
                    'total_price'          => $request->total_price,
                    'price_text'           => $request->price_text,
                    'status'               => 'pending',
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $rfq->image,
                ]);
            }

            Toastr::success('Data has been updated');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->route('rfq-manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rfq = RFQ::find($id);

        if (File::exists(public_path('storage/') . $rfq->image)) {
            File::delete(public_path('storage/') . $rfq->image);
        }
        if (File::exists(public_path('storage/requestImg/') . $rfq->image)) {
            File::delete(public_path('storage/requestImg/') . $rfq->image);
        }
        if (File::exists(public_path('storage/thumb/') . $rfq->image)) {
            File::delete(public_path('storage/thumb/') . $rfq->image);
        }
        $rfq->delete();
    }

    public function AssignSalesMan(Request $request, $id)
    {
        $rfq = Rfq::where('rfq_code', $id)->first();
        if (!empty($rfq->id)) {
            $product_name = Product::where('id', $rfq->product_id)->value('name');
        } else {
            $product_name = RfqProduct::where('rfq_id', $rfq->id)->value('product_name');
        }


        $user = User::get();
        if (!empty($rfq)) {

            $user_emails = [];

            if (!empty($request->sales_man_id_L1)) {
                $name1 = User::where('id', $request->sales_man_id_L1)->value('name');
                $user_email1 = User::where('id', $request->sales_man_id_L1)->value('email');
                $user_emails[] = $user_email1;
            } else {
                $name1 = '';
            }

            if (!empty($request->sales_man_id_T1)) {
                $name2 = User::where('id', $request->sales_man_id_T1)->value('name');
                $user_email2 = User::where('id', $request->sales_man_id_T1)->value('email');
                $user_emails[] = $user_email2;
            } else {
                $name2 = '';
            }

            if (!empty($request->sales_man_id_T2)) {
                $name3 = User::where('id', $request->sales_man_id_T2)->value('name');
                $user_email3 = User::where('id', $request->sales_man_id_T2)->value('email');
                $user_emails[] = $user_email3;
            } else {
                $name3 = '';
            }

            // dd($user_emails);


            $rfq->update([
                'sales_man_id_L1'      => $request->sales_man_id_L1,
                'sales_man_id_T1'      => $request->sales_man_id_T1,
                'sales_man_id_T2'      => $request->sales_man_id_T2,
                'status'               => 'assigned',
            ]);
        }


        $rfq_code = $rfq->rfq_code;



        Notification::send($user, new RfqAssign($name1, $name2, $name3, $rfq_code));
        $data = [

            'name'         => $rfq->name,
            'product_name' => $product_name,
            'phone'        => $rfq->phone,
            'qty'          => $rfq->qty,
            'company_name' => $rfq->company_name,
            'address'      => $rfq->address,
            'message'      => $rfq->message,
            'rfq_code'     => $rfq->rfq_code,
            'email'        => $rfq->email,

        ];
        $mail = Mail::to($user_emails);
        if ($mail) {
            $mail->send(new RfqAssigned($data));
            Toastr::success('Mail has Sent Successfully');
        } else {
            Toastr::error('Email Failed to send', ['timeOut' => 30000]);
            return redirect()->back();
        }
        Toastr::success('SalesMan has been Assigned');

        return redirect()->back();
    }

    public function DealConvert($id)
    {
        $data['users']        = User::where(function ($query) {
            $query->whereJsonContains('department', 'business');
        })->select('id', 'name')->orderBy('id', 'DESC')->get();
        // $data['products'] = Product::select('products.id', 'products.name')->where('product_status','product')->get();
        // $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['clients']      = Client::where('user_type', 'client')->select('clients.id', 'clients.name')->get();
        $data['partners']     = Client::where('user_type', 'partner')->select('clients.id', 'clients.name')->get();
        $data['rfq']          = Rfq::with('rfqProducts')->find($id);
        // $data['rfq_products'] = RfqProduct::where('rfq_id', $data['rfq']->id)->get();
        return view('admin.pages.deal.deal_convert', $data);
    }

    public function ConvertDealStore(Request $request, $id)
    {
        //dd($request->all());
        if (!empty($request->account)) {
            if ($request->account == 'client') {
                $validator =
                    [
                        'name' => 'required',
                        'email' => 'required|unique:clients',
                        'phone' => 'required',
                        'image' => 'image|mimes:png,jpg,jpeg|max:5000',
                    ];
                $validator = Validator::make($request->all(), $validator);
                if ($validator->passes()) {
                    $client = Client::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'phone'    => $request->phone,
                        'status'   => 'inactive',
                        'password' => Hash::make($request->password),
                    ]);
                }
            } elseif ($request->account == 'partner') {
                $validator =
                    [
                        'name' => 'required',
                        'email' => 'required|unique:clients',
                        'phone' => 'required',
                        'image' => 'image|mimes:png,jpg,jpeg|max:5000',
                    ];
                $validator = Validator::make($request->all(), $validator);
                if ($validator->passes()) {
                    $client = Client::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'phone'    => $request->phone,
                        'status'   => 'inactive',
                        'password' => Hash::make($request->password),
                    ]);
                }
            }
        }
        $rfq = Rfq::find($id);

        $validator =
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg|max:5000',
            ];


        // $data['pq_code'] = 'NG' . '-' . date('dmy');
        $today = Carbon::today()->format('dmy');

        // Find the last RFQ code of today from the database
        $lastCode = RFQ::where('pq_code', 'like', 'NG-PQ-' . $today . '-%')->orderBy('id', 'DESC')->first();

        if ($lastCode) {
            // Extract the last numeric part of the pq_code and increment it by 1
            $lastNumber = (int) explode('-', $lastCode->pq_code)[2];
            $newNumber = $lastNumber + 1;
        } else {
            // If there are no RFQ codes for today, start with 1
            $newNumber = 1;
        }

        $data['pq_code'] = 'NG-PQ-' . $today . '-' . $newNumber;



        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {


            if (!empty($rfq)) {


                $rfq->update([
                    'sales_man_id_L1'      => $request->sales_man_id_L1,
                    'sales_man_id_T1'      => $request->sales_man_id_T1,
                    'sales_man_id_T2'      => $request->sales_man_id_T2,
                    'client_id'            => $request->client_id,
                    'partner_id'           => $request->partner_id,
                    'solution_id'          => $request->solution_id,
                    'client_type'          => $request->client_type,
                    'name'                 => $request->name,
                    'email'                => $request->email,
                    'phone'                => $request->phone,
                    'company_name'         => $request->company_name,
                    'designation'          => $request->designation,
                    'address'              => $request->address,
                    // 'partner_name'         => $request->partner_name,
                    // 'partner_email'        => $request->partner_email,
                    // 'partner_phone'        => $request->partner_phone,
                    // 'partner_company_name' => $request->partner_company_name,
                    // 'partner_designation'  => $request->partner_designation,
                    // 'partner_address'      => $request->partner_address,
                    'close_date'           => $request->close_date,
                    'pq_code'              => $data['pq_code'],
                    'pqr_code_one'         => $request->pqr_code_one,
                    'pqr_code_two'         => $request->pqr_code_two,
                    'regular'              => $request->regular,
                    'special'              => $request->special,
                    'tax_status'           => $request->tax_status,
                    'rfq_type'             => 'deal',
                    'status'               => 'deal_created',


                ]);
            }
            $rfq_id      = $rfq->id;
            $rfq_code    = $rfq->rfq_code;
            $title       = $request->title;
            $description = $request->description;
            $item_name   = $request->item_name;
            $qty         = $request->qty;
            $unit_price  = $request->unit_price;


            for ($i = 0; $i < count($title); $i++) {
                $rfqTerms = [
                    'rfq_id'       => $rfq_id,
                    'title'        => $title[$i],
                    'description'  => $description[$i],


                ];

                RfqTerms::insert($rfqTerms);
            }






            for ($i = 0; $i < count($item_name); $i++) {
                $datasave = [
                    'rfq_id'           => $rfq_id,
                    'rfq_code'         => $rfq_code,
                    'item_name'        => $item_name[$i],
                    'qty'              => $qty[$i],
                    'unit_price'       => $unit_price[$i],


                ];

                DealSas::insert($datasave);
            }


            $rfq_code = Rfq::where('id', $id)->value('rfq_code');
            $user = User::get();
            $name = Auth::user()->name;
            // dd($user);
            Notification::send($user, new DealConvert($name, $rfq_code));

            Toastr::success('The Rfq has been converted into Deal.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }

        // return redirect()->route('deal.index');
        return redirect()->route('single-rfq.show', $rfq_code);
    }

    public function workOrderUpload(Request $request, $id)
    {
        //dd($request->all());
        $rfq = Rfq::where('rfq_code', $id)->first();

        $mainFileClientPo = $request->file('client_po_pdf');
        if (isset($mainFileClientPo)) {
            $globalFunClientPo = Helper::singleFileUpload($mainFileClientPo);
        } else {
            $globalFunClientPo = ['status' => 0];
        }
        // if (!empty($document_check)) {
        //     CommercialDocument::find($document_check->id)->update([
        //         'client_po'  => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
        //     ]);
        //     Toastr::success('PDF Uploaded Successfully');
        // } else {
        //     CommercialDocument::create([
        //         'rfq_id'    => $data['rfq']->id,
        //         'client_po' => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
        //     ]);
        //     Toastr::success('PDF Uploaded Successfully');
        // }

        $rfq->update([
            'status'     => 'workorder_uploaded',
            'client_po' => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
        ]);
        $user = User::latest()->get();

        $name = $rfq->name;
        $rfq_code = $rfq->rfq_code;

        Notification::send($user, new WorkOrder($name, $rfq_code));
        Toastr::success('Workorder uploaded Succssfully.');
        return redirect()->back();
    }

    public function proofPaymentUpload(Request $request, $id)
    {
        //dd($request->all());
        $rfq = Rfq::where('rfq_code', $id)->first();
        // $document_check = CommercialDocument::where('rfq_id', $data['rfq']->id)->first();

        $mainFileClientPo = $request->file('client_po_pdf');
        if (isset($mainFileClientPo)) {
            $globalFunClientPo = Helper::singleFileUpload($mainFileClientPo);
        } else {
            $globalFunClientPo = ['status' => 0];
        }


        // if (!empty($document_check)) {
        //     CommercialDocument::find($document_check->id)->update([
        //         'client_payment'          => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
        //     ]);
        //     Toastr::success('PDF Uploaded Successfully');
        // } else {
        //     CommercialDocument::create([
        //         'rfq_id' => $data['rfq']->id,
        //         'client_payment'          => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
        //     ]);
        //     Toastr::success('PDF Uploaded Successfully');
        // }
        //dd($rfq);
        $rfq->update([
            'status'             => 'proof_of_payment_uploaded',
            'client_payment_pdf' => $globalFunClientPo['status'] == 1 ? $globalFunClientPo['file_name'] : '',
            'sale_date'          => Carbon::now()->format('dmy'),
            'rfq_type'           => 'order',
        ]);
        Toastr::success('Proof of Payment uploaded Succssfully.');
        return redirect()->back();
    }
}
