<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Section;
use Image;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sections'] = Section::all();
        return view('admin.pages.section.all',$data);

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
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|unique:sections',
                'image'   => 'image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG',
                'unique' => 'This Section has already been taken.',
            ],

        );

        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            $slug = Str::slug($request->title);
            $count = Section::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;
            if (empty($mainFile)) {
                Section::create([
                    'title'    => $request->title,
                    'slug' => $data['slug'],
                    'category' => $request->category,
                ]);
            } else {
                $globalFunImg =  Helper::singleImageUpload($mainFile, $imgPath, 380, 210);
                if ($globalFunImg['status'] == 1) {
                    Section::create([
                        'title'    => $request->title,
                        'slug' => $data['slug'],
                        'image'    => $globalFunImg['file_name'],
                        'category' => $request->category,
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
        //
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
        $section = Section::find($id);
        if (!empty($section)) {
            $validator =
                [
                    'title' => 'required',
                    'image' => 'image|mimes:png,jpg,jpeg|max:5000',
                ];
        } else {
            $validator =
                [
                    'title' => 'required',
                ];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath, 380, 210);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($section)) {
                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/') . $section->image)) {
                        File::delete(public_path('storage/') . $section->image);
                    }
                    if (File::exists(public_path('storage/') . $section->image)) {
                        File::delete(public_path('storage/') . $section->image);
                    }
                    if (File::exists(public_path('storage/thumb/') . $section->image)) {
                        File::delete(public_path('storage/thumb/') . $section->image);
                    }
                }

                $section->update([
                    'title' => $request->title,
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $section->image,
                    'category' => $request->category,
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
        $section = Section::find($id);

        if (File::exists(public_path('storage/') . $section->image)) {
            File::delete(public_path('storage/') . $section->image);
        }
        if (File::exists(public_path('storage/') . $section->image)) {
            File::delete(public_path('storage/') . $section->image);
        }
        if (File::exists(public_path('storage/thumb/') . $section->image)) {
            File::delete(public_path('storage/thumb/') . $section->image);
        }
        $section->delete();
    }
}
