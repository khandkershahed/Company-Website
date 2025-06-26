<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Carbon\Carbon;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\TechGlossy;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TechGlossyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['storys'] = TechGlossy::latest()->get();
        return view('admin.pages.techglossy.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\blog
     */
    public function create()
    {
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['categories'] = Category::select('categories.id', 'categories.title')->get();
        $data['brands'] = Brand::select('brands.id', 'brands.title')->get();
        $data['industries'] = Industry::select('industries.id', 'industries.title')->get();
        $data['solutionDetails'] = SolutionDetail::select('solution_details.id','solution_details.name')->get();
        return view('admin.pages.techglossy.add',$data);
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
                'badge'   => 'required|max:200',
                'title'   => 'required|max:250',
                'tags'    => 'required|max:250',
                'image'   => 'image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG',
                'required' => 'The :attribute field is required',
                'max' => 'The :attribute field is extended its length',
            ],

        );

        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            if (isset($mainFile)) {
                $mainFile = Helper::singleImageUpload($mainFile, $imgPath, 1800, 625);
            } else {
                $mainFile = ['status' => 0];
            }

                TechGlossy::create([
                    'category_id' => json_encode($request->category_id),
                    'brand_id'    => json_encode($request->brand_id),
                    'industry_id' => json_encode($request->industry_id),
                    'solution_id' => json_encode($request->solution_id),
                    'featured'    => $request->featured,
                    'badge'       => $request->badge,
                    'title'       => $request->title,
                    'header'      => $request->header,
                    'created_by'  => $request->created_by,
                    'added_by'    => Auth::user()->name,
                    'tags'        => $request->tags,
                    'short_des'   => $request->short_des,
                    'long_des'    => $request->long_des,
                    'footer'      => $request->footer,
                    'image'       => $mainFile['status'] == 1 ? $mainFile['file_name'] : '',
                    'created_at'  => Carbon::now(),
                ]);

            Toastr::success('Blog Inserted Successfully');
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
        $data['story'] = TechGlossy::find($id);
        return view('admin.pages.techglossy.edit', $data);
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
        $techglossy = TechGlossy::find($id);
        if (!empty($request->image)) {
            $validator =
                [
                    'badge' => 'required',
                    'title' => 'required',
                    'tags' => 'required',
                    'image' => 'required|image|mimes:png,jpg,jpeg|max:5000',

                ];
                [
                    'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG',
                    'required' => 'The :attribute field is required',
                ];
        } else {
            $validator =
                [

                    'title' => 'required',
                    'tags' => 'required',

                ];
                [
                    'required' => 'The :attribute field is required',
                ];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath, 1180, 400);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($techglossy)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $techglossy->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $techglossy->image);
                    File::delete(public_path($uploadPath . '/') . $techglossy->image);
                }

                $techglossy->update([
                    'category_id' => json_encode($request->category_id),
                    'brand_id'    => json_encode($request->brand_id),
                    'industry_id' => json_encode($request->industry_id),
                    'solution_id' => json_encode($request->solution_id),
                    'featured'    => $request->featured,
                    'badge'       => $request->badge,
                    'title'       => $request->title,
                    'header'      => $request->header,
                    'created_by'  => $request->created_by,
                    'tags'        => $request->tags,
                    'short_des'   => $request->short_des,
                    'long_des'    => $request->long_des,
                    'footer'      => $request->footer,
                    'image'       => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $techglossy->image,
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
        $techglossy = TechGlossy::find($id);

        if (File::exists(public_path('storage/') . $techglossy->image)) {
            File::delete(public_path('storage/') . $techglossy->image);
        }
        if (File::exists(public_path('storage/') . $techglossy->image)) {
            File::delete(public_path('storage/') . $techglossy->image);
        }
        if (File::exists(public_path('storage/thumb/') . $techglossy->image)) {
            File::delete(public_path('storage/thumb/') . $techglossy->image);
        }
        $techglossy->delete();
    }
}
