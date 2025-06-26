<?php

namespace App\Http\Controllers\Admin;

use Image;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Industry;
use App\Models\Admin\SubIndustry;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['industrys'] = Industry::latest()->get();
        return view('admin.pages.industry.all', $data);
    } // End Method


    public function create()
    {
        // $data['industrys'] = Industry::latest()->get();
        // return view('admin.pages.industry.add', $data);
    } // End Method


    public function store(Request $request)
    {
        // dd($request->all());
        //Helper::imageDirectory();
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'title'      => 'required',
                'logo'       => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'image'      => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'short_desc' => 'required',
            ]
        );

        if ($validator->passes()) {
            $logoMainFile = $request->logo;
            $imageMainFile = $request->image;
            $uploadPath = storage_path('app/public/');
            if (isset($logoMainFile)) {
                $globalFunImgLogo = Helper::singleImageUpload($logoMainFile, $uploadPath);
            } else {
                $globalFunImgLogo = ['status' => 0];
            }

            if (isset($imageMainFile)) {
                $globalFunImage = Helper::singleImageUpload($imageMainFile, $uploadPath, 500, 300);
            } else {
                $globalFunImage = ['status' => 0];
            }
            $slug = Str::slug($request->title);
            $count = Industry::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;
            Industry::create([
                'parent_id'  => $request->parent_id,
                'title'      => $request->title,
                'slug'       => $data['slug'],
                'logo'       => $globalFunImgLogo['status'] == 1 ? $globalFunImgLogo['file_name'] : '',
                'image'      => $globalFunImage['status']   == 1 ? $globalFunImage['file_name']  : '',
                'short_desc' => $request->short_desc,
                'link'       => $request->link,

            ]);
            Toastr::success('Data has been created');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }

        return redirect()->back();
    } // End Method


    public function edit($id)
    {

        $data['industry'] = Industry::findOrFail($id);


        //$data['industry'] = Industry::findOrFail($id);

        return view('admin.pages.industry.edit', $data);
    } // End Method


    public function update(Request $request, $id)
    {
        $industry = Industry::find($id);
        $validator =
            [

                'title'      => 'required',
                'short_desc' => 'required',

            ];

        $validator = Validator::make($request->all(), $validator);
        // if (!empty($industry->slug)) {
        //     $data['slug'] = $industry->slug;
        // } else {
        //     $slug = Str::slug($request->title);
        //     $count = Industry::where('slug', $slug)->count();
        //     if ($count > 0) {
        //         $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        //     }
        //     $data['slug'] = $slug;
        // }


        if ($validator->passes()) {
            $logoMainFile  = $request->logo;
            $imageMainFile = $request->image;
            $uploadPath    = storage_path('app/public/');
            if (isset($logoMainFile)) {
                $globalFunImgLogo = Helper::singleImageUpload($logoMainFile, $uploadPath);
            } else {
                $globalFunImgLogo = ['status' => 0];
            }

            if (isset($imageMainFile)) {
                $globalFunImage = Helper::singleImageUpload($imageMainFile, $uploadPath, 500, 300);
            } else {
                $globalFunImage = ['status' => 0];
            }

            if ($globalFunImgLogo['status'] == 1) {
                File::delete(public_path('storage/') . $industry->logo);
                File::delete(public_path('storage/') . $industry->logo);
                File::delete(public_path('storage/thumb/') . $industry->logo);
            }
            if ($globalFunImage['status'] == 1) {
                File::delete(public_path('storage/') . $industry->image);
                File::delete(public_path('storage/') . $industry->image);
                File::delete(public_path('storage/thumb/') . $industry->image);
            }

            $industry->update([
                'parent_id'  => $request->parent_id,
                'title'      => $request->title,
                // 'slug'       => $data['slug'],
                'logo'       => $globalFunImgLogo['status'] == 1 ? $globalFunImgLogo['file_name'] : $industry->logo,
                'image'      => $globalFunImage['status']   == 1 ? $globalFunImage['file_name']  : $industry->image,
                'short_desc' => $request->short_desc,
                'link'       => $request->link,

            ]);
            Toastr::success('Data has been updated');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    } // End Method


    public function destroy($id)
    {
        $industry = Industry::find($id);

        //logo
        if (File::exists(public_path('storage/') . $industry->logo)) {
            File::delete(public_path('storage/') . $industry->logo);
        }
        if (File::exists(public_path('storage/') . $industry->logo)) {
            File::delete(public_path('storage/') . $industry->logo);
        }
        if (File::exists(public_path('storage/thumb/') . $industry->logo)) {
            File::delete(public_path('storage/thumb/') . $industry->logo);
        }

        //image
        if (File::exists(public_path('storage/') . $industry->image)) {
            File::delete(public_path('storage/') . $industry->image);
        }
        if (File::exists(public_path('storage/') . $industry->image)) {
            File::delete(public_path('storage/') . $industry->image);
        }
        if (File::exists(public_path('storage/thumb/') . $industry->image)) {
            File::delete(public_path('storage/thumb/') . $industry->image);
        }
        $industry->delete();
    } // End Method


}
