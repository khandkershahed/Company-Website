<x-admin-app-layout :title="'Deal Create Form'">
    @include('metronic.pages.deal.partials.deal_css')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="px-0 app-container container-fluid px-lg-auto">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="mt-4">
                        <!-- Show If Full Process -->
                        <div id="full-process-box">
                            <div class="mt-5 row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="mb-5 text-center">
                                        <h1 class="mb-0 rfq-title fw-bold text-primary">
                                            Business Manager & Deal Information
                                        </h1>
                                        <div class="mt-2">
                                            <p class="mb-0">
                                                Fill out the form below to complete the deal.
                                                Review the details, confirm accuracy, submit, and
                                                update the status.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-0 mx-0 col-lg-10 col-12 px-lg-auto">
                                    <div class="border shadow-sm card">
                                        <div class="py-10 mx-0 row g-0 align-items-center card-header"
                                            style="background-color: #0b6476">
                                            <div class="col-lg-3 ps-0">
                                                <div>
                                                    <h4 class="text-white fw-bold">
                                                        Sales Manager Details
                                                    </h4>
                                                    <ul class="mb-0 text-white ps-0" style="list-style-type: none">
                                                        <li>
                                                            <span class="text-gray-400 fw-bold">Name:</span>
                                                            <span class="text-white">{{ Auth::user()->name }}</span>
                                                        </li>
                                                        <li>
                                                            <span class="text-gray-400 fw-bold">Email:</span>
                                                            <a href="mailto:{{ Auth::user()->email }}"
                                                                class="text-white text-decoration-underline">{{ Auth::user()->email }}</a>
                                                        </li>
                                                        <!-- <li>
                                                            <span class="text-gray-400 fw-bold">Contact:</span>
                                                            <a href="tel:+{{ Auth::user()->phone }}"
                                                                class="text-white text-decoration-underline">{{ Auth::user()->phone }}</a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="text-center text-white col-lg-7 ps-0"></div>
                                            <div class="text-white col-lg-2 pe-0">
                                                <h4 class="text-white fw-bold">
                                                    Deal Information
                                                </h4>
                                                <p class="mb-0 pe-2 case-title">
                                                    <span class="fw-bold">Date:</span>
                                                    <span class="text-white">{{ date('d M, Y') }}</span>
                                                </p>
                                                <!-- <p class="mb-0 pe-2 case-title">
                                                        <span class="fw-bold">ID:</span>
                                                        <span class="text-muted"></span>
                                                    </p> -->
                                                <!-- <p class="mb-0 pe-2 case-title">
                                                        <span class="fw-bold">Status:</span>
                                                        <span class="text-muted"></span>
                                                    </p> -->
                                                <div class="mt-2">
                                                    <button type="button" id="btnDraft"
                                                        class="btn btn-light btn-sm">Add To Draft</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="stepperForm" action="{{ route('deal.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!-- ✅ Repeater goes here as you said -->
                                                <div class="mt-5 mb-4">
                                                    <div class="repeater">
                                                        <div data-repeater-list="contacts">
                                                            <div data-repeater-item class="row g-1 align-items-center">

                                                                <!-- SL -->
                                                                <div class="col-lg-1 col-12">
                                                                    <button type="button"
                                                                        title="Provide Additional Product Information"
                                                                        class="px-10 border btn btn-light btn-sm deal-modal-btn"
                                                                        style="font-size: 22px;" data-bs-toggle="modal"
                                                                        data-bs-target="#first_rfq">
                                                                        ...
                                                                    </button>
                                                                    <!-- Modal Content -->
                                                                    <div class="modal fade" id="first_rfq"
                                                                        tabindex="-1" aria-labelledby="first_rfqLabel"
                                                                        aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-dialog-centered modal-xl">
                                                                            <div
                                                                                class="border-0 modal-content rounded-0">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="first_rfqLabel">Product
                                                                                        Information</h1>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <i class="fas fa-xmark"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="p-5 modal-body">
                                                                                    <div class="row gx-2">
                                                                                        <div class="col-12 col-lg-2">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">SKU
                                                                                                    / Part No.</label>
                                                                                                <input type="text"
                                                                                                    name="sku_no"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter SKU / Part No.">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-3">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Model
                                                                                                    No.</label>
                                                                                                <input type="text"
                                                                                                    name="model_no"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter Model No.">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-4">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Brand
                                                                                                    Name</label>
                                                                                                <input type="text"
                                                                                                    name="brand_name"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter Brand Name">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-3">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Quantity</label>
                                                                                                <input type="number"
                                                                                                    name="additional_qty"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter Quantity">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-12">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Item
                                                                                                    Name</label>
                                                                                                <input type="text"
                                                                                                    name="additional_product_name"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter Item Name">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12 col-lg-6">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Item
                                                                                                    Description</label>
                                                                                                <textarea class="form-control" name="product_des" rows="2" placeholder="Enter Item Description"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-6">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Additional
                                                                                                    Info</label>
                                                                                                <textarea class="form-control" name="additional_info" rows="2" placeholder="Enter any additional information"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr class="my-5">
                                                                                        <div class="col-12 col-lg-12">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="form-label fw-normal">Upload
                                                                                                    Product Datasheet /
                                                                                                    Images</label>
                                                                                                <input type="file"
                                                                                                    name="image"
                                                                                                    class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-12 col-lg-12 d-flex justify-content-end">
                                                                                            <button type="button"
                                                                                                data-bs-dismiss="modal"
                                                                                                class="rfq-add-btns">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-2">
                                                                    <input type="text" name="sl"
                                                                        class="text-center form-control sl bg-light"
                                                                        value="1" readonly />
                                                                </div>

                                                                <!-- Product Name -->
                                                                <div class="col-lg-8 col-6">
                                                                    <input type="text" name="product_name"
                                                                        class="form-control "
                                                                        placeholder="Product Name" required />
                                                                </div>

                                                                <!-- Qty -->
                                                                <div class="col-lg-2 col-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex">
                                                                            <input type="text" value="1"
                                                                                class="mt-2 text-center form-control qty form-control-solid"
                                                                                min="1" readonly name="qty"
                                                                                style="width: 60px; margin-bottom: 6px;" />
                                                                            <div
                                                                                class="mt-2 d-flex flex-column counting-btn">
                                                                                <button type="button"
                                                                                    class="qty-btn increment-quantity"
                                                                                    style="width: 32px; height: 32px">
                                                                                    <i class="fas fa-chevron-up"
                                                                                        style="color: #7a7577"></i>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="qty-btn decrement-quantity"
                                                                                    style="width: 32px; height: 32px">
                                                                                    <i class="fas fa-chevron-down"
                                                                                        style="color: #7a7577"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <button type="button" data-repeater-delete
                                                                                class="py-2 btn btn-sm w-100 trash-btn">
                                                                                <i
                                                                                    class="fas fa-trash text-danger fs-1"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Add -->

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <button type="button" data-repeater-create
                                                                class="mt-4 mb-3 rfq-add-btns">
                                                                <i class="fas fa-plus"></i> Add Items
                                                            </button>
                                                            <div>
                                                                <!-- Button to trigger modal -->
                                                                <button type="button"
                                                                    class="fs-3 bg-transparent border-0 text-primary fw-bold text-decoration-underline"
                                                                    data-bs-toggle="modal" data-bs-target="#rfqModal">
                                                                    Upload RFQ/Tender Images
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="rfqModal" tabindex="-1"
                                                                    aria-labelledby="rfqModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="border-0 modal-content rounded-0">
                                                                            <div class="py-2 modal-header bg-light">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="rfqModalLabel">Upload
                                                                                    RFQ/Tender Images</h1>
                                                                                <button type="button"
                                                                                    class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <!-- Modal Body -->
                                                                            <div class="p-5 modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="mb-3">
                                                                                            <input type="file"
                                                                                                class="form-control file-input">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="text-sm text-danger warning-text"
                                                                                    style="display:none;">
                                                                                    You must input product name in item
                                                                                    Box.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ✅ End of repeater placement -->
                                                <hr class="my-10" />
                                                <!-- For Desktop Only -->
                                                <!-- Progress Bar -->
                                                <div class="pt-3 progress-bar-steps for-desktop">
                                                    <div class="step" data-step="1">
                                                        <!-- <div class="step-label">Company Info</div> -->
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
                                                <!-- Step 1 -->
                                                <div class="step-content active" data-step="1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="company_name"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Company Name (e.g: NGen It)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mt-4 mb-4 form-check">
                                                                <div>
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="resellerCheckbox"
                                                                        required />
                                                                    <label class="form-check-label"
                                                                        for="resellerCheckbox">
                                                                        I am a reseller (Check if you are a
                                                                        reseller partner)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="name"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Client Name (e.g: Jhone Doe)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="address"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Address (e.g: House No, Road, Block)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="designation"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Designation (e.g: Sales Manager)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                {{-- <select class="form-select form-select-solid countrySelect"
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
                                                        </select> --}}
                                                                <input type="text" name="country"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Country (e.g: Bangladesh)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="email" name="email"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Email Address (e.g: jhone@mail.com)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                {{-- <select class="form-select form-select-solid countrySelect"
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
                                                        </select> --}}
                                                                <input type="text" name="city"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="City (e.g: Dhaka)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="number" name="phone"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Phone Number (e.g: 018687955852)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="zip_code"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="ZIP Code (e.g: 1207)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="my-10">
                                                                <!-- Delivery Address Checkbox -->
                                                                <div class="mt-2 form-check">
                                                                    <input class="form-check-input deliveryAddress"
                                                                        type="checkbox" value="1"
                                                                        id="deliveryAddress" disabled required />
                                                                    <label class="form-check-label"
                                                                        for="deliveryAddress">
                                                                        My delivery address is the same as the
                                                                        company address
                                                                    </label>
                                                                </div>
                                                                <div id="checkDefaultContainer">
                                                                    <div class="mt-3 mb-4 form-check">
                                                                        <input class="form-check-input endUser"
                                                                            type="checkbox" value="1"
                                                                            id="endUser" disabled required />
                                                                        <label class="form-check-label"
                                                                            for="endUser">
                                                                            I am the end user and my information
                                                                            is the same as the company address
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-5 d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="mb-0 fw-semibold case-title">
                                                                "Please provide accurate and complete
                                                                details so we can reach out to you
                                                                smoothly."
                                                            </p>
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-primary next-step next-btn">
                                                            Next <i class="fas fa-arrow-right-long"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Step 2 -->
                                                <div class="step-content" data-step="2">
                                                    <div>
                                                        <!-- Delivery Address Checkbox -->

                                                        <div class="form-check my-15">
                                                            <input class="form-check-input deliveryAddress"
                                                                type="checkbox" name="is_contact_address"
                                                                value="1" id="stepTwoGotoStep3" />
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
                                                                <input type="text" name="shipping_company_name"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Company Name (e.g: NGen It)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="shipping_name"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Client Name (e.g: Jhone Doe)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="shipping_address"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Address (e.g: House No, Road, Block)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="shipping_designation"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Designation (e.g: Sales Manager)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="shipping_country"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Country (e.g: Bangladesh)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="email" name="shipping_email"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Email Address (e.g: jhone@mail.com)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="shipping_city"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="City (e.g: Dhaka)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="number" name="shipping_phone"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Phone Number (e.g: 018687955852)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="shipping_zip_code"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="ZIP Code (e.g: 1207)" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Step 2 Inputs Field End-->
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-15">
                                                        <button type="button"
                                                            class="btn btn-secondary prev-step prev-btn">
                                                            <i class="fas fa-arrow-left-long pe-2"></i>
                                                            Previous
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-primary next-step next-btn">
                                                            Next <i class="fas fa-arrow-right-long"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Step 3 -->
                                                <div class="step-content" data-step="3">
                                                    <!-- End User Checkbox -->
                                                    <div>
                                                        <div class="form-check my-15">
                                                            <input class="form-check-input endUser" type="checkbox"
                                                                value="1" id="stepThreeGotoStep4"
                                                                name="end_user_is_contact_address" />
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
                                                                <input type="text" name="end_user_company_name"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Company Name (e.g: NGen It)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="end_user_name"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Client Name (e.g: Jhone Doe)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="end_user_address"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Address (e.g: House No, Road, Block)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="end_user_designation"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Designation (e.g: Sales Manager)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="end_user_country"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Country (e.g: Bangladesh)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="email" name="end_user_email"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Email Address (e.g: jhone@mail.com)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="end_user_city"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="City (e.g: Dhaka)" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="number" name="end_user_phone"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Phone Number (e.g: 018687955852)"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <input type="text" name="end_user_zip_code"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="ZIP Code (e.g: 1207)" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Step 3 Inputs Field End-->
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-15">
                                                        <button type="button"
                                                            class="btn btn-secondary prev-step prev-btn">
                                                            <i class="fas fa-arrow-left-long pe-2"></i>
                                                            Previous
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-primary next-step next-btn">
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
                                                                <input type="text" name="budget"
                                                                    class="form-control" autocomplete="off"
                                                                    placeholder="Tentative Budget.." />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-5">
                                                                <select
                                                                    class="form-select form-select-solid countrySelect"
                                                                    aria-label="Select Country" name="project_status">
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
                                                                    aria-label="Select Country"
                                                                    name="approximate_delivery_time">
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
                                                        <div class="mb-3 col-lg-12">
                                                            <textarea class="form-control" autocomplete="off" id="messageTextarea" name="project_brief"
                                                                placeholder="Leave a comment or message here..." rows="2" data-gtm-form-interact-field-id="9"></textarea>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-check my-15">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckChecked" checked />
                                                                <label class="form-check-label"
                                                                    for="flexCheckChecked">
                                                                    Skip the additional information
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button type="button"
                                                            class="btn btn-secondary prev-step prev-btn">
                                                            <i class="fas fa-arrow-left-long pe-2"></i>
                                                            Previous
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary next-step next-btn">
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
                    <!-- Show If As Draft -->
                    <div id="draft-box" style="display: none;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5 text-center">
                                    <h1 class="mb-0 rfq-title fw-bold text-primary">
                                        Save Deal as Draft
                                    </h1>
                                    <div class="mt-2">
                                        <p class="mb-0">
                                            Fill out the form below to save your deal as a draft. <br>
                                            You can review and update the details later before final submission.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto col-lg-10">
                                <div class="shadow-sm card rounded-4">
                                    <!-- Card Header -->
                                    <div class="py-10 mx-0 card-header align-items-center"
                                        style="background-color: #0b6476">
                                        <div>
                                            <h4 class="text-white fw-bold">Draft Form</h4>
                                        </div>
                                        <button type="button" id="btnFull" class="btn btn-light btn-sm">
                                            Go Full Process
                                        </button>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <form action="{{ route('admin.quick.deal.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gx-3">
                                                <!-- Client Name -->
                                                <div class="mb-3 col-12">
                                                    <label for="clientName" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control" id="clientName"
                                                        name="name" required>
                                                </div>
                                                <!-- Company Name -->
                                                <div class="mb-3 col-4">
                                                    <label for="companyName" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        required>
                                                </div>
                                                <!-- Client Email -->
                                                <div class="mb-3 col-4">
                                                    <label for="clientEmail" class="form-label">Client Email</label>
                                                    <input type="email" class="form-control" id="clientEmail"
                                                        name="email" required>
                                                </div>

                                                <!-- Client Phone -->
                                                <div class="mb-3 col-4">
                                                    <label for="clientPhone" class="form-label">Client Phone</label>
                                                    <input type="tel" class="form-control" id="clientPhone"
                                                        name="phone" required>
                                                </div>

                                                <!-- Image Upload -->
                                                <div class="mb-3 col-12">
                                                    <label for="clientImage" class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" id="clientImage"
                                                        name="client_image" accept="image/*">
                                                </div>

                                                <!-- Text Box -->
                                                <div class="mb-3 col-12">
                                                    <label for="clientMessage" class="form-label">Message /
                                                        Notes</label>
                                                    <textarea class="form-control" id="clientMessage" name="message" rows="4"></textarea>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mt-3 d-flex justify-content-end col-12">
                                                    <button type="submit" class="btn btn-custom btn-primary"
                                                        style="background-color: #0b6476">
                                                        Add To Draft <i class="text-white fas fa-right-long ps-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/admin/deal/add.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <!-- jQuery Repeater -->
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
                    if (isSubmitting) {
                        e.preventDefault();
                        return;
                    }

                    if ($(this).valid()) {
                        isSubmitting = true;

                        // Optional: Disable submit button
                        $(this).find('button[type="submit"]').prop('disabled', true);
                        $(this).find('button[type="submit"]').html('Submitting...');

                        // Use native form submission
                        this.submit();
                    } else {
                        e.preventDefault(); // Prevent submission if invalid
                    }
                });

                $(".repeater").repeater({
                    initEmpty: false,
                    defaultValues: {
                        qty: 1
                    },
                    show: function() {
                        $(this).slideDown();
                        updateSL(); // update serial numbers
                    },
                    hide: function(deleteElement) {
                        if (confirm("Are you sure you want to delete this entry?")) {
                            $(this).slideUp(deleteElement, function() {
                                updateSL(); // re-calculate SL after delete
                            });
                        }
                    }
                });

                // ✅ Qty increment/decrement
                $(document).on("click", ".increment-quantity", function() {
                    let qtyInput = $(this).closest(".row").find(".qty");
                    let current = parseInt(qtyInput.val()) || 0;
                    qtyInput.val(current + 1);
                });

                $(document).on("click", ".decrement-quantity", function() {
                    let qtyInput = $(this).closest(".row").find(".qty");
                    let current = parseInt(qtyInput.val()) || 0;
                    if (current > 1) qtyInput.val(current - 1);
                });

                // ✅ Auto-update SL
                function updateSL() {
                    $(".repeater [data-repeater-item]").each(function(index) {
                        $(this).find(".sl").val(index + 1);
                    });
                }


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
        <script>
            $(document).ready(function() {
                const fieldPairs = [
                    ['shipping_name', 'name'],
                    ['shipping_email', 'email'],
                    ['shipping_phone', 'phone'],
                    ['shipping_company_name', 'company_name'],
                    ['shipping_designation', 'designation'],
                    ['shipping_address', 'address'],
                    ['shipping_country', 'country'],
                    ['shipping_city', 'city'],
                    ['shipping_zip_code', 'zip_code']
                ];

                $('[name="is_contact_address"], .deliveryAddress').on('change', function() {
                    const isChecked = $(this).is(':checked');
                    $('[name="is_contact_address"]').prop('checked', isChecked);
                    $('.deliveryAddress').prop('checked', isChecked);
                    fieldPairs.forEach(([shippingName, contactName]) => {
                        const value = isChecked ? $(`[name="${contactName}"]`).val() : '';
                        $(`[name="${shippingName}"]`).val(value);
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                const fieldPairs = [
                    ['end_user_name', 'name'],
                    ['end_user_email', 'email'],
                    ['end_user_phone', 'phone'],
                    ['end_user_company_name', 'company_name'],
                    ['end_user_designation', 'designation'],
                    ['end_user_address', 'address'],
                    ['end_user_country', 'country'],
                    ['end_user_city', 'city'],
                    ['end_user_zip_code', 'zip_code']
                ];

                $('[name="end_user_is_contact_address"], .endUser').on('change', function() {
                    const isChecked = $(this).is(':checked');
                    $('[name="end_user_is_contact_address"]').prop('checked', isChecked);
                    $('.endUser').prop('checked', isChecked);

                    fieldPairs.forEach(([shippingName, contactName]) => {
                        const value = isChecked ? $(`[name="${contactName}"]`).val() : '';
                        $(`[name="${shippingName}"]`).val(value);
                    });
                });
            });
        </script>
        <!-- Hide and show the full process and as draft toggle -->
        <script>
            const btnFull = document.getElementById("btnFull");
            const btnDraft = document.getElementById("btnDraft");

            const fullBox = document.getElementById("full-process-box");
            const draftBox = document.getElementById("draft-box");

            function setActive(button) {
                // Reset button styles
                btnFull.classList.remove("active", "btn-primary");
                btnFull.classList.add("btn-outline-primary");

                btnDraft.classList.remove("active", "btn-primary");
                btnDraft.classList.add("btn-outline-primary");

                // Apply active style to clicked button
                button.classList.add("active", "btn-primary");
                button.classList.remove("btn-outline-primary");

                // Show/Hide boxes based on which button is active
                if (button === btnFull) {
                    fullBox.style.display = "block";
                    draftBox.style.display = "none";
                } else {
                    fullBox.style.display = "none";
                    draftBox.style.display = "block";
                }
            }

            // Add event listeners
            btnFull.addEventListener("click", () => setActive(btnFull));
            btnDraft.addEventListener("click", () => setActive(btnDraft));

            // Initialize on page load
            setActive(btnFull);
        </script>
    @endpush
</x-admin-app-layout>
