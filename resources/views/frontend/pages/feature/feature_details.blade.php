@extends('frontend.master')
@section('content')
    

    <!--======// Guidance and support {1} //======-->
    <section class="mt-3">
        <div class="container mt-4 mb-2">
            <ul class="text-left breadcrumb">

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

                <a href="#">
                    <li class="breadcrumb__item">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Feature Contents</span>
                        </span>
                    </li>
                </a>

                <li class="breadcrumb_divider">
                    <span>></span>
                </li>

                <a href="#">
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">{{ $feature->badge }}</span>
                        </span>
                    </li>
                </a>

            </ul>
        </div>
    </section>

    <section class="section_wp2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 service_common_content">
                    {{-- <span class="radius_text_button">{{ $feature->badge }}</span> --}}
                    <h3>{{ $feature->title }}</h3>
                    <p>{!! $feature->header !!}</p>
                    <a href="#Contact" class="mt-3 btn-color">Hear from our team</a>
                </div>
                <div class="p-4 col-lg-6 col-sm-12">
                    <img class="img-fluid" style="border-radius: 8px;"
                        src="{{ !empty($feature->image) && file_exists(public_path('storage/' . $feature->image)) ? asset('storage/' . $feature->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                        alt="NGEN IT">
                </div>
            </div>
        </div>
    </section>
    <!-------------End--------->

    <!--======// Modern finance //======-->
    @if ($row_one)
        <section class="container section_padding">
            <div class="row">
                <div class="col-lg-7 col-sm-12">
                    <div class="section_text_wrapper">
                        <h4>{{ $row_one->title }}</h4>
                        <p style="text-align: justify;">{!! $row_one->short_des !!}</p>

                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="industry_single_help_list">
                        <h5>{{ $row_one->list_title }}</h5>
                        <ul>

                            <li class="d-flex align-items-center">
                                <div class="me-2"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
                                        height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                                        xml:space="preserve">
                                        <path fill="#AE1D48"
                                            d="M10.673,19.721c-0.372,0.372-0.975,0.372-1.347,0l-9.048-9.048c-0.372-0.372-0.372-0.975,0-1.346 l9.048-9.048c0.372-0.372,0.975-0.372,1.347,0l9.048,9.048c0.372,0.372,0.372,0.974,0,1.346L10.673,19.721z" />
                                    </svg></div>
                                <div class="pt-1"><span>{{ $row_one->list_one }}</span></div>
                            </li>

                            <li class="d-flex align-items-center">
                                <div class="me-2"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px"
                                        height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                                        xml:space="preserve">
                                        <path fill="#AE1D48"
                                            d="M10.673,19.721c-0.372,0.372-0.975,0.372-1.347,0l-9.048-9.048c-0.372-0.372-0.372-0.975,0-1.346 l9.048-9.048c0.372-0.372,0.975-0.372,1.347,0l9.048,9.048c0.372,0.372,0.372,0.974,0,1.346L10.673,19.721z" />
                                    </svg></div>
                                <div class="pt-1"><span>{{ $row_one->list_two }}</span></div>
                            </li>

                            <li class="d-flex align-items-center">
                                <div class="me-2"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px"
                                        height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                                        xml:space="preserve">
                                        <path fill="#AE1D48"
                                            d="M10.673,19.721c-0.372,0.372-0.975,0.372-1.347,0l-9.048-9.048c-0.372-0.372-0.372-0.975,0-1.346 l9.048-9.048c0.372-0.372,0.975-0.372,1.347,0l9.048,9.048c0.372,0.372,0.372,0.974,0,1.346L10.673,19.721z" />
                                    </svg></div>
                                <div class="pt-1"><span>{{ $row_one->list_three }}</span></div>
                            </li>

                            <li class="d-flex align-items-center">
                                <div class="me-2"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px"
                                        height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                                        xml:space="preserve">
                                        <path fill="#AE1D48"
                                            d="M10.673,19.721c-0.372,0.372-0.975,0.372-1.347,0l-9.048-9.048c-0.372-0.372-0.372-0.975,0-1.346 l9.048-9.048c0.372-0.372,0.975-0.372,1.347,0l9.048,9.048c0.372,0.372,0.372,0.974,0,1.346L10.673,19.721z" />
                                    </svg></div>
                                <div class="pt-1"><span>{{ $row_one->list_four }}</span></div>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </section>
    @endif

    <!----------End--------->

    <!--=====// Global call section //=====-->
    <section class="mt-2 mb-3 global_call_section section_padding">
        <div class="container">
            <!-- content -->
            @php
                $sentence = $feature->row_four_title;
            @endphp
            <div class="global_call_section_content">
                <div class="home_title" style="width: 100%; margin: 0px;">
                    <h5 class="home_title_heading" style="text-align: left; color: #fff;">
                        <span>{{ \Illuminate\Support\Str::substr($sentence, 0, 1) }}</span>{{ \Illuminate\Support\Str::substr($sentence, 1) }}
                    </h5>
                    <p class="pt-2 text-center text-white home_title_text text-lg-start">
                        {{ Illuminate\Support\Str::limit($feature->row_four_header, 150, '...') }}
                    </p>
                    <div class="business_seftion_button">
                        <a href="{{ asset('contact') }}" class="btn-color">Explore Our Business</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->

    <!--======// Consulting services {2} //======-->
    @if ($row_two)
        <section class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" style="height:300px; width:530px; border-radius:15px;"
                            src="{{ !empty($row_two->image) && file_exists(public_path('storage/' . $row_two->image)) ? asset('storage/' . $row_two->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                            alt="NGEN IT">
                    </div>
                    <div class="pr-4 col-lg-6 col-sm-12 service_common_content">
                        <h4>{{ $row_two->badge }}</h4>
                        <h5>{{ $row_two->title }}</h5>
                        <p class="pt-3">{!! $row_two->description !!}</p>

                        @if (!empty($row_two->btn_name))
                            <a href="{{ $row_two->link }}" class="mt-4 btn-color">{{ $row_two->btn_name }}</a>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-------------End--------->
    <!--======// Call to action //======-->
    <div class="mt-5 call_to_action"
        style="background-image: linear-gradient(to right top, #ae0a46, #bf0248, #9a083e, #ad0441, #b31a52, #870736, #b70647, #b30243, #db0050, #b91c56, #a40942, #ae0a46)">
        <div class="container">
            <div class="mx-auto call_to_action_text">
                <h4 class="">{{ $feature->row_three_title }}</h4>
                <p>{{ $feature->row_three_header }}</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('contact') }}" class="text-center btn-white btn-color">Contact us to buy</a>
                </div>
            </div>

        </div>
    </div>
    <!-------------End--------->

    <!--======// Business section //======-->
    <section class="py-5 section_wp2">
        <div class="container">
            <!-- home title -->
            <div class="mb-5 home_title">
                {{-- <h5 class="pb-4 mb-4 home_title_heading callout" style="font-size: 27px;"> {!! $feature->footer !!}</h5> --}}
                <h4 class="mx-auto mb-0 section_title w-75">
                    <span
                        class="topLine">{{ \Illuminate\Support\Str::substr($feature->row_five_title, 0, 1) }}</span>{{ \Illuminate\Support\Str::substr($feature->row_five_title, 1) }}
                </h4>
                <p class="text-center">{!! $feature->row_five_header !!}</p>
            </div>

            <!-- business content -->
            <div class="business_content_wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="features-items">
                            @if ($features)
                                @foreach ($features as $item)
                                    <div class="text-center border-0 card feature-box">
                                        <div class="card-body">
                                            <!-- image -->
                                            <div class="business_item_icon">
                                                <img src="{{ !empty($item->logo) && file_exists(public_path('storage/' . $item->logo)) ? asset('storage/' . $item->logo) : asset('https://www.ngenitltd.com/storage/UgXO4m888XZ3F4YC1678865856.png') }}"
                                                    alt="">
                                            </div>

                                            <!-- content -->
                                            <div class="business_item_content">
                                                <p class="business_item_title">{{ Str::words($item->badge, 3) }}</p>
                                                <p class="text-center business_item_text">
                                                    {{ Str::limit($item->header, 55) }}
                                                </p>
                                                <a href="{{ route('feature.details', $item->slug) }}"
                                                    class="text-center d-flex main_color align-items-center justify-content-center">
                                                    <span>Learn More</span>
                                                    <span class="business_item_button_icon">
                                                        <i class="fa-solid fa-arrow-right-long ps-2"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- business item wrapper -->
                {{-- <div class="row solution_business_item">
                    @if ($features)
                        @foreach ($features as $item)
                            <div class="mb-4 col-lg-3 col-sm-6 col-12">
                                <div class="business_item_icon">
                                    <img src="{{ !empty($item->logo) && file_exists(public_path('storage/' . $item->logo)) ? asset('storage/' . $item->logo) : asset('frontend/images/no-category-img.png') }}"
                                        alt="">
                                </div>
                                <div class="business_item_content">
                                    <p class="business_item_title">{{ $item->badge }}</p>
                                    <p class="text-center business_item_text">{{ Str::limit($item->header, 55) }}</p>
                                    <a href="{{ route('feature.details', $item->slug) }}"
                                        class="text-center d-flex main_color align-items-center justify-content-center">
                                        <span>Learn More</span>
                                        <span class="business_item_button_icon">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div> --}}
            </div>
        </div>
    </section>
    <!---------End -------->


    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!-- Include jQuery and Slick JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.features-items').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
    <!---------End -------->
@endsection
