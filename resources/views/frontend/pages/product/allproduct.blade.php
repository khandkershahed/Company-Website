@extends('frontend.master')
@section('content')


    @include('frontend.pages.product.partials.style')
    <section class="mb-4 banner_single_page"
        style="background-image:url('{{ !empty($brand_logo->brand_logo) ? asset('storage/' . $bannerImage) : asset('storage/' . $cat->banner_image) }}');
                background-color: black;
                background-repeat: no-repeat;
                background-size: cover;
                height:300px;">

        <div class="container">
            <div class="single_banner_content">
                <!-- image -->
                <div class="text-center single_banner_image">

                    @if (!empty($brand_logo))
                        <img src="{{ asset('storage/' . $brand_logo->brand_logo) }}" alt="" height="80px"
                            width="200px" style="margin-top:4rem;">
                    @else
                        <img src="{{ asset('storage/' . $cat->image) }}" alt="" height="130px" width="150px"
                            style="margin-top:4rem;">
                    @endif
                </div>
                <!-- heading -->
                <h1 class="text-center text-white single_banner_heading">{{ $cat->title }}</h1>

            </div>
        </div>
    </section>

    <!-------- End--------->

    <!--=======// Content & Filter //=======-->
    <div class="container">
        <form action="{{ route('custom.product', $cat->slug) }}" method="POST">
            @csrf
            <div class="my-4 wrapper">
                <div class="d-md-flex align-items-md-center">
                    {{-- <div>
                        <h5>
                            <b>
                                @if ($products)
                                    {{ $products->count() }}
                                @else
                                    No
                                @endif
                            </b> results matched your search
                        </h5>
                    </div> --}}
                    <div class="ml-auto d-flex align-items-center views">
                        {{-- <span class="btn text-success">
                            <span class="px-1 fas fa-th px-md-2"></span><span>Grid view</span> </span> <span class="btn">
                            <span class="fas fa-list-ul"></span>
                            <span class="px-1 px-md-2">List view</span> </span> --}}
                        {{-- <div class="my-2 border form-inline d-flex align-items-center checkbox bg-light mx-lg-2 rounded-0">
                            <select name='sortBy' onchange="this.form.submit();" id="country" class="bg-light">
                                <option value="">Sort By</option>
                                <option value="titleASC" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleASC') selected @endif>Ascending By Name
                                </option>
                                <option value="priceASC" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceASC') selected @endif> Ascending By
                                    Price</option>
                                <option value="titleDESC" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleDESC') selected @endif>Descending By
                                    Name</option>
                                <option value="priceDESC" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDESC') selected @endif>Descending By
                                    Price</option>
                            </select>
                        </div>
                        <div class="my-2 border form-inline d-flex align-items-center checkbox bg-light mx-lg-2 rounded-0">
                            <select name="show" onchange="this.form.submit();" id="page" class="bg-light">
                                <option value="">Per Page</option>
                                <option value="5" @if (!empty($_GET['show']) && $_GET['show'] == '5') selected @endif>5</option>
                                <option value="10" @if (!empty($_GET['show']) && $_GET['show'] == '10') selected @endif>10</option>
                                <option value="20" @if (!empty($_GET['show']) && $_GET['show'] == '20') selected @endif>20</option>
                                <option value="40" @if (!empty($_GET['show']) && $_GET['show'] == '40') selected @endif>40</option>
                            </select>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="pt-2 d-lg-flex align-items-lg-center">
                    <div class="my-2 border form-inline d-flex align-items-center mr-lg-2 radio bg-light"> <label
                            class="options">Most Popular <input type="radio" name="radio"> <span
                                class="checkmark"></span>
                        </label> <label class="options">Cheapest <input type="radio" name="radio" checked> <span
                                class="checkmark"></span> </label> </div>
                    <div class="my-2 border form-inline d-flex align-items-center checkbox bg-light mx-lg-2"> <label
                            class="tick">Farm <input type="checkbox" checked="checked"> <span class="check"></span>
                        </label>
                        <span class="px-2 text-success count"> 328</span>
                    </div>
                    <div class="my-2 border form-inline d-flex align-items-center checkbox bg-light mx-lg-2"> <label
                            class="tick">Bio <input type="checkbox"> <span class="check"></span> </label> <span
                            class="px-2 text-success count"> 72</span> </div>
                    <div class="my-2 border form-inline d-flex align-items-center checkbox bg-light mx-lg-2"> <label
                            class="tick">Czech republic <input type="checkbox"> <span class="check"></span> </label>
                        <span class="px-1 mx-2 mr-3 border font-weight-bold count"> 12</span> <select name="country"
                            id="country" class="bg-light">
                            <option value="" hidden>Country</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="Uk">UK</option>
                        </select>
                    </div>
                </div> --}}
                <div class="pt-2 d-sm-flex align-items-sm-center clear">
                    <div class="text-muted filter-label">Applied Filters:</div>
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleASC')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Ascending By Name
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceASC')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Ascending By Price
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleDESC')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Descending By Name
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDESC')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Descending By Price
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['show']) && $_GET['show'] == '5')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Showing 5 Products
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['show']) && $_GET['show'] == '10')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Showing 10 Products
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['show']) && $_GET['show'] == '20')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Showing 20 Products
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['show']) && $_GET['show'] == '40')
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            Showing 40 Products
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['price']))
                        <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                            style="cursor: pointer;">
                            USD {{ $_GET['price'] }}
                            <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                        </div>
                    @endif
                    @if (!empty($_GET['category']))
                        @php
                            $filterCats = explode(',', $_GET['category']);
                        @endphp
                        @if (count($filterCats) > 1)
                            @foreach ($filterCats as $filterCat)
                                <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                                    style="cursor: pointer;">
                                    {{ App\Models\Admin\Category::where('slug', $filterCat)->value('title') }}
                                    <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                                </div>
                            @endforeach
                        @endif
                        @if (count($filterCats) == 1)
                            <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                                style="cursor: pointer;">
                                {{ App\Models\Admin\Category::where('slug', $filterCats)->value('title') }}
                                <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                            </div>
                        @endif
                    @endif
                    @if (!empty($_GET['brand']))
                        @php
                            $filterBrands = explode(',', $_GET['brand']);
                        @endphp

                        @foreach ($filterBrands as $filterBrand)
                            <div class="p-1 px-1 mx-0 my-2 green-label font-weight-bold mx-sm-1 my-sm-0"
                                style="cursor: pointer;">
                                {{ App\Models\Admin\Brand::where('slug', $filterBrand)->value('title') }}
                                <span class="px-1 close" onclick="parentNode.remove()">&times;</span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="filters">
                    <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-target="#mobile-filter"
                        aria-expanded="true" aria-controls="mobile-filter">Filter<span class="px-1 fas fa-filter"></span>
                    </button>
                </div>
                <div id="mobile-filter">
                    <div class="py-3">
                        <h6 class="mb-2">KeyWord Search</h6>
                        @if (!empty($_GET['keyword']))
                            <input class="p-1 form-control" type="text" name="keyword" value="{{ $_GET['keyword'] }}"
                                onchange="this.form.submit()">
                        @else
                            <input class="p-1 form-control" type="text" name="keyword" placeholder="BY KEYWORD..."
                                onchange="this.form.submit()">
                        @endif
                    </div>
                    <div class="py-3">
                        <h5 class="font-weight-bold">Categories</h5>
                        <div class="accordion accordion-flush" id="accordionFlushCategory">
                            <div class="accordion-item">
                                @foreach ($categories as $key => $cat)
                                    <h2 class="accordion-header" id="flush-headingCategory">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $cat->id }}"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <label class="tick"><input type="checkbox"> <span class="check"
                                                    style="top: -1px;"></span>{{ $cat->title }} </label>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $cat->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingCategory" data-bs-parent="#accordionFlushCategory">
                                        <div class="p-1 pl-3 accordion-body ps-3">
                                            {{-- Body --}}
                                            <div class="accordion accordion-flush" id="accordionFlushSubCategory">
                                                <div class="accordion-item">
                                                    @php
                                                        $sub_categorys = App\Models\Admin\Category::getSubcatByCat(
                                                            $cat->id,
                                                        );
                                                    @endphp
                                                    @foreach ($sub_categorys as $key => $sub_category)
                                                        <h2 class="accordion-header"
                                                            id="flush-heading{{ $sub_category->id }}">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapse{{ $sub_category->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="flush-collapse{{ $sub_category->id }}">
                                                                <label class="tick"><input type="checkbox"> <span
                                                                        class="check"
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
                                                                <div class="accordion accordion-flush" id="inner_sub-2">
                                                                    <div class="accordion-item">
                                                                        @php
                                                                            $sub_sub_categorys = App\Models\Admin\SubCategory::getSubSubcatBySubCat(
                                                                                $sub_category->id,
                                                                            );
                                                                        @endphp
                                                                        @if (!empty($sub_sub_categorys))
                                                                            @foreach ($sub_sub_categorys as $item)
                                                                                <h2 class="accordion-header sub-accordion-header"
                                                                                    id="flush-heading{{ $sub_category->id }}">
                                                                                    <label class="tick"><input
                                                                                            type="checkbox"> <span
                                                                                            class="check"
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
                    <div class="py-3">
                        @if (!empty($_GET['brand']))
                            @php
                                $filterBrand = explode(',', $_GET['brand']);
                            @endphp
                        @endif

                        @foreach ($brands as $brand)
                            <div class="px-2 py-2 form-inline d-flex align-items-center"
                                style="border-bottom: 1px solid #00000026;"> <label class="tick">{{ $brand->title }}
                                    <input type="checkbox" name="brand[]" value="{{ $brand->slug }}"
                                        @if (!empty($filterBrand) && in_array($brand->slug, $filterBrand)) checked @endif onchange="this.form.submit()">
                                    <span class="check"></span> </label>
                            </div>
                        @endforeach

                    </div>
                    <div class="py-3">
                        <h5 class="font-weight-bold">Rating</h5>

                        <div class="py-2 form-inline d-flex align-items-center"> <label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <input type="checkbox"> <span class="check"></span>
                            </label> </div>
                        <div class="py-2 form-inline d-flex align-items-center"> <label class="tick"> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="px-1 far fa-star text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span> </label> </div>
                        <div class="py-2 form-inline d-flex align-items-center"> <label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="px-1 far fa-star text-muted"></span>
                                <span class="px-1 far fa-star text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span> </label> </div>
                        <div class="py-2 form-inline d-flex align-items-center"> <label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="px-1 far fa-star text-muted"></span> <span
                                    class="px-1 far fa-star text-muted"></span> <span
                                    class="px-1 far fa-star text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span> </label> </div>
                        <div class="py-2 form-inline d-flex align-items-center"> <label class="tick"> <span
                                    class="fas fa-star"></span> <span class="px-1 far fa-star text-muted"></span>
                                <span class="px-1 far fa-star text-muted"></span> <span
                                    class="px-1 far fa-star text-muted"></span> <span
                                    class="px-1 far fa-star text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span> </label> </div>

                    </div>
                </div>
                <div class="py-3 row gx-0 py-md-0">
                    <section id="sidebar">
                        <div class="py-3">
                            @if (!empty($_GET['keyword']))
                                <input class="p-1 form-control rounded-0 w-100" type="text" name="keyword"
                                    value="{{ $_GET['keyword'] }}" onchange="this.form.submit()" style="padding: 25px">
                            @else
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control rounded-0"
                                        placeholder="Search BY KEYWORD..." onchange="this.form.submit()">
                                    <div class="input-group-append">
                                        <button class="p-3 py-2 btn btn-secondary rounded-0" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item rounded-0">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button main_color" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Categories
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="p-3 py-0 accordion-body">
                                        <div class="py-3">
                                            <div class="accordion accordion-flush" id="accordionFlushCategory">
                                                <div class="accordion-item">
                                                    @if (!empty($_GET['category']))
                                                        @php
                                                            $filterCat = explode(',', $_GET['category']);
                                                        @endphp
                                                    @endif
                                                    @foreach ($categories as $key => $cat)
                                                        <h2 class="accordion-header" id="flush-headingCategory">

                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapse{{ $cat->id }}"
                                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                                <label class="tick">
                                                                    <input type="checkbox" name="category[]"
                                                                        value="{{ $cat->slug }}"
                                                                        @if (!empty($filterCat) && in_array($cat->slug, $filterCat)) checked @endif
                                                                        onchange="this.form.submit()">
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
                                                                    <div class="accordion-item">
                                                                        @php
                                                                            $sub_categorys = App\Models\Admin\Category::getSubcatByCat(
                                                                                $cat->id,
                                                                            );
                                                                        @endphp
                                                                        @if (!empty($_GET['sub_category']))
                                                                            @php
                                                                                $filtersubCat = explode(
                                                                                    ',',
                                                                                    $_GET['sub_category'],
                                                                                );
                                                                            @endphp
                                                                        @endif
                                                                        @foreach ($sub_categorys as $key => $sub_category)
                                                                            <h2 class="accordion-header"
                                                                                id="flush-heading{{ $sub_category->id }}">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#flush-collapse{{ $sub_category->id }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="flush-collapse{{ $sub_category->id }}">
                                                                                    <label class="tick">
                                                                                        <input type="checkbox"
                                                                                            name="sub_category[]"
                                                                                            value="{{ $sub_category->slug }}"
                                                                                            @if (!empty($filtersubCat) && in_array($sub_category->slug, $filtersubCat)) checked @endif
                                                                                            onchange="this.form.submit()">
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
                                                                                        <div class="accordion-item">
                                                                                            @php
                                                                                                $sub_sub_categorys = App\Models\Admin\SubCategory::getSubSubcatBySubCat(
                                                                                                    $sub_category->id,
                                                                                                );
                                                                                            @endphp
                                                                                            @if (!empty($_GET['sub_sub_category']))
                                                                                                @php
                                                                                                    $filtersubsubCat = explode(
                                                                                                        ',',
                                                                                                        $_GET[
                                                                                                            'sub_sub_category'
                                                                                                        ],
                                                                                                    );
                                                                                                @endphp
                                                                                            @endif
                                                                                            @if (!empty($sub_sub_categorys))
                                                                                                @foreach ($sub_sub_categorys as $item)
                                                                                                    <h2 class="accordion-header sub-accordion-header"
                                                                                                        id="flush-heading{{ $sub_category->id }}">
                                                                                                        <label
                                                                                                            class="tick">
                                                                                                            <input
                                                                                                                type="checkbox"
                                                                                                                name="sub_sub_category[]"
                                                                                                                value="{{ $item->slug }}"
                                                                                                                @if (!empty($filtersubsubCat) && in_array($item->slug, $filtersubsubCat)) checked @endif
                                                                                                                onchange="this.form.submit()">
                                                                                                            <span
                                                                                                                class="check"
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
                                    </div>
                                </div>
                            </div>
                            @if (!empty($brand_logo))
                                <div class="accordion-item rounded-0">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed main_color" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                            aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            Manufacturers
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="shadow accordion-collapse collapse"
                                        aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="p-3 py-0 accordion-body">
                                            <div class="py-3">
                                                @if (!empty($_GET['brand']))
                                                    @php
                                                        $filterBrand = explode(',', $_GET['brand']);
                                                    @endphp
                                                @endif

                                                @foreach ($brands as $brand)
                                                    <div class="px-2 py-2 form-inline d-flex align-items-center"
                                                        style="border-bottom: 1px solid #00000026;"> <label
                                                            class="tick">{{ $brand->title }}
                                                            <input type="checkbox" name="brand[]"
                                                                value="{{ $brand->slug }}"
                                                                @if (!empty($filterBrand) && in_array($brand->slug, $filterBrand)) checked @endif
                                                                onchange="this.form.submit()">
                                                            <span class="check"></span> </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="accordion-item rounded-0">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed main_color" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                        aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                        Price Range
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="shadow accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="p-3 py-0 accordion-body">
                                        <div class="py-3">
                                            <div class="product_list_price">
                                                <div id="slider-range" class="price-filter-range text-success"
                                                    data-min="0" data-max="20000" style="margin-bottom:0.7rem;"></div>
                                                <input type="hidden" id="price_range" name="price_range"
                                                    value="">
                                                @if (!empty($_GET['price']))
                                                    <input class="mb-2 form-control form-control-sm" type="text"
                                                        id="amount" value="USD $ {{ $_GET['price'] }}" readonly>
                                                @else
                                                    <input class="mb-2 form-control form-control-sm" type="text"
                                                        id="amount" value="USD $0 - $20000" readonly>
                                                @endif
                                            </div>

                                            <div id="sticker">
                                                <div class="product_apply_filter_btn d-flex justify-content-center">
                                                    <button class="p-2 common_button2 w-100" type="submit">Apply
                                                        Filters</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <!-- Products Section -->
                    <section id="products">
                        <div class="container py-3">
                            <header class="px-2 py-2 mb-2 product_showing">
                                <div class="form-inline d-flex justify-content-between align-items-center">
                                    <span class="mr-md-auto">
                                        @if ($products)
                                            {{ $products->count() }} Items
                                        @else
                                            No Item
                                        @endif
                                        found
                                    </span>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-2 me-2">
                                            <select class="show form-select rounded-0 product_btn_dropdown" name="show"
                                                onchange="this.form.submit();" data-placeholder="Results Per Page"
                                                aria-label="Default select example">
                                                <option value="">Default Show</option>
                                                <option value="7" @if (!empty($_GET['show']) && $_GET['show'] == '7') selected @endif>
                                                    Per Page: 7</option>
                                                <option value="10" @if (!empty($_GET['show']) && $_GET['show'] == '10') selected @endif>
                                                    Per Page: 10</option>
                                                <option value="20" @if (!empty($_GET['show']) && $_GET['show'] == '20') selected @endif>
                                                    Per Page: 20</option>
                                                <option value="40" @if (!empty($_GET['show']) && $_GET['show'] == '40') selected @endif>
                                                    Per Page: 40</option>
                                            </select>
                                        </div>
                                        <div class="ml-2 me-2">
                                            <select class="show form-select rounded-0" name="show"
                                                onchange="this.form.submit();" data-placeholder="Results Per Page"
                                                aria-label="Default select example">
                                                <option value="">Deafult Sorting</option>
                                                <option value="titleASC"
                                                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleASC') selected @endif>Ascending By Name
                                                </option>
                                                <option value="priceASC"
                                                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceASC') selected @endif> Ascending By
                                                    Price
                                                </option>
                                                <option value="titleDESC"
                                                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleDESC') selected @endif>Descending By
                                                    Name
                                                </option>
                                                <option value="priceDESC"
                                                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDESC') selected @endif>Descending By
                                                    Price
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!-- sect-heading -->
                            {{-- @php
                                dd($products->appends(request()->query()));
                            @endphp --}}
                            <div class="row">

                                <div class="container mt-1 mb-5">
                                    <div class="d-flex justify-content-center row">
                                        @if (count($products) > 0)
                                            <!-- First Product Start -->
                                            @foreach ($products as $product)
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="p-2 m-0 bg-white row rounded-0 d-flex align-items-center"
                                                        style="border-bottom: 2px solid #dee2e6;">
                                                        <div class="mt-1 col-md-3 ">
                                                            <img class="img-fluid img-responsive rounded-0 product-image"
                                                                src="{{ asset($product->thumbnail) }}"
                                                                alt="{{ $product->name }}">
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="row d-flex align-items-center">
                                                                <div class="col-lg-9 col-sm-12">
                                                                    <a
                                                                        href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                                        <h4 class="my-3" style="color: #ae0a46;">
                                                                            {{ $product->name }}</h4>
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-12">
                                                                    @if ($product->qty > 0)
                                                                        <h6 class="text-success font-number text-end"
                                                                            style="font-size:16px; text-transform:capitalize;">
                                                                            <i class="fa-solid fa-circle-check"
                                                                                style="font-size:15px !important;"></i> in
                                                                            stock
                                                                        </h6>
                                                                    @else
                                                                        <h6 class="text-end text-success"
                                                                            style="font-size:20px; text-transform:capitalize;">
                                                                            {{ ucfirst($product->stock) }}</h6>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mt-1 col-lg-6 col-sm-12">
                                                                    <div>
                                                                        <span style="font-size: 14px;">
                                                                            SKU #: {{ $product->sku_code }} |
                                                                            MF #: {{ $product->mf_code }} |
                                                                            <br> NG #: {{ $product->product_code }}
                                                                        </span>
                                                                        <br>
                                                                        {{-- <p>
                                                                            {!! Str::limit($product->short_desc, 180) !!}
                                                                        </p> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="mt-1 text-center col-lg-6 col-sm-12">
                                                                    <div class="text-end">
                                                                        @if ($product->rfq != 1)
                                                                            @if (!empty($product->discount))
                                                                                <h3 class="mr-1 font-number text-end">$
                                                                                    {{ $product->discount }}</h3>
                                                                                <span class="strike-text">$
                                                                                    {{ $product->price }}</span>
                                                                            @else
                                                                                <div
                                                                                    class="d-flex justify-content-end align-items-center">
                                                                                    <small class="text-info me-2"
                                                                                        style="font-size: 18px;">USD</small>
                                                                                    <h4 class="mr-1 font-number text-end">$
                                                                                        {{ $product->price }}</h4>
                                                                                </div>
                                                                            @endif
                                                                        @endif

                                                                    </div>
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
                                                                    @if ($product->rfq != 1)
                                                                        @php
                                                                            $cart = Cart::content();
                                                                            $exist = $cart->where('id', $product->id);

                                                                        @endphp
                                                                        @if ($cart->where('id', $product->id)->count())
                                                                            <div class="text-end">
                                                                                <span class="common_button6">Already in
                                                                                    Cart</span>
                                                                            </div>
                                                                        @else
                                                                        @endif
                                                                    @else
                                                                        <div class="text-end">
                                                                            {{-- <a href="{{ route('product.details', $product->slug) }}"
                                                                                class="common_button effect01">Details</a> --}}

                                                                            <button
                                                                                class="header_cart_button search-btn-price add_to_cart cart_button_text{{ $product->id }}"
                                                                                data-id="{{ $product->id }}"
                                                                                data-name="{{ $product->name }}"
                                                                                data-quantity="1"
                                                                                onclick="addToCart(event, this)">
                                                                                {{ $productInCart ? '✓ Added' : '+ Add RFQ' }}
                                                                            </button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- First Product End -->
                                        @else
                                            <div class="col-md-12 col-sm-12">
                                                <div
                                                    class="p-2 m-0 bg-white border rounded shadow-lg row d-flex align-items-center">
                                                    <h4 class="text-center text-danger">No Product Found. Search again.
                                                    </h4>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            {{ $products->appends(request()->query())->links() }}
                                        </ul>

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </div>

    <!-------- End--------->


    <!--=======// Popular products //======-->
    <section>
        <div class="container p-0 my-4">
            <div class="Container spacer">
                <h3 class="Head main_color">Related Products <span class="Arrows"></span></h3>
                <!-- Carousel Container -->
                <div class="SlickCarousel">
                    @if ($related_products)
                        @foreach ($related_products as $item)
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
                                                            <a href="{{ route('askForPrice', $item->slug) }}"
                                                                class="px-3 py-2 text-black bg-transparent border btn-color popular_product-button">
                                                                Ask For Price
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'rfq')
                                                        <div>
                                                            <div class="py-3 price">
                                                                {{-- <small class="price-usd">USD</small>
                                                        --.-- $ --}}
                                                            </div>
                                                            <a href="{{ route('askForPrice', $item->slug) }}"
                                                                class="px-3 py-2 text-black bg-transparent border btn-color popular_product-button">
                                                                Ask For Price
                                                            </a>
                                                        </div>
                                                    @elseif ($item->price_status && $item->price_status == 'offer_price')
                                                        <div>
                                                            <div class="py-3 price">
                                                                <small class="price-usd">USD</small>
                                                                $ {{ number_format($item->price, 2) }}
                                                            </div>
                                                            <a href="{{ route('rfq') }}"
                                                                class="d-flex justify-content-center align-items-center"
                                                                {{-- data-bs-toggle="modal"
                                                            data-bs-target="#rfq{{ $item->id }}" --}}>
                                                                <button class="btn-color" {{-- data-bs-toggle="modal"
                                                                data-bs-target="#askProductPrice" --}}>
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





@endsection
