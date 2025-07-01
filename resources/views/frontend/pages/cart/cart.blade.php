@extends('frontend.master')

@section('content')
    <style>
        .counter span {
            display: block;
            margin-top: -27px;
            font-size: 25px;
            padding: 0 10px;
            cursor: pointer;
            color: #d51a5f;
            user-select: none;
        }

        .card {
            margin: auto;
            max-width: 1100px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
            padding: 0px;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #f5f5f5;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 2vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title {
            padding: 10px;
            border-top-left-radius: 0.85rem;

        }

        .title b {
            font-size: 1.5rem;
            color: #fff !important;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        /* img {
            width: 3.5rem;
        } */

        .back-to-shop {
            margin-right: 1rem;
            margin-top: 1rem;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 0.1vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            background-color: #ae0a46 !important;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>

    <!--======// Header Title //======-->
    <section class="p-0 common_product_header"
        style="background-image: linear-gradient(
        rgba(0,0,0,0.8),
        rgba(0,0,0,0.8)
        ),url('https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/bb/74/bb749b579a0f712fb8ab4065645e8918.jpg');">
        <div class="container ">
            <h1>My Cart</h1>
            <div class="row ">
                <!--BUTTON START-->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="m-4">
                        <a class="btn-color" href="{{ route('contact') }}">Talk to a Specialist</a>
                    </div>
                    <div class="m-4">
                        <a class="btn-color" href="{{ route('shop') }}">Check Our Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------End--------->
    {{-- Cart Section Start --}}
    <div class="mt-4 mb-4 card">
        <div class="row cart_product">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="text-right text-white col align-self-center fw-bold"></div>
                    </div>
                </div>
                {{-- Header Title --}}
                <div class="px-3 row border-top">
                    <div class="table-responsive main align-items-center">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th width="18%">Product</th>
                                    <th width="25%">Item Name</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="17%">QTY</th>
                                    <th width="15%">Unit Total</th>
                                    <th width="10%">
                                        {{-- <form method="get" action="{{ route('cart.destroy') }}"> --}}
                                        <a href="javascript:void(0);" class="text-danger" onClick='emptyCart(event)'>Empty
                                            Cart</a>
                                        {{-- </form> --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_details as $item)
                                    @php
                                        $slug = App\Models\Admin\Product::where('id', $item->id)->value('slug');
                                    @endphp
                                    <tr class="text-center">
                                        <td style="vertical-align: middle;">
                                            <img class="img-fluid"
                                                src="{{ $item->options->has('image') ? $item->options->image : '' }}"
                                                alt="{{ $item->name }}">
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <a class="text-primary" href="{{ route('product.details', $slug) }}"
                                                title="{{ $item->name }}">
                                                {{ Str::limit($item->name, 22) }}
                                            </a>
                                        </td>
                                        <td style="vertical-align: middle;">$ {{ number_format($item->price, 2) }}</td>
                                        <td style="vertical-align: middle;">
                                            <form class="myForm">
                                                <input type="hidden" id="price" name="price"
                                                    value="{{ $item->price }}">
                                                <div class="mb-2 pro-qty" style="width: 5.5rem">
                                                    <div class="counter" style="width: 2rem">
                                                        <input name="rowID" type="hidden" id="rowID"
                                                            value="{{ $item->rowId }}">
                                                        <span class="down" id="{{ $item->rowId }}"
                                                            onClick='decreaseCount(event, this, this.id)'>-</span>
                                                        <input type="text" name="qty" value="{{ $item->qty }}"
                                                            style="width: 1.5rem;" readonly>
                                                        <span class="up" id="{{ $item->rowId }}"
                                                            onClick='increaseCount(event, this, this.id)'>+</span>
                                                    </div>
                                                </div>
                                                {{-- <a href="javascript:void(0);" class="p-1 mt-1 btn-color" id="update">Update</a> --}}
                                            </form>
                                        </td>
                                        <td style="vertical-align: middle;">$
                                            {{ number_format($item->price * $item->qty, 2) }}</td>
                                        <td style="vertical-align: middle;">
                                            <a href="javascript:void();" class="text-danger" id="{{ $item->rowId }}"
                                                onClick='deleteRow(event, this, this.id)'>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Header Title End --}}
                <div class="mb-2 d-flex justify-content-end">
                    <div class="back-to-shop">
                        <a href="{{ route('shop') }}">&leftarrow; <span class="text-danger fw-bold"
                                style="font-size: 16px">Back to
                                shop</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5 class="text-center"><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">Sub Total</div>
                    <div class="text-right col">$ {{ number_format(Cart::subtotal(), 2) }}</div>
                </div>
                <div class="row">
                    <div class="col" style="padding-left:0;">Tax Estimate</div>
                    <div class="text-right col">$ 0.00</div>
                </div>
                <div class="row">
                    <div class="col" style="padding-left:0;">Shipping Cost</div>
                    <div class="text-right col">$ 0.00</div>
                </div>
                <hr>
                <div class="row" style=" padding: 1vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="text-right col">$ {{ number_format(Cart::total(), 2) }}</div>
                </div>
                <div class="pt-5 d-flex justify-content-center">
                    <a href="{{ route('checkout') }}" class="btn product_btn">CHECKOUT</a>
                </div>
            </div>
        </div>

    </div>
    <!--=======// Popular products //======-->

    @if (count($products) > 0)
        <section>
            <div class="container">
                <div class="px-0 mt-5 Container">
                    <h3 class="Head" style="font-size:30px;">Related Products <span class="Arrows"></span></h3>
                    <!-- Carousel Container -->
                    <div class="SlickCarousel">
                        @if ($products)
                            @foreach ($products as $item)
                                <!-- Item -->
                                <div class="mt-3 mb-3 ProductBlock">
                                    <div class="Content">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="product-grid">
                                                    <div class="product-image">
                                                        <a href="{{ route('product.details', $item->slug) }}"
                                                            class="image d-flex justify-content-center align-items-center">
                                                            <img class="pic-1" src="{{ asset($item->thumbnail) }}"
                                                                style="width: 180px;height: 180px;"
                                                                alt="{{ $item->name }}">
                                                            <img class="pic-2" src="{{ asset($item->thumbnail) }}"
                                                                style="height: 180px;" alt="{{ $item->name }}">
                                                        </a>

                                                        <ul class="product-links">
                                                            <li><a href="#" data-tip="Quick View"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#productDetails{{ $item->id }}"><i
                                                                        class="text-white fa fa-eye"></i></a>
                                                            </li>
                                                            <li><a href="#" data-tip="View Product"><i
                                                                        class="text-white fa fa-random"></i></a></li>
                                                        </ul>


                                                    </div>
                                                    <div class="product-content">
                                                        <h3 class="mb-2 text-center titles ask_for_price website-color"
                                                            style="height: 4.5rem;"><a
                                                                href="{{ route('product.details', $item->slug) }}">{{ Str::limit($item->name, 85) }}</a>
                                                        </h3>
                                                        @if ($item->rfq == 1)
                                                            <div class="price">
                                                                <p class="text-center text-muted">
                                                                    <small>USD</small>
                                                                    --.-- $
                                                                </p>
                                                                <a href="{{ route('rfq') }}"
                                                                    class="d-flex justify-content-center align-items-center"
                                                                    {{-- data-bs-toggle="modal"
                                                                    data-bs-target="#rfq{{ $item->id }}" --}}
                                                                    >
                                                                    <button class="btn-color">
                                                                        Ask For Price
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        @elseif ($item->price_status && $item->price_status == 'price')
                                                            <div class="price">
                                                                <p class="text-center text-muted"><small>USD</small>
                                                                    {{ number_format($item->price, 2) }} $
                                                                </p>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    <form class="" action="{{ route('add.cart') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id"
                                                                            id="product_id" value="{{ $item->id }}">
                                                                        <input type="hidden" name="name"
                                                                            id="name" value="{{ $item->name }}">
                                                                        <input type="hidden" name="qty"
                                                                            id="qty" value="1">
                                                                        <div data-mdb-toggle="popover"
                                                                            title="Add To Cart Now"
                                                                            data-mdb-content="Add To Cart Now"
                                                                            data-mdb-trigger="hover">
                                                                            <button type="submit"
                                                                                class="btn-color">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="price">
                                                                <p class="text-center text-muted"
                                                                    style="text-decoration: line-through;text-decoration-thickness: 2px; text-decoration-color: #ae0a46;">
                                                                    USD
                                                                    {{ number_format($item->price, 2) }} $
                                                                </p>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">


                                                                    <div data-mdb-toggle="popover" title="Your Price"
                                                                        data-mdb-content="Your Price"
                                                                        data-mdb-trigger="hover">
                                                                        <button class="btn-color"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#askProductPrice">
                                                                            Your Price
                                                                        </button>
                                                                    </div>

                                                                </div>
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
                    @foreach ($products as $item)
                        <!-- Modal -->
                        <div class="modal fade" id="productDetails{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="py-2 modal-header" style="background: #ae0a46;">
                                        <h5 class="text-white modal-title" id="staticBackdropLabel">Product Details
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <section class="container py-5 pb-0">
                                            <div class="row">
                                                <!-- images -->
                                                <div class="col-lg-4 col-sm-12 single_product_images">
                                                    <!-- gallery pic -->
                                                    <div class="mx-auto d-block">
                                                        <img id="expand"
                                                            class="mx-auto rounded geeks img-fluid d-block"
                                                            src="{{ asset($item->thumbnail) }}">
                                                    </div>

                                                    {{-- <div class="pt-1 img_gallery_wrapper row">
                                                                <div class="col-3">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset($item->thumbnail) }}"
                                                                        onclick="gfg(this);">
                                                                </div>
                                                            </div> --}}
                                                </div>
                                                <!-- content -->
                                                <div class="pl-4 col-lg-8 col-sm-12">
                                                    <h3>{{ $item->name }}</h3>
                                                    {{-- <h6 class="text-dark product_code">SKU #00017-SW-JIR-002 | MF #00017-SW-JIR-002
                                                                | NG #00017-SW-JIR-002
                                                            </h6> --}}
                                                    <div class="pt-3 row">
                                                        <div class="col-lg-8">
                                                            <p class="mb-0 list_price">List
                                                                Price</p>
                                                            <div class="product__details__price ">
                                                                <p class="mb-0">US $
                                                                    {{ $item->price }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="stock-info">
                                                                <p tabindex="0" class="prod-stock"
                                                                    id="product-avalialability-by-warehouse">
                                                                    <span aria-label="Stock Availability"
                                                                        class="js-prod-available">
                                                                        <i class="fa fa-info-circle text-success"></i>
                                                                        Stock</span>
                                                                    <br>
                                                                    <span class="badge rounded-pill badge-danger"
                                                                        style="font-size:17px">Unlimited</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div>Tech overview</div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                    <div class="row product_quantity_wraper justify-content-between"
                                                        style="background-color: transparent !important;">
                                                        <form action="http://127.0.0.1:8000/cart_store" method="post">
                                                            <input type="hidden" name="_token"
                                                                value="eEMopK8dBUi3ynpUBOlxSWb9P4zdUl3oQ030waKb">
                                                            <input type="hidden" name="product_id" id="product_id"
                                                                value="62">
                                                            <input type="hidden" name="name" id="name"
                                                                value="Jira Software Cloud Premium - subscription license (annual) - 100 users">
                                                            <div class="row ">
                                                                <div class="col-lg-12 col-sm-12 d-flex align-items-center">
                                                                    <div class="pro-qty">
                                                                        <input type="hidden" name="product_id"
                                                                            id="product_id" value="62">
                                                                        <input type="hidden" name="name"
                                                                            id="name"
                                                                            value="Jira Software Cloud Premium - subscription license (annual) - 100 users">
                                                                        <div class="counter">
                                                                            <span class="down"
                                                                                onclick="decreaseCount(event, this)">-</span>
                                                                            <input type="text" name="qty"
                                                                                value="1" class="count_field">
                                                                            <span class="up"
                                                                                onclick="increaseCount(event, this)">+</span>

                                                                        </div>
                                                                    </div>
                                                                    <button class="btn-color ms-3" type="submit">Add to Basket</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Quick View Modal End --}}
                        {{-- Ask For Price Modal Modal --}}
                        <!-- Modal -->
                        <div class="modal fade" id="askProductPrice" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="py-2 modal-header" style="background: #ae0a46;">
                                        <h5 class="text-white modal-title" id="staticBackdropLabel">Your Price Form
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container px-0">
                                            <form>
                                                <div class="px-2 py-2 rounded bg-light">
                                                    <div class="mb-1 row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Name</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="name"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Your Name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Email</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="email"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Your Email"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Mobile</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="number" name="name"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Mobile Number"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">C Name</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="comapny"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Company Name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Quantity </span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="number" name="qty"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Your Quantity"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Product</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="file" name="custom_image"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Product Image"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <span style="font-size: 12px;">Type Message :</span>
                                                                    <textarea class="form-control form-control-sm w-100" id="message" name="message" rows="2"
                                                                        placeholder="Enter Your Name"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer me-2" style="padding: 0px;border: 0px;">
                                        <button class="btn btn-sm" style="background: #ae0a46; color: white;"
                                            role="button">Submit</button>
                                        <!-- HTML !-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Ask For Price Modal Modal End --}}

                        {{-- Ask For Price Modal --}}
                        <!-- Modal -->
                        <div class="modal fade" id="rfq{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="py-2 modal-header" style="background: #ae0a46;">
                                        <h5 class="text-white modal-title" id="staticBackdropLabel">Ask For Price Form
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container px-0">
                                            <form>
                                                <div class="px-2 py-2 rounded">
                                                    <div class="mb-1 row">
                                                        <h6 class="mb-0"> {{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                                <div class="px-2 py-2 rounded bg-light">

                                                    <div class="mb-1 row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Name</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="name"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Your Name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Email</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="email"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Your Email"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Mobile</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="number" name="name"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Mobile Number"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">C Name</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="comapny"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Company Name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Quantity </span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="number" name="qty"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Your Quantity"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-4 d-flex justify-content-between align-items-center">
                                                                    <span style="font-size: 12px;">Product</span>
                                                                    <span style="font-size: 12px;"> :</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="file" name="custom_image"
                                                                        class="form-control form-control-sm w-100"
                                                                        maxlength="100" placeholder="Enter Product Image"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <span style="font-size: 12px;">Type Message :</span>
                                                                    <textarea class="form-control form-control-sm w-100" id="message" name="message" rows="2"
                                                                        placeholder="Enter Your Name"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer me-2" style="padding: 0px;border: 0px;">
                                        <button class="btn btn-sm" style="background: #ae0a46; color: white;"
                                            role="button">Submit</button>
                                        <!-- HTML !-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Ask For Price Modal End --}}
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!---------End -------->
    {{-- Cart Section end --}}
