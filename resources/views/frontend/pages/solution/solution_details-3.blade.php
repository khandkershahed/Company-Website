@extends('frontend.master')
@section('content')
    {{-- For Only This Template Start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/solutions.css') }}">
    <div class="st-template-3">
        {{-- Solution Tree Hero Section --}}
        <section class="st-three-hero p-5 pb-0">
            <div class="st-three-hero-wrap"
                style="background-image: url({{ !empty($solution->banner_image) && file_exists(public_path('storage/' . $solution->banner_image)) ? asset('storage/' . $solution->banner_image) : asset('images/hero-bg3.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <p class="text-uppercase">{{ $solution->row_two_header }}</p>
                                <h1 class="title">{{ $solution->name }}</h1>
                                <p>{{ $solution->row_two_title }}</p>
                                <div class="st-two-hero">
                                    <a class="btn" href="javascript:void(0)">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-images-three">
                                <div class="images">
                                    @if (!empty($solution->icon))
                                        <img src="{{ !empty($solution->icon) && file_exists(public_path('storage/' . $solution->icon)) ? asset('storage/' . $solution->icon) : asset('images/hero-img1.png') }}"
                                            alt="{{ !empty($solution->icon) ? 'Solution Icon' : 'Default Hero Image' }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if (
            !empty($solution->row_four_badge) ||
                !empty($solution->row_four_link) ||
                !empty($solution->row_four_title) ||
                !empty($solution->row_four_header) ||
                !empty($solution->row_four_col_one_title) ||
                !empty($solution->row_four_col_one_description) ||
                !empty($solution->row_four_col_two_title) ||
                !empty($solution->row_four_col_two_description) ||
                !empty($solution->row_four_big_image) ||
                !empty($solution->row_four_small_image))
            <section class="section-padding st-three-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-wrap">
                                <div class="section-three-title text-center">
                                    <h3 class="sub-title">{{ $solution->row_four_badge }}</h3>
                                    <h2 class="title">{{ $solution->row_four_link }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 pt-5">
                        <div class="col-lg-6">
                            <div class="st-three-about-img-wrap">
                                <div class="st-three-about-img st-three-about-img-big">
                                    <img src="{{ !empty($solution->row_four_big_image) && file_exists(public_path('storage/' . $solution->row_four_big_image)) ? asset('storage/' . $solution->row_four_big_image) : asset('images/about-big3.jpg') }}"
                                        alt="">
                                </div>
                                <div class="st-three-about-img st-three-about-img-sm">
                                    <img src="{{ !empty($solution->row_four_small_image) && file_exists(public_path('storage/' . $solution->row_four_small_image)) ? asset('storage/' . $solution->row_four_small_image) : asset('images/about-sm3.jpg') }}"
                                        alt="">
                                    <div class="shape-01"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="st-three-about-content">
                                <p class="title">{{ $solution->row_four_title }}</p>
                                <p class="text">{{ $solution->row_four_header }}</p>
                                <div class="mt-5">
                                    <div class="d-flex align-items-center mb-5">
                                        @if (!empty($solution->count_one_icon))
                                            <div>
                                                {{-- <img src="{{ asset('images/about-icon-3-1.png') }}" alt=""> --}}
                                                <img src="{{ asset('storage/' . $solution->count_one_icon) }}"
                                                    alt="">
                                            </div>
                                        @endif
                                        <div class="st-three-about-list-items ps-4">
                                            <h1 class="title">{{ $solution->row_four_col_one_title }}</h1>
                                            <p class="mb-0">{{ $solution->row_four_col_one_description }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-5">
                                        @if (!empty($solution->count_two_icon))
                                            <div>
                                                <img src="{{ asset('storage/' . $solution->count_two_icon) }}"
                                                    alt="">
                                            </div>
                                        @endif
                                        <div class="st-three-about-list-items ps-4">
                                            <h1 class="title">{{ $solution->row_four_col_two_title }}</h1>
                                            <p class="mb-0">{{ $solution->row_four_col_two_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section>
            <div class="st-three-cta-section-03">
                <div class="container">
                    <!-- Cta Wrap Start -->
                    <div class="cta-wrap" style="background-image: url({{ asset('images/cta-bg3-2.jpg') }});">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <!-- Cta Content Start -->
                                <div class="cta-content">
                                    <div class="section-title">
                                        <h2 class="title text-white">{{ $solution->row_five_title }}</h2>
                                    </div>
                                </div>
                                <!-- Cta Content End -->
                            </div>
                            <div class="col-lg-5">
                                <!-- Cta Button Start -->
                                <div class="cta-info text-center">
                                    <div class="cta-icon">
                                        <img src="{{ asset('images/cta-icon3-2.png') }}" alt="">
                                    </div>
                                    <p>Call Us For Any inquiry</p>
                                    <h3 class="number">{{ $setting->phone_one }}</h3>
                                </div>
                                <!-- Cta Button End -->
                            </div>
                        </div>
                    </div>
                    <!-- Cta Wrap End -->
                </div>
            </div>
        </section>
        @if (!empty($solution->row_three_title) ||
            !empty($solution->row_three_header) ||
            !empty($solution->row_two_column_one_image) ||
            !empty($solution->row_two_column_one_title) ||
            !empty($solution->row_two_column_one_description) ||
            !empty($solution->row_two_column_two_image) ||
            !empty($solution->row_two_column_two_title) ||
            !empty($solution->row_two_column_two_description) ||
            !empty($solution->row_two_column_three_image) ||
            !empty($solution->row_two_column_three_title) ||
            !empty($solution->row_two_column_three_description) ||
            !empty($solution->row_two_column_four_image) ||
            !empty($solution->row_two_column_four_title) ||
            !empty($solution->row_two_column_four_description))
            <section class="section-padding pb-0"
                style="margin-top: 300px; background-image: url({{ asset('images/service-bg3.jpg') }})">
                <div class="container st-three-services-section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-5 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="text-center py-5 pt-0">
                                        <p class="text-primary uppercase">{{ $solution->row_three_title }}</p>
                                        <h3 class="fw-bold">{{ $solution->row_three_header }}</h3>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="p-3">
                                                    <div class="pb-4">
                                                        <img src="{{ !empty($solution->row_two_column_one_image) && file_exists(public_path('storage/' . $solution->row_two_column_one_image)) ? asset('storage/' . $solution->row_two_column_one_image) : asset('images/ser-icon-3-1.png') }}" alt="">
                                                    </div>
                                                    <div>
                                                        <h5 class="fw-bold">{{$solution->row_two_column_one_title}}</h5>
                                                        <p>{{$solution->row_two_column_one_description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="p-3">
                                                    <div class="pb-4">
                                                        <img src="{{ !empty($solution->row_two_column_two_image) && file_exists(public_path('storage/' . $solution->row_two_column_two_image)) ? asset('storage/' . $solution->row_two_column_two_image) : asset('images/ser-icon-3-2.png') }}" alt="">
                                                    </div>
                                                    <div>
                                                        <h5 class="fw-bold">{{ $solution->row_two_column_two_title }}</h5>
                                                        <p>{{ $solution->row_two_column_two_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="p-3">
                                                    <div class="pb-4">
                                                        <img src="{{ !empty($solution->row_two_column_three_image) && file_exists(public_path('storage/' . $solution->row_two_column_three_image)) ? asset('storage/' . $solution->row_two_column_three_image) : asset('images/ser-icon-3-3.png') }}" alt="">
                                                    </div>
                                                    <div>
                                                        <h5 class="fw-bold">{{ $solution->row_two_column_three_title }}</h5>
                                                        <p>{{ $solution->row_two_column_three_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="p-3">
                                                    <div class="pb-4">
                                                        <img src="{{ !empty($solution->row_two_column_four_image) && file_exists(public_path('storage/' . $solution->row_two_column_four_image)) ? asset('storage/' . $solution->row_two_column_four_image) : asset('images/ser-icon-3-4.png') }}" alt="">
                                                    </div>
                                                    <div>
                                                        <h5 class="fw-bold">{{ $solution->row_two_column_four_title }}</h5>
                                                        <p>{{ $solution->row_two_column_four_description }}</p>
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
        @endif
        @if (!empty($solution->count_one_number) ||
            !empty($solution->count_one_text) ||
            !empty($solution->count_two_number) ||
            !empty($solution->count_two_text) ||
            !empty($solution->count_three_number) ||
            !empty($solution->count_three_text) ||
            !empty($solution->count_four_number) ||
            !empty($solution->count_four_text))
            <section>
                <div class="st-three-counter-section-03"
                    style="background-image: url({{ asset('images/counter-bg-3.jpg') }});">
                    <div class="container">
                        <div class="counter-wrap">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="st-three-single-counter-02 text-center">
                                        <span class="counter">{{ $solution->count_one_number }}</span>
                                        <p>{{ $solution->count_one_text }}</p>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="st-three-single-counter-02 text-center">
                                        <span class="counter">{{ $solution->count_two_number }}</span>
                                        <p>{{ $solution->count_two_text }}</p>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="st-three-single-counter-02 text-center">
                                        <span class="counter">{{ $solution->count_three_number }}</span>
                                        <p>{{ $solution->count_three_text }}</p>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="st-three-single-counter-02 text-center">
                                        <span class="counter">{{ $solution->count_four_number }}</span>
                                        <p>{{ $solution->count_four_text }}</p>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        {{-- Solution Tree Hero Section End --}}
    </div>
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
