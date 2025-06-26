<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\PortfolioDetails;
use Illuminate\Support\Facades\Validator;

class PortfolioDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['PortfolioDetailses'] = PortfolioDetails::select('id','banner_title')->latest('id','desc')->get();
        return view('admin.pages.portfolioDetail.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=PortfolioCategory::latest('id','desc')->select('id','title','slug')->get();
        return view('admin.pages.portfolioDetail.add',$data);
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
                'banner_title'                          => 'nullable',
                'banner_short_desc'                     => 'nullable',
                'banner_image'                          => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'banner_btn_name'                       => 'nullable',
                'banner_btn_link'                       => 'nullable',
                'row_one_image'                         => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'row_one_logo'                          => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'row_one_title'                         => 'nullable',
                'row_one_description'                   => 'nullable',
                'row_one_btn_name'                      => 'nullable',
                'row_one_btn_link'                      => 'nullable',
                'gallery_title'                         => 'nullable',
                'gallery_short_desc'                    => 'nullable',
                'gallery_image_one'                     => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'gallery_image_two'                     => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'gallery_image_three'                   => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'gallery_image_one_title'               => 'nullable',
                'gallery_image_one_short_description'   => 'nullable',
                'gallery_image_two_title'               => 'nullable',
                'gallery_image_two_short_description'   => 'nullable',
                'gallery_image_three_title'             => 'nullable',
                'gallery_image_three_short_description' => 'nullable',
                'feature_one_title'                     => 'nullable',
                'feature_one_description'               => 'nullable',
                'feature_two_title'                     => 'nullable',
                'feature_two_description'               => 'nullable',
                'feature_three_title'                   => 'nullable',
                'feature_three_description'             => 'nullable',
                'feature_four_title'                    => 'nullable',
                'feature_four_description'              => 'nullable',

            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            // dd($request->all());
            $banner_image        = $request->banner_image;
            $row_one_image       = $request->row_one_image;
            $row_one_logo        = $request->row_one_logo;
            $gallery_image_one   = $request->gallery_image_one;
            $gallery_image_two   = $request->gallery_image_two;
            $gallery_image_three = $request->gallery_image_three;

            $uploadPath = storage_path('app/public/');

            $globalFunbanner_image  = isset($banner_image) ? Helper::singleImageUpload($banner_image, $uploadPath) : ['status' => 0];
            $globalFunrow_one_image = isset($row_one_image) ? Helper::singleImageUpload($row_one_image, $uploadPath) : ['status' => 0];
            $globalFunrow_one_logo  = isset($row_one_logo) ? Helper::singleImageUpload($row_one_logo, $uploadPath) : ['status' => 0];
            $globalFungallery_image_one   = isset($gallery_image_one) ? Helper::singleImageUpload($gallery_image_one, $uploadPath)  : ['status' => 0];
            $globalFungallery_image_two   = isset($gallery_image_two) ? Helper::singleImageUpload($gallery_image_two, $uploadPath)  : ['status' => 0];
            $globalFungallery_image_three = isset($gallery_image_three) ? Helper::singleImageUpload($gallery_image_three, $uploadPath) : ['status' =>  0];

            PortfolioDetails::create([
                'banner_title'                          => $request->banner_title,
                'category_id'                           => $request->category_id,
                'banner_short_desc'                     => $request->banner_short_desc,
                'banner_image'                          => $globalFunbanner_image['status'] == 1 ? $globalFunbanner_image['file_name'] : '',
                'banner_btn_name'                       => $request->banner_btn_name,
                'banner_btn_link'                       => $request->banner_btn_link,
                'row_one_image'                         => $globalFunrow_one_image['status'] == 1 ? $globalFunrow_one_image['file_name'] : '',
                'row_one_logo'                          => $globalFunrow_one_logo['status']  == 1 ? $globalFunrow_one_logo['file_name'] : '',
                'row_one_title'                         => $request->row_one_title,
                'row_one_description'                   => $request->row_one_description,
                'row_one_btn_name'                      => $request->row_one_btn_name,
                'row_one_btn_link'                      => $request->row_one_btn_link,
                'gallery_title'                         => $request->gallery_title,
                'gallery_short_desc'                    => $request->gallery_short_desc,
                'gallery_image_one'                     => $globalFungallery_image_one['status']   == 1 ? $globalFungallery_image_one['file_name']  : '',
                'gallery_image_two'                     => $globalFungallery_image_two['status']   == 1 ? $globalFungallery_image_two['file_name']  : '',
                'gallery_image_three'                   => $globalFungallery_image_three['status'] == 1 ? $globalFungallery_image_three['file_name'] : '',
                'gallery_image_one_title'               => $request->gallery_image_one_title,
                'gallery_image_one_short_description'   => $request->gallery_image_one_short_description,
                'gallery_image_two_title'               => $request->gallery_image_two_title,
                'gallery_image_two_short_description'   => $request->gallery_image_two_short_description,
                'gallery_image_three_title'             => $request->gallery_image_three_title,
                'gallery_image_three_short_description' => $request->gallery_image_three_short_description,
                'feature_one_title'                     => $request->feature_one_title,
                'feature_one_description'               => $request->feature_one_description,
                'feature_two_title'                     => $request->feature_two_title,
                'feature_two_description'               => $request->feature_two_description,
                'feature_three_title'                   => $request->feature_three_title,
                'feature_three_description'             => $request->feature_three_description,
                'feature_four_title'                    => $request->feature_four_title,
                'feature_four_description'              => $request->feature_four_description,
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
        $data['categories']=PortfolioCategory::latest('id','desc')->select('id','title','slug')->get();
        $data['portfolio']=PortfolioDetails::findOrFail($id);
        return view('admin.pages.portfolioDetail.edit', $data);
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
        $PortfolioDetails = PortfolioDetails::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'banner_title'                          => 'nullable',
                'banner_short_desc'                     => 'nullable',
                'banner_image'                          => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'banner_btn_name'                       => 'nullable',
                'banner_btn_link'                       => 'nullable',
                'row_one_image'                         => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'row_one_logo'                          => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'row_one_title'                         => 'nullable',
                'row_one_description'                   => 'nullable',
                'row_one_btn_name'                      => 'nullable',
                'row_one_btn_link'                      => 'nullable',
                'gallery_title'                         => 'nullable',
                'gallery_short_desc'                    => 'nullable',
                'gallery_image_one'                     => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'gallery_image_two'                     => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'gallery_image_three'                   => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'gallery_image_one_title'               => 'nullable',
                'gallery_image_one_short_description'   => 'nullable',
                'gallery_image_two_title'               => 'nullable',
                'gallery_image_two_short_description'   => 'nullable',
                'gallery_image_three_title'             => 'nullable',
                'gallery_image_three_short_description' => 'nullable',
                'feature_one_title'                     => 'nullable',
                'feature_one_description'               => 'nullable',
                'feature_two_title'                     => 'nullable',
                'feature_two_description'               => 'nullable',
                'feature_three_title'                   => 'nullable',
                'feature_three_description'             => 'nullable',
                'feature_four_title'                    => 'nullable',
                'feature_four_description'              => 'nullable',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $banner_image        = $request->banner_image;
            $row_one_image       = $request->row_one_image;
            $row_one_logo        = $request->row_one_logo;
            $gallery_image_one   = $request->gallery_image_one;
            $gallery_image_two   = $request->gallery_image_two;
            $gallery_image_three = $request->gallery_image_three;

            $uploadPath = storage_path('app/public/');

            $globalFunbanner_image        = isset($banner_image) ? Helper::singleImageUpload($banner_image, $uploadPath) : ['status' => 0];
            $globalFunrow_one_image       = isset($row_one_image) ? Helper::singleImageUpload($row_one_image, $uploadPath) : ['status' => 0];
            $globalFunrow_one_logo        = isset($row_one_logo) ? Helper::singleImageUpload($row_one_logo, $uploadPath) : ['status' => 0];
            $globalFungallery_image_one   = isset($gallery_image_one) ? Helper::singleImageUpload($gallery_image_one, $uploadPath)  : ['status' => 0];
            $globalFungallery_image_two   = isset($gallery_image_two) ? Helper::singleImageUpload($gallery_image_two, $uploadPath)  : ['status' => 0];
            $globalFungallery_image_three = isset($gallery_image_three) ? Helper::singleImageUpload($gallery_image_three, $uploadPath) : ['status' =>  0];


            if (!empty($PortfolioDetails)) {
                $images = [
                    'banner_image',
                    'row_one_image',
                    'row_one_logo',
                    'gallery_image_one',
                    'gallery_image_two',
                    'gallery_image_three'
                ];

                foreach ($images as $image) {
                    $globalFunImage = 'globalFun' . $image;

                    if ($$globalFunImage['status'] == 1) {
                        $imagePath = public_path('storage/' . $PortfolioDetails->$image);
                        $requestImagePath = public_path('storage/' . $PortfolioDetails->$image);
                        $thumbPath = public_path('storage/thumb/' . $PortfolioDetails->$image);

                        if (File::exists($imagePath)) {
                            File::delete($imagePath);
                        }
                        if (File::exists($requestImagePath)) {
                            File::delete($requestImagePath);
                        }
                        if (File::exists($thumbPath)) {
                            File::delete($thumbPath);
                        }
                    }
                }


                $PortfolioDetails->update([
                    'banner_title'                          => $request->banner_title,
                    'category_id'                          => $request->category_id,
                    'banner_short_desc'                     => $request->banner_short_desc,
                    'banner_image'                 => $globalFunbanner_image['status'] == 1 ? $globalFunbanner_image['file_name'] : $PortfolioDetails->banner_image,
                    'banner_btn_name'                       => $request->banner_btn_name,
                    'banner_btn_link'                       => $request->banner_btn_link,
                    'row_one_image'                => $globalFunrow_one_image['status'] == 1 ? $globalFunrow_one_image['file_name'] : $PortfolioDetails->row_one_image,
                    'row_one_logo'                 => $globalFunrow_one_logo['status'] == 1 ? $globalFunrow_one_logo['file_name'] : $PortfolioDetails->row_one_logo,
                    'row_one_title'                         => $request->row_one_title,
                    'row_one_description'                   => $request->row_one_description,
                    'row_one_btn_name'                      => $request->row_one_btn_name,
                    'row_one_btn_link'                      => $request->row_one_btn_link,
                    'gallery_title'                         => $request->gallery_title,
                    'gallery_short_desc'                    => $request->gallery_short_desc,
                    'gallery_image_one'            => $globalFungallery_image_one['status'] == 1 ? $globalFungallery_image_one['file_name'] : $PortfolioDetails->gallery_image_one,
                    'gallery_image_two'            => $globalFungallery_image_two['status'] == 1 ? $globalFungallery_image_two['file_name'] : $PortfolioDetails->gallery_image_two,
                    'gallery_image_three'          => $globalFungallery_image_three['status'] == 1 ? $globalFungallery_image_three['file_name'] : $PortfolioDetails->gallery_image_three,
                    'gallery_image_one_title'               => $request->gallery_image_one_title,
                    'gallery_image_one_short_description'   => $request->gallery_image_one_short_description,
                    'gallery_image_two_title'               => $request->gallery_image_two_title,
                    'gallery_image_two_short_description'   => $request->gallery_image_two_short_description,
                    'gallery_image_three_title'             => $request->gallery_image_three_title,
                    'gallery_image_three_short_description' => $request->gallery_image_three_short_description,
                    'feature_one_title'                     => $request->feature_one_title,
                    'feature_one_description'               => $request->feature_one_description,
                    'feature_two_title'                     => $request->feature_two_title,
                    'feature_two_description'               => $request->feature_two_description,
                    'feature_three_title'                   => $request->feature_three_title,
                    'feature_three_description'             => $request->feature_three_description,
                    'feature_four_title'                    => $request->feature_four_title,
                    'feature_four_description'              => $request->feature_four_description,
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
        $PortfolioDetails = PortfolioDetails::find($id);
        $images = [
            $PortfolioDetails->banner_image,
            $PortfolioDetails->row_one_image,
            $PortfolioDetails->row_one_logo,
            $PortfolioDetails->gallery_image_one,
            $PortfolioDetails->gallery_image_two,
            $PortfolioDetails->gallery_image_three
        ];

        foreach ($images as $image) {
            if (File::exists(public_path('storage/') . $image)) {
                File::delete(public_path('storage/') . $image);
            }
            if (File::exists(public_path('storage/') . $image)) {
                File::delete(public_path('storage/') . $image);
            }
            if (File::exists(public_path('storage/thumb/') . $image)) {
                File::delete(public_path('storage/thumb/') . $image);
            }
        }

        $PortfolioDetails->delete();
    }
}
