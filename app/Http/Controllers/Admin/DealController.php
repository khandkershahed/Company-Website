<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Exception;
use App\Models\User;
use App\Models\Admin\Rfq;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Models\Partner\Partner;
use Illuminate\Validation\Rule;
use App\Models\Admin\RfqProduct;
use App\Notifications\RfqCreate;
use App\Mail\RFQConfirmationMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\RFQNotificationAdminMail;
use App\Models\Admin\QuotationProduct;
use App\Mail\DealNotificationAdminMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class DealController extends Controller
{

    public function index()
    {
        $data['deals'] = Rfq::where('rfq_type', 'deal')->latest('id')->get();
        return view('metronic.pages.deal.index', $data);
    }

    public function create()
    {
        $data['users'] = User::whereJsonContains('department', 'business')->orderBy('id', 'DESC')->get(['id', 'name']);
        return view('metronic.pages.deal.create', $data);
    }

    public function quickDealStore(Request $request)
    {
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
        $client = Client::where('email', trim($request->email))->first();
        if ($client) {
            if ($client->user_type === 'job_seeker') {
                $client->delete();
            } elseif (in_array(trim(strtolower($client->user_type)), ['client', 'partner'])) {
                $client_type = $client->user_type;
            }
        }
        $imagePath = null;

        $files = [
            'image'  => $request->client_image,
        ];
        $uploadedFiles = [];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'rfq/' . $key;
                $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }
        $imagePath = $uploadedFiles['image']['status']  == 1 ? $uploadedFiles['image']['file_path'] : null;

        // Save RFQ
        $rfq_id = RFQ::insertGetId([
            'rfq_code'        => $rfq_code,
            'sales_man_id_L1' => Auth::user()->id,
            'client_id'       => $request->client_id ?? $client->id ?? null,
            'client_type'     => $client_type,
            'name'            => $request->name,
            'email'           => $request->email,
            'phone'           => $request->phone,
            'company_name'    => $request->company_name,
            'designation'     => $request->designation,
            'address'         => $request->address,
            'country'         => $request->country,
            'create_date'     => now(),
            'message'         => $request->message,
            'image'           => $imagePath,
            'status'          => 'rfq_created',
            'deal_type'       => 'new',
            'rfq_type'        => 'deal',
            'created_at'      => now(),
        ]);
        Toastr::success('Deal is saved to draft successfully');
        Session::flash('success', 'Deal is saved to draft successfully');
        return redirect()->back();
    }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'name'                   => 'required',
    //             'email'                  => 'required|email:rfc,dns',
    //             'image'                  => 'file|mimes:jpeg,png,jpg|max:2048',
    //             'country'                => 'required',
    //             'contacts'                => 'required|array|min:1',
    //             'contacts.*.product_name' => 'required|string',
    //             'contacts.*.qty'          => 'required|integer|min:1',
    //         ],
    //         [
    //             'required'                         => 'The :attribute field is required.',
    //             'mimes'                            => 'The :attribute must be a file of type:jpeg,png,jpg.',
    //             'email'                            => 'The :attribute must be a valid email address.',
    //             'unique'                           => 'The :attribute must be unique.',
    //             'contacts.*.product_name.required' => 'Each product must have a name.',
    //             'contacts.*.qty.required'          => 'Each product must have a quantity.',
    //             'contacts.*.qty.integer'           => 'Quantity must be a number.',
    //             'contacts.*.qty.min'               => 'Quantity must be at least 1.',
    //         ]
    //     );
    //     // dd($request->contacts);
    //     if ($validator->fails()) {
    //         foreach ($validator->messages()->all() as $message) {
    //             Toastr::error($message, 'Failed', ['timeOut' => 30000]);
    //             Session::flash('error', $message);
    //         }
    //         return redirect()->back()->withInput();
    //     }
    //     $userIp = $request->ip();

    //     $lastRequestTime = session("last_email_request_{$userIp}");

    //     if ($lastRequestTime && now()->diffInMinutes($lastRequestTime) < 5) {
    //         Toastr::error('You can only send one request every 5 minutes.', 'Failed');
    //         return redirect()->back(); // Block further submissions within the 5-minute window
    //     }
    //     // Generate RFQ Code
    //     $today = now()->format('ymd'); // e.g., "250910"
    //     $lastCode = RFQ::where('rfq_code', 'like', "$today-%")->latest('id')->first();
    //     if ($lastCode) {
    //         $parts = explode('-', $lastCode->rfq_code);
    //         $lastNumber = isset($parts[1]) ? (int)$parts[1] : 0;
    //         $newNumber = $lastNumber + 1;
    //     } else {
    //         $newNumber = 1;
    //     }
    //     $rfq_code = $today . '-' . $newNumber;


    //     // Check for existing client
    //     $client_type = 'anonymous';
    //     $client = Client::where('email', trim($request->email))->first();
    //     if ($client) {
    //         if ($client->user_type === 'job_seeker') {
    //             $client->delete();
    //         } elseif (in_array(trim(strtolower($client->user_type)), ['client', 'partner'])) {
    //             $client_type = $client->user_type;
    //         }
    //     }


    //     // Save RFQ
    //     $rfq_id = RFQ::insertGetId([
    //         'rfq_code'                  => $rfq_code,
    //         'sales_man_id_L1'           => Auth::user()->id,
    //         'sales_man_id_T1'           => $request->sales_man_id_T1,
    //         'sales_man_id_T2'           => $request->sales_man_id_T2,
    //         'client_id'                 => $request->client_id ?? $client->id ?? null,
    //         'partner_id'                => $request->partner_id,
    //         'product_id'                => $request->product_id,
    //         'solution_id'               => $request->solution_id,
    //         'client_type'               => $client_type,
    //         'name'                      => $request->name,
    //         'email'                     => $request->email,
    //         'phone'                     => $request->phone,
    //         'company_name'              => $request->company_name,
    //         'designation'               => $request->designation,
    //         'address'                   => $request->address,
    //         'country'                   => $request->country,
    //         'create_date'               => now(),
    //         'message'                   => $request->message,
    //         'delivery_location'         => $request->delivery_location,
    //         'budget'                    => $request->budget,
    //         'city'                      => $request->city,
    //         'zip_code'                  => $request->zip_code,
    //         'is_reseller'               => $request->is_reseller,
    //         'shipping_name'             => ($request->is_contact_address          == '1') ? $request->name        : $request->shipping_name,
    //         'shipping_email'            => ($request->is_contact_address          == '1') ? $request->email       : $request->shipping_email,
    //         'shipping_phone'            => ($request->is_contact_address          == '1') ? $request->phone       : $request->shipping_phone,
    //         'shipping_company_name'     => ($request->is_contact_address          == '1') ? $request->company_name : $request->shipping_company_name,
    //         'shipping_designation'      => ($request->is_contact_address          == '1') ? $request->designation : $request->shipping_designation,
    //         'shipping_address'          => ($request->is_contact_address          == '1') ? $request->address     : $request->shipping_address,
    //         'shipping_country'          => ($request->is_contact_address          == '1') ? $request->country     : $request->shipping_country,
    //         'shipping_city'             => ($request->is_contact_address          == '1') ? $request->city        : $request->shipping_city,
    //         'shipping_zip_code'         => ($request->is_contact_address          == '1') ? $request->zip_code    : $request->shipping_zip_code,
    //         'end_user_name'             => ($request->end_user_is_contact_address == '1') ? $request->name        : $request->end_user_name,
    //         'end_user_email'            => ($request->end_user_is_contact_address == '1') ? $request->email       : $request->end_user_email,
    //         'end_user_phone'            => ($request->end_user_is_contact_address == '1') ? $request->phone       : $request->end_user_phone,
    //         'end_user_company_name'     => ($request->end_user_is_contact_address == '1') ? $request->company_name : $request->end_user_company_name,
    //         'end_user_designation'      => ($request->end_user_is_contact_address == '1') ? $request->designation : $request->end_user_designation,
    //         'end_user_address'          => ($request->end_user_is_contact_address == '1') ? $request->address     : $request->end_user_address,
    //         'end_user_country'          => ($request->end_user_is_contact_address == '1') ? $request->country     : $request->end_user_country,
    //         'end_user_city'             => ($request->end_user_is_contact_address == '1') ? $request->city        : $request->end_user_city,
    //         'end_user_zip_code'         => ($request->end_user_is_contact_address == '1') ? $request->zip_code    : $request->end_user_zip_code,
    //         'project_name'              => $request->project_name,
    //         'project_status'            => $request->project_status,
    //         'approximate_delivery_time' => $request->approximate_delivery_time,
    //         // 'image'                  => $imagePath['status']                   == 1 ? $imagePath['file_name']  : null,
    //         'status'                    => 'rfq_created',
    //         'deal_type'                 => 'new',
    //         'created_at'                => now(),
    //     ]);

    //     foreach ($request->contacts as $contact) {
    //         $productName = $contact['product_name'] ?? null;
    //         $qty = $contact['qty'] ?? null;

    //         if (!$productName || !$qty) {
    //             continue;
    //         }

    //         $image = $contact['image'] ?? null;
    //         $imagePath = null;

    //         $files = [
    //             'image'  => $image,
    //         ];
    //         $uploadedFiles = [];

    //         foreach ($files as $key => $file) {
    //             if (!empty($file)) {
    //                 $filePath = 'rfq_products/' . $key;
    //                 $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
    //                 if ($uploadedFiles[$key]['status'] === 0) {
    //                     return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
    //                 }
    //             } else {
    //                 $uploadedFiles[$key] = ['status' => 0];
    //             }
    //         }
    //         $imagePath = $uploadedFiles['image']['status']  == 1 ? $uploadedFiles['image']['file_path'] : null;


    //         $data = [
    //             'rfq_id'                  => $rfq_id,
    //             'sku_no'                  => $contact['sku_no'] ?? null,
    //             'model_no'                => $contact['model_no'] ?? null,
    //             'brand_name'              => $contact['brand_name'] ?? null,
    //             'additional_qty'          => $contact['additional_qty'] ?? null,
    //             'additional_product_name' => $contact['additional_product_name'] ?? null,
    //             'product_des'             => $contact['product_des'] ?? null,
    //             'additional_info'         => $contact['additional_info'] ?? null,
    //             'product_name'            => $productName,
    //             'qty'                     => $qty,
    //             'image'                   => $imagePath,
    //             'created_at'              => now(),
    //         ];

    //         RfqProduct::create($data);
    //         QuotationProduct::create($data);
    //     }


    //     // Notify users and send emails
    //     $name = $request->name;
    //     $user_emails = User::where(function ($query) {
    //         $query->whereJsonContains('department', 'business')
    //             ->orWhereJsonContains('department', 'logistics');
    //     })->where('role', 'admin')->pluck('email')->toArray();

    //     Notification::send(
    //         User::whereIn('email', $user_emails)->get(),
    //         new RfqCreate($name, $rfq_code)
    //     );

    //     $rfq = RFQ::with('rfqProducts')->where('id', $rfq_id)->first();

    //     $data = [
    //         'name'                      => $rfq->name,
    //         'product_names'             => $rfq->rfqProducts,
    //         'phone'                     => $rfq->phone,
    //         'qty'                       => $rfq->qty,
    //         'company_name'              => $rfq->company_name,
    //         'address'                   => $rfq->address,
    //         'message'                   => $rfq->message,
    //         'rfq_code'                  => $rfq->rfq_code,
    //         'email'                     => $rfq->email,
    //         'country'                   => $rfq->country,
    //         'shipping_name'             => $rfq->shipping_name,
    //         'shipping_email'            => $rfq->shipping_email,
    //         'shipping_phone'            => $rfq->shipping_phone,
    //         'shipping_company_name'     => $rfq->shipping_company_name,
    //         'shipping_designation'      => $rfq->shipping_designation,
    //         'shipping_address'          => $rfq->shipping_address,
    //         'shipping_country'          => $rfq->shipping_country,
    //         'shipping_city'             => $rfq->shipping_city,
    //         'shipping_zip_code'         => $rfq->shipping_zip_code,
    //         'end_user_name'             => $rfq->end_user_name,
    //         'end_user_email'            => $rfq->end_user_email,
    //         'end_user_phone'            => $rfq->end_user_phone,
    //         'end_user_company_name'     => $rfq->end_user_company_name,
    //         'end_user_designation'      => $rfq->end_user_designation,
    //         'end_user_address'          => $rfq->end_user_address,
    //         'end_user_country'          => $rfq->end_user_country,
    //         'end_user_city'             => $rfq->end_user_city,
    //         'end_user_zip_code'         => $rfq->end_user_zip_code,
    //         'project_name'              => $rfq->project_name,
    //         'project_status'            => $rfq->project_status,
    //         'approximate_delivery_time' => $rfq->approximate_delivery_time,
    //         'budget'                    => $rfq->budget,
    //         'link'                      => route('single-rfq.show', $rfq->rfq_code),
    //     ];
    //     $rfq_code = $rfq->rfq_code;

    //     try {
    //         // Mail::to($request->email)->send(new RFQNotificationClientMail($data));
    //         $user_emails = User::where(function ($query) {
    //             $query->whereJsonContains('department', 'business')
    //                 ->orWhereJsonContains('department', 'logistics');
    //         })->whereIn('role', ['admin', 'manager'])
    //             ->pluck('email')
    //             ->toArray();

    //         foreach ($user_emails as $email) {
    //             Mail::to($email)->send(new RFQNotificationAdminMail($data, $rfq->rfq_code));
    //         }
    //     } catch (\Exception $e) {
    //         // Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
    //         Toastr::error('There was an error sending the email.', 'Error');
    //     }

    //     Cart::destroy();
    //     Toastr::success('Your RFQ has been created successfully.');
    //     return redirect()->route('admin.rfq.index');
    // }

    public function store(Request $request)
    {
        // Check if this is a draft submission
        $is_draft = $request->input('is_draft') == '1';

        // --- 1. VALIDATION ---
        if (!$is_draft) {
            // Only run validation if it's NOT a draft
            $validator = Validator::make(
                $request->all(),
                [
                    'name'                  => 'required',
                    'email'                 => 'required|email:rfc,dns',
                    'country'               => 'required',
                    'contacts'              => 'required|array|min:1',
                    'contacts.*.product_name' => 'required|string',
                    'contacts.*.qty'        => 'required|integer|min:1',
                    'contacts.*.image'      => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Rule for image inside repeater
                ],
                [
                    'required'                       => 'The :attribute field is required.',
                    'mimes'                          => 'The :attribute must be a file of type:jpeg,png,jpg.',
                    'email'                          => 'The :attribute must be a valid email address.',
                    'unique'                         => 'The :attribute must be unique.',
                    'contacts.*.product_name.required' => 'Each product must have a name.',
                    'contacts.*.qty.required'        => 'Each product must have a quantity.',
                    'contacts.*.qty.integer'         => 'Quantity must be a number.',
                    'contacts.*.qty.min'             => 'Quantity must be at least 1.',
                    'contacts.*.image.mimes'         => 'The product image must be a file of type: jpeg, png, jpg.',
                    'contacts.*.image.max'           => 'The product image may not be greater than 2048 kilobytes.',
                ]
            );

            if ($validator->fails()) {
                foreach ($validator->messages()->all() as $message) {
                    Toastr::error($message, 'Failed', ['timeOut' => 30000]);
                    Session::flash('error', $message);
                }
                return redirect()->back()->withInput();
            }

            // --- 2. RATE LIMITING (Only for final submit) ---
            $userIp = $request->ip();
            $lastRequestTime = session("last_email_request_{$userIp}");

            if ($lastRequestTime && now()->diffInMinutes($lastRequestTime) < 5) {
                Toastr::error('You can only send one request every 5 minutes.', 'Failed');
                return redirect()->back(); // Block further submissions within the 5-minute window
            }
        }

        // --- 3. RFQ CODE (Always generate) ---
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

        // --- 4. CLIENT CHECK (Always check) ---
        $client_type = 'anonymous';
        $client = Client::where('email', trim($request->email))->first();
        if ($client) {
            if ($client->user_type === 'job_seeker') {
                $client->delete();
            } elseif (in_array(trim(strtolower($client->user_type)), ['client', 'partner'])) {
                $client_type = $client->user_type;
            }
        }

        // --- 5. SAVE RFQ (Set status based on draft) ---
        $rfq_status = $is_draft ? 'deal' : 'rfq_created'; // ✅ Set status
        $files = [
            'image' => $request->file('tender_image'),
        ];
        $uploadedFiles = [];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'rfq/' . $key;
                $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }
        $rfq_id = RFQ::insertGetId([
            'rfq_code'              => $rfq_code,
            'sales_man_id_L1'       => Auth::user()->id,
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
            'shipping_name'         => ($request->is_contact_address      == '1') ? $request->name         : $request->shipping_name,
            'shipping_email'        => ($request->is_contact_address      == '1') ? $request->email        : $request->shipping_email,
            'shipping_phone'        => ($request->is_contact_address      == '1') ? $request->phone        : $request->shipping_phone,
            'shipping_company_name' => ($request->is_contact_address      == '1') ? $request->company_name : $request->shipping_company_name,
            'shipping_designation'  => ($request->is_contact_address      == '1') ? $request->designation  : $request->shipping_designation,
            'shipping_address'      => ($request->is_contact_address      == '1') ? $request->address      : $request->shipping_address,
            'shipping_country'      => ($request->is_contact_address      == '1') ? $request->country      : $request->shipping_country,
            'shipping_city'         => ($request->is_contact_address      == '1') ? $request->city         : $request->shipping_city,
            'shipping_zip_code'     => ($request->is_contact_address      == '1') ? $request->zip_code     : $request->shipping_zip_code,
            'end_user_name'         => ($request->end_user_is_contact_address == '1') ? $request->name         : $request->end_user_name,
            'end_user_email'        => ($request->end_user_is_contact_address == '1') ? $request->email        : $request->end_user_email,
            'end_user_phone'        => ($request->end_user_is_contact_address == '1') ? $request->phone        : $request->end_user_phone,
            'end_user_company_name' => ($request->end_user_is_contact_address == '1') ? $request->company_name : $request->end_user_company_name,
            'end_user_designation'  => ($request->end_user_is_contact_address == '1') ? $request->designation  : $request->end_user_designation,
            'end_user_address'      => ($request->end_user_is_contact_address == '1') ? $request->address      : $request->end_user_address,
            'end_user_country'      => ($request->end_user_is_contact_address == '1') ? $request->country      : $request->end_user_country,
            'end_user_city'         => ($request->end_user_is_contact_address == '1') ? $request->city         : $request->end_user_city,
            'end_user_zip_code'     => ($request->end_user_is_contact_address == '1') ? $request->zip_code     : $request->end_user_zip_code,
            'project_name'          => $request->project_name,
            'project_status'        => $request->project_status,
            'approximate_delivery_time' => $request->approximate_delivery_time,
            'image'                 => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
            'status'                => $rfq_status, // ✅ Use dynamic status
            'deal_creator_id'       => Auth::user()->id, // ✅ Use dynamic status
            'deal_type'             => 'new',
            'created_at'            => now(),
        ]);

        // --- 6. SAVE PRODUCTS (Always save) ---
        if ($request->has('contacts')) { // Check if contacts array exists
            foreach ($request->contacts as $contact) {
                $productName = $contact['product_name'] ?? null;
                $qty = $contact['qty'] ?? null;

                // This check will skip empty draft rows
                if (!$productName || !$qty) {
                    continue;
                }

                $image = $contact['image'] ?? null;
                $imagePath = null;

                $files = [
                    'image'  => $image,
                ];
                $uploadedFiles = [];

                foreach ($files as $key => $file) {
                    if (!empty($file)) {
                        $filePath = 'rfq_products/' . $key;
                        $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
                        if ($uploadedFiles[$key]['status'] === 0) {
                            return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                        }
                    } else {
                        $uploadedFiles[$key] = ['status' => 0];
                    }
                }
                $imagePath = $uploadedFiles['image']['status']  == 1 ? $uploadedFiles['image']['file_path'] : null;


                $data = [
                    'rfq_id'                  => $rfq_id,
                    'sku_no'                  => $contact['sku_no'] ?? null,
                    'model_no'                => $contact['model_no'] ?? null,
                    'brand_name'              => $contact['brand_name'] ?? null,
                    'additional_qty'          => $contact['additional_qty'] ?? null,
                    'additional_product_name' => $contact['additional_product_name'] ?? null,
                    'product_des'             => $contact['product_des'] ?? null,
                    'additional_info'         => $contact['additional_info'] ?? null,
                    'product_name'            => $productName,
                    'qty'                     => $qty,
                    'image'                   => $imagePath,
                    'created_at'              => now(),
                ];

                RfqProduct::create($data);
                QuotationProduct::create($data);
            }
        }


        // --- 7. NOTIFICATIONS & EMAILS (Only for final submit) ---
        if (!$is_draft) {
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
            $deal_creator = User::where('id', $rfq->deal_creator_id)->value('name');
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
                'deal_creator'              => $deal_creator,
                'link'                      => route('single-rfq.show', $rfq->rfq_code),
            ];
            $rfq_code = $rfq->rfq_code;

            try {
                // Mail::to($request->email)->send(new RFQNotificationClientMail($data));
                $user_emails = User::where(function ($query) {
                    $query->whereJsonContains('department', 'business')
                        ->orWhereJsonContains('department', 'logistics');
                })->whereIn('role', ['admin', 'manager'])
                    ->pluck('email')
                    ->toArray();

                foreach ($user_emails as $email) {
                    Mail::to($email)->send(new DealNotificationAdminMail($data, $deal_creator));
                }
            } catch (Exception $e) {
                // Log::error('Email sending failed: ' . $e->getMessage()); // Log the error for debugging
                Toastr::error('There was an error sending the email.', 'Error');
            }
        }

        // --- 8. REDIRECT ---
        Cart::destroy();

        if ($is_draft) {
            Toastr::success('Your RFQ has been saved as a draft.');
            return redirect()->route('deal.index');
        } else {
            Toastr::success('Your RFQ has been created successfully.');
            return redirect()->route('admin.rfq.index');
        }

        // Redirect to index for both cases
    }

    /**
     * ✅ NEW METHOD
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rfq = RFQ::with('rfqProducts')->findOrFail($id);
        return view('metronic.pages.deal.edit', compact('rfq'));
    }


    public function update(Request $request, $id)
    {
        // --- 1️⃣ FIND EXISTING RFQ ---
        $rfq = RFQ::findOrFail($id);
        $is_draft = $request->input('is_draft') == '1';

        // --- 2️⃣ VALIDATION (only for final submit) ---
        if (!$is_draft) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name'                      => 'required',
                    'email'                     => 'required|email:rfc,dns|unique:rfqs,email,' . $rfq->id,
                    'country'                   => 'required',
                    'contacts'                  => 'required|array|min:1',
                    'contacts.*.product_name'   => 'required|string',
                    'contacts.*.qty'            => 'required|integer|min:1',
                    'contacts.*.image'          => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
                    'phone'                     => 'required',
                    'company_name'              => 'required',
                    'address'                   => 'required',
                    'designation'               => 'required',
                    'city'                      => 'required',
                    'zip_code'                  => 'required',
                ],
                [
                    'required' => 'The :attribute field is required.',
                    'email.unique' => 'This email is already associated with another RFQ.',
                    'contacts.*.product_name.required' => 'Each product must have a name.',
                    'contacts.*.qty.required' => 'Each product must have a quantity.',
                    'contacts.*.qty.integer' => 'Quantity must be a number.',
                    'contacts.*.qty.min' => 'Quantity must be at least 1.',
                    'contacts.*.image.mimes' => 'The product image must be a jpeg, png, or jpg.',
                ]
            );

            if ($validator->fails()) {
                Toastr::error('Validation failed. Please check the form.', 'Error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        // --- 3️⃣ CLIENT CHECK ---
        $client_type = $rfq->client_type;
        $client = Client::where('email', trim($request->email))->first();
        if ($client && in_array(strtolower($client->user_type), ['client', 'partner'])) {
            $client_type = $client->user_type;
        } elseif (!$client) {
            $client_type = 'anonymous';
        }
        $client_id = $client->id ?? null;

        // --- 4️⃣ FILE UPLOAD (tender_image) ---
        $uploadedFiles = [];
        $file = $request->file('tender_image');
        if ($file) {
            $filePath = 'rfq/image';
            $oldFile = $rfq->image ?? null;

            $uploadedFiles['image'] = Helper::imageUpload($file, $filePath);
            if ($uploadedFiles['image']['status'] === 0) {
                return redirect()->back()->with('error', $uploadedFiles['image']['error_message']);
            }

            // Delete old image if replaced
            if ($oldFile) {
                Storage::disk('public')->delete($oldFile);
            }
        }

        // --- 5️⃣ DETERMINE STATUS ---
        $rfq_status = $is_draft ? 'deal' : ($rfq->status === 'deal' ? 'deal' : 'rfq_created');

        // --- 6️⃣ UPDATE RFQ FIELDS ---
        $rfq->update([
            'image'                  => $uploadedFiles['image']['status'] ?? 0 ? $uploadedFiles['image']['file_path'] : $rfq->image,
            'sales_man_id_T1'        => $request->sales_man_id_T1,
            'sales_man_id_T2'        => $request->sales_man_id_T2,
            'client_id'              => $request->client_id ?? $client_id,
            'partner_id'             => $request->partner_id,
            'product_id'             => $request->product_id,
            'solution_id'            => $request->solution_id,
            'client_type'            => $client_type,
            'name'                   => $request->name,
            'email'                  => $request->email,
            'phone'                  => $request->phone,
            'company_name'           => $request->company_name,
            'designation'            => $request->designation,
            'address'                => $request->address,
            'country'                => $request->country,
            'create_date'            => now(),
            'message'                => $request->message,
            'delivery_location'      => $request->delivery_location,
            'budget'                 => $request->budget,
            'city'                   => $request->city,
            'zip_code'               => $request->zip_code,
            'is_reseller'            => $request->is_reseller,
            'shipping_name'          => $request->is_contact_address == '1' ? $request->name : $request->shipping_name,
            'shipping_email'         => $request->is_contact_address == '1' ? $request->email : $request->shipping_email,
            'shipping_phone'         => $request->is_contact_address == '1' ? $request->phone : $request->shipping_phone,
            'shipping_company_name'  => $request->is_contact_address == '1' ? $request->company_name : $request->shipping_company_name,
            'shipping_designation'   => $request->is_contact_address == '1' ? $request->designation : $request->shipping_designation,
            'shipping_address'       => $request->is_contact_address == '1' ? $request->address : $request->shipping_address,
            'shipping_country'       => $request->is_contact_address == '1' ? $request->country : $request->shipping_country,
            'shipping_city'          => $request->is_contact_address == '1' ? $request->city : $request->shipping_city,
            'shipping_zip_code'      => $request->is_contact_address == '1' ? $request->zip_code : $request->shipping_zip_code,
            'end_user_name'          => $request->end_user_is_contact_address == '1' ? $request->name : $request->end_user_name,
            'end_user_email'         => $request->end_user_is_contact_address == '1' ? $request->email : $request->end_user_email,
            'end_user_phone'         => $request->end_user_is_contact_address == '1' ? $request->phone : $request->end_user_phone,
            'end_user_company_name'  => $request->end_user_is_contact_address == '1' ? $request->company_name : $request->end_user_company_name,
            'end_user_designation'   => $request->end_user_is_contact_address == '1' ? $request->designation : $request->end_user_designation,
            'end_user_address'       => $request->end_user_is_contact_address == '1' ? $request->address : $request->end_user_address,
            'end_user_country'       => $request->end_user_is_contact_address == '1' ? $request->country : $request->end_user_country,
            'end_user_city'          => $request->end_user_is_contact_address == '1' ? $request->city : $request->end_user_city,
            'end_user_zip_code'      => $request->end_user_is_contact_address == '1' ? $request->zip_code : $request->end_user_zip_code,
            'project_name'           => $request->project_name,
            'project_status'         => $request->project_status,
            'approximate_delivery_time' => $request->approximate_delivery_time,
            'status'                 => $rfq_status,
            'updated_at'             => now(),
            // Optionally, reassign deal creator if desired:
            // 'deal_creator_id' => Auth::check() ? Auth::id() : $rfq->deal_creator_id,
        ]);

        // --- 7️⃣ PRODUCTS: Delete + Reinsert ---
        $oldImages = $rfq->rfqProducts()->pluck('image')->filter();
        $rfq->rfqProducts()->delete();
        QuotationProduct::where('rfq_id', $rfq->id)->delete();
        $newImagePaths = [];

        if ($request->has('contacts')) {
            foreach ($request->contacts as $contact) {
                $productName = $contact['product_name'] ?? null;
                $qty = $contact['qty'] ?? null;
                if (!$productName || !$qty) continue;

                $image = $contact['image'] ?? null;
                $imagePath = null;

                if ($image) {
                    // $upload = Helper::imageUpload($image, 'rfq_products/image');

                    $uploadedFiles['image'] = Helper::imageUpload($image, 'rfq_products/image');
                    if (($uploadedFiles['image']['status'] ?? 1) === 1) {
                        $imagePath = $uploadedFiles['image']['file_path'];
                        $newImagePaths[] = $imagePath;
                    } else {
                        $msg = $uploadedFiles['image']['error_message'] ?? 'File upload failed.';
                        Toastr::error('Error uploading product image: ' . $msg);
                        return redirect()->back()->withInput();
                    }
                }

                $data = [
                    'rfq_id'                  => $rfq->id,
                    'sku_no'                  => $contact['sku_no'] ?? null,
                    'model_no'                => $contact['model_no'] ?? null,
                    'brand_name'              => $contact['brand_name'] ?? null,
                    'additional_qty'          => $contact['additional_qty'] ?? null,
                    'additional_product_name' => $contact['additional_product_name'] ?? null,
                    'product_des'             => $contact['product_des'] ?? null,
                    'additional_info'         => $contact['additional_info'] ?? null,
                    'product_name'            => $productName,
                    'qty'                     => $qty,
                    'image'                   => $imagePath,
                    'created_at'              => now(),
                    'updated_at'              => now(),
                ];

                RfqProduct::create($data);
                QuotationProduct::create($data);
            }
        }

        // Delete replaced images
        foreach ($oldImages as $oldImage) {
            if (!in_array($oldImage, $newImagePaths) && !empty($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        // --- 8️⃣ OPTIONAL NOTIFICATIONS ---
        if (!$is_draft) {
            Session::forget("last_email_request_{$request->ip()}");
            // Optionally call a helper: Helper::sendRfqNotification($rfq);
        }

        // --- 9️⃣ REDIRECT & TOAST ---
        if ($is_draft) {
            Toastr::success('Deal draft updated successfully.');
            return redirect()->back();
        } else {
            Toastr::success('RFQ updated successfully.');
            return redirect()->route('admin.rfq.index');
        }
    }

    public function destroy($id)
    {

        $rfq = RFQ::with('rfqProducts', 'quotationProducts')->find($id);
        if (File::exists(public_path('storage/') . $rfq->image)) {
            File::delete(public_path('storage/') . $rfq->image);
        }
        $rfq->delete();
    }
}
