@extends('frontend.master')
@section('content')

    <style>
        .btn-white {
            padding: 15px 20px;
            cursor: pointer;
            font-family: "ngenit-custom-Regular";
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            display: inline-block;
            background-color: var(--crimson);
            transition: 0.3s;
            outline: none;
            border: none;
            color: white !important;
        }

        .feature_text p{
            font-size: 14px !important;
            line-height: 20px !important;
        }

        p {
            font-family: "ngenit-custom-Regular" !important;
            font-size: 16px;
            line-height: 30px;
            color: var(--navColor);
        }

        .software_chose_item_title {
            color: #ae0a46;
            font-size: 18px;
            font-weight: 300;
            line-height: 32px;
            padding-bottom: 10px;
            margin: 4px 0px;
            text-align: center;
        }

        .software_chose_item {
            background-color: var(--primaryColor);
            padding: 15px;
            border: 0px solid #d4d0ca;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-top: 10px solid #ae0a46;
            cursor: context-menu;
        }

        .software_chose_item_text {
            font-size: 16px;
            line-height: 24px;
            color: var(--navColor);
            margin-bottom: 30px;
            text-align: center;
            font-weight: 300;
        }

        .section_title {
            /* font-family: cambian; */
            font-family: "ngenit-custom-Regular";
            opacity: none;
            font-size: 29px;
            font-weight: 500;
            text-align: center;
        }

    </style>
    <!--======// Header Title //======-->
    <section class="common_product_header"
        style="background-image:url('{{asset('storage/'.$brandpage->banner_image)}}');">
        <div class="container ">
            <div class="d-flex justify-content-center">
                <a href=""><img src="{{asset('storage/'.$brandpage->brand_logo)}}" alt=""
                        width="200px" height="80px"></a>
            </div>
            <h1>Shop for {{ $brand->title }}</h1>
            <p class="text-center text-white">{{ $brandpage->header }}</p>
            <div class="row ">
                <!--BUTTON START-->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="m-4">
                        <a class="btn-white" href="{{route('contact')}}">Talk A Specialist</a>
                    </div>
                    <div class="m-4">
                        <a class="btn-white"
                            href="{{ !empty($brand->slug) ? route('custom.product',$brand->slug) : route('all.brand') }}">Shop
                            all {{ $brand->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------End--------->



    <!--======// Solution feature 1//======-->
    @if (!empty($row_one))
        <section class="pb-4 my-5">
            <div class="container">
                <div class="my-3 row d-flex justify-content-center">
                    <div class="col-lg-6 col-sm-12 ">
                        <h4>{{ $row_one->title }}</h4>
                        <p class="text-justify">{!! $row_one->description !!}</p>

                        @if (!empty($row_one->link))
                            <a href="{{ $row_one->link }}" class="btn-color">{{ $row_one->btn_name }}</a>
                        @else
                        @endif

                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" src="{{ asset('storage/' . $row_one->image) }}" alt=""
                            style="height: 300px;width: 580px;border-radius: 15px;">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-------------End--------->

    <!--======// Solution feature 2//======-->
    @if (!empty($row_three))
        <section class="my-5">
            <div class="container">
                <div class="my-3 row d-flex justify-content-center">
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" src="{{ asset('storage/' . $row_three->image) }}" alt=""
                            style="height: 300px;width: 580px;border-radius: 15px;">
                    </div>
                    <div class="col-lg-6 col-sm-12 ">
                        <h4>{{ $row_three->title }}</h4>
                        <p class="text-justify">{!! $row_three->description !!}</p>

                        @if (!empty($row_three->link))
                            <a href="{{ $row_three->link }}" class="btn-color">{{ $row_three->btn_name }}</a>
                        @else
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-------------End--------->

    <!--======// Benefits of Software//======-->
    <div class="my-5">
        <div class="container">
            <!-- section title -->
            <div class="">
                <h3 class="mx-auto section_title w-50">{{ $brandpage->row_one_title }} </h3>
                <p class="mx-auto w-75" style="text-align: center;">{{ $brandpage->row_one_header }} </p>
            </div>
            <!-- wrapper -->
            <div class="pt-2 row">
                <!-- item -->
                @if ($card1)
                    <div class="col-lg-4 col-sm-12">
                        <div class="software_chose_item">
                            <p class="software_chose_item_title">{{ $card1->title }}</p>
                            <p class="software_chose_item_text">{!! Str::limit($card1->short_des, 140) !!}</p>
                        </div>
                    </div>
                @endif
                <!-- item -->
                @if ($card2)
                    <div class="col-lg-4 col-sm-12">
                        <div class="software_chose_item">
                            <p class="software_chose_item_title">{{ $card2->title }}</p>
                            <p class="software_chose_item_text">{!! Str::limit($card2->short_des, 140) !!}</p>
                        </div>
                    </div>
                @endif
                <!-- item -->
                @if ($card3)
                    <div class="col-lg-4 col-sm-12">
                        <div class="software_chose_item">
                            <p class="software_chose_item_title">{{ $card3->title }}</p>
                            <p class="software_chose_item_text">{!! Str::limit($card3->short_des, 140) !!}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-------------End--------->

    <!--======// Call to action //======-->
    <div class="my-5 call_to_action"
        style="background-image: url('{{ asset('storage/' . $brandpage->row_six_image) }}');background-attachment: scroll;">
        <div class="container">
            <div class="mx-auto call_to_action_text w-75">
                <h4 class="">{{ $brandpage->row_six_title }}</h4>
                <p>{{ $brandpage->row_six_header }}</p>
            </div>

        </div>
    </div>
    <!-------------End--------->

    <!--======// Solution feature 3//======-->
    @if (!empty($row_four))
        <section class="py-4 my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <h4 style="font-size:32px">{{ $row_four->title }}</h4>
                        <p>{!! $row_four->description !!}</p>
                        @if (!empty($row_four->link))
                            <a href="{{ $row_four->link }}" class="btn-white">{{ $row_four->btn_name }}</a>
                        @else
                        @endif

                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" src="{{ asset('storage/' . $row_four->image) }}" alt=""
                            style="height: 300px;width: 580px;border-radius: 15px;">
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-------------End--------->

    <!--======// Solution feature 4//======-->
    @if (!empty($row_five))
        <section class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" src="{{ asset('storage/' . $row_five->image) }}"
                            style="height: 300px;width: 580px;border-radius: 15px;">
                    </div>
                    <div class="pl-4 col-lg-6 col-sm-12 section_text_wrapper">
                        <h4>{{ $row_five->title }}</h4>
                        <p>{!! $row_five->description !!}</p>
                        @if (!empty($row_five->link))
                            <a href="{{ $row_five->link }}" class="btn-color">{{ $row_five->btn_name }}</a>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-------------End--------->

    <!--=======// Popular products //======-->
    @if (count($products) > 0)
    <section class="popular_product_section section_padding">
        <div class="container">
            <div class="software_feature_title">
                <h1 class="text-center">Popular Products</h1>
            </div>
            <div class="px-0 Container">
                <h3 class="Head" style="font-size:30px;">
                    <a class="btn-white" href="{{ route('custom.product',$brand->slug) }}">Shop
                        <i class="mx-2 fa fa-arrow-right"></i>
                    </a>
                    <span class="Arrows"></span>
                </h3>
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
                                                            style="width: 180px;height: 180px;" alt="{{ $item->name }}">
                                                        <img class="pic-2" src="{{ asset($item->thumbnail) }}"
                                                            style="height: 180px;" alt="{{ $item->name }}">
                                                    </a>

                                                    <ul class="product-links">
                                                        <li><a href="#" data-tip="Quick View" data-bs-toggle="modal"
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
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <form class="" action="{{ route('add.cart') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" id="product_id"
                                                                        value="{{ $item->id }}">
                                                                    <input type="hidden" name="name" id="name"
                                                                        value="{{ $item->name }}">
                                                                    <input type="hidden" name="qty" id="qty"
                                                                        value="1">
                                                                    <div data-mdb-toggle="popover" title="Add To Cart Now"
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
                                                        <p class="text-center text-muted" style="text-decoration: line-through;text-decoration-thickness: 2px; text-decoration-color: #ae0a46;">
                                                            USD
                                                            {{ number_format($item->price, 2) }} $
                                                        </p>
                                                        <div class="d-flex justify-content-center align-items-center">


                                                                <div data-mdb-toggle="popover" title="Your Price"
                                                                    data-mdb-content="Your Price"
                                                                    data-mdb-trigger="hover">
                                                                    <button class="btn-color" data-bs-toggle="modal"
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
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="py-2 modal-header" style="background: #ae0a46;">
                                    <h5 class="text-white modal-title" id="staticBackdropLabel">Product Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <section class="container py-5">
                                        <div class="row">
                                            <!-- images -->
                                            <div class="col-lg-4 col-sm-12 single_product_images">
                                                <!-- gallery pic -->
                                                <div class="mx-auto d-block">
                                                    <img id="expand" class="mx-auto rounded geeks img-fluid d-block"
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
                                                                    <input type="hidden" name="name" id="name"
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
                                                                <button class="btn-white ms-3" type="submit">Add to
                                                                    Basket</button>
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
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
