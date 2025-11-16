@extends('frontend.master')
@section('content')
@include('frontend.pages.blogs.style_partial')
<section class="blogs-banners" style="background-image: url('{{ asset('frontend/images/blog.jpg') }}');"></section>
@if ($featured_storys->count())
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white shadow-sm card research-alert-box">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end" style="padding: 5px 1.5rem;">
                            <h2 class="mb-0 fw-bold">Featured Blogs</h2>
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
                <h1 class="mt-5 text-center fw-bold">Check NGEN IT Blogs</h1>
            </div>
            <div class="my-0 col-lg-12 my-lg-5">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- Category Tabs -->
                        <ul class="border-0 nav nav-tabs flex-column"
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
                                <div class="mb-4 row ps-0 ps-lg-5">
                                    <div class="col-lg-6">
                                        <div>
                                            <img class="img-fluid rounded-2"
                                                src="{{ asset("storage/{$blog->image}" ?? 'frontend/img/default.jpg') }}"
                                                alt="{{ $blog->title }}"
                                                style="height:300px; width: 450px; object-fit: cover;"
                                                onerror="this.onerror=null; this.src='https://www.ngenitltd.com/storage/k06EW1KUagU4qQ5O1694857982.jpg';">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="pt-4 ps-lg-4 ps-0">
                                            {{ Str::words($blog->title, 10) }}
                                        </h4>
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
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="order-2 col-md-8 order-md-1 offset-md-2">
                @foreach ($latestblogs as $latestblog)
                <div class="mb-5">
                    <a href="{{ route('blog.details', $latestblog->slug) }}">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="blog-list-img">
                                    <img class="img-fluid rounded-2"
                                        src="{{ asset('storage/' . $latestblog->image) }}"
                                        alt="{{ $latestblog->title }}"
                                         style="height:300px; width: 450px; object-fit: cover;"
                                        onerror="this.onerror=null; this.src='https://www.ngenitltd.com/storage/k06EW1KUagU4qQ5O1694857982.jpg';" />
                                    <div class="overlay-blogs">
                                        <div class="text-center">
                                            <!-- <div class="pb-4 blog-link-icons">
                                                <i class="text-white fas fa-paperclip fs-1"></i>
                                            </div> -->
                                            <p>{{ $latestblog->title }}</p>
                                            <span class="text-black fw-normal">{{ $latestblog->badge }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="blog-list-content">
                                    <h4 class="text-black fw-bold">{{ $latestblog->title }}</h4>
                                    <p class="pt-4 text-muted">{{ $latestblog->header }}</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="mt-5 row">
                        <div class="col-lg-12">
                            <div class="blog-footer text-start">
                                <p class="py-2 mb-0">
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
                                <a class="text-black page-link blog-bg-color"
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
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="mb-5 row">
            <div class="mt-5 col-lg-12">
                <h1 class="fw-bold text-start">Related Contents</h1>
            </div>
        </div>
        <div class="row">
            {{-- Client Stories --}}
            <div class="mb-4 col-lg-6">
                <h5 class="pb-2 mb-3 text-start fw-bold position-relative" style="border-bottom: 3px solid #eee;">
                    Client Stories
                </h5>

                <div class="row g-3">
                    @foreach ($client_storys as $story)
                    <div class="col-lg-6">
                        <div class="overflow-hidden border-0 shadow-sm card h-100 rounded-3 hover-scale">
                            <div class="position-relative">
                                <img class="card-img-top w-100"
                                    src="{{ $story->image ? asset('storage/' . $story->image) : 'https://www.ngenitltd.com/storage/k06EW1KUagU4qQ5O1694857982.jpg' }}"
                                    alt="{{ $story->title }}"
                                    style="height: 220px; object-fit: cover; display: block;"
                                    onerror="this.onerror=null; this.src='https://www.ngenitltd.com/storage/k06EW1KUagU4qQ5O1694857982.jpg';">
                                <div class="top-0 transition-opacity bg-opacity-25 opacity-0 overlay position-absolute start-0 w-100 h-100 bg-dark d-flex align-items-center justify-content-center">
                                    <i class="text-white fas fa-eye fs-2"></i>
                                </div>
                            </div>

                            <div class="p-3 card-body d-flex flex-column">
                                <p class="mb-1 text-muted fs-7">
                                    {{ $story->created_at ? $story->created_at->format('F d, Y') : 'Recent' }}
                                </p>
                                <h6 class="mb-0 card-title fw-bold ">
                                    <a href="{{ route('story.details', $story->slug) }}" class="text-dark text-decoration-none">
                                        {{ Str::limit($story->title, 60) }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Tech Glossys --}}
            <div class="mb-4 col-lg-6">
                <h5 class="pb-2 mb-3 text-start fw-bold position-relative" style="border-bottom: 3px solid #eee;">
                    Tech Contents
                </h5>

                <div class="row g-3">
                    @foreach ($tech_glossys as $tech)
                    <div class="col-lg-6">
                        <div class="overflow-hidden border-0 shadow-sm card h-100 rounded-3 hover-scale">
                            <div class="position-relative">
                                <img class="card-img-top w-100"
                                    src="{{ $tech->image ? asset('storage/' . $tech->image) : 'https://www.ngenitltd.com/storage/k06EW1KUagU4qQ5O1694857982.jpg' }}"
                                    alt="{{ $tech->title }}"
                                    style="height: 220px; object-fit: cover; display: block;"
                                    onerror="this.onerror=null; this.src='https://www.ngenitltd.com/storage/k06EW1KUagU4qQ5O1694857982.jpg';">
                                <div class="top-0 transition-opacity bg-opacity-25 opacity-0 overlay position-absolute start-0 w-100 h-100 bg-dark d-flex align-items-center justify-content-center">
                                    <i class="text-white fas fa-eye fs-2"></i>
                                </div>
                            </div>

                            <div class="p-3 card-body d-flex flex-column">
                                <p class="mb-1 text-muted fs-7">
                                    {{ $tech->created_at ? $tech->created_at->format('F d, Y') : 'Recent' }}
                                </p>
                                <h6 class="mb-0 card-title fw-bold ">
                                    <a href="{{ route('techglossy.details', $tech->slug) }}" class="text-dark text-decoration-none">
                                        {{ Str::limit($tech->title, 60) }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
@endsection