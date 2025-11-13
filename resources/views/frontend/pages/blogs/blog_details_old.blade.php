@extends('frontend.master')
@section('content')

    {{-- Blog Updated  --}}
    <style>
        .blog_header {
            background-image: url(../images/buy-category-hero.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* padding: 180px 0px; */
            height: 360px;
        }

        .special_character {
            color: #ae0a46;
            font-weight: bold;
        }

        .date_blog {
            font-family: 'Poppins', sans-serif !important;
        }

        .blog_feature_description {
            border-left: 5px solid #ae0a46;
            border-right: 5px solid #ae0a46;
            padding: 20px 20px 20px;
            overflow-wrap: break-word;
            text-align: justify;
            background-color: #f7f6f5;
        }

        .blog_feature_extra {
            text-align: justify;
        }

        .tag_btn {
            background-color: #f7f6f5;
            color: black;
            font-size: 13px;
            padding: 5px;
        }

        .tag_title {
            background-color: #ae0a46;
            color: #fff;
        }

        .blogins_tags a {
            color: #808080;
        }
    </style>

    <!--======// Header Title //======-->
    <section class="blog_header" style="background-image: url('{{ asset('storage/' . $blog->image) }}');">
        <h1 class="text-center text-white pt-5">{{ $blog->badge }}</h1>
        <div class="container ">
            <div class="row ">
            </div>
        </div>
    </section>
    <!----------End--------->
    @php

        $industry_ids = json_decode($blog->industry_id);
        $category_ids = json_decode($blog->category_id);
        $brand_ids = json_decode($blog->brand_id);
        $solution_ids = json_decode($blog->solution_id);
        // dd($without_last_tags);
    @endphp
    <!--======// Home Cart Section //======-->
    <section class="">
        <div class="container">
            <!-- wrapper -->
            <div class="row m-0">
                <!-- home card item -->
                <div class="col-lg-12 col-sm-12 shadow-lg px-5 py-3 text-center  bg-white" style="margin-top: -4.5rem; ">
                    <h1> {{ $blog->title }}</h1>
                    <div class="d-flex justify-content-between">

                        <p>
                            @if (!empty($blog->created_by))
                                By <span class="special_character">{{ $blog->created_by }}</span>
                            @endif
                            <span class="date_blog">/ {{ $blog->created_at->format('Y-m-d') }} /
                            </span>
                            @if (!empty($blog->tags))
                                @php
                                    $tags = array_filter(array_map('trim', explode(',', $blog->tags)));
                                @endphp
                                Topics :
                                @foreach ($tags as $index => $tag)
                                    <span class="special_character">
                                        <i class="fa-regular fa-bookmark"></i> {{ $tag }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        </p>
                        <div class="bySocial col-3">
                            <ul class="social-icon-links pull-right" style="font-size: 1.5rem;">
                                {!! Share::page(url('/blog/' . $blog->id . '/details'))->facebook()->twitter()->whatsapp() !!}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- home card end -->
    <section>
        <div class="container mt-5 px-2">
            <div class="row m-0">
                <div class="col-4 d-flex justify-content-start ms-2" style="border-top: 4px dotted red">

                </div>
            </div>
            <div class="row m-0 px-3">
                <div class="col-12 d-flex justify-content-center border-top-info">
                    <h4 class="text-center py-4">{!! $blog->header !!}</h4>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-4 ">

                </div>
                <div class="col-4 ">

                </div>

                <div class="col-4" style="border-bottom: 4px dotted red">

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="blog_feature_description">
                        <p>{!! $blog->short_des !!}</p>
                    </div>
                    <div>
                        <div class="blog_feature_extra py-5">
                            <p>{!! $blog->long_des !!}</p>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="callout m-0 p-4 text-center">
                            <p><strong>{!! $blog->footer !!} </strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 ">
                    {{-- Releted Industry --}}
                    <div class="border my-3">
                        <h4 class="text-center py-1 tag_title">Releted Industry</h4>
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="col">
                                @if ($industry_ids)
                                    @foreach ($industry_ids as $item)
                                        @php
                                            $item = str_replace('"', '', $item);
                                        @endphp
                                        <a href=""
                                            class="btn tag_btn">{{ App\Models\Admin\Industry::where('id', $item)->value('title') }}</a>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Releted Categories --}}
                    <div class="border my-3">
                        <img class="img-fluid" src="https://source.unsplash.com/random/580x360" alt="">
                    </div>
                    {{-- Releted Brand --}}
                    <div class="border my-3">
                        <h4 class="text-center py-1 tag_title">Releted Categories</h4>
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="col">
                                @if ($category_ids)
                                    @foreach ($category_ids as $item)
                                        @php
                                            $item = str_replace('"', '', $item);
                                        @endphp
                                        <a href=""
                                            class="btn tag_btn">{{ App\Models\Admin\Category::where('id', $item)->value('title') }}</a>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Releted Categories --}}
                    <div class="border my-3">
                        <h4 class="text-center py-1 tag_title">Releted Brand</h4>
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="col">
                                @if ($brand_ids)
                                    @foreach ($brand_ids as $item)
                                        @php
                                            $item = str_replace('"', '', $item);
                                        @endphp
                                        <a href=""
                                            class="btn tag_btn">{{ App\Models\Admin\Brand::where('id', $item)->value('title') }}</a>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Add Image --}}
                    <div class="border my-3">
                        <img class="img-fluid" src="https://source.unsplash.com/random/480x360" alt="">
                    </div>

                    {{-- Releted Solution --}}
                    <div class="border my-3 ">
                        <h4 class="text-center py-1 tag_title">Releted Solution</h4>
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="col">
                                @if ($solution_ids)
                                    @foreach ($solution_ids as $item)
                                        @php
                                            $item = str_replace('"', '', $item);
                                            $data = App\Models\Admin\SolutionDetail::where('id', $item)->first([
                                                'name',
                                                'slug',
                                            ]);
                                        @endphp
                                        @if ($data)
                                            <a href="{{ route('solution.details', $data->slug) }}"
                                                class="btn tag_btn">{{ $data->name }}</a>
                                        @endif
                                    @endforeach
                                @endif

                            </div>

                        </div>
                    </div>
                    {{-- Add Image --}}
                    <div class="border my-3">
                        <img class="img-fluid" src="https://source.unsplash.com/random/680x360" alt="">
                    </div>
                    {{-- Releted Solution --}}
                    @if (!empty($blog->tags))
                        <div class="border my-3 ">
                            <h4 class="text-center py-1 tag_title">TAGS</h4>
                            <div class="text-start p-2">
                                @foreach ($tags as $item)
                                    <a href="" class=" text-black">#{{ $item }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>



@endsection
