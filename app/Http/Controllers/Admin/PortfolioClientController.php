<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\PortfolioClient;
use Illuminate\Support\Facades\Validator;

class PortfolioClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['portfolioClients'] = PortfolioClient::orderBy('id', 'desc')->get();
        return view('admin.pages.portfolioClient.all', $data);
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
                'link'   => 'required|string',
                'status' => 'required|string',
                'logo'   => 'required|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],

        );

        if ($validator->passes()) {
            $logo = $request->logo;
            $uploadPath = storage_path('app/public/');
            if (isset($logo)) {
                $globalFunLogo = Helper::singleImageUpload($logo, $uploadPath);
            } else {
                $globalFunLogo = ['status' => 0];
            }
            PortfolioClient::create([
                'link'       => $request->link,
                'status'     => $request->status,
                'logo' => $globalFunLogo['status']  == 1 ? $globalFunLogo['file_name'] : '',
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfolioClient = PortfolioClient::find($id);
        if (!empty($portfolioClient)) {
            $logo = $request->logo;
            $uploadPath    = storage_path('app/public/');
            if (isset($logo)) {
                $globalFunlogo = Helper::singleImageUpload($logo, $uploadPath);
            } else {
                $globalFunlogo = ['status' => 0];
            }

            if ($globalFunlogo['status'] == 1) {
                File::delete(public_path('storage/') . $portfolioClient->logo);
                File::delete(public_path('storage/') . $portfolioClient->logo);
                File::delete(public_path('storage/thumb/') . $portfolioClient->logo);
            }

            $portfolioClient->update([
                'link'   => $request->link,
                'status' => $request->status,
                'logo'   => $globalFunlogo['status']   == 1 ? $globalFunlogo['file_name']  : $portfolioClient->logo,
            ]);
            Toastr::success('Data has been updated');
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
        $portfolioClient = PortfolioClient::find($id);

        //logo
        if (File::exists(public_path('storage/') . $portfolioClient->logo)) {
            File::delete(public_path('storage/') . $portfolioClient->logo);
        }
        if (File::exists(public_path('storage/') . $portfolioClient->logo)) {
            File::delete(public_path('storage/') . $portfolioClient->logo);
        }
        if (File::exists(public_path('storage/thumb/') . $portfolioClient->logo)) {
            File::delete(public_path('storage/thumb/') . $portfolioClient->logo);
        }
        $portfolioClient->delete();
    }
}
