@extends('frontend.master')
@section('styles')
    <meta property="og:title" content="{{ ucfirst($brand->title) }} products in NGen IT">
    <meta property="og:image"
        content="{{ !empty($brand->image) && file_exists(public_path('storage/' . $brand->image)) ? url('social-image/' . $brand->image) : asset('frontend/images/no-banner(1920-330).png') }}" />
    <meta name="twitter:image"
        content="{{ !empty($brand->image) && file_exists(public_path('storage/' . $brand->image)) ? url('social-image/' . $brand->image) : asset('frontend/images/no-banner(1920-330).png') }}">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "headline": "{{ ucfirst($brand->title) }} in NGen IT",
          "description": "NGEN IT Ltd. is a System Integration, Software & Hardware based License Provider & Software development based company established in 2008.",
          "image": "{{ !empty($brand->banner_image) && file_exists(public_path('storage/' . $brand->banner_image)) ? url('social-image/' . $brand->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}",
          "author": {
            "@type": "Organization",
            "name": "{{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT Ltd.' }}"
          },
          "publisher": {
            "@type": "Organization",
            "name": "{{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT Ltd.' }}",
            "logo": {
              "@type": "ImageObject",
              "url": "{{ !empty($setting->favicon) ? asset('storage/' . $setting->favicon) : url('upload/no_image.jpg') }}"
            }
          },
          "datePublished": "{{ date('d-M-Y') }}"
        }
    </script>
