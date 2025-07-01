@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    @if (!empty($industry->image))
        <section>
            <div>
                <img class="page_top_banner"
                    src="{{ !empty($industry->image) && file_exists(public_path('storage/' . $industry->image)) ? asset('storage/' . $industry->image) : asset('frontend/images/no-banner(1920-330).png') }}"
                    alt="NGEN IT {{ $industry->title }} Industry">
            </div>
        </section>
    @endif

    <!----------End--------->
    <section class="mt-5 d-lg-block d-sm-none">
        <div class="container my-3">
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

                <a href="{{ route('all.industry') }}">
                    <li class="breadcrumb__item ">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Industries We Serve</span>
                        </span>
                    </li>
                </a>
                <li class="breadcrumb_divider">
                    <span>></span>
                </li>

                <a href="#">
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">{{ $industry->title }}</span>
                        </span>
                    </li>
                </a>

            </ul>
        </div>
    </section>
    @if (!empty($industry->industryPage->rowThree))
        <section class="py-2 my-2 py-lg-4 my-lg-5">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center">
                    <div class="col-lg-6 col-sm-12" style="text-align: justify;">
                        <h4 class="pt-3 container-text pt-lg-0">{{ $industry->industryPage->rowThree->title }}</h4>
                        <p class="pt-3 m-0" style="text-align: justify">{!! $industry->industryPage->rowThree->description !!}</p>
                        @if (!empty($industry->industryPage->rowThree->link))
                            <a href="{{ $industry->industryPage->rowThree->link }}"
                                class="btn-color">{{ $industry->industryPage->rowThree->btn_name }}</a>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid"
                            src="{{ !empty($industry->industryPage->rowThree->image) && file_exists(public_path('storage/' . $industry->industryPage->rowThree->image)) ? asset('storage/' . $industry->industryPage->rowThree->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                            style="height: 300px;width: 580px;border-bottom-left-radius: 60px;border-top-right-radius: 60px;">
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (!empty($industry->industryPage->rowFive))
        <section class="py-2 my-2 py-lg-4 my-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid"
                            src="{{ !empty($industry->industryPage->rowFive->image) && file_exists(public_path('storage/' . $industry->industryPage->rowFive->image)) ? asset('storage/' . $industry->industryPage->rowFive->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                            alt=""
                            style="height: 300px;width: 580px;border-bottom-left-radius: 60px;border-top-right-radius: 60px;">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h4 class="pt-3 container-text pt-lg-0">{{ $industry->industryPage->rowFive->title }}</h4>
                        <p>{!! $industry->industryPage->rowFive->description !!}</p>
                        @if (!empty($industry->industryPage->rowFive->link))
                            <a href="{{ $industry->industryPage->rowFive->link }}"
                                class="common_button2">{{ $industry->industryPage->rowFive->btn_name }}</a>
                        @else
                        @endif

                    </div>

                </div>
            </div>
        </section>
    @endif
    <!--======// Modern finance //======-->
    @if (!empty($industry->industryPage->rowOne))
        <section class="container-fluid mordern-finanace">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-12">
                        <div class="section_text_wrapper" style="text-align: justify">
                            <h4 style="font-size: var(--section-title-font-size);">
                                {{ $industry->industryPage->rowOne->title }}</h4>
                            <p style="text-align: justify;">{!! $industry->industryPage->rowOne->short_des !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="industry_single_help_list">
                            <h4 style="font-size: var(--section-title-font-size);">
                                {{ $industry->industryPage->rowOne->list_title }}</h4>
                            <ul>

                                <li class="d-flex">

                                    <div><span><i class="fa-regular fa-bookmark pe-2 main_color"></i>
                                            {{ $industry->industryPage->rowOne->list_one }}</span>
                                    </div>
                                </li>

                                <li class="d-flex">

                                    <div><span><i class="fa-regular fa-bookmark pe-2 main_color"></i>
                                            {{ $industry->industryPage->rowOne->list_two }}</span>
                                    </div>
                                </li>

                                <li class="d-flex">

                                    <div><span><i class="fa-regular fa-bookmark pe-2 main_color"></i>
                                            {{ $industry->industryPage->rowOne->list_three }}</span>
                                    </div>
                                </li>

                                <li class="d-flex">
                                    <div>
                                        <span><i class="fa-regular fa-bookmark pe-2 main_color"></i>
                                            {{ $industry->industryPage->rowOne->list_four }}</span>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!----------End--------->

    @if (!empty($industry->industryPage))
        <section>
            <div class="my-5 container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="mt-3 col-lg-12">
                            <h3><span
                                    class="beTopLine">{{ substr($industry->industryPage->row_four_title, 0, 2) }}</span>{{ substr($industry->industryPage->row_four_title, 2) }}
                            </h3>
                            <p>{{ $industry->industryPage->row_four_header }}</p>
                        </div>
                        <div class="mt-3 col-lg-5">
                            <div style="background-color: #ae0a46; padding: 50px;">
                                <h3 style="color: #fff;">
                                    {{ $industry->industryPage->row_four_col_one_title }}
                                </h3>
                                <p style="text-align: justify;color: white;padding-top: 20px;">
                                    {{ $industry->industryPage->row_four_col_one_header }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-3 col-lg-2">
                            <div>
                                <img class="img-fluid cusrve-arrow"
                                    src="{{ asset('images/red-arrow-1338626_1280.webp') }}" alt="">
                            </div>
                        </div>
                        <div class="mt-3 col-lg-5">
                            <div style="background-color: #ae0a46; padding: 50px;">
                                <h3 style="color: #fff;">
                                    {{ $industry->industryPage->row_four_col_two_title }}
                                </h3>
                                <p style="text-align: justify;color: white;padding-top: 20px;">
                                    {{ $industry->industryPage->row_four_col_two_header }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--======// Solution feature //======-->
    <!----------End--------->
    <section class="container my-5 mb-5 d-lg-block d-sm-none">
        <h2 class="text-center"><span class="main_color">Related Featured Solutions</span></h2>
        <p class="text-center">Cutting-edge solutions showcased for a glimpse into innovative
            advancements in diverse fields.</p>
        <div class="row">
            @php
                $solutionCards = [
                    $industry->industryPage->solutionCardOne,
                    $industry->industryPage->solutionCardTwo,
                    $industry->industryPage->solutionCardThree,
                    $industry->industryPage->solutionCardFour,
                ];
            @endphp
            @foreach ($solutionCards as $item)
                <div class="col-lg-3">
                    <div class="client_story_box">
                        <div class="pt-4 pb-3 details-titles ps-4">
                            <p class="pb-5">{{ Str::words($item->name, 6) }}</p>
                        </div>
                        <div class="grid-river">
                            <figure class="effect-oscar">
                                <img src="{{ !empty($item->banner_image) && file_exists(public_path('storage/' . $item->banner_image)) ? asset('storage/' . $item->banner_image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                    alt="">
                                <figcaption>
                                    {{-- <h6> {{ Str::words($item->name, 10) }}</h6> --}}
                                    <p style="height: 7em">{{ Str::words($item->header, 30) }}</p>
                                    <h5 class="download-hover-btn">
                                        <a class="text-white" href="{{ route('solution.details', $item->slug) }}">Read
                                            Story
                                            <i class="fa-solid fa-chevron-right" style="font-size: 12px;"></i>
                                        </a>
                                    </h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="container my-4 mb-5 d-lg-none d-sm-block">
        <div class="owl-carousel custom-responsive-slider">
            @foreach ($storys as $key => $story)
                <div class="border-0 item">
                    @if (!empty($story))
                        <div class="client_story_box">
                            <div class="pt-3 pb-3 details-titles ps-4">
                                <p class="pb-5">{{ $story->badge }}</p>
                            </div>
                            <div class="grid-river">
                                <figure class="effect-oscar">
                                    <img src="{{ !empty($item->banner_image) && file_exists(public_path('storage/' . $item->banner_image)) ? asset('storage/' . $item->banner_image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                        alt="">
                                    <figcaption>
                                        <h6> {{ Str::limit($item->name, 25) }}/h6>
                                            <p>{!! Str::limit($item->header, 120) !!}</p>
                                            <h5 class="download-hover-btn">
                                                <a class="text-white"
                                                    href="{{ route('solution.details', $item->slug) }}">Details
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
    </section>
    @if (!empty($industry->industryPage->footer_title))
        <section class="gradient_bg" style="">
            <div class="container">
                <div class="py-4 call_to_action_text">
                    <h4 class="section_title">{{ $industry->industryPage->footer_title }}</h4>
                    <p>{{ $industry->industryPage->footer_header }}</p>
                </div>
            </div>
        </section>
    @endif
    <!--======// Solution feature //======-->
    @if (!empty($techglossy))
        <section class="account_benefits_section_wp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <img class="rounded img-fluid" src="{{ asset('storage/' . $techglossy->image) }}"
                            alt="{{ $techglossy->badge }}" style="height: 350px;">
                    </div>
                    <div class="col-lg-6 col-sm-12 account_benefits_section">
                        <h5>{{ $techglossy->badge }}</h5>
                        <p>{{ $techglossy->title }}</p>
                        <a href="{{ route('techglossy.details', $techglossy->id) }}" class="common_button">Read More</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <br>
    <!-------------End--------->
<!--=======// Popular products //======-->
<section>
    <div class="container p-0 my-4">
        <div class="Container spacer">
            <h3 class="Head main_color">Products Related To This Industry</h3>
            <!-- Carousel Container -->
            <div class="SlickCarousel">
                @if ($products)
                    @foreach ($products as $product)
                        <!-- Item -->
                        <div class="mt-3 mb-3 ProductBlock">
                            <div class="Content">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="custom-product-grid">
                                            <div class="custom-product-image">
                                                <a href="{{ route('product.details', $product->slug) }}" class="image">
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
                                                    <h3 class="custom-title"> {{ Str::words($product->name, 10) }}</h3>
                                                </a>

                                                @if ($product->rfq == 1)
                                                    <div>
                                                        <div class="py-3 price">
                                                            {{-- <small class="price-usd">USD</small>
                                                            --.-- $ --}}
                                                        </div>
                                                        <a href="{{ route('rfq') }}"
                                                            class="d-flex justify-content-center align-items-center"
                                                            {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}" --}}
                                                            >
                                                            <button class="btn-color popular_product-button">
                                                                Ask For Price
                                                            </button>
                                                        </a>
                                                    </div>
                                                @elseif ($product->price_status && $product->price_status == 'rfq')
                                                    <div>
                                                        <div class="py-3 price">
                                                            {{-- <small class="price-usd">USD</small>
                                                        --.-- $ --}}
                                                        </div>
                                                        <a href="{{ route('rfq') }}"
                                                            class="d-flex justify-content-center align-items-center"
                                                            {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}" --}}
                                                            >
                                                            <button class="btn-color popular_product-button">
                                                                Ask For Price
                                                            </button>
                                                        </a>
                                                    </div>
                                                @elseif ($product->price_status && $product->price_status == 'offer_price')
                                                    <div>
                                                        <div class="py-3 price">
                                                            <small class="price-usd">USD</small>
                                                            $ {{ number_format($product->price, 2) }}
                                                        </div>
                                                        <a href="{{ route('rfq') }}"
                                                            class="d-flex justify-content-center align-items-center"
                                                            {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}" --}}
                                                            >
                                                            <button class="btn-color"
                                                            {{-- data-bs-toggle="modal"
                                                                data-bs-target="#askProductPrice" --}}
                                                                >
                                                                Your Price
                                                            </button>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div>
                                                        <div class="py-3 price">
                                                            <small class="price-usd">USD</small>
                                                            $ {{ number_format($product->price, 2) }}
                                                        </div>
                                                        <a href="" data-mdb-toggle="popover"
                                                            title="Add To Cart Now"
                                                            class="cart_button{{ $product->id }}"
                                                            data-mdb-content="Add To Cart Now"
                                                            data-mdb-trigger="hover">
                                                            <button type="button" class="btn-color add_to_cart"
                                                                data-id="{{ $product->id }}"
                                                                data-name="{{ $product->name }}" data-quantity="1">
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
    <!--======// Featured content //======-->
    @if (count($storys) > 0)
        <section class="related_posts_wrapper">
            <div class="container">
                <div class="related_posts_title">
                    <h1 class="text-center">Storys Related to this Industry</h1>
                </div>
                <div class="row">
                    <!--------item------->
                    @foreach ($storys as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="related-item">
                                <a href="{{ route('blog.details', $item->id) }}">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}"
                                        alt="" style="height:140px; ">
                                    <h4>{{ $item->badge }}</h6>
                                        <h3>
                                            <strong>{{ $item->title }}</strong>
                                        </h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-------------End--------->

    @if (count($solutions) > 0)
        <section class="related_posts_wrapper">
            <div class="container">
                <div class="py-3">
                    <h2 class="text-center"><span class="main_color">Other Solutions Related to this Industry</span></h2>
                </div>

                <div class="row">
                    <!--------item------->
                    <div class="SlickCarousel">
                        <!--------item------->
                        @foreach ($solutions as $item)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="related-item">
                                    <a href="{{ route('solution.details', $item->slug) }}">
                                        <div>
                                            <img class="img-fluid" src="{{ asset('storage/' . $item->banner_image) }}"
                                                alt="" style="height: 200px; width:100%">
                                        </div>
                                        <div class="p-3" style="height:6.5rem;">
                                            <h4 class="mb-1">
                                                {{ App\Models\Admin\Industry::where('id', $item->industry_id)->value('title') }}
                                            </h4>
                                            <h3 class="mb-0 fw-bold solutions-titles">{{ $item->name }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
