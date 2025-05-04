<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\JobPost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jobs'] = JobPost::get();
        // return view('admin.pages.job.all', $data);
        return view('metronic.pages.jobPost.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metronic.pages.jobPost.create');
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
                'name'         => 'required',
                'vacancy'      => 'required',
                'deadline'     => 'required|date',
                'link'         => 'required',
                'company_name' => 'required',
                'category'     => 'required',
                'experience'   => 'required',
                'description'  => 'required',
            ],
        );

        $slug = Str::slug($request->name);
        $count = JobPost::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        if ($validator->passes()) {
            JobPost::create([
                'name'         => $request->name,
                'slug'         => $data['slug'],
                'vacancy'      => $request->vacancy,
                'deadline'     => $request->deadline,
                'link'         => $request->link,
                'company_name' => $request->company_name,
                'category'     => $request->category,
                'experience'   => $request->experience,
                'description'  => $request->description,
            ]);
            Toastr::success('Data Insert Successfully');
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
        $data['job'] = JobPost::find($id);
        // return view('admin.pages.job.edit', $data);
        return view('metronic.pages.jobPost.edit', $data);
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
        $job = JobPost::where('id', $id)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'name'         => 'required',
                'vacancy'      => 'required',
                'deadline'     => 'required|date',
                'link'         => 'required',
                'company_name' => 'required',
                'category'     => 'required',
                'experience'   => 'required',
                'description'  => 'required',
            ],
        );
        if (!empty($job->slug)) {
            $data['slug'] = $job->slug;
        } else {
            $slug = Str::slug($request->name);
            $count = JobPost::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;
        }

        if ($validator->passes()) {
            JobPost::findOrFail($id)->update([
                'name'         => $request->name,
                'slug'         => $data['slug'],
                'vacancy'      => $request->vacancy,
                'deadline'     => $request->deadline,
                'link'         => $request->link,
                'company_name' => $request->company_name,
                'category'     => $request->category,
                'experience'   => $request->experience,
                'description'   => $request->description,
            ]);
            Toastr::success('Data Update Successfully');
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
        JobPost::findOrFail($id)->delete();
    }
}
