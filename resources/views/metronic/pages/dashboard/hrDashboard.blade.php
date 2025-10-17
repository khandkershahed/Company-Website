<x-admin-app-layout :title="'HR Admin Dashboard'">
    <div class="px-0 container-fluid">
        <div class="mb-5 row">
            <!-- Attendance -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="border shadow-none card card-flush">
                            <div class="p-0 card-body">
                                <div class="d-flex flex-stack justify-content-between">
                                    <div class="p-8 d-flex align-items-center me-3 rounded-3">
                                        <a href="">
                                            <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                                    class="fa-solid text-primary fa-clipboard-user fs-3"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                        <div class="flex-grow-1"><a href="">
                                            </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Employee
                                                <span
                                                    class="pt-4 text-gray-500 fw-semibold d-block fs-6">{{ Carbon\Carbon::now()->format('d M, Y') }}</span>
                                            </a>
                                        </div>

                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <span class="pb-2 main_text_color fw-bold">Todays Presents</span>
                                            <span class="px-4 text-gray-500 fw-semibold">
                                                {{ $attendances->count() }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="pb-2 main_text_color fw-bold">Todays Absents</span>
                                            <span class="px-4 text-gray-500 fw-semibold text-end">
                                                {{ 12 - $attendances->count() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-4">
                        <div class="border shadow-none card card-flush">
                            <div class="p-0 card-body">
                                <div class="d-flex flex-stack justify-content-between">
                                    <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                        <a href="">
                                            <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                                    class="fa-solid text-primary fa-list-check fs-3"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                        <div class="flex-grow-1"><a href="">
                                            </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">My Task
                                                <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Today <span
                                                        class="text-primary">(0)</span></span>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="flex-column d-flex w-50">
                                        <div class="d-flex align-items-center justify-content-between pe-3">
                                            <span class="text-gray-500 fw-semibold">
                                                Critical</span>
                                            <span class="px-2 text-white bg-primary fw-semibold ms-3 rounded-2">
                                                0 Task
                                            </span>
                                        </div>
                                        <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                                            <span class="text-gray-500 fw-semibold">
                                                Pending</span>
                                            <span class="px-2 text-white bg-primary fw-semibold ms-3 rounded-2">
                                                0 Task
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-xl-6">
                        <div class="border shadow-none card card-flush">
                            <div class="p-0 card-body">
                                <div class="d-flex flex-stack justify-content-between">
                                    <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                        <a href="">
                                            <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                                    class="fa-solid text-primary fa-bell fs-3"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                        <div class="flex-grow-1"><a href="">
                                            </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Notification
                                                {{-- <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Quick Status</span> --}}
                                            </a>
                                        </div>
                                    </div>
                                    @php
                                        $notifications = Auth::user()->notifications();
                                        $ncount = $notifications->count();
                                        $nunreadCount = Auth::user()->unreadNotifications()->count();
                                    @endphp
                                    <div class="flex-column d-flex w-50">
                                        <div class="d-flex align-items-center justify-content-between pe-3">
                                            <span class="text-gray-500 fw-semibold">
                                                Total</span>
                                            <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                                {{ $ncount }}
                                            </span>
                                        </div>
                                        <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                                            <span class="text-gray-500 fw-semibold">
                                                Unread</span>
                                            <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                                                {{ $nunreadCount }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mt-5 border shadow-none card">
                            <div class="bg-white border-0 card-header align-items-center">
                                <h1 class="card-title">
                                    Attendace &amp; Leave History
                                </h1>
                                <div>
                                    <ul class="nav nav-tabs nav-line-tabs fs-6">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#allAttendance">Today
                                                Attendances</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#allLeave">Leave</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#allmovement">Month Wise
                                                Attendances</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body" style="overflow: auto;">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="allAttendance" role="tabpanel">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table
                                                    class="table border dataTable table-striped table-row-bordered gy-5 gs-7 rounded-3">
                                                    <thead>
                                                        <tr class="text-gray-800 fw-bold fs-6 px-7">
                                                            <th width="10%">Sl.</th>
                                                            <th width="25%">Name</th>
                                                            <th width="10%">Status</th>
                                                            <th width="19%">Job Status</th>
                                                            <th width="23%">Checked In</th>
                                                            <th width="23%">Checked Out</th>
                                                            {{-- <th width="" class="text-center">
                                                                Check Full
                                                            </th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($attendances as $today_attendance)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-5 position-relative">
                                                                            <div
                                                                                class="symbol symbol-35px symbol-circle">
                                                                                <img alt="Pic"
                                                                                    src="{{ !empty(optional($today_attendance->user)->photo) &&
                                                                                    file_exists(public_path('upload/Profile/admin/' . optional($today_attendance->user)->photo))
                                                                                        ? asset('upload/Profile/admin/' . optional($today_attendance->user)->photo)
                                                                                        : 'https://ui-avatars.com/api/?name=' . urlencode(optional($today_attendance->user)->name) }}">
                                                                            </div>

                                                                        </div>
                                                                        <div
                                                                            class="d-flex flex-column justify-content-center">
                                                                            <a href=""
                                                                                class="text-gray-800 fs-6 text-hover-primary">{{ optional($today_attendance->user)->name }}</a>

                                                                            <div class="text-gray-500 fw-semibold">
                                                                                {{ optional($today_attendance->user)->designation }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if (optional($today_attendance)->check_in !== 'N/A')
                                                                        @php
                                                                            $checkIn = Carbon\Carbon::parse(
                                                                                $today_attendance->check_in,
                                                                            );
                                                                        @endphp

                                                                        @if ($checkIn > Carbon\Carbon::parse('09:06:00') && $checkIn < Carbon\Carbon::parse('10:01:00'))
                                                                            <span
                                                                                class="text-white badge badge-danger">L</span>
                                                                        @elseif ($checkIn >= Carbon\Carbon::parse('10:01:00') && $checkIn < Carbon\Carbon::parse('13:00:00'))
                                                                            <span
                                                                                class="text-white badge badge-danger">LL</span>
                                                                        @elseif($checkIn < Carbon\Carbon::parse('09:05:00'))
                                                                            <span
                                                                                class="text-black badge badge-light-primary">On
                                                                                Time</span>
                                                                        @endif
                                                                    @else
                                                                        <p class="text-danger mb-0 p-0 fw-bold">
                                                                            {{ optional($today_attendance)->absent_note }}
                                                                        </p>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="text-white badge bg-info">{{ optional($today_attendance->user)->getCategoryName() }}</span>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-primary">{{ $today_attendance->check_in }}</span>
                                                                </td>
                                                                <td class="text-start">
                                                                    <span
                                                                        class="bg-black badge">{{ $today_attendance->check_out }}</span>
                                                                </td>
                                                                {{-- <td class="text-center">
                                                                    <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary"
                                                                        href="/super-admin/single-profile"
                                                                        target="_blank">
                                                                        <i class="text-white fas fa-id-badge fs-3"
                                                                            title="Show Profile"
                                                                            aria-hidden="true"></i><span
                                                                            class="sr-only">Show Profile</span>
                                                                    </a>
                                                                </td> --}}
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="allLeave" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header align-items-center">
                                                <h1 class="card-title">Leave Application History</h1>
                                                <div>
                                                    <ul class="nav nav-tabs nav-line-tabs fs-6">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab"
                                                                href="#sickLeave">Sick</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#earnedLeave">Earned</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#casualLeave">Casual</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#pendingLeave">Pending</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <div class="tab-content" id="myTabContent">

                                                    {{-- Sick Leaves --}}
                                                    <div class="tab-pane fade show active" id="sickLeave"
                                                        role="tabpanel">
                                                        @include('metronic.pages.attendance.partials.leave_table',
                                                            [
                                                                'leaves' => $sicks,
                                                            ]
                                                        )
                                                    </div>

                                                    {{-- Earned Leaves --}}
                                                    <div class="tab-pane fade" id="earnedLeave" role="tabpanel">
                                                        @include('metronic.pages.attendance.partials.leave_table',
                                                            [
                                                                'leaves' => $earneds,
                                                            ]
                                                        )
                                                    </div>

                                                    {{-- Casual Leaves --}}
                                                    <div class="tab-pane fade" id="casualLeave" role="tabpanel">
                                                        @include('metronic.pages.attendance.partials.leave_table',
                                                            [
                                                                'leaves' => $casuals,
                                                            ]
                                                        )
                                                    </div>

                                                    {{-- Pending Leaves --}}
                                                    <div class="tab-pane fade" id="pendingLeave" role="tabpanel">
                                                        @include('metronic.pages.attendance.partials.leave_table',
                                                            [
                                                                'leaves' => $pendings,
                                                            ]
                                                        )
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="allmovement" role="tabpanel">
                                        <div class="card">
                                            <form action="{{ route('admin.hr-and-admin.index') }}" method="get">
                                                <div class="card-header align-items-center py-2">
                                                    <div>
                                                        <h1 class="card-title">Month Wise Attendances</h1>
                                                    </div>
                                                    <div class="">
                                                        <select class="form-select me-4 min-w-150px"
                                                            data-control="select2" data-allow-clear="true"
                                                            data-placeholder="Staff" name="user_id" id="userID"
                                                            onchange="form.submit()">
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    @selected($selectedUser === $user->id)>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <select class="form-select min-w-100px" data-control="select2"
                                                            data-placeholder="Month" name="month" id="filterMonth"
                                                            onchange="form.submit()">
                                                            @foreach ($months as $month)
                                                                <option value="{{ $month }}"
                                                                    @selected($selectedMonth === $month)>
                                                                    {{ $month }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3 dataTable">
                                                            <thead class="text-gray-500 fs-7">
                                                                <tr class="text-gray-800 fw-bold fs-6 px-5">
                                                                    <th width="20%">Date</th>
                                                                    <th width="25%">Name</th>
                                                                    <th width="22%">Check In</th>
                                                                    <th width="23%">Check Out</th>
                                                                    <th width="10%">Status</th>
                                                                    {{-- <th width="">Substitute</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-6">

                                                                @foreach ($total_attendances as $attendance)
                                                                    <tr>
                                                                        <td>{{ $attendance['date'] }}</td>
                                                                        <td>{{ $attendance['user_name'] }}</td>

                                                                        <td>{{ $attendance['check_in'] ?? 'N/A' }}</td>

                                                                        <td>{{ $attendance['check_out'] ?? 'N/A' }}
                                                                        </td>

                                                                        <td>
                                                                            @if (!empty($attendance['check_in']) && $attendance['check_in'] !== 'N/A')
                                                                                @php
                                                                                    $checkIn = \Carbon\Carbon::parse(
                                                                                        $attendance['check_in'],
                                                                                    );
                                                                                @endphp

                                                                                @if ($checkIn > \Carbon\Carbon::parse('09:06:00') && $checkIn < \Carbon\Carbon::parse('10:01:00'))
                                                                                    <span
                                                                                        class="text-white badge badge-warning">L</span>
                                                                                @elseif($checkIn >= \Carbon\Carbon::parse('10:01:00') && $checkIn < \Carbon\Carbon::parse('15:00:00'))
                                                                                    <span
                                                                                        class="text-white badge badge-danger">LL</span>
                                                                                @else
                                                                                    <span
                                                                                        class="text-white badge badge-success">On
                                                                                        Time</span>
                                                                                @endif
                                                                            @elseif ($attendance['status'] === 'Friday')
                                                                                <span
                                                                                    class="text-white badge badge-info">Friday</span>
                                                                            @else
                                                                                <span
                                                                                    class="text-white badge badge-danger">Absent</span>
                                                                            @endif
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mt-5 border shadow-none card h-xl-100">
                            <div class="bg-white card-header">
                                <h3 class="py-3 card-title align-items-start flex-column">
                                    <span class="text-gray-800 card-label fw-bold">Evaluation Schedule</span>
                                    <span class="mt-1 text-gray-500 fw-semibold fs-6">Current Month Evaluation
                                        Need.</span>
                                </h3>
                            </div>

                            <div class="card-body" style="height: 180px; overflow: auto;">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-striped gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                                                <th class="p-0 pb-3 text-center w-50px">
                                                    Sl
                                                </th>
                                                <th class="p-0 pb-3 text-start ps-3">
                                                    Name
                                                </th>
                                                <th class="p-0 pb-3 text-start">
                                                    Office Id
                                                </th>
                                                <th class="p-0 pb-3 text-start">
                                                    Prev. Status
                                                </th>
                                                <th class="p-0 pb-3 text-start">
                                                    Current Status
                                                </th>
                                                <th class="p-0 pb-3 text-start">
                                                    Joining Date
                                                </th>
                                                <th class="p-0 pb-3 text-start">
                                                    Evaluation Date
                                                </th>
                                                <th class="p-0 pb-3 text-center">
                                                    Performance
                                                </th>
                                                <th class="p-0 pb-3 text-center">
                                                    Progress
                                                </th>
                                                <th class="p-0 pb-3 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                <td class="text-center">01</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg"
                                                                class="" alt="">
                                                        </div>

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Nahidul
                                                                Islam</a>
                                                            <span class="text-gray-500 fw-semibold d-block fs-7">UI/UX
                                                                Designer</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-start">
                                                    <span
                                                        class="text-gray-600 badge-light-danger fw-bold fs-6">#JR-106</span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="text-gray-600 fw-bold fs-6">Probation
                                                    </span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="text-gray-600 fw-bold fs-6">Parmanent</span>
                                                </td>

                                                <td class="text-start pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">02 March 2024</span>
                                                </td>

                                                <td class="">
                                                    <span class="text-gray-600 fw-bold d-block fs-6">02 March
                                                        2025</span>
                                                </td>

                                                <td class="text-center pe-0">
                                                    <span class="text-warning fw-bold fs-6">80%</span>
                                                </td>
                                                <td class="text-center pe-0">
                                                    <span class="text-success fw-bold fs-6">Good</span>
                                                </td>
                                                <td class="text-end pe-3">
                                                    <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary"
                                                        href="/super-admin/single-profile" target="_blank">
                                                        <i class="text-white fas fa-id-badge fs-3"
                                                            title="Show Profile" aria-hidden="true"></i><span
                                                            class="sr-only">Show Profile</span>
                                                    </a>
                                                </td>
                                            </tr> --}}
                                            <tr class="text-center">
                                                <td colspan="10">No Evaluation Schedule Found</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div class="mt-10 border shadow-none card h-xl-100">
                            <div class="bg-white card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="text-gray-800 card-label fw-bold">Task Shedule</span>
                                    <span class="mt-1 text-gray-500 fw-semibold fs-6">Current Month Task.</span>
                                </h3>
                            </div>

                            <div class="p-0 pt-4 shadow-none card-body" style="height: 140px; overflow: auto;">
                                <p class="ps-5"> All Task Here.</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="border shadow-none card">
                    <div class="p-2 py-5">
                        <h1 class="mb-0">Today's Schedule</h1>
                        <p class="mb-0 text-gray-400">
                            Check Your Shedule from here
                        </p>
                    </div>
                    <div class="card-header" style="min-height: 50px">
                        <ul class="nav nav-pills nav-pills-custom" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="pt-5 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-0 h-100 active"
                                    id="kt_stats_widget_16_tab_link_4" data-bs-toggle="pill" href="#meetings"
                                    aria-selected="true" role="tab">
                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Meeting's
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="pt-5 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-0 h-100"
                                    id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill" href="#notice"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Notice
                                    </span>
                                </a>
                            </li>
                            {{-- <li class="m-0 nav-item" role="presentation">
                                <a class="pt-5 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-0 h-100"
                                    id="kt_stats_widget_16_tab_link_4" data-bs-toggle="pill" href="#kpi-details"
                                    aria-selected="true" role="tab">
                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Application
                                    </span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="px-2 pt-4 card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="meetings" role="tabpanel"
                                aria-labelledby="kt_stats_widget_16_tab_link_4">
                                <div>
                                    {{-- Day tabs --}}
                                    <ul class="px-3 mb-8 nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between"
                                        role="tablist">
                                        @foreach ($dateRange as $index => $day)
                                            @php
                                                $dateKey = $day['date_key'];
                                                // Decide which tab should be "active" by default
                                                $isActive =
                                                    $dateKey == $activeDayDateKey ||
                                                    ($loop->first && !isset($activeDayDateKey));
                                                $tabTarget = "timeline_tab_content_{$index}";
                                            @endphp
                                            <li class="p-0 nav-item ms-0" role="presentation">
                                                <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger {{ $isActive ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#{{ $tabTarget }}" role="tab"
                                                    aria-selected="{{ $isActive ? 'true' : 'false' }}">
                                                    <span class="fs-7 fw-semibold">{{ $day['day_short'] }}</span>
                                                    <span class="fs-6 fw-bold">{{ $day['day_num'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    {{-- Tab contents per day --}}
                                    <div class="px-4 mb-2 tab-content" style="height:730px; overflow:auto;">
                                        @foreach ($dateRange as $index => $day)
                                            @php
                                                $dateKey = $day['date_key'];
                                                $paneId = "timeline_tab_content_{$index}";
                                                $isPaneActive =
                                                    $dateKey == $activeDayDateKey ||
                                                    ($loop->first && !isset($activeDayDateKey));
                                                $dailyMeetings = $meetingsForWeek[$dateKey] ?? collect();
                                            @endphp

                                            <div class="tab-pane fade {{ $isPaneActive ? 'show active' : '' }}"
                                                id="{{ $paneId }}" role="tabpanel">
                                                @forelse ($dailyMeetings as $meeting)
                                                    <div class="mb-6 d-flex align-items-center">
                                                        <span data-kt-element="bullet"
                                                            class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-{{ $meeting->end_time->isPast() ? 'light-secondary' : 'success' }}"></span>
                                                        <div class="flex-grow-1 me-5">
                                                            <div class="text-gray-800 fw-semibold fs-2">
                                                                {{ $meeting->start_time->format('H:i') }} -
                                                                {{ $meeting->end_time->format('H:i') }}
                                                                <span class="text-gray-500 fw-semibold fs-7">
                                                                    {{ $meeting->start_time->format('A') }}
                                                                </span>
                                                            </div>
                                                            <div class="text-gray-700 fw-semibold fs-6">
                                                                {{ $meeting->title }}
                                                            </div>
                                                            <div class="text-gray-500 fw-semibold fs-7">
                                                                Lead by
                                                                <a href="#"
                                                                    class="text-primary opacity-75-hover fw-semibold">
                                                                    {{ $meeting->leader->name ?? 'N/A' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-sm btn-light me-3" href="javascript:void(0)"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#meetingDetails_{{ $meeting->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-light" href="javascript:void(0)"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#meetingEdit_{{ $meeting->id }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        {{-- Meeting Details Modal --}}
                                                        <div class="modal fade"
                                                            id="meetingDetails_{{ $meeting->id }}" tabindex="-1"
                                                            aria-labelledby="meetingDetailsLabel_{{ $meeting->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="meetingDetailsLabel_{{ $meeting->id }}">
                                                                            Meeting Details
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3 class="mb-3 fw-bold">{{ $meeting->title }}
                                                                        </h3>
                                                                        <p><strong>Date:</strong>
                                                                            {{ $meeting->date->format('l, F j, Y') }}
                                                                        </p>
                                                                        <p><strong>Time:</strong>
                                                                            {{ $meeting->start_time->format('h:i A') }}
                                                                            -
                                                                            {{ $meeting->end_time->format('h:i A') }}
                                                                        </p>
                                                                        <p><strong>Type:</strong> {{ $meeting->type }}
                                                                        </p>
                                                                        <p><strong>Lead By:</strong>
                                                                            <a href="#"
                                                                                class="text-primary opacity-75-hover fw-semibold">
                                                                                {{ $meeting->leader->name ?? 'N/A' }}
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Meeting Edit Modal --}}
                                                        <div class="modal fade" id="meetingEdit_{{ $meeting->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="meetingEditLabel_{{ $meeting->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="meetingEditLabel_{{ $meeting->id }}">
                                                                            Edit Meeting: {{ $meeting->title }}
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('admin.staff-meetings.update', $meeting->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-body">
                                                                            <div class="row mb-4">
                                                                                <div class="col-md-12">
                                                                                    <label class="form-label">Meeting
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        name="title"
                                                                                        class="form-control" required
                                                                                        value="{{ $meeting->title }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-4">
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Lead
                                                                                        By</label>
                                                                                    <select name="lead_by"
                                                                                        data-control="select2"
                                                                                        data-allow-clear="true"
                                                                                        class="form-select" required>
                                                                                        <option value="">Select
                                                                                            Leader</option>
                                                                                        {{-- Assuming $users is available and we check the lead_by ID --}}
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}"
                                                                                                {{ $user->id == $meeting->lead_by ? 'selected' : '' }}>
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Meeting
                                                                                        Type</label>
                                                                                    <select name="type"
                                                                                        data-control="select2"
                                                                                        data-allow-clear="true"
                                                                                        class="form-select" required>
                                                                                        <option value="office"
                                                                                            {{ $meeting->type == 'office' ? 'selected' : '' }}>
                                                                                            In Office</option>
                                                                                        <option value="out_of_office"
                                                                                            {{ $meeting->type == 'out_of_office' ? 'selected' : '' }}>
                                                                                            Out Of Office</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-4">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label">Date</label>
                                                                                    <input type="date"
                                                                                        name="date"
                                                                                        class="form-control" required
                                                                                        value="{{ $meeting->date->format('Y-m-d') }}">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Start
                                                                                        Time</label>
                                                                                    <input type="time"
                                                                                        name="start_time"
                                                                                        class="form-control" required
                                                                                        value="{{ $meeting->start_time->format('H:i') }}">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">End
                                                                                        Time</label>
                                                                                    <input type="time"
                                                                                        name="end_time"
                                                                                        class="form-control" required
                                                                                        value="{{ $meeting->end_time->format('H:i') }}">
                                                                                </div>
                                                                            </div>
                                                                            {{-- Add other input fields (date, type, times, participants) here --}}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @empty
                                                    <div class="text-center py-5">
                                                        <p class="text-gray-500">No meetings scheduled for
                                                            {{ $day['carbon_date']->format('l, M d') }}.</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <!-- Al Shedule Tabs End -->
                            <div class="tab-pane fade" id="notice" role="tabpanel" aria-labelledby="notice">
                                <div class="card card-flush h-lg-100">
                                    <div class="pt-3 card-body p-9">
                                        <div class="table-responsive">
                                            <ul class="ms-0 ps-0" style="list-style-type: none">
                                                @foreach ($notices as $notice)
                                                    <li class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="pe-3">
                                                                <i class="fa-regular fa-message badge-icons"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="p-0 m-0"
                                                                    style="font-size: 14px;color: #3b3f5c">
                                                                    <a
                                                                        href="{{ route('noticeboard') }}">{{ $notice->title }}</a>
                                                                </h6>
                                                                <p class="p-0 m-0"
                                                                    style="font-size: 12px; font-weight: 600; color: #888ea8">
                                                                    {{ $notice->created_at->format('d M Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="p-3 tab-pane fade" id="task-shedule" role="tabpanel"
                                aria-labelledby="kt_stats_widget_16_tab_link_2">
                                <div class="table-responsive">
                                    <table class="table my-0 align-middle table-row-dashed gs-0 gy-3">
                                        <thead>
                                            <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                                                <th class="p-0 pb-3 text-start">
                                                    Name
                                                </th>
                                                <th class="p-0 pb-3 text-center">
                                                    Create
                                                </th>
                                                <th class="p-0 pb-3 text-end">
                                                    Notice
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href=""
                                                                class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan
                                                                Office Hour</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-end pe-0">25-02-2025</td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-secondary"><i
                                                            class="fas fa-angle-right fs-4"
                                                            aria-hidden="true"></i></a>
                                                </td>
                                            </tr>

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
    @push('scripts')
    @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->
