<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Admin\BrandPage;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Row;
use App\Models\Admin\RowWithCol;
use App\Models\Admin\SolutionCard;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BrandPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brandPages'] = BrandPage::orderBy('id' , 'desc')->get();
        return view('admin.pages.brandPage.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = Brand::select('brands.id', 'brands.title')->latest('id','DESC')->get();
        $data['solution_cards'] = SolutionCard::select('solution_cards.id', 'solution_cards.title')->latest('id','DESC')->get();
        $data['rows'] = Row::whereNotNull('image')->select('rows.id', 'rows.title')->latest('id','DESC')->get();
        $data['row_with_cols'] = Row::whereNull('image')->select('rows.id', 'rows.title')->latest('id','DESC')->get();
        return view('admin.pages.brandPage.add', $data);
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
                'brand_id'      => 'required',
                'header'        => 'required',
                'banner_image'  => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'row_six_image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes'    => 'The :attribute must be a file of type: PNG - JPEG - JPG',
                'required' => 'The :attribute Field must be required.',
            ],

        );

        if ($validator->passes()) {
            $rowSixImage = $request->row_six_image;
            $banner_image = $request->banner_image;
            $brand_logo = $request->brand_logo;
            $uploadPath = storage_path('app/public/');
            if (isset($banner_image)) {
                $globalFunImgBanner = Helper::singleImageUpload($banner_image, $uploadPath);
            } else {
                $globalFunImgBanner = ['status' => 0];
            }

            if (isset($rowSixImage)) {
                $rowSixImage = Helper::singleImageUpload($rowSixImage, $uploadPath);
            } else {
                $rowSixImage = ['status' => 0];
            }
            if (isset($brand_logo)) {
                $brand_logo = Helper::singleImageUpload($brand_logo, $uploadPath);
            } else {
                $brand_logo = ['status' => 0];
            }
            BrandPage::create([
                'banner_image'           => $globalFunImgBanner['status'] == 1 ? $globalFunImgBanner['file_name'] : '',
                'row_six_image'          => $rowSixImage['status']        == 1 ? $rowSixImage['file_name']       : '',
                'brand_logo'             => $brand_logo['status']        == 1 ? $brand_logo['file_name']       : '',
                'brand_id'               => $request->brand_id,
                'solution_card_one_id'   => $request->solution_card_one_id,
                'solution_card_two_id'   => $request->solution_card_two_id,
                'solution_card_three_id' => $request->solution_card_three_id,
                'row_four_id'            => $request->row_four_id,
                'row_five_id'            => $request->row_five_id,
                'row_seven_id'           => $request->row_seven_id,
                'row_eight_id'           => $request->row_eight_id,
                'header'                 => $request->header,
                'row_one_title'          => $request->row_one_title,
                'row_one_header'         => $request->row_one_header,
                'row_six_title'          => $request->row_six_title,
                'row_six_header'         => $request->row_six_header,
                'row_nine_title'         => $request->row_nine_title,
                'row_nine_header'        => $request->row_nine_header,
                'status'                 => 'active',


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
        $data['brandPage'] = BrandPage::find($id);
        $data['brands'] = Brand::select('brands.id', 'brands.title')->latest('id','DESC')->get();
        $data['solution_cards'] = SolutionCard::select('solution_cards.id', 'solution_cards.title')->get();
        $data['rows'] = Row::whereNotNull('image')->select('rows.id', 'rows.title')->latest('id','DESC')->get();
        $data['row_with_cols'] = Row::whereNull('image')->select('rows.id', 'rows.title')->latest('id','DESC')->get();
        return view('admin.pages.brandPage.edit', $data);
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
        $brandPage = BrandPage::find($id);
        if (!empty($brandPage)) {

            $banner_image     = $request->banner_image;
            $row_six_image = $request->row_six_image;
            $brand_logo = $request->brand_logo;
            $uploadPath    = storage_path('app/public/');
            if (isset($banner_image)) {
                $globalFunImgimage_banner_image = Helper::singleImageUpload($banner_image, $uploadPath);
            } else {
                $globalFunImgimage_banner_image = ['status' => 0];
            }

            if (isset($row_six_image)) {
                $globalFunrow_six_image = Helper::singleImageUpload($row_six_image, $uploadPath);
            } else {
                $globalFunrow_six_image = ['status' => 0];
            }
            if (isset($brand_logo)) {
                $globalFunbrand_logo = Helper::singleImageUpload($brand_logo, $uploadPath);
            } else {
                $globalFunbrand_logo = ['status' => 0];
            }

            if ($globalFunImgimage_banner_image['status'] == 1) {
                File::delete(public_path('storage/') . $brandPage->banner_image);
                File::delete(public_path('storage/') . $brandPage->banner_image);
                File::delete(public_path('storage/thumb/') . $brandPage->banner_image);
            }
            if ($globalFunrow_six_image['status'] == 1) {
                File::delete(public_path('storage/') . $brandPage->row_six_image);
                File::delete(public_path('storage/') . $brandPage->row_six_image);
                File::delete(public_path('storage/thumb/') . $brandPage->row_six_image);
            }
            if ($globalFunbrand_logo['status'] == 1) {
                File::delete(public_path('storage/') . $brandPage->brand_logo);
                File::delete(public_path('storage/') . $brandPage->brand_logo);
                File::delete(public_path('storage/thumb/') . $brandPage->brand_logo);
            }

            $brandPage->update([
                'banner_image'           => $globalFunImgimage_banner_image['status'] == 1 ? $globalFunImgimage_banner_image['file_name'] : $brandPage->banner_image,
                'row_six_image'          => $globalFunrow_six_image['status']   == 1 ? $globalFunrow_six_image['file_name']  : $brandPage->row_six_image,
                'brand_logo'             => $globalFunbrand_logo['status']   == 1 ? $globalFunbrand_logo['file_name']  : $brandPage->brand_logo,
                'brand_id'               => $request->brand_id,
                'solution_card_one_id'   => $request->solution_card_one_id,
                'solution_card_two_id'   => $request->solution_card_two_id,
                'solution_card_three_id' => $request->solution_card_three_id,
                'row_four_id'            => $request->row_four_id,
                'row_five_id'            => $request->row_five_id,
                'row_seven_id'           => $request->row_seven_id,
                'row_eight_id'           => $request->row_eight_id,
                'header'                 => $request->header,
                'row_one_title'          => $request->row_one_title,
                'row_one_header'         => $request->row_one_header,
                'row_six_title'          => $request->row_six_title,
                'row_six_header'         => $request->row_six_header,
                'row_nine_title'         => $request->row_nine_title,
                'row_nine_header'        => $request->row_nine_header,
                'status'                 => $request->status,
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
        $brandPage = BrandPage::find($id);

        //banner_image
        if (File::exists(public_path('storage/') . $brandPage->banner_image)) {
            File::delete(public_path('storage/') . $brandPage->banner_image);
        }
        if (File::exists(public_path('storage/') . $brandPage->banner_image)) {
            File::delete(public_path('storage/') . $brandPage->banner_image);
        }
        if (File::exists(public_path('storage/thumb/') . $brandPage->banner_image)) {
            File::delete(public_path('storage/thumb/') . $brandPage->banner_image);
        }

        //row_six_image
        if (File::exists(public_path('storage/') . $brandPage->row_six_image)) {
            File::delete(public_path('storage/') . $brandPage->row_six_image);
        }
        if (File::exists(public_path('storage/') . $brandPage->row_six_image)) {
            File::delete(public_path('storage/') . $brandPage->row_six_image);
        }
        if (File::exists(public_path('storage/thumb/') . $brandPage->row_six_image)) {
            File::delete(public_path('storage/thumb/') . $brandPage->row_six_image);
        }
        //brand_logo
        if (File::exists(public_path('storage/') . $brandPage->brand_logo)) {
            File::delete(public_path('storage/') . $brandPage->brand_logo);
        }
        if (File::exists(public_path('storage/') . $brandPage->brand_logo)) {
            File::delete(public_path('storage/') . $brandPage->brand_logo);
        }
        if (File::exists(public_path('storage/thumb/') . $brandPage->brand_logo)) {
            File::delete(public_path('storage/thumb/') . $brandPage->brand_logo);
        }
        $brandPage->delete();
    }
}
