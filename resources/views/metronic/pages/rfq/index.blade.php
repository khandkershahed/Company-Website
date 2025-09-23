<x-admin-app-layout :title="'RFQ Dashboard'">
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
        <div class="col-lg-4 ps-0">
            <div class="shadow-none card rfq-box">
                <div class="w-100 rfq-status-card">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
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
                        <div class="col-lg-4">
                            <div class="rfq-amount">
                                <h1 class="value">{{ $rfq_count }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="shadow-none card rfq-status">
                <div class="w-100 rfq-status-card">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="rfq-icon">
                                <img src="{{ asset('backend/assets/images/rfq/Total_RFQ.svg') }}" alt="">
                            </div>
                            <div class="mt-4">
                                <h1 class="mb-0 rfq-title">RFQ</h1>
                                <p class="rfq-para">Status</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="mb-3 border-0 nav nav-tabs nav-line-tabs fs-6 rfq-tabs w-100">
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
        <div class="col-lg-4 pe-0">
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
                        your
                        search.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row">
        <div class="col-8 ps-0">
            <div class="shadow-none card card-flush">
                <div class="p-7 card-body">
                    <div class="row g-3 align-items-center">

                        <!-- Left Title Section -->
                        <div class="col-12 col-md-5 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <a href="#allRFQ">
                                    <span class="rfq-e-title d-block fw-bold">RFQ Filtered Details</span>
                                    <span class="rfq-p-title text-muted small">Check all RFQ history here</span>
                                </a>
                            </div>
                        </div>

                        <!-- Right Filters Section -->
                        <div class="col-12 col-md-7">
                            <div class="gap-2 d-flex justify-content-md-end">

                                <!-- Country -->
                                <select class="form-select filterCountry" data-control="select2"
                                    data-allow-clear="true" data-enable-filtering="true"
                                    id="filterCountry" name="country">
                                    <option value="">Country</option>
                                    @foreach ($countryWiseRfqs as $country)
                                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>

                                <!-- Salesman -->
                                <select class="form-select filterSalesman" data-control="select2"
                                    data-allow-clear="true" data-enable-filtering="true">
                                    <option value="">Salesman</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                <!-- Company -->
                                <select class="form-select filterCompany" data-control="select2"
                                    data-allow-clear="true" data-enable-filtering="true"
                                    id="filterCompany" name="company">
                                    <option value="">Company</option>
                                    @foreach ($companies as $company)
                                    <option value="{{ $company }}">{{ $company }}</option>
                                    @endforeach
                                </select>

                                <!-- Search -->
                                <div class="position-relative flex-grow-1 flex-md-grow-0">
                                    <i class="fa-solid fa-magnifying-glass fs-5 position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
                                    <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                        class="form-control ps-10 searchQuery min-w-lg-100px" placeholder="Search" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-4 pe-0">
            <div class="shadow-none card card-flush">
                <div class="card-body">
                    <div class="d-flex flex-stack justify-content-between align-items-center">
                        <div class="me-3 rounded-4">
                            <select class="form-select min-w-lg-150px" data-control="select2" data-allow-clear="true"
                                data-placeholder="Year">
                                <option value="{{ date('Y') }}">Year</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="me-3 rounded-4">
                            <select class="form-select min-w-lg-150px" data-control="select2"
                                data-placeholder="Month">
                                <option value="{{ date('M') }}">Month</option>
                                @foreach ($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center me-3 rounded-4">
                            @if (!Route::is('admin.archived.rfq'))
                            <a href="{{ route('admin.archived.rfq') }}"
                                class="form-control min-w-lg-150px">Archived <i
                                    class="fas fa-arrow-right"></i></a>
                            @else
                            <a href="{{ route('admin.rfq.index') }}"
                                class="form-control min-w-lg-150px">Recent RFQs <i
                                    class="fas fa-arrow-right"></i></a>
                            @endif
                        </div>
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
                    $('.fixed-width-select').select2({
                        placeholder: 'Select an option',
                        allowClear: true,
                        width: 'resolve'
                    });
                }

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

                                // // Re-init select2 on new elements
                                initSelect2();

                                // // Restore values
                                // $('#filterYear').val(year);
                                // $('#filterMonth').val(month);
                                // $('#filterCompany').val(company).trigger('change');
                                // $('#filterCountry').val(country).trigger('change');
                                // $('#searchQuery').val(search);

                                // // Rebind filter change events
                                // bindFilterEvents();

                                // Restore active tab
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