<x-admin-app-layout :title="$title">

    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <h4 class="mb-0">{{ $title }}</h4>
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5 printTable">
                <thead>
                    <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase">
                        <th>User Name</th>
                        <th>Date</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($attendances as $attendance)
                        <tr class="text-center">
                            <td>{{ optional($attendance->user)->name }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>
                                @if (optional($attendance)->check_in !== 'N/A')
                                    @php
                                        $checkIn = Carbon\Carbon::parse($attendance->check_in);
                                    @endphp

                                    @if ($checkIn > Carbon\Carbon::parse('09:06:00') && $checkIn < Carbon\Carbon::parse('10:01:00'))
                                        <p class="text-danger mb-0 me-3 p-0">{{ $attendance->check_in }} (L)</p>
                                    @elseif ($checkIn >= Carbon\Carbon::parse('10:01:00') && $checkIn < Carbon\Carbon::parse('15:00:00'))
                                        <p class="text-danger mb-0 me-3 p-0">{{ $attendance->check_in }} Half Day (LL)
                                        </p>
                                    @else
                                        <p class="text-center mb-0 p-0">{{ $attendance->check_in }}</p>
                                    @endif
                                @else
                                    <p class="text-danger mb-0 p-0 fw-bold">{{ optional($attendance)->absent_note }}</p>
                                @endif
                            </td>
                            <td>
                                @if (optional($attendance)->check_in !== 'N/A')
                                    {{ optional($attendance)->check_out }}
                                @else
                                    <p class="text-danger mb-0 p-0 fw-bold">{{ optional($attendance)->absent_note }}</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            class DataTableInitializer {
                constructor(selector) {
                    this.selector = selector;
                    this.init();
                }

                init() {
                    $(this.selector).DataTable({
                        fixedHeader: {
                            header: true,
                            headerOffset: 5
                        },
                        language: {
                            lengthMenu: "Show _MENU_",
                        },
                        dom: "<'row mb-2'" +
                            "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                            "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'Bf>" +
                            ">" +
                            "<'table-responsive'tr>" +
                            "<'row'" +
                            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                            ">",
                        buttons: [{
                                extend: 'copyHtml5',
                                className: 'btn btn-sm btn-light-primary',
                                text: 'Copy',
                                title: @json($title),
                            },
                            {
                                extend: 'excelHtml5',
                                className: 'btn btn-sm btn-light-success',
                                text: 'Excel',
                                title: @json($title),
                            },
                            {
                                extend: 'csvHtml5',
                                className: 'btn btn-sm btn-light-info',
                                text: 'CSV',
                                title: @json($title),
                            },
                            {
                                extend: 'pdfHtml5',
                                className: 'btn btn-sm btn-light-danger',
                                text: 'PDF',
                                title: @json($title),
                                customize: function(doc) {
                                    doc.content[1].table.widths = ['*', '*', '*', '*'];
                                }
                            }
                        ]
                    });
                }
            }

            $(document).ready(function() {
                new DataTableInitializer('.printTable');
            });
        </script>
    @endpush
</x-admin-app-layout>
