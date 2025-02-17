@extends('frontend.master')
@section('content')
    {{-- For Only This Template Start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/solutions.css') }}">
    {{-- For Only This Template End --}}
    <div class="solution-pages">
        <!-- HERO SECTION -->
        <section id="hero-slider">
            <div class="hero-slider__wrapper">
                <div>
                    <div class="hero-slider__slide"
                        style="background-image: url('{{ !empty($solution->banner_image) && file_exists(public_path('storage/' . $solution->banner_image)) ? asset('storage/' . $solution->banner_image) : asset('frontend/images/no-row-img(580-326).png') }}');">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h2 class="pb-3">{{ $solution->name }}</h2>
                                    <h5 class="fw-normal pb-3 hero-para">
                                        {{ $solution->header }}
                                    </h5>
                                    <div class="banner-btn">
                                        <a href="#" class="btn-primary Content-watch me-2"
                                            style="text-decoration: none;color: #000000;background: rgb(255, 255, 255);padding: 10px 25px 8px;">View
                                            More</a>
                                        <a href="#" class="btn-outline-secondary Content-watch px-4"
                                            style="text-decoration: none">Become A Partner</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="">
            <div class="container-fluid" style="background-color: #385572">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex gap-3 py-3">
                                <a href="#overview" class="menu-links">Overview</a>
                                <a href="#solutions" class="menu-links">Contents</a>
                                <a href="#feature" class="menu-links">Feature</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="overview">
            <div class="container py-5 pt-0 my-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-3">
                            <h1 class="fw-bold">{{ $solution->row_two_title }}</h1>
                            <p class="pt-4 w-75 mx-auto" style="text-align: justify">
                                {{ $solution->row_two_header }}
                            </p>
                        </div>
                    </div>
                </div>
                @php
                    $cards = [$solution->card1, $solution->card2, $solution->card3, $solution->card4];
                    $cardsections2 = [$solution->card6, $solution->card7, $solution->card8];
                @endphp
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-4">
                        <h2 class="pt-4 fw-bold">
                            {{ $solution->row_five_title }}
                        </h2>
                    </div>
                    @foreach ($cards as $card)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div>
                                <div class="d-flex justify-content-center mb-4">
                                    <img class="card-img-top"
                                        src="{{ !empty($card->image) && file_exists(public_path('storage/' . $card->image)) ? asset('storage/' . $card->image) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                        alt="Card image cap" style="width: 300px;">

                                </div>
                                <div>
                                    <h5 class="text-center">{{ $card->title }}</h5>
                                    <ul class="">
                                        <li>{{ $card->short_des }}</li>
                                        {{-- <li>{{ Str::words($card->short_des) }}</li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid py-5 pt-0" id="section1">
                <div class="container">
                    <div class="row gx-0">
                        <div class="col-lg-12">
                            <h3 class="category-titles py-4 pt-5">
                                {{ $solution->row_three_title }}
                            </h3>
                            <p class="w-75 mx-auto" style="text-align: justify">
                                {{ $solution->row_three_header }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container py-5 pt-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active growth-tabs-triger" id="helth&Safety"
                                            data-bs-toggle="tab" data-bs-target="#safty" type="button" role="tab"
                                            aria-controls="safty" aria-selected="true">
                                            Environment, Health & Safety
                                        </button>
                                    </li>
                                    <li class="nav-item border-0 rounded-0" role="presentation">
                                        <button class="nav-link growth-tabs-triger" id="automation-tab"
                                            data-bs-toggle="tab" data-bs-target="#automation" type="button"
                                            role="tab" aria-controls="automation" aria-selected="false">
                                            Equipment Automation Management
                                        </button>
                                    </li>
                                    <li class="nav-item border-0 rounded-0" role="presentation">
                                        <button class="nav-link growth-tabs-triger" id="maintenance-tab"
                                            data-bs-toggle="tab" data-bs-target="#maintenance" type="button"
                                            role="tab" aria-controls="maintenance" aria-selected="false">
                                            Total Productive Maintenance
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content pt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="safty" role="tabpanel"
                                aria-labelledby="helth&Safety">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/solutions/Solutions-2-820x460.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="pt-4 pt-lg-0">Environment Health Safety Solution</h4>
                                        <p class="">
                                            Intelligent Facility Management and Sustainability
                                        </p>
                                        <p>
                                            The iFactory EHS solution is an EHS management system
                                            for carbon neutral operations, employee health
                                            management, and a safer work place.
                                        </p>
                                        <b class="text-white">Benefits</b>
                                        <ul>
                                            <li>Compliant with ISO 50001</li>
                                            <li>Reduce carbon footprint</li>
                                            <li>
                                                Reduce equipment data integration and rework time
                                                &amp; costs
                                            </li>
                                            <li>Improve workplace safety and manage incidents</li>
                                            <li>Real-time mobile management</li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-primary rounded-0 Content-watch px-4"
                                                style="text-decoration: none" tabindex="0">Become A Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="automation" role="tabpanel" aria-labelledby="automation-tab">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/solutions/Solutions-2-820x460.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="pt-4 pt-lg-0">Environment Health Safety Solution</h4>
                                        <p class="">
                                            Intelligent Facility Management and Sustainability
                                        </p>
                                        <p>
                                            The iFactory EHS solution is an EHS management system
                                            for carbon neutral operations, employee health
                                            management, and a safer work place.
                                        </p>
                                        <b class="text-white">Benefits</b>
                                        <ul>
                                            <li>Compliant with ISO 50001</li>
                                            <li>Reduce carbon footprint</li>
                                            <li>
                                                Reduce equipment data integration and rework time
                                                &amp; costs
                                            </li>
                                            <li>Improve workplace safety and manage incidents</li>
                                            <li>Real-time mobile management</li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-primary rounded-0 Content-watch px-4"
                                                style="text-decoration: none" tabindex="0">Become A Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="maintenance" role="tabpanel"
                                aria-labelledby="maintenance-tab">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/solutions/Solutions-2-820x460.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="pt-4 pt-lg-0">Environment Health Safety Solution</h4>
                                        <p class="">
                                            Intelligent Facility Management and Sustainability
                                        </p>
                                        <p>
                                            The iFactory EHS solution is an EHS management system
                                            for carbon neutral operations, employee health
                                            management, and a safer work place.
                                        </p>
                                        <b class="text-white">Benefits</b>
                                        <ul>
                                            <li>Compliant with ISO 50001</li>
                                            <li>Reduce carbon footprint</li>
                                            <li>
                                                Reduce equipment data integration and rework time
                                                &amp; costs
                                            </li>
                                            <li>Improve workplace safety and manage incidents</li>
                                            <li>Real-time mobile management</li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-primary rounded-0 Content-watch px-4"
                                                style="text-decoration: none" tabindex="0">Become A Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-colors-ind py-5" id="solutions">
            <div class="container py-5 pt-0 pb-0 pb-lg-5">
                <h1 class="fw-bold text-center pb-5 text-white">Related Insights</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 col-12" style="border-bottom: 1px solid white">
                                <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist"
                                    style="margin-bottom: -4.1px;">
                                    <!-- First Set of Tabs -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active growth-tabs-triger text-white" id="first-tab-1"
                                            data-bs-toggle="tab" data-bs-target="#first-content-1" type="button"
                                            role="tab" aria-controls="first-content-1" aria-selected="true">
                                            Environment, Health & Safety
                                        </button>
                                    </li>
                                    <li class="nav-item border-0 rounded-0" role="presentation">
                                        <button class="nav-link growth-tabs-triger text-white" id="first-tab-2"
                                            data-bs-toggle="tab" data-bs-target="#first-content-2" type="button"
                                            role="tab" aria-controls="first-content-2" aria-selected="false">
                                            Equipment Automation Management
                                        </button>
                                    </li>
                                    <li class="nav-item border-0 rounded-0" role="presentation">
                                        <button class="nav-link growth-tabs-triger text-white" id="first-tab-3"
                                            data-bs-toggle="tab" data-bs-target="#first-content-3" type="button"
                                            role="tab" aria-controls="first-content-3" aria-selected="false">
                                            Total Productive Maintenance
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content pt-5" id="myTabContent">
                            <!-- First Set of Tab Contents -->
                            <div class="tab-pane fade show active" id="first-content-1" role="tabpanel"
                                aria-labelledby="first-tab-1">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/solutions/Solutions-2-820x460.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="text-white pb-3 pt-4 pt-lg-0">
                                            Environment Health Safety Solution
                                        </h3>
                                        <p class="text-white">
                                            Intelligent Facility Management and Sustainability
                                        </p>
                                        <p class="text-white">
                                            "M2M (machine-to-machine) connectivity can more
                                            accurately indicate the real-time status and production
                                            efficiency of a machine, while improving the reliability
                                            of data related to production times. The time required
                                            each day for personnel to process production information
                                            has also
                                        </p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-light rounded-0 Content-watch px-4"
                                                style="text-decoration: none" tabindex="0">Become A Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="first-content-2" role="tabpanel"
                                aria-labelledby="first-tab-2">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/solutions/Solutions-2-820x460.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="text-white pb-3 pt-4 pt-lg-0">
                                            Environment Health Safety Solution
                                        </h3>
                                        <p class="text-white">
                                            Intelligent Facility Management and Sustainability
                                        </p>
                                        <p class="text-white">
                                            "M2M (machine-to-machine) connectivity can more
                                            accurately indicate the real-time status and production
                                            efficiency of a machine, while improving the reliability
                                            of data related to production times. The time required
                                            each day for personnel to process production information
                                            has also
                                        </p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-light rounded-0 Content-watch px-4"
                                                style="text-decoration: none" tabindex="0">Become A Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="first-content-3" role="tabpanel"
                                aria-labelledby="first-tab-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/solutions/Solutions-2-820x460.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="text-white pb-3 pt-4 pt-lg-0">
                                            Environment Health Safety Solution
                                        </h3>
                                        <p class="text-white">
                                            Intelligent Facility Management and Sustainability
                                        </p>
                                        <p class="text-white">
                                            "M2M (machine-to-machine) connectivity can more
                                            accurately indicate the real-time status and production
                                            efficiency of a machine, while improving the reliability
                                            of data related to production times. The time required
                                            each day for personnel to process production information
                                            has also
                                        </p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-light rounded-0 Content-watch px-4"
                                                style="text-decoration: none" tabindex="0">Become A Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="background-color: #eee">
            <div class="container py-5">
                <div class="row">
                    @foreach ($cardsections2 as $cardsection)
                        <div class="col-lg-4">
                            <div>
                                <div class="d-flex justify-content-center mb-4">
                                    <img class="card-img-top"
                                        src="{{ !empty($cardsection->image) && file_exists(public_path('storage/' . $cardsection->image)) ? asset('storage/' . $cardsection->image) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                        alt="Card image cap" style="width: 300px; ">

                                </div>
                                <div>
                                    <h5 class="text-center">
                                        {{ $cardsection->title }}
                                    </h5>
                                    <ul class="">
                                        <li>{{ $cardsection->short_des }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- <section style="background-color: #eee">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="fw-bold text-center pb-5">Related Insights</h1>
                        <div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/brochure/Brochure-3-820x460.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <h5 class="py-4 releted-title">
                                                Smart Manufacturing Ecosystem
                                            </h5>
                                            <button class="btn btn-primary rounded-0">
                                                View Online
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/brochure/Brochure-3-820x460.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <h5 class="py-4 releted-title">
                                                Smart Manufacturing Ecosystem
                                            </h5>
                                            <button class="btn btn-primary rounded-0">
                                                View Online
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div>
                                            <img class="img-fluid"
                                                src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/brochure/Brochure-3-820x460.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <h5 class="py-4 releted-title">
                                                Smart Manufacturing Ecosystem
                                            </h5>
                                            <button class="btn btn-primary rounded-0">
                                                View Online
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="py-5" id="feature">
            <h1 class="fw-bold text-center pb-5">Featured Products</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-product">
                            @foreach ($products as $product)
                                <div class="product-items">
                                    <div class="product-card">
                                        <img src="{{ !empty($product->thumbnail) && file_exists(public_path($product->thumbnail)) ? asset($product->thumbnail) : asset('frontend/images/random-no-img.png') }}"
                                            alt="Product Image" class="product-img" />
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <h1 class="product-title">
                                                {{ Str::words($product->name, 15) }}
                                            </h1>
                                        </a>
                                        <div class="overlay-st-one">
                                            <div class="overlay-st-one-text">
                                                <p class="overlay-st-one-para">
                                                    {{ Str::words($product->short_desc,30) }}
                                                </p>
                                                <a href="{{ route('product.details', $product->slug) }}"
                                                    class="overlay-st-one-button">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($features->count() > 0)
            <section class="bg-colors-ind py-5">
                <div class="container">
                    <div class="row">
                        <div class="py-5 pt-0">
                            <h1 class="fw-bold text-center text-white">
                                Bring {{ $solution->name }} features to You
                            </h1>
                        </div>
                        @foreach ($features as $feature)
                            <div class="col-lg-3 col-12">
                                <div class="card border-0 rounded-0 mt-4"
                                    style="background-color: rgba(255, 255, 255, 0.35)">
                                    <div>
                                        <img src="{{ !empty($feature->logo) && file_exists(public_path('storage/' . $feature->logo)) ? asset('storage/' . $feature->logo) : asset('frontend/images/service-no-img.png') }}"
                                            alt="{{ $feature->badge }}" class="card-img-top img-fluid rounded-0"
                                            loading="lazy" />
                                    </div>
                                    <div class="p-3 text-center">
                                        <a href="{{ route('feature.details', $feature->id) }}">
                                            <h5 class="fw-bold text-white">{{ $feature->badge }}</h5>
                                            <p class="text-white">
                                                {{ Str::words($feature->header, 10, $end = '') }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
