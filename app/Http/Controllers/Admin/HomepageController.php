<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Client;
use Illuminate\Http\Request;
use App\Models\Admin\Success;
use App\Models\Admin\Homepage;
use App\Models\Admin\ClientStory;
use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use App\Models\Admin\TechGlossy;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homes'] = Homepage::orderBy('id','DESC')->select('id')->get();
        return view('admin.pages.homepage.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['client_experiences'] = Feature::latest()->get();
        $data['storys'] = ClientStory::all();
        $data['successes'] = Success::all();
        $data['techglossys'] = TechGlossy::all();
        return view('admin.pages.homepage.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        Helper::imageDirectory();
        $validator = Validator::make(

            $request->all(),
            [

                'branner1' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'branner2' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'branner3' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'header1'  => 'required|max:400',
                        'header2'  => 'required|max:400',

            ]

        );

        if ($validator->passes()) {
            $bannerOneMainFile = $request->branner1;
            $bannertwoMainFile = $request->branner2;
            $bannerthreeMainFile = $request->branner3;
            $uploadPath = storage_path('app/public/');
            if (isset($bannerOneMainFile)) {
                $globalFunImgBannerOne = Helper::singleImageUpload($bannerOneMainFile, $uploadPath);
            } else {
                $globalFunImgBannerOne = ['status' => 0];
            }

            if (isset($bannertwoMainFile)) {
                $globalFunBannerTwo = Helper::singleImageUpload($bannertwoMainFile, $uploadPath);
            } else {
                $globalFunBannerTwo = ['status' => 0];
            }
            if (isset($bannerthreeMainFile)) {
                $globalFunBannerThree = Helper::singleImageUpload($bannerthreeMainFile, $uploadPath);
            } else {
                $globalFunBannerThree = ['status' => 0];
            }
            Homepage::create([
                'banner1_title'             => $request->banner1_title,
                'banner1_short_description' => $request->banner1_short_description,
                'banner1_button_name'       => $request->banner1_button_name,
                'banner1_button_link'       => $request->banner1_button_link,
                'banner2_title'             => $request->banner2_title,
                'banner2_short_description' => $request->banner2_short_description,
                'banner2_button_name'       => $request->banner2_button_name,
                'banner2_button_link'       => $request->banner2_button_link,
                'banner3_title'             => $request->banner3_title,
                'banner3_short_description' => $request->banner3_short_description,
                'banner3_button_name'       => $request->banner3_button_name,
                'banner3_button_link'       => $request->banner3_button_link,
                'header1'                   => $request->header1,
                'header2'                   => $request->header2,
                'btn1_title'                => $request->btn1_title,
                'btn1_name'                 => $request->btn1_name,
                'btn1_link'                 => $request->btn1_link,
                'btn2_title'                => $request->btn2_title,
                'btn2_name'                 => $request->btn2_name,
                'btn2_link'                 => $request->btn2_link,
                'story1_id'                 => $request->story1_id,
                'story2_id'                 => $request->story2_id,
                'story3_id'                 => $request->story3_id,
                'story4_id'                 => $request->story4_id,
                'story5_id'                 => $request->story5_id,
                'solution1_id'              => $request->solution1_id,
                'solution2_id'              => $request->solution2_id,
                'solution3_id'              => $request->solution3_id,
                'solution4_id'              => $request->solution4_id,
                'techglossy_id'             => $request->techglossy_id,
                'success1_id'               => $request->success1_id,
                'success2_id'               => $request->success2_id,
                'success3_id'               => $request->success3_id,
                'branner1'                  => $globalFunImgBannerOne['status'] == 1 ? $globalFunImgBannerOne['file_name']: '',
                'branner2'                  => $globalFunBannerTwo['status']    == 1 ? $globalFunBannerTwo['file_name']   : '',
                'branner3'                  => $globalFunBannerThree['status']  == 1 ? $globalFunBannerThree['file_name'] : '',
            ]);
            Toastr::success('data has been created');
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
        $data['client_experiences'] = Feature::latest()->get();
        $data['storys'] = ClientStory::all();
        $data['successes'] = Success::all();
        $data['techglossys'] = TechGlossy::all();
        $data['homePage'] = Homepage::find($id);
        return view('admin.pages.homepage.edit', $data);
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
        // dd($request->all());

        $homepage = Homepage::find($id);
        if (!empty($homepage)) {
            $validator =
                [
                    [
                        'branner1' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'branner2' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'branner3' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'header1'  => 'required|max:400',
                        'header2'  => 'required|max:400',
                    ]
                ];
        } else {
            $validator =
                [
                    [
                        'branner1' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'branner2' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'branner3' => 'required|image|mimes:png,jpg,jpeg|max:5000',
                        'header1'  => 'required|max:400',
                        'header2'  => 'required|max:400',
                    ]
                ];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $bannerOneMainFile = $request->branner1;
            $bannertwoMainFile = $request->branner2;
            $bannerthreeMainFile = $request->branner3;
            $uploadPath = storage_path('app/public/');
            if (isset($bannerOneMainFile)) {
                $globalFunImgBannerOne = Helper::singleImageUpload($bannerOneMainFile, $uploadPath);
            } else {
                $globalFunImgBannerOne = ['status' => 0];
            }

            if (isset($bannertwoMainFile)) {
                $globalFunBannerTwo = Helper::singleImageUpload($bannertwoMainFile, $uploadPath);
            } else {
                $globalFunBannerTwo = ['status' => 0];
            }
            if (isset($bannerthreeMainFile)) {
                $globalFunBannerThree = Helper::singleImageUpload($bannerthreeMainFile, $uploadPath);
            } else {
                $globalFunBannerThree = ['status' => 0];
            }

            if ($globalFunImgBannerOne['status'] == 1) {
                File::delete(public_path('storage/') . $homepage->branner1);
                File::delete(public_path('storage/') . $homepage->branner1);
                File::delete(public_path('storage/thumb/') . $homepage->branner1);
            }
            if ($globalFunBannerTwo['status'] == 1) {
                File::delete(public_path('storage/') . $homepage->branner2);
                File::delete(public_path('storage/') . $homepage->branner2);
                File::delete(public_path('storage/thumb/') . $homepage->branner2);
            }
            if ($globalFunBannerThree['status'] == 1) {
                File::delete(public_path('storage/') . $homepage->branner3);
                File::delete(public_path('storage/') . $homepage->branner3);
                File::delete(public_path('storage/thumb/') . $homepage->branner3);
            }

            $homepage->update([
                'banner1_title'             => $request->banner1_title,
                'banner1_short_description' => $request->banner1_short_description,
                'banner1_button_name'       => $request->banner1_button_name,
                'banner1_button_link'       => $request->banner1_button_link,
                'banner2_title'             => $request->banner2_title,
                'banner2_short_description' => $request->banner2_short_description,
                'banner2_button_name'       => $request->banner2_button_name,
                'banner2_button_link'       => $request->banner2_button_link,
                'banner3_title'             => $request->banner3_title,
                'banner3_short_description' => $request->banner3_short_description,
                'banner3_button_name'       => $request->banner3_button_name,
                'banner3_button_link'       => $request->banner3_button_link,
                'header1'                   => $request->header1,
                'header2'                   => $request->header2,
                'btn1_title'                => $request->btn1_title,
                'btn1_name'                 => $request->btn1_name,
                'btn1_link'                 => $request->btn1_link,
                'btn2_title'                => $request->btn2_title,
                'btn2_name'                 => $request->btn2_name,
                'btn2_link'                 => $request->btn2_link,
                'story1_id'                 => $request->story1_id,
                'story2_id'                 => $request->story2_id,
                'story3_id'                 => $request->story3_id,
                'story4_id'                 => $request->story4_id,
                'story5_id'                 => $request->story5_id,
                'solution1_id'              => $request->solution1_id,
                'solution2_id'              => $request->solution2_id,
                'solution3_id'              => $request->solution3_id,
                'solution4_id'              => $request->solution4_id,
                'techglossy_id'             => $request->techglossy_id,
                'success1_id'               => $request->success1_id,
                'success2_id'               => $request->success2_id,
                'success3_id'               => $request->success3_id,
                'branner1'                  => $globalFunImgBannerOne['status'] == 1 ? $globalFunImgBannerOne['file_name']: $homepage->branner1,
                'branner2'                  => $globalFunBannerTwo['status']    == 1 ? $globalFunBannerTwo['file_name']   : $homepage->branner2,
                'branner3'                  => $globalFunBannerThree['status']  == 1 ? $globalFunBannerThree['file_name'] : $homepage->branner3,


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
        $homepage = Homepage::find($id);

        if (File::exists(public_path('storage/') . $homepage->image)) {
            File::delete(public_path('storage/') . $homepage->image);
        }
        if (File::exists(public_path('storage/') . $homepage->image)) {
            File::delete(public_path('storage/') . $homepage->image);
        }
        if (File::exists(public_path('storage/thumb/') . $homepage->image)) {
            File::delete(public_path('storage/thumb/') . $homepage->image);
        }
        $homepage->delete();
    }
}
