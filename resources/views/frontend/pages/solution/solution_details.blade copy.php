@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner" src="{{asset('storage/'.$solution->banner_image)}}" alt="{{ $solution->name }}">
        </div>
    </section>
    <!----------End--------->
    <section class="mt-5 d-lg-block d-sm-none">
        <div class="container my-3">
            <ul class="breadcrumb text-left">
                <a href="{{ route('homepage') }}">
                    <li class="breadcrumb__item breadcrumb__item-firstChild">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Home</span>
                        </span>
                    </li>
                </a>
                <li class="breadcrumb_divider">
                    <span>></span>
                </li>
                <a href="{{ route('whatwedo') }}">
                    <li class="breadcrumb__item">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">What We Do</span>
                        </span>
                    </li>
                </a>
                <li class="breadcrumb_divider">
                    <span>></span>
                </li>
                <a href="{{ route('all.solution') }}">
                    <li class="breadcrumb__item ">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">Solutions We Offer</span>
                        </span>
                    </li>
                </a>
                <li class="breadcrumb_divider">
                    <span>></span>
                </li>
                <a href="#">
                    <li class="breadcrumb__item active">
                        <span class="breadcrumb__inner">
                            <span class="breadcrumb__title">{{ $solution->name }}</span>
                        </span>
                    </li>
                </a>
            </ul>
        </div>
    </section>
    <!--======// Header Title //======-->
    @if (!empty($solution->rowOne))
        <section class="container section_padding">
            <div class="row py-lg-5 py-2">
                <div class="col-lg-7 col-sm-12">
                    <div class="section_text_wrapper">
                        <h4 class="m-0">{{ $solution->rowOne->title }}</h4>
                        <p style="text-align: justify;font-size: var(--paragraph-font-size);" class="pt-3">
                            {!! $solution->rowOne->short_des !!}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="industry_single_help_list">
                        <h5 class="p-0">{{ $solution->rowOne->list_title }}</h5>
                        <ul class="ms-1 solution-list-area">
                            <li class="d-flex">
                                <div>
                                    <span><i class="fa-regular fa-bookmark main_color pe-2"></i> {{ $solution->rowOne->list_one }}</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div>
                                    <span><i class="fa-regular fa-bookmark main_color pe-2"></i> {{ $solution->rowOne->list_two }}</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div>
                                    <span><i class="fa-regular fa-bookmark main_color pe-2"></i> {{ $solution->rowOne->list_three }}</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div>
                                    <span><i class="fa-regular fa-bookmark main_color pe-2"></i> {{ $solution->rowOne->list_four }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!----------End--------->
    <!--======// Solution feature //======-->
    <section style="background-color: #eee;">
        <div class="container py-lg-5 py-2"> @php
            $cards = [$solution->card1, $solution->card2, $solution->card3, $solution->card4];
            $cardsections2 = [$solution->card6, $solution->card7, $solution->card8];
        @endphp <div class="row d-flex justify-content-center pt-3 gx-0">
                @foreach ($cards as $card)
                    <div class="col-lg-3 col-sm-12">
                        <div class="card border-0 shadow-none rounded-2 solution-feature-container mx-auto">
                            <img class="card-img-top"
                                src="{{ !empty($card->image) && file_exists(public_path('storage/' . $card->image)) ? asset('storage/' . $card->image) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                alt="Card image cap" width="150px" height="150px">
                            <div class="card-body rounded-2 w-sm-100 solution-feature-cards">
                                <h5 class="card-title text-center main_color">{{ $card->title }}</h5>
                                <p class="text-muted p-2" style="font-size: 15px; font-weight: 300; text-align: center;">
                                    {{ Str::words($card->short_des, 22, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!----------End--------->
    <!--======// Gradian Background //======-->
    <section class="gradient_bg" style="">
        <div class="container">
            <div class="call_to_action_text py-lg-5 py-2">
                <h4 class="section_title">{{ $solution->row_three_title }}</h4>
                <p class="w-100 mx-auto solution_para">{{ $solution->row_three_header }}</p>
            </div>
        </div>
    </section>
    <!----------End--------->
    <!--=======// Building resilient IT //=====-->
    @if (!empty($solution->rowFour))
        <section class="section_padding">
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 account_benefits_section" style="text-align: justify;">
                        <h3>{{ $solution->rowFour->title }}</h3>
                        <p>{!! $solution->rowFour->description !!} </p>
                        @if (!empty($solution->rowFour->btn_name))
                            <a href="{{ $solution->rowFour->link }}"
                                class="common_button effect01 mt-4">{{ $solution->rowFour->btn_name }}</a>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        {{-- <img class="img-fluid rounded" src="{{ asset('storage/' . $solution->rowFour->image) }}" alt="" width="540px" height="338px"> --}} <img class="img-fluid"
                            src="{{ !empty($solution->rowFour->image) && file_exists(public_path('storage/' . $solution->rowFour->image)) ? asset('storage/' . $solution->rowFour->image) : asset('frontend/images/no-row-img(580-326).png') }}"
                            alt="" width="540px" height="338px"
                            style="    border-top-right-radius: 60px !important;
                              border-bottom-left-radius: 60px !important;">
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-------------End--------->
    <!--======// Solution feature //======-->
    <section style="background-color: #eee;">
        <div class="container py-lg-5 py-2">
            <!--title-->
            <div class="section_text_wrapper">
                <h3 class="section_title solution_title">{{ $solution->row_five_title }}</h3>
                <p class="text-center w-75 mx-auto solution_para">{{ $solution->row_five_header }}</p>
            </div>
            <div class="row py-lg-5 py-2">
                <!-- item -->
                @foreach ($cardsections2 as $cardsection2)
                    <div class="col-lg-4 col-sm-12 product_veiw_details_item">
                        <!-- image -->
                        <img class="rounded-circle img-fluid"
                            src="{{ !empty($cardsection2->image) && file_exists(public_path('storage/' . $cardsection2->image)) ? asset('storage/' . $cardsection2->image) : asset('frontend/images/no-brand-img.png') }}"
                            alt="" style="width: 150px;
                          height: 150px;">
                        <!-- content -->
                        <div class="product_veiw_details_item_content">
                            <h5 class="m-0 py-3 main_color">{{ $cardsection2->title }}</h5>
                            <p class="p-0 m-0" style="font-size: 16px;">{!! $cardsection2->short_des !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!----------End--------->
    <!--======// Featured content //======-->
    @if (count($solutions) > 0)
        <section>
            <div class="container py-lg-5 py-2">
                <div class="">
                    <h2 class="text-center">
                        <span class="main_color">More Solutions You May Check</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="SlickCarousel">
                        <!--------item------->
                        @foreach ($solutions as $item)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="related-item">
                                    <a href="{{ route('solution.details', $item->slug) }}">
                                        <div>
                                            <img class="img-fluid"
                                                src="{{ !empty($item->banner_image) && file_exists(public_path('storage/' . $item->banner_image)) ? asset('storage/' . $item->banner_image) : asset('frontend/images/no-row-img(580-326).png') }}"
                                                alt="" style="height: 200px; width:100%">
                                        </div>
                                        <div class="p-3" style="height:6.5rem;">
                                            <h4 class="mb-1 text-center">
                                                {{ App\Models\Admin\Industry::where('id', $item->industry_id)->value('title') }}
                                            </h4>
                                            <h3 class="mb-0 fw-bold text-center">{{ $item->name }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-------------End--------->
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!---------End -------->
@endsection
