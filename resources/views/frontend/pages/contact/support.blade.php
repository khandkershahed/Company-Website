@extends('frontend.master')
@section('content')
    <!--========Header Title==========-->
    <section class="support_assistance_header"
        style="background-image:url('{{ asset('frontend/images/buy-category-hero.jpg') }}');">
        <div class="container">
            <div class="d-flex justify-content-center">
                <span>Web support assistance</span>
            </div>
            <h1>How can we help you?</h1>
        </div>

    </section>
    <!----------Header Title End--------->

    <!--==========Support Assistance Contact From=========-->
    <section class="container">
        <div class="support_assistance_wrapper">
            <div class="row">
                <div class="col-lg-7 col-sm-12 support_assistance_content">
                    <p>Having trouble with {{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT' }}? Reach out to
                        our team of Web support specialists and get help over
                        the phone or through email.</p>
                    <div>
                        <h3>Need to reach us right away?</h3>
                    </div>
                    <div class="d-flex ">
                        <div class="col-4 contact_hline_call p-0">
                            <a href="callto:{{ !empty($setting->phone_one) ? $setting->phone_one : '' }}"
                                x-cq-linkchecker="skip">Call us</a>
                        </div>
                        <div class="col-8">
                            <span>Call {{ !empty($setting->site_name) ? $setting->site_name : 'NGen IT' }} to talk to a
                                specialist directly.</span>
                        </div>

                    </div>
                    <div class="d-flex my-4">
                        <div class="col-4 contact_hline_email p-0">
                            <a href="mailto:{{ !empty($setting->support_email) ? $setting->support_email : '' }}">Email
                                us</a>
                        </div>
                        <div class="col-8 ">
                            <span>Contact a specialist via email at your convenience.</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <img class="img-fluid" src="{{ asset('frontend/images/support-assistance-page-women.jpg') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 support_assistance_contact_us">
                    <div>
                        <h4>Contact us</h4>
                    </div>
                    <form id="recaptcha-form" action="{{ route('contact.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="support">
                        <div class="pb-3">
                            <label class="form-label" for="">Full Name</label><span class="text-danger">*</span>
                            <div>
                                <input type="text" class="form-control form-control-sm bg-white" name="name" required
                                    placeholder="First name">
                            </div>
                        </div>
                        <div class="pb-3">
                            <label class="form-label" for="">Company</label>
                            <div>
                                <input class="form-control form-control-sm bg-white" type="text" name="company"
                                    placeholder=" Company name" maxlength="255" tabindex="0">
                            </div>
                        </div>
                        <div class="pb-3">
                            <label class="form-label" for="">Email address</label><span class="text-danger">*</span>
                            <div>
                                <input class="form-control form-control-sm bg-white" type="email" name="email" required
                                    placeholder="Email address" maxlength="255" tabindex="0">
                            </div>
                        </div>
                        <div class="pb-3">
                            <label class="form-label" for="">Phone number</label><span class="text-danger">*</span>
                            <div>
                                <input class="form-control form-control-sm bg-white" type="text" name="phone" required
                                    placeholder="Phone number" maxlength="255" tabindex="0">
                            </div>
                        </div>
                        <div class="pb-3">
                            <label class="form-label" for="">Support topic</label><span class="text-danger">*</span>
                            <div>
                                <select name="msg_type" required class="form-control form-control-sm bg-white">
                                    <option value="" selected="selected">Select a topic</option>
                                    <option value="Account creation problem">Account creation problem</option>
                                    <option value="Cannot login">Cannot login</option>
                                    <option value="Cannot place an order">Cannot place an order</option>
                                    <option value="Client feedback entry">Client feedback entry</option>
                                    <option value="General web issue">General web issue</option>
                                    <option value="Order return request">Order return request</option>
                                    <option value="Order tracking/history">Order tracking/history</option>Order invoice
                                    issue</option>
                                    <option value="Product information request">Product information request</option>
                                    <option value="Update my account/email information">Update my account/email information
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="message">Message <span class="text-danger">*</span></label>
                            <div>
                                <textarea class="form-control form-control-sm bg-white" name="message" required id="message" cols="50"
                                    rows="2"></textarea>
                            </div>
                        </div>

                        <div class="row align-items-center pt-5">
                            <div class="col-lg-6">
                                <div class="form-group message g-recaptcha"
                                    data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button id="submitbtn" type="submit" class="btn-color mr-2">Hear Us</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-------------End--------->

    <script>
        function onlyOne(radio) {
            console.log('work');
            var checkboxes = document.getElementsByName('contact_by')
            checkboxes.forEach((item) => {
                if (item !== radio) item.checked = false
            })
        }
    </script>
@endsection
