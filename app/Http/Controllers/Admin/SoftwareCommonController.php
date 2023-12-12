<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Row;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\SoftwareInfoPage;
use Illuminate\Support\Facades\Validator;

class SoftwareCommonController extends Controller
{
    public function index()
    {
        $data['softwareCommons'] = SoftwareInfoPage::where('type','common')->orderBy('id','DESC')->select('id')->get();
        return view('admin.pages.softwareCommon.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rows'] = Row::orderBy('id','DESC')->select('rows.id', 'rows.title')->whereNotNull('image')->get();
        return view('admin.pages.softwareCommon.add', $data);
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
                'row_four_video_link' => 'required',
                'banner_image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                'row_six_image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'banner_image.required' => 'The banner image is required.',
                'banner_image.image' => 'The banner image must be a valid image.',
                'banner_image.mimes' => 'The banner image must be a file of type: PNG - JPEG - JPG.',
                'banner_image.max' => 'The banner image may not be greater than 5000 kilobytes.',

                'row_six_image.required' => 'The row six image is required.',
                'row_six_image.image' => 'The row six image must be a valid image.',
                'row_six_image.mimes' => 'The row six image must be a file of type: PNG - JPEG - JPG.',
                'row_six_image.max' => 'The row six image may not be greater than 5000 kilobytes.',
            ]
        );

        if ($validator->passes()) {
            $bannerImage = $request->banner_image;
            $rowSixImage = $request->row_six_image;
            $uploadPath = storage_path('app/public/');

            if (!empty($bannerImage)) {
                $globalFunBannerImage = Helper::customUpload($bannerImage, $uploadPath, 270, 320);
           } else {
                $globalFunBannerImage = ['status' => 0];
            }
            if (!empty($rowSixImage)) {
                $globalFunRowSixImage = Helper::customUpload($rowSixImage, $uploadPath, 270, 320);
            } else {
                $globalFunRowSixImage = ['status' => 0];
            }

            SoftwareInfoPage::create([
                'row_five_tab_one_id'         => $request->row_five_tab_one_id,
                'row_five_tab_two_id'         => $request->row_five_tab_two_id,
                'row_five_tab_three_id'       => $request->row_five_tab_three_id,
                'row_five_tab_four_id'        => $request->row_five_tab_four_id,
                'banner_image'                => $globalFunBannerImage['status'] == 1 ? $bannerImage->hashName() : null,
                'banner_title'                => $request->banner_title,
                'type'                        => 'common',
                'banner_short_description'    => $request->banner_short_description,
                'banner_btn_name'             => $request->banner_btn_name,
                'banner_btn_link'             => $request->banner_btn_link,
                'row_two_title'               => $request->row_two_title,
                'row_two_short_description'   => $request->row_two_short_description,
                'row_four_title'              => $request->row_four_title,
                'row_four_sub_title'          => $request->row_four_sub_title,
                'row_four_short_description'  => $request->row_four_short_description,
                'row_four_video_link'         => $request->row_four_video_link,
                'row_four_btn_name'           => $request->row_four_btn_name,
                'row_four_btn_link'           => $request->row_four_btn_link,
                'row_five_title'              => $request->row_five_title,
                'row_five_short_description'  => $request->row_five_short_description,
                'row_six_title'               => $request->row_six_title,
                'row_six_short_description'   => $request->row_six_short_description,
                'row_six_btn_name'            => $request->row_six_btn_name,
                'row_six_btn_link'            => $request->row_six_btn_link,
                'row_six_image'               => $globalFunRowSixImage['status'] == 1 ? $rowSixImage->hashName() : null,
                'row_seven_title'             => $request->row_seven_title,
                'row_eight_title'             => $request->row_eight_title,
                'row_eight_short_description' => $request->row_eight_short_description,
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
        $data['softwareCommon'] = SoftwareInfoPage::find($id);
        $data['rows'] = Row::orderBy('id','DESC')->select('rows.id', 'rows.title')->whereNotNull('image')->get();
        return view('admin.pages.softwareCommon.edit', $data);
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
        $validator = Validator::make(
            $request->all(),
            [
                'banner_image' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
                'row_six_image' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'banner_image.image' => 'The banner image must be a valid image.',
                'banner_image.mimes' => 'The banner image must be a file of type: PNG - JPEG - JPG.',
                'banner_image.max' => 'The banner image may not be greater than 5000 kilobytes.',

                'row_six_image.image' => 'The row six image must be a valid image.',
                'row_six_image.mimes' => 'The row six image must be a file of type: PNG - JPEG - JPG.',
                'row_six_image.max' => 'The row six image may not be greater than 5000 kilobytes.',
            ]
        );

        $softwareCommon = SoftwareInfoPage::find($id);

        if ($validator->passes()) {
            $bannerImage = $request->banner_image;
            $rowSixImage = $request->row_six_image;
            $uploadPath = storage_path('app/public/');

            if (!empty($bannerImage)) {
                // Call external helper function which resizes and saves the image file in the designated folder
                $globalFunBannerImage = Helper::customUpload($bannerImage, $uploadPath, 380, 210);

                // Delete old logo files stored on disk
                $paths = [
                    storage_path("app/public/{$softwareCommon->banner_image}"),
                    storage_path("app/public/requestImg/{$softwareCommon->banner_image}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                // Set status of logo image to 0 if no image file was uploaded
                $globalFunBannerImage = ['status' => 0];
            }
            if (!empty($rowSixImage)) {
                // Call external helper function which resizes and saves the image file in the designated folder
                $globalFunRowSixImage = Helper::customUpload($rowSixImage, $uploadPath, 380, 210);

                // Delete old logo files stored on disk
                $paths = [
                    storage_path("app/public/{$softwareCommon->row_six_image}"),
                    storage_path("app/public/requestImg/{$softwareCommon->row_six_image}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                // Set status of logo image to 0 if no image file was uploaded
                $globalFunRowSixImage = ['status' => 0];
            }

            $softwareCommon->update([
                'row_five_tab_one_id'         => $request->row_five_tab_one_id,
                'row_five_tab_two_id'         => $request->row_five_tab_two_id,
                'row_five_tab_three_id'       => $request->row_five_tab_three_id,
                'row_five_tab_four_id'        => $request->row_five_tab_four_id,
                'banner_image'                => $globalFunBannerImage['status'] == 1 ? $bannerImage->hashName() : $softwareCommon->banner_image,
                'banner_title'                => $request->banner_title,
                'banner_short_description'    => $request->banner_short_description,
                'banner_btn_name'             => $request->banner_btn_name,
                'banner_btn_link'             => $request->banner_btn_link,
                'row_two_title'               => $request->row_two_title,
                'row_two_short_description'   => $request->row_two_short_description,
                'row_four_title'              => $request->row_four_title,
                'row_four_sub_title'          => $request->row_four_sub_title,
                'row_four_short_description'  => $request->row_four_short_description,
                'row_four_video_link'         => $request->row_four_video_link,
                'row_four_btn_name'           => $request->row_four_btn_name,
                'row_four_btn_link'           => $request->row_four_btn_link,
                'row_five_title'              => $request->row_five_title,
                'row_five_short_description'  => $request->row_five_short_description,
                'row_six_title'               => $request->row_six_title,
                'row_six_short_description'   => $request->row_six_short_description,
                'row_six_btn_name'            => $request->row_six_btn_name,
                'row_six_btn_link'            => $request->row_six_btn_link,
                'row_six_image'               => $globalFunRowSixImage['status'] == 1 ? $rowSixImage->hashName() : $softwareCommon->row_six_image,
                'row_seven_title'             => $request->row_seven_title,
                'row_eight_title'             => $request->row_eight_title,
                'row_eight_short_description' => $request->row_eight_short_description,
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
        $softwareCommon = SoftwareInfoPage::find($id);

        //banner_image
        $paths = [
            storage_path('app/public/') . $softwareCommon->banner_image,
            storage_path('app/public/requestImg/') . $softwareCommon->banner_image
        ];

        // Delete any existing logo and requestImg images
        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $paths = [
            storage_path('app/public/') . $softwareCommon->row_six_image,
            storage_path('app/public/requestImg/') . $softwareCommon->row_six_image
        ];

        // Delete any existing logo and requestImg images
        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }


        $softwareCommon->delete();
    }
}
