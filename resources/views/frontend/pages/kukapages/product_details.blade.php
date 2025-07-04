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
                            <img id="expand" class="mx-auto geeks img-fluid d-block w-100"
                                src="{{ asset($sproduct->thumbnail) }}">
                        </div>

                        @if ($multi_images->isNotEmpty())
                            <div class="pt-1 img_gallery_wrapper row">
                                @foreach ($multi_images as $multi_image)
                                    <div class="p-1 col-2">
                                        <img class="img-fluid" src="{{ asset($multi_image->photo) }}" onclick="gfg(this);">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="pt-2 single-product-details">
                            <div class="px-2 row gx-0">
                                <h4>{{ $sproduct->name }}</h4>
                                <ul class="p-1 d-flex align-items-center">
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
                            <div class="px-2 row gx-0">
                                <p class="p-0">{!! $sproduct->short_desc !!}</p>
                            </div>
                            <div class="px-2 d-flex align-items-center gx-0">
                                <div>
                                    <h6 class="p-0 m-0 me-3">Manufactured By :</h6>
                                </div>
                                <div>
                                    <h6 class="p-0 m-0 fw-bold me-3">{{ $sproduct->getBrandName() }}</h6>
                                    {{-- <p class="p-0 m-0"><i class="fa-solid fa-location-dot me-2 text-muted"></i></p> --}}
                                    {{-- <p class="p-0 m-0">Germany</p> --}}
                                </div>
                            </div>

                            {{-- <div class="mt-5 row"> --}}
                            <div class="row product_quantity_wraper justify-content-between gx-0"
                                style="background-color: transparent !important;">
                                @if ($sproduct->rfq == 1)
                                    <div class="p-0 d-lg-block d-sm-none">
                                        <div class="p-0 row justify-content-between align-items-center">
                                            {{-- <a class="btn-color" href="{{route('contact')}}">Call Ngen It for price</a> --}}
                                            <div class="need_help col-lg-8 col-sm-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        {{-- <button class="search-btn-price" id="modal_view_left" data-bs-toggle="modal"
                                                            data-bs-target="#rfq_product{{ $sproduct->id }}">Ask For
                                                            Price</button> --}}
                                                        <a href="{{ route('rfq') }}" class="search-btn-price"
                                                            {{-- id="modal_view_left" --}} {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq_product{{ $sproduct->id }}" --}}>Ask
                                                            For Price</a>
                                                    </div>
                                                    <div class="border d-flex">
                                                        <input data-min="1" data-max="0" type="text" name="quantity"
                                                            value="2" readonly="true"
                                                            class="border-0 quantity-box bg-light">
                                                        <div class="quantity-selectors-container">
                                                            <div class="quantity-selectors">
                                                                <button type="button" class="border-0 increment-quantity"
                                                                    aria-label="Add one" data-direction="1">
                                                                    <i class="fa-solid fa-plus" style="color: #7a7577"></i>
                                                                </button>
                                                                <button type="button" class="border-0 decrement-quantity"
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
                                                    <p tabindex="0" class="mb-0 prod-stock"
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
                                                            <span class="pb-2 text-danger"
                                                                style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-2 mt-3 col-lg-12 col-sm-12 d-flex align-items-center justify-content-between"
                                            style="width:100%; background: #f4efe4;">
                                            <div>
                                                <h6>Need Help Ordering?</h6>
                                                <h6>Call <span>{{ App\Models\Admin\Setting::first()->mobile }}</span>
                                                </h6>
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-0 list_price">Custom Pricing</p>
                                                <a href="{{ route('rfq') }}"
                                                {{-- data-bs-toggle="modal"
                                                    data-bs-target="#rfq_product{{ $sproduct->id }}" --}}
                                                    >
                                                    <span class="fw-bold" style="color: #ae0a46;">Get A Quote</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-0 d-lg-none d-sm-block">
                                        <div>
                                            <div class="p-0 row justify-content-between align-items-center">
                                                {{-- <a class="btn-color" href="{{route('contact')}}">Call Ngen It for price</a> --}}
                                                <div class="need_help col-6">
                                                    <a href="{{ route('rfq') }}">
                                                        <button class="btn-color brand-product-btn" {{-- id="modal_view_left" --}}
                                                            {{-- data-bs-toggle="modal"
                                                        data-bs-target="#rfq_product{{ $sproduct->id }}" --}} style="width: 100%;">Ask For
                                                            Price</button>
                                                    </a>>
                                                </div>
                                                <div class="p-0 need_help col-6">
                                                    <h6>Need Help Ordering?</h6>
                                                    <h6>Call
                                                        <span>{{ App\Models\Admin\Setting::first()->mobile }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 mt-3 col-lg-12 col-sm-12 d-flex align-items-center justify-content-between"
                                                style="width:100%; background: #f4efe4;">
                                                <div class="stock-info">
                                                    <p tabindex="0" class="mb-0 prod-stock"
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
                                                            <span class="pb-2 text-danger"
                                                                style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 list_price">Custom Pricing</p>
                                                    <a href="{{ route('rfq') }}"
                                                    {{-- data-bs-toggle="modal"
                                                        data-bs-target="#rfq_product{{ $sproduct->id }}" --}}
                                                        >
                                                        <span class="fw-bold" style="color: #ae0a46;">Get A Quote</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($sproduct->price_status && $sproduct->price_status == 'rfq')
                                    <div class="row justify-content-between align-items-center">
                                        {{-- <a class="btn-color" href="{{route('contact')}}">Call Ngen It for price</a> --}}
                                        <div class="p-0 need_help col-lg-5 col-sm-12">
                                            <a href="{{ route('rfq') }}">
                                                <button class="search-btn-price" {{-- id="modal_view_left" data-bs-toggle="modal"
                                                    data-bs-target="#rfq_product{{ $sproduct->id }}"  --}}
                                                    style="width: 100%;">Ask
                                                    For Price</button>
                                            </a>
                                        </div>
                                        <div class="p-0 need_help col-lg-7 col-sm-12">
                                            <h6 class="m-2">Need Help Ordering?</h6>
                                            <h6>Call <span>{{ App\Models\Admin\Setting::first()->mobile }}</span></h6>
                                        </div>
                                    </div>
                                    <div class="px-4 py-2 mt-2 col-lg-12 col-sm-12 d-flex align-items-center justify-content-between"
                                        style="width:100%; background: #f4efe4;">
                                        <div class="stock-info">
                                            <p tabindex="0" class="mb-0 prod-stock"
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
                                                    <span class="pb-2 text-danger"
                                                        style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="mb-0 list_price me-3">Custom Pricing</p>
                                            <a href="{{ route('rfq') }}"
                                            {{-- data-bs-toggle="modal"
                                                data-bs-target="#rfq_product{{ $sproduct->id }}" --}}
                                                >
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
                                    <a href="{{ route('rfq') }}">
                                        <button class="btn-color brand-product-btn" {{-- id="modal_view_left"
                                            data-bs-toggle="modal" data-bs-target="#rfq_product{{ $sproduct->id }}" --}}
                                            style="width: 100%;">Get Quote</button>
                                    </a>
                                        {{-- <form action="{{ route('add.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" id="product_id"
                                                value="{{ $sproduct->id }}">
                                            <input type="hidden" name="name" id="name"
                                                value="{{ $sproduct->name }}">
                                            <div class="row ">
                                                <div class="py-2 col-lg-12 col-sm-12 d-flex align-items-center justify-content-between bg-light"
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
                                    <div class="px-2 py-2 mt-2 col-lg-12 col-sm-12 d-flex align-items-center justify-content-between px-lg-5"
                                        style="width: 100%; background: #f4efe4;">
                                        <div>
                                            @if ($sproduct->rfq != 1)
                                                <p class="mb-0 list_price">List Price</p>
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
                                                        <div class="text-center columns small-12 ds-v1">
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
                                            <p tabindex="0" class="mb-0 prod-stock"
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
                                                    <span class="pb-2 text-danger"
                                                        style="font-size:17px">{{ ucfirst($sproduct->stock) }}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="mb-0 list_price">Custom Pricing</p>
                                            <a href="{{ route('rfq') }}"
                                            {{-- data-bs-toggle="modal"
                                                data-bs-target="#rfq_product{{ $sproduct->id }}" --}}
                                                >
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
                                    <div class="px-2 row gx-1">

                                        {!! $sproduct->specification !!}
                                    </div>
                                @else
                                    <div class="px-2 row gx-1">
                                        No Specification Available.
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mb-5 row">
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
                                                    <p class="mb-2 text-muted"
                                                        style="width: 100% !important;overflow: auto;">
                                                        {!! $sproduct->accessories !!} </p>
                                                @else
                                                    <p class="mb-2 text-muted"> No Accessories Available</p>
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
                <div class="mb-5 row">
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
                                    <div class="mt-3 row">
                                        @foreach ($documents as $document)
                                            <div class="col-lg-6">
                                                <div>
                                                    <embed class="pdf_image"
                                                        src="{{ asset('storage/files/' . $document->document) }}"
                                                        width="100%" height="175px" />
                                                    {{-- <img src=""
                                                        height="175px" width="100%" alt=""> --}}
                                                    <div class="text-center catalog-details">
                                                        <p class="p-1 m-0">{{ $document->title }}</p>
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
            <div class="mb-5 row">
                <div class="col-lg-12">
                    {{-- <h4 class="text-muted">Other {{ $sproduct->getBrandName() }} Products</h4> --}}
                    <h2 class="mb-5 company-tab-title ps-0">
                        <span style="font-size: 20px;">Other {{ $sproduct->getBrandName() }} Products</span>
                    </h2>
                </div>
                <div class="col-lg-12">
                    <div class="slick-slider brand-containers">
                        @if (count($brand_products) > 0)
                            @foreach ($brand_products as $brand_product)
                                <div class="px-2 custom-col-5 col-sm-6 col-md-4">
                                    <div class="m-2 border-0 card rounded-0">
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

                                            <div class="px-2 py-3 text-center content-section">
                                                <a href="{{ route('product.details', $brand_product->slug) }}"
                                                    class="mb-2">
                                                    <p class="pb-0 mb-0 mb-2 text-muted brandpage_product_title">
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
                                                        @php
                                                            $cart_items = Cart::content();
                                                            $productInCart = false;

                                                            foreach ($cart_items as $item) {
                                                                if ($item->id == $brand_product->id) {
                                                                    $productInCart = true;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp

                                                        <button
                                                            class="px-3 py-2 btn-color popular_product-button add_to_cart cart_button_text{{ $brand_product->id }}"
                                                            data-id="{{ $brand_product->id }}"
                                                            data-name="{{ $brand_product->name }}" data-quantity="1">
                                                            {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                        </button>
                                                    </div>
                                                @elseif ($brand_product->price_status && $brand_product->price_status == 'rfq')
                                                    <div class="d-flex justify-content-center">
                                                        <button
                                                            class="px-3 py-2 btn-color popular_product-button add_to_cart cart_button_text{{ $brand_product->id }}"
                                                            data-id="{{ $brand_product->id }}"
                                                            data-name="{{ $brand_product->name }}" data-quantity="1">
                                                            {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                        </button>
                                                    </div>
                                                @elseif ($brand_product->price_status && $brand_product->price_status == 'offer_price')
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('rfq') }}">
                                                            <button class="btn-color special_btn"
                                                            {{-- data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $brand_product->id }}" --}}
                                                                >Your
                                                                Price</button>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-center"
                                                        class="cart_button{{ $brand_product->id }}">
                                                        <button class="btn-color special_btn add_to_cart cart_button_text{{ $brand_product->id }}"
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
                <h2 class="mb-5 company-tab-title ps-0">
                    <span style="font-size: 20px;">BUYERS WHO LIKED THIS PRODUCT ALSO LIKED</span>
                </h2>
                <div class="col">
                    <div class="slick-slider brand-containers">

                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="px-2 custom-col-5 col-sm-6 col-md-4">
                                    <div class="m-2 border-0 card rounded-0">
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

                                            <div class="px-2 py-3 text-center content-section">
                                                <a href="{{ route('product.details', $product->slug) }}" class="mb-2">
                                                    <p class="pb-0 mb-0 mb-2 text-muted brandpage_product_title">
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
                                                    </div>
                                                @elseif ($product->price_status && $product->price_status == 'rfq')
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('rfq') }}">
                                                            <button class="btn-color special_btn"
                                                            {{-- data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $product->id }}" --}}
                                                                >Ask For
                                                                Price</button>
                                                        </a>
                                                    </div>
                                                @elseif ($product->price_status && $product->price_status == 'offer_price')
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('rfq') }}">
                                                            <button class="btn-color special_btn"
                                                            {{-- data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $product->id }}" --}}
                                                                >Your Price</button>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-center"
                                                        class="cart_button{{ $product->id }}">
                                                        <a href="{{ route('rfq') }}">
                                                            <button class="btn-color special_btn"
                                                            {{-- data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $product->id }}" --}}
                                                                >Get Quote</button>
                                                        </a>
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
                            <div class="py-3 row">
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
