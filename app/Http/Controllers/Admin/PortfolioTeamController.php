<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Models\Admin\PortfolioTeam;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortfolioTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['portfolioTeams'] = PortfolioTeam::orderBy('id', 'desc')->get();
        return view('admin.pages.portfolioTeam.all', $data);
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
                'title'      => 'required|string',
                'short_desc' => 'required|string',
                'image'      => 'required|image|mimes:png,jpg,jpeg|max:10000',
                'status'     => 'required',
                'link'       => 'required|url',
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
            PortfolioTeam::create([
                'title'      => $request->title,
                'short_desc' => $request->short_desc,
                'image'      => $globalFunimage['status'] == 1 ? $globalFunimage['file_name'] : '',
                'status'     => $request->status,
                'link'       => $request->link,
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
        $portfolioTeam = PortfolioTeam::find($id);
        if (!empty($portfolioTeam)) {
            $image = $request->image;
            $uploadPath    = storage_path('app/public/');
            if (isset($image)) {
                $globalFunimage = Helper::singleImageUpload($image, $uploadPath);
            } else {
                $globalFunimage = ['status' => 0];
            }

            if ($globalFunimage['status'] == 1) {
                File::delete(public_path('storage/') . $portfolioTeam->image);
                File::delete(public_path('storage/') . $portfolioTeam->image);
                File::delete(public_path('storage/thumb/') . $portfolioTeam->image);
            }

            $portfolioTeam->update([
                'title'      => $request->title,
                'short_desc' => $request->short_desc,
                'image'      => $globalFunimage['status'] == 1 ? $globalFunimage['file_name'] : $portfolioTeam->image,
                'status'     => $request->status,
                'link'       => $request->link,
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
        $portfolioTeam = PortfolioTeam::find($id);

        //image
        if (File::exists(public_path('storage/') . $portfolioTeam->image)) {
            File::delete(public_path('storage/') . $portfolioTeam->image);
        }
        if (File::exists(public_path('storage/') . $portfolioTeam->image)) {
            File::delete(public_path('storage/') . $portfolioTeam->image);
        }
        if (File::exists(public_path('storage/thumb/') . $portfolioTeam->image)) {
            File::delete(public_path('storage/thumb/') . $portfolioTeam->image);
        }
        $portfolioTeam->delete();
    }
}
