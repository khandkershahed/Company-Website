@extends('admin.master')
@section('content')
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
                            <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                            <a href="{{ route('admin.row.index') }}" class="breadcrumb-item">Row Builder</a>
                            <span class="breadcrumb-item active">Add</span>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
        </section>
        <!-- /page header -->
        <!-- product-sourcing Content Start -->
        <section>
            <div class="container mt-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header row p-2 align-items-center bg-info">
                            <div class="col-lg-2 col-1 text-center">
                                <a class="btn btn-sm btn-info btn-rounded rounded-circle btn-icon p-2"
                                    href="{{ route('admin.row.index') }}">
                                    <i class="fa fa-arrow-left text-black"></i>
                                </a>
                            </div>
                            <div class="col-lg-6 col-8 text-center">
                                <h2 class="card-title mb-0 text-center text-white">Row Create</h2>
                            </div>
                            <div class="col-lg-4 col-3 text-right">
                                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-8 border-0">
                                    <li class="nav-item me-2 mb-0">
                                        <a class="nav-link active text-white" data-bs-toggle="tab"
                                            href="#row-with-image">Row
                                            With Image</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" data-bs-toggle="tab" href="#row-with-list">Row
                                            With List</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="row-with-image" role="tabpanel">
                                    <form action="{{ route('admin.row.store') }}" class="needs-validation" method="POST"
                                        novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label mb-0">Badge
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm" name="badge"
                                                    value="{{ old('badge') }}" id="validationCustom01"
                                                    placeholder="Enter Badge">
                                                <div class="invalid-feedback"> Please Enter Badge
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label required mb-0">Row
                                                    Image
                                                </label>
                                                <input type="file"
                                                    class="form-control form-control-solid form-control-sm" name="image"
                                                    id="validationCustom01" placeholder="Enter Row Image" required>
                                                <div class="invalid-feedback"> Please Enter Row
                                                    Image </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label mb-0">Button
                                                    Name
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm" name="btn_name"
                                                    value="{{ old('btn_name') }}" id="validationCustom01"
                                                    placeholder="Enter Button Name">
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom01" class="form-label required mb-0">Title
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm" name="title"
                                                    value="{{ old('title') }}" id="validationCustom01"
                                                    placeholder="Enter Title" required>
                                                <div class="invalid-feedback"> Please Enter Title
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom01" class="form-label mb-0">Link
                                                </label>
                                                <input type="url"
                                                    class="form-control form-control-solid form-control-sm" name="link"
                                                    value="{{ old('link') }}" id="validationCustom01"
                                                    placeholder="Enter Row Link">
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="row">
                                                    <div class="col-md-12 mb-1">
                                                        <label for="validationCustom01"
                                                            class="form-label required ">Description
                                                        </label>
                                                        <textarea class="form-control form-control-sm" name="description" id="long_desc"
                                                            style=" font-size: 12px; font-weight: 500;" rows="2" cols="60">{!! old('description') !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="submit_btn rounded-0 from-prevent-multiple-submits"
                                                        style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="row-with-list" role="tabpanel">
                                    <form action="{{ route('admin.row.store') }}" class="needs-validation" method="POST"
                                        novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom01" class="form-label ">Badge
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm" name="badge"
                                                    value="{{ old('badge') }}" id="validationCustom01"
                                                    placeholder="Enter Badge">
                                                <div class="invalid-feedback"> Please Enter Badge
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom01" class="form-label required ">Title
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm" name="title"
                                                    value="{{ old('title') }}" id="validationCustom01"
                                                    placeholder="Enter Title" required>
                                                <div class="invalid-feedback"> Please Enter Title
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label required ">List Title
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm"
                                                    name="list_title" id="validationCustom01"
                                                    placeholder="Enter Row Link" required
                                                    value="{{ old('list_title') }}">
                                                <div class="invalid-feedback"> Please Enter Button
                                                    Name
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label required ">List One
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm"
                                                    name="list_one" id="validationCustom01" placeholder="Enter Row Link"
                                                    required value="{{ old('list_one') }}">
                                                <div class="invalid-feedback"> Please Enter Button
                                                    Name
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label required ">List Two
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm"
                                                    name="list_two" id="validationCustom01" placeholder="Enter Row Link"
                                                    required value="{{ old('list_two') }}">
                                                <div class="invalid-feedback"> Please Enter Button
                                                    Name
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label required ">List Three
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm"
                                                    name="list_three" id="validationCustom01"
                                                    placeholder="Enter Row Link" required
                                                    value="{{ old('list_three') }}">
                                                <div class="invalid-feedback"> Please Enter Button
                                                    Name
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom01" class="form-label required ">List Four
                                                </label>
                                                <input type="text"
                                                    class="form-control form-control-solid form-control-sm"
                                                    name="list_four" id="validationCustom01" placeholder="Enter Row Link"
                                                    required value="{{ old('list_four') }}">
                                                <div class="invalid-feedback"> Please Enter Button
                                                    Name
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <label for="validationCustom01" class="form-label required ">Description
                                                </label>
                                                <textarea class="form-control" name="short_des" rows="30" id="common"
                                                    style=" font-size: 12px; font-weight: 500;">{!! old('short_des') !!}</textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="submit_btn rounded-0 from-prevent-multiple-submits"
                                                        style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row rounded-0 mt-1">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="py-1 px-4 mt-3 rounded-1" style="background-color: #247297">
                            <div>
                                <h5 class="mb-0 text-white text-center">All Rows</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="row-with-image" role="tabpanel">
                                <form action="{{ route('admin.row.store') }}" class="needs-validation" method="POST"
                                    novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="container px-0">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row py-2">
                                                    <p class="badge badge-info custom-badge" style="margin-top: -15px">
                                                        Row</span>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <label for="validationCustom01"
                                                                    class="form-label mb-0">Badge
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="badge" value="{{ old('badge') }}"
                                                                    id="validationCustom01" placeholder="Enter Badge">
                                                                <div class="invalid-feedback"> Please Enter Badge </div>
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <label for="validationCustom01"
                                                                    class="form-label required mb-0">Title
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="title" value="{{ old('title') }}"
                                                                    id="validationCustom01" placeholder="Enter Title"
                                                                    required>
                                                                <div class="invalid-feedback"> Please Enter Title </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row py-2">
                                                    <p class="badge badge-info custom-badge w-125px"
                                                        style="margin-top: -15px;">Row Image Area</span>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <label for="validationCustom01"
                                                                    class="form-label required mb-0">Row Image
                                                                </label>
                                                                <input type="file"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="image" id="validationCustom01"
                                                                    placeholder="Enter Row Image" required>
                                                                <div class="invalid-feedback"> Please Enter Row Image
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <label for="validationCustom01"
                                                                    class="form-label mb-0">Button Name
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="btn_name" value="{{ old('btn_name') }}"
                                                                    id="validationCustom01"
                                                                    placeholder="Enter Button Name">
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <label for="validationCustom01"
                                                                    class="form-label mb-0">Link
                                                                </label>
                                                                <input type="url"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="link" value="{{ old('link') }}"
                                                                    id="validationCustom01" placeholder="Enter Row Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row py-2">
                                                    <p class="badge badge-info custom-badge w-125px"
                                                        style="margin-top: -15px;">Row Description</span>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">Description
                                                                </label>
                                                                <textarea name="description" class="tox-target kt_docs_tinymce_plugins" rows="3">
                                                                    {{ old('description') }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" id="common_submit"
                                                        class="btn btn-lg common-btn-3 fw-bolder me-4 w-175px mb-5">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="row-with-list" role="tabpanel">
                                <form action="{{ route('admin.row.store') }}" class="needs-validation" method="POST"
                                    novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="container px-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row py-2">
                                                    <p class="badge badge-info custom-badge" style="margin-top: -15px">
                                                        Row</span>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <label for="validationCustom01" class="form-label ">Badge
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="badge" value="{{ old('badge') }}"
                                                                    id="validationCustom01" placeholder="Enter Badge">
                                                                <div class="invalid-feedback"> Please Enter Badge </div>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">Title
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="title" value="{{ old('title') }}"
                                                                    id="validationCustom01" placeholder="Enter Title"
                                                                    required>
                                                                <div class="invalid-feedback"> Please Enter Title </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row py-2">
                                                    <p class="badge badge-info custom-badge w-75px"
                                                        style="margin-top: -15px;">Row List</span>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="4">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">List Title
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="list_title" id="validationCustom01"
                                                                    placeholder="Enter Row Link" required
                                                                    value="{{ old('list_title') }}">
                                                                <div class="invalid-feedback"> Please Enter Button Name
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">List One
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="list_one" id="validationCustom01"
                                                                    placeholder="Enter Row Link" required
                                                                    value="{{ old('list_one') }}">
                                                                <div class="invalid-feedback"> Please Enter Button Name
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">List Two
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="list_two" id="validationCustom01"
                                                                    placeholder="Enter Row Link" required
                                                                    value="{{ old('list_two') }}">
                                                                <div class="invalid-feedback"> Please Enter Button Name
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">List Three
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="list_three" id="validationCustom01"
                                                                    placeholder="Enter Row Link" required
                                                                    value="{{ old('list_three') }}">
                                                                <div class="invalid-feedback"> Please Enter Button Name
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">List Four
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-sm"
                                                                    name="list_four" id="validationCustom01"
                                                                    placeholder="Enter Row Link" required
                                                                    value="{{ old('list_four') }}">
                                                                <div class="invalid-feedback"> Please Enter Button Name
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row py-2">
                                                    <p class="badge badge-info custom-badge w-125px"
                                                        style="margin-top: -15px;">Row Description</span>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-1">
                                                                <label for="validationCustom01"
                                                                    class="form-label required ">Description
                                                                </label>
                                                                <textarea name="description" class="tox-target kt_docs_tinymce_plugins">
                                                                    {{ old('description') }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" id="common_submit"
                                                        class="btn btn-lg common-btn-3 fw-bolder me-4 w-175px mb-5">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <form id="myform1" method="post" action="{{ route('admin.row.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card pb-1">
                                    <!--Banner Section-->
                                    <div class="container">
                                        <div class="row mx-1 mt-2">
                                            <div class="col-lg-12">
                                                <span class="mt-1 fw-bold text-info">Row Image Area</span>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex align-items-center">
                                                            <label class="text-black ">Badge</label>
                                                            <div class="input-group">
                                                                <input name="badge" type="text" maxlength="250"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Enter Badge">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mt-1">
                                                            <label class="text-black me-2">Title</label>
                                                            <div class="input-group">
                                                                <input name="title" type="text"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Enter Image With Row Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-flex align-items-center pt-1">
                                                            <label class="label_style">Row
                                                                Image</label>
                                                            <div class="input-group">
                                                                <input name="image" id="image" accept="image/*"
                                                                    type="file" class="form-control form-control-sm"
                                                                    placeholder="Enter Row Image">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center pt-1">
                                                            <label class="label_style">Row
                                                                Button Name</label>
                                                            <div class="input-group">
                                                                <input name="btn_name" type="text" maxlength="250"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Enter Row Button Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center pt-1">
                                                            <label class="label_style">Row
                                                                Button Link</label>
                                                            <div class="input-group">
                                                                <input name="link" type="url" maxlength="250"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Enter Row Button Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="mt-1 fw-bold text-info">Image Info Area</span>
                                                <div class="px-2 py-2 rounded bg-light">
                                                    <div class="pt-1">
                                                        <label class="w-100">Description</label>
                                                        <textarea class="form-control form-control-sm" name="description" id="long_desc"
                                                            style=" font-size: 12px; font-weight: 500;" rows="2" cols="60"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="my-2 text-end">
                                                    <button type="submit"
                                                        class="submit_btn rounded-0 from-prevent-multiple-submits"
                                                        style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
        </section>
    </div>
@endsection
