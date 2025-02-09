@extends('frontend.master')
@section('content')
    {{-- For Only This Template Start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/solutions.css') }}">
    {{-- For Only This Template End --}}
    <section style="background-color: #eee">
        <div class="container-fluid st-two-hero" style="background-image: url({{ !empty($solution->banner_image) && file_exists(public_path('storage/' . $solution->banner_image)) ? asset('storage/' . $solution->banner_image) : asset('frontend/images/no-row-img(580-326).png') }});">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="st-two-hero-content">
                            <h3 class="sub-title aos-init"><span>HOT !</span> We can managed all digital services
                            </h3>
                            <h2 class="title">Your partner for digital solutions</h2>
                            <p class="">We provide the most responsive and functional IT design for companies and
                                businesses worldwide.</p>
                            <div class="st-two-hero">
                                <a class="btn" href="javascript:void(0)">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-two-hero-img">
                            <img src="{{ asset('images/hero-img1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Featire --}}
    <section style="background-color: #eee">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center py-5">
                        <p class="text-primary">What we provide</p>
                        <h1>We provide truly prominent digital solutions.</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="border-0">
                        <div class="card st-two-f-card">
                            <div class="card-body">
                                <div>
                                    <img src="{{ asset('images/ser-icon1.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="title">Custom Software Solution</h2>
                                    <p class="para text-muted">Accelerate innovation with world-class tech teams We’ll match
                                        you to
                                        an entire remote team .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card st-two-f-card">
                        <div class="card-body">
                            <div>
                                <img src="{{ asset('images/ser-icon2.png') }}" alt="">
                            </div>
                            <div>
                                <h2 class="title">Business technology solution</h2>
                                <p class="para text-muted">Accelerate innovation with world-class tech teams We’ll match you
                                    to an entire remote team.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="border-0">
                        <div class="card st-two-f-card">
                            <div class="card-body">
                                <div>
                                    <img src="{{ asset('images/ser-icon3.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="title">Recovery & IT security</h2>
                                    <p class="para text-muted">Accelerate innovation with world-class tech teams We’ll match
                                        you to an entire remote team .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="border-0">
                        <div class="card st-two-f-card">
                            <div class="card-body">
                                <div>
                                    <img src="{{ asset('images/ser-icon4.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="title">Idea generate & solution</h2>
                                    <p class="para text-muted">Accelerate innovation with world-class tech teams We’ll match
                                        you to an entire remote team .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Featire End --}}
    {{-- Call To Action Start --}}
    <section>
        <div class="section st-two-cta-section section-padding">
            <div class="shape-1"></div>
            <div class="container">
                <div class="cta-wrap">
                    <div class="cta-icon">
                        <img src="{{ asset('images/cta-icon1.png') }}" alt="">
                    </div>
                    <div class="cta-content text-center">
                        <p>Stop wasting time and money on digital solution. <a href="#">Let’s talk with us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Call To Action End --}}
    <section class="st-two-about-section section-padding"
        style="background-image: url({{ asset('images/about-bg.png') }});">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- About Image Wrap Start -->
                        <div class="about-img-wrap">
                            <div class="about-img about-img-big">
                                <img src="{{ asset('images/about-1.jpg') }}" class="rounded-3" alt="">
                            </div>
                            <div class="about-img about-img-sm">
                                <img src="{{ asset('images/about-2.jpg') }}" class="rounded-3 shadow-sm" alt="">
                                <div class="shape-01"></div>
                            </div>
                        </div>
                        <!-- About Image Wrap End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- About Content Wrap Start -->
                        <div class="about-content-wrap">
                            <div class="section-title">
                                <h3 class="sub-title">Who we are</h3>
                                <h2 class="title">Highly Tailored IT Design, Management &amp; Support Services.</h2>
                            </div>
                            <p>Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of
                                incredible freelance talent for all your software development needs.</p>
                            <div class="play-btn">
                                <a class="popup-video"
                                    href="https://www.youtube.com/watch?time_continue=3&amp;v=_X0eYtY8T_U"><i
                                        class="fas fa-play"></i> <span>How we work</span></a>
                            </div>
                        </div>
                        <!-- About Content Wrap End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Content info --}}
    <div class="st-two-about-section-02 section-padding">
        <div class="container">
            <!-- About Wrapper Start -->
            <div class="about-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- About Left Start -->
                        <div class="about-02-left text-center">
                            <div class="section-title">
                                <h2 class="title">You know you did right when all your effort started to pay off in an unexpected and impressive way.</h2>
                            </div>
                            <div class="about-author">
                                <img src="{{ asset('images/sign.png') }}" alt="">
                                <h3 class="name fw-bold">Alen Morno sin</h3>
                                <span class="designation">CEO, Techmax</span>
                            </div>
                        </div>
                        <!-- About Left End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- About Right Start -->
                        <div class="about-02-right">
                            <p>Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of incredible freelance talent for all your software development needs.</p>
                            <div class="about-list">
                                <ul>
                                    <li>
                                        <span class="about-icon"><i class="fa-solid fa-check"></i></span>
                                        <span class="about-text">We always focus on technical excellence </span>
                                    </li>
                                    <li>
                                        <span class="about-icon"><i class="fa-solid fa-check"></i></span>
                                        <span class="about-text"> Wherever you’re going, we bring ideas and excitement </span>
                                    </li>
                                    <li>
                                        <span class="about-icon"><i class="fa-solid fa-check"></i></span>
                                        <span class="about-text">We’re consultants, guides, and partners for brands </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- About Right End -->
                    </div>
                </div>
            </div>
            <!-- About Wrapper End -->
        </div>
    </div>
    {{-- Content info End --}}
    {{-- Count info start --}}
    <div class="section st-two-counter-section">
        <div class="container">
            <div class="counter-wrap">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <!-- Single Counter Start -->
                        <div class="single-counter">
                            <div class="counter-img">
                                <img src="{{ asset('images/counter-1.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter">1790</span>
                                <p class="mb-0">Happy clients</p>
                            </div>
                        </div>
                        <!-- Single Counter End -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Single Counter Start -->
                        <div class="single-counter">
                            <div class="counter-img">
                                <img src="{{ asset('images/counter-2.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter">491</span>
                                <p class="mb-0">Finished projects</p>
                            </div>
                        </div>
                        <!-- Single Counter End -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Single Counter Start -->
                        <div class="single-counter">
                            <div class="counter-img">
                                <img src="{{ asset('images/counter-3.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter">245</span>
                                <p class="mb-0">Skilled Experts</p>
                            </div>
                        </div>
                        <!-- Single Counter End -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Single Counter Start -->
                        <div class="single-counter">
                            <div class="counter-img">
                                <img src="{{ asset('images/counter-1.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter">109</span>
                                <p class="mb-0">Media Posts</p>
                            </div>
                        </div>
                        <!-- Single Counter End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Count info End --}}
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
