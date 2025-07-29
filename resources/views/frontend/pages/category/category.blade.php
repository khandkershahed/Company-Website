@extends('frontend.master')
@section('content')
    <style>
        .ag-offer_item {
            height: 140px;
            max-height: 100%
        }
    </style>

    <!-- banner single page start -->
    <section class="py-3 banner_single_page"
        style="background-image:url('{{ asset('storage/' . $category->banner_image) }}');background-color: black;background-repeat: no-repeat;background-size: cover;height:300px;">

        <div class="container">
            <div class="single_banner_content">
                <!-- image -->
                <div class="text-center single_banner_image">
                    {{-- <img class="my-3" src="{{ asset('storage/' . $category->image) }}" alt="" height="100px" width="100px"> --}}
                </div>
                <!-- heading -->
                <h1 class="mb-4 text-center text-white single_banner_heading" style="margin-top: 4.5rem;">
                    {{ $category->title }}</h1>
                {{-- <p class="single_banner_text">{{ $data->h2 }}</p> --}}
                <div class="mb-2 text-center single_buttton_wrapper">
                    <a href="{{ route('custom.product', $category->slug) }}" class="btn-color">Shop all
                        {{ $category->title }}</a>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
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

                <a href="{{ route('all.category') }}">
                    <li class="breadcrumb__item ">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">All Category</span>
                        </span>
                    </li>
                </a>
                @if ($condition == 'category')
                    <li class="breadcrumb_divider">
                        <span>></span>
                    </li>

                    <a href="#">
                        <li class="breadcrumb__item active">
                            <span class="breadcrumb__inner">
                                <span class="breadcrumb__title">{{ $category->title }}</span>
                            </span>
                        </li>
                    </a>
                @elseif ($condition == 'subcategory')
                    <li class="breadcrumb_divider">
                        <span>></span>
                    </li>

                    <a href="{{ route('category.details', $cat_title->slug) }}">
                        <li class="breadcrumb__item ">
                            <span class="breadcrumb__inner">
                                <span class="breadcrumb__title">{{ $cat_title->title }}</span>
                            </span>
                        </li>
                    </a>
                    <li class="breadcrumb_divider">
                        <span>></span>
                    </li>

                    <a href="#">
                        <li class="breadcrumb__item active">
                            <span class="breadcrumb__inner">
                                <span class="breadcrumb__title">{{ $category->title }}</span>
                            </span>
                        </li>
                    </a>
                @else
                    <li class="breadcrumb_divider">
                        <span>></span>
                    </li>

                    <a href="{{ route('category.details', $cat_title->slug) }}">
                        <li class="breadcrumb__item">
                            <span class="breadcrumb__inner">
                                <span class="breadcrumb__title">{{ $cat_title->title }}</span>
                            </span>
                        </li>
                    </a>
                    <li class="breadcrumb_divider">
                        <span>></span>
                    </li>

                    <a href="{{ route('category.details', $sub_cat_title->slug) }}">
                        <li class="breadcrumb__item">
                            <span class="breadcrumb__inner">
                                <span class="breadcrumb__title">{{ $sub_cat_title->title }}</span>
                            </span>
                        </li>
                    </a>
                    <li class="breadcrumb_divider">
                        <span>></span>
                    </li>

                    <a href="#">
                        <li class="breadcrumb__item active">
                            <span class="breadcrumb__inner">
                                <span class="breadcrumb__title">{{ $category->title }}</span>
                            </span>
                        </li>
                    </a>
                @endif

            </ul>
        </div>
    </section>


    <!-- Sub Category section-->
    @if (!empty($sub_cats) && count($sub_cats) > 0)
        <section>
            <div class="container ag-offer-block">
                <div class="common_product_item_title">
                    <h3>Display Sub Categories for {{ $category->title }}</h3>
                </div>
                <div class="ag-format-container row gx-1">
                    @foreach ($sub_cats as $key => $item)
                        <div class="ag-offer_list col-lg-3">
                            <div class="ag-offer_item"
                                style="border: 1px dotted rgb(179, 179, 179); margin: 0.15rem!important;">
                                <div class="ag-offer_visible-item">
                                    <div class="px-2 ag-offer_img-box">
                                        <img src="{{ asset('storage/' . $item->image) }}" class="ag-offer_img"
                                            alt="{{ $item->title }}"
                                            style="width:75px !important;height:75px !important;" />
                                    </div>
                                    <div class="ag-offer_title">
                                        <p>{{ Str::limit($item->title, 45) }}</p>
                                    </div>
                                </div>
                                <div class="ag-offer_hidden-item">
                                    <div class="mx-auto">
                                        <a href="{{ route('category.details', $item->slug) }}" class="btn-color">
                                            Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (!empty($sub_sub_cats) && count($sub_sub_cats) > 0)
                        @foreach ($sub_sub_cats as $key => $item)
                            <div class="ag-offer_list col-lg-3">
                                <div class="ag-offer_item"
                                    style="border: 1px dotted rgb(179, 179, 179); margin: 0.15rem!important;">
                                    <div class="ag-offer_visible-item">
                                        <div class="px-2 ag-offer_img-box">
                                            <img src="{{ asset('storage/' . $item->image) }}" class="ag-offer_img"
                                                alt="{{ $item->title }}"
                                                style="width:75px !important;height:75px !important;" />
                                        </div>
                                        <div class="ag-offer_title">
                                            <p>{{ Str::limit($item->title, 45) }}</p>
                                        </div>
                                    </div>
                                    <div class="ag-offer_hidden-item">
                                        <div class="mx-auto">
                                            <a href="{{ route('category.details', $item->slug) }}" class="btn-color">
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container ag-offer-block">
                <div class="common_product_item_title">
                    <h3 class="text-danger">No Data Found</h3>
                </div>

            </div>
        </section>
    @endif
    <!-- Sub Category section-->

    <!--======// Top Brand //=====-->
    @if (!empty($brands) && count($brands) > 0)
        <section>
            <div class="container ag-offer-block">
                <div class="common_product_item_title">
                    <h3>Related Brands for {{ $category->title }}</h3>
                </div>
                <div class="ag-format-container row gx-1">
                    @foreach ($brands as $key => $item)
                        <div class="ag-offer_list col-lg-2 col-md-2 col-sm-4">
                            <div class="ag-offer_item"
                                style="border: 1px dotted rgb(179, 179, 179); margin: 0.15rem!important;">
                                <div class="ag-offer_visible-item">
                                    <div class="mx-auto ag-offer_img-box d-felx justify-content-center">
                                        <img src="{{ asset('storage/' . $item->image) }}" class="ag-offer_img"
                                            alt="{{ $item->title }}" width="150px" height="150px" />
                                    </div>
                                </div>
                                <div class="ag-offer_hidden-item">
                                    <div class="mx-auto">
                                        <div class="brand_btns"
                                            style="justify-content: center;
                                    background: #ae0a46;
                                    padding: 7px;
                                    color: white;
                                    font-size: 13px;
                                    display: flex;">
                                            <a class="text-white"
                                                href="{{ route('brand.overview', $item->slug) }}">Details | </a>
                                            <a class="text-white ms-1"
                                                href="{{ route('custom.product', $item->slug) }}"><span
                                                    class="">Shop</span> </a>
                                        </div>
                                        {{-- <a href="{{ route('custom.product', $item->slug) }}" class="btn-color">
                                        Shop
                                    </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!----------End--------->

    <!---Products Section-->

    @if (!empty($products) && count($products) > 0)
        <section class="container">
            <div class="tech_deals_section_content" id="tech_deal">
                <!-- section title -->
                <div class="tech_deals_featured_item_title">
                    <h3>Featured Products for {{ $category->title }}</h3>
                    {{-- <p>Discover our latest discounts and limited-time offers on the technology brands and devices your business trusts.</p> --}}
                </div>
                <!-- wrapper -->
                <div class="row">
                    <!-- product_item -->
                    @foreach ($products as $item)
                        <div class="p-0 pb-1 col-lg-3 col-md-4 col-sm-6">
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
                                                            <a href="{{ route('askForPrice', $product->slug) }}"
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
                                                            <a href="{{ route('askForPrice', $product->slug) }}"
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
                                                                data-mdb-content="Add To Cart Now"
                                                                data-mdb-trigger="hover">
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
                        </div>
                    @endforeach


                </div>
            </div>
            <!------------------Pagination------------------->
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $products->links() }}
                    </ul>

                </nav>
            </div>
        </section><br>
    @endif
    <!---Products Section-->
    @include('frontend.pages.home.rfq_modal')

@endsection
