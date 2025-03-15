@extends('frontend.master')
@section('content')
    {{-- For Portfolio Show Case --}}
    <style>
        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            background-color: #ae0a46 !important;
        }

        @-webkit-keyframes nc-icon-spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @-moz-keyframes nc-icon-spin {
            0% {
                -moz-transform: rotate(0deg);
            }

            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @keyframes nc-icon-spin {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .nav-tabs {
            border: 0;
            padding: 15px 0.7rem;
        }

        .nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
            box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
        }

        .card .nav-tabs {
            border-top-right-radius: 0.1875rem;
            border-top-left-radius: 0.1875rem;
        }

        .nav-tabs>.nav-item>.nav-link {
            color: #888888;
            margin: 0;
            margin-right: 5px;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 30px;
            font-size: 14px;
            padding: 11px 23px;
            line-height: 1.5;
        }

        .nav-tabs>.nav-item>.nav-link:hover {
            background-color: transparent;
        }

        .nav-tabs>.nav-item>.nav-link.active {
            background-color: #444;
            border-radius: 30px;
            color: #FFFFFF;
        }

        .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
            font-size: 14px;
            position: relative;
            top: 1px;
            margin-right: 3px;
        }



        .why_chose img {
            width: 100px;
        }

        @media only screens and (max-width:990px) {
            .box {
                margin: 0 0 30px;
            }
        }

        @media screens and (max-width: 768px) {

            .nav-tabs {
                display: inline-block;
                width: 100%;
                padding-left: 100px;
                padding-right: 100px;
                text-align: center;
            }

            .nav-tabs .nav-item>.nav-link {
                margin-bottom: 5px;
            }
        }

        .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link {
            color: #000 !important;
            padding: 25px !important;
            border: 1px solid #eee !important;
        }

        .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #FFFFFF !important;
            padding: 25px !important;
        }
    </style>
    <style>
        .custom-card {
            position: relative;
            height: 400px;
            width: 300px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            overflow: hidden;
            cursor: pointer;
        }

        .custom-intro {
            position: absolute;
            height: 50px;
            width: 300px !important;
            width: auto;
            bottom: 0;
            overflow: hidden;
            padding: 5px;
            color: #fff;
            background-color: rgb(174 10 70);
            transition: .4s ease-in-out;
        }

        .custom-card:hover .custom-intro {
            height: 180px;
            width: 300px;
            bottom: 0;
            background-color: #000;
        }

        .custom-card:hover .custom-text-p {
            opacity: 1;
            visibility: visible;
        }

        .custom-card img {
            height: auto;
            width: 350px;
            object-fit: cover;
            border-radius: 4px;
            transition: transform .4s ease-in-out;
        }

        .custom-text-h1 {
            margin: 0px;
            text-transform: uppercase;
            font-size: 24px;
            text-transform: capitalize;
        }

        .custom-text-p {
            font-size: 16px;
            padding: 10px;
            visibility: hidden;
            opacity: 0;
        }

        .img-content {
            width: auto;
            height: 380px;
            box-shadow: 0 0 8px #888;
            overflow: hidden;
            border-radius: 4px;
        }

        .img-content img {
            width: 100%;
            object-fit: cover;
            transition: ease-in-out 3s;
            position: relative;
            top: 0;
        }

        .img-content:hover img {
            top: -130%;
        }
    </style>

    <!--======// Header Title //======-->
    @if (!empty($portfolio))
        <section class="common_product_header"
            style="background-image: linear-gradient(#ae0a46,#880736);
                clip-path: polygon(0 0, 100% 0%, 100% 80%, 50% 100%, 0 80%); height: 35rem;">
            <div class="container ">
                {{-- <h1>We Design Things With <br> Love And Passion</h1> --}}
                <h1 style="width: 55%; margin: auto; text-transform: capitalize;">{{ $portfolio->banner_title }}</h1>

                <div class="row ">
                    <!--BUTTON START-->
                    <p class="text-center text-white pt-5">{{ $portfolio->banner_short_desc }}</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="m-4">
                            <a class="common_button3 py-3"
                                href="{{ $portfolio->banner_btn_link }}">{{ $portfolio->banner_btn_name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!----------End--------->
    {{-- Show Case --}}
    @if (is_countable($categories) && count($categories) > 0)
        <section class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cards">
                        <div class="cards-header">
                            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center my-4" role="tablist"
                                data-background-color="orange">


                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            href="#cat-Tab{{ $category->id }}" role="tab">{{ $category->title }}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="cards-body">
                            <!-- Tab panes -->

                            <div class="tab-content text-center" style="background: transparent !important;">

                                @foreach ($categories as $category)
                                    @php
                                        $portfolios = App\Models\Admin\PortfolioDetails::where('category_id', $category->id)
                                            ->select('id', 'banner_title', 'gallery_image_one')
                                            ->get();
                                    @endphp
                                    <div class="tab-pane fade {{ $loop->first ? 'active' : '' }} {{ $loop->first ? 'show' : '' }}"
                                        id="cat-Tab{{ $category->id }}" role="tabpanel">
                                        <div class="container">
                                            <div class="row d-flex justify-content-center">
                                                @foreach ($portfolios as $item)
                                                    <div class="col-md-3 col-sm-6 contensst">
                                                        <a href="{{ route('portfolio.details', $item->id) }}">
                                                            <div class="custom-card">
                                                                {{-- Dynamic Image --}}
                                                                <div class="img-content">
                                                                    <img
                                                                        src="{{ !empty($item->gallery_image_one) && file_exists(public_path('storage/' . $item->gallery_image_one)) ? asset('storage/' . $item->gallery_image_one) : asset('frontend/images/random-no-img.png') }}">
                                                                </div>
                                                                <div class="custom-intro">
                                                                    <h1 class="custom-text-h1 text-white">
                                                                        {{ $item->banner_title }}
                                                                    </h1>
                                                                    <p class="custom-text-p text-white">
                                                                        {{ $category->title }}
                                                                    </p>
                                                                    <a href="{{ route('portfolio.details', $item->id) }}"
                                                                        class="btn-color">Details</a>
                                                                </div>
                                                            </div>

                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!---------End -------->

    <!--=====// Team section //=====-->
    @if (count($teams) > 0)
        <section>
            <div class="container my-5">
                <div class="team_heading">
                    <div class="py-3 text-center">
                        <h3><span style="border-top:4px solid #ae0a46;">Ou</span>r Te<span
                                style="border-bottom:4px solid #ae0a46;">am</span></h3>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mx-auto">
                    @foreach ($teams as $team)
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('contact') }}">
                                <div class="our-team">
                                    <img class="page_top_banner"src="{{ !empty($team->image) && file_exists(public_path('storage/' . $team->image)) ? asset('storage/' . $team->image) : asset('frontend/images/service-no-img.png') }}"
                                        alt="NGEN IT Software">
                                    <div class="team-content">
                                        <h3 class="title_name">{{ $team->title }}</h3>
                                        <span class="post">{{ $team->short_desc }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!---------End -------->

    @if (!empty($portfolio))
        <section class="">
            <div class="container-fluid">
                <div class="container px-3 py-5">
                    <div class="title_area text-center">
                        <h1 class="mt-2">{{ $portfolio->choose_us_title }}</h1>
                        <p class="w-50 mx-auto py-5 pt-3">{{ $portfolio->choose_us_short_desc }}</p>
                    </div>
                    <div class="row">
                        @if (count($chooses) > 0)
                            @foreach ($chooses as $key => $choose)
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="card border-0 rounded-0 shadow-sm">
                                        <div class="card-body border-0 rounded-0">
                                            <div class="why_chose p-3 text-center">
                                                <img class="img-fluid" src="{{ !empty($choose->image) && file_exists(public_path('storage/' . $choose->image)) ? asset('storage/' . $choose->image) : asset('frontend/images/service-no-img.png') }}"
                                                    alt="NGEN IT Software">

                                                <div>
                                                    <h5 class="pt-3 main_color">{{ $choose->title }}</h5>
                                                    <p class="text-muted" style="font-size: 14px; text-align: center">
                                                        {!! $choose->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->

    {{-- Site Portfolio Show Case Start --}}
@endsection
