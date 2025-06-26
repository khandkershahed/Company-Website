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
                        <span class="breadcrumb-item active">Category Management</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <div class="card">
                <div class="card-header">

                    <h5 class="mb-0 float-start">Category Edit Form</h5>
                    <a href="{{ route('category.index') }}" type="button"
                        class="btn btn-sm btn-success btn-labeled btn-labeled-start float-end">
                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                            <i class="icon-eye"></i>
                        </span>
                        All Category
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Category Name</h6>
                            </div>
                            <div class="form-group col-sm-9 text-secondary">
                                <input type="text" name="title" class="form-control maxlength" maxlength="100"
                                    value="{{ $category->title }}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Category Image </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="file" name="image" class="form-control" id="image" accept="image/*"
                                    required />
                                <div class="form-text">Accepts only png, jpg, jpeg images</div>
                                <img src="{{ asset('storage/' . $category->image) }}" height="80"
                                    alt="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Category Status</h6>
                            </div>
                            <div class="form-group col-sm-9 text-secondary">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active"
                                        id="flexRadioDefault1" {{ $category->status == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="inactive"
                                        id="flexRadioDefault2" {{ $category->status == 'inactive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4 mt-5" value="Submit" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
