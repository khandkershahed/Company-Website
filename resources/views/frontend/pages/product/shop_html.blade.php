@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section class="common_product_header"
        style="background-image: linear-gradient(
        rgba(0,0,0,0.8),
        rgba(0,0,0,0.8)
        ),url('https://img.freepik.com/free-vector/dark-blue-waves-dots-abstract-background_79603-879.jpg'); background-size: cover">
        <div class="container ">
            <h1>Ready For Shop</h1>
            <p class="text-center text-white">Explore our Products By categories, Brands to see<br> options for hardware,
                software and accessories. </p>
            <div class="row ">
                <!--BUTTON START-->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="m-4">
                        <a class="btn-white" href="{{ route('shop') }}">Online Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------End--------->


    <!--=======// Popular products //======-->
    <section>
        <div class="container p-0 my-4">
            <div class="Container spacer">
                <h3 class="Head main_color">Popular Products <span class="Arrows"></span></h3>
                <!-- Carousel Container -->
                <div class="SlickCarousel">
                    @if ($products)
                        @foreach ($products as $item)
                            <!-- Item -->
                            <div class="mt-3 mb-3 ProductBlock">
                                <div class="Content">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="custom-product-grid">
                                                <div class="custom-product-image">
                                                    <a href="{{ route('product.details', $item->slug) }}" class="image">
                                                        {{-- <img class="pic-1" src="{{ asset($item->thumbnail) }}"> --}}
                                                        <img class="img-fluid"
                                                            src="{{ !empty($item->thumbnail) && file_exists(public_path($item->thumbnail)) ? asset($item->thumbnail) : asset('frontend/images/random-no-img.png') }}"
                                                            alt="NGEN IT">
                                                    </a>
                                                    <ul class="custom-product-links">
                                                        <li><a href="#"><i class="text-white fa fa-random"></i></a>
                                                        </li>
                                                        <li><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#productDetails{{ $item->id }}"><i
                                                                    class="text-white fa fa-search"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="custom-product-content">
                                                    <a href="{{ route('product.details', $item->slug) }}">
                                                        <h3 class="custom-title"> {{ Str::words($item->name, 10) }}</h3>
                                                    </a>

                                                    @if ($item->rfq == 1)
                                                        <div>
                                                            <div class="py-3 price">
                                                                {{-- <small class="price-usd">USD</small>
                                                            --.-- $ --}}
                                                            </div>
                                                            <a href="{{ route('askForPrice', $item->slug) }}"
                                                                class="px-3 py-2 text-black bg-transparent border btn-color popular_product-button">
                                                                Ask For Price
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'rfq')
                                                        <div>
                                                            <div class="py-3 price">
                                                                {{-- <small class="price-usd">USD</small>
                                                        --.-- $ --}}
                                                            </div>
                                                            <a href="{{ route('askForPrice', $item->slug) }}"
                                                                class="px-3 py-2 text-black bg-transparent border btn-color popular_product-button">
                                                                Ask For Price
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'offer_price')
                                                        <div>
                                                            <div class="py-3 price">
                                                                <small class="price-usd">USD</small>
                                                                $ {{ number_format($item->price, 2) }}
                                                            </div>
                                                            <a href="{{ route('rfq') }}"
                                                                class="d-flex justify-content-center align-items-center"
                                                                {{-- data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}" --}}>
                                                                <button class="btn-color" {{-- data-bs-toggle="modal"
                                                                    data-bs-target="#askProductPrice" --}}>
                                                                    Your Price
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <div class="py-3 price">
                                                                <small class="price-usd">USD</small>
                                                                $ {{ number_format($item->price, 2) }}
                                                            </div>
                                                            <a href="" data-mdb-toggle="popover"
                                                                title="Add To Cart Now"
                                                                class="cart_button{{ $item->id }}"
                                                                data-mdb-content="Add To Cart Now" data-mdb-trigger="hover">
                                                                <button type="button" class="btn-color add_to_cart"
                                                                    data-id="{{ $item->id }}"
                                                                    data-name="{{ $item->name }}" data-quantity="1">
                                                                    Add to Cart
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @endif
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
                @include('frontend.pages.home.rfq_modal')
            </div>
        </div>
    </section>
    <!---------End -------->

    <!--========Shop by category=======-->
    <section class="pb-4 clint_tab_section">
        <div class="container">
            <div class="pb-3 clint_tab_content">
                <!-- home title -->
                <div class="mt-3 mb-3 home_title">
                    <div class="software_feature_title">
                        <h1 class="text-center">By Categories</h1>
                    </div>
                    <p class="home_title_text">See how we’ve helped organizations of all sizes
                        <span class="font-weight-bold">across every industry</span>
                        <br> maximize the value of their IT solutions, leverage emerging technologies and create fresh
                        experiences.
                    </p>
                </div>
                <!-- Client Tab Start -->
                <div class="row">
                    <div class="col-xs-12 ">
                        {{-- <nav>
                            <div class="p-0 nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background: none;">
                                <a class="nav-item nav-link active" id="nav-healthcare" data-bs-toggle="tab" href="#all"
                                    role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#software"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Software</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#hardware"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Hardware</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#training"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Training & Books</a>
                            </div>
                        </nav> --}}
                        <nav>
                            <div class="p-0 nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background: none;">
                                <a class="nav-item nav-link active" id="nav-all-tab" data-bs-toggle="tab" href="#all"
                                    role="tab" aria-controls="all" aria-selected="true">All</a>
                                <a class="nav-item nav-link" id="nav-software-tab" data-bs-toggle="tab" href="#software"
                                    role="tab" aria-controls="software" aria-selected="false">Software</a>
                                <a class="nav-item nav-link" id="nav-hardware-tab" data-bs-toggle="tab" href="#hardware"
                                    role="tab" aria-controls="hardware" aria-selected="false">Hardware</a>
                                <a class="nav-item nav-link" id="nav-training-tab" data-bs-toggle="tab" href="#training"
                                    role="tab" aria-controls="training" aria-selected="false">Training & Books</a>
                            </div>
                        </nav>
                        <div class="px-3 shadow-sm tab-content px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel"
                                aria-labelledby="nav-all-tab">
                                <div class="row">

                                    @if ($all_categories)
                                        @foreach ($all_categories as $item)
                                            <div class="my-4 mb-2 col-md-3 col-sm-6">
                                                <a href="{{ route('category.details', $item->slug) }}">
                                                    <div class="serviceBox">
                                                        <div class="service-icon">
                                                            <img class="img-fluid"
                                                                style="border-radius: 50%; height:70px !important; width:70px !important;"
                                                                src="{{ !empty($item->image) && file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/images/no-shop-imge.png') }}"
                                                                alt="NGEN IT">
                                                        </div>
                                                        <p class="m-0 ps-2">{{ $item->title }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="tab-pane fade" id="software" role="tabpanel"
                                aria-labelledby="nav-software-tab">
                                <div class="row">

                                    @if ($software_categories)
                                        @foreach ($software_categories as $item)
                                            <div class="my-4 mb-2 col-md-3 col-sm-6">
                                                <a href="{{ route('category.details', $item->slug) }}">
                                                    <div class="serviceBox">
                                                        <div class="service-icon">
                                                            <img class="img-fluid"
                                                                style="border-radius: 50%; height:70px !important; width:70px !important;"
                                                                src="{{ !empty($item->image) && file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/images/no-shop-imge.png') }}"
                                                                alt="NGEN IT">
                                                        </div>
                                                        <p class="m-0 ps-2">{{ $item->title }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="tab-pane fade" id="hardware" role="tabpanel"
                                aria-labelledby="nav-hardware-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="container">
                                            <div class="row">

                                                @if ($hardware_categories)
                                                    @foreach ($hardware_categories as $item)
                                                        <div class="my-4 mb-2 col-md-3 col-sm-6">
                                                            <a href="{{ route('category.details', $item->slug) }}">
                                                                <div class="serviceBox">
                                                                    <div class="service-icon">
                                                                        <img class="img-fluid"
                                                                            style="border-radius: 50%; height:70px !important; width:70px !important;"
                                                                            src="{{ !empty($item->image) && file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/images/no-shop-imge.png') }}"
                                                                            alt="NGEN IT">
                                                                    </div>
                                                                    <p class="m-0 ps-2">{{ $item->title }}</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="training" role="tabpanel"
                                aria-labelledby="nav-training-tab">
                                <div class="row">
                                    <div class="my-4 col-lg-12 col-md-12 col-sm-12">
                                        <div class="container">
                                            <div class="row">
                                                @if ($training_categories)
                                                    @foreach ($training_categories as $item)
                                                        <div class="my-4 mb-2 col-md-3 col-sm-6">
                                                            <a href="{{ route('category.details', $item->slug) }}">
                                                                <div class="serviceBox">
                                                                    <div class="service-icon">
                                                                        <img class="img-fluid"
                                                                            style="border-radius: 50%; height:70px !important; width:70px !important;"
                                                                            src="{{ !empty($item->image) && file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/images/no-shop-imge.png') }}"
                                                                            alt="NGEN IT">
                                                                    </div>
                                                                    <p class="m-0 ps-2">{{ $item->title }}</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client Tab End -->
            </div>
        </div>
    </section>
    <!---------End -------->
    <!--===== Technolgy Deals======-->
    <section class="py-5 common_product_technolgy_deals_wrapper">
        <div class="container">
            <div class="row align-content-center ">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img class="img-fluid" src="{{ asset('frontend/images/technology-deals.png') }}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 technolgy_deals_blog">
                    <h2>Unbeatable technology deals</h2>
                    <p>Explore <a href="{{ route('custom.product', 'deals') }}">deals,</a> <a
                            href="{{ route('custom.product', 'refurbished') }}">refurbished products</a> and limited-time
                        offers. From laptops to cables, accessories and printers, we offer the technology you need at
                        affordable prices — you gain the option of discounted pricing from a variety of brands.</p><br>
                    <a href="{{ route('shop') }}" class="btn-color">Shop & Save</a>
                </div>
            </div>
        </div>
    </section>
    <!--=====Need Help Finding Prodcut======-->
    <section class="need_help_finding_prodcut"
        style="background-image:url('{{ asset('frontend/images/help-background-imges.jpg') }}')">
        <div class="container">
            <h2>Need Help To Find <br> The Right Products?</h2>
            <div class="d-flex justify-content-center pt-lg-5">
                <a href="{{ route('shop') }}" class="btn-white">Explore our configurators</a>
            </div>

        </div>
    </section>
    <!------End---->
    <!--======// Magazine Section //======-->
    <section>
        <div class="container">
            @if (!empty($techglossy))
                <div class="my-5 mb-3 bg-white row magazine_content">
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
                                    <a href="{{ route('techglossy.details', $techglossy->slug) }}"
                                        class="pt-3 business_item_button d-flex justify-content-start">
                                        <span>Read More</span>
                                        <span class="business_item_button_icon">
                                            <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="p-0 col-lg-6 d-lg-block d-sm-none">
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
    <!----Technolgy Deals End---->

    <!--========Shop by Brands=======-->
    <!----------End--------->
    <section>
        {{-- Top Brands --}}
        <div class="container brand-container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="pt-2 pb-2 home_title_heading pt-lg-4 pb-lg-2"><span class="main_color fw-bold">By</span>
                        Brands</h5>
                    <p class="pt-1 pb-1 home_title_text pt-lg-2 pb-lg-2">See how we’ve helped organizations of all sizes
                        <span class="font-weight-bold">across every industry</span>
                        <br> maximize the value of their IT solutions, leverage emerging technologies and create fresh
                        experiences.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($brands as $brand)
                    <div class="mb-3 col-lg-2 col-sm-12 mb-lg-4">
                        <div class="card rounded-0 brand_img_container">
                            <div class="card-body image_box">
                                <div class="brand-images">
                                    <a href="{{ route('brand.overview', $brand->slug) }}">
                                        <img src="{{ asset('storage/' . $brand->image) }}" class="img-fluid"
                                            alt=""> </a>
                                </div>
                            </div>
                            <div class="p-0 m-0 border-0 card-footer">
                                <div class="brand_btns"
                                    style="justify-content: center;
                                          background: #ae0a46;
                                          color: white;
                                          font-size: 13px;
                                          display: flex;">
                                    <a class="py-2 text-white" href="{{ route('brand.overview', $brand->slug) }}">Details
                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                    </a>
                                    <span class="ms-3 me-3" style="background: #ffff;">||</span>
                                    <a class="py-2 text-white" href="{{ route('custom.product', $brand->slug) }}">Shop
                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $brands->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!--========Shop by Brands=======-->

    <!--========Page Contact Form=======-->
    @include('frontend.partials.footer_contact')
    <!--========Page Contact Form=======-->

@endsection
