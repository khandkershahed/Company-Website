<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\Solution;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = SolutionDetail::orderBy('id', 'DESC')->select('name','id','slug','solution_template','status')->get();
        return view('metronic.pages.solution.index', compact('solutions'));
    }

    public function create()
    {
        $data['industries'] = Industry::select('industries.id', 'industries.title')->get();
        $data['brands']  = Brand::select('brands.id', 'brands.title')->get();
        $data['categories'] = Category::select('categories.id', 'categories.title')->get();
        return view('admin.pages.solutions.create', $data);
    }

    //Show Edit Form
    public function edit($id)
    {
        dd($id);
        $solution = SolutionDetail::find($id);
        return view('metronic.pages.solution.edit', ['solution' => $solution]);
    }


    //Store  Data
    public function store(Request $request)
    {
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:70',
                'image'   => 'required|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ],

        );

        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            if (empty($mainFile)) {
                Solution::create([
                    'title'    => $request->title,
                    'description' => $request->description,
                ]);
            } else {
                $globalFunImg =  Helper::singleImageUpload($mainFile, $imgPath, 230, 227);
                if ($globalFunImg['status'] == 1) {
                    Solution::create([
                        'title'    => $request->title,
                        'image'    => $globalFunImg['file_name'],
                        'description' => $request->description,
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
        // Helper::imageDirectory();
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'title' => 'required|max: 100',
        //         'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
        //     ],
        //     [
        //         'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG'
        //     ],

        // );

        // if ($validator->passes()) {
        //     $mainFile = $request->file('logo');
        //     $imgPath = storage_path('app/public/');
        //     if (empty($mainFile)) {
        //         $solution_id = Solution::insertGetId([
        //             'title'    => $request->title,
        //             'description'    => $request->description,
        //         ]);
        //     } else {
        //         $globalFunImg =  Helper::singleImageUpload($mainFile, $imgPath, 230, 227);

        //     }
        //     Toastr::success('Data Inserted Successfully');
        // } else {

        //     $messages = $validator->messages();
        //     foreach ($messages->all() as $message) {
        //         Toastr::error($message, 'Failed', ['timeOut' => 30000]);
        //     }
        // }
        // return redirect()->back();
    }

    //Update Data
    public function update(Request $request, $id)
    {

        Solution::find($id)->update([
            'title' => $request->title,
        ]);
        return redirect()->route('all.solution');
    }


    public function destroy($id)
    {
        $solution = Solution::find($id);

        if (File::exists(public_path('storage/') . $solution->image)) {
            File::delete(public_path('storage/') . $solution->image);
        }
        if (File::exists(public_path('storage/requestImg/') . $solution->image)) {
            File::delete(public_path('storage/requestImg/') . $solution->image);
        }
        if (File::exists(public_path('storage/thumb/') . $solution->image)) {
            File::delete(public_path('storage/thumb/') . $solution->image);
        }
        $solution->delete();
    }
}
