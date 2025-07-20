{{-- <div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'pending' ? 'show active' : '' }} {{ !empty($tab_status) && ($tab_status == 'quoted' || $tab_status == 'lost') ? '' : 'show active' }}"
    id="pending" role="tabpanel"> --}}
<div class="tab-pane fade {{ empty($tab_status) || $tab_status == 'pending' ? 'show active' : '' }}" id="pending"
    role="tabpanel">
    <div class="row">
        <div class="shadow-sm card">
            {{-- <div class="cursor-pointer card-header collapsible rotate" data-bs-toggle="collapse"
                data-bs-target="#pending_rfq">
                <h3 class="card-title">Pending RFQs</h3>
                <div class="rotate-180 card-toolbar">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                transform="rotate(-90 11 18)" fill="currentColor">
                            </rect>
                            <path
                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div id="pending_rfq" class="collapse show"> --}}
            <div class="card-body">
                <div class="row g-4">
                    <div class="overflow-scroll col-lg-5 h-lg-650px h-650px">
                        <ul class="border-0 nav nav-tabs nav-pills">
                            <!-- Filter Bar -->
                            <li class="nav-item w-100 me-0 mb-md-2">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="w-auto text-white rounded position-relative me-2 d-flex align-items-center">
                                        <i
                                            class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                        <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                            class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                                    </div>
                                    <div class="me-2">
                                        <select class="w-auto form-select form-select-sm me-2" data-control="select2"
                                            id="filterCountry" name="country">
                                            <option selected disabled>Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="me-2">
                                        <select class="w-auto form-select form-select-sm me-2" data-control="select2">
                                            <option selected disabled>
                                                Sales Man
                                            </option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="me-2">
                                        <select class="w-auto form-select form-select-sm me-2" data-control="select2"
                                            id="filterCompany" name="company">
                                            <option selected disabled>Company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company }}">
                                                    {{ $company }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="me-2">
                                            <select class="w-auto form-select form-select-sm" data-control="select2">
                                                <option selected disabled>
                                                    RFQ Date & Time
                                                </option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div> --}}
                                </div>
                            </li>

                            <!-- RFQ Card -->
                            @foreach ($rfqs as $rfq)
                                <li class="mt-2 nav-item w-100 me-0 mb-md-2">
                                    <a class="nav-link {{ $loop->first ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
                                        data-bs-toggle="tab" href="#pending_rfq_{{ $rfq->id }}">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                <div>
                                                    <div class="fw-semibold">
                                                        {{ $rfq->name }}
                                                    </div>
                                                    <div class="fs-7 text-muted">
                                                        {{ $rfq->country }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fs-7">{{ $rfq->rfq_code }}</div>
                                                <div class="fs-7">
                                                    {{ optional($rfq->created_at)->format('d M Y | h:i A') }}
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
                                                    {{ \Carbon\Carbon::parse($rfq->created_at)->diffInDays(now(), false) }}
                                                    Days Pending
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="overflow-scroll col-lg-7 h-lg-650px h-650px">
                        <div class="border rounded tab-content" id="myTabContent">
                            @include('metronic.pages.rfq.partials.pending_rfq')
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'quoted' ? 'show active' : '' }}" id="quoted"
    role="tabpanel">
    <div class="row">
        <div class="shadow-sm card">
            <div class="card-body">
                @if ($quoteds->count() > 0)
                    <div class="row g-4">
                        <div class="overflow-scroll col-lg-5 h-lg-650px h-650px">
                            <ul class="border-0 nav nav-tabs nav-pills">
                                <!-- Filter Bar -->
                                <li class="nav-item w-100 me-0 mb-md-2">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="w-auto text-white rounded position-relative me-2 d-flex align-items-center">
                                            <i
                                                class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                            <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                                class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                                        </div>
                                        <div class="me-2">
                                            <select class="w-auto form-select form-select-sm me-2"
                                                data-control="select2" id="filterCountry" name="country">
                                                <option selected disabled>Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="w-auto form-select form-select-sm me-2"
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
                                            <select class="w-auto form-select form-select-sm me-2"
                                                data-control="select2" id="filterCompany" name="company">
                                                <option selected disabled>Company</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company }}">
                                                        {{ $company }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="me-2">
                                                <select class="w-auto form-select form-select-sm" data-control="select2">
                                                    <option selected disabled>
                                                        RFQ Date & Time
                                                    </option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div> --}}
                                    </div>
                                </li>

                                <!-- RFQ Card -->
                                @foreach ($quoteds as $quoted_rfq)
                                    <li class="mt-2 nav-item w-100 me-0 mb-md-2">
                                        <a class="nav-link {{ $loop->first ? 'active btn-active-primary' : '' }} w-100 btn btn-flex border p-3"
                                            data-bs-toggle="tab" href="#quoted_rfq_{{ $quoted_rfq->id }}">
                                            <div class="row w-100 align-items-center">
                                                <div class="col-md-4 d-flex align-items-center">
                                                    <i class="fa-regular fa-file fs-2 text-primary pe-3"></i>
                                                    <div>
                                                        <div class="fw-semibold">
                                                            {{ $quoted_rfq->name }}
                                                        </div>
                                                        <div class="fs-7 text-muted">
                                                            {{ $quoted_rfq->country }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fs-7">{{ $quoted_rfq->rfq_code }}</div>
                                                    <div class="fs-7">
                                                        {{ optional($quoted_rfq->created_at)->format('d M Y | h:i A') }}
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
                                                        {{ \Carbon\Carbon::parse($quoted_rfq->created_at)->diffInDays(now(), false) }}
                                                        Days Pending
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="overflow-scroll col-lg-7 h-lg-650px h-650px">
                            <div class="border rounded tab-content" id="myTabContent">
                                @include('metronic.pages.rfq.partials.quoted_rfq')
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
        </div>
    </div>
</div>
<div class="tab-pane fade {{ !empty($tab_status) && $tab_status == 'lost' ? 'show active' : '' }}" id="failed"
    role="tabpanel">
    <div class="row">
        <div class="shadow-sm card">

            <div class="card-body">
                @if ($losts->count() > 0)
                    <div class="row g-4">
                        <div class="overflow-scroll col-lg-5 h-lg-650px h-650px">
                            <ul class="border-0 nav nav-tabs nav-pills">
                                <!-- Filter Bar -->
                                <li class="nav-item w-100 me-0 mb-md-2">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="w-auto text-white rounded position-relative me-2 d-flex align-items-center">
                                            <i
                                                class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                            <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                                class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                                        </div>
                                        <div class="me-2">
                                            <select class="w-auto form-select form-select-sm me-2"
                                                data-control="select2" id="filterCountry" name="country">
                                                <option selected disabled>Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="me-2">
                                            <select class="w-auto form-select form-select-sm me-2"
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
                                            <select class="w-auto form-select form-select-sm me-2"
                                                data-control="select2" id="filterCompany" name="company">
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
                                                        <div class="fw-semibold">
                                                            {{ $lost_rfq->name }}
                                                        </div>
                                                        <div class="fs-7 text-muted">
                                                            {{ $lost_rfq->country }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fs-7">{{ $lost_rfq->rfq_code }}</div>
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
                        <div class="overflow-scroll col-lg-7 h-lg-650px h-650px">
                            <div class="border rounded tab-content" id="myTabContent">
                                @include('metronic.pages.rfq.partials.lost_rfq')
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
