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
                                data-bs-toggle="modal" data-bs-target="#showPendingLeave-{{ $leave->id }}"
                                data-id="{{ $leave->id }}" title="Show Application">
                                <i class="text-white fa-solid fa-eye fs-6"></i>
                            </a>

                            <div class="modal fade" id="showPendingLeave-{{ $leave->id }}" tabindex="-1"
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

                            <a href="{{ route('leave-application.edit',$leave->id) }}"
                                class="mb-3 btn btn-sm btn-icon btn-primary btn-active-color-primary"
                                title="Edit Application">
                                <i class="text-white fa-solid fa-pen fs-6"></i>
                            </a>
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
