@extends('frontend.master')
@section('content')
    @include('frontend.pages.rfq.partials.rfq_css')
    <style>
        .next-tab {
            width: 170px;
        }

        .prev-tab {
            width: 170px;
        }

        .is-invalid {
            border: 1px solid #dc3545;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-lg-8">
                <div class="mx-auto my-5 shadow-sm card rounded-2" style="border: 1px solid #eee;">
                    <div class="border-0 card-header rfq-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 text-white">Request for Quotation</h3>
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="text-white form-check-label fw-normal" for="flexCheckChecked">
                                        <small>RFQ by Case</small>
                                    </label>
                                    <i class="fa-solid fa-question" data-toggle="tooltip"
                                        title="Coming Soon: Create RFQ Describing by Project Case."
                                        style="
                                    border: 1px solid #afafaf;
                                    color: #afafaf;
                                    border-radius: 1000%;
                                    font-size: 10px;
                                    width: 20px;
                                    height: 20px;
                                    text-align: center;
                                    position: relative;
                                    line-height: 1.9;
                                    "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rfqCreate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1: Project Details -->
                            <div id="projectStep" class="p-3">
                                <div class="row gx-2">
                                    <div class="col-lg-12" id="inputRepeater">
                                        <div class="mt-3 mb-5 row align-items-center input-row">
                                            <div class="mx-0 col-lg-12">
                                                <div class="rfq-repeater parent-container">
                                                    <div class="rfq-title-btns" id="productRowsContainer">
                                                        @if ($cart_products->count() > 0)
                                                            @foreach ($cart_products as $key => $cart_product)
                                                                <div class="mb-2 row gx-2 align-items-center product-row">
                                                                    <div class="col-lg-1 serial-number">
                                                                        <span
                                                                            class="border-0 d-flex justify-content-center form-control form-control-sm rounded-1">
                                                                            1
                                                                        </span>
                                                                    </div>
                                                                    <div class="mt-1 col-lg-9 col-10">
                                                                        <div>
                                                                            <input type="text" name="product_name[]"
                                                                                value="{{ $cart_product->name }}"
                                                                                class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                                placeholder="Product Title" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="pe-3">
                                                                                <input name="qty[]" type="number"
                                                                                    value="1"
                                                                                    class="py-3 border-0 text-end form-control form-control-sm rounded-1"
                                                                                    placeholder="QTY..">
                                                                            </div>
                                                                            <a href="javascript:void(0)" class="delete-btn"
                                                                                onclick="deleteRow(this)">
                                                                                <i
                                                                                    class="fa-regular fa-trash-can text-danger"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="row gx-2 align-items-center product-row">
                                                                <div class="col-lg-1 serial-number">
                                                                    <span
                                                                        class="border-0 d-flex justify-content-center align-items-center form-control form-control-sm rounded-1">
                                                                        1
                                                                    </span>
                                                                </div>
                                                                <div class="mt-1 col-lg-9 col-10">
                                                                    <input name="product_name[]"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Product Title *" required>
                                                                </div>
                                                                <div class="col-lg-1 col-1">
                                                                    <input name="qty[]" type="number" value="1"
                                                                        class="py-3 border-0 text-end form-control form-control-sm rounded-1"
                                                                        placeholder="QTY.. *">
                                                                </div>
                                                                <div class="col-lg-1 col-1">
                                                                    <a href="javascript:void(0)" class="delete-btn"
                                                                        onclick="deleteRow(this)">
                                                                        <i class="fa-regular fa-trash-can text-danger"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mt-5 rfq-add-btns">
                                                    <button type="button" class="rounded-1" onclick="addRow()">
                                                        <i class="fa-solid fa-plus" style="font-size: 10px"></i>
                                                        Add Items
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="pb-3 m-0">
                                    <div class="mt-4 row">
                                        <div class="col-lg-12">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs d-flex justify-content-center" id="myTab"
                                                role="tablist">
                                                <li class="nav-item me-" role="presentation">
                                                    <button class="nav-link active" id="your-information-tab"
                                                        data-bs-toggle="tab" data-bs-target="#your-information"
                                                        type="button" role="tab" aria-controls="your-information"
                                                        aria-selected="true" style="font-size: 14px">
                                                        Company Info
                                                    </button>
                                                </li>
                                                <li class="nav-item me-" role="presentation">
                                                    <button class="nav-link" id="delivery-location-tab"
                                                        data-bs-toggle="tab" data-bs-target="#delivery-location"
                                                        type="button" role="tab" aria-controls="delivery-location"
                                                        aria-selected="false" style="font-size: 14px">
                                                        Shipping Address
                                                    </button>
                                                </li>
                                                <li class="nav-item me-" role="presentation">
                                                    <button class="nav-link" id="end-user-tab" data-bs-toggle="tab"
                                                        data-bs-target="#end-user" type="button" role="tab"
                                                        aria-controls="end-user" aria-selected="false" style="font-size: 14px">
                                                        Final User Info
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="aditional-location-tab"
                                                        data-bs-toggle="tab" data-bs-target="#aditional-location"
                                                        type="button" role="tab" aria-controls="aditional-location"
                                                        aria-selected="false" style="font-size: 14px">
                                                        Aditional Information
                                                    </button>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="your-information" role="tabpanel"
                                                    aria-labelledby="your-information-tab">
                                                    <div class="p-5">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="company_name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Company Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="address" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Address *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="select-form-input w-100 cst-select form-select"
                                                                        name="country" required>
                                                                        <option value="">Select Country</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Åland Islands">Åland Islands
                                                                        </option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa
                                                                        </option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and
                                                                            Barbuda
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
                                                                        <option value="Bosnia and Herzegovina">Bosnia and
                                                                            Herzegovina
                                                                        </option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island
                                                                        </option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">
                                                                            British Indian
                                                                            Ocean
                                                                            Territory</option>
                                                                        <option value="British Virgin Islands">British
                                                                            Virgin Islands
                                                                        </option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands
                                                                        </option>
                                                                        <option value="Central African Republic">Central
                                                                            African
                                                                            Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island
                                                                        </option>
                                                                        <option value="Cocos [Keeling] Islands">Cocos
                                                                            [Keeling] Islands
                                                                        </option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo - Brazzaville">Congo -
                                                                            Brazzaville
                                                                        </option>
                                                                        <option value="Congo - Kinshasa">Congo - Kinshasa
                                                                        </option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Côte d’Ivoire">Côte d’Ivoire
                                                                        </option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic
                                                                        </option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican
                                                                            Republic</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea
                                                                        </option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands">Falkland Islands
                                                                        </option>
                                                                        <option value="Faroe Islands">Faroe Islands
                                                                        </option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Guiana">French Guiana
                                                                        </option>
                                                                        <option value="French Polynesia">French Polynesia
                                                                        </option>
                                                                        <option value="French Southern Territories">French
                                                                            Southern
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
                                                                        <option value="Guinea-Bissau">Guinea-Bissau
                                                                        </option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard Island and McDonald Islands">
                                                                            Heard Island
                                                                            and McDonald
                                                                            Islands</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong SAR China">Hong Kong SAR
                                                                            China
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
                                                                        <option value="Liechtenstein">Liechtenstein
                                                                        </option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macau SAR China">Macau SAR China
                                                                        </option>
                                                                        <option value="Macedonia">Macedonia</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands
                                                                        </option>
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
                                                                        <option value="Myanmar [Burma]">Myanmar [Burma]
                                                                        </option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Netherlands Antilles">Netherlands
                                                                            Antilles
                                                                        </option>
                                                                        <option value="New Caledonia">New Caledonia
                                                                        </option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island
                                                                        </option>
                                                                        <option value="Northern Mariana Islands">Northern
                                                                            Mariana
                                                                            Islands</option>
                                                                        <option value="North Korea">North Korea</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestinian Territories">Palestinian
                                                                            Territories
                                                                        </option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea
                                                                        </option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pitcairn Islands">Pitcairn Islands
                                                                        </option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Réunion">Réunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Saint Barthélemy">Saint Barthélemy
                                                                        </option>
                                                                        <option value="Saint Helena">Saint Helena</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts
                                                                            and Nevis
                                                                        </option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="Saint Martin">Saint Martin</option>
                                                                        <option value="Saint Pierre and Miquelon">Saint
                                                                            Pierre and
                                                                            Miquelon
                                                                        </option>
                                                                        <option value="Saint Vincent and the Grenadines">
                                                                            Saint Vincent
                                                                            and the
                                                                            Grenadines</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="São Tomé and Príncipe">São Tomé and
                                                                            Príncipe
                                                                        </option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore" selected>Singapore
                                                                        </option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands
                                                                        </option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="South Georgia">South Georgia
                                                                        </option>
                                                                        <option value="South Korea">South Korea</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Svalbard and Jan Mayen">Svalbard and
                                                                            Jan Mayen
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
                                                                        <option value="Trinidad and Tobago">Trinidad and
                                                                            Tobago
                                                                        </option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and
                                                                            Caicos
                                                                            Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab
                                                                            Emirates
                                                                        </option>
                                                                        <option value="United Kingdom">United Kingdom
                                                                        </option>
                                                                        <option value="United State">United State</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="U.S. Minor Outlying Islands">U.S.
                                                                            Minor Outlying
                                                                            Islands
                                                                        </option>
                                                                        <option value="U.S. Virgin Islands">U.S. Virgin
                                                                            Islands
                                                                        </option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican City">Vatican City</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Wallis and Futuna">Wallis and Futuna
                                                                        </option>
                                                                        <option value="Western Sahara">Western Sahara
                                                                        </option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="w-100 form-select cst-select deliveryCity"
                                                                        name="city">
                                                                        <option value="">Select an city</option>
                                                                        <option value="ny">New York</option>
                                                                        <option value="london">London</option>
                                                                        <option value="dhaka">Dhaka</option>
                                                                        <option value="delhi">Delhi</option>
                                                                        <option value="toronto">Toronto</option>
                                                                        <option value="sydney">Sydney</option>
                                                                        <option value="beijing">Beijing</option>
                                                                        <option value="tokyo">Tokyo</option>
                                                                        <option value="paris">Paris</option>
                                                                        <option value="berlin">Berlin</option>
                                                                        <option value="rio">Rio de Janeiro</option>
                                                                        <option value="cape_town">Cape Town</option>
                                                                        <option value="lagos">Lagos</option>
                                                                        <option value="rome">Rome</option>
                                                                        <option value="madrid">Madrid</option>
                                                                        <option value="mexico_city">Mexico City</option>
                                                                        <option value="seoul">Seoul</option>
                                                                        <option value="buenos_aires">Buenos Aires</option>
                                                                        <option value="riyadh">Riyadh</option>
                                                                        <option value="stockholm">Stockholm</option>
                                                                        <option value="oslo">Oslo</option>
                                                                        <option value="helsinki">Helsinki</option>
                                                                        <option value="warsaw">Warsaw</option>
                                                                        <option value="zurich">Zurich</option>
                                                                        <option value="amsterdam">Amsterdam</option>
                                                                        <option value="brussels">Brussels</option>
                                                                        <option value="vienna">Vienna</option>
                                                                        <option value="athens">Athens</option>
                                                                        <option value="lisbon">Lisbon</option>
                                                                        <option value="budapest">Budapest</option>
                                                                        <option value="bucharest">Bucharest</option>
                                                                        <option value="tel_aviv">Tel Aviv</option>
                                                                        <option value="cairo">Cairo</option>
                                                                        <option value="nairobi">Nairobi</option>
                                                                        <option value="manila">Manila</option>
                                                                        <option value="bangkok">Bangkok</option>
                                                                        <option value="kuala_lumpur">Kuala Lumpur</option>
                                                                        <option value="singapore">Singapore</option>
                                                                        <option value="karachi">Karachi</option>
                                                                        <option value="ho_chi_minh">Ho Chi Minh City
                                                                        </option>
                                                                        <option value="jakarta">Jakarta</option>
                                                                        <option value="kathmandu">Kathmandu</option>
                                                                        <option value="colombo">Colombo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <input name="delivery_zip_code" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Delivery Zip Code *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <input name="delivery_location" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Address (eg: house, road, block)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="designation" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Designation *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="email" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Email *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="phone" type="number"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Phone Number *"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-5 d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="mb-0">Please complete your contact details for
                                                                    further
                                                                    communication needed!</p>
                                                            </div>
                                                            <button class="btn-color next-tab" type="button">
                                                                Next <i class="pe-2 fa-solid fa-arrow-right-long"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="end-user" role="tabpanel"
                                                    aria-labelledby="end-user-tab">
                                                    <div class="p-5">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="company_name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Company Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="address" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Company Address *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="select-form-input w-100 cst-select form-select"
                                                                        name="country" required>
                                                                        <option value="">Select Country</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Åland Islands">Åland Islands
                                                                        </option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa
                                                                        </option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and
                                                                            Barbuda
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
                                                                        <option value="Bosnia and Herzegovina">Bosnia and
                                                                            Herzegovina
                                                                        </option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island
                                                                        </option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">
                                                                            British Indian
                                                                            Ocean
                                                                            Territory</option>
                                                                        <option value="British Virgin Islands">British
                                                                            Virgin Islands
                                                                        </option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands
                                                                        </option>
                                                                        <option value="Central African Republic">Central
                                                                            African
                                                                            Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island
                                                                        </option>
                                                                        <option value="Cocos [Keeling] Islands">Cocos
                                                                            [Keeling] Islands
                                                                        </option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo - Brazzaville">Congo -
                                                                            Brazzaville
                                                                        </option>
                                                                        <option value="Congo - Kinshasa">Congo - Kinshasa
                                                                        </option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Côte d’Ivoire">Côte d’Ivoire
                                                                        </option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic
                                                                        </option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican
                                                                            Republic</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea
                                                                        </option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands">Falkland Islands
                                                                        </option>
                                                                        <option value="Faroe Islands">Faroe Islands
                                                                        </option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Guiana">French Guiana
                                                                        </option>
                                                                        <option value="French Polynesia">French Polynesia
                                                                        </option>
                                                                        <option value="French Southern Territories">French
                                                                            Southern
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
                                                                        <option value="Guinea-Bissau">Guinea-Bissau
                                                                        </option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard Island and McDonald Islands">
                                                                            Heard Island
                                                                            and McDonald
                                                                            Islands</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong SAR China">Hong Kong SAR
                                                                            China
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
                                                                        <option value="Liechtenstein">Liechtenstein
                                                                        </option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macau SAR China">Macau SAR China
                                                                        </option>
                                                                        <option value="Macedonia">Macedonia</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands
                                                                        </option>
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
                                                                        <option value="Myanmar [Burma]">Myanmar [Burma]
                                                                        </option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Netherlands Antilles">Netherlands
                                                                            Antilles
                                                                        </option>
                                                                        <option value="New Caledonia">New Caledonia
                                                                        </option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island
                                                                        </option>
                                                                        <option value="Northern Mariana Islands">Northern
                                                                            Mariana
                                                                            Islands</option>
                                                                        <option value="North Korea">North Korea</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestinian Territories">Palestinian
                                                                            Territories
                                                                        </option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea
                                                                        </option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pitcairn Islands">Pitcairn Islands
                                                                        </option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Réunion">Réunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Saint Barthélemy">Saint Barthélemy
                                                                        </option>
                                                                        <option value="Saint Helena">Saint Helena</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts
                                                                            and Nevis
                                                                        </option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="Saint Martin">Saint Martin</option>
                                                                        <option value="Saint Pierre and Miquelon">Saint
                                                                            Pierre and
                                                                            Miquelon
                                                                        </option>
                                                                        <option value="Saint Vincent and the Grenadines">
                                                                            Saint Vincent
                                                                            and the
                                                                            Grenadines</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="São Tomé and Príncipe">São Tomé and
                                                                            Príncipe
                                                                        </option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore" selected>Singapore
                                                                        </option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands
                                                                        </option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="South Georgia">South Georgia
                                                                        </option>
                                                                        <option value="South Korea">South Korea</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Svalbard and Jan Mayen">Svalbard and
                                                                            Jan Mayen
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
                                                                        <option value="Trinidad and Tobago">Trinidad and
                                                                            Tobago
                                                                        </option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and
                                                                            Caicos
                                                                            Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab
                                                                            Emirates
                                                                        </option>
                                                                        <option value="United Kingdom">United Kingdom
                                                                        </option>
                                                                        <option value="United State">United State</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="U.S. Minor Outlying Islands">U.S.
                                                                            Minor Outlying
                                                                            Islands
                                                                        </option>
                                                                        <option value="U.S. Virgin Islands">U.S. Virgin
                                                                            Islands
                                                                        </option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican City">Vatican City</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Wallis and Futuna">Wallis and Futuna
                                                                        </option>
                                                                        <option value="Western Sahara">Western Sahara
                                                                        </option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="w-100 form-select cst-select deliveryCity"
                                                                        name="city">
                                                                        <option value="">Select an city</option>
                                                                        <option value="ny">New York</option>
                                                                        <option value="london">London</option>
                                                                        <option value="dhaka">Dhaka</option>
                                                                        <option value="delhi">Delhi</option>
                                                                        <option value="toronto">Toronto</option>
                                                                        <option value="sydney">Sydney</option>
                                                                        <option value="beijing">Beijing</option>
                                                                        <option value="tokyo">Tokyo</option>
                                                                        <option value="paris">Paris</option>
                                                                        <option value="berlin">Berlin</option>
                                                                        <option value="rio">Rio de Janeiro</option>
                                                                        <option value="cape_town">Cape Town</option>
                                                                        <option value="lagos">Lagos</option>
                                                                        <option value="rome">Rome</option>
                                                                        <option value="madrid">Madrid</option>
                                                                        <option value="mexico_city">Mexico City</option>
                                                                        <option value="seoul">Seoul</option>
                                                                        <option value="buenos_aires">Buenos Aires</option>
                                                                        <option value="riyadh">Riyadh</option>
                                                                        <option value="stockholm">Stockholm</option>
                                                                        <option value="oslo">Oslo</option>
                                                                        <option value="helsinki">Helsinki</option>
                                                                        <option value="warsaw">Warsaw</option>
                                                                        <option value="zurich">Zurich</option>
                                                                        <option value="amsterdam">Amsterdam</option>
                                                                        <option value="brussels">Brussels</option>
                                                                        <option value="vienna">Vienna</option>
                                                                        <option value="athens">Athens</option>
                                                                        <option value="lisbon">Lisbon</option>
                                                                        <option value="budapest">Budapest</option>
                                                                        <option value="bucharest">Bucharest</option>
                                                                        <option value="tel_aviv">Tel Aviv</option>
                                                                        <option value="cairo">Cairo</option>
                                                                        <option value="nairobi">Nairobi</option>
                                                                        <option value="manila">Manila</option>
                                                                        <option value="bangkok">Bangkok</option>
                                                                        <option value="kuala_lumpur">Kuala Lumpur</option>
                                                                        <option value="singapore">Singapore</option>
                                                                        <option value="karachi">Karachi</option>
                                                                        <option value="ho_chi_minh">Ho Chi Minh City
                                                                        </option>
                                                                        <option value="jakarta">Jakarta</option>
                                                                        <option value="kathmandu">Kathmandu</option>
                                                                        <option value="colombo">Colombo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <input name="delivery_zip_code" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Delivery Zip Code *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <input name="delivery_location" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Address (eg: house, road, block)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="designation" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Designation *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="email" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Email *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="phone" type="number"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Phone *"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-5 d-flex justify-content-between align-items-center">
                                                            <button class="btn-color prev-tab" type="button">
                                                                <i class="pe-2 fa-solid fa-arrow-left-long"></i> Back
                                                            </button>
                                                            <button class="btn-color next-tab" type="button">
                                                                Next <i class="pe-2 fa-solid fa-arrow-right-long"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="delivery-location" role="tabpanel"
                                                    aria-labelledby="delivery-location-tab">
                                                    <div class="p-5">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="company_name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Company Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="address" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Address *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="select-form-input w-100 cst-select form-select"
                                                                        name="country" required>
                                                                        <option value="">Select Country</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Åland Islands">Åland Islands
                                                                        </option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa
                                                                        </option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and
                                                                            Barbuda
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
                                                                        <option value="Bosnia and Herzegovina">Bosnia and
                                                                            Herzegovina
                                                                        </option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island
                                                                        </option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">
                                                                            British Indian
                                                                            Ocean
                                                                            Territory</option>
                                                                        <option value="British Virgin Islands">British
                                                                            Virgin Islands
                                                                        </option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands
                                                                        </option>
                                                                        <option value="Central African Republic">Central
                                                                            African
                                                                            Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island
                                                                        </option>
                                                                        <option value="Cocos [Keeling] Islands">Cocos
                                                                            [Keeling] Islands
                                                                        </option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo - Brazzaville">Congo -
                                                                            Brazzaville
                                                                        </option>
                                                                        <option value="Congo - Kinshasa">Congo - Kinshasa
                                                                        </option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Côte d’Ivoire">Côte d’Ivoire
                                                                        </option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic
                                                                        </option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican
                                                                            Republic</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea
                                                                        </option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands">Falkland Islands
                                                                        </option>
                                                                        <option value="Faroe Islands">Faroe Islands
                                                                        </option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Guiana">French Guiana
                                                                        </option>
                                                                        <option value="French Polynesia">French Polynesia
                                                                        </option>
                                                                        <option value="French Southern Territories">French
                                                                            Southern
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
                                                                        <option value="Guinea-Bissau">Guinea-Bissau
                                                                        </option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard Island and McDonald Islands">
                                                                            Heard Island
                                                                            and McDonald
                                                                            Islands</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong SAR China">Hong Kong SAR
                                                                            China
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
                                                                        <option value="Liechtenstein">Liechtenstein
                                                                        </option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macau SAR China">Macau SAR China
                                                                        </option>
                                                                        <option value="Macedonia">Macedonia</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands
                                                                        </option>
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
                                                                        <option value="Myanmar [Burma]">Myanmar [Burma]
                                                                        </option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Netherlands Antilles">Netherlands
                                                                            Antilles
                                                                        </option>
                                                                        <option value="New Caledonia">New Caledonia
                                                                        </option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island
                                                                        </option>
                                                                        <option value="Northern Mariana Islands">Northern
                                                                            Mariana
                                                                            Islands</option>
                                                                        <option value="North Korea">North Korea</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestinian Territories">
                                                                            Palestinian
                                                                            Territories
                                                                        </option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea
                                                                        </option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pitcairn Islands">Pitcairn Islands
                                                                        </option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Réunion">Réunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Saint Barthélemy">Saint Barthélemy
                                                                        </option>
                                                                        <option value="Saint Helena">Saint Helena</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts
                                                                            and Nevis
                                                                        </option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="Saint Martin">Saint Martin</option>
                                                                        <option value="Saint Pierre and Miquelon">Saint
                                                                            Pierre and
                                                                            Miquelon
                                                                        </option>
                                                                        <option value="Saint Vincent and the Grenadines">
                                                                            Saint Vincent
                                                                            and the
                                                                            Grenadines</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="São Tomé and Príncipe">São Tomé and
                                                                            Príncipe
                                                                        </option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore" selected>Singapore
                                                                        </option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands
                                                                        </option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="South Georgia">South Georgia
                                                                        </option>
                                                                        <option value="South Korea">South Korea</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Svalbard and Jan Mayen">Svalbard
                                                                            and
                                                                            Jan Mayen
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
                                                                        <option value="Trinidad and Tobago">Trinidad and
                                                                            Tobago
                                                                        </option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and
                                                                            Caicos
                                                                            Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab
                                                                            Emirates
                                                                        </option>
                                                                        <option value="United Kingdom">United Kingdom
                                                                        </option>
                                                                        <option value="United State">United State</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="U.S. Minor Outlying Islands">U.S.
                                                                            Minor Outlying
                                                                            Islands
                                                                        </option>
                                                                        <option value="U.S. Virgin Islands">U.S. Virgin
                                                                            Islands
                                                                        </option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican City">Vatican City</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Wallis and Futuna">Wallis and
                                                                            Futuna
                                                                        </option>
                                                                        <option value="Western Sahara">Western Sahara
                                                                        </option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="w-100 form-select cst-select deliveryCity"
                                                                        name="city">
                                                                        <option value="">Select an city</option>
                                                                        <option value="ny">New York</option>
                                                                        <option value="london">London</option>
                                                                        <option value="dhaka">Dhaka</option>
                                                                        <option value="delhi">Delhi</option>
                                                                        <option value="toronto">Toronto</option>
                                                                        <option value="sydney">Sydney</option>
                                                                        <option value="beijing">Beijing</option>
                                                                        <option value="tokyo">Tokyo</option>
                                                                        <option value="paris">Paris</option>
                                                                        <option value="berlin">Berlin</option>
                                                                        <option value="rio">Rio de Janeiro</option>
                                                                        <option value="cape_town">Cape Town</option>
                                                                        <option value="lagos">Lagos</option>
                                                                        <option value="rome">Rome</option>
                                                                        <option value="madrid">Madrid</option>
                                                                        <option value="mexico_city">Mexico City</option>
                                                                        <option value="seoul">Seoul</option>
                                                                        <option value="buenos_aires">Buenos Aires</option>
                                                                        <option value="riyadh">Riyadh</option>
                                                                        <option value="stockholm">Stockholm</option>
                                                                        <option value="oslo">Oslo</option>
                                                                        <option value="helsinki">Helsinki</option>
                                                                        <option value="warsaw">Warsaw</option>
                                                                        <option value="zurich">Zurich</option>
                                                                        <option value="amsterdam">Amsterdam</option>
                                                                        <option value="brussels">Brussels</option>
                                                                        <option value="vienna">Vienna</option>
                                                                        <option value="athens">Athens</option>
                                                                        <option value="lisbon">Lisbon</option>
                                                                        <option value="budapest">Budapest</option>
                                                                        <option value="bucharest">Bucharest</option>
                                                                        <option value="tel_aviv">Tel Aviv</option>
                                                                        <option value="cairo">Cairo</option>
                                                                        <option value="nairobi">Nairobi</option>
                                                                        <option value="manila">Manila</option>
                                                                        <option value="bangkok">Bangkok</option>
                                                                        <option value="kuala_lumpur">Kuala Lumpur</option>
                                                                        <option value="singapore">Singapore</option>
                                                                        <option value="karachi">Karachi</option>
                                                                        <option value="ho_chi_minh">Ho Chi Minh City
                                                                        </option>
                                                                        <option value="jakarta">Jakarta</option>
                                                                        <option value="kathmandu">Kathmandu</option>
                                                                        <option value="colombo">Colombo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <input name="delivery_zip_code" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Delivery Zip Code *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <input name="delivery_location" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Address (eg: house, road, block)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="designation" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Designation *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="email" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Email Address *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="phone" type="number"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Phone Number *"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-5 d-flex justify-content-between align-items-center">
                                                            <button class="btn-color prev-tab" type="button">
                                                                <i class="pe-2 fa-solid fa-arrow-left-long"></i> Back
                                                            </button>
                                                            <button class="btn-color next-tab" type="button">
                                                                Next <i class="pe-2 fa-solid fa-arrow-right-long"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="aditional-location" role="tabpanel"
                                                    aria-labelledby="aditional-location-tab">
                                                    <div class="p-5">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="company_name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Company Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="address" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Company Address. *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="select-form-input w-100 cst-select form-select"
                                                                        name="country" required>
                                                                        <option value="">Select Country</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Åland Islands">Åland Islands
                                                                        </option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa
                                                                        </option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and
                                                                            Barbuda
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
                                                                        <option value="Bosnia and Herzegovina">Bosnia and
                                                                            Herzegovina
                                                                        </option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island
                                                                        </option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">
                                                                            British Indian
                                                                            Ocean
                                                                            Territory</option>
                                                                        <option value="British Virgin Islands">British
                                                                            Virgin Islands
                                                                        </option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands
                                                                        </option>
                                                                        <option value="Central African Republic">Central
                                                                            African
                                                                            Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island
                                                                        </option>
                                                                        <option value="Cocos [Keeling] Islands">Cocos
                                                                            [Keeling] Islands
                                                                        </option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo - Brazzaville">Congo -
                                                                            Brazzaville
                                                                        </option>
                                                                        <option value="Congo - Kinshasa">Congo - Kinshasa
                                                                        </option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Côte d’Ivoire">Côte d’Ivoire
                                                                        </option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic
                                                                        </option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican
                                                                            Republic</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial
                                                                            Guinea
                                                                        </option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands">Falkland Islands
                                                                        </option>
                                                                        <option value="Faroe Islands">Faroe Islands
                                                                        </option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Guiana">French Guiana
                                                                        </option>
                                                                        <option value="French Polynesia">French Polynesia
                                                                        </option>
                                                                        <option value="French Southern Territories">French
                                                                            Southern
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
                                                                        <option value="Guinea-Bissau">Guinea-Bissau
                                                                        </option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard Island and McDonald Islands">
                                                                            Heard Island
                                                                            and McDonald
                                                                            Islands</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong SAR China">Hong Kong SAR
                                                                            China
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
                                                                        <option value="Liechtenstein">Liechtenstein
                                                                        </option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macau SAR China">Macau SAR China
                                                                        </option>
                                                                        <option value="Macedonia">Macedonia</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands
                                                                        </option>
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
                                                                        <option value="Myanmar [Burma]">Myanmar [Burma]
                                                                        </option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Netherlands Antilles">Netherlands
                                                                            Antilles
                                                                        </option>
                                                                        <option value="New Caledonia">New Caledonia
                                                                        </option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island
                                                                        </option>
                                                                        <option value="Northern Mariana Islands">Northern
                                                                            Mariana
                                                                            Islands</option>
                                                                        <option value="North Korea">North Korea</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestinian Territories">
                                                                            Palestinian
                                                                            Territories
                                                                        </option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea
                                                                        </option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pitcairn Islands">Pitcairn Islands
                                                                        </option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Réunion">Réunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Saint Barthélemy">Saint Barthélemy
                                                                        </option>
                                                                        <option value="Saint Helena">Saint Helena</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts
                                                                            and Nevis
                                                                        </option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="Saint Martin">Saint Martin</option>
                                                                        <option value="Saint Pierre and Miquelon">Saint
                                                                            Pierre and
                                                                            Miquelon
                                                                        </option>
                                                                        <option value="Saint Vincent and the Grenadines">
                                                                            Saint Vincent
                                                                            and the
                                                                            Grenadines</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="São Tomé and Príncipe">São Tomé and
                                                                            Príncipe
                                                                        </option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore" selected>Singapore
                                                                        </option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands
                                                                        </option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="South Georgia">South Georgia
                                                                        </option>
                                                                        <option value="South Korea">South Korea</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Svalbard and Jan Mayen">Svalbard
                                                                            and
                                                                            Jan Mayen
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
                                                                        <option value="Trinidad and Tobago">Trinidad and
                                                                            Tobago
                                                                        </option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and
                                                                            Caicos
                                                                            Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab
                                                                            Emirates
                                                                        </option>
                                                                        <option value="United Kingdom">United Kingdom
                                                                        </option>
                                                                        <option value="United State">United State</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="U.S. Minor Outlying Islands">U.S.
                                                                            Minor Outlying
                                                                            Islands
                                                                        </option>
                                                                        <option value="U.S. Virgin Islands">U.S. Virgin
                                                                            Islands
                                                                        </option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican City">Vatican City</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Wallis and Futuna">Wallis and
                                                                            Futuna
                                                                        </option>
                                                                        <option value="Western Sahara">Western Sahara
                                                                        </option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <select
                                                                        class="w-100 form-select cst-select deliveryCity"
                                                                        name="city">
                                                                        <option value="">Select an city</option>
                                                                        <option value="ny">New York</option>
                                                                        <option value="london">London</option>
                                                                        <option value="dhaka">Dhaka</option>
                                                                        <option value="delhi">Delhi</option>
                                                                        <option value="toronto">Toronto</option>
                                                                        <option value="sydney">Sydney</option>
                                                                        <option value="beijing">Beijing</option>
                                                                        <option value="tokyo">Tokyo</option>
                                                                        <option value="paris">Paris</option>
                                                                        <option value="berlin">Berlin</option>
                                                                        <option value="rio">Rio de Janeiro</option>
                                                                        <option value="cape_town">Cape Town</option>
                                                                        <option value="lagos">Lagos</option>
                                                                        <option value="rome">Rome</option>
                                                                        <option value="madrid">Madrid</option>
                                                                        <option value="mexico_city">Mexico City</option>
                                                                        <option value="seoul">Seoul</option>
                                                                        <option value="buenos_aires">Buenos Aires</option>
                                                                        <option value="riyadh">Riyadh</option>
                                                                        <option value="stockholm">Stockholm</option>
                                                                        <option value="oslo">Oslo</option>
                                                                        <option value="helsinki">Helsinki</option>
                                                                        <option value="warsaw">Warsaw</option>
                                                                        <option value="zurich">Zurich</option>
                                                                        <option value="amsterdam">Amsterdam</option>
                                                                        <option value="brussels">Brussels</option>
                                                                        <option value="vienna">Vienna</option>
                                                                        <option value="athens">Athens</option>
                                                                        <option value="lisbon">Lisbon</option>
                                                                        <option value="budapest">Budapest</option>
                                                                        <option value="bucharest">Bucharest</option>
                                                                        <option value="tel_aviv">Tel Aviv</option>
                                                                        <option value="cairo">Cairo</option>
                                                                        <option value="nairobi">Nairobi</option>
                                                                        <option value="manila">Manila</option>
                                                                        <option value="bangkok">Bangkok</option>
                                                                        <option value="kuala_lumpur">Kuala Lumpur</option>
                                                                        <option value="singapore">Singapore</option>
                                                                        <option value="karachi">Karachi</option>
                                                                        <option value="ho_chi_minh">Ho Chi Minh City
                                                                        </option>
                                                                        <option value="jakarta">Jakarta</option>
                                                                        <option value="kathmandu">Kathmandu</option>
                                                                        <option value="colombo">Colombo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <input name="delivery_zip_code" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Delivery Zip Code *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <input name="delivery_location" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Address (eg: house, road, block)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="name" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="designation" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Designation *">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="email" type="text"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Email Address *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-4">
                                                                    <input name="phone" type="number"
                                                                        class="py-3 border-0 form-control form-control-sm rounded-1"
                                                                        placeholder="Your Phone Number *"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-5 d-flex justify-content-between align-items-center">
                                                            <button class="btn-color prev-tab" type="button">
                                                                <i class="pe-2 fa-solid fa-arrow-left-long"></i> Back
                                                            </button>
                                                            <button class="btn-color" type="submit">
                                                                Submit <i class="pe-2 fa-solid fa-arrow-right-long"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
@endsection

@section('scripts')
    <script>
        $('[data-toggle="tooltip"]').tooltip({
            'placement': 'top'
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabButtons = document.querySelectorAll('#myTab .nav-link');

            function goToTab(index) {
                if (index < 0 || index >= tabButtons.length) return;
                const tab = new bootstrap.Tab(tabButtons[index]);
                tab.show();
            }

            document.querySelectorAll('.next-tab').forEach(btn => {
                btn.addEventListener('click', function() {
                    const currentIndex = [...tabButtons].findIndex(btn => btn.classList.contains(
                        'active'));
                    const currentTabPaneId = tabButtons[currentIndex].getAttribute(
                        'data-bs-target');
                    const currentTabPane = document.querySelector(currentTabPaneId);
                    const requiredFields = currentTabPane.querySelectorAll('[required]');

                    let allValid = true;

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('is-invalid');
                            field.reportValidity(); // show default HTML5 warning
                            allValid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });

                    if (allValid) {
                        goToTab(currentIndex + 1);
                    }
                });
            });

            document.querySelectorAll('.prev-tab').forEach(btn => {
                btn.addEventListener('click', function() {
                    const currentIndex = [...tabButtons].findIndex(btn => btn.classList.contains(
                        'active'));
                    goToTab(currentIndex - 1);
                });
            });
        });
    </script>

    @include('frontend.pages.rfq.partials.rfq_js')
@endsection
