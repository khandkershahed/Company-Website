@extends('admin.master')
@section('content')
    <style>
        #DataTables_Table_0_wrapper {
            margin-top: -1rem;
        }
    </style>
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">HR Admin</a>
                        <span class="breadcrumb-item active">Leave Dashboard</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('event.store') }}" class="btn btn-primary">Create Event</a>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <!-- /content area End-->

    </div>
@endsection

@once
    @push('scripts')
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($events as $event)
                        {
                            title: '{{ $event->title }}',
                            start: '{{ $event->start_date }}',
                            end: '{{ $event->end_date }}',
                            url: '{{ route('event.update', $event->id) }}',
                        },
                    @endforeach
                ],
                eventClick: function (info) {
                    window.location.href = info.event.url;
                },
            });
            calendar.render();
        });
    </script>



    @endpush
@endonce
