@extends('admin.master')
@section('content')
    <style>
        #DataTables_Table_0_wrapper {
            margin-top: -1rem;
        }

        .fc .fc-daygrid-day.fc-day-today {
            background-color: #ae0a4663;
        }

        .fc .fc-button {
            border-radius: 0px;
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

        <div class="content">
            <div class="col-lg-12">
                <h4 class="mb-3 text-center page_titles w-25">Events</h4>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 border-0 shadow-lg p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="p-0 m-0 fw-bold main_color">Event Calendar</h5>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 border-0 shadow-lg p-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <h5 class="p-0 m-0 fw-bold main_color">All Events of this Month</h5>
                                <p class="p-0 m-0">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#eventAdd"
                                        class="btn btn-info text-white px-2 py-1">Add</a>
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-5">
                                    <label for="category_filter">Filter by Category:</label>
                                    <select class="form-control select category_filter" id="category_filter">
                                        <option value="">All</option>
                                        @foreach ($event_categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="table-responsive col-lg-12">
                                    <table class="table datatable-scroll-y data_event mt-2 mb-4 border pt-2 events_table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                                <tr>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ $event->start_date }}</td>
                                                    <td>{{ $event->start_time }}</td>
                                                    <td>{{ $event->eventCategory->name ?? 'No Category' }}</td>
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
        <!-- /content area End-->
        @include('admin.pages.event.partial.modals')
        <!-- Include the following modal HTML structure in your view file -->



    </div>
@endsection

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
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
                                start: '{{ $event->start_date }}T{{ $event->start_time }}',
                                end: '{{ $event->end_date }}T{{ $event->end_time }}',
                                extendedProps: {
                                    event_id: {{ $event->id }},
                                    description: '{{ $event->description }}',
                                    user_id: @json($event->user_id),
                                    department: @json($event->department),
                                    // description: {{ $event->description }},
                                },
                            },
                        @endforeach
                    ],
                    eventClick: function(info) {
                        // Open a modal here with event details
                        var event_id = info.event.extendedProps.event_id;
                        // Use the event_id to fetch event details and open a modal
                        openModal(event_id);
                    },
                    eventClick: function(info) {
                        // Get the event details
                        var event = info.event;

                        // Populate the modal with event data
                        $('#eventTitle').text(event.title);
                        $('#eventDescription').text(event.extendedProps.description);
                        $('#eventStartDate').text(event.start.toLocaleDateString());
                        $('#eventEndDate').text(event.end.toLocaleDateString());
                        $('#eventStartTime').text(event.start.toLocaleTimeString());
                        $('#eventEndTime').text(event.end.toLocaleTimeString());

                        // Show the modal
                        $('#eventModal').modal('show');
                    },

                });
                calendar.render();
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#category_filter').on('change', function() {
                    var categoryId = $(this).val();
                    if (categoryId) {
                        $.ajax({
                            url: "{{ url('admin/filter-events') }}/" + categoryId,
                            type: "GET",
                            dataType: "html", // Change this to 'html' to load HTML content
                            success: function(data) {
                                // $('.events_table').empty();
                                $('.events_table').html(data);
                            },
                            error: function(xhr, status, error) {
                                console.log("An error occurred: " + error);
                            }
                        });
                    }
                });
            });


            // $(document).ready(function() {
            //     $('#category_filter').on('change', function() {
            //         var categoryId = $(this).val();
            //         if (categoryId) {
            //             $.ajax({
            //                 url: "{{ url('admin/filter-events') }}/" + categoryId,
            //                 type: "GET",
            //                 dataType: "json",
            //                 success: function(data) {
            //                     $('#events-table').html(data);
            //                 },

            //             });
            //         }
            //     });
            // });
        </script>
    @endpush
@endonce