@endsection
@section('content')
    {{-- <section>
        <div class="brand-page-banner page_top_banner">
            <img src="{{ !empty($brand->banner_image) && file_exists(public_path('storage/' . $brand->banner_image)) ? asset('storage/' . $brand->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}"
                alt="">
        </div>

    </section> --}}
    <section class="header d-lg-block d-sm-none" id="myHeader">
        <div class="brand-page-header-container container">
            <div class="row d-lg-flex align-items-center">
                <div class="col-lg-2 col-sm-6 me-3 extra-d-flex">
                    <div>
                        <img id="stand-logo" class="img-fluid" height=""
                            src="{{ !empty($brand->image) && file_exists(public_path('storage/' . $brand->image)) ? asset('storage/' . $brand->image) : asset('frontend/images/no-banner(1920-330).png') }}"
                            alt="{{ $brand->title }} - logo">
                    </div>
                </div>
                <div class="col-lg-1 col-sm-6 extra-d-flex">

                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <?php
                        if (isset($href) && !empty($href)) {
                            echo '<img class="img-fluid custom-video-icon" src="' . asset('frontend/images/video-icon.png') . '" alt="">';
                        } else {
                            echo '<img class="img-fluid custom-video-icon" src="' . asset('frontend/images/no-video-icon.png') . '" alt="">';
                        }
                        ?>
                    </a>

                </div>
                <div class="col-lg-8 col-sm-12">
                    <ul class="d-lg-flex justify-content-start stand-header-nav mb-0 d-lg-block d-sm-none">
                        <li class="px-3">
                            <span>Overview</span>
                        </li>
                        <li class="px-3">
                            <a class="p-2 active-brands"
                                href="{{ route('brand.products', $brand->slug) }}">Products</a>
                        </li>


                        <li class="px-3 disable-brands">
                            <span>Catalogs</span>
                        </li>

                        <li class="px-3 disable-brands">
                            <span>Tech Contents</span>
                        </li>

                        <li class="px-3 disable-brands border-0">
                            <span>Solution</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="header d-lg-none d-sm-block" id="mobileHeader">
        <div class="mobile-brand-page-header-container container">
            <div class="row d-lg-flex align-items-center">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <img id="stand-logo" class="img-fluid" height=""
                                src="{{ !empty($brand->image) && file_exists(public_path('storage/' . $brand->image)) ? asset('storage/' . $brand->image) : asset('frontend/images/no-banner(1920-330).png') }}"
                                alt="{{ $brand->title }} - logo">
                        </div>
                        <div>
                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <?php
                                if (isset($href) && !empty($href)) {
                                    echo '<img class="img-fluid custom-video-icon" src="' . asset('frontend/images/video-icon.png') . '" alt="">';
                                } else {
                                    echo '<img class="img-fluid custom-video-icon" src="' . asset('frontend/images/no-video-icon.png') . '" alt="">';
                                }
                                ?>
                            </a>

                        </div>
                    </div>
                    <div>
                        <div>
                            <ul class="d-flex align-items-center justify-content-center">
                                <li class="px-1">
                                    <a class="text-muted"
                                        href="{{ route('brand.overview', $brand->slug) }}">Overview</a>
                                </li>
                                <li class="px-1">
                                    <a class="{{ in_array(Route::currentRouteName(), ['brand.products', 'product.details']) ? 'active-brands' : '' }}"
                                        href="{{ route('brand.products', $brand->slug) }}">Products</a>
                                </li>


                                <li class="px-1">
                                    <a class="text-muted"
                                        href="javascript:void(0)">Catalogs</a>
                                </li>

                                <li class="px-1">
                                    <a class="text-muted"
                                        href="javascript:void(0)">Contents</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var isMobile = window.innerWidth <= 768; // Adjust the threshold as needed

            var header, container, sticky;

            if (isMobile) {
                header = document.getElementById("mobileHeader");
                container = document.querySelector(".mobile-brand-page-header-container");
                sticky = header.offsetTop;
            } else {
                header = document.getElementById("myHeader");
                container = document.querySelector(".brand-page-header-container");
                sticky = header.offsetTop;
            }

            window.onscroll = function() {
                handleScroll(header, container, sticky);
            };

            function handleScroll(header, container, sticky) {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                    container.classList.remove("container");
                    container.classList.add("container-fluid");
                } else {
                    header.classList.remove("sticky");
                    container.classList.remove("container-fluid");
                    container.classList.add("container");
                }
            }
        });
    </script>

    <section class="header" id="myHeader">
        <div class="container">
            <div class="px-3 pt-3 pb-3 row">
                <div class="p-0 col-lg-12">
                    <h5 class="mb-2 company-tab-title border-bottom">
                        <span class="text-black bg-white rounded-pill">
                            All <strong class="fw-normal" style="color: #A80B6E;">{{ ucfirst($brand->title) }}</strong>
                            Products
                        </span>
                    </h5>
                    {{-- <h2 class="company-tab-title-products">
                        <span style="font-size: 20px;">All <strong class="fw-normal"
                                style="color: #A80B6E;">{{ ucfirst($brand->title) }}</strong> Products</span>
                    </h2> --}}
                </div>
            </div>
            <div class="allProducts">
                <div class="text-center row" id="spinner" style="display: none; font">
                    <i class="fa fa-spinner fa-spin text-success"></i> Loading...
                </div>
                @include('frontend.pages.kukapages.partial.product_pagination')
            </div>
        </div>
        @foreach ($industries as $industry)
            @if (count($industry->products) > 0)
                <div class="container">
                    <div class="row">
                        <div class="p-0 col-lg-12">
                            <h2 class="company-tab-title-products">
                                <span style="font-size: 20px;">{{ ucfirst($brand->title) }} Products for
                                    {{ ucfirst($industry->title) }} Industry</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($industry->products as $product)
                            <div class="custom-col-5 col-sm-6 col-md-4 brand_prduct">
                                <div class="border-0 card rounded-0" style="box-shadow: var(--custom-shadow)">
                                    <div class="card-body" style="height:23rem;">
                                        {{-- <div class="new-video">
                                        <div class="icon-small video"></div>
                                    </div> --}}
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <div class="image-section">
                                                <img src="{{ file_exists($product->thumbnail) ? asset($product->thumbnail) : asset('upload/no_image.jpg') }}"
                                                    alt="" width="100%" height="180px;">
                                            </div>
                                        </a>

                                        <div class="py-3 text-center content-section">
                                            <a href="{{ route('product.details', $product->slug) }}" class="mb-2">
                                                <p class="pb-0 mb-2 text-muted brand_product_title">
                                                    {{ Str::words($product->name, 15) }}</p>
                                            </a>
                                            <div>
                                                <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                    {{ $product->getCategoryName() }}</span>
                                                <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                    {{ $product->sku_code }}</span>
                                                {{-- <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                {{ $product->product_code }}</span> --}}
                                                @if ($product->price_status == 'price' && !empty($product->price))
                                                    <span style="font-size: 14px"><i class="fa-solid fa-tag ms-2"></i> USD
                                                        {{ $product->price }}</span>
                                                @endif
                                            </div>
                                            {{-- <span style="font-size: 10px"><i class="fa-solid fa-tag"></i> KR 4 AGILUS</span> --}}
                                            @if ($product->rfq == 1)
                                                <div class="d-flex justify-content-center">
                                                    {{-- <button
                                                        class="px-3 py-2 mt-2 text-black bg-transparent border btn-color cart_button_text746 popular_product-button"
                                                        data-bs-toggle="modal" data-bs-target="#rfq{{ $product->id }}">Ask
                                                        For Price</button> --}}
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
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-quantity="1">
                                                        {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                    </button>
                                                </div>
                                            @elseif ($product->price_status && $product->price_status == 'rfq')
                                                <div class="d-flex justify-content-center">
                                                    {{-- <a href="{{ route('rfq') }}"
                                                        class="px-3 py-2 mt-2 text-black bg-transparent border btn-color cart_button_text746 popular_product-button"
                                                        data-bs-toggle="modal" data-bs-target="#rfq{{ $product->id }}">Add to RFQ</a> --}}

                                                    <button
                                                        class="header_cart_button cart_button_text{{ $product->id }} search-btn-price cart_button_text{{ $product->id }}"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-quantity="1">
                                                        {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                    </button>
                                                </div>
                                            @elseif ($product->price_status && $product->price_status == 'offer_price')
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('rfq') }}">
                                                        <button class="btn-color special_btn" {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}" --}}>Your
                                                            Price</button>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center"
                                                    class="cart_button{{ $product->id }}">
                                                    <a href="{{ route('product.details', $product->slug) }}"
                                                        class="btn-color special_btn">Details</a>

                                                    {{-- <button class="btn-color special_btn add_to_cart"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-quantity="1">Add to Cart</button> --}}
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            @endif
        @endforeach
        @foreach ($solutions as $solution)
            @if (count($solution->products) > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="company-tab-title-products">
                                <span style="font-size: 20px;">{{ ucfirst($brand->title) }} Products for
                                    {{ ucfirst($solution->name) }} Industry</span>
                            </h2>
                        </div>
                    </div>
                    <div class="mt-2 row">
                        @foreach ($solution->products as $product)
                            <div class="custom-col-5 col-sm-6 col-md-4 brand_prduct">
                                <div class="border-0 card rounded-0" style="box-shadow: var(--custom-shadow)">
                                    <div class="card-body" style="height:23rem;">
                                        {{-- <div class="new-video">
                                        <div class="icon-small video"></div>
                                    </div> --}}
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <div class="image-section">
                                                <img src="{{ file_exists($product->thumbnail) ? asset($product->thumbnail) : asset('upload/no_image.jpg') }}"
                                                    alt="" width="100%" height="180px;">
                                            </div>
                                        </a>

                                        <div class="py-3 text-center content-section">
                                            <a href="{{ route('product.details', $product->slug) }}" class="mb-2">
                                                <p class="pb-0 mb-0 mb-2 text-muted brand_product_title">
                                                    {{ Str::words($product->name, 15) }}</p>
                                            </a>
                                            <div>
                                                <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                    {{ $product->getCategoryName() }}</span>
                                                <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                    {{ $product->sku_code }}</span>
                                                {{-- <span class="brandpage_product_span"><i class="fa-solid fa-tag"></i>
                                                {{ $product->product_code }}</span> --}}
                                                @if ($product->price_status == 'price' && !empty($product->price))
                                                    <span style="font-size: 14px"><i class="fa-solid fa-tag ms-2"></i> USD
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
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-quantity="1">
                                                        {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                    </button>
                                                </div>
                                            @elseif ($product->price_status && $product->price_status == 'rfq')
                                                <div class="d-flex justify-content-center">
                                                    {{-- <button
                                                        class="px-3 py-2 mt-2 text-black bg-transparent border btn-color cart_button_text746 popular_product-button"
                                                        data-bs-toggle="modal" data-bs-target="#rfq{{ $product->id }}">Ask
                                                        For Price</button> --}}
                                                    <button
                                                        class="header_cart_button cart_button_text{{ $product->id }} search-btn-price cart_button_text{{ $product->id }}"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-quantity="1">
                                                        {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                    </button>
                                                </div>
                                            @elseif ($product->price_status && $product->price_status == 'offer_price')
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('rfq') }}">
                                                        <button class="btn-color special_btn" {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $product->id }}" --}}>Your
                                                            Price</button>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center"
                                                    class="cart_button{{ $product->id }}">
                                                    <a href="{{ route('product.details', $product->slug) }}"
                                                        class="btn-color special_btn">Details</a>

                                                    {{-- <button class="btn-color special_btn add_to_cart"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-quantity="1">Add to Cart</button> --}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </section>

    <section>
        <div class="container related_search_card">
            <div class="row">
                <div class="col">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="company-tab-title-products">
                                    <span style="font-size: 20px; background-color: #eeeeee;">Related Searches</span>
                                </h2>
                            </div>
                        </div>
                        <div class="container">
                            <div class="py-3 row">
                                @foreach ($related_search['categories'] as $related_category)
                                    <div class="p-0 col-sm-3 col-6">
                                        <a href="{{ route('category.details', $related_category->slug) }}"
                                            class="related_search_links"><i
                                                class="fa-solid fa-angles-right text-danger"></i>
                                            {{ $related_category->title }} </a>
                                    </div>
                                @endforeach
                                @foreach ($related_search['brands'] as $related_brand)
                                    <div class="p-0 col-sm-3 col-6">
                                        <a href="{{ route('brand.overview', $related_brand->slug) }}"
                                            class="related_search_links"><i
                                                class="fa-solid fa-angles-right text-danger"></i>
                                            {{ $related_brand->title }} </a>
                                    </div>
                                @endforeach
                                @foreach ($related_search['solutions'] as $related_solution)
                                    @if (!empty($related_solution->slug))
                                        <div class="p-0 col-sm-3 col-6">
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
                                        <div class="p-0 col-sm-3 col-6">
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
    @include('frontend.pages.home.rfq_modal')
    <!---------End -------->
@endsection
@section('scripts')
    {{-- <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                event.preventDefault();

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];

                getData(page);
            });
        });

        function getData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html",
                })
                .done(function(data) {
                    $(".allProducts").empty().html(data);
                    location.hash = page;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                })
            }
    </script> --}}
    <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];

                showSpinner(); // Show the spinner while loading

                getData(page);
            });
        });

        function showSpinner() {
            $('#spinner').show();
        }

        function hideSpinner() {
            $('#spinner').hide();
        }

        function getData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html",
                })
                .done(function(data) {
                    $(".allProducts").empty().html(data);
                    location.hash = page;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                })
                .always(function() {
                    hideSpinner(); // Hide the spinner after loading
                });
        }
    </script>
    <script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Find the element with the class 'fixed-section'
            var elementToRemoveClassFrom = document.querySelector('.fixed-section');

            // Check if the element is found before attempting to remove the class
            if (elementToRemoveClassFrom) {
                // Remove the class 'fixed-section'
                elementToRemoveClassFrom.classList.remove('fixed-section');
            }
        });
    </script>
@endsection
