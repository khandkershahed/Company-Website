@extends('frontend.master')
@section('content')
    {{-- For Only This Template Start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/solutions.css') }}">
    {{-- For Only This Template End --}}
    <section style="background-color: #eee">
        <div class="container-fluid st-two-hero"
            style="background-image: url({{ !empty($solution->banner_image) && file_exists(public_path('storage/' . $solution->banner_image)) ? asset('storage/' . $solution->banner_image) : asset('images/hero-bg1.png') }});">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="st-two-hero-content">
                            @php
                                $title = $solution->row_two_header;
                                $words = explode(' ', $title);
                                $firstWord = $words[0];
                                $restOfTheTitle = implode(' ', array_slice($words, 1));
                            @endphp
                            <h3 class="sub-title aos-init"><span>{{ $firstWord }} </span> {{ $restOfTheTitle }}
                            </h3>
                            <h2 class="title">{{ $solution->name }}</h2>
                            <p class="">{{ $solution->row_two_title }}</p>
                            {{-- <div class="st-two-hero">
                                <a class="btn" href="javascript:void(0)">Read More</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-two-hero-img">
                            @if (!empty($solution->icon))
                                <img src="{{ !empty($solution->icon) && file_exists(public_path('storage/' . $solution->icon)) ? asset('storage/' . $solution->icon) : asset('images/hero-img1.png') }}"
                                    alt="{{ !empty($solution->icon) ? 'Solution Icon' : 'Default Hero Image' }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Featire --}}
    @if (
        !empty($solution->row_three_title) ||
            !empty($solution->row_three_header) ||
            !empty($solution->row_two_column_one_title) ||
            !empty($solution->row_two_column_one_description) ||
            !empty($solution->row_two_column_two_title) ||
            !empty($solution->row_two_column_two_description) ||
            !empty($solution->row_two_column_three_title) ||
            !empty($solution->row_two_column_three_description) ||
            !empty($solution->row_two_column_four_title) ||
            !empty($solution->row_two_column_four_description))
        <section style="background-color: #eee">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center py-5">
                            <p class="text-primary">{{ $solution->row_three_title }}</p>
                            <h1>{{ $solution->row_three_header }}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (!empty($solution->row_two_column_one_title) || !empty($solution->row_two_column_one_description))
                        <div class="col-lg-3">
                            <div class="border-0">
                                <div class="card st-two-f-card">
                                    <div class="card-body">
                                        <div>
                                            <img src="{{ !empty($solution->row_two_column_one_image) && file_exists(public_path('storage/' . $solution->row_two_column_one_image)) ? asset('storage/' . $solution->row_two_column_one_image) : asset('images/ser-icon1.png') }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="title">{{ $solution->row_two_column_one_title }}</h2>
                                            <p class="para text-muted">{{ $solution->row_two_column_one_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!empty($solution->row_two_column_two_title) || !empty($solution->row_two_column_two_description))
                        <div class="col-lg-3">
                            <div class="card st-two-f-card">
                                <div class="card-body">
                                    <div>
                                        <img src="{{ !empty($solution->row_two_column_two_image) && file_exists(public_path('storage/' . $solution->row_two_column_two_image)) ? asset('storage/' . $solution->row_two_column_two_image) : asset('images/ser-icon2.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <h2 class="title">{{ $solution->row_two_column_two_title }}</h2>
                                        <p class="para text-muted">{{ $solution->row_two_column_two_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!empty($solution->row_two_column_three_title) || !empty($solution->row_two_column_three_description))
                        <div class="col-lg-3">
                            <div class="border-0">
                                <div class="card st-two-f-card">
                                    <div class="card-body">
                                        <div>
                                            <img src="{{ !empty($solution->row_two_column_three_image) && file_exists(public_path('storage/' . $solution->row_two_column_three_image)) ? asset('storage/' . $solution->row_two_column_three_image) : asset('images/ser-icon3.png') }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="title">{{ $solution->row_two_column_three_title }}</h2>
                                            <p class="para text-muted">{{ $solution->row_two_column_three_description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!empty($solution->row_two_column_four_title) || !empty($solution->row_two_column_four_description))
                        <div class="col-lg-3">
                            <div class="border-0">
                                <div class="card st-two-f-card">
                                    <div class="card-body">
                                        <div>
                                            <img src="{{ !empty($solution->row_two_column_four_image) && file_exists(public_path('storage/' . $solution->row_two_column_four_image)) ? asset('storage/' . $solution->row_two_column_four_image) : asset('images/ser-icon4.png') }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="title">{{ $solution->row_two_column_four_title }}</h2>
                                            <p class="para text-muted">{{ $solution->row_two_column_four_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
    {{-- Featire End --}}
    {{-- Call To Action Start --}}
    @if (!empty($solution->row_five_title))
        <section>
            <div class="section st-two-cta-section section-padding">
                <div class="shape-1"></div>
                <div class="container">
                    <div class="cta-wrap">
                        <div class="cta-icon">
                            <img src="{{ asset('images/cta-icon1.png') }}" alt="">
                        </div>
                        <div class="cta-content text-center">
                            <p>{{ $solution->row_five_title }} <a href="{{ route('contact') }}">Let’s talk with us</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Call To Action End --}}
    @if (
        !empty($solution->row_four_badge) ||
            !empty($solution->row_four_title) ||
            !empty($solution->row_four_header) ||
            !empty($solution->row_four_link) ||
            !empty($solution->row_four_button_name) ||
            !empty($solution->row_four_big_image) ||
            !empty($solution->row_four_small_image))
        <section class="st-two-about-section section-padding"
            style="background-image: url({{ asset('images/about-bg.png') }});">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- About Image Wrap Start -->
                            <div class="about-img-wrap">
                                <div class="about-img about-img-big">
                                    <img src="{{ !empty($solution->row_four_big_image) && file_exists(public_path('storage/' . $solution->row_four_big_image)) ? asset('storage/' . $solution->row_four_big_image) : asset('images/about-1.jpg') }}"
                                        class="rounded-3" alt="">
                                </div>
                                <div class="about-img about-img-sm">
                                    <img src="{{ !empty($solution->row_four_small_image) && file_exists(public_path('storage/' . $solution->row_four_small_image)) ? asset('storage/' . $solution->row_four_small_image) : asset('images/about-2.jpg') }}"
                                        class="rounded-3 shadow-sm" alt="">
                                    <div class="shape-01"></div>
                                </div>
                            </div>
                            <!-- About Image Wrap End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- About Content Wrap Start -->
                            <div class="about-content-wrap">
                                <div class="section-title">
                                    <h3 class="sub-title">{{ $solution->row_four_badge }}</h3>
                                    <h2 class="title">{{ $solution->row_four_title }}</h2>
                                </div>
                                <p>{{ $solution->row_four_header }}</p>
                                @if (!empty($solution->row_four_link) && !empty($solution->row_four_button_name))
                                    <div class="play-btn">
                                        <a class="popup-video" href="{{ $solution->row_four_link }}"><i
                                                class="fas fa-play"></i>
                                            <span>{{ $solution->row_four_button_name }}</span></a>
                                    </div>
                                @endif
                            </div>
                            <!-- About Content Wrap End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Content info --}}
    @if (
        !empty($solution->row_four_col_one_title) ||
            !empty($solution->row_four_col_one_description) ||
            !empty($solution->row_four_col_two_description))
        <div class="st-two-about-section-02 section-padding">
            <div class="container">
                <!-- About Wrapper Start -->
                <div class="about-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <!-- About Left Start -->
                            <div class="about-02-left text-center">
                                <div class="section-title">
                                    <h2 class="title">{{ $solution->row_four_col_one_title }}</h2>
                                </div>
                                <div class="about-author">
                                    <p class="name fw-bold">{!! $solution->row_four_col_one_description !!}</p>
                                </div>
                            </div>
                            <!-- About Left End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- About Right Start -->
                            <div class="about-02-right">
                                <p>{!! $solution->row_four_col_two_description !!}</p>
                                {{-- <div class="about-list">
                                    <ul>
                                        <li>
                                            <span class="about-icon"><i class="fa-solid fa-check"></i></span>
                                            <span class="about-text">We always focus on technical excellence </span>
                                        </li>
                                        <li>
                                            <span class="about-icon"><i class="fa-solid fa-check"></i></span>
                                            <span class="about-text"> Wherever you’re going, we bring ideas and excitement
                                            </span>
                                        </li>
                                        <li>
                                            <span class="about-icon"><i class="fa-solid fa-check"></i></span>
                                            <span class="about-text">We’re consultants, guides, and partners for brands </span>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                            <!-- About Right End -->
                        </div>
                    </div>
                </div>
                <!-- About Wrapper End -->
            </div>
        </div>
    @endif
    {{-- Content info End --}}
    {{-- Count info start --}}
    @if (!empty($solution->count_one_number) ||
            !empty($solution->count_one_text) ||
            !empty($solution->count_two_number) ||
            !empty($solution->count_two_text) ||
            !empty($solution->count_three_number) ||
            !empty($solution->count_three_text) ||
            !empty($solution->count_four_number) ||
            !empty($solution->count_four_text))
        <div class="section st-two-counter-section">
            <div class="container">
                <div class="counter-wrap">
                    <div class="row justify-content-center">
                        @if (!empty($solution->count_one_number) || !empty($solution->count_one_text))
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="single-counter">
                                    @if (!empty($solution->count_one_icon))
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_one_icon) }}" alt="">
                                        </div>
                                    @endif
                                    <div class="counter-content">
                                        <span class="counter">{{ $solution->count_one_number }}</span>
                                        <p class="mb-0">{{ $solution->count_one_text }}</p>
                                    </div>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                        @endif
                        @if (!empty($solution->count_two_number) || !empty($solution->count_two_text))
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="single-counter">
                                    @if (!empty($solution->count_two_icon))
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_two_icon) }}" alt="">
                                        </div>
                                    @endif
                                    <div class="counter-content">
                                        <span class="counter">{{ $solution->count_two_number }}</span>
                                        <p class="mb-0">{{ $solution->count_two_text }}</p>
                                    </div>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                        @endif
                        @if (!empty($solution->count_three_number) || !empty($solution->count_three_text))
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="single-counter">
                                    @if (!empty($solution->count_three_icon))
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_three_icon) }}" alt="">
                                        </div>
                                    @endif
                                    <div class="counter-content">
                                        <span class="counter">{{ $solution->count_three_number }}</span>
                                        <p class="mb-0">{{ $solution->count_three_text }}</p>
                                    </div>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                        @endif
                        @if (!empty($solution->count_four_number) || !empty($solution->count_four_text))
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="single-counter">
                                    @if (!empty($solution->count_four_icon))
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_four_icon) }}" alt="">
                                        </div>
                                    @endif
                                    <div class="counter-content">
                                        <span class="counter">{{ $solution->count_four_number }}</span>
                                        <p class="mb-0">{{ $solution->count_four_text }}</p>
                                    </div>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- Count info End --}}
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
