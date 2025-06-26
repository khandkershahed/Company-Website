<?php

namespace App\Http\Controllers\Client;

use Helper;
use Carbon\Carbon;
use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Client\Client;
use App\Models\Admin\Industry;
use App\Models\Client\Project;
use App\Models\Client\ProjectPhase;
use App\Http\Controllers\Controller;
use App\Models\Client\ClientSupport;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Mail\ClientSupport as MailClientSupport;
use App\Notifications\ClientSupport as NotificationsClientSupport;

class ClientSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['supports'] = ClientSupport::orderBy('id', 'DESC')->get();
        return view('admin.pages.clientSupport.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['clients'] = Client::orderBy('id', 'DESC')->get(['id', 'name']);
        $data['phases'] = ProjectPhase::orderBy('id', 'DESC')->get();
        $data['projects'] = Project::orderBy('id', 'DESC')->get();
        $data['countrys'] = Country::orderBy('country_name', 'ASC')->get(['id', 'country_name']);
        $data['industrys'] = Industry::orderBy('id', 'DESC')->get(['id', 'title']);
        return view('admin.pages.contact.support_create', $data);
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
        $validator = Validator::make(
            $request->all(),
            [
                'amc_support_title' => 'string',
                'client_id' => 'required',
            ],
            [
                // 'support_title.required' => 'The Support Name is required',
                'Client_id.required' => 'You must have to select a client',
            ],
        );


        $mainFile_support = $request->file(('amc_support_attachment'));
        $filePath = storage_path('app/public/');
        if (!empty($mainFile_support)) {
            $globalFunFile_support = Helper::customUpload($mainFile_support, $filePath);
        } else {
            $globalFunFile_support = ['status' => 0];
        }
        $mainFile_implement_support = $request->file(('implement_support_attachment'));
        $filePath = storage_path('app/public/');
        if (!empty($mainFile_implement_support)) {
            $globalFunFile_implement_support = Helper::customUpload($mainFile_implement_support, $filePath);
        } else {
            $globalFunFile_implement_support = ['status' => 0];
        }
        $mainFile_other_support = $request->file(('other_support_attachment'));
        $filePath = storage_path('app/public/');
        if (!empty($mainFile_other_support)) {
            $globalFunFile_other_support = Helper::customUpload($mainFile_other_support, $filePath);
        } else {
            $globalFunFile_other_support = ['status' => 0];
        }

        $slug = Str::slug($request->amc_project_title);
        $count = ClientSupport::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $slug = Str::slug($request->implement_project_title);
        $count = ClientSupport::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $slug = Str::slug($request->other_project_title);
        $count = ClientSupport::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

            $project_id = $request->project_id;
            $phase_id   = $request->phase_id;
            $client_id  = $request->client_id;

        // dd($code);
        if ($validator->passes()) {

                if ($request->amc_support == 1) {
                    $support_id = ClientSupport::insertGetId([
                        'project_id'               => $project_id,
                        'phase_id'                 => $phase_id,
                        'client_id'                => $client_id,
                        'support_type'             => 'amc_support',
                        'support_title'            => $request->amc_support_title,
                        'support_id'               => $request->amc_support_id,
                        'description'              => $request->amc_description,
                        'scope_work'               => $request->amc_scope_work,
                        'support_duration'         => $request->amc_support_duration,
                        'support_tier'             => $request->amc_support_tier,
                        'support_tier_description' => $request->amc_support_tier_description,
                        'order_id'                 => $request->amc_order_id,
                        'support_hour'             => $request->amc_support_hour,
                        'support_attachment'       => $globalFunFile_support['status'] == 1 ? $mainFile_support->hashName() : NULL,
                        'status'                   => $request->amc_status,
                        // 'pending'                  => $request->amc_pending,
                        'status_description'       => $request->amc_status_description,
                        'review'                   => $request->amc_review,
                        'review_description'       => $request->amc_review_description,
                    ]);
                }
                if ($request->implementation_support == 1) {
                    $support_id = ClientSupport::insertGetId([
                        'project_id'               => $project_id,
                        'phase_id'                 => $phase_id,
                        'client_id'                => $client_id,
                        'support_type'             => 'implementation_support',
                        'support_title'            => $request->implement_support_title,
                        'support_id'               => $request->implement_support_id,
                        'description'              => $request->implement_description,
                        'scope_work'               => $request->implement_scope_work,
                        'support_duration'         => $request->implement_support_duration,
                        'support_tier'             => $request->implement_support_tier,
                        'support_tier_description' => $request->implement_support_tier_description,
                        'order_id'                 => $request->implement_order_id,
                        'support_hour'             => $request->implement_support_hour,
                        'support_attachment'       => $globalFunFile_implement_support['status'] == 1 ? $mainFile_implement_support->hashName() : NULL,
                        'status'                   => $request->implement_status,
                        // 'pending'                  => $request->implement_pending,
                        'status_description'       => $request->implement_status_description,
                        'review'                   => $request->implement_review,
                        'review_description'       => $request->implement_review_description,
                    ]);
                }
                if ($request->other_support == 1) {
                    $support_id = ClientSupport::insertGetId([
                        'project_id'               => $project_id,
                        'phase_id'                 => $phase_id,
                        'client_id'                => $client_id,
                        'support_type'             => 'other_support',
                        'support_title'            => $request->other_support_title,
                        'support_id'               => $request->other_support_id,
                        'description'              => $request->other_description,
                        'scope_work'               => $request->other_scope_work,
                        'support_duration'         => $request->other_support_duration,
                        'support_tier'             => $request->other_support_tier,
                        'support_tier_description' => $request->other_support_tier_description,
                        'order_id'                 => $request->other_order_id,
                        'support_hour'             => $request->other_support_hour,
                        'support_attachment'       => $globalFunFile_other_support['status'] == 1 ? $mainFile_other_support->hashName() : NULL,
                        'status'                   => $request->other_status,
                        // 'pending'                  => $request->other_pending,
                        'status_description'       => $request->other_status_description,
                        'review'                   => $request->other_review,
                        'review_description'       => $request->other_review_description,
                    ]);
                }

            Toastr::success('Thank You. The Support Details have been successfully Uploaded.');
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
        $data = [
            'support' => ClientSupport::with(['cases', 'project'])->where('support_id', $id)->latest('id')->firstOrFail(),
        ];
        // $support = ClientSupport::with(['cases', 'project'])->where('support_id', $id)->latest('id')->firstOrFail();

        return view('admin.pages.clientSupport.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $clientSupport = ClientSupport::find($id);

        $validator = Validator::make(
            $request->all(),
            [
                'amc_support_title' => 'string',
                'client_id' => 'required',
            ],
            [
                // 'support_title.required' => 'The Support Name is required',
                'Client_id.required' => 'You must have to select a client',
            ],
        );

        $mainFile = $request->file('attachment');
        $filePath = storage_path('app/public/');

        if (!empty($mainFile)) {
            $globalFunFile = Helper::customUpload($mainFile, $filePath);


            $paths = [
                storage_path("app/public/{$clientSupport->attachment}"),
                storage_path("app/public/{$clientSupport->attachment}")
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunFile = ['status' => 0];
        }


        if ($validator->passes()) {
            $clientSupport->update([
                'name'                     => $request->name,
                'subject'                  => $request->subject,
                'email'                    => $request->email,
                'phone'                    => $request->phone,
                'company'                  => $request->company,
                'message'                  => $request->message,
                'ip_address'               => request()->ip(),
                'msg_category'             => $request->msg_category,
                'msg_type'                 => $request->msg_type,
                'create_time'              => $request->create_time,
                'Closed_time'              => $request->Closed_time,
                'country'                  => $request->country,
                'support_hour'             => $request->support_hour,
                'support_tier'             => $request->support_tier,
                'support_tier_description' => $request->support_tier_description,
                'status'                   => 'pending',
                'attachment'               => $globalFunFile['status'] == 1 ? $mainFile->hashName() : $clientSupport->attachment,
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
        ClientSupport::find($id)->delete();
    }
}
