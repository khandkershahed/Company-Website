{{-- resources/views/partials/leave_table.blade.php --}}
<div class="card">
    <div class="px-2 pt-0 card-body hover-scroll-overlay-y" style="height: 450px">
        <table class="table border table-striped gs-7 rounded-3">
            <thead>
                @if (Route::currentRouteName() === 'admin.hrDashboard.index' || Route::currentRouteName() === 'hr-and-admin.index')
                    <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th>Type</th>
                        <th>Staff</th>
                        <th>Off Day</th>
                        <th>Job Status</th>
                        <th width="20%">Status</th>
                        <th>Substitute</th>
                        <th class="text-center">Action</th>
                    </tr>
                @else
                    <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th>Type</th>
                        <th>Off Day</th>
                        <th>Job Status</th>
                        <th width="20%">Status</th>
                        <th>Substitute</th>
                        <th class="text-center">Action</th>
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
                                class="mb-3 btn btn-sm btn-icon btn-primary btn-active-color-primary"
                                data-bs-toggle="modal" data-bs-target="#showLeaveApplication_{{ $leave->id }}"
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
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="text-white modal-header bg-primary">
                                            <h5 class="modal-title">Leave Application Details</h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Employee:</strong>
                                                {{ $leave->name ?? optional($leave->employee)->name }}</p>
                                            <p><strong>Designation:</strong>
                                                {{ $leave->designation ?? optional($leave->employee)->designation }}
                                            </p>
                                            <p><strong>Company:</strong> {{ $leave->company ?? '—' }}</p>
                                            <p><strong>Leave Type:</strong> {{ ucfirst($leave->type_of_leave) }}</p>
                                            <p><strong>Start Date:</strong>
                                                {{ \Carbon\Carbon::parse($leave->leave_start_date)->format('d M Y') }}
                                            </p>
                                            <p><strong>End Date:</strong>
                                                {{ \Carbon\Carbon::parse($leave->leave_end_date)->format('d M Y') }}
                                            </p>
                                            <p><strong>Total Days:</strong> {{ $leave->total_days ?? '—' }}</p>
                                            <p><strong>Leave Explanation:</strong>
                                                {{ $leave->leave_explanation ?? '—' }}</p>
                                            <p><strong>Address During Leave:</strong>
                                                {{ $leave->leave_address ?? '—' }}</p>
                                            <p><strong>Leave Contact No:</strong> {{ $leave->leave_contact_no ?? '—' }}
                                            </p>
                                            <p><strong>Reporting On:</strong>
                                                {{ \Carbon\Carbon::parse($leave->reporting_on)->format('d M Y') ?? '—' }}
                                            </p>

                                            <hr>

                                            <!-- Signatures -->
                                            <div class="row">
                                                <div class="text-center col-md-3">
                                                    <p>Substitute</p>
                                                    <img src="{{ asset('storage/' . $leave->substitute_signature) }}"
                                                        width="100" alt="Sub Signature">
                                                    <p class="mt-2 fw-bold">
                                                        {{ optional($leave->substitute)->name ?? '—' }}</p>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <p>Supervisor</p>
                                                    <img src="{{ asset('storage/' . $leave->supervisor_signature) }}"
                                                        width="100" alt="Sup Signature">
                                                    <p class="mt-2 fw-bold">
                                                        {{ optional($leave->supervisor)->name ?? '—' }}</p>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <p>HR</p>
                                                    <img src="{{ asset('storage/' . $leave->hr_signature) }}"
                                                        width="100" alt="HR Signature">
                                                    <p class="mt-2 fw-bold">HR/Admin</p>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <p>CEO</p>
                                                    <img src="{{ asset('storage/' . $leave->ceo_signature) }}"
                                                        width="100" alt="CEO Signature">
                                                    <p class="mt-2 fw-bold">CEO</p>
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Official Leave Balances -->
                                            <p><strong>Casual Leave Due:</strong> {{ $leave->casual_leave_due_as_on }}
                                            </p>
                                            <p><strong>Casual Leave Availed:</strong>
                                                {{ $leave->casual_leave_availed }}</p>
                                            <p><strong>Casual Leave Balance:</strong> {{ $leave->casual_balance_due }}
                                            </p>

                                            <p><strong>Earned Leave Due:</strong> {{ $leave->earned_leave_due_as_on }}
                                            </p>
                                            <p><strong>Earned Leave Availed:</strong>
                                                {{ $leave->earned_leave_availed }}</p>
                                            <p><strong>Earned Leave Balance:</strong> {{ $leave->earned_balance_due }}
                                            </p>

                                            <p><strong>Medical Leave Due:</strong>
                                                {{ $leave->medical_leave_due_as_on }}</p>
                                            <p><strong>Medical Leave Availed:</strong>
                                                {{ $leave->medical_leave_availed }}</p>
                                            <p><strong>Medical Leave Balance:</strong>
                                                {{ $leave->medical_balance_due }}</p>

                                            <hr>

                                            <!-- Notes -->
                                            <p><strong>Substitute Note:</strong> {{ $leave->substitute_note ?? '—' }}
                                            </p>
                                            <p><strong>Supervisor Note:</strong> {{ $leave->supervisor_note ?? '—' }}
                                            </p>
                                            <p><strong>HR Note:</strong> {{ $leave->hr_note ?? '—' }}</p>
                                            <p><strong>CEO Note:</strong> {{ $leave->ceo_note ?? '—' }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="javascript:void(0);"
                                class="mb-3 btn btn-sm btn-icon btn-primary btn-active-color-primary"
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
                                                <div class="mb-0 border-0 shadow-none card rounded-0">
                                                    <div class="p-0 card-body">
                                                        <div class="row text-start">
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Applicant Name:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" disabled
                                                                        value="{{ $leave->name }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Applicant Name" required>
                                                                </div>
                                                            </div>

                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Type Of Leave:
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
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Designation: <span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" name="designation"
                                                                        value="{{ $leave->designation }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Your Designation" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Company:</label>
                                                                    <input type="text" name="company"
                                                                        value="NGEN IT" disabled
                                                                        value="{{ $leave->company }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="NGEN IT">
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Leave Start Date:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="date" name="leave_start_date"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->leave_start_date }}"
                                                                        placeholder="Leave Start Date" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Leave End Date:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="date" name="leave_end_date"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->leave_end_date }}"
                                                                        placeholder="Leave End Date" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Total Days: <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" name="total_days"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->total_days }}"
                                                                        placeholder="Enter Total Dayes" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Job Status <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="job_status"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->job_status }}"
                                                                        placeholder="Enter Job Status" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Reporting On <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="date" name="reporting_on"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->reporting_on }}"
                                                                        placeholder="Reporting On" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-6">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Leave Explanation
                                                                        <span class="text-danger">*</span></label>
                                                                    <textarea name="leave_explanation" class="form-control form-control-sm" id="" cols="30"
                                                                        rows="3"placeholder="Enter Leave Explanation" required>{{ $leave->leave_explanation }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Substitute During
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
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Leave
                                                                        Address</label>
                                                                    <textarea name="leave_address" class="form-control form-control-sm" id="" cols="30" rows="1"
                                                                        placeholder="Leave Address">{{ $leave->leave_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-2">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Is Between
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
                                                            <div class="mb-5 col-lg-3">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Leave Contact
                                                                        Number</label>
                                                                    <input type="text" name="leave_contact_no"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->leave_contact_no }}"
                                                                        placeholder="Enter Enter Leave Contact Number">
                                                                </div>
                                                            </div>
                                                            <div class="mb-5 col-lg-4">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Include Open
                                                                        Saturday (If none
                                                                        enter: 0)</label>
                                                                    <input type="number"
                                                                        name="included_open_saturday"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $leave->included_open_saturday }}"
                                                                        placeholder="Enter Include Open Saturday">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="mb-5 col-lg-4">
                                                                    <div class="mb-7">
                                                                        <label class="mb-0 form-label">Substitute Signature <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="file" name="substitute_signature"
                                                                            class="form-control form-control-sm" required>
                                                                    </div>
                                                                </div> --}}
                                                            <div class="mb-5 col-lg-12">
                                                                <div class="mb-7">
                                                                    <label class="mb-0 form-label">Applicant
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
