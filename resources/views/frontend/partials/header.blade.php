<section class="main_header_area">
    <div class="fixed-section header">
        {{-- Top Bar Area --}}
        <div class="p-0 container-fluid top-bar">
            <div class="row gx-0 top-bar-bg">
                <div class="col-lg-8 top-bar-curve-area d-lg-block d-sm-none">
                </div>
                <div class="col-lg-4 top-bar-right-side" style="z-index: 999;">
                    <div class="d-flex justify-content-between align-items-center top-menu-area">
                        <div class="">
                            <div class="dropdown drop-top">
                                <a href="javascript:void(0)" class="text-white dropdown-toggle top-info-text"
                                    type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="fa-solid fa-phone-volume me-1" style="transform: rotate(7deg);"></i>
                                    SUPPORT <span class="number-font header_top_phone">|
                                        {{ $setting->phone_one }}</span>
                                </a>
                                <div class="dropdown-menu drop-down-menus2" aria-labelledby="dropdownMenuButton">
                                    <div class="popover__content text-start">

                                        <hr class="text-muted" />
                                        <div class="d-flex flex-column align-items-center">
                                            <a href="https://wa.me/{{ $setting->whatsapp_number }}"
                                                class="py-2 mx-auto mb-2 btn-color top-info-text w-100"
                                                style="font-size: 13px">
                                                <i class="fa-brands fa-whatsapp"></i> <span>Whats App</span>
                                            </a>
                                            <a href="skype:<ngenit>?chat"
                                                class="py-2 mx-auto btn-color top-info-text w-100"
                                                style="font-size: 13px">
                                                <i class="fa-brands fa-skype"></i> <span>Skype</span>
                                            </a>
                                        </div>
                                        <hr class="text-muted" />
                                        <div class="text-center">
                                            <small class="main_color">Hotline:</small> <br>
                                            <small><a
                                                    href="https://wa.me/{{ $setting->whatsapp_number }}">{{ $setting->whatsapp_number }}</a></small>
                                            <small><a
                                                    href="mailto:{{ $setting->sales_email }}">{{ $setting->sales_email }}</a></small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center ">
                            <div class="d-lg-block d-sm-none">
                                <a href="{{ route('rfq') }}" class="text-white top-info-text pe-3"><i
                                        class="fa-regular fa-circle-question me-1"></i> RFQ</a>
                            </div>
                            <div>
                                {{-- <span class="text-white">My</span><span class="text-white">NGen It</span> --}}
                                <div class="dropdown drop-top">
                                    <a href="javascript:void(0)" class="text-white dropdown-toggle top-info-text"
                                        type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-expanded="false">
                                        <i class="fa-regular fa-star" style="font-size: 14px"></i>
                                        <span class="">
                                            @if (Auth::guard('client')->user())
                                                {{ Auth::guard('client')->user()->name }}
                                            @else
                                                MY NGEN IT
                                            @endif
                                        </span>
                                    </a>
                                    <div class="dropdown-menu drop-down-menus" aria-labelledby="dropdownMenuButton">
                                        <div class="popover__content-2 text-start">

                                            @if (Auth::guard('client')->user())
                                                <li>
                                                    <i class="m-2 fa fa-user"></i>
                                                    <a href="{{ route('client.dashboard') }}" class="">My
                                                        Profile</a>
                                                </li>
                                                <li>
                                                    <i class="m-2 fa fa-envelope"></i>
                                                    <a href="{{ route('client.orders') }}" class="">My Orders</a>
                                                </li>
                                                <li>
                                                    <i class="m-2 fa fa-star"></i>
                                                    <a href="{{ route('client.rfq') }}" class="">My
                                                        RFQs/Deals</a>
                                                </li>
                                                <li>
                                                    <i class="m-2 fa fa-list"></i>
                                                    <a href="javascript:void(0)" class="">My Requests</a>
                                                </li>
                                                <li>
                                                    <i class="m-2 fa-solid fa-right-from-bracket"></i>
                                                    <a href="{{ route('client.logout') }}" class="">Log Out</a>
                                                </li>
                                                <hr class="text-muted" />
                                            @else
                                                <a href="{{ route('client.login') }}"
                                                    class="py-2 mx-auto btn-color top-info-text w-100"
                                                    style="font-size: 13px">
                                                    Sign In
                                                </a>

                                                <hr class="text-muted" />
                                            @endif
                                            <ul class="p-0 account text-muted text-start">

                                                @if (Auth::guard('client')->user())
                                                    @if (Auth::guard('client')->user()->user_type == 'partner')
                                                        <li class="mb-2">
                                                            Sign In To Your
                                                            <a href="{{ route('client.login') }}" target="_blank"
                                                                class="main_color">Client Account</a>
                                                        </li>
                                                    @endif
                                                    @if (Auth::guard('client')->user()->user_type == 'client')
                                                        <li>
                                                            Sign In To Your
                                                            <a href="{{ route('partner.login') }}" target="_blank"
                                                                class="main_color">Partner
                                                                Account</a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li class="mb-2">
                                                        Sign In To Your
                                                        <a href="{{ route('client.login') }}" target="_blank"
                                                            class="main_color">Client Account</a>
                                                    </li>
                                                    <li>
                                                        Sign In To Your
                                                        <a href="{{ route('partner.login') }}" target="_blank"
                                                            class="main_color">Partner
                                                            Account</a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Menu And Logo Area --}}
        <div>
            <nav class="p-2 bg-white navbar navbar-expand-lg main-navbar menu-section">
                <div class="container-fluid d-flex align-items-center" style="height: 3.5rem">
                    <div class="step-img d-lg-block d-sm-none">
                        {{-- <img src="{{ asset('frontend/images/header/download.webp') }}" alt=""> --}}
                    </div>
                    <a class="navbar-brand fw-bold upper-content-menu main-logo" href="{{ route('homepage') }}">
                        <img class="img-fluid site-main-logo"
                            src="{{ !empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)) ? asset('storage/' . $setting->logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                            alt="NGEN IT">
                    </a>
                    <!---Category--->
                    {{-- @if (!empty($header_categories)) --}}
                    <div class="category-mobile">
                        <div class="dropdown position-static header-category-button-60">
                            <a class="tab_btn_icon upper-content-menu" href="#" role="button"
                                id="dropdownMenuLink2" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                aria-expanded="false" style="padding-left: none !important;">
                                <i class="fa-solid fa-bars" style="font-size: 18px !important;"></i>
                            </a>
                            <ul class="dropdown-menu w-100 extra_category bg-none"
                                aria-labelledby="dropdownMenuLink2">
                                <section class="header">
                                    <div class="container-fluid">
                                        <div class="row tab_area_main category-center">
                                            <!-- Assuming $header_categories is already available in your controller or view -->

                                            <div class="p-0 col-md-2 tab_key_btns ">
                                                <div class="nav nav-custom flex-column nav-pills2 nav-pills-custom2"
                                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    @foreach ($header_categories as $key => $header_category)
                                                        <a class="nav-link catregory-side-key {{ $key === 0 ? 'show active' : '' }}"
                                                            id="v-pills-home-tab{{ $header_category->id }}"
                                                            data-bs-toggle="pill"
                                                            href="#v-pills-home{{ $header_category->id }}"
                                                            role="tab"
                                                            aria-controls="v-pills-home{{ $header_category->id }}"
                                                            aria-selected="true">
                                                            <span class="ps-1">-&nbsp;
                                                                {{ $header_category->title }}</span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="p-0 bg-white col-md-10">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    @foreach ($header_categories as $key => $header_category)
                                                        <div class="tab-pane fade rounded-0 p-1 {{ $key === 0 ? 'show active' : '' }}"
                                                            id="v-pills-home{{ $header_category->id }}"
                                                            role="tabpanel"
                                                            aria-labelledby="v-pills-home-tab{{ $header_category->id }}"
                                                            style="height: 22rem;">

                                                            <div class="p-4 row">
                                                                @if ($header_category->subCategorys->isEmpty())
                                                                    <div class="col-12">
                                                                        <p>No data found</p>
                                                                    </div>
                                                                @else
                                                                    @foreach ($header_category->subCategorys as $sub_category)
                                                                        <div class="col-lg-3 col-sm-6">
                                                                            <div class="mb-2 fw-bold nav_title"
                                                                                style="font-size: 17px;">
                                                                                <span
                                                                                    style="border-top: 4px solid #ae0a46;">{{ \Illuminate\Support\Str::substr($sub_category->title, 0, 3) }}</span>{{ \Illuminate\Support\Str::substr($sub_category->title, 3) }}
                                                                            </div>

                                                                            @if ($sub_category->subsubCategorys->isEmpty())
                                                                                <li class="py-2">
                                                                                    <p>No data found</p>
                                                                                </li>
                                                                            @else
                                                                                @foreach ($sub_category->subsubCategorys as $item)
                                                                                    <li class="py-2"
                                                                                        style="line-height: 1 !important;">
                                                                                        <a class="p-0"
                                                                                            href="{{ route('category.details', $item->slug) }}">
                                                                                            <div>
                                                                                                {{ $item->title }}&nbsp;<i
                                                                                                    class="ph ph-caret-right menu_icons"></i>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </ul>
                        </div>
                    </div>
                    {{-- @endif --}}
                    <!---Category--->
                    {{-- <form method="post" action="{{ route('product.search') }}" --}}
                    <div class="d-flex upper-content-menu justify-content-center align-items-center d-lg-none"
                        role="search">
                        {{-- @csrf --}}
                        <div class="input-group flex-nowrap search-input-container">
                            <span class="input-group-text search-box-areas" id="addon-wrapping"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input class="form-control search-input-field search" id="mobile_search_text"
                                name="search" type="search" placeholder="Search From Here..."
                                aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="nvabar-toggler tab_btn_icon upper-content-menu d-lg-none"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#rightOffcanvas"
                        aria-controls="rightOffcanvas">
                        <i class="fa-solid fa-bars main_color" style="font-size: 18px !important;"></i>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{-- <form class="d-flex ms-auto upper-content-menu" method="post"
                            action="{{ route('product.search') }}" role="search">
                            @csrf --}}
                        <div class="d-flex ms-auto upper-content-menu" role="search">

                            <div class="input-group flex-nowrap search-input-container">
                                <span class="input-group-text search-box-areas" id="addon-wrapping"><i
                                        class="fa-solid fa-magnifying-glass"></i></span>
                                <input class="form-control search-input-field search" id="search_text" name="search"
                                    type="search" placeholder="Search for products, solutions & more..."
                                    aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        {{-- </form> --}}
                        <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                            <hr>
                            <li class="nav-item dropdown position-static main-menu-spacing">
                                <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                                    <li class="nav-item dropdown position-static sub-menu-spacing">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">
                                            OUR PRODUCTS
                                        </a>
                                        <ul class="px-0 dropdown-menu full-container-dropdown"
                                            style="border-top: 1px solid #ae0a460f !important;">
                                            <div class="container-fluid">
                                                <div class="bg-white row header-menu-content">
                                                    <div class="col-lg-2 our-service-first-column">
                                                        <p class="pb-3 fw-bold"><span
                                                                style="border-top: 4px solid #ae0a46;">Com</span>mon
                                                            Services
                                                        </p>
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('software.info') }}">
                                                                    <div>Software</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('hardware.info') }}">
                                                                    <div>Hardware</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('training') }}">
                                                                    <div>Training</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('books') }}">
                                                                    <div>Books</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-5 col-lg-5 our-service-second-column">
                                                        {{-- industries-title --}}
                                                        <p class="pb-3 fw-bold">
                                                            <span
                                                                style="border-top: 4px solid #ae0a46;">Ind</span>ustry
                                                            We Serve
                                                        </p>
                                                        <div class="row industries">
                                                            @if (!empty($header_industrys))
                                                                @foreach ($header_industrys as $header_industry)
                                                                    @if ($header_industry->industryPage)
                                                                        <div class="mb-2 col-lg-4">
                                                                            <a class="pb-2 d-flex align-items-center"
                                                                                href="{{ route('industry.details', $header_industry->slug) }}">
                                                                                <div>{{ $header_industry->title }}
                                                                                </div>
                                                                                <div>
                                                                                    <i
                                                                                        class="ph ph-caret-right menu_icons"></i>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="py-5 col-lg-5 our-service-third-column">
                                                        <p class="pb-3 fw-bold">
                                                            <span
                                                                style="border-top: 4px solid #ae0a46;">Sol</span>utions
                                                            We Provide
                                                        </p>
                                                        <div class="row">
                                                            @if (!empty($header_solutions))
                                                                @foreach ($header_solutions as $header_solution)
                                                                    <div class="mb-2 col-lg-12">
                                                                        <a class="pb-2 d-flex align-items-center"
                                                                            href="{{ !empty($header_solution->slug) ? route('solution.details', ['slug' => $header_solution->slug]) : '' }}">
                                                                            <div>{{ $header_solution->name }}</div>
                                                                            <div>
                                                                                <i
                                                                                    class="ph ph-caret-right menu_icons"></i>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="header-bottom-link">
                                                        <div class="px-5 py-3 pt-4 row">
                                                            <div class="col-lg-3 text-start">
                                                                <a href="{{ route('whatwedo') }}"
                                                                    style="border-top: 3px solid #ae0a46;">
                                                                    What We Do <i class="fa-solid fa-arrow-right"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-5 text-start">
                                                                <a class="ms-4" href="{{ route('all.industry') }}"
                                                                    style="border-top: 3px solid #ae0a46;">
                                                                    View All Industry <i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-4 text-start">
                                                                <a class="ms-2" href="{{ route('all.solution') }}"
                                                                    style="border-top: 3px solid #ae0a46;">
                                                                    View All Solutions <i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown position-static sub-menu-spacing">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">
                                            TECH CONTENTS
                                        </a>
                                        <ul class="px-0 dropdown-menu full-container-dropdown"
                                            style="border-top: 1px solid #ae0a460f !important;">
                                            <div class="container-fluid">
                                                <div class="pt-5 pb-5 bg-white row tech-top header-menu-content">
                                                    <p class="mb-2 fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Tre</span>ndy
                                                        Content
                                                    </p>
                                                    @if (!empty($header_features))
                                                        @foreach ($header_features as $header_feature)
                                                            <div class="col-lg-4 col-sm-12">
                                                                <div class="pt-4 d-flex align-items-center">
                                                                    <img src="{{ isset($header_feature->image) && file_exists(public_path('storage/' . $header_feature->image)) ? asset('storage/' . $header_feature->image) : asset('frontend/images/banner-demo.png') }}"
                                                                        alt=""
                                                                        style="width:130px;height:70px;">
                                                                    <div class="ms-3">
                                                                        <a
                                                                            href="{{ route('feature.details', $header_feature->slug) }}">
                                                                            <strong
                                                                                style="font-size:14px;">{{ Str::limit($header_feature->title, 100) }}</strong>
                                                                        </a>
                                                                        <br>
                                                                        <span>{{ $header_feature->badge }} /
                                                                            {{ $header_feature->created_at->format('d-m-Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @if (!empty($header_blog))
                                                        <div class="pt-4 col-lg-4 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ isset($header_blog->image) && file_exists(public_path('storage/' . $header_blog->image)) ? asset('storage/' . $header_blog->image) : asset('frontend/images/banner-demo.png') }}"
                                                                    alt="" style="width:130px;height:70px;">
                                                                <div class="ms-3">
                                                                    <a
                                                                        href="{{ route('blog.details', $header_blog->slug) }}">
                                                                        <strong
                                                                            style="font-size:14px;">{{ Str::limit($header_blog->title, 100) }}</strong>
                                                                    </a>
                                                                    <br>
                                                                    <span>{{ $header_blog->badge }} /
                                                                        {{ $header_blog->created_at->format('d-m-Y') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if (!empty($header_techglossy))
                                                        <div class="pt-4 col-lg-4 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ isset($header_techglossy->image) && file_exists(public_path('storage/' . $header_techglossy->image)) ? asset('storage/' . $header_techglossy->image) : asset('frontend/images/banner-demo.png') }}"
                                                                    alt="" style="width:130px;height:65px;">
                                                                <div class="ms-3">
                                                                    <a
                                                                        href="{{ route('techglossy.details', $header_techglossy->slug) }}">
                                                                        <strong
                                                                            style="font-size:14px;">{{ Str::limit($header_techglossy->title, 100) }}</strong>
                                                                    </a>
                                                                    <br>
                                                                    <span>{{ $header_techglossy->badge }} /
                                                                        {{ $header_techglossy->created_at->format('d-m-Y') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="header-bottom-link">
                                                        <div class="px-5 py-3 pt-4 row">
                                                            <div class="text-center col-lg-6">
                                                                <a href="{{ route('all.blog') }}"
                                                                    style="border-top: 3px solid #ae0a46;">
                                                                    View All Blogs <i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                                </a>
                                                            </div>
                                                            <div class="text-center col-lg-6">
                                                                <a href="{{ route('all.techglossy') }}"
                                                                    style="border-top: 3px solid #ae0a46;">
                                                                    View All Techglossies <i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="px-0 container-fluid">
                                                <div class="px-5 pt-4 pb-3 row">
                                                    <div class="px-5 py-5 row">
                                                        <div class="col-lg-6 text-start">
                                                            <a href="{{ route('all.blog') }}"
                                            style="border-top: 3px solid #ae0a46;">
                                            View All Blogs <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a href="{{ route('all.techglossy') }}"
                            style="border-top: 3px solid #ae0a46;">
                            View All Techglossies <i
                                class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
        </div>
    </div> --}}
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown position-static sub-menu-spacing">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">
                                            SHOP ONLINE
                                        </a>
                                        <ul class="px-0 dropdown-menu full-container-dropdown"
                                            style="border-top: 1px solid #ae0a460f !important;">
                                            <div class="container-fluid">
                                                <div class="px-0 py-0 bg-white row tech-top">
                                                    <div class="py-5 col-lg-2 our-service-first-column">
                                                        <p class="pb-3 fw-bold"><span
                                                                style="border-top: 4px solid #ae0a46;">Sho</span>p
                                                            By
                                                        </p>
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('software.common') }}">
                                                                    <div>Software</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('hardware.common') }}">
                                                                    <div>Hardware</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('training') }}">
                                                                    <div>Training</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('books') }}">
                                                                    <div>Books</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('shop') }}">
                                                                    <div>Our Shop</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-5 bg-white col-lg-2 our-service-second-column">
                                                        <p class="pb-3 fw-bold"><span
                                                                style="border-top: 4px solid #ae0a46;">Sho</span>p
                                                            By
                                                            Category</p>
                                                        <div class="row">
                                                            @if (!empty($header_categories))
                                                                @foreach ($header_categories->slice(0, 5) as $shop_category)
                                                                    <div class="mb-2 col-lg-12">
                                                                        <a class="pb-2 d-flex align-items-center"
                                                                            href="{{ route('custom.product', $shop_category->slug) }}">
                                                                            <div>{{ $shop_category->title }}
                                                                            </div>
                                                                            <div>
                                                                                <i
                                                                                    class="ph ph-caret-right menu_icons"></i>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="py-5 bg-white col-lg-6 ps-4 our-service-third-column">
                                                        <p class="pb-3 fw-bold"><span
                                                                style="border-top: 4px solid #ae0a46;">Sho</span>p
                                                            By Brand
                                                        </p>
                                                        <div class="row">
                                                            @if (!empty($header_brands))
                                                                @foreach ($header_brands as $header_brand)
                                                                    @if ($header_brand->brandPage)
                                                                        <div class="mb-2 col-lg-3">
                                                                            <a class="pb-2 d-flex align-items-center"
                                                                                href="{{ route('brand.products', $header_brand->slug) }}">
                                                                                <div
                                                                                    style="text-transform: capitalize;">
                                                                                    {{ $header_brand->title }}
                                                                                </div>
                                                                                <div>
                                                                                    <i
                                                                                        class="ph ph-caret-right menu_icons"></i>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="py-5 col-lg-2 ps-4"
                                                        style="
                                                    background: linear-gradient(#ae0a463b 0, #ffffff0f 320px);
                                                    ">
                                                        <!-- background: #f7f6f5; -->
                                                        <p class="pb-3 fw-bold"><span
                                                                style="border-top: 4px solid #ae0a46;">Exp</span>lore
                                                            Our
                                                            Deals</p>
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('tech.deals') }}">
                                                                    <div>Technology deals </div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('refurbished') }}">
                                                                    <div>Certified refurbished </div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-0 col-lg-12">
                                                        <div class="py-3 header-bottom-link">
                                                            <div class="px-5 row">
                                                                <div class="pt-2 col-lg-2 ps-3 pe-0">
                                                                    <a href="{{ route('shop.html') }}"
                                                                        style="border-top: 3px solid #ae0a46;">
                                                                        NGen IT Showcase <i
                                                                            class="fa-solid fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="pt-2 col-lg-2">
                                                                    <a class="ms-3"
                                                                        href="{{ route('all.category') }}"
                                                                        style="border-top: 3px solid #ae0a46;">
                                                                        View All Category <i
                                                                            class="fa-solid fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="pt-2 text-center col-lg-6 ps-2">
                                                                    <a class="" href="{{ route('all.brand') }}"
                                                                        style="border-top: 3px solid #ae0a46;">
                                                                        View All Brands <i
                                                                            class="fa-solid fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="pt-2 col-lg-2">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown position-static">
                                        <a class="nav-link dropdown-toggle pe-0" href="#" role="button"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">
                                            CONNECT US
                                        </a>
                                        <ul class="dropdown-menu full-container-dropdown"
                                            style="border-top: 1px solid #ae0a460f !important; width:100%; ">
                                            <div class="px-0 container-fluid">
                                                <div class="row header-menu-content">
                                                    <div class="col-lg-3 our-service-first-column"
                                                        style="
                                                    background: linear-gradient(#ae0a463b 0, #ffffff0f 320px);
                                                    ">
                                                        <!-- background: #f7f6f5; -->
                                                        <li class="py-3 d-flex justify-content-center flex-column">
                                                            <p class="text-center fw-bold">
                                                                <span
                                                                    style="border-top: 4px solid #ae0a46">Soc</span>ial
                                                            </p>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <a
                                                                    href="{{ !empty($setting->facebook_url) ? $setting->facebook_url : '' }}">
                                                                    <div
                                                                        class="text-center text-white social_icons me-2">
                                                                        <i class="fa-brands fa-facebook-f"></i>
                                                                    </div>
                                                                </a>
                                                                <a
                                                                    href="{{ !empty($setting->twitter_url) ? $setting->twitter_url : '' }}">
                                                                    <div
                                                                        class="text-center text-white social_icons me-2">
                                                                        <i class="fa-brands fa-linkedin-in"></i>
                                                                    </div>
                                                                </a>
                                                                <a
                                                                    href="{{ !empty($setting->linkedin_url) ? $setting->linkedin_url : '' }}">
                                                                    <div
                                                                        class="text-center text-white social_icons me-2">
                                                                        <i class="fa-brands fa-twitter"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <a
                                                                    href="{{ !empty($setting->youtube_url) ? $setting->youtube_url : '' }}">
                                                                    <div
                                                                        class="text-center text-white social_icons me-2">
                                                                        <i class="fa-brands fa-youtube"></i>
                                                                    </div>
                                                                </a>
                                                                <a
                                                                    href="{{ !empty($setting->instagram_url) ? $setting->instagram_url : '' }}">
                                                                    <div
                                                                        class="text-center text-white social_icons me-2">
                                                                        <i class="fa-brands fa-instagram"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <a href="#">
                                                                    <div
                                                                        class="text-center text-white social_icons me-2">
                                                                        <i class="fa-solid fa-user"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </div>
                                                    <div class="col-lg-3 our-service-second-column">
                                                        <p class="pb-3 fw-bold">
                                                            <span style="border-top: 4px solid #ae0a46">Our</span>
                                                            Company
                                                        </p>
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('about') }}">
                                                                    <div>About Us</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('portfolio') }}">
                                                                    <div>Portfolio</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('contact') }}">
                                                                    <div>Contact Us</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 our-service-second-column">
                                                        <p class="pb-3 fw-bold">
                                                            <span style="border-top: 4px solid #ae0a46">Car</span>eer
                                                            With Us
                                                        </p>
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('job.openings') }}">
                                                                    <div>Find Jobs</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('job-applicant.login') }}">
                                                                    <div>Job Applicant Login</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('job.registration') }}">
                                                                    <div>Make Your CV</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 our-service-second-column">
                                                        <p class="pb-3 fw-bold">
                                                            <span style="border-top: 4px solid #ae0a46">Par</span>tner
                                                            With Us
                                                        </p>
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="{{ route('partner.login') }}">
                                                                    <div>Partner Registration</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="javascript:void(0);">
                                                                    <div>Investor</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="mb-2 col-lg-12">
                                                                <a class="pb-2 d-flex align-items-center"
                                                                    href="javascript:void(0);">
                                                                    <div>News Room</div>
                                                                    <div>
                                                                        <i class="ph ph-caret-right menu_icons"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-0 col-lg-12">
                                                        <div class="py-3 header-bottom-link">
                                                            <div class="px-5 row align-items-center">
                                                                <div class="col-lg-3 ps-3 pe-0">
                                                                    <div class="m-0 d-flex"
                                                                        style="font-family: 'Libre Franklin', sans-serif;">
                                                                        <h2 class="mb-0">Help </h2>
                                                                        <h2 class="mb-0">
                                                                            <i class="fa-solid fa-arrow-right-long ps-3"
                                                                                style="font-size: 24px;color: #ae0a46;"></i>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="p-0 m-0">
                                                                            <span>
                                                                                <i
                                                                                    class="fa-brands fa-whatsapp help-icons"></i>
                                                                            </span>
                                                                            <span class="ps-2"><a
                                                                                    href="https://wa.me/{{ $setting->whatsapp_number }}">{{ $setting->whatsapp_number }}</a></span>
                                                                        </p>
                                                                        <p class="p-0 m-0 ps-3">
                                                                            <span>
                                                                                <i
                                                                                    class="fa-brands fa-skype help-icons"></i>
                                                                            </span>
                                                                            <span class="ps-2">+1 917-720-3055</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="p-0 m-0">
                                                                            <span>
                                                                                <i
                                                                                    class="fa-solid fa-envelope-open-text help-icons"></i>
                                                                            </span>
                                                                            <span
                                                                                class="ps-2">{{ $setting->sales_email }}</span>
                                                                        </p>
                                                                        {{-- <p class="p-0 m-0 ps-3">
                                                                            <span>
                                                                                <i
                                                                                    class="fa-solid fa-handshake help-icons"></i>
                                                                            </span>
                                                                            <span
                                                                                class="ps-2">partners@ngenitltd.com</span>
                                                                        </p> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container mx-auto row sticky-top">
            <div class="mt-0 bg-white border shadow-lg card d-none rounded-0" id="search_container">

            </div>
        </div>
        <div class="container mx-auto row sticky-top">
            <div class="mt-0 bg-white border shadow-lg card d-none rounded-0" id="mobile_search_container">

            </div>
        </div>
    </div>
</section>


{{-- Mobile Menu Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="rightOffcanvas" aria-labelledby="rightOffcanvasLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand fw-bold upper-content-menu main-logo" href="">
            <img height="50px"
                src="{{ !empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)) ? asset('storage/' . $setting->logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                alt="NGEN IT">
            {{-- <img height="50px"
                src="{{asset('storage/' . $setting->logo)}}"
            alt="NGEN IT"> --}}
        </a>



        <button class="offcanvas-icons upper-content-menu text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
            style="padding-left: none !important;">
            <i class="fa-solid fa-xmark" style="font-size: 18px !important;"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div>
            {{-- <form method="post" action="{{ route('product.search') }}"
                class="d-flex ms-auto upper-content-menu justify-content-center align-items-center" role="search">
                @csrf --}}
            <div class="input-group flex-nowrap search-input-container">
                <span class="input-group-text search-box-areas" id="addon-wrapping"><i
                        class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control search-input-field" id="search_text" name="search"
                    type="search" placeholder="Search for products, solutions & more..."
                    aria-describedby="addon-wrapping">
            </div>
            {{-- </form> --}}
            <hr>
            <ul class="mt-3 navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        OUR SERVICES
                    </a>
                    <ul class="dropdown-menu mobile-container-dropdown">
                        <div class="container-fluid">
                            <div class="p-3 pt-2 bg-white row tech-top">
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold"><span style="border-top: 4px solid #ae0a46;">Com</span>mon
                                        Services
                                    </p>
                                    <div class="row">
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('software.info') }}">
                                                <div>Software</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center" href="{{ route('training') }}">
                                                <div>Training</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('hardware.info') }}">
                                                <div>Hardware</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center" href="{{ route('books') }}">
                                                <div>Books</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold">
                                        <span style="border-top: 4px solid #ae0a46;">Ind</span>ustry We Serve
                                    </p>
                                    <div class="row">
                                        @if (!empty($header_industrys))
                                            @foreach ($header_industrys as $header_industry)
                                                @if ($header_industry->industryPage)
                                                    <div class="mb-2 col-6">
                                                        <a class="pb-2 d-flex align-items-center"
                                                            href="{{ route('industry.details', $header_industry->slug) }}">
                                                            <div>{{ $header_industry->title }}</div>
                                                            <div>
                                                                <i class="ph ph-caret-right menu_icons"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold"><span
                                            style="border-top: 4px solid #ae0a46;">Sol</span>utions We Provide
                                    </p>
                                    <div class="row">
                                        @if (!empty($header_solutions))
                                            @foreach ($header_solutions as $header_solution)
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ !empty($header_solution->slug) ? route('solution.details', ['slug' => $header_solution->slug]) : '' }}">
                                                        <div>{{ $header_solution->name }}</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        SHOP ONLINE
                    </a>
                    <ul class="dropdown-menu mobile-container-dropdown">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold"><span style="border-top: 4px solid #ae0a46;">Sho</span>p
                                        By</p>
                                    <div class="row">
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('software.common') }}">
                                                <div>Software</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('hardware.common') }}">
                                                <div>Hardware</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center" href="javascript:void(0)">
                                                <div>Training</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center" href="javascript:void(0)">
                                                <div>Books</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center" href="{{ route('shop') }}">
                                                <div>Our Shop</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mb-2 col-6">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('shop.html') }}">
                                                <div>NGen IT Showcase</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold"><span style="border-top: 4px solid #ae0a46;">Sho</span>p
                                        By
                                        Category</p>
                                    <div class="row">
                                        @if (!empty($header_categories))
                                            @foreach ($header_categories->slice(0, 5) as $shop_category)
                                                <div class="mb-2 col-6">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('custom.product', $shop_category->slug) }}">
                                                        <div>{{ $shop_category->title }}</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold"><span style="border-top: 4px solid #ae0a46;">Sho</span>p
                                        By
                                        Brand</p>
                                    <div class="row">
                                        @if (!empty($header_brands))
                                            @foreach ($header_brands as $header_brand)
                                                @if ($header_brand->brandPage)
                                                    <div class="mb-2 col-6">
                                                        <a class="pb-2 d-flex align-items-center"
                                                            href="{{ route('brand.products', $header_brand->slug) }}">
                                                            <div>
                                                                {{ $header_brand->title }}
                                                            </div>
                                                            <div>
                                                                <i class="ph ph-caret-right menu_icons"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-12 col-sm-12">
                                    <p class="pb-3 fw-bold"><span
                                            style="border-top: 4px solid #ae0a46;">Exp</span>lore Our
                                        Deals</p>
                                    <div class="row">
                                        <div class="mb-2 col-lg-12">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('tech.deals') }}">
                                                <div>Technology deals </div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-12">
                                            <a class="pb-2 d-flex align-items-center"
                                                href="{{ route('refurbished') }}">
                                                <div>Certified refurbished </div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-0 mt-3 row gx-0"
                                style="
                                                    background: linear-gradient(#ae0a463b 0, #ffffff0f 320px);
                                                    ">
                                <!-- background: #f7f6f5; -->
                                <div class="text-center col-6">
                                    <a href="{{ route('all.category') }}"
                                        style="border-top: 1.5px solid #ae0a46;margin-left: -2.3rem;">
                                        View All Category
                                    </a>
                                </div>
                                <div class="text-center col-6">
                                    <a href="{{ route('all.brand') }}" style="border-top: 3px solid #ae0a46;">
                                        View All Brands
                                    </a>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        CONNECT US
                    </a>
                    <ul class="dropdown-menu mobile-container-dropdown">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="pt-3 pb-3 col-lg-4 p-left-rem"
                                    style="
                                                    background: linear-gradient(#ae0a463b 0, #ffffff0f 320px);
                                                    ">
                                    <!-- background: #f7f6f5; -->
                                    <p class="text-center fw-bold">
                                        <span style="border-top: 4px solid #ae0a46;">Soc</span>ial
                                    </p>
                                    <li class="py-3 d-flex justify-content-center">
                                        <div>
                                            <a href="{{ !empty($setting->facebook_url) ? $setting->facebook_url : '' }}"
                                                class="social_icons">
                                                <span><i class="fa-brands fa-facebook-f"></i></span>
                                            </a>
                                            <a href="{{ !empty($setting->twitter_url) ? $setting->twitter_url : '' }}"
                                                class="social_icons">
                                                <span><i class="fa-brands fa-linkedin-in"></i></span>
                                            </a>
                                            <a href="{{ !empty($setting->linkedin_url) ? $setting->linkedin_url : '' }}"
                                                class="social_icons">
                                                <span><i class="fa-brands fa-twitter"></i></span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ !empty($setting->youtube_url) ? $setting->youtube_url : '' }}"
                                                class="social_icons">
                                                <span><i class="fa-brands fa-youtube"></i></span>
                                            </a>
                                            <a href="{{ !empty($setting->instagram_url) ? $setting->instagram_url : '' }}"
                                                class="social_icons">
                                                <span><i class="fa-brands fa-instagram"></i></span>
                                            </a>
                                        </div>
                                    </li>
                                </div>
                                <div class="pt-3 pb-3 col-12">
                                    <div class="row">
                                        <div class="mb-4 col-6">
                                            <p class="pb-3 fw-bold">
                                                <span style="border-top: 4px solid #ae0a46;">Our</span> Company
                                            </p>
                                            <div class="row">
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('about') }}">
                                                        <div>About Us </div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('portfolio') }}">
                                                        <div>Portfolio </div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('contact') }}">
                                                        <div>Contact Us </div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-6">
                                            <p class="pb-3 fw-bold">
                                                <span style="border-top: 4px solid #ae0a46;">Car</span>eer With
                                                Us
                                            </p>
                                            <div class="row">
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('job.openings') }}">
                                                        <div>Find Jobs</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('job-applicant.login') }}">
                                                        <div>Job Applicant Login</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('job.registration') }}">
                                                        <div>Make Your CV</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-8">
                                            <p class="pb-3 fw-bold">
                                                <span style="border-top: 4px solid #ae0a46;">Par</span>tner
                                                With Us
                                            </p>
                                            <div class="row">
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="{{ route('partner.login') }}">
                                                        <div>Partner Registration</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="javascript:void(0);">
                                                        <div>Investor</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mb-2 col-lg-12">
                                                    <a class="pb-2 d-flex align-items-center"
                                                        href="javascript:void(0);">
                                                        <div>News Room</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="m-0">Help</p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="m-0">
                                        <a
                                            href="https://wa.me/{{ $setting->whatsapp_number }}">{{ $setting->whatsapp_number }}</a>
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="m-0">{{ $setting->sales_email }}</p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
            </ul>


            {{-- <div class="search-container">
                <form method="post" action="{{ route('product.search') }}">
            @csrf
            <input class="search" id="search_text" name="search" type="search" placeholder="Search"
                style="width: 296px;">
            <label class="search_buttons searchbutton" for="search_text"><span
                    class="mglass">&#9906;</span></label>
            </form>
        </div> --}}
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all dropdown links
        var dropdownLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Add click event listener to each dropdown link
        dropdownLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Remove the 'active' class from all dropdown links
                dropdownLinks.forEach(function(otherLink) {
                    otherLink.parentNode.classList.remove('active');
                });

                // Add the 'active' class to the clicked dropdown link's parent
                this.parentNode.classList.add('active');
            });
        });

        // Add an event listener for when the dropdown is hidden
        document.querySelector('.navbar-nav').addEventListener('hidden.bs.dropdown', function() {
            // Remove the 'active' class from all dropdown links when the dropdown is hidden
            dropdownLinks.forEach(function(link) {
                link.parentNode.classList.remove('active');
            });
        });
    });
</script>
