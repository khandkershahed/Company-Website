{{-- resources/views/partials/leave_table.blade.php --}}
<div class="card">
    <div class="px-2 card-body hover-scroll-overlay-y" style="height: 450px">
        <table class="table border table-striped gs-7 rounded-3">
            <thead>
                <tr class="text-gray-800 fw-bold fs-6 px-7">
                    <th width="15%">Type</th>
                    <th width="22%">Off Day</th>
                    <th width="15%">Job Status</th>
                    <th width="13%">Status</th>
                    <th width="20%">Substitute</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leaves as $leave)
                    <tr>
                        <td>{{ ucfirst($leave->type_of_leave) }}</td>
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
                                class="btn btn-sm btn-icon btn-primary btn-active-color-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#showLeaveApplication" data-id="{{ $leave->id }}"
                                title="Show Application">
                                <i class="text-white fa-solid fa-eye fs-6"></i>
                            </a>
                            {{-- <a href="javascript:void(0);"
                                class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn"
                                data-id="{{ $leave->id }}" title="Print Application">
                                <i class="text-white fa-solid fa-print fs-6"></i>
                            </a> --}}
                            <div class="modal fade" id="showLeaveApplication" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog-centered modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="py-3 border-0 modal-header bg-primary rounded-0">
                                            <h3 class="text-white modal-title">Leave Application</h3>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary btn-white"
                                                data-bs-dismiss="modal">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2"
                                                            rx="1" transform="rotate(45 7.41422 6)"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="p-20 pt-0 modal-body scroll-y px-15">
                                            <div class="printContent">
                                                <div class="mt-5 row">
                                                    <div class="col-md-12">
                                                        <div class="logo-container"
                                                            style="position: relative; right: 40px">
                                                            <img alt="Logo"
                                                                src="https://i.ibb.co/yddR5JX/minimal-letters-professional-ngen-logo-260nw-2016934238-removebg-preview.png"
                                                                class="company-logo"
                                                                style="width: 200px; height: 80px" />
                                                        </div>
                                                        <div>
                                                            <p class="py-5 my-5">Date: August 20, 2024</p>
                                                            <p class="mb-0 fw-bold">Managing Director</p>
                                                            <p class="mb-0 fw-bold">NGent It</p>
                                                            <p class="mb-0 fw-bold">Ring Road, Dhaka-1207</p>
                                                            <p class="mb-0 fw-bold">Phone: +8801714243446</p>
                                                        </div>
                                                        <div class="py-5">
                                                            <p class="mb-0 fw-bold">
                                                                Substitute: Khandaker Shahed (Team Leader)
                                                            </p>
                                                        </div>
                                                        <div class="pt-5 my-5">
                                                            <h5>
                                                                Subject:
                                                                <span>Leave Request For Sick/Earn/Casual</span>
                                                            </h5>
                                                        </div>

                                                        <div class="letter-content" style="text-align: justify">
                                                            <p class="pt-5">Dear <span class="fw-bold">Sir</span>,</p>
                                                            <p>
                                                                I am writing to inform you that I need to take leave
                                                                from
                                                                work for 3 days. The leave will start on
                                                                <span class="fw-bold">August 21, 2024</span>, and I will
                                                                resume work on
                                                                <span class="fw-bold">August 24, 2024</span>. Applying
                                                                for
                                                                <span class="fw-bold">Sick Leave</span>.
                                                            </p>

                                                            <p>
                                                                The reason for my leave is a scheduled medical
                                                                appointment. I have ensured that my current tasks are
                                                                either completed or handed over to a colleague, and I
                                                                will
                                                                be available via email should any urgent matters arise.
                                                            </p>

                                                            <p>
                                                                I appreciate your understanding and approval of this
                                                                leave
                                                                request.
                                                            </p>
                                                        </div>

                                                        <div class="pt-5 signature-section">
                                                            <p class="fw-bold">Thank you.</p>
                                                            <p class="mb-0 fw-bold">Sincerely,</p>
                                                            <p class="mb-0">Sazeduzzaman Saju</p>
                                                            <p class="mb-0">Frontend Developer</p>
                                                            <p class="mb-0">NGEN IT Ltd.</p>
                                                        </div>
                                                        <div class="pt-5 mt-5">
                                                            <!-- Substitute Signature -->
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p class="mb-0 text-gray">Substitute Signature</p>
                                                                    <div class="divider"></div>
                                                                    <div>
                                                                        <p class="fw-bold">Khandaker Shahed</p>
                                                                        <img class="img-fluid" width="100px"
                                                                            src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                                                                            alt="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <p class="mb-0 text-gray">Supervisor Signature</p>
                                                                    <div class="divider"></div>
                                                                    <div>
                                                                        <p class="fw-bold">Khandaker Shahed</p>
                                                                        <img class="img-fluid" width="100px"
                                                                            src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                                                                            alt="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <p class="mb-0 text-gray">HR & Admin Signature</p>
                                                                    <div class="divider"></div>
                                                                    <div>
                                                                        <p class="fw-bold">Minhaj Hossain</p>
                                                                        <img class="img-fluid" width="100px"
                                                                            src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                                                                            alt="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Substitute Signature -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-10 py-5 d-flex justify-content-between align-items-center"
                                            style="border-top: 1px solid #eee">
                                            <div class="d-flex align-items-center">
                                                <label class="status-switch">
                                                    <input type="checkbox" id="statusSwitch"
                                                        class="form-control-sm form-control" />
                                                    <span class="status-switch-slider"></span>
                                                </label>
                                                <p id="statusText" class="mb-0 text-danger ps-5">Not Approved</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
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
                                                                        class="form-select form-select-sm" data-control="select2"
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
