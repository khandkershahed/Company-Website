@extends('frontend.master')
@section('content')
@include('frontend.pages.rfq.partials.rfq_css')
<section class="py-5 d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="border-0 shadow-sm card">
                    <div class="py-3 border card-header d-flex justify-content-between align-items-center"
                        style="background-color: #ae0a46">
                        <h3 class="mb-0 text-white card-title rfq-title fw-normal">
                            Request for Quotation
                        </h3>
                        <div class="text-white d-flex align-items-center">
                            <p class="mb-0 pe-2 case-title">RFQ by case</p>
                            <div class="border rounded-circle icon-info">
                                <i class="fas fa-question" data-toggle="tooltip"
                                    title="Coming Soon: Create RFQ Describing by Project Case."></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 card-body">

                        <form id="stepperForm" action="{{ route('rfqCreate') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- ✅ Repeater goes here as you said -->
                            <div class="mt-4 mb-4">
                                <div class="repeater">
                                    <div data-repeater-list="contacts">
                                        @if ($cart_products->count() > 0)
                                        @foreach ($cart_products as $key => $cart_product)
                                        <div data-repeater-item class="row g-1">
                                            <div class="col-lg-1 col-2">
                                                <input type="text" name="sl"
                                                    class="text-center form-control sl-input" value="1"
                                                    disabled autocomplet="off" />
                                            </div>
                                            <div class="col-lg-9 col-6">
                                                <input type="text" name="product_name" class="form-control"
                                                    value="{{ $cart_product->name }}"
                                                    placeholder="Product Name " required autocomplete="" />
                                            </div>
                                            <div class="col-lg-1 col-2">
                                                <div class="d-flex">
                                                    <input type="text" name="qty" value="1"
                                                        class="text-center form-control qty-input"
                                                        style="width: 60px; margin-bottom: 6px" />

                                                    <div class="d-flex flex-column counting-btn">
                                                        <button type="button"
                                                            class="qty-btn increment-quantity"
                                                            onclick="increment(this)"
                                                            style="width: 32px; height: 32px">
                                                            <i class="fas fa-chevron-up btn-icons"></i>
                                                        </button>
                                                        <button type="button"
                                                            class="qty-btn decrement-quantity"
                                                            onclick="decrement(this)"
                                                            style="width: 32px; height: 32px">
                                                            <i class="fas fa-chevron-down btn-icons"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-1 col-2">
                                                {{-- <button type="button" data-repeater-delete
                                                                class="py-2 btn btn-danger btn-sm w-100 trash-btn delete-btn"
                                                                onclick="deleteRFQRow(event, this, '{{ $cart_product->rowId }}')"
                                                data-id="{{ $cart_product->rowId }}">
                                                <i class="fas fa-trash"></i>
                                                </button> --}}
                                                <div class="d-flex">
                                                    <button type="button" data-repeater-delete
                                                        class="py-2 btn btn-danger btn-sm w-100 trash-btn delete-btn"
                                                        @isset($cart_product)
                                                        data-id="{{ $cart_product->rowId }}"
                                                        @endisset>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div data-repeater-item class="row g-1">
                                            <div class="col-lg-1 col-2">
                                                <input type="text" name="sl"
                                                    class="text-center form-control sl-input" value="1"
                                                    readonly autocomplete="" />
                                            </div>
                                            <div class="col-lg-9 col-6">
                                                <input type="text" name="product_name" class="form-control"
                                                    placeholder="Product Name" required autocomplete="off" />
                                            </div>
                                            <div class="col-lg-1 col-2">
                                                <div class="d-flex">
                                                    <input type="text" name="qty" value="1"
                                                        class="text-center form-control qty-input"
                                                        style="width: 60px; margin-bottom: 6px" />

                                                    <div class="d-flex flex-column counting-btn">
                                                        <button type="button" class="qty-btn increment-quantity"
                                                            onclick="increment(this)"
                                                            style="width: 32px; height: 32px">
                                                            <i class="fas fa-chevron-up" style="color: #7a7577"></i>
                                                        </button>
                                                        <button type="button" class="qty-btn decrement-quantity"
                                                            onclick="decrement(this)"
                                                            style="width: 32px; height: 32px">
                                                            <i class="fas fa-chevron-down"
                                                                style="color: #7a7577"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-2">
                                                <div class="d-flex">
                                                    <button type="button" data-repeater-delete
                                                        class="py-2 btn btn-danger btn-sm w-100 trash-btn delete-btn"
                                                        data-id="new">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <button type="button" data-repeater-create class="mt-4 mb-3 rfq-add-btns"
                                        onclick="addRow()">
                                        <i class="fas fa-plus"></i> Add Items
                                    </button>
                                </div>
                            </div>
                            <!-- ✅ End of repeater placement -->
                            <hr class="mb-4" autocomplete="" />
                            <!-- Progress Bar -->
                            <div class="pt-3 progress-bar-steps for-desktop">
                                <div class="step" data-step="1">
                                    <div class="step-label">
                                        <span class="d-none d-sm-inline">Company Info</span>
                                        <span class="d-inline d-sm-none">Company</span>
                                    </div>
                                    <div class="pt-1 circle ps-2">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="step" data-step="2">
                                    <div class="step-label">
                                        <span class="d-none d-sm-inline">Shipping Details</span>
                                        <span class="d-inline d-sm-none">Shipping</span>
                                    </div>
                                    <div class="pt-1 circle ps-2">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="step" data-step="3">
                                    <div class="step-label">
                                        <span class="d-none d-sm-inline">End User Info</span>
                                        <span class="d-inline d-sm-none">End User</span>
                                    </div>
                                    <div class="pt-1 circle ps-2">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="step" data-step="4">
                                    <div class="step-label">
                                        <span class="d-none d-sm-inline">Additional Details</span>
                                        <span class="d-inline d-sm-none">Additional</span>
                                    </div>
                                    <div class="pt-1 circle ps-2">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Form starts here -->
                            {{-- <form > --}}
                            <!-- Step 1 -->
                            <div class="step-content active" data-step="1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="company_name" class="form-control"
                                                placeholder="Company Name (e.g: NGen It)" required autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-2 mb-4 form-check">
                                            <div>
                                                <input class="form-check-input custom-form-check" type="checkbox"
                                                    value="1" name="is_reseller" id="resellerCheckbox"
                                                    autocomplete="" />
                                                <label class="form-check-label fw-normal" for="resellerCheckbox"
                                                    style="color:#ae0a46;">
                                                    <span style="font-weight: 600; font-size: 14px;">I am a
                                                        reseller</span> <small>(Check if you are a reseller
                                                        partner)</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Contact Name (e.g: Jhone Doe)" required
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Address (e.g: House No, Road, Block)" required
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="designation" class="form-control"
                                                placeholder="Designation (e.g: Sales Manager)" required
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <select class="form-select countrySelect" aria-label="Select Country"
                                                required name="country">
                                                <option value="" selected disabled
                                                    style="color: #7a7577 !important">
                                                    Select Country
                                                </option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->country_name }}">
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address (e.g: jhone@mail.com)" required
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="city" class="form-control"
                                                placeholder="Enter your City Name" required autocomplete="" />
                                            {{-- <select class="form-select countrySelect" aria-label="Select City"
                                                    required name="city">
                                                    <option value="" selected disabled>
                                                        Select City
                                                    </option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Chattogram">Chattogram</option>
                                                    <option value="Khulna">Khulna</option>
                                                    <option value="Rajshahi">Rajshahi</option>
                                                </select> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="number" name="phone" class="form-control no-spinners"
                                                placeholder="Phone Number (e.g: 018687955852)" required
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="zip_code" class="form-control"
                                                placeholder="ZIP Code (e.g: 1207)" required autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-4">
                                            <!-- Delivery Address Checkbox -->
                                            <div class="mt-2 form-check">
                                                <input class="form-check-input custom-form-check deliveryAddress"
                                                    type="checkbox" value="1" id="deliveryAddress" disabled
                                                    required autocomplete="" />
                                                <label class="text-black form-check-label fw-normal"
                                                    for="deliveryAddress" style="opacity: 1; font-size: 13px;">
                                                    My delivery address is the same as the company
                                                    address
                                                </label>
                                            </div>
                                            <div id="checkDefaultContainer">
                                                <div class="mb-4 form-check">
                                                    <input class="form-check-input custom-form-check endUser"
                                                        type="checkbox" value="1" id="endUser" disabled
                                                        required autocomplete />
                                                    <label class="text-black form-check-label fw-normal"
                                                        for="endUser" style="opacity: 1; font-size: 13px;">
                                                        I am the end user and my information is the same
                                                        as the company address
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-0 fw-semibold case-title" style="font-size: 12px;">
                                            *Please provide accurate and complete details so we
                                            can quote & reach out to you smoothly
                                        </p>
                                    </div>
                                    <button type="button" class="btn btn-primary next-step next-btn">
                                        Next <i class="fas fa-arrow-right-long"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Step 2 -->
                            <div class="step-content" data-step="2">
                                <div>
                                    <!-- Delivery Address Checkbox -->

                                    <div class="mt-2 mb-4 form-check">
                                        <input class="form-check-input custom-form-check deliveryAddress"
                                            type="checkbox" value="1" name="is_contact_address"
                                            id="step2Address" autocomplete="" />
                                        <label class="form-check-label" for="step2Address">
                                            Delivery address is same as the company address
                                        </label>
                                    </div>
                                </div>
                                <!-- Step 2 Inputs Field -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input type="text" name="shipping_company_name" class="form-control"
                                                placeholder="Shipping Company Name (e.g: NGen It)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="shipping_name" class="form-control"
                                                placeholder="Contact Name (e.g: Jhone Doe)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="shipping_address" class="form-control"
                                                placeholder="Address (e.g: House No, Road, Block)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="shipping_designation" class="form-control"
                                                placeholder="Designation (e.g: Sales Manager)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <select class="form-select countrySelect" aria-label="Select Country"
                                                required name="shipping_country">
                                                <option value="" selected disabled
                                                    style="color: #7a7577 !important">
                                                    Select Country
                                                </option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->country_name }}">
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="email" name="shipping_email" class="form-control"
                                                placeholder="Email Address (e.g: jhone@mail.com)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="shipping_city" class="form-control"
                                                placeholder="Enter your City Name" required autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="number" name="shipping_phone" class="form-control"
                                                placeholder="Phone Number (e.g: 018687955852)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="shipping_zip_code" class="form-control"
                                                placeholder="ZIP Code (e.g: 1207)" autocomplete="" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 2 Inputs Field End-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-secondary prev-step prev-btn">
                                        <i class="fas fa-arrow-left-long pe-2"></i> Previous
                                    </button>
                                    <button type="button" class="btn btn-primary next-step next-btn">
                                        Next <i class="fas fa-arrow-right-long"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Step 3 -->
                            <div class="step-content" data-step="3">
                                <!-- End User Checkbox -->
                                <div>
                                    <div class="mt-2 mb-4 form-check">
                                        <input class="form-check-input custom-form-check" type="checkbox"
                                            name="end_user_is_contact_address" value="1" id="stepThreeGotoStep4"
                                            autocomplete="" />
                                        <label class="form-check-label" for="stepThreeGotoStep4">
                                            I am the end user & same as the company address
                                        </label>
                                    </div>
                                </div>
                                <!-- Step 3 Inputs Field-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input type="text" name="end_user_company_name" class="form-control"
                                                placeholder="Destination/Company Name (e.g: NGen It)"
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="end_user_name" class="form-control"
                                                placeholder="Contact Name (e.g: Jhone Doe)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="end_user_address" class="form-control"
                                                placeholder="Address (e.g: House No, Road, Block)" required
                                                autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="end_user_designation" class="form-control"
                                                placeholder="Designation (e.g: Sales Manager)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <select class="form-select countrySelect" aria-label="Select Country"
                                                required name="end_user_country">
                                                <option value="" selected disabled
                                                    style="color: #7a7577 !important">
                                                    Select Country
                                                </option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->country_name }}">
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="email" name="end_user_email" class="form-control"
                                                placeholder="Email Address (e.g: jhone@mail.com)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="end_user_city" class="form-control"
                                                placeholder="Enter your City Name" required autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="number" name="end_user_phone" class="form-control"
                                                placeholder="Phone Number (e.g: 018687955852)" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="end_user_zip_code" class="form-control"
                                                placeholder="ZIP Code (e.g: 1207)" autocomplete="" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 3 Inputs Field End-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-secondary prev-step prev-btn">
                                        <i class="fas fa-arrow-left-long pe-2"></i> Previous
                                    </button>
                                    <button type="button" class="btn btn-primary next-step next-btn">
                                        Next <i class="fas fa-arrow-right-long"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Step 4 -->
                            <div class="step-content" data-step="4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="text" name="project_name" class="form-control"
                                                placeholder="Project Name" autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input type="number" name="budget" class="form-control"
                                                placeholder="Tentative Budget.." autocomplete="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <select class="form-select countrySelect" aria-label="Select Country"
                                                name="project_status">
                                                <option value="" selected> Current project status </option>
                                                <option value="budget_stage">Budget Stage</option>
                                                <option value="tor_stage">Tor Stage</option>
                                                <option value="rfq_stage">RFQ Stage</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <select class="form-select countrySelect" aria-label="Select Country"
                                                name="approximate_delivery_time">
                                                <option value="" selected>
                                                    Tentetive Purchase Date
                                                </option>
                                                <option value="less_one_month">1 Month</option>
                                                <option value="two_month">2 Month</option>
                                                <option value="three_month">3 Month</option>
                                                <option value="six_month">6 Month</option>
                                                <option value="one_year">1 Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <textarea class="form-control" id="messageTextarea" name="project_brief"
                                            placeholder="Leave a comment or message here..." rows="2" data-gtm-form-interact-field-id="9"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="my-2 mb-5 form-check">
                                            <input class="form-check-input custom-form-check" type="checkbox"
                                                value="" id="flexCheckChecked" checked autocompletee="off" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Skip the additional information
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-secondary prev-step prev-btn">
                                        <i class="fas fa-arrow-left-long pe-2"></i> Previous
                                    </button>
                                    <button type="submit" class="btn btn-primary next-step next-btn">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- End form -->
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('[data-toggle="tooltip"]').tooltip({
        'placement': 'top'
    });
</script>

@include('frontend.pages.rfq.partials.rfq_js')
@endsection