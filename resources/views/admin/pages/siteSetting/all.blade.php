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

        .btn-link {
            background-color: #247297;
            color: white;
            padding: 0px 4px 0px;
        }

        .btn-link:hover {
            background-color: transparent;
            color: #247297;
            padding: 0px 4px 0px;
        }

        .btn-circle {
            padding: 1px 1px;
            border-radius: 15px;
            text-align: center;
            font-size: 10px;
            line-height: 0px;
            background: transparent;
            color: #247297;
            border-radius: 50%;
            border: 1px solid #247297;
        }

        .text-muted {
            font-size: 12px;
        }

        .site_content_main_card {
            height: 16rem;
        }

        .card_title_info {
            color: #247297;
            border-bottom: 1px solid #247297;
            font-size: 16px;
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
                                <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                <a href="" class="breadcrumb-item"><span class="breadcrumb-item active">Site
                                        Settings</span></a>
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
                        <a href="{{ route('admin.sales-dashboard.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-truck-field me-1" style="font-size: 12px;"></i>
                                <span>Supply Chain</span>
                            </div>

                        </a>
                        <a href="{{ route('admin.marketing-dashboard.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                                <span>Business</span>
                            </div>
                        </a>
                        <a href="{{ route('accounts-manager.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-calculator me-1" style="font-size: 12px;"></i>
                                <span>Accounts</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.hr-and-admin.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-user-tie me-1" style="font-size: 12px;"></i>
                                <span>HR Admin</span>
                            </div>
                        </a>
                        <a href="{{ route('setting.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-cog me-1" style="font-size: 12px;"></i>
                                <span>Website Settings</span>
                            </div>
                        </a>
                        <a href="#" class="btn navigation_btn">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-gallery-thumbnails me-1" style="font-size: 12px;"></i>
                                <span>Role Settings</span>
                            </div>
                        </a>
                    </div>
            </section>
            <!-- /page header -->
            <!-- Sales Chain Page -->
            <section>
                <div class="container-fluid ">
                    <div class="row py-2">
                        <h4 class="mb-0 text-center">Site Settings</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            {{-- Fisrt Row --}}
                            <div class="row mt-1">
                                <div class="col-lg-4">
                                    <h6 class="m-0 p-0 card-main-title text-center">Website Settings</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body"
                                            style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                            {{-- Link Start --}}
                                            <div class="row gx-2">
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('setting.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Site Settings</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button" class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i> </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('faq.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">FAQs</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button" class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('frontend-navbar-module.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Fro. Menu Builder</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button" class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('office-location.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Office Locatios</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button" class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="m-0 p-0 card-main-title text-center">
                                        Supply Chain</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body border-0 shadow-none mb-0"
                                            style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                            {{-- Link Start --}}
                                            <div class="row gx-2">
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('setting.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">DMAR</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('faq.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">CMAR</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('frontend-navbar-module.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">EMAR</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="m-0 p-0 card-main-title text-center">
                                        Business</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body border-0 shadow-none mb-0"
                                            style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                            {{-- Link Start --}}
                                            <div class="row gx-2">
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('setting.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Knowledge</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('faq.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Presentation</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('frontend-navbar-module.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Showcase BD</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Second Row --}}
                            <div class="row mt-1">
                                <div class="col-lg-4">
                                    <h6 class="m-0 p-0 card-main-title text-center">
                                        Accounts</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body border-0 shadow-none mb-0"
                                            style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                            {{-- Link Start --}}
                                            <div class="row gx-2">
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('setting.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Knowledge</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('faq.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Presentation</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('frontend-navbar-module.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Showcase BD</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="m-0 p-0 card-main-title text-center">
                                        HR Admin</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body border-0 shadow-none mb-0"
                                            style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                            {{-- Link Start --}}
                                            <div class="row gx-2">
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('setting.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Site Settings</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('faq.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">FAQs</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('frontend-navbar-module.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Fro. Menu Builder</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('office-location.index') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Office Locatios</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="m-0 p-0 card-main-title text-center">
                                        Role Settings</h6>
                                    <div class="card rounded-0">
                                        <div class="card-body border-0 shadow-none mb-0"
                                            style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                            {{-- Link Start --}}
                                            <div class="row gx-2">
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('all.permission') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">All Permission </span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('all.roles') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">All Roles </span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('all.roles') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">Roles In Permission</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <a href="{{ route('all.roles.permission') }}">
                                                        <div
                                                            class="box_details d-flex justify-content-between align-items-center bg-light p-1">
                                                            <div>
                                                                <span class="text-muted ps-1">All Roles in
                                                                    Permission</span>
                                                            </div>
                                                            <div class="pe-1">
                                                                <button type="button"
                                                                    class="btn btn-default btn-circle"><i
                                                                        class="ph ph-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
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
            <!-- Sales Chain Page -->

        </div>
    </div>
@endsection
