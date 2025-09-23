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

        <div class="content pt-0 w-75 mx-auto">
            <!-- Highlighting rows and columns -->
            <div class="d-flex align-items-center py-2">
                {{-- Add Tax Vat Modal --}}
                <a href="" class=" text-success nav-link cat-tab3" data-bs-toggle="modal"
                    data-bs-target="#permissionAdd" style="position: relative; z-index: 999; margin-bottom: -40px;">
                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add Expense">
                        <i class="ph-plus icons_design"></i>
                    </span>
                    <div class="d-flex justify-content-between">
                        <span class="ms-1">Add</span>
                    </div>
                    <div class="d-flex justify-content-between hide_mobile">
                        <h6 class="mb-0 text-black text-center" style="margin-left: 15rem !important;">All Permission</h6>
                    </div>
                </a>
            </div>
            <div>
                <table class="table permissionDT table-bordered table-hover text-center ">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Permission Name </th>
                            <th>Group Name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $item)

                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ ucfirst($item->group_name) }}</td>

                                <td>

                                    <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                        data-bs-target="#permissionEdit-{{ $item->id }}">
                                        <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                    </a>
                                    <a href="{{ route('delete.permission', $item->id) }}" class="text-danger delete mx-2">
                                        <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                    </a>

                                    {{-- Edit Expense Modal --}}
                                    <div id="permissionEdit-{{ $item->id }}" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header  text-white" style="background-color: #247297">
                                                    <h5 class="modal-title text-white">Edit Role wise Permission
                                                    </h5>
                                                    <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"
                                                            style="font-weight: 800;font-size: 10px;"></i></a>
                                                </div>
                                                <div class="modal-body p-0 px-2">
                                                    <form action="{{route('update.permission')}}" method="post"
                                                        class="from-prevent-multiple-submits pt-2 form-validate-permission-store"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                <label
                                                                    class="col-form-label col-lg-4 p-0 text-start text-black">Permission
                                                                    Name</label>
                                                                <div class="input-group">
                                                                    <input name="name" type="text" class="form-control form-control-sm"
                                                                        placeholder="Enter Permission Name" value="{{$item->name}}"
                                                                        required style="padding: 2px 10px 0px 10px;">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 d-flex align-items-center pt-1">
                                                                <label
                                                                    class="col-form-label col-lg-4 p-0 text-start text-black">Group
                                                                    Name</label>
                                                                <select name="group_name"
                                                                    class="form-control form-select-sm select" data-container-css-class="select-sm"
                                                                    data-minimum-results-for-search="Infinity" data-placeholder="Choose Group" required>
                                                                    <option></option>
                                                                    <option value="product-management"
                                                                        {{ $item->group_name == 'product-management' ? 'selected' : '' }}>
                                                                        Product Management</option>

                                                                    <option
                                                                        value="sourcing-management"{{ $item->group_name == 'sourcing-management' ? 'selected' : '' }}>
                                                                        Sourcing Management</option>

                                                                    <option
                                                                        value="rfq-management"{{ $item->group_name == 'rfq-management' ? 'selected' : '' }}>
                                                                        RFQ Management</option>
                                                                    <option
                                                                        value="sales-management"{{ $item->group_name == 'sales-management' ? 'selected' : '' }}>
                                                                        Sales Management</option>
                                                                    <option
                                                                        value="accounts-management"{{ $item->group_name == 'accounts-management' ? 'selected' : '' }}>
                                                                        Accounts Management</option>
                                                                    <option
                                                                        value="marketing-management"{{ $item->group_name == 'marketing-management' ? 'selected' : '' }}>
                                                                        Marketing Management</option>
                                                                    <option
                                                                        value="industry-solutions"{{ $item->group_name == 'industry-solutions' ? 'selected' : '' }}>
                                                                        Industry Management</option>
                                                                    <option
                                                                        value="feature-management"{{ $item->group_name == 'feature-management' ? 'selected' : '' }}>
                                                                        Feature Management</option>
                                                                    <option
                                                                        value="blog-management"{{ $item->group_name == 'blog-management' ? 'selected' : '' }}>
                                                                        Blog Management</option>
                                                                    <option
                                                                        value="sitesettings-management"{{ $item->group_name == 'sitesettings-management' ? 'selected' : '' }}>
                                                                        Site settings Management</option>
                                                                    <option
                                                                        value="support-management"{{ $item->group_name == 'support-management' ? 'selected' : '' }}>
                                                                        Support Management</option>
                                                                    <option
                                                                        value="account-approval-management"{{ $item->group_name == 'account-approval-management' ? 'selected' : '' }}>
                                                                        Account Management</option>
                                                                    <option
                                                                        value="row-builder-management"{{ $item->group_name == 'row-builder-management' ? 'selected' : '' }}>
                                                                        Row Builder Management</option>
                                                                    <option
                                                                        value="page-builder-management"{{ $item->group_name == 'page-builder-management' ? 'selected' : '' }}>
                                                                        Page Builder Management Management</option>
                                                                    <option
                                                                        value="order-management"{{ $item->group_name == 'order-management' ? 'selected' : '' }}>
                                                                        Order Management</option>
                                                                    <option
                                                                        value="role-permission-management"{{ $item->group_name == 'role-permission-management' ? 'selected' : '' }}>
                                                                        Role Management</option>
                                                                    <option
                                                                        value="job-management"{{ $item->group_name == 'job-management' ? 'selected' : '' }}>
                                                                        Job Management</option>
                                                                    <option
                                                                        value="terms-policy-management"{{ $item->group_name == 'terms-policy-management' ? 'selected' : '' }}>
                                                                        Terms and Policy Management</option>
                                                                    <option
                                                                        value="dashboard"{{ $item->group_name == 'dashboard' ? 'selected' : '' }}>
                                                                        Dashboard</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                            <button type="button" class="submit_close_btn "
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="submit_btn from-prevent-multiple-submits"
                                                                style="padding: 4px 9px;">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Edit Tax Modal End --}}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /highlighting rows and columns -->
        </div>


        {{-- add Tax Modal Content --}}
        <div id="permissionAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header  text-white" style="background-color: #247297">
                        <h5 class="modal-title">Add Permission</h5>
                        <a type="button" data-bs-dismiss="modal"> <i class="ph ph-x text-white"
                                style="font-weight: 800;font-size: 10px;"></i></a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('store.permission') }}" method="post"
                            class="from-prevent-multiple-submits pt-2 form-validate-permission-update" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-4 p-0 text-start text-black">Permission
                                        Name</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Permission Name" required
                                            style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>

                                <div class="col-lg-12 d-flex align-items-center pt-1">
                                    <label class="col-form-label col-lg-4 p-0 text-start text-black">Group Name</label>
                                    <select name="group_name" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Choose Group" required>

                                        <option value="product-management">Product Management</option>
                                        <option value="sourcing-management">Sourcing Management</option>
                                        <option value="rfq-management">RFQ Management</option>
                                        <option value="sales-management">Sales Management</option>
                                        <option value="accounts-management">Accounts Management</option>
                                        <option value="marketing-management">Marketing Management</option>
                                        <option value="industry-solutions">Industry Management</option>
                                        <option value="feature-management">Feature Management</option>
                                        <option value="blog-management">Blog Management</option>
                                        <option value="sitesettings-management">Site settings Management</option>
                                        <option value="support-management">Support Management</option>
                                        <option value="account-approval-management">Account Management</option>
                                        <option value="row-builder-management">Row Builder Management</option>
                                        <option value="page-builder-management">Page Builder Management</option>
                                        <option value="order-management">Order Management</option>
                                        <option value="role-permission-management">Role Management</option>
                                        <option value="job-management">Job Management</option>
                                        <option value="terms-policy-management">Terms and Policy Management</option>
                                        <option value="dashboard">Dashboard</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                <button type="button" class="submit_close_btn " data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 4px 9px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Expense Modal End --}}



    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.permissionDT').DataTable({
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
