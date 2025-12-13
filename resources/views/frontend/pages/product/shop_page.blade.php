@extends('frontend.master')
@section('content')
@include('frontend.pages.product.partials.style')
<style>
    option:checked,
    option:hover {
        box-shadow: 0 0 10px 100px #4ddc3b inset;
    }

    .brand-loader {
        position: absolute;
        inset: 0;
        z-index: 10;

        display: flex;
        align-items: center;
        justify-content: center;

        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Wrapper */
    .spinner-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2.5rem;
        animation: fadeIn 0.25s ease-in-out;
    }

    /* Modern ring loader */
    .modern-loader {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        position: relative;

        background: conic-gradient(from 0deg,
                #ae0a46,
                #f06b93,
                #ae0a46);

        animation: spin 1s linear infinite;
    }

    /* Inner cutout */
    .modern-loader::before {
        content: "";
        position: absolute;
        inset: 7px;
        background: #fff;
        border-radius: 50%;
    }

    /* Glow */
    .modern-loader::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        box-shadow: 0 0 22px rgba(174, 10, 70, 0.45);
    }

    /* Loading text */
    .loading-text {
        margin-top: 12px;
        font-size: 0.95rem;
        font-weight: 500;
        letter-spacing: 0.04em;
        color: #ae0a46;
    }

    /* Animated dots */
    .loading-text span {
        animation: dots 1.4s infinite;
    }

    .loading-text span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .loading-text span:nth-child(3) {
        animation-delay: 0.4s;
    }

    /* Animations */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes dots {

        0%,
        20% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }


    .spinner-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 170px;
        width: 100%;
        padding: 2.5rem;

        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(8px);

        animation: fadeIn 0.25s ease-in-out;
    }

    /* Gradient ring loader */
    .modern-loader {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        position: relative;

        background: conic-gradient(from 0deg,
                #ae0a46,
                #f05c86,
                #ae0a46);

        animation: spin 1s linear infinite;
    }

    /* Inner cutout */
    .modern-loader::before {
        content: "";
        position: absolute;
        inset: 7px;
        background: white;
        border-radius: 50%;
    }

    /* Soft glow */
    .modern-loader::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        box-shadow: 0 0 22px rgba(174, 10, 70, 0.45);
    }

    /* Loading text */
    .loading-text {
        margin-top: 12px;
        font-size: 0.95rem;
        font-weight: 500;
        letter-spacing: 0.04em;
        color: #ae0a46;
    }

    /* Animated dots */
    .loading-text span {
        animation: dots 1.4s infinite;
    }

    .loading-text span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .loading-text span:nth-child(3) {
        animation-delay: 0.4s;
    }

    /* Animations */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes dots {

        0%,
        20% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
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

                            <input class="p-1 py-3 form-control rounded-0" type="text" name="keyword"
                                placeholder="🔎 Search By Key Word..." style="padding: 12px 12px 30px 15px !important;">
                            {{-- @endif --}}
                        </div>
                        <!-- Collapsible wrapper -->
                        <div class="mb-5 border-0 collapse card d-lg-block rounded-0" id="filterContent">
                            <div class="accordion shop-accordion" id="accordionPanelsStayOpenExample">
                                <div class="mt-3 accordion-item rounded-0">
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
                                                <div class="p-1 pl-3 accordion-body ps-3">
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
                                                                <div class="p-1 pl-3 accordion-body ps-3">
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
                                <div class="my-3 accordion-item rounded-0">
                                    <h2 class="accordion-header collapsed" id="headingTwo">
                                        <button class="accordion-button bg-light collapsed text-site rounded-0" type="button"
                                            data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseTwo"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            Brands
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="headingTwo">
                                        <div class="p-0 accordion-body">
                                            <div>

                                                <!-- Checked checkbox -->
                                                <div class="selected_brands"></div>

                                                <input type="text" id="brand_search_input"
                                                    class="py-3 form-control rounded-0 brand_search"
                                                    placeholder="🔎 Search Brand"
                                                    style="padding: 1rem 0.75rem !important;">

                                                <div class="filtered_brands" style="margin-top: 0px; position: relative;">
                                                    <!-- Loader -->
                                                    <div id="brand_loader" class="brand-loader d-none">
                                                        <div class="spinner-wrapper">
                                                            <div class="modern-loader"></div>
                                                            <div class="loading-text">
                                                                Loading<span>.</span><span>.</span><span>.</span>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <input class="mb-2 form-control form-control-sm"
                                                        type="text" id="amount"
                                                        value="USD $ {{ $_GET['price'] }}" readonly>
                                                    @else
                                                    <input class="mb-2 form-control form-control-sm"
                                                        type="text" id="amount" value="USD $0 - $20000"
                                                        readonly>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-lg-9 filter_container">
                        @include('frontend.pages.product.list')
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer -->
</div>
<script src="{{ asset('frontend/js/mdb.min.js') }}"></script>
<!-------- End--------->
@endsection




@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('brand_search_input');
        const loader = document.getElementById('brand_loader');
        const brandItems = document.querySelectorAll('.brand_item');

        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();

            // Show loader
            loader.classList.remove('d-none');

            setTimeout(() => { // optional UX delay

                let visibleCount = 0;

                brandItems.forEach(item => {
                    const title = item.querySelector('.tick')
                        .innerText
                        .toLowerCase();

                    if (title.includes(searchValue) && visibleCount < 8) {
                        item.classList.remove('d-none');
                        visibleCount++;
                    } else {
                        item.classList.add('d-none');
                    }
                });

                // Hide loader
                loader.classList.add('d-none');

            }, 250);
        });
    });
</script>

@endsection