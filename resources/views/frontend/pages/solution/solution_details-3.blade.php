@extends('frontend.master')
@section('content')
    {{-- For Only This Template Start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/solutions.css') }}">
    <div class="st-template-3">
        {{-- Solution Tree Hero Section --}}
        <section class="st-three-hero p-5 pb-0">
            <div class="st-three-hero-wrap" style="background-image: url({{ !empty($solution->banner_image) && file_exists(public_path('storage/' . $solution->banner_image)) ? asset('storage/' . $solution->banner_image) : asset('images/hero-bg3.jpg') }})">
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
                                    <img src="{{ asset('images/hero-img-3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding st-three-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-wrap">
                            <div class="section-three-title text-center">
                                <h3 class="sub-title">Who we are</h3>
                                <h2 class="title">An artificial intelligence company that excels in visual recognition,
                                    solving
                                    real-world problems
                                    for businesses.</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 pt-5">
                    <div class="col-lg-6">
                        <div class="st-three-about-img-wrap">
                            <div class="st-three-about-img st-three-about-img-big">
                                <img src="{{ asset('images/about-big3.jpg') }}" alt="">
                            </div>
                            <div class="st-three-about-img st-three-about-img-sm">
                                <img src="{{ asset('images/about-sm3.jpg') }}" alt="">
                                <div class="shape-01"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-three-about-content">
                            <p class="title">Accelerate innovation with world-class tech teams We’ll match you to an entire
                                remote team of incredible freelance talent</p>
                            <p class="text">Accelerate innovation with world-class tech teams We’ll match you to an entire
                                remote team of incredible freelance talent for all your software development needs.</p>
                            <div class="mt-5">
                                <div class="d-flex align-items-center mb-5">
                                    <div>
                                        <img src="{{ asset('images/about-icon-3-1.png') }}" alt="">
                                    </div>
                                    <div class="st-three-about-list-items ps-4">
                                        <h1 class="title">Augmented Reality</h1>
                                        <p class="mb-0">Accelerate innovation with world-class tech teams</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-5">
                                    <div>
                                        <img src="{{ asset('images/about-icon-3-2.png') }}" alt="">
                                    </div>
                                    <div class="st-three-about-list-items ps-4">
                                        <h1 class="title">Augmented Reality</h1>
                                        <p class="mb-0">Accelerate innovation with world-class tech teams</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                        <h2 class="title text-white">To make requests for further information, contact us</h2>
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
                                    <h3 class="number">+44 920 090 505</h3>
                                </div>
                                <!-- Cta Button End -->
                            </div>
                        </div>
                    </div>
                    <!-- Cta Wrap End -->
                </div>
            </div>
        </section>
        <section class="section-padding pb-0"
            style="margin-top: 300px; background-image: url({{ asset('images/service-bg3.jpg') }})">
            <div class="container st-three-services-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card p-5 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="text-center py-5 pt-0">
                                    <p class="text-primary uppercase">Whats included in service</p>
                                    <h3 class="fw-bold">Building everything you need for your business</h3>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="p-3">
                                                <div class="pb-4">
                                                    <img src="{{ asset('images/ser-icon-3-1.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="fw-bold">AI base business solution</h5>
                                                    <p>Accelerate innovation with world-class tech teams We’ll match you to
                                                        an
                                                        entire remote team .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="p-3">
                                                <div class="pb-4">
                                                    <img src="{{ asset('images/ser-icon-3-2.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="fw-bold">Chatbot with Real meeting</h5>
                                                    <p>Accelerate innovation with world-class tech teams We’ll match you to
                                                        an
                                                        entire remote team .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="p-3">
                                                <div class="pb-4">
                                                    <img src="{{ asset('images/ser-icon-3-3.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="fw-bold">Automate data saving</h5>
                                                    <p>Accelerate innovation with world-class tech teams We’ll match you to
                                                        an
                                                        entire remote team .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="p-3">
                                                <div class="pb-4">
                                                    <img src="{{ asset('images/ser-icon-3-4.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="fw-bold">Robotic Automation</h5>
                                                    <p>Accelerate innovation with world-class tech teams We’ll match you to
                                                        an entire remote team .</p>
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
        <section>
            <div class="st-three-counter-section-03"
                style="background-image: url({{ asset('images/counter-bg-3.jpg') }});">
                <div class="container">
                    <div class="counter-wrap">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="st-three-single-counter-02 text-center">
                                    <span class="counter">354</span>
                                    <p>Completed Projects</p>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="st-three-single-counter-02 text-center">
                                    <span class="counter">119</span>
                                    <p>Robotic Automation</p>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="st-three-single-counter-02 text-center">
                                    <span class="counter">99</span>
                                    <p>Web Site Analyse</p>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <!-- Single Counter Start -->
                                <div class="st-three-single-counter-02 text-center">
                                    <span class="counter">321</span>
                                    <p>Clients Supoort Done</p>
                                </div>
                                <!-- Single Counter End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Solution Tree Hero Section End --}}
    </div>
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
