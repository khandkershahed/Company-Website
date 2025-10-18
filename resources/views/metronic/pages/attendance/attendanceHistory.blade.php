<x-admin-app-layout :title="'Attendance History'">
    <!-- Main Content Start -->
    <div class="row gx-8">
        <div class="col-xl-4">
            <div class="shadow-sm card card-flush h-xl-100 mb-lg-10">
                <div class="py-2 card-header align-items-center bg-light">
                    <div class="card-title d-flex justify-content-between align-items-center w-100">
                        <span class="pt-1 text-black fw-semibold fs-6">Attendance Status</span>
                        <span class="mt-3 text-5xl bg-primary me-2 badge">Excelent</span>
                    </div>
                </div>
                <div class="pt-0 bg-white card-body d-flex align-items-end">
                    <div class="d-flex align-items-center w-100 jusitfy-content-between">
                        <div class="d-flex flex-column content-justify-center flex-grow-1">
                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    Present
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-end text-primary">
                                    {{ $attendances->count() }}
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                            <div class="pt-5 my-1 d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    Total Present
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-primary text-end">
                                    {{ $attendances->count() }}
                                    <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                                </div>
                            </div>
                            <div class="pt-5 d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #e4e6ef"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    Total Absent
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-primary text-end">
                                    0/0
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Info Cards -->
                        <div class="d-flex flex-column content-justify-center flex-grow-1 ps-10">
                            <div class="p-2 shadow-md d-flex fs-6 fw-semibold align-items-center rounded-2 box-dahsed"
                                title="Single Late">
                                <div class="flex-shrink-0 fs-6 fw-semibold text-primary fw-bold">
                                    Late
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-end text-primary">
                                    2
                                    <i class="fa-solid fa-arrow-trend-up text-warning"></i>
                                </div>
                            </div>
                            <div class="p-2 mt-2 shadow-md d-flex fs-6 fw-semibold align-items-center rounded-2 box-dahsed"
                                title="Dubble Late">
                                <div class="flex-shrink-0 fs-6 fw-semibold text-primary fw-bold">
                                    Double Late
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-end text-primary">
                                    2
                                    <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                                </div>
                            </div>
                            <div class="p-2 mt-2 shadow-md d-flex fs-6 fw-semibold align-items-center rounded-2 box-dahsed"
                                title="In Time">
                                <div class="flex-shrink-0 fs-6 fw-semibold text-primary fw-bold">
                                    In Time
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-end text-primary">
                                    2
                                    <i class="fa-solid fa-arrow-trend-up text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="shadow-sm card card-flush h-xl-100 mb-lg-10">
                <div class="py-2 card-header align-items-center bg-light">
                    <div class="card-title d-flex justify-content-between align-items-center w-100">
                        <span class="pt-1 text-black fw-semibold fs-6">Leave Status</span>
                        <span class="mt-3 text-5xl bg-primary me-2 badge">Need Improve</span>
                    </div>
                </div>
                <div class="pt-0 bg-white card-body d-flex align-items-end">
                    <div class="d-flex align-items-center w-100 justify-content-between">
                        <div class="d-flex flex-column content-justify-center flex-grow-1">
                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    Leave Due
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-end text-primary">
                                    01
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                            <div class="pt-5 my-1 d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    Total Leave
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-primary text-end">
                                    05
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Info Cards -->
                        <div class="d-flex flex-column content-justify-center flex-grow-1 ps-10">
                            <div class="d-flex justify-content-end">
                                <div id="kt_card_widget_9_chart" class="min-h-auto" style="height: 100px; width: 180px"
                                    data-kt-size="78" data-kt-line="11"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="shadow-sm card card-flush h-xl-100 mb-lg-10">
                <div class="py-2 card-header align-items-center bg-light">
                    <div class="card-title d-flex justify-content-between align-items-center w-100">
                        <span class="pt-1 text-black fw-semibold fs-6">Movement Status</span>
                        <span class="mt-3 text-5xl bg-primary me-2 badge">Not Bad</span>
                    </div>
                </div>
                <div class="pt-0 bg-white card-body d-flex align-items-end">
                    <div class="d-flex align-items-center w-100 jusitfy-content-between">
                        <div id="kt_card_widget_6_chart" class="min-h-auto" style="height: 100px; width: 180px"
                            data-kt-size="78" data-kt-line="11"></div>

                        <div class="d-flex flex-column content-justify-center flex-grow-1">
                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    Today Movement
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="ms-auto fw-bolder text-end">
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                            <div class="my-1 d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    This Month Movement
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="text-gray-700 ms-auto fw-bolder text-end">
                                    27/28
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #e4e6ef">
                                </div>
                                <div class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                                    This Year Movement
                                </div>
                                <div class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                                <div class="text-gray-700 ms-auto fw-bolder text-end">
                                    01/28
                                    <i class="fa-solid fa-arrow-trend-up text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 row gx-8">
        <div class="col-xl-5">
            <div class="shadow-sm card">
                <div class="border-0 card-header align-items-center bg-light">
                    <h1 class="card-title">Attendance Details</h1>

                    <div class="flex-grow-1 w-100px">
                        <form action="{{ route('admin.attendance.history') }}" method="get">
                            <select class="form-select" data-control="select2" data-placeholder="Month"
                                name="month" id="filterMonth" onchange="form.submit()">
                                @foreach ($months as $month)
                                    <option value="{{ $month }}" @selected($selectedMonth === $month)>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div class="px-2 card-body hover-scroll-overlay-y" style="height: 450px">
                    <div class="row">
                        <div class="table-responsive">
                            <table
                                class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3 dataTable">
                                <thead class="text-gray-500 fs-7">
                                    <tr class="text-gray-800 fw-bold fs-6 px-5">
                                        <th width="30%">Date</th>
                                        <th width="25%">Check In</th>
                                        <th width="25%">Check Out</th>
                                        <th width="20%">Status</th>
                                        {{-- <th width="">Substitute</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="fs-6">

                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $attendance->date }}</td>
                                            <td>
                                                {{ $attendance->check_in }}
                                            </td>
                                            <td>
                                                {{ optional($attendance)->check_out }}
                                            </td>
                                            <td>
                                                @if (optional($attendance)->check_in !== 'N/A')
                                                    @php
                                                        $checkIn = Carbon\Carbon::parse($attendance->check_in);
                                                    @endphp

                                                    @if ($checkIn > Carbon\Carbon::parse('09:06:00') && $checkIn < Carbon\Carbon::parse('10:01:00'))
                                                        <span class="text-white badge badge-danger">L</span>
                                                    @elseif ($checkIn >= Carbon\Carbon::parse('10:01:00') && $checkIn < Carbon\Carbon::parse('15:00:00'))
                                                        <span class="text-white badge badge-danger">LL</span>
                                                    @endif
                                                @else
                                                    <p class="text-danger mb-0 p-0 fw-bold">
                                                        {{ optional($attendance)->absent_note }}</p>
                                                @endif

                                            </td>
                                            {{-- <td>Khandaker Shahed</td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="shadow-sm card">
                <div class="border-0 card-header align-items-center bg-light">
                    <h1 class="card-title">Leave Application History</h1>
                    <div>
                        <ul class="nav nav-tabs nav-line-tabs fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#sickLeave">Sick</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#earnedLeave">Earned</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#casualLeave">Casual</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#pendingLeave">Pending</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-0 card-body">
                    <div class="tab-content" id="myTabContent">

                        {{-- Sick Leaves --}}
                        <div class="tab-pane fade show active" id="sickLeave" role="tabpanel">
                            @include('metronic.pages.attendance.partials.leave_table', ['leaves' => $sicks])
                        </div>

                        {{-- Earned Leaves --}}
                        <div class="tab-pane fade" id="earnedLeave" role="tabpanel">
                            @include('metronic.pages.attendance.partials.leave_table', ['leaves' => $earneds])
                        </div>

                        {{-- Casual Leaves --}}
                        <div class="tab-pane fade" id="casualLeave" role="tabpanel">
                            @include('metronic.pages.attendance.partials.leave_table', ['leaves' => $casuals])
                        </div>

                        {{-- Pending Leaves --}}
                        <div class="tab-pane fade" id="pendingLeave" role="tabpanel">
                            @include('metronic.pages.attendance.partials.leave_table', ['leaves' => $pendings])
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Content End --> 


    @push('scripts')
    @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->
