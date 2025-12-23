
@props(['rfq' => null]) {{-- Accept $rfq object, default to null for create --}}

<div class="card-body">
    {{-- Form points to update route if $rfq exists, otherwise store route --}}
    <form id="stepperForm" action="{{ $rfq ? route('admin.rfq.update', $rfq->id) : route('deal.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        {{-- Method spoofing for PUT request on update --}}
        @if ($rfq)
            @method('PUT')
        @endif

        {{-- Hidden input to track draft status, controlled by JS --}}
        <input type="hidden" name="is_draft" id="is_draft_input" value="0">

        {{-- Repeater Section --}}
        <div class="mt-5 mb-4">
            <div class="repeater">
                <div data-repeater-list="contacts">
                    @php
                        // Use old input on validation fail, else use $rfq products, else provide one empty item for create
                        $contacts = old('contacts', $rfq ? $rfq->rfqProducts->toArray() : [[]]);
                        if (empty($contacts)) {
                            $contacts = [[]];
                        } // Ensure at least one item renders on create
                    @endphp

                    @foreach ($contacts as $index => $contact)
                        <div data-repeater-item class="row g-1 align-items-center">
                            {{-- Hidden input for existing product ID (used in update logic) --}}
                            <input type="hidden" name="id" value="{{ $contact['id'] ?? '' }}">

                            {{-- Modal Trigger Button & Modal Structure --}}
                            <div class="col-lg-1 col-12">
                                <button type="button" title="Provide Additional Product Information"
                                    class="px-10 border btn btn-light btn-sm deal-modal-btn" style="font-size: 22px;"
                                    data-bs-toggle="modal">...</button>
                                <div class="modal fade" tabindex="-1" aria-hidden="true"> {{-- Dynamic IDs added by JS --}}
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="border-0 modal-content rounded-0">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Product Information</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="fas fa-xmark"></i></button>
                                            </div>
                                            <div class="p-5 modal-body">
                                                <div class="row gx-2">
                                                    {{-- Modal Fields - Pre-filled with old() or $contact data --}}
                                                    <div class="col-12 col-lg-2">
                                                        <div class="mb-3"><label class="form-label fw-normal">SKU /
                                                                Part No.</label><input type="text" name="sku_no"
                                                                class="form-control" placeholder="Enter SKU / Part No."
                                                                value="{{ old('contacts.' . $index . '.sku_no', $contact['sku_no'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="mb-3"><label class="form-label fw-normal">Model
                                                                No.</label><input type="text" name="model_no"
                                                                class="form-control" placeholder="Enter Model No."
                                                                value="{{ old('contacts.' . $index . '.model_no', $contact['model_no'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3"><label class="form-label fw-normal">Brand
                                                                Name</label><input type="text" name="brand_name"
                                                                class="form-control" placeholder="Enter Brand Name"
                                                                value="{{ old('contacts.' . $index . '.brand_name', $contact['brand_name'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="mb-3"><label
                                                                class="form-label fw-normal">Quantity</label><input
                                                                type="number" name="additional_qty"
                                                                class="form-control" placeholder="Enter Quantity"
                                                                value="{{ old('contacts.' . $index . '.additional_qty', $contact['additional_qty'] ?? ($contact['qty'] ?? 1)) }}">
                                                        </div>
                                                    </div> {{-- Use additional_qty if exists, fallback to main qty --}}
                                                    <div class="col-12 col-lg-12">
                                                        <div class="mb-3"><label class="form-label fw-normal">Item
                                                                Name</label><input type="text"
                                                                name="additional_product_name" class="form-control"
                                                                placeholder="Enter Item Name"
                                                                value="{{ old('contacts.' . $index . '.additional_product_name', $contact['additional_product_name'] ?? ($contact['product_name'] ?? '')) }}">
                                                        </div>
                                                    </div> {{-- Use additional_name if exists, fallback to main name --}}
                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3"><label class="form-label fw-normal">Item
                                                                Description</label>
                                                            <textarea class="form-control" name="product_des" rows="2" placeholder="Enter Item Description">{{ old('contacts.' . $index . '.product_des', $contact['product_des'] ?? '') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3"><label
                                                                class="form-label fw-normal">Additional Info</label>
                                                            <textarea class="form-control" name="additional_info" rows="2" placeholder="Enter any additional information">{{ old('contacts.' . $index . '.additional_info', $contact['additional_info'] ?? '') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <hr class="my-5">
                                                    <div class="col-12 col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-normal">Upload Product Datasheet
                                                                / Images</label>
                                                            <input type="file" name="image" class="form-control">
                                                            {{-- Display current image if exists --}}
                                                            @if (!empty($contact['image']))
                                                                <span>
                                                                    <img width="200px"
                                                                        src="{{ asset('storage/' . $contact['image']) }}"
                                                                        alt="">
                                                                </span>
                                                                {{-- <small class="text-muted d-block mt-1">Current file: <a
                                                                        href="{{ asset('storage/' . $contact['image']) }}"
                                                                        target="_blank">{{ basename($contact['image']) }}</a></small> --}}
                                                                {{-- Optional: Add hidden field to track if image should be kept/deleted if no new one is uploaded --}}
                                                                {{-- <input type="hidden" name="keep_image" value="{{ $contact['image'] }}"> --}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-12 d-flex justify-content-end">
                                                        <button type="button" data-bs-dismiss="modal"
                                                            class="rfq-add-btns me-3">Close</button>
                                                        <button type="button" data-bs-dismiss="modal"
                                                            class="rfq-add-btns save-product-info-modal">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Repeater Row Main Fields --}}
                            <div class="col-lg-1 col-2"><input type="text" name="sl"
                                    class="text-center form-control sl bg-light" value="{{ $index + 1 }}"
                                    readonly /></div>
                            <div class="col-lg-8 col-6"><input type="text" name="product_name"
                                    class="form-control" placeholder="Product Name" required
                                    value="{{ old('contacts.' . $index . '.product_name', $contact['product_name'] ?? '') }}" />
                            </div>
                            <div class="col-lg-2 col-4">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex">
                                        <input type="text"
                                            value="{{ old('contacts.' . $index . '.qty', $contact['qty'] ?? 1) }}"
                                            class="mt-2 text-center form-control qty form-control-solid"
                                            min="1" readonly name="qty"
                                            style="width: 60px; margin-bottom: 6px;" />
                                        <div class="mt-2 d-flex flex-column counting-btn">
                                            <button type="button" class="qty-btn increment-quantity"
                                                style="width: 32px; height: 32px"><i class="fas fa-chevron-up"
                                                    style="color: #7a7577"></i></button>
                                            <button type="button" class="qty-btn decrement-quantity"
                                                style="width: 32px; height: 32px"><i class="fas fa-chevron-down"
                                                    style="color: #7a7577"></i></button>
                                        </div>
                                    </div>
                                    <div><button type="button" data-repeater-delete
                                            class="py-2 btn btn-sm w-100 trash-btn"><i
                                                class="fas fa-trash text-danger fs-1"></i></button></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Add Item Button & Upload RFQ Modal Trigger --}}
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" data-repeater-create class="mt-4 mb-3 rfq-add-btns"><i
                            class="fas fa-plus"></i> Add Items</button>
                    <div>
                        <button type="button"
                            class="fs-3 bg-transparent border-0 text-primary fw-bold text-decoration-underline"
                            data-bs-toggle="modal" data-bs-target="#rfqModal">Upload RFQ/Tender Images</button>
                        <div class="modal fade" id="rfqModal" tabindex="-1" aria-labelledby="rfqModalLabel"
                            aria-hidden="true">
                            {{-- RFQ Modal Content remains the same --}}
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="border-0 modal-content rounded-0">
                                    <div class="py-2 modal-header bg-light">
                                        <h1 class="modal-title fs-5" id="rfqModalLabel">Upload RFQ/Tender Images</h1>
                                        <button type="button" class="btn-close text-danger fs-2"
                                            data-bs-dismiss="modal" aria-label="Close">X</button>
                                    </div>
                                    <div class="p-5 modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <input type="file" name="tender_image"
                                                        class="form-control file-input">
                                                </div>
                                                @if (!empty($rfq->image))
                                                    <span>
                                                        <img width="200px"
                                                            src="{{ asset('storage/' . $rfq->image) }}"
                                                            alt="">
                                                    </span>
                                                    {{-- Optional: Add hidden field to track if image should be kept/deleted if no new one is uploaded --}}
                                                    {{-- <input type="hidden" name="keep_image" value="{{ $rfq->image }}"> --}}
                                                @endif
                                            </div>
                                        </div>
                                        <p class="text-sm text-danger warning-text" style="display:none;">You must
                                            input product name...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-10" />

        {{-- Progress Bar --}}
        <div class="pt-3 progress-bar-steps for-desktop">
            <div class="step" data-step="1">
                <div class="step-label"><span class="d-none d-sm-inline">Company Info</span><span
                        class="d-inline d-sm-none">Company</span></div>
                <div class="pt-1 circle ps-2"><i class="fas fa-check"></i></div>
            </div>
            <div class="step" data-step="2">
                <div class="step-label"><span class="d-none d-sm-inline">Shipping Details</span><span
                        class="d-inline d-sm-none">Shipping</span></div>
                <div class="pt-1 circle ps-2"><i class="fas fa-check"></i></div>
            </div>
            <div class="step" data-step="3">
                <div class="step-label"><span class="d-none d-sm-inline">End User Info</span><span
                        class="d-inline d-sm-none">End User</span></div>
                <div class="pt-1 circle ps-2"><i class="fas fa-check"></i></div>
            </div>
            <div class="step" data-step="4">
                <div class="step-label"><span class="d-none d-sm-inline">Additional Details</span><span
                        class="d-inline d-sm-none">Additional</span></div>
                <div class="pt-1 circle ps-2"><i class="fas fa-check"></i></div>
            </div>
        </div>

        {{-- Step 1 Content --}}
        <div class="step-content active" data-step="1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="company_name" class="form-control"
                            autocomplete="off" placeholder="Company Name..." required
                            value="{{ old('company_name', $rfq->company_name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-4 mb-4 form-check">
                        <div><input class="form-check-input" type="checkbox" id="resellerCheckbox"
                                name="is_reseller" value="1"
                                {{ old('is_reseller', $rfq->is_reseller ?? 0) == 1 ? 'checked' : '' }} /><label
                                class="form-check-label" for="resellerCheckbox">I am a reseller (Check if you are a
                                reseller partner)</label></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="name" class="form-control"
                            autocomplete="off" placeholder="Client Name..." required
                            value="{{ old('name', $rfq->name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="address" class="form-control"
                            autocomplete="off" placeholder="Address..." required
                            value="{{ old('address', $rfq->address ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="designation" class="form-control"
                            autocomplete="off" placeholder="Designation..." required
                            value="{{ old('designation', $rfq->designation ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="country" class="form-control"
                            autocomplete="off" placeholder="Country..." required
                            value="{{ old('country', $rfq->country ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="email" name="email" class="form-control"
                            autocomplete="off" placeholder="Email Address..." required
                            value="{{ old('email', $rfq->email ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="city" class="form-control"
                            autocomplete="off" placeholder="City..." required
                            value="{{ old('city', $rfq->city ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="number" name="phone" class="form-control"
                            autocomplete="off" placeholder="Phone Number..." required
                            value="{{ old('phone', $rfq->phone ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="zip_code" class="form-control"
                            autocomplete="off" placeholder="ZIP Code..." required
                            value="{{ old('zip_code', $rfq->zip_code ?? '') }}" /></div>
                </div>
                <div class="col-lg-12">
                    <div class="my-10">
                        <div class="mt-2 form-check"><input class="form-check-input deliveryAddress" type="checkbox"
                                name="is_contact_address" value="1" id="deliveryAddress"
                                {{ old('is_contact_address', $rfq->is_contact_address ?? 0) == 1 ? 'checked' : '' }}
                                {{-- JS enables/disables --}} /><label class="form-check-label" for="deliveryAddress">My
                                delivery address is the same as the
                                company address</label></div>
                        <div id="checkDefaultContainer">
                            <div class="mt-3 mb-4 form-check"><input class="form-check-input endUser" type="checkbox"
                                    name="end_user_is_contact_address" value="1" id="endUser"
                                    {{ old('end_user_is_contact_address', $rfq->end_user_is_contact_address ?? 0) == 1 ? 'checked' : '' }}
                                    {{-- JS enables/disables --}} /><label class="form-check-label" for="endUser">I am the
                                    end user and my information
                                    is the same as the company address</label></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0 fw-semibold case-title">"Please provide accurate and complete
                                                                details so we can reach out to you
                                                                smoothly."</p>
                </div>
                <div><button type="button" class="btn btn-light-warning me-2 save-draft-step-btn"> Save as Draft
                    </button><button type="button" class="btn btn-primary next-step next-btn"> Next <i
                            class="fas fa-arrow-right-long"></i> </button></div>
            </div>
        </div>

        {{-- Step 2 Content --}}
        <div class="step-content" data-step="2">
            <div>
                <div class="form-check my-15"><input class="form-check-input deliveryAddress" type="checkbox"
                        name="is_contact_address" value="1" id="stepTwoGotoStep3"
                        {{ old('is_contact_address', $rfq->is_contact_address ?? 0) == 1 ? 'checked' : '' }} /><label
                        class="form-check-label" for="stepTwoGotoStep3">Delivery address is same as the company
                        address</label></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5"><input type="text" name="shipping_company_name" class="form-control"
                            autocomplete="off" placeholder="Company Name..." required
                            value="{{ old('shipping_company_name', $rfq->shipping_company_name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="shipping_name" class="form-control"
                            autocomplete="off" placeholder="Client Name..." required
                            value="{{ old('shipping_name', $rfq->shipping_name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="shipping_address" class="form-control"
                            autocomplete="off" placeholder="Address..." required
                            value="{{ old('shipping_address', $rfq->shipping_address ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="shipping_designation" class="form-control"
                            autocomplete="off" placeholder="Designation..." required
                            value="{{ old('shipping_designation', $rfq->shipping_designation ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="shipping_country" class="form-control"
                            autocomplete="off" placeholder="Country..." required
                            value="{{ old('shipping_country', $rfq->shipping_country ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="email" name="shipping_email" class="form-control"
                            autocomplete="off" placeholder="Email Address..." required
                            value="{{ old('shipping_email', $rfq->shipping_email ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="shipping_city" class="form-control"
                            autocomplete="off" placeholder="City..." required
                            value="{{ old('shipping_city', $rfq->shipping_city ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="number" name="shipping_phone" class="form-control"
                            autocomplete="off" placeholder="Phone Number..." required
                            value="{{ old('shipping_phone', $rfq->shipping_phone ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="shipping_zip_code" class="form-control"
                            autocomplete="off" placeholder="ZIP Code..." required
                            value="{{ old('shipping_zip_code', $rfq->shipping_zip_code ?? '') }}" /></div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-15"><button type="button"
                    class="btn btn-secondary prev-step prev-btn"> <i class="fas fa-arrow-left-long pe-2"></i> Previous
                </button>
                <div><button type="button" class="btn btn-light-warning me-2 save-draft-step-btn"> Save as Draft
                    </button><button type="button" class="btn btn-primary next-step next-btn"> Next <i
                            class="fas fa-arrow-right-long"></i> </button></div>
            </div>
        </div>

        {{-- Step 3 Content --}}
        <div class="step-content" data-step="3">
            <div>
                <div class="form-check my-15"><input class="form-check-input endUser" type="checkbox" value="1"
                        id="stepThreeGotoStep4" name="end_user_is_contact_address"
                        {{ old('end_user_is_contact_address', $rfq->end_user_is_contact_address ?? 0) == 1 ? 'checked' : '' }} /><label
                        class="form-check-label" for="stepThreeGotoStep4">I am the end user & same as the company
                        address</label></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5"><input type="text" name="end_user_company_name" class="form-control"
                            autocomplete="off" placeholder="Company Name..." required
                            value="{{ old('end_user_company_name', $rfq->end_user_company_name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="end_user_name" class="form-control"
                            autocomplete="off" placeholder="Client Name..." required
                            value="{{ old('end_user_name', $rfq->end_user_name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="end_user_address" class="form-control"
                            autocomplete="off" placeholder="Address..." required
                            value="{{ old('end_user_address', $rfq->end_user_address ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="end_user_designation" class="form-control"
                            autocomplete="off" placeholder="Designation..." required
                            value="{{ old('end_user_designation', $rfq->end_user_designation ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="end_user_country" class="form-control"
                            autocomplete="off" placeholder="Country..." required
                            value="{{ old('end_user_country', $rfq->end_user_country ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="email" name="end_user_email" class="form-control"
                            autocomplete="off" placeholder="Email Address..." required
                            value="{{ old('end_user_email', $rfq->end_user_email ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="end_user_city" class="form-control"
                            autocomplete="off" placeholder="City..." required
                            value="{{ old('end_user_city', $rfq->end_user_city ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="number" name="end_user_phone" class="form-control"
                            autocomplete="off" placeholder="Phone Number..." required
                            value="{{ old('end_user_phone', $rfq->end_user_phone ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="end_user_zip_code" class="form-control"
                            autocomplete="off" placeholder="ZIP Code..." required
                            value="{{ old('end_user_zip_code', $rfq->end_user_zip_code ?? '') }}" /></div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-15"><button type="button"
                    class="btn btn-secondary prev-step prev-btn"> <i class="fas fa-arrow-left-long pe-2"></i> Previous
                </button>
                <div><button type="button" class="btn btn-light-warning me-2 save-draft-step-btn"> Save as Draft
                    </button><button type="button" class="btn btn-primary next-step next-btn"> Next <i
                            class="fas fa-arrow-right-long"></i> </button></div>
            </div>
        </div>

        {{-- Step 4 Content --}}
        <div class="step-content" data-step="4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="project_name" class="form-control"
                            autocomplete="off" placeholder="Project Name"
                            value="{{ old('project_name', $rfq->project_name ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><input type="text" name="budget" class="form-control"
                            autocomplete="off" placeholder="Tentative Budget.."
                            value="{{ old('budget', $rfq->budget ?? '') }}" /></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><select class="form-select form-select-solid countrySelect"
                            name="project_status">
                            <option value=""
                                {{ old('project_status', $rfq->project_status ?? '') == '' ? 'selected' : '' }}>Current
                                project status</option>
                            <option value="budget_stage"
                                {{ old('project_status', $rfq->project_status ?? '') == 'budget_stage' ? 'selected' : '' }}>
                                Budget Stage</option>
                            <option value="tor_stage"
                                {{ old('project_status', $rfq->project_status ?? '') == 'tor_stage' ? 'selected' : '' }}>
                                Tor Stage</option>
                            <option value="rfq_stage"
                                {{ old('project_status', $rfq->project_status ?? '') == 'rfq_stage' ? 'selected' : '' }}>
                                RFQ Stage</option>
                        </select></div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-5"><select class="form-select countrySelect" name="approximate_delivery_time">
                            <option value=""
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == '' ? 'selected' : '' }}>
                                Tentative Purchase Date</option>
                            <option value="less_one_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'less_one_month' ? 'selected' : '' }}>
                                1 Month</option>
                            <option value="two_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'two_month' ? 'selected' : '' }}>
                                2 Month</option>
                            <option value="three_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'three_month' ? 'selected' : '' }}>
                                3 Month</option>
                            <option value="six_month"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'six_month' ? 'selected' : '' }}>
                                6 Month</option>
                            <option value="one_year"
                                {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'one_year' ? 'selected' : '' }}>
                                1 Year</option>
                        </select></div>
                </div>
                {{-- Use project_brief name for textarea --}}
                <div class="mb-3 col-lg-12">
                    <textarea class="form-control" autocomplete="off" id="messageTextarea" name="project_brief"
                        placeholder="Leave a comment or message here..." rows="2">{{ old('project_brief', $rfq->project_brief ?? ($rfq->message ?? '')) }}</textarea>
                </div> {{-- Fallback to 'message' if 'project_brief' doesn't exist yet --}}
                <div class="col-lg-12">
                    <div class="form-check my-15"><input class="form-check-input" type="checkbox" value=""
                            id="flexCheckChecked" checked /><label class="form-check-label"
                            for="flexCheckChecked">Skip the additional information</label></div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-secondary prev-step prev-btn"> <i
                        class="fas fa-arrow-left-long pe-2"></i> Previous </button>
                <div>
                    <button type="button" class="btn btn-light-warning me-2 save-draft-step-btn"> Save as Draft
                    </button>
                    {{-- Changed button type to submit for the final step --}}
                    <button type="submit" class="btn btn-primary next-btn"> {{-- Removed next-step class as it's submit now --}}
                        {{ $rfq ? 'Save Changes' : 'Submit' }} {{-- Dynamic button text --}}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
