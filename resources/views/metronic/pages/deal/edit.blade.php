<x-admin-app-layout :title="'Deal Create Form'">
    @include('metronic.pages.deal.partials.deal_css') {{-- Ensure this partial exists --}}
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="px-0 app-container container-fluid px-lg-auto">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="mt-4">
                        <div id="full-process-box">
                            <div class="mt-5 row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="mb-5 text-center">
                                        <h1 class="mb-0 rfq-title fw-bold text-primary"> Business Manager & Deal Information </h1>
                                        <div class="mt-2"> <p class="mb-0 fs-7 text-muted"> Fill out the form below to complete the deal.<br>Review the details, confirm accuracy, submit, and update the status. </p> </div>
                                    </div>
                                </div>
                                <div class="px-0 mx-0 col-lg-10 col-12 px-lg-auto">
                                    <div class="border shadow-sm card">
                                        <div class="py-10 mx-0 row g-0 align-items-center card-header" style="background-color: #0b6476">
                                            {{-- Card Header Content --}}
                                            <div class="col-lg-3 ps-5"> <h4 class="text-white fw-bold mb-1 fs-6"> Sales Manager Details </h4> <ul class="mb-0 text-white ps-0 fs-7" style="list-style-type: none"> <li><span class="text-gray-400 fw-semibold me-1">Name:</span><span class="text-white fw-semibold">{{ Auth::user()->name }}</span></li> <li><span class="text-gray-400 fw-semibold me-1">Email:</span><a href="mailto:{{ Auth::user()->email }}" class="text-white text-hover-primary fw-semibold">{{ Auth::user()->email }}</a></li> </ul> </div>
                                            <div class="text-center text-white col-lg-7 ps-0"></div>
                                            <div class="text-white col-lg-2 pe-5 text-end"> <h4 class="text-white fw-bold mb-1 fs-6"> Deal Information </h4> <p class="mb-1 pe-2 fs-7"> <span class="fw-semibold">Date:</span> <span class="text-white">{{ date('d M, Y') }}</span> </p> <div class="mt-2"> <button type="button" id="btnDraft" class="btn btn-sm btn-light">Add Quick Draft</button> </div> </div>
                                        </div>
                                        <div class="card-body p-lg-10 p-5">
                                            <form id="stepperForm" action="{{ route('deal.store') }}" method="post" enctype="multipart/form-data"> {{-- Removed novalidate --}}
                                                @csrf
                                                {{-- ✅ ADDED: Hidden status input --}}
                                                <input type="hidden" name="status" id="form_status" value="rfq_created">

                                                <div class="mt-1 mb-4">
                                                    <div class="repeater">
                                                        <div data-repeater-list="contacts">
                                                            {{-- Original Repeater Item Structure --}}
                                                            <div data-repeater-item class="row g-2 align-items-center mb-4">
                                                                <div class="col-lg-1 col-md-2 col-3 order-md-1 order-3 text-center">
                                                                    {{-- ✅ Button targets the SINGLE modal --}}
                                                                    <button type="button" title="Additional Product Information" class="btn btn-sm btn-icon btn-light-primary deal-modal-btn w-100" data-bs-toggle="modal" data-bs-target="#productInfoModal">
                                                                        <i class="fas fa-ellipsis-h fs-7"></i>
                                                                    </button>
                                                                     {{-- Old modal structure removed --}}
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 col-2 order-md-2 order-1"> <input type="text" name="sl" class="form-control form-control-sm text-center sl bg-light" value="1" readonly /> </div>
                                                                <div class="col-lg-7 col-md-9 col-7 order-md-3 order-2"> <input type="text" name="product_name" class="form-control form-control-sm product_name" placeholder="Product Name" required /> </div>
                                                                <div class="col-lg-3 col-md-12 col-12 order-md-4 order-4">
                                                                    <div class="d-flex align-items-center justify-content-end">
                                                                        <label class="form-label me-2 mb-0 fs-7 fw-semibold d-none d-lg-inline">Qty:</label>
                                                                        <div class="d-flex align-items-center me-3">
                                                                            <input type="number" value="1" class="form-control form-control-sm text-center qty" min="1" name="qty" style="width: 70px;" required />
                                                                            <div class="d-flex flex-column counting-btn ms-1">
                                                                                <button type="button" class="qty-btn increment-quantity btn btn-sm btn-icon btn-light-secondary" style="width: 28px; height: 18px; line-height: 0.5;"> <i class="fas fa-chevron-up fs-9"></i> </button>
                                                                                <button type="button" class="qty-btn decrement-quantity btn btn-sm btn-icon btn-light-secondary" style="width: 28px; height: 18px; line-height: 0.5;"> <i class="fas fa-chevron-down fs-9"></i> </button>
                                                                            </div>
                                                                        </div>
                                                                        <div> <button type="button" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger"> <i class="fas fa-trash fs-8"></i> </button> </div>
                                                                    </div>
                                                                </div>
                                                                {{-- Hidden inputs to store modal data --}}
                                                                <input type="hidden" name="sku_no">
                                                                <input type="hidden" name="model_no">
                                                                <input type="hidden" name="brand_name">
                                                                <input type="hidden" name="additional_qty">
                                                                <input type="hidden" name="additional_product_name">
                                                                <input type="hidden" name="product_des">
                                                                <input type="hidden" name="additional_info">
                                                                <input type="hidden" name="image_changed_flag" value="0">
                                                                {{-- Actual file input managed via modal now --}}
                                                            </div>
                                                        </div> {{-- End data-repeater-list --}}

                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <button type="button" data-repeater-create class="btn btn-sm btn-light-primary"> <i class="fas fa-plus"></i> Add Items </button>
                                                            <div> <button type="button" class="fs-7 fw-bold btn btn-link" data-bs-toggle="modal" data-bs-target="#rfqModal"> Upload RFQ/Tender Images </button> </div>
                                                        </div>
                                                    </div> {{-- End .repeater --}}
                                                </div> {{-- End .mt-1.mb-4 --}}

                                                {{-- ✅ Single Modal for Product Info (Placed Outside Repeater) --}}
                                                <div class="modal fade" id="productInfoModal" tabindex="-1" aria-labelledby="productInfoModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog modal-dialog-centered modal-xl"> <div class="border-0 modal-content rounded-1"> <div class="modal-header py-4"> <h1 class="modal-title fs-5 fw-bold" id="productInfoModalLabel">Product Information</h1> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body px-5 py-6"> <input type="hidden" id="modal_repeater_index"> <div class="row gx-3"> <div class="col-12 col-lg-2"><div class="mb-4"><label class="form-label fw-semibold fs-7">SKU / Part No.</label><input type="text" id="modal_sku_no" class="form-control form-control-sm" placeholder="SKU / Part No."></div></div> <div class="col-12 col-lg-3"><div class="mb-4"><label class="form-label fw-semibold fs-7">Model No.</label><input type="text" id="modal_model_no" class="form-control form-control-sm" placeholder="Model No."></div></div> <div class="col-12 col-lg-4"><div class="mb-4"><label class="form-label fw-semibold fs-7">Brand Name</label><input type="text" id="modal_brand_name" class="form-control form-control-sm" placeholder="Brand Name"></div></div> <div class="col-12 col-lg-3"><div class="mb-4"><label class="form-label fw-semibold fs-7">Quantity</label><input type="number" id="modal_additional_qty" class="form-control form-control-sm" placeholder="Quantity" min="1"></div></div> <div class="col-12"><div class="mb-4"><label class="form-label fw-semibold fs-7">Item Name (Details)</label><input type="text" id="modal_additional_product_name" class="form-control form-control-sm" placeholder="Detailed Item Name (Optional)"></div></div> <div class="col-12 col-lg-6"><div class="mb-4"><label class="form-label fw-semibold fs-7">Item Description</label><textarea class="form-control form-control-sm" id="modal_product_des" rows="3" placeholder="Item Description"></textarea></div></div> <div class="col-12 col-lg-6"><div class="mb-4"><label class="form-label fw-semibold fs-7">Additional Info</label><textarea class="form-control form-control-sm" id="modal_additional_info" rows="3" placeholder="Additional Info"></textarea></div></div> <hr class="my-4 text-muted"> <div class="col-12"><div class="mb-4"><label class="form-label fw-semibold fs-7">Upload Product Image</label><input type="file" id="modal_image" class="form-control form-control-sm" name="image_upload_temp" accept="image/jpeg,image/png,image/jpg"> <small class="text-muted d-block mt-1">Allowed: jpeg, png, jpg. Max 2MB.</small> </div></div> <div class="col-12 d-flex justify-content-end pt-2"> <button type="button" id="saveProductInfoModal" class="btn btn-sm btn-primary me-2">Save Changes</button> <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-light">Close</button> </div> </div> </div> </div> </div>
                                                </div>

                                                {{-- RFQ/Tender Upload Modal --}}
                                                <div class="modal fade" id="rfqModal" tabindex="-1" aria-labelledby="rfqModalLabel" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered"> <div class="border-0 modal-content rounded-1"> <div class="modal-header py-4"> <h1 class="modal-title fs-5 fw-bold" id="rfqModalLabel">Upload RFQ/Tender Images</h1> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body px-5 py-6"> <div class="row"> <div class="col-lg-12"> <div class="mb-3"> <label class="form-label fs-7 fw-semibold">Select Files</label><input type="file" class="form-control form-control-sm file-input" name="rfq_tender_files[]" multiple accept="image/*,application/pdf"> <small class="text-muted d-block mt-1">Multiple images or PDF files allowed.</small></div> </div> </div> <div class="text-end pt-2"> <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-light">Close</button> </div> </div> </div> </div> </div>

                                                <hr class="my-10" />
                                                <div class="pt-3 progress-bar-steps for-desktop"> <div class="step" data-step="1"> <div class="step-label"> <span class="d-none d-sm-inline">Company Info</span> <span class="d-inline d-sm-none">Company</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div> <div class="step" data-step="2"> <div class="step-label"> <span class="d-none d-sm-inline">Shipping Details</span> <span class="d-inline d-sm-none">Shipping</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div> <div class="step" data-step="3"> <div class="step-label"> <span class="d-none d-sm-inline">End User Info</span> <span class="d-inline d-sm-none">End User</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div> <div class="step" data-step="4"> <div class="step-label"> <span class="d-none d-sm-inline">Additional Details</span> <span class="d-inline d-sm-none">Additional</span> </div> <div class="pt-1 circle ps-2"> <i class="fas fa-check"></i> </div> </div> </div>

                                                <div class="step-content active" data-step="1">
                                                     <div class="row gx-4">
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Company Name</label> <input type="text" name="company_name" class="form-control form-control-sm" placeholder="Company Name" required /> </div> </div>
                                                         <div class="col-lg-6 d-flex align-items-center"> <div class="mt-lg-5 mb-4 form-check form-check-custom form-check-solid"> <input class="form-check-input" type="checkbox" value="1" id="resellerCheckbox" name="is_reseller" /> <label class="form-check-label ms-1 fs-7 fw-semibold text-gray-700" for="resellerCheckbox"> Company is a reseller/partner </label> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Client Contact Name</label> <input type="text" name="name" class="form-control form-control-sm" placeholder="Contact Name" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Company Address</label> <input type="text" name="address" class="form-control form-control-sm" placeholder="Company Address" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Contact Designation</label> <input type="text" name="designation" class="form-control form-control-sm" placeholder="Contact Designation" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Country</label> <input type="text" name="country" class="form-control form-control-sm" placeholder="Country" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Contact Email</label> <input type="email" name="email" class="form-control form-control-sm" placeholder="Contact Email" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">City</label> <input type="text" name="city" class="form-control form-control-sm" placeholder="City" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Contact Phone</label> <input type="tel" name="phone" class="form-control form-control-sm" placeholder="Contact Phone" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">ZIP Code</label> <input type="text" name="zip_code" class="form-control form-control-sm" placeholder="ZIP Code" required /> </div> </div>
                                                         <div class="col-lg-12"> <div class="my-7"> <div class="mt-2 form-check form-check-custom form-check-solid"> <input class="form-check-input deliveryAddress" type="checkbox" value="1" id="deliveryAddress" /> <label class="form-check-label ms-1 fs-7 fw-semibold text-gray-700" for="deliveryAddress"> My delivery address is same as company </label> </div> <div id="checkDefaultContainer"> <div class="mt-3 mb-4 form-check form-check-custom form-check-solid"> <input class="form-check-input endUser" type="checkbox" value="1" id="endUser" /> <label class="form-check-label ms-1 fs-7 fw-semibold text-gray-700" for="endUser"> End user info is same as company </label> </div> </div> </div> </div> {{-- Removed disabled --}}
                                                     </div>
                                                     <div class="mt-5 d-flex justify-content-end align-items-center"> {{-- ✅ Buttons for Step 1 --}}
                                                         <button type="button" class="btn btn-sm btn-light draft-btn me-2">Save as Draft</button>
                                                         <button type="button" class="btn btn-sm btn-primary next-step next-btn"> Next <i class="fas fa-arrow-right fs-8 ms-1"></i> </button>
                                                     </div>
                                                 </div>
                                                <div class="step-content" data-step="2">
                                                     <div> <div class="form-check form-check-custom form-check-solid my-6"> <input class="form-check-input deliveryAddress" type="checkbox" name="is_contact_address" value="1" id="stepTwoGotoStep3" /> <label class="form-check-label ms-1 fs-7 fw-semibold text-gray-700" for="stepTwoGotoStep3"> Delivery address is same as company </label> </div> </div>
                                                     <div class="row gx-4">
                                                         <div class="col-lg-12"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Company Name</label> <input type="text" name="shipping_company_name" class="form-control form-control-sm" placeholder="Shipping Company Name" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Contact Name</label> <input type="text" name="shipping_name" class="form-control form-control-sm" placeholder="Shipping Contact Name" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Address</label> <input type="text" name="shipping_address" class="form-control form-control-sm" placeholder="Shipping Address" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Contact Designation</label> <input type="text" name="shipping_designation" class="form-control form-control-sm" placeholder="Shipping Contact Designation" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Country</label> <input type="text" name="shipping_country" class="form-control form-control-sm" placeholder="Shipping Country" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Email</label> <input type="email" name="shipping_email" class="form-control form-control-sm" placeholder="Shipping Email" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping City</label> <input type="text" name="shipping_city" class="form-control form-control-sm" placeholder="Shipping City" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping Phone</label> <input type="tel" name="shipping_phone" class="form-control form-control-sm" placeholder="Shipping Phone" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">Shipping ZIP Code</label> <input type="text" name="shipping_zip_code" class="form-control form-control-sm" placeholder="Shipping ZIP Code" required /> </div> </div>
                                                     </div>
                                                     <div class="d-flex justify-content-between align-items-center mt-5"> {{-- ✅ Buttons for Step 2 --}}
                                                         <button type="button" class="btn btn-sm btn-light prev-step prev-btn"> <i class="fas fa-arrow-left fs-8 me-1"></i> Previous </button>
                                                         <div> <button type="button" class="btn btn-sm btn-light draft-btn me-2">Save as Draft</button> <button type="button" class="btn btn-sm btn-primary next-step next-btn"> Next <i class="fas fa-arrow-right fs-8 ms-1"></i> </button> </div>
                                                    </div>
                                                </div>
                                                <div class="step-content" data-step="3">
                                                     <div> <div class="form-check form-check-custom form-check-solid my-6"> <input class="form-check-input endUser" type="checkbox" value="1" id="stepThreeGotoStep4" name="end_user_is_contact_address" /> <label class="form-check-label ms-1 fs-7 fw-semibold text-gray-700" for="stepThreeGotoStep4"> End user info is same as company </label> </div> </div>
                                                     <div class="row gx-4">
                                                         <div class="col-lg-12"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Company Name</label> <input type="text" name="end_user_company_name" class="form-control form-control-sm" placeholder="End User Company Name" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Contact Name</label> <input type="text" name="end_user_name" class="form-control form-control-sm" placeholder="End User Contact Name" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Address</label> <input type="text" name="end_user_address" class="form-control form-control-sm" placeholder="End User Address" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Contact Designation</label> <input type="text" name="end_user_designation" class="form-control form-control-sm" placeholder="End User Designation" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Country</label> <input type="text" name="end_user_country" class="form-control form-control-sm" placeholder="End User Country" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Email</label> <input type="email" name="end_user_email" class="form-control form-control-sm" placeholder="End User Email" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User City</label> <input type="text" name="end_user_city" class="form-control form-control-sm" placeholder="End User City" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User Phone</label> <input type="tel" name="end_user_phone" class="form-control form-control-sm" placeholder="End User Phone" required /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label required fs-7 fw-semibold">End User ZIP Code</label> <input type="text" name="end_user_zip_code" class="form-control form-control-sm" placeholder="End User ZIP Code" required /> </div> </div>
                                                     </div>
                                                     <div class="d-flex justify-content-between align-items-center mt-5"> {{-- ✅ Buttons for Step 3 --}}
                                                         <button type="button" class="btn btn-sm btn-light prev-step prev-btn"> <i class="fas fa-arrow-left fs-8 me-1"></i> Previous </button>
                                                         <div> <button type="button" class="btn btn-sm btn-light draft-btn me-2">Save as Draft</button> <button type="button" class="btn btn-sm btn-primary next-step next-btn"> Next <i class="fas fa-arrow-right fs-8 ms-1"></i> </button> </div>
                                                    </div>
                                                </div>
                                                <div class="step-content" data-step="4">
                                                     <div class="row gx-4">
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label fs-7 fw-semibold">Project Name</label> <input type="text" name="project_name" class="form-control form-control-sm" placeholder="Project Name" /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label fs-7 fw-semibold">Tentative Budget</label> <input type="text" name="budget" class="form-control form-control-sm" placeholder="e.g., 50000 BDT" /> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label fs-7 fw-semibold">Current project status</label> <select class="form-select form-select-sm countrySelect" name="project_status"> <option value="">Select Status...</option> <option value="budget_stage">Budget Stage</option> <option value="tor_stage">Tor Stage</option> <option value="rfq_stage">RFQ Stage</option> </select> </div> </div>
                                                         <div class="col-lg-6"> <div class="mb-5"> <label class="form-label fs-7 fw-semibold">Tentative Purchase Date</label> <select class="form-select form-select-sm countrySelect" name="approximate_delivery_time"> <option value="">Select Date...</option> <option value="less_one_month">Within 1 Month</option> <option value="two_month">Within 2 Months</option> <option value="three_month">Within 3 Months</option> <option value="six_month">Within 6 Months</option> <option value="one_year">Within 1 Year</option> </select> </div> </div>
                                                         <div class="mb-5 col-lg-12"> <label class="form-label fs-7 fw-semibold">Project Brief / Message</label> <textarea class="form-control form-control-sm" id="messageTextarea" name="project_brief" placeholder="Leave a comment or message here..." rows="3"></textarea> </div>
                                                     </div>
                                                     <div class="d-flex justify-content-between align-items-center mt-5"> {{-- ✅ Buttons for Step 4 --}}
                                                          <button type="button" class="btn btn-sm btn-light prev-step prev-btn"> <i class="fas fa-arrow-left fs-8 me-1"></i> Previous </button>
                                                          <div> <button type="button" class="btn btn-sm btn-light draft-btn me-2">Save as Draft</button> <button type="submit" class="btn btn-sm btn-primary next-step next-btn"> Submit </button> </div>
                                                     </div>
                                                 </div>
                                            </form> </div> {{-- End card-body --}}
                                    </div> {{-- End card --}}
                                </div> {{-- End col --}}
                            </div> {{-- End row --}}
                        </div> <div id="draft-box" style="display: none;"> <div class="row justify-content-center"> <div class="col-lg-12"> <div class="mb-5 text-center"> <h1 class="mb-0 rfq-title fw-bold text-primary"> Save Deal as Quick Draft </h1> <div class="mt-2"> <p class="mb-0 fs-7 text-muted"> Fill out the form below to save your deal as a draft. <br> You can review and update the details later before final submission. </p> </div> </div> </div> <div class="col-lg-8"> <div class="shadow-sm card rounded-1"> <div class="py-5 card-header d-flex justify-content-between align-items-center" style="background-color: #f5f8fa"> <div> <h4 class="fw-bold mb-0 fs-6">Quick Draft Form</h4> </div> <button type="button" id="btnFull" class="btn btn-sm btn-light-primary"> Go To Full Process </button> </div> <div class="card-body p-5"> <form action="{{ route('admin.quick.deal.store') }}" method="post" enctype="multipart/form-data"> @csrf <div class="row gx-3"> <div class="mb-3 col-12"> <label for="quick_clientName" class="form-label fs-7 fw-semibold required">Client Name</label> <input type="text" class="form-control form-control-sm" id="quick_clientName" name="name" required> </div> <div class="mb-3 col-md-4"> <label for="quick_companyName" class="form-label fs-7 fw-semibold required">Company Name</label> <input type="text" class="form-control form-control-sm" id="quick_companyName" name="company_name" required> </div> <div class="mb-3 col-md-4"> <label for="quick_clientEmail" class="form-label fs-7 fw-semibold required">Client Email</label> <input type="email" class="form-control form-control-sm" id="quick_clientEmail" name="email" required> </div> <div class="mb-3 col-md-4"> <label for="quick_clientPhone" class="form-label fs-7 fw-semibold required">Client Phone</label> <input type="tel" class="form-control form-control-sm" id="quick_clientPhone" name="phone" required> </div> <div class="mb-3 col-12"> <label for="quick_clientImage" class="form-label fs-7 fw-semibold">Upload Image</label> <input type="file" class="form-control form-control-sm" id="quick_clientImage" name="client_image" accept="image/*"> </div> <div class="mb-3 col-12"> <label for="quick_clientMessage" class="form-label fs-7 fw-semibold">Message / Notes</label> <textarea class="form-control form-control-sm" id="quick_clientMessage" name="message" rows="3"></textarea> </div> <div class="mt-3 d-flex justify-content-end col-12"> <button type="submit" class="btn btn-sm btn-primary" style="background-color: #0b6476"> Add To Draft <i class="fas fa-check fs-8 ms-1"></i> </button> </div> </div> </form> </div> </div> </div> </div> </div> </div> {{-- End mt-4 --}}
                </div> {{-- End container --}}
            </div> {{-- End d-flex --}}
        </div> {{-- End #kt_content_container --}}
    </div> {{-- End #kt_post --}}

    @push('scripts')
        {{-- Load Dependencies FIRST --}}
        {{-- <script src="[path/to/jquery.min.js]"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        {{-- <script src="[path/to/bootstrap.bundle.min.js]"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
        {{-- <script src="{{ asset('assets/js/admin/deal/add.js') }}"></script> --}} {{-- Load your custom script LAST --}}

        <script>
            // Initialize for create view
            var existingContacts = []; // NO existing data for create
        </script>

        <script>
            // Main combined script
            $(document).ready(function() {
                console.log("Document ready. Initializing..."); // Debug

                // --- Configuration ---
                let currentStep = 1;
                const totalSteps = 4;
                let isSubmitting = false;

                // --- Repeater Logic ---
                try {
                     var repeater = $(".repeater").repeater({
                        initEmpty: false, // Show the first item from HTML
                        defaultValues: { qty: 1, additional_qty: 1 }, // Default quantity values
                        show: function() {
                            var $item = $(this);
                             console.log("Repeater show called"); // Debug
                             // Clear validation state and values from the template clone
                             $item.find('.is-invalid').removeClass('is-invalid');
                             $item.find('.invalid-feedback').remove();
                             $item.find('input[type="text"]:not([name$="[sl]"])').val(''); // Clear text inputs except SL
                             $item.find('input[type="number"], .qty').val('1'); // Reset Qty to 1
                             $item.find('input[type="hidden"]').val(''); // Clear hidden fields
                             $item.find('input[name$="[qty]"]').val('1'); // Explicitly set qty again
                             $item.find('input[name$="[additional_qty]"]').val('1'); // Explicitly set hidden qty
                             $item.find('input[name$="[image_changed_flag]"]').val('0'); // Reset image flag


                            $item.slideDown(400, function() {
                                // Calculate index *after* item is visible and potentially others were removed
                                var itemIndex = $item.closest('[data-repeater-list]').find('[data-repeater-item]:visible').index($item);
                                console.log("New item shown, calculated index:", itemIndex);

                                // Update modal trigger attributes
                                $item.find('.deal-modal-btn')
                                    .attr('data-bs-target', '#productInfoModal')
                                    .attr('data-repeater-index', itemIndex);

                                // Apply sync logic to reset values correctly
                                triggerInitialSyncForItem($item);

                                // Update all Serial Numbers
                                updateSL();
                            });
                        },
                        hide: function(deleteElement) {
                             console.log("Repeater hide called"); // Debug
                            if (confirm("Delete this item?")) {
                                var $item = $(this);
                                $item.slideUp(deleteElement, function() {
                                    $item.remove(); // Remove element fully from DOM
                                    console.log("Item removed"); // Debug
                                    updateSL(); // Update SLs after removal
                                    // Re-check step 1 validity if needed
                                     if (currentStep === 1) { setTimeout(toggleNextButton, 50); setTimeout(toggleCheckboxes, 50); }
                                });
                            }
                        },
                         ready: function(setIndexes) {
                             console.log("Repeater ready"); // Debug
                             // Setup the initial item(s) on load
                             $('.repeater [data-repeater-item]').each(function(index) {
                                 var $item = $(this);
                                 triggerInitialSyncForItem($item); // Sync initial item values
                                 $item.find('.deal-modal-btn').attr('data-repeater-index', index); // Set initial index
                             });
                             updateSL(); // Set initial SL numbers
                             // Initial state check
                             if (currentStep === 1) { toggleCheckboxes(); }
                             toggleNextButton(); // Check initial button state
                         }
                    });

                     // Check if repeater was initialized
                     if (!$('.repeater').data('repeater')) {
                         console.error("Repeater failed to initialize!");
                     } else {
                        console.log("Repeater initialization successful.");
                     }

                 } catch (e) {
                     console.error("Error during repeater initialization:", e);
                 }


                // --- Stepper UI & Navigation Functions ---
                function updateProgress() {
                    $(".step").removeClass("active completed current-step-red"); $(".step").each(function(index) { const stepNum=index+1; if(stepNum<currentStep)$(this).addClass("completed").find("i").show(); else if(stepNum===currentStep)$(this).addClass("active current-step-red").find("i").hide(); else $(this).removeClass("completed").find("i").hide(); }); $(".step-content").removeClass("active"); $(`.step-content[data-step="${currentStep}"]`).addClass("active");
                    toggleNextButton(); // Use simplified check
                    toggleCheckboxes(); // Checkbox enabling relies only on reseller check now
                }

                 // REMOVED VALIDATION FROM toggleNextButton
                 function toggleNextButton() {
                     // In the absence of validation, buttons are always enabled
                     // You could add simple checks here if needed (e.g., check if required fields are empty)
                      $('.step-content[data-step="' + currentStep + '"] .next-btn').prop('disabled', false);
                 }

                 // REMOVED VALIDATION FROM toggleCheckboxes, kept visibility logic
                 function toggleCheckboxes() {
                     // Checkboxes are always enabled now
                     $("#deliveryAddress, #endUser").prop("disabled", false);
                     handleCheckboxVisibility(); // Still needed to show/hide end user based on reseller
                 }

                // --- Event Handlers (Stepper, Submit, Draft, Checkboxes) ---
                // Input change listener (simplified)
                 $(document).on("input change", ".step-content.active :input", function() {
                    // No validation needed, just ensure sync happens
                    setTimeout(() => { if(currentStep === 1) handleCheckboxVisibility(); }, 50); // Check reseller impact
                 });

                // Next Button Click (No validation check)
                $("#stepperForm").on('click', '.next-step:not([type="submit"])', function(e) {
                    e.preventDefault();
                    $('#form_status').val('rfq_created'); // Set default status

                    // Step jump logic
                    if (currentStep === 1) { const dA = $("#deliveryAddress").is(":checked"), eU = $("#endUser").is(":checked"), iR = $('#resellerCheckbox').is(':checked'); if (dA && eU && !iR) currentStep = 4; else if (dA) currentStep = 3; else currentStep = 2; }
                    else if (currentStep < totalSteps) { currentStep++; }
                    updateProgress();
                    $('html, body').animate({ scrollTop: $('#stepperForm').offset().top - 100 }, 300);
                });

                // Previous Button Click
                $("#stepperForm").on('click', '.prev-step', function(e) { /* ... Keep original step back logic ... */
                    e.preventDefault(); if (currentStep > 1) { if (currentStep === 4 && $("#deliveryAddress").is(":checked") && $("#endUser").is(":checked") && !$('#resellerCheckbox').is(':checked')) currentStep = 1; else if (currentStep === 3 && $("#deliveryAddress").is(":checked")) currentStep = 1; else currentStep--; updateProgress(); $('html, body').animate({ scrollTop: $('#stepperForm').offset().top - 100 }, 300); }
                });

                // Save Draft Button Click
                $("#stepperForm").on('click', '.draft-btn', function(e) { e.preventDefault(); $('#form_status').val('draft'); $("#stepperForm").submit(); });

                // Set status on final Submit button click
                $('#stepperForm button[type="submit"]').click(function() { $('#form_status').val('rfq_created'); });

                // Form Submission Handler (No validation check for final submit either)
                $("#stepperForm").on("submit", function(e) {
                    if (isSubmitting) { e.preventDefault(); return; }
                    isSubmitting = true; // Block double clicks immediately

                    if ($('#form_status').val() === 'draft') {
                        $(this).find('.draft-btn, .next-btn').prop('disabled', true);
                        $(this).find('.draft-btn').html('Saving...');
                        // Allow draft submission
                        return;
                    } else {
                        // Final submission - no validation check here per request
                        $(this).find('button[type="submit"], .draft-btn').prop('disabled', true);
                        $(this).find('button[type="submit"]').html('Submitting...');
                        // Allow final submission
                        return;
                    }
                });


                // --- Quantity/SL/Sync Logic ---
                $(document).on("click", "#stepperForm .increment-quantity", function() { let $q=$(this).closest(".d-flex").find(".qty"); $q.val((parseInt($q.val())||0)+1).trigger('change'); });
                $(document).on("click", "#stepperForm .decrement-quantity", function() { let $q=$(this).closest(".d-flex").find(".qty"); let v=parseInt($q.val())||1; if(v>1)$q.val(v-1).trigger('change'); });
                $(document).on("input change", "#stepperForm .qty", function() { // Trigger sync on direct input or change
                    var $input = $(this); $input.trigger('change'); // Ensure change event fires for sync handler
                 });

                function updateSL() { $(".repeater [data-repeater-item]:visible").each(function(index) { $(this).find(".sl").val(index + 1); $(this).find('.deal-modal-btn').attr('data-repeater-index', index); }); }

                function triggerInitialSyncForItem($item) { var $pn=$item.find('input[name$="[product_name]"]'),$apn=$item.find('input[name$="[additional_product_name]"]'); if($pn.val()&&!$apn.val())$apn.val($pn.val());else if(!$pn.val()&&$apn.val())$pn.val($apn.val()); var $q=$item.find('input[name$="[qty]"]'),$aq=$item.find('input[name$="[additional_qty]"]'); var qV=parseInt($q.val())||1;if(qV<1)qV=1;$q.val(qV);if($aq.val()!=qV)$aq.val(qV); }
                $(document).on('input change', '.repeater [data-repeater-item] :input', function(event) { var $it=$(this).closest('[data-repeater-item]'), $t=$(event.target); var $pn=$it.find('input[name$="[product_name]"]'),$apn=$it.find('input[name$="[additional_product_name]"]'); if($t.is($pn))$apn.val($pn.val());else if($t.is($apn))$pn.val($apn.val()); var $q=$it.find('input[name$="[qty]"]'),$aq=$it.find('input[name$="[additional_qty]"]'); if($t.is($q)){let v=parseInt($q.val())||1;if(v<1)v=1;$q.val(v);$aq.val(v);}else if($t.is($aq)){let v=parseInt($aq.val())||1;if(v<1)v=1;$aq.val(v);$q.val(v);} });

                // --- Modal Logic ---
                $('#productInfoModal').on('show.bs.modal', function (event) { /* ... Keep original modal show logic ... */
                     var button = $(event.relatedTarget), itemIndex = button.data('repeater-index'); if (typeof itemIndex === 'undefined' || itemIndex < 0) return event.preventDefault(); var repeaterItem = $('.repeater [data-repeater-item]').eq(itemIndex); if (!repeaterItem.length) return event.preventDefault(); $('#modal_repeater_index').val(itemIndex);
                    $('#modal_sku_no').val(repeaterItem.find('input[name$="[sku_no]"]').val()); $('#modal_model_no').val(repeaterItem.find('input[name$="[model_no]"]').val()); $('#modal_brand_name').val(repeaterItem.find('input[name$="[brand_name]"]').val()); $('#modal_additional_qty').val(repeaterItem.find('input[name$="[additional_qty]"]').val()); $('#modal_additional_product_name').val(repeaterItem.find('input[name$="[additional_product_name]"]').val()); $('#modal_product_des').val(repeaterItem.find('input[name$="[product_des]"]').val()); $('#modal_additional_info').val(repeaterItem.find('input[name$="[additional_info]"]').val()); $('#modal_image').val('');
                 });
                $('#saveProductInfoModal').on('click', function() { /* ... Keep original modal save logic ... */
                    var itemIndex = $('#modal_repeater_index').val(); if (typeof itemIndex === 'undefined' || itemIndex === '' || itemIndex < 0) return; var repeaterItem = $('.repeater [data-repeater-item]').eq(itemIndex); if (!repeaterItem.length) return;
                    repeaterItem.find('input[name$="[sku_no]"]').val($('#modal_sku_no').val()); repeaterItem.find('input[name$="[model_no]"]').val($('#modal_model_no').val()); repeaterItem.find('input[name$="[brand_name]"]').val($('#modal_brand_name').val()); repeaterItem.find('input[name$="[additional_qty]"]').val($('#modal_additional_qty').val()).trigger('change'); repeaterItem.find('input[name$="[additional_product_name]"]').val($('#modal_additional_product_name').val()).trigger('change'); repeaterItem.find('input[name$="[product_des]"]').val($('#modal_product_des').val()); repeaterItem.find('input[name$="[additional_info]"]').val($('#modal_additional_info').val());
                    repeaterItem.find('input[name$="[image_changed_flag]"]').val($('#modal_image')[0].files.length > 0 ? '1' : '0'); $('#productInfoModal').modal('hide');
                 });

                // --- Checkbox Logic ---
                function handleCheckboxVisibility() { const $eUC = $("#endUser").closest(".form-check"); if ($("#resellerCheckbox").is(":checked")) { $eUC.hide(); $("#endUser").prop("checked", false).trigger('change'); } else { $eUC.show(); } }
                $("#resellerCheckbox").on("change", handleCheckboxVisibility);
                function setupStepJumpCheckboxes() {
                    $(document).on('change', '#stepperForm .deliveryAddress', function() { const iC=$(this).is(':checked'); $('#stepperForm .deliveryAddress').prop('checked', iC); window.syncShippingData(iC); if (iC && currentStep === 2) { currentStep = 3; updateProgress(); } });
                    $(document).on('change', '#stepperForm .endUser', function() { const iC=$(this).is(':checked'); $('#stepperForm .endUser').prop('checked', iC); window.syncEndUserData(iC); if (iC && currentStep === 3 && !$("#resellerCheckbox").is(':checked') ) { currentStep = 4; updateProgress(); } });
                 }

                // --- Initial Setup Calls ---
                handleCheckboxVisibility(); // Initial check for reseller
                setupStepJumpCheckboxes();  // Set up listeners
                updateProgress();           // Display step 1 and run initial checks

            }); // End document ready

            // --- Other Helpers ---
            const selects = document.getElementsByClassName("countrySelect"); for (let i = 0; i < selects.length; i++) { const select = selects[i]; const setColor = () => { select.style.color = (select.value === "") ? "#A1A5B7" : "#3F4254"; }; select.addEventListener("change", setColor); setColor(); }

            // Address Sync Scripts (Made functions global)
            const shipFieldPairs = [ ['shipping_name', 'name'], ['shipping_email', 'email'], ['shipping_phone', 'phone'], ['shipping_company_name', 'company_name'], ['shipping_designation', 'designation'], ['shipping_address', 'address'], ['shipping_country', 'country'], ['shipping_city', 'city'], ['shipping_zip_code', 'zip_code'] ];
            window.syncShippingData = function(isChecked) { shipFieldPairs.forEach(([s, c]) => { $(`#stepperForm [name="${s}"]`).val(isChecked ? $(`#stepperForm [name="${c}"]`).val() : '').trigger('input'); }); /* No toggleNextButton call */ }
            const endUserFieldPairs = [ ['end_user_name', 'name'], ['end_user_email', 'email'], ['end_user_phone', 'phone'], ['end_user_company_name', 'company_name'], ['end_user_designation', 'designation'], ['end_user_address', 'address'], ['end_user_country', 'country'], ['end_user_city', 'city'], ['end_user_zip_code', 'zip_code'] ];
            window.syncEndUserData = function(isChecked) { endUserFieldPairs.forEach(([e, c]) => { $(`#stepperForm [name="${e}"]`).val(isChecked ? $(`#stepperForm [name="${c}"]`).val() : '').trigger('input'); }); /* No toggleNextButton call */ }
            $(document).ready(function() {
                 syncShippingData($('#stepperForm .deliveryAddress').first().is(':checked'));
                 syncEndUserData($('#stepperForm .endUser').first().is(':checked'));
                 // Remove assignment of toggleNextButton to window as it's not needed without validation checks
                 // window.toggleNextButton = typeof toggleNextButton === 'function' ? toggleNextButton : () => {};
             });

            // Quick Draft Toggle Script
            const btnFull = document.getElementById("btnFull"); const btnDraft = document.getElementById("btnDraft"); const fullBox = document.getElementById("full-process-box"); const draftBox = document.getElementById("draft-box"); if (btnFull && btnDraft && fullBox && draftBox) { function setActive(button) { btnFull.classList.remove("active", "btn-primary"); btnFull.classList.add("btn-light"); btnDraft.classList.remove("active", "btn-primary"); btnDraft.classList.add("btn-light"); button.classList.add("active", "btn-primary"); button.classList.remove("btn-light"); fullBox.style.display = (button === btnFull) ? "block" : "none"; draftBox.style.display = (button === btnDraft) ? "block" : "none"; } btnFull.addEventListener("click", () => setActive(btnFull)); btnDraft.addEventListener("click", () => setActive(btnDraft)); setActive(btnFull); }
        </script>
    @endpush
</x-admin-app-layout>
