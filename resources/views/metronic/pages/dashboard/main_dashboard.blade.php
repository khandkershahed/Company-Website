<x-admin-app-layout :title="'Your Dashboard'">
    <style>
        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: #500066;
            border-color: #e4e6ef #e4e6ef #fff;
        }
    </style>
    <div class="row pt-3">
        <div class="col-lg-4">
            {{-- Profile Card --}}
            <div class="card card-flush shadow-sm">
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
            <div class="card card-flush shadow-sm">
                <div class="card-header align-items-center py-2">
                    <h3 class="text-start mb-0">
                        Attendance
                    </h3>
                    <a href=""class="text-end">
                        <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card w-50 me-2" style="height: 7rem;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                {{-- Icons Info --}}
                                <div>
                                    <i class="fa-solid fa-clock user-dash-icons text-center"></i>
                                    <p class="para-text m-0 ps-0">Check In</p>
                                </div>
                                <div>
                                    <h1 class="user-counter mb-0">
                                        {{-- @dd($todayAttendance) --}}
                                        {{ !empty($todayAttendance->check_in) ? $todayAttendance->check_in : 'Absent' }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="card w-50" style="height: 7rem;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                {{-- Icons Info --}}
                                <div>
                                    <i class="fa-solid fa-clock user-dash-icons"></i>
                                    <p class="para-text m-0 ps-0">Check Out</p>
                                </div>
                                <div>
                                    <h1 class="user-counter mb-0">
                                        {{ !empty($todayAttendance->check_in) ? $todayAttendance->check_in : 'Absent' }}
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

                        <div class="card" style="" id="myTab" role="tablist">
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
            <div class="card card-flush shadow-sm">
                <div class="card-header align-items-center py-2">
                    <h3 class="text-left mb-0">
                        Quick Access Links
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row gx-3">
                        <div class="col-6 mb-5">
                            <a class="w-100 px-5 py-2 border rounded-1 mb-2"
                                href="{{ route('admin.rfq.index') }}">RFQ</a>
                        </div>
                        <div class="col-6 mb-5">
                            <a class="w-100 px-3 py-2 border rounded-1 mb-2"
                                href="{{ route('admin.solution-cms.index') }}">Solution</a>
                        </div>
                        <div class="col-6 mb-5">
                            <a class="w-100 px-3 py-2 border rounded-1 mb-2" href="{{ route('leaveDashboard') }}">Leave
                                Dashboard</a>
                        </div>
                        <div class="col-6 mb-5">
                            <a class="w-100 px-3 py-2 border rounded-1 mb-2" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#makeleave">Make a Leave</a>
                        </div>
                        {{-- <div class="col-6">
                            <a href="">RFQ</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-lg-8 offset-lg-2 mx-auto">
            <div class="attendance-content" style="display: none;">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs w-50 mx-auto d-flex justify-content-center align-items-center" id="myTab"
                    role="tablist">

                    <li class="nav-item mb-0" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">
                            Current Month
                        </button>
                    </li>
                    <li class="nav-item mb-0" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">
                            Last Month
                        </button>
                    </li>
                    <li class="nav-item mb-0" role="presentation">
                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                            type="button" role="tab" aria-controls="messages" aria-selected="false">
                            Total Late
                        </button>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table
                                        class="table attendance_table table-striped table-bordered table-hover text-center">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Date</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($attendanceThisMonths)
                                                @foreach ($attendanceThisMonths as $attendance)
                                                    <tr
                                                        class="{{ $attendance['status'] === 'Absent' ? 'absent-row' : 'odd' }}">
                                                        <td>{{ $attendance['date'] }}</td>

                                                        @if ($attendance['check_in'] === null && in_array($attendance['status'], ['Friday', 'Absent']))
                                                            <td colspan="3">
                                                                <p
                                                                    class="mb-0 fw-bold text-{{ $attendance['status'] === 'Friday' ? 'warning' : 'danger' }}">
                                                                    {{ $attendance['status'] }}
                                                                </p>
                                                            </td>
                                                        @else
                                                            <td>{{ $attendance['check_in'] ?? 'N/A' }}</td>
                                                            <td>{{ $attendance['check_out'] ?? 'N/A' }}</td>
                                                            <td>{{ $attendance['status'] ?? 'N/A' }}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table
                                        class="table attendance_table table-striped table-bordered table-hover text-center">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Date</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($attendanceLastMonths)
                                                @foreach ($attendanceLastMonths as $attendanceLastMonth)
                                                    <tr
                                                        class="{{ $attendanceLastMonth['status'] === 'Absent' ? 'absent-row' : 'odd' }}">
                                                        <td>{{ $attendanceLastMonth['date'] }}</td>

                                                        @if ($attendanceLastMonth['check_in'] === null && in_array($attendanceLastMonth['status'], ['Friday', 'Absent']))
                                                            <td colspan="3">
                                                                <p
                                                                    class="mb-0 fw-bold text-{{ $attendanceLastMonth['status'] === 'Friday' ? 'warning' : 'danger' }}">
                                                                    {{ $attendanceLastMonth['status'] }}
                                                                </p>
                                                            </td>
                                                        @else
                                                            <td>{{ $attendanceLastMonth['check_in'] ?? 'N/A' }}</td>
                                                            <td>{{ $attendanceLastMonth['check_out'] ?? 'N/A' }}</td>
                                                            <td>{{ $attendanceLastMonth['status'] ?? 'N/A' }}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                        <div class="card rounded-0 shadow-sm">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table lateDT table-striped table-bordered table-hover text-center">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Date</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($lateCounts->count() > 0)
                                                @foreach ($lateCounts as $lateCount)
                                                    <tr class="odd">
                                                        <td>{{ $lateCount->date }}</td>
                                                        <td>{{ $lateCount->check_in ?? 'N/A' }}</td>
                                                        <td>{{ $lateCount->check_out ?? 'N/A' }}</td>
                                                        <td>
                                                            {{ $lateCount->status ?? 'N/A' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">
                                                        <h5 class="text-success fw-bold">No Late Till Now</h5>
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
        </div>
    </div>
    @include('admin.partials.leave_modal')
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#show-attendance").click(function() {
                    $(".attendance-content").toggle();
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
