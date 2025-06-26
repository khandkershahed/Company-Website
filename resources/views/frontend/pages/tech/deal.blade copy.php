@extends('frontend.master')
@section('content')

<style>
    .tech_deals_header {
        background-image: url('{{asset('frontend/images/tech_deals.jpg')}}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 50px 0px;
    }
    .common_button3 {
        padding: 5px 22px;
        cursor: pointer;
        font-family: "ngenit-custom-Regular";
        font-size: 18px;
        font-weight: 500;
        text-align: center;
        display: inline-block;
        background-color: #fff;
        color: #ae0a46;
        transition: 0.3s;
        outline: none;
        border: none;
    }

    .word {
        position: absolute;
        opacity: 0;
        font-size: 38px;
    }

    .letter {
        display: inline-block;
        position: relative;
        float: left;
        transform: translateZ(25px);
        transform-origin: 50% 50% 25px;
        font-weight: 400 !important;
    }

    .letter.out {
        transform: rotateX(90deg);
        transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
        font-weight: 400 !important;
    }

    .letter.behind {
        transform: rotateX(-90deg);
        font-weight: 400 !important;
    }

    .letter.in {
        transform: rotateX(0deg);
        transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        font-weight: 400 !important;
    }

    .wisteria {
        color: #ae0a46;
    }

    .belize {
        color: #ae0a46;
    }

    .pomegranate {
        color: #ae0a46;
    }

    .green {
        color: #ae0a46;
    }

    .midnight {
        color: #ae0a46;
    }

    .normal_text {
        font-size: 60px !important;
        line-height: 72px;
        vertical-align: baseline;
        letter-spacing: normal;
        font-weight: 300 !important;
    }

    .animated_text {
        font-size: 60px !important;
        line-height: 72px;
        vertical-align: baseline;
        letter-spacing: normal;
        font-weight: 400 !important;
    }

    /* Extra Section */
    .ag-format-container {
        width: 1142px;
        margin: 0 auto;
    }


    .ag-offer-block {
        padding: 35px 0 40px;
    }

    .ag-offer_list {
        padding: 0px;
        margin: 0px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -moz-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start
    }

    .ag-offer_item {
        width: 100%;
        overflow: hidden;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        position: relative;
    }

    /* .ag-offer_item:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)) {
            border-top: 1px solid #ae0a46;
        }

        .ag-offer_item:not(:nth-child(3n)) {
            border-right: 1px solid #ae0a46;
        } */

    .ag-offer_item:nth-child(1) .ag-offer_hidden-item {
        background-color: #ae0a46;
    }

    .ag-offer_item:nth-child(2) .ag-offer_hidden-item {
        background-color: #ae0a46;
    }

    .ag-offer_item:nth-child(3) .ag-offer_hidden-item {
        background-color: #ae0a46;
    }

    .ag-offer_item:nth-child(4) .ag-offer_hidden-item {
        background-color: #ae0a46;
    }

    .ag-offer_item:nth-child(5) .ag-offer_hidden-item {
        background-color: #ae0a46;
    }

    .ag-offer_item:nth-child(6) .ag-offer_hidden-item {
        background-color: #ae0a46;
    }

    .ag-offer_item:hover .ag-offer_visible-item {
        opacity: 0;

        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);

        -webkit-transition-delay: 0s;
        -moz-transition-delay: 0s;
        -o-transition-delay: 0s;
        transition-delay: 0s;
    }

    .ag-offer_visible-item {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;

        height: 100%;
        width: 100%;
        /* padding: 10px 20px; */

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        -webkit-transition: .4s .3s;
        -moz-transition: .4s .3s;
        -o-transition: .4s .3s;
        transition: .4s .3s;
    }

    .ag-offer_img {
        height: 150px;
        width: 150px;
        margin: 0 0px 0 0;
    }

    .ag-offer_title {
        font-size: 15px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .ag-offer_hidden-item {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;

        padding: 30px;

        opacity: 0;

        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        -webkit-transform: rotate(180deg) scale(0);
        -moz-transform: rotate(180deg) scale(0);
        -ms-transform: rotate(180deg) scale(0);
        -o-transform: rotate(180deg) scale(0);
        transform: rotate(180deg) scale(0);

        -webkit-transition: .3s;
        -moz-transition: .3s;
        -o-transition: .3s;
        transition: .3s;
    }

    .ag-offer_item:hover .ag-offer_hidden-item {
        opacity: 1;

        -webkit-transform: rotate(0deg) scale(1);
        -moz-transform: rotate(0deg) scale(1);
        -ms-transform: rotate(0deg) scale(1);
        -o-transform: rotate(0deg) scale(1);
        transform: rotate(0deg) scale(1);

        -webkit-transition-delay: .3s;
        -moz-transition-delay: .3s;
        -o-transition-delay: .3s;
        transition-delay: .3s;
    }

    .ag-offer_text {
        max-width: 100%;

        opacity: 0;

        font-size: 14px;
        color: #FFF;

        -webkit-transition: .3s .5s;
        -moz-transition: .3s .5s;
        -o-transition: .3s .5s;
        transition: .3s .5s;
    }

    .ag-offer_item:hover .ag-offer_text {
        opacity: 1;
    }

    .ag-offer_btn {
        display: block;
        padding: 10px 20px;
        border: 2px solid #FFF;

        position: absolute;
        top: 50%;
        left: 50%;

        white-space: nowrap;
        font-size: 25px;
        color: #FFF;

        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;

        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .ag-offer_btn:hover {
        border: 2px solid #0000d1;
        background-color: #FFF;

        text-decoration: none;
        color: #0000d1;
    }

    /*  */
    .box {
        font-family: 'Mandali', sans-serif;
        text-align: center;
        overflow: hidden;
        position: relative;
    }

    .box:before,
    .box:after {
        content: "";
        background: rgba(11, 11, 12, 0.85);
        width: 200%;
        height: 200%;
        opacity: .75;
        transform: skew(45deg) translateX(100%);
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: 1;
        transition: all .6s ease;
    }

    .box:after {
        transform: skew(45deg) translateX(-100%);
        top: 0;
        left: 0;
        right: auto;
        bottom: auto;
        z-index: 0;
    }

    .box:hover:before,
    .box:hover:after {
        transform: skew(45deg) translateX(0);
    }

    .box img {
        width: 100%;
        height: auto;
        transition: all 0.35s;
    }

    .box:hover img {
        opacity: 0.5;
    }

    .box-content {
        color: #fff;
        width: 85%;
        opacity: 0;
        transform: translateX(-50%) translateY(-50%);
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 2;
        transition: all 0.6s ease;
    }

    .box:hover .box-content {
        opacity: 1;
    }

    .box .title {
        font-size: 22px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        margin: 0 0 3px;
    }

    .box .post {
        font-size: 14px;
        font-weight: 200;
        letter-spacing: 1px;
        text-transform: capitalize;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        margin: 0 0 10px;
        display: block;
    }

    .box .icon {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .box .icon li {
        margin: 0 3px;
        display: inline-block;
    }

    .box .icon li a {
        color: #EA2027;
        background: #fff;
        font-size: 16px;
        line-height: 34px;
        width: 34px;
        height: 34px;
        display: block;
        transition: all 0.35s;
    }

    .box .icon li a:hover {
        color: #fff;
        background: #EA2027;
    }

    .borders_right {
        border-right: 1px solid !important;
    }

    @media only screen and (max-width:990px) {
        .box {
            margin: 0 0 30px;
        }
    }


    /*  */
    @media only screen and (max-width: 767px) {
        .ag-format-container {
            width: 96%;
        }

        .ag-offer_item {
            width: 100%;
            margin: 0 0 30px;
            border: 0 none !important;
            border-bottom: 1px solid #c1c1c1 !important;
        }

        .ag-offer_visible-item {
            padding: 0 20px 30px;

            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            -moz-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
        }

        .ag-offer_item:hover .ag-offer_visible-item {
            opacity: 1;

            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
            transform: none;
        }

        .ag-offer_hidden-item {
            padding: 0 20px 20px;

            opacity: 1;

            position: static;

            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
            transform: none;
        }

        .ag-offer_item:nth-child(1) .ag-offer_hidden-item,
        .ag-offer_item:nth-child(2) .ag-offer_hidden-item,
        .ag-offer_item:nth-child(3) .ag-offer_hidden-item,
        .ag-offer_item:nth-child(4) .ag-offer_hidden-item,
        .ag-offer_item:nth-child(5) .ag-offer_hidden-item,
        .ag-offer_item:nth-child(6) .ag-offer_hidden-item {
            background-color: transparent;
        }

        .ag-offer_item:hover .ag-offer_text {
            opacity: 1;
        }

        .ag-offer_title {
            font-weight: bold;
        }

        .ag-offer_text {
            opacity: 1;

            font-size: 18px;
            color: #000;
        }

        .ag-offer_btn {
            border: 2px solid #0000d1;
            background-color: #000080;

            position: static;

            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
            transform: none;
        }

    }

    @media only screen and (max-width: 639px) {}

    @media only screen and (max-width: 479px) {}

    @media (min-width: 768px) and (max-width: 979px) {
        .ag-format-container {
            width: 750px;
        }

    }

    @media (min-width: 980px) and (max-width: 1161px) {
        .ag-format-container {
            width: 960px;
        }

    }
</style>

<!--=======// Header Title //=======-->
<section class="tech_deals_header">
    <div class="container">
        <h1>Technology deals</h1>
        <h3>Browse and Explore exclusive tech deals from Ngen It. We offer deep discounts on electronics, devices and softwares.</h3>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-2"></div>
            <!--BUTTON START-->
            <div class="col-lg-3 col-sm-12 d-flex justify-content-center mb-4">
                <a class="search_all_tech_deals_btn" href="#tech_deal">Explore tech deals</a>
            </div>
            <div class="col-lg-3 col-sm-12 d-flex justify-content-center mb-4">
                <a class="shop_refurbished_btn " href="{{route('refurbished')}}">Shop refurbished</a>
            </div>
            <!--BUTTON END-->
            <div class="col-lg-2"></div>
            </span>

        </div>
    </div>

</section>
<!---------End-------->

<!--=======// Featured deals //=======-->
<section class="container">
    <div class="tech_deals_section_content" id="tech_deal">
        <!-- section title -->
        <div class="tech_deals_featured_item_title">
            <h3>Featured deals</h3>
            {{-- <p>Discover our latest discounts and limited-time offers on the technology brands and devices your business trusts.</p> --}}
        </div>
        <!-- wrapper -->
        <div class="row">
            <!-- product_item -->

            @foreach ($products as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product_item">
                    <!-- image -->
                    <div class="product_item_thumbnail">
                        <img src="{{ asset($item->thumbnail)}}" alt="{{$item->name}}" width="150px" height="113px">
                    </div>

                    <!-- product content -->
                    <div class="product_item_content">
                        <a href="{{ route('product.details', $item->slug) }}" class="product_item_content_name" style="height: 3rem;">{{$item->name}}</a>

                        <!-- price -->
                        <div class="product_item_price">
                            <span class="price_currency">USD</span>
                            @if (!empty($item->discount))
                            <span class="price_currency_value" style="text-decoration: line-through; color:red">$ {{ $item->price }}</span>
                            <span class="price_currency_value" style="color: black">$ {{ $item->discount }}</span>
                            @else
                            <span class="price_currency_value">$ {{ $item->price }}</span>
                            @endif
                        </div>
                        @php
                            $cart = Gloudemans\Shoppingcart\Facades\Cart::content();
                        @endphp
                        @if ($cart->where('id' , $item->id )->count())
                        <a href="javascript:void(0);" class="common_button2" > Already in Cart</a>
                        @else
                        <form action="{{  route('add.cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="name" id="name" value="{{ $item->name }}">
                            <input type="hidden" name="qty" id="qty" value="1">
                            {{-- <!-- button -->onclick="addToCart()" --}}
                            {{-- <a href="javascript:void(0);" class="product_button"  id="addToCart">Add to Basket</a> --}}
                             <button type="submit" class="product_button"  >Add to Basket</button>
                         </form>
                        @endif

                    </div>

                </div>

                <hr>
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
</section><br><hr>
<!---------End-------->

<!--=======// Trust refurbished //=======-->
{{-- <section class="container">
    <div class="d-flex justify-content-center" id="refurbished">
        <img src="images/tech_deals/featured_partners/microsoft-authorized-refurbisher.png" alt="">
    </div>
    <div class="trust_refurbished_title">
        <h2>Trust Insight for refurbished products.</h2>
        <p>We offer a range of certified refurbished hardware that <a href="client_stories_blog_insert.html">meets your business needs at a lower price point.</a>  From desktops to notebooks to monitors, our refurbished products deliver the performance, support and customization you depend on. And, as a Microsoft Authorized Refurbisher, we adhere to strict requirements that ensure the quality of our refurbished Microsoft hardware.</p>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <button class="common_button">Learn more about refurbished products</button>
    </div>
</section> --}}
<!---------End-------->

<!--=======// shop by brand //=======-->
<section class="container">
    <div class="tech_deals_section_content">
        <!-- section title -->
        <div class="tech_deals_featured_item_title">
            <h3 class="tech_deals_title_topline"></h3>
            <h3>Featured Deals By Brand</h3>
        </div>
        <div class="row">
            <!-- Logo -->

            @foreach ($brands as $item)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- image -->
                    <div class="tech_deals_thumbnail">
                        <a href="{{route('brand.html',$item->slug)}}">
                            <img src="{{asset('storage/'.$item->image)}}" alt="{{$item->title}}">
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!---------End-------->



<!--=======// Shop by category //=======-->
<section class="container">
    <!--Title-->
    <div class="tech_deals_featured_item_title">
        <h3 class="tech_deals_title_topline"></h3>
        <h3>Shop by category</h3>
    </div>
    <!--Product Category-->
    <div class="row">
        <!--Category item-->

        @foreach ($categories as $item)
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 p-4">
                <img class="img-fluid mb-4" src="{{asset('storage/'.$item->image)}}" alt="{{$item->title}}">
                <div class="common_product_item_text">
                    <a href="{{route('category.html',$item->slug)}}">{{$item->title}}</a>
                </div>
            </div>
        @endforeach
    </div>

</section>
<!---------End-------->

<!--=======// Featured refurbished //=======-->

<!---------End-------->

<!--=======// Purchased warranty //=======-->
<section class="purchased_warranty">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-sm-10">
                <h2>Ngen It offers exclusive deals and refurbished products.</h2>
            </div>
            <div class="col-lg-2 col-sm-2">
                <div class="d-flex justify-content-end">
                    <img class="img-fluid " src="images/tech_deals/check-mark.png" width="100px" alt="">
                </div>

            </div>
        </div>
    </div>
</section>
<!---------End-------->

<!--=======// Recommended technology //=======-->
<section class="container">
    <div class="popular_product_section_content">
        <!-- section title -->
        <div class="tech_deals_featured_item_title">
            <h3>Recommended Refurbished Products for you</h3>
        </div>
        <!-- wrapper -->
        <div class="populer_product_slider">
            <!-- product_item -->
            @foreach ($refurbished_products as $item)
            <div class="product_item">
                <!-- image -->
                <div class="product_item_thumbnail">
                    <img src="{{ asset($item->thumbnail)}}" alt="{{$item->name}}" width="150px" height="113px">
                </div>

                <!-- product content -->
                <div class="product_item_content">
                    <a href="{{ route('product.details', $item->slug) }}" class="product_item_content_name" style="height: 3rem;">{{$item->name}}</a>

                    <!-- price -->
                    <div class="product_item_price">
                        <span class="price_currency">USD</span>
                        @if (!empty($item->discount))
                        <span class="price_currency_value" style="text-decoration: line-through; color:red">$ {{ $item->price }}</span>
                        <span class="price_currency_value" style="color: black">$ {{ $item->discount }}</span>
                        @else
                        <span class="price_currency_value">$ {{ $item->price }}</span>
                        @endif
                    </div>
                    @php
                        $cart = Gloudemans\Shoppingcart\Facades\Cart::content();
                    @endphp
                    @if ($cart->where('id' , $item->id )->count())
                    <a href="javascript:void(0);" class="common_button2" > Already in Cart</a>
                    @else
                    <form action="{{  route('add.cart') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $item->id }}">
                        <input type="hidden" name="name" id="name" value="{{ $item->name }}">
                        <input type="hidden" name="qty" id="qty" value="1">
                        {{-- <!-- button -->onclick="addToCart()" --}}
                        {{-- <a href="javascript:void(0);" class="product_button"  id="addToCart">Add to Basket</a> --}}
                         <button type="submit" class="product_button"  >Add to Basket</button>
                     </form>
                    @endif

                </div>

            </div>
            @endforeach
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4"></div>
            <!--BUTTON START-->
            <div class="col-lg-3 col-sm-12 d-flex justify-content-center mb-4">
                <a class="search_all_tech_deals_btn" href="{{route('tech.deals')}}">Explore All Refurbished Products</a>
            </div>

            <!--BUTTON END-->
            <div class="col-lg-4"></div>
            </span>

        </div>
    </div>
</section><br><br><hr>
<!---------End-------->




@endsection
