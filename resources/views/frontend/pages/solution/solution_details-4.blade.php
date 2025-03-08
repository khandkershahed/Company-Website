@extends('frontend.master')
@section('content')
    {{-- For Only This Template Start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/solutions.css') }}">
    <div class="st-template-3">
        {{-- Solution Tree Hero Section --}}
        <section>
            <div class="section st-four-hero-section-02"
                style="background-image: url({{ !empty($solution->banner_image) && file_exists(public_path('storage/' . $solution->banner_image)) ? asset('storage/' . $solution->banner_image) : asset('frontend/images/no-row-img(580-326).png') }});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <!-- Hero Content Start -->
                            <div class="hero-content">
                                <h3 class="sub-title aos-init aos-animate" data-aos-delay="600" data-aos="fade-up">
                                    {{ $solution->row_two_title }}
                                </h3>
                                <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="800">
                                    {{ $solution->name }}
                                </h2>
                                @if (!empty($solution->video_link))
                                    <div class="hero-play-btn aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                                        <a class="popup-video play-btn" href="{{ $solution->video_link }}">
                                            {{-- href="https://www.youtube.com/watch?time_continue=3&amp;v=_X0eYtY8T_U"> --}}
                                            <i class="fas fa-play"></i>
                                            <span>Watch Video</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <!-- Hero Content End -->
                        </div>
                    </div>
                </div>
                <div class="svg-shape">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2695px" height="349px">
                        <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                            d="M400.0,36.999 C479.999,88.625 899.487,302.793 1925.999,42.999 C2230.335,-34.22 2564.914,16.158 2564.914,16.158 C2564.914,16.158 2649.752,197.299 2691.999,240.999 C2795.999,348.575 0.0,348.999 0.0,348.999 C0.0,348.999 320.0,-14.625 400.0,36.999 Z">
                        </path>
                    </svg>
                </div>
            </div>
        </section>
        @if (
            !empty($solution->row_four_badge) ||
                !empty($solution->row_four_title) ||
                !empty($solution->row_four_header) ||
                !empty($solution->row_four_quote) ||
                !empty($solution->row_four_col_one_title) ||
                !empty($solution->row_four_col_one_description) ||
                !empty($solution->row_four_col_two_title) ||
                !empty($solution->row_four_col_two_description) ||
                !empty($solution->row_four_big_image) ||
                !empty($solution->row_four_small_image))
            <div class="st-four-about-section-03 section-padding-02 pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- About Content Start -->
                            <div class="about-content-03">
                                <div class="st-four-section-title">
                                    <h3 class="sub-title color-2">{{ $solution->row_four_badge }}</h3>
                                    <h2 class="title mt-2">{{ $solution->row_four_title }}</h2>
                                </div>
                                <p class="text">{{ $solution->row_four_header }}</p>
                                <div class="about-quote">
                                    <blockquote class="blockquote">
                                        <p>{{ $solution->row_four_quote }}</p>
                                    </blockquote>
                                </div>
                                <!-- About List Start -->
                                <div class="about-list-02">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="about-list-item-02">
                                                <h3 class="title"><i class="fas fa-arrow-circle-right"></i>
                                                    {{ $solution->row_four_col_one_title }}</h3>
                                                <p>{{ $solution->row_four_col_one_description }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="about-list-item-02">
                                                <h3 class="title"><i
                                                        class="fas fa-arrow-circle-right"></i>{{ $solution->row_four_col_two_title }}
                                                </h3>
                                                <p>{{ $solution->row_four_col_two_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (!empty($solution->row_four_big_image) || !empty($solution->row_four_small_image))
                            <div class="col-lg-6">
                                <!-- About Image Warp Start -->
                                <div class="about-img-warp-3">
                                    <div class="shape-1"></div>
                                    <div class="about-img about-img-big">
                                        <img src="{{ !empty($solution->row_four_big_image) && file_exists(public_path('storage/' . $solution->row_four_big_image)) ? asset('storage/' . $solution->row_four_big_image) : asset('images/about-big-4.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="about-img about-img-sm">
                                        <img src="{{ !empty($solution->row_four_small_image) && file_exists(public_path('storage/' . $solution->row_four_small_image)) ? asset('storage/' . $solution->row_four_small_image) : asset('images/about-sm-4.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <!-- About Image Warp End -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
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
            <div class="st-four-section st-four-service-section-02 section-padding"
                style="background-image: url({{ asset('images/service-bg-4.jpg') }});">
                <div class="container">
                    <!-- Service Wrap Start -->
                    <div class="service-wrap">
                        <div class="st-four-section-title text-center">
                            <h3 class="sub-title color-2">{{ $solution->row_three_title }}</h3>
                            <h2 class="title mt-2">{{ $solution->row_three_header }}</h2>
                        </div>
                        <!-- Service Content Wrap Start -->
                        <div class="service-content-wrap">
                            <div class="row">
                                @if (!empty($solution->row_two_column_one_title) || !empty($solution->row_two_column_one_description))
                                    <div class="col-xl-3 col-sm-6">
                                        <!-- Service Item Start -->
                                        <div class="service-item-02">
                                            @if (
                                                !empty($solution->row_two_column_one_image) &&
                                                    file_exists(public_path('storage/' . $solution->row_two_column_one_image)))
                                                <div class="service-img">
                                                    <img src="{{ !empty($solution->row_two_column_one_image) && file_exists(public_path('storage/' . $solution->row_two_column_one_image)) ? asset('storage/' . $solution->row_two_column_one_image) : asset('images/ser-icon-4-5.png') }}"
                                                        alt="">
                                                </div>
                                                {{-- <div class="next-icon">
                                                    <img src="{{ !empty($solution->row_two_column_one_image) && file_exists(public_path('storage/' . $solution->row_two_column_one_image)) ? asset('storage/' . $solution->row_two_column_one_image) : asset('images/ser-icon-4-5.png') }}"
                                                        alt="">
                                                </div> --}}
                                            @endif
                                            <div class="service-content">
                                                <h3 class="title"><a
                                                        href="{{ $solution->row_two_column_one_link ?? 'javascript:void(0)' }}">{{ $solution->row_two_column_one_title }}</a>
                                                </h3>
                                                <p>{{ $solution->row_two_column_one_description }}</p>
                                            </div>
                                        </div>
                                        <!-- Service Item End -->
                                    </div>
                                @endif
                                @if (!empty($solution->row_two_column_two_title) || !empty($solution->row_two_column_two_description))
                                    <div class="col-xl-3 col-sm-6">
                                        <!-- Service Item Start -->
                                        <div class="service-item-02 service-2">
                                            @if (
                                                !empty($solution->row_two_column_two_image) &&
                                                    file_exists(public_path('storage/' . $solution->row_two_column_two_image)))
                                                <div class="service-img">
                                                    <img src="{{ !empty($solution->row_two_column_two_image) && file_exists(public_path('storage/' . $solution->row_two_column_two_image)) ? asset('storage/' . $solution->row_two_column_two_image) : asset('images/ser-icon-4-5.png') }}"
                                                        alt="">
                                                </div>
                                                {{-- <div class="next-icon">
                                                    <img src="{{ !empty($solution->row_two_column_two_image) && file_exists(public_path('storage/' . $solution->row_two_column_two_image)) ? asset('storage/' . $solution->row_two_column_two_image) : asset('images/ser-icon-4-5.png') }}"
                                                        alt="">
                                                </div> --}}
                                            @endif
                                            <div class="service-content">
                                                <h3 class="title"><a
                                                        href="{{ $solution->row_two_column_one_link ?? 'javascript:void(0)' }}">{{ $solution->row_two_column_two_title }}</a>
                                                </h3>
                                                <p>{{ $solution->row_two_column_two_description }}</p>
                                            </div>
                                        </div>
                                        <!-- Service Item End -->
                                    </div>
                                @endif
                                @if (!empty($solution->row_two_column_three_title) || !empty($solution->row_two_column_three_description))
                                    <div class="col-xl-3 col-sm-6">
                                        <!-- Service Item Start -->
                                        <div class="service-item-02">
                                            @if (
                                                !empty($solution->row_two_column_three_image) &&
                                                    file_exists(public_path('storage/' . $solution->row_two_column_three_image)))
                                                <div class="service-img">
                                                    <img src="{{ !empty($solution->row_two_column_three_image) && file_exists(public_path('storage/' . $solution->row_two_column_three_image)) ? asset('storage/' . $solution->row_two_column_three_image) : asset('images/ser-icon-4-5.png') }}"
                                                        alt="">
                                                </div>
                                                {{-- <div class="next-icon">
                                                    <img src="{{ !empty($solution->row_two_column_three_image) && file_exists(public_path('storage/' . $solution->row_two_column_three_image)) ? asset('storage/' . $solution->row_two_column_three_image) : asset('images/ser-icon4-6.png') }}"
                                                        alt="">
                                                </div> --}}
                                            @endif
                                            <div class="service-content">
                                                <h3 class="title"><a
                                                        href="{{ $solution->row_two_column_one_link ?? 'javascript:void(0)' }}">{{ $solution->row_two_column_three_title }}</a>
                                                </h3>
                                                <p>{{ $solution->row_two_column_three_description }}</p>
                                            </div>
                                        </div>
                                        <!-- Service Item End -->
                                    </div>
                                @endif
                                @if (!empty($solution->row_two_column_four_title) || !empty($solution->row_two_column_four_description))
                                    <div class="col-xl-3 col-sm-6">
                                        <!-- Service Item Start -->
                                        <div class="service-item-02 service-4">
                                            @if (
                                                !empty($solution->row_two_column_four_image) &&
                                                    file_exists(public_path('storage/' . $solution->row_two_column_four_image)))
                                                <div class="service-img">
                                                    <img src="{{ !empty($solution->row_two_column_four_image) && file_exists(public_path('storage/' . $solution->row_two_column_four_image)) ? asset('storage/' . $solution->row_two_column_four_image) : asset('images/ser-icon-4-8.png') }}"
                                                        alt="">
                                                </div>
                                                {{-- <div class="next-icon">
                                                    <img src="{{ !empty($solution->row_two_column_four_image) && file_exists(public_path('storage/' . $solution->row_two_column_four_image)) ? asset('storage/' . $solution->row_two_column_four_image) : asset('images/ser-icon-4-8.png') }}"
                                                        alt="">
                                                </div> --}}
                                            @endif
                                            <div class="service-content">
                                                <h3 class="title"><a
                                                        href="{{ $solution->row_two_column_one_link ?? 'javascript:void(0)' }}">{{ $solution->row_two_column_four_title }}</a>
                                                </h3>
                                                <p>{{ $solution->row_two_column_four_description }}</p>
                                            </div>
                                        </div>
                                        <!-- Service Item End -->
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-service-content text-center">
                                        <p>Learn more about <a href="service.html">More Services <i
                                                    class="fas fa-long-arrow-alt-right"></i></a></p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Service Content Wrap End -->
                    </div>
                    <!-- Service Wrap End -->
                </div>
            </div>
        @endif
        @if (
            !empty($solution->row_five_title) ||
                !empty($solution->row_five_description) ||
                !empty($solution->row_five_header) ||
                !empty($solution->row_five_btn_name) ||
                !empty($solution->row_five_link) ||
                !empty($solution->row_five_image))
            <div class="st-four-section st-four-skill-section section-padding">
                <div class="container">
                    <div class="skill-wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Skill Left Start -->
                                <div class="skill-left">
                                    <div class="st-four-section-title">
                                        <h2 class="title">{{ $solution->row_five_title }} </h2>
                                    </div>
                                    <p>{{ $solution->row_five_description }}</p>
                                    @if (!empty($solution->row_five_header))
                                        <div style="padding: 10px;border-radius: 5px 30px;">
                                            <h4>
                                                <img style="margin-top: -2rem;"
                                                    src="{{ asset('images/solution/template_four/Quote_02.png') }}"
                                                    alt=""> {{ $solution->row_five_header }}
                                                <img src="{{ asset('images/solution/template_four/Quote_01.png') }}"
                                                    alt="">
                                            </h4>
                                        </div>
                                    @endif
                                    @if (!empty($solution->row_five_btn_name) && !empty($solution->row_five_link))
                                        <div class="skill-author">
                                            <div class="st-three-hero">
                                                <a class="btn"
                                                    href="{{ $solution->row_five_link ?? 'javascript:void(0)' }}">{{ $solution->row_five_btn_name }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- Skill Left End -->
                            </div>
                            <div class="col-lg-6">
                                <div class="skill-right">
                                    {{-- <div class="experience">
                                        <h2 class="number">25</h2>
                                        <span>Years of <br> experience <br> on IT Services</span>
                                    </div> --}}
                                    <div class="pt-4">
                                        <img class="img-fluid"
                                            src="{{ !empty($solution->row_five_image) && file_exists(public_path('storage/' . $solution->row_five_image)) ? asset('storage/' . $solution->row_five_image) : asset('images/slider-overview-4.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="section st-four-subscribe-section">
            <div class="container">
                <div class="subscribe-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <!-- Subscribe Content Start -->
                            <div class="subscribe-content">
                                <div class="subscribe-icon">
                                    <img src="{{ asset('images/subscribe-icon-4.png') }}" alt="">
                                </div>
                                <h3 class="title">Subscribe to our newsletter</h3>
                            </div>
                            <!-- Subscribe Content End -->
                        </div>
                        <div class="col-lg-7">
                            <!-- Subscribe Form Start -->
                            <div class="subscribe-form">
                                <form action="{{ route('newsletter.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="email" name="email" class="w-100" placeholder="Your Email"
                                        style="border-radius: 5px;">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                            <!-- Subscribe Form End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (
            !empty($solution->count_one_icon) ||
                !empty($solution->count_one_number) ||
                !empty($solution->count_one_text) ||
                !empty($solution->count_two_icon) ||
                !empty($solution->count_two_number) ||
                !empty($solution->count_two_text) ||
                !empty($solution->count_three_icon) ||
                !empty($solution->count_three_number) ||
                !empty($solution->count_three_text) ||
                !empty($solution->count_four_icon) ||
                !empty($solution->count_four_number) ||
                !empty($solution->count_four_text))
            <div class="section st-two-counter-section" style="background: #f7e8e5;">
                <div class="container">
                    <div class="counter-wrap">
                        <div class="row">
                            @if (!empty($solution->count_one_icon) || !empty($solution->count_one_number) || !empty($solution->count_one_text))
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="single-counter">
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_one_icon) }}"
                                                alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter"
                                                style="color:#d33217;">{{ $solution->count_one_number }}</span>
                                            <p class="mb-0">{{ $solution->count_one_text }}</p>
                                        </div>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                            @endif
                            @if (!empty($solution->count_two_icon) || !empty($solution->count_two_number) || !empty($solution->count_two_text))
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="single-counter">
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_two_icon) }}"
                                                alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter"
                                                style="color:#d33217;">{{ $solution->count_two_number }}</span>
                                            <p class="mb-0">{{ $solution->count_two_text }}</p>
                                        </div>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                            @endif
                            @if (!empty($solution->count_three_icon) || !empty($solution->count_three_number) || !empty($solution->count_three_text))
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="single-counter">
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_three_icon) }}"
                                                alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter"
                                                style="color:#d33217;">{{ $solution->count_three_number }}</span>
                                            <p class="mb-0">{{ $solution->count_three_text }}</p>
                                        </div>
                                    </div>
                                    <!-- Single Counter End -->
                                </div>
                            @endif
                            @if (!empty($solution->count_four_icon) || !empty($solution->count_four_number) || !empty($solution->count_four_text))
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Counter Start -->
                                    <div class="single-counter">
                                        <div class="counter-img">
                                            <img src="{{ asset('storage/' . $solution->count_four_icon) }}"
                                                alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter"
                                                style="color:#d33217;">{{ $solution->count_four_number }}</span>
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
        <div class="section st-four-contact-section section-padding pt-5">
            <div class="container">
                <!-- Contact Wrap Start -->
                <div class="contact-wrap" style="background-image: url({{ asset('images/contact-shape-4.png') }});">
                    <div class="row">
                        <div class="col-xxl-5 col-lg-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info">
                                <div class="section-title">
                                    <h2 class="title fw-bold">To make requests for further information, contact us</h2>
                                </div>
                                <ul>
                                    <li>
                                        <!-- Contact Info Item Start -->
                                        <div class="contact-info-item d-flex align-items-center">
                                            <div class="contact-info-icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="contact-info-text">
                                                <h4 class="title my-1 mt-0">Contact Number</h4>
                                                @if (!empty($setting->phone_one))
                                                    <p class="mb-1">{{ $setting->phone_one }}</p>
                                                @endif
                                                @if (!empty($setting->whatsapp_number))
                                                    <p class="mb-1">{{ $setting->whatsapp_number }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Contact Info Item End -->
                                    </li>
                                    <li>
                                        <!-- Contact Info Item Start -->
                                        <div class="contact-info-item d-flex align-items-center">
                                            <div class="contact-info-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="contact-info-text">
                                                <h4 class="title my-1">Our Mail</h4>
                                                @if (!empty($setting->support_email))
                                                    <p>{{ $setting->support_email }}</p>
                                                @endif
                                                @if (!empty($setting->sales_email))
                                                    <p>{{ $setting->sales_email }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Contact Info Item End -->
                                    </li>
                                    @if (!empty($setting->address))
                                        <li>
                                            <div class="contact-info-item d-flex align-items-center">
                                                <div class="contact-info-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="contact-info-text">
                                                    <h4 class="title">Our Location</h4>
                                                    <p>{{ $setting->address }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-7 col-lg-6">
                            <div class="contact-form">
                                <div class="contact-form-wrap">
                                    <div class="heading-wrap text-center">
                                        <span class="sub-title">Leave us massage</span>
                                        <h3 class="title">How May We Help You!</h3>
                                    </div>
                                    <form action="{{ route('contactus.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="single-form">
                                                    <input name="name" placeholder="Name *"
                                                        value="{{ old('name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="single-form">
                                                    <input name="email" placeholder="Email *"
                                                        value="{{ old('email') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-form">
                                                    <input type="text" placeholder="Subject *">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="single-form">
                                                    <textarea name="message" rows="3" placeholder="Write Your Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="text-center mt-2 g-recaptcha d-flex justify-content-center"
                                                    data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-btn">
                                                    <button class="btn btn-3" type="submit">Send Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
