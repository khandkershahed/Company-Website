@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('expense-category.index') }}" class="breadcrumb-item">Expence Category</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <a href="javascript:void()" class="btn navigation_btn">
                        <div class="d-flex align-items-center " data-bs-toggle="modal"
                        data-bs-target="#expenceCategoryAdd">
                            <i class="ph-plus me-1" style="font-size: 10px;"></i>
                            <span>Add Expence Category</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <div class="text-center">
                <h4 class="m-0" style="color: #247297;">Expence Category List</h4>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mx-auto">
                    <table class="table expCategoryDT table-bordered table-hover datatable-highlight text-center ">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Name</th>
                                <th width="10%">Status</th>
                                {{-- <th width="30%">Comments</th> --}}
                                <th width="30%">Notes</th>
                                {{-- <th width="20%">custom</th> --}}
                                <th width="10%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($expenseCategories)
                                @foreach ($expenseCategories as $key => $expenseCategorie)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $expenseCategorie->name }}</td>
                                        <td>{{ $expenseCategorie->status }}</td>
                                        {{-- <td>No Comments</td> --}}
                                        <td class="text-center"><span
                                                class=" text-success">{{ $expenseCategorie->notes }}</span>
                                        </td>
                                        {{-- <td>To Day</td> --}}
                                        <td>
                                            <a class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#expenceCategory_{{ $expenseCategorie->id }}">
                                                <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                    style="color: #247297 !important;"></i>
                                                {{-- Edit Expense Modal --}}
                                                <div id="expenceCategory_{{ $expenseCategorie->id }}" class="modal fade"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title text-white">Edit Expense Category</h6>
                                                                <a type="button" data-bs-dismiss="modal">
                                                                    <i class="ph ph-x text-white"
                                                                        style="font-weight: 800;font-size: 10px;"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body p-0 px-2">
                                                                <form
                                                                    action="{{ route('expense-category.update', $expenseCategorie->id) }}"
                                                                    method="post" class="from-prevent-multiple-submits pt-2">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-lg-12 d-flex pt-1">
                                                                            <label
                                                                                class="col-form-label col-lg-2 p-0 text-start text-black">Name</label>
                                                                            <div class="input-group">
                                                                                <input name="name"
                                                                                    value="{{ $expenseCategorie->name }}"
                                                                                    maxlength="50" type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    placeholder="Enter Your Name" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 d-flex pt-1">
                                                                            <label
                                                                                class="col-form-label col-lg-2 p-0 text-start text-black">Status</label>
                                                                            <select name="status"
                                                                                class="form-control form-select-sm select"
                                                                                data-container-css-class="select-sm"
                                                                                data-minimum-results-for-search="Infinity"
                                                                                data-placeholder="Chose status" required>
                                                                                <option></option>
                                                                                <option @selected($expenseCategorie->status == 'active')
                                                                                    value="active">Active</option>
                                                                                <option @selected($expenseCategorie->status == 'in_active')
                                                                                    value="in_active">In Active</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-12 d-flex pt-1">
                                                                            <label
                                                                                class="col-form-label col-lg-2 p-0 text-start text-black">Notes</label>
                                                                            <input name="notes"
                                                                                value="{{ $expenseCategorie->notes }}"
                                                                                type="text" maxlength="50"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Enter Your Notes" required>
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
                                            <a href="{{ route('expense-category.destroy', $expenseCategorie->id) }}"
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
        <!-- /content area End-->
        {{-- Add Expense Modal --}}
        <!-- Basic modal -->
        <div id="expenceCategoryAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-white">Add Expense Category</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('expense-category.store') }}" method="post"
                            class="from-prevent-multiple-submits pt-2">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-2 p-0 text-start text-black">Name</label>
                                    <div class="input-group">
                                        <input name="name" maxlength="50" type="text"
                                            class="form-control form-control-sm" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-2 p-0 text-start text-black">Status</label>
                                    <select name="status" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose status" required>
                                        <option></option>
                                        <option value="active">Active</option>
                                        <option value="in_active">In Active</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 d-flex pt-1">
                                    <label class="col-form-label col-lg-2 p-0 text-start text-black">Notes</label>
                                    <input name="notes" type="text" maxlength="200"
                                        class="form-control form-control-sm" placeholder="Enter Your Notes" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                <button type="button" class="submit_close_btn " data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 5px;">Submit</button>
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
            $('.expCategoryDT').DataTable({
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
