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
                                                                class="text-center form-control" value="1" />
                                                        </div>
                                                        <div class="col-lg-9 col-6">
                                                            <input type="text" name="product_name[]" class="form-control"
                                                                value="{{ $cart_product->name }}"
                                                                placeholder="Product Name " required />
                                                        </div>
                                                        <div class="col-lg-1 col-2">
                                                            <div class="d-flex">
                                                                <input type="text" id="qty" name="qty[]"
                                                                    value="1" class="text-center form-control"
                                                                    min="1" readonly
                                                                    style="width: 60px; margin-bottom: 6px" />
                                                                <div class="d-flex flex-column counting-btn">
                                                                    <button type="button"
                                                                        class="qty-btn increment-quantity"
                                                                        aria-label="Add one" onclick="increment()"
                                                                        style="width: 32px; height: 32px">
                                                                        <i class="fas fa-chevron-up"
                                                                            style="color: #7a7577"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                        class="qty-btn decrement-quantity"
                                                                        aria-label="Subtract one" onclick="decrement()"
                                                                        style="width: 32px; height: 32px">
                                                                        <i class="fas fa-chevron-down"
                                                                            style="color: #7a7577"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-2">
                                                            <button type="button" data-repeater-delete
                                                                class="py-2 btn btn-danger btn-sm w-100 trash-btn delete-btn"
                                                                onclick="deleteRow(this)">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="row g-1">
                                                    <div class="col-lg-1 col-2">
                                                        <input type="text" name="sl"
                                                            class="text-center form-control" value="1" />
                                                    </div>
                                                    <div class="col-lg-9 col-6">
                                                        <input type="text" name="product_name[]" class="form-control"
                                                            placeholder="Product Name " required />
                                                    </div>
                                                    <div class="col-lg-1 col-2">
                                                        <div class="d-flex">
                                                            <input type="text" id="qty" name="qty[]"
                                                                value="1" class="text-center form-control"
                                                                min="1" readonly
                                                                style="width: 60px; margin-bottom: 6px" />
                                                            <div class="d-flex flex-column counting-btn">
                                                                <button type="button" class="qty-btn increment-quantity"
                                                                    aria-label="Add one" onclick="increment()"
                                                                    style="width: 32px; height: 32px">
                                                                    <i class="fas fa-chevron-up" style="color: #7a7577"></i>
                                                                </button>
                                                                <button type="button" class="qty-btn decrement-quantity"
                                                                    aria-label="Subtract one" onclick="decrement()"
                                                                    style="width: 32px; height: 32px">
                                                                    <i class="fas fa-chevron-down"
                                                                        style="color: #7a7577"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 col-2">
                                                        <button type="button" data-repeater-delete
                                                            class="py-2 btn btn-danger btn-sm w-100 trash-btn delete-btn"
                                                            onclick="deleteRow(this)">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
                                <hr class="mb-4" />
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
                                                    placeholder="Company Name (e.g: NGen It)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-2 mb-4 form-check">
                                                <div>
                                                    <input class="form-check-input custom-form-check" type="checkbox"
                                                        value="1" name="is_reseller" id="resellerCheckbox"
                                                        required />
                                                    <label class="form-check-label" for="resellerCheckbox">
                                                        I am a reseller (Check if you are a reseller
                                                        partner)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Client Name (e.g: Jhone Doe)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address (e.g: House No, Road, Block)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="designation" class="form-control"
                                                    placeholder="Designation (e.g: Sales Manager)" required />
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
                                                        <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email Address (e.g: jhone@mail.com)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="city" class="form-control"
                                                    placeholder="Enter your City Name" required/>
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
                                                <input type="number" name="phone" class="form-control"
                                                    placeholder="Phone Number (e.g: 018687955852)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="company_zip_code" class="form-control"
                                                    placeholder="ZIP Code (e.g: 1207)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-4">
                                                <!-- Delivery Address Checkbox -->
                                                <div class="mt-2 form-check">
                                                    <input class="form-check-input custom-form-check" type="checkbox"
                                                        value="is_contact_address" id="deliveryAddress" value="1" disabled required />
                                                    <label class="form-check-label" for="deliveryAddress">
                                                        My delivery address is the same as the company
                                                        address
                                                    </label>
                                                </div>
                                                <div id="checkDefaultContainer">
                                                    <div class="mb-4 form-check">
                                                        <input class="form-check-input custom-form-check" type="checkbox"
                                                            value="" id="endUser" disabled required />
                                                        <label class="form-check-label" for="endUser">
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
                                            <p class="mb-0 fw-semibold case-title">
                                                "Please provide accurate and complete details so we
                                                can reach out to you smoothly."
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
                                            <input class="form-check-input custom-form-check" type="checkbox"
                                                value="" id="stepTwoGotoStep3" />
                                            <label class="form-check-label" for="stepTwoGotoStep3">
                                                Delivery address is same as the company address
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Step 2 Inputs Field -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="company_name" class="form-control"
                                                    placeholder="Company Name (e.g: NGen It)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Client Name (e.g: Jhone Doe)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address (e.g: House No, Road, Block)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="designation" class="form-control"
                                                    placeholder="Designation (e.g: Sales Manager)" required />
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
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="India">India</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email Address (e.g: jhone@mail.com)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="city" class="form-control"
                                                    placeholder="Enter your City Name" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="number" name="phone" class="form-control"
                                                    placeholder="Phone Number (e.g: 018687955852)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="company_zip_code" class="form-control"
                                                    placeholder="ZIP Code (e.g: 1207)" required />
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
                                                value="" id="stepThreeGotoStep4" />
                                            <label class="form-check-label" for="stepThreeGotoStep4">
                                                I am the end user & same as the company address
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Step 3 Inputs Field-->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="company_name" class="form-control"
                                                    placeholder="Company Name (e.g: NGen It)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Client Name (e.g: Jhone Doe)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address (e.g: House No, Road, Block)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="designation" class="form-control"
                                                    placeholder="Designation (e.g: Sales Manager)" required />
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
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="India">India</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email Address (e.g: jhone@mail.com)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <select class="form-select countrySelect" aria-label="Select City"
                                                    required name="city">
                                                    <option value="" selected disabled>
                                                        Select City
                                                    </option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Chattogram">Chattogram</option>
                                                    <option value="Khulna">Khulna</option>
                                                    <option value="Rajshahi">Rajshahi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="number" name="phone" class="form-control"
                                                    placeholder="Phone Number (e.g: 018687955852)" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="company_zip_code" class="form-control"
                                                    placeholder="ZIP Code (e.g: 1207)" required />
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
                                                    placeholder="Project Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="text" name="budget" class="form-control"
                                                    placeholder="Tentative Budget.." />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <select class="form-select countrySelect" aria-label="Select Country"
                                                    name="status">
                                                    <option value="" selected>
                                                        Current project status
                                                    </option>
                                                    <option value="budget_stage">Budget Stage</option>
                                                    <option value="tor_stage">Tor Stage</option>
                                                    <option value="rfq_stage">RFQ Stage</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <select class="form-select countrySelect" aria-label="Select Country"
                                                    name="status">
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
                                                    value="" id="flexCheckChecked" checked />
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
