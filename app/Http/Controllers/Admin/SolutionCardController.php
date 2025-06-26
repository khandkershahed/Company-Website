<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Admin\SolutionCard;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SolutionCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['solutionCards'] = SolutionCard::latest()->get();
        return view('admin.pages.solutionCard.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.solutionCard.add');
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
                'title' => 'required',
                'image'   => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'short_des' => 'required',
            ]

        );

        if ($validator->passes()) {
            $mainFile = $request->file('image');
            $imgPath = storage_path('app/public/');
            if (empty($mainFile)) {
                SolutionCard::create([
                    'title'     => $request->title,
                    'short_des' => $request->short_des,
                ]);
            } else {
                $globalFunImg =  Helper::singleImageUpload($mainFile, $imgPath, 200, 200);
                if ($globalFunImg['status'] == 1) {
                    SolutionCard::create([
                        'title'     => $request->title,
                        'image'     => $globalFunImg['file_name'],
                        'short_des' => $request->short_des,
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
        $data['solutionCard'] = SolutionCard::findOrFail($id);
        return view('admin.pages.solutionCard.edit', $data);
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
        $solutionCard = SolutionCard::findOrFail($id);
        if (!empty($solutionCard)) {
            $validator =
                [
                    'title'     => 'required',
                    'image'     => 'image|mimes:png,jpg,jpeg|max:5000',
                    'short_des' => 'required',
                ];
        } else {
            $validator =
                [
                    'title'     => 'required',
                    'short_des' => 'required',

                ];
        }
        $validator = Validator::make($request->all(), $validator);

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath, 200, 200);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($solutionCard)) {
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $solutionCard->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $solutionCard->image);
                    File::delete(public_path($uploadPath . '/') . $solutionCard->image);
                }

                $solutionCard->update([
                    'title'     => $request->title,
                    'image'     => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $solutionCard->image,
                    'short_des' => $request->short_des,
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
        $solutionCard = SolutionCard::find($id);

        if (File::exists(public_path('storage/') . $solutionCard->image)) {
            File::delete(public_path('storage/') . $solutionCard->image);
        }
        if (File::exists(public_path('storage/') . $solutionCard->image)) {
            File::delete(public_path('storage/') . $solutionCard->image);
        }
        if (File::exists(public_path('storage/thumb/') . $solutionCard->image)) {
            File::delete(public_path('storage/thumb/') . $solutionCard->image);
        }
        $solutionCard->delete();
    }
}
