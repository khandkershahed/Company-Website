@extends('frontend.master')
@section('content')
    @include('frontend.pages.blogs.style_partial')
    <div>
        <section class="blogs-banners"
            style="background-image: url('{{ asset('frontend/images/blog.jpg') }}');">

        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card research-alert-box bg-white shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end" style="padding: 5px 1.5rem;">
                                    <h2 class="mb-0 fw-bold">Recent Blogs</h2>
                                    <div class="research-page__research-alerts-header-threat d-flex">
                                        Today's Landscape
                                        <div style="margin-top: -12px" class="ps-2">
                                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 31.998 29.996">
                                                <g id="Group_7171" data-name="Group 7171"
                                                    transform="translate(0.002 -1.004)">
                                                    <path id="Path_12136" data-name="Path 12136"
                                                        d="M31.633,26.522,18.683,2.6a3.053,3.053,0,0,0-5.366,0L.367,26.522A3,3,0,0,0,.43,29.514,3.024,3.024,0,0,0,3.05,31h25.9a3.038,3.038,0,0,0,2.683-4.478ZM17.848,11l-.714,10h-2L14.42,11ZM16.134,27a1.778,1.778,0,1,1,1.778-1.778A1.778,1.778,0,0,1,16.134,27Z"
                                                        fill="#ff8e3d" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <ul class="research-page__research-alerts-list" style="padding: 5px 1.5rem;">
                                    @foreach ($collection as $item)
                                        <li>
                                            <a href="blog-single.html" class="text-muted">
                                                CVE-2025-21590: Juniper Networks published an
                                                out-of-cycle bulletin for a zero-day in Junos OS that
                                                was exploited in the wild by UNC3886. Apply the
                                                available patches as soon as possible.
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="fw-bold text-center">Meet Tenable Research</h1>
                    </div>
                    <div class="col-lg-12 my-0 my-lg-5">
                        <div class="row">
                            <div class="col-lg-3">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs flex-column border-0"
                                    style="border-right: 1px solid #eee !important" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link research-box-nav-btn active w-100" id="tabs-one-tab"
                                            data-bs-toggle="tab" data-bs-target="#tabs-one" type="button" role="tab"
                                            aria-controls="tabs-one" aria-selected="true">
                                            <span class="research-box-nav-btn-title">Vulnerability Intelligence</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link research-box-nav-btn w-100" id="tabs-two-tab"
                                            data-bs-toggle="tab" data-bs-target="#tabs-two" type="button" role="tab"
                                            aria-controls="tabs-two" aria-selected="false">
                                            <span class="research-box-nav-btn-title">Audits & Compliance</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link research-box-nav-btn w-100" id="tabs-three-tab"
                                            data-bs-toggle="tab" data-bs-target="#tabs-three" type="button" role="tab"
                                            aria-controls="tabs-three" aria-selected="false">
                                            <span class="research-box-nav-btn-title">Security Response</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link research-box-nav-btn w-100" id="tabs-four-tab"
                                            data-bs-toggle="tab" data-bs-target="#tabs-four" type="button" role="tab"
                                            aria-controls="tabs-four" aria-selected="false">
                                            <span class="research-box-nav-btn-title">Zero-Day Research</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link research-box-nav-btn w-100" id="tabs-five-tab"
                                            data-bs-toggle="tab" data-bs-target="#tabs-five" type="button"
                                            role="tab" aria-controls="tabs-five" aria-selected="false">
                                            <span class="research-box-nav-btn-title">Attack Path Research</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link research-box-nav-btn w-100" id="tabs-six-tab"
                                            data-bs-toggle="tab" data-bs-target="#tabs-six" type="button"
                                            role="tab" aria-controls="tabs-six" aria-selected="false">
                                            <span class="research-box-nav-btn-title">Asset Management</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-9">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-one" role="tabpanel"
                                        aria-labelledby="tabs-one-tab">
                                        <div class="row ps-0 ps-lg-5">
                                            <div class="col-lg-6">
                                                <div>
                                                    <img class="img-fluid rounded-2"
                                                        src="https://www.tenable.com/themes/custom/tenable/img/research/tenable_research_alliance.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="pt-4 ps-lg-4 ps-0">
                                                    The Tenable Research Alliance Program is an
                                                    intelligence sharing initiative among leading
                                                    technology organizations to help protect customers
                                                    before attackers become aware of exposures through
                                                    formal vendor announcements.
                                                </p>
                                                <a href="#"
                                                    class="text-primary fw-semibold ps-lg-4 ps-0"><small>Learn About the
                                                        Tenable Research Alliance
                                                        Program</small></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-two" role="tabpanel" aria-labelledby="tabs-two-tab">
                                        tabs-two
                                    </div>
                                    <div class="tab-pane" id="tabs-three" role="tabpanel"
                                        aria-labelledby="tabs-three-tab">
                                        tabs-three
                                    </div>
                                    <div class="tab-pane" id="tabs-four" role="tabpanel"
                                        aria-labelledby="tabs-four-tab">
                                        tabs-four
                                    </div>
                                    <div class="tab-pane" id="tabs-five" role="tabpanel"
                                        aria-labelledby="tabs-five-tab">
                                        tabs-five
                                    </div>
                                    <div class="tab-pane" id="tabs-six" role="tabpanel" aria-labelledby="tabs-six-tab">
                                        tabs-six
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr />
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-end blog-socials">
                            <a href="blog-single.html" class="fs-3 pe-3">
                                <span tooltip="Youtube">
                                    <i class="fab fa-youtube blogs-icons"></i>
                                </span>
                            </a>
                            <a href="blog-single.html" class="fs-3 pe-3">
                                <span tooltip="Linkedin">
                                    <i class="fab fa-linkedin-in blogs-icons"></i>
                                </span>
                            </a>
                            <a href="blog-single.html" class="fs-3 pe-3">
                                <span tooltip="Global">
                                    <i class="fas fa-globe blogs-icons"></i>
                                </span>
                            </a>
                            <a href="blog-single.html" class="fs-3">
                                <span tooltip="Email">
                                    <i class="fas fa-envelope blogs-icons"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5">
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    <div class="col-md-9 order-2 order-md-1">
                        <!-- Blog Lists Start -->
                        <!-- First Items -->
                        <div class="mb-5">
                            <a href="blog-single.html">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="blog-list-img">
                                            <img class="img-fluid rounded-2"
                                                src="https://cdn.thewirecutter.com/wp-content/media/2021/08/surgeprotectors-2048px-3x2-1.jpg?auto=webp&quality=75&crop=4:3,smart&width=1024"
                                                alt="" />
                                            <div class="overlay-blogs">
                                                <div class="text-center">
                                                    <div class="pb-4 blog-link-icons">
                                                        <i class="fas fa-paperclip fs-1 text-white"></i>
                                                    </div>
                                                    <p>
                                                        Safely Protect Signal Lines from Surges with the
                                                        M-LB-4000 Surge Protector
                                                    </p>
                                                    <span class="text-black fw-normal">Explosion Protection</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="blog-list-content">
                                            <h2 class="fw-bold text-black">
                                                When Do I Use Which Surge Protector? Three Solutions
                                                at a Glance.
                                            </h2>
                                            <p class="pt-4 text-muted">
                                                Pepperl+Fuchs offers the right surge protection
                                                barriers for every infrastructure, whether for signal
                                                lines, supply lines, fieldbus, or Ethernet-APL
                                                applications.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="blog-footer text-start">
                                        <p class="mb-0 py-2">
                                            By
                                            <span class="blog-color">
                                                <a href="blog-single.html" class="blog-color links">
                                                    Blog Team
                                                </a>
                                            </span>
                                            | <span>January 10, 2025</span> |
                                            <span class="">
                                                <a href="blog-single.html" class="blog-color links">Explosion
                                                    Protection</a>
                                                <a href="blog-single.html" class="blog-color links">Knowledge Base</a>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            <a href="blog-single.html" class="blog-color blog-more">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- First Items End -->
                        <!-- First Items -->
                        <div class="mb-5">
                            <a href="blog-single.html">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="blog-list-img">
                                            <img class="img-fluid rounded-2"
                                                src="https://lightningmaster.com/wp-content/uploads/2017/10/Surge-applications-1024x709.jpg"
                                                alt="" />
                                            <div class="overlay-blogs">
                                                <div class="text-center">
                                                    <div class="pb-4 blog-link-icons">
                                                        <i class="fas fa-paperclip fs-1 text-white"></i>
                                                    </div>
                                                    <p>
                                                        Safely Protect Signal Lines from Surges with the
                                                        M-LB-4000 Surge Protector
                                                    </p>
                                                    <span class="text-black fw-normal">Explosion Protection</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="blog-list-content">
                                            <h2 class="fw-bold text-black">
                                                Safely Protect Signal Lines from Surges with the
                                                M-LB-4000 Surge Protector
                                            </h2>
                                            <p class="pt-4 text-muted">
                                                Lightning and surge damage are among the most common
                                                causes of damage to electronics. Find out how you can
                                                protect your system and signal lines safely and easily
                                                from overvoltages with the M-LB-4000 surge protection
                                                system.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="blog-footer text-start">
                                        <p class="mb-0 py-2">
                                            By
                                            <span class="blog-color">
                                                <a href="blog-single.html" class="blog-color links">
                                                    Blog Team
                                                </a>
                                            </span>
                                            | <span>January 10, 2025</span> |
                                            <span class="">
                                                <a href="blog-single.html" class="blog-color links">Explosion
                                                    Protection</a>
                                                <a href="blog-single.html" class="blog-color links">Knowledge Base</a>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            <a href="blog-single.html" class="blog-color blog-more">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- First Items End -->
                        <!-- First Items -->
                        <div class="mb-5">
                            <a href="blog-single.html">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="blog-list-img">
                                            <img class="img-fluid rounded-2"
                                                src="https://www.powerup.at/wp-content/uploads/2023/11/independent-power-producer-jpg.webp"
                                                alt="" />
                                            <div class="overlay-blogs">
                                                <div class="text-center">
                                                    <div class="pb-4 blog-link-icons">
                                                        <i class="fas fa-paperclip fs-1 text-white"></i>
                                                    </div>
                                                    <p>
                                                        Energy Efficiency and Cost Savings: PS1000 Power
                                                        Supplies in Industrial Applications
                                                    </p>
                                                    <span class="text-black fw-normal">Explosion Protection</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="blog-list-content">
                                            <h2 class="fw-bold text-black">
                                                Energy Efficiency and Cost Savings: PS1000 Power
                                                Supplies in Industrial Applications
                                            </h2>
                                            <p class="pt-4 text-muted">
                                                Sustainable, energy-efficient production processes are
                                                becoming increasingly important in industrial
                                                applications worldwide. Learn more about the
                                                importance of the efficiency and sustainability for
                                                power supplies and how the Pepperl+Fuchs PS1000
                                                product family contributes to it.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="blog-footer text-start">
                                        <p class="mb-0 py-2">
                                            By
                                            <span class="blog-color">
                                                <a href="blog-single.html" class="blog-color links">
                                                    Blog Team
                                                </a>
                                            </span>
                                            | <span>January 10, 2025</span> |
                                            <span class="">
                                                <a href="blog-single.html" class="blog-color links">Explosion
                                                    Protection</a>
                                                <a href="blog-single.html" class="blog-color links">Knowledge Base</a>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            <a href="blog-single.html" class="blog-color blog-more">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- First Items End -->
                        <!-- First Items -->
                        <div class="mb-5">
                            <a href="blog-single.html">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="blog-list-img">
                                            <img class="img-fluid rounded-2"
                                                src="https://intrinsicallysafestore.com/wp-content/uploads/2024/05/Default_Chemical_Plants_2-1.jpg"
                                                alt="" />
                                            <div class="overlay-blogs">
                                                <div class="text-center">
                                                    <div class="pb-4 blog-link-icons">
                                                        <i class="fas fa-paperclip fs-1 text-white"></i>
                                                    </div>
                                                    <p>
                                                        Intrinsic Safety Barriers for Valve Positioner
                                                        Control and Monitoring
                                                    </p>
                                                    <span class="text-black fw-normal">Explosion Protection</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="blog-list-content">
                                            <h2 class="fw-bold text-black">
                                                Intrinsic Safety Barriers for Valve Positioner Control
                                                and Monitoring
                                            </h2>
                                            <p class="pt-4 text-muted">
                                                Positioner control and monitoring are common
                                                applications in process plants. The Pepperl+Fuchs
                                                K-System KCD2-SCS* and H-System HiC2422 isolated
                                                barriers integrate these functions into one device.
                                                Two freely configurable channels allow positioner
                                                control on one channel (AO), and position monitoring
                                                (AI) on the second channel.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="blog-footer text-start">
                                        <p class="mb-0 py-2">
                                            By
                                            <span class="blog-color">
                                                <a href="blog-single.html" class="blog-color links">
                                                    Blog Team
                                                </a>
                                            </span>
                                            | <span>January 10, 2025</span> |
                                            <span class="">
                                                <a href="blog-single.html" class="blog-color links">Explosion
                                                    Protection</a>
                                                <a href="blog-single.html" class="blog-color links">Knowledge Base</a>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            <a href="blog-single.html" class="blog-color blog-more">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- First Items End -->
                        <!-- First Items -->
                        <div class="mb-5">
                            <a href="blog-single.html">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="blog-list-img">
                                            <img class="img-fluid rounded-2"
                                                src="https://www.plastverarbeiter.de/assets/images/8/294pv1020_PK_1-2_Pepperl_Fuchs_Mobile_Device_PT_INNO-0eecd800.jpg"
                                                alt="" />
                                            <div class="overlay-blogs">
                                                <div class="text-center">
                                                    <div class="pb-4 blog-link-icons">
                                                        <i class="fas fa-paperclip fs-1 text-white"></i>
                                                    </div>
                                                    <p>
                                                        Ensuring Product Safety in Hazardous Areas with
                                                        Intrinsic Safety
                                                    </p>
                                                    <span class="text-black fw-normal">Explosion Protection</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="blog-list-content">
                                            <h2 class="fw-bold text-black">
                                                Ensuring Product Safety in Hazardous Areas with
                                                Intrinsic Safety
                                            </h2>
                                            <p class="pt-4 text-muted">
                                                Special care must be taken when using electrical
                                                devices in potentially explosive atmospheres. A proven
                                                and flexible protection method to ensure the safety of
                                                products used in hazardous areas is the intrinsic
                                                safety type of protection.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="blog-footer text-start">
                                        <p class="mb-0 py-2">
                                            By
                                            <span class="blog-color">
                                                <a href="blog-single.html" class="blog-color links">
                                                    Blog Team
                                                </a>
                                            </span>
                                            | <span>January 10, 2025</span> |
                                            <span class="">
                                                <a href="blog-single.html" class="blog-color links">Explosion
                                                    Protection</a>
                                                <a href="blog-single.html" class="blog-color links">Knowledge Base</a>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            <a href="blog-single.html" class="blog-color blog-more">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- First Items End -->
                        <!-- First Items -->
                        <div class="mb-5">
                            <a href="blog-single.html">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="blog-list-img">
                                            <img class="img-fluid rounded-2"
                                                src="https://d2zo35mdb530wx.cloudfront.net/_media/eyJrZXkiOiJfbWVkaWEvVUNQdGh5c3NlbmtydXBwQkFJUy9lbi9wcm9kdWN0cy1hbmQtc2VydmljZXMvbWF0ZXJpYWxzLWhhbmRsaW5nL3N0b2NreWFyZC1zeXN0ZW1zL2J1Y2tldC13aGVlbC1yZWNsYWltZXJzL3NvdXJjZS1CdWNrZXQtd2hlZWwtcmVjbGFpbWVycy5qcGciLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjEyODB9fX0="
                                                alt="" />
                                            <div class="overlay-blogs">
                                                <div class="text-center">
                                                    <div class="pb-4 blog-link-icons">
                                                        <i class="fas fa-paperclip fs-1 text-white"></i>
                                                    </div>
                                                    <p>Automation of Mining Stockyard Machines</p>
                                                    <span class="text-black fw-normal">Explosion Protection</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="blog-list-content">
                                            <h2 class="fw-bold text-black">
                                                Automation of Mining Stockyard Machines
                                            </h2>
                                            <p class="pt-4 text-muted">
                                                The integration of modern sensor technologies
                                                optimizes the handling and management of materials in
                                                mining stockyards. Learn more about the various sensor
                                                applications for the reliable, efficient, and safe
                                                operation of stockyard machines.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="blog-footer text-start">
                                        <p class="mb-0 py-2">
                                            By
                                            <span class="blog-color">
                                                <a href="blog-single.html" class="blog-color links">
                                                    Blog Team
                                                </a>
                                            </span>
                                            | <span>January 10, 2025</span> |
                                            <span class="">
                                                <a href="blog-single.html" class="blog-color links">Explosion
                                                    Protection</a>
                                                <a href="blog-single.html" class="blog-color links">Knowledge Base</a>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            <a href="blog-single.html" class="blog-color blog-more">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- First Items End -->
                        <!-- Blog Lists End -->
                        <div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link blog-bg-color text-black">Previous</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link blog-color" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link blog-color" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link blog-color" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link blog-color" href="#">...</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link blog-color" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 order-1 order-md-2 mb-4 mb-lg-0">
                        <div>
                            <h4>Search</h4>
                            <form action="">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary rounded-0 search-btn" type="button"
                                        id="button-addon1">
                                        <i class="fab fa-sistrix"></i>
                                    </button>
                                    <input type="text" class="form-control search-inputs" placeholder="Search..."
                                        aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                </div>
                            </form>
                        </div>

                        <div class="border mt-4 text-center p-5 pt-4">
                            <h5 class="">e-news</h5>
                            <p class="pt-3">
                                Subscribe to our newsletter and receive regularly news and
                                interesting information around the world of automation
                            </p>
                            <div class="mt-4">
                                <a class="button fusion-button button-orange fusion-button-default-size button-default-size button-flat fusion-mobile-button continue-center"
                                    style="
                      -webkit-box-shadow: none;
                      -moz-box-shadow: none;
                      box-shadow: none;
                      border-radius: 4px 4px 4px 4px;
                    "
                                    href="https://www.pepperl-fuchs.com/e-news" target="_blank"
                                    rel="noopener noreferrer"><span>Subscribe</span></a>
                            </div>
                        </div>
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold mt-5">
                                Releted Blog
                            </h5>
                        </div>
                        <div class="border mt-4">
                            <ul class="nav nav-tabs flex-column border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn active w-100" id="tabs-one-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-one" type="button" role="tab"
                                        aria-controls="tabs-one" aria-selected="true">
                                        <span class="research-box-nav-btn-title">Vulnerability Intelligence</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-two-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-two" type="button" role="tab"
                                        aria-controls="tabs-two" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Audits & Compliance</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-three-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-three" type="button" role="tab"
                                        aria-controls="tabs-three" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Security Response</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-four-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-four" type="button" role="tab"
                                        aria-controls="tabs-four" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Zero-Day Research</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-five-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-five" type="button" role="tab"
                                        aria-controls="tabs-five" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Attack Path Research</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-six-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-six" type="button" role="tab"
                                        aria-controls="tabs-six" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Asset Management</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mt-5 mt-lg-0">
                        <h1 class="fw-bold text-start">Recent Publications</h1>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold">
                                Research Blog
                            </h5>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/How%20To%20Reduce%20DNS%20Infrastructure%20Risk%20To%20Secure%20Your%20Cloud%20Attack%20Surface.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/New%20CISA%20Hardening%20Guidance%20Provides%20Valuable%20Insights%20for%20Network%20Security%20Engineers.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold">
                                Research Blog
                            </h5>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/How%20To%20Reduce%20DNS%20Infrastructure%20Risk%20To%20Secure%20Your%20Cloud%20Attack%20Surface.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/New%20CISA%20Hardening%20Guidance%20Provides%20Valuable%20Insights%20for%20Network%20Security%20Engineers.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold">
                                Research Blog
                            </h5>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/How%20To%20Reduce%20DNS%20Infrastructure%20Risk%20To%20Secure%20Your%20Cloud%20Attack%20Surface.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/New%20CISA%20Hardening%20Guidance%20Provides%20Valuable%20Insights%20for%20Network%20Security%20Engineers.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold">
                                Research Blog
                            </h5>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/How%20To%20Reduce%20DNS%20Infrastructure%20Risk%20To%20Secure%20Your%20Cloud%20Attack%20Surface.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="card recent-blogs">
                                    <img class="card-img-top"
                                        src="https://www.tenable.com//sites/default/files/images/articles/New%20CISA%20Hardening%20Guidance%20Provides%20Valuable%20Insights%20for%20Network%20Security%20Engineers.jpeg"
                                        alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title date">February 19, 2025</h5>
                                        <h5 class="card-title recent-items">
                                            How To Reduce DNS Infrastructure Risk To Secure Your
                                            Cloud Attack Surface
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
