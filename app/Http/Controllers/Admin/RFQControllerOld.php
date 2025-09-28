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
use App\Mail\AccountCreateMail;
use App\Models\Partner\Partner;
use Illuminate\Validation\Rule;
use App\Models\Admin\RfqProduct;
use App\Notifications\RfqAssign;
use App\Notifications\RfqCreate;
use App\Notifications\WorkOrder;
use App\Mail\RFQConfirmationMail;
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

class RFQControllerOld extends Controller
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
        $users = User::whereJsonContains('department', 'business')
            ->where('role', 'manager')
            ->select('id', 'name')
            ->orderBy('id', 'DESC')
            ->get();

        // Base RFQ query
        $baseQuery = Rfq::where('rfq_type', 'rfq');

        // Count total RFQs

        $companies = (clone $baseQuery)->whereNotNull('company_name')->distinct('company_name')->pluck('company_name');
        // $companyWiseRfqs = (clone $baseQuery)->whereNotNull('company_name')->selectRaw('company_name, COUNT(*) as total')
        //     ->groupBy('company_name')
        //     ->orderBy('total', 'DESC')
        //     ->get();;
        // $countries = (clone $baseQuery)->whereNotNull('country')->distinct('country')->pluck('country');
        $countryWiseRfqs = (clone $baseQuery)
            ->whereNotNull('country')
            ->selectRaw('country, COUNT(*) as total')
            ->groupBy('country')
            ->orderBy('total', 'DESC')
            ->get();

        // Get new customers where 'confirmation' is null
        $new_customers = (clone $baseQuery)->whereNull('confirmation')->where('created_at', '>=', Carbon::now()->subMonths(1))->latest()->get();

        // Apply filters dynamically
        if ($request->filled('year')) {
            $baseQuery->whereYear('created_at', $request->year);
        } elseif (!$request->filled('month')) {
            $baseQuery->where('created_at', '>=', '2025-08-17');
        }

        if ($request->filled('month')) {
            $monthNumber = date('m', strtotime($request->month));
            $baseQuery->whereMonth('created_at', $monthNumber);
            if (!$request->filled('year')) {
                $baseQuery->where('created_at', '>=', '2025-08-17');
            }
        }

        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        // Fetch filtered RFQs
        $rfq_count = (clone $baseQuery)->count();
        $rfqs = $baseQuery->latest()->get();
        // Separate RFQs by status
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        // This month (September 2025)
        $this_month = $rfqs->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->count();

        // Last month (August 2025)
        $last_month = $rfqs->whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        // Avoid division by zero
        if ($last_month > 0) {
            $percentage_change = (($this_month - $last_month) / $last_month) * 100;
        } else {
            // If last month is 0 and this month > 0, it's a full increase
            $percentage_change = $this_month > 0 ? 100 : 0;
        }

        // Round for cleaner display
        $percentage_change = round($percentage_change, 1);

        // Return data to the view
        return view('metronic.pages.rfq.index', [
            'rfqs'              => $rfqs,
            'pendings'          => $pendings,
            'quoteds'           => $quoteds,
            'losts'             => $losts,
            'users'             => $users,
            'rfq_count'         => $rfq_count,
            'new_customers'     => $new_customers,
            'companies'         => $companies,
            // 'countries'         => $countries,
            'this_month'        => $this_month,
            'last_month'        => $last_month,
            'percentage_change' => $percentage_change,
            'countryWiseRfqs'   => $countryWiseRfqs,
            'tab_status'        => '',
        ]);
    }

    public function archivedRFQ(Request $request)
    {
        // Fetch users with 'business' department and 'manager' role
        $users = User::whereJsonContains('department', 'business')
            ->where('role', 'manager')
            ->select('id', 'name')
            ->orderBy('id', 'DESC')
            ->get();

        // Base RFQ query
        $baseQuery = Rfq::where('rfq_type', 'rfq');

        // Count total RFQs
        $rfq_count = (clone $baseQuery)->count();
        $companies = (clone $baseQuery)->whereNotNull('company_name')->distinct('company_name')->pluck('company_name');
        $countryWiseRfqs = (clone $baseQuery)
            ->whereNotNull('country')
            ->selectRaw('country, COUNT(*) as total')
            ->groupBy('country')
            ->orderBy('total', 'DESC')
            ->get();
        // Get new customers where 'confirmation' is null
        $new_customers = (clone $baseQuery)->whereNull('confirmation')->where('created_at', '>=', Carbon::now()->subMonths(1))->latest()->get();

        // Apply filters dynamically
        if ($request->filled('year')) {
            $baseQuery->whereYear('created_at', $request->year);
        } elseif (!$request->filled('month')) {
            $baseQuery->where('created_at', '<=', '2025-08-17');
        }

        if ($request->filled('month')) {
            $monthNumber = date('m', strtotime($request->month));
            $baseQuery->whereMonth('created_at', $monthNumber);
            if (!$request->filled('year')) {
                $baseQuery->where('created_at', '<=', '2025-08-17');
            }
        }

        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        // Fetch filtered RFQs
        $rfqs = $baseQuery->latest()->get();

        // Separate RFQs by status
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');

        // This month (September 2025)
        $this_month = $rfqs->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->count();

        // Last month (August 2025)
        $last_month = $rfqs->whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        // Avoid division by zero
        if ($last_month > 0) {
            $percentage_change = (($this_month - $last_month) / $last_month) * 100;
        } else {
            // If last month is 0 and this month > 0, it's a full increase
            $percentage_change = $this_month > 0 ? 100 : 0;
        }

        // Round for cleaner display
        $percentage_change = round($percentage_change, 1);

        // Return data to the view
        return view('metronic.pages.rfq.index', [
            'rfqs'              => $rfqs,
            'pendings'          => $pendings,
            'quoteds'           => $quoteds,
            'losts'             => $losts,
            'users'             => $users,
            'rfq_count'         => $rfq_count,
            'new_customers'     => $new_customers,
            'companies'         => $companies,
            'this_month'        => $this_month,
            'last_month'        => $last_month,
            'percentage_change' => $percentage_change,
            'countryWiseRfqs'   => $countryWiseRfqs,
            'tab_status'        => '',
        ]);
    }


    public function filterRFQ(Request $request)
    {
        try {
            $query = Rfq::where('rfq_type', 'rfq');

            if ($request->filled('year')) {
                $query->whereYear('create_date', $request->year);
            }

            if ($request->filled('month')) {
                $monthNumber = date('m', strtotime($request->month));
                $query->whereMonth('create_date', $monthNumber);
            }

            if ($request->filled('company')) {
                $query->where('company_name', $request->company);
            }

            if ($request->filled('country')) {
                $query->where('country', $request->country);
            }

            if ($request->filled('salesman')) {
                $query->where(function ($q) use ($request) {
                    $q->where('sales_man_id_L1', $request->salesman)
                        ->orWhere('sales_man_id_T1', $request->salesman)
                        ->orWhere('sales_man_id_T2', $request->salesman);
                });
            }

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('rfq_code', 'like', "%$search%")
                        ->orWhere('name', 'like', "%$search%")
                        ->orWhere('company_name', 'like', "%$search%")
                        ->orWhere('country', 'like', "%$search%")
                        ->orWhere('create_date', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                });
            }

            $rfqs = $query->latest()->get();

            // Now get distinct companies and countries from filtered data
            $companies = $rfqs->pluck('company_name')->filter()->unique()->values();
            $countries = $rfqs->pluck('country')->filter()->unique()->values();

            $pendings = $rfqs->where('status', 'rfq_created');
            $quoteds = $rfqs->where('status', 'quoted');
            $losts = $rfqs->where('status', 'lost');

            $users = User::whereJsonContains('department', 'business')
                ->where('role', 'manager')
                ->select('id', 'name')
                ->orderByDesc('id')
                ->get();
            if ($rfqs->isEmpty()) {
                return response()->json([
                    'view' => '<div class="my-4 text-center text-white alert bg-danger">
                                    No RFQ Found. Please try again.
                                </div>',
                ]);
            }
            return response()->json([
                'view' => view('metronic.pages.rfq.partials.rfq_queries', [
                    'rfqs'       => $rfqs,
                    'pendings'   => $pendings,
                    'quoteds'    => $quoteds,
                    'losts'      => $losts,
                    'users'      => $users,
                    'companies'  => $companies,
                    'countries'  => $countries,
                    'tab_status' => $request->status ?? '',
                ])->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
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
        $blacklistedEmails = ['ericjonesmyemail@gmail.com', 'cristine.chatham@gmail.com'];
        $blacklistedNames = ['Eric Jones'];
        $blacklistedProduct = ['Eric Jones'];
        $blacklistedPhone = ['555-555-1212'];
        $blacklistedWords = ['Web Visitor', 'trustedleadgeneration.com', 'SMS Text With Lead', 'Eric', 'marketersmentor', 'Cristine Unsubscribe', 'Cristine'];

        if (in_array($request->product_name, $blacklistedProduct) || in_array($request->email, $blacklistedEmails) || in_array($request->name, $blacklistedNames) || in_array($request->phone, $blacklistedPhone)) {
            // Session::flash('error', 'Your request cannot be processed.');
            return redirect()->back();
        }

        foreach ($blacklistedWords as $word) {
            if (stripos($request->input('message'), $word) !== false) {
                // Session::flash('error', 'Your request contains spam and was blocked.');
                return redirect()->back();
            }
        }
        $validator = Validator::make(
            $request->all(),
            [
                'name'                 => 'required',
                'country'              => 'required',
                // 'email'                => 'required|string|email',
                'email'                => 'required|email:rfc,dns',
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
            // Log::error('Validation failed:', $validator->errors()->toArray());
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
            return redirect()->back()->withErrors('You can only submit the form once every 5 minutes.');
        }


        $data['deal_type'] = 'new';
        // $today = now()->format('dmy');

        // $lastCode = RFQ::where('rfq_code', 'like', "RFQ-$today-%")->latest('id')->first();

        // if ($lastCode) {
        //     $lastNumber = (int)explode('-', $lastCode->rfq_code)[2];
        //     $newNumber = $lastNumber + 1;
        // } else {
        //     $newNumber = 1;
        // }
        $today = now()->format('ymd'); // e.g., "250910"
        $lastCode = RFQ::where('rfq_code', 'like', "$today-%")->latest('id')->first();
        if ($lastCode) {
            $parts = explode('-', $lastCode->rfq_code);
            $lastNumber = isset($parts[1]) ? (int)$parts[1] : 0;
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        $rfq_code = $today . '-' . $newNumber;

        $client = Client::where('email', $request->input('email'))->first();
        $client_type = $client ? (in_array($client->user_type, ['client', 'partner']) ? $client->user_type : 'anonymous') : 'anonymous';

        // $data['rfq_code'] = "RFQ-$today-$newNumber";
        $data['rfq_code'] = $rfq_code;

        $product = Product::find($request->input('product_id'));
        $product_name = $request->input('product_name') ?? $product->name;

        $mainFile = $request->file('image');
        $imgPath = storage_path('app/public/');
        $globalFunImage = $mainFile ? Helper::singleImageUpload($mainFile, $imgPath, 450, 350) : ['status' => 0];

        $rfq_id = Rfq::insertGetId([
            'client_id'    => !empty($request->client_id) ? $request->client_id : (!empty($client->id) ? $client->id : null),
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

        $rfq = RFQ::with('rfqProducts')->where('rfq_code', $rfq_code)->first();
        $data = [
            'name'          => $rfq->name,
            'product_names' => $rfq->rfqProducts,
            'phone'         => $rfq->phone,
            'qty'           => $rfq->qty,
            'company_name'  => $rfq->company_name,
            'address'       => $rfq->address,
            'message'       => $rfq->message,
            'rfq_code'      => $rfq->rfq_code,
            'email'         => $rfq->email,
            'country'       => $rfq->country,
            'link'          => route('single-rfq.show', $rfq->rfq_code),
        ];
        try {
            // Mail::to($request->email)->send(new RFQNotificationClientMail($data));
            sleep(1); // Delay in seconds
            foreach ($user_emails as $email) {
                Mail::to($email)->send(new RFQConfirmationMail($data, $rfq->rfq_code));
                sleep(1);
            }
        } catch (\Exception $e) {
            // Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
            Session::flash('error', 'Email sending failed: ' . $e->getMessage());
        }
        session()->put("last_form_submission_{$userIp}", now());
        Session::flash('success', 'Your RFQ has been submitted successfully.');
        // Toastr::success('Your RFQ has been submitted successfully.');
        return redirect()->back();
    }

    public function rfqCreate(Request $request)
    {
        // dd($request->all());
        // Validate the input
        $validator = Validator::make(
            $request->all(),
            [
                'name'                   => 'required',
                'email'                  => 'required|email:rfc,dns',
                'image'                  => 'file|mimes:jpeg,png,jpg|max:2048',
                'country'                => 'required',
                // 'product_name'           => 'required|array|min:1',
                // 'product_name.*'         => 'required|string',
                // 'qty'                    => 'required|array|min:1',
                // 'qty.*'                  => 'required|integer|min:1',
                'contacts'                => 'required|array|min:1',
                'contacts.*.product_name' => 'required|string',
                'contacts.*.qty'          => 'required|integer|min:1',
            ],
            [
                'required'                         => 'The :attribute field is required.',
                'mimes'                            => 'The :attribute must be a file of type:jpeg,png,jpg.',
                'email'                            => 'The :attribute must be a valid email address.',
                'unique'                           => 'The :attribute must be unique.',
                // 'product_name.required'  => 'At least one product name must be provided.',
                // 'qty.required'           => 'At least one quantity must be provided.',
                // 'qty.*.min'              => 'Each quantity must be greater than 0.',
                'contacts.*.product_name.required' => 'Each product must have a name.',
                'contacts.*.qty.required'          => 'Each product must have a quantity.',
                'contacts.*.qty.integer'           => 'Quantity must be a number.',
                'contacts.*.qty.min'               => 'Quantity must be at least 1.',
            ]
        );
        // dd($request->contacts);
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
        $today = now()->format('ymd'); // e.g., "250910"
        $lastCode = RFQ::where('rfq_code', 'like', "$today-%")->latest('id')->first();
        if ($lastCode) {
            $parts = explode('-', $lastCode->rfq_code);
            $lastNumber = isset($parts[1]) ? (int)$parts[1] : 0;
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        $rfq_code = $today . '-' . $newNumber;


        // Check for existing client
        $client_type = 'anonymous';

        if ($client = Client::where('email', trim($request->email))->first()) {
            if ($client->user_type === 'job_seeker') {
                $client->delete();
            } elseif (in_array(trim(strtolower($client->user_type)), ['client', 'partner'])) {
                $client_type = $client->user_type;
            }
        }


        // Save RFQ
        $rfq_id = RFQ::insertGetId([
            'rfq_code'              => $rfq_code,
            'sales_man_id_L1'       => $request->sales_man_id_L1,
            'sales_man_id_T1'       => $request->sales_man_id_T1,
            'sales_man_id_T2'       => $request->sales_man_id_T2,
            'client_id'             => $request->client_id ?? $client->id ?? null,
            'partner_id'            => $request->partner_id,
            'product_id'            => $request->product_id,
            'solution_id'           => $request->solution_id,
            'client_type'           => $client_type,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'company_name'          => $request->company_name,
            'designation'           => $request->designation,
            'address'               => $request->address,
            'country'               => $request->country,
            'create_date'           => now(),
            'message'               => $request->message,
            'delivery_location'     => $request->delivery_location,
            'budget'                => $request->budget,
            'city'                  => $request->city,
            'zip_code'              => $request->zip_code,
            'is_reseller'           => $request->is_reseller,
            'shipping_name'         => ($request->is_contact_address == '1') ? $request->name : $request->shipping_name,
            'shipping_email'        => ($request->is_contact_address == '1') ? $request->email : $request->shipping_email,
            'shipping_phone'        => ($request->is_contact_address == '1') ? $request->phone : $request->shipping_phone,
            'shipping_company_name' => ($request->is_contact_address == '1') ? $request->company_name : $request->shipping_company_name,
            'shipping_designation'  => ($request->is_contact_address == '1') ? $request->designation : $request->shipping_designation,
            'shipping_address'      => ($request->is_contact_address == '1') ? $request->address : $request->shipping_address,
            'shipping_country'      => ($request->is_contact_address == '1') ? $request->country : $request->shipping_country,
            'shipping_city'         => ($request->is_contact_address == '1') ? $request->city : $request->shipping_city,
            'shipping_zip_code'     => ($request->is_contact_address == '1') ? $request->zip_code : $request->shipping_zip_code,
            'end_user_name'         => ($request->end_user_is_contact_address == '1') ? $request->name :  $request->end_user_name,
            'end_user_email'        => ($request->end_user_is_contact_address == '1') ? $request->email :  $request->end_user_email,
            'end_user_phone'        => ($request->end_user_is_contact_address == '1') ? $request->phone :  $request->end_user_phone,
            'end_user_company_name' => ($request->end_user_is_contact_address == '1') ? $request->company_name :  $request->end_user_company_name,
            'end_user_designation'  => ($request->end_user_is_contact_address == '1') ? $request->designation :  $request->end_user_designation,
            'end_user_address'      => ($request->end_user_is_contact_address == '1') ? $request->address :  $request->end_user_address,
            'end_user_country'      => ($request->end_user_is_contact_address == '1') ? $request->country :  $request->end_user_country,
            'end_user_city'         => ($request->end_user_is_contact_address == '1') ? $request->city :  $request->end_user_city,
            'end_user_zip_code'     => ($request->end_user_is_contact_address == '1') ? $request->zip_code :  $request->end_user_zip_code,
            'project_name'          => $request->project_name,
            'project_status'            => $request->project_status,
            'approximate_delivery_time' => $request->approximate_delivery_time,
            // 'image'             => $imagePath['status'] == 1 ? $imagePath['file_name']: null,
            'status'            => 'rfq_created',
            'deal_type'         => 'new',
            'created_at'        => now(),
        ]);

        // Save Products to RfqProduct and QuotationProduct
        // foreach ($request->product_name as $key => $productName) {
        //     RfqProduct::create([
        //         'rfq_id'       => $rfq_id,
        //         'product_name' => $productName,
        //         'qty'          => $request->qty[$key],
        //         'created_at'   => now(),
        //     ]);
        //     QuotationProduct::create([
        //         'rfq_id'       => $rfq_id,
        //         'product_name' => $productName,
        //         'qty'          => $request->qty[$key],
        //         'created_at'   => now(),
        //     ]);
        // }
        foreach ($request->contacts as $contact) {
            $productName = $contact['product_name'] ?? null;
            $qty = $contact['qty'] ?? null;

            if ($productName && $qty) {
                RfqProduct::create([
                    'rfq_id'       => $rfq_id,
                    'product_name' => $productName,
                    'qty'          => $qty,
                    'created_at'   => now(),
                ]);

                QuotationProduct::create([
                    'rfq_id'       => $rfq_id,
                    'product_name' => $productName,
                    'qty'          => $qty,
                    'created_at'   => now(),
                ]);
            }
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

        $rfq = RFQ::with('rfqProducts')->where('id', $rfq_id)->first();

        $data = [
            'name'                      => $rfq->name,
            'product_names'             => $rfq->rfqProducts,
            'phone'                     => $rfq->phone,
            'qty'                       => $rfq->qty,
            'company_name'              => $rfq->company_name,
            'address'                   => $rfq->address,
            'message'                   => $rfq->message,
            'rfq_code'                  => $rfq->rfq_code,
            'email'                     => $rfq->email,
            'country'                   => $rfq->country,
            'shipping_name'             => $rfq->shipping_name,
            'shipping_email'            => $rfq->shipping_email,
            'shipping_phone'            => $rfq->shipping_phone,
            'shipping_company_name'     => $rfq->shipping_company_name,
            'shipping_designation'      => $rfq->shipping_designation,
            'shipping_address'          => $rfq->shipping_address,
            'shipping_country'          => $rfq->shipping_country,
            'shipping_city'             => $rfq->shipping_city,
            'shipping_zip_code'         => $rfq->shipping_zip_code,
            'end_user_name'             => $rfq->end_user_name,
            'end_user_email'            => $rfq->end_user_email,
            'end_user_phone'            => $rfq->end_user_phone,
            'end_user_company_name'     => $rfq->end_user_company_name,
            'end_user_designation'      => $rfq->end_user_designation,
            'end_user_address'          => $rfq->end_user_address,
            'end_user_country'          => $rfq->end_user_country,
            'end_user_city'             => $rfq->end_user_city,
            'end_user_zip_code'         => $rfq->end_user_zip_code,
            'project_name'              => $rfq->project_name,
            'project_status'            => $rfq->project_status,
            'approximate_delivery_time' => $rfq->approximate_delivery_time,
            'budget'                    => $rfq->budget,
            'link'                      => route('single-rfq.show', $rfq->rfq_code),
        ];
        $rfq_code = $rfq->rfq_code;

        try {
            // Mail::to($request->email)->send(new RFQNotificationClientMail($data));
            if ($client_type = 'anonymous') {
                foreach ($user_emails as $email) {
                    Mail::to($email)->send(new RFQConfirmationMail($data, $rfq_code));
                }
            } else {
                $user_emails = User::where(function ($query) {
                    $query->whereJsonContains('department', 'business')
                        ->orWhereJsonContains('department', 'logistics');
                })->whereIn('role', ['admin', 'manager'])
                    ->pluck('email')
                    ->toArray();

                foreach ($user_emails as $email) {
                    Mail::to($email)->send(new RFQNotificationAdminMail($data, $rfq->rfq_code));
                }
            }
        } catch (\Exception $e) {
            // Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
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
                    File::delete(public_path($uploadPath . '/') . $rfq->image);
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
                    'project_status'            => $request->project_status,
                    'approximate_delivery_time' => $request->approximate_delivery_time,
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

        $rfq = RFQ::with('rfqProducts', 'quotationProducts')->find($id);
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

    public function AssignSalesMan(Request $request, $id)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'account_type' => 'required|string',
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:clients',
            'phone'        => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
        ], [
            'account_type.required' => 'The Register As field is required.',
            'name.required'         => 'The name field is required.',
            'email.required'        => 'The email field is required.',
            'phone.required'        => 'The phone field is required.',
            'name.string'           => 'The name must be a string.',
            'email.email'           => 'The email must be a valid email.',
            'name.max'              => 'The name may not be greater than :max characters.',
            'email.unique'          => 'This email has already been taken.',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message);
            }
            return redirect()->back()->withInput();
        }
        // dd($request->all());
        // Fetch the RFQ
        $rfq = Rfq::where('rfq_code', $id)->firstOrFail();

        // Determine product name
        $product_name = $rfq->product_id
            ? Product::where('id', $rfq->product_id)->value('name')
            : RfqProduct::where('rfq_id', $rfq->id)->value('product_name');

        // Prepare sales manager data
        $salesManagers = [
            'sales_man_id_L1' => null,
            'sales_man_id_T1' => null,
            'sales_man_id_T2' => null,
        ];
        $salesManagerNames = ['L1' => '', 'T1' => '', 'T2' => ''];
        $userEmails = [];

        foreach ($salesManagers as $key => $value) {
            if (!empty($request->$key)) {
                $user = User::find($request->$key);
                if ($user) {
                    $salesManagers[$key] = $user->id;
                    $salesManagerNames[substr($key, -2)] = $user->name;
                    $userEmails[] = $user->email;
                }
            }
        }

        // Assign sales managers and update RFQ
        $rfq->update([
            'sales_man_id_L1' => $salesManagers['sales_man_id_L1'],
            'sales_man_id_T1' => $salesManagers['sales_man_id_T1'],
            'sales_man_id_T2' => $salesManagers['sales_man_id_T2'],
            'status'          => 'assigned',
        ]);

        // Notify all users (you may filter by role if needed)
        $allUsers = User::all();
        Notification::send($allUsers, new RfqAssign(
            $salesManagerNames['L1'],
            $salesManagerNames['T1'],
            $salesManagerNames['T2'],
            $rfq->rfq_code
        ));

        // Send RFQ assignment email
        try {
            Mail::to($userEmails)->send(new RfqAssigned([
                'name'         => $rfq->name,
                'product_name' => $product_name,
                'phone'        => $rfq->phone,
                'qty'          => $rfq->qty,
                'company_name' => $rfq->company_name,
                'address'      => $rfq->address,
                'message'      => $rfq->message,
                'rfq_code'     => $rfq->rfq_code,
                'email'        => $rfq->email,
            ]));
            Toastr::success('Mail has been sent successfully.');
        } catch (\Exception $e) {
            Toastr::error('Failed to send email. Please try again later.', 'Error', ['timeOut' => 30000]);
        }

        // Generate password (if not provided)
        $firstName = explode(' ', trim($request->name))[0] ?? 'User';
        $phone = $request->phone ?? rand(1000, 9999);
        $password = $request->password ?? ($firstName . $phone);

        // Create client
        $client = Client::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'company_name' => $request->company_name,
            'password'     => Hash::make($password),
            'user_type'    => $request->account_type,
        ]);

        // Update RFQ client type
        $rfq->update([
            'client_type' => $request->account_type,
        ]);

        // Send account creation email
        try {
            Mail::to($client->email)->send(new AccountCreateMail([
                'name'      => $client->name,
                'email'     => $client->email,
                'phone'     => $client->phone,
                'password'  => $password,
                'user_type' => $client->user_type,
            ]));
            Toastr::success('Account creation mail has been sent successfully.');
        } catch (\Exception $e) {
            Toastr::error('Failed to send account creation mail.', 'Error', ['timeOut' => 30000]);
        }

        Toastr::success('Salesman assigned and account created successfully.');
        return redirect()->route('single-rfq.quoation_mail', $rfq->rfq_code);
    }

    public function AssignSalesManager(Request $request, $id)
    {

        try {
            $rfq = Rfq::where('rfq_code', $id)->firstOrFail();
            // Prepare sales manager data
            $salesManagers = [
                'sales_man_id_L1' => $request->sales_man_id_L1,
                'sales_man_id_T1' => $request->sales_man_id_T1,
                'sales_man_id_T2' => $request->sales_man_id_T2,
            ];
            $salesManagerNames = ['L1' => '', 'T1' => '', 'T2' => ''];
            $userEmails = [];

            foreach ($salesManagers as $key => $value) {
                if (!empty($request->$key)) {
                    $user = User::find($request->$key);
                    if ($user) {
                        $salesManagers[$key] = $user->id;
                        $salesManagerNames[substr($key, -2)] = $user->name;
                        $userEmails[] = $user->email;
                    }
                }
            }
            // Send RFQ assignment email
            try {
                $data = [
                    'name'                  => $rfq->name,
                    'product_names'         => $rfq->rfqProducts,
                    'phone'                 => $rfq->phone,
                    'qty'                   => $rfq->qty,
                    'company_name'          => $rfq->company_name,
                    'address'               => $rfq->address,
                    'message'               => $rfq->message,
                    'rfq_code'              => $rfq->rfq_code,
                    'email'                 => $rfq->email,
                    'country'               => $rfq->country,
                    'shipping_name'         => $rfq->shipping_name,
                    'shipping_email'        => $rfq->shipping_email,
                    'shipping_phone'        => $rfq->shipping_phone,
                    'shipping_company_name' => $rfq->shipping_company_name,
                    'shipping_designation'  => $rfq->shipping_designation,
                    'shipping_address'      => $rfq->shipping_address,
                    'shipping_country'      => $rfq->shipping_country,
                    'shipping_city'         => $rfq->shipping_city,
                    'shipping_zip_code'     => $rfq->shipping_zip_code,
                    'end_user_name'         => $rfq->end_user_name,
                    'end_user_email'        => $rfq->end_user_email,
                    'end_user_phone'        => $rfq->end_user_phone,
                    'end_user_company_name' => $rfq->end_user_company_name,
                    'end_user_designation'  => $rfq->end_user_designation,
                    'end_user_address'      => $rfq->end_user_address,
                    'end_user_country'      => $rfq->end_user_country,
                    'end_user_city'         => $rfq->end_user_city,
                    'end_user_zip_code'     => $rfq->end_user_zip_code,
                    'project_name'          => $rfq->project_name,
                    'project_status'        => $rfq->project_status,
                    'approximate_delivery_time' => $rfq->approximate_delivery_time,
                    'budget'                => $rfq->budget,
                    'link'                  => route('single-rfq.show', $rfq->rfq_code),
                ];
                Mail::to($userEmails)->send(new RfqAssigned($data));
                Toastr::success('Mail has been sent successfully.');
            } catch (\Exception $e) {
                Toastr::error('Email sending failed: ' . $e->getMessage());
                return redirect()->back();
            }

            // Assign sales managers and update RFQ
            $rfq->update([
                'sales_man_id_L1' => $salesManagers['sales_man_id_L1'],
                'sales_man_id_T1' => $salesManagers['sales_man_id_T1'],
                'sales_man_id_T2' => $salesManagers['sales_man_id_T2'],
                'status'          => 'assigned',
            ]);

            // Notify all users (you may filter by role if needed)
            $allUsers = User::all();
            Notification::send($allUsers, new RfqAssign(
                $salesManagerNames['L1'],
                $salesManagerNames['T1'],
                $salesManagerNames['T2'],
                $rfq->rfq_code
            ));

            Toastr::success('Salesman assigned successfully.');
            return redirect()->route('single-rfq.quoation_mail', $rfq->rfq_code);
        } catch (\Exception $e) {
            Toastr::error('Error Occured: ' . $e->getMessage());
            return redirect()->back();
        }
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

    // public function rfqApprove($id)
    // {
    //     $rfq = RFQ::with('rfqProducts')->where('rfq_code', $id)->first();

    //     if (!$rfq) {
    //         Session::flash('error', 'This RFQ has been rejected already by an admin.');
    //         return redirect()->route('admin.rfq.index');
    //     } else {
    //         if ($rfq->confirmation == 'approved') {
    //             return redirect()->route('admin.rfq.index');
    //         } else {
    //             $users = User::whereJsonContains('department', ['business', 'logistics'])->get();
    //             $user_emails = User::whereJsonContains('department', ['business'])
    //                 ->where(function ($query) {
    //                     $query->where('role', 'manager')
    //                         ->orWhere('role', 'admin');
    //                 })
    //                 ->pluck('email')
    //                 ->toArray();

    //             Notification::send($users, new RfqCreate($rfq->name, $rfq->rfq_code));

    //             $data = [
    //                 'name'          => $rfq->name,
    //                 'product_names' => $rfq->rfqProducts,
    //                 'phone'         => $rfq->phone,
    //                 'qty'           => $rfq->qty,
    //                 'company_name'  => $rfq->company_name,
    //                 'address'       => $rfq->address,
    //                 'message'       => $rfq->message,
    //                 'rfq_code'      => $rfq->rfq_code,
    //                 'email'         => $rfq->email,
    //                 'country'       => $rfq->country,
    //                 'link'          => route('single-rfq.show', $rfq->rfq_code),
    //             ];

    //             try {
    //                 $rfq->update(['confirmation' => 'approved']);
    //                 Mail::to($rfq->email)->send(new RFQNotificationClientMail($data));
    //                 sleep(1); // Delay in seconds
    //                 foreach ($user_emails as $email) {
    //                     Mail::to($email)->send(new RFQNotificationAdminMail($data));
    //                     sleep(1);
    //                 }
    //             } catch (\Exception $e) {
    //                 Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
    //                 Session::flash('error', 'Email sending failed: ' . $e->getMessage());
    //             }
    //             Session::flash('success', 'RFQ has been approved successfully.');
    //         }
    //     }
    //     return redirect()->route('admin.rfq.index');
    // }

    public function rfqApprove($id)
    {
        $rfq = RFQ::with('rfqProducts')->where('rfq_code', $id)->first();

        if (!$rfq) {
            Session::flash('error', 'This RFQ has been rejected already by an admin.');
            return redirect()->route('admin.rfq.index');
        }

        if ($rfq->confirmation == 'approved') {
            Session::flash('info', 'This RFQ is already approved by an admin.');
            return redirect()->route('admin.rfq.index');
        }

        // Get users and emails
        $users = User::whereJsonContains('department', ['business', 'logistics'])->get();
        $user_emails = User::whereJsonContains('department', ['business', 'logistics'])
            ->whereIn('role', ['manager', 'admin'])
            ->pluck('email')
            ->toArray();

        // Send internal notification
        Notification::send($users, new RfqCreate($rfq->name, $rfq->rfq_code));
        // Email data
        $data = [
            'name'                  => $rfq->name,
            'product_names'         => $rfq->rfqProducts,
            'phone'                 => $rfq->phone,
            'qty'                   => $rfq->qty,
            'company_name'          => $rfq->company_name,
            'address'               => $rfq->address,
            'message'               => $rfq->message,
            'rfq_code'              => $rfq->rfq_code,
            'email'                 => $rfq->email,
            'country'               => $rfq->country,
            'shipping_name'         => $rfq->shipping_name,
            'shipping_email'        => $rfq->shipping_email,
            'shipping_phone'        => $rfq->shipping_phone,
            'shipping_company_name' => $rfq->shipping_company_name,
            'shipping_designation'  => $rfq->shipping_designation,
            'shipping_address'      => $rfq->shipping_address,
            'shipping_country'      => $rfq->shipping_country,
            'shipping_city'         => $rfq->shipping_city,
            'shipping_zip_code'     => $rfq->shipping_zip_code,
            'end_user_name'         => $rfq->end_user_name,
            'end_user_email'        => $rfq->end_user_email,
            'end_user_phone'        => $rfq->end_user_phone,
            'end_user_company_name' => $rfq->end_user_company_name,
            'end_user_designation'  => $rfq->end_user_designation,
            'end_user_address'      => $rfq->end_user_address,
            'end_user_country'      => $rfq->end_user_country,
            'end_user_city'         => $rfq->end_user_city,
            'end_user_zip_code'     => $rfq->end_user_zip_code,
            'project_name'          => $rfq->project_name,
            'project_status'        => $rfq->project_status,
            'approximate_delivery_time' => $rfq->approximate_delivery_time,
            'budget'                => $rfq->budget,
            'link'                  => route('single-rfq.show', $rfq->rfq_code),
        ];
        try {
            $rfq->update(['confirmation' => 'approved']);
            // Email client
            Mail::to($rfq->email)->send(new RFQNotificationClientMail($data));
            // Email admins (you should ideally queue this)
            foreach ($user_emails as $email) {
                Mail::to($email)->send(new RFQNotificationAdminMail($data, $rfq->rfq_code));
            }
            Session::flash('success', 'RFQ has been approved successfully.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            Session::flash('error', 'RFQ approved, but email sending failed.');
        }
        return redirect()->route('admin.rfq.index');
    }

    public function rfqReject($id)
    {
        $rfq = RFQ::with('rfqProducts', 'quotationProducts')->where('rfq_code', $id)->first();

        if (!$rfq) {
            Session::flash('error', 'RFQ has been rejected already.');
            return redirect()->route('admin.rfq.index');
        }

        if ($rfq->confirmation == 'approved') {
            Session::flash('warning', 'This RFQ has been approved by an admin already.');
            return redirect()->route('admin.rfq.index');
        }

        $rfq->delete();
        Session::flash('success', 'RFQ has been rejected successfully.');
        return redirect()->route('admin.rfq.index');
    }
}
