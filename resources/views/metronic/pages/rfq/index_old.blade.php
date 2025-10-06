<x-admin-app-layout :title="'RFQ'">
    <style>
        .table td,
        .table th,
        .table tr {
            font-size: 14px;
        }

        .nav-line-tabs .nav-item .nav-link.active,
        .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
        .nav-line-tabs .nav-item.show .nav-link {
            background-color: transparent !important;
            border: 0;
            border-bottom: 2px solid #237075;
            transition: color 0.2s ease, background-color 0.2s ease;
            padding: 13px;
            color: rgb(0, 0, 0) !important;
        }
    </style>
    <!-- Main Content Start -->
    
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
                                    <a href=""> </a><a href="#"
                                        class="text-gray-800 fs-5 fw-bold lh-0">Notification
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Quick Status</span>
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

                                    <a href="#allRFQ" class="text-gray-800 fs-5 fw-bold lh-0">New Customers
                                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Pending</span>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save</button>
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
                                <a class="nav-link {{ !empty($tab_status) && $tab_status == 'pending' ? 'active' : '' }} {{ !empty($tab_status) && $tab_status == 'quoted' ? '' : 'active' }} {{ !empty($tab_status) && $tab_status == 'lost' ? '' : 'active' }} px-4"
                                    data-bs-toggle="tab" href="#pending" data-status="pending">Pending
                                    ({{ $rfqs->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ !empty($tab_status) && $tab_status == 'quoted' ? 'active' : '' }} px-4"
                                    data-bs-toggle="tab" href="#quoted" data-status="quoted">Quoted
                                    ({{ $quoteds->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ !empty($tab_status) && $tab_status == 'lost' ? 'active' : '' }} px-4"
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
                            <div class="my-1 position-relative">
                                <i
                                    class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                                <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                                    class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                            </div>
                            <div>
                                <a href="javascript:void(0)" class="btn btn-sm fw-bold btn-primary"
                                    data-bs-toggle="collapse" data-bs-target="#allRFQ">
                                    <i class="fa-solid fa-layer-group"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container for the filtered RFQ queries -->
        {{-- <div id="defaultDiv" class="visible default-div col-xl-12">
            <div class="tab-content" id="myTabContent"> --}}
        @include('metronic.pages.rfq.partials.rfq_queries')
        {{-- </div>
        </div> --}}



        <div class="visible mt-4 default-div col-xl-12">
            <div class="row">
                <div class="shadow-sm card">
                    <div class="cursor-pointer card-header collapsible rotate" data-bs-toggle="collapse"
                        data-bs-target="#allRFQ">
                        <h3 class="card-title">All RFQs</h3>
                        <div class="rotate-180 card-toolbar">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
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
                    <div id="allRFQ" class="collapse">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table text-center border rounded data_table table-striped table-row-bordered gy-5 gs-7">
                                    <thead>
                                        <tr class="text-gray-800 fw-bold fs-6 px-7">
                                            <th width="5%">Sl</th>
                                            <th width="15%">RFQ Code</th>
                                            <th width="25%">Client Name</th>
                                            <th width="15%">Created At</th>
                                            {{-- <th>Assign To</th> --}}
                                            <th width="15%">Status</th>
                                            <th width="15%">Country</th>
                                            {{-- <th>Quick View</th> --}}
                                            <th width="10%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rfqs as $item)
                                            <tr class="">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->rfq_code }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->create_date }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->country }}</td>
                                                <td>
                                                    <a href="{{ route('admin.rfq.destroy', [$item->id]) }}"
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
            </div>
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
        {{-- <script>
            $(document).ready(function() {
                // AJAX function for filtering RFQs
                function fetchRfqData() {
                    // Collect filter values
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status'); // Get selected status from active tab
                    var search = $('#searchQuery').val(); // Get the search query value

                    // AJAX request to fetch filtered RFQs
                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            country: country,
                            search: search // Send the search query
                        },
                        success: function(response) {
                            // Check if the view content is in the response
                            if (response.view) {
                                // Update the RFQ content with the new filtered data
                                $('#filterContainer').html(response.view);
                                // Keep the active tab the same after filtering
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

                // Trigger the fetchRfqData function when a filter is changed
                $('#filterYear, #filterMonth, #searchQuery, #filterCompany', '#filterCountry').on('input change',
                    function() {
                        fetchRfqData();
                    });

                // $('.rfq-tabs .nav-link').click(function() {
                //     // Change the active class on tabs when clicked
                //     $('.rfq-tabs .nav-link').removeClass('active');
                //     $(this).addClass('active');
                //     fetchRfqData(); // Fetch data based on the selected tab
                // });
            });
        </script> --}}
        <script>
            // JavaScript for toggling div visibility
            const toggleBtn = document.getElementById("toggleBtn");
            const defaultDiv = document.getElementById("defaultDiv");
            const hiddenDiv = document.getElementById("hiddenDiv");

            toggleBtn.addEventListener("click", function() {
                // Toggle visibility classes
                defaultDiv.classList.toggle("hidden");
                defaultDiv.classList.toggle("visible");
                hiddenDiv.classList.toggle("hidden");
                hiddenDiv.classList.toggle("visible");
            });
        </script>
        <script>
            $(document).ready(function() {
                function fetchRfqData() {
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var company = $('#filterCompany').val();
                    var country = $('#filterCountry').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status');
                    var search = $('#searchQuery').val();

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

                                // Rebind filter inputs after view is replaced
                                bindFilterEvents();

                                // Restore active tab
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
                    $('#filterYear, #filterMonth, #searchQuery, #filterCompany, #filterCountry').off('input change').on(
                        'input change',
                        function() {
                            fetchRfqData();
                        });
                }

                // Initial binding
                bindFilterEvents();
            });
        </script>
        {{-- <script type="text/javascript">
            $(document).ready(function() {
                // AJAX function for filtering RFQs
                function fetchRfqData() {
                    // Collect filter values
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status'); // Get selected status from active tab
                    var search = $('#searchQuery').val(); // Get the search query value

                    // AJAX request to fetch filtered RFQs
                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            search: search // Send the search query
                        },
                        success: function(response) {
                            // Check if the view content is in the response
                            if (response.view) {
                                // Update the RFQ content with the new filtered data
                                $('#myTabContent').html(response.view);
                                // Re-select the active tab to preserve the selected status
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

                // Trigger the fetchRfqData function when a filter is changed
                $('#filterYear, #filterMonth, #searchQuery').on('input change', function() {
                    fetchRfqData();
                });

                // $('.rfq-tabs .nav-link').click(function() {
                //     // Change the active class on tabs when clicked
                //     $('.rfq-tabs .nav-link').removeClass('active');
                //     $(this).addClass('active');
                //     fetchRfqData(); // Fetch data based on the selected tab
                // });
            });
        </script> --}}
        <script>
            $(document).ready(function() {
                // AJAX function for filtering RFQs
                function fetchRfqData() {
                    // Collect filter values
                    var year = $('#filterYear').val();
                    var month = $('#filterMonth').val();
                    var activeTab = $('.rfq-tabs .nav-link.active');
                    var status = activeTab.data('status'); // Get selected status from active tab
                    var search = $('#searchQuery').val(); // Get the search query value

                    // AJAX request to fetch filtered RFQs
                    $.ajax({
                        url: '{{ route('admin.rfq.filter') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            status: status,
                            search: search // Send the search query
                        },
                        success: function(response) {
                            // Check if the view content is in the response
                            if (response.view) {
                                // Update the RFQ content with the new filtered data
                                $('#myTabContent').html(response.view);
                                // Keep the active tab the same after filtering
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

                // Trigger the fetchRfqData function when a filter is changed
                $('#filterYear, #filterMonth, #searchQuery').on('input change', function() {
                    fetchRfqData();
                });

                // $('.rfq-tabs .nav-link').click(function() {
                //     // Change the active class on tabs when clicked
                //     $('.rfq-tabs .nav-link').removeClass('active');
                //     $(this).addClass('active');
                //     fetchRfqData(); // Fetch data based on the selected tab
                // });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selects = document.querySelectorAll('.pendingRFQ, .quotedRFQ, .lostRFQ');

                selects.forEach(select => {
                    // Ensure default "track" is visible
                    handleSelectChange(select);

                    select.addEventListener('change', function() {
                        handleSelectChange(this);
                    });
                });

                function handleSelectChange(selectElement) {
                    const selectedValue = selectElement.value;
                    const rfqId = selectedValue.split('_').pop(); // Get the numeric ID from value

                    const trackContainer = document.getElementById(`track_container_${rfqId}`);
                    const messageContainer = document.getElementById(`message_container_${rfqId}`);

                    if (!trackContainer || !messageContainer) return;

                    if (selectedValue.startsWith('track_tab')) {
                        trackContainer.style.display = 'block';
                        messageContainer.style.display = 'none';
                    } else if (selectedValue.startsWith('message_tab')) {
                        trackContainer.style.display = 'none';
                        messageContainer.style.display = 'block';
                    }
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                // Use event delegation on a static parent (like document)
                $(document).on('change', '.pendingRFQ, .quotedRFQ, .lostRFQ', function() {
                    const value = $(this).val();
                    const selectElement = $(this);

                    if (value.startsWith('delete_')) {
                        const rfqId = value.split('_')[1]; // Extract RFQ ID

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
                                // Reset the dropdown selection
                                selectElement.val('');
                            }
                        });
                    }
                });
            });
        </script>

        {{-- <script>
            // JavaScript for toggling div visibility
            const toggleBtn = document.getElementById("toggleBtn");
            const defaultDiv = document.getElementById("defaultDiv");
            const hiddenDiv = document.getElementById("hiddenDiv");

            toggleBtn.addEventListener("click", function() {
                // Toggle visibility classes
                defaultDiv.classList.toggle("hidden");
                defaultDiv.classList.toggle("visible");
                hiddenDiv.classList.toggle("hidden");
                hiddenDiv.classList.toggle("visible");
            });
        </script> --}}
    @endpush
</x-admin-app-layout>
