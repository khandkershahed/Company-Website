@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header shadow d-flex justify-content-between align-items-center">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('hr-and-admin.index') }}" class="breadcrumb-item">HR & Admin</a>
                        <span class="breadcrumb-item active">Leave Applications</span>
                    </div>

                </div>
            </div>
            <div class="mx-2">
                <a href="{{ route('leave.history') }}" class="btn navigation_btn">
                    <div class="d-flex align-items-center ">
                        <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                        <span>History</span>
                    </div>
                </a>
            </div>
        </div>
        <!-- /page header -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h6 class="text-center card-main-title m-0 p-1">Today's Leave Applications</h6>
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-hover leaveDT">
                                        <thead class="border">
                                            <tr>
                                                <th width="5%" class="text-center">Sl</th>
                                                <th width="30%">Applicant name</th>
                                                <th width="15%">Type Of Leave</th>
                                                <th width="15%">Designation</th>
                                                <th width="20%">Status</th>
                                                <th width="15%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($leaveApplications)
                                                @foreach ($leaveApplications as $leaveApplication)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $leaveApplication->name }}</td>
                                                        <td>{{ $leaveApplication->type_of_leave }}</td>
                                                        <td>{{ $leaveApplication->designation }}</td>
                                                        <td>
                                                            <span
                                                                class="badge bg-{{ optional($leaveApplication)->application_status == 'approved' ? 'success' : (optional($leaveApplication)->application_status == 'rejected' ? 'danger' : 'warning') }}">
                                                                {{ optional($leaveApplication)->application_status == 'approved' ? 'Approved' : (optional($leaveApplication)->application_status == 'rejected' ? 'Rejected' : 'Pending') }}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('leave-application.edit', $leaveApplication->id) }}"
                                                                class="text-primary">
                                                                <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                                    style="color: #247297 !important;"></i>
                                                            </a>
                                                            <a href="{{ route('leave-application.destroy', $leaveApplication->id) }}"
                                                                class="text-danger delete">
                                                                <i class="fa-solid fa-trash p-1 rounded-circle text-white"
                                                                    style="color: #d60000 !important;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($leaveApplications as $leaveApplication)
        <div class="modal fade" id="makeleaveEdit-{{ $leaveApplication->id }}" data-bs-backdrop="static"
            data-bs-keyboard="true" tabindex="-1" aria-labelledby="checkapprovedLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content rounded-0">
                    <div class="modal-header rounded-0 text-white bg-secondary">
                        <h5 class="modal-title text-uppercase" id="checkapprovedLabel">Leave Application</h5>
                        <h2 class="accordion-header d-flex align-items-center" id="flush-headingOne">
                            <button class="ms-2 button-37 collapsed" type="button" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                <a href="javascript:void(0);" class="text-primary">
                                    <i class="fa-solid fa-eyes p-1 rounded-circle" style=" color: #174a62;"></i>
                                </a>
                            </button>
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body rounded-0">
                        <div class="container">
                            <div class="accordion accordion-flush" id="accordionFlushExample_{{ $leaveApplication->id }}">
                                <div class="accordion-item">
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne"
                                        data-bs-parent="#accordionFlushExample_{{ $leaveApplication->id }}">
                                        <div class="accordion-body p-0 m-0">
                                            <div class="row my-2">
                                                <div class="col-lg-12">

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Applicant Name: <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $leaveApplication->name }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Applicant Name"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Type Of Leave: <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="type_of_leave"
                                                                        value="{{ $leaveApplication->type_of_leave }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Type Of Leave"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Designation: <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="designation"
                                                                        value="{{ $leaveApplication->designation }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Your Designation"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Company:</label>
                                                                    <input type="text" name="company"
                                                                        value="{{ $leaveApplication->company }}"
                                                                        @disabled(true)
                                                                        class="form-control form-control-sm"
                                                                        placeholder="NGEN IT">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Leave Start Date:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="date" name="leave_start_date"
                                                                        value="{{ $leaveApplication->leave_start_date }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Leave Start Date"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Leave End Date:
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="date" name="leave_end_date"
                                                                        value="{{ $leaveApplication->leave_end_date }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Leave End Date"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Total Days: <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="total_days"
                                                                        value="{{ $leaveApplication->total_days }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Total Dayes"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Job Status <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="job_status"
                                                                        value="{{ $leaveApplication->job_status }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Job Status"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Reporting On <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="date" name="reporting_on"
                                                                        value="{{ $leaveApplication->reporting_on }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Leave End Date"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Leave Explanation
                                                                        <span class="text-danger">*</span></label>
                                                                    <textarea name="leave_explanation" class="form-control form-control-sm" id="" cols="30"
                                                                        rows="1"placeholder="Enter Leave Explanation" @disabled(true)>{{ $leaveApplication->leave_explanation }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Substitute During
                                                                        Leave
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" name="substitute_during_leave"
                                                                        value="{{ $leaveApplication->substitute_during_leave }}"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Substitute During Leave"
                                                                        @disabled(true)>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Leave Address</label>
                                                                    <input type="text" name="leave_address"
                                                                        value="{{ $leaveApplication->leave_address }}"
                                                                        class="form-control" @disabled(true)
                                                                        placeholder="Leave End Date">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Is Between
                                                                        Holiday</label>
                                                                    <div class="d-flex align-items-center">
                                                                        <p>{{ ucfirst($leaveApplication->is_between_holidays) }}
                                                                        </p>
                                                                        {{-- <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="is_between_holidays"
                                                                                    value="yes" id="yes"
                                                                                    @checked($leaveApplication->is_between_holidays == 'yes') disabled>
                                                                                <label class="form-check-label"
                                                                                    for="yes">
                                                                                    Yes
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check ms-3">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="is_between_holidays"
                                                                                    value="no" id="no"
                                                                                    @checked($leaveApplication->is_between_holidays == 'no') disabled>
                                                                                <label class="form-check-label"
                                                                                    for="no">
                                                                                    No
                                                                                </label>
                                                                            </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Leave Contact
                                                                        Number</label>
                                                                    <input type="text" name="leave_contact_no"
                                                                        value="{{ $leaveApplication->leave_contact_no }}"
                                                                        @disabled(true)
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Enter Leave Contact Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Include Open
                                                                        Saturday</label>
                                                                    <input type="text" name="included_open_saturday"
                                                                        value="{{ $leaveApplication->included_open_saturday }}"
                                                                        @disabled(true)
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Enter Include Open Saturday">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Substitute Signature
                                                                        <span class="text-danger">*</span></label>
                                                                    <img src="{{ asset('storage/' . $leaveApplication->substitute_signature) }}"
                                                                        width="200px" height="60px" alt="">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label mb-0">Applicant Signature
                                                                        <span class="text-danger">*</span></label>
                                                                    <img src="{{ asset('storage/' . $leaveApplication->applicant_signature) }}"
                                                                        width="200px" height="60px" alt="">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-end mt-3">
                                                        {{-- <button type="reset" value="Reset" class="submit_close_btn "
                                                                data-bs-dismiss="modal">Reset Form</button>
                                                            <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                                                style="padding: 4px 9px;">Submit</button> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('leave-application.update', $leaveApplication->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="p-0">
                                    <div class="row gx-0 mb-3">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered">
                                                <thead
                                                    style="background-color: #2472974f !important; color: #174a62 !important;">
                                                    <tr>
                                                        <th scope="col">Leave Position</th>
                                                        <th scope="col">Leave Due As On</th>
                                                        <th scope="col">Leave Availed</th>
                                                        <th scope="col">Balance Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="leave_position"
                                                                class="form-control form-control-sm" value="Earned Leave">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="leave_due_as_on"
                                                                class="form-control form-control-sm">
                                                        </td>
                                                        <td><input type="text" name="leave_availed"
                                                                class="form-control form-control-sm"></td>
                                                        <td><input type="text" name="balance_due"
                                                                class="form-control form-control-sm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="leave_position"
                                                                class="form-control form-control-sm" value="Casual Leave">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="leave_due_as_on"
                                                                class="form-control form-control-sm">
                                                        </td>
                                                        <td><input type="text" name="leave_availed"
                                                                class="form-control form-control-sm"></td>
                                                        <td><input type="text" name="balance_due"
                                                                class="form-control form-control-sm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="leave_position"
                                                                class="form-control form-control-sm"
                                                                value="Medical Leave">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="leave_availed"
                                                                class="form-control form-control-sm">
                                                        </td>
                                                        <td><input type="text" name="leave_due_as_on"
                                                                class="form-control form-control-sm"></td>
                                                        <td><input type="text" name="balance_due"
                                                                class="form-control form-control-sm"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row gx-0 mb-3">
                                        <div class="col-lg-6">
                                            <p class="m-0 border p-1"
                                                style="background-color: #2472974f !important; color:
                                            #174a62;">
                                                Checked By: (HR & Admin) <span class="text-danger">*</span>
                                            </p>
                                            <p class="m-0 border p-1"
                                                style="background-color: #2472974f !important; color:
                                            #174a62;">
                                                Recommended By: (CEO & Head) <span class="text-danger">*</span>
                                            </p>
                                            <p class="m-0 border p-1"
                                                style="background-color: #2472974f !important; color:#174a62;">
                                                Recived By: (OD) <span class="text-danger">*</span>
                                            </p>
                                            <p class="m-0 border p-1"
                                                style="background-color: #2472974f !important; color:#174a62;">
                                                Approved By: (MD) <span class="text-danger">*</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="m-0 p-0">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="checked_by" value="Approved">
                                            </p>
                                            <p class="m-0 p-0">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="recommended_by" value="Approved">
                                            </p>
                                            <p class="m-0 p-0">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="reviewed_by" value="Approved">
                                            </p>
                                            <p class="m-0 p-0">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="approved_by" value="Approved">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">

                                        <div class="col-lg-4">
                                            <label class="form-label">Application Status</label>
                                            <div class="btn-group d-flex justify-content-end" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check me-2" name="application_status"
                                                    id="btnradio1" autocomplete="off">
                                                <label class="btn btn-outline-success me-2"
                                                    for="btnradio1">Approved</label>

                                                <input type="radio" class="btn-check" name="application_status"
                                                    id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-danger" for="btnradio2">Reject</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <label class="form-label">Notes</label>
                                            <textarea name="note" class="form-control" rows="2" placeholder="Hr Note"></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer rounded-0">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Modal End --}}
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.leaveDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 3, 5],
                }, ],
            });
        });
    </script>
    <script>
        // Function to toggle the accordion without closing the modal
        function toggleAccordion() {
            const accordionButton = document.querySelector('[data-bs-target="#flush-collapseOne"]');
            const accordionCollapse = document.querySelector('#flush-collapseOne');
            const modalElement = document.querySelector('#makeleaveEdit');

            // Toggle the accordion
            if (accordionCollapse.classList.contains('show')) {
                accordionCollapse.classList.remove('show');
            } else {
                accordionCollapse.classList.add('show');
            }

            // Prevent the modal from closing
            modalElement.removeEventListener('click', closeModal);
        }

        // Function to close the modal
        function closeModal() {
            const modalElement = document.querySelector('#makeleaveEdit');
            modalElement.classList.remove('show');
        }

        // Add an event listener to the accordion button
        const accordionButton = document.querySelector('[data-bs-target="#flush-collapseOne"]');
        accordionButton.addEventListener('click', toggleAccordion);

        // Add an event listener to the modal close button
        const modalCloseButton = document.querySelector('[data-bs-dismiss="modal"]');
        modalCloseButton.addEventListener('click', closeModal);
    </script>
@endpush
