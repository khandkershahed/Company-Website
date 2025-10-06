<style>
    .sidebar_rfq {
        position: relative;
        left: -47.5%;
        transition: left 0.5s ease;
    }

    .sidebar_rfq-none {
        position: relative;
        left: 0%;
        transition: left 0.5s ease;
    }

    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked) {
        position: absolute;
        left: auto !important;
    }

    .btn-close {
        box-sizing: content-box;
        width: 0.6em;
        height: 0.6em;
        padding: 0.25em 0.25em;
        color: #ffff;
        background: transparent url('{{ asset(' images/close.png') }}') center / 0.7em auto no-repeat;
        border: 0;
        border-radius: 0.375rem;
        opacity: 1;
    }

    /* this is new */
    .feedback_upper_modal {
        letter-spacing: 3px;
        line-height: 0;
        cursor: pointer;
        position: fixed;
        bottom: 45%;
        right: -77px;
        color: var(--primary-color);
        background-color: #ffffff;
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
        z-index: 1;
        transition: 0.5s;
        transform: rotate(-90deg);
        padding-top: 0px;
        padding-bottom: 0px;
        overflow: hidden;
        z-index: 1000;
        height: 50px;
        width: 200px;
        border: 1px solid #00000040;
        text-align: center;
    }

    .feedback_upper_modal::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: sonar 1.5s infinite ease-out;
        z-index: -1;
    }

    @keyframes sonar {
        0% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.7;
        }

        100% {
            transform: translate(-50%, -50%) scale(2.5);
            /* Controls size of the ring */
            opacity: 0;
        }
    }

    .feedback_upper_modal-amount {
        font-family: 'PhpDebugbarFontAwesome';
        letter-spacing: 1px;
        line-height: 3;
        cursor: pointer;
        position: fixed;
        bottom: 53%;
        right: 30px;
        background-color: #ffffff;
        border: 1px solid #ae0a46 !important;
        color: #ae0a46;
        padding: 0px 3px;
        border: none;
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
        z-index: 1;
        transition: 0.5s;
        transform: rotate(0deg);
        padding-top: 0px;
        padding-bottom: 0px;
        overflow: hidden;
        width: 26px;
        height: 26px;
        border-radius: 100%;
        z-index: 1002;

    }

    .remove-rfq {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #eee;
        width: 25px;
        height: 25px;
        border-radius: 100%;
    }

    .remove-box {
        display: flex;
        justify-content: end;
        position: relative;
        bottom: -18px;
        z-index: 5;
        left: 8px;
    }

    .offcanvas.offcanvas-bottom {
        height: auto;
    }

    .sticky-bottom-bar {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1050;
        /* stays above all content */
    }

    .rfq-full-button {
        width: 100%;
        font-family: var(--primary-font);
        text-align: center;
        font-size: var(--header-font-size);
        color: var(--white);
        background: #000080;
        height: 150px;
        padding: 15px 0px;
        border-top: 1px solid #000080;
        border-bottom: 1px solid #000080;
        border-radius: 0px;
    }

    .rfq-full-button:hover {
        width: 100%;
        font-family: var(--primary-font);
        text-align: center;
        font-size: var(--header-font-size);
        color: var(--white);
        background: #000080;
        height: 150px;
        padding: 15px 0px;
        border: 1px solid #000080;
        border-radius: 0px;
    }

    .rfq-full-button:active {
        width: 100%;
        font-family: var(--primary-font);
        text-align: center;
        font-size: var(--header-font-size);
        color: var(--white);
        background: #000080 !important;
        height: 150px;
        padding: 15px 0px;
        border: 1px solid #000080 !important;
        border-radius: 0px;
    }
</style>

<section>
    @if (Cart::count() > 0)
    <button class="feedback_upper_modal d-lg-block d-sm-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
        <span class="miniRFQQTY"
            style="line-height: 1.3; font-size:1.2rem; font-family: system-ui;letter-spacing: 1px;">
            {{ Cart::count() }} {{ Cart::count() > 1 ? 'Item(s)' : 'Item' }} Added
        </span>
    </button>
    <section class="sticky-bottom-bar" id="stickyBottomBar" style="background: -webkit-linear-gradient(bottom left, #ae0a46 0%, #4e0721 100%); /* Safari, Chrome */
