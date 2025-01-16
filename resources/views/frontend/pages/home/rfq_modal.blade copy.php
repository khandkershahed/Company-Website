@foreach ($products as $item)
    <!-- Modal -->
    <div class="modal fade" id="productDetails{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header py-2" style="background: #ae0a46;">
                    <h5 class="modal-title text-white" id="staticBackdropLabel">Product Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="container py-5">
                        <div class="row">
                            <!-- images -->
                            <div class="col-lg-4 col-sm-12 single_product_images">
                                <!-- gallery pic -->
                                <div class="mx-auto d-block">
                                    <img id="expand" class="geeks img-fluid rounded mx-auto d-block"
                                        src="{{ asset($item->thumbnail) }}">
                                </div>
                            </div>
                            <!-- content -->
                            <div class="col-lg-8 col-sm-12 pl-4">
                                <h3>{{ $item->name }}</h3>
                                <div class="row pt-3">
                                    <div class="col-lg-8">
                                        <p class="list_price mb-0">List
                                            Price</p>
                                        <div class="product__details__price ">
                                            <p class="mb-0">US $
                                                {{ $item->price }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="stock-info">
                                            <p tabindex="0" class="prod-stock"
                                                id="product-avalialability-by-warehouse">
                                                <span aria-label="Stock Availability" class="js-prod-available">
                                                    <i class="fa fa-info-circle text-success"></i>
                                                    Stock</span>
                                                <br>
                                                <span class="badge rounded-pill badge-danger"
                                                    style="font-size:17px">Unlimited</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div>Tech overview</div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="row product_quantity_wraper justify-content-between"
                                    style="background-color: transparent !important;">
                                    <form action="javascript:void(0)">
                                        <div class="row ">
                                            <div class="col-lg-12 col-sm-12 d-flex align-items-center">
                                                <div class="pro-qty">
                                                    <input type="hidden" name="product_id" id="product_id"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="name" id="name"
                                                        value="{{ $item->name }}">
                                                    <div class="counter">
                                                        <span class="down"
                                                            onclick="decreaseCount(event, this)">-</span>
                                                        <input type="text" name="qty" value="1"
                                                            class="count_field input-qty">
                                                        <span class="up"
                                                            onclick="increaseCount(event, this)">+</span>
                                                    </div>
                                                </div>
                                                <button class="btn-color ms-3 add_to_cart_quantity" data-id="{{ $item->id }}" data-name="{{ $item->name }}">Add to
                                                    Basket</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="askProductPrice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header py-2" style="background: #ae0a46;">
                    <h5 class="modal-title text-white" id="staticBackdropLabel">Your Price Forms
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container px-0" id="sign-up-container-area" style="display: block">
                        <form>
                            <div class="py-2 px-2 bg-light rounded">
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                                <span style="font-size: 12px;">Name</span>
                                                <span style="font-size: 12px;"> :</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="name"
                                                    class="form-control form-control-sm rounded-0 w-100"
                                                    maxlength="100" placeholder="Enter Your Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                                <span style="font-size: 12px;">Email</span>
                                                <span style="font-size: 12px;"> :</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="email" name="email"
                                                    class="form-control form-control-sm rounded-0 w-100"
                                                    maxlength="100" placeholder="Enter Your Email" required>

                                                <span class="text-danger text-start p-0 m-0 email_validation"
                                                    style="display: none;">Please input
                                                    valid email</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                                <span style="font-size: 12px;">Mobile</span>
                                                <span style="font-size: 12px;"> :</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="number" name="name"
                                                    class="form-control form-control-sm rounded-0 w-100"
                                                    maxlength="100" placeholder="Enter Mobile Number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                                <span style="font-size: 12px;">Company Name</span>
                                                <span style="font-size: 12px;"> :</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="comapny"
                                                    class="form-control form-control-sm rounded-0 w-100"
                                                    maxlength="100" placeholder="Enter Company Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                                <span style="font-size: 12px;">Quantity </span>
                                                <span style="font-size: 12px;"> :</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="number" name="qty"
                                                    class="form-control form-control-sm rounded-0 w-100"
                                                    maxlength="100" placeholder="Enter Your Quantity" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-4 d-flex justify-content-between align-items-center">
                                                <span style="font-size: 12px;">Product</span>
                                                <span style="font-size: 12px;"> :</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="file" name="custom_image"
                                                    class="form-control form-control-sm rounded-0 w-100"
                                                    maxlength="100" placeholder="Enter Product Image" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <span style="font-size: 12px;">Type Message :</span>
                                                <textarea class="form-control form-control-sm rounded-0 w-100" id="message" name="message" rows="2"
                                                    placeholder="Enter Your Name"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer me-2" style="padding: 0px;border: 0px;">
                    <button class="btn btn-sm" style="background: #ae0a46; color: white;"
                        role="button">Submit</button>
                    <!-- HTML !-->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="rfq{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header py-0 rounded-0" style="background: #ae0a46;">
                    <h5 class="modal-title p-1 text-white" id="staticBackdropLabel">Get Quote
                    </h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0 p-0 p-lg-5">
                    <div class="container px-0">
                        @if (Auth::guard('client')->user())
                            <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm"
                                class="get_quote_frm" enctype="multipart/form-data">
                                @csrf
                                <div class="card mx-4">
                                    <div class="card-body px-4 py-2">
                                        <div class="row border" style="font-size: 0.8rem;">
                                            <div class="col-lg-3 pl-2">{{ Auth::guard('client')->user()->name }}</div>
                                            <div class="col-lg-4" style="margin: 5px 0px">
                                                {{ Auth::guard('client')->user()->email }}</div>
                                            <div class="col-lg-4" style="margin: 5px 0px">
                                                {{ Auth::guard('client')->user()->phone }}
                                                <div class="form-group" id="Rfquser" style="display:none">
                                                    <input type="text" required
                                                        class="form-control form-control-sm rounded-0" id="phone"
                                                        name="phone"
                                                        value="{{ Auth::guard('client')->user()->phone }}"
                                                        placeholder="Phone Number" style="font-size: 0.8rem;">
                                                </div>
                                            </div>
                                            <div class="col-lg-1" style="margin: 5px 0px"><a
                                                    href="javascript:void(0);" id="editRfquser"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="client_id"
                                    value="{{ Auth::guard('client')->user()->id }}">
                                <input type="hidden" name="client_type" value="client">
                                <input type="hidden" name="name"
                                    value="{{ Auth::guard('client')->user()->name }}">
                                <input type="hidden" name="email"
                                    value="{{ Auth::guard('client')->user()->email }}">
                                <span class="text-danger text-start p-0 m-0 email_validation"
                                    style="display: none;">Please input
                                    valid email</span>
                                <div class="modal-body get_quote_view_modal_body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-4 m-0">
                                            <input type="text" class="form-control form-control-sm rounded-0 mt-4"
                                                id="contact" name="company_name"
                                                value="{{ Auth::guard('client')->user()->company_name }}"
                                                placeholder="Company Name" style="font-size: 0.7rem;">
                                        </div>
                                        <div class="form-group col-sm-4 m-0">
                                            <input type="number" class="form-control form-control-sm rounded-0 mt-4"
                                                id="contact" name="qty" placeholder="Quantity"
                                                style="font-size: 0.7rem;">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="m-0" for="image" style="font-size: 0.7rem;">Upload
                                                Image</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm rounded-0" id="image"
                                                accept="image/*" style="font-size: 0.7rem;" />
                                            <div class="form-text" style="font-size:11px;">Only png, jpg, jpeg images
                                            </div>
                                        </div>
                                        <h6 class="text-start pt-1 main_color">Product Name :</h6>
                                        <div class="form-group col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    {{ $item->name }}
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="contact">Quantity :</label>
                                                        <input type="number"
                                                            class="form-control form-control-sm rounded-0"
                                                            id="contact" name="qty">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <textarea class="form-control form-control-sm rounded-0" id="message" name="message" rows="1"
                                                placeholder="Additional Information..."></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 px-3 mx-3">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="flexCheckDefault" name="call"
                                                style="left: 3rem;">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Call Me
                                            </label>
                                        </div>
                                        <div class="form-group col-sm-12 px-3 mx-3 message g-recaptcha"
                                            data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="submit" class="btn btn-primary col-lg-3"
                                            id="submit_btn">Submit &nbsp;<i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>

                        @else
                            <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm"
                                class="get_quote_frm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="client_id" value="{{ optional(Auth::guard('client')->user())->id }}">
                                {{-- <input type="hidden" name="client_type" value="random"> --}}
                                <div class="modal-body get_quote_view_modal_body rounded-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-10 pe-0">
                                                <h6 class="text-start main_color fw-bold">Product Name :</h6>
                                                <span class="text-black">{{ $item->name }}</span>
                                            </div>
                                            <div class="col-lg-2 ps-0">
                                                <label for="quantity"
                                                    class="text-start main_color fw-bold mb-2">Quantity</label>
                                                <input type="number" class="form-control form-control-sm rounded-0"
                                                    name="qty" value="1" id="quantity"
                                                    placeholder="Quantity" />
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-4 pe-0 mb-3">
                                                {{-- <label for="name">Name <span class="text-danger">*</span> </label> --}}
                                                <input type="text" class="form-control form-control-sm rounded-0"
                                                    required id="name" name="name"
                                                    placeholder="Your Name *" />
                                            </div>
                                            <div class="col-lg-4 pe-0 mb-3">

                                                <input type="number" class="form-control form-control-sm rounded-0"
                                                    id="phone" name="phone" placeholder="Your Phone Number *"
                                                    required />
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                {{-- <label for="contact">Company Name </label> --}}
                                                <input type="text" class="form-control form-control-sm rounded-0"
                                                    id="contact" name="company_name"
                                                    placeholder="Your Company Name *" required />
                                            </div>
                                            <div class="col-lg-5 pe-0 mb-3">
                                                {{-- <label for="email">Email <span class="text-danger">*</span> </label> --}}
                                                <input type="email" required
                                                    class="form-control form-control-sm rounded-0" id="email"
                                                    name="email" placeholder="Your Email *" required />
                                                <span class="text-danger text-start p-0 m-0 email_validation"
                                                    style="display: none">Please input valid email</span>
                                            </div>
                                            <div class="col-lg-7 mb-3">
                                                {{-- <label for="contact">Custom Image </label> --}}
                                                <input type="file" name="image"
                                                    class="form-control form-control-sm rounded-0" id="image"
                                                    accept="image/*" placeholder="Your Custom Image" />
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                {{-- <label for="message">Type Message</label> --}}
                                                <textarea class="form-control form-control-sm rounded-0" id="message" name="message" rows="3"
                                                    placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-3 mb-3">
                                                <div class="form-check border-0">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="flexCheckDefault" name="call" placeholder="Call Me"
                                                        style="left: 3rem;" />
                                                    <label class="form-check-label" for="flexCheckDefault"> Call Me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 mb-3">
                                                <div class="form-group px-3 mx-1 message g-recaptcha w-100"
                                                    data-sitekey="{{ config('app.recaptcha_site_key') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-12 text-end">
                                                <button type="submit" class="btn-color" id="submit_btn">Submit
                                                    &nbsp;<i class="fa fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="modal-footer border-0">

                                    </div> --}}
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <!-- HTML !-->
            </div>
        </div>
    </div>
