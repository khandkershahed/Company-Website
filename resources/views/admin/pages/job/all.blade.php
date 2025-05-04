@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow d-flex justify-content-between align-items-center">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('hr-and-admin.index') }}" class="breadcrumb-item"> HR and Admin</a>
                        <span class="breadcrumb-item active">Job Management</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-plus ph-sm m-1"></i>
                    </a>
                </div>
            </div>
            <div class="px-3">
                <a href="{{ route('hr-and-admin.index') }}" class="btn navigation_btn">
                    <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add Solution Details">
                        <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                        <span>HR & Admin</span>
                    </div>
                </a>
                <a href="{{ route('job.create') }}" class="btn navigation_btn">
                    <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add Solution Details">
                        <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                        <span>Add</span>
                    </div>
                </a>
            </div>
        </div>
        <!-- /page header -->
        <div class="content">
            <h4 class="text-center main_color"
                style="    width: 250px;
            margin: auto;
            background: white;
            position: relative;
            z-index: 5;">
                Company Job Details</h4>
            <p class="devider_line"></p>
            <div class="row pt-3">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card rounded-2">
                                <div class="card-header  p-1 py-2"
                                    style="background-color: #ae0a46; border-top-right-radius: 8px; border-top-left-radius: 8px;">
                                    <h6 class="m-0 p-0 text-center text-white">Total Job Post</h6>
                                </div>
                                <div class="card-body py-4 px-4" style="background: #eeeeee73;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <img class="img-fluid" width="50px" height="50px"
                                                src="https://i.ibb.co/DkcfYsz/Asset-8-5x-8.png" alt="">
                                            <h6 class="m-0">Total Job Posting</h6>
                                        </div>
                                        <div>
                                            <div class="">
                                                <h1 class="m-0 job-countr-title">156</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card rounded-2">
                                <div class="card-header  p-1 py-2"
                                    style="background-color: #ae0a46; border-top-right-radius: 8px; border-top-left-radius: 8px;">
                                    <h6 class="m-0 p-0 text-center text-white">Jobs Details</h6>
                                </div>
                                <div class="card-body" style="background: #eeeeee73;">
                                    <div class="d-flex justify-content-between align-items-center ps-3">
                                        <div>
                                            <div class="text-center">
                                                <p class="p-0 m-0" style="line-height: 1.3;">Registered Candidate</p>
                                                <h1 class="m-0 pt-1 job-countr">60</h1>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-center">
                                                <p class="p-0 m-0" style="line-height: 1.3;">Posted Designation</p>
                                                <h1 class="m-0 pt-1 job-countr">05</h1>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-center">
                                                <p class="p-0 m-0" style="line-height: 1.3;">Others Jobs</p>
                                                <h1 class="m-0 pt-1 job-countr">20</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card rounded-2">
                                <div class="card-header  p-1 py-2"
                                    style="background-color: #ae0a46; border-top-right-radius: 8px; border-top-left-radius: 8px;">
                                    <h6 class="m-0 p-0 text-center text-white">Total Available Jobs</h6>
                                </div>
                                <div class="card-body py-4 px-4" style="background: #eeeeee73;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <img class="img-fluid" width="50px" height="50px"
                                                src="https://i.ibb.co/DkcfYsz/Asset-8-5x-8.png" alt="">
                                            <h6 class="m-0">Available Jobs</h6>
                                        </div>
                                        <div>
                                            <div class="">
                                                <h1 class="m-0 job-countr-title">156</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="card rounded-0 border-0">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="datatable table jobDT table-striped table-bordered table-hover text-center">
                                    <thead
                                        style="background-color: #ae0a46 !important;color: white;">
                                        <tr>
                                            <th width="5%">Id</th>
                                            <th width="25%">Name</th>
                                            <th width="15%">Deadline</th>
                                            <th width="20%">Post Link</th>
                                            <th width="20%">Category</th>
                                            <th width="15%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($jobs)
                                            @foreach ($jobs as $key => $jobs)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $jobs->name }}</td>
                                                    <td>{{ $jobs->deadline }}</td>
                                                    <td>
                                                        <a href="{{ $jobs->link }}">
                                                            <i
                                                                class="fa-solid fa-arrow-up-right-from-square main_color"></i>
                                                        </a>
                                                    </td>
                                                    <td>{{ $jobs->category }}</td>
                                                    {{-- <td>{{ $jobs->experience }}</td> --}}
                                                    <td>
                                                        <a href="{{ route('job.edit', [$jobs->id]) }}"
                                                            class="text-primary">
                                                            <i class="fa-solid fa-pen-to-square dash-icons me-3"></i>
                                                        </a>
                                                        <a href="{{ route('job.destroy', [$jobs->id]) }}"
                                                            class="main_color delete">
                                                            <i class="fa-solid fa-trash dash-icons"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
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
            $(document).ready(function() {
                $('.jobDT').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 10,
                    "lengthMenu": [10, 25, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [5],
                    }, ],
                });
            });
        </script>
    @endpush
@endonce
