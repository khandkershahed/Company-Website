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
                'banner_image'               => $request->file('banner_image'),
                'thumbnail_image'            => $request->file('thumbnail_image'),
                'row_two_column_one_image'   => $request->file('row_two_column_one_image'),
                'row_two_column_two_image'   => $request->file('row_two_column_two_image'),
                'row_two_column_three_image' => $request->file('row_two_column_three_image'),
                'row_two_column_four_image'  => $request->file('row_two_column_four_image'),
                'count_one_icon'             => $request->file('count_one_icon'),
                'count_two_icon'             => $request->file('count_two_icon'),
                'count_three_icon'           => $request->file('count_three_icon'),
                'count_four_icon'            => $request->file('count_four_icon'),
                'row_four_big_image'         => $request->file('row_four_big_image'),
                'row_four_small_image'       => $request->file('row_four_small_image'),
                'row_five_image'             => $request->file('row_five_image'),
                'row_six_image'              => $request->file('row_six_image'),
                'row_seven_image'            => $request->file('row_seven_image'),
                'icon'                       => $request->file('icon'),
            ];
            $uploadedFiles = [];

            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'solution/' . $key;
                    $oldFile = $solution->$key ?? null;

                    if ($oldFile) {
                        Storage::delete("public/" . $oldFile);
                    }
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
                'name'                             => $request->name,
                'header'                           => $request->header,
                'industry_id'                      => json_encode($request->industry_id),
                'solution_template'                => $request->solution_template,
                'banner_image'                     => $uploadedFiles['banner_image']['status']               == 1 ? $uploadedFiles['banner_image']['file_path']              : $solution->banner_image,
                'icon'                             => $uploadedFiles['icon']['status']               == 1 ? $uploadedFiles['icon']['file_path']              : $solution->icon,
                'thumbnail_image'                  => $uploadedFiles['thumbnail_image']['status']            == 1 ? $uploadedFiles['thumbnail_image']['file_path']           : $solution->thumbnail_image,
                'row_two_column_one_image'         => $uploadedFiles['row_two_column_one_image']['status']   == 1 ? $uploadedFiles['row_two_column_one_image']['file_path']  : $solution->row_two_column_one_image,
                'row_two_column_two_image'         => $uploadedFiles['row_two_column_two_image']['status']   == 1 ? $uploadedFiles['row_two_column_two_image']['file_path']  : $solution->row_two_column_two_image,
                'row_two_column_three_image'       => $uploadedFiles['row_two_column_three_image']['status'] == 1 ? $uploadedFiles['row_two_column_three_image']['file_path'] : $solution->row_two_column_three_image,
                'row_two_column_four_image'        => $uploadedFiles['row_two_column_four_image']['status']  == 1 ? $uploadedFiles['row_two_column_four_image']['file_path'] : $solution->row_two_column_four_image,
                'row_two_column_one_title'         => $request->row_two_column_one_title,
                'row_two_column_one_description'   => $request->row_two_column_one_description,
                'row_two_column_one_link'          => $request->row_two_column_one_link,
                'row_two_column_two_title'         => $request->row_two_column_two_title,
                'row_two_column_two_description'   => $request->row_two_column_two_description,
                'row_two_column_two_link'          => $request->row_two_column_two_link,
                'row_two_column_three_title'       => $request->row_two_column_three_title,
                'row_two_column_three_description' => $request->row_two_column_three_description,
                'row_two_column_three_link'        => $request->row_two_column_three_link,
                'row_two_column_four_title'        => $request->row_two_column_four_title,
                'row_two_column_four_description'  => $request->row_two_column_four_description,
                'row_two_column_four_link'         => $request->row_two_column_four_link,
                'solution_template'                => $request->solution_template,
                'row_two_title'                    => $request->row_two_title,
                'row_two_header'                   => $request->row_two_header,
                'row_three_title'                  => $request->row_three_title,
                'row_three_header'                 => $request->row_three_header,

                'count_one_icon'                   => $uploadedFiles['count_one_icon']['status']   == 1 ? $uploadedFiles['count_one_icon']['file_path']   : $solution->count_one_icon,
                'count_two_icon'                   => $uploadedFiles['count_two_icon']['status']   == 1 ? $uploadedFiles['count_two_icon']['file_path']   : $solution->count_two_icon,
                'count_three_icon'                 => $uploadedFiles['count_three_icon']['status'] == 1 ? $uploadedFiles['count_three_icon']['file_path'] : $solution->count_three_icon,
                'count_four_icon'                  => $uploadedFiles['count_four_icon']['status']  == 1 ? $uploadedFiles['count_four_icon']['file_path']  : $solution->count_four_icon,
                'count_one_number'                 => $request->count_one_number,
                'count_one_text'                   => $request->count_one_text,
                'count_two_number'                 => $request->count_two_number,
                'count_two_text'                   => $request->count_two_text,
                'count_three_number'               => $request->count_three_number,
                'count_three_text'                 => $request->count_three_text,
                'count_four_number'                => $request->count_four_number,
                'count_four_text'                  => $request->count_four_text,
                'row_four_big_image'               => $uploadedFiles['row_four_big_image']['status']   == 1 ? $uploadedFiles['row_four_big_image']['file_path']   : $solution->row_four_big_image,
                'row_four_small_image'             => $uploadedFiles['row_four_small_image']['status'] == 1 ? $uploadedFiles['row_four_small_image']['file_path'] : $solution->row_four_small_image,
                'row_four_badge'                   => $request->row_four_badge,
                'row_four_title'                   => $request->row_four_title,
                'row_four_header'                  => $request->row_four_header,
                'row_four_quote'                   => $request->row_four_quote,
                'row_four_col_one_title'           => $request->row_four_col_one_title,
                'row_four_col_one_description'     => $request->row_four_col_one_description,
                'row_four_col_one_link'            => $request->row_four_col_one_link,
                'row_four_col_two_title'           => $request->row_four_col_two_title,
                'row_four_col_two_description'     => $request->row_four_col_two_description,
                'row_four_col_two_link'            => $request->row_four_col_two_link,
                'row_four_button_name'             => $request->row_four_button_name,
                'row_four_link'                    => $request->row_four_link,
                'row_five_image'                   => $uploadedFiles['row_five_image']['status']  == 1 ? $uploadedFiles['row_five_image']['file_path']  : $solution->row_five_image,
                'row_six_image'                    => $uploadedFiles['row_six_image']['status']   == 1 ? $uploadedFiles['row_six_image']['file_path']   : $solution->row_six_image,
                'row_seven_image'                  => $uploadedFiles['row_seven_image']['status'] == 1 ? $uploadedFiles['row_seven_image']['file_path'] : $solution->row_seven_image,
                'row_five_badge'                   => $request->row_five_badge,
                'row_five_title'                   => $request->row_five_title,
                'row_five_header'                  => $request->row_five_header,
                'row_five_btn_name'                => $request->row_five_btn_name,
                'row_five_link'                    => $request->row_five_link,
                'row_five_description'             => $request->row_five_description,
                'row_six_badge'                    => $request->row_six_badge,
                'row_six_title'                    => $request->row_six_title,
                'row_six_description'              => $request->row_six_description,
                'row_six_btn_name'                 => $request->row_six_btn_name,
                'row_six_link'                     => $request->row_six_link,
                'row_seven_badge'                  => $request->row_seven_badge,
                'row_seven_title'                  => $request->row_seven_title,
                'row_seven_description'            => $request->row_seven_description,
                'row_seven_btn_name'               => $request->row_seven_btn_name,
                'row_seven_link'                   => $request->row_seven_link,
                'status'                           => $request->status,
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
