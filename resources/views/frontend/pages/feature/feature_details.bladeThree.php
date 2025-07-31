@extends('frontend.master')
@section('content')
    <section class="n-feature-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Tenable Research Report</p>
                    <h1>Auditing Pimcore Enterprise Platform</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="my-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div>
                                <p style="font-size: 18px">Pimcore is a popular open-source platform built on Symfony, focusing on data and
                                    experience
                                    management. As digital transformation becomes crucial for business success, many
                                    organizations rely on advanced web applications like Pimcore. </p>
                                <p style="font-size: 18px">While these platforms offer significant benefits, they can also expose businesses to
                                    security
                                    vulnerabilities. Researching these vulnerabilities helps improve an organization's
                                    security.
                                </p>
                                <p style="font-size: 18px">As companies digitalize, securing Pimcore installations is critical and requires careful
                                    configuration. This report is designed for security practitioners who want to strengthen
                                    their organization's digital infrastructure by understanding Pimcore's structure,
                                    identifying common misconfigurations and assessing custom code.</p>
                                <p style="font-size: 18px"><strong>Download the report today</strong> to learn how to protect your organization.</p>
                            </div>
                        </div>
                        <div class="px-0 col-lg-3">
                            <div>
                                <img class="img-fluid"
                                    src="https://www.tenable.com/sites/default/files/thumb-Research_Paper-Auditing_Pimcore_Enterprise_Platform.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div>
                        <div class="card" style="border-top: 3px solid red">
                            <div class="p-3 card-body">
                                <h4 class="py-3 text-center"> Download Report</h4>
                                <form>
                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="firstName" class="form-label form-label-required w-35">First
                                            Name</label>
                                        <input type="text" class="form-control border-danger w-65" id="firstName"
                                            required>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="lastName" class="form-label form-label-required w-35">Last Name</label>
                                        <input type="text" class="form-control border-danger w-65" id="lastName"
                                            required>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="email" class="form-label form-label-required w-35">Email
                                            Address</label>
                                        <input type="email" class="form-control border-danger w-65" id="email"
                                            required>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="title" class="form-label form-label-required w-35">Title</label>
                                        <input type="text" class="form-control border-danger w-65" id="title"
                                            required>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="company" class="form-label form-label-required w-35">Company</label>
                                        <input type="text" class="form-control border-danger w-65" id="company"
                                            required>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="companySize" class="form-label form-label-required w-35">
                                            Size</label>
                                        <select class="form-select border-danger w-65" id="companySize" required>
                                            <option selected disabled>Select...</option>
                                            <option>1-10</option>
                                            <option>11-50</option>
                                            <option>51-200</option>
                                            <option>201-500</option>
                                            <option>500+</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-flex align-items-center">
                                        <label for="phone" class="form-label form-label-required w-35">Phone</label>
                                        <input type="tel" class="form-control border-danger w-65" id="phone"
                                            required>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====// Pageform section //=====-->
    @include('frontend.partials.footer_contact')
    <!-- Include jQuery and Slick JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.features-items').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
    <!---------End -------->
@endsection
