@extends('frontend.master')
@section('content')
    <style>
        thead{
            display: contents;
        }
        thead>tr>th{
            color: #ae0a46;
        }
        tr td:hover {
            background-color: transparent;
        }
    </style>
    <section class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div>
                    <!-- Email Header Start -->
                    <div class="wrapper" style="border: 1px solid #eee;">
                        <!-- Email Header Start -->
                        <div class="d-flex justify-content-between align-items-center px-5 py-2"
                            style="background-color: #ae0a46;">
                            <div>
                                <a href="https://ngenitltd.com" target="_blank">
                                    <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="Ngen IT" title="Ngen IT"
                                        style="text-decoration: none;" width="60" />
                                </a>
                            </div>
                            <div>
                                <p class="mb-0 text-right text-white" style="font-size: 2rem;font-weight: 600;">
                                    NGEN IT LTD.
                                </p>
                            </div>
                        </div>
                        <!-- Email Header End -->
                        <!-- Main Content Start -->
                        <div style="overflow-x: auto">
                            <div style="text-align: left;padding: 15px;">
                                <h4 style="text-align: left; font-size: 18px; color: #141414;">Dear
                                    {{ $name }}</h4>
                            </div>

                            <div style="text-align: left;padding: 15px;">
                                <p style="text-align: left; font-size: 18px; color: #141414;">
                                    We have received your query, Thank you for your interest! Our
                                    dedicated
                                    sales
                                    manager/consultant will contact you soon.
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="85%">Product Name</th>
                                                <th width="15%">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($rq_products))
                                                @foreach ($rq_products as $rq_product)
                                                    <tr>
                                                        <td>{{ $rq_product->product_name }}</td>
                                                        <td>{{ $rq_product->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            {{-- @if (!empty($message))
                                                <tr>
                                                    <td colspan="2">
                                                        {{ $message }}
                                                    </td>
                                                </tr>
                                            @endif --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Main Content End -->
                        <!-- Column Area -->
                        <div style="overflow-x: auto">
                            <div class="row"
                                style="padding: 15px; padding-left: 30px; padding-right: 30px; background-image: url(https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg); background-size: cover;">
                                <div class="col-6" style="text-align: start;color: #ffffff;">
                                    <p
                                        style="font-size: 15px;font-weight: 600;padding-bottom: 0.5rem;margin: 0;color: #000;">
                                        Thank You
                                    </p>
                                    <p style="color: #ae0a46; margin: 0">
                                        NGEN IT SALES TEAM
                                    </p>
                                    <p style="color: #ae0a46;font-size: 15px;margin: 0;">
                                        Manager, Business
                                    </p>
                                </div>
                                <div class="col-6" style="text-align: end;color: #ffffff;">
                                    <div style="font-size: 15px;margin-bottom: 0.5rem;">
                                        <p style="margin: 0; color: #ae0a46">
                                            sales@ngenitltd.com
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </p>
                                    </div>
                                    <div style="font-size: 15px;margin-bottom: 0.5rem;">
                                        <p style="margin: 0; padding: 0; color: #ae0a46">
                                            (skype) +1 917-720-3055
                                        </p>
                                    </div>
                                    <div style="font-size: 15px">
                                        <p style="margin: 0; padding: 0; color: #ae0a46">
                                            (whats app) +880 1714 243446
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column Area End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
