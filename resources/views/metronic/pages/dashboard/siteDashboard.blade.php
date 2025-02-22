<x-admin-app-layout :title="'Site Content Dashboard'">
    <div class="card shadow-sm">
        <style>
            .section-border {
                border-bottom: 0.5px solid #acdaf063;
            }

            .card-main-title {
                color: white;
            }

            .btn-circle {
                padding: 1px 1px;
                border-radius: 15px;
                text-align: center;
                font-size: 11px;
                line-height: 0px;
                background: transparent;
                color: #247297;
                border-radius: 50%;
                border: 1px solid #247297;
            }
            .box_details {
                padding:5px 1rem !important;
            }


            .border-right {
                border-top-right-radius: 50px !important;
                border-bottom-right-radius: 50px !important;
            }
        </style>
        <div class="content-wrapper">
            <div class="content p-0">
                <!-- Page header -->
                <section class="shadow-sm">
                    <div class="d-flex justify-content-end align-items-center">
                        {{-- Page Destination/ BreadCrumb --}}
                        {{-- <div class="page-header-content d-lg-flex ">
                            <div class="d-flex px-2">
                                <div class="breadcrumb py-2">
                                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i
                                            class="ph-house"></i></a>
                                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                    <a href="" class="breadcrumb-item"><span class="breadcrumb-item active">Site
                                            Contents</span></a>
                                </div>
                                <a href="#breadcrumb_elements"
                                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                                    data-bs-toggle="collapse">
                                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                                </a>
                            </div>
                        </div> --}}
                        {{-- Inner Page Tab --}}
                        <!-- Header Navigation Btn -->
                        <div>
                            <a href="{{ route('blog.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                                    <span>Blog</span>
                                </div>
                            </a>

                            <a href="{{ route('techglossy.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-calculator me-1" style="font-size: 12px;"></i>
                                    <span>Techglossy</span>
                                </div>
                            </a>
                            <a href="{{ route('feature.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-user-tie me-1" style="font-size: 12px;"></i>
                                    <span>Feature</span>
                                </div>
                            </a>
                            <a href="{{ route('clientstory.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-cog me-1" style="font-size: 12px;"></i>
                                    <span>Client Story</span>
                                </div>
                            </a>
                            <a href="{{ route('show-case-video.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-gallery-thumbnails me-1" style="font-size: 12px;"></i>
                                    <span>Showcase</span>
                                </div>
                            </a>
                            <a href="{{ route('policy.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-gallery-thumbnails me-1" style="font-size: 12px;"></i>
                                    <span>Terms and Policy</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- /page header -->
                <!-- Sales Chain Page -->
                <section>
                    <div class="container mb-3">
                        <div class="row py-2">
                            <h4 class="mb-0 text-center mx-auto">Site Contents</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <h6 class="m-0 py-2 text-center card-main-title mb-2 text-white"
                                        style="background-color: #4b5675 !important;">Product Management</h6>
                                </div>
                                <div class="row gx-1">
                                    <div class="col-lg-6">
                                        <div class="card rounded-0" style="background-color: #f3f3ff;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center px-4"
                                                    style="height: 2rem;">
                                                    <h1 class="title-text mb-0">Total Product</h1>
                                                    <h1 class="title-text mb-0 amount-ft-size">{{ $total_products }}
                                                    </h1>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-success mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0 text-white">Approved Product</p>
                                                    <p class="mb-0 text-white title-text fw-bold">
                                                        {{ $approved_products }}</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-danger mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0 text-white">Pending Approval</p>
                                                    <p class="mb-0 text-white title-text fw-bold">
                                                        {{ $sourced_products }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card rounded-0 mb-0 p-2 "
                                            style="background-color: #f3f3ff; padding: 20px !important;">
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Total Category</p>
                                                    <p class="mb-0 title-text main_color">{{ $categories }}</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Sub Category</p>
                                                    <p class="mb-0 title-text main_color">{{ $sub_categories }}</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Sub Sub Category</p>
                                                    <p class="mb-0 title-text main_color">{{ $sub_sub_categories }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <h6 class="m-0 py-2 text-center card-main-title mb-2 text-white"
                                        style="background-color: #4b5675 !important;">Others Pages</h6>
                                </div>
                                <div class="row gx-1">
                                    <div class="col-lg-6">
                                        <div class="card rounded-0 mb-0 p-2 "
                                            style="background-color: #f3f3ff; padding: 20px !important;">
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Brand</p>
                                                    <p class="mb-0 title-text main_color">{{ $brands }}</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Solution</p>
                                                    <p class="mb-0 title-text main_color">{{ $solutions }}</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-white">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Feature</p>
                                                    <p class="mb-0 title-text main_color">{{ $features }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card rounded-0 mb-0 p-2 "
                                            style="background-color: #f3f3ff; padding: 20px !important;">
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Blogs</p>
                                                    <p class="mb-0 title-text main_color">10</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-white mb-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Techglossy</p>
                                                    <p class="mb-0 title-text main_color">6</p>
                                                </div>
                                            </div>
                                            <div class="card-body py-2 bg-white">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Client Story</p>
                                                    <p class="mb-0 title-text main_color">8</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="container mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="py-4 d-flex justify-content-center align-items-center"
                                            style="
                                            border: 2px;
                                            border-style: dashed;
                                            border-color: #4b5675;">
                                            <div>
                                                <a href="{{ route('admin.brand.index') }}" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Brand</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('category.index') }}" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Category</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('product-sourcing.index') }}"
                                                    class="btn navigation_btn" style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Sourcing</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('learnMore.index') }}" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Learnmore</span>
                                                    </div>
                                                </a>
                                                <a href="ngenitltd.com/admin/business" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Business</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('admin.solution-cms.index') }}"
                                                    class="btn navigation_btn" style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Solution</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('sas.index') }}" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>SAS</span>
                                                    </div>
                                                </a>
                                                {{-- <a href="ngenitltd.com/admin/purchase" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Purchase</span>
                                                    </div>
                                                </a>
                                                <a href="ngenitltd.com/admin/delivery" class="btn navigation_btn"
                                                    style="width: 120px;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plus me-1" style="font-size: 11px;"></i>
                                                        <span>Delivery</span>
                                                    </div>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row mt-1 mx-auto">
                                    <div class="col-lg-3 ps-0">
                                        <h6 class="m-0 py-2 card-main-title text-center"
                                            style="background-color: #4b5675 !important;">Common Page Builder</h6>
                                        <div class="card rounded-0 site_content_main_card">
                                            <div class="card-body px-0 py-0"
                                                style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                                {{-- Link Start --}}
                                                <div class="row gx-1">
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('row.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin"> Row
                                                                        Builder</span>
                                                                </div>
                                                                <a href="{{ route('row.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('solutionCard.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Solution
                                                                        Card</span>
                                                                </div>
                                                                <a href="{{ route('solutionCard.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('homepage.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Homepage</span>
                                                                </div>
                                                                <a href="{{ route('homepage.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('learnMore.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Learnmore Page</span>
                                                                </div>
                                                                <a href="{{ route('learnMore.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('what-we-do-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">What We
                                                                        Do</span>
                                                                </div>
                                                                <a href="{{ route('what-we-do-page.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <a href="{{ route('about-us.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">About
                                                                        Us</span>
                                                                </div>
                                                                <a href="{{ route('about-us.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0">
                                        <h6 class="m-0 py-2 card-main-title text-center"
                                            style="background-color: #4b5675 !important;">Software & Hardware Builder
                                        </h6>
                                        <div class="card rounded-0 site_content_main_card">
                                            <div class="card-body px-0 py-0"
                                                style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                                {{-- Link Start --}}
                                                <div class="row gx-1">
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('software-info-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Software
                                                                        Info</span>
                                                                </div>
                                                                <a href="{{ route('software-info-page.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('software-common-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Software
                                                                        Common</span>
                                                                </div>
                                                                <a href="{{ route('software-common-page.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('hardware-info-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Hardware
                                                                        Info</span>
                                                                </div>
                                                                <a href="{{ route('hardware-info-page.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('hardware-common-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Hardware
                                                                        Common</span>
                                                                </div>
                                                                <a href="{{ route('hardware-common-page.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('industry.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Industry</span>
                                                                </div>
                                                                <a href="{{ route('industry.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <a href="{{ route('industryPage.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Industry
                                                                        Details</span>
                                                                </div>
                                                                <a href="{{ route('industryPage.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0">
                                        <h6 class="m-0 py-2 card-main-title text-center"
                                            style="background-color: #4b5675 !important;">Others Page Builder</h6>
                                        <div class="card rounded-0 site_content_main_card">
                                            <div class="card-body px-0 py-0"
                                                style="border-top-left-radius: 0px;border-top-right-radius: 0px;">
                                                {{-- Link Start --}}

                                                <div class="row gx-1">
                                                    <div class="col-lg-12">
                                                        <a href="{{ route('brandPage.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Brand
                                                                        Page</span>
                                                                </div>
                                                                <a href="{{ route('brandPage.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <a href="{{ route('training-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Training
                                                                        Page</span>
                                                                </div>
                                                                <a href="{{ route('training-page.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('solutionDetails.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Solution
                                                                        Details</span>
                                                                </div>
                                                                <a href="{{ route('solutionDetails.create') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('portfolio-client-feedback.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Client
                                                                        Feedback</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-page.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pe-0">
                                        <h6 class="m-0 py-2 card-main-title text-center"
                                            style="background-color: #4b5675 !important;">Portfolio</h6>
                                        <div class="card rounded-0 site_content_main_card">
                                            <div class="card-body px-0 py-0">
                                                {{-- Link Start --}}
                                                <div class="row gx-1">
                                                    <div class="col-lg-12">
                                                        <a href="{{ route('portfolio-category.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Portfolio
                                                                        Category</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-category.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('portfolio-client.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Portfolio
                                                                        Clients</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-client.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('portfolio-team.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Portfolio
                                                                        Team</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-team.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('portfolio-choose-us.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Portfolio
                                                                        Choose</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-choose-us.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('portfolio-page.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Portfolio
                                                                        Page</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-page.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-12 mt-1">
                                                        <a href="{{ route('portfolio-detail.index') }}">
                                                            <div
                                                                class="box_details d-flex justify-content-between align-items-center bg-light p-1 rounded-0 border-right">
                                                                <div>
                                                                    <span class="link_title_admin">Portfolio
                                                                        Details</span>
                                                                </div>
                                                                <a href="{{ route('portfolio-detail.index') }}">
                                                                    <i class="fas fa-plus-circle text-active-primary"></i>
                                                                </a>
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
                </section>
                <!-- Sales Chain Page -->
            </div>
        </div>
    </div>
    <!-- Main Content End -->

</x-admin-app-layout>
