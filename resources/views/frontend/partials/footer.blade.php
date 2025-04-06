<!--=======// Footer Section//=========-->
<footer class="container-fluid p-0" style="background: #222222;">
    <!-- footyer gradient -->
    <div class="footer_top">
        <p class="mb-0">We determined to pace with Next Generation Information Technology.</p>
    </div>
    <!-- main footer -->
    <div class="footer_middle pt-3">
        <div class="container pb-3">
            <div class="row">
                <div class="row footer_middle_wrapper my-5">
                    <!-- item -->
                    <div class="col-lg-6 col-md-6 col-sm-12 footer_item_wrapper">
                        <!-- title -->
                        <h6><span style="border-bottom: 5px solid #ae0a46;">New</span>sletter</h6>
                        <!-- text -->
                        <p class="footer_text pt-4">
                            Sign up to receive the IT content that matters most to you.
                            You can update your preferences or unsubscribe any time.
                        </p>
                        <!-- button -->
                        <form class="p-0 pt-3 m-0" id="myform" action="{{ route('newsletter.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group w-75 footer_subscribe">
                                <input type="email" class="form-control" placeholder="Enter your email"
                                    style="height: 37px;">
                                <span class="input-group-btns ml-1" style="width:30%;">
                                    <button class="newsletter-btns" type="submit"
                                        style="line-height: 36px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;">Subscribe</button>
                                </span>
                        </form>
                    </div>
                </div>
                <!-- item -->
                <div class="col-lg-2 col-md-2 col-6 footer_item_wrapper">
                    <!-- title -->
                    <h6 class="home_title_text" style="text-align: start;"><span
                            style="border-bottom: 5px solid #ae0a46;">Abo</span>ut & Contact</h6>
                    <!-- nav list -->
                    <div class="footer_nav_list pt-lg-4 pt-2">
                        <ul class="footer_link_text">
                            <li>
                                <a href="{{route('about')}}">Company</a> & <a
                                    href="{{ route('portfolio') }}">Portfolios</a>
                            </li>
                            <li>
                                <a href="{{ route('portfolio') }}">Design</a> & <a
                                    href="{{ route('portfolio') }}">Development</a>
                            </li>
                            <li>
                                <a href="{{route('partner.login')}}">Partner</a> & <a href="{{route('client.login')}}">Clients</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact</a> & <a
                                    href="{{ route('website.support') }}">Supports</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 footer_item_wrapper">
                    <!-- title -->
                    <h6 class="home_title_text" style="text-align: start;"><span
                            style="border-bottom: 5px solid #ae0a46;">Kno</span>wledge Base</h6>
                    <!-- nav list -->
                    <div class="footer_nav_list pt-lg-4 pt-2">
                        <ul class="footer_link_text">
                            <li>
                                <a href="{{ route('all.blog') }}">NGEN IT Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('all.techglossy') }}">Tech Contents</a>
                            </li>
                            <li>
                                <a href="{{ route('all.story') }}">Our Client Stories</a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}">FAQs</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- item -->
                <div class="col-lg-2 col-md-2 col-sm-12 footer_item_wrapper">
                    <!-- title -->
                    <h6 class="home_title_text" style="text-align: start;"><span
                            style="border-bottom: 5px solid #ae0a46;">Pro</span>duct & Services</h6>
                    <!-- nav list -->
                    <div class="footer_nav_list pt-lg-4 pt-2">
                        <ul class="footer_link_text">
                            <li>
                                <a href="{{ route('software.common') }}">Software</a> & <a
                                    href="{{ route('hardware.common') }}">Hardware</a>
                            </li>
                            <li>
                                <a href="{{ route('all.industry') }}">Industry</a> & <a
                                    href="{{route('all.solution')}}">Solutions</a>
                            </li>
                            <li>
                                <a href="{{route('training')}}">Training</a> & <a href="{{route('books')}}">Books</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('contact') }}">Support</a> & <a
                                    href="{{ route('support') }}">Services</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- item -->

            </div>
        </div>
    </div>
    {{-- </div> --}}
    <!-- footer social -->
    <div class="container-fluid social_areas" style="background: #222222; border-top: 1px solid #6c6c6c; border-bottom: 1px solid #6c6c6c;">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                <div class="trial-block" id="ContactUs">
                    <div class="section-title text-center">
                        <span class="section-title-line section-title-line"></span>
                    </div>
                    <div class="social-overlap process-scetion">
                        <div class="container">
                            <div class="social-icons">
                                <a href="{{ !empty($setting->facebook_url) ? $setting->facebook_url : '' }}" class="slider-nav-item">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{ !empty($setting->twitter_url) ? $setting->twitter_url : '' }}" class="slider-nav-item">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ !empty($setting->linkedin_url) ? $setting->linkedin_url : '' }}" target="_blank" class="slider-nav-item">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="{{ !empty($setting->youtube_url) ? $setting->youtube_url : '' }}" target="_blank" class="slider-nav-item">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom -->
    <div class="container">
        <div class="row px-lg-4 px-sm-0 align-items-center">
            <div class="col-lg-6 text-lg-start text-sm-center">
                <div>
                    <p class="m-0 p-0 text-white">&copy {{ date('Y') }} NGen IT</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <ul class="footer_bottom_text">
                        <li>
                            <a class="text-white" href="{{ route('privacy.policy') }}">Privacy policy </a>
                        </li>
                        <li>
                            <a class="text-white" href="{{ route('terms.policy') }}">&nbsp;|&nbsp; Terms & Conditions </a>
                        </li>
                        {{-- <li>
                            <a class="text-white" href="" data-bs-toggle="modal" data-bs-target="#cookies_modal">&nbsp;|&nbsp; Cookies</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!----------End--------->
{{-- Ask For Price Modal --}}
<!-- Modal -->
<div class="modal fade" id="cookies_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2">
                <img src="http://165.22.48.109/ngenit/upload/logoimage/1766111041030883.png" width="70px"
                    height="50px" alt="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-light p-3">
                    <h1 class="text-center">This website uses cookies</h1>
                    <p>DHI A/S, our affiliates, suppliers and business partners use cookies to provide the best possible
                        service to our website users. Cookies are used for:</p>
                    <ul>
                        <li style="list-style: circle;">Necessary features</li>
                        <li style="list-style: circle;">Enhanced user experience</li>
                        <li style="list-style: circle;">Statistics and web analysis</li>
                        <li style="list-style: circle;">Marketing</li>
                    </ul>


                    <div class="card border-0 shadow-lg">
                        <div class="d-flex justify-content-between py-3 px-3  border-0">
                            <div class="form-check form-check-inline form-check-reverse">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-switch custom-switch-sm">
                                            <input type="checkbox" class="custom-control-input" id="normalChek"">
                                            <label class="custom-control-label" for="normalChek">Normal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-check-inline form-check-reverse">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-switch custom-switch-sm">
                                            <input type="checkbox" class="custom-control-input" id="functionalChk"">
                                            <label class="custom-control-label" for="functionalChk">Function</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-check-inline form-check-reverse">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-switch custom-switch-sm">
                                            <input type="checkbox" class="custom-control-input" id="statisticalChk"">
                                            <label class="custom-control-label" for="statisticalChk">Statistical</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-check-inline form-check-reverse">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-switch custom-switch-sm">
                                            <input type="checkbox" class="custom-control-input" id="marketingChk"">
                                            <label class="custom-control-label" for="marketingChk">Marketing</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="card border-0">
                        <p class="px-3" id="marketing" style="display: none">
                            Marketing allWe will not place cookies from this website unless you consent hereto (except for technical
                            cookies
                        </p>
                    </div>
                    <div class="card border-0">
                        <p class="px-3" id="functional" style="display: none">
                            functional allWe will not place cookies from this website unless you consent hereto (except for technical
                            cookies
                        </p>
                    </div>
                    <div class="card border-0">
                        <p class="px-3" id="statistical" style="display: none">
                            statistical allWe will not place cookies from this website unless you consent hereto (except for technical
                            cookies
                        </p>
                    </div>
                    <div class="card border-0">
                        <p class="px-3" id="normaal" style="display: none">
                            normaal allWe will not place cookies from this website unless you consent hereto (except for technical
                            cookies
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    {{-- <button class="common_button2 effect01">Necessary Cookies Only</button> --}}
                    <a href=""><button class="common_button2 effect01" id="texts"
                            style="display:none">Save
                            Setting</button></a>
                    <a href=""><button class="common_button_accept effect01 mt-2">Accept All</button></a>
                </div>

                {{-- Accordion --}}
            </div>
        </div>
    </div>
</div>
{{-- Ask For Price Modal End --}}
