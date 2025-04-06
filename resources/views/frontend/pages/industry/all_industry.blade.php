@extends('frontend.master')
@section('content')
@section('styles')
    <meta property="og:title" content="Serving Industries of NGen IT">
    <!--<meta property="og:description" content="Description of your blog post">-->
    <meta property="og:image" content="{{ asset('frontend/images/industry-banner.jpg') }}">
    <!--<meta property="og:url" content="URL to your blog post">-->
@endsection
@if (!empty($learnmore->background_image))
    <style>
        .global_call_section::after {
            background: url('{{ asset('storage/' . $learnmore->background_image) }}');
            content: "";
            position: absolute;
            height: 17rem;
            background-position: top center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            background-color: #cbc4c3;
            top: 25%;
            left: 0px;
            z-index: -1;
        }

        .global_call_section_content {
            margin-top: 3.8rem;
        }
    </style>
@endif
<style>
    nav>div a.nav-item.nav-link,
    nav>div a.nav-item.nav-link.active {
        background: none;
        color: var(--secondary-paragraph-color);
        font-size: var(--badge-font-size);
        font-weight: 600;
        padding: 13px 15px;
        top: 1px;
    }

    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
        border-bottom: 6px solid #ae0a46 !important;

    }
</style>
<!--======// Header Title //======-->
<section class="">
    <div>
        <img src="{{ asset('frontend/images/industry-banner.jpg') }}" alt="" class="img-fluid">
    </div>
</section>
<!----------End--------->
<section class="mt-5">
    <div class="container my-3">
        <ul class="breadcrumb text-left">

            <a href="{{ route('homepage') }}">
                <li class="breadcrumb__item breadcrumb__item-firstChild">
                    <span class="breadcrumb__inner">
                        <span class="breadcrumb__title">Home</span>
                    </span>
                </li>
            </a>

            <li class="breadcrumb_divider">
                <span>></span>
            </li>

            <a href="{{ route('whatwedo') }}">
                <li class="breadcrumb__item">
                    <span class="breadcrumb__inner">
                        <span class="breadcrumb__title">What We Do</span>
                    </span>
                </li>
            </a>
            <li class="breadcrumb_divider">
                <span>></span>
            </li>

            <a href="{{ route('all.industry') }}">
                <li class="breadcrumb__item active">
                    <span class="breadcrumb__inner">
                        <span class="breadcrumb__title">Industry We Serve</span>
                    </span>
                </li>
            </a>

        </ul>
    </div>
</section>
<!--=====// We serve //=====-->
<div class="container">
    <!-- section title -->
    <div class="clint_help_section_heading_wrapper">
        <!-- title -->
        <h5 class="home_title_heading" style="text-align: left;">
            <h5 class="home_title_heading" style="text-align: left;">
                <div class="software_feature_title">
                    <h1 class="text-center pt-4 pb-4">
                        Industries We Serve
                    </h1>
                </div>
            </h5>
            <p class="home_title_text">
                <span class="font-weight-bold">{{ $learnmore->industry_header }} </span>
            </p>
    </div>
    <!-- section content wrapper -->
    <div class="row mb-4">
        <!-- content -->
        <div class="col-lg-9 col-sm-12">
            <!-- we_serveItem_wrapper -->
            <div class="row">
                <!-- item -->

                @if ($industrys)
                    @foreach ($industrys as $item)
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <a href="{{ route('industry.details', $item->slug) }}" class="we_serve_item">
                                <div class="we_serve_item_image">
                                    <img src="{{ asset('storage/' . $item->logo) }}" alt="">
                                </div>
                                <div class="we_serve_item_text">{{ $item->title }}</div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
        <!-- sidebar -->
        <div class="col-lg-3 col-sm-12">

            <div class="sidebar_industry">
                @if ($random_industries)
                    @foreach ($random_industries as $item)
                        <div class="pt-2">
                            <a href="{{ route('industry.details', $item->slug) }}">
                                <div id="fed-bg">
                                    <div class="p-2">
                                        <h5 class="text-white brand_side_text">{{ $item->title }} ›</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
<!---------End -------->

