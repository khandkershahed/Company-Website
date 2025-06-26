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
                        <span class="breadcrumb-item active">Success Management</span>
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
                                    <h5 class="mb-0 text-center">Add Success Form</h5>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ route('success.index') }}" type="button"
                                        class="btn btn-sm btn-warning btn-labeled btn-labeled-start float-end">
                                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                                            <i class="icon-eye"></i>
                                        </span>
                                        All Category
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="myform" method="post" action="{{ route('success.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h6 class="mb-0">Title <span class="text-danger">*</span> </h6>
                                            </div>
                                            <div class="form-group col-12 text-secondary">
                                                <input type="text" name="title" class="form-control maxlength"
                                                    maxlength="252" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row mb-1">
                                            <div class="col-lg-12">
                                                <span>Success Image</span>
                                            </div>
                                            <div class="col-10">
                                                <input type="file" name="image" class="form-control form-control-sm"
                                                    id="image" accept="image/*" />
                                            </div>
                                            <div class="col-2">
                                                <img id="showImage" class="rounded-circle"
                                                    src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png" alt="Brand"
                                                    height="40px" width="40px">
                                                <img id="showImage" class="rounded-circle"
                                                    src="{{ asset('storage/' . $brand->image) }}" alt="Brand"
                                                    height="40px" width="40px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h6 class="mb-0">Button Name </h6>
                                            </div>
                                            <div class="form-group col-12 text-secondary">
                                                <input type="text" name="btn_name" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-12">
                                                <h6 class="mb-0">Button Link</h6>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="link" class="form-control maxlength"
                                                    maxlength="255" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h6 class="mb-0">Description <span class="text-danger">*</span></h6>
                                    </div>
                                    <div class="form-group col-12 text-secondary">
                                        <textarea name="description" class="form-control" cols="40" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8 text-secondary">
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
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
