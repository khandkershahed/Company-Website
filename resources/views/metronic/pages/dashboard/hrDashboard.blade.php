<x-admin-app-layout :title="'HR Dashboard'">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="card-title">HR Dashboard</h4>
        </div>
        <div class="card-body">
            <div class="row mb-5">
                <!-- Attendance -->
                <div class="col-xl-3">
                    <div class="card card-flush shadow-sm">
                        <div class="card-body p-0">
                            <div class="d-flex flex-stack justify-content-between align-items-center">
                                <div class="d-flex align-items-center me-3 p-8 rounded-3">
                                    <a href="">
                                        <span class="bg-light-primary rounded-3 p-3 me-3"><i
                                                class="fa-solid text-primary fa-clipboard-user fs-3"
                                                aria-hidden="true"></i></span>
                                    </a>
                                    <div class="flex-grow-1">

                                        <a href="#allRFQ" class="text-gray-800 fs-5 fw-bold lh-0">Total Employees
                                            <span
                                                class="text-gray-500 fw-semibold d-block fs-6 pt-4">{{ date('d M , Y') }}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center pe-4">
                                    <span class="main_text_color fw-bold fs-1 pe-4">

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3">
                    <div class="card card-flush shadow-sm">
                        <div class="card-body p-0">
                            <div class="d-flex flex-stack justify-content-between">
                                <div class="d-flex align-items-center me-3 p-8 w-50 rounded-3">
                                    <a href="">
                                        <span class="bg-light-primary rounded-3 p-3 me-3"><i
                                                class="fa-solid text-primary fa-list-check fs-3"
                                                aria-hidden="true"></i></span>
                                    </a>
                                    <div class="flex-grow-1">
                                        <a href=""> </a><a href="#"
                                            class="text-gray-800 fs-5 fw-bold lh-0">RFQ
                                            <span class="text-gray-500 fw-semibold d-block fs-6 pt-4">Status</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex-column d-flex w-50">
                                    <div class="d-flex align-items-center justify-content-between pe-3">
                                        <span class="text-gray-500 fw-semibold">
                                            Pending</span>
                                        <span class="bg-warning fw-semibold ms-3 px-2 text-white rounded-2">
                                            {{ $rfqs->count() }}
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pe-3 pt-2">
                                        <span class="text-gray-500 fw-semibold">
                                            Quoted
                                        </span>
                                        <span class="bg-success fw-semibold ms-3 px-2 text-white rounded-2">
                                            {{ $quoteds->count() }}
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pe-3 pt-2">
                                        <span class="text-gray-500 fw-semibold">
                                            Failed
                                        </span>
                                        <span class="bg-danger fw-semibold ms-3 px-2 text-white rounded-2">
                                            {{ $losts->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-flush shadow-sm">
                        <div class="card-header min-h-50px">
                            <h5 class="card-title text-start text-info">Today's Attendance</h5>
                        </div>
                        <div class="card-body p-2">
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
                                                        <div class="d-flex align-items-center justify-content-center">
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
                                                    <a href="{{ route('attendance.single', $userId) }}"
                                                        hover-tooltip="Last month Attendance" tooltip-position="top"
                                                        class="border-bottom-link me-4">
                                                        <i
                                                            class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                                                    </a>
                                                    <a href="{{ route('attendance.single.currentMonth', $userId) }}"
                                                        hover-tooltip="Current month Attendance" tooltip-position="top"
                                                        class="border-bottom-link">
                                                        <i
                                                            class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
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
                <div class="col-xl-4">
                    <div class="card card-flush shadow-sm">
                        <div class="card-header min-h-50px">
                            <h5 class="card-title text-start text-info">Leave Notifications</h5>
                        </div>
                        <div class="card-body" style="height: 41rem; overflow: auto; background-color: #f3f3f3;">
                            <div class="table-responsive">
                                @if ($leave_applications->count() > 0)
                                    @foreach ($leave_applications as $leave_application)
                                        @if ($leave_application->status === 'pending')
                                            <p class="mb-2 p-0">
                                                <a href="{{ route('leave-application.edit', $leave_application->id) }}">
                                                    <i
                                                        class="fa-solid fa-bell ammount rounded-1 pe-2 me-2"></i>{{ $leave_application->name }}
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
                </div>
                <div class="col-xl-4">
                    <div class="card card-flush shadow-sm">
                        <div class="card-header min-h-50px">
                            <h5 class="card-title text-start text-info">Notices</h5>
                        </div>
                        <div class="card-body" style="height: 41rem; overflow: auto; background-color: #f3f3f3;">
                            <div class="table-responsive">
                                <ul class="ms-0 ps-0" style="list-style-type: none">
                                    @foreach ($notices as $notice)
                                        <li class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="pe-3">
                                                    <i class="fa-regular fa-message badge-icons"></i>
                                                </div>
                                                <div>
                                                    <h6 class="p-0 m-0" style="font-size: 14px;color: #3b3f5c">
                                                        <a href="{{ route('noticeboard') }}">{{ $notice->title }}</a>
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
</x-admin-app-layout>
