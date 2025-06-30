@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    @if (!empty($software_info->banner_image))
        <section>
            <div>
                <img class="page_top_banner"
                    src="{{ !empty($software_info->banner_image) && file_exists(public_path('storage/' . $software_info->banner_image)) ? asset('storage/' . $software_info->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}"
                    alt="NGEN IT Software">
            </div>
        </section>
    @endif
    <!----------End--------->
    <section class="pt-1">
        <div class="container my-3 mt-4">
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
                <a href="{{ route('software.info') }}">
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Software Info</span>
                        </span>
                    </li>
                </a>
            </ul>
        </div>
    </section>
    <!--======// Information Section //======-->
    @if (!empty($software_info->row_six_image))
        <section>
            <div class="container">
                <div class="row gx-3">
                    <div class="col-lg-8">
                        <div class="p-5 blocks-content block-image-content"
                            style="background-color:#f7f6f5!important; height: 30rem;">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="animated-image parbase section">
                                        <div id="solution_image_1">
                                            <img src="{{ isset($software_info->row_six_image) && file_exists(public_path('storage/' . $software_info->row_six_image)) ? asset('storage/' . $software_info->row_six_image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="{{ $software_info->row_six_title }}"
                                                title="Software Information NGENIT" class="img-fluid"
                                                style="background-color: rgb(212,208,202);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="software-info-title">
                                        <span
                                            style="border-top: 3px solid #ae0a46;">{{ Str::substr($software_info->row_six_title, 0, 2) }}</span>{{ Str::substr($software_info->row_six_title, 2) }}
                                    </h3>
                                    <p class="software-info-paragraph" style="text-align: justify;">
                                        {!! $software_info->row_six_short_description !!}
                                    </p>
                                    @if (!empty($software_info->row_six_btn_name))
                                        <a href="{{ $software_info->row_six_btn_link }}"
                                            class="button-bottom-animation main_color">{{ $software_info->row_six_btn_name }}</a>
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
                                                style="border-top: 3px solid #ae0a46;">{{ Str::substr($tab_one->title, 0, 2) }}</span>{{ Str::substr($tab_one->title, 2) }}
                                        </h1>
                                        <p class="software-info-paragraph" style="text-align: justify;">
                                            {!! Str::words($tab_one->description, 37) !!}

                                        </p>
                                        @if (!empty($tab_one->btn_name))
                                            <a href="{{ $tab_one->link }}"
                                                class="button-bottom-animation main_color">{{ $tab_one->btn_name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row gx-3 mt-3 mb-5">
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
                                                    style="border-top: 3px solid #ae0a46;">{{ Str::substr($tabId->title, 0, 2) }}</span>{{ Str::substr($tabId->title, 2) }}
                                            </h1>
                                            <p class="software-info-paragraph" style="text-align: justify;">
                                                {!! Str::words($tabId->description, 37) !!}
                                            </p>
                                            @if (!empty($tabId->btn_name))
                                                <a href="{{ $tabId->link }}"
                                                    class="button-bottom-animation main_color">{{ $tabId->btn_name }}
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
    <!--======// Feature tab //======-->
    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 p-0">
                    <div class="card border-0">
                        <div
                            class="card-header bg-white shadow-sm main-to-depp-gradient-2 p-5 card-header-area border-top-right-r">
                            <div class="d-flex align-items-center">
                                <h4 class="pe-2 text-white">Software Related</h4>
                                <h4 class="pe-2 text-white">|</h4>
                                <h4 class="text-white">Categories</h4>
                            </div>
                        </div>
                        <div class="card-header p-lg-5 p-4 card-header-area border-bottom-left-r">
                            <div class="row card-row-area">
                                @if (!empty($categories))
                                    @foreach ($categories as $category)
                                        <div class="col-lg-3 col-6 mb-4">
                                            <a href="{{ route('category.details', $category->slug) }}"
                                                style="cursor: pointer;">
                                                <div class="p-lg-4 p-4 shadow-sm bg-white">
                                                    <div class="d-lg-flex align-items-center">
                                                        <div class="icons_area pe-2">
                                                            <img class="category_icon"
                                                                src="{{ !empty($category->image) && file_exists(public_path('storage/' . $category->image)) ? asset('storage/' . $category->image) : asset('frontend/images/no-img-png.png') }}"
                                                                alt="NGEN IT">
                                                        </div>
                                                        <div class="text_area">
                                                            {{ $category->title }}
                                                        </div>
                                                    </div>
                                                    <div class="text_area text-end d-lg-block d-sm-none">
                                                        <a href="{{ route('category.details', $category->slug) }}"><i
                                                                class="fa-solid fa-plus"></i></a>
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
        </div>
    </section>
    <!----------End--------->
    <!--======// Our expert //======-->
    @if (!empty($software_info->row_four_video_link))
        <section>
            <div class="container mt-3 mb-5 video_row">
                <div class="software_feature_title py-lg-5 py-3">
                    <h1 class="text-center ">{{ $software_info->row_four_title }}</h1>
                </div>
                <div class="row d-flex justify-content-start align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <iframe width="100%" height="330"
                            src="{{ $software_info->row_four_video_link }}?autoplay=1&mute=1" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="">
                            <h5 class="home_title_heading w-100" style="text-align: start;">
                                {{ $software_info->row_four_sub_title }}
                            </h5>
                            <p class="home_title_text pt-3" style="text-align: justify;">
                                {{ $software_info->row_four_short_description }}</p>
                            <div class="pt-3">
                                <a class="btn-color"
                                    href="{{ $software_info->row_four_btn_link }}">{{ $software_info->row_four_btn_name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--======// Nasted tab //======-->
    <div class="section_wp pt-5">
        <!--Tab Section-->
        <div class="container mb-5">
            <!-- home title -->
            @if (!empty($software_info))
                <div class="nasted_tabbar_title">
                    <div class="software_feature_title">
                        <h1 class="text-center p-3">{{ $software_info->row_two_title }}</h1>
                    </div>
                    <p class="home_title_text w-75 mx-auto pb-4">
                        {!! $software_info->row_two_short_description !!}
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
                                        <div class="card rounded-0 brand_img_container mb-4">
                                            <div class="card-body image_box">
                                                <div class="brand-images">
                                                    <a href="{{ route('brand.overview', $brand->slug) }}">
                                                        <img src="{{ asset('storage/' . $brand->image) }}"
                                                            class="img-fluid" alt="{{ $brand->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 p-0 m-0">
                                                <div class="brand_btns"
                                                    style="justify-content: center;
                                                      background: #ae0a46;
                                                      color: white;
                                                      font-size: 13px;
                                                      display: flex;">
                                                    <a class="text-white py-2"
                                                        href="{{ route('brand.overview', $brand->slug) }}">Details
                                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                                    </a>
                                                    <span class="ms-3 me-3" style="background: #ffff;">||</span>
                                                    <a class="text-white py-2"
                                                        href="{{ route('custom.product', $brand->slug) }}">Shop
                                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-12 col-md-12 col-sm-12 text-end mt-2 px-4" style="color: #ae0a46;">
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
                                            ->join('sub_categories', 'products.sub_cat_id', '=', 'sub_categories.id')
                                            ->where('sub_categories.id', '=', $category->id)
                                            ->select('brands.id', 'brands.title', 'brands.image', 'brands.slug')
                                            ->distinct()
                                            ->paginate(12);
                                    @endphp
                                    @foreach ($related_brands as $related_brand)
                                        <div class="col-lg-2 col-6">
                                            <div class="card rounded-0 brand_img_container mb-4">
                                                <div class="card-body image_box">
                                                    <div class="brand-images">
                                                        <a href="{{ route('brand.overview', $related_brand->slug) }}">
                                                            <img src="{{ asset('storage/' . $related_brand->image) }}"
                                                                class="img-fluid" alt="{{ $related_brand->title }}"> </a>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 p-0 m-0">
                                                    <div class="brand_btns"
                                                        style="justify-content: center;
                                                      background: #ae0a46;
                                                      color: white;
                                                      font-size: 13px;
                                                      display: flex;">
                                                        <a class="text-white py-2"
                                                            href="{{ route('brand.overview', $related_brand->slug) }}">Details
                                                            <i class="fa-solid fa-chevron-right ms-1"></i>
                                                        </a>
                                                        <span class="ms-3 me-3" style="background: #ffff;">||</span>
                                                        <a class="text-white py-2"
                                                            href="{{ route('custom.product', $related_brand->slug) }}">Shop
                                                            <i class="fa-solid fa-chevron-right ms-1"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-end mt-2 px-4"
                                        style="padding-top: 1rem; color: #ae0a46;">
                                        <a class="text-site" href="{{ route('category.details', $category->slug) }}">See
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
            <div class="home_title_heading my-5">
                <div class="software_feature_title">
                    <h1 class="text-center pb-3">
                        <span>Re</span>al outcomes. Expert insights.
                    </h1>
                </div>
            </div>
            <!-- Client Tab Start -->
            <div class="row my-5 align-items-center">
                <div class="col-lg-8">
                    <div class="blocks-content">
                        <div class="row">
                            <div class="col-lg-6 mb-lg-1 mb-4">
                                @if (!empty($tech_glossy1->title))
                                    <div>
                                        <div class="hover hover-2 text-white rounded">
                                            <img src="{{ !empty($tech_glossy1->image) && file_exists(public_path('storage/' . $tech_glossy1->image)) ? asset('storage/' . $tech_glossy1->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <p class="hover-2-title text-uppercase font-weight-bold mb-0">
                                                    <span class="font-weight-light">{{ $tech_glossy1->badge }}</span>
                                                    <br>
                                                    <span class="hover_content_title">
                                                        {{ Str::words($tech_glossy1->title, 7) }}
                                                    </span>
                                                </p>

                                                <p class="hover-2-description text-uppercase mb-0">
                                                    <a href="{{ route('techglossy.details', $tech_glossy1->id) }}"
                                                        class="text-white">read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($tech_glossy2->title))
                                    <div class="mt-4">
                                        <div class="hover hover-2 text-white rounded">
                                            <img src="{{ isset($tech_glossy2->image) && file_exists(public_path('storage/' . $tech_glossy2->image)) ? asset('storage/' . $tech_glossy2->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="">
                                            <div class="hover-overlay"></div>
                                            <div class="hover-2-content px-5 py-4">
                                                <p class="hover-2-title text-uppercase font-weight-bold mb-0"> <span
                                                        class="font-weight-light">{{ $tech_glossy2->badge }} </span> <br>
                                                    <span class="hover_content_title">
                                                        {{ Str::words($tech_glossy2->title, 7) }}
                                                    </span>
                                                </p>

                                                <p class="hover-2-description text-uppercase mb-0">
                                                    <a href="{{ route('techglossy.details', $tech_glossy2->id) }}"
                                                        class="text-white">read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if (!empty($tech_glossy3->title))
                                <div class="col-lg-6 mb-lg-1 mb-4">
                                    <div class="hover-4 hover-second text-white rounded">
                                        <img class="img-fluid"
                                            src="{{ isset($tech_glossy3->image) && file_exists(public_path('storage/' . $tech_glossy3->image)) ? asset('storage/' . $tech_glossy3->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                            alt="">
                                        <div class="hover-overlay-second"></div>
                                        <div class="hover-4-content px-5 py-4">
                                            <p class="hover-4-title text-uppercase font-weight-bold mb-0">
                                                <span class="font-weight-light">{{ $tech_glossy3->badge }} </span> <br>
                                                <span class="hover_content_title">
                                                    {{ Str::words($tech_glossy3->title, 7) }}
                                                </span>
                                            </p>
                                            <p class="hover-4-description text-uppercase mb-0">
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
                                        <h6 class="mb-0 pb-2 block_blog_badge">{{ $blog->badge }}</h6>
                                        <p class="mb-0">{{ Str::words($blog->title, 8) }}</p>
                                    </a>
                                </div>
                                <hr class="my-1 mx-0">
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
                @if (!empty($software_info->row_seven_title))
                    <div class="solution_number_wrapper">
                        <!-- title -->
                        @php
                            $sentence2 = $software_info->row_seven_title;
                        @endphp
                        <h5 class="home_title_heading" style="text-align: left;">
                            <div class="software_feature_title">
                                <h1 class="text-center pb-3">
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
    <!---------End -------->
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
@push('scripts')
    <script type="text/javascript">
        const scrollContainer = document.querySelector(".sub_tabs_button");
        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>
@endpush