background: linear-gradient(to top right, #ae0a46 0%, #4e0721 100%); /* Standard */">
        <div class="text-center">
            <div class="p-3 mx-auto rounded d-flex justify-content-between align-items-center w-75">
                <div>
                    <div class="d-flex justify-content-between align-items-center" type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasBottom"
                        aria-controls="offcanvasBottom">
                        <div class="text-start">
                            <h5 class="mb-1 text-white">Your Cart Summary</h5>
                            <p class="mb-2 text-white" style="font-size: 0.9rem;">
                                Review the items you’ve added to your cart.<br /> You can click the button below to view or edit your selections.
                            </p>
                            <span class="text-white miniRFQQTY"
                                style="line-height: 1.3; font-size:1.2rem; font-family: system-ui; letter-spacing: 1px;">
                                ({{ Cart::count() }} {{ Cart::count() > 1 ? 'Item(s)' : 'Item' }} Added)
                            </span>
                        </div>

                        <div>
                           <!-- Offcanvas trigger button -->
                            <button class="py-1 btn btn-white ms-3" type="button" style="height: 40px;display: flex;justify-content: center;align-items: center;"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasBottom"
                                aria-controls="offcanvasBottom">
                                View Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Close icon -->
                <i id="stickyCloseBtn" class="text-white fas fa-times fs-5 ms-2 fa-shake" style="cursor: pointer; "></i>
            </div>
        </div>
    </section>

    @else
    <a href="{{ route('rfq') }}" class="feedback_upper_modal d-lg-block d-sm-none">
        <span class="miniRFQQTY" style="line-height: 1.3; font-size:1.2rem; font-family: system-ui;position: relative;top: 20%;">
            Ask Query
        </span>
    </a>
    @endif

    {{-- Offcanvas --}}
    <div class="offcanvas offcanvas-bottom offcanvasRFQ" tabindex="-1" id="offcanvasBottom"
        aria-labelledby="offcanvasBottomLabel">
        @include('frontend.partials.offcanvas')
    </div>

    {{-- Offcanvas --}}
    <!-- Modal -->
    <div class="modal fade" id="rfqModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="py-2 modal-header" style="background: #ae0a46;">
                    <h5 class="text-white modal-title" id="staticBackdropLabel">Get Price Quotation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-0 modal-body p-lg-4">
                    <div class="container">
                        <form action="{{ route('rfq.add') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="client_id"
                                value="{{ optional(Auth::guard('client')->user())->id }}">
                            <div class="mb-4 row">
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="product_name" id="product_name"
                                        value="{{ old('product_name') }}" placeholder="Product Name" required>
                                </div>
                                <div class="col-lg-3">
                                    <input type="number" class="form-control" name="qty" id="qty"
                                        placeholder="Example: 0,1,2..." placeholder="Custom Quantity"
                                        value="{{ old('qty') }}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="mb-3 col-lg-4 pe-0">
                                    <input type="text" class="form-control rounded-0" required id="name"
                                        name="name" placeholder="Your Name *"
                                        value="{{ optional(Auth::guard('client')->user())->name }}" />
                                </div>
                                <div class="mb-3 col-lg-4 pe-0">
                                    <input type="number" class="form-control rounded-0" id="phone" name="phone"
                                        placeholder="Your Phone Number *" required
                                        value="{{ optional(Auth::guard('client')->user())->phone }}" />
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <input type="text" class="form-control rounded-0" id="contact"
                                        name="company_name" placeholder="Your Company Name *" required
                                        value="{{ optional(Auth::guard('client')->user())->company_name }}" />
                                </div>
                                <div class="mb-3 col-lg-5 pe-0">
                                    <input type="email" required class="form-control rounded-0" id="email"
                                        name="email" placeholder="Your Email *"
                                        value="{{ optional(Auth::guard('client')->user())->email }}" />
                                    <span class="p-0 m-0 text-danger text-start email_validation"
                                        style="display: none">Please input valid email</span>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <select name="country" class="form-control select" id="country">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda
                                        </option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                        </option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian
                                            Ocean Territory</option>
                                        <option value="British Virgin Islands">British Virgin Islands
                                        </option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African
                                            Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands
                                        </option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo - Brazzaville">Congo - Brazzaville
                                        </option>
                                        <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern
                                            Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and McDonald Islands">Heard Island
                                            and McDonald Islands</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong SAR China">Hong Kong SAR China
                                        </option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau SAR China">Macau SAR China</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar [Burma]">Myanmar [Burma]</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles
                                        </option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana
                                            Islands</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territories">Palestinian Territories
                                        </option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn Islands">Pitcairn Islands</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Réunion">Réunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barthélemy">Saint Barthélemy</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                        </option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Martin">Saint Martin</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and
                                            Miquelon</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent
                                            and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="São Tomé and Príncipe">São Tomé and Príncipe
                                        </option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                        </option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago
                                        </option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos
                                            Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates
                                        </option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                            Islands</option>
                                        <option value="U.S. Virgin Islands">U.S. Virgin Islands
                                        </option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City">Vatican City</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <input type="file" name="image" class="form-control rounded-0"
                                        id="image" accept="image/*" placeholder="Your Custom Image" />
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <textarea class="form-control rounded-0" id="message" name="message" rows="3" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="mb-3 col-lg-3">
                                    <div class="form-check"
                                        style="border: 1px dashed #4e8ef5;
                                    padding: 28px 45px;
                                    background: #4d8df42e;
                                    border-radius: 8px;">
                                        <input class="form-check-input" name="call" type="checkbox"
                                            value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Call Me
                                        </label>
                                    </div>
                                    {{-- <div class="border-0 form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckDefault" name="call" placeholder="Call Me" />
                                        <label class="form-check-label" for="flexCheckDefault"> Call Me</label>
                                    </div> --}}
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <div class="px-3 mx-1 form-group message g-recaptcha w-100"
                                        data-sitekey="{{ config('app.recaptcha_site_key') }}">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <button type="submit" class="p-2 btn rounded-0"
                                        style="background: #ae0a46; color: white; width:150px; font-size:20px"
                                        role="button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- HTML !-->
            </div>
        </div>
    </div>
</section>

<section>
    {{-- Faborite --}}
    <div class="fab-info-icon-wrapper">
        <input id="fab-info-iconCheckbox" type="checkbox" class="fab-info-icon-checkbox" />
        <label class="fab-info-icon" for="fab-info-iconCheckbox">
            <span class="fab-info-icon-dots fab-info-icon-dots-1"></span>
            <span class="fab-info-icon-dots fab-info-icon-dots-2"></span>
            <span class="fab-info-icon-dots fab-info-icon-dots-3"></span>
        </label>
        <div class="fab-info-icon-wheel">
            <a href="{{ route('faq') }}" class="fab-info-icon-action fab-info-icon-action-2" data-title="FAQ">
                <i class="fas fa-book"></i>
            </a>
            <a href="{{ route('rfq') }}" class="fab-info-icon-action fab-info-icon-action-1" data-title="RFQ">
                {{-- <i class="fas fa-question"></i>
                data-bs-toggle="modal" data-bs-target="#rfqModal" --}}

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.84 110.29"
                    style="height: 35px; padding-top: 8px;">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #c0d4e3;
                            }

                            .cls-2 {
                                fill: #98b8d2;
                            }

                            .cls-3 {
                                fill: #d9e6ee;
                            }

                            .cls-4 {
                                fill: #ae0a46;
                            }

                            .cls-5 {
                                fill: none;
                            }
                        </style>
                    </defs>
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <path class="cls-1"
                                d="M48.43,86.4A17.49,17.49,0,0,0,50.88,72H65A17.49,17.49,0,0,0,67.41,86.4Z" />
                            <path class="cls-2"
                                d="M64.36,76.4c0,.55,0,1.09.07,1.62h-13a14.41,14.41,0,0,0,.08-1.62,19.11,19.11,0,0,0-.16-2.28h13.2A17.23,17.23,0,0,0,64.36,76.4Z" />
                            <path class="cls-3"
                                d="M115.84,3.63V58.41h-3.42V6.22a2.8,2.8,0,0,0-2.8-2.81H6.21A2.8,2.8,0,0,0,3.42,6.22V58.41H0V3.63A3.64,3.64,0,0,1,3.63,0H112.21A3.64,3.64,0,0,1,115.84,3.63Z" />
                            <path class="cls-3"
                                d="M0,60.45V70.68a3.63,3.63,0,0,0,3.63,3.63H112.21a3.62,3.62,0,0,0,3.62-3.63V60.45Zm61.75,8.33a1.15,1.15,0,0,1-.84.35h-6a1.2,1.2,0,0,1-.84-2,1.23,1.23,0,0,1,.84-.35h6a1.19,1.19,0,0,1,1.19,1.2A1.15,1.15,0,0,1,61.75,68.78Z" />
                            <path class="cls-4"
                                d="M110.37,6.22V58.41H5.46V6.22a.76.76,0,0,1,.75-.76H109.62A.75.75,0,0,1,110.37,6.22Z" />
                            <line class="cls-5" x1="53.73" y1="67.94" x2="62.1" y2="67.94" />
                            <path class="cls-4"
                                d="M62.1,67.94a1.2,1.2,0,0,1-1.19,1.19h-6a1.2,1.2,0,0,1-.85-2,1.24,1.24,0,0,1,.85-.35h6A1.19,1.19,0,0,1,62.1,67.94Z" />
                            <path class="cls-3"
                                d="M36.35,43.53,30.57,33.27H28.09l0,10.24H22.79l.06-26.3,9.87,0a11.44,11.44,0,0,1,5.19,1.08,7.51,7.51,0,0,1,3.22,2.91,7.77,7.77,0,0,1-4.94,11.65l6.27,10.67ZM28.1,29.31h4.4a4.44,4.44,0,0,0,3.21-1,3.87,3.87,0,0,0,1.06-2.88,3.7,3.7,0,0,0-1.05-2.81,4.48,4.48,0,0,0-3.2-1H28.11Z" />
                            <path class="cls-3"
                                d="M63.23,17.29v4.26l-11,0v6.75l8.4,0v4.18l-8.4,0,0,11.11H46.94L47,17.26Z" />
                            <path class="cls-3"
                                d="M86.49,48.27l-4-4.79a14.32,14.32,0,0,1-3.4.41,13.63,13.63,0,0,1-6.77-1.75,12.93,12.93,0,0,1-4.89-4.82,13.48,13.48,0,0,1-1.8-6.95,13.41,13.41,0,0,1,1.83-6.91,12.9,12.9,0,0,1,4.91-4.79A14.15,14.15,0,0,1,86,18.7a12.87,12.87,0,0,1,4.85,4.81,13.4,13.4,0,0,1,1.77,6.92,13.61,13.61,0,0,1-1.5,6.38A12.88,12.88,0,0,1,87,41.49l6,6.8ZM72.09,35a7.22,7.22,0,0,0,2.84,3.07,8.67,8.67,0,0,0,8.38,0,7.3,7.3,0,0,0,2.83-3.06,10.19,10.19,0,0,0,1-4.63,10,10,0,0,0-1-4.62,7.22,7.22,0,0,0-2.82-3,8.17,8.17,0,0,0-4.18-1.07,8.29,8.29,0,0,0-4.2,1,7.2,7.2,0,0,0-2.85,3,9.89,9.89,0,0,0-1,4.61A10.1,10.1,0,0,0,72.09,35Z" />
                            <path class="cls-3"
                                d="M82.23,91.92a.87.87,0,0,1-.78.53H34.39a.87.87,0,0,1-.78-.53.86.86,0,0,1-.06-.61l1.16-4.6a.91.91,0,0,1,.84-.69H80.29a.89.89,0,0,1,.83.69l1.16,4.6A.9.9,0,0,1,82.23,91.92Z" />
                            <line class="cls-5" x1="81.15" y1="110.29" x2="79.61" y2="110.29" />
                        </g>
                    </g>
                </svg>
            </a>

            <a href="{{ route('contact') }}" class="fab-info-icon-action fab-info-icon-action-4"
                data-title="Contact">
                <i class="fas fa-info"></i>
            </a>
            <a href="{{ route('terms.policy') }}" class="fab-info-icon-action fab-info-icon-action-3"
                data-title="Terms & Condition">
                <i class="fas fa-address-book"></i>
            </a>

        </div>
    </div>
