@extends('frontend.master')
@section('content')
    @include('frontend.pages.blogs.style_partial')
    <div>
        <section class="blogs-banners" style="background-image: url('{{ asset('frontend/images/blog.jpg') }}');">

        </section>
        @if ($featured_storys->count())
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card research-alert-box bg-white shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-end" style="padding: 5px 1.5rem;">
                                        <h2 class="mb-0 fw-bold">Recent Blogs</h2>
                                        <div class="research-page__research-alerts-header-threat d-flex">
                                            Today's Landscape
                                            <div style="margin-top: -12px" class="ps-2">
                                                <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 31.998 29.996">
                                                    <g id="Group_7171" data-name="Group 7171"
                                                        transform="translate(0.002 -1.004)">
                                                        <path id="Path_12136" data-name="Path 12136"
                                                            d="M31.633,26.522,18.683,2.6a3.053,3.053,0,0,0-5.366,0L.367,26.522A3,3,0,0,0,.43,29.514,3.024,3.024,0,0,0,3.05,31h25.9a3.038,3.038,0,0,0,2.683-4.478ZM17.848,11l-.714,10h-2L14.42,11ZM16.134,27a1.778,1.778,0,1,1,1.778-1.778A1.778,1.778,0,0,1,16.134,27Z"
                                                            fill="#ff8e3d" />
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="research-page__research-alerts-list" style="padding: 5px 1.5rem;">
                                        @foreach ($featured_storys as $featured_story)
                                            <li>
                                                <a href="{{ route('blog.details', $featured_story->slug) }}" class="text-muted">
                                                    {{ $featured_story->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="fw-bold text-center mt-5">Check NGEN IT Blogs</h1>
                    </div>
                    <div class="col-lg-12 my-0 my-lg-5">
                        <div class="row">
                            <div class="col-lg-3">
                                <!-- Category Tabs -->
                                <ul class="nav nav-tabs flex-column border-0"
                                    style="border-right: 1px solid #eee !important" id="categoryTab" role="tablist">

                                    @foreach ($categories as $key => $category)
                                        @if ($category->blogs->count())
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link research-box-nav-btn w-100 {{ $key === 0 ? 'active' : '' }}"
                                                    id="tab-{{ $category->slug }}-tab" data-bs-toggle="tab"
                                                    data-bs-target="#tab-{{ $category->slug }}" type="button"
                                                    role="tab" aria-controls="tab-{{ $category->slug }}"
                                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                                    <span class="research-box-nav-btn-title">{{ $category->title }}</span>
                                                </button>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-lg-9">
                                <!-- Category Blog Panels -->
                                <div class="tab-content">
                                    @foreach ($categories as $key => $category)
                                        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                            id="tab-{{ $category->slug }}" role="tabpanel"
                                            aria-labelledby="tab-{{ $category->slug }}-tab">

                                            @if ($category->blogs->count())
                                                @foreach ($category->blogs as $blog)
                                                    <div class="row ps-0 ps-lg-5 mb-4">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <img class="img-fluid rounded-2"
                                                                    src="{{ asset("storage/{$blog->image}" ?? 'frontend/img/default.jpg') }}"
                                                                    alt="{{ $blog->title }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p class="pt-4 ps-lg-4 ps-0">
                                                                {{ Str::words($blog->title, 10) }}
                                                            </p>
                                                            <p class="pt-4 ps-lg-4 ps-0">
                                                                {{ Str::limit(strip_tags($blog->short_des), 200) }}
                                                            </p>
                                                            <a href="{{ route('blog.details', $blog->slug) }}"
                                                                class="text-primary fw-semibold ps-lg-4 ps-0">
                                                                <small>Read More</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-muted ps-lg-4">No blogs available under this category yet.
                                                </p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <hr />
        {{-- <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-end blog-socials">
                            <a href="blog-single.html" class="fs-3 pe-3">
                                <span tooltip="Youtube">
                                    <i class="fab fa-youtube blogs-icons"></i>
                                </span>
                            </a>
                            <a href="blog-single.html" class="fs-3 pe-3">
                                <span tooltip="Linkedin">
                                    <i class="fab fa-linkedin-in blogs-icons"></i>
                                </span>
                            </a>
                            <a href="blog-single.html" class="fs-3 pe-3">
                                <span tooltip="Global">
                                    <i class="fas fa-globe blogs-icons"></i>
                                </span>
                            </a>
                            <a href="blog-single.html" class="fs-3">
                                <span tooltip="Email">
                                    <i class="fas fa-envelope blogs-icons"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="pt-5">
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 offset-md-2">

                        @foreach ($latestblogs as $latestblog)
                            <div class="mb-5">
                                <a href="{{ route('blog.details', $latestblog->slug) }}">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="blog-list-img">
                                                @if (!empty($latestblog->image) && file_exists(storage_path('app/public/' . $latestblog->image)))
                                                    <img class="img-fluid rounded-2"
                                                        src="{{ asset('storage/' . $latestblog->image) }}"
                                                        alt="{{ $latestblog->title }}" />
                                                @endif
                                                <div class="overlay-blogs">
                                                    <div class="text-center">
                                                        <div class="pb-4 blog-link-icons">
                                                            <i class="fas fa-paperclip fs-1 text-white"></i>
                                                        </div>
                                                        <p>{{ $latestblog->title }}</p>
                                                        <span class="text-black fw-normal">{{ $latestblog->badge }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="blog-list-content">
                                                <h4 class="fw-bold text-black">{{ $latestblog->title }}</h4>
                                                <p class="pt-4 text-muted">{{ $latestblog->header }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <div class="blog-footer text-start">
                                            <p class="mb-0 py-2">
                                                @if (!empty($latestblog->created_by))
                                                    By <span class="blog-color">
                                                        <a href="{{ route('blog.details', $latestblog->slug) }}"
                                                            class="blog-color links">
                                                            {{ $latestblog->created_by }}
                                                        </a>
                                                    </span> |
                                                @endif

                                                @if ($latestblog->created_at)
                                                    <span>{{ $latestblog->created_at->format('Y-m-d') }}</span> |
                                                @endif

                                                @if (!empty($latestblog->tags))
                                                    @php
                                                        $tags = array_filter(
                                                            array_map('trim', explode(',', $latestblog->tags)),
                                                        );
                                                        $limitedTags = array_slice($tags, 0, 3);
                                                    @endphp
                                                    <span>
                                                        @foreach ($limitedTags as $tag)
                                                            <a href="{{ route('blog.details', $latestblog->slug) }}"
                                                                class="blog-color links">
                                                                {{ $tag }}
                                                            </a>
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                @endif
                                            </p>
                                            <p class="mb-0">
                                                <a href="{{ route('blog.details', $latestblog->slug) }}"
                                                    class="blog-color blog-more">
                                                    Read More <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Dynamic Pagination -->
                        <div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    {{-- Previous Page Link --}}
                                    <li class="page-item {{ $latestblogs->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link blog-bg-color text-black"
                                            href="{{ $latestblogs->previousPageUrl() ?? '#' }}">
                                            Previous
                                        </a>
                                    </li>

                                    {{-- Page Number Links --}}
                                    @for ($i = 1; $i <= $latestblogs->lastPage(); $i++)
                                        @if (
                                            $i == 1 ||
                                                $i == $latestblogs->lastPage() ||
                                                ($i >= $latestblogs->currentPage() - 1 && $i <= $latestblogs->currentPage() + 1))
                                            <li class="page-item {{ $latestblogs->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link blog-color"
                                                    href="{{ $latestblogs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @elseif ($i == 2 && $latestblogs->currentPage() > 3)
                                            <li class="page-item"><span class="page-link blog-color">...</span></li>
                                        @elseif ($i == $latestblogs->lastPage() - 1 && $latestblogs->currentPage() < $latestblogs->lastPage() - 2)
                                            <li class="page-item"><span class="page-link blog-color">...</span></li>
                                        @endif
                                    @endfor

                                    {{-- Next Page Link --}}
                                    <li class="page-item {{ $latestblogs->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link blog-color" href="{{ $latestblogs->nextPageUrl() ?? '#' }}">
                                            Next
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>


                    </div>
                    {{-- <div class="col-md-3 order-1 order-md-2 mb-4 mb-lg-0">
                        <div>
                            <h4>Search</h4>
                            <form action="">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary rounded-0 search-btn" type="button"
                                        id="button-addon1">
                                        <i class="fab fa-sistrix"></i>
                                    </button>
                                    <input type="text" class="form-control search-inputs" placeholder="Search..."
                                        aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                </div>
                            </form>
                        </div>

                        <div class="border mt-4 text-center p-5 pt-4">
                            <h5 class="">e-news</h5>
                            <p class="pt-3">
                                Subscribe to our newsletter and receive regularly news and
                                interesting information around the world of automation
                            </p>
                            <div class="mt-4">
                                <a class="button fusion-button button-orange fusion-button-default-size button-default-size button-flat fusion-mobile-button continue-center"
                                    style="-webkit-box-shadow: none;-moz-box-shadow: none;box-shadow: none;border-radius: 4px 4px 4px 4px;"
                                    href="https://www.pepperl-fuchs.com/e-news" target="_blank"
                                    rel="noopener noreferrer"><span>Subscribe</span></a>
                            </div>
                        </div>
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold mt-5">
                                Releted Blog
                            </h5>
                        </div>
                        <div class="border mt-4">
                            <ul class="nav nav-tabs flex-column border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn active w-100" id="tabs-one-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-one" type="button" role="tab"
                                        aria-controls="tabs-one" aria-selected="true">
                                        <span class="research-box-nav-btn-title">Vulnerability Intelligence</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-two-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-two" type="button" role="tab"
                                        aria-controls="tabs-two" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Audits & Compliance</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-three-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-three" type="button" role="tab"
                                        aria-controls="tabs-three" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Security Response</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-four-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-four" type="button" role="tab"
                                        aria-controls="tabs-four" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Zero-Day Research</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-five-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-five" type="button" role="tab"
                                        aria-controls="tabs-five" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Attack Path Research</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link research-box-nav-btn w-100" id="tabs-six-tab"
                                        data-bs-toggle="tab" data-bs-target="#tabs-six" type="button" role="tab"
                                        aria-controls="tabs-six" aria-selected="false">
                                        <span class="research-box-nav-btn-title">Asset Management</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mt-5 mt-lg-0">
                        <h1 class="fw-bold text-start">Related Contents</h1>
                    </div>

                    {{-- Client Stories --}}
                    <div class="col-lg-6 mb-4">
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold">
                                Client Stories
                            </h5>
                        </div>
                        <div class="row mb-4">
                            @foreach ($client_storys as $story)
                                <div class="col-lg-6 mb-3">
                                    <div class="card recent-blogs">
                                        @if (!empty($story->image) && file_exists(storage_path('app/public/' . $story->image)))
                                            <img class="card-img-top" src="{{ asset('storage/' . $story->image) }}"
                                                alt="{{ $story->title }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title date">
                                                {{ $story->created_at ? $story->created_at->format('F d, Y') : '' }}</h5>
                                            <h5 class="card-title recent-items">
                                                <a href="{{ route('story.details', $story->slug) }}"
                                                    class="text-dark">
                                                    {{ Str::limit($story->title, 60) }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tech Glossys --}}
                    <div class="col-lg-6 mb-4">
                        <div>
                            <h5 class="title-border-bottom text-center mt mb0 fw-bold">
                                Tech Contents
                            </h5>
                        </div>
                        <div class="row mb-4">
                            @foreach ($tech_glossys as $tech)
                                <div class="col-lg-6 mb-3">
                                    <div class="card recent-blogs">
                                        @if (!empty($tech->image) && file_exists(storage_path('app/public/' . $tech->image)))
                                            <img class="card-img-top" src="{{ asset('storage/' . $tech->image) }}"
                                                alt="{{ $tech->title }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title date">
                                                {{ $tech->created_at ? $tech->created_at->format('F d, Y') : '' }}</h5>
                                            <h5 class="card-title recent-items">
                                                <a href="{{ route('techglossy.details', $tech->slug) }}"
                                                    class="text-dark">
                                                    {{ Str::limit($tech->title, 60) }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
