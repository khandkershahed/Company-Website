@extends('admin.master')
@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-light shadow">


            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.site-setting.index') }}" class="breadcrumb-item">Site Settings</a>
                        <span class="breadcrumb-item active">Role Management</span>
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


        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="d-flex justify-content-between align-items-center py-2">
                        {{-- Add Tax Vat Modal --}}
                        <a href="" class=" text-success nav-link cat-tab3" data-bs-toggle="modal"
                            data-bs-target="#permissionAdd" style="position: relative; z-index: 999; margin-bottom: -40px;">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Add Expense">
                                <i class="ph-plus icons_design"></i>
                                <span class="ms-1">Add</span>
                            </span>
                        </a>
                        <h6 class="mb-0 text-black text-center" style="margin-left: 15rem !important;">All Roles</h6>
                    </div>
                    <div>
                        <table class="table rolesDT table-bordered table-hover text-center ">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Roles Name </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $item)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>{{ $item->name }}</td>

                                        <td>
                                            <a href="{{ route('edit.roles', $item->id) }}" class="text-primary">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <a href="{{ route('delete.roles', $item->id) }}" class="text-danger delete mx-2">
                                                <i class="delete icon-trash"></i>
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
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card p-0 py-1 mt-1">
                    <div class="card-body p-0 px-2">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="text-center p-0 py-1">All Roles</h5>
                            </div>

                            <div class="col-lg-4">
                                <a href="{{ route('add.roles') }}" type="button"
                                    class="btn btn-sm btn-success btn-labeled btn-labeled-start float-end">
                                    <span class="btn-labeled-icon bg-black bg-opacity-20">
                                        <i class="icon-plus2"></i>
                                    </span>
                                    Add Role
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Roles Name </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td>{{ $item->name }}</td>

                                            <td>
                                                <a href="{{ route('edit.roles', $item->id) }}" class="text-primary">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <a href="{{ route('delete.roles', $item->id) }}"
                                                    class="text-danger delete mx-2">
                                                    <i class="delete icon-trash"></i>
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
        </div>

    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.rolesDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3],
                }, ],
            });

            Initialize
            const validator = $('.form-validate-permission-store, .form-validate-permission-update').validate({
                ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                rules: {
                    percentage: {
                        number: true
                    },
                },
            });
        </script>
    @endpush
@endonce
