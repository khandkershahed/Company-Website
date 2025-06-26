<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Admin\LearnMore;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LearnMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['learnMores'] = LearnMore::orderBy('id','DESC')->select('learn_mores.id')->get();
        return view('admin.pages.learnMore.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['storys'] =  DB::table('client_stories')->get();
        return view('admin.pages.learnMore.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'badge'                  => 'required',
                'title'                  => 'required',
                'header_one'             => 'required',
                'header_two'             => 'required',
                'box_one_title'          => 'required',
                'box_one_short_des'      => 'required',
                'box_one_link'           => 'required',
                'box_two_title'          => 'required',
                'box_two_short_des'      => 'required',
                'box_two_link'           => 'required',
                'box_three_title'        => 'required',
                'box_three_short_des'    => 'required',
                'box_three_link'         => 'required',
                'success_story_title'    => 'required',
                // 'success_story_one_id'   => 'required',
                // 'success_story_two_id'   => 'required',
                // 'success_story_three_id' => 'required',
                'consult_title'          => 'required',
                'consult_short_des'      => 'required',
                'industry_header'        => 'required',
                'image_banner'       => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'background_image'      => 'required|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ],

        );

        if ($validator->passes()) {
            $imageBanner = $request->image_banner;
            $background_image = $request->background_image;
            $uploadPath = storage_path('app/public/');
            if (isset($imageBanner)) {
                $globalFunImgBanner = Helper::singleImageUpload($imageBanner, $uploadPath, 1800, 525);
            } else {
                $globalFunImgBanner = ['status' => 0];
            }

            if (isset($background_image)) {
                $globalFunBGImage = Helper::singleImageUpload($background_image, $uploadPath, 1500, 1000);
            } else {
                $globalFunBGImage = ['status' => 0];
            }
            LearnMore::create([
                'image_banner'           => $globalFunImgBanner['status'] == 1 ? $globalFunImgBanner['file_name'] : '',
                'background_image'       => $globalFunBGImage['status']   == 1 ? $globalFunBGImage['file_name']  : '',
                'badge'                  => $request->badge,
                'title'                  => $request->title,
                'header_one'             => $request->header_one,
                'header_two'             => $request->header_two,
                'box_one_title'          => $request->box_one_title,
                'box_one_short_des'      => $request->box_one_short_des,
                'box_one_link'           => $request->box_one_link,
                'box_two_title'          => $request->box_two_title,
                'box_two_short_des'      => $request->box_two_short_des,
                'box_two_link'           => $request->box_two_link,
                'box_three_title'        => $request->box_three_title,
                'box_three_short_des'    => $request->box_three_short_des,
                'box_three_link'         => $request->box_three_link,
                'success_story_title'    => $request->success_story_title,
                'success_story_one_id'   => $request->success_story_one_id,
                'success_story_two_id'   => $request->success_story_two_id,
                'success_story_three_id' => $request->success_story_three_id,
                'footer'                 => $request->footer,
                'consult_title'          => $request->consult_title,
                'consult_short_des'      => $request->consult_short_des,
                'industry_header'        => $request->industry_header,

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
        $data['learnMore'] = LearnMore::find($id);
        $data['storys'] =  DB::table('client_stories')->get();
        return view('admin.pages.learnMore.edit', $data);
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
        $learnMore = LearnMore::find($id);
        if (!empty($learnMore)) {

            $image_bannerMainFile  = $request->image_banner;
            $background_imageMainFile = $request->background_image;
            $uploadPath    = storage_path('app/public/');
            if (isset($image_bannerMainFile)) {
                $globalFunImgimage_banner = Helper::singleImageUpload($image_bannerMainFile, $uploadPath, 230, 227);
            } else {
                $globalFunImgimage_banner = ['status' => 0];
            }

            if (isset($background_imageMainFile)) {
                $globalFunbackground_image = Helper::singleImageUpload($background_imageMainFile, $uploadPath, 230, 227);
            } else {
                $globalFunbackground_image = ['status' => 0];
            }

            if ($globalFunImgimage_banner['status'] == 1) {
                File::delete(public_path('storage/') . $learnMore->image_banner);
                File::delete(public_path('storage/') . $learnMore->image_banner);
                File::delete(public_path('storage/thumb/') . $learnMore->image_banner);
            }
            if ($globalFunbackground_image['status'] == 1) {
                File::delete(public_path('storage/') . $learnMore->background_image);
                File::delete(public_path('storage/') . $learnMore->background_image);
                File::delete(public_path('storage/thumb/') . $learnMore->background_image);
            }

            $learnMore->update([
                'image_banner'       => $globalFunImgimage_banner['status'] == 1 ? $globalFunImgimage_banner['file_name'] : $learnMore->image_banner,
                'background_image'      => $globalFunbackground_image['status']   == 1 ? $globalFunbackground_image['file_name']  : $learnMore->background_image,
                'badge'                  => $request->badge,
                'title'                  => $request->title,
                'header_one'             => $request->header_one,
                'header_two'             => $request->header_two,
                'box_one_title'          => $request->box_one_title,
                'box_one_short_des'      => $request->box_one_short_des,
                'box_one_link'           => $request->box_one_link,
                'box_two_title'          => $request->box_two_title,
                'box_two_short_des'      => $request->box_two_short_des,
                'box_two_link'           => $request->box_two_link,
                'box_three_title'        => $request->box_three_title,
                'box_three_short_des'    => $request->box_three_short_des,
                'box_three_link'         => $request->box_three_link,
                'success_story_title'    => $request->success_story_title,
                'success_story_one_id'   => $request->success_story_one_id,
                'success_story_two_id'   => $request->success_story_two_id,
                'success_story_three_id' => $request->success_story_three_id,
                'footer'                 => $request->footer,
                'consult_title'          => $request->consult_title,
                'consult_short_des'      => $request->consult_short_des,
                'industry_header'        => $request->industry_header,

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
        $learnMore = LearnMore::find($id);

        //image_banner
        if (File::exists(public_path('storage/') . $learnMore->image_banner)) {
            File::delete(public_path('storage/') . $learnMore->image_banner);
        }
        if (File::exists(public_path('storage/') . $learnMore->image_banner)) {
            File::delete(public_path('storage/') . $learnMore->image_banner);
        }
        if (File::exists(public_path('storage/thumb/') . $learnMore->image_banner)) {
            File::delete(public_path('storage/thumb/') . $learnMore->image_banner);
        }

        //background_image
        if (File::exists(public_path('storage/') . $learnMore->background_image)) {
            File::delete(public_path('storage/') . $learnMore->background_image);
        }
        if (File::exists(public_path('storage/') . $learnMore->background_image)) {
            File::delete(public_path('storage/') . $learnMore->background_image);
        }
        if (File::exists(public_path('storage/thumb/') . $learnMore->background_image)) {
            File::delete(public_path('storage/thumb/') . $learnMore->background_image);
        }
        $learnMore->delete();
    }
}