</section>
<script>
    document.getElementById('offcanvasTrigger').addEventListener('click', function() {
        document.querySelector('.extra-btns').style.left = '50%'; // Move button to the center
    });

    document.getElementById('offcanvasExample').addEventListener('hidden.bs.offcanvas', function() {
        document.querySelector('.extra-btns').style.left = '0'; // Move button back to the left
    });
</script>
<script>
    function toggleSidebar() {
        $('.sidebar_rfq').toggleClass('sidebar_rfq-none');
        $('.fa-arrow-down-long').toggleClass('d-none');
        $('.fa-arrow-up-long').toggleClass('d-none');
    }
</script>

<!-- JS logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stickyBar = document.getElementById('stickyBottomBar');
        const closeBtn = document.getElementById('stickyCloseBtn');
        const offcanvasEl = document.getElementById('offcanvasBottom');
        const itemCount = {{ Cart::count() }};

        // Hide sticky section if no items
        if (itemCount === 0) {
            stickyBar.style.display = 'none';
            return;
        }

        // Close button click: hide section for 1 minute
        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent bubbling to offcanvas button
            stickyBar.style.display = 'none';
            setTimeout(() => {
                stickyBar.style.display = 'block';
            }, 10000); // 1 minute
        });

        // Hide sticky bar when offcanvas opens
        if (offcanvasEl) {
            offcanvasEl.addEventListener('show.bs.offcanvas', () => {
                stickyBar.style.display = 'none';
            });

            offcanvasEl.addEventListener('hidden.bs.offcanvas', () => {
                if (itemCount > 0) stickyBar.style.display = 'block';
            });
        }
    });
</script>
{{-- Feed Back Button --}}