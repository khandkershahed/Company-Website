@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('expense-type.index') }}" class="breadcrumb-item">Expence Type</a>
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
                    <div class="d-flex justify-content-between align-items-center py-1 px-4 mt-3 rounded-1"
                        style="background-color: #247297">
                        <div>
                            <h5 class="mb-0 text-white">Expence Category List</h5>
                        </div>
                        <a href="" class=" text-white nav-link cat-tab3" data-bs-toggle="modal"
                            data-bs-target="#expence_type">
                            <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Add Expense">
                                <i class="ph-plus icons_design text-white"></i>
                            </span>
                            <span class="ms-1">Add</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div>
                        <!-- Title Area End -->
                        <table class="table expTypeDT table-bordered table-hover datatable-highlight text-center ">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="15%">Name</th>
                                    <th width="10%">Status</th>
                                    {{-- <th width="30%">Comments</th> --}}
                                    <th width="30%">Notes</th>
                                    <th width="10%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($expenseTypes)
                                    @foreach ($expenseTypes as $key => $expenseType)
                                        <tr>
                                            <td class="text-center">{{ ++$key }}</td>
                                            <td>{{ $expenseType->name }}</td>
                                            <td>{{ $expenseType->status }}</td>
                                            {{-- <td>No Comments</td> --}}
                                            <td class="text-center"><span
                                                    class=" text-success">{{ $expenseType->note }}</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#tax_vat_edit_{{ $expenseType->id }}">
                                                    <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                        style="color: #247297 !important;"></i>
                                                    {{-- Edit Expense Modal --}}
                                                    <div id="tax_vat_edit_{{ $expenseType->id }}" class="modal fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title text-white">Edit Expense Type
                                                                    </h6>
                                                                    <a type="button" data-bs-dismiss="modal">
                                                                        <i class="ph ph-x text-white"
                                                                            style="font-weight: 800;font-size: 10px;"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body p-0 px-2">
                                                                    <form
                                                                        action="{{ route('expense-type.update', $expenseType->id) }}"
                                                                        method="post"
                                                                        class="from-prevent-multiple-submits pt-2">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="col-lg-12 d-flex pt-1">
                                                                                <label
                                                                                    class="col-form-label col-lg-2 p-0 text-start text-black">Expense
                                                                                    Category Name</label>
                                                                                <select name="expense_category_id"
                                                                                    class="form-control form-select-sm select"
                                                                                    data-container-css-class="select-sm"
                                                                                    data-minimum-results-for-search="Infinity"
                                                                                    data-placeholder="Chose status"
                                                                                    required>
                                                                                    <option></option>
                                                                                    @foreach ($expenseCategorys as $expenseCategory)
                                                                                        <option @selected($expenseType->expense_category_id == $expenseCategory->id)
                                                                                            value="{{ $expenseCategory->id }}">
                                                                                            {{ $expenseCategory->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-12 d-flex pt-1">
                                                                                <label
                                                                                    class="col-form-label col-lg-2 p-0 text-start text-black">Name</label>
                                                                                <div class="input-group">
                                                                                    <input name="name"
                                                                                        value="{{ $expenseType->name }}"
                                                                                        maxlength="50" type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Enter Your Name"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 d-flex pt-1">
                                                                                <label
                                                                                    class="col-form-label col-lg-2 p-0 text-start text-black">Status</label>
                                                                                <select name="status"
                                                                                    class="form-control form-select-sm select"
                                                                                    data-container-css-class="select-sm"
                                                                                    data-minimum-results-for-search="Infinity"
                                                                                    data-placeholder="Chose status"
                                                                                    required>
                                                                                    <option></option>
                                                                                    <option @selected($expenseType->status == 'active')
                                                                                        value="active">Active</option>
                                                                                    <option @selected($expenseType->status == 'in_active')
                                                                                        value="in_active">In Active</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-12 d-flex pt-1">
                                                                                <label
                                                                                    class="col-form-label col-lg-2 p-0 text-start text-black">Notes</label>
                                                                                <input name="notes"
                                                                                    value="{{ $expenseType->notes }}"
                                                                                    type="text" maxlength="50"
                                                                                    class="form-control form-control-sm"
                                                                                    placeholder="Enter Your Notes" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                            <button type="button"
                                                                                class="submit_close_btn "
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
                                                <a href="{{ route('expense-type.destroy', $expenseType->id) }}"
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
            </div>
        </div>
        {{-- Add Expense Modal --}}
        <!-- Basic modal -->
        <div id="expence_type" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-1 px-3" style="background-color: #247297">
                        <h5 class="modal-title">Add Expence Type</h5>
                        <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('expense-type.store') }}" method="post"
                            class="from-prevent-multiple-submits pt-2">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-4 p-0 text-start text-black">Expense Category
                                        Name</label>
                                    <select name="expense_category_id" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose status" required>
                                        <option></option>
                                        @foreach ($expenseCategorys as $expenseCategory)
                                            <option value="{{ $expenseCategory->id }}">{{ $expenseCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-4 p-0 text-start text-black">Name</label>
                                    <div class="input-group">
                                        <input name="name" maxlength="50" type="text"
                                            class="form-control form-control-sm" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-4 p-0 text-start text-black">Status</label>
                                    <select name="status" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose status" required>
                                        <option></option>
                                        <option value="active">Active</option>
                                        <option value="in_active">In Active</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-4 p-0 text-start text-black">Notes</label>
                                    <input name="notes" type="text" maxlength="50"
                                        class="form-control form-control-sm" placeholder="Enter Your Notes" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0 py-2 pe-0">
                                <button type="submit" class="submit_btn from-prevent-multiple-submits">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic modal -->
        {{-- Add Expense Modal End --}}

    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.expTypeDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [4],
                }, ],
            });
        </script>
    @endpush
@endonce
