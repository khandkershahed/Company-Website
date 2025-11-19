<x-admin-app-layout :title="'Leave Approval'">
    <style>
        .custom-bg {
            background-color: #f5f8fa !important;
            font-weight: 700 !important;
        }

        .card-main-title {
            background-color: #e1f0ff !important;
            font-weight: 600;
        }

        .table th,
        .table td {
            vertical-align: middle;
            color: black;
            font-weight: 500;
        }
    </style>
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Leave Approval</h3>

                @if (Auth::user()->myDepartments(['super_admin', 'hr']))
                    <div class="card-toolbar">
                        <a href="{{ route('leave-application.index') }}"
                            class="btn btn-outline btn-outline-info btn-active-light-info">
                            <i class="fas fa-arrow-left me-3 text-info"></i>
                            Back to the List</a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="container">

                    <div class="card rounded-0">
                        <div class="card-header card-main-title align-items-center justify-content-center">
                            <h5 class="mb-0 text-center">
                                Leave Application Of
                                {{ !empty($leave->name) ? ucfirst($leave->name) : '(No Name)' }}
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border-dashed table-row-bordered border gy-5">
                                    <tbody>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Name</td>
                                            <td class="ps-4 w-30">
                                                {{ !empty($leave->name) ? ucfirst($leave->name) : 'N/A' }}
                                            </td>
                                            <td class="custom-bg ps-4 w-20">Type Of Leave</td>
                                            <td class="ps-4 w-30">{{ ucfirst($leave->type_of_leave) }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Designation</td>
                                            <td class="ps-4 w-30">{{ ucfirst($leave->designation) }}</td>
                                            <td class="custom-bg ps-4 w-20">Leave Period</td>
                                            <td class="ps-4 w-30">From
                                                <span class="text-info">{{ $leave->leave_start_date }}</span>
                                                To
                                                <span class="text-info">{{ $leave->leave_end_date }}</span>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Company</td>
                                            <td class="ps-4 w-30">
                                                {{ !empty($leave->company) ? ucfirst($leave->company) : 'NGen IT' }}
                                            </td>
                                            <td class="custom-bg ps-4 w-20">Total Days</td>
                                            <td class="ps-4 w-30">
                                                @php
                                                    $startDate = Carbon\Carbon::parse($leave->leave_start_date);
                                                    $endDate = Carbon\Carbon::parse($leave->reporting_on);
                                                    $daysCount = $startDate->diffInDays($endDate);
                                                @endphp
                                                {{ $daysCount }}
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Job Status</td>
                                            <td class="ps-4 w-30">{{ ucfirst($leave->job_status) }}</td>
                                            <td class="custom-bg ps-4 w-20">Reporting On</td>
                                            <td class="ps-4 w-30">{{ ucfirst($leave->reporting_on) }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Leave Explanation</td>
                                            <td class="ps-4 w-30 text-info">{{ $leave->leave_explanation }}
                                            </td>
                                            <td class="custom-bg ps-4 w-20">Substitute</td>
                                            <td class="ps-4 w-30">
                                                {{ ucfirst($leave->substitute_during_leave) }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Leave Address</td>
                                            <td class="ps-4 w-30">
                                                {{ !empty($leave->address) ? ucfirst($leave->address) : 'Dhaka' }}
                                            </td>
                                            <td class="custom-bg ps-4 w-20">Is Between Holiday</td>
                                            <td class="ps-4 w-30">
                                                {{ ucfirst($leave->is_between_holidays) }}
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Leave Contact</td>
                                            <td class="ps-4 w-30">{{ $leave->leave_contact_no }}</td>
                                            <td class="custom-bg ps-4 w-20">Included Open Saturday</td>
                                            <td class="ps-4 w-30">
                                                {{ $leave->included_open_saturday <= 0 ? 'None' : $leave->included_open_saturday }}
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="custom-bg ps-4 w-20">Supervisor</td>
                                            <td class="ps-4 w-30">
                                                {{ ucfirst($employee->getSupervisorName()) }}
                                            </td>
                                            <td class="custom-bg ps-4 w-20">Application Status</td>
                                            <td class="ps-4 w-30 text-danger">
                                                {{ Str::title(str_replace('_', ' ', $leave->application_status)) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if ($leave->application_status === 'substitute_approval_pending')
                        <form action="{{ route('substitute.approval', $leave->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="m-0 p-4 text-center card-main-title">
                                        Substitute Approval
                                    </h5>
                                    <div class="card rounded-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Substitute Signature</label>
                                                    <input type="file" name="substitute_signature"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Comments</label>
                                                    <textarea class="form-control form-control-sm" name="substitute_note" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-3 justify-content-center">
                                                <div class="col-lg-6 text-center">
                                                    <h6 class="mt-7 mb-4">Action</h6>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic radio toggle button group">
                                                        <button type="submit" class="btn p-4 px-5 btn-danger me-7"
                                                            name="substitute_action" value="rejected"
                                                            style="padding: 4px 9px;">Reject</button>
                                                        <button type="submit" class="btn p-4 px-5 btn-success"
                                                            name="substitute_action" value="approved"
                                                            style="padding: 4px 9px;">Approved</button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                    @if ($leave->application_status === 'supervisor_approval_pending')
                        <form action="{{ route('supervisor.approval', $leave->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="m-0 p-1 text-center card-main-title">
                                        Supervisor Approval
                                    </h5>
                                    <div class="card rounded-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Supervisor Signature</label>
                                                    <input type="file" name="supervisor_signature"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Comments</label>
                                                    <textarea class="form-control form-control-sm" name="supervisor_note" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-3 justify-content-center">
                                                <div class="col-lg-6 text-center">
                                                    <h6 class="mt-7 mb-4">Action</h6>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic radio toggle button group">
                                                        <button type="submit" class="btn p-4 px-5 btn-danger me-7"
                                                            name="supervisor_action" value="rejected"
                                                            style="padding: 4px 9px;">Reject</button>
                                                        <button type="submit" class="btn p-4 px-5 btn-success"
                                                            name="supervisor_action" value="approved"
                                                            style="padding: 4px 9px;">Approved</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                {{-- Approval Sections --}}
                @if ($leave->application_status === 'hr_approval_pending')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 card-title text-center">HR Approval</h5>
                        </div>
                        <form action="{{ route('hr.approval', $leave->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="table-responsive col-lg-10 offset-lg-1">
                                        <table class="table table-row-bordered border gs-5">
                                            <thead
                                                style="background-color: #ae0a468f !important; color: white !important;">
                                                <tr>
                                                    <th width="30%">Leave Position</th>
                                                    <th width="23%">Leave Due As On</th>
                                                    <th width="23%">Leave Availed</th>
                                                    <th width="23%">Balance Due</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Earned Leave
                                                    </td>
                                                    <td>
                                                        <input type="number" name="earned_leave_due_as_on"
                                                            value="{{ optional($employee_leave_due)->earned_leave_due_as_on ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="earned_leave_availed"
                                                            value="{{ optional($employee_leave_due)->earned_leave_availed ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="earned_balance_due"
                                                            value="{{ optional($employee_leave_due)->earned_balance_due ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Casual Leave
                                                    </td>
                                                    <td>
                                                        <input type="number" name="casual_leave_due_as_on"
                                                            value="{{ optional($employee_leave_due)->casual_leave_due_as_on ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="casual_leave_availed"
                                                            value="{{ optional($employee_leave_due)->casual_leave_availed ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="casual_balance_due"
                                                            value="{{ optional($employee_leave_due)->casual_balance_due ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Medical Leave
                                                    </td>
                                                    <td>
                                                        <input type="number" name="medical_leave_due_as_on"
                                                            value="{{ optional($employee_leave_due)->medical_leave_due_as_on ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="medical_leave_availed"
                                                            value="{{ optional($employee_leave_due)->medical_leave_availed ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="medical_balance_due"
                                                            value="{{ optional($employee_leave_due)->medical_balance_due ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col-md-5 col-12 mb-3">
                                        <label class="form-label">HR Signature</label>
                                        <input type="file" name="hr_signature"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-7 col-12 mb-3">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control form-control-sm" name="hr_note" rows="1"></textarea>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <h6 class="mt-7 mb-4">Action</h6>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <button type="submit" class="btn p-4 px-5 btn-danger me-7"
                                                name="hr_action" value="rejected"
                                                style="padding: 4px 9px;">Reject</button>
                                            <button type="submit" class="btn p-4 px-5 btn-success" name="hr_action"
                                                value="approved" style="padding: 4px 9px;">Approved</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @if ($leave->application_status === 'ceo_approval_pending')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 card-title text-center">CEO Approval</h5>
                        </div>
                        <form action="{{ route('ceo.approval', $leave->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="table-responsive col-lg-10 offset-lg-1">
                                        <table class="table table-row-bordered border gs-5">
                                            <thead
                                                style="background-color: #ae0a468f !important; color: white !important;">
                                                <tr>
                                                    <th width="30%">Leave Position</th>
                                                    <th width="23%">Leave Due As On</th>
                                                    <th width="23%">Leave Availed</th>
                                                    <th width="23%">Balance Due</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Earned Leave
                                                    </td>
                                                    <td>
                                                        <input type="number" name="earned_leave_due_as_on"
                                                            value="{{ optional($employee_leave_due)->earned_leave_due_as_on ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="earned_leave_availed"
                                                            value="{{ optional($employee_leave_due)->earned_leave_availed ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="earned_balance_due"
                                                            value="{{ optional($employee_leave_due)->earned_balance_due ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Casual Leave
                                                    </td>
                                                    <td>
                                                        <input type="number" name="casual_leave_due_as_on"
                                                            value="{{ optional($employee_leave_due)->casual_leave_due_as_on ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="casual_leave_availed"
                                                            value="{{ optional($employee_leave_due)->casual_leave_availed ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="casual_balance_due"
                                                            value="{{ optional($employee_leave_due)->casual_balance_due ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Medical Leave
                                                    </td>
                                                    <td>
                                                        <input type="number" name="medical_leave_due_as_on"
                                                            value="{{ optional($employee_leave_due)->medical_leave_due_as_on ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="medical_leave_availed"
                                                            value="{{ optional($employee_leave_due)->medical_leave_availed ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="medical_balance_due"
                                                            value="{{ optional($employee_leave_due)->medical_balance_due ?? '' }}"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col-md-5 col-12 mb-3">
                                        <label class="form-label">CEO Signature</label>
                                        <input type="file" name="ceo_signature"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-7 col-12 mb-3">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control form-control-sm" name="ceo_note" rows="1"></textarea>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <h6 class="mt-7 mb-4">CEO Action</h6>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <button type="submit" class="btn p-4 px-5 btn-danger me-7"
                                                name="ceo_action" value="rejected"
                                                style="padding: 4px 9px;">Reject</button>
                                            <button type="submit" class="btn p-4 px-5 btn-success" name="ceo_action"
                                                value="approved" style="padding: 4px 9px;">Approved</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-app-layout>
