@extends('admin.master')
@section('content')
    <style>
        .user-dash-bg {
            background-color: #f2f3ff;
            height: 20rem;
        }

        .user-name {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 300;
            font-size: 45px;
            color: #ae0a46;
        }

        .para-text {
            padding-top: 5px;
            font-size: 16px;
            font-weight: 500;
        }

        .user-counter {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 300;
        }

        .user-name {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 300;
        }

        .user-dash-icons {
            background-color: #ae0a46;
            padding: 10px 5px;
            color: white;
            font-size: 20px;
            border-radius: 5px;
        }

        .amout-count {
            background-color: #ae0a46;
            color: white;
            padding: 1px 9px;
            border-radius: 50%;
        }

        .buttons-html5,
        .buttons-print {
            border-radius: 0px !important;
        }

        .datatable-scroll-wrap {
            margin-top: -15px;
        }

        .approved-btn {
            background-color: #ae0a46;
            color: white;
            padding: 6px 6px;
            font-size: 14px;
        }

        .user-color {
            color: #ae0a46;
        }

        .assigned-task .cbx {
            -webkit-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            cursor: pointer;
        }

        .assigned-task .cbx span {
            display: inline-block;
            vertical-align: middle;
            transform: translate3d(0, 0, 0);
        }

        .assigned-task .cbx span:first-child {
            position: relative;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            transform: scale(1);
            vertical-align: middle;
            border: 1px solid #B9B8C3;
            transition: all 0.2s ease;
        }

        .assigned-task .cbx span:first-child svg {
            position: absolute;
            z-index: 1;
            top: 8px;
            left: 6px;
            fill: none;
            stroke: white;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 16px;
            stroke-dashoffset: 16px;
            transition: all 0.3s ease;
            transition-delay: 0.1s;
            transform: translate3d(0, 0, 0);
        }

        .assigned-task .cbx span:first-child:before {
            content: "";
            width: 100%;
            height: 100%;
            background: #506EEC;
            display: block;
            transform: scale(0);
            opacity: 1;
            border-radius: 50%;
            transition-delay: 0.2s;
        }

        .assigned-task .cbx span:last-child {
            margin-left: 8px;
        }

        .assigned-task .cbx span:last-child:after {
            content: "";
            position: absolute;
            top: 8px;
            left: 0;
            height: 1px;
            width: 100%;
            background: #B9B8C3;
            transform-origin: 0 0;
            transform: scaleX(0);
        }

        .assigned-task .cbx:hover span:first-child {
            border-color: #3c53c7;
        }

        .assigned-task .inp-cbx:checked+.cbx span:first-child {
            border-color: #3c53c7;
            background: #3c53c7;
            animation: check-15 0.6s ease;
        }

        .assigned-task .inp-cbx:checked+.cbx span:first-child svg {
            stroke-dashoffset: 0;
        }

        .assigned-task .inp-cbx:checked+.cbx span:first-child:before {
            transform: scale(2.2);
            opacity: 0;
            transition: all 0.6s ease;
        }

        .assigned-task .inp-cbx:checked+.cbx span:last-child {
            color: #B9B8C3;
            transition: all 0.3s ease;
        }

        .assigned-task .inp-cbx:checked+.cbx span:last-child:after {
            transform: scaleX(1);
            transition: all 0.3s ease;
        }

        @keyframes check-15 {
            50% {
                transform: scale(1.2);
            }
        }

        .go-icon {
            padding: 6px;
            border-radius: 15px;
        }

        .go-icon:hover {
            padding: 6px;
            border-radius: 15px;
            background-color: #ae0a46;
            color: white;
        }

        .notification .circle-check {
            display: none;
        }

        .notification.clicked .envelope {
            display: none;
        }

        .notification.clicked .circle-check {
            display: inline-block;
            /* or any other desired display property */
        }

        .tasks-bar {
            background: white;
            padding: 0px 1px;
            border-radius: 20px;
        }

        .badge-icons {
            background: transparent;
            border-radius: 50%;
            padding: 9px 13px;
            margin-right: 11px;
            display: flex;
            height: 32px;
            justify-content: center;
            width: 32px;
            background-color: #ae0a46;
            box-shadow: 0 10px 20px -8px #ae0a46;
            color: white;
        }

        .time-left-count {
            background-color: #ae0a46;
            color: white;
            padding: 3px 7px;
            margin-left: 5px;
            border-radius: 5px;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-bottom: 1px solid #eee;
        }

        .task-icons {
            background: transparent;
            font-size: 18px;
            border-radius: 50%;
            padding: 7px;
            margin-right: 10px;
            display: flex;
            height: 25px;
            justify-content: center;
            width: 25px;
            /* background-color: #ae0a46; */
            /* box-shadow: 0 10px 20px -8px #ae0a46; */
            color: #ae0a46;
        }

        .task-calander {
            background-color: #e2d1e3;
            color: #ae0a46;
        }

        .time-left-count {
            background-color: #ae0a461c;
            color: #ae0a46;
            font-weight: bold;
        }

        thead {
            background-color: transparent !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-lg-4">
                    {{-- Profile Card --}}
                    <div class="card user-dash-bg">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="m-0 p-0">Welcome Back</h4>
                                <h1 class="m-0 p-0 user-name">{{ Auth::user()->name }}</h1>
                                <p class="m-0 p-0">{{ Auth::user()->designation }}</p>
                            </div>
                            <div>
                                <img class="rounded-1" width="250px" src="{{ asset('images/woman-man-with-laptop.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Attendance Info --}}
                    <div class="card user-dash-bg">
                        <div class="card-header py-0 px-2">
                            <p class="text-end pt-2">
                                <a href="">
                                    <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                </a>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card w-50 me-2" style="height: 7rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        {{-- Icons Info --}}
                                        <div>
                                            <i class="fa-solid fa-building-circle-check user-dash-icons"></i>
                                            <p class="para-text m-0 ps-0">Check In</p>
                                        </div>
                                        <div>
                                            <h1 class="user-counter mb-0">
                                                {{ !empty($attendanceToday['check_in']) ? $attendanceToday['check_in'] : 'Absent' }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-50" style="height: 7rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        {{-- Icons Info --}}
                                        <div>
                                            <i class="fa-solid fa-building-circle-xmark user-dash-icons"></i>
                                            <p class="para-text m-0 ps-0">Check Out</p>
                                        </div>
                                        <div>
                                            <h1 class="user-counter mb-0">
                                                {{ !empty($attendanceToday['check_out']) ? $attendanceToday['check_out'] : 'Absent' }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card w-50 me-2" style="height: 7rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        {{-- Icons Info --}}
                                        <div>
                                            <i class="fa-solid fa-building-circle-arrow-right user-dash-icons"></i>
                                            <p class="para-text m-0 ps-0">Movement</p>
                                        </div>
                                        <div>
                                            <h1 class="user-counter mb-0">None</h1>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $absentCountA = collect($attendanceThisMonths)
                                        ->where(function ($item) {
                                            return $item['check_in'] === 'N/A' &&
                                                isset($item['absent_note']) &&
                                                $item['absent_note'] !== 'Friday';
                                        })
                                        ->count();
                                    // Filter late counts for 'Late (L)'
                                    $lateCountL = collect($lateCounts)
                                        ->where(function ($item) {
                                            return Carbon\Carbon::parse($item['check_in']) >
                                                Carbon\Carbon::parse('09:06:00') &&
                                                Carbon\Carbon::parse($item['check_in']) <
                                                    Carbon\Carbon::parse('10:01:00');
                                        })
                                        ->count();

                                    // Filter late counts for 'Half Day (LL)'
                                    $lateCountLL = collect($lateCounts)
                                        ->where(function ($item) {
                                            return Carbon\Carbon::parse($item['check_in']) >
                                                Carbon\Carbon::parse('10:01:00');
                                        })
                                        ->count();
                                @endphp
                                <div class="card me-2" style="width: 30%; height: 7rem;">
                                    <div class="card-body pt-2">
                                        {{-- Icons Info --}}
                                        <div class="d-flex justify-content-between align-items-center pt-1 px-2">
                                            {{-- <h5 class="user-counter mb-0">EL</h5> --}}
                                            <h5 class="user-counter mb-0">A</h5>
                                            <h5 class="user-counter mb-0">L</h5>
                                            <h5 class="user-counter mb-0">LL</h5>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center pt-2">
                                            {{-- <h5 class="user-counter amout-count mb-0">{{ $absentCountA }}</h5> --}}
                                            <h5 class="user-counter amout-count mb-0">{{ $absentCountA }}</h5>
                                            <h5 class="user-counter amout-count mb-0">{{ $lateCountL }}</h5>
                                            <h5 class="user-counter amout-count mb-0">{{ $lateCountLL }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="width: 20%; height: 7rem;" id="myTab" role="tablist">
                                    <div class="card-body d-flex justify-content-between align-items-center ps-1">
                                        {{-- Icons Info --}}
                                        <a href="javascript:void();" id="show-attendance">
                                            <div class="ps-1">
                                                <h4 class="user-counter mb-0 text-muted" style="line-height: 1">Monthly
                                                    Attendance</h4>
                                                <img width="50px"src="{{ asset('images/attendance-arrow.png') }}"
                                                    alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Achivement Info --}}
                    <div class="card user-dash-bg">
                        <div class="card-header py-0 px-2">
                            <p class="text-end pt-2 mb-0">
                                <a href="">
                                    <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                </a>
                            </p>
                        </div>
                        <div class="card-body pt-0">
                            <h3>Access</h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card me-2 user-inner-card" style="height: 12rem; width: 40%">
                                    <div class="card-body align-items-center">
                                        <p class="para-text m-0">Achieve</p>
                                        <div class="d-flex justify-content-between align-items-center pt-3">
                                            <div>
                                                <i class="fa-solid fa-star text-yellow"></i>
                                                <i class="fa-solid fa-star text-yellow"></i>
                                                <i class="fa-solid fa-star text-yellow"></i>
                                                <i class="fa-regular fa-star-half-stroke text-yellow"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center pt-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p><i class="fa-solid fa-face-tired text-yellow" title="Unusual"
                                                        style="font-size: 30px;"></i></p>
                                                <p>--</p>
                                                <p><i class="fa-regular fa-face-smile text-yellow" title="Unusual"
                                                        style="font-size: 30px;"></i></p>
                                                <p>--</p>
                                                <p><i class="fa-regular fa-face-smile-beam text-yellow" title="Proud"
                                                        style="font-size: 30px;"></i></p>
                                                <p>--</p>
                                                <p><i class="fa-regular fa-face-laugh-squint text-yellow" title="excellent"
                                                        style="font-size: 30px;"></i></p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0" style="font-size: 10px">Worst</p>
                                            <p class="mb-0" style="font-size: 10px">-</p>
                                            <p class="mb-0" style="font-size: 10px">Unusual</p>
                                            <p class="mb-0" style="font-size: 10px">-</p>
                                            <p class="mb-0" style="font-size: 10px">Proude</p>
                                            <p class="mb-0" style="font-size: 10px">-</p>
                                            <p class="mb-0" style="font-size: 10px">Excellent</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card me-2" style="height: 12rem; width: 60%">
                                    <div class="card-body user-inner-card pt-1">
                                        <p class="para-text m-0">Your Access</p>
                                        <div class="">
                                            <button class="btn navigation_btn w-100 mb-1">HR & ADMIN</button>
                                            <button class="btn navigation_btn w-100 mb-1">SITE SETTING</button>
                                            <button class="btn navigation_btn w-100 mb-1">SUPPLY CHAIN</button>
                                            <button class="btn navigation_btn w-100 mb-1">CRM</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 mx-auto">
                    <div class="attendance-content" style="display: none;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs w-50 mx-auto d-flex justify-content-center align-items-center"
                            id="myTab" role="tablist">
                            <li class="nav-item mb-0" role="presentation">
                                <a href="{{ route('attendance.single.currentMonth', Auth::user()->employee_id) }}"
                                    class="nav-link">
                                    Current Month
                                </a>
                            </li>
                            <li class="nav-item mb-0" role="presentation">
                                <a href="{{ route('attendance.single', Auth::user()->employee_id) }}" class="nav-link">
                                    Last Month
                                </a>
                            </li>
                            <li class="nav-item mb-0" role="presentation">
                                <button class="nav-link active" id="messages-tab" data-bs-toggle="tab"
                                    data-bs-target="#messages" type="button" role="tab" aria-controls="messages"
                                    aria-selected="false">
                                    Total Late
                                </button>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="card rounded-0 shadow-sm">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table
                                                class="table lateDT table-striped table-bordered table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Check-In</th>
                                                        <th>Check-Out</th>
                                                        <th>Comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($lateCounts)
                                                        @foreach ($lateCounts as $lateCount)
                                                            <tr class="odd">
                                                                <td>{{ $lateCount['date'] }}</td>
                                                                <td>{{ $lateCount['check_in'] }}</td>
                                                                <td>{{ $lateCount['check_out'] }}</td>
                                                                <td>
                                                                    @if (Carbon\Carbon::parse($lateCount['check_in']) > Carbon\Carbon::parse('09:06:00') &&
                                                                            Carbon\Carbon::parse($lateCount['check_in']) < Carbon\Carbon::parse('10:01:00'))
                                                                        <p class="mb-0 text-danger fw-bold m-0 p-0">Late
                                                                            (L)
                                                                        </p>
                                                                    @endif

                                                                    @if (Carbon\Carbon::parse($lateCount['check_in']) > Carbon\Carbon::parse('10:01:00'))
                                                                        <p class="mb-0 text-danger fw-bold m-0 p-0">Half
                                                                            Day (LL)
                                                                        </p>
                                                                    @endif
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
            <div class="row">
                <div class="col-lg-4">
                    {{-- Profile Card --}}
                    <div class="card user-dash-bg">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="m-0 p-0">Congratulation</h4>
                                <div class="pt-2">
                                    <h6 class="m-0 p-0">Next Evulation</h6>
                                    <h1 class="m-0 p-0 user-name">20 Feb 2024</h1>
                                </div>
                                <p class="m-0 p-0 w-75">Youv'e made excellent progress, completing 80% of the task
                                    assigned.</p>
                            </div>
                            <div>
                                <img class="rounded-1" width="150px" src="{{ asset('images/rating-dashboard.png') }}"
                                    alt="rating-dashboard">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Attendance Info --}}
                    <div class="card user-dash-bg">
                        <div class="card-header py-0 px-2">
                            <p class="text-end pt-2"><a href="{{ route('leaveDashboard') }}"><i
                                        class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i></a></p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card w-50 me-2" style="height: 7rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center px-4">
                                        {{-- Icons Info --}}
                                        <div>
                                            <a href="javascript:void(0)" class="user-color" data-bs-toggle="modal"
                                                data-bs-target="#makeleave">
                                                <h3 class="user-counter w-75 mb-0" style="line-height: 1">Leave
                                                    Application
                                                </h3>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('leaveDashboard') }}">
                                                <p class="approved-btn mb-0 shadow-sm rounded-1">Check</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-50" style="height: 7rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center px-4">
                                        {{-- Icons Info --}}
                                        <div>
                                            <a href="{{ route('leaveDashboard') }}">
                                                <h3 class="user-counter w-75 mb-0 main_color" style="line-height: 1">Leave
                                                    Availed
                                                </h3>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('leaveDashboard') }}">
                                                <h1 class="user-counter mb-0 user-color">
                                                    {{ optional($employee_leave_due)->sum('earned_leave_availed', 'casual_leave_availed', 'medical_leave_availed') ?? 0 }}
                                                </h1>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card w-100" style="height: 7rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center px-4">
                                        {{-- Icons Info --}}
                                        <div>
                                            <p class="para-text m-0">Sick Leave</p>
                                            <h1 class="user-counter mb-0 text-center user-color">
                                                {{ optional($employee_leave_due)->medical_leave_availed ?? 0 }}</h1>
                                        </div>
                                        <div>
                                            <p class="para-text m-0">Casual Leave</p>
                                            <h1 class="user-counter mb-0 text-center user-color">
                                                {{ optional($employee_leave_due)->casual_leave_availed ?? 0 }}</h1>
                                        </div>
                                        <div>
                                            <p class="para-text m-0">Earned Leave</p>
                                            <h1 class="user-counter mb-0 text-center user-color">
                                                {{ optional($employee_leave_due)->earned_leave_availed ?? 0 }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Profile Card --}}
                    <div class="card user-dash-bg">
                        <div class="card-header py-0 px-2">
                            <p class="text-end pt-2"><a href=""><i
                                        class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i></a></p>
                        </div>
                        <div class="card-body pt-0">
                            <h3>Key Performance Indicator (KPI)</h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card me-2" style="height: 7rem;width: 33.3%">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        {{-- Icons Info --}}
                                        <div>
                                            <h5 class="m-0">Task</h5>
                                            {{-- <i class="fa-solid fa-building-circle-check user-dash-icons"></i> --}}
                                            <i class="fa-solid fa-arrow-trend-up fs-3 text-success pt-2"></i>
                                        </div>
                                        <div>
                                            <h1 class="user-counter mb-0 user-color">50%</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card me-2" style="height: 7rem;width: 33.3%">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        {{-- Icons Info --}}
                                        <div>
                                            <h5 class="m-0">Project</h5>
                                            {{-- <i class="fa-solid fa-building-circle-check user-dash-icons"></i> --}}
                                            <i class="fa-solid fa-arrow-trend-down fs-3 text-danger pt-2"></i>
                                        </div>
                                        <div>
                                            <h1 class="user-counter mb-0 user-color">50%</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="height: 7rem;width: 33.3%">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        {{-- Icons Info --}}
                                        <div>
                                            <h5 class="m-0">HR</h5>
                                            {{-- <i class="fa-solid fa-building-circle-check user-dash-icons"></i> --}}
                                            <i class="fa-solid fa-arrow-trend-up fs-3 text-success pt-2"></i>
                                        </div>
                                        <div>
                                            <h1 class="user-counter mb-0 user-color">50%</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Showing All Your Key Performance Indicator (KPI) <br> Details Here.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Extend Time Modal --}}



    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>

    {{-- Extend Time Modal --}}
    @include('admin.partials.leave_modal')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with class 'envelope'
            var envelopes = document.querySelectorAll('.envelope');

            // Loop through each envelope
            envelopes.forEach(function(envelope) {
                // Add click event listener to each envelope
                envelope.addEventListener('click', function() {
                    var dataId = envelope.getAttribute('data-id');
                    var notification = document.getElementById('notification' + dataId);

                    // Hide envelope and show check-circle
                    envelope.style.display = 'none';
                    var checkCircle = notification.querySelector('.check-circle');
                    checkCircle.style.display = 'inline-block';
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.currentMonthDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                // dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                "iDisplayLength": 5,
                "lengthMenu": [5, 10, 50],
                buttons: [{
                        extend: 'print',
                        text: '<i class="ph-printer me-2"></i> Print table',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="ph-list"></i>',
                        className: 'btn btn-light btn-icon dropdown-toggle'
                    }
                ]
                // columnDefs: [{
                //     orderable: false,
                //     // targets: [1, 2],
                // }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.lateDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                // dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                "iDisplayLength": 5,
                "lengthMenu": [5, 10, 31],
                buttons: [{
                        extend: 'print',
                        text: '<i class="ph-printer me-2"></i> Print table',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="ph-list"></i>',
                        className: 'btn btn-light btn-icon dropdown-toggle'
                    }
                ]
                // columnDefs: [{
                //     orderable: false,
                //     // targets: [1, 2],
                // }]
            });
        });
        $(document).ready(function() {
            $('.lastMonthDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                // dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                "iDisplayLength": 5,
                "lengthMenu": [5, 10, 31],
                buttons: [{
                        extend: 'print',
                        text: '<i class="ph-printer me-2"></i> Print table',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="ph-list"></i>',
                        className: 'btn btn-light btn-icon dropdown-toggle'
                    }
                ]
                // columnDefs: [{
                //     orderable: false,
                //     // targets: [1, 2],
                // }]
            });
        });
    </script>
    <script>
        var dial = $(".dial .inner");
        var gauge_value = $(".gauge .value");

        function rotateDial() {
            var deg = 0;
            var value = Math.round(Math.random() * 100);
            deg = (value * 177.5) / 100;

            gauge_value.html(value + "%");

            dial.css({
                'transform': 'rotate(' + deg + 'deg)'
            });
            dial.css({
                '-ms-transform': 'rotate(' + deg + 'deg)'
            });
            dial.css({
                '-moz-transform': 'rotate(' + deg + 'deg)'
            });
            dial.css({
                '-o-transform': 'rotate(' + deg + 'deg)'
            });
            dial.css({
                '-webkit-transform': 'rotate(' + deg + 'deg)'
            });
        }

        setInterval(rotateDial, 2000);
    </script>
    <script>
        // jQuery toggler
        $(document).ready(function() {
            $("#show-attendance").click(function() {
                $(".attendance-content").toggle();
            });
        });
    </script>
@endpush