@endsection


@section('scripts')
    <script>
        if ($('#checkout').val() == 0) {
            $('#work').hide();
        }
    </script>

    <script>
        var buttonAdd = document.querySelectorAll('.cart_input')
        var cartUpdateBtn = document.querySelectorAll('.update_button')
        cartUpdateBtn.forEach(element => {
            element.style.cssText = 'all:unset;display:block;cursor:pointer'
        });
    </script>


    <script>
        //----- Quantity
        function increaseCount(a, b, c) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            var cartContainer = $('.cart_product');
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
            let form = $(this).closest('.myForm');
            var rowId = c;
            $.ajax({
                type: 'GET',
                url: "cart-increment/" + rowId,
                //url: route(routeName, { rowId }),
                dataType: 'json',
                success: function(data) {
                    toastr.success('Successfully Updated Your Cart');
                    cartContainer.empty(data);
                    cartContainer.html(data);
                    // window.location.reload();
                }
            });


        }

        // ---------- END CART INCREMENT -----///



        // -------- CART Decrement  --------//

        function decreaseCount(a, b, c) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }

            var form = $(this).closest('.myForm');
            // var rowId = form.find("input[name=rowID]").val();
            var rowId = c;
            var cartContainer = $('.cart_product');
            $.ajax({
                type: 'GET',
                url: "cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    toastr.success('Successfully Updated Your Cart');
                    cartContainer.empty(data);
                    cartContainer.html(data);
                }
            });
        }
        // Cart Remove start
        function deleteRow(a, b, c) {

            var form = $(this).closest('.myForm');
            // var rowId = form.find("input[name=rowID]").val();
            var rowId = c;
            var cartContainer = $('.cart_product');
            $.ajax({
                type: 'GET',
                url: "cart-remove/" + rowId,
                dataType: 'json',
                success: function(data) {
                    toastr.success('Successfully Updated Your Cart');
                    cartContainer.empty(data);
                    cartContainer.html(data);
                }
            });
        }
        function emptyCart(event) {

            var form = $(this).closest('.myForm');
            var cartContainer = $('.cart_product');
            $.ajax({
                type: 'GET',
                url: "{{route('cart.destroy')}}",
                dataType: 'json',
                success: function(data) {
                    toastr.warning('Successfully empty Your Cart');
                    cartContainer.empty(data);
                    cartContainer.html(data);
                }
            });
        }



        // Cart Remove End
    </script>
@endsection
