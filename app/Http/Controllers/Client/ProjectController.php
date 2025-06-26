<?php

namespace App\Http\Controllers\Client;

use Helper;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Models\Admin\Industry;
use App\Models\Client\Project;
use App\Models\Client\ProjectPhase;
use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use App\Models\Client\ClientSupport;
use App\Models\Client\SupportCase;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects'] = Project::with('client')->orderBy('id', 'DESC')->get();
        return view('admin.pages.project.all', $data);
    }

    public function projectDashboard()
    {
        // dd(5);
        $data['projects'] = Project::with('client')->orderBy('id', 'DESC')->get();
        $data['supports'] = ClientSupport::with('client', 'project')->orderBy('status', 'desc')->orderBy('id', 'ASC')->get();
        $data['cases'] = SupportCase::latest('id')->get();
        $data['latest_case'] = SupportCase::where('status', '!=', 'closed')->latest('id')->first();
        // dd($data['latest_case']);
        return view('admin.pages.project.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['clients'] = Client::orderBy('id', 'DESC')->get(['id', 'name']);
        $data['countrys'] = Country::orderBy('country_name', 'ASC')->get(['id', 'country_name']);
        $data['industrys'] = Industry::orderBy('id', 'DESC')->get(['id', 'title']);
        return view('admin.pages.project.add', $data);
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
                'project_title' => 'required',
                'client_id' => 'required',
            ],
            [
                'project_title.required' => 'The Project Name is required',
                'Client_id.required' => 'You must have to select a client',
            ],
        );

        $mainFile = $request->file(('contact_agreement'));
        $filePath = storage_path('app/public/');
        if (!empty($mainFile)) {
            $globalFunFile = Helper::customUpload($mainFile, $filePath);
        } else {
            $globalFunFile = ['status' => 0];
        }

        $mainFile_support = $request->file(('support_attachment'));
        $filePath = storage_path('app/public/');
        if (!empty($mainFile_support)) {
            $globalFunFile_support = Helper::customUpload($mainFile_support, $filePath);
        } else {
            $globalFunFile_support = ['status' => 0];
        }

        $slug = Str::slug($request->project_title);
        $count = Project::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }


        // dd($code);
        if ($validator->passes()) {
            $project_id = Project::insertGetId([
                'client_id'                 => $request->client_id,
                'sector_id'                 => $request->sector_id,
                'project_title'             => $request->project_title,
                'slug'                      => $slug,
                'project_code'              => $request->project_code,
                'client_code'               => $request->client_code,
                'client_name'               => $request->client_name,
                'partner_name'              => $request->partner_name,
                'project_description'       => $request->project_description,
                'project_duration'          => $request->project_duration,
                'team_member'               => $request->team_member,
                'order_date'                => $request->order_date,
                'order_id'                  => $request->order_id,
                'client_primary_contact'    => $request->client_primary_contact,
                'partner_primary_contact'   => $request->partner_primary_contact,
                'client_secondary_contact'  => $request->client_secondary_contact,
                'partner_secondary_contact' => $request->partner_secondary_contact,
                'create_time'               => $request->create_time,
                'closed_time'               => $request->closed_time,
                'country_id'                => $request->country_id,
                'support_hour'              => $request->support_hour,
                'contact_agreement'         => $globalFunFile['status'] == 1 ? $mainFile->hashName() : NULL,
                'support_tier'              => $request->support_tier,
                'status'                    => (!empty($request->status) ? $request->status : 'on_going'),
                'status_description'        => $request->status_description,
            ]);

            if (!empty($request->phase)) {
                $phase_id = ProjectPhase::insertGetId([
                    'project_id'  => $project_id,
                    'phase'       => $request->phase,
                    'type'        => $request->type,
                    'phase_title' => $request->phase_title,
                    'phase_id'    => $request->phase_id,
                ]);
            }

            if ($request->amc_support == 1) {
                $support_id = ClientSupport::insertGetId([
                    'project_id'               => $project_id,
                    'phase_id'                 => $phase_id,
                    'client_id'                => $request->client_id,
                    'support_type'             => 'amc_support',
                    'support_title'            => $request->support_title,
                    'support_id'               => $request->support_id,
                    'description'              => $request->description,
                    'scope_work'               => $request->scope_work,
                    'support_duration'         => $request->support_duration,
                    'support_tier'             => $request->support_tier,
                    'support_tier_description' => $request->support_tier_description,
                    'order_id'                 => $request->order_id,
                    'support_hour'             => $request->support_hour,
                    'support_attachment'       => $globalFunFile_support['status'] == 1 ? $mainFile_support->hashName() : NULL,
                    'status'                   => $request->status,
                    'pending'                  => $request->pending,
                    'status_description'       => $request->status_description,
                    'review'                   => $request->review,
                    'review_description'       => $request->review_description,
                ]);
            }
            if ($request->implementation_support == 1) {
                $support_id = ClientSupport::insertGetId([
                    'project_id'               => $project_id,
                    'phase_id'                 => $phase_id,
                    'client_id'                => $request->client_id,
                    'support_type'             => 'implementation_support',
                    'support_title'            => $request->support_title,
                    'support_id'               => $request->support_id,
                    'description'              => $request->description,
                    'scope_work'               => $request->scope_work,
                    'support_duration'         => $request->support_duration,
                    'support_tier'             => $request->support_tier,
                    'support_tier_description' => $request->support_tier_description,
                    'order_id'                 => $request->order_id,
                    'support_hour'             => $request->support_hour,
                    'support_attachment'       => $globalFunFile_support['status'] == 1 ? $mainFile_support->hashName() : NULL,
                    'status'                   => $request->status,
                    'pending'                  => $request->pending,
                    'status_description'       => $request->status_description,
                    'review'                   => $request->review,
                    'review_description'       => $request->review_description,
                ]);
            }
            if ($request->other_support == 1) {
                $support_id = ClientSupport::insertGetId([
                    'project_id'               => $project_id,
                    'phase_id'                 => $phase_id,
                    'client_id'                => $request->client_id,
                    'support_type'             => 'other_support',
                    'support_title'            => $request->support_title,
                    'support_id'               => $request->support_id,
                    'description'              => $request->description,
                    'scope_work'               => $request->scope_work,
                    'support_duration'         => $request->support_duration,
                    'support_tier'             => $request->support_tier,
                    'support_tier_description' => $request->support_tier_description,
                    'order_id'                 => $request->order_id,
                    'support_hour'             => $request->support_hour,
                    'support_attachment'       => $globalFunFile_support['status'] == 1 ? $mainFile_support->hashName() : NULL,
                    'status'                   => $request->status,
                    'pending'                  => $request->pending,
                    'status_description'       => $request->status_description,
                    'review'                   => $request->review,
                    'review_description'       => $request->review_description,
                ]);
            }
            Toastr::success('Thank You. The Project Details have been successfully Uploaded.');
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
        $data['project'] = Project::where('slug', $id)->firstOrFail();
        $data['supports'] = ClientSupport::with('cases')->where('project_id', $data['project']->id)->latest('id')->get();
        // $data['project'] = Project::whereId($id)->first();
        // $data['supports'] = ClientSupport::where('project_id', $id)->orderBy('id', 'DESC')->get();
        $data['cases'] = SupportCase::where('project_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.pages.project.project_manage', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['project'] = Project::whereId($id)->first();
        $data['clients'] = Client::orderBy('id', 'DESC')->get(['id', 'name']);
        $data['countrys'] = Country::orderBy('country_name', 'ASC')->get(['id', 'country_name']);
        $data['industrys'] = Industry::orderBy('id', 'DESC')->get(['id', 'title']);
        return view('admin.pages.project.project_edit', $data);
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
        $project = Project::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'project_title' => 'required|string|max:225',
                'project_code' => 'required|string|unique:projects,project_code,' . $project->id,
                'client_name' => 'nullable|string',
                'partner_name' => 'nullable|string',
                'project_duration' => 'nullable|string',
                'project_description' => 'nullable|string',
                'order_id' => 'nullable|string',
                'client_primary_contact' => 'nullable|string',
                'partner_primary_contact' => 'nullable|string',
                'client_secondary_contact' => 'nullable|string',
                'partner_secondary_contact' => 'nullable|string',
                'order_date' => 'nullable|date',
                'closed_time' => 'nullable|date',
                'support_hour' => 'nullable|string',
                'contact_agreement' => 'nullable|string',
                'support_tier' => 'nullable|string',
                'status' => 'nullable|in:pending,on_going,completed,delaying,partially_deployed',
                'status_description' => 'nullable|string',
                'team_member' => 'nullable|integer',
                'create_time' => 'nullable|date',
                'support_hour' => 'nullable|string',
                'support_tier' => 'nullable|string',
                'team_id' => 'nullable',
            ],
            [
                'project_title.required' => 'The project title is required.',
                'project_title.max' => 'The project title may not exceed 225 characters.',
                'project_code.required' => 'The project code is required.',
                'project_code.unique' => 'The project code must be unique.',
                'team_member.integer' => 'The team member field must be an integer.',
                'create_time.date' => 'The create time must be a valid date.',
                'support_hour.string' => 'The support hour must be a string.',
                'support_tier.string' => 'The support tier must be a string.',
                'team_id.json' => 'The team ID must be a valid JSON structure.',
            ],
        );

        if ($validator->passes()) {

            $mainFile = $request->file('contact_agreement');
            $filePath = storage_path('app/public/');

            if (!empty($mainFile)) {
                $globalFunFile = Helper::customUpload($mainFile, $filePath);
                $paths = [
                    storage_path("app/public/{$project->contact_agreement}"),
                    storage_path("app/public/{$project->contact_agreement}")
                ];
                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            } else {
                $globalFunFile = ['status' => 0];
            }

            $project->update([
                'client_id'                 => $request->client_id,
                'sector_id'                 => $request->sector_id,
                'country_id'                => $request->country_id,
                'project_title'             => $request->project_title,
                'slug'                      => Str::slug($request->project_title),
                'project_code'              => $request->project_code,
                'client_name'               => $request->client_name,
                'client_code'               => $request->client_code,
                'partner_name'              => $request->partner_name,
                'project_duration'          => $request->project_duration,
                'project_description'       => $request->project_description,
                'team_member'               => $request->team_member,
                'order_id'                  => $request->order_id,
                'client_primary_contact'    => $request->client_primary_contact,
                'partner_primary_contact'   => $request->partner_primary_contact,
                'client_secondary_contact'  => $request->client_secondary_contact,
                'partner_secondary_contact' => $request->partner_secondary_contact,
                'order_date'                => date('Y-m-d H:i:s', strtotime($request->order_date)),
                'create_time'               => date('Y-m-d H:i:s', strtotime($request->create_time)),
                'closed_time'               => date('Y-m-d H:i:s', strtotime($request->closed_time)),
                'support_hour'              => $request->support_hour,
                'contact_agreement'         => $request->contact_agreement,
                'support_tier'              => $request->support_tier,
                'status'                    => $request->status,
                'status_description'        => $request->status_description,
                'team_id'                   => json_encode($request->team_id),
                'contact_agreement'         => $globalFunFile['status'] == 1 ? $globalFunFile['file_name'] : $project->contact_agreement,

            ]);
            $supports = ClientSupport::where('project_id', $project->id)->get();
            $support_cases = SupportCase::where('project_id', $project->id)->get();
            $phases = ProjectPhase::where('project_id', $project->id)->get();

            if ($supports) {
                foreach ($supports as $support) {
                    ClientSupport::find($support->id)->update([
                        'team_id'    => json_encode($request->team_id),
                    ]);
                }
                Toastr::success('Team updated Successfully');
            }
            if ($support_cases) {
                foreach ($support_cases as $support_case) {
                    SupportCase::find($support_case->id)->update([
                        'team_id'  => json_encode($request->team_id),
                    ]);
                }
                Toastr::success('Team updated Successfully');
            }
            if ($phases) {
                foreach ($phases as $phase) {
                    ProjectPhase::find($phase->id)->update([
                        'team_id'  => json_encode($request->team_id),
                    ]);
                }
                Toastr::success('Team updated Successfully');
            }

            Toastr::success('Project Updated Successfully');
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
        Project::find($id)->delete();
    }
}
