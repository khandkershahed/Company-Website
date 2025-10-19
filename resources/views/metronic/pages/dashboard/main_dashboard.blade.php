<x-admin-app-layout :title="'My Dashboard'">
    <div class="row">
        <div class="col-xl-4">
            <div class="border shadow-none tns rounded-2" style="direction: ltr">
                <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false"
                    data-tns-speed="2000">
                    <div class="shadow-none card card-flush h-100"
                        style="background-image: linear-gradient(to top, #296088, #003B65);">
                        <div class="card-header">
                            <h3 class="pt-4 text-white card-title align-items-start flex-column">
                                <span class="mb-3 fw-bold fs-2x">{{ Auth::user()->name }}</span>

                                <div class="text-white fs-4">
                                    <span class="opacity-75">You have</span>

                                    <span class="position-relative d-inline-block">
                                        <a href="javascript:void(0);"
                                            class="mb-1 link-white opacity-75-hover fw-bold d-block">
                                            {{ optional(Auth::user()->employeeLeave)->total_leave - (optional(Auth::user()->employeeLeave)->casual_leave_availed + optional(Auth::user()->employeeLeave)->earned_leave_availed + optional(Auth::user()->employeeLeave)->medical_leave_availed) }} remaining leave
                                            days</a>

                                        <span
                                            class="bottom-0 border-2 opacity-50 position-absolute start-0 border-body border-bottom w-100"></span>
                                    </span>

                                    <span class="opacity-75">for this year</span>
                                </div>
                            </h3>
                        </div>

                        <div class="mt-1 card-body">
                            <div class="row g-3 g-lg-6">
                                <div class="col-6">
                                    <div class="p-2 bg-gray-100 bg-opacity-70 rounded-2">
                                        <div class="m-0 d-flex align-items-center">
                                            <span class="text-primary fw-semibold ps-3">Last Evaluation :</span>

                                            <span class="text-black fw-semibold ps-3">{{ Auth::user()->last_evaluation_date ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 bg-gray-100 bg-opacity-70 rounded-2">
                                        <div class="m-0 d-flex align-items-center">
                                            <span class="text-primary fw-semibold ps-3">Next Evaluation :</span>

                                            <span class="text-black fw-semibold ps-3">{{ Auth::user()->next_evaluation_date ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Items -->
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="border shadow-none card card-flush"
                style="background-image: linear-gradient(to right, #ffff, #FFFBF2);">
                <div class="p-12 card-body">
                    <div class="row gx-9">
                        <div class="col-sm-6" style="border-right: 1px solid #eee;">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <span class="text-gray-500 fw-semibold">Yearly Total Leave:</span>
                                <span class="px-4 py-3 text-white bg-primary rounded-circle">{{ optional(Auth::user()->employeeLeave)->total_leave }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <span class="text-gray-500 fw-semibold">This Month Total:</span>
                                <span class="px-4 py-3 text-white bg-primary rounded-circle">{{ (Auth::user()->category_id == 1) ? 2 : 1 }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-9 border-top">
                        <div class="col-sm-6" style="border-right: 1px solid #eee;">
                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <span class="text-gray-500 fw-semibold">This Year Taken:</span>
                                <span class="px-4 py-3 text-white bg-primary rounded-circle">{{ optional(Auth::user()->employeeLeave)->casual_leave_availed + optional(Auth::user()->employeeLeave)->earned_leave_availed + optional(Auth::user()->employeeLeave)->medical_leave_availed }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <span class="text-gray-500 fw-semibold">This Month Taken:</span>
                                <span class="px-4 py-3 text-white bg-primary rounded-circle">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="border shadow-none card card-flush"
                style="background-image: linear-gradient(to right, #ffff, #F2FFF8);">
                <div class="p-12 card-body pb-7">
                    <div class="row gx-9">
                        <div class="col-sm-6" style="border-right: 1px solid #eee;">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <span class="text-black fw-semibold">Today Check In:</span>
                                <span
                                    class="p-3 text-white bg-primary rounded-pill">{{ !empty($todayAttendance->check_in) ? $todayAttendance->check_in : 'Absent' }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <span class="text-black fw-semibold">Today Check Out:</span>
                                <span
                                    class="p-3 text-white bg-primary rounded-pill">{{ !empty($todayAttendance->check_in) ? (!empty($todayAttendance->check_out) ? $todayAttendance->check_out : 'N/A') : 'Absent' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-9 border-top">
                        <div class="col-sm-12">
                            <div class="mt-7 d-flex justify-content-between align-items-center">
                                <span class="text-black fw-semibold">Status</span>
                                <span class="p-4 text-info fs-5 badge badge-light-primary rounded-pill">
                                    L:
                                    {{ $attendances->filter(fn($a) => $a['check_in'] > '09:06:00' && $a['check_in'] <= '10:00:00')->count() }}
                                </span>

                                <span class="p-4 text-info fs-5 badge badge-light-primary rounded-pill">
                                    LL: {{ $attendances->filter(fn($a) => $a['check_in'] > '10:00:00')->count() }}
                                </span>

                                <span class="p-4 text-info fs-5 badge badge-light-primary rounded-pill">
                                    A: {{ $attendances->filter(fn($a) => is_null($a['check_in']))->count() }}
                                </span>

                            </div>
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="mt-7 d-flex justify-content-between align-items-center">
                                <span class="text-black fw-semibold">Your Critical Point:</span>
                                <span class="p-5 text-white badge badge-circle badge-danger">24</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 row">
        <div class="col-xl-4">
            <div class="card rounded-3 min-h-100">
                <div class="py-4 card-header justify-content-between align-items-center">
                    <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fs-3 fw-bold">My Hr Releted
                        Documents</a>
                    <div>
                        <button class="rounded-pill btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#addDocuments">+ Add Document</button>
                    </div>
                </div>
                <div class="mt-3 card-body">
                    @forelse (Auth::user()->staffDocuments as $document)
                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-30px me-5">
                                    <img alt="Icon"
                                        src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/pdf.svg">
                                </div>

                                <div class="fw-semibold">
                                    <a class="text-gray-900 fs-6 fw-bold text-hover-primary" href="javascript:void(0);">
                                        {{ $document->document_name }}
                                    </a>
                                    <div class="text-black">
                                        {{ $document->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">

                                <a href="{{ asset('storage/' . $document->document_file) }}" target="_blank"
                                    class="p-2 me-3 btn btn-icon btn-light btn-sm rounded-circle">
                                    <i class="fas fa-download fs-4" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.staff-documents.destroy', $document->id) }}" target="_blank"
                                    class="p-2 delete btn btn-icon btn-light btn-sm rounded-circle">
                                    <i class="fas fa-trash-alt fs-4 text-danger" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="my-5 text-center">
                            <h5 class="text-black">No Documents Found</h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="py-4 card-header justify-content-between align-items-center">
                    <div>
                        <h1 class="text-gray-800 text-hover-primary fs-3 fw-bold">Meeting List</h1>
                        <p class="mb-0 text-gray-400">
                            Total {{ $pendingMeetings }} weekly pending meeting
                        </p>
                    </div>
                    <div>
                        <button data-bs-toggle="modal" data-bs-target="#createMeeting"
                            class="rounded-pill btn btn-light">+ Add Meeting</button>
                    </div>
                </div>

                @php
                    // Define main tabs with their respective IDs and titles
                    $mainTabs = [
                        'all-meeting' => 'Meeting\'s',
                        'in_office' => 'In Office',
                        'out_office' => 'Out Of Office',
                    ];
                    $tabIndex = 0;
                @endphp

                <div class="border-0 card-header" style="min-height: 52px">
                    <ul class="mt-4 border-0 nav nav-pills nav-pills-custom" role="tablist">
                        @foreach ($mainTabs as $id => $title)
                            <li class="m-0 nav-item rounded-pill" role="presentation">
                                <a class="overflow-hidden border-0 nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-pill {{ $tabIndex++ == 0 ? 'active' : '' }}"
                                    id="meetingTab_{{ $id }}" data-bs-toggle="pill"
                                    href="#{{ $id }}"
                                    aria-selected="{{ $tabIndex == 1 ? 'true' : 'false' }}" role="tab"
                                    @if ($tabIndex > 1) tabindex="-1" @endif>
                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        {{ $title }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Tab Content for Meeting Types --}}
                <div class="p-0 pt-4 card-body">
                    <div class="tab-content">
                        @php $contentIndex = 0; @endphp
                        @foreach ($mainTabs as $tabId => $tabTitle)
                            <div class="tab-pane fade {{ $contentIndex++ == 0 ? 'active show' : '' }}"
                                id="{{ $tabId }}" role="tabpanel"
                                aria-labelledby="meetingTab_{{ $tabId }}">
                                <div>
                                    {{-- Running Week (Day and Date) Tabs --}}
                                    <ul class="px-3 mb-8 nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between"
                                        role="tablist">
                                        @foreach ($dateRange as $day)
                                            @php
                                                // Create a unique ID for the daily tab content, combining main tab ID and date
                                                $tabContentId =
                                                    'weekDate_' . $tabId . '_' . $day['carbon_date']->format('Ymd');

                                                // Determine if this is the active day based on the controller logic
                                                $isActive = $day['date_key'] == $activeDayDateKey ? 'active' : '';
                                            @endphp
                                            <li class="p-0 nav-item ms-0" role="presentation">
                                                {{-- The first main tab and the active day should be marked active --}}
                                                <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger {{ $contentIndex == 1 && $isActive ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#{{ $tabContentId }}"
                                                    aria-selected="{{ $contentIndex == 1 && $isActive ? 'true' : 'false' }}"
                                                    role="tab"
                                                    @if (!($contentIndex == 1 && $isActive)) tabindex="-1" @endif>
                                                    {{-- Day --}}
                                                    <span class="fs-7 fw-semibold">{{ $day['day_short'] }}</span>
                                                    {{-- Date --}}
                                                    <span class="fs-6 fw-bold">{{ $day['day_num'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    {{-- Tab Content for Specific Day Meetings --}}
                                    <div class="px-4 mb-2 tab-content">
                                        @foreach ($dateRange as $day)
                                            @php
                                                $dateKey = $day['date_key'];
                                                $tabContentId =
                                                    'weekDate_' . $tabId . '_' . $day['carbon_date']->format('Ymd');

                                                // Retrieve meetings for this date and this main tab category
                                                $dailyMeetings = $meetingsForTabs[$tabId][$dateKey] ?? collect();

                                                // Determine if this is the active day tab (only if it's the first main tab)
                                                $showActive = $contentIndex == 1 && $dateKey == $activeDayDateKey;
                                            @endphp

                                            <div class="tab-pane fade {{ $showActive ? 'active show' : '' }}"
                                                id="{{ $tabContentId }}" role="tabpanel">
                                                @forelse ($dailyMeetings as $meeting)
                                                    <div class="mb-6 d-flex align-items-center">
                                                        {{-- Bullet indicator changes based on if it's past or future --}}
                                                        <span data-kt-element="bullet"
                                                            class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-{{ $meeting->end_time->isPast() ? 'light-secondary' : 'success' }}"></span>
                                                        <div class="flex-grow-1 me-5">
                                                            <div class="text-gray-800 fw-semibold fs-2">
                                                                {{ $meeting->start_time->format('H:i') }} -
                                                                {{ $meeting->end_time->format('H:i') }}
                                                                <span class="text-black fw-semibold fs-7">
                                                                    {{ $meeting->start_time->format('A') }}
                                                                </span>
                                                            </div>
                                                            <div class="text-gray-700 fw-semibold fs-6">
                                                                {{ $meeting->title }}
                                                            </div>
                                                            <div class="text-black fw-semibold fs-7">
                                                                Lead by
                                                                <a href="#"
                                                                    class="text-primary opacity-75-hover fw-semibold">
                                                                    {{ $meeting->leader->name ?? 'N/A' }}
                                                                </a>
                                                            </div>

                                                        </div>
                                                        {{-- Action Buttons --}}
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

                                                        <div class="modal fade" data-bs-backdrop="static"
                                                            data-bs-keyboard="false"
                                                            id="meetingDetails_{{ $meeting->id }}" tabindex="-1"
                                                            aria-labelledby="meetingDetailsLabel_{{ $meeting->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="meetingDetailsLabel_{{ $meeting->id }}">
                                                                            Meeting Details</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3 class="mb-3 fw-bold">{{ $meeting->title }}
                                                                        </h3>
                                                                        <p><strong>Date:</strong>
                                                                            {{ $meeting->date->format('l, F jS, Y') }}
                                                                        </p>
                                                                        <p>
                                                                            <strong>Time:</strong>
                                                                            {{ $meeting->start_time->format('h:i A') }}
                                                                            - {{ $meeting->end_time->format('h:i A') }}
                                                                        </p>
                                                                        <p><strong>Type:</strong>
                                                                            {{ $meeting->meeting_type }}</p>
                                                                        <p>
                                                                            <strong>Lead By:</strong>
                                                                            <a href="#"
                                                                                class="text-primary opacity-75-hover fw-semibold">
                                                                                {{ $meeting->leader->name ?? 'N/A' }}
                                                                            </a>
                                                                        </p>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="meetingEdit_{{ $meeting->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1"
                                                            aria-labelledby="meetingEditLabel_{{ $meeting->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="meetingEditLabel_{{ $meeting->id }}">
                                                                            Edit Meeting: {{ $meeting->title }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    {{-- Update form logic here (use the $users variable passed from the controller) --}}
                                                                    <form
                                                                        action="{{ route('admin.staff-meetings.update', $meeting->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        {{-- ... (Rest of the form fields using $meeting and $users) ... --}}
                                                                        <div class="modal-body">
                                                                            <div class="mb-4 row">
                                                                                <div class="col-md-12">
                                                                                    <label class="form-label">Meeting
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        name="title"
                                                                                        class="form-control" required
                                                                                        value="{{ $meeting->title }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-4 row">
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

                                                                            <div class="mb-4 row">
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

                                                                            {{-- <div class="mb-4 row">
                                                                                    <div class="col-md-12">
                                                                                        <label
                                                                                            class="form-label">Participants
                                                                                            (Select Multiple)
                                                                                        </label>
                                                                                            @php
                                                                                            $selectedParticipants = collect(
                                                                                                $meeting->participants,
                                                                                            )
                                                                                                ->pluck('id')
                                                                                                ->map(fn($id) => (int) $id)
                                                                                                ->toArray();
                                                                                        @endphp

                                                                                        <select name="participants[]" data-control="select2" data-allow-clear="true"
                                                                                            class="form-select" multiple>
                                                                                            @foreach ($users as $user)
                                                                                                <option
                                                                                                    value="{{ $user->id }}"
                                                                                                    {{ in_array($user->id, $selectedParticipants) ? 'selected' : '' }}>
                                                                                                    {{ $user->name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <small class="text-muted">Hold
                                                                                            CTRL/CMD to select multiple
                                                                                            participants.</small>
                                                                                    </div>
                                                                                </div> --}}

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update
                                                                                Meeting</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @empty
                                                    <div class="py-5 text-center">
                                                        <p class="text-black">No {{ strtolower($tabTitle) }}
                                                            scheduled for {{ $day['carbon_date']->format('l, M d') }}.
                                                        </p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-flush min-h-100">
                <div class="card-header py-7">
                    <div>
                        <h1 class="text-gray-800 text-hover-primary fs-3 fw-bold">Performance Tracker</h1>
                        <span class="text-black fs-6 fw-semibold">Performance in this year</span>
                    </div>
                    <div class="mb-2 d-flex align-items-center">
                        <span class="text-gray-800 fs-2hx fw-bold me-2 lh-1 ls-n2">0%</span>

                        {{-- <span class="badge badge-light-danger fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1"><span
                                        class="path1"></span><span class="path2"></span></i>
                                0%
                            </span> --}}
                    </div>
                </div>

                <div class="pt-0 card-body">
                    <div class="mb-0">
                        @if (!empty($performances))
                            <div class="mb-5 d-flex flex-stack">
                                <div class="d-flex align-items-center me-5">
                                    <div class="symbol symbol-30px me-5">
                                        <span class="symbol-label">
                                            <i class="text-gray-600 ki-duotone ki-magnifier fs-3"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                        </span>
                                    </div>

                                    <div class="me-5">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">HR
                                            Performance</a>

                                        <span class="text-black fw-semibold fs-7 d-block text-start ps-0">Direct
                                            link
                                            clicks</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <span class="text-gray-800 fw-bold fs-6 me-3">0.24%</span>

                                    <div class="d-flex flex-center">
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            2.4%
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 separator separator-dashed"></div>
                        @else
                            <div class="mb-5 d-flex flex-stack">
                                <h5 class="text-gray-600">No Performance Data Available.</h5>
                            </div>
                            <div class="my-3 separator separator-dashed"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 row">
        <div class="col-lg-8">
            <div class="card">
                <div class="py-2 pb-0 border-0 card-header align-items-center">
                    <div>
                        <h1 class="card-title">Attendance Details</h1>
                    </div>
                    <div class="">
                        <form action="{{ route('admin.dashboard') }}" method="get">
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
                <div class="pt-0 card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table
                                class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3 dataTable">
                                <thead class="text-black fs-7">
                                    <tr class="px-5 text-gray-800 fw-bold fs-6">
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
                                            <td>{{ $attendance['date'] }}</td>

                                            <td>{{ $attendance['check_in'] ?? 'N/A' }}</td>

                                            <td>{{ $attendance['check_out'] ?? 'N/A' }}</td>

                                            <td>
                                                @if (!empty($attendance['check_in']) && $attendance['check_in'] !== 'N/A')
                                                    @php
                                                        $checkIn = \Carbon\Carbon::parse($attendance['check_in']);
                                                    @endphp

                                                    @if ($checkIn > \Carbon\Carbon::parse('09:06:00') && $checkIn < \Carbon\Carbon::parse('10:01:00'))
                                                        <span class="text-white badge badge-warning">L</span>
                                                    @elseif ($checkIn >= \Carbon\Carbon::parse('10:01:00') && $checkIn < \Carbon\Carbon::parse('15:00:00'))
                                                        <span class="text-white badge badge-danger">LL</span>
                                                    @else
                                                        <span class="text-white badge badge-success">On Time</span>
                                                    @endif
                                                @elseif ($attendance['status'] === 'Friday')
                                                    <span class="text-white badge badge-info">Friday</span>
                                                @else
                                                    <span class="text-white badge badge-danger">Absent</span>
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
        <div class="col-lg-4">
            <div class="p-5 bg-white card card-flush min-h-100">
                <div class="py-2 card-header align-items-center ps-3">
                    <div>
                        <h1 class="text-gray-800 text-hover-primary fs-3 fw-bold">Notice Board</h1>
                        <p class="mb-0 text-gray-400">
                            @php
                                $noticeCount = $notices
                                    ->where(fn($n) => \Carbon\Carbon::parse($n->publish_date)->isSameMonth(now()))
                                    ->count();
                            @endphp

                            Total {{ $noticeCount }} notices posted in {{ now()->format('F') }}.
                        </p>

                    </div>
                    <div>
                        <button class="rounded-pill btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#makeleave">+ Apply Leave</button>
                    </div>
                </div>
                <div>
                    <div class="px-4 mb-2 ">
                        <div class="tab-pane fade show active" id="kt_timeline_widget_3_tab_content_1"
                            role="tabpanel">
                            @forelse ($notices as $notice)
                                <div class="mb-6 d-flex align-items-center">
                                    <span data-kt-element="bullet"
                                        class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                    <div class="flex-grow-1 me-5">
                                        <div class="text-gray-800 fw-semibold fs-4">
                                            {{ $notice->title }}
                                        </div>

                                        <div class="text-gray-700 fw-semibold fs-6">
                                            <i class="fa-solid fa-calendar-days me-3"></i>
                                            {{ $notice->created_at->format('d M Y') }}
                                        </div>
                                    </div>

                                    <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#noticeDetails-{{ $notice->id }}">View</a>
                                    {{-- noticeDetails Modal --}}
                                    <div class="modal fade" id="noticeDetails-{{ $notice->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        {{ $notice->title }}
                                                    </h5>
                                                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i class="fas fa-x-marks text-danger fs-6"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <p class="mb-5">Date: {{ Carbon\Carbon::parse($notice->publish_date)->format('d M, Y') }}</p>
                                                        <p class="mb-5">{!! $notice->content !!}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="mb-6 d-flex align-items-center">
                                    <h5 class="text-black">No Notices Available</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addDocuments" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addDocumentsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentsLabel">
                        Add Documents
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myform" method="post" action="{{ route('admin.staff-documents.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-7">
                                <x-metronic.label for="document_name" class="required">Document
                                    Name</x-metronic.label>
                                <x-metronic.input class="form-control form-control-solid" id="document_name"
                                    name="document_name" :value="old('document_name')"></x-metronic.input>
                            </div>
                            <div class="mb-7">
                                <x-metronic.label for="document_file" class="required">Document</x-metronic.label>
                                <x-metronic.file-input id="document_file" name="document_file" {{-- :source="asset('')" --}}
                                    :value="old('document_file')"></x-metronic.file-input>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                            style="padding: 10px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (isset($users))
        <div class="modal fade" id="createMeeting" tabindex="-1" aria-labelledby="createMeetingLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createMeetingLabel">Create New Meeting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.staff-meetings.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-4 row">
                                <div class="col-md-12">
                                    <label class="form-label">Meeting Title</label>
                                    <input type="text" name="title" class="form-control" required
                                        placeholder="e.g., Q3 Strategy Review">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6">
                                    <label class="form-label">Lead By</label>
                                    <select name="lead_by" class="form-select" data-control="select2"
                                        data-allow-clear="true" required>
                                        <option value="">Select Leader</option>
                                        {{-- Assuming $users is passed from the controller, containing id and name --}}
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Meeting Type</label>
                                    <select name="type" class="form-select" data-control="select2"
                                        data-allow-clear="true" required>
                                        <option value="office">In Office</option>
                                        <option value="out_of_office">Out Of Office</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Start Time</label>
                                    <input type="time" name="start_time" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">End Time</label>
                                    <input type="time" name="end_time" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="col-md-12">
                                    <label class="form-label">Link</label>
                                    <input type="link" name="link" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-12">
                                    <label class="form-label">Participants (Select Multiple)</label>
                                    <select name="participants[]" class="form-select" data-control="select2" data-allow-clear="true" multiple>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Hold CTRL/CMD to select multiple participants.</small>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Meeting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @include('metronic.pages.attendance.partials.leave_modal')

    @push('scripts')
    @endpush
</x-admin-app-layout>
