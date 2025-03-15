@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner"
                src="{{ asset('frontend/images/terms.jpg') }}"
                alt="NGEN IT Terms And Condition">
        </div>
    </section>
    <!----------End--------->
    <section class="header mb-4">
        <div class="container py-4">
            <div class="py-4">
                <h4 class="text-center"><span class="faqs_title_border_top">Our</span> Terms & Policy</h4>
            </div>
            <div class="row ">
                <div class="col-md-2 bg-light">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom_faq" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach ($terms as $key => $term)
                            <a class="nav-link faq {{ $key === 0 ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home{{$term->id}}"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <span class="font-weight-bold small text-uppercase">{{$term->name}}</span></a>
                        @endforeach
                        @foreach ($sale_terms as $key => $sale_term)
                            <a class="nav-link faq" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home{{$sale_term->id}}"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <span class="font-weight-bold small text-uppercase">{{$sale_term->name}}</span></a>
                        @endforeach
                        @foreach ($service_terms as $key => $service_term)
                            <a class="nav-link faq" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home{{$service_term->id}}"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <span class="font-weight-bold small text-uppercase">{{$service_term->name}}</span></a>
                        @endforeach
                    </div>
                </div>


                <div class="col-md-10 px-0">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($terms as $key => $term)
                            <div class="tab-pane fade rounded bg-white {{ $key === 0 ? 'show' : '' }} {{ $key === 0 ? 'active' : '' }}"
                                id="v-pills-home{{$term->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="container px-0">
                                    <div class="card-body body px-2">
                                        <p class="font-italic text-muted mb-2 px-4"></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($sale_terms as $key => $sale_term)
                            <div class="tab-pane fade rounded bg-white" id="v-pills-home{{$sale_term->id}}" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="container px-0">
                                    <div class="card-body body px-2">
                                        <p class="font-italic text-muted mb-2 px-4"></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($service_terms as $key => $service_term)
                            <div class="tab-pane fade rounded bg-white" id="v-pills-home{{$service_term->id}}" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="container px-0">
                                    <div class="card-body body px-2">
                                        <p class="font-italic text-muted mb-2 px-4"></p>
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
