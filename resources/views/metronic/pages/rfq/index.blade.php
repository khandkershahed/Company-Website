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
    <div class="row gx-8 gx-xl-10">
        <div class="mb-5 row">
            <!-- Attendance -->
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between align-items-center">
                            <div class="p-8 d-flex align-items-center me-3 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                            class="fa-solid text-primary fa-clipboard-user fs-3"
                                            aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">

                                    <a href="#allRFQ" class="text-gray-800 fs-5 fw-bold lh-0">Total RFQ
                                        <span
                                            class="pt-4 text-gray-500 fw-semibold d-block fs-6">{{ date('d M , Y') }}</span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column align-items-center pe-4">
                                <span class="main_text_color fw-bold fs-1 pe-4">
                                    {{ $rfq_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                            class="fa-solid text-primary fa-list-check fs-3"
                                            aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">
                                    <a href=""> </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">RFQ
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Status</span>
                                    </a>
                                </div>
                            </div>

                            <div class="flex-column d-flex w-50">
                                <div class="d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Pending</span>
                                    <span class="px-2 text-white bg-warning fw-semibold ms-3 rounded-2">
                                        {{ $rfqs->count() }}
                                    </span>
                                </div>
                                <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Quoted
                                    </span>
                                    <span class="px-2 text-white bg-success fw-semibold ms-3 rounded-2">
                                        {{ $quoteds->count() }}
                                    </span>
                                </div>
                                <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Failed
                                    </span>
                                    <span class="px-2 text-white bg-danger fw-semibold ms-3 rounded-2">
                                        {{ $losts->count() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                            class="fa-solid text-primary fa-bell fs-3" aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">
                                    <a href="{{ route('admin.archived.rfq') }}" class="text-gray-800 fs-5 fw-bold lh-0">Archived RFQ
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-sm card card-flush">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-between align-items-center">
                            <div class="p-8 d-flex align-items-center me-3 rounded-3">
                                <a href="">
                                    <span class="p-3 bg-light-primary rounded-3 me-3"><i
                                            class="fa-solid text-primary fa-clipboard-user fs-3"
                                            aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">

                                    <a href="#new_customers" class="text-gray-800 fs-5 fw-bold lh-0">New Customers Pending
                                        {{-- <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Pending</span> --}}
                                    </a>
                                    <a href="{{ route('deal.create') }}" class="text-primary fs-5 fw-bold lh-0">
                                        Create Deal
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column align-items-center pe-4">
                                <span class="main_text_color fw-bold fs-1 pe-4">
                                    <!-- Modal trigger button -->
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#new_customers">{{ $new_customers->count() }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="new_customers" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
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

        <div class="mb-5 col-xl-12 mb-xl-3 ps-3" data-select2-id="select2-data-127-jigx">
            <div class="border shadow-sm card card-flush h-xl-100" data-select2-id="select2-data-126-8c2i">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="text-gray-800 card-label fw-bold">RFQ Filtered Details</span>
                        <span class="mt-1 text-gray-500 fw-semibold fs-6">Check All RFQ History Here!</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs fs-6 rfq-tabs">
                            <li class="nav-item">
                                <a class="nav-link {{ empty($tab_status) || $tab_status == 'pending' ? 'active' : '' }}"
                                    data-bs-toggle="tab" href="#pending" data-status="pending">Pending
                                    ({{ $rfqs->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ !empty($tab_status) && $tab_status == 'quoted' ? 'active' : '' }}"
                                    data-bs-toggle="tab" href="#quoted" data-status="quoted">Quoted
                                    ({{ $quoteds->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ !empty($tab_status) && $tab_status == 'lost' ? 'active' : '' }}"
                                    data-bs-toggle="tab" href="#failed" data-status="lost">Failed
                                    ({{ $losts->count() }})</a>
                            </li>
                        </ul>

                    </div>

                    <div class="card-toolbar">
                        <div class="flex-wrap gap-4 d-flex flex-stack">
                            <div class="d-flex align-items-center fw-bold">
                                <select id="filterYear"
                                    class="py-0 form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold ps-3 w-150px"
                                    data-control="select2" data-hide-search="true" data-allow-clear="true"
                                    data-placeholder="Year">
                                    <option></option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center fw-bold">
                                <select id="filterMonth"
                                    class="py-0 text-gray-900 form-select form-select-transparent fs-7 lh-1 fw-bold ps-3 w-150px"
                                    data-control="select2" data-hide-search="true" data-allow-clear="true"
                                    data-placeholder="Month">
                                    <option></option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="my-1 position-relative">
                                <i
                                    class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                    class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container for the filtered RFQ queries -->
        <div class="tab-content" id="myTabContent">
            @include('metronic.pages.rfq.partials.rfq_queries')
        </div>

    </div>
    <!-- Main Content End -->




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







        <script>
            $(document).ready(function() {
                function fetchRfqData() {
                    // Store current filter values
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var search = $('#searchQuery').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status');

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
                            alert('Error fetching data.');
                        }
                    });
                }

                function bindFilterEvents() {
                    $('#filterYear, #filterMonth, #filterCompany, #filterCountry')
                        .off('input change') // Prevent multiple bindings
                        .on('input change', function() {
                            fetchRfqData();
                        });

                    // Optional: trigger on Enter keypress in search box
                    $('#searchQuery').off('keypress').on('keypress', function(e) {
                        if (e.which === 13) {
                            fetchRfqData();
                        }
                    });
                }

                // Initial event bindings
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
                                    url: '{{ route('admin.rfq.destroy', '') }}/' + rfqId,
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
    @endpush
</x-admin-app-layout>
