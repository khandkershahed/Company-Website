@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    @if (!empty($training->banner_image))
        <section>
            <div>
                <img class="page_top_banner"
                    src="{{ !empty($training->banner_image) && file_exists(public_path('storage/' . $training->banner_image)) ? asset('storage/' . $training->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}"
                    alt="NGEN IT Software">
            </div>
        </section>
    @endif
    <!----------End--------->
    <section class="pt-1">
        <div class="container my-3 mt-4">
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
                <a href="{{ route('training') }}">
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Training</span>
                        </span>
                    </li>
                </a>
            </ul>
        </div>
    </section>


    <!--======// Magazine Section //======-->
    <section>
        <div class="container spacer">
            @if (!empty($row_one))
                <div class="row bg-white magazine_content">
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="holder-main-text ps-5">
                                    {{-- <h6>{{ $row_one->badge }}</h6> --}}
                                    <h6 class="title-tag text-capitalize">{{ $row_one->badge }}</h6>
                                    <h2 class="container-title">
                                        {{ $row_one->title }}
                                    </h2>
                                    <p class="pt-3" style="text-align: justify">
                                        {!! Str::words(strip_tags($row_one->description), 50) !!}
                                        {{-- {{ $row_one->header }} --}}
                                    </p>
                                    @if (!empty($row_one->btn_name))
                                        <a href="{{ $row_one->link }}"
                                            class="pt-3 business_item_button d-flex justify-content-start">
                                            <span>{{ $row_one->btn_name }}</span>
                                            <span class="business_item_button_icon">
                                                <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 p-0 d-lg-block d-sm-none">
                                <div class="showcase-industry-bottom" style="position: relative; overflow: hidden;">
                                    <!-- Add a pseudo-element for the overlay -->
                                    <div class="gradient-overlay"></div>
                                    <img class="img-fluid overlays-img"
                                        src="{{ isset($row_one->image) && file_exists(public_path('storage/' . $row_one->image)) ? asset('storage/' . $row_one->image) : asset('frontend/images/banner-demo.png') }}"
                                        alt="Picture" style="border-top-right-radius: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--======// Magazine Section //======-->

    <!--======// Information Section //======-->

    @if (!empty($training->row_two_image))
        <section>
            <div class="container">
                <div class="row gx-3">
                    <div class="col-lg-8">
                        <div class="p-5 blocks-content block-image-content"
                            style="background-color:#f7f6f5!important; height: 30rem;">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="animated-image parbase section">
                                        <div id="solution_image_1">
                                            <img src="{{ isset($training->row_two_image) && file_exists(public_path('storage/' . $training->row_two_image)) ? asset('storage/' . $training->row_two_image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="{{ $training->row_two_title }}" title="Software Information NGENIT"
                                                class="img-fluid" style="background-color: rgb(212,208,202);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="software-info-title">
                                        <span
                                            style="border-top: 3px solid #ae0a46;">{{ Str::substr($training->row_two_title, 0, 2) }}</span>{{ Str::substr($training->row_two_title, 2) }}
                                    </h3>
                                    <p class="software-info-paragraph" style="text-align: justify;">
                                        {!! $training->row_two_short_description !!}
                                    </p>
                                    @if (!empty($training->row_two_btn_name))
                                        <a href="{{ $training->row_two_btn_link }}"
                                            class="button-bottom-animation main_color fs-5">{{ $training->row_two_btn_name }}
                                            --></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($tab_one)
                        <div class="col-lg-4">
                            <div class="p-5 blocks-content" style="background-color:#f7f6f5!important; height: 30rem;">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        @if (isset($tab_one->image) && file_exists(public_path('storage/' . $tab_one->image)))
                                            <div>
                                                <img class="pb-4" width="60px"
                                                    src="{{ asset('storage/' . $tab_one->image) }}" alt="">
                                            </div>
                                        @endif
                                        <h1 class="software-info-title">
                                            <span
                                                style="border-top: 3px solid #ae0a46;">{{ Str::substr($tab_one->title, 0, 2) }}</span>{{ Str::substr($tab_one->title, 2) }}
                                        </h1>
                                        <p class="software-info-paragraph" style="text-align: justify;">
                                            {!! Str::words($tab_one->description) !!}

                                        </p>
                                        @if (!empty($tab_one->btn_name))
                                            <a href="{{ $tab_one->link }}"
                                                class="button-bottom-animation main_color fs-5">{{ $tab_one->btn_name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row gx-3 mt-3 mb-5">
                    @if ($tabIds)
                        @foreach ($tabIds as $tabId)
                            <div class="col-lg-4">
                                <div class="p-5 blocks-content" style="background-color:#f7f6f5!important; height: 30rem;">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            @if (isset($tabId->image) && file_exists(public_path('storage/' . $tabId->image)))
                                                <div>
                                                    <img class="pb-4" width="60px"
                                                        src="{{ asset('storage/' . $tabId->image) }}" alt="">
                                                </div>
                                            @endif
                                            <h1 class="software-info-title">
                                                <span
                                                    style="border-top: 3px solid #ae0a46;">{{ Str::substr($tabId->title, 0, 2) }}</span>{{ Str::substr($tabId->title, 2) }}
                                            </h1>
                                            <p class="software-info-paragraph" style="text-align: justify;">
                                                {!! Str::words($tabId->description) !!}
                                            </p>
                                            @if (!empty($tabId->btn_name))
                                                <a href="{{ $tabId->link }}"
                                                    class="button-bottom-animation main_color fs-5">{{ $tabId->btn_name }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!--======// Feature tab //======-->
    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 p-0">
                    <div class="card border-0">
                        <div
                            class="card-header bg-white shadow-sm main-to-depp-gradient-2 p-5 card-header-area border-top-right-r">
                            <div class="d-flex align-items-center">
                                <h4 class="pe-2 text-white">Wide-range of Training Topics</h4>
                                {{-- <h4 class="pe-2 text-white">|</h4>
                                <h4 class="text-white">Categories</h4> --}}
                            </div>
                        </div>
                        <div class="card-header p-lg-5 p-4 card-header-area border-bottom-left-r border-0">
                            {{-- <a href="javascript:void(0)"> --}}
                                <div class="row gx-2">
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0"> Management, Leadership & Strategy</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0"> Oil, Gas & Process Engineering</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Procurement, Logistics & Supply Chain.</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Human Resources Management</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Finance, Accounting & Budgeting</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Administration, Office Management & Secretarial</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Contract Management</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Customer Service Management</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Health, Safety, Environmental & Security</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Mechanical, Instrumentation & Process Control</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0">Online Training Courses</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="d-flex justify-content-between align-items-center p-3 bg-white" style="height: 130px">
                                            <p class="mb-0"> All Technical Courses</p>
                                            <p class="mb-0"><i class="fa-solid fa-plus"></i></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------End--------->
    <!--======// Our expert //======-->
    @if (!empty($training->background_image))
        <div class="my-4 pt-lg-4">
            <img class="img-fluid brandpage_bg_image"
                src="{{ isset($training->background_image) && file_exists(public_path('storage/' . $training->background_image)) ? asset('storage/' . $training->background_image) : asset('frontend/images/no-row-bg-img(1552-388).png') }}"
                alt="">
        </div>
    @endif
    <!--======// Nasted tab //======-->
    @if (!empty($row_five))
        <section class="container">
            <div class="row brandpage_row pt-lg-4">
                <div class="col-lg-6 col-sm-12 company-tab-para">
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid row_right_image"
                            src="{{ isset($row_five->image) && file_exists(public_path('storage/' . $row_five->image)) ? asset('storage/' . $row_five->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                            style="border-radius: 7px 55px 7px 55px;">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 company-tab-para">
                    @if (!empty($row_five->badge))
                        <h6 class="eyebrow">{{ $row_five->badge }}</h6>
                    @endif
                    <h3 class="eyebrow_title">{{ $row_five->title }}</h3>
                    <p class="company-tab-para text-justify-align">{!! $row_five->description !!}</p>
                    @if (!empty($row_five->link))
                        <a href="{{ $row_five->link }}" class="btn-color">{{ $row_five->btn_name }}</a>
                    @else
                    @endif
                </div>
            </div>
        </section>
    @endif


    <!---------End -------->
    <!--=====// Bootom Blogs section //=====-->
    {{-- @if (count($tech_datas) > 0)
        <div class="section_wp2">
            <div class="container">
                @if (!empty($training->row_seven_title))
                    <div class="solution_number_wrapper">
                        <!-- title -->
                        @php
                            $sentence2 = $training->row_seven_title;
                        @endphp
                        <h5 class="home_title_heading" style="text-align: left;">
                            <div class="software_feature_title">
                                <h1 class="text-center pb-3">
                                    <span>{{ Str::substr($sentence2, 0, 2) }}</span>{{ Str::substr($sentence2, 2) }}
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
    @endif --}}
    <!---------End -------->
    <!--=====// Pageform section //=====-->
    {{-- @include('frontend.partials.footer_contact') --}}
    @php
    $setting = App\Models\Site::first();
@endphp
<section class=" solution_contact_wrapper">
    <div class="container" id="Contact">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-5 col-sm-12">
                <div class="thing_together_wrapper">
                    <h4>
                        <span class="why_Choose_lineTop">L</span>et’s do big things together.
                    </h4>
                    <p>Get assistance with tracking an order, requesting a quote, contacting your account representative
                        and more by phone or over chat.</p>
                    <h5>NGen IT Training Institute</h5>
                    <p><strong>Address: </strong>36-37, Probal Housing, Ring Road, Mohammadpur, Dhaka-1207, Bangladesh</p>
                    <p><strong>Phone: </strong>01958025050</p>
                    <!-- <h5><i class="fa-solid fa-phone"></i>NgenIT</h5> -->
                </div>
            </div>
            <!----------Sidebar Privacy Policy --------->
            <div class="col-lg-7 col-sm-12">
                <!-- form Sidebar -->
                <div class="background">
                    <div class="containers">
                        <div class="screen">
                            <div class="screen-header">
                                <div class="screen-header-left">
                                    <div class="screen-header-button maximize"></div>
                                    <div class="screen-header-button minimize"></div>
                                </div>
                                <div class="screen-header-right">
                                    <div class="screen-header-ellipsis"></div>
                                    <div class="screen-header-ellipsis"></div>
                                    <div class="screen-header-ellipsis"></div>
                                </div>
                            </div>
                            <div class="screen-body">
                                <div class="screen-body-item left">
                                    <div class="app-title">
                                        <span>CONTACT</span>
                                        <span>US</span>
                                    </div>
                                </div>
                                <form id="myform" action="{{ route('contact.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="screen-body-item screen-body-item-right">
                                        <div class="app-form row">
                                            <div class="app-form-group">
                                                <input type="hidden" name="type" value="contact">
                                                <input name="name" class="app-form-control" placeholder="Full NAME"
                                                    value="{{ old('name') }}" required>
                                            </div>
                                            <div class="app-form-group">
                                                <input name="email" class="app-form-control" placeholder="EMAIL Id"
                                                    value="{{ old('email') }}" required>
                                            </div>
                                            <div class="app-form-group">
                                                <input name="phone" class="app-form-control" placeholder="CONTACT NO"
                                                    value="{{ old('phone') }}">
                                            </div>
                                            <div class="app-form-group message">
                                                <textarea name="message" class="app-form-control" rows="3" placeholder="Your Message"></textarea>

                                            </div>
                                            <div class="app-form-group message g-recaptcha" data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                                            <div class="app-form-group buttons">
                                                <button class="app-form-button"
                                                    type="submit"><strong>SEND</strong></button>
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
</section>
    <!---------End -------->
@endsection
@push('scripts')
    <script type="text/javascript">
        const scrollContainer = document.querySelector(".sub_tabs_button");
        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>
@endpush
