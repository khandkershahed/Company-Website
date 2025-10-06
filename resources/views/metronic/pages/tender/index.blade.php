<x-admin-app-layout :title="'Tender Information'">
    <div class="px-0 container-fluid">
        <div class="row">
            <div class="col">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <p class="mb-0 optional-color font-44px">{{ $live_tenders->count() }}</p>
                        </div>
                    </div>
                    <div class="pt-2 card-body d-flex flex-column justify-content-end pe-0">
                        <span class="pt-1 mb-2 tender-p-para">Total Live Tender</span>
                        <smal class="mb-2 text-gray-800 fw-bolder d-block">{{ now()->format('d M, Y') }}</smal>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <p class="mb-0 optional-color font-44px">{{ $participating_tenders->count() }}</p>
                        </div>
                    </div>
                    <div class="pt-2 card-body d-flex flex-column justify-content-end pe-0">
                        <span class="pt-1 mb-2 tender-p-para">Total Participating Tender</span>
                        <smal class="mb-2 text-gray-800 fw-bolder d-block">{{ now()->format('d M, Y') }}</smal>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <p class="mb-0 optional-color font-44px">{{ $submitted_tenders->count() }}</p>
                        </div>
                    </div>
                    <div class="pt-2 card-body d-flex flex-column justify-content-end pe-0">
                        <span class="pt-1 mb-2 tender-p-para">Total Submitted Tender</span>
                        <smal class="mb-2 text-gray-800 fw-bolder d-block">{{ now()->format('d M, Y') }}</smal>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <p class="mb-0 optional-color font-44px">{{ $won_tenders->count() }}</p>
                        </div>
                    </div>
                    <div class="pt-2 card-body d-flex flex-column justify-content-end pe-0">
                        <span class="pt-1 mb-2 tender-p-para">Total Won Tender</span>
                        <smal class="mb-2 text-gray-800 fw-bolder d-block">{{ now()->format('d M, Y') }}</smal>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="pt-5 card-header">
                        <div class="card-title d-flex flex-column">
                            <p class="mb-0 optional-color font-44px">{{ $lost_tenders->count() }}</p>
                        </div>
                    </div>
                    <div class="pt-2 card-body d-flex flex-column justify-content-end pe-0">
                        <span class="pt-1 mb-2 tender-p-para">Total Lost Tender</span>
                        <smal class="mb-2 text-gray-800 fw-bolder d-block">{{ now()->format('d M, Y') }}</smal>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 row">
            <div class="col-lg-12">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="pt-4 border-0 card-header align-items-center">
                        <div class="card-title align-items-start flex-column">
                            <p class="mb-0 font-normal text-black" style="font-size: 15px;">Tender List Information</p>

                            <form id="filterForm" method="GET">
                                <input type="hidden" name="date_range" id="date_range">

                                <div id="daterange" class="mt-2 btn btn-sm btn-light d-flex align-items-center">
                                    <div class="text-gray-600 fw-bold">
                                        <span id="daterange-text">
                                            {{ request('date_range') ? request('date_range') : 'Select Date Range' }}
                                        </span>
                                        <i class="bi bi-calendar ms-2"></i>
                                    </div>
                                </div>

                                {{-- Clear Filter Button (Shown only if filter is active) --}}
                                @if (request('date_range'))
                                    <button type="submit" name="clear" value="1"
                                        class="btn btn-sm btn-outline-danger ms-2">Clear Filter</button>
                                @endif
                            </form>

                        </div>
                        <ul class="nav nav-pills nav-pills-custom mx-9" role="tablist">
                            <li class="nav-item me-3 me-lg-6" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary active"
                                    data-bs-toggle="pill" id="kt_charts_widget_10_tab_0" href="#all_tenders"
                                    aria-selected="true" role="tab" tabindex="-1">
                                    <div class="nav-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M22 11.5801V12.5001C21.9988 14.6565 21.3005 16.7548 20.0093 18.4819C18.7182 20.2091 16.9033 21.4726 14.8354 22.084C12.7674 22.6954 10.5573 22.622 8.53447 21.8747C6.51168 21.1274 4.78465 19.7462 3.61096 17.9372C2.43727 16.1281 1.87979 13.9882 2.02168 11.8364C2.16356 9.68467 2.99721 7.63643 4.39828 5.99718C5.79935 4.35793 7.69279 3.21549 9.79619 2.74025C11.8996 2.26502 14.1003 2.48245 16.07 3.36011"
                                                stroke="#296088" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M22 4.5L12 14.51L9 11.51" stroke="#296088" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>

                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        All Listed
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-6" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" id="kt_charts_widget_10_tab_1" href="#live"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <div class="nav-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 18 21" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.7379 1.26175H5.08493C3.00493 1.25375 1.29993 2.91175 1.25093 4.99075V15.7037C1.20493 17.8167 2.87993 19.5677 4.99293 19.6147C5.02393 19.6147 5.05393 19.6157 5.08493 19.6147H13.0739C15.1679 19.5297 16.8179 17.7997 16.8029 15.7037V6.53775L11.7379 1.26175Z"
                                                stroke="#A2A2A2" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M11.4751 1.25V4.159C11.4751 5.579 12.6231 6.73 14.0431 6.734H16.7981"
                                                stroke="#A2A2A2" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M11.2882 13.8584H5.88818" stroke="#A2A2A2" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.24321 10.106H5.88721" stroke="#A2A2A2" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>

                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Live Tender
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-6" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" id="kt_charts_widget_10_tab_2" href="#participating"
                                    aria-selected="false" role="tab">
                                    <div class="nav-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 20 21" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.87651 13.7063C4.03251 13.7063 0.749512 14.2873 0.749512 16.6153C0.749512 18.9433 4.01251 19.5453 7.87651 19.5453C11.7215 19.5453 15.0035 18.9633 15.0035 16.6363C15.0035 14.3093 11.7415 13.7063 7.87651 13.7063Z"
                                                stroke="#A2A2A2" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.8766 10.386C10.3996 10.386 12.4446 8.341 12.4446 5.818C12.4446 3.295 10.3996 1.25 7.8766 1.25C5.3546 1.25 3.3096 3.295 3.3096 5.818C3.3006 8.332 5.3306 10.377 7.8456 10.386H7.8766Z"
                                                stroke="#A2A2A2" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.2036 7.16919V11.1792" stroke="#A2A2A2" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M19.2497 9.17407H15.1597" stroke="#A2A2A2" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>

                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Participating
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-6" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" id="kt_charts_widget_10_tab_3" href="#submitted"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <div class="nav-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 24 25" fill="none">
                                            <path d="M20 6.5L9 17.5L4 12.5" stroke="#A2A2A2" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>

                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Submitted
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-6" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" id="kt_charts_widget_10_tab_4" href="#won_tenders"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <div class="nav-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 18 19" fill="none">
                                            <path
                                                d="M4 18.5V16.5H8V13.4C7.18333 13.2167 6.45417 12.8708 5.8125 12.3625C5.17083 11.8542 4.7 11.2167 4.4 10.45C3.15 10.3 2.10417 9.75417 1.2625 8.8125C0.420833 7.87083 0 6.76667 0 5.5V4.5C0 3.95 0.195833 3.47917 0.5875 3.0875C0.979167 2.69583 1.45 2.5 2 2.5H4V0.5H14V2.5H16C16.55 2.5 17.0208 2.69583 17.4125 3.0875C17.8042 3.47917 18 3.95 18 4.5V5.5C18 6.76667 17.5792 7.87083 16.7375 8.8125C15.8958 9.75417 14.85 10.3 13.6 10.45C13.3 11.2167 12.8292 11.8542 12.1875 12.3625C11.5458 12.8708 10.8167 13.2167 10 13.4V16.5H14V18.5H4ZM4 8.3V4.5H2V5.5C2 6.13333 2.18333 6.70417 2.55 7.2125C2.91667 7.72083 3.4 8.08333 4 8.3ZM9 11.5C9.83333 11.5 10.5417 11.2083 11.125 10.625C11.7083 10.0417 12 9.33333 12 8.5V2.5H6V8.5C6 9.33333 6.29167 10.0417 6.875 10.625C7.45833 11.2083 8.16667 11.5 9 11.5ZM14 8.3C14.6 8.08333 15.0833 7.72083 15.45 7.2125C15.8167 6.70417 16 6.13333 16 5.5V4.5H14V8.3Z"
                                                fill="#A2A2A2" />
                                        </svg>
                                    </div>

                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Won Tender
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-6" role="presentation">
                                <a class="py-3 overflow-hidden nav-link btn btn-outline btn-flex btn-active-color-primary"
                                    data-bs-toggle="pill" id="kt_charts_widget_10_tab_5" href="#lost_tenders"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <div class="nav-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M15.707 10.207L13.414 12.5L15.707 14.793C15.8945 14.9805 15.9998 15.2348 15.9998 15.5C15.9998 15.7652 15.8945 16.0195 15.707 16.207C15.5195 16.3945 15.2652 16.4998 15 16.4998C14.7348 16.4998 14.4805 16.3945 14.293 16.207L12 13.914L9.707 16.207C9.61435 16.3002 9.50419 16.3741 9.38285 16.4246C9.26152 16.4751 9.13141 16.501 9 16.501C8.86859 16.501 8.73848 16.4751 8.61715 16.4246C8.49581 16.3741 8.38565 16.3002 8.293 16.207C8.20005 16.1142 8.12632 16.004 8.07601 15.8827C8.02569 15.7614 7.9998 15.6313 7.9998 15.5C7.9998 15.3687 8.02569 15.2386 8.07601 15.1173C8.12632 14.996 8.20005 14.8858 8.293 14.793L10.586 12.5L8.293 10.207C8.10549 10.0195 8.00015 9.76518 8.00015 9.5C8.00015 9.23482 8.10549 8.98051 8.293 8.793C8.48051 8.60549 8.73482 8.50015 9 8.50015C9.26518 8.50015 9.51949 8.60549 9.707 8.793L12 11.086L14.293 8.793C14.4805 8.60549 14.7348 8.50015 15 8.50015C15.2652 8.50015 15.5195 8.60549 15.707 8.793C15.8945 8.98051 15.9998 9.23482 15.9998 9.5C15.9998 9.76518 15.8945 10.0195 15.707 10.207ZM24 12.5C24 19.117 18.617 24.5 12 24.5C5.383 24.5 0 19.117 0 12.5C0 5.883 5.383 0.5 12 0.5C18.617 0.5 24 5.883 24 12.5ZM22 12.5C22 6.986 17.514 2.5 12 2.5C6.486 2.5 2 6.986 2 12.5C2 18.014 6.486 22.5 12 22.5C17.514 22.5 22 18.014 22 12.5Z"
                                                fill="#A2A2A2" />
                                        </svg>
                                    </div>

                                    <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                                        Lost / Not Particiapted
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @include('metronic.pages.tender.partials.tenderTabs')
                        {{-- <div class="px-0 tab-content">
                            <div class="tab-pane fade active show" id="all_tenders"
                                role="tabpanel" aria-labelledby="kt_charts_widget_10_tab_0">
                                <div class="table-responsive">
                                    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
                                        <table class="table border rounded table-row-bordered dataTable"
                                            style="min-width: 120%;">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th width="3%" class="ps-3">Sl</th>
                                                    <th width="14%">Status</th>
                                                    <th width="8%">Type</th>
                                                    <th width="10%">Responsible</th>
                                                    <th width="8%">Last Date</th>
                                                    <th width="5%">Day</th>
                                                    <th width="8%">Action</th>
                                                    <th width="7%">Participate</th>
                                                    <th width="8%">Value Tk.</th>
                                                    <th width="6%">Tender</th>
                                                    <th width="7%">Purchased</th>
                                                    <th width="8%">Tenderer</th>
                                                    <th width="8%">Reference</th>
                                                    <th width="10%" colspan="3" class="text-center">Submission
                                                    </th>
                                                </tr>
                                                <tr class="bg-white">
                                                    <th colspan="13"></th>
                                                    <th title="Hardcopy Reference Number">Hardcopy</th>
                                                    <th title="Submission via Email or Online">E/O</th>
                                                    <th title="e-Government Procurement ID" width="10%"
                                                        class="pe-3">eGP</th>
                                                </tr>
                                            </thead>

                                            <tbody style="color: #7B7B7B;">
                                                <tr>
                                                    <td class="ps-3">1</td>
                                                    <td>RECORD PH / EMAIL</td>
                                                    <td>-</td>
                                                    <td>Faisal</td>
                                                    <td>01.04.24</td>
                                                    <td>Monday</td>
                                                    <td>Purchase Schedule</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Brac Net</td>
                                                    <td><a href="#">Adobe Suite</a></td>
                                                    <td>-</td>
                                                    <td>Yes</td>
                                                    <td>-</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="live" role="tabpanel"
                                aria-labelledby="kt_charts_widget_10_tab_1">
                                <div class="table-responsive">
                                    <table class="table border rounded table-row-bordered dataTable"
                                        style="min-width: 120%;">
                                        <thead class="bg-light">
                                            <tr>
                                                <th width="3%" class="ps-3">Sl</th>
                                                <th width="14%">Status</th>
                                                <th width="8%">Type</th>
                                                <th width="10%">Responsible</th>
                                                <th width="8%">Last Date</th>
                                                <th width="5%">Day</th>
                                                <th width="8%">Action</th>
                                                <th width="7%">Participate</th>
                                                <th width="8%">Value Tk.</th>
                                                <th width="6%">Tender</th>
                                                <th width="7%">Purchased</th>
                                                <th width="8%">Tenderer</th>
                                                <th width="8%">Reference</th>
                                                <th width="10%" colspan="3" class="text-center">Submission
                                                </th>
                                            </tr>
                                            <tr class="bg-white">
                                                <th colspan="13"></th>
                                                <th title="Hardcopy Reference Number">Hardcopy</th>
                                                <th title="Submission via Email or Online">E/O</th>
                                                <th title="e-Government Procurement ID" width="10%"
                                                    class="pe-3">eGP</th>
                                            </tr>
                                        </thead>

                                        <tbody style="color: #7B7B7B;">
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td>RECORD PH / EMAIL</td>
                                                <td>-</td>
                                                <td>Faisal</td>
                                                <td>01.04.24</td>
                                                <td>Monday</td>
                                                <td>Purchase Schedule</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Brac Net</td>
                                                <td><a href="#">Adobe Suite</a></td>
                                                <td>-</td>
                                                <td>Yes</td>
                                                <td>-</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="participating" role="tabpanel"
                                aria-labelledby="kt_charts_widget_10_tab_2">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table border rounded table-row-bordered dataTable"
                                            style="min-width: 120%;">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th width="3%" class="ps-3">Sl</th>
                                                    <th width="14%">Status</th>
                                                    <th width="8%">Type</th>
                                                    <th width="10%">Responsible</th>
                                                    <th width="8%">Last Date</th>
                                                    <th width="5%">Day</th>
                                                    <th width="8%">Action</th>
                                                    <th width="7%">Participate</th>
                                                    <th width="8%">Value Tk.</th>
                                                    <th width="6%">Tender</th>
                                                    <th width="7%">Purchased</th>
                                                    <th width="8%">Tenderer</th>
                                                    <th width="8%">Reference</th>
                                                    <th width="10%" colspan="3" class="text-center">Submission
                                                    </th>
                                                </tr>
                                                <tr class="bg-white">
                                                    <th colspan="13"></th>
                                                    <th title="Hardcopy Reference Number">Hardcopy</th>
                                                    <th title="Submission via Email or Online">E/O</th>
                                                    <th title="e-Government Procurement ID" width="10%"
                                                        class="pe-3">eGP</th>
                                                </tr>
                                            </thead>

                                            <tbody style="color: #7B7B7B;">
                                                <tr>
                                                    <td class="ps-3">1</td>
                                                    <td>RECORD PH / EMAIL</td>
                                                    <td>-</td>
                                                    <td>Faisal</td>
                                                    <td>01.04.24</td>
                                                    <td>Monday</td>
                                                    <td>Purchase Schedule</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Brac Net</td>
                                                    <td><a href="#">Adobe Suite</a></td>
                                                    <td>-</td>
                                                    <td>Yes</td>
                                                    <td>-</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="submitted" role="tabpanel"
                                aria-labelledby="kt_charts_widget_10_tab_3">
                                <div class="table-responsive">
                                    <table class="table border rounded table-row-bordered dataTable"
                                        style="min-width: 120%;">
                                        <thead class="bg-light">
                                            <tr>
                                                <th width="3%" class="ps-3">Sl</th>
                                                <th width="14%">Status</th>
                                                <th width="8%">Type</th>
                                                <th width="10%">Responsible</th>
                                                <th width="8%">Last Date</th>
                                                <th width="5%">Day</th>
                                                <th width="8%">Action</th>
                                                <th width="7%">Participate</th>
                                                <th width="8%">Value Tk.</th>
                                                <th width="6%">Tender</th>
                                                <th width="7%">Purchased</th>
                                                <th width="8%">Tenderer</th>
                                                <th width="8%">Reference</th>
                                                <th width="10%" colspan="3" class="text-center">Submission
                                                </th>
                                            </tr>
                                            <tr class="bg-white">
                                                <th colspan="13"></th>
                                                <th title="Hardcopy Reference Number">Hardcopy</th>
                                                <th title="Submission via Email or Online">E/O</th>
                                                <th title="e-Government Procurement ID" width="10%"
                                                    class="pe-3">eGP</th>
                                            </tr>
                                        </thead>

                                        <tbody style="color: #7B7B7B;">
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td>RECORD PH / EMAIL</td>
                                                <td>-</td>
                                                <td>Faisal</td>
                                                <td>01.04.24</td>
                                                <td>Monday</td>
                                                <td>Purchase Schedule</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Brac Net</td>
                                                <td><a href="#">Adobe Suite</a></td>
                                                <td>-</td>
                                                <td>Yes</td>
                                                <td>-</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="won_tenders" role="tabpanel"
                                aria-labelledby="kt_charts_widget_10_tab_4">
                                <div class="table-responsive">
                                    <table class="table border rounded table-row-bordered dataTable"
                                        style="min-width: 120%;">
                                        <thead class="bg-light">
                                            <tr>
                                                <th width="3%" class="ps-3">Sl</th>
                                                <th width="14%">Status</th>
                                                <th width="8%">Type</th>
                                                <th width="10%">Responsible</th>
                                                <th width="8%">Last Date</th>
                                                <th width="5%">Day</th>
                                                <th width="8%">Action</th>
                                                <th width="7%">Participate</th>
                                                <th width="8%">Value Tk.</th>
                                                <th width="6%">Tender</th>
                                                <th width="7%">Purchased</th>
                                                <th width="8%">Tenderer</th>
                                                <th width="8%">Reference</th>
                                                <th width="10%" colspan="3" class="text-center">Submission
                                                </th>
                                            </tr>
                                            <tr class="bg-white">
                                                <th colspan="13"></th>
                                                <th title="Hardcopy Reference Number">Hardcopy</th>
                                                <th title="Submission via Email or Online">E/O</th>
                                                <th title="e-Government Procurement ID" width="10%"
                                                    class="pe-3">eGP</th>
                                            </tr>
                                        </thead>

                                        <tbody style="color: #7B7B7B;">
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td>RECORD PH / EMAIL</td>
                                                <td>-</td>
                                                <td>Faisal</td>
                                                <td>01.04.24</td>
                                                <td>Monday</td>
                                                <td>Purchase Schedule</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Brac Net</td>
                                                <td><a href="#">Adobe Suite</a></td>
                                                <td>-</td>
                                                <td>Yes</td>
                                                <td>-</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lost_tenders" role="tabpanel"
                                aria-labelledby="kt_charts_widget_10_tab_5">
                                <div class="table-responsive">
                                    <table class="table border rounded table-row-bordered dataTable"
                                        style="min-width: 120%;">
                                        <thead class="bg-light">
                                            <tr>
                                                <th width="3%" class="ps-3">Sl</th>
                                                <th width="14%">Status</th>
                                                <th width="8%">Type</th>
                                                <th width="10%">Responsible</th>
                                                <th width="8%">Last Date</th>
                                                <th width="5%">Day</th>
                                                <th width="8%">Action</th>
                                                <th width="7%">Participate</th>
                                                <th width="8%">Value Tk.</th>
                                                <th width="6%">Tender</th>
                                                <th width="7%">Purchased</th>
                                                <th width="8%">Tenderer</th>
                                                <th width="8%">Reference</th>
                                                <th width="10%" colspan="3" class="text-center">Submission
                                                </th>
                                            </tr>
                                            <tr class="bg-white">
                                                <th colspan="13"></th>
                                                <th title="Hardcopy Reference Number">Hardcopy</th>
                                                <th title="Submission via Email or Online">E/O</th>
                                                <th title="e-Government Procurement ID" width="10%"
                                                    class="pe-3">eGP</th>
                                            </tr>
                                        </thead>

                                        <tbody style="color: #7B7B7B;">
                                            <tr>
                                                <td class="ps-3">1</td>
                                                <td>RECORD PH / EMAIL</td>
                                                <td>-</td>
                                                <td>Faisal</td>
                                                <td>01.04.24</td>
                                                <td>Monday</td>
                                                <td>Purchase Schedule</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Brac Net</td>
                                                <td><a href="#">Adobe Suite</a></td>
                                                <td>-</td>
                                                <td>Yes</td>
                                                <td>-</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                const predefinedRanges = {
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                        .endOf('month')
                    ],
                    'Upcoming Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf(
                        'month')],
                    'Custom Range': [moment().subtract(29, 'days'), moment()]
                };

                $('#daterange').daterangepicker({
                    opens: 'left',
                    ranges: predefinedRanges,
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                }, function(start, end, label) {
                    let formatted = start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD');
                    $('#date_range').val(formatted);
                    $('#daterange-text').text(formatted);
                    $('#filterForm').submit();
                });

                // Optional: Handle Clear from daterangepicker (X button)
                $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                    $('#date_range').val('');
                    $('#daterange-text').text('Select Date Range');
                    $('#filterForm').submit();
                });
            });
        </script>
    @endpush

</x-admin-app-layout>
