<x-admin-app-layout :title="'RFQ'">
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
        <div class="row mb-5">
            <!-- Attendance -->
            <div class="col-xl-3">
                <div class="card card-flush shadow-sm">
                    <div class="card-body p-0">
                        <div class="d-flex flex-stack justify-content-between align-items-center">
                            <div class="d-flex align-items-center me-3 p-8 rounded-3">
                                <a href="">
                                    <span class="bg-light-primary rounded-3 p-3 me-3"><i
                                            class="fa-solid text-primary fa-clipboard-user fs-3"
                                            aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">

                                    <a href="#allRFQ" class="text-gray-800 fs-5 fw-bold lh-0">Total RFQ
                                        <span
                                            class="text-gray-500 fw-semibold d-block fs-6 pt-4">{{ date('d M , Y') }}</span>
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
                <div class="card card-flush shadow-sm">
                    <div class="card-body p-0">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="d-flex align-items-center me-3 p-8 w-50 rounded-3">
                                <a href="">
                                    <span class="bg-light-primary rounded-3 p-3 me-3"><i
                                            class="fa-solid text-primary fa-list-check fs-3"
                                            aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">
                                    <a href=""> </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">RFQ
                                        <span class="text-gray-500 fw-semibold d-block fs-6 pt-4">Status</span>
                                    </a>
                                </div>
                            </div>

                            <div class="flex-column d-flex w-50">
                                <div class="d-flex align-items-center justify-content-between pe-3">
                                    <span class="text-gray-500 fw-semibold">
                                        Pending</span>
                                    <span class="bg-warning fw-semibold ms-3 px-2 text-white rounded-2">
                                        {{ $rfqs->count() }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pe-3 pt-2">
                                    <span class="text-gray-500 fw-semibold">
                                        Quoted
                                    </span>
                                    <span class="bg-success fw-semibold ms-3 px-2 text-white rounded-2">
                                        {{ $quoteds->count() }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pe-3 pt-2">
                                    <span class="text-gray-500 fw-semibold">
                                        Failed
                                    </span>
                                    <span class="bg-danger fw-semibold ms-3 px-2 text-white rounded-2">
                                        {{ $losts->count() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card card-flush shadow-sm">
                    <div class="card-body p-0">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="d-flex align-items-center me-3 p-8 w-50 rounded-3">
                                <a href="">
                                    <span class="bg-light-primary rounded-3 p-3 me-3"><i
                                            class="fa-solid text-primary fa-bell fs-3" aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">
                                    <a href=""> </a><a href="#"
                                        class="text-gray-800 fs-5 fw-bold lh-0">Notification
                                        <span class="text-gray-500 fw-semibold d-block fs-6 pt-4">Quick Status</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3">
                <div class="card card-flush shadow-sm">
                    <div class="card-body p-0">
                        <div class="d-flex flex-stack justify-content-between">
                            <div class="d-flex align-items-center me-3 p-8 w-50 rounded-3">
                                <a href="">
                                    <span class="bg-light-primary rounded-3 p-3 me-3"><i
                                            class="fa-solid text-primary fa-bullseye fs-3"
                                            aria-hidden="true"></i></span>
                                </a>
                                <div class="flex-grow-1">
                                    <a href=""> </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">RFQ
                                        <span class="text-gray-500 fw-semibold d-block fs-6 pt-4">Query</span>
                                    </a>
                                </div>
                            </div>

                            <div class="flex-column d-flex w-50 me-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <select class="form-select form-select-sm" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option>Select Country</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-2">
                                    <select class="form-select form-select-sm" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option>Select Sales Man</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="col-xl-12 mb-5 mb-xl-3 ps-3" data-select2-id="select2-data-127-jigx">
            <div class="card card-flush h-xl-100 border shadow-sm" data-select2-id="select2-data-126-8c2i">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">RFQ Filtered Details</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Check All RFQ History Here!</span>
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
                        <div class="d-flex flex-stack flex-wrap gap-4">
                            <div class="d-flex align-items-center fw-bold">
                                <select id="filterYear"
                                    class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-150px"
                                    data-control="select2" data-hide-search="true" data-allow-clear="true"
                                    data-placeholder="Filter By Year">
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
                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-150px"
                                    data-control="select2" data-hide-search="true" data-allow-clear="true"
                                    data-placeholder="Filter By Month">
                                    <option></option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative my-1">
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
        <div id="defaultDiv" class="default-div visible col-xl-12">
            <div class="tab-content" id="myTabContent">
                @include('metronic.pages.rfq.partials.rfq_queries')
            </div>
        </div>



        <div class="default-div visible col-xl-12 mt-4">
            <div class="row">
                <div class="card shadow-sm">
                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                        data-bs-target="#allRFQ">
                        <h3 class="card-title">All RFQs</h3>
                        <div class="card-toolbar rotate-180">
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
                                    class="data_table table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th>Sl</th>
                                            <th>RFQ Code</th>
                                            <th>Client Name</th>
                                            <th>Created At</th>
                                            {{-- <th>Assign To</th> --}}
                                            <th>Status</th>
                                            <th>Country</th>
                                            {{-- <th>Quick View</th> --}}
                                            {{-- <th class="text-end">
                                                Action
                                            </th> --}}
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
                                                {{-- <td>
                                                    {{ $item->rfq_code }}
                                                </td> --}}
                                                {{-- <td class="text-center">
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="pe-3"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a href="" class="pe-3"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a href="" class="pe-3"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                </td> --}}
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
    @endpush
</x-admin-app-layout>