
<x-admin-app-layout :title="'RFQ Dashboard'">
    @include('metronic.pages.rfq.partials.rfq_css')
    <!-- Main Content Start -->

    <div class="mb-5 row">
        <div class="col-lg-4 ps-3 ps-lg-0">
            <div class="mb-3 shadow-none card rfq-box mb-lg-0">
                <div class="w-100 rfq-status-card" style="overflow: hidden;">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-8">
                            <div class="">
                                <h1>Total RFQ</h1>
                                <p>{{ date('d M , Y') }}</p>
                                <div class="d-flex align-items-center">
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
                        <div class="col-lg-4 col-4">
                            <div class="rfq-amount">
                                <h1 class="value">{{ $rfq_count }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3 shadow-none card rfq-status mb-lg-0">
                <div class="w-100 rfq-status-card">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6">
                            <div class="rfq-icon">
                                <img src="{{ asset('backend/assets/images/rfq/Total_RFQ.svg') }}" alt="">
                            </div>
                            <div class="mt-4">
                                <h1 class="mb-0">RFQ</h1>
                                <p class="mb-0 rfq-para">Status</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <ul class="mb-0 border-0 mb-lg-3 nav nav-tabs nav-line-tabs fs-6 rfq-tabs w-100">
                                <li class="mb-2 nav-item w-100">
                                    <a class="nav-link w-100 {{ empty($tab_status) || $tab_status == 'pending' ? 'active' : '' }} rfq-pending"
                                        data-bs-toggle="tab" href="#pending" data-status="pending">
                                        <div class="d-flex justify-content-between w-100 align-items-center">
                                            <p class="mb-0">Pending</p>
                                            <p class="mb-0">{{ $rfqs->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2 nav-item w-100">
                                    <a class="nav-link w-100 {{ !empty($tab_status) && $tab_status == 'quoted' ? 'active' : '' }} rfq-quoted"
                                        data-bs-toggle="tab" href="#quoted" data-status="quoted">
                                        <div class="d-flex justify-content-between w-100 align-items-center">
                                            <p class="mb-0">Quoted</p>
                                            <p class="mb-0">{{ $quoteds->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2 nav-item w-100">
                                    <a class="nav-link w-100 {{ !empty($tab_status) && $tab_status == 'lost' ? 'active' : '' }} rfq-failed"
                                        data-bs-toggle="tab" href="#failed" data-status="lost">
                                        <div class="d-flex justify-content-between w-100 align-items-center">
                                            <p class="mb-0">Lost</p>
                                            <p class="mb-0">{{ $losts->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pe-3 pe-lg-3">
            <div class="p-3 shadow-none card rfq-status-card">
                <div class="px-2 border-0 card-header w-100">
                    <div class="text-white rounded position-relative me-2 d-flex align-items-center"
                        style="width: 100%; position: relative; z-index: 5;">
                        <i
                            class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                        <input type="text" id="searchCountryQuery" data-kt-table-widget-4="search"
                            class="form-control form-control-solid w-100 fs-7 ps-12 searchQuery"
                            placeholder="RFQ By Country" />
                    </div>
                </div>
                <div class="px-3 pt-2 rfq-status-card w-100">
                    <div id="countryList">
                        @forelse ($countryWiseRfqs as $country)
                            <div class="country-wrapper">
                                <div class="d-flex align-items-center justify-content-between country-item">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mb-0 fw-normal ps-3">{{ $country->country }}</h5>
                                    </div>
                                    <div>
                                        <span>{{ $country->total }}</span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @empty
                            <p class="text-center text-muted">No countries found.</p>
                        @endforelse
                    </div>
                    {{-- Hidden message for "No results found" --}}
                    <p id="noResults" class="mt-4 text-center text-muted" style="display: none;">No countries match
                        your search.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row">
        <div class="mb-3 col-12 col-lg-8 ps-3 ps-lg-0">
            <div class="shadow-none card card-flush" style="overflow-x: hidden !important;">
                <div class="p-4 card-body p-lg-7">
                    <div class="row align-items-center">
                        <!-- Left Title Section -->
                        <div class="col-lg-3">
                            <a href="#allRFQ" class="mb-2 text-decoration-none mb-lg-0">
                                <span class="rfq-e-title d-block fw-bold">RFQ Filtered</span>
                                <span class="rfq-p-title text-muted small">All RFQ history here</span>
                            </a>
                        </div>
                        <!-- Right Filters Section -->
                        <div class="col-12 col-lg-9 rfq-query-filter">
                            <div class="row g-2">
                                <!-- Country -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <select class="form-select filterCountry w-100" data-control="select2"
                                        data-placeholder="Country" data-allow-clear="true" id="filterCountry"
                                        name="country">
                                        <option></option>
                                        @foreach ($countryWiseRfqs as $country)
                                        <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Salesman -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <select class="form-select filterSalesman w-100" data-control="select2"
                                        data-placeholder="Salesmanager" data-allow-clear="true"
                                        data-enable-filtering="true" id="filterSalesman" name="salesman">
                                        <option></option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Company -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <select class="form-select filterCompany w-100" data-control="select2"
                                        data-placeholder="Company" data-allow-clear="true"
                                        data-enable-filtering="true" id="filterCompany" name="company">
                                        <option></option>
                                        @foreach ($companies as $company)
                                        <option value="{{ $company }}">{{ $company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Search -->
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <i
                                        class="fa-solid fa-magnifying-glass search-icons fs-5 position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
                                    <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                        class="form-control ps-10 pe-30 searchQuery" placeholder="Search" />
                                    <button type="button"
                                        class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-2 d-none"
                                        id="clearSearch" style="z-index: 2;">
                                        <i class="fas fa-times text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 col-12 col-md-6 col-lg-4">
            <div class="shadow-none card card-flush">
                <div class="card-body rfq-query-filter">
                    <div class="flex-wrap gap-2 d-flex justify-content-between align-items-center">
                        <!-- Year Select -->
                        <div class="flex-grow-1 min-w-100 min-w-md-auto">
                            <select class="form-select" data-control="select2" data-allow-clear="true"
                                data-placeholder="Year" name="year" id="filterYear">
                                <option value="{{ date('Y') }}">2025</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>

                        <!-- Month Select -->
                        <div class="flex-grow-1 min-w-100 min-w-md-auto">
                            <select class="form-select" data-control="select2" data-placeholder="Month"
                                name="month" id="filterMonth">
                                @foreach ($months as $month)
                                        <option value="{{ $month }}" @selected(\Carbon\Carbon::now()->format('F') === $month)>{{ $month }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <!-- Link Button -->
                        <div class="text-center flex-grow-1 min-w-100 min-w-md-auto">
                            @if (!Route::is('admin.archived.rfq'))
                                <a href="{{ route('admin.archived.rfq') }}" class="btn btn-outline-primary w-100">
                                    Archived <i class="fas fa-arrow-right"></i>
                                </a>
                            @else
                                <a href="{{ route('admin.rfq.index') }}" class="btn btn-outline-primary w-100">
                                    Recent RFQs <i class="fas fa-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Container for the filtered RFQ queries -->
        <div class="tab-content" id="myTabContent">
            @include('metronic.pages.rfq.partials.rfq_queries')
        </div>
    </div>
    @include('metronic.pages.rfq.partials.assign-modal')
    @push('scripts')
        <script>
            $(".data_table").DataTable({
                language: {
                    lengthMenu: "Show _MENU_",
                },
                dom: "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
            });
        </script>
        {{-- <script>

            $(document).ready(function() {
                function fetchRfqData() {
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var search = $('#searchQuery').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status');

                    // Show loading spinner
                    $('#myTabContent').html(`
                <div class="py-5 text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            country: country,
                            company: company,
                            search: search
                        },
                        success: function(response) {
                            if (response.view) {
                                $('#myTabContent').html(response.view);

                                // Restore filter values
                                $('#filterYear').val(year);
                                $('#filterMonth').val(month);
                                $('#filterCompany').val(company).trigger('change');
                                $('#filterCountry').val(country).trigger('change');
                                $('#searchQuery').val(search);

                                // Rebind events after DOM update
                                bindFilterEvents();

                                // Restore active tab state
                                $('.rfq-tabs .nav-link').removeClass('active');
                                activeTab.addClass('active');
                            } else {
                                console.error('No view content returned');
                            }
                        },
                        error: function() {
                            $('#myTabContent').html(`
                        <div class="my-4 text-center alert alert-danger">
                            Error fetching data. Please try again.
                        </div>
                    `);
                        }
                    });
                }

                function bindFilterEvents() {
                    $('#filterYear, #filterMonth, #filterCompany, #filterCountry')
                        .off('input change')
                        .on('input change', function() {
                            fetchRfqData();
                        });

                    $('#searchQuery, .searchQuery').off('keypress').on('keypress', function(e) {
                        if (e.which === 13) {
                            fetchRfqData();
                        }
                    });
                }

                // Initial event bindings
                bindFilterEvents();
            });
        </script> --}}

        <script>
            $(document).ready(function() {
                function initSelect2() {
                    $('select[data-control="select2"]').each(function() {
                        const placeholder = $(this).data('placeholder') || 'Select an option';
                        $(this).select2({
                            placeholder: placeholder,
                            allowClear: true,
                            width: 'resolve',
                        });
                    });
                }


                function fetchRfqData() {
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var salesman = $('#filterSalesman').val();
                    var search = $('#searchQuery').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status');

                    // Show loading spinner
                    $('#myTabContent').html(`
                            <div class="py-5 text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        `);

                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            country: country,
                            company: company,
                            salesman: salesman,
                            search: search
                        },
                        success: function(response) {
                            if (response.view) {
                                $('#myTabContent').html(response.view);
                                initSelect2();
                                bindFilterEvents();

                                // Restore active tab
                                $('.rfq-tabs .nav-link').removeClass('active');
                                activeTab.addClass('active');
                            } else {
                                $('#myTabContent').html(`
                                <div class="my-4 text-center alert alert-danger">
                                    Error fetching data. Please try again.
                                </div>
                            `);
                                console.error('No view content returned');
                            }
                        },
                        error: function() {
                            $('#myTabContent').html(`
                                <div class="my-4 text-center alert alert-danger">
                                    Error fetching data. Please try again.
                                </div>
                            `);
                        }
                    });
                }

                function bindFilterEvents() {
                    $('#filterYear, #filterMonth, #filterCompany, #filterCountry, #filterSalesman')
                        .off('change')
                        .on('change', fetchRfqData);

                    $('#searchQuery').off('input keypress').on('input keypress', function(e) {
                        const searchVal = $(this).val();
                        if (searchVal.length > 0) {
                            $('#clearSearch').removeClass('d-none');
                        } else {
                            $('#clearSearch').addClass('d-none');
                        }

                        if (e.which === 13) {
                            fetchRfqData();
                        }
                    });

                    $('#clearSearch').off('click').on('click', function() {
                        $('#searchQuery').val('').trigger('input');
                        $(this).addClass('d-none');
                        fetchRfqData();
                    });
                }


                // Init on page load
                initSelect2();
                bindFilterEvents();
            });
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('change', '.pendingRFQ, .quotedRFQ, .lostRFQ', function() {
                    const selectedValue = $(this).val();
                    const selectElement = $(this);
                    const rfqId = selectedValue.split('_').pop(); // Get ID at the end

                    // Handle "track_tab" or "message_tab"
                    const trackContainer = document.getElementById(`track_container_${rfqId}`);
                    const messageContainer = document.getElementById(`message_container_${rfqId}`);

                    if (trackContainer && messageContainer) {
                        if (selectedValue.startsWith('track_tab')) {
                            trackContainer.style.display = 'block';
                            messageContainer.style.display = 'none';
                        } else if (selectedValue.startsWith('message_tab')) {
                            trackContainer.style.display = 'none';
                            messageContainer.style.display = 'block';
                        }
                    }

                    // Handle "delete"
                    if (selectedValue.startsWith('delete_')) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'This will permanently delete the RFQ.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '{{ route('admin.rfq.destroy', ['rfq' => '__rfq_id__']) }}'
                                        .replace('__rfq_id__', rfqId),
                                    type: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: 'The RFQ has been deleted.',
                                            icon: 'success',
                                            timer: 2000,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location.reload();
                                        });
                                    },
                                    error: function(xhr) {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Failed to delete RFQ: ' + xhr
                                                .responseText,
                                            icon: 'error'
                                        });
                                    }
                                });
                            } else {
                                // Reset dropdown if user cancels deletion
                                selectElement.val('');
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#searchCountryQuery').on('input', function() {
                    const query = $(this).val().toLowerCase();
                    let anyVisible = false;

                    $('.country-wrapper').each(function() {
                        const countryName = $(this).find('.country-item h5').text().toLowerCase();

                        if (countryName.includes(query)) {
                            $(this).show();
                            anyVisible = true;
                        } else {
                            $(this).hide();
                        }
                    });

                    // Show or hide "No results" message
                    $('#noResults').toggle(!anyVisible);
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->
