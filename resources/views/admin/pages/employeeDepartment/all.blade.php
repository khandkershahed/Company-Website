@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">Hr and Admin</a>
                        <a href="{{ route('admin.employee.index') }}" class="breadcrumb-item">Employees</a>
                        <a href="{{ route('employee-department.index') }}" class="breadcrumb-item">Employee Department</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <!-- Leave Dashboard link -->
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#employeeDepartmentAdd"
                        class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="ph-plus me-1" style="font-size: 10px;"></i>
                            <span>Add Employee Category</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <div class="text-center">
                <h4 class="m-0" style="color: #247297;">Employee Depertment List</h4>
            </div>
            <div class="row mt-3">
                <div class="col-lg-8 offset-lg-2 mx-auto">
                   <div class="card rounded-0 border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Title Area End -->
                            <table
                                class="table employeeDepartmentDT text-center table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">Id</th>
                                        <th width="85%">Name</th>
                                        <th width="10%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($employeeDepartments)
                                        @foreach ($employeeDepartments as $key => $employeeDepartment)
                                            <tr>
                                                <td class="text-center">{{ ++$key }}</td>
                                                <td>{{ $employeeDepartment->name }}</td>
                                                <td>
                                                    <a class="text-primary" data-bs-toggle="modal"
                                                        data-bs-target="#employeeDepartment_{{ $employeeDepartment->id }}">
                                                        <i class="fa-solid fa-pen-to-square dash-icons"></i>
                                                        {{-- Edit Employee Department --}}
                                                        <div id="employeeDepartment_{{ $employeeDepartment->id }}"
                                                            class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title text-white">Edit Employee
                                                                            Department</h6>
                                                                        <a type="button" data-bs-dismiss="modal">
                                                                            <i class="ph ph-x text-white"
                                                                                style="font-weight: 800;font-size: 10px;"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="modal-body p-0 px-2">
                                                                        <form
                                                                            action="{{ route('employee-department.update', $employeeDepartment->id) }}"
                                                                            method="post"
                                                                            class="from-prevent-multiple-submits pt-2">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="row">
                                                                                <div class="col-lg-12 d-flex pt-1">
                                                                                    <label
                                                                                        class="col-form-label col-lg-2 p-0 text-start text-black">Name</label>
                                                                                    <div class="input-group">
                                                                                        <input name="name"
                                                                                            value="{{ $employeeDepartment->name }}"
                                                                                            maxlength="50" type="text"
                                                                                            class="form-control form-control-sm"
                                                                                            placeholder="Enter Your Name"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                                <button type="button" class="submit_close_btn "
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="submit_btn from-prevent-multiple-submits"
                                                                                    style="padding: 10px;">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Edit Tax Modal End --}}
                                                    </a>
                                                    <a href="{{ route('employee-department.destroy', $employeeDepartment->id) }}"
                                                        class="text-danger delete">
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
        <!-- /content area End-->
        {{-- Add Employee Department Modal --}}
        <!-- Basic modal -->
        <div id="employeeDepartmentAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h6 class="modal-title text-white">Add Employee Department</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 20px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('employee-department.store') }}" method="post"
                            class="from-prevent-multiple-submits pt-2">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 d-flex pt-1">
                                    <label for="">Depertment</label>
                                    <input name="name" maxlength="50" type="text"
                                    class="form-control form-control-sm" placeholder="Enter Your Name" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 5px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic modal -->
        {{-- Add Employee Department Modal End --}}
    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.employeeDepartmentDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [2],
                }, ],
            });
        </script>
    @endpush
@endonce
