@extends('frontend.master')
@section('content')
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
                                                        data-bs-toggle="modal" data-bs-target="#rfq_product{{ $sproduct->id }}"
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

    <!-------End-------->


    <!--=======// Popular products //======-->
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
    <!---------End -------->






@endsection
