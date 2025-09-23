@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">HR Admin</a>
                        <span class="breadcrumb-item">Events </span>
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
        <!-- Highlighting rows and columns -->
        <div class="content pt-0 w-75 mx-auto">
            <div class="d-flex align-items-center py-2">
                <div class="text-success nav-link cat-tab3" style="position: relative; z-index: 999; margin-bottom: -40px;">
                    <a href="" data-bs-toggle="modal" data-bs-target="#eventAdd">
                        <div class="d-flex align-items-center">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Add Event Management">
                                <i class="ph-plus icons_design"></i> </span>
                            <span class="ms-1" style="color: #247297;">Add</span>
                        </div>
                    </a>
                    <div class="text-center" style="margin-left: 300px">
                        <h5 class="ms-1 mb-0 mt-1 text-black">Event Management</h5>
                    </div>
                </div>

            </div>
            <div>
                <table class="table eventDT table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="7%">Sl</th>
                            <th width="45%">Event Title</th>
                            <th width="18%">Start Date</th>
                            <th width="17%">End Date</th>
                            <th width="13%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($events)
                            @foreach ($events as $key => $event)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>

                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->start_date }}</td>
                                    <td>{{ $event->end_date }}</td>
                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#eventEdit{{ $event->id }}">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                        </a>
                                        <a href="{{ route('event.destroy', [$event->id]) }}" class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                        </a>
                                        {{-- Edit event Modal Content --}}
                                        <div id="eventEdit{{ $event->id }}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title text-white">Edit Event Management</h6>
                                                        <a type="button" data-bs-dismiss="modal">
                                                            <i class="ph ph-x text-white"
                                                                style="font-weight: 800;font-size: 10px;"></i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body p-1">
                                                        <div class="container ps-0 pe-0">
                                                            <form method="post"
                                                                action="{{ route('event.update', $event->id) }}"
                                                                enctype="multipart/form-data" id="myform">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="px-2 py-2 m-2 bg-light rounded-0">
                                                                    <div class="row mb-1">
                                                                        <div class="col-sm-4">
                                                                            <label for="">Event Category</label>
                                                                            <select name="event_category" class="form-select w-100 select-wizard"
                                                                                data-minimum-results-for-search="Infinity" data-allow-clear="true"
                                                                                data-placeholder="Select Event Category" required>
                                                                                @foreach ($event_categorys as $event_category)
                                                                                    <option value="{{$event_category->id}}" @selected($event_category->id === $event->event_category)>{{$event_category->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <label for="">Event Title <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="title"
                                                                                class="form-control form-control-sm maxlength"
                                                                                maxlength="100"
                                                                                value="{{ $event->title }}" />
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <label for="start_date">Start Date</label>
                                                                            <input type="date" name="start_date"
                                                                                class="form-control form-control-sm"
                                                                                id="start_date"
                                                                                value="{{ $event->start_date }}" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label for="end_date">End Date</label>
                                                                            <input type="date" name="end_date"
                                                                                class="form-control form-control-sm"
                                                                                id="end_date"
                                                                                value="{{ $event->end_date }}" />
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label for="">Status</label>
                                                                            <select name="status"
                                                                                class="form-select w-100 select-wizard"
                                                                                data-minimum-results-for-search="Infinity"
                                                                                data-placeholder="Select Status" required>
                                                                                <option></option>
                                                                                <option value="active"
                                                                                    @selected($event->status == 'active')>Active
                                                                                </option>
                                                                                <option value="inactive"
                                                                                    @selected($event->status == 'inactive')>In Active
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label for="">Attendees</label>
                                                                            <select name="user_id[]" class="form-control-sm multiselect btn btn-sm"
                                                                            id="select6" multiple="multiple" data-include-select-all-option="true"
                                                                            data-placeholder="Select Attendees" data-enable-filtering="true"
                                                                            data-enable-case-insensitive-filtering="true" required>
                                                                                @php
                                                                                    $employeeIds = isset($event->user_id) ? json_decode($event->user_id, true) : [];
                                                                                @endphp
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{$user->id}}" @selected(is_array($employeeIds) && in_array($user->id, $employeeIds))>{{$user->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label >Department</label>

                                                                            <select name="department[]" class="form-control-sm multiselect btn btn-sm"
                                                                                id="select6" multiple="multiple" data-allow-clear="true"
                                                                                data-include-select-all-option="true" data-placeholder="Chose Sector"
                                                                                data-enable-filtering="true"
                                                                                data-enable-case-insensitive-filtering="true" required>
                                                                                @php
                                                                                    $employeeIds = isset($employee->department) ? json_decode($employee->department, true) : [];
                                                                                @endphp
                                                                                <option value="admin" @selected(is_array($employeeIds) && in_array('admin', $employeeIds))>Admin</option>
                                                                                <option value="business" @selected(is_array($employeeIds) && in_array('business', $employeeIds))>Business</option>
                                                                                <option value="accounts" @selected(is_array($employeeIds) && in_array('accounts', $employeeIds))>Accounts</option>
                                                                                <option value="site" @selected(is_array($employeeIds) && in_array('site', $employeeIds))>Site & Contents</option>
                                                                                <option value="logistics" @selected(is_array($employeeIds) && in_array('logistics', $employeeIds))>Logistics
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <label for="">Event Description</label>
                                                                            <textarea class="form-control form-control-sm" name="description" id="description" rows="2">{{ $event->description }}</textarea>
                                                                        </div>

                                                                    </div>
                                                                    {{--  --}}
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col-sm-12 text-secondary text-end">
                                                                        <button type="submit"
                                                                            class="text-white btn btn-sm" id="submitbtn"
                                                                            style="background-color:#247297 !important; padding: 5px 12px 5px;">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit event Modal End --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- add event Modal Content --}}
        <div id="eventAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-white">Add Event Management </h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-1">
                        <div class="container ps-0 pe-0">
                            <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="px-2 py-2 m-2 bg-light rounded-0">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="">Event Category</label>
                                            <select name="event_category" class="form-select w-100 select-wizard"
                                                data-minimum-results-for-search="Infinity" data-allow-clear="true"
                                                data-placeholder="Select Event Category" required>
                                                @foreach ($event_categorys as $event_category)
                                                <option value="{{$event_category->id}}">{{$event_category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Event Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title"
                                                class="form-control form-control-sm maxlength" maxlength="100" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" name="start_date" class="form-control form-control-sm"
                                                id="start_date" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="end_date">End Date</label>
                                            <input type="date" name="end_date" class="form-control form-control-sm"
                                                id="end_date" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="start_time">Start Time</label>
                                            <input type="time" name="start_time" class="form-control form-control-sm"
                                                id="start_time" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="end_time">End Time</label>
                                            <input type="time" name="end_time" class="form-control form-control-sm"
                                                id="end_time" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Status</label>
                                            <select name="status" class="form-select w-100 select-wizard"
                                                data-minimum-results-for-search="Infinity" data-allow-clear="true"
                                                data-placeholder="Select Status" required>
                                                <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">In Active</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="basicpill-firstname-input">Department</label>
                                            <select name="department[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-placeholder="Chose Sector" data-enable-filtering="true" data-allow-clear="true"
                                                data-enable-case-insensitive-filtering="true" required>

                                                <option value="admin">Admin</option>
                                                <option value="business">Business</option>
                                                <option value="accounts">Accounts</option>
                                                <option value="site">Site & Contents</option>
                                                <option value="logistics">Logistics</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Attendees</label>
                                            <select name="user_id[]" class="form-control-sm multiselect btn btn-sm"
                                            id="select6" multiple="multiple" data-include-select-all-option="true"
                                            data-placeholder="Select Attendees" data-enable-filtering="true"
                                            data-enable-case-insensitive-filtering="true" required>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="">Event Description</label>
                                            <textarea class="form-control form-control-sm" name="description" id="description" rows="2"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-secondary text-end">
                                        <button type="submit" class="text-white btn btn-sm" id="submitbtn"
                                            style="background-color:#247297 !important; padding: 5px 12px 5px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@once
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.select-wizard').select2();
            });
        </script>
        <script type="text/javascript">
            $('.eventDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4],
                }, ],
            });
        </script>
    @endpush
@endonce
