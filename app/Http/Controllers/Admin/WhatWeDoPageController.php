<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Row;
use Illuminate\Http\Request;
use App\Models\Admin\WhatWeDoPage;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WhatWeDoPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['whatWeDoPages'] = WhatWeDoPage::latest('id','desc')->get();
        return view('admin.pages.whatWeDoPage.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rows'] = Row::latest('id','desc')->select('rows.id', 'rows.title')->get();
        return view('admin.pages.whatWeDoPage.add', $data);
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
                'row_one_header' => 'required',
                'row_one_image'   => 'nullable|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes'  => 'The :attribute must be a file of type: png - jpeg - jpg',
                'unique' => 'This Brand has already been taken.',
            ],
        );

        if ($validator->passes()) {

            $row_one_image = $request->row_one_image;
            $uploadPath = storage_path('app/public/');

            if (isset($row_one_image)) {
                $globalFunRowOneImage = Helper::customUpload($row_one_image, $uploadPath, 320, 270);
            } else {
                $globalFunRowOneImage = ['status' => 0];
            }
            WhatWeDoPage::create([
                'row_three_id'              => $request->row_three_id,
                'row_two_id'                => $request->row_two_id,
                'bannner_title'             => $request->bannner_title,
                'bannner_description'       => $request->bannner_description,
                'bannner_btn_one_name'      => $request->bannner_btn_one_name,
                'bannner_btn_one_link'      => $request->bannner_btn_one_link,
                'bannner_btn_one_icon'      => $request->bannner_btn_one_icon,
                'bannner_btn_two_name'      => $request->bannner_btn_two_name,
                'bannner_btn_two_link'      => $request->bannner_btn_two_link,
                'bannner_btn_two_icon'      => $request->bannner_btn_two_icon,
                'bannner_btn_three_name'    => $request->bannner_btn_three_name,
                'bannner_btn_three_link'    => $request->bannner_btn_three_link,
                'bannner_btn_three_icon'    => $request->bannner_btn_three_icon,
                'bannner_btn_four_name'     => $request->bannner_btn_four_name,
                'bannner_btn_four_link'     => $request->bannner_btn_four_link,
                'bannner_btn_four_icon'     => $request->bannner_btn_four_icon,
                'row_one_header'            => $request->row_one_header,
                'row_one_short_description' => $request->row_one_short_description,
                'row_one_image'             => $globalFunRowOneImage['status'] == 1 ? $globalFunRowOneImage['file_name'] : '',
                'row_one_sub_title'         => $request->row_one_sub_title,
                'row_one_sub_description'   => $request->row_one_sub_description,
                'row_one_btn_one_name'      => $request->row_one_btn_one_name,
                'row_one_btn_one_link'      => $request->row_one_btn_one_link,
                'row_one_btn_one_icon'      => $request->row_one_btn_one_icon,
                'row_one_btn_two_name'      => $request->row_one_btn_two_name,
                'row_one_btn_two_link'      => $request->row_one_btn_two_link,
                'row_one_btn_two_icon'      => $request->row_one_btn_two_icon,
                'row_one_btn_three_name'    => $request->row_one_btn_three_name,
                'row_one_btn_three_link'    => $request->row_one_btn_three_link,
                'row_one_btn_three_icon'    => $request->row_one_btn_three_icon,
                'row_one_btn_four_name'     => $request->row_one_btn_four_name,
                'row_one_btn_four_link'     => $request->row_one_btn_four_link,
                'row_one_btn_four_icon'     => $request->row_one_btn_four_icon,
                'row_one_btn_five_name'     => $request->row_one_btn_five_name,
                'row_one_btn_five_link'     => $request->row_one_btn_five_link,
                'row_one_btn_five_icon'     => $request->row_one_btn_five_icon,
                'row_one_btn_six_name'      => $request->row_one_btn_six_name,
                'row_one_btn_six_link'      => $request->row_one_btn_six_link,
                'row_one_btn_six_icon'      => $request->row_one_btn_six_icon,
                'row_one_btn_seven_name'    => $request->row_one_btn_seven_name,
                'row_one_btn_seven_link'    => $request->row_one_btn_seven_link,
                'row_one_btn_seven_icon'    => $request->row_one_btn_seven_icon,
                'row_one_btn_eight_name'    => $request->row_one_btn_eight_name,
                'row_one_btn_eight_link'    => $request->row_one_btn_eight_link,
                'row_one_btn_eight_icon'    => $request->row_one_btn_eight_icon,
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
        $data['rows'] = Row::get();
        $data['whatWeDoPage'] = WhatWeDoPage::find($id);
        return view('admin.pages.whatWeDoPage.edit', $data);
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
        $whatwedo = WhatWeDoPage::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'row_one_header' => 'required',
                'row_one_image'   => 'nullable|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes'  => 'The :attribute must be a file of type: png - jpeg - jpg',
                'unique' => 'This Brand has already been taken.',
            ],
        );

        if ($validator->passes()) {
            $row_one_image = $request->row_one_image;
            $uploadPath = storage_path('app/public/');

            if (isset($row_one_image)) {
                $globalFunRowOneImage = Helper::customUpload($row_one_image, $uploadPath, 320, 270);
                $paths = [
                    storage_path("app/public/{$whatwedo->row_one_image}"),
                    storage_path("app/public/{$whatwedo->row_one_image}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                $globalFunRowOneImage = ['status' => 0];
            }
            $whatwedo->update([
                'row_three_id'              => $request->row_three_id,
                'row_two_id'                => $request->row_two_id,
                'bannner_title'             => $request->bannner_title,
                'bannner_description'       => $request->bannner_description,
                'bannner_btn_one_name'      => $request->bannner_btn_one_name,
                'bannner_btn_one_link'      => $request->bannner_btn_one_link,
                'bannner_btn_one_icon'      => $request->bannner_btn_one_icon,
                'bannner_btn_two_name'      => $request->bannner_btn_two_name,
                'bannner_btn_two_link'      => $request->bannner_btn_two_link,
                'bannner_btn_two_icon'      => $request->bannner_btn_two_icon,
                'bannner_btn_three_name'    => $request->bannner_btn_three_name,
                'bannner_btn_three_link'    => $request->bannner_btn_three_link,
                'bannner_btn_three_icon'    => $request->bannner_btn_three_icon,
                'bannner_btn_four_name'     => $request->bannner_btn_four_name,
                'bannner_btn_four_link'     => $request->bannner_btn_four_link,
                'bannner_btn_four_icon'     => $request->bannner_btn_four_icon,
                'row_one_header'            => $request->row_one_header,
                'row_one_short_description' => $request->row_one_short_description,
                'row_one_image'             => $globalFunRowOneImage['status'] == 1 ? $globalFunRowOneImage['file_name'] : $whatwedo->row_one_image,
                'row_one_sub_title'         => $request->row_one_sub_title,
                'row_one_sub_description'   => $request->row_one_sub_description,
                'row_one_btn_one_name'      => $request->row_one_btn_one_name,
                'row_one_btn_one_link'      => $request->row_one_btn_one_link,
                'row_one_btn_one_icon'      => $request->row_one_btn_one_icon,
                'row_one_btn_two_name'      => $request->row_one_btn_two_name,
                'row_one_btn_two_link'      => $request->row_one_btn_two_link,
                'row_one_btn_two_icon'      => $request->row_one_btn_two_icon,
                'row_one_btn_three_name'    => $request->row_one_btn_three_name,
                'row_one_btn_three_link'    => $request->row_one_btn_three_link,
                'row_one_btn_three_icon'    => $request->row_one_btn_three_icon,
                'row_one_btn_four_name'     => $request->row_one_btn_four_name,
                'row_one_btn_four_link'     => $request->row_one_btn_four_link,
                'row_one_btn_four_icon'     => $request->row_one_btn_four_icon,
                'row_one_btn_five_name'     => $request->row_one_btn_five_name,
                'row_one_btn_five_link'     => $request->row_one_btn_five_link,
                'row_one_btn_five_icon'     => $request->row_one_btn_five_icon,
                'row_one_btn_six_name'      => $request->row_one_btn_six_name,
                'row_one_btn_six_link'      => $request->row_one_btn_six_link,
                'row_one_btn_six_icon'      => $request->row_one_btn_six_icon,
                'row_one_btn_seven_name'    => $request->row_one_btn_seven_name,
                'row_one_btn_seven_link'    => $request->row_one_btn_seven_link,
                'row_one_btn_seven_icon'    => $request->row_one_btn_seven_icon,
                'row_one_btn_eight_name'    => $request->row_one_btn_eight_name,
                'row_one_btn_eight_link'    => $request->row_one_btn_eight_link,
                'row_one_btn_eight_icon'    => $request->row_one_btn_eight_icon,
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $whatWeDoPage = WhatWeDoPage::find($id);

        $paths = [
            storage_path('app/public/') . $whatWeDoPage->row_one_image,
            storage_path('app/public/') . $whatWeDoPage->row_one_image
        ];

        // Delete any existing logo and requestImg images
        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $whatWeDoPage->delete();
    }
}
