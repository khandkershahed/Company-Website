@extends('admin.master')
@section('content')
    <style>
        .border-bottom-link {
            cursor: pointer;
        }

        .title-text {
            font-family: 'Bebas Neue';
            font-weight: 400;
            font-size: 25px;
        }

        .card-main-title {
            color: #fff;
            border-bottom: 0px solid #247297;
            background: #247297;
        }

        .task-calander {
            /* background-color: #e2d1e3; */
            color: #ae0a46;
        }

        .time-left-count {
            background-color: #ae0a461c;
            color: #ae0a46;
            font-weight: bold;
            padding: 4px 8px;
        }

        .amount-ft-size {
            font-size: 60px;
            color: #ae0a56;
        }
    </style>
    <div class="content-wrapper">
        <div class="content p-0">
            <!-- Page header -->
            <div class="shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- Page Destination/ BreadCrumb --}}
                    <div class="page-header-content d-lg-flex ">
                        <div class="d-flex px-2">
                            <div class="breadcrumb py-2">
                                <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                <a href="{{ route('hr-and-admin.index') }}" class="breadcrumb-item"><span
                                        class="breadcrumb-item active">Hr and Admin</span></a>
                            </div>
                            <a href="#breadcrumb_elements"
                                class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                                data-bs-toggle="collapse">
                                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                            </a>
                        </div>
                    </div>
                    {{-- Inner Page Tab --}}

                    <!-- Basic tabs -->
                    <div class="px-3">
                        <a href="#" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Tasks</span>
                            </div>
                        </a>
                        <a href="{{ route('notice.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Notice</span>
                            </div>
                        </a>
                        <a href="{{ route('employee.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Employe</span>
                            </div>
                        </a>
                        <a href="{{ route('leaveApplications') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Leave</span>
                            </div>
                        </a>
                        <a href="{{ route('job.regiserUser') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Jobs</span>
                            </div>
                        </a>

                    </div>
                </div>
                <!-- /page header -->
            </div>
            <!-- Sales Chain Page -->
            <div class="content pt-2">

                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <h3 class="text-center w-50 mx-auto" style="color: #247297;">Welcome to HR</h3>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <h6 class="m-0 p-1 text-center card-main-title mb-2 text-black"
                                            style="background-color: #f3f3f3 !important;">Attendance Details</h6>
                                    </div>
                                    {{-- Attendance Info --}}
                                    <div class="row gx-1">
                                        <div class="col-lg-6">
                                            <div class="card rounded-0" style="height: 10.6rem; background-color: #f3f3ff;">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center px-4"
                                                        style="height: 9rem;">
                                                        <h1 class="title-text mb-0">Total <br>Employees</h1>
                                                        <h1 class="title-text mb-0 main_color amount-ft-size">{{ App\Models\User::count() }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card rounded-0 mb-1" style="background-color: #e7fff2;">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h1 class="title-text mb-0">Present</h1>
                                                        {{-- @dd(count($attendanceData)) --}}
                                                        <h1 class="title-text mb-0 main_color ">{{count($attendanceData)}}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card rounded-0" style="background-color: #ffe6f1;">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h1 class="title-text mb-0">Absent</h1>
                                                        <h1 class="title-text mb-0 main_color">{{ App\Models\User::count() - count($attendanceData) - 1 }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    {{-- Leave Info --}}
                                    <div>
                                        <h6 class="m-0 p-1 text-center card-main-title mb-2 text-black"
                                            style="background-color: #f3f3f3 !important;">Leave Details</h6>
                                    </div>
                                    {{-- Attendance Info --}}
                                    <div class="row gx-1">
                                        <div class="col-lg-6">
                                            <div class="card rounded-0" style="height: 10.6rem; background-color: #f3f3ff;">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center px-4"
                                                        style="height: 9rem;">
                                                        <h1 class="title-text mb-0">Total Leave</h1>
                                                        <h1 class="title-text mb-0 amount-ft-size">24</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card rounded-0 mb-0 p-2 "
                                                style="background-color: #f3f3ff; padding: 20px !important;">
                                                <div class="card-body py-0 bg-white mb-1">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">Sick Leave</p>
                                                        <p class="mb-0 title-text main_color">10</p>
                                                    </div>
                                                </div>
                                                <div class="card-body py-0 bg-white mb-1">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">Earned Leave</p>
                                                        <p class="mb-0 title-text main_color">6</p>
                                                    </div>
                                                </div>
                                                <div class="card-body py-0 bg-white">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">Casual Leave</p>
                                                        <p class="mb-0 title-text main_color">8</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <h6 class="m-0 p-1 text-center card-main-title mb-2 text-black"
                                            style="background-color: #f3f3f3 !important;">Today's Attendance</h6>
                                    </div>
                                    <div class="card border-0 rounded-0"
                                        style="height: 20.5rem; background-color: #f3f3ff; overflow: auto;">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <div class="table-responsive">
                                                    <table class="table text-center table-border table-striped"
                                                        style="background-color: #f2f3ff !important;">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th scope="col">SL</th> --}}
                                                                <th scope="col">User Name</th>
                                                                <th scope="col">Check In</th>
                                                                <th scope="col">Check Out</th>
                                                                <th scope="col">Monthly</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($attendanceData as $userId => $times)
                                                                <tr class="">
                                                                    {{-- <td scope="row">{{ $loop->iteration }}</td> --}}
                                                                    <td>
                                                                        {{-- <a href="{{ route('attendance.single', $userId) }}"
                                                                            style="text-decoration: underline;">{{ $times['user_name'] }}</a> --}}
                                                                            {{ $times['user_name'] }}
                                                                    </td>
                                                                    <td>
                                                                        @if (Carbon\Carbon::parse($times['check_in']) > Carbon\Carbon::parse('09:06:00'))
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-center">
                                                                                <p class="text-danger me-1 m-0 p-0">
                                                                                    {{ $times['check_in'] }}</p>
                                                                                @if (Carbon\Carbon::parse($times['check_in']) > Carbon\Carbon::parse('09:06:00') &&
                                                                                        Carbon\Carbon::parse($times['check_in']) < Carbon\Carbon::parse('10:01:00'))
                                                                                    <p class="text-danger m-0 p-0">L</p>
                                                                                @endif

                                                                                @if (Carbon\Carbon::parse($times['check_in']) > Carbon\Carbon::parse('10:01:00'))
                                                                                    <p class="text-danger m-0 p-0">Half Day
                                                                                        (LL)
                                                                                    </p>
                                                                                @endif
                                                                            </div>
                                                                        @else
                                                                            {{-- <a href="{{ route('attendance.single', $userId) }}"
                                                                                class="border-bottom-link">{{ $times['check_in'] }}</a> --}}
                                                                                {{ $times['check_in'] }}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $times['check_out'] }}</td>
                                                                    <td class="d-flex align-items-center justify-content-center">
                                                                        <a href="{{ route('attendance.single', $userId) }}" hover-tooltip="Last month Attendance" tooltip-position="top"
                                                                                class="border-bottom-link me-4">
                                                                        <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                                            </a>
                                                                        <a href="{{ route('attendance.single.currentMonth', $userId) }}" hover-tooltip="Current month Attendance" tooltip-position="top"
                                                                                class="border-bottom-link">
                                                                                    <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                                            </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    {{-- Leave Info --}}
                                    <div>
                                        <h6 class="m-0 p-1 text-center card-main-title mb-2 text-black"
                                            style="background-color: #f3f3f3 !important;">Evulation & KPI</h6>
                                    </div>
                                    {{-- Attendance Info --}}
                                    <div class="row gx-1">
                                        <div class="col-lg-6">
                                            <div class="card border-0 rounded-0"
                                                style="height: 20.3rem;
                                        background-color: #f3f3ff;
                                        overflow: auto;">
                                                <div class="card-header py-2 bg-white m-2 rounded-0 text-center">
                                                    KPI Details
                                                </div>
                                                {{-- <div class="card-body py-1">
                                                    <div class="d-flex justify-content-around align-items-center">
                                                        <div>
                                                            <img class="rounded-circle" width="60px" height="60px"
                                                                src="https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0">Sazeduzzaman</p>
                                                            <div class="d-flex">
                                                                <p class="mb-0 pe-2"><i
                                                                        class="fa-solid fa-arrow-trend-up"></i></p>
                                                                <p class="mb-0">42,056 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <p class="text-center">No Data Available</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card border-0 rounded-0"
                                                style="height: 20.3rem;
                                                background-color: #f3f3ff;
                                                overflow: auto;">
                                                <div class="card-header py-2 bg-white m-2 rounded-0 text-center">
                                                    Pending Evaluation
                                                </div>
                                                {{-- <div class="card-body py-1">
                                                    <div class="d-flex justify-content-around align-items-center">
                                                        <div>
                                                            <img class="rounded-circle" width="60px" height="60px"
                                                                src="https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0">Sazeduzzaman</p>
                                                            <div class="d-flex">
                                                                <p class="mb-0 pe-2"><i
                                                                        class="fa-solid fa-arrow-trend-up"></i></p>
                                                                <p class="mb-0">42,056 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <p class="text-center">No Data Available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <h6 class="m-0 p-1 text-center card-main-title mb-2 text-black"
                                style="background-color: #f3f3f3 !important;">All Notification
                            </h6>
                            <div class="card rounded-0">
                                <div class="card-body" style="height: 16rem; overflow: auto; background-color: #f3f3f3;">
                                    <div class="">
                                        @if ($leave_applications->count() > 0)
                                            @foreach ($leave_applications as $leave_application)
                                                @if ($leave_application->status === 'pending')
                                                    <p class="mb-2 p-0">
                                                        <a
                                                            href="{{ route('leave-application.edit', $leave_application->id) }}">
                                                            <i class="fa-solid fa-bell ammount rounded-1 pe-2 me-2"></i>{{ $leave_application->name }}
                                                            has applied for a leave.
                                                        </a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <h5 class="text-center mb-0 fs-6">No Leave Application</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="height: 22.2rem; overflow: auto;">
                                <div class="card-header p-1" style="background-color: #f2f3ff">
                                    <h4 class="m-0 text-center">Notice</h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <ul class="ms-0 ps-0" style="list-style-type: none">
                                            @foreach ($notices as $notice)
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="pe-3">
                                                            <i class="fa-regular fa-message badge-icons"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="p-0 m-0" style="font-size: 14px;color: #3b3f5c">
                                                                <a
                                                                    href="{{ route('noticeboard') }}">{{ $notice->title }}</a>
                                                            </h6>
                                                            <p class="p-0 m-0"
                                                                style="font-size: 12px; font-weight: 600; color: #888ea8">
                                                                {{ $notice->created_at->format('d M Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="pe-3 notification" id="notification0">
                                                        <i class="fa-solid fa-envelope-open-text dash-icons envelope"
                                                            data-id="0"></i>
                                                        <i class="fa-regular fa-check-circle dash-icons check-circle"
                                                            data-id="0"></i>
                                                    </div> --}}
                                                </li>
                                                <li style="padding-left: 14px">|</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chain Page -->
            {{-- @include('admin.pages.event.partial.modals') --}}
        </div>
    @endsection
    @push('scripts')
        <script>
            import { Tooltip } from "https://cdn.jsdelivr.net/npm/jolty@0.6.2/dist/jolty.esm.min.js";
            Tooltip.initAll();
        </script>
        <script>
            var data = {
                labels: ['Present', 'Absent'],
                datasets: [{
                    data: [15, 5], // Example data for "Present" and "Absent" in the current month
                    backgroundColor: ['#805dca',
                        '#13a6d2'
                    ], // Pie slice colors for "Present" and "Absent"
                    borderWidth: 1
                }]
            };

            // Chart configuration
            var config = {
                type: 'pie', // Change chart type to 'pie'
                data: data,
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            padding: 20
                        },
                    }
                }
            };

            // Chart initialization code using Chart.js
            document.addEventListener('DOMContentLoaded', function() {
                var chartContainers = document.getElementsByClassName('chartjs-pie-chart');

                for (var i = 0; i < chartContainers.length; i++) {
                    var ctx = chartContainers[i].getContext('2d');
                    new Chart(ctx, config);
                }
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('.employee').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 5,
                    "lengthMenu": [10, 26, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 2, 3],
                    }, ],
                });
                $('.attendance').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 5,
                    "lengthMenu": [10, 26, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 2],
                    }, ],
                });
            });
        </script>
        <script>
            // public/js/events.js
            $(document).ready(function() {
                $('#category_filter').change(function() {
                    var categoryId = $(this).val();
                    $.ajax({
                        url: '/filter-events',
                        type: 'GET',
                        data: {
                            category_id: categoryId
                        },
                        success: function(data) {
                            $('#events-table').html(data);
                        }
                    });
                });
            });
        </script>
    @endpush
