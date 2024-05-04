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
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Knowledge Management</a>
                        <a href="" class="breadcrumb-item">Add</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <a href="#" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-calculator me-1" style="font-size: 12px;"></i>
                            <span>CRM</span>
                        </div>
                    </a>
                    <a href="javascript:void()" class="btn navigation_btn" data-bs-toggle="modal"
                        data-bs-target="#policyAdd">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-plus me-1" style="font-size: 12px;"></i>
                            <span>Add Knowledge</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content pt-2 w-50 mx-auto">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('solutionDetails.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Add Knowledge </p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('solutionDetails.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('purchase.index') }}" class="btn navigation_btn ms-2">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                    <span>Solution</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <form id="myform" method="post" action="{{ route('knowledge.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Type</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="type" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Type" required>
                                                <option></option>
                                                <option value="sales">Sales</option>
                                                <option value="technical">Technical</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Category Name</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="category_id[]" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Category Name"
                                                required>
                                                @foreach ($categories as $id => $categorie)
                                                    <option value="{{ $id }}">{{ $categorie }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Industries Name</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="industry_id[]" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm"
                                                data-placeholder="Chose Industries Name" required>
                                                @foreach ($industries as $id => $industrie)
                                                    <option value="{{ $id }}">{{ $industrie }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Brands Name</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="brand_id[]" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Brands Name"
                                                required>
                                                @foreach ($brands as $id => $brand)
                                                    <option value="{{ $id }}">{{ $brand }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Brochure</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="file" name="brochure" class="form-control form-control-sm"
                                                id="brochure" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 py-2  pe-3">
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
