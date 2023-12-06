<div class="fixed-section header">
    {{-- Top Bar Area --}}
    <div class="container-fluid top-bar p-0">
        <div class="row gx-0 top-bar-bg">
            <div class="col-lg-8 top-bar-curve-area d-lg-block d-sm-none">
                {{-- Empty Are --}}
            </div>
            <div class="col-lg-4 top-bar-right-side">
                <div class="d-flex justify-content-between align-items-center top-menu-area">

                    <div class="">
                        {{-- <span class="text-white">My</span><span class="text-white">NGen It</span> --}}
                        <div class="dropdown drop-top">
                            <a href="javascript:void(0)" class="dropdown-toggle top-info-text top-info-text text-white"
                                type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">
                                <i class="fa-solid fa-phone-volume me-1" style="transform: rotate(-35deg);"></i>
                                SUPPORT | {{ $setting->phone_one }}
                            </a>
                            <div class="dropdown-menu drop-down-menus2" aria-labelledby="dropdownMenuButton"
                                style="position: absolute;
                            inset: 0px auto auto 0px;
                            margin: 0px;
                            transform: translate(50px, 18px) !important;">
                                <div class="popover__content text-start">
                                    {{-- <div class="text-muted">
                                        Call Us-
                                        <a href="tel:{{ $setting->phone_one }}"
                                            class="main_color">{{ $setting->phone_one }}</a>
                                    </div> --}}
                                    <hr class="text-muted" />
                                    <div class="d-flex flex-column align-items-center">
                                        <a href="{{ route('client.login') }}"
                                            class="mx-auto py-2 btn common_button2 mb-2 top-info-text w-100"
                                            style="font-size: 13px">
                                            <i class="fa-brands fa-whatsapp"></i> <span>Whats App</span>
                                        </a>
                                        <a href="{{ route('client.login') }}"
                                            class="mx-auto py-2 btn common_button2 mb-2 top-info-text w-100"
                                            style="font-size: 13px">
                                            <i class="fa-brands fa-skype"></i> <span>Sign In</span>
                                        </a>
                                    </div>
                                    <hr class="text-muted" />
                                    <ul class="account p-0 text-muted text-start">
                                        <li>
                                            Check Our
                                            <a href="{{ route('shop') }}" target="_blank" class="main_color">Shop
                                                Products</a>
                                        </li>
                                        <li>
                                            Check Our
                                            <a href="{{ route('all.solution') }}" target="_blank"
                                                class="main_color">Solution</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center ">
                        <div class="d-lg-block d-sm-none">
                            <a href="#" class="top-info-text text-white pe-3"><i
                                    class="fa-regular fa-circle-question me-1"></i> REQUEST FOR QUOTE</a>
                        </div>
                        <div>
                            {{-- <span class="text-white">My</span><span class="text-white">NGen It</span> --}}
                            <div class="dropdown drop-top">
                                <a href="javascript:void(0)"
                                    class="dropdown-toggle top-info-text top-info-text text-white" type="button"
                                    id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="fa-regular fa-star" style="font-size: 14px"></i>
                                    <span class="">MY</span><span class="">NGEN IT</span>
                                </a>
                                <div class="dropdown-menu drop-down-menus" aria-labelledby="dropdownMenuButton">
                                    <div class="popover__content-2 text-start">
                                        {{-- <div class="text-muted">
                                            First time here?
                                            <a href="#" class="main_color">Sign Up</a>
                                        </div> --}}

                                        @if (Auth::guard('client')->user())
                                            <li>
                                                <i class="fa fa-user m-2"></i>
                                                <a href="{{ route('client.dashboard') }}" class="">My Profile</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope m-2"></i>
                                                <a href="{{ route('client.orders') }}" class="">My Orders</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-star m-2"></i>
                                                <a href="{{ route('client.rfq') }}" class="">My RFQs/Deals</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-list m-2"></i>
                                                <a href="javascript:void(0)" class="">My Requests</a>
                                            </li>
                                            <hr class="text-muted" />
                                        @else
                                            <a href="{{ route('client.login') }}"
                                                class="mx-auto py-2 btn common_button2 mb-2 top-info-text w-100"
                                                style="font-size: 13px">
                                                Sign In
                                            </a>

                                            <hr class="text-muted" />
                                        @endif
                                        <ul class="account p-0 text-muted text-start">

                                            @unless (Auth::guard('client')->user())
                                                <li class="mb-2">
                                                    Sign In To Your
                                                    <a href="{{ route('client.login') }}" target="_blank"
                                                        class="main_color">Client Account</a>
                                                </li>
                                            @endunless
                                            @unless (Auth::guard('partner')->user())
                                                <li>
                                                    Sign In To Your
                                                    <a href="{{ route('partner.login') }}" target="_blank"
                                                        class="main_color">Partner
                                                        Account</a>
                                                </li>
                                            @endunless
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
        <nav class="navbar navbar-expand-lg p-2 main-navbar bg-white menu-section">
            <div class="container-fluid d-flex align-items-center">
                <div class="step-img d-lg-block d-sm-none">
                    <img src="https://i.ibb.co/3WKt3Mw/NGen-IT-left-color.png" alt="" style="height: 74px;">
                </div>
                <a class="navbar-brand fw-bold upper-content-menu main-logo" href="{{ route('homepage') }}">
                    <img class="img-fluid site-main-logo"
                        src="{{ !empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)) ? asset('storage/' . $setting->logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                        alt="NGEN IT">

                </a>
                <!---Category--->
                <div class="category-mobile">
                    <div class="dropdown position-static header-category-button-60">
                        <a class="tab_btn_icon upper-content-menu" href="#" role="button"
                            id="dropdownMenuLink2" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-expanded="false" style="padding-left: none !important;">
                            <i class="fa-solid fa-bars" style="font-size: 18px !important;"></i>
                        </a>
                        <ul class="dropdown-menu w-100 extra_category" aria-labelledby="dropdownMenuLink2">
                            <section class="header" style=" height: 100vh; margin-top: -2px;">
                                <div class="container-fluid">
                                    <div class="row tab_area_main p-2 category-center">
                                        <!-- Assuming $categories is already available in your controller or view -->

                                        <div class="col-md-3 tab_key_btns p-0 ">
                                            <div class="nav nav-custom flex-column nav-pills2 nav-pills-custom2"
                                                id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                @foreach ($categories as $key => $category)
                                                    <a class="nav-link px-3 p-2 shadow {{ $key === 0 ? 'show active' : '' }}"
                                                        id="v-pills-home-tab{{ $category->id }}" data-toggle="pill"
                                                        href="#v-pills-home{{ $category->id }}" role="tab"
                                                        aria-controls="v-pills-home{{ $category->id }}"
                                                        aria-selected="true"
                                                        style="font-weight:500 !important; margin-bottom: 1px;">
                                                        <span class="ps-1">-- &nbsp; {{ $category->title }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-md-9 p-0">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                @foreach ($categories as $key => $category)
                                                    <div class="tab-pane fade rounded-0 p-1 {{ $key === 0 ? 'show active' : '' }}"
                                                        id="v-pills-home{{ $category->id }}" role="tabpanel"
                                                        aria-labelledby="v-pills-home-tab{{ $category->id }}"
                                                        style="height: 22rem;">

                                                        <div class="row p-3">
                                                            @foreach ($category->subCategorys as $sub_category)
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <div class="fw-bold nav_title mb-2"
                                                                        style="font-size: 15px;">
                                                                        <span style="border-top: 2px solid #ae0a46;">
                                                                            {{ \Illuminate\Support\Str::substr($sub_category->title, 0, 3) }}
                                                                        </span>
                                                                        {{ \Illuminate\Support\Str::substr($sub_category->title, 3) }}
                                                                    </div>

                                                                    @foreach ($sub_category->subsubCategorys as $item)
                                                                        <li class="my-2"
                                                                            style="line-height: 1.2rem !important;">
                                                                            <a class="p-0"
                                                                                href="{{ route('category.html', $item->slug) }}">
                                                                                <div>{{ $item->title }}&nbsp;<i
                                                                                        class="ph ph-caret-right menu_icons"></i>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
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
                <!---Category--->

                <a href="javascript:void(0)" class="nvabar-toggler tab_btn_icon upper-content-menu d-lg-none"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#rightOffcanvas"
                    aria-controls="rightOffcanvas">
                    <i class="fa-solid fa-bars main_color" style="font-size: 18px !important;"></i>
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto upper-content-menu" method="post"
                        action="{{ route('product.search') }}" role="search">
                        @csrf
                        <div class="input-group flex-nowrap search-input-container">
                            <span class="input-group-text search-box-areas" id="addon-wrapping"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input class="form-control search-input-field search" id="search_text" name="search"
                                type="search" placeholder="Search for products, solutions & more..."
                                aria-describedby="addon-wrapping">
                        </div>
                    </form>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <hr>
                        <li class="nav-item dropdown position-static main-menu-specing">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown position-static cool-link main-menu-specing">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        OUR SERVICES
                                    </a>
                                    <ul class="dropdown-menu full-container-dropdown"
                                        style="border-top: 1px solid #ae0a460f !important;">
                                        <div class="container-fluid">
                                            <div class="row pt-5 pb-5 tech-top bg-white">
                                                <div class="col-lg-3">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Com</span>mon
                                                        Services
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="{{ route('software.info') }}">
                                                                <div>Software</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="{{ route('hardware.info') }}">
                                                                <div>Hardware</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="javascript:void(0)">
                                                                <div>Training</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="javascript:void(0)">
                                                                <div>Books</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Ind</span>ustry We
                                                        Serve
                                                    </p>
                                                    <div class="row">
                                                        @if (count($industrys) > 0)
                                                            @foreach ($industrys as $industry)
                                                                {{-- @if ($industry->industryPage) --}}
                                                                    <div class="col-lg-6 mb-2">
                                                                        <a class="d-flex align-items-center"
                                                                            href="{{ route('industry.details', $industry->slug) }}">
                                                                            <div>{{ $industry->title }} </div>
                                                                            <div>
                                                                                <i
                                                                                    class="ph ph-caret-right menu_icons"></i>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                {{-- @endif --}}
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Sol</span>utions We
                                                        Provide
                                                    </p>
                                                    <div class="row">
                                                        @if ($solutions)
                                                            @foreach ($solutions as $solution)
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ !empty($solution->slug) ? route('solution.details', ['id' => $solution->slug]) : '' }}">
                                                                        <div>{{ $solution->name }}</div>
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
                                            <div class="row pt-3 pb-3 tech-top">
                                                <div class="col-lg-3 text-center">
                                                    <a href="{{ route('whatwedo') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        What We Do
                                                    </a>
                                                </div>
                                                <div class="col-lg-5 text-center">
                                                    <a href="{{ route('all.industry') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        View All Industry
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <a href="{{ route('all.solution') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        View All Solutions
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown position-static cool-link main-menu-specing">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        TECH CONTENTS
                                    </a>
                                    <ul class="dropdown-menu full-container-dropdown"
                                        style="border-top: 1px solid #ae0a460f !important;">
                                        <div class="container-fluid px-0">
                                            <div class="row pt-4 pb-4 tech-top gx-1">
                                                <p class="fw-bold mb-2"><span
                                                        style="border-top: 4px solid #ae0a46;">Tre</span>ndy Content
                                                </p>
                                                <div class="row">
                                                    @if ($features)
                                                        @foreach ($features as $feature)
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="{{ isset($feature->image) && file_exists(public_path('storage/' . $feature->image)) ? asset('storage/' . $feature->image) : asset('frontend/images/banner-demo.png') }}"
                                                                        alt=""
                                                                        style="width:130px;height:70px;">
                                                                    <div class="ms-3">
                                                                        <a
                                                                            href="{{ route('feature.details', $feature->id) }}">
                                                                            <strong
                                                                                style="font-size:14px;">{{ Str::limit($feature->title, 100) }}</strong>
                                                                        </a>
                                                                        <br>
                                                                        <span>{{ $feature->badge }} /
                                                                            {{ $feature->created_at->format('d-m-Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row pt-4 pb-4 tech-top bg-white gx-1">
                                                <div class="row">
                                                    @if ($blog)
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ isset($blog->image) && file_exists(public_path('storage/' . $blog->image)) ? asset('storage/' . $blog->image) : asset('frontend/images/banner-demo.png') }}"
                                                                    alt="" style="width:130px;height:70px;">
                                                                <div class="ms-3">
                                                                    <a
                                                                        href="{{ route('feature.details', $blog->id) }}">
                                                                        <strong
                                                                            style="font-size:14px;">{{ Str::limit($blog->title, 100) }}</strong>
                                                                    </a>
                                                                    <br>
                                                                    <span>{{ $blog->badge }} /
                                                                        {{ $blog->created_at->format('d-m-Y') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($techglossy)
                                                        <div class="col-lg-6 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ isset($techglossy->image) && file_exists(public_path('storage/' . $techglossy->image)) ? asset('storage/' . $techglossy->image) : asset('frontend/images/banner-demo.png') }}"
                                                                    alt="" style="width:130px;height:65px;">
                                                                <div class="ms-3">
                                                                    <a
                                                                        href="{{ route('feature.details', $techglossy->id) }}">
                                                                        <strong
                                                                            style="font-size:14px;">{{ Str::limit($techglossy->title, 100) }}</strong>
                                                                    </a>
                                                                    <br>
                                                                    <span>{{ $techglossy->badge }} /
                                                                        {{ $techglossy->created_at->format('d-m-Y') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row pt-3 pb-3 tech-top gx-1">
                                                <div class="col-lg-6 text-center">
                                                    <a href="{{ route('all.blog') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        View All Blogs
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <a href="{{ route('all.techglossy') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        View All Techglossies
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown position-static cool-link main-menu-specing">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        SHOP ONLINE
                                    </a>
                                    <ul class="dropdown-menu full-container-dropdown"
                                        style="border-top: 1px solid #ae0a460f !important;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-3 bg-white pt-5 pb-3 shop-menu-left">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Sho</span>p By</p>
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="{{ route('software.common') }}">
                                                                <div>Software</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="{{ route('hardware.common') }}">
                                                                <div>Hardware</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="javascript:void(0)">
                                                                <div>Training</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="javascript:void(0)">
                                                                <div>Books</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="{{ route('shop') }}">
                                                                <div>Our Shop</div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 bg-white pt-5 pb-3">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Sho</span>p By
                                                        Category</p>
                                                    <div class="row">
                                                        @if (!empty($categorys))
                                                            @foreach ($categorys as $shop_category)
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('custom.product', $shop_category->slug) }}">
                                                                        <div>{{ $shop_category->title }}</div>
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
                                                <div class="col-lg-4 bg-white pt-5 pb-3">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Sho</span>p By Brand
                                                    </p>
                                                    <div class="row">
                                                        @if ($brands)
                                                            @foreach ($brands as $brand)
                                                                @if ($brand->brandPage)
                                                                    <div class="col-lg-6 mb-2">
                                                                        <a class="d-flex align-items-center"
                                                                            href="{{ route('brand.products', $brand->slug) }}">
                                                                            <div>
                                                                                {{ $brand->title }}
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
                                                <div class="col-lg-2 pt-5 pb-3" style="background: #f7f6f5;">
                                                    <p class="fw-bold"><span
                                                            style="border-top: 4px solid #ae0a46;">Exp</span>lore Our
                                                        Deals</p>
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-2">
                                                            <a class="d-flex align-items-center"
                                                                href="{{ route('tech.deals') }}">
                                                                <div>Technology deals </div>
                                                                <div>
                                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <a class="d-flex align-items-center"
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
                                            <div class="row pt-3 pb-3 tech-top">
                                                <div class="col-lg-3 ps-0 pe-0">
                                                    <a href="{{ route('shop.html') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        NGen IT Showcase
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 ">
                                                    <a href="{{ route('all.category') }}"
                                                        style="border-top: 3px solid #ae0a46;margin-left: -2.3rem;">
                                                        View All Category
                                                    </a>
                                                </div>
                                                <div class="col-lg-4">
                                                    <a href="{{ route('all.brand') }}"
                                                        style="border-top: 3px solid #ae0a46;">
                                                        View All Brands
                                                    </a>
                                                </div>
                                                <div class="col-lg-2 ps-5">
                                                    {{-- <a href="" style="border-top: 3px solid #ae0a46;">
                                                View All Deals
                                            </a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown position-static cool-link">
                                    <a class="nav-link dropdown-toggle pe-0" href="#" role="button"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        CONNECT US
                                    </a>
                                    <ul class="dropdown-menu full-container-dropdown"
                                        style="border-top: 1px solid #ae0a460f !important; width: 89% !important;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 p-left-rem pt-3 pb-3"
                                                    style="background: #f7f6f5;">
                                                    <p class="fw-bold text-center">
                                                        <span style="border-top: 4px solid #ae0a46;">Soc</span>ial
                                                    </p>
                                                    <li class="d-flex justify-content-center py-3">
                                                        <a href="{{ !empty($setting->facebook_url) ? $setting->facebook_url : '' }}"
                                                            class="social_icons"><i
                                                                class="h1 fa-brands fa-square-facebook"
                                                                aria-hidden="true"></i></a>
                                                        <a href="{{ !empty($setting->twitter_url) ? $setting->twitter_url : '' }}"
                                                            class="ms-2 social_icons">
                                                            <i class="h1 fa-brands fa-linkedin"></i></a>
                                                        <a href="{{ !empty($setting->linkedin_url) ? $setting->linkedin_url : '' }}"
                                                            class="ms-2 social_icons">
                                                            <i class="h1 fa-brands fa-square-twitter"></i></a>
                                                        <a href="{{ !empty($setting->youtube_url) ? $setting->youtube_url : '' }}"
                                                            class="ms-2 social_icons">
                                                            <i class="h1 fa-brands fa-square-youtube"></i></a>
                                                        <a href="{{ !empty($setting->instagram_url) ? $setting->instagram_url : '' }}"
                                                            class="ms-2 social_icons">
                                                            <i class="h1 fa-brands fa-square-instagram"></i></a>
                                                    </li>
                                                </div>
                                                <div class="col-lg-8 p-right-rem pt-3 pb-3">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <p class="fw-bold">
                                                                <span style="border-top: 4px solid #ae0a46;">Our</span>
                                                                Company
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('about') }}">
                                                                        <div>About Us </div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('portfolio') }}">
                                                                        <div>Portfolio </div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('contact') }}">
                                                                        <div>Contact Us </div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <p class="fw-bold">
                                                                <span
                                                                    style="border-top: 4px solid #ae0a46;">Car</span>eer
                                                                With
                                                                Us
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('job.openings') }}">
                                                                        <div>Find Jobs</div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('job.registration') }}">
                                                                        <div>Job Registration</div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <p class="fw-bold">
                                                                <span
                                                                    style="border-top: 4px solid #ae0a46;">Par</span>tner
                                                                With Us
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="{{ route('partner.login') }}">
                                                                        <div>Partner Registration</div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="javascript:void(0);">
                                                                        <div>Investor</div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-12 mb-2">
                                                                    <a class="d-flex align-items-center"
                                                                        href="javascript:void(0);">
                                                                        <div>News Room</div>
                                                                        <div>
                                                                            <i
                                                                                class="ph ph-caret-right menu_icons"></i>
                                                                        </div>
                                                                    </a>
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
    <div class="row container mx-auto sticky-top">
        <div class="card d-none shadow-lg bg-white border rounded-0 mt-0" id="search_container">

        </div>
    </div>
