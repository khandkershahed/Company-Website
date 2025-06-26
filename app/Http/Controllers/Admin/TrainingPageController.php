<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TrainingPage;
use Illuminate\Http\Request;
use App\Models\Admin\Row;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Helper;

class TrainingPageController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['trainingPages'] = TrainingPage::orderBy('id','DESC')->select('id')->get();
        return view('admin.pages.trainingPage.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rows'] = Row::orderBy('id','DESC')->select('rows.id', 'rows.title')->whereNotNull('image')->get();
        return view('admin.pages.trainingPage.add', $data);
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
                'banner_image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                'row_two_image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'banner_image.required' => 'The banner image is required.',
                'banner_image.image' => 'The banner image must be a valid image.',
                'banner_image.mimes' => 'The banner image must be a file of type: PNG - JPEG - JPG.',
                'banner_image.max' => 'The banner image may not be greater than 5000 kilobytes.',

                'row_two_image.required' => 'The row two image is required.',
                'row_two_image.image' => 'The row two image must be a valid image.',
                'row_two_image.mimes' => 'The row two image must be a file of type: PNG - JPEG - JPG.',
                'row_two_image.max' => 'The row two image may not be greater than 5000 kilobytes.',
            ]
        );

        if ($validator->passes()) {
            $backgroundImage = $request->background_image;
            $bannerImage = $request->banner_image;
            $rowTwoImage = $request->row_two_image;
            $uploadPath = storage_path('app/public/');

            if (!empty($bannerImage)) {
                $globalFunBannerImage = Helper::customUpload($bannerImage, $uploadPath, 270, 320);
           } else {
                $globalFunBannerImage = ['status' => 0];
            }
            if (!empty($backgroundImage)) {
                $globalFunBackgroundImage = Helper::customUpload($backgroundImage, $uploadPath, 270, 320);
           } else {
                $globalFunBackgroundImage = ['status' => 0];
            }
            if (!empty($rowTwoImage)) {
                $globalFunRowTwoImage = Helper::customUpload($rowTwoImage, $uploadPath, 270, 320);
            } else {
                $globalFunRowTwoImage = ['status' => 0];
            }
            if (!empty($rowTwoImage)) {
                $globalFunRowTwoImage = Helper::customUpload($rowTwoImage, $uploadPath, 270, 320);
            } else {
                $globalFunRowTwoImage = ['status' => 0];
            }

            TrainingPage::create([
                'banner_image'                => $globalFunBannerImage['status'] == 1 ? $bannerImage->hashName() : null,
                'row_one_id'                  => $request->row_one_id,
                'row_two_title'               => $request->row_two_title,
                'row_two_short_description'   => $request->row_two_short_description,
                'row_two_btn_name'            => $request->row_two_btn_name,
                'row_two_btn_link'            => $request->row_two_btn_link,
                'row_two_image'               => $globalFunRowTwoImage['status'] == 1 ? $rowTwoImage->hashName() : null,
                'row_two_tab_one_id'          => $request->row_two_tab_one_id,
                'row_two_tab_two_id'          => $request->row_two_tab_two_id,
                'row_two_tab_three_id'        => $request->row_two_tab_three_id,
                'row_two_tab_four_id'         => $request->row_two_tab_four_id,

                'background_image'            => $globalFunBackgroundImage['status'] == 1 ? $backgroundImage->hashName() : null,
                'row_five_id'                  => $request->row_five_id,
                'row_seven_title'             => $request->row_seven_title,

                'banner_title'                => $request->banner_title,
                'banner_short_description'    => $request->banner_short_description,
                'banner_btn_name'             => $request->banner_btn_name,
                'banner_btn_link'             => $request->banner_btn_link,
                'row_four_title'              => $request->row_four_title,
                'row_four_sub_title'          => $request->row_four_sub_title,
                'row_four_short_description'  => $request->row_four_short_description,
                'row_four_video_link'         => $request->row_four_video_link,
                'row_four_btn_name'           => $request->row_four_btn_name,
                'row_four_btn_link'           => $request->row_four_btn_link,
                'row_five_title'              => $request->row_five_title,
                'row_five_short_description'  => $request->row_five_short_description,
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
        $data['trainingPage'] = TrainingPage::find($id);
        $data['rows'] = Row::orderBy('id','DESC')->select('rows.id', 'rows.title')->whereNotNull('image')->get();
        return view('admin.pages.trainingPage.edit', $data);
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
                'row_two_image' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
            ],
            [
                'banner_image.image' => 'The banner image must be a valid image.',
                'banner_image.mimes' => 'The banner image must be a file of type: PNG - JPEG - JPG.',
                'banner_image.max' => 'The banner image may not be greater than 5000 kilobytes.',

                'row_two_image.image' => 'The row two image must be a valid image.',
                'row_two_image.mimes' => 'The row two image must be a file of type: PNG - JPEG - JPG.',
                'row_two_image.max' => 'The row two image may not be greater than 5000 kilobytes.',
            ]
        );
        $trainingPage = TrainingPage::find($id);

        if ($validator->passes()) {
            $bannerImage = $request->banner_image;
            $backgroundImage = $request->background_image;
            $rowTwoImage = $request->row_two_image;
            $uploadPath = storage_path('app/public/');

            if (!empty($bannerImage)) {
                // Call external helper function which resizes and saves the image file in the designated folder
                $globalFunBannerImage = Helper::customUpload($bannerImage, $uploadPath, 380, 210);

                // Delete old logo files stored on disk
                $paths = [
                    storage_path("app/public/{$trainingPage->banner_image}"),
                    storage_path("app/public/{$trainingPage->banner_image}")
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
            if (!empty($backgroundImage)) {
                // Call external helper function which resizes and saves the image file in the designated folder
                $globalFunBackgroundImage = Helper::customUpload($backgroundImage, $uploadPath, 380, 210);

                // Delete old logo files stored on disk
                $paths = [
                    storage_path("app/public/{$trainingPage->background_image}"),
                    storage_path("app/public/{$trainingPage->background_image}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                // Set status of logo image to 0 if no image file was uploaded
                $globalFunBackgroundImage = ['status' => 0];
            }
            if (!empty($rowTwoImage)) {
                // Call external helper function which resizes and saves the image file in the designated folder
                $globalFunRowTwoImage = Helper::customUpload($rowTwoImage, $uploadPath, 380, 210);

                // Delete old logo files stored on disk
                $paths = [
                    storage_path("app/public/{$trainingPage->row_two_image}"),
                    storage_path("app/public/{$trainingPage->row_two_image}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                // Set status of logo image to 0 if no image file was uploaded
                $globalFunRowTwoImage = ['status' => 0];
            }

            $trainingPage->update([
                'banner_image'                => $globalFunBannerImage['status'] == 1 ? $bannerImage->hashName() : $trainingPage->banner_image,
                'row_one_id'                  => $request->row_one_id,
                'row_two_title'               => $request->row_two_title,
                'row_two_short_description'   => $request->row_two_short_description,
                'row_two_btn_name'            => $request->row_two_btn_name,
                'row_two_btn_link'            => $request->row_two_btn_link,
                'row_two_image'               => $globalFunRowTwoImage['status'] == 1 ? $rowTwoImage->hashName() : $trainingPage->row_two_image,
                'row_two_tab_one_id'          => $request->row_two_tab_one_id,
                'row_two_tab_two_id'          => $request->row_two_tab_two_id,
                'row_two_tab_three_id'        => $request->row_two_tab_three_id,
                'row_two_tab_four_id'         => $request->row_two_tab_four_id,

                'background_image'            => $globalFunBackgroundImage['status'] == 1 ? $backgroundImage->hashName() : $trainingPage->background_image,
                'row_seven_title'             => $request->row_seven_title,

                'row_five_id'                  => $request->row_five_id,
                'banner_title'                => $request->banner_title,
                'banner_short_description'    => $request->banner_short_description,
                'banner_btn_name'             => $request->banner_btn_name,
                'banner_btn_link'             => $request->banner_btn_link,

                'row_four_title'              => $request->row_four_title,
                'row_four_sub_title'          => $request->row_four_sub_title,
                'row_four_short_description'  => $request->row_four_short_description,
                'row_four_video_link'         => $request->row_four_video_link,
                'row_four_btn_name'           => $request->row_four_btn_name,
                'row_four_btn_link'           => $request->row_four_btn_link,
                'row_five_title'              => $request->row_five_title,
                'row_five_short_description'  => $request->row_five_short_description,
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
        $trainingPage = TrainingPage::find($id);

        if ($trainingPage) {
            // Array of image attributes to delete
            $imageAttributes = [
                'banner_image',
                'background_image',
                'row_two_image'
            ];

            foreach ($imageAttributes as $attribute) {
                // Paths to check and delete
                $paths = [
                    storage_path('app/public/') . $trainingPage->$attribute,
                    storage_path('app/public/') . $trainingPage->$attribute
                ];

                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        }


        $trainingPage->delete();
    }
}
