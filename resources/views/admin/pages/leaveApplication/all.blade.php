@extends('admin.master')
@section('content')
    <style>
        /* Styling for info-cards and related elements */
        .info-cards {
            background-color: #ae0a46;
            color: white !important;
        }

        .info-cards h6 {
            background-color: #ae0a46;
            color: white !important;
        }

        .info-details {
            border-top: 1px solid #ae0a46; 
        }
    </style>
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- Page Destination/Breadcrumb --}}
                    <div class="page-header-content d-lg-flex">
                        <div class="d-flex px-2">
                            <div class="breadcrumb py-2">
                                {{-- Home link --}}
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                                {{-- Dashboard link --}}
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                {{-- Active page label --}}
                                <span class="breadcrumb-item active">Leave Dashboard</span>
                            </div>
                            {{-- Collapse button for breadcrumb on smaller screens --}}
                            <a href="#breadcrumb_elements"
                                class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                                data-bs-toggle="collapse">
                                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                            </a>
                        </div>
                    </div>
                    {{-- Inner Page Actions --}}
                    <div class="d-lg-block d-sm-none">
                        {{-- Button to trigger the "Make Leave" modal --}}
                        <a href="javascript:void(0)" class="btn navigation_btn" data-bs-toggle="modal"
                            data-bs-target="#makeleave">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-person-walking-arrow-right me-1" style="font-size: 14px;"></i>
                                <span>Make A Leave</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="btn navigation_btn" data-bs-toggle="modal"
                            data-bs-target="#makeleave">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-clipboard-user me-1" style="font-size: 14px;"></i>
                                <span>All Attendance </span>
                            </div>
                        </a>
                        {{-- Example: Button for another action --}}
                        {{-- <a href="" class="btn navigation_btn" data-bs-toggle="modal" data-bs-target="#checkapproved">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 14px;"></i>
                                <span>Give Approval</span>
                            </div>
                        </a> --}}
                    </div>
                    <!-- Basic tabs -->
                </div>
            </div>
            <div class="content mt-2">
                <h5 class="text-center py-1">My Leave Dashboard</h5>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 mx-auto">
                        <div class="row">
                            <div class="col-lg-4">
                                <h6 class="m-0 p-1 text-center card-main-title">Leave Info</h6>
                                <a href="{{ route('employee.index') }}">
                                    <div class="card rounded-0">
                                        <div class="card-body p-2">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="emplpyee-card">
                                                        <div class="d-flex justify-content-between align-items-center pb-3">
                                                            <h6 class="m-0"><i
                                                                    class="fa-solid fa-right-from-bracket badge-icons"></i>
                                                            </h6>
                                                            <h6 class="main_color m-0 ammount rounded-1">14</h6>
                                                        </div>
                                                        <div class="pt-4">
                                                            <h6 class="text-muted m-0 text-center">Total Leaves Available
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="emplpyee-card">
                                                        <div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center pb-1">
                                                                <p class="m-0"><i
                                                                        class="fa-solid fa-bed-pulse badge-icons me-1"></i>
                                                                </p>
                                                                <p class="text-muted m-0">Sick Leave</p>
                                                                <p class="main_color m-0 ammount rounded-1">
                                                                    5
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center pb-1">
                                                                <p class="m-0">
                                                                    <i
                                                                        class="fa-solid fa-right-from-bracket badge-icons me-1"></i>
                                                                </p>
                                                                <p class="text-muted m-0">Earned Leave</p>
                                                                <p class="main_color m-0 ammount rounded-1">
                                                                    3</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center ">
                                                                <p class="m-0"><i
                                                                        class="fa-solid fa-right-from-bracket badge-icons me-1"></i>
                                                                </p>
                                                                <p class="text-muted m-0">Casual Leave</p>
                                                                <p class="main_color m-0 ammount rounded-1">
                                                                    5</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <div class="card rounded-0">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table text-center table-striped table-hover">
                                                <thead
                                                    style="background-color: #247297 !important; color: white !important;">
                                                    <tr>
                                                        <th class="p-1" width="30%">Type</th>
                                                        <th class="p-1" width="25%">Due As On</th>
                                                        <th class="p-1" width="25%">Availed</th>
                                                        <th class="p-1" width="20%">Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <!-- Leave Information Rows -->
                                                    <tr>
                                                        <td class="p-2 bg-light">Earned Leave</td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->earned_leave_due_as_on ?? '' }}
                                                        </td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->earned_leave_availed ?? '' }}
                                                        </td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->earned_balance_due ?? '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-2 bg-light">Casual Leave</td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->casual_leave_due_as_on ?? '' }}
                                                        </td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->casual_leave_availed ?? '' }}
                                                        </td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->casual_balance_due ?? '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-2 bg-light">Medical Leave</td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->medical_leave_due_as_on ?? '' }}
                                                        </td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->medical_leave_availed ?? '' }}
                                                        </td>
                                                        <td class="p-2">
                                                            {{ optional($employee_leave_due)->medical_balance_due ?? '' }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="m-0 p-1 text-center card-main-title">Leave Performance Meter</h6>
                                <div class="card rounded-0">
                                    <div class="card-body p-2">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <p class="text-muted text-center">Monthly Report</p>
                                                <div class="text-center">
                                                    <img width="140px" src="{{ asset('images/monthly-report.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="text-muted text-center">Yearly Report</p>
                                                <div class="text-center">
                                                    <img width="140px" src="{{ asset('images/monthly-report.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-10 offset-lg-1 mx-auto">
                        <!-- Leave Applications Table -->
                        <h6 class="m-0 p-1 text-center"
                            style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Leave Details Table
                        </h6>
                        <div class="card rounded-0">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover leaveDT table-bordered table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="5%" class="text-center">Sl:</th>
                                                <th width="15%">Type Of Leave</th>
                                                <th width="25%">Leave Period</th>
                                                <th width="15%">Reporting On</th>
                                                <th width="20%">Leave Applied at</th>
                                                <th width="20%">Status</th>
                                                <th width="15%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @if ($leaveApplications)
                                                <!-- Iterate through Leave Applications -->
                                                @foreach ($leaveApplications as $leaveApplication)
                                                    <tr>
                                                        <td class="text-capitalize">{{ $loop->iteration }}</td>
                                                        <td>{{ $leaveApplication->type_of_leave }}</td>
                                                        <td>From {{ $leaveApplication->leave_start_date }} To
                                                            {{ $leaveApplication->leave_end_date }}</td>
                                                        <td>{{ $leaveApplication->reporting_on }}</td>
                                                        <td>{{ $leaveApplication->reporting_on }}</td>
                                                        <td>
                                                            <!-- Application Status Badge --> Leave Approval
                                                            <span
                                                                class="badge bg-{{ optional($leaveApplication)->application_status == 'approved' ? 'success' : (optional($leaveApplication)->application_status == 'rejected' ? 'danger' : 'warning') }}">
                                                                {{ optional($leaveApplication)->application_status == 'approved' ? 'Approved' : (optional($leaveApplication)->application_status == 'rejected' ? 'Rejected' : 'Pending') }}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0);" class="text-primary"
                                                                data-bs-toggle="modal" data-bs-target="#makeleaveEdit-{{$leaveApplication->id}}">
                                                                <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                                    style="color: #247297 !important;"></i>
                                                            </a>
                                                            <a href="{{ route('leave-application.destroy',$leaveApplication->id) }}"
                                                                class="text-danger delete">
                                                                <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <!-- Display if No Leave Application Available -->
                                                <tr>
                                                    <td colspan="6">
                                                        <h5 class="text-center mb-0">No Leave Application Available</h5>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Check Leave Status Modal Area --}}
            <!-- Include Leave Modal Partial -->
            @include('admin.partials.leave_modal')

            <!-- Modal for Checking Approval -->
            <div class="modal fade" id="checkapproved" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="checkapprovedLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header text-white" style="background-color: #ae0a46 !important;">
                            <h5 class="modal-title text-uppercase" id="checkapprovedLabel">For Official Use</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="container">
                                <!-- Table for Leave Position Details -->
                                <div class="row gx-0 mb-3">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <thead
                                                style="background-color: #ae0a468f !important; color: white !important;">
                                                <tr>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Due As On</th>
                                                    <th scope="col">Availed</th>
                                                    <th scope="col">Balance Due</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Rows for Leave Positions -->
                                                <tr>
                                                    <td>
                                                        <input type="text" name="leave_position"
                                                            class="form-control form-control-sm" value="Earned Leave">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="leave_due_as_on"
                                                            class="form-control form-control-sm">
                                                    </td>
                                                    <td><input type="number" name="leave_availed"
                                                            class="form-control form-control-sm"></td>
                                                    <td><input type="number" name="balance_due"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                                <!-- Similar rows for Casual and Medical Leave -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Additional Information Rows -->
                                <div class="row gx-0">
                                    <!-- Left Side with Check, Recommended, Received, Approved -->
                                    <div class="col-lg-6">
                                        <p class="m-0 border p-1"
                                            style="background-color: #ae0a468f !important; color: white;">
                                            Checked By: (HR & Admin)</p>
                                        <!-- Similar rows for Recommended, Received, Approved -->
                                    </div>

                                    <!-- Right Side with File Uploads -->
                                    <div class="col-lg-6">
                                        <p class="m-0 p-0">
                                            <input class="form-control form-control-sm" type="file" name="checked_by"
                                                value="Approved">
                                        </p>
                                        <!-- Similar input fields for Recommended, Received, Approved -->
                                    </div>
                                </div>

                                <!-- Application Status Section -->
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <p class="m-0 p-0">Application Status</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Radio buttons for Approved and Reject -->
                                        <div class="btn-group border mt-3 d-flex justify-content-end" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="application_status"
                                                id="btnradio1" autocomplete="off" checked>
                                            <label class="btn btn-outline-success" for="btnradio1">Approved</label>

                                            <input type="radio" class="btn-check" name="application_status"
                                                id="btnradio2" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="btnradio2">Reject</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer with Close Button -->
                        <div class="modal-footer p-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Check Leave Status Modal Area End --}}

        </div>
    </div>
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
                    targets: [5],
                }, ],
            });
        });
    </script>
@endpush
