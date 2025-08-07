@extends('frontend.master')
@section('content')
<style>
    .e-gradient--dark {
        background-image: linear-gradient(90deg, #000026, #00005b);
    }

    .u-py--xxl {
        padding-block: 120px;
    }

    .tecg .title {
        font-size: 50px;
        color: white;
    }
</style>
<section>
    <div class="container-fluid e-gradient--dark u-py--xxl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="">
                        <div class="text-white tecg">
                            <h1 class="title">Tenable Research</h1>
                            <h2 class="">The leader in vulnerability and <br> exposure research</h2>
                            <p>Tenable Research is the source of all Tenable solutions. By providing exposure intelligence, security advisories and alerts, data science insights and zero-day research, Tenable helps organizations secure their modern attack surface.</p>
                            <div class="pt-5 home_card_button">
                                <a class="home-btn" href="https://ngenitltd.com/what-we-do">What We Do</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="">
                        <img class="img-fluid" src="{{ asset('images/techGlossy.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid u-py--xxl" style="background: linear-gradient(to bottom, #f6fafe 0%, white 100%);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h1 class="title">Tenable Research</h1>
                    </div>
                    <div>
                        <img class="img-fluid" src="{{ asset('images/techGlossy-tabs.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-0 container-fluid u-py--xxl" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="title">Research insights</h1>
                    </div>
                    <div>
                        <img class="img-fluid" src="{{ asset('images/techGlossy-slider.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-0 container-fluid u-py--xxl" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="title">Research insights</h1>
                    </div>
                    <div>
                        <img class="img-fluid" src="{{ asset('images/techGlossy-card.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid u-py--xxl" style="background: linear-gradient(to bottom, #f2f9fe 0%, #f3f9fe 100%);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h1 class="text-center title">Recent publications</h1>
                    </div>
                    <div>
                        <img class="img-fluid w-100" src="{{ asset('images/techGlossy-info.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-0 container-fluid u-py--xxl" style="background: linear-gradient(to bottom, #f2f9fe 0%, #f3f9fe 100%);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h1 class="text-center title">Learn more about Tenable</h1>
                    </div>
                    <div>
                        <img class="img-fluid w-100" src="{{ asset('images/techGlossy-award.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection