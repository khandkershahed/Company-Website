@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <span class="breadcrumb-item active">Supply Chain</span>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
                <!-- Basic tabs -->
                <div class="d-lg-block d-sm-none">
                    <a href="{{ route('product-sourcing.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                            <span>Sourcing</span>
                        </div>
                    </a>
                    <a href="{{ route('sas.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                            <span>SAS</span>
                        </div>
                    </a>
                    <a href="{{ route('purchase.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                            <span>Purchase</span>
                        </div>
                    </a>
                    <a href="{{ route('delivery.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-truck-bolt me-1" style="font-size: 10px;"></i>
                            <span>Delivery</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- /page header -->
        <!-- Supply Chain Page -->
        <section>
            <div class="container-fluid">
                <h3 class="text-center pt-3 pb-2">Supply Chain</h3>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row align-items-center">
                            {{-- Sourcing --}}
                            <div class="col-lg-3">
                                <h6 class="m-0 p-0 card-main-title text-center">Sourcing </h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Sourcing</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">1560</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details pb-1 bg-light p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Today</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6">
                                                            <span class="text-secondary">Info</span>
                                                            <p class="p-0 m-0 text-warning">10</p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <span class="text-secondary">Info</span>
                                                            <p class="p-0 m-0 text-warning">15</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Month</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6">
                                                            <span class="text-secondary">Info</span>
                                                            <p class="p-0 m-0 text-warning">10</p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <span class="text-secondary">Info</span>
                                                            <p class="p-0 m-0 text-warning">15</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Purchase --}}
                            <div class="col-lg-3">
                                <h6 class="m-0 p-0 card-main-title text-center">Purchase</h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Purchase</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">1560</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details pb-1 bg-light p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Today</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right-down text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">10</span>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Month</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-success"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">10</span>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Delivery --}}
                            <div class="col-lg-3">
                                <h6 class="m-0 p-0 card-main-title text-center">Delivery</h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Delivery</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">1560</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details pb-1 bg-light p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Today</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-success"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">10</span>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Month</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right-down text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">10</span>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="m-0 p-0 card-main-title text-center">Order</h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Order</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">1560</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details pb-1 bg-light p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Today</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">10</span>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <span class="text-secondary">Info</span> <br>
                                                            <span class="p-0 m-0 text-warning">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 text-center">
                                                    <span>Month</span>
                                                    <span class="p-0 m-0 fw-bold">20</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row text-end">
                                                        <div class="col-lg-6">
                                                            <span class="text-secondary">Info</span>
                                                            <p class="p-0 m-0 text-warning">10</p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <span class="text-secondary">Info</span>
                                                            <p class="p-0 m-0 text-warning">15</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="py-4 d-flex justify-content-center align-items-center"
                                    style="
                                    border: 2px;
                                    border-style: dashed;
                                    border-color: #247297;">
                                    <div>
                                        <a href="{{ route('admin.brand.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Brand</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('category.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Category</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('learnMore.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Learnmore</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('admin.business.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Business</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('product-sourcing.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Sourcing</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('sas.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>SAS</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('purchase.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Purchase</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('delivery.index') }}" class="btn navigation_btn" style="width: 120px;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-plus me-1" style="font-size: 10px;"></i>
                                                <span>Delivery</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- Quick Link Content End --}}
                        </div>
                        <div class="row mt-3">
                            {{-- Sourcing --}}
                            <div class="col-lg-4">
                                <h6 class="m-0 p-0 card-main-title text-center">Price Update </h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Price Update Need</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">330</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details pb-1 bg-light p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <span class="text-secondary">7 Days</span>
                                                        </div>
                                                        <div class="col-lg-3 text-center">
                                                            <p class="p-0 m-0">
                                                                <a href="" class="text-muted">25</a>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <p class="p-0 m-0 text-warning">
                                                                <a href="" class="text-primary">
                                                                    Edit
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <p class="p-0 m-0 text-warning">
                                                                <a href="" class="text-danger">
                                                                    Delete
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <span class="text-secondary">15 Days</span>
                                                        </div>
                                                        <div class="col-lg-3 text-center">
                                                            <p class="p-0 m-0">
                                                                <a href="" class="text-muted">60</a>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <p class="p-0 m-0 text-warning">
                                                                <a href="" class="text-primary">
                                                                    Edit
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <p class="p-0 m-0 text-warning">
                                                                <a href="" class="text-danger">
                                                                    Delete
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 3 --}}
                                        <div class="box_details border-top bg-light pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <span class="text-secondary">30 Days</span>
                                                        </div>
                                                        <div class="col-lg-3 text-center">
                                                            <p class="p-0 m-0">
                                                                <a href="" class="text-muted">135</a>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <p class="p-0 m-0 text-warning">
                                                                <a href="" class="text-primary">
                                                                    Edit
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-3 text-end">
                                                            <p class="p-0 m-0 text-warning">
                                                                <a href="" class="text-danger">
                                                                    Delete
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="m-0 p-0 card-main-title text-center">Drafts</h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Drafts</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="#">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">150</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details border-top bg-light pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <span>Pending Drafts</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-success"></i></p>
                                                </div>
                                                <div class="col-lg-3 text-end">
                                                    <span class="p-0 m-0 text-warning">08</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <span>Approved Drafts</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right-down text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-3 text-end">
                                                    <span class="p-0 m-0 text-warning">25</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 3 --}}
                                        <div class="box_details border-top bg-light pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <span>Rejected Drafts</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-success"></i></p>
                                                </div>
                                                <div class="col-lg-3 text-end">
                                                    <span class="p-0 m-0 text-warning">03</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="m-0 p-0 card-main-title text-center">Others</h6>
                                <div class="card rounded-0">
                                    <div class="card-body"
                                        style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- Title --}}
                                            <div class="flex-fill title_text_link">
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <h6 class="mb-0 text-primary">Total Others</h6>
                                                </a>
                                            </div>
                                            {{-- Value --}}
                                            <div>
                                                <a href="{{ route('product-sourcing.index') }}">
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg bg-secondary dashboard_btn"
                                                        style="width: 30px; height: 30px">
                                                        <span class="mb-0">150</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Content Area --}}
                                        <div class="box_details border-top bg-light pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <span>Pending Drafts</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-3 text-end">
                                                    <span class="p-0 m-0 text-warning">08</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 2 --}}
                                        <div class="box_details border-top pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <span>Approved Drafts</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-3 text-end">
                                                    <span class="p-0 m-0 text-warning">25</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Content 3 --}}
                                        <div class="box_details border-top bg-light pt-1 p-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <span>Rejected Drafts</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-center p-0 m-0"><i
                                                        class="ph ph-arrow-elbow-right text-danger"></i></p>
                                                </div>
                                                <div class="col-lg-3 text-end">
                                                    <span class="p-0 m-0 text-warning">03</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
