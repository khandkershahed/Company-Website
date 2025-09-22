<x-admin-app-layout :title="'RFQ'">
    @include('metronic.pages.rfq.partials.rfq_css')
    <!-- Main Content Start -->
    @php
    $months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
    ];
    @endphp
    <div class="mb-5 row">
        <div class="mb-5 col-lg-3 mb-lg-0 ps-0">
            <div class="row">
                <div class="mb-5 col-12">
                    <div class="shadow-sm card card-flush">
                        <div class="p-0 card-body">
                            <div class="d-flex flex-stack justify-content-between align-items-center">
                                <div class="p-8 d-flex align-items-center me-3 rounded-3">
                                    <a href="javascript:void(0)">
                                        <span
                                            class="p-3 text-black bg-light-primary rounded-3 me-3 fs-1 d-flex align-items-center justify-content-center">
                                            {{ $rfq_count }}
                                        </span>
                                    </a>
                                    <div class="flex-grow-1">
                                        <a href="javascript:void" class="text-gray-800 fs-5 fw-bold lh-0">Total RFQ
                                            <span
                                                class="pt-4 text-gray-500 fw-semibold d-block fs-6">{{ date('d M , Y') }}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center flex-grow-1">
                                    <a href="javascript:void" class="text-gray-800 fs-1 fw-bold lh-0">
                                        <span class="pt-4 mb-2 text-gray-500 fw-semibold d-block fs-6 text-start">
                                            This Month: {{ $this_month }}
                                            @if ($last_month > 0)
                                            @if ($percentage_change > 0)
                                            <span class="text-success ms-2">
                                                ▲ {{ $percentage_change }}%
                                            </span>
                                            @elseif ($percentage_change < 0)
                                                <span class="text-danger ms-2">
                                                ▼ {{ abs($percentage_change) }}%
                                        </span>
                                        @else
                                        <span class="text-muted ms-2">—</span>
                                        @endif
                                        @endif
                                        </span>
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6 text-start">
                                            Last Month: {{ $last_month }}
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="shadow-sm card card-flush">
                        <div class="p-2 py-4 card-body">
                            <div class="d-flex flex-stack justify-content-between">
                                <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                    <a href="">
                                        <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                                class="fa-solid text-primary fa-list-check fs-3"
                                                aria-hidden="true"></i></span>
                                    </a>
                                    <div class="flex-grow-1">
                                        <a href=""> </a><a href="#"
                                            class="text-gray-800 fs-5 fw-bold lh-0">RFQ
                                            <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Status</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex-column d-flex w-50">
                                    <div class="d-flex align-items-center justify-content-end pe-5">
                                        <span class="text-gray-500 fw-semibold">
                                            Pending</span>
                                        <span class="px-2 text-white bg-warning fw-semibold ms-3 rounded-2 rfq-badge">
                                            {{ $rfqs->count() }}
                                        </span>
                                    </div>
                                    <div class="pt-2 d-flex align-items-center justify-content-end pe-5">
                                        <span class="text-gray-500 fw-semibold">
                                            Quoted
                                        </span>
                                        <span class="px-2 text-white bg-success fw-semibold ms-3 rounded-2 rfq-badge">
                                            {{ $quoteds->count() }}
                                        </span>
                                    </div>
                                    <div class="pt-2 d-flex align-items-center justify-content-end pe-5">
                                        <span class="text-gray-500 fw-semibold">
                                            Failed
                                        </span>
                                        <span class="px-2 text-white bg-danger fw-semibold ms-3 rounded-2 rfq-badge">
                                            {{ $losts->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="p-3 shadow-none card rfq-status">
                <div class="px-2 border-0 card-header w-100">
                    <div class="text-white rounded position-relative me-2 d-flex align-items-center"
                        style="width: 100%; position: relative; z-index: 5;">
                        <i class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                        <input type="text" id="searchCountryQuery" data-kt-table-widget-4="search"
                            class="form-control form-control-solid w-100 fs-7 ps-12 searchQuery"
                            placeholder="RFQ By Country" />
                    </div>
                </div>
                <div class="px-3 pt-2 rfq-status-card w-100">
                    <div id="countryList">
                        @foreach ($countryWiseRfqs as $country)
                        <div class="d-flex align-items-center justify-content-between country-item">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 fw-normal ps-3">{{ $country->country }}</h5>
                            </div>
                            <div>
                                <span>{{ $country->total }}</span>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 pe-0">
            <div class="card h-100">
                <div class="card-body">
                    <!-- Tabs full width -->
                    <ul class="mb-3 nav nav-tabs nav-line-tabs fs-6 rfq-tabs d-flex w-100">
                        <li class="nav-item flex-fill">
                            <a class="nav-link {{ empty($tab_status) || $tab_status == 'pending' ? 'active' : '' }}"
                                data-bs-toggle="tab" href="#pending" data-status="pending">
                                Pending ({{ $rfqs->count() }})
                            </a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link {{ !empty($tab_status) && $tab_status == 'quoted' ? 'active' : '' }}"
                                data-bs-toggle="tab" href="#quoted" data-status="quoted">
                                Quoted ({{ $quoteds->count() }})
                            </a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link {{ !empty($tab_status) && $tab_status == 'lost' ? 'active' : '' }}"
                                data-bs-toggle="tab" href="#failed" data-status="lost">
                                Failed ({{ $losts->count() }})
                            </a>
                        </li>
                    </ul>

                    <!-- Search + Year + Month -->
                    <div class="flex-wrap gap-3 mb-3 d-flex">
                        <!-- Search -->
                        <div class="min-w-0 flex-grow-1">
                            <div class="position-relative">
                                <i class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-3"></i>
                                <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                    class="form-control ps-12" placeholder="Search" />
                            </div>
                        </div>

                        <!-- Year -->
                        <div style="min-width: 150px;">
                            <select class="form-select" data-control="select2" data-allow-clear="true" data-placeholder="Year">
                                <option></option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>

                        <!-- Month -->
                        <div style="min-width: 150px;">
                            <select class="form-select" data-control="select2" data-placeholder="Month">
                                <option></option>
                                @foreach ($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filters: Country / Salesman / Company -->
                    <div class="gap-3 d-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                        <select class="form-select filterCountry" data-control="select2" data-allow-clear="true" data-enable-filtering="true" id="filterCountry" name="country">
                            <option value="">All Country</option>
                            @foreach ($countryWiseRfqs as $country)
                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                            @endforeach
                        </select>

                        <select class="form-select filterSalesman" data-control="select2" data-allow-clear="true" data-enable-filtering="true">
                            <option value="">All Salesman</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <select class="form-select filterCompany" data-control="select2" data-allow-clear="true" data-enable-filtering="true" id="filterCompany" name="company">
                            <option value="">All Company</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company }}">{{ $company }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal fade" id="new_customers" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            New Customers RFQ Pending
                        </h5>
                        <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="pt-0 modal-body">
                        <div class="pt-0 card">
                            <div class="pt-0 card-body">
                                <div class="table-responsive">
                                    <table class="table text-center data_table table-striped table-row-bordered">
                                        <thead>
                                            <tr class="text-gray-800 fw-bold fs-6 px-7">
                                                <th width="5%">Sl</th>
                                                <th width="15%">RFQ Code</th>
                                                <th width="25%">Client Name</th>
                                                <th width="15%">Created At</th>
                                                {{-- <th>Assign To</th> --}}
                                                <th width="15%">Company Name</th>
                                                <th width="15%">Country</th>
                                                {{-- <th>Quick View</th> --}}
                                                <th width="10%">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($new_customers as $new_customer)
                                            <tr class="">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $new_customer->rfq_code }}</td>
                                                <td>{{ $new_customer->name }}</td>
                                                <td>{{ $new_customer->create_date }}
                                                </td>
                                                <td>{{ $new_customer->company_name }}</td>
                                                <td>{{ $new_customer->country }}</td>
                                                <td>
                                                    <a href="{{ route('admin.rfq.destroy', [$new_customer->id]) }}"
                                                        class="text-danger delete" title="Delete RFQ">
                                                        <i
                                                            class="delete fa-solid fa-trash-alt fs-3 dash-icons me-2 text-hover-danger"></i>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container for the filtered RFQ queries -->
        <div class="tab-content" id="myTabContent">
            @include('metronic.pages.rfq.partials.rfq_queries')
        </div>
    </div>
    @include('metronic.pages.rfq.partials.assign-modal')

</x-admin-app-layout>