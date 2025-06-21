@extends('admin.master')
@section('content')
    <style>
        .label_style {
            width: 151px !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('hr-and-admin.index') }}" class="breadcrumb-item"> HR and Admin</a>
                        <a href="{{ route('admin.job-post.index') }}" class="breadcrumb-item">Job List</a>
                        <a href="" class="breadcrumb-item">Add</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <a href="{{ route('employee-category.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                            <span>Jobs Dashboard</span>
                        </div>
                    </a>
                    <a href="{{ route('employee-category.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1"></i>
                            <span>Jobs List</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content pt-2 offset-1 mx-auto">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-12 col-sm-12 d-flex justify-content-between align-items-center">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('admin.job-post.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                            <p class="text-white p-0 m-0 fw-bold"> Add Job Form </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-0">
                <form id="myform" method="post" action="{{ route('job.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    <div class="row mb-2">
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Company Name</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="company_name"
                                                        class="form-control form-control-sm" maxlength="255" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Job Category</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="category"
                                                        class="form-control form-control-sm" maxlength="255" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Job Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-sm" maxlength="255" required />
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Experience</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="experience"
                                                        class="form-control form-control-sm" maxlength="255" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Number of Vacancies</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="vacancy"
                                                        class="form-control form-control-sm" maxlength="255" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Dead Line</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="date" name="deadline"
                                                        class="form-control form-control-sm" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Link</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="link"
                                                        class="form-control form-control-sm" maxlength="255" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Job Description</span>
                                            <textarea name="description" id="long_desc"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-2 pe-3 pt-2">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
            </div>

            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
