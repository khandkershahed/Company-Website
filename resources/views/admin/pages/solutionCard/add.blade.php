@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item"> Site Content</a>
                        <a href="{{ route('solutionCard.index') }}" class="breadcrumb-item">Solution Card Management</a>
                        <a href="" class="breadcrumb-item">Add</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1 "></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content pt-5 w-50 mx-auto">
            <div class="text-start">
                <div class="d-flex align-items-center justify-content-start main_bg py-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('solutionCard.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 13rem;">
                        <p class="text-white p-0 m-0 fw-bold"> Add Solution Card Details </p>
                    </div>
                </div>
            </div>
            <form id="myform" method="post" action="{{ route('solutionCard.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row p-2">
                            <span class="mt-1 fw-bold text-info">Solution Card Section</span>
                            <div class="col-lg-12">
                                <label class="label_style">Card Title</label>
                                <div class="input-group">
                                    <input name="title" maxlength="255" type="text"
                                        class="form-control form-control-sm" placeholder="Enter Solution Card Title"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="label_style">Solution Card Image</label>
                                <div class="row">
                                    <div class="col-lg-11">
                                        <input name="image" id="image" accept="image/*" type="file"
                                            class="form-control form-control-sm" placeholder="Enter Solution Card Image">
                                    </div>
                                    <div class="col-lg-1">
                                        <img class="img-fluid rounded-circle" id="showImage"
                                            src="https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg"
                                            alt="" style="width: 30px; height: 30px; ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="label_style">Short
                                    Description</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="short_des" rows="4" placeholder="Enter Solution Short Description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-2">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
