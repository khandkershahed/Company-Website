@extends('admin.master')
@section('content') 
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Website Settings Management</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <ul class="nav nav-tabs border-0">
                        <li class="nav-item">
                            <a href="#site" class="nav-link active" data-bs-toggle="tab">
                                SITE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#smtp" class="nav-link " data-bs-toggle="tab">
                                SMTP
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#seo" class="nav-link" data-bs-toggle="tab">
                                SEO
                            </a>
                        </li>
                    </ul>
                    <a href="http://127.0.0.1:3000/admin/marketing-dashboard" class="btn navigation_btn ms-2 py-1">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>Site Setting</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->

            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="site">
                                    @include('admin.pages.setting.partials.site')
                                </div>
                                <div class="tab-pane fade" id="seo">
                                    @include('admin.pages.setting.partials.seo')
                                </div>
                                <div class="tab-pane fade" id="smtp">
                                    @include('admin.pages.setting.partials.smtp')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- /content area -->

        <!-- /inner content -->

    </div>
@endsection
