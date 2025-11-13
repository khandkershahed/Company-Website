@extends('frontend.master')
@section('content')
    @include('frontend.pages.blogs.style_partial')
    <main style="background-color: #dcecfa" class="py-0 py-lg-5 pb-5">
        <div class="container pb-5" style="background-color: #dcecfa" class="py-0 py-lg-5 pb-5">
            <div class="row py-5">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span><a href="{{ route('all.blog') }}" class="breadcrumbs-blogs">Blog</a></span>
                            <span>/</span>
                            <span><a href="javascript:void(0);" class="breadcrumbs-blogs">{{ $blog->title }}</a></span>
                        </div>
                        <div>
                            <button id="subscribeBtn" class="btn btn-subscibe rounded-pill">Subscribe</button>
                            <form id="subscriptionForm" action="{{ route('newsletter.store') }}" method="post"
                                style="display: none;">
                                @csrf
                                <div class="d-flex">
                                    <input type="email" name="email" class="form-control me-2"
                                        placeholder="Enter your email" required>
                                    <button type="submit" class="btn btn-subscibe rounded-pill">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row blog-details">
                <div class="col-lg-12">
                    <div class="card contents">
                        <h1>
                            {{ $blog->title }}
                        </h1>
                        <div class="autors">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    {{-- <img width="40" class="img-fluid rounded-circle"
                                        src="https://www.tenable.com/sites/default/files/pictures/2024-10/Shelly-Raban.jpg"
                                        alt="" /> --}}
                                    @if (!empty($blog->created_by))
                                        <span class="ps-3">By {{ $blog->created_by }}</span>
                                    @endif
                                </div>
                                <div class="blog-create">
                                    <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                </div>
                                <div>
                                    <div class="bySocial">
                                        <ul class="social-icon-links pull-right" style="font-size: 1.5rem;">
                                            {!! Share::page(url('/blogs/' . $blog->slug))->facebook()->twitter()->whatsapp() !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-main-content">
                            <p>
                                {{ $blog->header }}
                            </p>
                            @if (!empty($blog->image) && file_exists(storage_path('app/public/' . $blog->image)))
                                <div class="text-center">
                                    <img class="img-fluid rounded-3" src="{{ asset('storage/' . $blog->image) }}"
                                        alt="" />
                                </div>
                            @endif
                            <div class="blog-sub-content">
                                <p>
                                    {!! $blog->short_des !!}
                                </p>
                            </div>
                            <div class="blog-title-content">

                                {!! $blog->long_des !!}

                                <div class="my-5 p-4 text-center"
                                    style="border-top: 1px dotted #f00; border-bottom: 1px dotted #f00;">
                                    <p><strong>{!! $blog->footer !!} </strong></p>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="bySocial">
                                <ul class="social-icon-links pull-right" style="font-size: 1.5rem;">
                                    {!! Share::page(url('/blogs/' . $blog->slug))->facebook()->twitter()->whatsapp() !!}
                                </ul>
                            </div>
                        </div>
                        <!-- Pagination -->
                        {{-- <div style="background-color: #408bea1a" class="w-75 mx-auto p-4 my-5 rounded-3 autor-boxes">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img width="100" class="img-fluid rounded-3"
                                        src="https://staticfiles.acronis.com/images/content/4001b7fac80a9a9ed6a3a01dec591360.webp"
                                        alt="" />
                                </div>
                                <div class="ps-4">
                                    <p class="mb-0">Author</p>
                                    <h2 class="mb-0">{{ $blog->created_by }}</h2>
                                    <p class="mb-0">Content Marketing Creator, Cybersecurity</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="pt-5">
                            <div class="d-flex justify-content-between align-items-center single-pagination">
                                @if ($previous)
                                    <a class="text-start" href="{{ route('blog.details', $previous->slug) }}">
                                        <p>{{ Str::limit($previous->title, 40) }}</p>
                                        <p>
                                            <i class="fas fa-arrow-left"></i>
                                            Previous Post
                                        </p>
                                    </a>
                                @else
                                    <span></span>
                                @endif

                                @if ($next)
                                    <a class="text-end" href="{{ route('blog.details', $next->slug) }}">
                                        <p>{{ Str::limit($next->title, 40) }}</p>
                                        <p>
                                            Next Post
                                            <i class="fas fa-arrow-right"></i>
                                        </p>
                                    </a>
                                @else
                                    <span></span>
                                @endif
                            </div>
                        </div>


                        <div class="pt-5">
                            <div class="tags tags_bottom" data-v-5bdddea5="">
                                @php
                                    $tags = array_filter(array_map('trim', explode(',', $blog->tags)));
                                @endphp
                                @foreach ($tags as $tag)
                                    <a target="_self" href="javascript:void(0)" tabindex="0"
                                        class="a-link tag a-link_type_regular a-link_size_body a-link_glyph_right"
                                        data-v-5bdddea5="">
                                        <span class="a-link__content">
                                            <span class="">{{ $tag }}</span>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="row w-75 mx-auto subscribe-boxes align-items-center">
                                <div class="col-lg-6">
                                    <h3>Stay up-to-date</h3>
                                    <p>Subscribe now for tips, tools and news.</p>
                                </div>
                                <div class="col-lg-6 p-4 rounded-3" style="background-color: #dcecfa">
                                    <div>
                                        <form action="{{ route('newsletter.store') }}" method="post">
                                            @csrf
                                            <div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control rounded-2 py-2"
                                                        placeholder="Email Address" aria-label="Email Address"
                                                        aria-describedby="button-addon2" name="email" />
                                                    <button class="btn btn-outline-secondary rounded-2 ms-2" type="button"
                                                        id="button-addon2">
                                                        Subscribe
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="privacy_policy" id="flexCheckDefault" required />
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    i agree to the
                                                    <a href="{{ route('privacy.policy') }}">NGEN IT Privacy Statement</a>
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section style="background-color: #f5f8fc">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="fw-bold">Related Blogs</h2>
                </div>
            </div>
            <div class="row pt-4">
                @foreach ($related_blogs as $related_blog)
                    <div class="col-lg-3 mb-2">
                        <div class="card recent-blogs">
                            @if (!empty($related_blog->image) && file_exists(storage_path('app/public/' . $related_blog->image)))
                                <img class="card-img-top" height="180px" width="100%"
                                    src="{{ asset('storage/' . $related_blog->image) }}"
                                    alt="{{ $related_blog->title }}">
                            @endif
                            <div class="card-body" style="height: 8rem; padding: 8px 15px;">
                                <p class="card-title date">
                                    {{ $related_blog->created_at ? $related_blog->created_at->format('F d, Y') : '' }}</p>
                                <h6 class="card-title recent-items">
                                    <a href="{{ route('blog.details', $related_blog->slug) }}" class="text-dark">
                                        {{ Str::limit($related_blog->title, 60) }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const subscribeBtn = document.getElementById("subscribeBtn");
            const subscriptionForm = document.getElementById("subscriptionForm");

            if (subscribeBtn && subscriptionForm) {
                subscribeBtn.addEventListener("click", function() {
                    this.style.display = "none"; // Hide the button
                    subscriptionForm.style.display = "block"; // Show the form
                });
            }
        });
    </script>
@endpush
