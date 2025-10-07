<x-admin-app-layout :title="'Marketing DMAR'">
    <div class="px-0 container-fluid dmr-box">
        <div class="mb-0 mb-lg-5 row">
            <div class="col-xl-3 ps-lg-0">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="p-0 card-body">
                        <div class="d-flex flex-stack justify-content-center align-items-center h-268px">
                            <div>
                                <img class="img-fluid rounded-circle h-100px w-100px" style="border: 2px solid #296088;"
                                    src="{{ asset('https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)) }}"
                                    alt="">
                            </div>
                            <div class="p-8 me-3 text-start">
                                <h4 class="text-black">{{ Auth::user()->name }}</h4>
                                <p class="mb-0 text-muted">{{ Auth::user()->designation }}</p>
                                <p class="mb-0 text-muted">DMAR | FY {{ date('Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="p-0 card-body">
                        <div class="px-4 d-flex flex-stack justify-content-center align-items-center h-268px">
                            <div class="d-flex align-items-center rounded-3" style="width: 50%;">
                                <div class="me-2">
                                    <img class="img-fluid" width="30px" src="{{ asset('/images/campaign.svg') }}"
                                        alt="">
                                </div>
                                <div class="ps-3">
                                    <a href="">
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 fs-2 fw-bold lh-0">MARKETING
                                            </a> <br />
                                            <p class="mt-2 mb-0">For This Month Only</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="px-4 flex-column d-flex" style="width: 50%;">
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        EMAILED
                                    </span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        CALLED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        VISITIED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        POSTED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div class="p-2 d-flex align-items-center justify-content-between rounded-2"
                                    style="background-color: #296088;">
                                    <span class="text-white"> Total</span>
                                    <span class="px-2 text-white ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="p-0 card-body">
                        <div class="px-4 d-flex flex-stack justify-content-center align-items-center h-268px">
                            <div class="d-flex align-items-center rounded-3" style="width: 50%;">
                                <div class="me-2">
                                    <img class="img-fluid" width="30px" src="{{ asset('/images/Frame.svg') }}"
                                        alt="">
                                </div>
                                <div class="ps-3">
                                    <a href="">
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 fs-2 fw-bold lh-0">SALES
                                            </a> <br />
                                            <p class="mt-2 mb-0">For This Month Only</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="px-4 flex-column d-flex" style="width: 50%;">
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        QUOTED</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        POTENTIAL</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        SOLD</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div
                                    class="p-2 mb-2 d-flex align-items-center justify-content-between bg-light rounded-2">
                                    <span class="text-black ">
                                        LOST</span>
                                    <span class="px-2 text-black ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                                <div class="p-2 d-flex align-items-center justify-content-between rounded-2"
                                    style="background-color: #296088;">
                                    <span class="text-white "> Total</span>
                                    <span class="px-2 text-white ms-3 rounded-2">
                                        0
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 pe-lg-0">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-header w-100 justify-content-center align-items-center">
                        <h6 class="mb-0 fw-normal">Sectorwise Number Of Visit</h6>
                    </div>
                    <div class="pt-0 pb-5 card-body">
                        <div class="mt-3 table-responsive">
                            <table class="table border table-borderd rounded-3">
                                <thead class="bg-light rounded-3">
                                    <tr class="text-black">
                                        <th scope="col" class="py-2 ps-3">Sector</th>
                                        <th scope="col" class="py-2 pe-4 text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sector_values as $sector)
                                        <tr style="border-bottom: 1px solid #EAEAEA;">
                                            <td class="py-2 ps-3">{{ $sector->name }}</td>
                                            <td class="py-2 pe-4 text-end">0</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="shadow-none card card-flush card-rounded">
                <div class="flex-wrap gap-3 py-10 card-header w-100 d-flex justify-content-between align-items-center">
                    <!-- Left: Title -->
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="mb-0 fw-semibold text-truncate">Direct Marketing Association Research</h4>
                    </div>

                    <!-- Right: Filters & Buttons -->
                    <div class="flex-wrap gap-2 filter-bar d-flex align-items-center">
                        <!-- Date Filter -->
                        <div class="filter-item">
                            <input class="form-control form-control-sm" type="date" name="date" id="filterDate">
                        </div>

                        <!-- Month Filter -->
                        <div class="filter-item">
                            <select class="form-select form-select-sm" name="month" id="filterMonth">
                                <option value="">Select Month</option>
                                @foreach ($months as $month)
                                <option value="{{ $month }}" @selected(old('month', request('month'))==$month)>
                                    {{ $month }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div class="filter-item">
                            <select class="form-select form-select-sm" name="status" id="filterStatus">
                                <option value="">Select Achievement</option>
                                @foreach (['Ongoing', 'Pending', 'In Progress', 'Prospect', 'Lost', 'Quoted', 'Sale', 'Potential'] as $status)
                                <option value="{{ $status }}" @selected(request('status')==$status)>
                                    {{ $status }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Clear Filters Button -->
                        <div class="">
                            <button type="button" id="clearFilters" title="Clear Filters"
                                class="btn btn-outline btn-sm d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-xmark text-danger fs-5"></i>
                            </button>
                        </div>

                        <!-- Target Button -->
                        <div class="filter-item">
                            <a href="{{ route('admin.marketing-target.index') }}"
                                class="text-white btn btn-sm bg-primary d-flex align-items-center justify-content-center w-100"
                                style="background-color: #0B6476 !important;">
                                Target <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="pt-3 card-body">
                    <form id="multiDeleteForm" method="POST" action="{{ route('admin.marketing-dmar.multi-delete') }}">
                        @csrf
                        @method('DELETE')

                        {{-- Action buttons --}}
                        <div class="mb-3 d-flex justify-content-end" id="actionButtons" style="display: none;">
                            <a href="#" id="editBtn" class="btn btn-light btn-sm me-2">✏️ Edit</a>
                            <button type="submit" id="deleteBtn" class="btn btn-light-danger btn-sm me-2">
                                <i class="fa fa-solid fa-trash"></i>
                                Delete</button>
                            <button type="submit" id="multiDeleteBtn" class="btn btn-light-danger btn-sm"><i class="fa fa-solid fa-trash"></i> Delete
                                Selected</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0 border dataTable" style="min-width: 100%;">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="text-center ps-3" width="3%">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </th>
                                        <th width="5%">Date</th>
                                        <th width="5%">Month</th>
                                        <th width="5%">Activity</th>
                                        <th width="10%" class="text-center">Company</th>
                                        <th width="5%">Service</th>
                                        <th width="11%">Products</th>
                                        <th width="5%">Tentative</th>
                                        <th width="8%">Comments</th>
                                        <th width="7%">Action on Fail</th>
                                        <th width="7%">Current Status</th>
                                        <th width="7%">Client Type</th>
                                        <th width="5%">Sector</th>
                                        <th width="10%">Sub Sector</th>
                                        <th width="10%" class="text-end pe-10">Area</th>
                                    </tr>
                                </thead>
                                <tbody id="dmarTableBody">
                                    @include('metronic.pages.marketingDmar.partials.dmar_table_rows', [
                                    'dmars' => $dmars,
                                    ])
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            function toggleActionButtons() {
                let checkedBoxes = $('.rowCheckbox:checked');
                let selectedCount = checkedBoxes.length;

                if (selectedCount === 0) {
                    $('#actionButtons').hide();
                } else if (selectedCount === 1) {
                    let id = checkedBoxes.val();
                    $('#editBtn').attr('href', `/admin/marketing-dmar/${id}/edit`);
                    $('#actionButtons').show();
                    $('#editBtn').show();
                    $('#deleteBtn').show();
                    $('#multiDeleteBtn').hide();
                } else {
                    $('#actionButtons').show();
                    $('#editBtn').hide();
                    $('#deleteBtn').hide();
                    $('#multiDeleteBtn').show();
                }
            }

            // On individual checkbox change
            $(document).on('change', '.rowCheckbox', toggleActionButtons);

            // Select all checkboxes
            $('#selectAll').on('change', function() {
                $('.rowCheckbox').prop('checked', this.checked);
                toggleActionButtons();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize select2
            $('#filterMonth, #filterStatus').select2({
                placeholder: 'Select option',
                allowClear: true
            });

            // Disable caching
            $.ajaxSetup({
                cache: false
            });

            function fetchFilteredData() {
                let date = $('#filterDate').val();
                let month = $('#filterMonth').val();
                let status = $('#filterStatus').val();

                $.ajax({
                    url: "{{ route('admin.marketing-dmar.filter') }}",
                    method: 'GET',
                    data: {
                        date: date,
                        month: month,
                        status: status,
                        _t: Date.now() // prevent cache
                    },
                    success: function(response) {
                        $('#dmarTableBody').html(response.html);
                    },
                    error: function() {
                        alert('Error loading data.');
                    }
                });
            }

            // Trigger on filter change
            $('#filterDate, #filterMonth, #filterStatus').on('change', fetchFilteredData);

            // Clear all filters
            $('#clearFilters').on('click', function() {
                $('#filterDate').val('');
                $('#filterMonth').val(null).trigger('change');
                $('#filterStatus').val(null).trigger('change');
                fetchFilteredData();
            });
        });
    </script>
    <!-- <script>
            $('#selectAll').on('change', function() {
                $('#multiDeleteBtn').toggleClass('d-none', !this.checked);
            });
        </script>
        <script>
             $(document).on('change', '.rowCheckbox', function() {
                const anyChecked = $('.rowCheckbox:checked').length > 0;
                $('#multiDeleteBtn').toggleClass('d-none', !anyChecked);
            });
        </script> -->
    @endpush


</x-admin-app-layout>
