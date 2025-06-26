<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clientExperinces'] = Client::latest()->get();
        return view('admin.pages.clientExperince.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clientExperince.add');
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
                'title'      => 'required|max:70',
                'logo'       => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'image'      => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'short_desc' => 'required|max:600',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ],

        );

        if ($validator->passes()) {
            $logoMainFile = $request->logo;
            $imageMainFile = $request->image;
            $uploadPath = storage_path('app/public/');
            if (isset($logoMainFile)) {
                $globalFunImgLogo = Helper::singleImageUpload($logoMainFile, $uploadPath, 90, 90);
            } else {
                $globalFunImgLogo = ['status' => 0];
            }

            if (isset($imageMainFile)) {
                $globalFunImage = Helper::singleImageUpload($imageMainFile, $uploadPath, 532, 349);
            } else {
                $globalFunImage = ['status' => 0];
            }
            Client::create([
                'title'      => $request->title,
                'logo'       => $globalFunImgLogo['status'] == 1 ? $globalFunImgLogo['file_name'] : '',
                'image'      => $globalFunImage['status']  == 1 ? $globalFunImage['file_name'] : '',
                'short_desc' => $request->short_desc,
                'long_desc'  => $request->long_desc,

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
        $data['clientExperince'] = Client::find($id);
        return view('admin.pages.clientExperince.edit', $data);
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
        $client = Client::find($id);
        if (!empty($client)) {
            $validator =
                [
                    [
                        'title'      => 'required|max:70',
                        'logo'       => 'required|image|mimes:png,jpg,jpeg|max:10000',
                        'image'      => 'required|image|mimes:png,jpg,jpeg|max:10000',
                        'short_desc' => 'required|max:600',
                    ]
                ];
        } else {
            $validator =
                [
                    [
                        'title'      => 'required|max:70',
                        'short_desc' => 'required|max:600',
                    ]
                ];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $logoMainFile  = $request->logo;
            $imageMainFile = $request->image;
            $uploadPath    = storage_path('app/public/');
            if (isset($logoMainFile)) {
                $globalFunImgLogo = Helper::singleImageUpload($logoMainFile, $uploadPath, 90, 90);
            } else {
                $globalFunImgLogo = ['status' => 0];
            }

            if (isset($imageMainFile)) {
                $globalFunImage = Helper::singleImageUpload($imageMainFile, $uploadPath, 532, 349);
            } else {
                $globalFunImage = ['status' => 0];
            }

            if ($globalFunImgLogo['status'] == 1) {
                File::delete(public_path('storage/') . $client->logo);
                File::delete(public_path('storage/') . $client->logo);
                File::delete(public_path('storage/thumb/') . $client->logo);
            }
            if ($globalFunImage['status'] == 1) {
                File::delete(public_path('storage/') . $client->image);
                File::delete(public_path('storage/') . $client->image);
                File::delete(public_path('storage/thumb/') . $client->image);
            }

            $client->update([
                'title'      => $request->title,
                'logo'       => $globalFunImgLogo['status'] == 1 ? $globalFunImgLogo['file_name'] : $client->logo,
                'image'      => $globalFunImage['status']   == 1 ? $globalFunImage['file_name']  : $client->image,
                'short_desc' => $request->short_desc,
                'long_desc'  => $request->long_desc,

            ]);
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

        $client = Client::find($id);

        //logo
        if (File::exists(public_path('storage/') . $client->logo)) {
            File::delete(public_path('storage/') . $client->logo);
        }
        if (File::exists(public_path('storage/') . $client->logo)) {
            File::delete(public_path('storage/') . $client->logo);
        }
        if (File::exists(public_path('storage/thumb/') . $client->logo)) {
            File::delete(public_path('storage/thumb/') . $client->logo);
        }

        //image
        if (File::exists(public_path('storage/') . $client->image)) {
            File::delete(public_path('storage/') . $client->image);
        }
        if (File::exists(public_path('storage/') . $client->image)) {
            File::delete(public_path('storage/') . $client->image);
        }
        if (File::exists(public_path('storage/thumb/') . $client->image)) {
            File::delete(public_path('storage/thumb/') . $client->image);
        }
        $client->delete();
    }
}
