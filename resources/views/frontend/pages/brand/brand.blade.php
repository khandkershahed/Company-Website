@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner" src="{{ asset('frontend/images/Brands-All-Banner_NGenIT.jpg') }}"
                alt="NGEN IT All Brands">
        </div>
    </section>
    <!----------End--------->
    <section>
        {{-- Top Brands --}}
        <div class="container brand-container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="home_title_heading pt-lg-4 pb-lg-5"><span class="main_color fw-bold">Top</span> Brands</h5>
                </div>
            </div>
            <div class="row">
                @foreach ($top_brands as $top_brand)
                    <div class="col-lg-2 col-sm-12 mb-lg-4 mb-3">
                        <div class="card rounded-0 brand_img_container">
                            <div class="card-body image_box">
                                <div class="brand-images">
                                    <a href="{{ route('brand.overview', $top_brand->slug) }}">
                                        <img src="{{ asset('storage/' . $top_brand->image) }}" class="img-fluid"
                                            alt=""> </a>
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
                                        href="{{ route('brand.overview', $top_brand->slug) }}">Details
                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                    </a>
                                    <span class="ms-3 me-3" style="background: #ffff;">||</span>
                                    <a class="text-white py-2" href="{{ route('custom.product', $top_brand->slug) }}">Shop
                                        <i class="fa-solid fa-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $top_brands->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        {{-- Features --}}
        <div class="container brand-container pt-lg-0 pt-0 ">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="home_title_heading py-lg-4"><span class="main_color fw-bold">Featured</span> Brands</h5>
                </div>
            </div>
            <div class="row">
                @foreach ($featured_brands as $featured_brand)
                    <div class="col-lg-2 col-sm-12 mb-lg-4 mb-3">
                        <div class="card rounded-0 brand_img_container">
                            <div class="card-body image_box_features">
                                <div class="brand-images">
                                    <a href="{{ route('brand.overview', $featured_brand->slug) }}">
                                        <img src="{{ asset('storage/' . $featured_brand->image) }}" class="img-fluid"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $featured_brands->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--======// Explore all the brands Ngen It has to offer. //====-->
    <section class="my-lg-5  my-0">
        <div class="container">
            <div class="row">
                <div class="text-center py-3">
                    <h2>Discover <span class="main_color fw-bold">NGen IT's</span> Brand Showcase.</h2>
                </div>
                <div class="col-lg-12 ">
                    <div class="row mb-1">
                        <div class="col-lg-10 offset-lg-1">
                            <nav>
                                <div class="row">
                                    <div class="nav nav-tabs nav-fill p-lg-0 p-3" id="nav-tab" role="tablist">
                                        {{-- <a class="nav-item nav-link " id="nav-healthcare" data-bs-toggle="tab"
                                            href="#all" role="tab" aria-controls="nav-home"
                                            aria-selected="true">All</a>
                                        <a class="nav-item nav-link" id="nav-healthcare" data-bs-toggle="tab" href="#a"
                                            role="tab" aria-controls="nav-home" aria-selected="true">A</a>

                                        <a class="nav-item nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#b"
                                            role="tab" aria-controls="nav-profile" aria-selected="false">B</a> --}}

                                        <a class="nav-item nav-link active" id="nav-contact-tab" data-bs-toggle="tab"
                                            href="#all" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">All</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#a"
                                            role="tab" aria-controls="nav-contact" aria-selected="false">A</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#b"
                                            role="tab" aria-controls="nav-contact" aria-selected="false">B</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#c"
                                            role="tab" aria-controls="nav-contact" aria-selected="false">C</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#d"
                                            role="tab" aria-dontrols="nav-contact" aria-selected="false">D</a>
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
                                                        <a href="{{ route('brand.overview', $item->slug) }}">{{ $item->title }}</a>
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
