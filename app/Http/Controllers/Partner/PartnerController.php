<?php

namespace App\Http\Controllers\Partner;

use Helper;
use Illuminate\Http\Request;
use App\Models\Partner\Partner;
use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use App\Models\Admin\Industry;
use App\Models\Admin\Product;
use App\Models\Admin\Solution;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partners'] = Partner::latest()->get();
        return view('admin.pages.partner.all', $data);
    }

    public function create()
    {
        $data['industries'] = Industry::select('industries.id', 'industries.title')->get();
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['solution_details'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        $data['countries'] = Country::select('countries.id', 'countries.country_name')->get();
        return view('admin.pages.partner.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'name'                     => 'nullable|string',
                'phone'                    => 'nullable|string',
                'email'                    => 'nullable|email',
                'image'                    => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'address'                  => 'nullable|string',
                'city'                     => 'nullable|string',
                'country'                  => 'nullable|string',
                'postal'                   => 'nullable|integer',
                'status'                   => 'nullable|in:active,inactive',
                'company_name'             => 'nullable|string',
                'company_phone_number'     => 'nullable|string',
                'company_logo'             => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'company_url'              => 'nullable|url',
                'company_established_date' => 'nullable|date',
                'company_address'          => 'nullable|string',
                'vat_number'               => 'nullable|string',
                'tax_number'               => 'nullable|string',
                'trade_license_number'     => 'nullable|string',
                'tin_number'               => 'nullable|string',
                'tin'                      => 'sometimes|file|mimes:pdf,docx|max:10000',
                'bin_certificate'          => 'sometimes|file|mimes:pdf,docx|max:10000',
                'trade_license'            => 'sometimes|file|mimes:pdf,docx|max:10000',
                'audit_paper'              => 'sometimes|file|mimes:pdf,docx|max:10000',
                'industry_id_percentage.*'   => 'nullable|integer',
                'product.*'                  => 'nullable|integer',
                'solution.*'                 => 'nullable|integer',
                'working_country.*'          => 'nullable|integer',
                'yearly_revenue'           => 'nullable|numeric',
                'email_verified_at'        => 'nullable|timestamp',
                'password'                 => 'required|string'
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg',
                'file' => 'The :attribute must be a file of type: pdf - docx'
            ],
        );


        if ($validator->passes()) {
            $uploadPath = storage_path('app/public/');

            $fieldsToUpload = ['image', 'company_logo', 'tin', 'bin_certificate', 'trade_license', 'audit_paper'];
            $uploads = [];
            foreach ($fieldsToUpload as $field) {
                if (isset($request->$field)) {
                    $result = Helper::singleUpload($request->$field, $uploadPath);
                    $uploads[$field] = $result['status'] == 1 ? $result['file_name'] : '';
                } else {
                    $uploads[$field] = '';
                }
            }

            Partner::create([
                'name'                     => $request->name,
                'phone'                    => $request->phone,
                'email'                    => $request->email,
                'image'                    => $uploads['image'],
                'address'                  => $request->address,
                'city'                     => $request->city,
                'country'                  => $request->country,
                'postal'                   => $request->postal,
                'status'                   => $request->status,
                'company_name'             => $request->company_name,
                'company_phone_number'     => $request->company_phone_number,
                'company_logo'             => $uploads['company_logo'],
                'company_url'              => $request->company_url,
                'company_established_date' => $request->company_established_date,
                'company_address'          => $request->company_address,
                'vat_number'               => $request->vat_number,
                'tax_number'               => $request->tax_number,
                'trade_license_number'     => $request->trade_license_number,
                'tin_number'               => $request->tin_number,
                'tin'                      => $uploads['tin'],
                'bin_certificate'          => $uploads['bin_certificate'],
                'trade_license'            => $uploads['trade_license'],
                'audit_paper'              => $uploads['audit_paper'],
                'industry_id_percentage'   => $request->industry_id_percentage,
                'product'                  => $request->product,
                'solution'                 => $request->solution,
                'working_country'          => $request->working_country,
                'yearly_revenue'           => $request->yearly_revenue,
                'email_verified_at'        => $request->email_verified_at,
                'password'                 => $request->password,
            ]);

            Toastr::success('Data has been created');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            'industries'       => Industry::pluck('title', 'id'),
            'products'         => Product::pluck('name', 'id'),
            'solution_details' => SolutionDetail::pluck('name', 'id'),
            'countries'        => Country::pluck('country_name', 'id'),
            'partners'         => Partner::findOrFail($id)
        ];

        return view('admin.pages.partner.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'                     => 'nullable|string',
                'phone'                    => 'nullable|string',
                'email'                    => 'nullable|email',
                'image'                    => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'address'                  => 'nullable|string',
                'city'                     => 'nullable|string',
                'country'                  => 'nullable|string',
                'postal'                   => 'nullable|integer',
                'status'                   => 'nullable|in:active,inactive',
                'company_name'             => 'nullable|string',
                'company_phone_number'     => 'nullable|string',
                'company_logo'             => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'company_url'              => 'nullable|url',
                'company_established_date' => 'nullable|date',
                'company_address'          => 'nullable|string',
                'vat_number'               => 'nullable|string',
                'tax_number'               => 'nullable|string',
                'trade_license_number'     => 'nullable|string',
                'tin_number'               => 'nullable|string',
                'tin'                      => 'sometimes|file|mimes:pdf,docx|max:10000',
                'bin_certificate'          => 'sometimes|file|mimes:pdf,docx|max:10000',
                'trade_license'            => 'sometimes|file|mimes:pdf,docx|max:10000',
                'audit_paper'              => 'sometimes|file|mimes:pdf,docx|max:10000',
                'industry_id_percentage.*'   => 'nullable|integer',
                'product.*'                  => 'nullable|integer',
                'solution.*'                 => 'nullable|integer',
                'working_country.*'          => 'nullable|integer',
                'yearly_revenue'           => 'nullable|numeric',
                'email_verified_at'        => 'nullable|timestamp',
                'password'                 => 'required|string'
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg',
                'file' => 'The :attribute must be a file of type: pdf - docx'
            ],
        );


        if ($validator->passes()) {
            $partner = Partner::find($id);

            $uploadPath = storage_path('app/public/');

            $fieldsToUpload = ['image', 'company_logo', 'tin', 'bin_certificate', 'trade_license', 'audit_paper'];
            $uploads = [];
            foreach ($fieldsToUpload as $field) {
                if ($request->has($field)) {
                    $result = Helper::singleUpload($request->$field, $uploadPath);
                    $uploads[$field] = $result['status'] == 1 ? $result['file_name'] : '';
                } else {
                    $uploads[$field] = '';
                }
            }

            $images = ['image', 'company_logo'];

            foreach ($images as $image) {
                if (!empty($partner->$image)) {
                    $deleteMainImagePath = storage_path('app/public/' . $partner->$image);
                    $deleteImagePath = storage_path('app/public/' . $partner->$image);
                    $imagePath = storage_path('app/public/thumb/' . $partner->$image);

                    foreach ([$deleteMainImagePath, $deleteImagePath, $imagePath] as $filePath) {
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                    }
                }
            }

            $documents = ['tin', 'bin_certificate', 'trade_license', 'audit_paper'];

            foreach ($documents as $document) {
                if (!empty($partner->$document)) {
                    $filePath = storage_path('app/public/files/' . $partner->$document);
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }
            }


            $partner->update([
                'name'                     => $request->name,
                'phone'                    => $request->phone,
                'email'                    => $request->email,
                'image'                    => $uploads['image'],
                'address'                  => $request->address,
                'city'                     => $request->city,
                'country'                  => $request->country,
                'postal'                   => $request->postal,
                'status'                   => $request->status,
                'company_name'             => $request->company_name,
                'company_phone_number'     => $request->company_phone_number,
                'company_logo'             => $uploads['company_logo'],
                'company_url'              => $request->company_url,
                'company_established_date' => $request->company_established_date,
                'company_address'          => $request->company_address,
                'vat_number'               => $request->vat_number,
                'tax_number'               => $request->tax_number,
                'trade_license_number'     => $request->trade_license_number,
                'tin_number'               => $request->tin_number,
                'tin'                      => $uploads['tin'],
                'bin_certificate'          => $uploads['bin_certificate'],
                'trade_license'            => $uploads['trade_license'],
                'audit_paper'              => $uploads['audit_paper'],
                'industry_id_percentage'   => $request->industry_id_percentage,
                'product'                  => $request->product,
                'solution'                 => $request->solution,
                'working_country'          => $request->working_country,
                'yearly_revenue'           => $request->yearly_revenue,
                'email_verified_at'        => $request->email_verified_at,
                'password'                 => $request->password,
            ]);

            Toastr::success('Data has been updated.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);

        $files = [
            public_path('storage/'),
            public_path('storage/'),
            public_path('storage/thumb/')
        ];

        $images = [$partner->image, $partner->company_logo];

        foreach ($images as $image) {
            foreach ($files as $path) {
                $fullPath = $path . $image;
                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        $files = [
            $partner->tin,
            $partner->bin_certificate,
            $partner->trade_license,
            $partner->audit_paper
        ];

        foreach ($files as $file) {
            $path = public_path('storage/files/') . $file;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $partner->delete();
    }

    public function showLoginForm()
    {
        if (Auth::guard('partner')->check()) {
            return redirect()->route('partner.dashboard');
        } else {
            return view('partner.auth.login');
        }
    }

    public function Partnerlogin(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|max:70',
                'password' => 'required|max:70',
            ],
        );

        if ($validator->passes()) {
            $credentials = $request->only('email', 'password');
            //dd($credentials);
            if (Auth::guard('partner')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                //if (Auth::guard('partner')->attempt(['email' => $credentials['email'], 'password' => $credentials['password'],])) {
                //dd($credentials);
                Toastr::success('You have Successfully logged in.');
                return redirect()->route('partner.dashboard');
            } else {
                Toastr::error('Login details are not valid');
                return redirect("partner/login");
            }
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect("partner/login");
        }
    }

    public function dashboard()
    {

        $data['partner'] = Auth::guard('partner');
        //dd($data['partner']);
        return view('partner.pages.dashboard.index', $data);
    }

    public function partnerProfile()
    {
        $data['industries'] = Industry::select('id','title')->get();
        $data['products'] = Product::select('id','name')->get();
        $data['solutions'] = SolutionDetail::select('id','name')->get();
        $data['countries'] = Country::select('id','country_name')->get();
        if (Auth::guard('partner')->user()->id) {
            $data['data'] = Partner::where('id', Auth::guard('partner')->user()->id)->first();
            return view('partner.pages.profile.profile', $data);
        } else {
            Toastr::error('Login first.');
            return redirect()->back();
        }
    }

    public function PartnerRegistration(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name'        => 'required',
                'email'       => 'required|unique:partners|max:70',
                // 'password' => 'required|confirmed',
            ],
            [
                'mimes' => 'The :attribute must be required.',
                'unique' => 'This Email ID has been taken.',
            ]
        );
        if ($validator->passes()) {
            $partner = Partner::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'status'   => 'inactive',
                'password' => Hash::make($request->password),


            ]);

            event(new Registered($partner));

            Auth::guard('partner')->login($partner);
            Toastr::success('You have registered Successfully');
            return redirect()->route('partner.dashboard');
        } else {

            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect('partner/login');
        }
    }


    // public function PartnerLogin(){
    //     return view('partner.auth.login');
    // } // End Mehtod

    public function logout(Request $request)
    {
        Auth::guard('partner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/partner/login');
    } // End Mehtod

}
