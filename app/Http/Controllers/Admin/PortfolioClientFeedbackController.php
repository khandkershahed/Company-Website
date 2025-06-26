<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\PortfolioDetails;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\PortfolioClientFeedback;

class PortfolioClientFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['portfolioDetails']         = PortfolioDetails::select('portfolio_details.id', 'portfolio_details.banner_title')->get();
        $data['portfolioClientFeedbacks'] = PortfolioClientFeedback::latest()->get();
        return view('admin.pages.portfolioClientFeedback.all', $data);
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
                'portfolio_details_id' => 'required|integer',
                'name'                 => 'required|string',
                'image'                => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'description'          => 'required|string',
                'star_mark'            => 'required',
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
            PortfolioClientFeedback::create([
                'portfolio_details_id' => $request->portfolio_details_id,
                'name'                 => $request->name,
                'image'                => $globalFunimage['status'] == 1 ? $globalFunimage['file_name'] : '',
                'description'          => $request->description,
                'star_mark'            => $request->star_mark,
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
        $PortfolioClientFeedback = PortfolioClientFeedback::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'portfolio_details_id' => 'required|integer',
                'name'                 => 'required|string',
                'image'                => 'sometimes|image|mimes:png,jpg,jpeg|max:10000',
                'description'          => 'required|string',
                'star_mark'            => 'required',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleImageUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($PortfolioClientFeedback)) {
                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/') . $PortfolioClientFeedback->image)) {
                        File::delete(public_path('storage/') . $PortfolioClientFeedback->image);
                    }
                    if (File::exists(public_path('storage/') . $PortfolioClientFeedback->image)) {
                        File::delete(public_path('storage/') . $PortfolioClientFeedback->image);
                    }
                    if (File::exists(public_path('storage/thumb/') . $PortfolioClientFeedback->image)) {
                        File::delete(public_path('storage/thumb/') . $PortfolioClientFeedback->image);
                    }
                }

                $PortfolioClientFeedback->update([
                    'portfolio_details_id' => $request->portfolio_details_id,
                    'name'                 => $request->name,
                    'image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $PortfolioClientFeedback->image,
                    'description'          => $request->description,
                    'star_mark'            => $request->star_mark,
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
        $portfolioClientFeedback = PortfolioClientFeedback::find($id);

        if (File::exists(public_path('storage/') . $portfolioClientFeedback->image)) {
            File::delete(public_path('storage/') . $portfolioClientFeedback->image);
        }
        if (File::exists(public_path('storage/') . $portfolioClientFeedback->image)) {
            File::delete(public_path('storage/') . $portfolioClientFeedback->image);
        }
        if (File::exists(public_path('storage/thumb/') . $portfolioClientFeedback->image)) {
            File::delete(public_path('storage/thumb/') . $portfolioClientFeedback->image);
        }
        $portfolioClientFeedback->delete();
    }
}
