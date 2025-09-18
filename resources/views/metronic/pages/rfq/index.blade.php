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
        <div class="col-lg-4 ps-0">
            <div class="shadow-none card rfq-box">
                <div class="w-100 rfq-status-card">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="rfq-icon">
                                <img src="{{ asset('backend/assets/images/rfq/Total_RFQ.svg') }}" alt="" >
                            </div>
                            <div class="mt-4">
                                <h1 class="m-title mb-0">Total RFQ</h1>
                                <p class="m-p-title">{{ date('d M , Y') }}</p>
                                <div class="d-flex align-items-center">
                                    <span class="d-flex align-items-center cl-badge ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                            viewBox="0 0 25 24" fill="none">
                                            <mask id="mask0_111_889" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="25" height="24">
                                                <rect x="0.5" width="24" height="24" fill="#D9D9D9" />
                                            </mask>
                                            <g mask="url(#mask0_111_889)">
                                                <path
                                                    d="M5.5 22C4.95 22 4.47917 21.8042 4.0875 21.4125C3.69583 21.0208 3.5 20.55 3.5 20V6C3.5 5.45 3.69583 4.97917 4.0875 4.5875C4.47917 4.19583 4.95 4 5.5 4H6.5V2H8.5V4H16.5V2H18.5V4H19.5C20.05 4 20.5208 4.19583 20.9125 4.5875C21.3042 4.97917 21.5 5.45 21.5 6V20C21.5 20.55 21.3042 21.0208 20.9125 21.4125C20.5208 21.8042 20.05 22 19.5 22H5.5ZM5.5 20H19.5V10H5.5V20ZM5.5 8H19.5V6H5.5V8ZM12.5 14C12.2167 14 11.9792 13.9042 11.7875 13.7125C11.5958 13.5208 11.5 13.2833 11.5 13C11.5 12.7167 11.5958 12.4792 11.7875 12.2875C11.9792 12.0958 12.2167 12 12.5 12C12.7833 12 13.0208 12.0958 13.2125 12.2875C13.4042 12.4792 13.5 12.7167 13.5 13C13.5 13.2833 13.4042 13.5208 13.2125 13.7125C13.0208 13.9042 12.7833 14 12.5 14ZM8.5 14C8.21667 14 7.97917 13.9042 7.7875 13.7125C7.59583 13.5208 7.5 13.2833 7.5 13C7.5 12.7167 7.59583 12.4792 7.7875 12.2875C7.97917 12.0958 8.21667 12 8.5 12C8.78333 12 9.02083 12.0958 9.2125 12.2875C9.40417 12.4792 9.5 12.7167 9.5 13C9.5 13.2833 9.40417 13.5208 9.2125 13.7125C9.02083 13.9042 8.78333 14 8.5 14ZM16.5 14C16.2167 14 15.9792 13.9042 15.7875 13.7125C15.5958 13.5208 15.5 13.2833 15.5 13C15.5 12.7167 15.5958 12.4792 15.7875 12.2875C15.9792 12.0958 16.2167 12 16.5 12C16.7833 12 17.0208 12.0958 17.2125 12.2875C17.4042 12.4792 17.5 12.7167 17.5 13C17.5 13.2833 17.4042 13.5208 17.2125 13.7125C17.0208 13.9042 16.7833 14 16.5 14ZM12.5 18C12.2167 18 11.9792 17.9042 11.7875 17.7125C11.5958 17.5208 11.5 17.2833 11.5 17C11.5 16.7167 11.5958 16.4792 11.7875 16.2875C11.9792 16.0958 12.2167 16 12.5 16C12.7833 16 13.0208 16.0958 13.2125 16.2875C13.4042 16.4792 13.5 16.7167 13.5 17C13.5 17.2833 13.4042 17.5208 13.2125 17.7125C13.0208 17.9042 12.7833 18 12.5 18ZM8.5 18C8.21667 18 7.97917 17.9042 7.7875 17.7125C7.59583 17.5208 7.5 17.2833 7.5 17C7.5 16.7167 7.59583 16.4792 7.7875 16.2875C7.97917 16.0958 8.21667 16 8.5 16C8.78333 16 9.02083 16.0958 9.2125 16.2875C9.40417 16.4792 9.5 16.7167 9.5 17C9.5 17.2833 9.40417 17.5208 9.2125 17.7125C9.02083 17.9042 8.78333 18 8.5 18ZM16.5 18C16.2167 18 15.9792 17.9042 15.7875 17.7125C15.5958 17.5208 15.5 17.2833 15.5 17C15.5 16.7167 15.5958 16.4792 15.7875 16.2875C15.9792 16.0958 16.2167 16 16.5 16C16.7833 16 17.0208 16.0958 17.2125 16.2875C17.4042 16.4792 17.5 16.7167 17.5 17C17.5 17.2833 17.4042 17.5208 17.2125 17.7125C17.0208 17.9042 16.7833 18 16.5 18Z"
                                                    fill="#296088" />
                                            </g>
                                        </svg>
                                        <span>This Month</span>
                                    </span>
                                    <span class="d-flex align-items-center cl-badge ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                            viewBox="0 0 25 24" fill="none">
                                            <mask id="mask0_111_889" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="25" height="24">
                                                <rect x="0.5" width="24" height="24" fill="#D9D9D9" />
                                            </mask>
                                            <g mask="url(#mask0_111_889)">
                                                <path
                                                    d="M5.5 22C4.95 22 4.47917 21.8042 4.0875 21.4125C3.69583 21.0208 3.5 20.55 3.5 20V6C3.5 5.45 3.69583 4.97917 4.0875 4.5875C4.47917 4.19583 4.95 4 5.5 4H6.5V2H8.5V4H16.5V2H18.5V4H19.5C20.05 4 20.5208 4.19583 20.9125 4.5875C21.3042 4.97917 21.5 5.45 21.5 6V20C21.5 20.55 21.3042 21.0208 20.9125 21.4125C20.5208 21.8042 20.05 22 19.5 22H5.5ZM5.5 20H19.5V10H5.5V20ZM5.5 8H19.5V6H5.5V8ZM12.5 14C12.2167 14 11.9792 13.9042 11.7875 13.7125C11.5958 13.5208 11.5 13.2833 11.5 13C11.5 12.7167 11.5958 12.4792 11.7875 12.2875C11.9792 12.0958 12.2167 12 12.5 12C12.7833 12 13.0208 12.0958 13.2125 12.2875C13.4042 12.4792 13.5 12.7167 13.5 13C13.5 13.2833 13.4042 13.5208 13.2125 13.7125C13.0208 13.9042 12.7833 14 12.5 14ZM8.5 14C8.21667 14 7.97917 13.9042 7.7875 13.7125C7.59583 13.5208 7.5 13.2833 7.5 13C7.5 12.7167 7.59583 12.4792 7.7875 12.2875C7.97917 12.0958 8.21667 12 8.5 12C8.78333 12 9.02083 12.0958 9.2125 12.2875C9.40417 12.4792 9.5 12.7167 9.5 13C9.5 13.2833 9.40417 13.5208 9.2125 13.7125C9.02083 13.9042 8.78333 14 8.5 14ZM16.5 14C16.2167 14 15.9792 13.9042 15.7875 13.7125C15.5958 13.5208 15.5 13.2833 15.5 13C15.5 12.7167 15.5958 12.4792 15.7875 12.2875C15.9792 12.0958 16.2167 12 16.5 12C16.7833 12 17.0208 12.0958 17.2125 12.2875C17.4042 12.4792 17.5 12.7167 17.5 13C17.5 13.2833 17.4042 13.5208 17.2125 13.7125C17.0208 13.9042 16.7833 14 16.5 14ZM12.5 18C12.2167 18 11.9792 17.9042 11.7875 17.7125C11.5958 17.5208 11.5 17.2833 11.5 17C11.5 16.7167 11.5958 16.4792 11.7875 16.2875C11.9792 16.0958 12.2167 16 12.5 16C12.7833 16 13.0208 16.0958 13.2125 16.2875C13.4042 16.4792 13.5 16.7167 13.5 17C13.5 17.2833 13.4042 17.5208 13.2125 17.7125C13.0208 17.9042 12.7833 18 12.5 18ZM8.5 18C8.21667 18 7.97917 17.9042 7.7875 17.7125C7.59583 17.5208 7.5 17.2833 7.5 17C7.5 16.7167 7.59583 16.4792 7.7875 16.2875C7.97917 16.0958 8.21667 16 8.5 16C8.78333 16 9.02083 16.0958 9.2125 16.2875C9.40417 16.4792 9.5 16.7167 9.5 17C9.5 17.2833 9.40417 17.5208 9.2125 17.7125C9.02083 17.9042 8.78333 18 8.5 18ZM16.5 18C16.2167 18 15.9792 17.9042 15.7875 17.7125C15.5958 17.5208 15.5 17.2833 15.5 17C15.5 16.7167 15.5958 16.4792 15.7875 16.2875C15.9792 16.0958 16.2167 16 16.5 16C16.7833 16 17.0208 16.0958 17.2125 16.2875C17.4042 16.4792 17.5 16.7167 17.5 17C17.5 17.2833 17.4042 17.5208 17.2125 17.7125C17.0208 17.9042 16.7833 18 16.5 18Z"
                                                    fill="#296088" />
                                            </g>
                                        </svg>
                                        <span>Last Month</span>
                                    </span>
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="rfq-icon">
                                <img src="{{ asset('/images/Group.svg') }}" alt="">
                            </div>
                            <div class="mt-4">
                                <h1 class="m-title mb-0">RFQ</h1>
                                <p class="m-p-title">Status</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-between align-items-center rfq-pending">
                                <span>Pending</span>
                                <span>{{ $rfqs->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center rfq-quoted">
                                <span>Quoted</span>
                                <span>{{ $quoteds->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center rfq-failed">
                                <span>Failed</span>
                                <span>{{ $losts->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center rfq-closed">
                                <span>Closed</span>
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pe-0">
            <div class="px-10 mt-4">
                <div class="text-white rounded position-relative me-2 d-flex align-items-center"
                    style="width: 100%; position: relative; z-index: 5;">
                    <i class="fa-solid fa-magnifying-glass fs-3 position-absolute top-50 translate-middle-y ms-4"></i>
                    <input type="text" id="searchQuery" data-kt-table-widget-4="search"
                        class="form-control form-control-solid w-100 fs-7 ps-12" placeholder="RFQ By Country" />
                </div>
            </div>
            <div class="p-3 shadow-none card rfq-status" style="margin-top: -55px;">
                <div class="px-8 mt-14 w-100 rfq-status-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            {{-- <img src="{{ asset('backend/assets/images/rfq/Rectangle_13.svg') }}" alt=""> --}}
                            <h5 class="mb-0 fw-normal ps-3">India</h5>
                        </div>
                        <div>
                            <span>08</span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row">
        <div class="col-8 ps-0">
            <div class="shadow-none card card-flush" style="border-radius: 24px;">
                <div class="p-0 card-body">
                    <div class="d-flex flex-stack justify-content-between align-items-center">
                        <div class="px-10 p-4 d-flex align-items-center me-3 rounded-4">
                            <div class="flex-grow-1">
                                <a href="#allRFQ">
                                    <span class="rfq-e-title">RFQ Filtered Details</span> <br />
                                    <span class="rfq-p-title">Check all RFQ history here</span>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center pe-10">
                            <ul class="gap-3 border-0 nav nav-tabs nav-line-tabs fs-6 rfq-tabs">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 pe-0">
            <div class="shadow-none card card-flush" style="border-radius: 24px;">
                <div class="p-0 card-body">
                    <div class="px-10 p-6 d-flex flex-stack justify-content-between align-items-center">
                        <div class="me-3 rounded-4">
                            <select class="form-select" data-hide-search="true" data-allow-clear="true"
                                data-placeholder="Year">
                                <option></option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="me-3 rounded-4">
                            <select class="form-select" data-control="select2" data-placeholder="Month">
                                <option></option>
                                @foreach ($months as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="me-3 rounded-4">
                            <select class="form-select" data-control="select2" data-placeholder="Week">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div> --}}
                        {{-- <div class="me-3 rounded-4">
                            <div>
                                <button class="form-select form-select-solid">All RFQ</button>
                            </div>
                        </div> --}}
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
                                    url: '{{ route('admin.rfq.destroy', ['rfq' => '__rfq_id__']) }}'.replace('__rfq_id__', rfqId),
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
