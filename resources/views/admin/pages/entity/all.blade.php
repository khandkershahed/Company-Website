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
                        <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item">Hr and Admin</a>
                        <a href="{{ route('admin.employee.index') }}" class="breadcrumb-item">Employees</a>
                        <a href="{{ route('entity.index') }}" class="breadcrumb-item">Entity</a>
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
        <div class="content pt-0 w-75 mx-auto">
            <!-- Highlighting rows and columns -->
            <div class="d-flex justify-content-start align-items-center py-2">
                <a href="" class=" text-success nav-link cat-tab3" data-bs-toggle="modal"
                    data-bs-target="#entityAdd">
                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add Entity">
                        <i class="ph-plus icons_design"></i>
                    </span>
                    <span class="ms-1">Add</span>
                </a>
            </div>
            <div>
                <!-- Title Area End -->
                <table class="table entityDT table-bordered table-hover datatable-highlight text-center ">
                    <thead>
                        <tr>
                            <th width="5%">Id</th>
                            <th width="85%">Name</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($entities)
                            @foreach ($entities as $key => $entity)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td>{{ $entity->name }}</td>
                                    <td>
                                        <a class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#entity_{{ $entity->id }}">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                style="color: #247297 !important;"></i>
                                            {{-- Edit Entity --}}
                                            <div id="entity_{{ $entity->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title text-white">Edit Entity</h6>
                                                            <a type="button" data-bs-dismiss="modal">
                                                                <i class="ph ph-x text-white"
                                                                    style="font-weight: 800;font-size: 10px;"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body p-0 px-2">
                                                            <form action="{{ route('entity.update', $entity->id) }}"
                                                                method="post" class="from-prevent-multiple-submits pt-2">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-lg-12 d-flex pt-1">
                                                                        <label
                                                                            class="col-form-label col-lg-2 p-0 text-start text-black">Name</label>
                                                                        <div class="input-group">
                                                                            <input name="name"
                                                                                value="{{ $entity->name }}" maxlength="50"
                                                                                type="text"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Enter Your Name" required>
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
                                        <a href="{{ route('entity.destroy', $entity->id) }}" class="text-danger delete">
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
        {{-- Add Entity Modal --}}
        <!-- Basic modal -->
        <div id="entityAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-white">Add Entity</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('entity.store') }}" method="post"
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
        {{-- Add Entity Modal End --}}
    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.entityDT').DataTable({
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
