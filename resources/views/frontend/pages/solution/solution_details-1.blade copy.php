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
                            Driving Perfect Strategies for Three Core Trends of
                            Transformation
                        </h2>
                    </div>
                    @foreach ($cards as $card)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div>
                                <div class="d-flex justify-content-start">
                                    <img class="card-img-top"
                                        src="{{ !empty($card->image) && file_exists(public_path('storage/' . $card->image)) ? asset('storage/' . $card->image) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                        alt="Card image cap" width="150px" height="250px">
                                    {{-- <img class="text-start img-fluid service_images"
                                        src="https://media.istockphoto.com/id/1433310548/vector/banner-safety-health-environment.jpg?s=612x612&w=0&k=20&c=JIUImxjAEgbsz6nDTfib-063Z5MPvWVZrbO4VEI7610="
                                        alt="" /> --}}
                                </div>
                                <div>
                                    <h5 class="text-center">{{ $card->title }}</h5>
                                    <ul class="">
                                        <li>{{ Str::words($card->short_des, 22, '...') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="industries">
            <div class="container-fluid py-5 pb-0" style="background-color: #eee">
                <div class="container">
                    <div class="row gx-0">
                        <div class="col-lg-12">
                            <h3 class="category-titles pb-4">Focused Industry Segments</h3>
                        </div>
                    </div>
                    <div class="row gx-0">
                        <div class="col-lg-10">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div>
                                        <div>
                                            <img class="img-fluid catory-banner-img"
                                                src="https://advcloudfiles.advantech.com/cms/97db910f-c942-4864-be43-96ec19cf9e95/Resources%20Case%20Study%20Featured%20Image%20for%20Detail%20Page/200552361-001cms.jpg"
                                                alt="" />
                                        </div>
                                        <div class="category-imgs-content">
                                            <h1 class="text-white">Food & Beverage</h1>
                                        </div>
                                        <div class="category-content">
                                            <div class="row bg-white p-4 m-0" style="border-bottom: 4px solid #0080c3">
                                                <div class="col-lg-6">
                                                    <h3 class="pb-3">Challenges</h3>
                                                    <ul>
                                                        <li>Complex process</li>
                                                        <li>
                                                            The failure and time wastes in the manufacturing
                                                            process
                                                        </li>
                                                        <li>Food safety and quality control</li>
                                                        <li>
                                                            Energy-intensive process and environmental
                                                            challenges
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h3 class="pb-3">How We Solve</h3>
                                                    <ul>
                                                        <li>
                                                            Optimized production flexibility and efficiency
                                                        </li>
                                                        <li>
                                                            IoT connection for easier data collection and
                                                            equipment monitoring
                                                        </li>
                                                        <li>
                                                            Improved quality control with AI technology and
                                                            food traceability
                                                        </li>
                                                        <li>
                                                            Protects the environment and maximizes energy
                                                            efficiency
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-12">
                                                    <a href="#"
                                                        class="btn btn-outline-primary rounded-0 Content-watch px-4"
                                                        style="text-decoration: none" tabindex="0">Become A Partner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div>
                                        <div>
                                            <img class="img-fluid catory-banner-img" src="./img/category-img.png"
                                                alt="" />
                                        </div>
                                        <div class="category-imgs-content">
                                            <h1>Food & Beverage</h1>
                                        </div>
                                        <div class="category-content">
                                            <div class="row bg-white p-4 m-0" style="border-bottom: 4px solid #0080c3">
                                                <div class="col-lg-6">
                                                    <h3 class="pb-3">Challenges</h3>
                                                    <ul>
                                                        <li>Complex process</li>
                                                        <li>
                                                            The failure and time wastes in the manufacturing
                                                            process
                                                        </li>
                                                        <li>Food safety and quality control</li>
                                                        <li>
                                                            Energy-intensive process and environmental
                                                            challenges
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h3 class="pb-3">How We Solve</h3>
                                                    <ul>
                                                        <li>
                                                            Optimized production flexibility and efficiency
                                                        </li>
                                                        <li>
                                                            IoT connection for easier data collection and
                                                            equipment monitoring
                                                        </li>
                                                        <li>
                                                            Improved quality control with AI technology and
                                                            food traceability
                                                        </li>
                                                        <li>
                                                            Protects the environment and maximizes energy
                                                            efficiency
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-12">
                                                    <a href="#"
                                                        class="btn btn-outline-primary rounded-0 Content-watch px-4"
                                                        style="text-decoration: none" tabindex="0">Become A Partner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div>
                                        <div>
                                            <img class="img-fluid catory-banner-img" src="./img/category-img.png"
                                                alt="" />
                                        </div>
                                        <div class="category-imgs-content">
                                            <h1>Food & Beverage</h1>
                                        </div>
                                        <div class="category-content">
                                            <div class="row bg-white p-4 m-0" style="border-bottom: 4px solid #0080c3">
                                                <div class="col-lg-6">
                                                    <h3 class="pb-3">Challenges</h3>
                                                    <ul>
                                                        <li>Complex process</li>
                                                        <li>
                                                            The failure and time wastes in the manufacturing
                                                            process
                                                        </li>
                                                        <li>Food safety and quality control</li>
                                                        <li>
                                                            Energy-intensive process and environmental
                                                            challenges
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h3 class="pb-3">How We Solve</h3>
                                                    <ul>
                                                        <li>
                                                            Optimized production flexibility and efficiency
                                                        </li>
                                                        <li>
                                                            IoT connection for easier data collection and
                                                            equipment monitoring
                                                        </li>
                                                        <li>
                                                            Improved quality control with AI technology and
                                                            food traceability
                                                        </li>
                                                        <li>
                                                            Protects the environment and maximizes energy
                                                            efficiency
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-12">
                                                    <a href="#"
                                                        class="btn btn-outline-primary rounded-0 Content-watch px-4"
                                                        style="text-decoration: none" tabindex="0">Become A Partner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <ul class="nav nav-tabs flex-column border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu active"
                                        id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                                        role="tab" aria-controls="home" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-1-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Food & Beverage</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="profile-tab"
                                        data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-4-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Metal Processing</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="contact-tab"
                                        data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-6-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Footwear & Textile</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="contact-tab"
                                        data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-8-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Semiconductor</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="contact-tab"
                                        data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-1-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Automotive & EV</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="contact-tab"
                                        data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-1-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">PCB</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="contact-tab"
                                        data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-1-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Pulp & Paper</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link w-100 rounded-0 border-0 category-tabs-menu" id="contact-tab"
                                        data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img class="img-fluid" width="65px" height="65px"
                                                    src="https://advcloudfiles.advantech.com/web/Images/Solutions/iFactory/202212version/industries/Focused-icon-1-460x460.png"
                                                    alt="Food &amp; Beverage" loading="lazy" />
                                            </div>
                                            <div class="text-start">Electrical Machinery</div>
                                        </div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid py-5 pt-0" id="section1">
                <div class="container">
                    <div class="row gx-0">
                        <div class="col-lg-12">
                            <h3 class="category-titles py-4 pt-5">
                                Accelerate Growth with WISE-iFactory
                            </h3>
                            <p class="w-75 mx-auto" style="text-align: justify">
                                To confront future challenges, Advantech developed iFactory
                                solutions which combine leading edge computing hardware and
                                easy-to-use software to offer Low-code platforms that
                                accelerate digital transformation and Industry 4.0. To develop
                                complete industrial solutions that enable manufactures to
                                easily move forward, Advantech provides the WISE-IoT platform:
                                iFactory EHS, iFactory EAM, and iFactory TPM that allow DFSP
                                (Domain-Focused Solution Partners) easy access to all featured
                                modules. This helps them easily collaborate with Advantech to
                                offer rich services and tools to their focused vertical
                                industry customers.
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
                                <div class="d-flex justify-content-start">
                                    <img class="card-img-top"
                                        src="{{ !empty($cardsection->image) && file_exists(public_path('storage/' . $cardsection->image)) ? asset('storage/' . $cardsection->image) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                        alt="Card image cap" width="150px" height="250px">
                                    {{-- <img class="text-start img-fluid service_images"
                                            src="https://media.istockphoto.com/id/1433310548/vector/banner-safety-health-environment.jpg?s=612x612&w=0&k=20&c=JIUImxjAEgbsz6nDTfib-063Z5MPvWVZrbO4VEI7610="
                                            alt="" /> --}}
                                </div>
                                <div>
                                    <h5 class="text-center">{{ $cardsection->title }}</h5>
                                    <ul class="">
                                        <li>{{ Str::words($cardsection->short_des, 22, '...') }}</li>
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
                                                    An easy-to-use tool to speed up the visualization of
                                                    all machine status and health conditions
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
