@extends('frontend.master')
@section('content')
    @include('frontend.pages.kukapages.partial.page_header')
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
                                    <li class="me-1">
                                        <p class="p-0 m-0" style="color: rgb(134, 134, 134);font-size: 13px;"><i
                                                class="fa-solid fa-tag me-1 single-bp-tag"></i>{{ $sproduct->sku_code }}</p>
                                    </li>
                                    <li class="me-1">
                                        <p class="p-0 m-0" style="color: rgb(134, 134, 134);font-size: 13px;"><i
                                                class="fa-solid fa-tag me-1 single-bp-tag"></i>{{ $sproduct->mf_code }}</p>
                                    </li>
                                    <li class="me-1">
                                        <p class="p-0 m-0" style="color: rgb(134, 134, 134);font-size: 13px;"><i
                                                class="fa-solid fa-tag me-1 single-bp-tag"></i>{{ $sproduct->product_code }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row gx-0 px-2">
                                <p class="p-0">{!! $sproduct->short_desc !!}</p>
                            </div>
                            <div class="row d-flex align-items-center gx-0 px-2">
                                <div class="col-sm-4">
                                    <span class="fw-bold">Manufactured by:</span>
                                </div>
                                <div class="col-sm-8 d-flex align-items-center">
                                    <h4 class="me-3 p-0 m-0">{{ $sproduct->getBrandName() }}</h4>
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
                                            <div class="need_help col-lg-6 col-sm-6">
                                                <button class="btn-color" id="modal_view_left" data-bs-toggle="modal"
                                                    data-bs-target="#rfq{{ $sproduct->id }}" style="width: 100%;">Ask For
                                                    Price</button>
                                            </div>
                                            <div class="need_help col-lg-6 col-sm-6">
                                                <h6>Need Help Ordering?</h6>
                                                <h6>Call <strong>{{ App\Models\Admin\Setting::first()->mobile }}</strong>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-2 mt-3 px-4"
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
                                            <div class="text-end">
                                                <p class="list_price mb-0">Custom Pricing</p>
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#rfq{{ $sproduct->id }}">
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
                                                        data-bs-toggle="modal" data-bs-target="#rfq{{ $sproduct->id }}"
                                                        style="width: 100%;">Ask For Price</button>
                                                </div>
                                                <div class="need_help col-6 p-0">
                                                    <h6>Need Help Ordering?</h6>
                                                    <h6>Call
                                                        <strong>{{ App\Models\Admin\Setting::first()->mobile }}</strong>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-2 mt-3 px-4"
                                                style="width:100%; background: #f4efe4;">
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
                                                <div class="text-end">
                                                    <p class="list_price mb-0">Custom Pricing</p>
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#rfq{{ $sproduct->id }}">
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
                                            <button class="btn-color" id="modal_view_left" data-bs-toggle="modal"
                                                data-bs-target="#rfq{{ $sproduct->id }}" style="width: 100%;">Ask For
                                                Price</button>
                                        </div>
                                        <div class="need_help col-lg-7 col-sm-12 p-0">
                                            <h6 class="m-2">Need Help Ordering?</h6>
                                            <h6>Call <strong>{{ App\Models\Admin\Setting::first()->mobile }}</strong>
                                            </h6>
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
                                                data-bs-target="#rfq{{ $sproduct->id }}">
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
                                        <form action="{{ route('add.cart') }}" method="post">
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
                                        </form>
                                    @endif
                                    <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between py-2 mt-2 px-5"
                                        style="width: 100%; background: #f4efe4;">
                                        <div>
                                            @if ($sproduct->rfq != 1)
                                                <p class="list_price mb-0">List Price</p>
                                                <div class="product__details__price ">
                                                    @if (!empty($sproduct->discount))
                                                        <p class="mb-0"
                                                            style="font-size: 14px !important; color: #ae0a46;">
                                                            <span style="text-decoration: line-through; color:#ae0a46;">$
                                                                {{ $sproduct->price }}</span>
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
                                                            <span style="font-size: 22px;">{{ $sproduct->price }}</span>
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
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#rfq{{ $sproduct->id }}">
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
                                <div class="custom-col-5 col-sm-6 col-md-4 px-4">
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
                                <div class="custom-col-5 col-sm-6 col-md-4 px-4">
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
                                                        <button class="btn-color special_btn add_to_cart"
                                                            data-id="{{ $product->id }}"
                                                            data-name="{{ $product->name }}" data-quantity="1">Add to
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
    {{-- History --}}
    {{-- <section>
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="company-tab-title mb-2 ps-0 bg-transparent">
                        <span style="font-size: 20px;">RECENTLY VIEWED PRODUCTS</span>
                    </h2>
                    <a href="#" class="d-flex justify-content-end">
                        <span class="border rounded-pill p-1" style="font-size: 12px;"><i class="fa fa-close me-2 "
                                aria-hidden="true"></i>
                            Clear History</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="slick-slider brand-containers">
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="element-brands my-3">
                            <div class="row brand-product-card">
                                <a href="" class="ps-0">
                                    <div
                                        class="brand-image-brand d-flex justify-content-between align-items-center ps-0 pe-2">
                                        <div class="sc-14o3l-0 product-badge-image"
                                            style="background-image: url(https://img.virtual-expo.com/media/ps/images/common/pictos/new-video.png);">
                                        </div>
                                        <div class="">
                                            <a href="#" class="d-flex justify-content-end">
                                                <span class="border text-center rounded-pill p-1"
                                                    style="font-size: 12px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><i
                                                        class="fa fa-close me-2 " style="margin-left: 8px;"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img alt="articulated robot" loading="lazy" class=" lazyloaded"
                                            src="https://img.directindustry.com/images_di/photo-m2/177103-18243554.jpg">
                                    </div>
                                    <div class="card-description">
                                        <div>
                                            <a class="" href="#" style="font-size: 13px;">
                                                <span class="text-uppercase text-muted">articulated robot</span><br>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                                <span
                                                    class="text-uppercase border text-black badge bg-light rounded-pill">TX2-90</span>
                                            </a>
                                        </div>
                                        <div>
                                            <ul class="brand-taging-area">
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                                <li><i class="fa-solid fa-tag me-2"></i> 6-axis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- Related Search --}}
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

<div class="modal fade" id="rfq{{ $sproduct->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
            <div class="modal-header py-2 px-4 rounded-0" style="background: #ae0a46;">
                <h5 class="modal-title p-1 text-white" id="staticBackdropLabel">Get Quote
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body rounded-0 p-0">
                <div class="container px-0">
                    @if (Auth::guard('client')->user())
                        <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm"
                            class="get_quote_frm" enctype="multipart/form-data">
                            @csrf
                            <div class="card mx-4">
                                <div class="card-body px-4 py-2">
                                    <div class="row border" style="font-size: 0.8rem;">
                                        <div class="col-lg-3 mb-3 pl-2">{{ Auth::guard('client')->user()->name }}
                                        </div>
                                        <div class="col-lg-4 mb-3" style="margin: 5px 0px">
                                            {{ Auth::guard('client')->user()->email }}</div>
                                        <div class="col-lg-4 mb-3" style="margin: 5px 0px">
                                            {{ Auth::guard('client')->user()->phone }}
                                            <div class="form-group" id="Rfquser" style="display:none">
                                                <input type="text" required
                                                    class="form-control form-control-sm rounded-0" id="phone"
                                                    name="phone" value="{{ Auth::guard('client')->user()->phone }}"
                                                    placeholder="Phone Number" style="font-size: 0.8rem;">
                                            </div>
                                        </div>
                                        <div class="col-lg-1" style="margin: 5px 0px"><a href="javascript:void(0);"
                                                id="editRfquser"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $sproduct->id }}">
                            <input type="hidden" name="client_id" value="{{ Auth::guard('client')->user()->id }}">
                            <input type="hidden" name="client_type" value="client">
                            <input type="hidden" name="name" value="{{ Auth::guard('client')->user()->name }}">
                            <input type="hidden" name="email" value="{{ Auth::guard('client')->user()->email }}">
                            <span class="text-danger text-start p-0 m-0 email_validation"
                                style="display: none;">Please input
                                valid email</span>
                            <div class="modal-body get_quote_view_modal_body">
                                <div class="form-row">
                                    <div class="form-group col-sm-4 m-0">
                                        <input type="text" class="form-control form-control-sm rounded-0 mt-4"
                                            id="contact" name="company_name"
                                            value="{{ Auth::guard('client')->user()->company_name }}"
                                            placeholder="Company Name" style="font-size: 0.7rem;">
                                    </div>
                                    <div class="form-group col-sm-4 m-0">
                                        <input type="number" class="form-control form-control-sm rounded-0 mt-4"
                                            id="contact" name="qty" placeholder="Quantity"
                                            style="font-size: 0.7rem;">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="m-0" for="image" style="font-size: 0.7rem;">Upload
                                            Image</label>
                                        <input type="file" name="image"
                                            class="form-control form-control-sm rounded-0" id="image"
                                            accept="image/*" style="font-size: 0.7rem;" />
                                        <div class="form-text" style="font-size:11px;">Only png, jpg, jpeg images
                                        </div>
                                    </div>
                                    <h6 class="text-start pt-1 main_color">Product Name :</h6>
                                    <div class="form-group col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                {{ $sproduct->name }}
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="contact">Quantity :</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm rounded-0" id="contact"
                                                        name="qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <textarea class="form-control form-control-sm rounded-0" id="message" name="message" rows="1"
                                            placeholder="Additional Information..."></textarea>
                                    </div>
                                    <div class="form-group  col-sm-12 px-3 mx-3">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckDefault" name="call">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Call Me
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-12 px-3 mx-3 message g-recaptcha"
                                        data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-primary col-lg-3" id="submit_btn">Submit
                                        &nbsp;<i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    @elseif (Auth::guard('partner')->user())
                        <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm"
                            class="get_quote_frm" enctype="multipart/form-data">
                            @csrf
                            <div class="card mx-4">
                                <div class="card-body p-4">
                                    <div class="row border">
                                        <div class="col-lg-3 pl-2">Name:
                                            {{ Auth::guard('partner')->user()->name }}</div>
                                        <div class="col-lg-4" style="margin: 5px 0px">
                                            {{ Auth::guard('partner')->user()->primary_email_address }}</div>
                                        <div class="col-lg-4" style="margin: 5px 0px">
                                            {{ Auth::guard('partner')->user()->company_number }}</div>
                                        <div class="col-lg-1" style="margin: 5px 0px"><a href="javascript:void(0);"
                                                id="editRfqpartner"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $sproduct->id }}">
                            <input type="hidden" name="client_type" value="partner">
                            <input type="hidden" name="partner_id"
                                value="{{ Auth::guard('partner')->user()->id }}">
                            <input type="hidden" name="name" value="{{ Auth::guard('partner')->user()->name }}">
                            <input type="hidden" name="email"
                                value="{{ Auth::guard('partner')->user()->primary_email_address }}">
                            {{-- <input type="hidden" name="phone" value="{{Auth::guard('client')->user()->phone_number}}"> --}}
                            <div class="modal-body get_quote_view_modal_body">
                                <div class="form-group col-sm-12 text-white" style="border-bottom: 1px solid #eee;">
                                    <h6 class="text-start pt-1 bg-white">Product Name :
                                    </h6>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            {{ $sproduct->name }}
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group col-sm-6">
                                                <input type="number" class="form-control form-control-sm rounded-0"
                                                    id="contact" name="qty" placeholder="Quantity">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="Rfqpartner" style="display:none">
                                    <div class="form-group col-sm-6">
                                        <input type="text" required class="form-control form-control-sm rounded-0"
                                            id="phone" name="phone"
                                            value="{{ Auth::guard('partner')->user()->company_number }}"
                                            placeholder="Company Phone Number">
                                    </div>
                                    <div class="form-group  col-sm-6">
                                        <label for="contact">Company Name </label>
                                        <input type="text" class="form-control form-control-sm rounded-0"
                                            id="contact" name="company_name" required
                                            value="{{ Auth::guard('partner')->user()->company_name }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-sm-6">
                                        <label for="contact">Upload Image </label>
                                        <input type="file" name="image"
                                            class="form-control form-control-sm rounded-0" id="image"
                                            accept="image/*" />
                                        <div class="form-text" style="font-size:11px;">Accepts only png, jpg, jpeg
                                            images
                                        </div>
                                    </div>
                                    <div class="form-group  col-sm-12">
                                        <textarea class="form-control form-control-sm rounded-0" id="message" name="message" rows="1"
                                            placeholder="Additional Text.."></textarea>
                                    </div>
                                    <div class="form-group  col-sm-12 px-3 mx-3">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckDefault" name="call">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Call Me
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-12 px-3 mx-3 message g-recaptcha"
                                        data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                                </div>
                                <div class="modal-footer borer-0">
                                    <button type="submit" class="btn btn-primary col-lg-3" id="submit_btn">Submit
                                        &nbsp;<i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm"
                            class="get_quote_frm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $sproduct->id }}">
                            <div class="modal-body get_quote_view_modal_body rounded-0">
                                <div class="container">
                                    <div class="row mb-4">
                                        <div class="col-lg-10">
                                            <h6 class="text-start main_color fw-bold">Product Name :</h6>
                                            <span class="text-black">{{ $sproduct->name }}</span>
                                        </div>
                                        <div class="col-lg-2 p-0">
                                            <label for="quantity"
                                                class="text-start main_color fw-bold mb-2">Quantity</label>
                                            <input type="number" class="form-control form-control-sm rounded-0"
                                                name="qty" value="1" id="quantity"
                                                placeholder="Quantity" />
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4 mb-4 pe-0">
                                            {{-- <label for="name">Name <span class="text-danger">*</span> </label> --}}
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                required id="name" name="name" placeholder="Your Name *" />
                                        </div>
                                        <div class="col-lg-4 mb-4 pe-0">

                                            <input type="number" class="form-control form-control-sm rounded-0"
                                                id="phone" name="phone" placeholder="Your Phone Number *"
                                                required />
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            {{-- <label for="contact">Company Name </label> --}}
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                id="contact" name="company_name" placeholder="Your Company Name *"
                                                required />
                                        </div>
                                        <div class="col-lg-5 mb-4 pe-0">
                                            {{-- <label for="email">Email <span class="text-danger">*</span> </label> --}}
                                            <input type="email" required
                                                class="form-control form-control-sm rounded-0" id="email"
                                                name="email" placeholder="Your Email *" required />
                                            <span class="text-danger text-start p-0 m-0 email_validation"
                                                style="display: none">Please input valid email</span>
                                        </div>
                                        <div class="col-lg-7 mb-4">
                                            {{-- <label for="contact">Custom Image </label> --}}
                                            <input type="file" name="image"
                                                class="form-control form-control-sm rounded-0" id="image"
                                                accept="image/*" placeholder="Your Custom Image" />
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            {{-- <label for="message">Type Message</label> --}}
                                            <textarea class="form-control form-control-sm rounded-0" id="message" name="message" rows="3"
                                                placeholder="Your Message"></textarea>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <div class="form-check border-0">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="flexCheckDefault" name="call" placeholder="Call Me" />
                                                <label class="form-check-label" for="flexCheckDefault"> Call Me
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row align-items-center mb-5">
                                        <div class="col-lg-6 mb-4">
                                            <div class="form-group px-3 mx-1 message g-recaptcha w-100"
                                                style="position: relative;right: 20px;"
                                                data-sitekey="{{ config('app.recaptcha_site_key') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 text-end">
                                            <button type="submit" class="btn-color" id="submit_btn">Submit
                                                &nbsp;<i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="modal-footer border-0">

                                </div> --}}
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <!-- HTML !-->
        </div>
    </div>
</div>
<!-- //left modal -->
@endsection
