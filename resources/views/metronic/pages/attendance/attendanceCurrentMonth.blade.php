<x-admin-app-layout :title="$title">
    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">...</span>
                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14"
                        placeholder="Search Report" />
                </div>
                <div id="kt_datatable_example_1_export" class="d-none"></div>
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">...</span>
                    Export Report
                </button>
                <div id="kt_datatable_example_1_export_menu"
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="copy">
                            Copy to clipboard
                        </a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="excel">
                            Export as Excel
                        </a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="csv">
                            Export as CSV
                        </a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="pdf">
                            Export as PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                    <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase">
                        <th class="min-w-100px">User Name</th>
                        <th class="min-w-100px">Date</th>
                        <th class="min-w-100px">Check-In</th>
                        <th class="min-w-100px">Check-Out</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($attendances as $attendance)
                        <tr class="text-center">
                            <td>{{ optional($attendance->user)->name }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>
                                @if (optional($attendance)->check_in !== 'N/A')
                                    @if (Carbon\Carbon::parse(optional($attendance)->check_in) > Carbon\Carbon::parse('09:06:00'))
                                        {{-- <div class="d-flex align-items-center justify-content-center"> --}}
                                        <p class="text-danger mb-0 me-3 p-0">{{ optional($attendance)->check_in }}
                                            @if (Carbon\Carbon::parse(optional($attendance)->check_in) > Carbon\Carbon::parse('09:06:00') &&
                                                    Carbon\Carbon::parse(optional($attendance)->check_in) < Carbon\Carbon::parse('10:01:00'))
                                                (L)
                                                {{-- <p class="text-danger mb-0 p-0 fw-bold">(L)</p> --}}
                                            @endif

                                            @if (Carbon\Carbon::parse(optional($attendance)->check_in) > Carbon\Carbon::parse('10:01:00') &&
                                                    Carbon\Carbon::parse(optional($attendance)->check_in) < Carbon\Carbon::parse('15:00:00'))
                                                {{-- <p class="text-danger mb-0 p-0 fw-bold">Half Day (LL)</p> --}}
                                                Half Day (LL)
                                            @endif
                                        </p>
                                        {{-- </div> --}}
                                    @else
                                        <p class="text-center mb-0 p-0">{{ optional($attendance)->check_in }}</p>
                                    @endif
                                @else
                                    {{-- Handle 'N/A' case --}}
                                    <p class="text-danger mb-0 p-0 fw-bold">{{ optional($attendance)->absent_note }}
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if (optional($attendance)->check_in !== 'N/A')
                                    {{ optional($attendance)->check_out }}
                                @else
                                    <p class="text-danger mb-0 p-0 fw-bold">{{ optional($attendance)->absent_note }}
                                    </p>
                                @endif
                            </td>
                            {{-- <td>
                                            @if (Carbon\Carbon::parse($attendance['date'])->dayOfWeek == Carbon\Carbon::FRIDAY)
                                                <span class="text-primary">Friday</span>
                                            @endif
                                        </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script>
            "use strict";

            // Class definition
            var KTDatatablesButtons = function() {
                // Shared variables
                var table;
                var datatable;

                // Private functions
                var initDatatable = function() {
                    // Set date data order
                    const tableRows = table.querySelectorAll('tbody tr');

                    tableRows.forEach(row => {
                        const dateRow = row.querySelectorAll('td');
                        const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT")
                            .format(); // select date from 4th column in table
                        dateRow[3].setAttribute('data-order', realDate);
                    });

                    // Init datatable --- more info on datatables: https://datatables.net/manual/
                    datatable = $(table).DataTable({
                        "info": false,
                        'order': [],
                        'pageLength': 31,
                    });
                }

                // Hook export buttons
                var exportButtons = () => {
                    const documentTitle = @json($title);
                    var buttons = new $.fn.dataTable.Buttons(table, {
                        buttons: [{
                                extend: 'copyHtml5',
                                title: documentTitle
                            },
                            {
                                extend: 'excelHtml5',
                                title: documentTitle
                            },
                            {
                                extend: 'csvHtml5',
                                title: documentTitle
                            },
                            {
                                extend: 'pdfHtml5',
                                title: documentTitle,
                                customize: function(doc) {
                                    doc.content[1].table.widths = ['*', '*', '25%', '25%'];
                                },
                                exportOptions: {
                                    columns: ':visible',
                                }
                            }
                        ]
                    }).container().appendTo($('#kt_datatable_example_1_export'));

                    // Hook dropdown menu click event to datatable export buttons
                    const exportButtons = document.querySelectorAll(
                        '#kt_datatable_example_1_export_menu [data-kt-export]');
                    exportButtons.forEach(exportButton => {
                        exportButton.addEventListener('click', e => {
                            e.preventDefault();

                            // Get clicked export value
                            const exportValue = e.target.getAttribute('data-kt-export');
                            const target = document.querySelector('.dt-buttons .buttons-' +
                                exportValue);

                            // Trigger click event on hidden datatable export buttons
                            target.click();
                        });
                    });
                }

                // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
                var handleSearchDatatable = () => {
                    const filterSearch = document.querySelector('[data-kt-filter="search"]');
                    filterSearch.addEventListener('keyup', function(e) {
                        datatable.search(e.target.value).draw();
                    });
                }

                // Public methods
                return {
                    init: function() {
                        table = document.querySelector('#kt_datatable_example_1');

                        if (!table) {
                            return;
                        }

                        initDatatable();
                        exportButtons();
                        handleSearchDatatable();
                    }
                };
            }();

            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTDatatablesButtons.init();
            });
        </script>
    @endpush
</x-admin-app-layout>
