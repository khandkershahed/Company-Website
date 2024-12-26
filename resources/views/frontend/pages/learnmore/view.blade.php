@extends('frontend.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        .global_call_section::after {
            background: url('{{ asset('images/homepage-eye-video-frame.jpg') }}');
            content: "";
            position: absolute;
            height: 250px;
            background-position: top center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            background-color: #cbc4c3;
            top: 25%;
            left: 0px;
            z-index: -1;
        }
    </style>
    <!--======// Header Title //======-->
    <section class="common_product_header"
        style="background-image:url('{{ asset('images/Learn-More-Banner-NGen-IT.jpg') }}');">
        {{-- style="background-image: url('{{ asset('storage/' . $learnmore->image_banner) }}');"> --}}
        <div>
            <div class="">
                <div class="container ">
                    {{-- <h1 class="text-capitalize w-50 mx-auto">{{ $learnmore->title }}.</h1> --}}
                    <div class="outcome_assetType mb-4">
                        <a href="#">{{ $learnmore->badge }}</a>
                    </div>
                    @php
                        $sentence = $learnmore->title;

                        $words = str_word_count($sentence, 1);

                        // Get the last word of the sentence using the end() function
                        $last_word = end($words);

                        // Get the second last word of the sentence using the array_slice() and end() functions
                        $last_two_words = array_slice($words, -2, 1);
                        $second_last_word = end($last_two_words);

                        // Get the third last word of the sentence using the array_slice() and end() functions
                        $last_three_words = array_slice($words, -3, 1);
                        $third_last_word = end($last_three_words);
                        //$fourth_last_word = end(array_slice($words, -4, 1));

                        // Calculate the length of the last two words combined
                        $last_three_words_length = strlen($third_last_word) + strlen($second_last_word) + strlen($last_word) + 3; // +2 to account for the spaces between words

                        // Use the substr() function to remove the last two words from the sentence
                        $manipulated_sentence = substr($sentence, 0, -$last_three_words_length);
                        //dd($manipulated_sentence);
                    @endphp
                    <h1 class="text-capitalize w-50 mx-auto">{{ $manipulated_sentence }}</h1>
                    <h2 class="text-white text-center" style=" font-size: 30px; margin-left: -220px;">
                        <span class="normal_text text-capitalize">{{ $third_last_word }} {{ $second_last_word }}</span>
                        <span class="word wisteria ml-2 normal_text fw-bold"> {{ $last_word }}</span>
                        <span class="word wisteria ml-2 normal_text fw-bold"> {{ $last_word }}</span>
                        <span class="word belize ml-2 normal_text fw-bold"> {{ $last_word }}</span>
                        <span class="word pomegranate ml-2 normal_text fw-bold"> {{ $last_word }}</span>
                    </h2>
                    <div class="row ">
                        <!--BUTTON START-->
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="mt-5">
                                <a class="btn-white" href="{{ route('contact') }}">Hear from our team</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------End--------->
    <!--=======// Techincal Expertise //========-->
    <section>
        <div class="container py-3">
            <div class="row py-2">
                <h2 class="text-center text-capitalize py-3 section-titles">{{ $learnmore->header_one }}</h2>
                <p class="text-center py-1">{{ $learnmore->header_two }}</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="wedo-cards__container">
                        <div class="wedo-cards__item"
                            style="background-image: url('{{ asset('frontend/images/Frame 4 (4).jpg') }}');">
                            <div class="wedo-cards__content">
                                <h3 class="wedo-cards__heading">{{ Str::limit($learnmore->box_one_title, 18) }}</h3>
                                <p class="wedo-cards__sub-heading">{!! $learnmore->box_one_short_des !!}. <br>
                                    <a class="wedo-cards__cta" href="{{ $learnmore->box_one_link }}">Explore
                                        {{ $learnmore->box_one_title }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="wedo-cards__container">
                        <div class="wedo-cards__item"
                            style="background-image: url('{{ asset('frontend/images/Frame 4 (5).jpg') }}');">
                            <div class="wedo-cards__content">
                                <h3 class="wedo-cards__heading">{{ Str::limit($learnmore->box_two_title, 18) }}</h3>
                                <p class="wedo-cards__sub-heading">{!! $learnmore->box_two_short_des !!}
                                    <a class="wedo-cards__cta" href="{{ $learnmore->box_two_link }}">Explore
                                        {{ $learnmore->box_two_title }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="wedo-cards__item mt-5"
                        style="background-image: url('{{ asset('frontend/images/Frame 4 (6).jpg') }}');">
                        <div class="wedo-cards__content">
                            <h3 class="wedo-cards__heading">{{ Str::limit($learnmore->box_three_title, 18) }}</h3>
                            <p class="wedo-cards__sub-heading">{!! $learnmore->box_three_short_des !!}
                                <a class="wedo-cards__cta" href="{{ $learnmore->box_three_link }}">Explore
                                    {{ $learnmore->box_three_title }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======// Techincal Expertise //========-->
    <!--======// our clint tab //======-->
    <section>
        <div class="container-fluid rounded-lg bg-light pb-5">
            <div class="container">
                <div class="row">
                    <div class="text-center mt-4">
                        <h3>{{ $learnmore->success_story_title }}</h3>
                    </div>
                    <div>
                        <ul class="nav nav-tabs d-flex justify-content-center border-0 mt-3" id="myTab" role="tablist">
                            @if (!empty($story1->badge))
                                @php
                                    $tags_1 = explode(',', $story1->tags);
                                @endphp
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                        type="button" role="tab" aria-controls="home"
                                        aria-selected="true">{{ $story1->badge }}</button>
                                </li>
                            @endif
                            @if (!empty($story2->badge))
                                @php
                                    $tags_2 = explode(',', $story2->tags);
                                @endphp
                                <li class="nav-item ms-2" role="presentation">
                                    <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">{{ $story2->badge }}</button>
                                </li>
                            @endif
                            @if (!empty($story3->badge))
                                @php
                                    $tags_3 = explode(',', $story3->tags);
                                @endphp
                                <li class="nav-item ms-2" role="presentation">
                                    <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                        type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">{{ $story3->badge }}</button>
                                </li>
                            @endif
                        </ul>


                        <div class="tab-content mt-5 mb-3" id="myTabContent">
                            @if (!empty($story1->badge))
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-5">
                                            <img class="img-fluid story-tab"
                                                src="{{ !empty($story1->image) && file_exists(public_path('storage/' . $story1->image)) ? asset('storage/' . $story1->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="NGEN IT">
                                            {{-- <img class="img-fluid rounded-pill" src="{{ asset('storage/' . $story1->image) }}" alt=""> --}}
                                        </div>
                                        <div class="col-lg-7">
                                            <h2 class="story-title pb-3">{{ $story1->title }}</h2>
                                            <p class="text-justify">{{ $story1->header }}</p>
                                            <div class="text-start p-2">
                                                <a href="{{ route('all.story') }}" class="fw-bold"
                                                    style="color: #ae0a46;">View all client
                                                    stories →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($story2->badge))
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-5">
                                            <img class="img-fluid story-tab"
                                                src="{{ !empty($story2->image) && file_exists(public_path('storage/' . $story2->image)) ? asset('storage/' . $story2->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="NGEN IT">
                                        </div>
                                        <div class="col-lg-7">
                                            <h2 class="story-title pb-3">{{ $story2->title }}</h2>
                                            <p>{{ $story2->header }}</p>
                                            <div class="text-start p-2">
                                                <a href="{{ route('all.story') }}" class="fw-bold"
                                                    style="color: #ae0a46;">View all client
                                                    stories →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($story3->badge))
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-5">
                                            <img class="img-fluid story-tab"
                                                src="{{ !empty($story3->image) && file_exists(public_path('storage/' . $story3->image)) ? asset('storage/' . $story3->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="NGEN IT">
                                        </div>
                                        <div class="col-lg-7">
                                            <h2 class="story-title pb-3">{{ $story3->title }}</h2>
                                            <p>{{ $story3->header }}</p>
                                            <div class="text-start p-2">
                                                <a href="{{ route('all.story') }}" class="fw-bold"
                                                    style="color: #ae0a46;">View all client
                                                    stories →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->
    <!--=====// Global call section //=====-->
    <section class="global_call_section section_padding">
        <div class="container">
            <!-- content -->
            @php
                $sentence = $learnmore->consult_title;
            @endphp
            <div class="global_call_section_content">
                <div class="home_title" style="width: 100%; margin: 0px;">
                    <h5 class="home_title_heading" style="text-align: left; color: #fff;">
                        <span>{{ \Illuminate\Support\Str::substr($sentence, 0, 1) }}</span>{{ \Illuminate\Support\Str::substr($sentence, 1) }}
                    </h5>
                    <p class="home_title_text text-white" style="text-align: left;">{{ $learnmore->consult_short_des }}
                    </p>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('contact') }}" class="btn-white">Explore business outcomes</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------End -------->
    <!--=====// We serve //=====-->
    <div class="container">
        <!-- section title -->
        <div class="clint_help_section_heading_wrapper">
            <!-- title -->
            <h5 class="home_title_heading" style="text-align: left;">
                <h5 class="home_title_heading" style="text-align: left;">
                    <div class="software_feature_title">
                        <h1 class="text-center pt-4 pb-4">
                            Industries We Serve
                        </h1>
                    </div>
                </h5>
                <p class="home_title_text what-we-description">
                    <span class="font-weight-bold">{{ $learnmore->industry_header }} </span>
                </p>
        </div>
        <!-- section content wrapper -->
        <div class="row mb-4">
            <!-- content -->
            <div class="col-lg-9 col-sm-12">
                <!-- we_serveItem_wrapper -->
                <div class="row">
                    <!-- item -->
                    @if ($industrys)
                        @foreach ($industrys as $industry)
                            <div class="col-lg-3 col-sm-6 p-1">
                                <div class="we_serve_item">
                                    <a href="{{ isset($industry->slug) ? route('industry.details', ['id' => $industry->slug]) : '' }}">
                                        <div class="we_serve_item_image">
                                            <img class="img-fluid"
                                            src="{{ !empty($industry->logo) && file_exists(public_path('storage/' . $industry->logo)) ? asset('storage/' . $industry->logo) : asset('frontend/images/no-industy-img.png') }}"
                                            alt="NGEN IT">
                                        </div>
                                        <div class="we_serve_item_text">{{ $industry->title }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
            <!-- sidebar -->
            <div class="col-lg-3 col-sm-12">
                <p class="fw-bold top-line-title pt-2"><span style="border-top: 4px solid #ae0a46;">Exp</span>lore</p>
                <!-- sidebar list -->
                <div class="some-menu-area">
                    @if ($random_industries)
                        @foreach ($random_industries as $random_industry)
                            <div class="pt-2">
                                <a href="{{ isset($random_industry->slug) ? route('industry.details', ['id' => $random_industry->slug]) : '' }}">
                                    <div id="fed-bg">
                                        <div class="p-2">
                                            <h5 class="text-white brand_side_text">{{ $random_industry->title }} ›</h5>
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
    <!---------End -------->


    <section class="container mt-3">
        <div class="outcome_smail_bussiness_title">
            <!-- <hr class="lineTop"> -->
            <h2>{!! $learnmore->footer !!}</h2>
            <hr class="lineBottom">
        </div>
    </section>


    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
@once
    @section('styles')
        <style>
            .word {
                position: absolute;
                opacity: 0;
                font-size: 38px;
            }


            .active,
            .collapsible:focus {
                border-top: none !important;
                border-left: none !important;
                border-right: none !important;
            }
        </style>
    @endsection
    @section('scripts')
        {{-- text animation Learn More Page --}}
        <script>
            var words = document.getElementsByClassName('word');
            var wordArray = [];
            var currentWord = 0;


            words[currentWord].style.opacity = 1;
            for (var i = 0; i < words.length; i++) {
                splitLetters(words[i]);
            }


            function changeWord() {
                var cw = wordArray[currentWord];
                var nw = currentWord == words.length - 1 ? wordArray[0] : wordArray[currentWord + 1];
                for (var i = 0; i < cw.length; i++) {
                    animateLetterOut(cw, i);
                }


                for (var i = 0; i < nw.length; i++) {
                    nw[i].className = 'letter behind';
                    nw[0].parentElement.style.opacity = 1;
                    animateLetterIn(nw, i);
                }


                currentWord = (currentWord == wordArray.length - 1) ? 0 : currentWord + 1;
            }


            function animateLetterOut(cw, i) {
                setTimeout(function() {
                    cw[i].className = 'letter out';
                }, i * 80);
            }


            function animateLetterIn(nw, i) {
                setTimeout(function() {
                    nw[i].className = 'letter in';
                }, 340 + (i * 80));
            }


            function splitLetters(word) {
                var content = word.innerHTML;
                word.innerHTML = '';
                var letters = [];
                for (var i = 0; i < content.length; i++) {
                    var letter = document.createElement('span');
                    letter.className = 'letter';
                    letter.innerHTML = content.charAt(i);
                    word.appendChild(letter);
                    letters.push(letter);
                }


                wordArray.push(letters);
            }


            changeWord();
            setInterval(changeWord, 4000);
        </script>
        {{-- text animation --}}
    @endsection
@endonce
