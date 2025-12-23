<x-admin-app-layout :title="'Purchase'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">Purchase</div>
            <div class="card-toolbar">
                <a href="{{ route('purchase.index') }}" class="btn btn-light-info">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span>
                    Back to the list
                </a>
            </div>
        </div>

        <form action="{{ route('purchase.store') }}" class="form-validate-jquery" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-7 col-sm-12">
                        <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">Main Details</p>
                        <div class="p-2 bg-light rounded">
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <x-metronic.label for="rfq_id" class="form-label required">Select RFQ
                                </x-metronic.label>
                                <select name="rfq_id" id="rfq_id" data-control="select2"
                                    data-placeholder="Select RFQ" class="form-control form-control-sm" required>
                                    <option></option>
                                    @foreach ($rfqs as $rfq)
                                        <option value="{{ $rfq->id }}">{{ $rfq->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Client Details </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="client_details" id="client_details"
                                        placeholder="Client details" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>D Date</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="date" name="delivery_date" id="delivery_date" placeholder=""
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Validity</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="validity" id="validity" placeholder="Validity"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Delivery</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="delivery" placeholder="Delivery"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>License</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="license" id="license" placeholder="License"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mb-7 col-sm-12">
                        <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">PQ & PO Info</p>
                        <div class="py-2 px-2 bg-light rounded">
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>PQ Number </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" class="form-control form-control-sm" placeholder="PQ Number"
                                        name="pq_number" id="pq_number" reaquired>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>PQ Reference </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="pq_reference" class="form-control form-control-sm"
                                        placeholder="PQ Reference" reaquired>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span> PO Number </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="po_number" id="po_number"
                                        class="form-control form-control-sm" placeholder="PO Number" reaquired>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span> PO Date </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="date" name="po_date" id="po_date"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>PO Reference </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="po_reference" id="po_reference"
                                        class="form-control form-control-sm" placeholder="PO Reference">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span> Penalty </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="penalty" id="penalty" placeholder="Penalty"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mb-7 col-sm-12">
                        <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">Shipping Info</p>
                        <div class="py-2 px-2 bg-light rounded">
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Name</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="shipping_name" id="shipping_name"
                                        placeholder="Shipping Name" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Phone</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="shipping_phone" id="shipping_phone"
                                        placeholder="Shipping Phone" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Address</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="shipping_address" id="shipping_address"
                                        placeholder="Shipping Address" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Email</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="email" name="shipping_email" id="shipping_email"
                                        placeholder="Shipping Email" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Method </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="shipping_method" id="shipping_method"
                                        placeholder="Shipping Method" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Terms </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="shipping_terms" id="shipping_terms"
                                        placeholder="Shipping terms" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mb-7 col-sm-12">
                        <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">Payment Info</p>
                        <div class="py-2 px-2 bg-light rounded">
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Status</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payment_status" id="payment_status"
                                        placeholder="Payment Status" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Amount</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payment_amount_reference"
                                        id="payment_amount_reference" placeholder="Payment Amount Reference"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Fee</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payment_process_fee" id="payment_process_fee"
                                        placeholder="Payment Process Fee" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Reference</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payment_pop_reference" id="payment_pop_reference"
                                        placeholder="Payment Pop Reference" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Date </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payment_date" id="payment_pop_reference"
                                        placeholder="Payment Date " class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Payment </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payment" id="payment" placeholder="Payment"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>

                    <div class="col-lg-4 mb-7 col-sm-12">
                        <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Purchase Info</p>
                        <div class="py-2 px-2 bg-light rounded">
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Purchase By </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="purchase_by" id="purchase_by"
                                        class="form-control form-control-sm" placeholder="Purchase By">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Principal Name</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="principal_name" id="principal_name"
                                        class="form-control form-control-sm" placeholder="Principal Name">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Principal Phone</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="principal_phone" id="principal_phone"
                                        class="form-control form-control-sm" placeholder="e.g: 0100 0000 000">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Principal Address</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="principal_address" id="principal_address"
                                        class="form-control form-control-sm" placeholder="e.g: 0100 0000 000">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Principal Email </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="principal_email" id="principal_email"
                                        class="form-control form-control-sm" placeholder="e.g: example@gmail.com">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Payable Account Number </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payable_account_number" id="payable_account_number"
                                        placeholder="Payable Account Number" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mb-7 col-sm-12">
                        <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Payable & Billing
                            Info
                        </p>
                        <div class="py-2 px-2 bg-light rounded">
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Payable Account Bank </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payable_account_bank" id="payable_account_bank"
                                        placeholder="Payable Account Bank" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Payable Account Swift </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payable_account_swift" id="payable_account_swift"
                                        placeholder="Payable Account Swift" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Payable Account Route</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="payable_account_route" id="payable_account_route"
                                        placeholder="Payable Account Route" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Billing Name</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="billing_name" id="billing_name"
                                        placeholder="Billing Name" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Billing Phone</span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="billing_phone" id="billing_phone"
                                        placeholder="Billing Phone" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Billing Address </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="text" name="billing_address" id="billing_address"
                                        placeholder="Billing Address" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6">
                        <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Billing Info</p>
                        <div class="py-2 px-2 bg-light rounded">
                            <div class="row mb-3  d-flex align-items-center">
                                <div class="col-lg-4 col-sm-4 text-start">
                                    <span>Billing Email </span>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <input type="email" name="billing_email" id="billing_email"
                                        placeholder="Billing Email" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Add Purchase
                            Product
                        </p>
                        <div class="py-2 px-2 bg-light rounded  d-flex align-items-center justify-content-center">
                            <div class="row">
                                <div class="col-lg-12 selection:col-sm-12 selection:text-start">
                                    <button class="btn navigation_btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#add_product">
                                        <i class="fas fa-plus"></i> Add Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item m-auto w-lg-75">
                    <div id="add_product" class="accordion-collapse collapse" data-bs-parent="#accordion_expanded">
                        <div class="accordion-body">
                            <h4 class="text-info fw-bold text-center mb-1 mt-2">Add Product Table</h4>
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered col-md-12 product text-center">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th width="50%" style="padding:7px !important;"> Product Name </th>
                                            <th width="17%" style="padding:7px !important;"> Qty </th>
                                            <th width="28%" style="padding:7px !important;"> Unit Price</th>
                                            <th width="5%" style="padding:7px !important;">
                                                <a href="javascript:void(0)" class="addRow p-1"><i
                                                        class="fas fa-plus text-white"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="repeater">
                                        <tr>
                                            <td> <input type="text" class="form-control form-control-sm"
                                                    name="item_name[]" placeholder="Product Name" required></td>
                                            <td> <input type="text" class="form-control form-control-sm"
                                                    name="qty[]" placeholder="Quantity"></td>
                                            <td> <input type="text" class="form-control form-control-sm"
                                                    name="unit_price[]" placeholder="Unit Price">
                                            </td>
                                            <td class="text-center"> <a href="javascript:void(0)"
                                                    class="removeRow p-1"><i
                                                        class="fas fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table border">
                                    <tr>
                                        <td width="62%" colspan="2" class="text-center"><strong>Subtotal
                                                <span class="text-danger"></span></strong> </td>
                                        <td width="30%">
                                            <div class="form-group">
                                                <input type="number" step="0.01" name="subtotal" id="subtotal"
                                                    placeholder="e.g: 00.00" class="form-control form-control-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center"><strong>Shipping <span
                                                    class="text-danger"></span></strong> </td>
                                        <td>
                                            <div class="form-group">


                                                <input type="number" step="0.01" name="shipping" id="shipping"
                                                    placeholder="e.g: 00"class="form-control form-control-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center"><strong>Tax <span
                                                    class="text-danger"></span></strong> </td>
                                        <td>
                                            <div class="form-group">

                                                <input type="number" step="0.01" name="tax" id="tax"
                                                    placeholder="00" class="form-control form-control-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center"><strong>Others <span
                                                    class="text-danger"></span></strong> </td>
                                        <td>
                                            <div class="form-group">

                                                <input type="number" step="0.01" name="others" id="others"
                                                    placeholder="Other's" class="form-control form-control-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center"><strong>Total <span
                                                    class="text-danger"></span></strong> </td>
                                        <td>
                                            <div class="form-group">

                                                <input type="number" step="0.01" name="total" id="total"
                                                    placeholder="00.00" class="form-control form-control-sm">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row float-end my-7">
                    <button type="submit" class="btn btn-primary from-prevent-multiple-submits w-100px"
                        style="padding: 5px;">Submit</button>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            // SAFE WRAPPER (prevents Metronic JS errors from stopping your calculation)
            try {

                // === Auto Calculation === //
                function calculateTotals() {
                    let subtotal = 0;

                    // Loop through all repeater rows
                    $('.repeater tr').each(function() {
                        let qty = parseFloat($(this).find("input[name='qty[]']").val()) || 0;
                        let price = parseFloat($(this).find("input[name='unit_price[]']").val()) || 0;
                        subtotal += qty * price;
                    });

                    // Update subtotal field
                    $("#subtotal").val(subtotal.toFixed(2));

                    // Other editable fields
                    let shipping = parseFloat($("#shipping").val()) || 0;
                    let tax = parseFloat($("#tax").val()) || 0;
                    let others = parseFloat($("#others").val()) || 0;

                    // Total calculation
                    let total = subtotal + shipping + tax + others;

                    // Update total
                    $("#total").val(total.toFixed(2));
                }

                // Trigger calculation on inputs
                $(document).on("input",
                    "input[name='qty[]'], input[name='unit_price[]'], #shipping, #tax, #others",
                    function() {
                        calculateTotals();
                    }
                );

                // Recalculate When Row Added
                $(document).on('click', '.addRow', function() {
                    setTimeout(calculateTotals, 200);
                });

                // Recalculate When Row Removed
                $(document).on('click', '.removeRow', function() {
                    setTimeout(calculateTotals, 200);
                });

            } catch (e) {
                console.warn("Metronic internal error ignored:", e);
            }
        </script>
        <script>
            $(document).ready(function() {
                $('.product thead').on('click', '.addRow', function() {
                    var tr = "<tr>" +
                        "<td> <input type='text' class='form-control' name='item_name[]' placeholder='Product Name' required></td>" +
                        "<td> <input type='text' class='form-control' name='qty[]' placeholder='Quantity' required></td>" +
                        "<td> <input type='text' class='form-control' name='unit_price[]' ></td>" +
                        "<td> <a href='javascript:void(0)' class='removeRow p-1'><i class='fas fa-trash-alt text-danger'></i></a></td>" +
                        "</tr>"
                    $('.repeater').append(tr);
                });

                $('tbody').on('click', '.removeRow', function() {
                    $(this).parent().parent().remove();
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
