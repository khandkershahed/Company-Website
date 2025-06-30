@extends('frontend.master')
@section('styles')
    <meta property="og:title" content="{{ $sproduct->name }} in NGen IT">
    <meta property="og:image" content="{{ asset($sproduct->thumbnail) }}">
    @php
        $isProductPage = true; // Flag to indicate this is a product details page
        $metaTitle = $sproduct->name;
        $metaDescription = strip_tags(
            $sproduct->meta_description ?? substr(html_entity_decode($sproduct->short_desc), 0, 150),
        );

        $metaImage = $sproduct->thumbnail ?? ''; // Default image
    @endphp
@endsection
@section('content')
    @include('frontend.pages.kukapages.partial.page_header')
    <style>
        .qty-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-container .input-qty {
            text-align: center;
            padding: 6px 10px;
            border: 1px solid #d4d4d4;
            max-width: 50px;
            max-height: 30px;
            padding: 0;
            line-height: 0;
            padding-bottom: 5px;
        }

        .qty-container .qty-btn-minus,
        .qty-container .qty-btn-plus {
            border: 1px solid #d4d4d4;
            padding: 5px 5px 5px;
            font-size: 10px;
            height: 30px;
            width: 38px;
            transition: 0.3s;
        }

        .qty-container .qty-btn-plus {
            margin-left: -1px;
        }

        .qty-container .qty-btn-minus {
            margin-right: -1px;
        }

        /*---------------------------*/
        .btn-cornered,
        .input-cornered {
            border-radius: 0px;
        }

        .input-rounded {
            border-radius: 0px;
        }

        /* News */

        .quantity-selectors-container {
            display: inline-block;
            vertical-align: top;
            margin: 0;
            padding: 0;
        }

        .quantity-selectors {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
        }

        .quantity-selectors button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
            border-radius: 0;
            font-size: 12px;
            padding: 0px 6px 4px;
        }

        .quantity-selectors button:first-child {
            border-bottom: 0;
        }

        .quantity-selectors button:hover {
            cursor: pointer;
        }

        .quantity-selectors button[disabled="disabled"] {
            cursor: not-allowed;
        }

        .quantity-selectors button[disabled="disabled"] span {
            opacity: 0.5;
        }

        .quantity-box {
            text-align: center;
            width: 40px;
            height: auto;
        }
    </style>
    <section>
        <div class="container my-5">
            <div class="single-product-container">
                <div class="row g-3">
                    <div class="col-lg-6 col-sm-12 single_product_images">
                        <!-- gallery pic -->

                        <div class="mx-auto d-block">
                            @php
                                $mainImage = $multi_images->isNotEmpty()
                                    ? $multi_images->first()->photo
                                    : $sproduct->thumbnail;
                            @endphp
                            <img id="expand" class="geeks img-fluid mx-auto d-block w-100"
                                src="{{ asset($sproduct->thumbnail) }}">
                        </div>

                        @if ($multi_images->isNotEmpty())
                            <div class="img_gallery_wrapper row pt-1">
                                @foreach ($multi_images as $multi_image)
                                    <div class="col-2 p-1">
                                        <img class="img-fluid" src="{{ asset($multi_image->photo) }}" onclick="gfg(this);">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="single-product-details pt-2">
                            <div class="row gx-0 px-2">
                                <h4>{{ $sproduct->name }}</h4>
                                <ul class="d-flex align-items-center p-1">
                                    @if (!empty($sproduct->sku_code))
                                        <li class="me-2">
                                            <p class="p-0 m-0" style="color: rgb(134, 134, 134);font-size: 13px;"><i
                                                    class="fa-solid fa-tag me-1 single-bp-tag"></i><span>NG #
                                                </span>{{ $sproduct->sku_code }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($sproduct->mf_code))
                                        <li class="me-2">
                                            <p class="p-0 m-0" style="color: rgb(134, 134, 134);font-size: 13px;"><i
                                                    class="fa-solid fa-tag me-1 single-bp-tag"></i><span>MF #
                                                </span>{{ $sproduct->mf_code }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($sproduct->product_code))
                                        <li class="me-1">
                                            <p class="p-0 m-0" style="color: rgb(134, 134, 134);font-size: 13px;"><i
                                                    class="fa-solid fa-tag me-1 single-bp-tag"></i><span>SKU #
                                                </span>{{ $sproduct->product_code }}
                                            </p>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="row gx-0 px-2">
                                <p class="p-0">{!! $sproduct->short_desc !!}</p>
                            </div>
                            <div class="d-flex align-items-center gx-0 px-2">
                                <div>
                                    <h6 class="me-3 p-0 m-0">Manufactured By :</h6>
                                </div>
                                <div>
                                    <h6 class="fw-bold me-3 p-0 m-0">{{ $sproduct->getBrandName() }}</h6>
                                    {{-- <p class="p-0 m-0"><i class="fa-solid fa-location-dot me-2 text-muted"></i></p> --}}
                                    {{-- <p class="p-0 m-0">Germany</p> --}}
                                </div>
                            </div>

                            {{-- <div class="row mt-5"> --}}
                            <div class="row product_quantity_wraper justify-content-between gx-0"
                                style="background-color: transparent !important;">
                                @if ($sproduct->rfq == 1)
                                    <div class="d-lg-block d-sm-none p-0">
                                        <div class="row justify-content-between align-items-center p-0">
                                            {{-- <a class="btn-color" href="{{route('contact')}}">Call Ngen It for price</a> --}}
                                            <div class="need_help col-lg-8 col-sm-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        {{-- <button class="search-btn-price" id="modal_view_left" data-bs-toggle="modal"
                                                            data-bs-target="#rfq_product{{ $sproduct->id }}">Ask For
                                                            Price</button> --}}
                                                        <a class="search-btn-price" id="modal_view_left"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rfq_product{{ $sproduct->id }}">Ask
                                                            For Price</a>
                                                    </div>
                                                    <div class="d-flex border">
                                                        <input data-min="1" data-max="0" type="text" name="quantity"
                                                            value="2" readonly="true"
                                                            class="quantity-box border-0 bg-light">
                                                        <div class="quantity-selectors-container">
                                                            <div class="quantity-selectors">
                                                                <button type="button" class="increment-quantity border-0"
                                                                    aria-label="Add one" data-direction="1">
                                                                    <i class="fa-solid fa-plus" style="color: #7a7577"></i>
                                                                </button>
                                                                <button type="button" class="decrement-quantity border-0"
                                                                    aria-label="Subtract one" data-direction="-1"
                                                                    disabled="disabled">
                                                                    <i class="fa-solid fa-minus" style="color: #7a7577"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="need_help col-lg-4 col-sm-4">
                                                <div class="stock-info">
                                                    <p tabindex="0" class="prod-stock mb-0"
                                                        id="product-avalialability-by-warehouse">
                                                        <span aria-label="Stock Availability" class="js-prod-available"> <i
                                                                class="fa fa-info-circle text-success"></i> Stock</span>
                                                        <br>
                                                        @if ($sproduct->stock == 'available')
                                                            <span class="text-success"
                                                                style="font-size:17px">{{ $sproduct->qty }}
                                                                in stock</span>
                                                        @elseif ($sproduct->stock == 'limited')
                                                            <span class="text-success"
                                                                style="font-size:17px; font-weight:500;">Limited</span>
                                                        @elseif ($sproduct->stock == 'unlimited')
                                                            <span class="text-success"
                                                                style="font-size:17px; font-weight:500;">Unlimited</span>
                                                        @elseif ($sproduct->stock == 'stock_out')
                                                            <span class="text-danger"
                                                                style="font-size:17px; font-weight:500;">Stock Out</span>
                                                        @else
                                                            <span class="text-danger pb-2"
                                                                style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-2 mt-3 px-4"
                                            style="width:100%; background: #f4efe4;">
                                            <div>
                                                <h6>Need Help Ordering?</h6>
                                                <h6>Call <span>{{ App\Models\Admin\Setting::first()->mobile }}</span>
                                                </h6>
                                            </div>
                                            <div class="text-end">
                                                <p class="list_price mb-0">Custom Pricing</p>
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#rfq_product{{ $sproduct->id }}">
                                                    <span class="fw-bold" style="color: #ae0a46;">Get A Quote</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-lg-none d-sm-block p-0">
                                        <div>
                                            <div class="row justify-content-between align-items-center p-0">
                                                {{-- <a class="btn-color" href="{{route('contact')}}">Call Ngen It for price</a> --}}
                                                <div class="need_help col-6">
                                                    <button class="btn-color brand-product-btn" id="modal_view_left"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#rfq_product{{ $sproduct->id }}"
                                                        style="width: 100%;">Ask For Price</button>
                                                </div>
                                                <div class="need_help col-6 p-0">
                                                    <h6>Need Help Ordering?</h6>
                                                    <h6>Call
                                                        <span>{{ App\Models\Admin\Setting::first()->mobile }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-3 mt-3 px-4"
                                                style="width:100%; background: #f4efe4;">
                                                <div class="stock-info">
                                                    <p tabindex="0" class="prod-stock mb-0"
                                                        id="product-avalialability-by-warehouse">
                                                        <span aria-label="Stock Availability" class="js-prod-available">
                                                            <i class="fa fa-info-circle text-success"></i> Stock</span>
                                                        <br>
                                                        @if ($sproduct->stock == 'available')
                                                            <span class="text-success"
                                                                style="font-size:17px">{{ $sproduct->qty }}
                                                                in stock</span>
                                                        @elseif ($sproduct->stock == 'limited')
                                                            <span class="text-success"
                                                                style="font-size:17px; font-weight:500;">Limited</span>
                                                        @elseif ($sproduct->stock == 'unlimited')
                                                            <span class="text-success"
                                                                style="font-size:17px; font-weight:500;">Unlimited</span>
                                                        @elseif ($sproduct->stock == 'stock_out')
                                                            <span class="text-danger"
                                                                style="font-size:17px; font-weight:500;">Stock Out</span>
                                                        @else
                                                            <span class="text-danger pb-2"
                                                                style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="text-end">
                                                    <p class="list_price mb-0">Custom Pricing</p>
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#rfq_product{{ $sproduct->id }}">
                                                        <span class="fw-bold" style="color: #ae0a46;">Get A Quote</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($sproduct->price_status && $sproduct->price_status == 'rfq')
                                    <div class="row justify-content-between align-items-center">
                                        {{-- <a class="btn-color" href="{{route('contact')}}">Call Ngen It for price</a> --}}
                                        <div class="need_help col-lg-5 col-sm-12 p-0">
                                            <button class="search-btn-price" id="modal_view_left" data-bs-toggle="modal"
                                                data-bs-target="#rfq_product{{ $sproduct->id }}" style="width: 100%;">Ask
                                                For Price</button>
                                        </div>
                                        <div class="need_help col-lg-7 col-sm-12 p-0">
                                            <h6 class="m-2">Need Help Ordering?</h6>
                                            <h6>Call <span>{{ App\Models\Admin\Setting::first()->mobile }}</span></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-2 mt-2 px-4"
                                        style="width:100%; background: #f4efe4;">
                                        <div class="stock-info">
                                            <p tabindex="0" class="prod-stock mb-0"
                                                id="product-avalialability-by-warehouse">
                                                <span aria-label="Stock Availability" class="js-prod-available"> <i
                                                        class="fa fa-info-circle text-success"></i> Stock</span> <br>
                                                @if ($sproduct->stock == 'available')
                                                    <span class="text-success"
                                                        style="font-size:17px">{{ $sproduct->qty }}
                                                        in stock</span>
                                                @elseif ($sproduct->stock == 'limited')
                                                    <span class="text-success"
                                                        style="font-size:17px; font-weight:500;">Limited</span>
                                                @elseif ($sproduct->stock == 'unlimited')
                                                    <span class="text-success"
                                                        style="font-size:17px; font-weight:500;">Unlimited</span>
                                                @elseif ($sproduct->stock == 'stock_out')
                                                    <span class="text-danger"
                                                        style="font-size:17px; font-weight:500;">Stock Out</span>
                                                @else
                                                    <span class="text-danger pb-2"
                                                        style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="list_price mb-0 me-3">Custom Pricing</p>
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#rfq_product{{ $sproduct->id }}">
                                                <span class="fw-bold" style="color: #ae0a46;">Get A Quote</span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    @php
                                        $cart = Gloudemans\Shoppingcart\Facades\Cart::content();
                                    @endphp
                                    @if ($cart->where('id', $sproduct->id)->count())
                                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                                            <div class="btn-color2">
                                                <a class="text-white" href="javascript:void(0);"> Already in Cart</a>
                                            </div>
                                        </div>
                                    @else
                                        <button class="btn-color brand-product-btn" id="modal_view_left"
                                            data-bs-toggle="modal" data-bs-target="#rfq_product{{ $sproduct->id }}"
                                            style="width: 100%;">Get Quote</button>
                                        {{-- <form action="{{ route('add.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" id="product_id"
                                                value="{{ $sproduct->id }}">
                                            <input type="hidden" name="name" id="name"
                                                value="{{ $sproduct->name }}">
                                            <div class="row ">
                                                <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between bg-light py-2"
                                                    style="width: 80%;">
                                                    <div class="pro-qty">
                                                        <input type="hidden" name="product_id" id="product_id"
                                                            value="{{ $sproduct->id }}">
                                                        <input type="hidden" name="name" id="name"
                                                            value="{{ $sproduct->name }}">
                                                        <div class="counter">
                                                            <span class="down"
                                                                onClick='decreaseCount(event, this)'>-</span>
                                                            <input type="text" name="qty" value="1"
                                                                class="count_field">
                                                            <span class="up"
                                                                onClick='increaseCount(event, this)'>+</span>

                                                        </div>
                                                    </div>
                                                    <button class="btn-color2 ms-3" type="submit">Add to
                                                        Basket</button>
                                                </div>

                                            </div>
                                        </form> --}}
                                    @endif
                                    <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-2 mt-2 px-lg-5 px-2"
                                        style="width: 100%; background: #f4efe4;">
                                        <div>
                                            @if ($sproduct->rfq != 1)
                                                <p class="list_price mb-0">List Price</p>
                                                <div class="product__details__price ">
                                                    @if (!empty($sproduct->discount))
                                                        <p class="mb-0 number-font"
                                                            style="font-size: 14px !important; color: #ae0a46;">
                                                            <span style="text-decoration: line-through; color:#ae0a46;">$
                                                                {{ $sproduct->sas_price }}</span>
                                                            <span style="color: black">$
                                                                {{ $sproduct->discount }}</span>
                                                            <span style="font-size: 14px;">USD</span>
                                                        </p>
                                                        @php
                                                            $amount = $sproduct->price - $sproduct->discount;
                                                            $discount = ($amount / $sproduct->price) * 100;
                                                        @endphp
                                                        <span class="badge rounded-pill bg-success"
                                                            style="font-size: 14px;">
                                                            {{ round($discount) }}%</span>
                                                    @else
                                                        <p class="mb-0"
                                                            style="font-size: 14px !important; color: #ae0a46;">$
                                                            <span
                                                                style="font-size: 22px;">{{ $sproduct->sas_price }}</span>
                                                            US
                                                        </p>
                                                    @endif
                                                </div>
                                            @else
                                                <div id="tpl-product-detail-order-target" class="prod-ordering-section"
                                                    data-outofstock="Out of stock.">
                                                    <div class="row js-add-to-cart-container">
                                                        <div class="columns small-12 ds-v1 text-center">
                                                            <a type="button" style="font-weight: 600"
                                                                class="text-danger" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter">
                                                                <h5>This product has sell requirements</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="stock-info">
                                            <p tabindex="0" class="prod-stock mb-0"
                                                id="product-avalialability-by-warehouse">
                                                <span aria-label="Stock Availability" class="js-prod-available"> <i
                                                        class="fa fa-info-circle text-success"></i> Stock</span> <br>
                                                @if ($sproduct->stock == 'available')
                                                    <span class="text-success"
                                                        style="font-size:17px">{{ $sproduct->qty }}
                                                        in stock</span>
                                                @elseif ($sproduct->stock == 'limited')
                                                    <span class="text-success"
                                                        style="font-size:17px; font-weight:500;">Limited</span>
                                                @elseif ($sproduct->stock == 'unlimited')
                                                    <span class="text-success"
                                                        style="font-size:17px; font-weight:500;">Unlimited</span>
                                                @elseif ($sproduct->stock == 'stock_out')
                                                    <span class="text-danger"
                                                        style="font-size:17px; font-weight:500;">Stock Out</span>
                                                @else
                                                    <span class="text-danger pb-2"
                                                        style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="list_price mb-0">Custom Pricing</p>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#rfq_product{{ $sproduct->id }}">
                                                <span class="fw-bold" style="color: #ae0a46;">Get A Quote</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (!empty($sproduct->overview))
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="single-product-description" style="font-size: 14px;">
                            <h2 class="description-title fw-bold">Overview</h2>
                            <div class="container pb-3">
                                <div class="row ps-2">
                                    <div class="col-lg-12 pe-0">
                                        <div class="sc-3fi1by-1 chZLCL">
                                            <div class="description-areas-brand">
                                                {!! $sproduct->overview !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-product-description " style="font-size: 14px;">
                            <h2 class="description-title fw-bold">Specification</h2>
                            <div class="container pb-3 specification-areas-brand">
                                @if (!empty($sproduct->specification))
                                    <div class="row gx-1 px-2">
                                        {{-- <div class="col-lg-4">
                                            <div class="p-1 ps-2">Type</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="p-1 ps-2">articulated</div>
                                        </div> --}}
                                        {!! $sproduct->specification !!}
                                    </div>
                                @else
                                    <div class="row gx-1 px-2">
                                        No Specification Available.
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mb-5">
                @if (!empty($sproduct->accessories))
                    <div class="col-lg-6">
                        <div class="single-product-description" style="font-size: 14px;">
                            <h2 class="description-title fw-bold">Accessories</h2>
                            <div class="container pb-3">
                                <div class="row ps-2">
                                    <div class="col-lg-12 pe-0">
                                        <div class="sc-3fi1by-1 chZLCL">
                                            <div class="description-areas-brand">
                                                @if (!empty($sproduct->accessories))
                                                    <p class="text-muted mb-2"
                                                        style="width: 100% !important;overflow: auto;">
                                                        {!! $sproduct->accessories !!} </p>
                                                @else
                                                    <p class="text-muted mb-2"> No Accessories Available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if (count($documents) > 0)
                <div class="row mb-5">
                    @if (count($documents) > 4)
                        <div class="col-lg-6">
                            <div class="single-product-description " style="font-size: 14px;">
                                <h2 class="description-title fw-bold">Video</h2>
                                <div class="container pb-3 mt-3 video-areas-brand">
                                    <iframe class="responsive-iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY"
                                        style="width: 100%;height: 228px;"></iframe>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (count($documents) > 0)
                        <div class="col-lg-6">
                            <div class="single-product-description" style="font-size: 14px;">
                                <h2 class="description-title fw-bold">CATALOGS</h2>
                                <div class="container pb-3">
                                    <div class="row mt-3">
                                        @foreach ($documents as $document)
                                            <div class="col-lg-6">
                                                <div>
                                                    <embed class="pdf_image"
                                                        src="{{ asset('storage/files/' . $document->document) }}"
                                                        width="100%" height="175px" />
                                                    {{-- <img src=""
                                                        height="175px" width="100%" alt=""> --}}
                                                    <div class="catalog-details text-center">
                                                        <p class="m-0 p-1">{{ $document->title }}</p>
                                                        {{-- <p class="p-1 m-0">2 Pages</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
            <div class="row mb-5">
                <div class="col-lg-12">
                    {{-- <h4 class="text-muted">Other {{ $sproduct->getBrandName() }} Products</h4> --}}
                    <h2 class="company-tab-title mb-5 ps-0">
                        <span style="font-size: 20px;">Other {{ $sproduct->getBrandName() }} Products</span>
                    </h2>
                </div>
                <div class="col-lg-12">
                    <div class="slick-slider brand-containers">
                        @if (count($brand_products) > 0)
                            @foreach ($brand_products as $brand_product)
                                <div class="custom-col-5 col-sm-6 col-md-4 px-2">
                                    <div class="card rounded-0 border-0 m-2">
                                        <div class="card-body"
                                            style="height:23rem;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                            {{-- <div class="new-video">
                                                <div class="icon-small video"></div>
                                            </div> --}}
                                            <a href="{{ route('product.details', $brand_product->slug) }}">
                                                <div class="image-section">
                                                    <img src="{{ file_exists($brand_product->thumbnail) ? asset($brand_product->thumbnail) : asset('upload/no_image.jpg') }}"
                                                        alt="" width="100%" height="180px;">
                                                </div>
                                            </a>

                                            <div class="content-section text-center py-3 px-2">
                                                <a href="{{ route('product.details', $brand_product->slug) }}"
                                                    class="mb-2">
                                                    <p class="pb-0 mb-0 text-muted brandpage_product_title mb-2">
                                                        {{ Str::words($brand_product->name, 35) }}</p>
                                                </a>
                                                <div>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $brand_product->getBrandName() }}</span>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $brand_product->getCategoryName() }}</span>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $brand_product->sku_code }}</span>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $brand_product->product_code }}</span>
                                                    @if ($brand_product->price_status == 'price' && !empty($brand_product->price))
                                                        <span style="font-size: 14px"><i class="fa-solid fa-tag ms-2"></i>
                                                            USD
                                                            {{ $brand_product->price }}</span>
                                                    @endif
                                                </div>
                                                {{-- <span style="font-size: 10px"><i class="fa-solid fa-tag"></i> KR 4 AGILUS</span> --}}
                                                @if ($brand_product->rfq == 1)
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $brand_product->id }}">Ask For
                                                            Price</button>
                                                    </div>
                                                @elseif ($brand_product->price_status && $brand_product->price_status == 'rfq')
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $brand_product->id }}">Ask For
                                                            Price</button>
                                                    </div>
                                                @elseif ($brand_product->price_status && $brand_product->price_status == 'offer_price')
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $brand_product->id }}">Your
                                                            Price</button>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-center"
                                                        class="cart_button{{ $brand_product->id }}">
                                                        <button class="btn-color special_btn add_to_cart"
                                                            data-id="{{ $brand_product->id }}"
                                                            data-name="{{ $brand_product->name }}" data-quantity="1">Add
                                                            to
                                                            Cart</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container mb-5">
            <div class="row">
                <h2 class="company-tab-title mb-5 ps-0">
                    <span style="font-size: 20px;">BUYERS WHO LIKED THIS PRODUCT ALSO LIKED</span>
                </h2>
                <div class="col">
                    <div class="slick-slider brand-containers">

                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="custom-col-5 col-sm-6 col-md-4 px-2">
                                    <div class="card rounded-0 border-0 m-2">
                                        <div class="card-body"
                                            style="height:23rem;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                            {{-- <div class="new-video">
                                                <div class="icon-small video"></div>
                                            </div> --}}
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                <div class="image-section">
                                                    <img src="{{ file_exists($product->thumbnail) ? asset($product->thumbnail) : asset('upload/no_image.jpg') }}"
                                                        alt="" width="100%" height="180px;">
                                                </div>
                                            </a>

                                            <div class="content-section text-center py-3 px-2">
                                                <a href="{{ route('product.details', $product->slug) }}" class="mb-2">
                                                    <p class="pb-0 mb-0 text-muted brandpage_product_title mb-2">
                                                        {{ Str::words($product->name, 15) }}</p>
                                                </a>
                                                <div>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $product->getBrandName() }}</span>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $product->getCategoryName() }}</span>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $product->sku_code }}</span>
                                                    <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                        {{ $product->product_code }}</span>
                                                    @if ($product->price_status == 'price' && !empty($product->price))
                                                        <span style="font-size: 14px"><i class="fa-solid fa-tag ms-2"></i>
                                                            USD
                                                            {{ $product->price }}</span>
                                                    @endif
                                                </div>
                                                {{-- <span style="font-size: 10px"><i class="fa-solid fa-tag"></i> KR 4 AGILUS</span> --}}
                                                @if ($product->rfq == 1)
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}">Ask For
                                                            Price</button>
                                                    </div>
                                                @elseif ($product->price_status && $product->price_status == 'rfq')
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}">Ask For
                                                            Price</button>
                                                    </div>
                                                @elseif ($product->price_status && $product->price_status == 'offer_price')
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}">Your Price</button>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-center"
                                                        class="cart_button{{ $product->id }}">
                                                        <button class="btn-color special_btn" data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}">Get Quote</button>
                                                        {{-- <button class="btn-color special_btn add_to_cart"
                                                            data-id="{{ $product->id }}"
                                                            data-name="{{ $product->name }}" data-quantity="1">Add to
                                                            Cart</button> --}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container related_search_card">
            <div class="row">
                <div class="col">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="company-tab-title">
                                    <span style="font-size: 20px; background-color: #eeeeee;">Related Searches</span>
                                </h2>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row py-3">
                                @foreach ($related_search['categories'] as $related_category)
                                    <div class="col-sm-3 col-6">
                                        <a href="{{ route('category.details', $related_category->slug) }}"
                                            class="related_search_links"><i
                                                class="fa-solid fa-angles-right text-danger"></i>
                                            {{ $related_category->title }} </a>
                                    </div>
                                @endforeach
                                @foreach ($related_search['brands'] as $key => $related_brand)
                                    @if ($key === 4)
                                        @break
                                    @endif
                                    <div class="col-sm-3 col-6">
                                        <a href="{{ route('brand.overview', $related_brand->slug) }}"
                                            class="related_search_links"><i
                                                class="fa-solid fa-angles-right text-danger"></i>
                                            {{ $related_brand->title }} </a>
                                    </div>
                                @endforeach
                                @foreach ($related_search['solutions'] as $related_solution)
                                    @if (!empty($related_solution->slug))
                                        <div class="col-sm-3 col-6">
                                            <a href="{{ route('solution.details', $related_solution->slug) }}"
                                                class="related_search_links"><i
                                                    class="fa-solid fa-angles-right text-danger"></i>
                                                {{ $related_solution['name'] }}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($related_search['industries'] as $related_industry)
                                    @if (!empty($related_industry->slug))
                                        <div class="col-sm-3 col-6">
                                            <a href="{{ route('industry.details', $related_industry->slug) }}"
                                                class="related_search_links"><i
                                                    class="fa-solid fa-angles-right text-danger"></i>
                                                {{ $related_industry['title'] }} </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Brand Logo --}}
    <section>
        <div class="container-fluid brand-logo-area">
            <div class="row">
                <div class="slick-slider-brand-logo">
                    @if ($related_search['brands'])
                        @foreach ($related_search['brands'] as $brand_logo)
                            <div class="element-brands-logo">
                                <a href="">
                                    <img width="100px" height="60px"
                                        src="{{ !empty($brand_logo->image) && file_exists(public_path('storage/' . $brand_logo->image)) ? asset('storage/' . $brand_logo->image) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                        alt="{{ $brand_logo->title }}">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- left modal -->
    @include('frontend.pages.home.rfq_modal')
    <!-- modal -->
    <div class="modal fade" id="rfq_product{{ $sproduct->id }}" tabindex="-1"
        aria-labelledby="rfq{{ $sproduct->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #ae0a46;">
                    <h5 class="modal-title text-white" id="rfq{{ $sproduct->id }}">Get Quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body rounded-0 p-0 p-lg-5">
                    <div class="container px-0">
                        <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm" class="get_quote_frm"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $sproduct->id }}">
                            <input type="hidden" name="client_id"
                                value="{{ optional(Auth::guard('client')->user())->id }}">
                            @if ($client = Auth::guard('client')->user())
                                <input type="hidden" name="client_type"
                                    value="{{ optional(Auth::guard('client')->user())->user_type }}">
                            @endif
                            <div class="modal-body get_quote_view_modal_body rounded-0">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10 pe-0">
                                            <h6 class="text-start main_color fw-bold">Product Name :</h6>
                                            <span class="text-black">{{ $sproduct->name }}</span>
                                        </div>
                                        <div class="col-lg-2 ps-0">
                                            <label for="quantity"
                                                class="text-start main_color fw-bold mb-2">Quantity</label>
                                            <input type="number" class="form-control form-control-sm rounded-0"
                                                name="qty" value="1" id="quantity" placeholder="Quantity" />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 pe-0 mb-3">
                                            {{-- <label for="name">Name <span class="text-danger">*</span> </label> --}}
                                            <input type="text" class="form-control form-control-sm rounded-0" required
                                                id="name" name="name" placeholder="Your Name *"
                                                value="{{ optional(Auth::guard('client')->user())->name }}" />
                                        </div>
                                        <div class="col-lg-4 pe-0 mb-3">

                                            <input type="number" class="form-control form-control-sm rounded-0"
                                                id="phone" name="phone" placeholder="Your Phone Number *" required
                                                value="{{ optional(Auth::guard('client')->user())->phone }}" />
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            {{-- <label for="contact">Company Name </label> --}}
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                id="contact" name="company_name" placeholder="Your Company Name *"
                                                required
                                                value="{{ optional(Auth::guard('client')->user())->company_name }}" />
                                        </div>
                                        <div class="col-lg-5 pe-0 mb-3">
                                            {{-- <label for="email">Email <span class="text-danger">*</span> </label> --}}
                                            <input type="email" required class="form-control form-control-sm rounded-0"
                                                id="email" name="email" placeholder="Your Email *" required
                                                value="{{ optional(Auth::guard('client')->user())->email }}" />
                                            <span class="text-danger text-start p-0 m-0 email_validation"
                                                style="display: none">Please input valid email</span>
                                        </div>
                                        <div class="col-lg-4 pe-0 mb-3">
                                            {{-- <label for="email">Email <span class="text-danger">*</span> </label> --}}
                                            <select class="select-form-input w-100 form-control"
                                                data-placeholder="Select Your Country *" name="country" required>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda
                                                </option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh" selected>Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                </option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian
                                                    Ocean
                                                    Territory</option>
                                                <option value="British Virgin Islands">British Virgin Islands
                                                </option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African
                                                    Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands
                                                </option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo - Brazzaville">Congo - Brazzaville
                                                </option>
                                                <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern
                                                    Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and McDonald Islands">Heard Island
                                                    and McDonald
                                                    Islands</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong SAR China">Hong Kong SAR China
                                                </option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau SAR China">Macau SAR China</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar [Burma]">Myanmar [Burma]</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles
                                                </option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana
                                                    Islands</option>
                                                <option value="North Korea">North Korea</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territories">Palestinian Territories
                                                </option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Réunion">Réunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                </option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Martin">Saint Martin</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and
                                                    Miquelon
                                                </option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent
                                                    and the
                                                    Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="São Tomé and Príncipe">São Tomé and Príncipe
                                                </option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia">South Georgia</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                                </option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago
                                                </option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos
                                                    Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates
                                                </option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United State">United State</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                                    Islands
                                                </option>
                                                <option value="U.S. Virgin Islands">U.S. Virgin Islands
                                                </option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City">Vatican City</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            {{-- <label for="contact">Custom Image </label> --}}
                                            <input type="file" name="image"
                                                class="form-control form-control-sm rounded-0" id="image"
                                                accept="image/*" placeholder="Your Custom Image" />
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            {{-- <label for="message">Type Message</label> --}}
                                            <textarea class="form-control form-control-sm rounded-0" id="message" name="message" rows="3"
                                                placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check border-0">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="flexCheckDefault" name="call" placeholder="Call Me"
                                                    style="left: 3rem;" />
                                                <label class="form-check-label" for="flexCheckDefault"> Call Me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 mb-3">
                                            <div class="form-group px-3 mx-1 message g-recaptcha w-100"
                                                data-sitekey="{{ config('app.recaptcha_site_key') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-12 text-end">
                                            <button type="submit" class="btn-color" id="submit_btn">Submit
                                                &nbsp;<i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //left modal -->
@endsection

@section('scripts')
    <script>
        $('.modal').on('shown.bs.modal', function() {
            $('#country').select2({
                placeholder: 'Select a country', // Optional placeholder
                allowClear: true // Optional clear option
            });
        });
    </script>
@endsection
