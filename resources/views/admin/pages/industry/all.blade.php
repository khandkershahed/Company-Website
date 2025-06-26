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
                        <span class="breadcrumb-item active">Industry Management</span>
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
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="d-flex align-items-center py-2">
                        {{-- Add Details Start --}}
                        <div class="text-success nav-link cat-tab3"
                            style="position: relative;
                            z-index: 999;
                            margin-bottom: -40px;">
                            <a href="" data-bs-toggle="modal" data-bs-target="#addIndustry">
                                <div class="d-flex align-items-center">
                                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Solution Details">
                                        <i class="ph-plus icons_design"></i> </span>
                                    <span class="ms-1" style="color: #247297;">Add</span>
                                </div>
                            </a>
                            <div class="text-center" style="margin-left: 300px">
                                <h5 class="ms-1" style="color: #247297;">All Industries</h5>
                            </div>
                        </div>
                        {{-- Add Details End --}}
                    </div>
                    <div>
                        <table class="table industryDt table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="10%">Logo</th>
                                    <th width="25%">Parent Industry Name</th>
                                    <th width="50%">Name</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1) --}}
                                @foreach ($industrys as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img class="rounded-circle" src="{{ asset('storage/' . $item->logo) }}" width="25px"
                                                height="25px" alt="">
                                        </td>
                                        <td>{{ App\Models\Admin\Industry::where('id',$item->parent_id)->value('title') }}</td>
                                        <td>{{ $item->title }}</td>

                                        <td>
                                            <a href="" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#editIndusty_{{$item->id}}">
                                                <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-primary"></i>
                                            </a>
                                            <a href="{{ route('industry.destroy', [$item->id]) }}" class="text-danger delete">
                                                <i class="fa-solid fa-trash p-1 rounded-circle text-danger"></i>
                                            </a>
                                            {{-- Edit Success Modal --}}
                                            <div id="editIndusty_{{$item->id}}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title text-white">Edit Industry</h6>
                                                            <a type="button" data-bs-dismiss="modal">
                                                                <i class="ph ph-x text-white"
                                                                    style="font-weight: 800;font-size: 10px;"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body p-0 px-2">
                                                            <form id="myform" action="{{route('industry.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="container">
                                                                    {{--  --}}
                                                                    {{-- <div class="row mt-2 d-flex align-items-center mb-1">
                                                                        <div class="col-sm-4 text-start">
                                                                            <span>Parent Industry</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <select name="parent_id" class="form-control form-select-sm select"
                                                                                data-container-css-class="select-sm" data-placeholder="Choose Parent Industry">
                                                                                @foreach ($industrys as $industrie)
                                                                                    <option class="form-control form-control-sm" @selected($industrie->id == $item->industry_id)
                                                                                    value="{{ $industrie->id }}">
                                                                                        {{ $industrie->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="row mt-2 d-flex align-items-center mb-1">
                                                                        <div class="col-sm-4 text-start">
                                                                            <span>Industry Name</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="title" value="{{ $item->title }}"
                                                                                class="form-control form-control-sm" maxlength="100" required />
                                                                        </div>
                                                                    </div>
                                                                    {{--  --}}
                                                                    <div class="row mt-2 d-flex align-items-center mb-1">
                                                                        <div class="col-sm-4 text-start">
                                                                            <span>Industry Logo</span>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <input type="file" name="logo"
                                                                                class="form-control form-control-sm" id="image" accept="image/*" />
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <img class="rounded-circle" id="showImage" height="25px" width="25px"
                                                                                src="{{ asset('storage/' . $item->logo) }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    {{--  --}}
                                                                    <div class="row mt-2 d-flex align-items-center mb-1">
                                                                        <div class="col-sm-4 text-start">
                                                                            <span>Banner Image </span>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <input type="file" name="image"
                                                                                class="form-control form-control-sm" id="image1" accept="image/*" />
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <img class="rounded-circle" id="showImage1" height="25px" width="25px"
                                                                                src="{{ asset('storage/' . $item->image) }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    {{--  --}}
                                                                    <div class="row mt-2 d-flex align-items-center mb-1">
                                                                        <div class="col-sm-4 text-start">
                                                                            <span>Industry Header</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <textarea class="form-control form-control-sm" name="short_desc" cols="20" rows="3" required>{{ $item->short_desc }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    {{--  --}}
                                                                </div>
                                                                <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                    <button type="submit"
                                                                        class="submit_btn from-prevent-multiple-submits"
                                                                        style="padding: 5px;">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Edit Success Modal End --}}
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Success Modal --}}
        <div id="addIndustry" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-white">Add News Letter</h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-0 px-2">
                        <form id="myform" method="post" action="{{ route('industry.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                {{-- <div class="row mt-2 d-flex align-items-center mb-1">
                                    <div class="col-sm-4 text-start">
                                        <span>Parent Industry</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <select name="parent_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm" data-placeholder="Choose Parent Industry">
                                            <option class="form-control form-control-sm"></option>
                                            @foreach ($industrys as $industrie)
                                                <option class="form-control form-control-sm" value="{{ $industrie->id }}">
                                                    {{ $industrie->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{--  --}}
                                <div class="row mt-2 d-flex align-items-center mb-1">
                                    <div class="col-sm-4">
                                        <span>Industry Name</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="title" class="form-control form-control-sm form-control-sm"
                                            maxlength="100" required />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mt-2 d-flex align-items-center mb-1">
                                    <div class="col-sm-4">
                                        <span>Industry Logo</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="logo" class="form-control form-control-sm" id="image" accept="image/*" />
                                    </div>
                                    <div class="col-sm-2">
                                        <img class="rounded-circle" id="showImage" height="25px" width="25px"
                                            src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png" alt="">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mt-2 d-flex align-items-center mb-1">
                                    <div class="col-sm-4">
                                        <span>Banner Image </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="image" class="form-control form-control-sm" id="image1" accept="image/*" />
                                    </div>
                                    <div class="col-sm-2">
                                        <img class="rounded-circle" id="showImage1" height="25px" width="25px"
                                            src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png" alt="">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mt-2 d-flex align-items-center mb-1">
                                    <div class="col-sm-4">
                                        <span>Industry Header</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control form-control-sm" name="short_desc" cols="20" rows="3" required></textarea>
                                    </div>
                                </div>
                                {{--  --}}
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
        {{-- Add Success Modal End --}}
    </div>
@endsection
@once
    @push('scripts')
        <script type="text/javascript">
            $('.industryDt').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 25, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0,1,2,3,4],
                }, ],
            });
        </script>
    @endpush
@endonce
