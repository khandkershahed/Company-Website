<div class="card-body">
    <form id="stepperForm" action="{{ isset($rfq) ? route('deal.update', $rfq->id) : route('deal.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf

        @if (isset($rfq))
            @method('PUT')
        @endif

        <input type="hidden" name="status" id="form_status" value="rfq_created">

        <div class="mt-5 mb-4">
            <div class="repeater">
                <div data-repeater-list="contacts">

                    <div data-repeater-item class="row g-1 align-items-center">

                        <div class="col-lg-1 col-12">
                            <button type="button" title="Provide Additional Product Information"
                                class="px-10 border btn btn-light btn-sm deal-modal-btn" style="font-size: 22px;"
                                data-bs-toggle="modal" data-bs-target="#first_rfq">
                                ...
                            </button>
                            <div class="modal fade" id="first_rfq" tabindex="-1" aria-labelledby="first_rfqLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="border-0 modal-content rounded-0">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="first_rfqLabel">Product
                                                Information</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fas fa-xmark"></i>
                                            </button>
                                        </div>
                                        <div class="p-5 modal-body">
                                            <div class="row gx-2">
                                                <div class="col-12 col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">SKU
                                                            / Part No.</label>
                                                        <input type="text" name="sku_no" class="form-control"
                                                            placeholder="Enter SKU / Part No.">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Model
                                                            No.</label>
                                                        <input type="text" name="model_no" class="form-control"
                                                            placeholder="Enter Model No.">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Brand
                                                            Name</label>
                                                        <input type="text" name="brand_name" class="form-control"
                                                            placeholder="Enter Brand Name">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Quantity</label>
                                                        <input type="number" name="additional_qty" class="form-control"
                                                            placeholder="Enter Quantity">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Item
                                                            Name</label>
                                                        <input type="text" name="additional_product_name"
                                                            class="form-control" placeholder="Enter Item Name">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Item
                                                            Description</label>
                                                        <textarea class="form-control" name="product_des" rows="2" placeholder="Enter Item Description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Additional
                                                            Info</label>
                                                        <textarea class="form-control" name="additional_info" rows="2" placeholder="Enter any additional information"></textarea>
                                                    </div>
                                                </div>
                                                <hr class="my-5">
                                                <div class="col-12 col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-normal">Upload
                                                            Product Datasheet /
                                                            Images</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 d-flex justify-content-end">
                                                    <button type="button" data-bs-dismiss="modal"
                                                        class="rfq-add-btns">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-2">
                            <input type="text" name="sl" class="text-center form-control sl bg-light"
                                value="1" readonly />
                        </div>

                        <div class="col-lg-8 col-6">
                            <input type="text" name="product_name" class="form-control "
                                placeholder="Product Name" required />
                        </div>

                        <div class="col-lg-2 col-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex">
                                    <input type="text" value="1"
                                        class="mt-2 text-center form-control qty form-control-solid" min="1"
                                        readonly name="qty" style="width: 60px; margin-bottom: 6px;" />
                                    <div class="mt-2 d-flex flex-column counting-btn">
                                        <button type="button" class="qty-btn increment-quantity"
                                            style="width: 32px; height: 32px">
                                            <i class="fas fa-chevron-up" style="color: #7a7577"></i>
                                        </button>
                                        <button type="button" class="qty-btn decrement-quantity"
                                            style="width: 32px; height: 32px">
                                            <i class="fas fa-chevron-down" style="color: #7a7577"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" data-repeater-delete
                                        class="py-2 btn btn-sm w-100 trash-btn">
                                        <i class="fas fa-trash text-danger fs-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" data-repeater-create class="mt-4 mb-3 rfq-add-btns">
                        <i class="fas fa-plus"></i> Add Items
                    </button>
                    <div>
                        <button type="button"
                            class="fs-3 bg-transparent border-0 text-primary fw-bold text-decoration-underline"
                            data-bs-toggle="modal" data-bs-target="#rfqModal">
                            Upload RFQ/Tender Images
                        </button>

                        <div class="modal fade" id="rfqModal" tabindex="-1" aria-labelledby="rfqModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="border-0 modal-content rounded-0">
                                    <div class="py-2 modal-header bg-light">
                                        <h1 class="modal-title fs-5" id="rfqModalLabel">Upload
                                            RFQ/Tender Images</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="p-5 modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <input type="file" class="form-control file-input">
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-danger warning-text" style="display:none;">
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

        <hr class="my-10" />
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
        <div class="step-content active" data-step="1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="company_name" class="form-control" autocomplete="off"
                            placeholder="Company Name (e.g: NGen It)"
                            value="{{ old('company_name', $rfq->company_name ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-4 mb-4 form-check">
                        <div>
                            <input class="form-check-input" type="checkbox" value="1" id="resellerCheckbox"
                                name="is_reseller"
                                {{ old('is_reseller', $rfq->is_reseller ?? 0) == 1 ? 'checked' : '' }} required />
                            <label class="form-check-label" for="resellerCheckbox">
                                I am a reseller (Check if you are a
                                reseller partner)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="name" class="form-control" autocomplete="off"
                            placeholder="Client Name (e.g: Jhone Doe)" value="{{ old('name', $rfq->name ?? '') }}"
                            required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="address" class="form-control" autocomplete="off"
                            placeholder="Address (e.g: House No, Road, Block)"
                            value="{{ old('address', $rfq->address ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="designation" class="form-control" autocomplete="off"
                            placeholder="Designation (e.g: Sales Manager)"
                            value="{{ old('designation', $rfq->designation ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="country" class="form-control" autocomplete="off"
                            placeholder="Country (e.g: Bangladesh)" value="{{ old('country', $rfq->country ?? '') }}"
                            required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="email" name="email" class="form-control" autocomplete="off"
                            placeholder="Email Address (e.g: jhone@mail.com)"
                            value="{{ old('email', $rfq->email ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="city" class="form-control" autocomplete="off"
                            placeholder="City (e.g: Dhaka)" value="{{ old('city', $rfq->city ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="number" name="phone" class="form-control" autocomplete="off"
                            placeholder="Phone Number (e.g: 018687955852)"
                            value="{{ old('phone', $rfq->phone ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="zip_code" class="form-control" autocomplete="off"
                            placeholder="ZIP Code (e.g: 1207)" value="{{ old('zip_code', $rfq->zip_code ?? '') }}"
                            required />
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my-10">
                        <div class="mt-2 form-check">
                            <input class="form-check-input deliveryAddress" type="checkbox" value="1"
                                id="deliveryAddress"
                                {{ old('is_contact_address', $rfq->is_contact_address ?? 0) == 1 ? 'checked' : '' }}
                                disabled required />
                            <label class="form-check-label" for="deliveryAddress">
                                My delivery address is the same as the
                                company address
                            </label>
                        </div>
                        <div id="checkDefaultContainer">
                            <div class="mt-3 mb-4 form-check">
                                <input class="form-check-input endUser" type="checkbox" value="1"
                                    id="endUser"
                                    {{ old('end_user_is_contact_address', $rfq->end_user_is_contact_address ?? 0) == 1 ? 'checked' : '' }}
                                    disabled required />
                                <label class="form-check-label" for="endUser">
                                    I am the end user and my information
                                    is the same as the company address
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 fw-semibold case-title">
                        "Please provide accurate and complete
                        details so we can reach out to you
                        smoothly."
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save as Draft</button>
                    <button type="button" class="btn btn-primary next-step next-btn">
                        Next <i class="fas fa-arrow-right-long"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="step-content" data-step="2">
            <div>
                <div class="form-check my-15">
                    <input class="form-check-input deliveryAddress" type="checkbox" name="is_contact_address"
                        value="1" id="stepTwoGotoStep3"
                        {{ old('is_contact_address', $rfq->is_contact_address ?? 0) == 1 ? 'checked' : '' }} />
                    <label class="form-check-label" for="stepTwoGotoStep3">
                        Delivery address is same as the company
                        address
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <input type="text" name="shipping_company_name" class="form-control" autocomplete="off"
                            placeholder="Company Name (e.g: NGen It)"
                            value="{{ old('shipping_company_name', $rfq->shipping_company_name ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="shipping_name" class="form-control" autocomplete="off"
                            placeholder="Client Name (e.g: Jhone Doe)"
                            value="{{ old('shipping_name', $rfq->shipping_name ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="shipping_address" class="form-control" autocomplete="off"
                            placeholder="Address (e.g: House No, Road, Block)"
                            value="{{ old('shipping_address', $rfq->shipping_address ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="shipping_designation" class="form-control" autocomplete="off"
                            placeholder="Designation (e.g: Sales Manager)"
                            value="{{ old('shipping_designation', $rfq->shipping_designation ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="shipping_country" class="form-control" autocomplete="off"
                            placeholder="Country (e.g: Bangladesh)"
                            value="{{ old('shipping_country', $rfq->shipping_country ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="email" name="shipping_email" class="form-control" autocomplete="off"
                            placeholder="Email Address (e.g: jhone@mail.com)"
                            value="{{ old('shipping_email', $rfq->shipping_email ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="shipping_city" class="form-control" autocomplete="off"
                            placeholder="City (e.g: Dhaka)"
                            value="{{ old('shipping_city', $rfq->shipping_city ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="number" name="shipping_phone" class="form-control" autocomplete="off"
                            placeholder="Phone Number (e.g: 018687955852)"
                            value="{{ old('shipping_phone', $rfq->shipping_phone ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="shipping_zip_code" class="form-control" autocomplete="off"
                            placeholder="ZIP Code (e.g: 1207)"
                            value="{{ old('shipping_zip_code', $rfq->shipping_zip_code ?? '') }}" required />
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-15">
                <button type="button" class="btn btn-secondary prev-step prev-btn">
                    <i class="fas fa-arrow-left-long pe-2"></i>
                    Previous
                </button>
                <div>
                    <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save as Draft</button>
                    <button type="button" class="btn btn-primary next-step next-btn">
                        Next <i class="fas fa-arrow-right-long"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="step-content" data-step="3">
            <div>
                <div class="form-check my-15">
                    <input class="form-check-input endUser" type="checkbox" value="1" id="stepThreeGotoStep4"
                        name="end_user_is_contact_address"
                        {{ old('end_user_is_contact_address', $rfq->end_user_is_contact_address ?? 0) == 1 ? 'checked' : '' }} />
                    <label class="form-check-label" for="stepThreeGotoStep4">
                        I am the end user & same as the company
                        address
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <input type="text" name="end_user_company_name" class="form-control" autocomplete="off"
                            placeholder="Company Name (e.g: NGen It)"
                            value="{{ old('end_user_company_name', $rfq->end_user_company_name ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="end_user_name" class="form-control" autocomplete="off"
                            placeholder="Client Name (e.g: Jhone Doe)"
                            value="{{ old('end_user_name', $rfq->end_user_name ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="end_user_address" class="form-control" autocomplete="off"
                            placeholder="Address (e.g: House No, Road, Block)"
                            value="{{ old('end_user_address', $rfq->end_user_address ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="end_user_designation" class="form-control" autocomplete="off"
                            placeholder="Designation (e.g: Sales Manager)"
                            value="{{ old('end_user_designation', $rfq->end_user_designation ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="end_user_country" class="form-control" autocomplete="off"
                            placeholder="Country (e.g: Bangladesh)"
                            value="{{ old('end_user_country', $rfq->end_user_country ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="email" name="end_user_email" class="form-control" autocomplete="off"
                            placeholder="Email Address (e.g: jhone@mail.com)"
                            value="{{ old('end_user_email', $rfq->end_user_email ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="end_user_city" class="form-control" autocomplete="off"
                            placeholder="City (e.g: Dhaka)"
                            value="{{ old('end_user_city', $rfq->end_user_city ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="number" name="end_user_phone" class="form-control" autocomplete="off"
                            placeholder="Phone Number (e.g: 018687955852)"
                            value="{{ old('end_user_phone', $rfq->end_user_phone ?? '') }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="end_user_zip_code" class="form-control" autocomplete="off"
                            placeholder="ZIP Code (e.g: 1207)"
                            value="{{ old('end_user_zip_code', $rfq->end_user_zip_code ?? '') }}" required />
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-15">
                <button type="button" class="btn btn-secondary prev-step prev-btn">
                    <i class="fas fa-arrow-left-long pe-2"></i>
                    Previous
                </button>
                <div>
                    <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save as Draft</button>
                    <button type="button" class="btn btn-primary next-step next-btn">
                        Next <i class="fas fa-arrow-right-long"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="step-content" data-step="4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="project_name" class="form-control" autocomplete="off"
                            placeholder="Project Name" value="{{ old('project_name', $rfq->project_name ?? '') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <input type="text" name="budget" class="form-control" autocomplete="off"
                            placeholder="Tentative Budget.." value="{{ old('budget', $rfq->budget ?? '') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <select class="form-select form-select-solid countrySelect" aria-label="Select Country"
                            name="project_status">
                            <option value=""
                                {{ old('project_status', $rfq->project_status ?? '') == '' ? 'selected' : '' }}>
                                Current project status
                            </option>
                            <option value="budget_stage"
                                {{ old('project_status', $rfq->project_status ?? '') == 'budget_stage' ? 'selected' : '' }}>
                                Budget Stage
                            </option>
                            <option value="tor_stage"
                                {{ old('project_status', $rfq->project_status ?? '') == 'tor_stage' ? 'selected' : '' }}>
                                Tor Stage
                            </option>
                            <option value="rfq_stage"
                                {{ old('project_status', $rfq->project_status ?? '') == 'rfq_stage' ? 'selected' : '' }}>
                                RFQ Stage
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5">
                        <select class="form-select countrySelect" aria-label="Select Country"
                            name="approximate_delivery_time">
                            <option value=""
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == '' ? 'selected' : '' }}>
                                Tentetive Purchase Date
                            </option>
                            <option value="less_one_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'less_one_month' ? 'selected' : '' }}>
                                1 Month
                            </option>
                            <option value="two_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'two_month' ? 'selected' : '' }}>
                                2 Month
                            </option>
                            <option value="three_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'three_month' ? 'selected' : '' }}>
                                3 Month
                            </option>
                            <option value="six_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'six_month' ? 'selected' : '' }}>
                                6 Month
                            </option>
                            <option value="one_year"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'one_year' ? 'selected' : '' }}>
                                1 Year
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-lg-12">
                    <textarea class="form-control" autocomplete="off" id="messageTextarea" name="project_brief"
                        placeholder="Leave a comment or message here..." rows="2" data-gtm-form-interact-field-id="9">{{ old('project_brief', $rfq->project_brief ?? '') }}</textarea>
                </div>
                <div class="col-lg-12">
                    <div class="form-check my-15">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                            checked />
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
                <div>
                    <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save as Draft</button>
                    <button type="submit" class="btn btn-primary next-step next-btn">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


