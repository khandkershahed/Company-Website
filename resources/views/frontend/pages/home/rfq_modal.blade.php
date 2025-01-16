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
                                                <button class="btn-color ms-3 add_to_cart_quantity"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}">Add to
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
                        <form action="{{ route('rfq.add') }}" method="post" id="get_quote_frm"
                            class="get_quote_frm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="client_id"
                                value="{{ optional(Auth::guard('client')->user())->id }}">
                            @if ($client = Auth::guard('client')->user())
                                <input type="hidden" name="client_type"
                                    value="{{ optional(Auth::guard('client')->user())->user_type }}">
                            @endif
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
                                                required id="name" name="name" placeholder="Your Name *"
                                                value="{{ optional(Auth::guard('client')->user())->name }}" />
                                        </div>
                                        <div class="col-lg-4 pe-0 mb-3">

                                            <input type="number" class="form-control form-control-sm rounded-0"
                                                id="phone" name="phone" placeholder="Your Phone Number *"
                                                required
                                                value="{{ optional(Auth::guard('client')->user())->phone }}" />
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            {{-- <label for="contact">Company Name </label> --}}
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                id="contact" name="company_name" placeholder="Your Company Name *"
                                                required
                                                value="{{ optional(Auth::guard('client')->user())->company_name }}" />
                                        </div>
                                        <div class="col-lg-5 pe-0 mb-3">
                                            {{-- <label for="email">Email <span class="text-danger">*</span> </label> --}}
                                            <input type="email" required
                                                class="form-control form-control-sm rounded-0" id="email"
                                                name="email" placeholder="Your Email *" required
                                                value="{{ optional(Auth::guard('client')->user())->email }}" />
                                            <span class="text-danger text-start p-0 m-0 email_validation"
                                                style="display: none">Please input valid email</span>
                                        </div>
                                        <div class="col-lg-4 pe-0 mb-3">
                                            {{-- <label for="email">Email <span class="text-danger">*</span> </label> --}}
                                            <select class="select-form-input w-100 form-control" data-placeholder="Select Your Country *" name="country"
                                                required>
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
                                                <option value="Bangladesh" selected>Bangladesh</option>
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
                                                    Ocean
                                                    Territory</option>
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
                                                    Territories
                                                </option>
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
                                                    and McDonald
                                                    Islands</option>
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
                                                    Miquelon
                                                </option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent
                                                    and the
                                                    Grenadines</option>
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
                                                <option value="United State">United State</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                                    Islands
                                                </option>
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
                                        <div class="col-lg-3 mb-3">
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
