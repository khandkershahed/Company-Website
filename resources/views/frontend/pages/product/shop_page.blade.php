@extends('frontend.master')
@section('content')
    @include('frontend.pages.product.partials.style')
    <style>
        option:checked,
        option:hover {
            box-shadow: 0 0 10px 100px #4ddc3b inset;
        }
    </style>
    <!--======// Header Title //======-->
    <section class="header_title_product_filter">
        <h1>Explore Products in Our Shop</h1>
    </section>
    <!-------- End--------->
    {{-- New Filter Section Start --}}
    <div class="container">
        <!--Main Navigation-->
        <!-- sidebar + content -->
        <section class="mt-3">
            <div class="container">
                <form class="filterForm" action="{{ route('shop.filter.partial') }}">
                    <div class="row">
                        <!-- sidebar -->
                        <div class="col-lg-3">
                            <!-- Toggle button -->
                            <button class="btn-color d-lg-none" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#filterContent" aria-controls="filterContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span>Show filter</span>
                            </button>
                            <div class="mb-2 ">
                                {{-- @if (!empty($_GET['keyword']))
                                    <input class="p-1 form-control" type="text" name="keyword"
                                        value="{{ $_GET['keyword'] }}">
                                @else --}}
                                <input class="p-1 form-control rounded-0 py-3" type="text" name="keyword"
                                    placeholder="Search By Key Word..." style="padding: 1rem 0.75rem !important;">
                                    <i class="fa-solid fa-search search-icons text-site"></i>
                                {{-- @endif --}}
                            </div>
                            <!-- Collapsible wrapper -->
                            <div class="collapse card d-lg-block mb-5 rounded-0 border-0" id="filterContent">
                                <div class="accordion shop-accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item rounded-0 mt-3">
                                        <h2 class="accordion-header collapsed" id="headingOne">
                                            <button class="accordion-button bg-light collapsed text-site rounded-0" type="button"
                                                data-mdb-toggle="collapse" data-mdb-target="#accordionFlushCategory"
                                                aria-expanded="false" aria-controls="accordionFlushCategory">
                                                Categories
                                            </button>
                                        </h2>


                                        <div class="accordion-collapse collapse show" id="accordionFlushCategory">
                                            <div class="accordion-item rounded-0">
                                                @foreach ($categories as $key => $cat)
                                                    <h2 class="accordion-header" id="flush-headingCategory">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapse{{ $cat->id }}"
                                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                                            <label class="tick">
                                                                <input type="checkbox" value="{{ $cat->slug }}"
                                                                    name="category[]">
                                                                <span class="check"
                                                                    style="top: -1px;"></span>{{ $cat->title }}
                                                            </label>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapse{{ $cat->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingCategory"
                                                        data-bs-parent="#accordionFlushCategory">
                                                        <div class="accordion-body p-1 ps-3 pl-3">
                                                            {{-- Body --}}
                                                            <div class="accordion accordion-flush"
                                                                id="accordionFlushSubCategory">
                                                                <div class="accordion-item rounded-0">
                                                                    @php
                                                                        $sub_categorys = App\Models\Admin\Category::getSubcatByCat(
                                                                            $cat->id,
                                                                        );
                                                                    @endphp
                                                                    @foreach ($sub_categorys as $key => $sub_category)
                                                                        <h2 class="accordion-header"
                                                                            id="flush-heading{{ $sub_category->id }}">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#flush-collapse{{ $sub_category->id }}"
                                                                                aria-expanded="false"
                                                                                aria-controls="flush-collapse{{ $sub_category->id }}">
                                                                                <label class="tick">
                                                                                    <input type="checkbox"
                                                                                        name="sub_category[]"
                                                                                        value="{{ $sub_category->slug }}">
                                                                                    <span class="check"
                                                                                        style="top: -1px;"></span>{{ $sub_category->title }}
                                                                                </label>
                                                                            </button>
                                                                        </h2>
                                                                        <div id="flush-collapse{{ $sub_category->id }}"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="flush-heading{{ $sub_category->id }}"
                                                                            data-bs-parent="#accordionFlushSubCategory">
                                                                            <div class="accordion-body p-1 ps-3 pl-3">
                                                                                {{-- Body --}}
                                                                                <div class="accordion accordion-flush"
                                                                                    id="inner_sub-2">
                                                                                    <div class="accordion-item rounded-0">
                                                                                        @php
                                                                                            $sub_sub_categorys = App\Models\Admin\SubCategory::getSubSubcatBySubCat(
                                                                                                $sub_category->id,
                                                                                            );
                                                                                        @endphp
                                                                                        @if (!empty($sub_sub_categorys))
                                                                                            @foreach ($sub_sub_categorys as $item)
                                                                                                <h2 class="accordion-header sub-accordion-header"
                                                                                                    id="flush-heading{{ $sub_category->id }}">
                                                                                                    <label class="tick">
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="sub_sub_category[]"
                                                                                                            value="{{ $item->slug }}">
                                                                                                        <span class="check"
                                                                                                            style="top: -1px;"></span>{{ $item->title }}
                                                                                                    </label>
                                                                                                </h2>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded-0 my-3">
                                        <h2 class="accordion-header collapsed" id="headingTwo">
                                            <button class="accordion-button bg-light collapsed text-site rounded-0" type="button"
                                                data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseTwo"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                Brands
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                            aria-labelledby="headingTwo">
                                            <div class="accordion-body p-0">
                                                <div>

                                                    <!-- Checked checkbox -->
                                                    <div class="selected_brands"></div>

                                                    <input type="text" id="brand_search_input"
                                                        class="form-control rounded-0 brand_search py-3"
                                                        placeholder="Search Brand"
                                                        style="padding: 1rem 0.75rem !important;">
                                                        <i class="fa-solid fa-search search-icons text-site"></i>

                                                    <div class="filtered_brands" style="margin-top: -25px;">
                                                        @php $count = 0; @endphp
                                                        @foreach ($brands as $key => $brand)
                                                            <div
                                                                class="form-inline d-flex align-items-center py-2 px-3 border-bottom brand_item {{ $key >= 8 ? 'd-none' : '' }}">
                                                                <label class="tick">{{ $brand->title }}
                                                                    <input type="checkbox" name="brand[]"
                                                                        onchange="brandFilter();"
                                                                        value="{{ $brand->slug }}">
                                                                    <span class="check"></span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded-0 ">
                                        <h2 class="accordion-header collapsed" id="headingThree">
                                            <button class="accordion-button bg-light collapsed text-site rounded-0" type="button"
                                                data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseThree"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                Price
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-body">

                                                <div class="py-3">
                                                    <div class="product_list_price">
                                                        <div id="slider-range" class="price-filter-range text-success"
                                                            data-min="0" data-max="20000"
                                                            style="margin-bottom:0.7rem;"></div>
                                                        <input type="hidden" id="price_range" name="price_range"
                                                            value="">
                                                        @if (!empty($_GET['price']))
                                                            <input class="form-control form-control-sm mb-2"
                                                                type="text" id="amount"
                                                                value="USD $ {{ $_GET['price'] }}" readonly>
                                                        @else
                                                            <input class="form-control form-control-sm mb-2"
                                                                type="text" id="amount" value="USD $0 - $20000"
                                                                readonly>
                                                        @endif
                                                    </div>


                                                    {{-- <div id="sticker">
                                                        <div
                                                            class="product_apply_filter_btn d-flex justify-content-center">
                                                            <button class="common_button2 p-2 w-100" type="submit">Apply
                                                                Filters</button>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="accordion-item">
                                        <h2 class="accordion-header collapsed" id="headingThree">
                                            <button class="accordion-button bg-light collapsed text-site rounded-0" type="button"
                                                data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseFour"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                                Size
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-body">
                                                <input type="checkbox" class="btn-check border justify-content-center"
                                                    id="btn-check1" checked autocomplete="off" />
                                                <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                                    for="btn-check1">XS</label>
                                                <input type="checkbox" class="btn-check border justify-content-center"
                                                    id="btn-check2" checked autocomplete="off" />
                                                <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                                    for="btn-check2">SM</label>
                                                <input type="checkbox" class="btn-check border justify-content-center"
                                                    id="btn-check3" checked autocomplete="off" />
                                                <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                                    for="btn-check3">LG</label>
                                                <input type="checkbox" class="btn-check border justify-content-center"
                                                    id="btn-check4" checked autocomplete="off" />
                                                <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                                    for="btn-check4">XXL</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="accordion-item">
                                        <h2 class="accordion-header collapsed" id="headingThree">
                                            <button class="accordion-button bg-light collapsed" type="button"
                                                data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseFive"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                                Ratings
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-body">
                                                <!-- Default checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" checked />
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <i class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                    </label>
                                                </div>
                                                <!-- Default checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" checked />
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <i class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-secondary"></i>
                                                    </label>
                                                </div>
                                                <!-- Default checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" checked />
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <i class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-secondary"></i>
                                                        <i class="fas fa-star text-secondary"></i>
                                                    </label>
                                                </div>
                                                <!-- Default checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" checked />
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <i class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-warning"></i><i
                                                            class="fas fa-star text-secondary"></i><i
                                                            class="fas fa-star text-secondary"></i>
                                                        <i class="fas fa-star text-secondary"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- sidebar -->
                        <!-- content -->
                        <div class="col-lg-9 filter_container">
                            @include('frontend.pages.product.list')
                        </div>
                    </div>
                </form>
            </div>
        </section>




        <!-- Footer -->
    </div>
    {{-- New Filter Section End --}}
    <!--=======// Content & Filter //=======-->
    <script src="{{ asset('frontend/js/mdb.min.js') }}"></script>
    <!-------- End--------->
@endsection




@section('scripts')
    <script>
        $(document).ready(function() {
            $('#brand_search_input').on('keyup change', function() {
                var spinner =
                    '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
                var searchValue = $('#brand_search_input').val().toLowerCase();
                // Loop through each brand item
                $('.brand_item').html(spinner);
                $('.brand_item').each(function() {
                    var brandTitle = $(this).find('.tick').text().toLowerCase();
                    if (brandTitle.indexOf(searchValue) !== -1) {
                        $(this).removeClass('d-none');
                    } else {
                        $(this).addClass('d-none');;
                    }
                });
                // Hide extra brand items if more than 8 are displayed
                var visibleBrandItems = $('.brand_item:visible');
                if (visibleBrandItems.length > 8) {
                    visibleBrandItems.slice(8).addClass('d-none');
                }
            });
        });
    </script>
@endsection
