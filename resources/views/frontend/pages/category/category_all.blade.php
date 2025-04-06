@extends('frontend.master')
@section('content')
<style>
    .ag-offer_item{
        padding: 5px 15px;
        height: 7rem;
    }
</style>
    <!--======// Header Title //======-->
    <section class="common_product_header" style="background-image:url('{{ asset('frontend/images/category.jpg') }}');">
        <div class="container ">
            <h1>Shop for Categories</h1>
            <div class="row ">
                <!--BUTTON START-->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="m-4">
                        <a class="btn-color" href="{{ route('shop') }}">Go to Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container my-3">
            <ul class="breadcrumb text-left">

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
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">All Categories</span>
                        </span>
                    </li>
                </a>

            </ul>
        </div>
    </section>
    <!----------End--------->
    <!--======// Top Brand //=====-->
    <section>
        <div class="ag-offer-block container d-lg-block d-sm-none">
            <h3 class="text-center py-3">All Categories</h3>
            <div class="ag-format-container row gx-2">
                @foreach ($categorys as $category)
                    <div class="ag-offer_list col-lg-3 mb-3">
                        <div class="ag-offer_item"
                            style="border: 1px dotted rgb(179, 179, 179); margin: 0.15rem!important;">
                            <div class="ag-offer_visible-item">
                                <div class="ag-offer_img-box">
                                    <img class="ag-offer_img" width="70px" height="70px"
                                        src="{{ !empty($category->image) && file_exists(public_path('storage/' . $category->image)) ? asset('storage/' . $category->image) : asset('frontend/images/no-category-img.png') }}"
                                        alt="NGEN IT">
                                </div>
                                <div class="ag-offer_title">
                                    <p>{{ Str::limit($category->title, 30) }}</p>
                                </div>
                            </div>
                            <div class="ag-offer_hidden-item">
                                <div class="mx-auto">
                                    <a href="{{ route('category.html', $category->slug) }}" class="btn-color">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container d-lg-none d-sm-block pb-5">
            <div class="d-flex justify-content-center align-items-center px-3 mb-3 border-bottom">
                <div class="text-start w-75">
                    <h3 class="main_color">All Categories</h3>
                </div>
                <div class="text-end w-25">
                    <a class="Arrows custom-responsive-slider-prev"><i
                            class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                    <a class="Arrows custom-responsive-slider-next"><i
                            class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="ag-format-container row gx-2">
                <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                    @foreach ($categorys as $category)
                        @if (!empty($category))
                            <div class="row gx-2">
                                <div class="col-4">
                                    <img class="ag-offer_img" width="60px" height="60px"
                                        src="{{ !empty($category->image) && file_exists(public_path('storage/' . $category->image)) ? asset('storage/' . $category->image) : asset('frontend/images/no-category-img.png') }}"
                                        alt="NGEN IT">
                                </div>
                                <div class="col-8">
                                    <div class="row gx-1">
                                        <div class="col-12 text-center pb-2">
                                            <div class="ag-offer_title pt-3">
                                                {{-- <p>{{ Str::limit($category->title, 30) }}</p> --}}
                                                <p>{{ $category->title }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <div class="mx-auto">
                                                <a href="{{ route('category.html', $category->slug) }}"
                                                    class="btn-color p-2 px-4">
                                                    Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!----------End--------->
    <!--======// Featured Sub Categories //=====-->
    <section>
        <div class="ag-offer-block container d-lg-block d-sm-none">
            <h3 class="text-center py-3">All Sub Categories</h3>
            <div class="ag-format-container row gx-2">
                @foreach ($sub_cats as $sub_cat)
                    @php
                        $slug = App\Models\Admin\SubCategory::where('id', $sub_cat->id)->value('slug');
                    @endphp
                    <div class="ag-offer_list col-lg-3 mb-3">
                        <div class="ag-offer_item"
                            style="border: 1px dotted rgb(179, 179, 179); margin: 0.15rem!important;">
                            <div class="ag-offer_visible-item">
                                <div class="ag-offer_img-box">
                                    <img class="ag-offer_img" width="70px" height="70px"
                                        src="{{ !empty($sub_cat->image) && file_exists(public_path('storage/' . $sub_cat->image)) ? asset('storage/' . $sub_cat->image) : asset('frontend/images/no-category-img.png') }}"
                                        alt="NGEN IT">
                                </div>
                                <div class="ag-offer_title">
                                    <p>{{ Str::limit($sub_cat->title, 45) }}</p>
                                </div>
                            </div>
                            <div class="ag-offer_hidden-item">
                                <div class="mx-auto">
                                    <a href="{{ route('category.html', $slug) }}" class="btn-color">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($sub_sub_cats as $sub_sub_cat)
                    @php
                        $slug = App\Models\Admin\SubSubCategory::where('id', $sub_sub_cat->id)->value('slug');
                    @endphp
                    <div class="ag-offer_list col-lg-3 mb-3">
                        <div class="ag-offer_item"
                            style="border: 1px dotted rgb(179, 179, 179); margin: 0.15rem!important;">
                            <div class="ag-offer_visible-item">
                                <div class="ag-offer_img-box">
                                    <img class="ag-offer_img" width="70px" height="70px"
                                        src="{{ !empty($sub_sub_cat->image) && file_exists(public_path('storage/' . $sub_sub_cat->image)) ? asset('storage/' . $sub_sub_cat->image) : asset('frontend/images/no-category-img.png') }}"
                                        alt="NGEN IT">
                                </div>
                                <div class="ag-offer_title">
                                    <p>{{ Str::limit($sub_sub_cat->title, 45) }}</p>
                                </div>
                            </div>
                            <div class="ag-offer_hidden-item">
                                <div class="mx-auto">
                                    <a href="{{ route('custom.product', $slug) }}" class="btn-color">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container d-lg-none d-sm-block pt-5">
            <div class="d-flex justify-content-center align-items-center px-3 mb-3 border-bottom">
                <div class="text-start w-75">
                    <h3 class="main_color">All Sub Categories</h3>
                </div>
                <div class="text-end w-25">
                    <a class="Arrows custom-responsive-slider-prev"><i
                            class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                    <a class="Arrows custom-responsive-slider-next"><i
                            class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="ag-format-container row gx-2">
                <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                    @foreach ($sub_cats as $sub_cat)
                        @php
                            $slug = App\Models\Admin\SubCategory::where('id', $sub_cat->id)->value('slug');
                        @endphp
                        @if (!empty($sub_cat))
                            <div class="row gx-2">
                                <div class="col-4">
                                    <img class="ag-offer_img" width="60px" height="60px"
                                        src="{{ !empty($sub_cat->image) && file_exists(public_path('storage/' . $sub_cat->image)) ? asset('storage/' . $sub_cat->image) : asset('frontend/images/no-category-img.png') }}"
                                        alt="NGEN IT">
                                </div>
                                <div class="col-8">
                                    <div class="row gx-1">
                                        <div class="col-12 text-center pb-2">
                                            <div class="ag-offer_title pt-3">
                                                {{-- <p>{{ Str::limit($sub_cat->title, 30) }}</p> --}}
                                                <p>{{ $sub_cat->title }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <div class="mx-auto">
                                                <a href="{{ route('category.html', $sub_cat->slug) }}"
                                                    class="btn-color p-2 px-4">
                                                    Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @foreach ($sub_sub_cats as $sub_sub_cat)
                    @php
                        $slug = App\Models\Admin\SubSubCategory::where('id', $sub_sub_cat->id)->value('slug');
                    @endphp
                        @if (!empty($sub_sub_cat))
                            <div class="row gx-2">
                                <div class="col-4">
                                    <img class="ag-offer_img" width="60px" height="60px"
                                        src="{{ !empty($sub_sub_cat->image) && file_exists(public_path('storage/' . $sub_sub_cat->image)) ? asset('storage/' . $sub_sub_cat->image) : asset('frontend/images/no-category-img.png') }}"
                                        alt="NGEN IT">
                                </div>
                                <div class="col-8">
                                    <div class="row gx-1">
                                        <div class="col-12 text-center pb-2">
                                            <div class="ag-offer_title pt-3">
                                                {{-- <p>{{ Str::limit($sub_sub_cat->title, 30) }}</p> --}}
                                                <p>{{ $sub_sub_cat->title }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <div class="mx-auto">
                                                <a href="{{ route('category.html', $sub_sub_cat->slug) }}"
                                                    class="btn-color p-2 px-4">
                                                    Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--------- End -------->

    <!--========// Related Product Begin //==========-->
    {{-- <section class="popular_product_section section_padding">
        <!-- container -->
        <div class="container">
            <div class="popular_product_section_content">
                <!-- section title -->
                <div class="section_title">
                    <h3 class="title_top_heading">Related Products</h3>
                </div>
                <!-- wrapper -->
                <div class="populer_product_slider">

                    <!-- product_item -->
                    @foreach ($products as $item)
                        <div class="product_item">
                            <!-- image -->
                            <div class="product_item_thumbnail">
                                <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->name }}" width="150px"
                                    height="113px">
                            </div>

                            <!-- product content -->
                            <div class="product_item_content">
                                <a href="{{ route('product.details', $item->slug) }}" class="product_item_content_name"
                                    style="height: 3rem;">{{ Str::limit($item->name, 50) }}</a>

                                @if ($item->rfq != 1)
                                    <!-- price -->
                                    <div class="product_item_price">
                                        <span class="price_currency">USD</span>
                                        @if (!empty($item->discount))
                                            <span class="price_currency_value"
                                                style="text-decoration: line-through; color:red">$
                                                {{ $item->price }}</span>
                                            <span class="price_currency_value" style="color: black">$
                                                {{ $item->discount }}</span>
                                        @else
                                            <span class="price_currency_value">$ {{ $item->price }}</span>
                                        @endif
                                    </div>

                                    <!-- button -->
                                    @php
                                        $cart = Cart::content();
                                        $exist = $cart->where('id', $item->id);
                                        //dd($cart->where('image' , $item->thumbnail )->count());
                                    @endphp
                                    @if ($cart->where('id', $item->id)->count())
                                        <a href="javascript:void(0);" class="btn-color p-0 py-2 px-1 pb-2"
                                            style="height: 2.5rem"> Already in Cart</a>
                                    @else
                                        <form action="{{ route('add.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" id="product_id"
                                                value="{{ $item->id }}">
                                            <input type="hidden" name="name" id="name"
                                                value="{{ $item->name }}">
                                            <input type="hidden" name="qty" id="qty" value="1">
                                            <button type="submit" class="product_button">Add to Basket</button>
                                        </form>
                                    @endif
                                @else
                                    <div class="product_item_price">
                                        <span class="price_currency_value">---</span>
                                    </div>
                                    <a class="product_button"
                                        href="{{ route('product.details', $item->slug) }}">Details</a>
                                @endif
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section> --}}
    <!-------End-------->
    <!--======// Explore all the brands Ngen It has to offer. //====-->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="text-center py-3">
                    <h2>Explore all the <strong class="main_color">Categorys</strong> Ngen It has to offer.</h2>
                </div>
                <div class="col-lg-12 ">
                    <div class="row mb-1">
                        <div class="col-lg-10 offset-lg-1">
                            <nav>
                                <div class="row">
                                    <div class="nav nav-tabs nav-fill p-0" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#all" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">All</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#a" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">A</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#b" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">B</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#c" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">C</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#d" role="tab" aria-dontrols="nav-contact"
                                            aria-selected="false">D</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#e" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">E</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#f" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">F</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#g" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">G</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#h" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">H</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#i" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">I</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#j" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">J</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#k" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">K</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#l" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">L</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#m" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">M</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#n" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">N</a>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="nav nav-tabs nav-fill p-0" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#o" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">O</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#p" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">P</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#q" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Q</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#r" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">R</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#s" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">S</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#t" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">T</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#u" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">U</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#v" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">V</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#w" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">W</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#x" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">X</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#y" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Y</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                href="#z" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Z</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="tab-content py-3 bg-light border mt-3 rounded px-2 ps-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel"
                            aria-labelledby="nav-healthcare">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_A">
                                    {{-- <h2 class="letter_content_title">All</h2> --}}
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (!empty($item->slug))
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="a" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_A">
                                    <h2 class="letter_content_title">A</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'a')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="b" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_B">
                                    <h2 class="letter_content_title">B</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'b')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="c" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_C">
                                    <h2 class="letter_content_title">C</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'c')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="d" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_D">
                                    <h2 class="letter_content_title">D</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'd')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="e" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_E">
                                    <h2 class="letter_content_title">E</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'e')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="f" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_F">
                                    <h2 class="letter_content_title">F</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'f')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="g" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_G">
                                    <h2 class="letter_content_title">G</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'g')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="h" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_H">
                                    <h2 class="letter_content_title">H</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'h')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="i" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_I">
                                    <h2 class="letter_content_title">I</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'i')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="j" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_J">
                                    <h2 class="letter_content_title">J</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'j')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="k" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_K">
                                    <h2 class="letter_content_title">K</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'k')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="l" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_L">
                                    <h2 class="letter_content_title">L</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'l')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="m" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_M">
                                    <h2 class="letter_content_title">M</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'm')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="n" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_N">
                                    <h2 class="letter_content_title">N</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'n')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="o" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_O">
                                    <h2 class="letter_content_title">O</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'o')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="p" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_P">
                                    <h2 class="letter_content_title">P</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'p')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="q" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_Q">
                                    <h2 class="letter_content_title">Q</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'q')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="r" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_R">
                                    <h2 class="letter_content_title">R</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'r')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="s" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_S">
                                    <h2 class="letter_content_title">S</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 's')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="t" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_T">
                                    <h2 class="letter_content_title">T</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 't')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="u" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_U">
                                    <h2 class="letter_content_title">U</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'u')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_V">
                                    <h2 class="letter_content_title">V</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'v')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="w" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_W">
                                    <h2 class="letter_content_title">W</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'w')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="x" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_X">
                                    <h2 class="letter_content_title">X</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'x')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="y" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_Y">
                                    <h2 class="letter_content_title">Y</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'y')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="z" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="multi_tab_content ">
                                <div class="letter_content_item" id="brand_Z">
                                    <h2 class="letter_content_title">Z</h2>
                                    <div class="letter_content_type">
                                        <ul class="row">
                                            @foreach ($others as $item)
                                                @if (strtolower($item->title[0]) === 'z')
                                                    <li class="col-lg-3 col-sm-6">
                                                        <a
                                                            href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
