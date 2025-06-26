<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Partner\Partner;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partners'] = Partner::get();
        $data['notifications'] = auth()->user()->unreadNotifications;
        return view('admin.pages.partner.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['notifications'] = auth()->user()->unreadNotifications;
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
                'name' => 'required',
                'logo' => 'required_if:logo,==,$request->logo|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $mainFile = $request->file('logo');
            $imgPath = storage_path('app/public/');

            if (empty($mainFile)) {
                Partner::create([
                    'name'                  => $request->name,
                    'company_name'          => $request->company_name,
                    'company_site_name'     => $request->company_site_name,
                    'company_address'       => $request->company_address,
                    'company_email_address' => $request->company_email_address,
                    'primary_email_address' => $request->primary_email_address,
                    'phone_number'          => $request->phone_number,
                    'company_number'        => $request->company_number,
                    'company_trade_license' => $request->company_trade_license,
                    'company_tin_number'    => $request->company_tin_number,
                    'company_vat'           => $request->company_vat,
                    'business_type'         => $request->business_type,
                    'business_since'        => $request->business_since,
                    'city'                  => $request->city,
                    'country'               => $request->country,
                    'postal'                => $request->postal,
                    'last_seen'             => $request->last_seen,
                    'status'                => $request->status,
                    'password'              => Hash::make($request->password),
                ]);
            } else {
                $globalFunImg =  Helper::singleImageUpload($mainFile, $imgPath, 157, 87);
                if ($globalFunImg['status'] == 1) {
                    Partner::create([
                        'name'                  => $request->name,
                        'company_name'          => $request->company_name,
                        'company_site_name'     => $request->company_site_name,
                        'company_address'       => $request->company_address,
                        'company_email_address' => $request->company_email_address,
                        'primary_email_address' => $request->primary_email_address,
                        'phone_number'          => $request->phone_number,
                        'company_number'        => $request->company_number,
                        'company_trade_license' => $request->company_trade_license,
                        'company_tin_number'    => $request->company_tin_number,
                        'company_vat'           => $request->company_vat,
                        'business_type'         => $request->business_type,
                        'business_since'        => $request->business_since,
                        'logo'                  => $globalFunImg['file_name'],
                        'city'                  => $request->city,
                        'country'               => $request->country,
                        'postal'                => $request->postal,
                        'last_seen'             => $request->last_seen,
                        'status'                => $request->status,
                        'password'              => Hash::make($request->password),
                    ]);
                } else {
                    Toastr::warning('Image upload failed! plz try again.');
                }
            }
            Toastr::success('Data Inserted Successfully');
        } else {

            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

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
        $data['notifications'] = auth()->user()->unreadNotifications;
        $data['partner'] = Partner::findOrFail($id);
        return view('admin.pages.partner.edit', $data);
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
        $partner = Partner::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'logo' => 'required_if:logo,==,$request->logo|nullable|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $mainFile = $request->logo;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath, 157, 87);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($partner)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $partner->logo);
                    File::delete(public_path($uploadPath . '/thumb/') . $partner->logo);
                    File::delete(public_path($uploadPath . '/') . $partner->logo);
                }
                $partner->update([
                    'name'                  => $request->name,
                    'company_name'          => $request->company_name,
                    'company_site_name'     => $request->company_site_name,
                    'company_address'       => $request->company_address,
                    'company_email_address' => $request->company_email_address,
                    'primary_email_address' => $request->primary_email_address,
                    'phone_number'          => $request->phone_number,
                    'company_number'        => $request->company_number,
                    'company_trade_license' => $request->company_trade_license,
                    'company_tin_number'    => $request->company_tin_number,
                    'company_vat'           => $request->company_vat,
                    'business_type'         => $request->business_type,
                    'business_since'        => $request->business_since,
                    'logo'                  => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $partner->logo,
                    'city'                  => $request->city,
                    'country'               => $request->country,
                    'postal'                => $request->postal,
                    'last_seen'             => $request->last_seen,
                    'status'                => $request->status,
                    'password'              => Hash::make($request->password),
                ]);
            }

            Toastr::success('Data has been updated');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);

        if (File::exists(public_path('storage/') . $partner->logo)) {
            File::delete(public_path('storage/') . $partner->logo);
        }
        if (File::exists(public_path('storage/') . $partner->logo)) {
            File::delete(public_path('storage/') . $partner->logo);
        }
        if (File::exists(public_path('storage/thumb/') . $partner->logo)) {
            File::delete(public_path('storage/thumb/') . $partner->logo);
        }
        $partner->delete();
    }

    
}
