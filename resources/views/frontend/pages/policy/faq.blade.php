@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner" src="{{ asset('frontend/images/faq.jpg') }}" alt="NGEN IT FAQ">
        </div>
    </section>
    <!----------End--------->
    <section class="header mb-4">
        <div class="container py-4">
            <div class="py-4">
                <h4 class="text-center"><span class="faqs_title_border_top">Do Y</span>ou Have Any Quest<span
                        class="faqs_title_border_bottom">ion ?</span></h4>
            </div>
            <div class="row faq-area">
                <div class="col-md-2 bg-light p-0">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom_faq" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">

                        @foreach ($faq_categories as $category)
                            @php $slug = Str::slug($category); @endphp
                            <a class="nav-link faq {{ $loop->first ? 'active' : '' }}" id="tab-{{ $slug }}"
                                data-bs-toggle="pill" href="#{{ $slug }}" role="tab"
                                aria-controls="{{ $slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                <span class="font-weight-bold small text-uppercase">{{ $category }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-10 px-0">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($faq_categories as $category)
                            @php
                                $slug = Str::slug($category);
                                $faqs = $faqs_by_category[$category];
                            @endphp
                            <div class="tab-pane fade rounded-0 bg-white {{ $loop->first ? 'show active' : '' }} mx-2"
                                id="{{ $slug }}" role="tabpanel" aria-labelledby="tab-{{ $slug }}">
                                <div class="container px-0">
                                    <div id="accordion">
                                        <div class="border-0">
                                            @foreach ($faqs as $subKey => $faq)
                                                <div class="card-header p-0 border-0 mb-0 mt-1"
                                                    id="heading-{{ $faq->id }}">
                                                    <button
                                                        class="btn btn-link accordion-title border-0 collapse rounded-0 {{ $subKey === 0 ? 'show' : '' }}"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $faq->id }}"
                                                        aria-expanded="{{ $subKey === 0 ? 'true' : 'false' }}"
                                                        aria-controls="collapse-{{ $faq->id }}">
                                                        <i
                                                            class="fas fa-plus text-center d-flex align-items-center justify-content-center h-100"></i>
                                                        {{ $faq->question }}
                                                    </button>
                                                </div>
                                                <div id="collapse-{{ $faq->id }}"
                                                    class="collapse {{ $subKey === 0 ? 'show' : '' }}"
                                                    aria-labelledby="heading-{{ $faq->id }}">
                                                    <div class="card-body accordion-body">
                                                        <p style="font-size: 13px; font-weight: 500; text-align: justify;">
                                                            {!! $faq->answer !!}</p>
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
    </section>
@endsection
