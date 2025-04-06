@extends('frontend.master')
@section('content')
    <style>
        .nav-tabs .nav-link,
        .nav-tabs .nav-item .nav-link {
            border: 1px solid #bfbabc;
            padding: 20px;
            border-radius: 0px;
            font-size: var(--badge-font-size);
            font-weight: 600;
            background: var(--black);
            color: var(--white);
        }

        .nav-tabs {
            border: 0;
            border-radius: 3px;
            padding: 0px;
        }

        .nav-tabs .nav-item .nav-link.active {
            border: 1px solid var(--primary-color);
            padding: 5px 20px 5px;
            border-radius: 0px;
            font-size: var(--badge-font-size);
            font-weight: 600;
            color: var(--white);
            background: var(--primary-color);
        }

        .nav-pills-custom .nav-link {
            font-size: 16px;
        }
    </style>
    <!--======// Header custom-Title //======-->
    @if (!empty($hardware_info->banner_image))
        <section>
            <div>
                <img class="page_top_banner"
                    src="{{ !empty($hardware_info->banner_image) && file_exists(public_path('storage/' . $hardware_info->banner_image)) ? asset('storage/' . $hardware_info->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}"
                    alt="NGEN IT Software">
            </div>
        </section>
    @endif
    <!---------End -------->
    <section class="pt-1">
        <div class="container my-3 mt-4">
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
                <a href="{{ route('hardware.common') }}">
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Hardware Common</span>
                        </span>
                    </li>
                </a>
            </ul>
        </div>
    </section>
    <!--======// Information Section //======-->
    @if (!empty($hardware_info->row_six_image))
        <section>
            <div class="container">
                <div class="row gx-3">
                    <div class="col-lg-8">
                        <div class="p-5 blocks-content block-image-content" style="background-color:#f7f6f5!important; height: 30rem;">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="animated-image parbase section">
                                        <div id="solution_image_1">
                                            <img src="{{ isset($hardware_info->row_six_image) && file_exists(public_path('storage/' . $hardware_info->row_six_image)) ? asset('storage/' . $hardware_info->row_six_image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="{{ $hardware_info->row_six_title }}"
                                                title="Software Information NGENIT" class="img-fluid"
                                                style="background-color: rgb(212,208,202);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="software-info-title">
                                        <span
                                            style="border-top: 3px solid #ae0a46;">{{ Str::substr($hardware_info->row_six_title, 0, 1) }}</span>{{ Str::substr($hardware_info->row_six_title, 1) }}
                                    </h3>
                                    <p class="software-info-paragraph" style="text-align: justify;">
                                        {!! $hardware_info->row_six_short_description !!}
                                    </p>
                                    @if (!empty($hardware_info->row_six_btn_name))
                                        <a href="{{ $hardware_info->row_six_btn_link }}"
                                            class="cool-link main_color">{{ $hardware_info->row_six_btn_name }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($tab_one)
                        <div class="col-lg-4">
                            <div class="p-5 blocks-content" style="background-color:#f7f6f5!important; height: 30rem;">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        @if (isset($tab_one->image) && file_exists(public_path('storage/' . $tab_one->image)))
                                            <div>
                                                <img class="pb-4" width="60px"
                                                    src="{{ asset('storage/' . $tab_one->image) }}" alt="">
                                            </div>
                                        @endif
                                        <h1 class="software-info-title">
                                            <span
                                                style="border-top: 3px solid #ae0a46;">{{ Str::substr($tab_one->title, 0, 1) }}</span>{{ Str::substr($tab_one->title, 1) }}
                                        </h1>
                                        <p class="software-info-paragraph" style="text-align: justify;">
                                            {!! Str::words($tab_one->description, 37) !!}

                                        </p>
                                        @if (!empty($tab_one->btn_name))
                                            <a href="{{ $tab_one->link }}"
                                                class="cool-link main_color">{{ $tab_one->btn_name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mt-3 mb-5 row gx-3">
                    @if ($tabIds)
                        @foreach ($tabIds as $tabId)
                            <div class="col-lg-4">
                                <div class="p-5 blocks-content" style="background-color:#f7f6f5!important; height: 30rem;">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            @if (isset($tabId->image) && file_exists(public_path('storage/' . $tabId->image)))
                                                <div>
                                                    <img class="pb-4" width="60px"
                                                        src="{{ asset('storage/' . $tabId->image) }}" alt="">
                                                </div>
                                            @endif
                                            <h1 class="software-info-title">
                                                <span
                                                    style="border-top: 3px solid #ae0a46;">{{ Str::substr($tabId->title, 0, 1) }}</span>{{ Str::substr($tabId->title, 1) }}
                                            </h1>
                                            <p class="software-info-paragraph" style="text-align: justify;">
                                                {!! Str::words($tabId->description, 37) !!}
                                            </p>
                                            @if (!empty($tabId->btn_name))
                                                <a href="{{ $tabId->link }}"
                                                    class="cool-link main_color">{{ $tabId->btn_name }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!--=======// Popular products //======-->
    <section>
        <div class="container p-0">
            <div class="px-0 mt-5 Container">
                <h3 class="Head main_color">Recent Products <span class="Arrows"></span></h3>
                <!-- Carousel Container -->
                <div class="SlickCarousel">
                    @if ($products)
                        @foreach ($products as $item)
                            <!-- Item -->
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
                                                            <a href=""
                                                                class="d-flex justify-content-center align-items-center"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}">
                                                                <button class="btn-color popular_product-button">
                                                                    Ask For Price
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'rfq')
                                                        <div>
                                                            <div class="py-3 price">
                                                                {{-- <small class="price-usd">USD</small>
                                                            --.-- $ --}}
                                                            </div>
                                                            <a href=""
                                                                class="d-flex justify-content-center align-items-center"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}">
                                                                <button class="btn-color popular_product-button">
                                                                    Ask For Price
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'offer_price')
                                                        <div>
                                                            <div class="py-3 price">
                                                                <small class="price-usd">USD</small>
                                                                $ {{ number_format($item->price, 2) }}
                                                            </div>
                                                            <a href=""
                                                                class="d-flex justify-content-center align-items-center"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}">
                                                                <button class="btn-color" data-bs-toggle="modal"
                                                                    data-bs-target="#askProductPrice">
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
                        @endforeach
                    @endif
                </div>
                <!-- Carousel Container -->
                @include('frontend.pages.home.rfq_modal')
            </div>
        </div>
    </section>
    <!---------End -------->
    <!---======= Nested Tab ======--->
    <section>
        <div class="container my-5">
            <div class="py-3 nasted_tabbar_title">
                <h5>Discover Our Extensive Range of Software Products and Categories</h5>
                <p class="home_title_text">Investigate Our Extensive Selection of Cutting-Edge Software Solutions and
                    Categories</p>
            </div>
            <!-- Tabs with icons on Card -->
            <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="p-0 border-0 shadow-lg card card-nav-tabs rounded-0">
                    <div class="card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs row gx-0" data-tabs="tabs">
                                    <li class="nav-item col">
                                        <a class="py-3 nav-link active" href="#categories" data-bs-toggle="tab"> Categories
                                        </a>
                                    </li>
                                    <li class="col nav-item">
                                        <a class="py-3 nav-link" href="#brand" data-bs-toggle="tab"> Brand </a>
                                    </li>
                                    <li class="col nav-item">
                                        <a class="py-3 nav-link" href="#industry" data-bs-toggle="tab"> Industry </a>
                                    </li>
                                    <li class="col nav-item">
                                        <a class="py-3 nav-link" href="#solution" data-bs-toggle="tab"> Solution </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 m-0 card-header">
                        <div class="row gx-0">
                            <div class="col-md-3">
                                <div>
                                    <form action=" ">
                                        <div class="btn_group">
                                            <input type="text" class="form-control" placeholder="Search"
                                                style="height: 41px;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="table-responsive ps-1">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr class="py-2">
                                                <td class="py-2" width="4.7%">Sl</td>
                                                <td class="py-2" width="83.8%" class="px-2 text-left">
                                                    Name
                                                </td>
                                                <td class="py-2" class="text-left">
                                                    Price
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="categories">
                        {{-- Categories Sub Tab --}}
                        <div class="container p-0">
                            <div class="row gx-0">
                                <div class="col-md-3" style="background-color: #f7f7f7;border-right: 1px solid #d7d6d6;">
                                    <!-- Tabs nav -->
                                    <div class="bg-white nav flex-column nav-pills nav-pills-custom active"
                                        id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach ($categories as $key => $item)
                                            @if (count($item->subCathardwareProducts) > 0)
                                                <a class="nav-link discover_tab_sub rounded-0 {{ $key == 0 ? 'active' : '' }}"
                                                    id="v-pills-home-tab" data-bs-toggle="pill"
                                                    href="#category-{{ $item->id }}" role="tab"
                                                    aria-controls="v-pills-home" aria-selected="true">
                                                    <span
                                                        class="font-weight-bold small text-uppercase text-start">{{ $item->title }}</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-9 ps-1">
                                    <!-- Tabs content -->
                                    <div class="p-0 tab-content" id="v-pills-tabContent">
                                        @foreach ($categories as $key => $item)
                                            @if (count($item->subCathardwareProducts) > 0)
                                                <div class="tab-pane fade rounded-0 bg-white {{ $key == 0 ? 'active show' : '' }}"
                                                    id="category-{{ $item->id }}" role="tabpanel"
                                                    aria-labelledby="v-pills-profile-tab">
                                                    <div class="panel">
                                                        <div class="panel-body table-responsive">
                                                            <div class="table-responsive">
                                                                <table class="table productDT2">
                                                                    <tbody>
                                                                        @foreach ($item->subCathardwareProducts as $key => $product)
                                                                            @if ($key <= 12)
                                                                                <tr>
                                                                                    <td>{{ ++$key }}</td>
                                                                                    <td class="px-2 text-left">
                                                                                        <a
                                                                                            href="{{ route('product.details', $product->slug) }}">{{ Str::words($product->name, 10) }}</a>
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        <small
                                                                                            style="font-size:8px;">USD</small>
                                                                                        <strong>${{ number_format($product->price, 2) }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="brand">
                        {{-- Brand Sub Tab --}}
                        <div class="container p-0">
                            <div class="row gx-0">
                                <div class="col-md-3" style="background-color: #f7f7f7;border-right: 1px solid #d7d6d6;">
                                    <!-- Tabs nav -->
                                    <div class="bg-white nav flex-column nav-pills nav-pills-custom active"
                                        id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach ($brands as $key => $item)
                                            @if (count($item->brandhardwareProducts) > 0)
                                                <a class="nav-link discover_tab_sub rounded-0 {{ $key == 0 ? 'active' : '' }}"
                                                    id="v-pills-home-tab" data-bs-toggle="pill"
                                                    href="#category-{{ $item->id }}" role="tab"
                                                    aria-controls="v-pills-home" aria-selected="true">
                                                    <span
                                                        class="font-weight-bold small text-uppercase text-start">{{ $item->title }}</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-9 ps-1">
                                    <!-- Tabs content -->
                                    <div class="p-0 tab-content" id="v-pills-tabContent">
                                        @foreach ($brands as $key => $item)
                                            @if (count($item->brandhardwareProducts) > 0)
                                                <div class="tab-pane fade rounded-0 bg-white {{ $key == 0 ? 'active show' : '' }}"
                                                    id="category-{{ $item->id }}" role="tabpanel"
                                                    aria-labelledby="v-pills-profile-tab">
                                                    <div class="panel">
                                                        <div class="panel-body table-responsive">
                                                            <div id="product-table">
                                                                <table class="table productDT3">
                                                                    <tbody>
                                                                        @foreach ($item->brandhardwareProducts as $key => $product)
                                                                            @if ($key <= 12)
                                                                                <tr>
                                                                                    <td>{{ ++$key }}</td>
                                                                                    <td class="px-2 text-left">
                                                                                        <a
                                                                                            href="{{ route('product.details', $product->slug) }}">{{ Str::words($product->name, 10) }}</a>
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        <small
                                                                                            style="font-size:8px;">USD</small>
                                                                                        <strong>${{ number_format($product->price, 2) }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="industry">
                        {{-- Industry Sub Tab --}}
                        <div class="container p-0">
                            <div class="row gx-0">
                                <div class="col-md-3" style="background-color: #f7f7f7;border-right: 1px solid #d7d6d6;">
                                    <!-- Tabs nav -->
                                    <div class="bg-white nav flex-column nav-pills nav-pills-custom" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        @foreach ($industrys as $indkey => $item)
                                            <a class="nav-link discover_tab_sub rounded-0 {{ $indkey === 0 ? 'active' : '' }}"
                                                id="v-pills-home-tab" data-bs-toggle="pill"
                                                href="#industry-{{ $item->id }}" role="tab"
                                                aria-controls="v-pills-home" aria-selected="true">
                                                <span class="font-weight-bold small text-uppercase">{{ $item->title }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-9 ps-1">
                                    <!-- Tabs content -->
                                    <div class="p-0 tab-content" id="v-pills-tabContent">
                                        @foreach ($industrys as $indkey => $item)
                                            @php
                                                $product_ids = App\Models\Admin\MultiIndustry::where('industry_id', $item->id)->pluck('product_id');
                                                $industry_products = App\Models\Admin\Product::whereIn('id', $product_ids)
                                                    ->where('product_status', 'product')
                                                    ->where('product_type', 'hardware')
                                                    ->limit(12)
                                                    ->get(['id', 'name', 'price', 'slug']);
                                                $industry_product_count = count($industry_products);
                                            @endphp
                                            {{-- @if ($industry_product_count > 0) --}}
                                            <div class="tab-pane fade rounded-0 p-2 bg-white {{ $indkey === 0 ? 'active show' : '' }}"
                                                id="industry-{{ $item->id }}" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">
                                                <div class="panel">
                                                    <div class="panel-body table-responsive">
                                                        <div id="product-table">
                                                            <table class="table productDT4">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="5%">Sl</th>
                                                                        <th width="77%">Product Name
                                                                        </th>
                                                                        <th width="18%">Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @if ($industry_product_count > 0)
                                                                        @foreach ($industry_products as $key => $item)
                                                                            <tr>
                                                                                <td>{{ ++$key }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    <a
                                                                                        href="{{ route('product.details', $item->slug) }}">
                                                                                        {{ Str::limit($item->name, 80) }}
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    <small
                                                                                        style="font-size:8px;">USD</small>
                                                                                    <strong>$
                                                                                        {{ number_format($item->price, 2) }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <h6 class="text-cnter">No Product Available
                                                                            </h6>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="solution">
                        <div class="container p-0">
                            <div class="row gx-0">
                                <div class="col-md-3" style="background-color: #f7f7f7;border-right: 1px solid #d7d6d6;">
                                    <!-- Tabs nav -->
                                    <div class="bg-white nav flex-column nav-pills nav-pills-custom" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        @foreach ($solutions as $solkey => $item)
                                            @php
                                                $solution_products = $item->solutionhardwareProducts; // Eager load the associated products with product_status and product_type filters applied
                                                $solution_product_count = count($solution_products);
                                            @endphp


                                            <a class="nav-link discover_tab_sub rounded-0 {{ $solkey === 0 ? 'active' : '' }}"
                                                id="v-pills-home-tab" data-bs-toggle="pill"
                                                href="#solution-{{ $item->id }}" role="tab"
                                                aria-controls="v-pills-home" aria-selected="true">
                                                <span
                                                    class="font-weight-bold small text-uppercase">{{ $item->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-9 ps-1">
                                    <!-- Tabs content -->
                                    <div class="p-0 tab-content" id="v-pills-tabContent">
                                        @foreach ($solutions as $solkey => $item)
                                            {{-- @if ($solution_product_count > 0) --}}
                                            <div class="tab-pane fade rounded-0 p-2 bg-white {{ $solkey === 0 ? 'active show' : '' }}"
                                                id="solution-{{ $item->id }}" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">
                                                <div class="panel">
                                                    <div class="panel">
                                                        <div class="panel-body table-responsive">
                                                            <div id="product-table">
                                                                <table class="table productDT0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="5%">Sl</th>
                                                                            <th width="77%">Product Name</th>
                                                                            <th width="18%">Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @if ($solution_product_count > 0)
                                                                            @foreach ($solution_products as $key => $item)
                                                                                @if ($key <= 12)
                                                                                    <tr>
                                                                                        <td>{{ ++$key }}
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            <a
                                                                                                href="{{ route('product.details', $item->slug) }}">
                                                                                                {{ Str::limit($item->name, 80) }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            <small
                                                                                                style="font-size:8px;">USD</small>
                                                                                            <strong>$
                                                                                                {{ number_format($item->price, 2) }}</strong>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <h6 class="text-cnter">No Product
                                                                                    Available</h6>
                                                                            </tr>
                                                                        @endif

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @endif --}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->
    <!---======= Category Tab ======--->
    @if (!empty($hardware_info))
        <section>
            <div class="container mt-3 mb-5 video_row">
                <div class="py-3 software_feature_title py-lg-5">
                    <h1 class="text-center ">{{ $hardware_info->row_four_title }}</h1>
                </div>
                <div class="row d-flex justify-content-start align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <iframe width="100%" height="330"
                            src="{{ $hardware_info->row_four_video_link }}?autoplay=1&mute=1" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="">
                            <h5 class="home_title_heading w-100" style="text-align: start;">
                                {{ $hardware_info->row_four_sub_title }}
                            </h5>
                            <p class="pt-3 home_title_text" style="text-align: justify;">
                                {{ $hardware_info->row_four_short_description }}</p>
                            <div class="pt-3">
                                <a class="btn-color"
                                    href="{{ $hardware_info->row_four_btn_link }}">{{ $hardware_info->row_four_btn_name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!---======= Category Tab ======--->
    <div class="pt-5 section_wp">
        <!--Tab Section-->
        <div class="container mb-5">
            <!-- home title -->
            @if (!empty($hardware_info))
                <div class="nasted_tabbar_title">
                    <div class="software_feature_title">
                        <h1 class="p-3 text-center">{{ $hardware_info->row_two_title }}</h1>
                    </div>
                    <p class="pb-4 mx-auto home_title_text w-75">
                        {!! $hardware_info->row_two_short_description !!}
                    </p>
                </div>
            @endif
            <!-- Tab Area Start -->
            <div class="row">
                <div class="px-0" style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px">
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item">
                            <h1># All Category</h1>
                        </div>
                        @foreach ($categories as $index => $category)
                            <div class="item">
                                <h1>{{ $category->title }}</h1>
                            </div>
                        @endforeach
                    </div>
                    <div id="sync1" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="row gx-4">
                                @foreach ($brands as $brand)
                                    <div class="col-lg-2 col-6">
                                        <div class="mb-4 card rounded-0 brand_img_container">
                                            <div class="card-body image_box">
                                                <div class="brand-images">
                                                    <a href="{{ route('brand.overview', $brand->slug) }}">
                                                        <img src="{{ asset('storage/' . $brand->image) }}"
                                                            class="img-fluid" alt="{{ $brand->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="p-0 m-0 border-0 card-footer">
                                                <div class="brand_btns"
                                                    style="justify-content: center;
                                                      background: #ae0a46;
                                                      color: white;
                                                      font-size: 13px;
                                                      display: flex;">
                                                    <a class="py-2 text-white"
                                                        href="{{ route('brand.overview', $brand->slug) }}">Details
                                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                                    </a>
                                                    <span class="ms-3 me-3" style="background: #ffff;">||</span>
                                                    <a class="py-2 text-white"
                                                        href="{{ route('custom.product', $brand->slug) }}">Shop
                                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="px-4 mt-2 col-lg-12 col-md-12 col-sm-12 text-end" style="color: #ae0a46;">
                                    <a class="text-site" href="{{ route('all.brand') }}">See
                                        More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @foreach ($categories as $index => $category)
                            <div class="item">
                                <div class="row gx-4">
                                    @php
                                        $related_brands = DB::table('brands')
                                            ->join('products', 'brands.id', '=', 'products.brand_id')
                                            ->join('categories', 'products.cat_id', '=', 'categories.id')
                                            ->where('categories.id', '=', $category->id)
                                            ->select('brands.id', 'brands.title', 'brands.image', 'brands.slug')
                                            ->distinct()
                                            ->paginate(12);
                                    @endphp
                                    @foreach ($related_brands as $related_brand)
                                        <div class="col-lg-2 col-6">
                                            <div class="mb-4 card rounded-0 brand_img_container">
                                                <div class="card-body image_box">
                                                    <div class="brand-images">
                                                        <a href="{{ route('brand.overview', $related_brand->slug) }}">
                                                            <img src="{{ asset('storage/' . $related_brand->image) }}"
                                                                class="img-fluid" alt="{{ $related_brand->title }}"> </a>
                                                    </div>
                                                </div>
                                                <div class="p-0 m-0 border-0 card-footer">
                                                    <div class="brand_btns"
                                                        style="justify-content: center;
                                                      background: #ae0a46;
                                                      color: white;
                                                      font-size: 13px;
                                                      display: flex;">
                                                        <a class="py-2 text-white"
                                                            href="{{ route('brand.overview', $related_brand->slug) }}">Details
                                                            <i class="fa-solid fa-chevron-right ms-1"></i>
                                                        </a>
                                                        <span class="ms-3 me-3" style="background: #ffff;">||</span>
                                                        <a class="py-2 text-white"
                                                            href="{{ route('custom.product', $related_brand->slug) }}">Shop
                                                            <i class="fa-solid fa-chevron-right ms-1"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="px-4 mt-2 col-lg-12 col-md-12 col-sm-12 text-end"
                                        style="padding-top: 1rem; color: #ae0a46;">
                                        <a class="text-site" href="{{ route('category.html', $category->slug) }}">See
                                            More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------End -------->
    <section>
        <div class="container">
            <div class="my-5 home_title_heading">
                <div class="software_feature_title">
                    <h1 class="pb-3 text-center">
                        <span>R</span>eal outcomes. Expert insights.
                    </h1>
                </div>
            </div>
            <!-- Client Tab Start -->
            <div class="my-5 row align-items-center">
                <div class="col-lg-8">
                    <div class="blocks-content">
                        <div class="row">
                            <div class="mb-4 col-lg-6 mb-lg-1">
                                @if (!empty($tech_glossy1->title))
                                    <div>
                                        <div class="text-white rounded hover hover-2">
                                            <img src="{{ !empty($tech_glossy1->image) && file_exists(public_path('storage/' . $tech_glossy1->image)) ? asset('storage/' . $tech_glossy1->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="px-5 py-4 hover-2-content">
                                                <p class="mb-0 hover-2-title text-uppercase font-weight-bold">
                                                    <span class="font-weight-light">{{ $tech_glossy1->badge }}</span>
                                                    <br>
                                                    <span class="hover_content_title">
                                                        {{ Str::words($tech_glossy1->title, 7) }}
                                                    </span>
                                                </p>

                                                <p class="mb-0 hover-2-description text-uppercase">
                                                    <a href="{{ route('techglossy.details', $tech_glossy1->id) }}"
                                                        class="text-white">read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($tech_glossy2->title))
                                    <div class="mt-4">
                                        <div class="text-white rounded hover hover-2">
                                            <img src="{{ isset($tech_glossy2->image) && file_exists(public_path('storage/' . $tech_glossy2->image)) ? asset('storage/' . $tech_glossy2->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="px-5 py-4 hover-2-content">
                                                <p class="mb-0 hover-2-title text-uppercase font-weight-bold"> <span
                                                        class="font-weight-light">{{ $tech_glossy2->badge }} </span> <br>
                                                    <span class="hover_content_title">
                                                        {{ Str::words($tech_glossy2->title, 7) }}
                                                    </span>
                                                </p>

                                                <p class="mb-0 hover-2-description text-uppercase">
                                                    <a href="{{ route('techglossy.details', $tech_glossy2->id) }}"
                                                        class="text-white">read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if (!empty($tech_glossy3->title))
                                <div class="mb-4 col-lg-6 mb-lg-1">
                                    <div class="text-white rounded hover-4 hover-second">
                                        <img class="img-fluid"
                                            src="{{ isset($tech_glossy3->image) && file_exists(public_path('storage/' . $tech_glossy3->image)) ? asset('storage/' . $tech_glossy3->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                            alt="">
                                        <div class="hover-overlay-second"></div>
                                        <div class="px-5 py-4 hover-4-content">
                                            <p class="mb-0 hover-4-title text-uppercase font-weight-bold">
                                                <span class="font-weight-light">{{ $tech_glossy3->badge }} </span> <br>
                                                <span class="hover_content_title">
                                                    {{ Str::words($tech_glossy3->title, 7) }}
                                                </span>
                                            </p>
                                            <p class="mb-0 hover-4-description text-uppercase">
                                                <a href="{{ route('techglossy.details', $tech_glossy3->id) }}"
                                                    class="text-white">read more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 blocks-content" style="background-color:#f7f6f5!important;">
                        <h3>
                            <span style="border-top: 3px solid #ae0a46;">Fe</span>atured Content
                        </h3>

                        @if ($blogs)
                            @foreach ($blogs as $blog)
                                <div class="pt-2 pb-3">
                                    <a href="{{ route('blog.details', $blog->id) }}">
                                        <h6 class="pb-2 mb-0 block_blog_badge">{{ $blog->badge }}</h6>
                                        <p class="mb-0">{{ Str::words($blog->title, 8) }}</p>
                                    </a>
                                </div>
                                <hr class="mx-0 my-1">
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <!-- Client Tab End -->
    </section>
    <!--=====// Bootom Blogs section //=====-->
    @if (count($tech_datas) > 0)
        <div class="section_wp2">
            <div class="container">
                @if (!empty($hardware_info->row_seven_title))
                    <div class="solution_number_wrapper">
                        <!-- title -->
                        @php
                            $sentence2 = $hardware_info->row_seven_title;
                        @endphp
                        <h5 class="home_title_heading" style="text-align: left;">
                            <div class="software_feature_title">
                                <h1 class="pb-3 text-center">
                                    <span>{{ Str::substr($sentence2, 0, 2) }}</span>{{ Str::substr($sentence2, 2) }}
                                </h1>
                            </div>
                        </h5>
                    </div>
                @endif
                <!-- tech wrapper -->
                <div class="row">
                    <!-- item -->
                    @foreach ($tech_datas as $item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="tech_solution_item">
                                <p class="tech_solution_title">{{ $item->header }}</p>
                                <p class="tech_solution_text">{{ $item->short_description }}</p>
                                <p class="tech_solution_award">{{ $item->footer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <section>
        <div class="container p-0">
            <div class="px-0 mt-5 Container">
                <h3 class="Head main_color">Recent Products </h3>
                <!-- Carousel Container -->
                <div class="SlickCarousel">
                    @if ($products)
                        @foreach ($products as $item)
                            <!-- Item -->
                            <div class="mt-3 mb-3 ProductBlock">
                                <div class="Content">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="custom-product-grid">
                                                <div class="custom-product-image">
                                                    <a href="{{ route('product.details', $item->slug) }}"
                                                        class="image">
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
                                                            <a href=""
                                                                class="d-flex justify-content-center align-items-center"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}">
                                                                <button class="btn-color popular_product-button">
                                                                    Ask For Price
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'rfq')
                                                        <div>
                                                            <div class="py-3 price">
                                                                {{-- <small class="price-usd">USD</small>
                                                            --.-- $ --}}
                                                            </div>
                                                            <a href=""
                                                                class="d-flex justify-content-center align-items-center"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}">
                                                                <button class="btn-color popular_product-button">
                                                                    Ask For Price
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'offer_price')
                                                        <div>
                                                            <div class="py-3 price">
                                                                <small class="price-usd">USD</small>
                                                                $ {{ number_format($item->price, 2) }}
                                                            </div>
                                                            <a href=""
                                                                class="d-flex justify-content-center align-items-center"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#rfq{{ $item->id }}">
                                                                <button class="btn-color" data-bs-toggle="modal"
                                                                    data-bs-target="#askProductPrice">
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
                        @endforeach
                    @endif
                </div>
                <!-- Carousel Container -->
                @include('frontend.pages.home.rfq_modal')
            </div>
        </div>
    </section>
    <!--=====// We serve //=====-->
    <section>
        <div class="container pb-5">
            <!-- section title -->
            <div class="clint_help_section_heading_wrapper">
                <!-- title -->
                <div class="home_title_heading" style="text-align: left;">
                    <h5 class="home_title_heading" style="text-align: left;">
                        <div class="software_feature_title">
                            <h1 class="pt-4 pb-4 text-center">
                                Industries We Serve
                            </h1>
                        </div>
                    </h5>
                    @if (!empty($learnmore->industry_header))
                        <p class="home_title_text">
                            <span class="font-weight-bold">{{ $learnmore->industry_header }} </span>
                        </p>
                    @endif
                </div>
                <!-- section content wrapper -->
                <div class="mb-4 row">
                    <!-- content -->
                    <div class="col-lg-9 col-sm-12">
                        <!-- we_serveItem_wrapper -->
                        <div class="row gx-2">
                            <!-- item -->
                            @if (!empty($industrys))
                                @foreach ($industrys as $item)
                                    <div class="mb-2 col-lg-3 col-sm-6">
                                        <a href="{{ route('industry.details', $item->slug) }}" class="we_serve_item">
                                            <div class="we_serve_item_image">
                                                <img src="{{ asset('storage/' . $item->logo) }}" alt="">
                                            </div>
                                            <div class="we_serve_item_text">{{ $item->title }}</div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-lg-3 col-sm-12">
                        <div class="we_serve_title">
                            <p class="fw-bold top-line-title"><span style="border-top: 4px solid #ae0a46;">Exp</span>lore
                            </p>
                        </div>
                        <!-- sidebar list -->
                        <div>
                            @if ($random_industries)
                                @foreach ($random_industries as $item)
                                    <div class="pt-2">
                                        <a href="{{ route('industry.details', $item->slug) }}">
                                            <div id="fed-bg">
                                                <div class="p-2">
                                                    <h5 class="text-white brand_side_text">{{ $item->title }} ›
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.productDT0').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2],
                }, ],
            });
            $('.productDT4').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2],
                }, ],
            });
            $('.productDT3').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2],
                }, ],
            });
            $('.productDT2').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2],
                }, ],
            });
        });
    </script>
@endsection
