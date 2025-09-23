@extends('admin.master')
@section('title')
    <title>Attendance Sheet({{ date('F', strtotime('this month')) }}) | {{ $user_name }}</title>
@endsection
@section('content')
    <style>
        .page_titles {
            background-color: #307a9d;
            width: 30%;
            border-radius: 20px;
            color: white;
            margin: auto;
        }

        .dt-buttons {
            margin: 5px 0px;
        }

        .buttons-print {
            border-radius: 1px !important;
        }

        .datatable-header {
            width: 100%;
            padding: 0px 10px;
        }
    </style>
    <div class="content-wrapper">
        <div class="d-flex justify-content-between align-items-center shadow-sm">
            <div class="page-header-content d-lg-flex">
                <div class="d-flex px-2">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">HR and Admin</a>
                        <span class="breadcrumb-item active">{{ $user_name }}'s Attendance({{ date('F', strtotime('this month')) }})</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
            <!-- Basic tabs -->
            <div>
                <a href="{{ route('attendance.dashboard') }}" class="btn navigation_btn">
                    <div class="d-flex align-items-center ">
                        <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                        <span>Back To Dashboard</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="my-3 text-center page_titles px-2 py-1 w-lg-50">Attendance of {{ $user_name }}
                        ({{ date('F', strtotime('this month')) }})
                    </h4>
                </div>
            </div>
            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <table class="table attendance table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>Date</th>
                                    <th>Check-In</th>
                                    <th>Check-Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($attendanceData) --}}
                                @foreach ($attendanceData as $attendance)
                                    <tr>
                                        <td>{{ $attendance['user_id'] }}</td>
                                        <td>{{ $attendance['user_name'] }}</td>
                                        <td>{{ $attendance['date'] }}</td>
                                        <td>
                                            @if ($attendance['check_in'] !== 'N/A')
                                                @if (Carbon\Carbon::parse($attendance['check_in']) > Carbon\Carbon::parse('09:06:00'))
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <p class="text-danger mb-0 me-3 p-0">{{ $attendance['check_in'] }}
                                                        </p>
                                                        @if (Carbon\Carbon::parse($attendance['check_in']) > Carbon\Carbon::parse('09:06:00') &&
                                                                Carbon\Carbon::parse($attendance['check_in']) < Carbon\Carbon::parse('10:01:00'))
                                                            <p class="text-danger mb-0 p-0 fw-bold">(L)</p>
                                                        @endif

                                                        @if (Carbon\Carbon::parse($attendance['check_in']) > Carbon\Carbon::parse('10:01:00') &&
                                                                Carbon\Carbon::parse($attendance['check_in']) < Carbon\Carbon::parse('15:00:00'))
                                                            <p class="text-danger mb-0 p-0 fw-bold">Half Day (LL)</p>
                                                        @endif
                                                    </div>
                                                @else
                                                    <p class="mb-0 p-0">{{ $attendance['check_in'] }}</p>
                                                @endif
                                            @else
                                                {{-- Handle 'N/A' case --}}
                                                <p class="text-danger mb-0 p-0 fw-bold">{{ $attendance['absent_note'] }}
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($attendance['check_in'] !== 'N/A')
                                                {{ $attendance['check_out'] }}
                                            @else
                                                <p class="text-danger mb-0 p-0 fw-bold">{{ $attendance['absent_note'] }}
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
            </div>
        </div>
    </div>
    </div>
@endsection


@once
    @push('scripts')
        <script type="text/javascript">
            $('.attendance').DataTable({
                // dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4],
                }],
                buttons: [{
                        extend: 'print',
                        text: '<i class="ph-printer me-2"></i> Print table',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="ph-list"></i>',
                        className: 'btn btn-light btn-icon dropdown-toggle'
                    }
                ]
            });
        </script>
    @endpush
@endonce

