@extends('frontend.master')
@section('content')

    <!--======// Header Title //======-->
    <section class="common_product_header" style="background:url('{{ asset('frontend/images/Contact.jpg') }}');">
        <div class="container ">
            <h1>Contact Us</h1>
            <p class="text-center text-white">Browse and Explore exclusive Refurbished products from NGen IT. <br> We offer
                quality assurance for products, software and services.</p>
        </div>
    </section>
    <!----------End--------->

    <!--=====// Pageform section //=====-->
    <section class="solution_contact_wrapper_contactpage">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-5 col-sm-12">
                    <div class="thing_together_wrapper_contactpage">
                        <h4>
                            <span class="why_Choose_lineTop">L</span>et’s do big things together.
                        </h4>
                        <p>Get assistance with tracking an order, requesting a quote, contacting your account representative
                            and more by phone or over chat.</p>
                        <h5 class="text-black">NGen IT Global Headquarters</h5>
                        <p>{{ $setting->address ?? '' }}</p>
                        <p>
                            Whatsapp Number: <span class="main_color">{{ $setting->whatsapp_number ?? '' }}</span> <br>
                            Information and sales: <span class="main_color">
                                <a href="mailto:{{ $setting->sales_email ?? '' }}">{{ $setting->sales_email ?? '' }}</a>
                            </span> <br>
                            Support Email: <span class="main_color">
                                <a href="mailto:{{ $setting->support_email ?? '' }}">{{ $setting->support_email ?? '' }}</a>
                            </span> <br>
                            Returns: <span class="main_color">
                                <a href="tel:+{{ $setting->phone_one ?? '' }}">{{ $setting->phone_one ?? '' }}</a>
                            </span>
                        </p>
                        <!-- <h5><i class="fa-solid fa-phone"></i>NgenIT</h5> -->
                        <a href="{{ route('location') }}" class="product_button">View all NGen IT office locations</a>
                    </div>
                </div>
                <!----------Sidebar Privacy Policy --------->
                <div class="col-lg-7 col-sm-12">
                    <!-- form Sidebar -->
                    <div class="background ">
                        <div class="containers">
                            <div class="screen shadow-lg">
                                <div class="screen-header">
                                    <div class="screen-header-left">
                                        <div class="screen-header-button maximize"></div>
                                        <div class="screen-header-button minimize"></div>
                                    </div>
                                    <div class="screen-header-right">
                                        <div class="screen-header-ellipsis"></div>
                                        <div class="screen-header-ellipsis"></div>
                                        <div class="screen-header-ellipsis"></div>
                                    </div>
                                </div>
                                <div class="screen-body">
                                    <div class="screen-body-item left">
                                        <div class="app-title">
                                            <span>CONTACT</span>
                                            <span>US</span>
                                        </div>
                                    </div>
                                    <form id="recaptcha-form" class="w-75 feature_form"
                                        action="{{ route('contactus.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="screen-body-item screen-body-item-right">
                                            <div class="app-form">
                                                <div class="app-form-group">
                                                    <input type="hidden" name="type" value="contact">
                                                    <input name="name" class="app-form-control" placeholder="Full NAME"
                                                        value="{{ old('name') }}" required>
                                                </div>
                                                <div class="app-form-group">
                                                    <input class="app-form-control" name="email" type="email"
                                                        value="{{ old('email') }}" placeholder="Email " />
                                                    <span class="text-danger text-start p-0 m-0 email_validation"
                                                        style="display: none;">Please input
                                                        valid email</span>
                                                </div>
                                                <div class="app-form-group">
                                                    <input name="phone" type="text"
                                                        class="app-form-control phone_number" placeholder="Contact Number"
                                                        value="{{ old('phone') }}">
                                                </div>
                                                <div class="app-form-group message">
                                                    <textarea name="message" class="app-form-control contact-message" rows="3" placeholder="Your Message" required></textarea>

                                                </div>
                                                <div class="g-recaptcha"
                                                    data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>

                                                {{-- <div class="g-recaptcha" id="feedback-recaptcha"
                                                    data-sitekey="{{config('services.recaptcha.site_key')}}">
                                                </div> --}}
                                                <div class="app-form-group buttons">
                                                    <button class="app-form-button"
                                                        type="submit"><strong>SEND</strong></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
        $(document).ready(function() {

            $('input[name="email"]').on("keyup change", function(e) {
                var email = $(this).val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(email)) {
                    $('.email_validation').hide();
                } else {
                    $('.email_validation').show();
                }
            });

            $('#recaptcha-form').submit(function(event) {
                var email = $('input[name="email"]').val();
                var message = $('.contact-message').val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Please enter a valid email address.');
                    event.preventDefault();
                }
                if (message === null) {
                    alert('Please enter Your Message');
                    event.preventDefault();
                }
                // Add additional validation if needed
            });








        });
    </script>
@endsection
