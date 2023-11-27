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
                        <a href="{{ route('hr-and-admin.index') }}" class="breadcrumb-item">Hr and Admin</a>
                        <a href="{{ route('employee.index') }}" class="breadcrumb-item">Employees</a>
                        <a href="{{ route('employee-category.index') }}" class="breadcrumb-item">Employee Category</a>
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
        <div class="content pt-0 ">
            <!-- Highlighting rows and columns -->
            <div class="d-flex justify-content-start align-items-center py-2">
                <div class="text-success nav-link cat-tab3" style="position: relative;z-index: 999;margin-bottom: -36px;">
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#expenceCategoryAdd" type="button"
                        class="btn btn-sm btn-info custom_btn btn-labeled btn-labeled-start float-start ms-1">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-plus2"></i>
                        </span>
                        Add
                    </a>
                </div>
            </div>
            <div>
                <!-- Title Area End -->
                <table class="table employeeCategoryDT table-bordered table-hover datatable-highlight text-center ">
                    <thead>
                        <tr>
                            <th width="5%">Id</th>
                            <th width="37%">Name</th>
                            <th width="16%">Evaluation Period</th>
                            <th width="16%">Yearly Casual Leave</th>
                            <th width="16%">Yearly Medical Leave</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($employeeCategories)
                            @foreach ($employeeCategories as $key => $employeeCategorie)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td>{{ $employeeCategorie->name }}</td>
                                    <td>{{ $employeeCategorie->yearly_earned_leave }}</td>
                                    <td>{{ $employeeCategorie->yearly_casual_leave }}</td>
                                    <td>{{ $employeeCategorie->yearly_medical_leave }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#employeeCategory_{{ $employeeCategorie->id }}">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                style="color: #247297 !important;"></i>
                                            {{-- Edit Employee Category Modal --}}
                                            <div id="employeeCategory_{{ $employeeCategorie->id }}" class="modal fade"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title text-white">Edit Employee Category</h6>
                                                            <a type="button" data-bs-dismiss="modal">
                                                                <i class="ph ph-x text-white"
                                                                    style="font-weight: 800;font-size: 10px;"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body p-0 px-2">
                                                            <form
                                                                action="{{ route('employee-category.update', $employeeCategorie->id) }}"
                                                                method="post" class=" pt-2">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row text-start">
                                                                    <div class="col-lg-3  pt-1">
                                                                        <div class="mb-1">
                                                                            <label
                                                                                class="p-0 text-start text-black">Name</label>
                                                                            <input name="name"
                                                                                value="{{ $employeeCategorie->name }}"
                                                                                type="text"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Enter Your Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3  pt-1">
                                                                        <div class="mb-1">
                                                                            <label for="monthly_earned_leave-edit"
                                                                                class="p-0 text-start text-black">Monthly
                                                                                Earned
                                                                                Leave</label>
                                                                            <input name="monthly_earned_leave"
                                                                                value="{{ $employeeCategorie->monthly_earned_leave }}"
                                                                                type="text"
                                                                                class="allow_decimal form-control form-control-sm"
                                                                                placeholder="e.g:yearly policy leave/12" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3  pt-1">
                                                                        <div class="mb-1">
                                                                            <label for="monthly_casual_leave-edit"
                                                                                class="p-0 text-start text-black">Monthly
                                                                                Casual
                                                                                Leave</label>
                                                                            <input name="monthly_casual_leave"
                                                                                value="{{ $employeeCategorie->monthly_casual_leave }}"
                                                                                type="text"
                                                                                class="allow_decimal form-control form-control-sm"
                                                                                placeholder="e.g:yearly policy leave/12" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3  pt-1">
                                                                        <div class="mb-1">
                                                                            <label for="monthly_medical_leave-edit"
                                                                                class="p-0 text-start text-black">Monthly
                                                                                Medical
                                                                                Le.</label>
                                                                            <input name="monthly_medical_leave"
                                                                                value="{{ $employeeCategorie->monthly_medical_leave }}"
                                                                                type="text"
                                                                                class="allow_decimal form-control form-control-sm"
                                                                                placeholder="e.g:yearly policy leave/12" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 pt-1">
                                                                        <div class="mb-1">
                                                                            <label for="monthly_medical_leave-add" class="p-0 text-black">Evaluation Period <span class="text-danger">*</span></label>
                                                                            <input id="monthly_medical_leave-add" name="evaluation_period" type="text"
                                                                                value="{{ $employeeCategorie->evaluation_period }}"
                                                                                maxlength="10" class="allow_decimal form-control form-control-sm "
                                                                                placeholder="Evaluation Period in days.." required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                    <button type="button" class="submit_close_btn "
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="submit_btn "
                                                                        style="padding: 10px;">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Edit Tax Modal End --}}
                                        </a>
                                        <a href="{{ route('employee-category.destroy', $employeeCategorie->id) }}"
                                            class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-white"
                                                style="color: #247297 !important;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /content area End-->
        {{-- Add Employee Modal --}}
        <!-- Basic modal -->
        <div id="expenceCategoryAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header rounded-0">
                        <h6 class="modal-title text-white">Add Employee Category</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('employee-category.store') }}" method="post" class=" pt-2">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 pt-1">
                                    <div class="mb-1">
                                        <label class="p-0 text-black">Name <span class="text-danger">*</span></label>
                                        <input name="name" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 pt-1">
                                    <div class="mb-1">
                                        <label for="monthly_earned_leave-add" class="p-0 text-black">Monthly Earned
                                            Leave</label>
                                        <input id="monthly_earned_leave-add" name="monthly_earned_leave" type="text"
                                            maxlength="10" class="allow_decimal form-control form-control-sm "
                                            placeholder="e.g:yearly policy leave/12" >
                                    </div>
                                </div>
                                <div class="col-lg-3 pt-1">
                                    <div class="mb-1">
                                        <label for="monthly_casual_leave-add" class="p-0 text-black">Monthly Casual
                                            Leave</label>
                                        <input id="monthly_casual_leave-add" name="monthly_casual_leave" type="text"
                                            maxlength="10" class="allow_decimal form-control form-control-sm "
                                            placeholder="e.g:yearly policy leave/12" >
                                    </div>
                                </div>
                                <div class="col-lg-3 pt-1">
                                    <div class="mb-1">
                                        <label for="monthly_medical_leave-add" class="p-0 text-black">Monthly
                                            Medical
                                            Le. <span class="text-danger">*</span></label>
                                        <input id="monthly_medical_leave-add" name="monthly_medical_leave" type="text"
                                            maxlength="10" class="allow_decimal form-control form-control-sm "
                                            placeholder="e.g:yearly policy leave/12" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 pt-1">
                                    <div class="mb-1">
                                        <label for="monthly_medical_leave-add" class="p-0 text-black">Evaluation Period <span class="text-danger">*</span></label>
                                        <input id="monthly_medical_leave-add" name="evaluation_period" type="text"
                                            maxlength="10" class="allow_decimal form-control form-control-sm "
                                            placeholder="Evaluation Period in days.." required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                <button type="button" class="submit_close_btn " data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="submit_btn " style="padding: 5px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic modal -->
        {{-- Add Employee Modal End --}}
    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.employeeCategoryDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [5],
                }, ],
            });
        </script>
    @endpush
@endonce
