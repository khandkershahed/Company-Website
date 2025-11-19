<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Mail\LeaveApprovalMail;
use App\Models\Admin\EmployeeLeave;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\EmployeeCategory;
use App\Models\Admin\LeaveApplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LeaveApprovalNotification;
use App\Notifications\LeaveRejectionNotification;

class LeaveController extends Controller
{
    public function leaveDashboard()
    {
            $user = User::where('id', Auth::user()->id)->first();
            $data = [
                'user' => $user,
                'employeeCategory' => EmployeeCategory::whereId($user->category_id)->first(),
                'leaveApplications' => LeaveApplication::where('employee_id', Auth::user()->id)->get(),
                'employee_leave_due' => EmployeeLeave::where('employee_id', Auth::user()->id)->first(),
            ];

            return view('admin.pages.leaveApplication.all', $data);

    }

    public function substituteApproval(Request $request, $id)
    {
        // dd($request->all());
        $rules = [
            'substitute_action'       => 'required|string',
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'string'   => 'The :attribute field must be a string.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
        $leaveApplication = LeaveApplication::findOrFail($id);
        $employee = User::find($leaveApplication->employee_id);
        $supervisor = User::find($employee->supervisor_id);
        if ($validator->passes()) {
            $substituteSignature = $request->file('substitute_signature');
            $uploadPath = storage_path('app/public/');

            if (!empty($substituteSignature)) {
                $globalFunsubstituteSignature = Helper::customUpload($substituteSignature, $uploadPath);
            } else {
                $globalFunsubstituteSignature = ['status' => 0];
            }
            $leaveApplication->update([
                'substitute_note'        => $request->substitute_note,
                'substitute_action'      => $request->substitute_action,
                'substitute_signature'   => $globalFunsubstituteSignature['status'] == 1 ? $substituteSignature->hashName() : null,
                'application_status'     => ($request->substitute_action == "approved") ? 'supervisor_approval_pending' : 'rejected_by_substitute',
                'status'                 => ($request->substitute_action == "approved") ? 'pending' : 'rejected',
            ]);

            $data = [
                'name'             => $leaveApplication->name,
                'designation'      => $leaveApplication->designation,
                'job_status'       => $leaveApplication->job_status,
                'leave_start_date' => $leaveApplication->leave_start_date,
                'leave_end_date'   => $leaveApplication->leave_end_date,
                'leave_contact_no' => $leaveApplication->leave_contact_no,
                'substitute'       => $leaveApplication->substitute_during_leave,
                'supervisor'       => $supervisor->name,
                'leave_address'    => $leaveApplication->leave_address,
                'type_of_leave'    => $leaveApplication->type_of_leave,
                'total_days'       => $leaveApplication->total_days,
                'leave_id'         => $leaveApplication->id,
                'status'           => ($request->substitute_action == "approved") ? 'supervisor_approval_pending' : 'leave_rejected',
                'rejected_by'      => Auth::user()->name,
            ];
            if ($data['status'] === 'supervisor_approval_pending') {
                Notification::send($supervisor, new LeaveApprovalNotification($leaveApplication->name, $data['leave_id']));

                // Mail::to($request->input('email'))->send(new LeaveRequest($data));
                if (!empty($supervisor->email)) {
                    Mail::to($supervisor->email)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            } else {
                Notification::send($employee, new LeaveRejectionNotification($data['rejected_by'], $data['leave_id']));
                if (!empty($employee->email)) {
                    Mail::to($employee->email)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            }

            Toastr::success('Thank You for your Action.');
            // return redirect()->back();
            return redirect()->route('admin.dashboard');
        } else {
            // Validation failed, display error messages
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function supervisorApproval(Request $request, $id)
    {
        $rules = [
            'supervisor_action'    => 'required|string',
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'string'   => 'The :attribute field must be a string.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
        $leaveApplication = LeaveApplication::findOrFail($id);
        $employee = User::find($leaveApplication->employee_id);
        $hr = User::whereJsonContains('department', 'hr')->where('role', 'admin')->get();
        $hr_emails = $hr->pluck('email')->toArray();

        if ($validator->passes()) {
            $supervisorSignature = $request->file('supervisor_signature');
            $uploadPath = storage_path('app/public/');

            if (!empty($supervisorSignature)) {
                $globalFunsupervisorSignature = Helper::customUpload($supervisorSignature, $uploadPath);
            } else {
                $globalFunsupervisorSignature = ['status' => 0];
            }
            $leaveApplication->update([
                'supervisor_note'        => $request->supervisor_note,
                'supervisor_action'      => $request->supervisor_action,
                'supervisor_signature'   => $globalFunsupervisorSignature['status'] == 1 ? $supervisorSignature->hashName() : null,
                'application_status'     => ($request->supervisor_action == "approved") ? 'hr_approval_pending' : 'rejected_by_supervisor',
                'status'                 => ($request->supervisor_action == "approved") ? 'pending' : 'rejected',
            ]);

            $data = [
                'name'             => $leaveApplication->name,
                'designation'      => $leaveApplication->designation,
                'job_status'       => $leaveApplication->job_status,
                'leave_start_date' => $leaveApplication->leave_start_date,
                'leave_end_date'   => $leaveApplication->leave_end_date,
                'leave_contact_no' => $leaveApplication->leave_contact_no,
                'substitute'       => $leaveApplication->substitute_during_leave,
                'leave_address'    => $leaveApplication->leave_address,
                'type_of_leave'    => $leaveApplication->type_of_leave,
                'total_days'       => $leaveApplication->total_days,
                'status'           => ($request->supervisor_action == "approved") ? 'hr_approval_pending' : 'leave_rejected',
                'rejected_by'      => Auth::user()->name,
                'leave_id'         => $leaveApplication->id,
            ];

            if ($data['status'] === 'hr_approval_pending') {
                Notification::send($hr, new LeaveApprovalNotification($leaveApplication->name, $data['leave_id']));

                if (!empty($hr_emails)) {
                    Mail::to($hr_emails)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            } else {
                Notification::send($employee, new LeaveRejectionNotification($data['rejected_by'], $data['leave_id']));
                if (!empty($employee->email)) {
                    Mail::to($employee->email)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            }
            Toastr::success('Thank You for your Action.');
            return redirect()->route('admin.dashboard');
        } else {
            // Validation failed, display error messages
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function hrApproval(Request $request, $id)
    {
        $rules = [
            'hr_action'    => 'required|string',
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'string'   => 'The :attribute field must be a string.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
        $leaveApplication = LeaveApplication::findOrFail($id);
        $employee = User::find($leaveApplication->employee_id);
        $ceo = User::whereJsonContains('department', 'admin')->where('role', 'admin')->get();
        $ceo_emails = $ceo->pluck('email')->toArray();

        if ($validator->passes()) {
            $hrSignature = $request->file('hr_signature');
            $uploadPath = storage_path('app/public/');

            if (!empty($hrSignature)) {
                $globalFunhrSignature = Helper::customUpload($hrSignature, $uploadPath);
            } else {
                $globalFunhrSignature = ['status' => 0];
            }

            EmployeeLeave::updateOrCreate(
                ['employee_id' => $leaveApplication->employee_id],
                [
                    'employee_id'             => $leaveApplication->employee_id,
                    'year'                    => date('y'),
                    'casual_leave_due_as_on'  => $request->casual_leave_due_as_on,
                    'casual_leave_availed'    => $request->casual_leave_availed,
                    'casual_balance_due'      => $request->casual_balance_due,
                    'earned_leave_due_as_on'  => $request->earned_leave_due_as_on,
                    'earned_leave_availed'    => $request->earned_leave_availed,
                    'earned_balance_due'      => $request->earned_balance_due,
                    'medical_leave_due_as_on' => $request->medical_leave_due_as_on,
                    'medical_leave_availed'   => $request->medical_leave_availed,
                    'medical_balance_due'     => $request->medical_balance_due,
                ]
            );

            $leaveApplication->update([
                'casual_leave_due_as_on'  => $request->casual_leave_due_as_on,
                'casual_leave_availed'    => $request->casual_leave_availed,
                'casual_balance_due'      => $request->casual_balance_due,
                'earned_leave_due_as_on'  => $request->earned_leave_due_as_on,
                'earned_leave_availed'    => $request->earned_leave_availed,
                'earned_balance_due'      => $request->earned_balance_due,
                'medical_leave_due_as_on' => $request->medical_leave_due_as_on,
                'medical_leave_availed'   => $request->medical_leave_availed,
                'medical_balance_due'     => $request->medical_balance_due,
                'hr_note'                 => $request->hr_note,
                'hr_action'               => $request->hr_action,
                'hr_signature'            => $globalFunhrSignature['status'] == 1 ? $hrSignature->hashName() : null,
                'application_status'      => ($request->hr_action == "approved") ? 'ceo_approval_pending' : 'rejected_by_hr',
                'status'                  => ($request->hr_action == "approved") ? 'pending' : 'rejected',
            ]);



            $data = [
                'name'             => $leaveApplication->name,
                'designation'      => $leaveApplication->designation,
                'job_status'       => $leaveApplication->job_status,
                'leave_start_date' => $leaveApplication->leave_start_date,
                'leave_end_date'   => $leaveApplication->leave_end_date,
                'leave_contact_no' => $leaveApplication->leave_contact_no,
                'substitute'       => $leaveApplication->substitute_during_leave,
                'leave_address'    => $leaveApplication->leave_address,
                'type_of_leave'    => $leaveApplication->type_of_leave,
                'total_days'       => $leaveApplication->total_days,
                'status'           => 'ceo_approval_pending',
                'status'           => ($request->hr_action == "approved") ? 'ceo_approval_pending' : 'leave_rejected',
                'rejected_by'      => Auth::user()->name,
                'leave_id'         => $leaveApplication->id,
            ];

            if ($data['status'] === 'ceo_approval_pending') {
                Notification::send($ceo, new LeaveApprovalNotification($leaveApplication->name, $data['leave_id']));
                if (!empty($ceo_emails)) {
                    Mail::to($ceo_emails)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            } else {
                Notification::send($employee, new LeaveRejectionNotification($data['rejected_by'], $data['leave_id']));
                if (!empty($employee->email)) {
                    Mail::to($employee->email)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            }
            Toastr::success('Thank You for your Action.');
            return redirect()->route('leave-application.index');
        } else {
            // Validation failed, display error messages
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function ceoApproval(Request $request, $id)
    {
        $rules = [
            'ceo_action'    => 'required|string',
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'string'   => 'The :attribute field must be a string.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
        $leaveApplication = LeaveApplication::findOrFail($id);
        $employee = User::find($leaveApplication->employee_id);
        $supervisor = User::find($employee->supervisor_id);
        $ceo = User::whereJsonContains('department', ['admin', 'hr'])->where('role', 'admin')->get();
        $ceo_emails = $ceo->pluck('email')->toArray();

        if ($validator->passes()) {
            $ceoSignature = $request->file('ceo_signature');
            $uploadPath = storage_path('app/public/');

            if (!empty($ceoSignature)) {
                $globalFunceoSignature = Helper::customUpload($ceoSignature, $uploadPath);
            } else {
                $globalFunceoSignature = ['status' => 0];
            }
            $leaveApplication->update([
                'ceo_note'              => $request->ceo_note,
                'ceo_action'            => $request->ceo_action,
                'ceo_signature'         => $globalFunceoSignature['status'] == 1 ? $ceoSignature->hashName() : null,
                'application_status'    => ($request->ceo_action == "approved") ? 'leave_approved' : 'rejected_by_ceo',
                'status'                => ($request->ceo_action == "approved") ? 'approved' : 'rejected',
            ]);

            $data = [
                'name'             => $leaveApplication->name,
                'designation'      => $leaveApplication->designation,
                'job_status'       => $leaveApplication->job_status,
                'leave_start_date' => $leaveApplication->leave_start_date,
                'leave_end_date'   => $leaveApplication->leave_end_date,
                'leave_contact_no' => $leaveApplication->leave_contact_no,
                'substitute'       => $leaveApplication->substitute_during_leave,
                'leave_address'    => $leaveApplication->leave_address,
                'type_of_leave'    => $leaveApplication->type_of_leave,
                'total_days'       => $leaveApplication->total_days,
                'status'           => ($request->ceo_action == "approved") ? 'leave_approved' : 'leave_rejected',
                'rejected_by'      => Auth::user()->name,
                'leave_id'         => $leaveApplication->id,
            ];

            if ($data['status'] === 'ceo_approval_pending') {
                if (!empty($ceo_emails)) {
                    Mail::to($ceo_emails)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
                if (!empty($employee)) {
                    Mail::to($employee)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
                if (!empty($supervisor)) {
                    Mail::to($supervisor)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            } else {
                Notification::send($employee, new LeaveRejectionNotification($data['rejected_by'], $data['leave_id']));
                if (!empty($employee->email)) {
                    Mail::to($employee->email)->send(new LeaveApprovalMail($data, $leaveApplication->name));
                }
            }
            Toastr::success('Thank You for your Action.');
            return redirect()->route('leave-application.index');
        } else {
            // Validation failed, display error messages
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
