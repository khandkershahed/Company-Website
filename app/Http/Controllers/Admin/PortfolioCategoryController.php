<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\PortfolioCategory;
use Illuminate\Support\Facades\Validator;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['portfolioCategorys'] = PortfolioCategory::orderBy('id', 'desc')->get();
        return view('admin.pages.portfolioCategory.all', $data);
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
                'title'  => 'required|string',
                'image'  => 'sometimes|image|mimes: png,jpg,jpeg|max: 10000',
                'status' => 'required|string',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $image = $request->image;
            $uploadPath = storage_path('app/public/');
            if (isset($image)) {
                $globalFunimage = Helper::singleImageUpload($image, $uploadPath);
            } else {
                $globalFunimage = ['status' => 0];
            }
            PortfolioCategory::create([
                'title'      => $request->title,
                'image'      => $globalFunimage['status'] == 1 ? $globalFunimage['file_name'] : '',
                'status' => $request->status,
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
        $portfolioCategory = PortfolioCategory::find($id);

        $validator = Validator::make(
            $request->all(),
            [
                'title'       => 'required|string',
                'image'       => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'description' => 'required|string',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );
        if (!empty($portfolioCategory)) {
            $image      = $request->image;
            $uploadPath = storage_path('app/public/');
            if (isset($image)) {
                $globalFunimage = Helper::singleImageUpload($image, $uploadPath);
            } else {
                $globalFunimage = ['status' => 0];
            }

            if ($globalFunimage['status'] == 1) {
                File::delete(public_path('storage/') . $portfolioCategory->image);
                File::delete(public_path('storage/') . $portfolioCategory->image);
                File::delete(public_path('storage/thumb/') . $portfolioCategory->image);
            }

            $portfolioCategory->update([
                'title'      => $request->title,
                'image'      => $globalFunimage['status'] == 1 ? $globalFunimage['file_name'] : $portfolioCategory->image,
                'status' => $request->status,
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

        $portfolioCategory = PortfolioCategory::find($id);

        if (File::exists(public_path('storage/') . $portfolioCategory->image)) {
            File::delete(public_path('storage/') . $portfolioCategory->image);
        }
        if (File::exists(public_path('storage/') . $portfolioCategory->image)) {
            File::delete(public_path('storage/') . $portfolioCategory->image);
        }
        if (File::exists(public_path('storage/thumb/') . $portfolioCategory->image)) {
            File::delete(public_path('storage/thumb/') . $portfolioCategory->image);
        }
        $portfolioCategory->delete();
    }
}
