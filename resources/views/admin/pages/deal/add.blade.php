<x-admin-app-layout :title="'Deal Create Form'">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="app-container container-fluid py-10 pt-5">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center my-10 mt-5">
                                <h1 class="rfq-title fw-bold mb-0 text-primary">
                                    Business Manager & Deal Information
                                </h1>
                                <div class="text-primary mt-2">
                                    <p class="mb-0">
                                        Fill out the form below to complete the deal.
                                        Review the details, confirm accuracy, submit, and
                                        update the status.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 mx-0">
                            <div class="card border-0 shadow-sm">
                                <div class="row g-0 align-items-center card-header mx-0 py-10"
                                    style="background-color: #0b6476">
                                    <div class="col-lg-3 ps-0">
                                        <div>
                                            <h4 class="fw-bold text-white">
                                                Sales Manager Details
                                            </h4>
                                            <ul class="ps-0 mb-0 text-white" style="list-style-type: none">
                                                <li>
                                                    <span class="fw-bold">Name:</span>
                                                    <span class="text-muted">Akramul Arefin</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Email:</span>
                                                    <a href="mailto:akramul@gmail.com"
                                                        class="text-muted text-decoration-underline">akramul@gmail.com</a>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Contact:</span>
                                                    <a href="tel:+8801856854846"
                                                        class="text-muted text-decoration-underline">0185-6854846</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 text-center text-white ps-0"></div>
                                    <div class="col-lg-2 text-white pe-0">
                                        <div class="">
                                            <h4 class="fw-bold text-white">
                                                Deal Information
                                            </h4>
                                            <p class="mb-0 pe-2 case-title">
                                                <span class="fw-bold">Date:</span>
                                                <span class="text-muted">6 June 2025</span>
                                            </p>
                                            <p class="mb-0 pe-2 case-title">
                                                <span class="fw-bold">ID:</span>
                                                <span class="text-muted">RFQ-20250606</span>
                                            </p>
                                            <p class="mb-0 pe-2 case-title">
                                                <span class="fw-bold">Status:</span>
                                                <span class="text-muted">Pending</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- ✅ Repeater goes here as you said -->
                                    <div class="mb-4 mt-5">
                                        <div class="repeater">
                                            <div data-repeater-list="contacts">
                                                <div data-repeater-item class="row g-1">
                                                    <div class="col-lg-1 col-2">
                                                        <input type="text" name="sl"
                                                            class="form-control text-center" autocomplete="off"
                                                            value="1" />
                                                    </div>
                                                    <div class="col-lg-9 col-6">
                                                        <input type="text" name="product_name" class="form-control"
                                                            autocomplete="off" placeholder="Product Name " required />
                                                    </div>
                                                    <div class="col-lg-1 col-2">
                                                        <div class="d-flex">
                                                            <input type="text" id="qty" value="1"
                                                                class="form-control text-center" autocomplete="off"
                                                                min="1" readonly
                                                                style="
                                      width: 60px;
                                      margin-bottom: 6px;
                                    " />
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
                                                            class="btn btn-sm w-100 py-2 trash-btn">
                                                            <i class="fas fa-trash text-danger fs-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create class="rfq-add-btns mb-3 mt-4">
                                                <i class="fas fa-plus"></i> Add Items
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ✅ End of repeater placement -->
                                    <hr class="my-10" />
                                    <!-- For Desktop Only -->
                                    <!-- Progress Bar -->
                                    <div class="progress-bar-steps pt-3 for-desktop">
                                        <div class="step" data-step="1">
                                            <!-- <div class="step-label">Company Info</div> -->
                                            <div class="step-label">
                                                <span class="d-none d-sm-inline">Company Info</span>
                                                <span class="d-inline d-sm-none">Company</span>
                                            </div>
                                            <div class="circle pt-1 ps-2">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="step" data-step="2">
                                            <div class="step-label">
                                                <span class="d-none d-sm-inline">Shipping Details</span>
                                                <span class="d-inline d-sm-none">Shipping</span>
                                            </div>
                                            <div class="circle pt-1 ps-2">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="step" data-step="3">
                                            <div class="step-label">
                                                <span class="d-none d-sm-inline">End User Info</span>
                                                <span class="d-inline d-sm-none">End User</span>
                                            </div>
                                            <div class="circle pt-1 ps-2">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="step" data-step="4">
                                            <div class="step-label">
                                                <span class="d-none d-sm-inline">Additional Details</span>
                                                <span class="d-inline d-sm-none">Additional</span>
                                            </div>
                                            <div class="circle pt-1 ps-2">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form starts here -->
                                    <form id="stepperForm">
                                        <!-- Step 1 -->
                                        <div class="step-content active" data-step="1">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="company_name"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="Company Name (e.g: NGen It)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check mt-4 mb-4">
                                                        <div>
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="resellerCheckbox" required />
                                                            <label class="form-check-label" for="resellerCheckbox">
                                                                I am a reseller (Check if you are a
                                                                reseller partner)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="name" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Client Name (e.g: Jhone Doe)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="address" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Address (e.g: House No, Road, Block)"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="designation" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Designation (e.g: Sales Manager)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            name="country" aria-label="Select Country" required>
                                                            <option value="" selected disabled
                                                                style="color: #7a7577 !important">
                                                                Select Country
                                                            </option>
                                                            <option value="Bangladesh">
                                                                Bangladesh
                                                            </option>
                                                            <option value="India">India</option>
                                                            <option value="Pakistan">
                                                                Pakistan
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="email" name="email" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Email Address (e.g: jhone@mail.com)"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            name="city" aria-label="Select City" required>
                                                            <option value="" selected disabled>
                                                                Select City
                                                            </option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Chattogram">
                                                                Chattogram
                                                            </option>
                                                            <option value="Khulna">Khulna</option>
                                                            <option value="Rajshahi">
                                                                Rajshahi
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="number" name="phone" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Phone Number (e.g: 018687955852)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="company_zip_code"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="ZIP Code (e.g: 1207)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="my-10">
                                                        <!-- Delivery Address Checkbox -->
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="deliveryAddress" disabled
                                                                required />
                                                            <label class="form-check-label" for="deliveryAddress">
                                                                My delivery address is the same as the
                                                                company address
                                                            </label>
                                                        </div>
                                                        <div id="checkDefaultContainer">
                                                            <div class="form-check mb-4 mt-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="endUser" disabled required />
                                                                <label class="form-check-label" for="endUser">
                                                                    I am the end user and my information
                                                                    is the same as the company address
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-5">
                                                <div>
                                                    <p class="mb-0 fw-semibold case-title">
                                                        "Please provide accurate and complete
                                                        details so we can reach out to you
                                                        smoothly."
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

                                                <div class="form-check my-15">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="stepTwoGotoStep3" />
                                                    <label class="form-check-label" for="stepTwoGotoStep3">
                                                        Delivery address is same as the company
                                                        address
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Step 2 Inputs Field -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-5">
                                                        <input type="text" name="company_name"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="Company Name (e.g: NGen It)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="name" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Client Name (e.g: Jhone Doe)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="address" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Address (e.g: House No, Road, Block)"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="designation" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Designation (e.g: Sales Manager)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            aria-label="Select Country" required name="country">
                                                            <option value="" selected disabled
                                                                style="color: #7a7577 !important">
                                                                Select Country
                                                            </option>
                                                            <option value="Bangladesh">
                                                                Bangladesh
                                                            </option>
                                                            <option value="India">India</option>
                                                            <option value="Pakistan">
                                                                Pakistan
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="email" name="email" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Email Address (e.g: jhone@mail.com)"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            aria-label="Select City" required name="city">
                                                            <option value="" selected disabled>
                                                                Select City
                                                            </option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Chattogram">
                                                                Chattogram
                                                            </option>
                                                            <option value="Khulna">Khulna</option>
                                                            <option value="Rajshahi">
                                                                Rajshahi
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="number" name="phone" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Phone Number (e.g: 018687955852)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="company_zip_code"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="ZIP Code (e.g: 1207)" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Step 2 Inputs Field End-->
                                            <div class="d-flex justify-content-between align-items-center mt-15">
                                                <button type="button" class="btn btn-secondary prev-step prev-btn">
                                                    <i class="fas fa-arrow-left-long pe-2"></i>
                                                    Previous
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
                                                <div class="form-check my-15">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="stepThreeGotoStep4" />
                                                    <label class="form-check-label" for="stepThreeGotoStep4">
                                                        I am the end user & same as the company
                                                        address
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Step 3 Inputs Field-->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-5">
                                                        <input type="text" name="company_name"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="Company Name (e.g: NGen It)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="name" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Client Name (e.g: Jhone Doe)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="address" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Address (e.g: House No, Road, Block)"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="designation" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Designation (e.g: Sales Manager)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            aria-label="Select Country" required name="country">
                                                            <option value="" selected disabled
                                                                style="color: #7a7577 !important">
                                                                Select Country
                                                            </option>
                                                            <option value="Bangladesh">
                                                                Bangladesh
                                                            </option>
                                                            <option value="India">India</option>
                                                            <option value="Pakistan">
                                                                Pakistan
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="email" name="email" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Email Address (e.g: jhone@mail.com)"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            aria-label="Select City" required name="city">
                                                            <option value="" selected disabled>
                                                                Select City
                                                            </option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Chattogram">
                                                                Chattogram
                                                            </option>
                                                            <option value="Khulna">Khulna</option>
                                                            <option value="Rajshahi">
                                                                Rajshahi
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="number" name="phone" class="form-control"
                                                            autocomplete="off"
                                                            placeholder="Phone Number (e.g: 018687955852)" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="company_zip_code"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="ZIP Code (e.g: 1207)" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Step 3 Inputs Field End-->
                                            <div class="d-flex justify-content-between align-items-center mt-15">
                                                <button type="button" class="btn btn-secondary prev-step prev-btn">
                                                    <i class="fas fa-arrow-left-long pe-2"></i>
                                                    Previous
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
                                                    <div class="mb-5">
                                                        <input type="text" name="project_name"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="Project Name" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <input type="text" name="budget" class="form-control"
                                                            autocomplete="off" placeholder="Tentative Budget.." />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select form-select-solid countrySelect"
                                                            aria-label="Select Country" name="status">
                                                            <option value="" selected>
                                                                Current project status
                                                            </option>
                                                            <option value="budget_stage">
                                                                Budget Stage
                                                            </option>
                                                            <option value="tor_stage">
                                                                Tor Stage
                                                            </option>
                                                            <option value="rfq_stage">
                                                                RFQ Stage
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-5">
                                                        <select class="form-select countrySelect"
                                                            aria-label="Select Country" name="status">
                                                            <option value="" selected>
                                                                Tentetive Purchase Date
                                                            </option>
                                                            <option value="less_one_month">
                                                                1 Month
                                                            </option>
                                                            <option value="two_month">
                                                                2 Month
                                                            </option>
                                                            <option value="three_month">
                                                                3 Month
                                                            </option>
                                                            <option value="six_month">
                                                                6 Month
                                                            </option>
                                                            <option value="one_year">1 Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <textarea class="form-control" autocomplete="off" id="messageTextarea" name="project_brief"
                                                        placeholder="Leave a comment or message here..." rows="2" data-gtm-form-interact-field-id="9"></textarea>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-check my-15">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="" id="flexCheckChecked" checked />
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Skip the additional information
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-secondary prev-step prev-btn">
                                                    <i class="fas fa-arrow-left-long pe-2"></i>
                                                    Previous
                                                </button>
                                                <button type="submit" class="btn btn-primary next-step next-btn">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('sscripts')
        <script src="{{ asset('assets/js/admin/deal/add.js') }}"></script>
        <script src="{{ asset('assets/js/admin/deal/repeater.js') }}"></script>
        <script src="{{ asset('assets/js/admin/deal/stepper.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
        <script>
            $(document).ready(function() {
                let currentStep = 1;
                const totalSteps = 4;

                // Custom validation rules
                $.validator.addMethod(
                    "customEmail",
                    function(value, element) {
                        return (
                            this.optional(element) ||
                            /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value)
                        );
                    },
                    "Please enter a valid email (e.g., user@gmail.com)"
                );

                $.validator.addMethod(
                    "customPhone",
                    function(value, element) {
                        const isValidPattern = /^01[3-9]\d{1,12}$/.test(value);
                        const lengthValid = value.length >= 4 && value.length <= 15;
                        return this.optional(element) || (isValidPattern && lengthValid);
                    },
                    "Please enter a valid phone number between 4 and 15 digits (e.g., 0186...)"
                );

                $.validator.addMethod(
                    "customZip",
                    function(value, element) {
                        return this.optional(element) || /^[0-9]{3,6}$/.test(value);
                    },
                    "Please enter a valid ZIP code with 3 to 6 digits"
                );

                $("#stepperForm").validate({
                    errorClass: "is-invalid",
                    validClass: "is-valid",
                    errorPlacement: function(error, element) {
                        error.addClass("text-danger");
                        error.insertAfter(element);
                    },
                    onkeyup: false,
                    onfocusout: function(element) {
                        $(element).valid();
                        toggleNextButton();
                        toggleCheckboxes();
                    },
                    onclick: false,
                });

                $('input[name="email"]').rules("add", {
                    customEmail: true
                });
                $('input[name="phone"]').rules("add", {
                    customPhone: true
                });
                $('input[name="company_zip_code"]').rules("add", {
                    customZip: true
                });

                function toggleNextButton() {
                    const $currentStepContent = $(
                        `.step-content[data-step="${currentStep}"]`
                    );
                    const $requiredInputs = $currentStepContent
                        .find("input, select, textarea")
                        .filter("[required]");

                    let allValid = true;
                    if ($requiredInputs.length > 0) {
                        $requiredInputs.each(function() {
                            if (!$("#stepperForm").validate().element(this)) {
                                allValid = false;
                                return false;
                            }
                        });
                    }
                    $currentStepContent.find(".next-step").prop("disabled", !allValid);
                }

                function toggleCheckboxes() {
                    const $step1 = $('.step-content[data-step="1"]');
                    const $requiredInputs = $step1
                        .find("input, select")
                        .filter("[required]");
                    let allValid = true;

                    $requiredInputs.each(function() {
                        if (!$("#stepperForm").validate().element(this)) {
                            allValid = false;
                            return false;
                        }
                    });

                    $("#deliveryAddress, #endUser, #resellerCheckbox").prop(
                        "disabled",
                        !allValid
                    );
                }

                function updateProgress() {
                    $(".step").removeClass("active completed current-step-red");

                    $(".step").each(function(index) {
                        const stepNum = index + 1;
                        if (stepNum < currentStep) {
                            $(this).addClass("completed").find("i").show(); // ✅ Show icon only if completed
                        } else if (stepNum === currentStep) {
                            $(this).addClass("active current-step-red").find("i")
                        .hide(); // ❌ Hide icon on current step
                        } else {
                            $(this).removeClass("completed").find("i")
                        .hide(); // Make sure future steps are clean
                        }
                    });

                    $(".step-content").removeClass("active");
                    $(`.step-content[data-step="${currentStep}"]`).addClass("active");

                    toggleNextButton();
                    toggleCheckboxes();
                }

                $(document).on(
                    "input change",
                    ".step-content.active input, .step-content.active select, .step-content.active textarea",
                    function() {
                        toggleNextButton();
                        toggleCheckboxes();
                    }
                );

                $(".next-step").click(function() {
                    const $currentStepContent = $(
                        `.step-content[data-step="${currentStep}"]`
                    );
                    const $requiredInputs = $currentStepContent
                        .find("input, select, textarea")
                        .filter("[required]");

                    if ($requiredInputs.length === 0 || $requiredInputs.valid()) {
                        if (currentStep === 1) {
                            const deliveryAddress = $("#deliveryAddress").is(":checked");
                            const endUser = $("#endUser").is(":checked");

                            if (deliveryAddress && endUser) {
                                currentStep = 4;
                            } else if (deliveryAddress) {
                                currentStep = 3;
                            } else {
                                currentStep = 2;
                            }
                        } else if (currentStep < totalSteps) {
                            currentStep++;
                        }
                        updateProgress();
                    } else {
                        $requiredInputs.valid();
                    }
                });

                $(".prev-step").click(function() {
                    if (currentStep > 1) {
                        currentStep--;
                        updateProgress();
                    }
                });

                $("#stepperForm").on("submit", function(e) {
                    e.preventDefault();
                    if ($(this).valid()) {
                        alert("Form submitted successfully!");
                    }
                });

                $(".repeater").repeater({
                    initEmpty: false,
                    defaultValues: {
                        phone: ""
                    },
                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function(deleteElement) {
                        if (confirm("Are you sure you want to delete this entry?")) {
                            $(this).slideUp(deleteElement);
                        }
                    },
                });

                function handleCheckboxVisibility() {
                    const $checkDefaultWrapper = $("#endUser").closest(".form-check");
                    if ($("#resellerCheckbox").is(":checked")) {
                        $checkDefaultWrapper.hide();
                        $("#endUser").prop("checked", false);
                    } else {
                        $checkDefaultWrapper.show();
                    }
                }

                $("#resellerCheckbox").on("change", function() {
                    handleCheckboxVisibility();
                    toggleNextButton();
                    toggleCheckboxes();
                });

                function setupStepTwoJumpCheckbox() {
                    $("#stepTwoGotoStep3").on("change", function() {
                        if ($(this).is(":checked") && currentStep === 2) {
                            currentStep = 3;
                            updateProgress();
                        }
                    });
                }

                function setupStepTwoJumpCheckboxThree() {
                    $("#stepThreeGotoStep4").on("change", function() {
                        if ($(this).is(":checked") && currentStep === 3) {
                            currentStep = 4;
                            updateProgress();
                        }
                    });
                }

                // Initial run
                handleCheckboxVisibility();
                updateProgress();
                setupStepTwoJumpCheckbox();
                setupStepTwoJumpCheckboxThree();
            });

            // Country placeholder
            const selects = document.getElementsByClassName("countrySelect");

            for (let i = 0; i < selects.length; i++) {
                const select = selects[i];

                // Initial color set
                if (select.value === "") {
                    select.style.color = "#888888b2";
                }

                // On change
                select.addEventListener("change", function() {
                    if (select.value === "") {
                        select.style.color = "#888888b2";
                    } else {
                        select.style.color = "#000";
                    }
                });
            }

            function toggleDiv() {
                const checkbox = document.getElementById("delivery");
                const toggleContent = document.getElementById("toggle-content");
                toggleContent.style.display = checkbox.checked ? "block" : "none";
            }

            function increment() {
                const input = document.getElementById("qty");
                input.value = parseInt(input.value) + 1;
            }

            function decrement() {
                const input = document.getElementById("qty");
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        </script>
    @endpush
</x-admin-app-layout>
