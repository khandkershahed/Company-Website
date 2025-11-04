<?php

namespace App\Http\Controllers\Client;

use Helper;
use Carbon\Carbon;
use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Client\SupportCase;
use App\Http\Controllers\Controller;
use App\Models\Client\ClientSupport;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Client\ClientSupportMessage;
use Illuminate\Support\Facades\Notification;
use App\Mail\ClientSupport as MailClientSupport;
use App\Models\Client\CaseAttachment;
use App\Models\Client\Client;
use App\Models\Client\MessageAttachment;
use App\Models\Site;
use App\Notifications\ClientSupport as NotificationsClientSupport;

class SupportCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cases'] = SupportCase::orderBy('id', 'DESC')->get();
        return view('admin.pages.supportCase.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'msg_category' => 'required',
                'msg_type' => 'required',
            ],
            [
                'msg_category.required' => 'The Message Category is required',
                'msg_type.required' => 'The Message Type is required',
            ],
        );
        $today = date('ymd');
        $lastCode = SupportCase::where('code', 'like', 'SC-' . $today . '%')->orderBy('id', 'desc')->first();
        if ($lastCode) {
            $lastNumber = (int) substr($lastCode->code, -1); // Extract the last 7 characters of the code
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        $code = 'SC-' . $today . ltrim($newNumber, '0'); // Use ltrim to remove leading zeros
        if ($validator->passes()) {
            $supportCaseId = SupportCase::insertGetId([
                'client_id'                => $request->client_id,
                'project_id'               => $request->project_id,
                'phase_id'                 => $request->phase_id,
                'support_id'               => $request->support_id,
                'code'                     => $code,
                'name'                     => $request->name,
                'subject'                  => $request->subject,
                'order_id'                 => $request->order_id,
                'email'                    => $request->email,
                'phone'                    => $request->phone,
                'company'                  => $request->company,
                'message'                  => $request->message,
                'ip_address'               => request()->ip(),
                'msg_category'             => $request->msg_category,
                'msg_type'                 => $request->msg_type,
                'create_time'              => Carbon::now(),
                'Closed_time'              => $request->Closed_time,
                'country'                  => $request->country,
                'support_hour'             => $request->support_hour,
                'support_tier'             => $request->support_tier,
                'support_tier_description' => $request->support_tier_description,
                'status'                   => 'pending',
            ]);

            if ($request->hasFile('attachments')) {
                $files = $request->file('attachments');

                foreach ($files as $file) {
                    $filePath = storage_path('app/public/');
                    $uploadedFile = Helper::customUpload($file, $filePath);

                    if ($uploadedFile['status'] == 1) {
                        CaseAttachment::create([
                            'case_id' =>  $supportCaseId,
                            'attachment' => $uploadedFile['file'],
                        ]);
                    }
                }
            }

            // $name = $request->name;
            // $users = User::whereJsonContains('department', 'site')->get();
            // $user_emails = User::whereJsonContains('department', 'site')->pluck('email')->toArray();
            // Notification::send($users, new NotificationsClientSupport($name, $code));

            // $data = [
            //     'name'         => $name,
            //     'msg_category' => $request->msg_category,
            //     'msg_type'     => $request->msg_type,
            //     'phone'        => $request->phone,
            //     'company_name' => $request->company,
            //     'message'      => $request->message,
            //     'code'         => $code,
            //     'email'        => $request->email,
            //     'link'         => route('admin.single-rfq.show', $code),
            // ];
            // Mail::to($request->email)->send(new MailClientSupport($data));
            // if (!empty($user_emails)) {
            //     Mail::to($user_emails)->send(new MailClientSupport($data));
            // }
            Toastr::success('Thank You. We have received your Support message. We will contact with you very soon.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }




    public function caseStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'msg_category' => 'required',
                'msg_type' => 'required',
            ],
            [
                'msg_category.required' => 'The Message Category is required',
                'msg_type.required' => 'The Message Type is required',
            ],
        );


        $today = date('ymd');
        $lastCode = SupportCase::where('code', 'like', 'SC-' . $today . '%')->orderBy('id', 'desc')->first();
        if ($lastCode) {
            $lastNumber = (int) substr($lastCode->code, -1); // Extract the last 7 characters of the code
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        $code = 'SC-' . $today . ltrim($newNumber, '0'); // Use ltrim to remove leading zeros
        $support = ClientSupport::where('id', $request->support_id)->first();
        $project_id               = $support->project_id;
        $phase_id                 = $support->phase_id;
        $order_id                 = $support->order_id;
        $support_tier             = $support->support_tier;
        $support_tier_description = $support->support_tier_description;
        $support_hour             = $support->support_duration;
        $client = Auth::guard('client')->user();
        $users = User::whereJsonContains('department', 'site')->get();
        $user_emails = User::whereJsonContains('department', 'site')->pluck('email')->toArray();
        $ccRecipients = array_merge($request->mail_cc, $user_emails);
        $site =  Site::latest('id')->first();
        // dd($ccRecipients);

        if ($validator->passes()) {
            $supportCaseId = SupportCase::insertGetId([
                'support_id'               => $request->support_id,
                'client_id'                => $request->client_id,
                'project_id'               => $project_id,
                'phase_id'                 => $phase_id,
                'code'                     => $code,
                'name'                     => $request->name,
                'subject'                  => $request->subject,
                'order_id'                 => $order_id,
                'email'                    => $client->email,
                'phone'                    => $client->phone,
                'company'                  => $request->company_name,
                'message'                  => $request->message,
                'ip_address'               => request()->ip(),
                'msg_category'             => $request->msg_category,
                'msg_type'                 => $request->msg_type,
                'create_time'              => Carbon::now(),
                'Closed_time'              => $request->Closed_time,
                'country'                  => $request->country,
                'support_hour'             => $support_hour,
                'support_tier'             => $support_tier,
                'support_tier_description' => $support_tier_description,
                'status'                   => 'pending',
            ]);

            if ($request->hasFile('attachment')) {
                $files = $request->file('attachment');

                foreach ($files as $file) {
                    $filePath = storage_path('app/public/');
                    $uploadedFile = Helper::customUpload($file, $filePath);

                    if ($uploadedFile['status'] == 1) {
                        CaseAttachment::create([
                            'case_id' =>  $supportCaseId,
                            'attachment' => $uploadedFile['file_name'],
                        ]);
                    }
                }
            }


            Notification::send($users, new NotificationsClientSupport($client->name, $code));

            $data = [
                'name'         => $client->name,
                'msg_category' => $request->msg_category,
                'msg_type'     => $request->msg_type,
                'phone'        => $request->phone,
                'company_name' => $request->company,
                'subject'      => $request->subject,
                'message'      => $request->message,
                'code'         => $code,
                'email'        => $client->email,
                'logo'         => $site->logo,
                'link'         => route('support-case.show', $code),
            ];
            $mail = Mail::to($client->email);

            if (!empty($ccRecipients)) {
                $mail->cc($ccRecipients);
            }

            // Attach the file to the email (replace 'attachment' with the actual file variable)
            // if ($request->hasFile('attachment')) {
            //     $files = $request->file('attachment');
            //     foreach ($files as $file) {

            //         $mail->attach($file->getRealPath(), [
            //             'as' => $file->getClientOriginalName(),
            //             'mime' => $file->getClientMimeType(),
            //         ]);
            //     }

            // }

            // Send the email
            $mail->send(new MailClientSupport($data));
            Toastr::success('Thank You. We have received your Support message. We will contact with you very soon.');
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
        $data['user'] = Auth::user();
        $user = $data['user'];
        // Get all clients
        $data['clients'] = Client::all();

        $data['case'] = SupportCase::where('code', $id)->firstOrFail();

        $data['attachments'] = CaseAttachment::where('case_id', $data['case']->id)->get();
        $data['messages'] = ClientSupportMessage::with('attachments')->where('case_code',$id)->orderBy('created_at')->get();
        return view('admin.pages.supportCase.show', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
