@extends('frontend.master')
@section('content')
    <style>
        .main_color {
            color: #ae0a46;
        }
    </style>
        <!--======// Header Title //======-->
        @if (!empty($techglossy->image))
        <section>
            <div>
                <img class="page_top_banner" width="1920px" height="330px"
                    src="{{ !empty($techglossy->image) && file_exists(public_path('storage/' . $techglossy->image)) ? asset('storage/' . $techglossy->image) : asset('frontend/images/no-banner(1920-330).png') }}"
                    alt="NGEN IT Software">
            </div>
        </section>
    @endif
    <!----------End--------->

    <!--=======// Content //=======-->
    <section class="container section_padding">
        <div class="px-3 mb-3 row px-lg-0 align-items-center">
            <div class="byTopics col-9">
                <p>By <a href="javascript:void(0);">{{ $techglossy->created_by }}</a> <span> /
                    </span><span>{{ date('d-m-Y', strtotime($techglossy->created_at)) }}</span>
                </p>
            </div>
            <div class="bySocial col-3">
                <ul class="social-icon-links pull-right d-flex justify-content-end" style="font-size: 1.5rem;">
                    {!! Share::page(url('/techglossy/' . $techglossy->id . '/details'))->facebook()->twitter()->whatsapp() !!}
                </ul>
            </div>
        </div>
        <div class="row content_wrapper">
            <!---------/// Content & blog ///-------->
            <div class="col-lg-12 col-sm-12 tech_glossary_area_left">

                <h5 style="font-size: var(--content-title-font-size);">{{ $techglossy->title }}</h5>
                <div class="py-3 pt-1 d-flex align-items-center">
                    @php
                        $tag = $techglossy->tags;
                        $tags = explode(',', $tag);
                    @endphp
                    @foreach ($tags as $item)
                    <div class="">
                        <span class="main_color me-2"><i class="fa-regular fa-bookmark me-2"></i>{{ ucwords($item) }}</span>
                    </div>
                    @endforeach
                </div>

                <p>{!! $techglossy->header !!}</p>



                {{-- <button class="common_button2">Learn more about aglle</button> --}}
            </div>
            <!---------/// Sidebar more ///------------>
        </div>
        <div class="row content_wrapper">
            <div class="col-lg-12 col-sm-12 tech_glossary_area_left">

                <blockquote
                    style="padding: 20px 30px 20px 25px; border-left: 5px solid #af0e2e;border-right: 5px solid #af0e2e; background-color: #f7f6f5;">
                    <p>{!! $techglossy->short_des !!}</p>
                </blockquote>
                <p style="font-size: var(--content-title-font-size);">{!! $techglossy->long_des !!}</p>
            </div>
        </div>
    </section>
    <!--------- End--------->
    <section>
        <div class="container-fluid" style="background-color: #eee;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="my-5 area-text">
                            <h5 class="callout">{!! $techglossy->footer !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=======// Single blog related Postes //=======-->

    <section>
        <div class="container py-2 py-lg-5">
            <div class="">
                <h2 class="text-center">
                    <span class="main_color">Featured Techglossies By NGen IT</span>
                </h2>
            </div>
            <div class="row">
                <div class="SlickCarousel">
                    <!--------item------->
                    @foreach ($storys as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="related-item">
                                <a href="{{ route('techglossy.details', $item->id) }}">
                                    <div>
                                        <img class="img-fluid"
                                            src="{{ !empty($item->image) && file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                            alt="" style="height: 200px; width:100%">
                                    </div>
                                    <div class="p-3" style="height:6.5rem;">
                                        <h5 class="mb-1 text-center">
                                            {{ $item->badge }}
                                        </h5>
                                        <h4 class="mb-0 text-center fw-bold">{{ Str::limit($item->title, 55) }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- <section class="related_posts_wrapper">
        <div class="container">
            <div class="related_posts_title">
                <h1 class="text-center"></h1>
            </div>

            <div class="row">
                @foreach ($storys as $item)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="related-item">
                            <a href="{{ route('techglossy.details', $item->id) }}">
                                <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}" alt=""
                                    style=" width:250px; height:150px;">
                                <h4>{{ $item->badge }}</h6>
                                    <h3><strong>{{ Str::limit($item->title, 55) }}</strong></h3>
                            </a>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section> --}}
    <!--------- End--------->
@endsection
