<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Admin\Success;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['successes'] = Success::latest()->get();
        return view('admin.pages.success.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.success.add');
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
                'title'       => 'required',
                'description' => 'required',
            ],
        );

        if ($validator->passes()) {
            $image = $request->file('image');
            $uploadPath = storage_path('app/public/');

            if (!empty($image)) {
                $globalFunImage = Helper::Upload($image, $uploadPath);
           } else {
                $globalFunImage = ['status' => 0];
            }
            Success::create([
                'title'       => $request->title,
                'image'       => $globalFunImage['status'] == 1 ? $globalFunImage['file_name'] : null,
                'btn_name'    => $request->btn_name,
                'link'        => $request->link,
                'description' => $request->description,

            ]);
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
        $data['success'] = Success::find($id);
        return view('admin.pages.success.edit', $data);
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
        $success = Success::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'title'       => 'required',
                'description' => 'required',
            ],
        );

        if ($validator->passes()) {
            $image = $request->file('image');
            $uploadPath = storage_path('app/public/');
            if (!empty($image)) {
                // Call external helper function which resizes and saves the image file in the designated folder
                $globalFunImage = Helper::Upload($image, $uploadPath);

                // Delete old logo files stored on disk
                $paths = [
                    storage_path("app/public/{$success->image}"),
                    storage_path("app/public/{$success->image}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                $globalFunImage = ['status' => 0];
            }
            $success->update([
                'title'       => $request->title,
                'image'       => $globalFunImage['status'] == 1 ? $globalFunImage['file_name'] : $success->image,
                'btn_name'    => $request->btn_name,
                'link'        => $request->link,
                'description' => $request->description,
            ]);
            Toastr::success('Data Updated Successfully');
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
        $success = Success::find($id);

        //image
        $paths = [
            storage_path('app/public/') . $success->image,
            storage_path('app/public/') . $success->image
        ];

        // Delete any existing logo and requestImg images
        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $success->delete();

    }
}
