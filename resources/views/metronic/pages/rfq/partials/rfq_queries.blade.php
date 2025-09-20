<div class="tab-pane fade {{ empty($tab_status) || $tab_status == 'pending' ? 'show active' : '' }}" id="pending"
    role="tabpanel">
    <div class="row">
        <div class="col-lg-5 ps-0">
            <div class="card" style="border-radius: 24px;">
                <div class="px-4 pt-5 border-0 card-header">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <select
                                class="py-4 form-select form-select-solid form-select-sm me-2 rounded-3 fixed-width-select"
                                data-control="select2" id="filterCountry" name="country">
                                <option selected disabled>Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="me-2">
                            <select class="py-4 form-select form-select-sm me-2 rounded-3 fixed-width-select"
                                data-control="select2">
                                <option selected disabled>
                                    Sales Man
                                </option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="me-2">
                            <select class="py-4 form-select form-select-sm me-2 rounded-3 fixed-width-select"
                                data-control="select2" id="filterCompany" name="company">
                                <option selected disabled>Company</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company }}">
                                    {{ $company }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="me-2">
                            <div
                                class="text-white rounded position-relative me-2 d-flex align-items-center">
                                <i
                                    class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                <input type="text" id="searchQuery"
                                    data-kt-table-widget-4="search"
                                    class="form-control fs-7 ps-12" placeholder="Search" />
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mx-5 mt-5">
                <div class="px-5 pt-0 card-body">
                    <div class="rfq-scroll">
                        <ul class="border-0 nav nav-tabs nav-pills flex-column">
                            <!-- RFQ Card -->
                            @foreach ($rfqs as $rfq)
                            <li class="mt-2 nav-item w-100 me-0 mb-md-2">
                                <a class="nav-link {{ $loop->first ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
                                    data-bs-toggle="tab" q href="#pending_rfq_{{ $rfq->id }}">
                                    <div class="row w-100 align-items-center">
                                        <div class="col-md-6 d-flex align-items-center">
                                            <div class="text-start ps-4">
                                                <div class="text-black fw-normal">
                                                    <h1 style="font-size: 16px; font-weight: 400;">
                                                        {{ $rfq->name }}
                                                    </h1>
                                                </div>
                                                <div class="mt-1 text-muted fw-normal" style="font-size: 14px;">
                                                    <span class="text-black">
                                                        @if (!Route::is('admin.archived.rfq'))
                                                        RFQ#
                                                        @endif
                                                        {{ $rfq->rfq_code }}
                                                    </span>
                                                    <span class="px-1">|</span>
                                                    {{ $rfq->country }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end pe-0">
                                            <div
                                                class="fs-7 text-danger d-flex align-items-center justify-content-end">
                                                <img class="img-fluid fa-shake me-2" width="15px"
                                                    src="{{ asset('/images/Notification.svg') }}" alt="">
                                                {{ \Carbon\Carbon::parse($rfq->created_at)->diffInDays(now(), false) }}
                                                Days
                                            </div>
                                            <div>
                                                <p class="py-2 mb-0 fw-normal text-muted">
                                                    {{ optional($rfq->created_at)->format('d M Y | h:i A') }}
                                                </p>
                                            </div>
                                            <div class="gap-2 mb-1 d-flex justify-content-end">

                                                <button type="button" class="btn btn-sm me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#assignRfqModal-{{ $rfq->id }}"
                                                    style="border: 1px solid #296088;">
                                                    Assign
                                                </button>

                                                <button class="btn btn-sm btn-primary"
                                                    style="background-color: #296088;"
                                                    onclick="window.location.href='{{ route('single-rfq.quoation_mail', $rfq->rfq_code) }}';">
                                                    Quote
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            @include('metronic.pages.rfq.partials.assign-modal')
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-7 pe-0">
            <div class="border-0 card" style="border-radius: 24px;">
                <div class="card-body">
                    <div class="" style="height: 700px;overflow-x: hidden !important;">
                        <div class="border-0 rounded tab-content" id="myTabContent">
                            @include('metronic.pages.rfq.partials.pending_rfq')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'quoted' ? 'show active' : '' }}" id="quoted"
    role="tabpanel">
    @if ($quoteds->count() > 0)
    <div class="row">
        <div class="col-lg-5 ps-0">
            <div class="border-0 card" style="border-radius: 24px;">
                <div class="px-4 pt-5 border-0 card-header">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <select class="py-4 form-select form-select-solid form-select-sm me-2 rounded-3"
                                data-control="select2" id="filterCountry" name="country">
                                <option selected disabled>Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="me-2">
                            <select class="py-4 form-select form-select-sm me-2 rounded-3" data-control="select2">
                                <option selected disabled>
                                    Sales Man
                                </option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="me-2">
                            <select class="py-4 form-select form-select-sm me-2 rounded-3" data-control="select2"
                                id="filterCompany" name="company">
                                <option selected disabled>Company</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company }}">
                                    {{ $company }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <hr class="mx-5">
                <div class="px-5 pt-0 card-body">
                    <div class="overflow-scroll" style="height: 630px;">
                        <ul class="border-0 nav nav-tabs nav-pills">
                            <!-- RFQ Card -->
                            @foreach ($quoteds as $quoted_rfq)
                            <li class="mt-2 nav-item w-100 me-0 mb-md-2">
                                <a class="nav-link {{ $loop->first ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
                                    data-bs-toggle="tab" href="#quoted_rfq_{{ $quoted_rfq->id }}">
                                    <div class="row w-100 align-items-center">
                                        <div class="col-md-6 d-flex align-items-center">
                                            <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                            <div class="text-black text-start">
                                                <div class="text-black">
                                                    {{ $quoted_rfq->name }}
                                                </div>
                                                <div class="fs-7 text-muted">
                                                    @if (!Route::is('admin.archived.rfq'))
                                                    RFQ#
                                                    @endif
                                                    {{ $quoted_rfq->rfq_code }}|{{ $quoted_rfq->country }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end pe-0">
                                            <div
                                                class="fs-7 text-danger d-flex align-items-center justify-content-end">
                                                <i class="fas fa-bell fa-shake me-1 text-danger"></i>
                                                {{ \Carbon\Carbon::parse($rfq->created_at)->diffInDays(now(), false) }}
                                                Days
                                            </div>
                                            <div>
                                                <p class="py-2 mb-0 fw-normal text-muted">
                                                    {{ optional($rfq->created_at)->format('d M Y | h:i A') }}
                                                </p>
                                            </div>
                                            <div class="gap-2 mb-1 d-flex justify-content-end">
                                                <div>

                                                </div>
                                                <button class="btn btn-sm btn-primary"
                                                    style="background-color: #296088;"
                                                    onclick="window.location.href='{{ route('single-rfq.quoation_mail', $rfq->rfq_code) }}';">
                                                    Quote
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 pe-0">
            <div class="border-0 card" style="border-radius: 24px;">
                <div class="card-body">
                    <div class="overflow-scroll" style="height: 700px;overflow-x: hidden !important;">
                        <div class="border-0 rounded tab-content" id="myTabContent">
                            @include('metronic.pages.rfq.partials.quoted_rfq')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="text-center col-12">
            <div class="alert alert-info">
                <strong>No RFQs have been quoted yet.</strong>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'lost' ? 'show active' : '' }}" id="failed"
    role="tabpanel">
    <div class="row">
        <div class="shadow-sm card">
            <div class="card-body">
                @if ($losts->count() > 0)
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="overflow-scroll card" style="height: 700px;">
                            <ul class="border-0 nav nav-tabs nav-pills">
                                <!-- Filter Bar -->
                                <li class="nav-item w-100 me-0 mb-md-2">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="text-white rounded position-relative me-2 d-flex align-items-center">
                                            <i
                                                class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                            <input type="text" id="searchQuery"
                                                data-kt-table-widget-4="search"
                                                class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm me-2" data-control="select2"
                                                id="filterCountry" name="country">
                                                <option selected disabled>Country</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm me-2"
                                                data-control="select2">
                                                <option selected disabled>
                                                    Sales Man
                                                </option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="form-select form-select-sm me-2" data-control="select2"
                                                id="filterCompany" name="company">
                                                <option selected disabled>Company</option>
                                                @foreach ($companies as $company)
                                                <option value="{{ $company }}">
                                                    {{ $company }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </li>

                                <!-- RFQ Card -->
                                @foreach ($losts as $lost_rfq)
                                <li class="mt-2 nav-item w-100 me-0 mb-md-2">
                                    <a class="nav-link {{ $loop->first ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
                                        data-bs-toggle="tab" href="#lost_rfq_{{ $lost_rfq->id }}">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                <div>
                                                    <div class="fw-normal">
                                                        {{ $lost_rfq->name }}
                                                    </div>
                                                    <div class="fs-7 text-muted">
                                                        {{ $lost_rfq->country }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fs-7">
                                                    @if (!Route::is('admin.archived.rfq'))
                                                    RFQ#
                                                    @endif{{ $lost_rfq->rfq_code }}
                                                </div>
                                                <div class="fs-7">
                                                    {{ optional($lost_rfq->created_at)->format('d M Y | h:i A') }}
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <div class="gap-2 mb-1 d-flex justify-content-end">
                                                    <button class="btn btn-sm w-50 btn-outline-primary"
                                                        onclick="window.location.href='{{ route('single-rfq.quoation_mail', $rfq->rfq_code) }}';">
                                                        Quote
                                                    </button>
                                                </div>
                                                <div
                                                    class="fs-7 text-muted d-flex align-items-center justify-content-end">
                                                    <i class="fas fa-bell fa-shake me-2 text-muted"></i>
                                                    {{ \Carbon\Carbon::parse($lost_rfq->created_at)->diffInDays(now(), false) }}
                                                    Days Pending
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="overflow-scroll card" style="height: 700px;overflow-x: hidden !important;">
                            <div class="border-0 rounded tab-content" id="myTabContent">
                                @include('metronic.pages.rfq.partials.lost_rfq')
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="text-center col-12">
                        <div class="alert alert-info">
                            <strong>No RFQs have been lost yet.</strong>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>