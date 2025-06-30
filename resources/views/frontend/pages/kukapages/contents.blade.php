@extends('frontend.master')
@section('styles')
    <meta property="og:title" content="{{ ucfirst($brand->title) }} contents in NGen IT">
    <meta property="og:image"
        content="{{ !empty($brandpage->banner_image) && file_exists(public_path('storage/' . $brandpage->banner_image)) ? url('social-image/' . $brandpage->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}" />
    <meta name="twitter:image"
        content="{{ !empty($brandpage->banner_image) && file_exists(public_path('storage/' . $brandpage->banner_image)) ? url('social-image/' . $brandpage->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}">
@endsection
@section('content')
    <style>
        .content-brand {
            height: 20rem;
        }
    </style>
    @include('frontend.pages.kukapages.partial.page_header')
    <section class="header" id="myHeader">
        <div class="container mb-3">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h2 class="company-tab-title">
                        <span style="font-size: 20px;">Technical Brochures</span>
                    </h2>
                </div>
            </div>
            <div class="row my-lg-4 py-lg-4">
                @if (count($techglossys) > 0)
                    @foreach ($techglossys as $techglossy)
                        <div class="col-lg-3 px-0 mx-3 mb-3">
                            <div class="container-area-brand">
                                <div class="content-brand">
                                    <a href="{{ route('techglossy.details', $techglossy->id) }}" target="_blank">
                                        <div class="content-overlay-brand"></div>
                                        <div>
                                            {{-- <img class="content-image" src="{{ asset('storage/' . $techglossy->image) }}"
                                                alt=""> --}}
                                                <img class="img-fluid site-main-logo-contents"
                                                src="{{ !empty($techglossy->image) && file_exists(public_path('storage/' . $techglossy->image)) ? asset('storage/' . $techglossy->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="NGEN IT">
                                        </div>
                                        <div>
                                            <p class="p-1" style="font-size: 16px;text-align:center;">
                                                {{ Str::limit($techglossy->title, 85) }}</p>
                                        </div>
                                        <div class="content-details fadeIn-bottom fadeIn-left-brand">
                                            <p class="brand-news-trends-title">{{ $techglossy->badge }}</p>
                                            <hr class="p-1 pt-1 m-0 text-white">
                                           <div class="tech-contetns-para">
                                            <p>{!! $techglossy->header !!}</p>
                                           </div>
                                            <div class="description-footer-brand inline-center text-white pt-2">
                                                <a href="{{ route('techglossy.details', $techglossy->id) }}"
                                                    class="link text-white"><i class="fa fa-plus-circle me-2"></i>More
                                                    information</a>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="main_color text-center">No Technical Brochures Found !</h4>
                @endif

            </div>
        </div>
        <div class="container mb-3">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h2 class="company-tab-title">
                        <span style="font-size: 20px;">All {{ ucfirst($brand->title) }} Contents</span>
                    </h2>
                </div>
            </div>
            <div class="row my-4 py-4">
                @if (count($contents) > 0)
                    @foreach ($blogs as $blog)
                        <div class="col-lg-3 px-0 mx-3 mb-3 content-sections">
                            <div class="container-area-brand">
                                <div class="content-brand">
                                    <a href="{{ route('blog.details', $blog->id) }}" target="_blank">
                                        <div class="content-overlay-brand"></div>
                                        <div>
                                            {{-- <img class="content-image" src="{{ asset('storage/' . $blog->image) }}"
                                                alt=""> --}}
                                                <img class="img-fluid site-main-logo-contents"
                                                src="{{ !empty($blog->image) && file_exists(public_path('storage/' . $blog->image)) ? asset('storage/' . $blog->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="NGEN IT">
                                        </div>
                                        <div>
                                            <p class="p-1" style="font-size: 16px;text-align:center;">
                                                {{ Str::limit($blog->title, 85) }}</p>
                                        </div>
                                        <div class="content-details fadeIn-bottom fadeIn-left-brand">
                                            <p class="brand-news-trends-title">{{ $blog->badge }}</p>
                                            <hr class="p-1 pt-1 m-0 text-white">
                                            <div class="tech-contetns-para">
                                                <p>{!! $blog->header !!}</p>
                                            </div>
                                            <div class="description-footer-brand inline-center text-white pt-2">
                                                <a href="{{ route('blog.details', $blog->id) }}" class="link text-white"><i
                                                        class="fa fa-plus-circle me-2"></i>More information</a>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($clientStories as $clientStory)
                        <div class="col-lg-3 px-0 mx-3 mb-3">
                            <div class="container-area-brand">
                                <div class="content-brand">
                                    <a href="{{ route('story.details', $clientStory->id) }}" target="_blank">
                                        <div class="content-overlay-brand"></div>
                                        <div>
                                            <img class="img-fluid site-main-logo-contents"
                                                src="{{ !empty($clientStory->image) && file_exists(public_path('storage/' . $clientStory->image)) ? asset('storage/' . $clientStory->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="NGEN IT">
                                        </div>
                                        <div>
                                            <p class="p-1" style="font-size: 16px;text-align:center;">
                                                {{ Str::limit($clientStory->title, 85) }}</p>
                                        </div>
                                        <div class="content-details fadeIn-bottom fadeIn-left-brand">
                                            <p class="brand-news-trends-title">{{ $clientStory->badge }}</p>
                                            <hr class="p-1 pt-1 m-0 text-white">
                                            <p>{!! $clientStory->header !!}</p>
                                            <div class="description-footer-brand inline-center text-white pt-2">
                                                <a href="{{ route('story.details', $clientStory->id) }}"
                                                    class="link text-white"><i class="fa fa-plus-circle me-2"></i>More
                                                    information</a>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="main_color text-center">No Contents Found !</h4>
                @endif

            </div>
        </div>
    </section>

    <section>
        <div class="container related_search_card">
            <div class="row">
                <div class="col">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="company-tab-title">
                                    <span style="font-size: 20px; background-color: #eeeeee;">Related Searches</span>
                                </h2>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row py-3">
                                @foreach ($related_search['categories'] as $related_category)
                                    <div class="col-lg-3 col-6">
                                        <a href="{{ route('category.details', $related_category->slug) }}"
                                            class="related_search_links"><i
                                                class="fa-solid fa-angles-right text-danger"></i>
                                            {{ $related_category->title }} </a>
                                    </div>
                                @endforeach
                                @foreach ($related_search['brands'] as $related_brand)
                                    <div class="col-lg-3 col-6">
                                        <a href="{{ route('brand.overview', $related_brand->slug) }}"
                                            class="related_search_links"><i
                                                class="fa-solid fa-angles-right text-danger"></i>
                                            {{ $related_brand->title }} </a>
                                    </div>
                                @endforeach
                                @foreach ($related_search['solutions'] as $related_solution)
                                    @if (!empty($related_solution->slug))
                                        <div class="col-lg-3 col-6">
                                            <a href="{{ route('solution.details', $related_solution->slug) }}"
                                                class="related_search_links"><i
                                                    class="fa-solid fa-angles-right text-danger"></i>
                                                {{ $related_solution['name'] }}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($related_search['industries'] as $related_industry)
                                    @if (!empty($related_industry->slug))
                                        <div class="col-lg-3 col-6">
                                            <a href="{{ route('industry.details', $related_industry->slug) }}"
                                                class="related_search_links"><i
                                                    class="fa-solid fa-angles-right text-danger"></i>
                                                {{ $related_industry['title'] }} </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->
@endsection
@section('scripts')
    <script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Find the element with the class 'fixed-section'
            var elementToRemoveClassFrom = document.querySelector('.fixed-section');

            // Check if the element is found before attempting to remove the class
            if (elementToRemoveClassFrom) {
                // Remove the class 'fixed-section'
                elementToRemoveClassFrom.classList.remove('fixed-section');
            }
        });
    </script>
@endsection
