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
                        <a href="{{ route('data.index') }}" class="breadcrumb-item">Data</a>
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
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#dataAdd" type="button"
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
                <table class="table dataDT table-bordered table-hover datatable-highlight text-center ">
                    <thead>
                        <tr>
                            <th width="5%">Id</th>
                            <th width="45%">Name</th>
                            <th width="40%">Value</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($datas)
                            @foreach ($datas as $key => $data)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->value }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#data_{{ $data->id }}">
                                            <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                style="color: #247297 !important;"></i>
                                            {{-- Edit Data Modal --}}
                                            <div id="data_{{ $data->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title text-white">Edit Data</h6>
                                                            <a type="button" data-bs-dismiss="modal">
                                                                <i class="ph ph-x text-white"
                                                                    style="font-weight: 800;font-size: 10px;"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body p-0 px-2">
                                                            <form action="{{ route('data.update', $data->id) }}"
                                                                method="post" class=" pt-2">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row text-start">
                                                                    <div class="col-lg-3  pt-1">
                                                                        <div class="mb-1">
                                                                            <label
                                                                                class="p-0 text-start text-black">Name</label>
                                                                            <input name="name"
                                                                                value="{{ $data->name }}" type="text"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Enter Your Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3  pt-1">
                                                                        <div class="mb-1">
                                                                            <label for="value"
                                                                                class="p-0 text-black">Value </label>
                                                                            <input id="value" name="value"
                                                                                type="number" maxlength="10"
                                                                                value="{{ $data->value }}"
                                                                                class="form-control form-control-sm "
                                                                                placeholder="Enter Your " required>
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
                                            {{-- Edit Data Modal End --}}
                                        </a>
                                        <a href="{{ route('data.destroy', $data->id) }}" class="text-danger delete">
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
        {{-- Add Data Modal --}}
        <!-- Basic modal -->
        <div id="dataAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header rounded-0">
                        <h6 class="modal-title text-white">Add Data</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form action="{{ route('data.store') }}" method="post" class=" pt-2">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 pt-1">
                                    <div class="mb-1">
                                        <label class="p-0 text-black">Name</label>
                                        <input name="name" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-3  pt-1">
                                    <div class="mb-1">
                                        <label for="value" class="p-0 text-black">Value </label>
                                        <input id="value" name="value" type="number" maxlength="10"
                                            class="form-control form-control-sm " placeholder="Enter Your Value" required>
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
        {{-- Add Data Modal End --}}
    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.dataDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [3],
                }, ],
            });
        </script>
    @endpush
@endonce
