<?php

namespace App\Http\Controllers\Solution;

use Helper;
use Illuminate\Http\Request;
use App\Models\Admin\Industry;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SolutionCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $solutions = SolutionDetail::orderBy('id', 'DESC')->get();
        return view('metronic.pages.solution.index', [
            'solutions' => SolutionDetail::orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('metronic.pages.solution.create', [
            'industries' => Industry::select('industries.id', 'industries.title')->get(),
        ]);
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
        // dd(json_encode($request->industry_id));
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string|unique:solution_details,name',
            'industry_id'       => 'required',
            'solution_template' => 'required',
        ], [
            'unique'    => 'This Solution Name has already been taken.',
            'required'  => 'The :attribute field is required.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                Session::flash('error', $error, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withInput();
        }

        $solution = SolutionDetail::create([
            'name'              => $request->name,
            'industry_id'       => json_encode($request->industry_id),
            'solution_template' => $request->solution_template,
            'added_by'          => Auth::user()->name,
            'status'            => 'draft',
            'created_at'        => now(),
        ]);
        // Session::flash('success', 'You have subscribed successfully in our website!');
        return redirect()->route('admin.solution-cms.edit', $solution->id);
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
        // $solution = SolutionDetail::find($id);
        return view('metronic.pages.solution.edit', [
            'industries' => Industry::select('industries.id', 'industries.title')->get(),
            'solution'   => SolutionDetail::find($id),
        ]);
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
        try {
            // Find the solution
            $solution = SolutionDetail::find($id);

            // Validate the input data
            $validator = Validator::make($request->all(), [
                'row_two_title'        => 'nullable|string',
                'row_two_header'       => 'nullable',
            ], [
                'row_two_title.required'  => 'The Row Two Title is required.',
                'row_two_header.required' => 'The Row Two Header is required.',
            ]);

            if ($validator->fails()) {
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    Toastr::error($message, 'Failed', ['timeOut' => 30000]);
                }
                return redirect()->back()->withInput();
            }
            $files = [
                'banner_image' => $request->file('banner_image'),
                'thumbnail_image' => $request->file('thumbnail_image'),
            ];
            $uploadedFiles = [];
            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'solution/' . $key;
                    $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
                    if ($uploadedFiles[$key]['status'] === 0) {
                        return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                    }
                } else {
                    $uploadedFiles[$key] = ['status' => 0];
                }
            }
            // Update the solution record
            $solution->update([
                'name'              => $request->name,
                'industry_id'       => json_encode($request->industry_id),
                'banner_image'      => $uploadedFiles['banner_image']['status'] == 1 ? $uploadedFiles['banner_image']['file_path'] : null,
                'thumbnail_image'   => $uploadedFiles['thumbnail_image']['status'] == 1 ? $uploadedFiles['thumbnail_image']['file_path'] : null,
                'solution_template' => $request->solution_template,
                'row_two_title'     => $request->row_two_title,
                'row_two_header'    => $request->row_two_header,
                'row_three_title'   => $request->row_three_title,
                'row_three_header'  => $request->row_three_header,
                'row_five_title'    => $request->row_five_title,
                'row_five_header'   => $request->row_five_header,
                'added_by'          => Auth::user()->name,
                'status'            => $request->status,
                'created_at'        => now(),
            ]);

            // Flash success message using Toastr
            Toastr::success('Data updated successfully.', 'Success', ['timeOut' => 30000]);

            return redirect()->back();
        } catch (\Exception $e) {
            // Catch the exception and flash error using Toastr
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error', ['timeOut' => 30000]);
            return redirect()->back()->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = SolutionDetail::findOrFail($id);
        $files = [
            'banner_image'    => $banner->banner_image,
            'thumbnail_image' => $banner->thumbnail_image,
        ];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $oldFile = $banner->$key ?? null;
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
            }
        }
        $banner->delete();
    }


}
