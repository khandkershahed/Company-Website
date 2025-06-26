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
                        <span class="breadcrumb-item active">Product Section Management</span>
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
        <div class="content">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2 class="mb-0 text-center">All Product Sections</h2>
                                </div>
                                <div class="col-lg-4">
                                    <a data-bs-toggle="modal" data-bs-target="#add-section" type="button"
                                        class="btn btn-sm btn-success btn-labeled btn-labeled-start float-end">
                                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                                            <i class="icon-plus2"></i>
                                        </span>
                                        Add New
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="sectionDT table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th width="15%">Sl No:</th>
                                            <th width="25%">Product Section Image</th>
                                            <th width="35%">Product Section Name</th>
                                            <th width="15%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($sections)
                                            @foreach ($sections as $key => $section)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td class="text-center"><img
                                                            src="{{ asset('storage/' . $section->image) }}" height="30px"
                                                            width="100px" alt=""></td>
                                                    <td>{{ $section->title }}</td>
                                                    <td class="text-center">
                                                        <a data-bs-toggle="modal" data-bs-target="#edit-section-{{$section->id}}" class="text-primary">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('product-section.destroy', [$section->id]) }}"
                                                            class="text-danger delete mx-2">
                                                            <i class="delete icon-trash"></i>
                                                        </a>

                                                        <!---Edit modal--->
                                                            <div id="edit-section-{{$section->id}}" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Product Sections</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"></button>
                                                                        </div>

                                                                        <div class="modal-body border br-7">


                                                                                <div class="card-body m-auto" style="width: 100%;">

                                                                                    <form id="myform" method="post" action="{{ route('product-section.update',$section->id) }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-sm-3">
                                                                                                <h6 class="mb-0">Product Section Name</h6>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-9 text-secondary">
                                                                                                <input type="text" name="title" class="form-control maxlength" maxlength="100" value="{{$section->title}}"/>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mb-3">
                                                                                            <div class="col-sm-3">
                                                                                                <h6 class="mb-0">Product Section Image </h6>
                                                                                            </div>
                                                                                            <div class="col-sm-9 text-secondary">
                                                                                                <input type="file" name="image" class="form-control" id="image" value="{{$section->image}}"
                                                                                                    accept="image/*" />
                                                                                                <div class="form-text">Accepts only png, jpg, jpeg images</div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mb-3">
                                                                                            <div class="col-sm-3">
                                                                                                <h6 class="mb-0"> </h6>
                                                                                            </div>
                                                                                            <div class="col-sm-9 text-secondary">
                                                                                                <img id="showImage" class="img-thumbnail"
                                                                                                    src="{{ asset('storage/' . $section->image) }}" alt="Section"
                                                                                                    height="87px" width="157px">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <div class="col-sm-3"></div>
                                                                                            <div class="col-sm-9 text-secondary">
                                                                                                {{-- <input type="submit" class="btn btn-primary px-4 mt-5" value="Submit" /> --}}

                                                                                                <button type="submit" class="btn btn-primary" id="submitbtn">Submit<i
                                                                                                        class="ph-paper-plane-tilt ms-2"></i></button>
                                                                                            </div>
                                                                                        </div>


                                                                                    </form>

                                                                                </div>


                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!---Edit modal--->

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
        <!-- /content area -->

        <!---Add modal--->
        <div id="add-section" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product Sections</h5>
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body border br-7">


                            <div class="card-body m-auto" style="width: 100%;">

                                <form id="myform" method="post" action="{{ route('product-section.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Product Section Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="title" class="form-control maxlength" maxlength="100" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Product Section Image </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="image" class="form-control" id="image" accept="image/*" />
                                            <div class="form-text">Accepts only png, jpg, jpeg images</div>
                                            <img class="img-thumbnail" id="showImage" height="80px" width="80px"  src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png" alt="">
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Product Section Status</h6>
                                        </div>
                                        <div class="form-group text-secondary col-sm-3">
                                            <select name="status" class="form-control select"
                                                data-minimum-results-for-search="Infinity" data-placeholder="Chose Status" required>
                                                <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div> --}}


                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <input type="submit" class="btn btn-primary px-4 mt-5" value="Submit" /> --}}

                                            <button type="submit" class="btn btn-primary" id="submitbtn">Submit<i
                                                    class="ph-paper-plane-tilt ms-2"></i></button>
                                        </div>
                                    </div>


                                </form>

                            </div>


                    </div>


                </div>
            </div>
        </div>
        <!---Add modal--->



        <!-- /inner content -->

    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $('.sectionDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0,1,2,3],
                }, ],
            });
        </script>
    @endpush
@endonce
