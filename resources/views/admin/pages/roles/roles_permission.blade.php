@extends('admin.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <style>
        .accordion {
            --accordion-border-width: 0px !important;
        }

        .section-border {
            border-bottom: 0.5px solid #24739763;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.site-setting.index') }}" class="breadcrumb-item"><span
                                    class="breadcrumb-item active">Site
                                    Settings</span></a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
                {{-- class=" nav-link active cat-tab1 p-1" --}}
                <!-- Basic tabs -->
                <div class="d-flex justify-content-between align-items-center p-0">
                    <ul class="nav nav-tabs border-0">
                        <li class="nav-item me-1">
                            <a href="#permission"
                                class=" nav-link btn navigation_btn {{ $class == 'permission' ? 'active' : '' }} cat-tab1 p-1"
                                data-bs-toggle="tab">
                                <p class="m-0 p-1">
                                    Permission</p>
                            </a>
                        </li>

                        <li class="nav-item me-1">
                            <a href="#roles"
                                class="nav-link btn {{ $class == 'roles' ? 'active' : '' }} navigation_btn cat-tab2 p-1 "
                                data-bs-toggle="tab">
                                <p class="m-0 p-1">
                                    Roles</p>
                            </a>
                        </li>
                        <li class="nav-item me-1">
                            <a href="#rolesinpermission"
                                class="nav-link btn {{ $class == 'rolesinpermission' ? 'active' : '' }} navigation_btn cat-tab3 p-1"
                                data-bs-toggle="tab">
                                <p class="m-0 p-1">
                                    Roles in Permission</p>
                            </a>
                        </li>
                        <li class="nav-item me-1">
                            <a href="#" class="nav-link btn navigation_btn cat-tab3 p-1" data-bs-toggle="tab">
                                <p class="m-0 p-1">
                                    Site Setting</p>
                            </a>
                        </li>

                    </ul>
                </div>

        </section>
        <!-- /page header -->

        <!-- Sales Chain Page -->
        <div class="content">
            <div class="row mt-2">
                <div class="col-lg-8 offset-lg-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show {{ $class == 'permission' ? 'active' : '' }}" id="permission">
                            <div class="d-flex justify-content-between align-items-center py-2 main_bg rounded-1">
                                {{-- Add Tax Vat Modal --}}
                                <a href="" class="text-success nav-link cat-tab3" data-bs-toggle="modal"
                                    data-bs-target="#permissionAdd">
                                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Expense">
                                        <i class="ph-plus icons_design text-white"></i>
                                        <span class="ms-1 text-white">Add</span>
                                    </span>
                                </a>
                                <div>
                                    <h6 class="mb-0 text-white text-center pe-2" style="margin-left: 15rem !important;">All
                                        Permission</h6>
                                </div>
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

                                                    <a href="javascript:void(0);" class="text-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#permissionEdit-{{ $item->id }}">
                                                        <i
                                                            class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                                    </a>
                                                    <a href="{{ route('delete.permission', $item->id) }}"
                                                        class="text-danger delete mx-2">
                                                        <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                                    </a>

                                                    {{-- Edit Expense Modal --}}
                                                    <div id="permissionEdit-{{ $item->id }}" class="modal fade"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header  text-white"
                                                                    style="background-color: #247297">
                                                                    <h5 class="modal-title text-white">Edit Role
                                                                        wise Permission
                                                                    </h5>
                                                                    <a type="button" data-bs-dismiss="modal"> <i
                                                                            class="ph ph-x text-white"
                                                                            style="font-weight: 800;font-size: 10px;"></i></a>
                                                                </div>
                                                                <div class="modal-body p-0 px-2">
                                                                    <form action="{{ route('update.permission') }}"
                                                                        method="post"
                                                                        class="from-prevent-multiple-submits pt-2 form-validate-permission-store"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->id }}">
                                                                        <div class="row mt-2">
                                                                            <div
                                                                                class="col-lg-12 d-flex align-items-center pt-1">
                                                                                <label
                                                                                    class="col-form-label col-lg-4 p-0 text-start text-black">Permission
                                                                                    Name</label>
                                                                                <div class="input-group">
                                                                                    <input name="name" type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="Enter Permission Name"
                                                                                        value="{{ $item->name }}"
                                                                                        required
                                                                                        style="padding: 2px 10px 0px 10px;">
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-lg-12 d-flex align-items-center pt-1">
                                                                                <label
                                                                                    class="col-form-label col-lg-4 p-0 text-start text-black">Group
                                                                                    Name</label>
                                                                                <select name="group_name"
                                                                                    class="form-control form-select-sm select"
                                                                                    data-container-css-class="select-sm"
                                                                                    data-minimum-results-for-search="Infinity"
                                                                                    data-placeholder="Choose Group"
                                                                                    required>
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
                                                                                        Marketing Management
                                                                                    </option>
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
                                                                                        Site settings Management
                                                                                    </option>
                                                                                    <option
                                                                                        value="support-management"{{ $item->group_name == 'support-management' ? 'selected' : '' }}>
                                                                                        Support Management</option>
                                                                                    <option
                                                                                        value="account-approval-management"{{ $item->group_name == 'account-approval-management' ? 'selected' : '' }}>
                                                                                        Account Management</option>
                                                                                    <option
                                                                                        value="row-builder-management"{{ $item->group_name == 'row-builder-management' ? 'selected' : '' }}>
                                                                                        Row Builder Management
                                                                                    </option>
                                                                                    <option
                                                                                        value="page-builder-management"{{ $item->group_name == 'page-builder-management' ? 'selected' : '' }}>
                                                                                        Page Builder Management
                                                                                        Management</option>
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
                                                                                        Terms and Policy Management
                                                                                    </option>
                                                                                    <option
                                                                                        value="dashboard"{{ $item->group_name == 'dashboard' ? 'selected' : '' }}>
                                                                                        Dashboard</option>
                                                                                </select>
                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                            <button type="button"
                                                                                class="submit_close_btn "
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
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show {{ $class == 'roles' ? 'active' : '' }}" id="roles">
                            <div class="d-flex justify-content-between align-items-center py-2 main_bg rounded-1">
                                {{-- Add Tax Vat Modal --}}
                                <a href="" class="text-success nav-link cat-tab3" data-bs-toggle="modal"
                                    data-bs-target="#rolesAdd">
                                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Expense">
                                        <i class="ph-plus icons_design text-white"></i>
                                        <span class="ms-1 text-white">Add</span>
                                    </span>
                                </a>
                                <div>
                                    <h6 class="mb-0 text-white text-center pe-2" style="margin-left: 15rem !important;">
                                        All Roles</h6>
                                </div>
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
                                        @if ($roles)
                                            @foreach ($roles as $key => $item)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td>{{ $item->name }}</td>

                                                    <td>
                                                        <a href="{{ route('edit.roles', $item->id) }}"
                                                            class="text-primary">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('delete.roles', $item->id) }}"
                                                            class="text-danger delete mx-2">
                                                            <i class="delete icon-trash"></i>
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
                    <div class="tab-content">
                        <div class="tab-pane fade show {{ $class == 'rolesinpermission' ? 'active' : '' }}"
                            id="rolesinpermission">
                            <div class="d-flex justify-content-between align-items-center py-2 main_bg rounded-1">
                                {{-- Add Tax Vat Modal --}}
                                <a href="" class="text-success nav-link cat-tab3" data-bs-toggle="modal"
                                    data-bs-target="#rolesinpermissionAdd">
                                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Expense">
                                        <i class="ph-plus icons_design text-white"></i>
                                        <span class="ms-1 text-white">Add</span>
                                    </span>
                                </a>
                                <div>
                                    <h6 class="mb-0 text-white text-center pe-2" style="margin-left: 15rem !important;">
                                        Roles In
                                        Permission</h6>
                                </div>
                            </div>
                            <div>
                                <table class="table rolesPermissionDT table-bordered table-hover text-center ">
                                    <thead>
                                        <tr>
                                            <th width="15%">Sl</th>
                                            <th width="25%">Roles Name </th>
                                            <th width="45%">Permissions </th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key => $item)
                                            <tr>
                                                <td> {{ $key + 1 }} </td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @foreach ($item->permissions as $perm)
                                                        <span class="badge bg-danger m-1"> {{ $perm->name }}</span>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.edit.roles', $item->id) }}"
                                                        class="text-primary">
                                                        <i class="icon-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('admin.delete.roles', $item->id) }}"
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
        <!-- Sales Chain Page -->
    </div>
    @include('admin.pages.roles.permission_partial.modal')
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
        <script type="text/javascript">
            $('.rolesDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2],
                }, ],
            });
        </script>
        <script type="text/javascript">
            $('.rolesPermissionDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3],
                }, ],
            });
        </script>

        {{-- <script>
            $(document).ready(function() {
                $(".cat-tab1").click(function() {
                    $("#cat-tab2").addClass('d-none');
                    $("#cat-tab3").addClass('d-none');
                    $("#cat-tab1").removeClass('d-none');
                    $(".saved_title").removeClass('d-none');
                    $(".completed_title").addClass('d-none');
                    $(".approved_title").addClass('d-none');
                });
                $(".cat-tab2").click(function() {
                    $("#cat-tab1").addClass('d-none');
                    $("#cat-tab3").addClass('d-none');
                    $("#cat-tab2").removeClass('d-none');
                    $(".approved_title").addClass('d-none');
                    $(".saved_title").addClass('d-none');
                    $(".completed_title").removeClass('d-none');
                });
                $(".cat-tab3").click(function() {
                    $("#cat-tab1").addClass('d-none');
                    $("#cat-tab2").addClass('d-none');
                    $("#cat-tab3").removeClass('d-none');
                    $(".saved_title").addClass('d-none');
                    $(".completed_title").addClass('d-none');
                    $(".approved_title").removeClass('d-none');
                });

            });
        </script> --}}
    @endpush
@endonce