@push('scripts')
    <script src="{{ asset('assets/js/admin/deal/add.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <!-- jQuery Repeater -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script>
        var existingContacts = {!! isset($rfq) ? $rfq->rfqProducts->toJson() : '[]' !!};
    </script>


    <script>
        $(document).ready(function() {
            let currentStep = 1;
            const totalSteps = 4;
            let isSubmitting = false; // ✅ ADDED this line

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
            // You had 'company_zip_code' but your input is 'zip_code'
            $('input[name="zip_code"]').rules("add", {
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
                        // Check if the element is visible before validating
                        if ($(this).is(':visible') && !$("#stepperForm").validate().element(this)) {
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
                    if ($(this).is(':visible') && !$("#stepperForm").validate().element(this)) {
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

                // Set status for final submit just in case
                $('#form_status').val('rfq_created');

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
                    // Handle complex jumps backwards
                    if (currentStep === 4) {
                        const deliveryAddress = $("#deliveryAddress").is(":checked");
                        const endUser = $("#endUser").is(":checked");
                        if (deliveryAddress && endUser) {
                            currentStep = 1;
                        } else if (deliveryAddress) {
                            currentStep = 3; // Go back to step 3
                        } else {
                            currentStep = 3; // Go back to step 3
                        }
                    } else if (currentStep === 3) {
                        const deliveryAddress = $("#deliveryAddress").is(":checked");
                        if (deliveryAddress) {
                            currentStep = 1; // Go from 3 back to 1
                        } else {
                            currentStep = 2; // Go from 3 back to 2
                        }
                    } else if (currentStep === 2) {
                        currentStep = 1;
                    } else {
                        currentStep--;
                    }

                    updateProgress();
                }
            });

            // ✅ ADDED: Click handler for Save as Draft
            $(document).on('click', '.draft-btn', function(e) {
                e.preventDefault();
                $('#form_status').val('draft'); // Set status to draft
                $("#stepperForm").submit(); // Trigger the form submit
            });

            // ✅ ADDED: Click handler for final Submit button
            $('button[type="submit"]').click(function() {
                $('#form_status').val('rfq_created'); // Set status for final submit
            });

            // ✅ MODIFIED: Form submit handler
            $("#stepperForm").on("submit", function(e) {
                if (isSubmitting) {
                    e.preventDefault();
                    return;
                }

                // Check if it's a draft submission
                if ($('#form_status').val() === 'draft') {
                    isSubmitting = true;
                    $(this).find('.draft-btn, .next-btn').prop('disabled', true);
                    $(this).find('.draft-btn').html('Saving...');
                    // Don't run validation, just let the form submit
                    return;
                }

                // --- Regular validation logic for 'rfq_created' ---
                if ($(this).valid()) {
                    isSubmitting = true;

                    // Optional: Disable submit button
                    $(this).find('button[type="submit"]').prop('disabled', true);
                    $(this).find('button[type="submit"]').html('Submitting...');
                    $(this).find('.draft-btn').prop('disabled', true);

                    // Use native form submission
                    // this.submit(); // Not needed, just 'return'
                    return;
                } else {
                    e.preventDefault(); // Prevent submission if invalid
                }
            });

            // ✅ MODIFIED: Repeater initialization
            var repeater = $(".repeater").repeater({
                initEmpty: existingContacts.length === 0, // ✅ MODIFIED
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

            // ✅ ADDED: Logic to pre-fill repeater
            if (existingContacts.length > 0) {
                repeater.setList(existingContacts.map(function(contact) {
                    return {
                        // Main fields
                        'product_name': contact.product_name,
                        'qty': contact.qty,

                        // Modal fields
                        'sku_no': contact.sku_no,
                        'model_no': contact.model_no,
                        'brand_name': contact.brand_name,
                        'additional_qty': contact.additional_qty,
                        'additional_product_name': contact.additional_product_name,
                        'product_des': contact.product_des,
                        'additional_info': contact.additional_info,
                        // Note: 'image' field cannot be pre-filled
                    };
                }));
                updateSL(); // Set correct serial numbers on load
            }


            // ✅ Qty increment/decrement
            $(document).on("click", ".increment-quantity", function() {
                let qtyInput = $(this).closest("[data-repeater-item]").find(
                    ".qty"); // ✅ More robust selector
                let current = parseInt(qtyInput.val()) || 0;
                qtyInput.val(current + 1);
            });

            $(document).on("click", ".decrement-quantity", function() {
                let qtyInput = $(this).closest("[data-repeater-item]").find(
                    ".qty"); // ✅ More robust selector
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

            // ✅ Trigger change on load to set color for pre-filled values
            select.dispatchEvent(new Event('change'));
        }

        // This function seems unused by your stepper form, but left intact
        function toggleDiv() {
            const checkbox = document.getElementById("delivery");
            const toggleContent = document.getElementById("toggle-content");
            toggleContent.style.display = checkbox.checked ? "block" : "none";
        }

        // These functions are also unused as repeater has its own
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

            // Function to copy data
            function syncShippingData(isChecked) {
                fieldPairs.forEach(([shippingName, contactName]) => {
                    const value = isChecked ? $(`[name="${contactName}"]`).val() : '';
                    $(`[name="${shippingName}"]`).val(value).valid(); // ✅ Trigger validation
                });
            }

            $('[name="is_contact_address"], .deliveryAddress').on('change', function() {
                const isChecked = $(this).is(':checked');
                $('[name="is_contact_address"]').prop('checked', isChecked);
                $('.deliveryAddress').prop('checked', isChecked);
                syncShippingData(isChecked);
            });

            // ✅ Run on page load in case it's checked (for edit mode)
            syncShippingData($('.deliveryAddress').first().is(':checked'));
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

            // Function to copy data
            function syncEndUserData(isChecked) {
                fieldPairs.forEach(([shippingName, contactName]) => {
                    const value = isChecked ? $(`[name="${contactName}"]`).val() : '';
                    $(`[name="${shippingName}"]`).val(value).valid(); // ✅ Trigger validation
                });
            }

            $('[name="end_user_is_contact_address"], .endUser').on('change', function() {
                const isChecked = $(this).is(':checked');
                $('[name="end_user_is_contact_address"]').prop('checked', isChecked);
                $('.endUser').prop('checked', isChecked);
                syncEndUserData(isChecked);
            });

            // ✅ Run on page load in case it's checked (for edit mode)
            syncEndUserData($('.endUser').first().is(':checked'));
        });
    </script>
    <script>
        const btnFull = document.getElementById("btnFull");
        const btnDraft = document.getElementById("btnDraft");

        const fullBox = document.getElementById("full-process-box");
        const draftBox = document.getElementById("draft-box");

        // ✅ Added null checks in case these elements don't exist
        if (btnFull && btnDraft && fullBox && draftBox) {
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
        }
    </script>
@endpush
