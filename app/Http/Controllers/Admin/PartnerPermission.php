<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Partner\Partner;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PartnerPermission extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partnerPermissions'] = Partner::get();
        return view('admin.pages.partner_permission.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['partnerPermission'] = Partner::findOrFail($id);
        return view('admin.pages.partner_permission.edit', $data);
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
        $validator =
            [
                [
                    'name'      => 'required|string|max:100',
                    'primary_email_address'     => 'required|unique:partners|max:200',
                    'status' => 'in:DEFAULT,inactive',
                    'password'  => 'max:100',
                    'logo'     => 'image|nullable|mimes:png,jpg,jpeg|max:5000',
                ]
            ];
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $mainFile = $request->logo;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath, 100, 227);
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
                    'city'                  => $request->city,
                    'country'               => $request->country,
                    'postal'                => $request->postal,
                    'status'                => $request->status,
                    'logo'     => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $partner->logo,
                    'password'  => Hash::make($request->password),
                ]);
            }

            Toastr::success('Data has been updated');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 100000]);
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
        Partner::find($id)->delete();
    }


    public function partnerStatus(Request $request){

        //dd($request->id);
        if($request->mode== 'true'){
            DB::table('partners')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        else {


            DB::table('partners')->where('id',$request->id)->update(['status'=>'active']);
        }
         return response()->json(['msg'=>'Successfully Updated Status', 'status'=>true]);
    }


}
