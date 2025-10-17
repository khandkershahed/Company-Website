{{-- resources/views/partials/leave_table.blade.php --}}
<div class="card">
    <div class="px-2 card-body hover-scroll-overlay-y" style="height: 450px">
        <table class="table border table-striped gs-7 rounded-3">
            <thead>
                @if (Route::currentRouteName() === 'admin.hrDashboard.index' || Route::currentRouteName() === 'hr-and-admin.index')
                    <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th width="12%">Type</th>
                        <th width="12%">Staff</th>
                        <th width="20%">Off Day</th>
                        <th width="12%">Job Status</th>
                        <th width="12%">Status</th>
                        <th width="18%">Substitute</th>
                        <th width="12%" class="text-center">Action</th>
                    </tr>
                @else
                    <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th width="15%">Type</th>
                        <th width="22%">Off Day</th>
                        <th width="15%">Job Status</th>
                        <th width="13%">Status</th>
                        <th width="20%">Substitute</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                @endif
            </thead>
            <tbody>
                @forelse ($leaves as $leave)
                    <tr>
                        <td>{{ ucfirst($leave->type_of_leave) }}</td>
                        @if (Route::currentRouteName() === 'admin.hrDashboard.index' || Route::currentRouteName() === 'hr-and-admin.index')
                            <td>{{ optional($leave->user)->name ?? '—' }}</td>
                        @endif
                        <td>
                            <span
                                class="text-info">{{ strtoupper(\Carbon\Carbon::parse($leave->leave_start_date)->format('j M y')) }}</span>
                            To
                            <span
                                class="text-info">{{ strtoupper(\Carbon\Carbon::parse($leave->leave_end_date)->format('j M y')) }}</span>
                        </td>
                        <td>
                            <span class="text-white badge bg-info">
                                {{ optional(Auth::user()->employeeStatus)->name ?? '—' }}
                            </span>
                        </td>
                        <td>
                            <span
                                class="badge
                                @if ($leave->application_status == 'approved') bg-primary
                                @elseif($leave->application_status == 'rejected') bg-danger
                                @elseif($leave->application_status == 'pending') bg-warning
                                @else bg-info @endif
                            ">
                                {{ Str::title(str_replace('_', ' ', $leave->application_status)) }}

                            </span>
                        </td>
                        <td>{{ optional($leave->substitute)->name ?? '—' }}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)"
                                class="btn btn-sm btn-icon btn-primary btn-active-color-primary mb-3"
                                data-bs-toggle="modal" data-bs-target="#showLeaveApplication"
                                data-id="{{ $leave->id }}" title="Show Application">
                                <i class="text-white fa-solid fa-eye fs-6"></i>
                            </a>
                            {{-- <a href="javascript:void(0);"
                                class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn"
                                data-id="{{ $leave->id }}" title="Print Application">
                                <i class="text-white fa-solid fa-print fs-6"></i>
                            </a> --}}
                            <div class="modal fade" id="showLeaveApplication_{{ $leave->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog-centered modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="py-3 border-0 modal-header bg-primary rounded-0">
                                            <h3 class="text-white modal-title">Leave Application</h3>
                                            <div class="btn btn-sm btn-icon btn-white" data-bs-dismiss="modal">
                                                <i class="fa fa-times text-white"></i>
                                            </div>
                                        </div>
                                        <div class="p-20 pt-0 modal-body scroll-y px-15">
                                            <div class="printContent">
                                                <div class="mt-5 row">
                                                    <div class="col-md-12">
                                                        <div class="text-end mb-3">
                                                            <img src="https://i.ibb.co/yddR5JX/minimal-letters-professional-ngen-logo-260nw-2016934238-removebg-preview.png"
                                                                style="height: 60px" alt="NGEN Logo">
                                                        </div>
                                                        <p class="py-3">Date:
                                                            {{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
                                                        <p class="fw-bold mb-0">Managing Director</p>
                                                        <p class="fw-bold mb-0">NGENT IT</p>
                                                        <p class="fw-bold mb-0">Ring Road, Dhaka-1207</p>
                                                        <p class="fw-bold mb-5">Phone: +8801714243446</p>

                                                        <p class="mb-3 fw-bold">
                                                            Substitute: {{ optional($leave->substitute)->name ?? '—' }}
                                                        </p>

                                                        <div class="mb-3">
                                                            <h5>Subject: <span>Leave Request For
                                                                    {{ ucfirst($leave->type_of_leave) }}</span></h5>
                                                        </div>

                                                        <div style="text-align: justify">
                                                            <p>Dear <span class="fw-bold">Sir</span>,</p>
                                                            <p>
                                                                I am writing to inform you that I need to take leave
                                                                from work
                                                                starting on
                                                                <strong>{{ \Carbon\Carbon::parse($leave->leave_start_date)->format('F j, Y') }}</strong>
                                                                to
                                                                <strong>{{ \Carbon\Carbon::parse($leave->leave_end_date)->format('F j, Y') }}</strong>.
                                                                Applying for
                                                                <strong>{{ ucfirst($leave->type_of_leave) }}</strong>.
                                                            </p>
                                                            <p>
                                                                The reason for my leave is as mentioned in the
                                                                application. I have ensured that my current tasks
                                                                are either completed or delegated, and I will be
                                                                reachable in case of emergencies.
                                                            </p>
                                                            <p>
                                                                I would appreciate your kind approval.
                                                            </p>
                                                        </div>

                                                        <div class="pt-4">
                                                            <p class="fw-bold mb-0">Thank you.</p>
                                                            <p class="mb-0 fw-bold">Sincerely,</p>
                                                            <p class="mb-0">{{ optional($leave->user)->name ?? '—' }}
                                                            </p>
                                                            <p class="mb-0">
                                                                {{ optional($leave->user)->designation ?? 'Employee' }}
                                                            </p>
                                                            <p class="mb-0">NGEN IT Ltd.</p>
                                                        </div>

                                                        <div class="pt-5 mt-4">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p class="text-gray mb-0">Substitute Signature</p>
                                                                    <div class="divider"></div>
                                                                    <p class="fw-bold">
                                                                        {{ optional($leave->substitute)->name ?? '—' }}
                                                                    </p>
                                                                    {{-- <img class="img-fluid" width="100px"
                                                                        src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                                                                        alt="" /> --}}
                                                                </div>
                                                                {{-- <div class="col-lg-4">
                                                                    <p class="text-gray mb-0">Supervisor Signature</p>
                                                                    <div class="divider"></div>
                                                                    <p class="fw-bold">[Supervisor Name]</p>
                                                                    <img class="img-fluid" width="100px"
                                                                        src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                                                                        alt="" />
                                                                </div> --}}
                                                                {{-- <div class="col-lg-4">
                                                                    <p class="text-gray mb-0">HR & Admin Signature</p>
                                                                    <div class="divider"></div>
                                                                    <p class="fw-bold">[HR Name]</p>
                                                                    <img class="img-fluid" width="100px"
                                                                        src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                                                                        alt="" />
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="px-10 py-5 d-flex justify-content-between align-items-center border-top">
                                            <div class="d-flex align-items-center">
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusSwitch_{{ $leave->id }}">
                                                    <span class="ms-2 text-danger">Not Approved</span>
                                                </label>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);"
                                class="btn btn-sm btn-icon btn-primary btn-active-color-primary mb-3"
                                title="Edit Application" data-bs-toggle="modal"
                                data-bs-target="#editLeaveApplication-{{ $leave->id }}">
                                <i class="text-white fa-solid fa-pen fs-6"></i>
                            </a>
                            <div class="modal fade" id="editLeaveApplication-{{ $leave->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog-centered modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="py-3 border-0 modal-header bg-primary rounded-0">
                                            <h3 class="text-white modal-title">Edit Leave Application</h3>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary btn-white"
                                                data-bs-dismiss="modal">
                                                <span class="svg-icon svg-icon-1">
                                                    X
                                                </span>
                                            </div>
                                        </div>
                                        <form method="POST"
                                            action="{{ route('leave-application.update', $leave->id) }}"
                                            enctype="multipart/form-data">
                                            @method('PATCH')
                                            @csrf
                                            <div class="modal-body scroll-y px-15">
                                                <div class="card rounded-0 shadow-none border-0 mb-0">
                                                    <div class="card-body p-0">
                                                        <div class="row text-start">
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Applicant Name:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" disabled
                                                                        value="{{ $leave->name }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Applicant Name" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Type Of Leave:
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="type_of_leave"
                                                                        class="form-select form-select-sm"
                                                                        data-control="select2"
                                                                        data-placeholder="Select Type of Leave"
                                                                        data-allow-clear="true" required>
                                                                        <option value="sick"
                                                                            @selected($leave->type_of_leave == 'sick')>Sick
                                                                            Leave</option>
                                                                        <option value="earned"
                                                                            @selected($leave->type_of_leave == 'earned')>Earned
                                                                            Leave</option>
                                                                        <option value="casual"
                                                                            @selected($leave->type_of_leave == 'casual')>Casual
                                                                            Leave</option>
                                                                    </select>
                                                                    <div class="invalid-feedback"> Please Enter Type Of
                                                                        Leave.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Designation: <span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" name="designation"
                                                                        value="{{ $leave->designation }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Your Designation" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Company:</label>
                                                                    <input type="text" name="company"
                                                                        value="NGEN IT" disabled
                                                                        value="{{ $leave->company }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="NGEN IT">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Leave Start Date:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="date" name="leave_start_date"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->leave_start_date }}"
                                                                        placeholder="Leave Start Date" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Leave End Date:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="date" name="leave_end_date"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->leave_end_date }}"
                                                                        placeholder="Leave End Date" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Total Days: <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" name="total_days"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->total_days }}"
                                                                        placeholder="Enter Total Dayes" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Job Status <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="job_status"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->job_status }}"
                                                                        placeholder="Enter Job Status" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Reporting On <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="date" name="reporting_on"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->reporting_on }}"
                                                                        placeholder="Reporting On" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Leave Explanation
                                                                        <span class="text-danger">*</span></label>
                                                                    <textarea name="leave_explanation" class="form-control form-control-sm" id="" cols="30"
                                                                        rows="3"placeholder="Enter Leave Explanation" required>{{ $leave->leave_explanation }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Substitute During
                                                                        Leave <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="substitute_id"
                                                                        class="form-select form-select-sm"
                                                                        data-control="select2"
                                                                        data-placeholder="Select a Substitute"
                                                                        data-allow-clear="true" required>
                                                                        <option></option>
                                                                        @foreach ($all_employees as $substitute)
                                                                            <option value="{{ $substitute->id }}"
                                                                                @selected($leave->substitute_id === $substitute->id)>
                                                                                {{ $substitute->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback"> Please Select
                                                                        substitute.</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Leave
                                                                        Address</label>
                                                                    <textarea name="leave_address" class="form-control form-control-sm" id="" cols="30" rows="1"
                                                                        placeholder="Leave Address">{{ $leave->leave_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Is Between
                                                                        Holiday</label>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="radio" value="yes"
                                                                                name="is_between_holidays"
                                                                                id="yes"
                                                                                @checked($leave->is_between_holidays == 'yes')>
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Yes
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check ms-3">
                                                                            <input class="form-check-input"
                                                                                type="radio" value="no"
                                                                                name="is_between_holidays"
                                                                                id="no"
                                                                                @checked($leave->is_between_holidays == 'no')>
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Leave Contact
                                                                        Number</label>
                                                                    <input type="text" name="leave_contact_no"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->leave_contact_no }}"
                                                                        placeholder="Enter Enter Leave Contact Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Include Open
                                                                        Saturday (If none
                                                                        enter: 0)</label>
                                                                    <input type="number"
                                                                        name="included_open_saturday"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->included_open_saturday }}"
                                                                        placeholder="Enter Include Open Saturday">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-lg-4 mb-5">
                                                                    <div class="mb-7">
                                                                        <label class="form-label mb-0">Substitute Signature <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="file" name="substitute_signature"
                                                                            class="form-control form-control-sm" required>
                                                                    </div>
                                                                </div> --}}
                                                            <div class="col-lg-12 mb-5">
                                                                <div class="mb-7">
                                                                    <label class="form-label mb-0">Applicant
                                                                        Signature</label>
                                                                    <input type="file" name="applicant_signature"
                                                                        value="{{ $leave->applicant_signature }}"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary float-end"
                                                    style="padding: 4px 9px;">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No leave records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
