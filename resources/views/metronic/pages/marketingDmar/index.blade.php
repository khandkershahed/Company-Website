<x-admin-app-layout :title="'Marketing DMAR'">
    <div class="px-0 container-fluid">
        <div class="mb-10 row">
            <div class="col-xl-3">
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
            <div class="col-xl-3">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-header w-100 justify-content-center align-items-center">
                        <h6 class="mb-0 fw-normal">Sectorwise Number Of Visit</h6>
                    </div>
                    <div class="pt-0 pb-5 card-body">
                        <div class="mt-3 table-responsive">
                            <table class="table border table-borderd rounded-3">
                                <thead class="bg-light rounded-3">
                                    <tr class="text-black">
                                        <th scope="col" class="py-2 ps-3">Total</th>
                                        <th scope="col" class="py-2 pe-4 text-end">Sector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Bank</td>
                                        <td class="py-2 pe-4 text-end">0</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Government</td>
                                        <td class="py-2 pe-4 text-end">0</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Education</td>
                                        <td class="py-2 pe-4 text-end">0</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="py-2 ps-3">Small & Medium</td>
                                        <td class="py-2 pe-4 text-end">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="shadow-none card card-flush card-rounded">
                <div class="py-10 card-header w-100 justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <h4 class="mb-0" style="font-weight: 500;">Direct Marketing Association Research</h4>

                    </div>
                    <div class="d-flex align-items-center">
                        <div>
                            <input class="form-control form-control-sm" type="date" name="date"
                                id="filterDate">
                        </div>

                        <div class="mx-2">
                            <select class="form-select form-select-sm w-150px" data-control="select2"
                                data-placeholder="Select Month" name="month" data-allow-clear="true"
                                id="filterMonth">
                                <option></option>
                                @foreach ($months as $month)
                                    <option value="{{ $month }}" @selected(old('month', request('month')) == $month)>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select class="form-select form-select-sm w-200px" data-control="select2"
                                data-allow-clear="true" data-placeholder="Select Achievement" name="status"
                                id="filterStatus">
                                <option></option>
                                @foreach (['Ongoing', 'Pending', 'In Progress', 'Prospect', 'Lost', 'Quoted', 'Sale', 'Potential'] as $status)
                                    <option value="{{ $status }}" @selected(request('status') == $status)>
                                        {{ $status }}</option>
                                @endforeach
                            </select>

                            {{-- <option value="Visit">Visit</option>
                                <option value="Call">Call</option>
                                <option value="Social">Social</option>
                                <option value="Email">Email</option>
                                <option value="Lost">Lost</option>
                                <option value="Quote">Quote</option>
                                <option value="Potential">Potential</option>
                                <option value="Sales">Sales</option> --}}
                        </div>
                        <button type="button" id="clearFilters" class="btn btn-sm btn-light-danger ms-3">
                            <i class="fa-solid fa-xmark text-danger fs-3"></i>
                        </button>

                        <a href="{{ route('admin.marketing-target.index') }}"
                            class="text-white btn btn-sm btn-light-primary bg-primary ms-3"
                            style="background-color: #0B6476 !important;">
                            Target <i class="text-white fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-0 card-body">
                    <form id="multiDeleteForm" method="POST" action="{{ route('admin.marketing-dmar.multi-delete') }}">
                        @csrf
                        @method('DELETE')

                        {{-- Action buttons --}}
                        <div class="d-flex justify-content-end mb-3" id="actionButtons" style="display: none;">
                            <a href="#" id="editBtn" class="btn btn-warning btn-sm me-2">✏️ Edit</a>
                            <button type="submit" id="deleteBtn" class="btn btn-danger btn-sm me-2">🗑️
                                Delete</button>
                            <button type="submit" id="multiDeleteBtn" class="btn btn-danger btn-sm">🗑️ Delete
                                Selected</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0 border dataTable" style="min-width: 100%;">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="ps-3 text-center" width="3%">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </th>
                                        <th width="7%">Date</th>
                                        <th width="6%">Month</th>
                                        <th width="7%">Activity</th>
                                        <th width="12%" class="text-center">Company</th>
                                        <th width="8%">Service</th>
                                        <th width="10%">Products</th>
                                        <th width="10%">Tentative</th>
                                        <th width="10%">Comments</th>
                                        <th width="10%">Action on Fail</th>
                                        <th width="10%">Current Status</th>
                                        <th width="8%">Client Type</th>
                                        <th width="8%">Sector</th>
                                        <th width="10%">Sub Sector</th>
                                        <th width="12%" class="text-end pe-5">Area</th>
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
    @endpush


</x-admin-app-layout>
