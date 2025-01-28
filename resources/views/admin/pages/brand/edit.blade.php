@extends('admin.master')
@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Brand Management</span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="mb-0 float-start">Brand Edit Form</h5>
                            <a href="{{ route('admin.brand.index') }}" type="button"
                                class="btn btn-sm btn-success btn-labeled btn-labeled-start float-end">
                                <span class="btn-labeled-icon bg-black bg-opacity-20">
                                    <i class="icon-eye"></i>
                                </span>
                                All Brand
                            </a>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('admin.brand.update', $brand->id) }}"
                                enctype="multipart/form-data" id="myform">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Brand Name</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="title" class="form-control maxlength" maxlength="100"
                                            value="{{ old('title',$brand->title) }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Brand Image </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- <img class="mb-3" src="{{ asset('upload/Brand/'.$brand->image) }}" width="100px" alt=""> --}}
                                        <input type="file" name="image" class="form-control" id="image"
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
                                            src="{{ asset('storage/requestImg/' . $brand->image) }}" alt="Brand"
                                            height="87px" width="157px">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Brand Category</h6>
                                    </div>
                                    <div class="form-group text-secondary col-sm-3">
                                        <select name="category" class="form-control select"
                                            data-minimum-results-for-search="Infinity" required>
                                            <option value="Top" {{ old('category',$brand->category) == 'Top' ? 'selected' : '' }}>Top
                                            </option>
                                            <option value="Featured" {{ old('category',$brand->category) == 'Featured' ? 'selected' : '' }}>
                                                Featured</option>
                                            <option value="Others" {{ old('category',$brand->category) == 'Others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submitbtn"
                                            class="btn btn-primary from-prevent-multiple-submits">Update<i
                                                class="ph-paper-plane-tilt ms-2"></i></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