</div>


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
            <form method="post" action="{{ route('product.search') }}"
                class="d-flex ms-auto upper-content-menu justify-content-center align-items-center" role="search">
                @csrf
                <div class="input-group flex-nowrap search-input-container">
                    <span class="input-group-text search-box-areas" id="addon-wrapping"><i
                            class="fa-solid fa-magnifying-glass"></i></span>
                    <input class="form-control search-input-field search" id="mobile_search_text" name="search"
                        type="search" placeholder="Search for products, solutions & more..."
                        aria-describedby="addon-wrapping">
                </div>
            </form>
            <div class="row container mx-auto sticky-top">
                <div class="card d-none shadow-lg bg-white border rounded-0 mt-0" id="mobile_search_container">

                </div>
            </div>
            <hr>
            <ul class="navbar-nav justify-content-end flex-grow-1 mt-3">
                <li class="nav-item dropdown cool-link mb-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        OUR SERVICES
                    </a>
                    <ul class="dropdown-menu mobile-container-dropdown">
                        <div class="container-fluid">
                            <div class="row p-3 pt-2 tech-top bg-white">
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold"><span style="border-top: 2px solid #ae0a46;">Com</span>mon
                                        Services
                                    </p>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="{{ route('software.info') }}">
                                                <div>Software</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div>Training</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="{{ route('hardware.info') }}">
                                                <div>Hardware</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div>Books</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold">
                                        <span style="border-top: 2px solid #ae0a46;">Ind</span>ustry We Serve
                                    </p>
                                    <div class="row">
                                        @if (count($industrys) > 0)
                                            @foreach ($industrys as $industry)
                                                @if ($industry->industryPage)
                                                    <div class="col-6 mb-2">
                                                        <a class="d-flex align-items-center"
                                                            href="{{ route('industry.details', $industry->slug) }}">
                                                            <div>{{ $industry->title }} </div>
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
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold"><span style="border-top: 2px solid #ae0a46;">Sol</span>utions
                                        We Provide
                                    </p>
                                    <div class="row">
                                        @if ($solutions)
                                            @foreach ($solutions as $solution)
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ !empty($solution->slug) ? route('solution.details', ['id' => $solution->slug]) : '' }}">
                                                        <div>{{ $solution->name }}</div>
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
                <li class="nav-item dropdown cool-link mb-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        SHOP ONLINE
                    </a>
                    <ul class="dropdown-menu mobile-container-dropdown">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold"><span style="border-top: 2px solid #ae0a46;">Sho</span>p By</p>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center"
                                                href="{{ route('software.common') }}">
                                                <div>Software</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center"
                                                href="{{ route('hardware.common') }}">
                                                <div>Hardware</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div>Training</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div>Books</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="{{ route('shop') }}">
                                                <div>Our Shop</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a class="d-flex align-items-center" href="{{ route('shop.html') }}">
                                                <div>NGen IT Showcase</div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold"><span style="border-top: 2px solid #ae0a46;">Sho</span>p By
                                        Category</p>
                                    <div class="row">
                                        @if (!empty($categorys))
                                            @foreach ($categorys as $shop_category)
                                                <div class="col-6 mb-2">
                                                    <a class="d-flex align-items-center"
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
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold"><span style="border-top: 2px solid #ae0a46;">Sho</span>p By
                                        Brand</p>
                                    <div class="row">
                                        @if ($brands)
                                            @foreach ($brands as $brand)
                                                @if ($brand->brandPage)
                                                    <div class="col-6 mb-2">
                                                        <a class="d-flex align-items-center"
                                                            href="{{ route('brand.products', $brand->slug) }}">
                                                            <div>
                                                                {{ $brand->title }}
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
                                <div class="col-lg-12 col-sm-12 mb-4">
                                    <p class="fw-bold"><span style="border-top: 2px solid #ae0a46;">Exp</span>lore Our
                                        Deals</p>
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <a class="d-flex align-items-center" href="{{ route('tech.deals') }}">
                                                <div>Technology deals </div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-12">
                                            <a class="d-flex align-items-center" href="{{ route('refurbished') }}">
                                                <div>Certified refurbished </div>
                                                <div>
                                                    <i class="ph ph-caret-right menu_icons"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mx-0 gx-0" style="background: #f7f6f5;">
                                <div class="col-6 text-center">
                                    <a href="{{ route('all.category') }}"
                                        style="border-top: 1.5px solid #ae0a46;margin-left: -2.3rem;">
                                        View All Category
                                    </a>
                                </div>
                                <div class="col-6 text-center">
                                    <a href="{{ route('all.brand') }}" style="border-top: 1.5px solid #ae0a46;">
                                        View All Brands
                                    </a>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown cool-link mb-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        CONNECT US
                    </a>
                    <ul class="dropdown-menu mobile-container-dropdown pt-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-center pt-3" style="background: #f7f6f5;">
                                    <p class="fw-bold text-center mb-0">
                                        <span style="border-top: 4px solid #ae0a46;">Soc</span>ial
                                    </p>
                                    <li class="d-flex justify-content-center py-3">
                                        <a href="{{ !empty($setting->facebook_url) ? $setting->facebook_url : '' }}"
                                            class="social_icons"><i class=fa-2xl fa-brands fa-square-facebook"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ !empty($setting->twitter_url) ? $setting->twitter_url : '' }}"
                                            class="ms-2 social_icons">
                                            <i class="fa-2xl  fa-brands fa-linkedin"></i></a>
                                        <a href="{{ !empty($setting->linkedin_url) ? $setting->linkedin_url : '' }}"
                                            class="ms-2 social_icons">
                                            <i class="fa-2xl  fa-brands fa-square-twitter"></i></a>
                                        <a href="{{ !empty($setting->youtube_url) ? $setting->youtube_url : '' }}"
                                            class="ms-2 social_icons">
                                            <i class="fa-2xl  fa-brands fa-square-youtube"></i></a>
                                        <a href="{{ !empty($setting->instagram_url) ? $setting->instagram_url : '' }}"
                                            class="ms-2 social_icons">
                                            <i class="fa-2xl  fa-brands fa-square-instagram"></i></a>
                                    </li>
                                </div>
                                <div class="col-12 pt-3 pb-3">
                                    <div class="row">
                                        <div class="col-6 mb-4">
                                            <p class="fw-bold">
                                                <span style="border-top: 2px solid #ae0a46;">Our</span> Company
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('about') }}">
                                                        <div>About Us </div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('portfolio') }}">
                                                        <div>Portfolio </div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('contact') }}">
                                                        <div>Contact Us </div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <p class="fw-bold">
                                                <span style="border-top: 2px solid #ae0a46;">Car</span>eer With
                                                Us
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('job.openings') }}">
                                                        <div>Find Jobs</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('job.registration') }}">
                                                        <div>Job Registration</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 mb-4">
                                            <p class="fw-bold">
                                                <span style="border-top: 2px solid #ae0a46;">Par</span>tner
                                                With Us
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('partner.login') }}">
                                                        <div>Partner Registration</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center" href="javascript:void(0);">
                                                        <div>Investor</div>
                                                        <div>
                                                            <i class="ph ph-caret-right menu_icons"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <a class="d-flex align-items-center" href="javascript:void(0);">
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
                                    <p class="m-0">Contact Us</p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="m-0">+8801714243446</p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="m-0">sales@ngenitltd.com</p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
            </ul>

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