<!--======// Industry solution //======-->
{{-- <div class="container mb-5">
        <div class="text-center mt-5">
            <h1>Our Industry Solution</h1>
        </div>
        <div class="row">
                <div class="col-md-3">
                    <div class="box">
                        <div class="our-services settings">
                            <div class="icon d-flex justify-content-start"> <img
                                    src="http://127.0.0.1:8000/storage/requestImg/uw4RfXgPS7tbv9xZ1674019792.png" alt=""> </div>
                            <h4>Settings</h4>
                            <p class="pb-3">Find the hardware, software and IT services you need to be ready</p>
                            <div class="m-1">
                                <button class="common_button2" href="product_filters.html">Explore Our Solutions →</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="our-services settings">
                            <div class="icon d-flex justify-content-start"> <img
                                    src="http://127.0.0.1:8000/storage/requestImg/uw4RfXgPS7tbv9xZ1674019792.png" alt=""> </div>
                            <h4>Settings</h4>
                            <p class="pb-3">Find the hardware, software and IT services you need to be ready</p>
                            <div class="m-1">
                                <button class="common_button2" href="product_filters.html">Explore Our Solutions →</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="our-services settings">
                            <div class="icon d-flex justify-content-start"> <img
                                    src="http://127.0.0.1:8000/storage/requestImg/uw4RfXgPS7tbv9xZ1674019792.png" alt=""> </div>
                            <h4>Settings</h4>
                            <p class="pb-3">Find the hardware, software and IT services you need to be ready</p>
                            <div class="m-1">
                                <button class="common_button2" href="product_filters.html">Explore Our Solutions →</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="our-services settings">
                            <div class="icon d-flex justify-content-start"> <img
                                    src="http://127.0.0.1:8000/storage/requestImg/uw4RfXgPS7tbv9xZ1674019792.png" alt=""> </div>
                            <h4>Settings</h4>
                            <p class="pb-3">Find the hardware, software and IT services you need to be ready</p>
                            <div class="m-1">
                                <button class="common_button2" href="product_filters.html">Explore Our Solutions →</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> --}}
<!--=====// Global call section //=====-->
<section class="global_call_section section_padding">
    <div class="container">
        <!-- content -->
        @php
            $sentence = $learnmore->consult_title;
        @endphp
        <div class="global_call_section_content">
            <div class="home_title" style="width: 100%; margin: 0px;">
                <h5 class="home_title_heading" style="text-align: left; color: #fff;">
                    <span>{{ \Illuminate\Support\Str::substr($sentence, 0, 1) }}</span>{{ \Illuminate\Support\Str::substr($sentence, 1) }}

                </h5>
                <p class="home_title_text text-white" style="text-align: left;">{{ $learnmore->consult_short_des }}
                </p>
                <div style="text-align: left;">
                    <a class="btn-white mt-lg-0 mt-4" href="#Contact">Explore Business Outcomes</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------End -------->
