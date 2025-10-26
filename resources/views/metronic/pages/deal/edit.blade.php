<x-admin-app-layout :title="'Edit Deal Form'"> {{-- Changed Title --}}
    @include('metronic.pages.deal.partials.deal_css')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="px-0 app-container container-fluid px-lg-auto">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="mt-4">
                        <div id="full-process-box">
                            <div class="mt-5 row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="mb-5 text-center">
                                        <h1 class="mb-0 rfq-title fw-bold text-primary">
                                            Edit Deal Information ({{ $rfq->rfq_code ?? 'N/A' }}) {{-- Added RFQ Code --}}
                                        </h1>
                                        <div class="mt-2">
                                            <p class="mb-0">
                                                Update the details below for this deal. {{-- Changed text --}}
                                                Review the details, confirm accuracy, save as draft, or submit.
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
                                                    <h4 class="text-white fw-bold"> Sales Manager Details </h4>
                                                    <ul class="mb-0 text-white ps-0" style="list-style-type: none">
                                                        <li> <span class="text-gray-400 fw-bold">Name:</span> <span class="text-white">{{ $rfq->salesManagerL1->name ?? Auth::user()->name }}</span> </li> {{-- Assuming relationship exists or fallback --}}
                                                        <li> <span class="text-gray-400 fw-bold">Email:</span> <a href="mailto:{{ $rfq->salesManagerL1->email ?? Auth::user()->email }}" class="text-white text-decoration-underline">{{ $rfq->salesManagerL1->email ?? Auth::user()->email }}</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="text-center text-white col-lg-7 ps-0"></div>
                                            <div class="text-white col-lg-2 pe-0">
                                                <h4 class="text-white fw-bold"> Deal Information </h4>
                                                <p class="mb-0 pe-2 case-title"> <span class="fw-bold">Date:</span> <span class="text-white">{{ $rfq->created_at->format('d M, Y') }}</span> </p> {{-- Use RFQ created date --}}
                                                <p class="mb-0 pe-2 case-title"> <span class="fw-bold">Status:</span> <span class="badge badge-light-{{ $rfq->status == 'draft' ? 'warning' : 'success' }}">{{ Str::title(str_replace('_', ' ', $rfq->status)) }}</span> </p> {{-- Show current status --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                             <form id="stepperForm" action="{{ route('deal.update', $rfq->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT') {{-- ✅ ADDED Method Spoofing --}}

                                                <input type="hidden" name="status" id="form_status" value="{{ $rfq->status == 'draft' ? 'draft' : 'rfq_created' }}"> {{-- Keep current status or set to created --}}

                                                <div class="mt-5 mb-4">
                                                    <div class="repeater">
                                                        <div data-repeater-list="contacts">
                                                            {{-- This empty div is the template for JS --}}
                                                            <div data-repeater-item class="row g-1 align-items-center" style="display: none;"> {{-- Hide template --}}
                                                                <div class="col-lg-1 col-12"> <button type="button" title="Provide Additional Product Information" class="px-10 border btn btn-light btn-sm deal-modal-btn" style="font-size: 22px;" data-bs-toggle="modal" data-bs-target="#first_rfq_template"> ... </button> </div> {{-- Use unique ID for template modal --}}
                                                                <div class="col-lg-1 col-2"> <input type="text" name="sl" class="text-center form-control sl bg-light" value="1" readonly /> </div>
                                                                <div class="col-lg-8 col-6"> <input type="text" name="product_name" class="form-control" placeholder="Product Name" required /> </div>
                                                                <div class="col-lg-2 col-4"> <div class="d-flex align-items-center"> <div class="d-flex"> <input type="text" value="1" class="mt-2 text-center form-control qty form-control-solid" min="1" readonly name="qty" style="width: 60px; margin-bottom: 6px;" /> <div class="mt-2 d-flex flex-column counting-btn"> <button type="button" class="qty-btn increment-quantity" style="width: 32px; height: 32px"> <i class="fas fa-chevron-up" style="color: #7a7577"></i> </button> <button type="button" class="qty-btn decrement-quantity" style="width: 32px; height: 32px"> <i class="fas fa-chevron-down" style="color: #7a7577"></i> </button> </div> </div> <div> <button type="button" data-repeater-delete class="py-2 btn btn-sm w-100 trash-btn"> <i class="fas fa-trash text-danger fs-1"></i> </button> </div> </div> </div>
                                                                {{-- Hidden inputs for modal data within the template --}}
                                                                <input type="hidden" name="sku_no">
                                                                <input type="hidden" name="model_no">
                                                                <input type="hidden" name="brand_name">
                                                                <input type="hidden" name="additional_qty">
                                                                <input type="hidden" name="additional_product_name">
                                                                <input type="hidden" name="product_des">
                                                                <input type="hidden" name="additional_info">
                                                                {{-- Note: File input 'image' cannot be pre-filled --}}
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center"> <button type="button" data-repeater-create class="mt-4 mb-3 rfq-add-btns"> <i class="fas fa-plus"></i> Add Items </button> <div> <button type="button" class="fs-3 bg-transparent border-0 text-primary fw-bold text-decoration-underline" data-bs-toggle="modal" data-bs-target="#rfqModal"> Upload RFQ/Tender Images </button> </div> </div>
                                                    </div>
                                                     <div class="modal fade" id="productInfoModal" tabindex="-1" aria-labelledby="productInfoModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="border-0 modal-content rounded-0">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="productInfoModalLabel">Product Information</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-xmark"></i></button>
                                                                </div>
                                                                <div class="p-5 modal-body">
                                                                     <input type="hidden" id="modal_repeater_index"> {{-- To track which item we are editing --}}
                                                                    <div class="row gx-2">
                                                                        <div class="col-12 col-lg-2"><div class="mb-3"><label class="form-label fw-normal">SKU / Part No.</label><input type="text" id="modal_sku_no" class="form-control" placeholder="Enter SKU / Part No."></div></div>
                                                                        <div class="col-12 col-lg-3"><div class="mb-3"><label class="form-label fw-normal">Model No.</label><input type="text" id="modal_model_no" class="form-control" placeholder="Enter Model No."></div></div>
                                                                        <div class="col-12 col-lg-4"><div class="mb-3"><label class="form-label fw-normal">Brand Name</label><input type="text" id="modal_brand_name" class="form-control" placeholder="Enter Brand Name"></div></div>
                                                                        <div class="col-12 col-lg-3"><div class="mb-3"><label class="form-label fw-normal">Quantity</label><input type="number" id="modal_additional_qty" class="form-control" placeholder="Enter Quantity"></div></div>
                                                                        <div class="col-12 col-lg-12"><div class="mb-3"><label class="form-label fw-normal">Item Name (Details)</label><input type="text" id="modal_additional_product_name" class="form-control" placeholder="Enter Detailed Item Name"></div></div>
                                                                        <div class="col-12 col-lg-6"><div class="mb-3"><label class="form-label fw-normal">Item Description</label><textarea class="form-control" id="modal_product_des" rows="2" placeholder="Enter Item Description"></textarea></div></div>
                                                                        <div class="col-12 col-lg-6"><div class="mb-3"><label class="form-label fw-normal">Additional Info</label><textarea class="form-control" id="modal_additional_info" rows="2" placeholder="Enter any additional information"></textarea></div></div>
                                                                        <hr class="my-5">
                                                                        <div class="col-12 col-lg-12"><div class="mb-3"><label class="form-label fw-normal">Upload/Replace Product Image</label><input type="file" id="modal_image" class="form-control"> <small>Leave blank to keep existing image (if any).</small> </div></div>
                                                                        <div class="col-12 col-lg-12 d-flex justify-content-end"> <button type="button" id="saveProductInfoModal" class="rfq-add-btns me-2">Save Changes</button> <button type="button" data-bs-dismiss="modal" class="rfq-add-btns">Close</button> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-10" />
                                                <div class="pt-3 progress-bar-steps for-desktop">
                                                     <div class="step" data-step="1"> <div class="step-label"> <span class="d-none d-sm-inline">Company Info</span> <span class="d-inline d-sm-none">Company</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div>
                                                     <div class="step" data-step="2"> <div class="step-label"> <span class="d-none d-sm-inline">Shipping Details</span> <span class="d-inline d-sm-none">Shipping</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div>
                                                     <div class="step" data-step="3"> <div class="step-label"> <span class="d-none d-sm-inline">End User Info</span> <span class="d-inline d-sm-none">End User</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div>
                                                     <div class="step" data-step="4"> <div class="step-label"> <span class="d-none d-sm-inline">Additional Details</span> <span class="d-inline d-sm-none">Additional</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div>
                                                </div>
                                                <div class="step-content active" data-step="1">
                                                    <div class="row">
                                                        {{-- ✅ ADDED value attributes for all fields --}}
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="company_name" class="form-control" autocomplete="off" placeholder="Company Name" value="{{ old('company_name', $rfq->company_name ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mt-4 mb-4 form-check"> <div> <input class="form-check-input" type="checkbox" value="1" id="resellerCheckbox" name="is_reseller" {{ old('is_reseller', $rfq->is_reseller ?? 0) == 1 ? 'checked' : '' }} required /> <label class="form-check-label" for="resellerCheckbox"> I am a reseller </label> </div> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Client Name" value="{{ old('name', $rfq->name ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="address" class="form-control" autocomplete="off" placeholder="Address" value="{{ old('address', $rfq->address ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="designation" class="form-control" autocomplete="off" placeholder="Designation" value="{{ old('designation', $rfq->designation ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="country" class="form-control" autocomplete="off" placeholder="Country" value="{{ old('country', $rfq->country ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email Address" value="{{ old('email', $rfq->email ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="city" class="form-control" autocomplete="off" placeholder="City" value="{{ old('city', $rfq->city ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Phone Number" value="{{ old('phone', $rfq->phone ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="zip_code" class="form-control" autocomplete="off" placeholder="ZIP Code" value="{{ old('zip_code', $rfq->zip_code ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-12"> <div class="my-10"> <div class="mt-2 form-check"> <input class="form-check-input deliveryAddress" type="checkbox" value="1" id="deliveryAddress" {{ old('is_contact_address', $rfq->is_contact_address ?? 0) == 1 ? 'checked' : '' }} disabled required /> <label class="form-check-label" for="deliveryAddress"> Delivery address is same as company </label> </div> <div id="checkDefaultContainer"> <div class="mt-3 mb-4 form-check"> <input class="form-check-input endUser" type="checkbox" value="1" id="endUser" {{ old('end_user_is_contact_address', $rfq->end_user_is_contact_address ?? 0) == 1 ? 'checked' : '' }} disabled required /> <label class="form-check-label" for="endUser"> End user info is same as company </label> </div> </div> </div> </div>
                                                    </div>
                                                    <div class="mt-5 d-flex justify-content-between align-items-center">
                                                        <div> <p class="mb-0 fw-semibold case-title"> "Ensure all company information is accurate." </p> </div>
                                                        <div>
                                                            <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save Draft Changes</button>
                                                            <button type="button" class="btn btn-primary next-step next-btn"> Next <i class="fas fa-arrow-right-long"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-content" data-step="2">
                                                    <div> <div class="form-check my-15"> <input class="form-check-input deliveryAddress" type="checkbox" name="is_contact_address" value="1" id="stepTwoGotoStep3" {{ old('is_contact_address', $rfq->is_contact_address ?? 0) == 1 ? 'checked' : '' }}/> <label class="form-check-label" for="stepTwoGotoStep3"> Delivery address is same as company </label> </div> </div>
                                                    <div class="row">
                                                        <div class="col-lg-12"> <div class="mb-5"> <input type="text" name="shipping_company_name" class="form-control" autocomplete="off" placeholder="Shipping Company Name" value="{{ old('shipping_company_name', $rfq->shipping_company_name ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="shipping_name" class="form-control" autocomplete="off" placeholder="Shipping Contact Name" value="{{ old('shipping_name', $rfq->shipping_name ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="shipping_address" class="form-control" autocomplete="off" placeholder="Shipping Address" value="{{ old('shipping_address', $rfq->shipping_address ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="shipping_designation" class="form-control" autocomplete="off" placeholder="Shipping Contact Designation" value="{{ old('shipping_designation', $rfq->shipping_designation ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="shipping_country" class="form-control" autocomplete="off" placeholder="Shipping Country" value="{{ old('shipping_country', $rfq->shipping_country ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="email" name="shipping_email" class="form-control" autocomplete="off" placeholder="Shipping Email" value="{{ old('shipping_email', $rfq->shipping_email ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="shipping_city" class="form-control" autocomplete="off" placeholder="Shipping City" value="{{ old('shipping_city', $rfq->shipping_city ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="number" name="shipping_phone" class="form-control" autocomplete="off" placeholder="Shipping Phone" value="{{ old('shipping_phone', $rfq->shipping_phone ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="shipping_zip_code" class="form-control" autocomplete="off" placeholder="Shipping ZIP Code" value="{{ old('shipping_zip_code', $rfq->shipping_zip_code ?? '') }}" required /> </div> </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                                        <button type="button" class="btn btn-secondary prev-step prev-btn"> <i class="fas fa-arrow-left-long pe-2"></i> Previous </button>
                                                        <div>
                                                             <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save Draft Changes</button>
                                                            <button type="button" class="btn btn-primary next-step next-btn"> Next <i class="fas fa-arrow-right-long"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-content" data-step="3">
                                                    <div> <div class="form-check my-15"> <input class="form-check-input endUser" type="checkbox" value="1" id="stepThreeGotoStep4" name="end_user_is_contact_address" {{ old('end_user_is_contact_address', $rfq->end_user_is_contact_address ?? 0) == 1 ? 'checked' : '' }}/> <label class="form-check-label" for="stepThreeGotoStep4"> End user info is same as company </label> </div> </div>
                                                    <div class="row">
                                                        <div class="col-lg-12"> <div class="mb-5"> <input type="text" name="end_user_company_name" class="form-control" autocomplete="off" placeholder="End User Company Name" value="{{ old('end_user_company_name', $rfq->end_user_company_name ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="end_user_name" class="form-control" autocomplete="off" placeholder="End User Name" value="{{ old('end_user_name', $rfq->end_user_name ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="end_user_address" class="form-control" autocomplete="off" placeholder="End User Address" value="{{ old('end_user_address', $rfq->end_user_address ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="end_user_designation" class="form-control" autocomplete="off" placeholder="End User Designation" value="{{ old('end_user_designation', $rfq->end_user_designation ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="end_user_country" class="form-control" autocomplete="off" placeholder="End User Country" value="{{ old('end_user_country', $rfq->end_user_country ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="email" name="end_user_email" class="form-control" autocomplete="off" placeholder="End User Email" value="{{ old('end_user_email', $rfq->end_user_email ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="end_user_city" class="form-control" autocomplete="off" placeholder="End User City" value="{{ old('end_user_city', $rfq->end_user_city ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="number" name="end_user_phone" class="form-control" autocomplete="off" placeholder="End User Phone" value="{{ old('end_user_phone', $rfq->end_user_phone ?? '') }}" required /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="end_user_zip_code" class="form-control" autocomplete="off" placeholder="End User ZIP Code" value="{{ old('end_user_zip_code', $rfq->end_user_zip_code ?? '') }}" required /> </div> </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                                        <button type="button" class="btn btn-secondary prev-step prev-btn"> <i class="fas fa-arrow-left-long pe-2"></i> Previous </button>
                                                        <div>
                                                            <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save Draft Changes</button>
                                                            <button type="button" class="btn btn-primary next-step next-btn"> Next <i class="fas fa-arrow-right-long"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-content" data-step="4">
                                                    <div class="row">
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="project_name" class="form-control" autocomplete="off" placeholder="Project Name" value="{{ old('project_name', $rfq->project_name ?? '') }}" /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <input type="text" name="budget" class="form-control" autocomplete="off" placeholder="Tentative Budget" value="{{ old('budget', $rfq->budget ?? '') }}" /> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <select class="form-select form-select-solid countrySelect" name="project_status"> <option value="" {{ old('project_status', $rfq->project_status ?? '') == '' ? 'selected' : '' }}> Current project status </option> <option value="budget_stage" {{ old('project_status', $rfq->project_status ?? '') == 'budget_stage' ? 'selected' : '' }}> Budget Stage </option> <option value="tor_stage" {{ old('project_status', $rfq->project_status ?? '') == 'tor_stage' ? 'selected' : '' }}> Tor Stage </option> <option value="rfq_stage" {{ old('project_status', $rfq->project_status ?? '') == 'rfq_stage' ? 'selected' : '' }}> RFQ Stage </option> </select> </div> </div>
                                                        <div class="col-lg-6"> <div class="mb-5"> <select class="form-select countrySelect" name="approximate_delivery_time"> <option value="" {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == '' ? 'selected' : '' }}> Tentative Purchase Date </option> <option value="less_one_month" {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'less_one_month' ? 'selected' : '' }}> 1 Month </option> <option value="two_month" {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'two_month' ? 'selected' : '' }}> 2 Month </option> <option value="three_month" {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'three_month' ? 'selected' : '' }}> 3 Month </option> <option value="six_month" {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'six_month' ? 'selected' : '' }}> 6 Month </option> <option value="one_year" {{ old('approximate_delivery_time', $rfq->approximate_delivery_time ?? '') == 'one_year' ? 'selected' : '' }}> 1 Year </option> </select> </div> </div>
                                                        <div class="mb-3 col-lg-12"> <textarea class="form-control" autocomplete="off" id="messageTextarea" name="project_brief" placeholder="Project Brief / Message..." rows="2">{{ old('project_brief', $rfq->project_brief ?? '') }}</textarea> </div>
                                                        <div class="col-lg-12"> <div class="form-check my-15"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked /> <label class="form-check-label" for="flexCheckChecked"> Skip the additional information </label> </div> </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button type="button" class="btn btn-secondary prev-step prev-btn"> <i class="fas fa-arrow-left-long pe-2"></i> Previous </button>
                                                        <div>
                                                            <button type="button" class="btn btn-outline-secondary draft-btn me-2">Save Draft Changes</button>
                                                            <button type="submit" class="btn btn-primary next-step next-btn"> Submit Changes </button> {{-- Changed Text --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> </div>
                                    </div>
                                </div>
                            </div>
                        </div> </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/admin/deal/add.js') }}"></script> {{-- Assuming this file exists and is relevant --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

        <script>
            var existingContacts = {!! $rfq->rfqProducts->toJson() !!};
            var RENDERED_INDEXES = []; // Keep track of rendered items to avoid duplicates
        </script>

        <script>
            $(document).ready(function() {
                let currentStep = 1; // Start at step 1
                const totalSteps = 4;
                let isSubmitting = false;

                // Custom validation rules (keep as they are)
                 $.validator.addMethod("customEmail", function(value, element) { return ( this.optional(element) || /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value) ); }, "Please enter a valid email (e.g., user@gmail.com)");
                $.validator.addMethod("customPhone", function(value, element) { const isValidPattern = /^01[3-9]\d{1,12}$/.test(value); const lengthValid = value.length >= 4 && value.length <= 15; return this.optional(element) || (isValidPattern && lengthValid); }, "Please enter a valid phone number between 4 and 15 digits (e.g., 0186...)");
                $.validator.addMethod("customZip", function(value, element) { return this.optional(element) || /^[0-9]{3,6}$/.test(value); }, "Please enter a valid ZIP code with 3 to 6 digits");

                // Initialize validation
                 var validator = $("#stepperForm").validate({ /* ... same options as create ... */
                    errorClass: "is-invalid", validClass: "is-valid",
                    errorPlacement: function(error, element) { error.addClass("text-danger"); error.insertAfter(element); },
                    onkeyup: false, onfocusout: function(element) { $(element).valid(); toggleNextButton(); toggleCheckboxes(); }, onclick: false,
                 });

                 // Add rules (keep as they are)
                $('input[name="email"]').rules("add", { customEmail: true });
                $('input[name="phone"]').rules("add", { customPhone: true });
                $('input[name="zip_code"]').rules("add", { customZip: true });

                // Toggle functions (keep as they are)
                function toggleNextButton() { /* ... same as create ... */
                    const $currentStepContent = $(`.step-content[data-step="${currentStep}"]`);
                    const $requiredInputs = $currentStepContent.find("input, select, textarea").filter("[required]");
                    let allValid = true;
                    if ($requiredInputs.length > 0) {
                        $requiredInputs.each(function() {
                            if ($(this).is(':visible') && !validator.element(this)) { allValid = false; return false; }
                        });
                    }
                    $currentStepContent.find(".next-step").prop("disabled", !allValid);
                }
                function toggleCheckboxes() { /* ... same as create ... */
                    const $step1 = $('.step-content[data-step="1"]');
                    const $requiredInputs = $step1.find("input, select").filter("[required]");
                    let allValid = true;
                    $requiredInputs.each(function() {
                        if ($(this).is(':visible') && !validator.element(this)) { allValid = false; return false; }
                    });
                    $("#deliveryAddress, #endUser, #resellerCheckbox").prop("disabled", !allValid);
                }
                function updateProgress() { /* ... same as create ... */
                    $(".step").removeClass("active completed current-step-red");
                    $(".step").each(function(index) {
                        const stepNum = index + 1;
                        if (stepNum < currentStep) { $(this).addClass("completed").find("i").show(); }
                        else if (stepNum === currentStep) { $(this).addClass("active current-step-red").find("i").hide(); }
                        else { $(this).removeClass("completed").find("i").hide(); }
                    });
                    $(".step-content").removeClass("active");
                    $(`.step-content[data-step="${currentStep}"]`).addClass("active");
                    toggleNextButton();
                    toggleCheckboxes();
                }

                // Input change listener (keep as is)
                $(document).on("input change", ".step-content.active input, .step-content.active select, .step-content.active textarea", function() { toggleNextButton(); toggleCheckboxes(); });

                // Next button logic (keep as is)
                $(".next-step").click(function() { /* ... same as create ... */
                    const $currentStepContent = $(`.step-content[data-step="${currentStep}"]`);
                    const $requiredInputs = $currentStepContent.find("input, select, textarea").filter("[required]");
                    $('#form_status').val('rfq_created'); // Or keep 'draft' if user intends only to save draft changes via 'Next'
                    if ($requiredInputs.length === 0 || $requiredInputs.valid()) {
                        if (currentStep === 1) { const deliveryAddress = $("#deliveryAddress").is(":checked"); const endUser = $("#endUser").is(":checked"); if (deliveryAddress && endUser) { currentStep = 4; } else if (deliveryAddress) { currentStep = 3; } else { currentStep = 2; } }
                        else if (currentStep < totalSteps) { currentStep++; }
                        updateProgress();
                    } else { $requiredInputs.valid(); }
                });

                // Previous button logic (keep as is)
                $(".prev-step").click(function() { /* ... same as create ... */
                     if (currentStep > 1) {
                         if (currentStep === 4) { const deliveryAddress = $("#deliveryAddress").is(":checked"); const endUser = $("#endUser").is(":checked"); if (deliveryAddress && endUser) { currentStep = 1; } else if (deliveryAddress) { currentStep = 3; } else { currentStep = 3; } }
                         else if (currentStep === 3) { const deliveryAddress = $("#deliveryAddress").is(":checked"); if (deliveryAddress) { currentStep = 1; } else { currentStep = 2; } }
                         else if (currentStep === 2) { currentStep = 1; }
                         else { currentStep--; }
                        updateProgress();
                    }
                });

                // Save as Draft button click
                 $(document).on('click', '#stepperForm .draft-btn', function(e) { /* ... same as create ... */
                    e.preventDefault(); $('#form_status').val('draft'); $("#stepperForm").submit();
                 });

                 // Set status on final Submit button click
                 $('#stepperForm button[type="submit"]').click(function() { $('#form_status').val('rfq_created'); });

                // Form submit handler (same as create)
                 $("#stepperForm").on("submit", function(e) { /* ... same as create ... */
                     if (isSubmitting) { e.preventDefault(); return; }
                    if ($('#form_status').val() === 'draft') {
                        isSubmitting = true; $(this).find('.draft-btn, .next-btn').prop('disabled', true); $(this).find('.draft-btn').html('Saving...'); return;
                    }
                    if ($(this).valid()) {
                        isSubmitting = true; $(this).find('button[type="submit"], .draft-btn').prop('disabled', true); $(this).find('button[type="submit"]').html('Submitting...'); return;
                    } else {
                        e.preventDefault();
                        var firstError = $(this).find(".is-invalid").first(); if (firstError.length) { $('html, body').animate({ scrollTop: firstError.offset().top - 100 }, 500); firstError.focus(); }
                    }
                 });

                // ✅ MODIFIED: Repeater Initialization for EDIT
                var repeater = $(".repeater").repeater({
                    initEmpty: existingContacts.length === 0, // Initialize empty only if there are no existing contacts
                    defaultValues: { qty: 1 },
                     show: function(index) {
                        // 'index' is only available in newer repeater versions, manually track index if needed
                        $(this).slideDown();
                        var itemIndex = $(this).index(); // Get current item index relative to siblings

                        // Fill modal fields if data exists for this *newly added* item (usually not needed for 'show')
                        // updateSL(); // Update serial numbers
                         $(this).find('.deal-modal-btn').attr('data-bs-target', '#productInfoModal').attr('data-repeater-index', itemIndex);

                    },
                    hide: function(deleteElement) { if (confirm("Are you sure?")) { $(this).slideUp(deleteElement, function() { updateSL(); }); } },
                    ready: function(setIndexes) {
                         // Populate repeater with existing data
                        if (existingContacts.length > 0) {
                            repeater.setList(existingContacts.map(function(contact, index) {
                                RENDERED_INDEXES.push(index); // Mark as rendered
                                return {
                                    'product_name': contact.product_name,
                                    'qty': contact.qty,
                                    // Store modal data within hidden fields of the item
                                    'sku_no': contact.sku_no,
                                    'model_no': contact.model_no,
                                    'brand_name': contact.brand_name,
                                    'additional_qty': contact.additional_qty,
                                    'additional_product_name': contact.additional_product_name,
                                    'product_des': contact.product_des,
                                    'additional_info': contact.additional_info,
                                     // Image path can be stored if needed for display, but not in file input
                                };
                            }));

                             // After setting list, update SL and attach modal triggers
                            updateSL();
                             $('.repeater [data-repeater-item]').each(function(index) {
                                if (RENDERED_INDEXES.includes(index)) { // Only attach to initially rendered items
                                    $(this).find('.deal-modal-btn')
                                        .attr('data-bs-target', '#productInfoModal')
                                        .attr('data-repeater-index', index);
                                }
                            });
                        } else {
                             updateSL(); // Update SL even if empty
                        }
                    }
                });


                 // Qty increment/decrement (keep as is)
                $(document).on("click", ".increment-quantity", function() { /* ... keep original ... */
                    let qtyInput = $(this).closest("[data-repeater-item]").find(".qty"); let current = parseInt(qtyInput.val()) || 0; qtyInput.val(current + 1);
                });
                $(document).on("click", ".decrement-quantity", function() { /* ... keep original ... */
                    let qtyInput = $(this).closest("[data-repeater-item]").find(".qty"); let current = parseInt(qtyInput.val()) || 0; if (current > 1) qtyInput.val(current - 1);
                });

                // Auto-update SL (keep as is)
                function updateSL() { /* ... keep original ... */
                    $(".repeater [data-repeater-item]").each(function(index) { $(this).find(".sl").val(index + 1); });
                }

                // Checkbox visibility and jump logic (keep as is)
                 function handleCheckboxVisibility() { /* ... keep original ... */
                     const $checkDefaultWrapper = $("#endUser").closest(".form-check"); if ($("#resellerCheckbox").is(":checked")) { $checkDefaultWrapper.hide(); $("#endUser").prop("checked", false); } else { $checkDefaultWrapper.show(); }
                 }
                 $("#resellerCheckbox").on("change", function() { /* ... keep original ... */ handleCheckboxVisibility(); toggleNextButton(); toggleCheckboxes(); });
                 function setupStepTwoJumpCheckbox() { /* ... keep original ... */ $("#stepTwoGotoStep3").on("change", function() { if ($(this).is(":checked") && currentStep === 2) { currentStep = 3; updateProgress(); } }); }
                 function setupStepTwoJumpCheckboxThree() { /* ... keep original ... */ $("#stepThreeGotoStep4").on("change", function() { if ($(this).is(":checked") && currentStep === 3) { currentStep = 4; updateProgress(); } }); }


                // ✅ ADDED: Logic for the single Product Info Modal
                $('#productInfoModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var itemIndex = button.data('repeater-index'); // Get index from data attribute
                    var repeaterItem = $('.repeater [data-repeater-item]').eq(itemIndex); // Find the corresponding repeater item

                    // Store index in modal
                    $('#modal_repeater_index').val(itemIndex);

                    // Populate modal fields from the hidden inputs in the repeater item
                    $('#modal_sku_no').val(repeaterItem.find('[name$="[sku_no]"]').val());
                    $('#modal_model_no').val(repeaterItem.find('[name$="[model_no]"]').val());
                    $('#modal_brand_name').val(repeaterItem.find('[name$="[brand_name]"]').val());
                    $('#modal_additional_qty').val(repeaterItem.find('[name$="[additional_qty]"]').val());
                    $('#modal_additional_product_name').val(repeaterItem.find('[name$="[additional_product_name]"]').val());
                    $('#modal_product_des').val(repeaterItem.find('[name$="[product_des]"]').val());
                    $('#modal_additional_info').val(repeaterItem.find('[name$="[additional_info]"]').val());
                    $('#modal_image').val(''); // Clear file input
                });

                // ✅ ADDED: Save button click handler for the modal
                 $('#saveProductInfoModal').on('click', function() {
                    var itemIndex = $('#modal_repeater_index').val();
                    var repeaterItem = $('.repeater [data-repeater-item]').eq(itemIndex);

                    // Update hidden inputs in the repeater item from modal fields
                    repeaterItem.find('[name$="[sku_no]"]').val($('#modal_sku_no').val());
                    repeaterItem.find('[name$="[model_no]"]').val($('#modal_model_no').val());
                    repeaterItem.find('[name$="[brand_name]"]').val($('#modal_brand_name').val());
                    repeaterItem.find('[name$="[additional_qty]"]').val($('#modal_additional_qty').val());
                    repeaterItem.find('[name$="[additional_product_name]"]').val($('#modal_additional_product_name').val());
                    repeaterItem.find('[name$="[product_des]"]').val($('#modal_product_des').val());
                    repeaterItem.find('[name$="[additional_info]"]').val($('#modal_additional_info').val());

                    // Handle file input - This requires more complex handling on the server
                    // to differentiate between new uploads and existing files.
                    // For simplicity, this example just updates the hidden fields.
                    // You might need AJAX or modify how the repeater submits file data.
                     var fileInput = $('#modal_image')[0];
                     if (fileInput.files.length > 0) {
                        // A new file was selected. You might need to temporarily store this
                        // or handle it differently depending on your backend logic for updates.
                        // The default repeater might not handle file updates well.
                        // For now, let's just log it.
                        console.log("New image selected for item " + itemIndex + ":", fileInput.files[0].name);
                        // You'll need server-side logic to process 'contacts[index][image]' if it's a new file.
                    }

                    $('#productInfoModal').modal('hide'); // Close modal
                });


                // Initial run for edit page
                handleCheckboxVisibility();
                updateProgress(); // Sets the initial step view
                setupStepTwoJumpCheckbox();
                setupStepTwoJumpCheckboxThree();
                toggleCheckboxes(); // Ensure checkboxes are correctly enabled/disabled on load
                toggleNextButton(); // Ensure next button state is correct on load
            });

             // Country placeholder styling (keep as is)
             const selects = document.getElementsByClassName("countrySelect");
             for (let i = 0; i < selects.length; i++) { /* ... keep original ... */
                  const select = selects[i];
                 if (select.value === "") { select.style.color = "#888888b2"; }
                 select.addEventListener("change", function() { select.style.color = (select.value === "") ? "#888888b2" : "#000"; });
                 select.dispatchEvent(new Event('change'));
             }
        </script>

        <script> $(document).ready(function() { /* ... keep original Shipping sync ... */
            const fieldPairs = [ ['shipping_name', 'name'], ['shipping_email', 'email'], ['shipping_phone', 'phone'], ['shipping_company_name', 'company_name'], ['shipping_designation', 'designation'], ['shipping_address', 'address'], ['shipping_country', 'country'], ['shipping_city', 'city'], ['shipping_zip_code', 'zip_code'] ];
            function syncShippingData(isChecked) { fieldPairs.forEach(([shippingName, contactName]) => { const value = isChecked ? $(`[name="${contactName}"]`).val() : ''; $(`[name="${shippingName}"]`).val(value).valid(); }); }
            $('[name="is_contact_address"], .deliveryAddress').on('change', function() { const isChecked = $(this).is(':checked'); $('[name="is_contact_address"]').prop('checked', isChecked); $('.deliveryAddress').prop('checked', isChecked); syncShippingData(isChecked); });
            syncShippingData($('.deliveryAddress').first().is(':checked'));
         }); </script>
        <script> $(document).ready(function() { /* ... keep original End User sync ... */
            const fieldPairs = [ ['end_user_name', 'name'], ['end_user_email', 'email'], ['end_user_phone', 'phone'], ['end_user_company_name', 'company_name'], ['end_user_designation', 'designation'], ['end_user_address', 'address'], ['end_user_country', 'country'], ['end_user_city', 'city'], ['end_user_zip_code', 'zip_code'] ];
            function syncEndUserData(isChecked) { fieldPairs.forEach(([endName, contactName]) => { const value = isChecked ? $(`[name="${contactName}"]`).val() : ''; $(`[name="${endName}"]`).val(value).valid(); }); }
            $('[name="end_user_is_contact_address"], .endUser').on('change', function() { const isChecked = $(this).is(':checked'); $('[name="end_user_is_contact_address"]').prop('checked', isChecked); $('.endUser').prop('checked', isChecked); syncEndUserData(isChecked); });
            syncEndUserData($('.endUser').first().is(':checked'));
        }); </script>

    @endpush
</x-admin-app-layout>
