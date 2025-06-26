@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('supplychain') }}" class="breadcrumb-item">Supply Chain</a>
                        <a href="#" class="breadcrumb-item">Brand Management</a>
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
        <!-- Highlighting rows and columns -->
        <div class="content pt-0">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="d-flex justify-content-between align-items-center py-1 px-4 mt-3 rounded-1" style="background-color: #247297">
                        <div>
                            <h5 class="mb-0 text-white">Brand Management</h5>
                        </div>
                        <div>
                            <a href="" data-bs-toggle="modal" data-bs-target="#brandAdd">
                                <div class="d-flex align-items-center">
                                    <span class="ms-2 icon_btn" style="font-weight: 800;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Brand Management">
                                        <i class="ph-plus text-white"></i> </span>
                                    <span class="ms-1 text-white">Add</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div>
                        <table class="table portfolioDetailDT table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th width="10%">Sl No:</th>
                                    <th width="20%">Brand Image</th>
                                    <th width="35%">Brand Name</th>
                                    <th width="20%">Brand Category</th>
                                    <th width="15%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($brands)
                                    @foreach ($brands as $key => $brand)
                                        <tr>
                                            <td class="text-center">{{ ++$key }}</td>
                                            <td>
                                                <img class="rounded-circle" src="{{ asset('storage/' . $brand->image) }}"
                                                    height="25px" width="25px" alt="">
                                            </td>
                                            <td>{{ $brand->title }}</td>
                                            <td>{{ $brand->category }}</td>
                                            <td>
                                                <a href="" class="text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#brandEdit{{ $brand->id }}">
                                                    <i class="fa-solid fa-pen-to-square me-2 dash-icons text-primary"></i>
                                                </a>
                                                <a href="{{ route('brand.destroy', [$brand->id]) }}" class="text-danger delete">
                                                    <i class="fa-solid fa-trash dash-icons text-danger"></i>
                                                </a>
                                                {{-- Edit brand Modal Content --}}
                                                <div id="brandEdit{{ $brand->id }}" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title text-white">Add Brand Management</h6>
                                                                <a type="button" data-bs-dismiss="modal">
                                                                    <i class="ph ph-x text-white"
                                                                        style="font-weight: 800;font-size: 10px;"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body p-1">
                                                                <div class="container ps-0 pe-0">
                                                                    <form method="post"
                                                                        action="{{ route('brand.update', $brand->id) }}"
                                                                        enctype="multipart/form-data" id="myform">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="px-2 py-2 m-2 bg-light rounded">
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-4">
                                                                                    <span>Brand Name</span>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" name="title"
                                                                                        class="form-control form-control-sm maxlength"
                                                                                        maxlength="100"
                                                                                        value="{{ $brand->title }}" />
                                                                                </div>
                                                                            </div>
                                                                            {{--  --}}
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-4">
                                                                                    <span>Brand Image</span>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <input type="file" name="image"
                                                                                        class="form-control form-control-sm"
                                                                                        id="image" accept="image/*" />
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <img id="showImage" class="rounded-circle"
                                                                                        src="{{ asset('storage/' . $brand->image) }}"
                                                                                        alt="Brand" height="40px"
                                                                                        width="40px">
                                                                                </div>
                                                                            </div>
                                                                            {{--  --}}
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-4">
                                                                                    <span>Brand Category</span>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <select name="category"
                                                                                        class="form-control form-control-sm select"
                                                                                        data-minimum-results-for-search="Infinity"
                                                                                        data-placeholder="Chose category name"
                                                                                        required>
                                                                                        <option value="Top"
                                                                                            {{ $brand->category == 'Top' ? 'selected' : '' }}>
                                                                                            Top
                                                                                        </option>
                                                                                        <option value="Featured"
                                                                                            {{ $brand->category == 'Featured' ? 'selected' : '' }}>
                                                                                            Featured</option>
                                                                                        <option value="Others"
                                                                                            {{ $brand->category == 'Others' ? 'selected' : '' }}>
                                                                                            Others</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-3">
                                                                                    <h6 class="mb-0">Status</h6>
                                                                                </div>
                                                                                <div class="form-group col-sm-9 text-secondary">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="status" value="active"
                                                                                            id="active-status" {{ $brand->status == 'active' ? 'checked' : '' }}>
                                                                                        <label class="form-check-label" for="active-status">
                                                                                            Active
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="status" value="inactive"
                                                                                            id="inactive-status" {{ $brand->status == 'inactive' ? 'checked' : '' }}>
                                                                                        <label class="form-check-label" for="inactive-status">
                                                                                            Inactive
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-sm-12 text-secondary text-end">
                                                                                <button type="submit"
                                                                                    class="text-white btn btn-sm" id="submitbtn"
                                                                                    style="background-color:#247297 !important; padding: 5px 12px 5px;">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Edit brand Modal End --}}
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
        {{-- add brand Modal Content --}}
        <div id="brandAdd" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-white">Add Brand Management </h6>
                        <a type="button" data-bs-dismiss="modal">
                            <i class="ph ph-x text-white" style="font-weight: 800;font-size: 10px;"></i>
                        </a>
                    </div>
                    <div class="modal-body p-1">
                        <div class="container ps-0 pe-0">
                            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="px-2 py-2 m-2 bg-light rounded">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <span>Brand Name </span>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="title"
                                                class="form-control form-control-sm maxlength" maxlength="100" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <span>Brand Image</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="file" name="image" class="form-control form-control-sm"
                                                id="image" accept="image/*" />
                                        </div>
                                        <div class="col-sm-2">
                                            <img class="rounded-circle" id="showImage" height="40px" width="40px"
                                                src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                alt="">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <span>Brand Category</span>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="category" class="form-control form-control-sm select"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Chose category name" required>
                                                <option></option>
                                                <option value="Top">Top</option>
                                                <option value="Featured">Featured</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Status</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="active"
                                                    id="active-status">
                                                <label class="form-check-label" for="active-status">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="inactive"
                                                    id="inactive-status">
                                                <label class="form-check-label" for="inactive-status">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-secondary text-end">
                                        <button type="submit" class="text-white btn btn-sm" id="submitbtn"
                                            style="background-color:#247297 !important; padding: 5px 12px 5px;">Submit</button>
                                    </div>
                                </div>
                            </form>
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
            $(document).ready(function() {
                $('.portfolioDetailDT').DataTable({
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    "iDisplayLength": 10,
                    "lengthMenu": [10, 25, 30, 50],
                    columnDefs: [{
                        orderable: false,
                        targets: [3],
                    }, ],
                });
            });
        </script>
    @endpush
@endonce
