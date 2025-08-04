<!--=====// Pageform section //=====-->
@php
    $setting = App\Models\Site::first();
@endphp
<style>
    .contact_wrapper {
        background: url("{{ asset('images/contact_pattern.jpg') }}") no-repeat center center;
        /* background-color: #252525; */
        padding: 40px !important;
    }

    .screen {
        background: rgb(0, 20, 48);
    }

    .app-form-control {
        border-bottom: 2px solid #fff;
        color: #fff;
    }

    .app-form-control::placeholder {
        color: #fff;
        font-size: 14px;
        padding-left: 10px;
    }

    .rc-anchor-light {
        background: #001430 !important;
        color: #fdfdfd;
    }

    .rc-anchor-light .rc-anchor-logo-text,
    .rc-anchor-light div a:link,
    .rc-anchor-light div a:visited {
        color: #ffffff !important;
    }
</style>
<section class="contact_wrapper d-sm-none d-md-block">
    <div class="container" id="Contact">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-5 col-sm-12">
                <div class="thing_together_wrapper">
                    <h4 class="main_color">
                        <span class="why_Choose_lineTop">L</span>et’s do big things together.
                    </h4>
                    <p class="text-black">Get assistance with tracking an order, requesting a quote, contacting your
                        account representative
                        and more by phone or over chat.</p>
                    <h5 style="color:rgb(0, 20, 48);">NGen IT Global Headquarters</h5>
                    <p class="text-black">{{ !empty($setting->address) ? $setting->address : '' }}</p>
                    <p class="text-black">
                        Singapore | Bangladesh | Portugal | UAE <br>
                        <span>{{ !empty($setting->sales_email) ? $setting->sales_email : '' }} | {{ !empty($setting->phone_one) ? $setting->phone_one : '' }}</span> <br>
                        <span>Whatsapp | {{ !empty($setting->whatsapp_number) ? $setting->whatsapp_number : '' }}</span>
                        {{-- <span class="font-number">{{ !empty($setting->support_email) ? $setting->support_email : '' }}</span> --}}
                        {{-- <br> Information and sales: <span class="">{{ !empty($setting->sales_email) ? $setting->sales_email : '' }}</span>
                        <br> OneCall support: <span class="font-number">{{ !empty($setting->phone_one) ? $setting->phone_one : '' }}</span>
                        <br> Returns: <span class="font-number">{{ !empty($setting->whatsapp_number) ? $setting->whatsapp_number : '' }}</span> --}}
                    </p>
                    <!-- <h5><i class="fa-solid fa-phone"></i>NgenIT</h5> -->
                </div>
            </div>
            <!----------Sidebar Privacy Policy --------->
            <div class="col-lg-7 col-sm-12">
                <!-- form Sidebar -->
                <div class="background">
                    <div class="containers">
                        <div class="screen">
                            <div class="screen-header" style="background: rgb(0 20 48 / 90%);">
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
                                    <div class="text-white app-title">
                                        <span>CONTACT</span>
                                        <span>US</span>
                                    </div>
                                </div>
                                <form id="myform" action="{{ route('contact.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="screen-body-item screen-body-item-right">
                                        <div class="app-form row">
                                            <div class="app-form-group">
                                                <input type="hidden" name="type" value="contact">
                                                <input name="name" class="app-form-control" placeholder="Full Name *"
                                                    value="{{ old('name') }}" required>
                                            </div>
                                            <div class="app-form-group">
                                                <input name="email" class="app-form-control" placeholder="Email Id *"
                                                    value="{{ old('email') }}" required>
                                            </div>
                                            <div class="app-form-group">
                                                <input name="phone" class="app-form-control" placeholder="Contact No "
                                                    value="{{ old('phone') }}">
                                            </div>
                                            <div class="app-form-group message">
                                                <textarea name="message" class="app-form-control" rows="3" placeholder="Your Message"></textarea>

                                            </div>
                                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                                <div class="g-recaptcha"
                                                    data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                                                <div class="app-form-group buttons">
                                                    <button class="btn-white"
                                                        type="submit"><strong>SEND</strong></button>
                                                </div>
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
