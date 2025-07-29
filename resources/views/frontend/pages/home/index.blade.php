@extends('frontend.master')
@section('content')
@section('styles')
    <meta property="og:title" content="NGen IT Ltd.">
    <meta property="og:image" content="{{ asset('storage/' . $home->branner1) }}">
@endsection
<section class="">
    <!--======// Banner Section //======-->
    @if (!empty($home->branner1) && !empty($home->branner2) && !empty($home->branner3))
        <section>
            <div class="Advance-Slider">
                <!-- Item -->
                @if (!empty($home->branner1))
                    <div class="item">
                        <div class="img-fill">
                            <img class="dots-img"
                                src="{{ isset($home->branner1) && file_exists(public_path('storage/' . $home->branner1)) ? asset('storage/' . $home->branner1) : asset('frontend/images/banner-demo.png') }}"
                                alt="">
                            <div class="contain-wrapper">
                                <div class="dots-contain">
                                    <img class="dots-img"
                                        src="{{ isset($home->branner1) && file_exists(public_path('storage/' . $home->branner1)) ? asset('storage/' . $home->branner1) : asset('frontend/images/banner-demo.png') }}"
                                        alt="">
                                </div>
                                <div class="mb-3 info w-50">
                                    @if ($home->banner1_title)
                                        <div>
                                            <h3><strong>{{ $home->banner1_title }}</strong></h3>
                                            <h5 class="mx-auto my-4 text-white w-75">
                                                {{ $home->banner1_short_description }}
                                            </h5>
                                        </div>
                                    @endif
                                    @if ($home->banner1_button_link)
                                        <div class="my-4">
                                            <a class="btn-color"
                                                href="{{ $home->banner1_button_link }}">{{ $home->banner1_button_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- // Item -->

                <!-- Item -->
                @if (!empty($home->branner2))
                    <div class="item">
                        <div class="img-fill">
                            <img src="{{ isset($home->branner2) && file_exists(public_path('storage/' . $home->branner2)) ? asset('storage/' . $home->branner2) : asset('frontend/images/banner-demo.png') }} "
                                alt="">
                            <div class="contain-wrapper">
                                <div class="dots-contain">
                                    <img class="dots-img"
                                        src="{{ isset($home->branner2) && file_exists(public_path('storage/' . $home->branner2)) ? asset('storage/' . $home->branner1) : asset('frontend/images/banner-demo.png') }}"
                                        alt="">
                                </div>
                                <div class="mb-3 info w-50">
                                    @if ($home->banner2_title)
                                        <div>
                                            <h3><strong>{{ $home->banner2_title }}</strong></h3>
                                            <h5 class="mx-auto my-4 text-white w-75">
                                                {{ $home->banner2_short_description }}
                                            </h5>
                                        </div>
                                    @endif
                                    @if ($home->banner2_button_link)
                                        <div class="my-4">
                                            <a class="btn-color"
                                                href="{{ $home->banner2_button_link }}">{{ $home->banner2_button_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- // Item -->

                <!-- Item -->
                @if (!empty($home->branner3))
                    <div class="item">
                        <div class="img-fill">
                            <img src="{{ isset($home->branner3) && file_exists(public_path('storage/' . $home->branner3)) ? asset('storage/' . $home->branner3) : asset('frontend/images/banner-demo.png') }} "
                                alt="">
                            <div class="contain-wrapper">
                                <div class="dots-contain">
                                    <img class="dots-img"
                                        src="{{ isset($home->branner3) && file_exists(public_path('storage/' . $home->branner3)) ? asset('storage/' . $home->branner1) : asset('frontend/images/banner-demo.png') }}"
                                        alt="">
                                </div>
                                <div class="mb-3 info w-lg-50">
                                    @if ($home->banner3_title)
                                        <div>
                                            <h3><strong>{{ $home->banner3_title }}</strong></h3>
                                            <h5 class="mx-auto my-4 text-white w-lg-75">
                                                {{ $home->banner3_short_description }}
                                            </h5>
                                        </div>
                                    @endif
                                    @if ($home->banner3_button_link)
                                        <div class="my-4">
                                            <a class="btn-color"
                                                href="{{ $home->banner3_button_link }}">{{ $home->banner3_button_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- // Item -->
            </div>
        </section>
    @endif
    {{-- Banner Bottom Card --}}
    @if (!empty($home->btn1_title) && !empty($home->btn2_title))
        <div class="container px-2 px-lg-4">
            <div class="mx-auto row gx-5 banner_bottom_box">
                <div class="px-2 col">
                    @if (!empty($home->btn1_title))
                        <div class="border bg-light custom_shadow px-lg-3 px-sm-1 home_banner_card">
                            <h2 class="text-center home_banner_card_title">{{ $home->btn1_title }}</h2>
                            <div class="pt-2 home_card_button d-flex justify-content-center">
                                <a class="home-btn" href="{{ $home->btn1_link }}">{{ $home->btn1_name }}</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="px-2 col">
                    <div class="border bg-light custom_shadow px-lg-3 px-sm-1 home_banner_card">
                        <h2 class="text-center home_banner_card_title">{{ $home->btn2_title }}</h2>
                        <div class="pt-2 home_card_button d-flex justify-content-center">
                            <a class="home-btn" href="{{ $home->btn2_link }}">{{ $home->btn2_name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!---------End -------->
</section>
<!--======// Business section //======-->
<section class="">
    <div class="container">
        <!-- home title -->
        <div class="row">
            @if (!empty($home->header1))
                <div class="py-3 mx-auto home_banner_bottom_title px-lg-4">
                    <h6 class="pb-2 home_title_heading home_banner_bt-title"> {{ $home->header1 }}
                    </h6>
                    <p class="home_title_text">{{ $home->header2 }}</p>
                </div>
            @endif
        </div>
        <!-- business content -->
        @if (!empty($features))
            <div class="d-lg-block d-sm-none">
                <div class="row d-flex justify-content-center">
                    @foreach ($features as $feature)
                        <div class="custom_col-2 col-md-6 col-sm-12">
                            <div class="text-center">
                                <img class="img-fluid" height="85px"
                                    src="{{ !empty($feature->logo) && file_exists(public_path('storage/' . $feature->logo)) ? asset('storage/' . $feature->logo) : asset('frontend/images/service-no-img.png') }}"
                                    alt="NGEN IT">
                                <h5 class="pt-2 business_services">{{ Str::words($feature->badge, 10, $end = '') }}
                                </h5>
                            </div>
                            <div class="feature_description">
                                <p class="feature_descrip">{{ Str::words($feature->header, 12, $end = '') }}</p>
                            </div>
                            <a href="{{ route('feature.details', $feature->slug) }}" class="pt-3 business_item_button">
                                <span>Learn More</span>
                                <span class="business_item_button_icon">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row d-lg-none d-sm-block">
                <div class="px-3 mb-3 d-flex justify-content-center align-items-center border-bottom">
                    <div class="text-start w-75">
                        <h3 class="main_color">Feature Contents</h3>
                    </div>
                    <div class="text-end w-25">
                        <a class="Arrows custom-responsive-slider-prev"><i
                                class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                        <a class="Arrows custom-responsive-slider-next"><i
                                class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>

                <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                    @foreach ($features as $key => $feature)
                        @if (!empty($feature))
                            <div class="item">
                                <div class="text-center">
                                    <div class="d-flex justify-content-center align-items-center story-mb">
                                        <img src="{{ !empty($feature->logo) && file_exists(public_path('storage/' . $feature->logo)) ? asset('storage/' . $feature->logo) : asset('frontend/images/service-no-img.png') }}"
                                            alt="NGEN IT" style="width: 80px;">
                                    </div>
                                    <h5 class="pt-2 business_services">
                                        {{ Str::words($feature->badge, 10, $end = '') }}</h5>
                                </div>
                                <div class="feature_description">
                                    <p class="feature_descrip">{{ Str::words($feature->header, 12, $end = '') }}
                                    </p>
                                </div>
                                <a href="{{ route('feature.details', $feature->slug) }}"
                                    class="pt-3 business_item_button">
                                    <span>Learn More</span>
                                    <span class="business_item_button_icon">
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </span>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <!-- button -->
        <div class="my-5 d-flex justify-content-center">
            <a class="btn-color" href="{{ route('learn.more') }}">Learn More</a>
        </div>
    </div>
</section>

<!---------End -------->
<!--=======// Shop product //======-->
<section class="spacer learn_more py-lg-3">
    <div class="container py-4 py-lg-5">
        <div class="row align-items-center">
            <!-- content -->
            <div class="col-lg-8 col-sm-12">
                <div class="home_shop_product_wrapper home_shop_product">
                    <h5> Shop Products and Hardware</h5>
                    <p class="text-justify w-75 w-sm-100">
                        Among More than
                        <strong class="main_color number-font" style="font-size:20px;">
                            {{ $productCount }}
                            <small>products</small>
                        </strong>
                        and
                        <strong class="main_color number-font" style="font-size:20px;">
                            {{ $brandCount }}
                            <small>brands</small>
                        </strong>
                        at your service, we can provide you with the tools
                        you need to succeed. Additionally, you may easily ask your exact requirements or contact us at
                        anytime.
                    </p>
                    <div class="mt-4 mt-lg-5 btn-area">
                        <a href="{{ route('shop.html') }}" class="btn-color">Explore Shop</a>
                    </div>
                </div>
            </div>
            <!-- product brand -->
            <div class="col-lg-4 col-sm-12 product_brand">
                <div>
                    <p class="fw-bold top-line-title"><span style="border-top: 4px solid #ae0a46;">Exp</span>lore
                        Categories
                    </p>

                    <div class="">
                        <a href="{{ route('all.brand') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Brands ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('all.category') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Product Categories ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="pt-2 ">
                        <a href="{{ route('software.common') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Software ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="pt-2 ">
                        <a href="{{ route('hardware.common') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Hardware ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!---------End -------->
<!--=======// Client Story //======-->
{{-- @if (!empty($story) | !empty($story2) | !empty($story3) | !empty($story4)) --}}
@if (!empty($storys))
    <section>
        <div class="container my-4 mb-5 d-lg-block d-sm-none">
            <h2 class="text-center"><span class="main_color">Stories</span></h2>
            <div class="row">
                @foreach ($storys as $story)
                    @if (!empty($story))
                        <div class="col-lg-3">
                            <div class="client_story_box">
                                <div class="pt-4 pb-3 details-titles ps-4">
                                    <p class="pb-5">{{ $story->badge }}</p>
                                </div>
                                <div class="grid-river">
                                    <figure class="effect-oscar" style="height: 250px;">
                                        {{-- <img src="{{ isset($story->image) && file_exists(public_path('storage/' . $story->image)) ? asset('storage/' . $story->image) : asset('frontend/images/banner-demo.png') }} "
                                            alt=""> --}}
                                        <figcaption>
                                            <h6> {{ Str::words($story->title, 6) }}</h6>
                                            <p class="text-start">{{ Str::words($story->header, 10) }}</p>
                                            <h5 class="download-hover-btn">
                                                <a class="text-white"
                                                    href="{{ route('story.details', $story->slug) }}">Read More
                                                    <i class="fa-solid fa-chevron-right" style="font-size: 12px;"></i>
                                                </a>
                                            </h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container my-4 mb-5 d-lg-none d-sm-block">
            <div class="mx-3 d-flex justify-content-center align-items-center border-bottom">
                <div class="text-start w-75">
                    <h3 class="main_color">Storys</h3>
                </div>
                <div class="text-end w-25">
                    <a class="Arrows custom-responsive-slider-prev"><i
                            class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                    <a class="Arrows custom-responsive-slider-next"><i
                            class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>

            <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                @foreach ($storys as $key => $story)
                    <div class="border-0 item">
                        @if (!empty($story))
                            <div class="client_story_box">
                                <div class="pt-3 pb-3 details-titles ps-4">
                                    <p class="pb-5">{{ $story->badge }}</p>
                                </div>
                                <div class="grid-river">
                                    <figure class="effect-oscar" style="height: 250px;">
                                        {{-- <img src="{{ isset($story->image) && file_exists(public_path('storage/' . $story->image)) ? asset('storage/' . $story->image) : asset('frontend/images/banner-demo.png') }} "
                                            alt=""> --}}
                                        <figcaption>
                                            <h6> {{ Str::words($story->title, 6) }}</h6>
                                            <p>{{ Str::words($story->header, 10) }}</p>
                                            <h5 class="download-hover-btn">
                                                <a class="text-white"
                                                    href="{{ route('story.details', $story->slug) }}">Read Story
                                                    <i class="fa-solid fa-chevron-right" style="font-size: 12px;"></i>
                                                </a>
                                            </h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!--======// Magazine Section //======-->
<section>
    <div class="container spacer">
        @if (!empty($techglossy))
            <div class="bg-white row magazine_content">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="holder-main-text ps-5">
                                {{-- <h6>{{ $techglossy->badge }}</h6> --}}
                                <h6 class="title-tag text-capitalize">{{ $techglossy->badge }}</h6>
                                <h2 class="container-title">
                                    {{ $techglossy->title }}
                                </h2>
                                <p class="pt-3" style="text-align: justify">
                                    {!! Str::words(strip_tags($techglossy->short_des), 50) !!}
                                    {{-- {{ $techglossy->header }} --}}
                                </p>
                                <a href="{{ route('techglossy.details', $techglossy->id) }}"
                                    class="pt-3 business_item_button d-flex justify-content-start">
                                    <span>Read More</span>
                                    <span class="business_item_button_icon">
                                        <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="p-0 col-lg-6">
                            <div class="showcase-industry-bottom" style="position: relative; overflow: hidden;">
                                <!-- Add a pseudo-element for the overlay -->
                                <div class="gradient-overlay"></div>
                                <img class="img-fluid overlays-img"
                                    src="{{ isset($techglossy->image) && file_exists(public_path('storage/' . $techglossy->image)) ? asset('storage/' . $techglossy->image) : asset('frontend/images/banner-demo.png') }}"
                                    alt="Picture" style="border-top-right-radius: 60px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<!----------End--------->
<!--=======// Popular products //======-->
<section>
    <div class="container p-0 my-4">
        <div class="Container spacer">
            <h3 class="Head main_color">Recent Products <span class="Arrows"></span></h3>
            <!-- Carousel Container -->
            <div class="SlickCarousel">
                @if ($products)
                    @foreach ($products as $product)
                        <div class="mt-3 mb-3 ProductBlock">
                            <div class="Content">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="custom-product-grid">
                                            <div class="custom-product-image">
                                                <a href="{{ route('product.details', $product->slug) }}"
                                                    class="image">
                                                    {{-- <img class="pic-1" src="{{ asset($product->thumbnail) }}"> --}}
                                                    <img class="img-fluid"
                                                        src="{{ !empty($product->thumbnail) && file_exists(public_path($product->thumbnail)) ? asset($product->thumbnail) : asset('frontend/images/random-no-img.png') }}"
                                                        alt="NGEN IT">
                                                </a>
                                                <ul class="custom-product-links">
                                                    <li><a href="#"><i class="text-white fa fa-random"></i></a>
                                                    </li>
                                                    <li><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#productDetails{{ $product->id }}"><i
                                                                class="text-white fa fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="custom-product-content">
                                                <a href="{{ route('product.details', $product->slug) }}">
                                                    <h3 class="custom-title"> {{ Str::words($product->name, 10) }}
                                                    </h3>
                                                </a>
                                                <div class="mt-5 d-flex align-items-center justify-content-between">

                                                    {{-- <a href="javascript:void(0)" data-product_id="{{ $product->id }}"
                                                        data-product_name="{{ $product->name }}" data-product_quantity="1"
                                                        class="px-3 py-2 text-black bg-transparent border btn-color popular_product-button askForPrice">
                                                        Ask For Price
                                                    </a> --}}

                                                    <a href="{{ route('askForPrice',$product->slug) }}"
                                                        class="px-3 py-2 text-black bg-transparent border btn-color popular_product-button">
                                                        Ask For Price
                                                    </a>

                                                    @php
                                                        $cart_items = Cart::content();
                                                        $productInCart = false;

                                                        foreach ($cart_items as $item) {
                                                            if ($item->id == $product->id) {
                                                                $productInCart = true;
                                                                break;
                                                            }
                                                        }
                                                    @endphp

                                                    <button
                                                        class="px-3 py-2 btn-color popular_product-button add_to_cart cart_button_text{{ $product->id }}"
                                                        data-id="{{ $product->id }}"
                                                        data-name="{{ $product->name }}" data-quantity="1">
                                                        {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                    </button>

                                                    {{-- </a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Carousel Container -->
            {{-- @include('frontend.pages.home.rfq_modal') --}}
        </div>
    </div>
</section>
<!---------End -------->
<!---------Our Success Section-------->

<section class="success_section">
    <div class="container pb-4 my-4 d-lg-block d-sm-none">
        <h2 class="pb-5 text-center">Our Success <span class="main_color">Starts With</span> Our Culture.</h2>
        <div class="row success-area">
            @foreach ($successItems as $key => $successItem)
                @if (!empty($successItem->title))
                    <div class="col-lg-4">
                        <!---------Column  Content -------->
                        <div class="success-area-content">
                            <div class="pb-2">
                                <img width="50px" src="{{ asset('storage/' . $successItem->image) }}"
                                    alt="">
                            </div>
                            <div class="success-divider-{{ $key }}"></div>
                            <h4 class="success-divider-title-{{ $key }} pb-2">{{ $successItem->title }}</h4>
                            <p>{{ $successItem->description }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="container d-lg-none d-sm-block">
        <h3 class="text-center">Our Success <span class="main_color">Starts With</span> Our Culture.</h3>
        <div class="row">
            <div class="px-4 d-flex justify-content-between">
                <a class="Arrows custom-responsive-slider-prev"><i class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                <a class="Arrows custom-responsive-slider-next"><i
                        class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
            </div>
            <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                @foreach ($successItems as $key => $successItem)
                    @if (!empty($successItem->title))
                        <div class="border-0 item">
                            <div class="success-area-content success-area-content-mobile">
                                <div class="pb-2">
                                    <img src="{{ asset('storage/' . $successItem->image) }}" alt=""
                                        style="width: 50px;">
                                </div>
                                <div class="success-divider-{{ $key }}"></div>
                                <h4 class="success-divider-title-{{ $key }} pb-2">{{ $successItem->title }}
                                </h4>
                                <p>{{ $successItem->description }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</section>

<!---------End -------->
@endsection
