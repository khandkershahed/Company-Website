<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Http\Controllers\Controller;
use App\Models\Admin\SubSubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\SubSubSubCategory;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categorys']          = Category::orderBy('id', 'DESC')->get();
        $data['sub_cats']           = SubCategory::orderBy('id', 'DESC')->get();
        $data['sub_sub_cats']       = SubSubCategory::orderBy('id', 'DESC')->get();
        $data['sub_sub_sub_cats']   = SubSubSubCategory::orderBy('id', 'DESC')->get();
        return view('metronic.pages.category.index', $data);
        // return view('admin.pages.category.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $data['cats']           = Category::where('status', 'active')->orderBy('id', 'DESC')->get();
    //     $data['sub_cats']       = SubCategory::where('status', 'active')->orderBy('id', 'DESC')->get();
    //     $data['sub_sub_cats']   = SubSubCategory::where('status', 'active')->orderBy('id', 'DESC')->get();
    //     return view('admin.pages.category.add', $data);
    // }

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
                'title' => 'required|unique:categories',
                'image'   => 'required|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'unique' => 'This Category has already been taken.',
            ]
        );


        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            $mainbannerFile = $request->file('banner_image');
            $bannerimgPath = storage_path('app/public/');

            $slug = Str::slug($request->title);
            $count = Category::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $imgPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            Category::create([
                'title' => $request->title,
                'slug' => $data['slug'],
                'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : '',
                'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : '',
                'status' => $request->status,
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.edit', compact('edit'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!empty($isImage)) {
            $validator =
                [
                    'title' => 'required',
                    'image' => 'required|image|mimes:jpg,jpg,jpeg|max:5000',
                ];
        } else {
            $validator = ['title' => 'required',];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');
            $mainbannerFile = $request->banner_image;
            $bannerimgPath = storage_path('app/public/');


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            if (!empty($category)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $category->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $category->image);
                    File::delete(public_path($uploadPath . '/') . $category->image);
                }
                if ($globalbannerFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $category->banner_image);
                    File::delete(public_path($uploadPath . '/thumb/') . $category->banner_image);
                    File::delete(public_path($uploadPath . '/') . $category->banner_image);
                }

                $category->update([
                    'title' => $request->title,
                    'slug' =>  Str::slug($request->title),
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $category->image,
                    'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : $category->banner_image,
                    'status' => $request->status,
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
        $category = Category::find($id);

        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->image)) {
            File::delete(public_path('storage/thumb/') . $category->image);
        }
        $category->delete();
    }

    public function StoreSubCategory(Request $request)
    {
        Helper::imageDirectory();

        $validator = Validator::make(
            $request->all(),
            [
                'cat_id' => 'required',
                'title' => 'required|unique:sub_categories',
                'image'   => 'required|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'unique' => 'This Category has already been taken.',
            ]
        );
        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            $mainbannerFile = $request->file('banner_image');
            $bannerimgPath = storage_path('app/public/');

            $slug = Str::slug($request->title);
            $count = SubCategory::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $imgPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            SubCategory::create([
                'cat_id' => $request->cat_id,
                'title' => $request->title,
                'slug' => $data['slug'],
                'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : '',
                'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : '',
                'status' => $request->status,
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

    public function StoreSubSubCategory(Request $request)
    {
        Helper::imageDirectory();

        $validator = Validator::make(
            $request->all(),
            [
                'cat_id' => 'required',
                'sub_cat_id' => 'required',
                'title' => 'required|unique:sub_sub_categories',
                'image'   => 'required|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'unique' => 'This Category has already been taken.',
            ]
        );

        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            $mainbannerFile = $request->file('banner_image');
            $bannerimgPath = storage_path('app/public/');

            $slug = Str::slug($request->title);
            $count = SubSubCategory::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $imgPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            SubSubCategory::create([
                'cat_id' => $request->cat_id,
                'sub_cat_id' => $request->sub_cat_id,
                'title' => $request->title,
                'slug' => $data['slug'],
                'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : '',
                'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : '',
                'status' => $request->status,
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

    public function StoreSubSubSubCategory(Request $request)
    {
        Helper::imageDirectory();

        $validator = Validator::make(
            $request->all(),
            [
                'cat_id' => 'required',
                'sub_cat_id' => 'required',
                'sub_sub_cat_id' => 'required',
                'title' => 'required|unique:sub_sub_sub_categories',
                'image'   => 'required|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'image' => [
                    'max'      => 'The image field must be smaller than 5 MB.',
                ],
                'image'    => 'The file must be an image.',
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG',

                'unique' => 'This Category has already been taken.',

            ]
        );
        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            $mainbannerFile = $request->file('banner_image');
            $bannerimgPath = storage_path('app/public/');

            $slug = Str::slug($request->title);
            $count = SubSubSubCategory::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $imgPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            SubSubSubCategory::create([
                'cat_id' => $request->cat_id,
                'sub_cat_id' => $request->sub_cat_id,
                'sub_sub_cat_id' => $request->sub_sub_cat_id,
                'title' => $request->title,
                'slug' => $data['slug'],
                'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : '',
                'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : '',
                'status' => $request->status,
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

    public function UpdateSubCategory(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);


        $validator = Validator::make(
            $request->all(),

                    [

                        'title' => 'required',
                        //'image' => 'image|mimes:png,jpg,jpeg|max:5000',

                    ],
                    [
                        // 'image' => 'The file must be an image.',
                        // 'mimes' => 'The: attribute must be a file of type: PNG - JPEG - JPG'
                        'required' => 'The title field is required.',
                    ]
                );


        //$validator = Validator::make($request->all(), $validator);
        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');
            $mainbannerFile = $request->banner_image;
            $bannerimgPath = storage_path('app/public/');


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            if (!empty($subcategory)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $subcategory->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $subcategory->image);
                    File::delete(public_path($uploadPath . '/') . $subcategory->image);
                }
                if ($globalbannerFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $subcategory->banner_image);
                    File::delete(public_path($uploadPath . '/thumb/') . $subcategory->banner_image);
                    File::delete(public_path($uploadPath . '/') . $subcategory->banner_image);
                }

                $subcategory->update([
                    'title' => $request->title,
                    'cat_id' => $request->cat_id,
                    'status' => $request->status,
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $subcategory->image,
                    'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : $subcategory->banner_image,
                    'status' => $request->status,
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

    public function UpdateSubSubCategory(Request $request, $id)
    {
        $subsubcategory = SubSubCategory::find($id);
        if (!empty($subsubcategory)) {
            $validator =
                [
                    'title' => 'required',
                    //'image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
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
            $mainbannerFile = $request->banner_image;
            $bannerimgPath = storage_path('app/public/');


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            if (!empty($subsubcategory)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $subsubcategory->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $subsubcategory->image);
                    File::delete(public_path($uploadPath . '/') . $subsubcategory->image);
                }
                if ($globalbannerFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $subsubcategory->banner_image);
                    File::delete(public_path($uploadPath . '/thumb/') . $subsubcategory->banner_image);
                    File::delete(public_path($uploadPath . '/') . $subsubcategory->banner_image);
                }

                $subsubcategory->update([
                    'title' => $request->title,
                    'cat_id' => $request->cat_id,
                    'sub_cat_id' => $request->sub_cat_id,
                    'status' => $request->status,
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $subsubcategory->image,
                    'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : $subsubcategory->banner_image,
                    'status' => $request->status,
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

    public function UpdateSubSubSubCategory(Request $request, $id)
    {
        $subsubsubcategory = SubSubSubCategory::find($id);
        if (!empty($subsubsubcategory)) {
            $validator =
                [

                    'title' => 'required',
                    //'image' => 'required|image|mimes:png,jpg,jpeg|max:5000',

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
            $mainbannerFile = $request->banner_image;
            $bannerimgPath = storage_path('app/public/');


            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }
            if (isset($mainbannerFile)) {
                $globalbannerFunImg =  Helper::singleImageUpload($mainbannerFile, $bannerimgPath);
            } else {
                $globalbannerFunImg['status'] = 0;
            }

            if (!empty($subsubsubcategory)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $subsubsubcategory->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $subsubsubcategory->image);
                    File::delete(public_path($uploadPath . '/') . $subsubsubcategory->image);
                }
                if ($globalbannerFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $subsubsubcategory->banner_image);
                    File::delete(public_path($uploadPath . '/thumb/') . $subsubsubcategory->banner_image);
                    File::delete(public_path($uploadPath . '/') . $subsubsubcategory->banner_image);
                }

                $subsubsubcategory->update([
                    'title' => $request->title,
                    'cat_id' => $request->cat_id,
                    'sub_cat_id' => $request->sub_cat_id,
                    'sub_sub_cat_id' => $request->sub_sub_cat_id,
                    'status' => $request->status,
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $subsubsubcategory->image,
                    'banner_image' => $globalbannerFunImg['status'] == 1 ? $globalbannerFunImg['file_name'] : $subsubsubcategory->banner_image,
                    'status' => $request->status,
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


    public function SubCatdestroy($id)
    {
        $category = SubCategory::find($id);

        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->image)) {
            File::delete(public_path('storage/thumb/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->banner_image)) {
            File::delete(public_path('storage/') . $category->banner_image);
        }
        if (File::exists(public_path('storage/') . $category->banner_image)) {
            File::delete(public_path('storage/') . $category->banner_image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->banner_image)) {
            File::delete(public_path('storage/thumb/') . $category->banner_image);
        }
        $category->delete();
    }

    public function SubSubCatdestroy($id)
    {
        $category = SubSubCategory::find($id);

        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->image)) {
            File::delete(public_path('storage/thumb/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->banner_image)) {
            File::delete(public_path('storage/') . $category->banner_image);
        }
        if (File::exists(public_path('storage/') . $category->banner_image)) {
            File::delete(public_path('storage/') . $category->banner_image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->banner_image)) {
            File::delete(public_path('storage/thumb/') . $category->banner_image);
        }
        $category->delete();
    }

    public function SubSubSubCatdestroy($id)
    {
        $category = SubSubSubCategory::find($id);

        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->image)) {
            File::delete(public_path('storage/') . $category->image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->image)) {
            File::delete(public_path('storage/thumb/') . $category->image);
        }
        if (File::exists(public_path('storage/') . $category->banner_image)) {
            File::delete(public_path('storage/') . $category->banner_image);
        }
        if (File::exists(public_path('storage/') . $category->banner_image)) {
            File::delete(public_path('storage/') . $category->banner_image);
        }
        if (File::exists(public_path('storage/thumb/') . $category->banner_image)) {
            File::delete(public_path('storage/thumb/') . $category->banner_image);
        }
        $category->delete();
    }
}
