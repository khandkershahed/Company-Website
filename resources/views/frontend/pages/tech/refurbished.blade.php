@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner"
                src="https://absolute.com.np/wp-content/uploads/2022/04/laptops-banner-english-text.jpg"
                alt="NGEN IT Software">
        </div>
    </section>
    <!----------End--------->
    <section>
        <div class="container">
            <h3 class="py-5 mb-0 text-center"><span style="border-top: 4px solid #ae0a46;">Ref</span>urbished Categor<span
                    style="border-bottom: 4px solid #ae0a46;">ies</span></h3>
            <div class="pt-2 row">
                <div class="px-0 col-lg-12">
                    <ul class="px-0 nav nav-tabs refurbished_tabs d-flex justify-content-center" id="myTab" role="tablist">
                        @foreach ($categories as $category)
                        <li class="mb-2 shadow-sm nav-item me-2" role="presentation">
                            <button class="nav-link d-flex justify-content-between align-items-center" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <img class="refurbished_tabs-img"
                                    src="{{ isset($category->image) && file_exists(public_path('storage/' . $category->image)) ? asset('storage/' . $category->image) : asset('frontend/images/random-no-img.png') }}"
                                    alt=""> <span class="ps-2">{{$category->title}}</span>
                            </button>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="p-0 pt-4 border-0 shadow-none card">
                                <h4 class="mb-0 text-center">
                                    Releted Brands
                                </h4>
                                <div class="p-0 mt-2 card-body">
                                    <!-- Nav tabs -->
                                    <ul class="px-0 pt-5 nav nav-tabs nested-brand-link" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="shadow-sm nav-link nested-nav-link" id="nested-brand-all-tab"
                                                data-bs-toggle="tab" data-bs-target="#nested-brand-all" type="button"
                                                role="tab" aria-controls="nested-brand-all" aria-selected="true">
                                                <div class="p-0 border-0 shadow-none card">
                                                    <div class="p-0 card-body nested-refurbished-brand">
                                                        <img src="https://www.signalitsolutions.com/wp-content/uploads/2021/07/acronis-bw.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="shadow-sm nav-link nested-nav-link" id="nested-brand-one-tab"
                                                data-bs-toggle="tab" data-bs-target="#nested-brand-one" type="button"
                                                role="tab" aria-controls="nested-brand-one" aria-selected="false">
                                                <div class="p-0 border-0 shadow-none card">
                                                    <div class="p-0 card-body nested-refurbished-brand">
                                                        <img src="https://static.vecteezy.com/system/resources/previews/022/897/304/original/bdm-letter-logo-design-in-illustration-logo-calligraphy-designs-for-logo-poster-invitation-etc-vector.jpg"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="shadow-sm nav-link nested-nav-link" id="nested-brand-one-tab"
                                                data-bs-toggle="tab" data-bs-target="#nested-brand-one" type="button"
                                                role="tab" aria-controls="nested-brand-one" aria-selected="false">
                                                <div class="p-0 border-0 shadow-none card">
                                                    <div class="p-0 card-body nested-refurbished-brand">
                                                        <img src="https://logos-world.net/wp-content/uploads/2021/02/Honeywell-Logo.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </button>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="mt-4 mb-1 tab-content">
                                        <div class="tab-pane" id="nested-brand-all" role="tabpanel"
                                            aria-labelledby="nested-brand-all-tab">
                                            <p>Acronis Brands Products <i class="fa-solid fa-arrow-right-long"></i></p>
                                            <div class="p-0 border-0 shadow-none card">
                                                <div class="card-body row">
                                                    <div class="col-md-3 col-sm-12 ps-0">
                                                        <div class="custom-product-grid">
                                                            <div class="custom-product-image">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    class="image" tabindex="0">
                                                                    <img class=""
                                                                    style="object-fit: contain"
                                                                        src="https://computermania-bd.b-cdn.net/wp-content/uploads/microsoft.jpg"
                                                                        alt="NGEN IT">
                                                                </a>
                                                                <ul class="custom-product-links">
                                                                    <li>
                                                                        <a href="#" tabindex="0">
                                                                            <i class="text-white fa fa-random"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#productDetails669"
                                                                            tabindex="0">
                                                                            <i class="text-white fa fa-search"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="custom-product-content">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    tabindex="0">
                                                                    <h3 class="custom-title">
                                                                        Foxit PDF Editor (v. 12) -
                                                                        subscription license (1 year)...
                                                                    </h3>
                                                                </a>
                                                                <div>
                                                                    <a href="{{ route('rfq') }}"
                                                                        class="d-flex justify-content-center align-items-center"
                                                                        {{-- data-bs-toggle="modal" data-bs-target="#rfq669"
                                                                        tabindex="0" --}}
                                                                        >
                                                                        <button class="btn-color popular_product-button"
                                                                            {{-- tabindex="0" --}}
                                                                            >
                                                                            Ask For Price
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="custom-product-grid">
                                                            <div class="custom-product-image">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    class="image" tabindex="0">
                                                                    <img class=""
                                                                    style="object-fit: contain"
                                                                        src="https://computermania-bd.b-cdn.net/wp-content/uploads/microsoft.jpg"
                                                                        alt="NGEN IT">
                                                                </a>
                                                                <ul class="custom-product-links">
                                                                    <li>
                                                                        <a href="#" tabindex="0">
                                                                            <i class="text-white fa fa-random"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#productDetails669"
                                                                            tabindex="0">
                                                                            <i class="text-white fa fa-search"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="custom-product-content">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    tabindex="0">
                                                                    <h3 class="custom-title">
                                                                        Foxit PDF Editor (v. 12) -
                                                                        subscription license (1 year)...
                                                                    </h3>
                                                                </a>
                                                                <div>
                                                                    <a href="{{ route('rfq') }}"
                                                                        class="d-flex justify-content-center align-items-center"
                                                                        {{-- data-bs-toggle="modal" data-bs-target="#rfq669"
                                                                        tabindex="0" --}}
                                                                        >
                                                                        <button class="btn-color popular_product-button"
                                                                            {{-- tabindex="0" --}}
                                                                            >
                                                                            Ask For Price
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="custom-product-grid">
                                                            <div class="custom-product-image">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    class="image" tabindex="0">
                                                                    <img class=""
                                                                    style="object-fit: contain"
                                                                        src="https://computermania-bd.b-cdn.net/wp-content/uploads/microsoft.jpg"
                                                                        alt="NGEN IT">
                                                                </a>
                                                                <ul class="custom-product-links">
                                                                    <li>
                                                                        <a href="#" tabindex="0">
                                                                            <i class="text-white fa fa-random"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#productDetails669"
                                                                            tabindex="0">
                                                                            <i class="text-white fa fa-search"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="custom-product-content">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    tabindex="0">
                                                                    <h3 class="custom-title">
                                                                        Foxit PDF Editor (v. 12) -
                                                                        subscription license (1 year)...
                                                                    </h3>
                                                                </a>
                                                                <div>
                                                                    <a href="{{ route('rfq') }}"
                                                                        class="d-flex justify-content-center align-items-center"
                                                                        {{-- data-bs-toggle="modal" data-bs-target="#rfq669"
                                                                        tabindex="0" --}}
                                                                        >
                                                                        <button class="btn-color popular_product-button"
                                                                            {{-- tabindex="0" --}}
                                                                            >
                                                                            Ask For Price
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 pe-0">
                                                        <div class="custom-product-grid">
                                                            <div class="custom-product-image">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    class="image" tabindex="0">
                                                                    <img class=""
                                                                    style="object-fit: contain"
                                                                        src="https://computermania-bd.b-cdn.net/wp-content/uploads/microsoft.jpg"
                                                                        alt="NGEN IT">
                                                                </a>
                                                                <ul class="custom-product-links">
                                                                    <li>
                                                                        <a href="#" tabindex="0">
                                                                            <i class="text-white fa fa-random"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#productDetails669"
                                                                            tabindex="0">
                                                                            <i class="text-white fa fa-search"
                                                                                aria-hidden="true">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="custom-product-content">
                                                                <a href="http://127.0.0.1:8000/single/product/foxit-pdf-editor-v-12-subscription-license-1-year-1-license"
                                                                    tabindex="0">
                                                                    <h3 class="custom-title">
                                                                        Foxit PDF Editor (v. 12) -
                                                                        subscription license (1 year)...
                                                                    </h3>
                                                                </a>
                                                                <div>
                                                                    <a href="{{ route('rfq') }}"
                                                                        class="d-flex justify-content-center align-items-center"
                                                                        {{-- data-bs-toggle="modal" data-bs-target="#rfq669"
                                                                        tabindex="0" --}}
                                                                        >
                                                                        <button class="btn-color popular_product-button"
                                                                            {{-- tabindex="0" --}}
                                                                            >
                                                                            Ask For Price
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="nested-brand-one" role="tabpanel"
                                            aria-labelledby="nested-brand-one-tab">
                                            nested-brand-one
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Profile
                        </div>
                        <div class="tab-pane fade" id="category-one" role="tabpanel" aria-labelledby="category-one">One
                        </div>
                        <div class="tab-pane fade" id="category-two" role="tabpanel" aria-labelledby="category-two">Two
                        </div>
                        <div class="tab-pane fade" id="category-three" role="tabpanel" aria-labelledby="category-three">
                            Three</div>
                        <div class="tab-pane fade" id="category-four" role="tabpanel" aria-labelledby="category-four">
                            Four</div>
                        <div class="tab-pane fade" id="category-five" role="tabpanel" aria-labelledby="category-five">
                            Five</div>
                        <div class="tab-pane fade" id="category-six" role="tabpanel" aria-labelledby="category-six">Six
                        </div>
                        <div class="tab-pane fade" id="category-seven" role="tabpanel" aria-labelledby="category-seven">
                            Seven</div>
                        <div class="tab-pane fade" id="category-eight" role="tabpanel" aria-labelledby="category-eight">
                            Eight</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=======// Popular products //======-->
    <section>
        <div class="container p-0 my-4 mt-5">
            <div class="row gx-2">
                <div class="px-0 mb-2">
                    <h4 class="mb-0 text-start main_color" style="border-bottom: 1px solid #ae0a46;">Refurbished Products
                    </h4>
                </div>
                <div class="col-md-3 col-sm-12 ps-0">
                    <div class="custom-product-grid">
                        <div class="custom-product-image">
                            <a href="" class="image">
                                {{-- <img class="pic-1" src="{{ asset($item->thumbnail) }}"> --}}
                                <img class="img-fluid"
                                    src="https://www.signalitsolutions.com/wp-content/uploads/2021/07/acronis-bw.png"
                                    alt="NGEN IT">
                            </a>
                            <ul class="custom-product-links">
                                <li><a href="#"><i class="text-white fa fa-random"></i></a>
                                </li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#productDetails"><i
                                            class="text-white fa fa-search"></i></a></li>
                            </ul>
                        </div>
                        <div class="custom-product-content">
                            <a href="">
                                <h3 class="custom-title"> Foxit PDF Editor (V. 12) - Subscription License
                                    (1 Year)}</h3>
                            </a>
                            <div>
                                <div class="py-3 price">
                                    {{-- <small class="price-usd">USD</small>
                                            --.-- $ --}}
                                </div>
                                <a href="{{ route('rfq') }}" class="d-flex justify-content-center align-items-center"
                                    {{-- data-bs-toggle="modal" data-bs-target="#rfq" --}}
                                    >
                                    <button class="btn-color popular_product-button">
                                        Ask For Price
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="custom-product-grid">
                        <div class="custom-product-image">
                            <a href="" class="image">
                                {{-- <img class="pic-1" src="{{ asset($item->thumbnail) }}"> --}}
                                <img class="img-fluid"
                                    src="https://www.signalitsolutions.com/wp-content/uploads/2021/07/acronis-bw.png"
                                    alt="NGEN IT">
                            </a>
                            <ul class="custom-product-links">
                                <li><a href="#"><i class="text-white fa fa-random"></i></a>
                                </li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#productDetails"><i
                                            class="text-white fa fa-search"></i></a></li>
                            </ul>
                        </div>
                        <div class="custom-product-content">
                            <a href="">
                                <h3 class="custom-title"> Foxit PDF Editor (V. 12) - Subscription License
                                    (1 Year)}</h3>
                            </a>
                            <div>
                                <div class="py-3 price">
                                    {{-- <small class="price-usd">USD</small>
                                            --.-- $ --}}
                                </div>
                                <a href="{{ route('rfq') }}" class="d-flex justify-content-center align-items-center"
                                    {{-- data-bs-toggle="modal" data-bs-target="#rfq" --}}
                                    >
                                    <button class="btn-color popular_product-button">
                                        Ask For Price
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="custom-product-grid">
                        <div class="custom-product-image">
                            <a href="" class="image">
                                {{-- <img class="pic-1" src="{{ asset($item->thumbnail) }}"> --}}
                                <img class="img-fluid"
                                    src="https://www.signalitsolutions.com/wp-content/uploads/2021/07/acronis-bw.png"
                                    alt="NGEN IT">
                            </a>
                            <ul class="custom-product-links">
                                <li><a href="#"><i class="text-white fa fa-random"></i></a>
                                </li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#productDetails"><i
                                            class="text-white fa fa-search"></i></a></li>
                            </ul>
                        </div>
                        <div class="custom-product-content">
                            <a href="">
                                <h3 class="custom-title"> Foxit PDF Editor (V. 12) - Subscription License
                                    (1 Year)}</h3>
                            </a>
                            <div>
                                <div class="py-3 price">
                                    {{-- <small class="price-usd">USD</small>
                                            --.-- $ --}}
                                </div>
                                <a href="{{ route('rfq') }}" class="d-flex justify-content-center align-items-center"
                                    {{-- data-bs-toggle="modal" data-bs-target="#rfq" --}}
                                    >
                                    <button class="btn-color popular_product-button">
                                        Ask For Price
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 pe-0">
                    <div class="custom-product-grid">
                        <div class="custom-product-image">
                            <a href="" class="image">
                                {{-- <img class="pic-1" src="{{ asset($item->thumbnail) }}"> --}}
                                <img class="img-fluid"
                                    src="https://www.signalitsolutions.com/wp-content/uploads/2021/07/acronis-bw.png"
                                    alt="NGEN IT">
                            </a>
                            <ul class="custom-product-links">
                                <li><a href="#"><i class="text-white fa fa-random"></i></a>
                                </li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#productDetails"><i
                                            class="text-white fa fa-search"></i></a></li>
                            </ul>
                        </div>
                        <div class="custom-product-content">
                            <a href="">
                                <h3 class="custom-title"> Foxit PDF Editor (V. 12) - Subscription License
                                    (1 Year)}</h3>
                            </a>
                            <div>
                                <div class="py-3 price">
                                    {{-- <small class="price-usd">USD</small>
                                            --.-- $ --}}
                                </div>
                                <a href="{{ route('rfq') }}" class="d-flex justify-content-center align-items-center"
                                    {{-- data-bs-toggle="modal" data-bs-target="#rfq" --}}
                                    >
                                    <button class="btn-color popular_product-button">
                                        Ask For Price
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->
@endsection