<!--======// our clint tab //======-->
<section class="clint_tab_section mb-lg-5 mb-3">
    <div class="container">
        <div class="clint_tab_content pb-3">
            <!-- home title -->
            <div class="home_title mt-5">
                <div class="software_feature_title">
                    <h1 class="text-center my-3">Related Contents</h1>
                </div>
                <p class="home_title_text mb-lg-4 mb-3">See how NGen IT has helped organizations of all sizes across every
                    industry maximize the value of their IT solutions, <br>  leverage emerging technologies and create fresh
                    experiences.
                </p>
            </div>
            <!-- Client Tab Start -->
        </div>
        <div class="row">
            <div class="col-xs-12 ">
                <div class="solurtion_tabing_area">
                    <div class="tabing_menu_area">
                        <nav>
                            <div class="nav nav-tabs nav-fill text-capitalize" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home"
                                    aria-selected="true">{{ Str::words($story1->badge, 2, $end = '') }}</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile"
                                    aria-selected="false">{{ Str::words($story2->badge, 2, $end = '') }}</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact"
                                    aria-selected="false">{{ Str::words($story3->badge, 2, $end = '') }}</a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-bs-toggle="tab" href="#nav-about"
                                    role="tab" aria-controls="nav-about"
                                    aria-selected="false">{{ Str::words($story4->badge, 2, $end = '') }}</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content py-0 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 tab_content_padding">
                                    <h6 class="title-tag text-capitalize mb-2">{{ $story1->badge }}</h6>
                                    <h4 class="home_title_heading text-capitalize text-start pb-2">
                                        {{ $story1->title }}</h4>
                                    <div style="text-align: justify">
                                        <p class="mb-1">{{ $story1->header }}</p>
                                        <p>{!! Str::words(strip_tags($story1->short_des), 45) !!}</p>
                                    </div>
                                    <a href="{{ route('blog.details', $story1->id) }}" class="icon-btns"><span
                                            class="fw-bold">Read
                                            Details</span> <i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 d-lg-block d-sm-none">
                                    <div class="showcase-industry">
                                        <img src="{{ asset('storage/' . $story1->image) }}" alt="Picture">
                                        <div class="overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 ps-5">
                                    <h6 class="title-tag text-capitalize mb-2">{{ $story2->badge }}</h6>
                                    <h4 class="home_title_heading text-capitalize text-start pb-2">
                                        {{ $story2->title }}</h4>
                                    <div style="text-align: justify">
                                        <p class="mb-1">{{ $story2->header }}</p>
                                        <p>{!! Str::words(strip_tags($story2->short_des), 45) !!}</p>
                                    </div>
                                    <a href="{{ route('blog.details', $story2->id) }}" class="icon-btns"><span
                                            class="fw-bold">Read
                                            Details</span> <i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 d-lg-block d-sm-none">
                                    <div class="showcase-industry">
                                        <img src="{{ asset('storage/' . $story2->image) }}" alt="Picture">
                                        <div class="overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 ps-5">
                                    <h6 class="title-tag text-capitalize mb-2">{{ $story3->badge }}</h6>
                                    <h4 class="home_title_heading text-capitalize text-start pb-2">
                                        {{ $story3->title }}</h4>
                                    <div style="text-align: justify">
                                        <p class="mb-1">{{ $story3->header }}</p>
                                        <p>{!! Str::words(strip_tags($story3->short_des), 45) !!}</p>
                                    </div>
                                    <a href="{{ route('story.details', $story3->id) }}" class="icon-btns"><span
                                            class="fw-bold">Read
                                            Details</span> <i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 d-lg-block d-sm-none">
                                    <div class="showcase-industry">
                                        <img src="{{ asset('storage/' . $story3->image) }}" alt="Picture">
                                        <div class="overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 ps-5">
                                    <h6 class="title-tag text-capitalize mb-2">{{ $story4->badge }}</h6>
                                    <h4 class="home_title_heading text-capitalize text-start pb-2">
                                        {{ $story4->title }}</h4>
                                    <div style="text-align: justify">
                                        <p class="mb-1">{{ $story4->header }}</p>
                                        <p>{!! Str::words(strip_tags($story4->short_des), 50) !!}</p>
                                    </div>
                                    <a href="{{ route('story.details', $story4->id) }}" class="icon-btns">
                                        <span class="fw-bold">Read Details</span>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 d-lg-block d-sm-none">
                                    <div class="showcase-industry">
                                        <img src="{{ asset('storage/' . $story4->image) }}" alt="Picture">
                                        <div class="overlay">
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
</section>
<!---------End -------->
<!--=====// Tech solution //=====-->
@if (count($tech_datas) > 0)
    <div class="section_wp2">
        <div class="container">
            @if (!empty($software_info->row_seven_title))
                <div class="solution_number_wrapper">
                    <!-- title -->
                    @php
                        $sentence2 = $software_info->row_seven_title;
                    @endphp
                    <h5 class="home_title_heading" style="text-align: left;">
                        <div class="software_feature_title">
                            <h1 class="text-center pb-3">
                                <span>{{ \Illuminate\Support\Str::substr($sentence2, 0, 1) }}</span>{{ \Illuminate\Support\Str::substr($sentence2, 1) }}
                            </h1>
                        </div>
                    </h5>
                </div>
            @endif
            <!-- tech wrapper -->
            <div class="row">
                <!-- item -->
                @foreach ($tech_datas as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="tech_solution_item">
                            <p class="tech_solution_title">{{ $item->header }}</p>
                            <p class="tech_solution_text">{{ $item->short_description }}</p>
                            <p class="tech_solution_award">{{ $item->footer }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endif
<!---------End -------->
<!--=====// Pageform section //=====-->
@include('frontend.partials.footer_contact')
<!---------End -------->

@endsection
