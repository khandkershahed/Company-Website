@extends('admin.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <style>
        .accordion {
            --accordion-border-width: 0px !important;
        }

        .section-border {
            border-bottom: 0.5px solid #acdaf063;
        }

        .card_title {
            text-align: left !important;
        }

        .target {
            display: none;
        }

        .Hide {
            display: none;
        }

        .quick_link {
            width: 150px;
        }
    </style>
    <div class="content-wrapper">
        <div class="content p-0">
            <!-- Page header -->
            <section class="shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- Page Destination/ BreadCrumb --}}
                    <div class="page-header-content d-lg-flex ">
                        <div class="d-flex px-2">
                            <div class="breadcrumb py-2">
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                <a href="" class="breadcrumb-item"><span
                                        class="breadcrumb-item active">Business</span></a>
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
                    <div>
                        <a href="{{ route('rfq-manage.index') }}" class="btn navigation_btn" style="margin-right: 2px">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-truck-field pe-1" style="font-size: 12px;"></i>
                                <span>RFQ Management</span>
                            </div>
                        </a>
                        <a href="{{ route('deal.create') }}" class="btn navigation_btn" style="margin-right: 2px">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-truck-field pe-1" style="font-size: 12px;"></i>
                                <span>Deal Create</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.sales-dashboard.index') }}" class="btn navigation_btn" style="margin-right: 2px">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-business-time pe-1" style="font-size: 12px;"></i>
                                <span> Sales</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.marketing-dashboard.index') }}" class="btn navigation_btn"
                            style="margin-right: 2px">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-calculator pe-1" style="font-size: 12px;"></i>
                                <span>Marketing</span>
                            </div>
                        </a>
                        <a href="{{ route('show-case-video.index') }}" class="btn navigation_btn" style="margin-right: 2px">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-user-tie pe-1" style="font-size: 12px;"></i>
                                <span>Showcase</span>
                            </div>
                        </a>
                    </div>
            </section>
            <!-- /page header -->
            <div class="container-fluid my-2">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <h3 class="text-center w-50 mx-auto" style="color: #247297;">
                                    Business Dashboard</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="">
                                    <h6 class="m-0 p-1 text-center"
                                        style="color: #fff; border-bottom: 1px solid #247297;background: #247297;"> Sales
                                    </h6>
                                    <div class="card rounded-0">
                                        <div class="card-body rounded-0">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <a href="http://127.0.0.1:8000/admin/expense">
                                                            <h6 class="mb-0 text-black">Total Sales</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="http://127.0.0.1:8000/admin/expense"
                                                                class="text-muted">
                                                                5,000TK</span></a>
                                                            <i class="ph-trend-down me-2 text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn rounded-circle p-3 text-white shadow-lg
                                                                bg-secondary dashboard_btn chart_btn"
                                                                style="width: 30px; height: 30px; font-size: 14px;">
                                                                <span class="mb-0">18%</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3" data-bs-toggle="modal" data-bs-target="#chart1"
                                                style="cursor: pointer;">
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <a href="">
                                                                    <p class="m-0 ps-2 text-info">Current Month <span
                                                                            class="text-black">(Jan)</span></p>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            QTY
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Target</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Achiev</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-end text-info small-font-size m-0 pe-2 p-1">
                                                                            Ration</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Solution --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Sales Solution</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            20</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            15^</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1 d-flex align-items-center">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>
                                                                            <span>18%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Web --}}
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Sales Web</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            20</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            15^</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1 d-flex align-items-center">
                                                                            <i
                                                                                class="ph ph-arrow-up pe-1 text-succsess"></i>
                                                                            <span>23%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Training --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Sales Training</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            20</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            15^</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1 d-flex align-items-center">
                                                                            <i
                                                                                class="ph ph-arrow-up pe-1 text-succsess"></i>
                                                                            <span>18%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="">
                                    <h6 class="m-0 p-1 text-center"
                                        style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">
                                        Marketing</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body rounded-0">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <a href="http://127.0.0.1:8000/admin/expense">
                                                            <h6 class="mb-0 text-black">Total Marketing</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="http://127.0.0.1:8000/admin/expense"
                                                                class="text-muted">
                                                                <span>24%</span>
                                                            </a>
                                                            <i class="ph-trend-down me-2 text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn rounded-circle p-3 text-white shadow-lg
                                                                bg-secondary dashboard_btn chart_btn"
                                                                style="width: 30px; height: 30px; font-size: 14px;">
                                                                <span class="mb-0">58%</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3" data-bs-toggle="modal" data-bs-target="#chart1"
                                                style="cursor: pointer;">
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2 text-info">Current Month <span
                                                                        class="text-black">(Jan)</span></p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Target</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Achiev</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-info small-font-size m-0 pe-2 p-1">
                                                                            Ration</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Solution --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">DMAR</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-danger small-font-size m-0 p-1">
                                                                            (-4.9%)</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>100%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Web --}}
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">CMAR</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            (+16.2%)</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-up pe-1 text-succsess"></i>125%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Training --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">EMAR</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            (+16.2%)</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-up pe-1 text-succsess"></i>165%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="">
                                    <h6 class="m-0 p-1 text-center"
                                        style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Client
                                        RFQ</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body rounded-0">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <a href="http://127.0.0.1:8000/admin/expense">
                                                            <h6 class="mb-0 text-black">Total RFQ</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="http://127.0.0.1:8000/admin/expense"
                                                                class="text-muted">
                                                                58%</span></a>
                                                            <i class="ph-trend-up me-2 text-success"></i>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn rounded-circle p-3 text-white shadow-lg
                                                                bg-secondary dashboard_btn chart_btn"
                                                                style="width: 30px; height: 30px; font-size: 14px;">
                                                                <span class="mb-0">88%</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3" data-bs-toggle="modal" data-bs-target="#chart1"
                                                style="cursor: pointer;">
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2 text-info">Current Month <span
                                                                        class="text-black">(Jan)</span></p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Pending</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Done</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-info small-font-size m-0 p-1">
                                                                            Win/Lose</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Solution --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Total RFQ</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            3</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-up pe-1 text-succsess"></i>100%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Web --}}
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Total Deals</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            1</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>125%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Training --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Close By</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            4</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>165%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8 col-offset-2 mx-auto my-4 d-lg-none ">
                                <div
                                    style="border: 2px;
                                border-style: dashed;
                                border-color: #247297;
                                padding: 25px;">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="" class="btn navigation_btn quick_link me-3">Dashboard</a>
                                        <a href="" class="btn navigation_btn quick_link me-3">Supply Chain</a>
                                        <a href="" class="btn navigation_btn quick_link me-3">Expence</a>
                                        <a href="" class="btn navigation_btn quick_link me-3">Dashboard</a>
                                        <a href="" class="btn navigation_btn quick_link me-3">Client Support</a>
                                        <a href="" class="btn navigation_btn quick_link me-3">Supply Chain</a>
                                        <a href="" class="btn navigation_btn quick_link">Expence</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="">
                                    <h6 class="m-0 p-1 text-center"
                                        style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Product
                                        Showcase
                                    </h6>
                                    <div class="card rounded-0">
                                        <div class="card-body rounded-0">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <a href="http://127.0.0.1:8000/admin/expense">
                                                            <h6 class="mb-0 text-black">Total Show</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="http://127.0.0.1:8000/admin/expense"
                                                                class="text-muted">
                                                                20%</span></a>
                                                            <i class="ph-trend-up me-2 text-success"></i>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn rounded-circle p-3 text-white shadow-lg
                                                                bg-secondary dashboard_btn chart_btn"
                                                                style="width: 30px; height: 30px; font-size: 14px;">
                                                                <span class="mb-0" style="font-size: 10px">2200
                                                                    PCS</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3" data-bs-toggle="modal" data-bs-target="#chart1"
                                                style="cursor: pointer;">
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2 text-info">Details<span
                                                                        class="text-black">(Jan)</span></p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Approved</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-info small-font-size m-0 p-1">
                                                                            Rejected</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-info small-font-size m-0 p-1">
                                                                            Ratio
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Solution --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Knowledge</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            3</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-up pe-1 text-succsess"></i>100%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Web --}}
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Present</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            1</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>125%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Training --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Brochure</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            4</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>165%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Training --}}
                                                <div class="">
                                                    <div class="box_details bg-light">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2">Features</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            5</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-center text-secondary small-font-size m-0 p-1">
                                                                            4</p>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p
                                                                            class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                            <i
                                                                                class="ph ph-arrow-down pe-1 text-danger"></i>165%
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="">
                                    <h6 class="m-0 p-1 text-center"
                                        style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Traning
                                        &
                                        Certificate</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body rounded-0">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <a href="http://127.0.0.1:8000/admin/expense">
                                                            <h6 class="mb-0 text-black">Total</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="http://127.0.0.1:8000/admin/expense"
                                                                class="text-muted">
                                                                30%</span></a>
                                                            <i class="ph-trend-up me-2 text-success"></i>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn rounded-circle p-3 text-white shadow-lg
                                                                bg-secondary dashboard_btn chart_btn"
                                                                style="width: 30px; height: 30px; font-size: 14px;">
                                                                <span class="mb-0" style="font-size: 10px"><i
                                                                        class="fa-solid fa-user-check text-white"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3" data-bs-toggle="modal" data-bs-target="#chart1"
                                                style="cursor: pointer;">
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="m-0 ps-2 text-info">This Month <span
                                                                        class="text-black">(Jan)</span></p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <p class="text-end text-info small-font-size m-0 pe-2 p-1">
                                                                    Ratio
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Solution --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-6">
                                                                <p class="m-0 ps-2">Traning</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p
                                                                    class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                    <i class="ph ph-arrow-up pe-1 text-succsess"></i>100%
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Web --}}
                                                <div class="bg-light">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-6">
                                                                <p class="m-0 ps-2">Certificate</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p
                                                                    class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                    <i class="ph ph-arrow-down pe-1 text-danger"></i>125%
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Sales Training --}}
                                                <div class="">
                                                    <div class="box_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-6">
                                                                <p class="m-0 ps-2">Partnership</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p
                                                                    class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                    <i class="ph ph-arrow-down pe-1 text-danger"></i>165%
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="box_details bg-light">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-6">
                                                                <p class="m-0 ps-2">Others</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p
                                                                    class="text-end text-secondary small-font-size m-0 pe-2 p-1">
                                                                    <i class="ph ph-arrow-down pe-1 text-danger"></i>165%
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="m-0 p-1 text-center"
                                    style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Monthly
                                    Salses Query
                                </h6>
                                <div class="chart-container">
                                    <canvas class="chartjs-line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Chart In Modal --}}
    <!-- Modal trigger button -->
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="chart1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header px-3 py-2">
                    <h5 class="modal-title m-0" id="modalTitleId">
                        Sales Query
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chart-container">
                                    <canvas class="chartjs-line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Chart data
        var data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ],
            datasets: [{
                    label: 'Target',
                    data: [10, 15, 20, 25, 30, 35, 40, 45, 40, 35, 30, 25],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false,
                    pointStyle: 'rect', // Point style for Data 1
                    pointRadius: 6,
                    pointBackgroundColor: 'rgba(255, 99, 132, 0.7)', // Color of the point for Data 1
                    pointBorderColor: 'rgba(255, 99, 132, 1)', // Border color of the point for Data 1
                    pointBorderWidth: 1 // Border width of the point for Data 1
                },
                {
                    label: 'Achievement',
                    data: [30, 40, 50, 60, 70, 80, 90, 100, 90, 80, 70, 60],
                    borderColor: 'rgba(255, 206, 86, 1)', // Change color for 'Ratio'
                    borderWidth: 2,
                    fill: false,
                    pointStyle: 'rect', // Point style for Data 2
                    pointRadius: 6,
                    pointBackgroundColor: 'rgba(255, 206, 86, 0.7)', // Color of the point for Data 2
                    pointBorderColor: 'rgba(255, 206, 86, 1)', // Border color of the point for Data 2
                    pointBorderWidth: 1 // Border width of the point for Data 2
                }
            ]
        };

        // Chart configuration
        var config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    x: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Months'
                        },
                        ticks: {
                            beginAtZero: false
                        }
                    }],
                    y: [{
                        type: 'linear',
                        position: 'left'
                    }]
                }
            }
        };

        // Chart initialization code using Chart.js
        document.addEventListener('DOMContentLoaded', function() {
            var chartContainers = document.getElementsByClassName('chartjs-line-chart');

            for (var i = 0; i < chartContainers.length; i++) {
                var ctx = chartContainers[i].getContext('2d');
                new Chart(ctx, config);
            }
        });
    </script>

    <script>
        $('.data').hide()
        jQuery('.chart_btn').on('click', function() {
            jQuery('.data').toggle();
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.Show').click(function() {
                $('.target').show(200);
                $('.Show').hide(0);
                $('.Hide').show(0);
            });
            $('.Hide').click(function() {
                $('.target').hide(500);
                $('.Show').show(0);
                $('.Hide').hide(0);
            });
            $('.toggle').click(function() {
                $('.target').toggle('slow');
            });
        });
    </script>
@endpush