@endforeach


@section('scripts')
    <script>
        $(document).ready(function() {
            $('.view-password').on('click', function() {
                let input = $(this).prev("input[name='password']");
                let icon = $(this).toggleClass('fa-eye fa-eye-slash');
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            });

            $('.registered_name').on('input', function() {
                var inputVal = $(this).val();
                $('.welcome_name').text(inputVal); // Assuming '.welcome_name' exists elsewhere in your HTML
            });

            $('.confirm_password').on('keyup', function() {
                if ($('.password').val() == $('.confirm_password').val()) {
                    $('.confirm_message').html('Password is matched').css('color', 'green');
                } else {
                    $('.confirm_message').html('Password do not match').css('color', 'red');
                }
            });

            $('input[name="email"]').on("keyup change", function(e) {
                var email = $(this).val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(email)) {
                    $('.email_validation').hide();
                } else {
                    $('.email_validation').show();
                }
            });

            $('#partnerLoginForm').submit(function(event) {
                var email = $('input[name="email"]').val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Please enter a valid email address.');
                    event.preventDefault();
                }
                // Add additional validation if needed
            });

            $('#partnersignUpForm').submit(function(event) {
                var email = $('input[name="email"]').val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Please enter a valid email address.');
                    event.preventDefault();
                }
                // Add additional validation if needed
            });



            // $('.password_strength').keyup(function() {
            $('.password_strength').on('keyup change', function() {

                var password = $(this).val();
                var strengthIndicator = $('#input_loginStrengthIndicator');


                if (password.length > 0) {
                    $('#input_loginStrength').show();
                } else {
                    $('#input_loginStrength').hide();
                }

                // Define password strength criteria (customize as needed)
                var weak = /[a-zA-Z]/.test(password) && password.length < 6;
                var medium = /[a-zA-Z]/.test(password) && /[0-9]/.test(password) && password.length >= 6;
                var strong = /[a-zA-Z]/.test(password) && /[0-9]/.test(password) && /[$@#&!]/.test(
                    password) && password.length >= 8;

                if (strong) {
                    strengthIndicator.text('Strong');
                    strengthIndicator.removeClass().addClass('text-success');
                    $('#input_loginStrength').show();
                } else if (medium) {
                    strengthIndicator.text('Medium');
                    strengthIndicator.removeClass().addClass('text-warning');
                    $('#input_loginStrength').show();
                } else if (weak) {
                    strengthIndicator.text('Weak');
                    strengthIndicator.removeClass().addClass('text-danger');
                    $('#input_loginStrength').show();
                } else {
                    $('#input_loginStrength').hide();
                }
            });



            const $signUpButton = $('#signUp');
            const $signInButton = $('#signIn');
            const $signInContainer = $('#sign-in-container-area');
            const $signUpContainer = $('#sign-up-container-area');

            $signUpButton.on('click', function() {
                $signInContainer.hide();
                $signUpContainer.show();
            });

            $signInButton.on('click', function() {
                $signUpContainer.hide();
                $signInContainer.show();
            });
        });
    </script>
@endsection
