<x-admin-app-layout :title="'Purchase Edit'">
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
        <div class="card-body">
            <form action="{{ route('purchase.update', $purchase->id) }}" class="form-validate-jquery" method="post">
                @csrf
                @method('PUT')
                <!--Banner Section-->
                <div class="container-fluid">
                    <div class="row mt-2">
                        <div class="col-lg-3 col-sm-12">
                            <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">Main Details</p>
                            <div class="py-2 px-2 bg-light rounded">
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>RFQ Name </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <select name="rfq_id" id="rfq_id" class="form-control form-control-sm"
                                            required>
                                            <option value="0">--select--</option>
                                            @foreach ($rfqs as $rfq)
                                                <option @selected($rfq->id == $purchase->rfq_id) value="{{ $rfq->id }}">
                                                    {{ $rfq->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Details </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="client_details" id="client_details"
                                            value="{{ $purchase->client_details }}" placeholder="Client details"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>D Date</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="date" name="delivery_date" id="delivery_date"
                                            placeholder="Delivery Date" value="{{ $purchase->delivery_date }}"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Validity</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="validity" id="validity" placeholder="Validity"
                                            value="{{ $purchase->validity }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Delivery</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="delivery" placeholder="Delivery"
                                            value="{{ $purchase->delivery }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>License</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="license" id="license" placeholder="License"
                                            value="{{ $purchase->license }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">PQ & PO Info</p>
                            <div class="py-2 px-2 bg-light rounded">
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Number </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $purchase->pq_number }}" placeholder="PQ Number" name="pq_number"
                                            id="pq_number" reaquired>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Reference </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="pq_reference"
                                            value="{{ $purchase->pq_reference }}"
                                            class="form-control form-control-sm" placeholder="PQ Reference" reaquired>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span> PO Number </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="po_number" id="po_number"
                                            value="{{ $purchase->po_number }}" class="form-control form-control-sm"
                                            placeholder="PO Number" reaquired>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span> PO Date </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="date" name="po_date" id="po_date"
                                            value="{{ $purchase->po_number }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Reference </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="po_reference" id="po_reference"
                                            value="{{ $purchase->po_number }}" class="form-control form-control-sm"
                                            placeholder="PO Reference">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span> Penalty </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="penalty" id="penalty" placeholder="Penalty"
                                            value="{{ $purchase->po_number }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">Shipping Info</p>
                            <div class="py-2 px-2 bg-light rounded">
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Name</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="shipping_name" id="shipping_name"
                                            value="{{ $purchase->shipping_name }}" placeholder="Shipping Name"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Phone</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="shipping_phone" id="shipping_phone"
                                            value="{{ $purchase->shipping_phone }}" placeholder="Shipping Phone"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Address</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="shipping_address" id="shipping_address"
                                            value="{{ $purchase->shipping_address }}" placeholder="Shipping Address"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="email" name="shipping_email" id="shipping_email"
                                            value="{{ $purchase->shipping_email }}" placeholder="Shipping Email"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Method </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="shipping_method" id="shipping_method"
                                            value="{{ $purchase->shipping_method }}" placeholder="Shipping Method"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Terms </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="shipping_terms" id="shipping_terms"
                                            value="{{ $purchase->shipping_terms }}" placeholder="Shipping terms"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <p class="text-info fw-bold" style="border-bottom: 1px solid #247297;">Payment Info</p>
                            <div class="py-2 px-2 bg-light rounded">
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payment_status" id="payment_status"
                                            value="{{ $purchase->payment_status }}" placeholder="Payment Status"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Amount</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payment_amount_reference"
                                            value="{{ $purchase->payment_amount_reference }}"
                                            id="payment_amount_reference" placeholder="Payment Amount Reference"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Fee</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payment_process_fee" id="payment_process_fee"
                                            value="{{ $purchase->payment_process_fee }}"
                                            placeholder="Payment Process Fee" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Reference</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payment_pop_reference" id="payment_pop_reference"
                                            value="{{ $purchase->payment_pop_reference }}"
                                            placeholder="Payment Pop Reference" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Date </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payment_date" id="payment_pop_reference"
                                            value="{{ $purchase->payment_date }}" placeholder="Payment Date "
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1 d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Payment </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payment" id="payment" placeholder="Payment"
                                            value="{{ $purchase->payment }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Purchase Info
                            </p>
                            <div class="py-2 px-2 bg-light rounded">
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Purchase By </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="purchase_by" id="purchase_by"
                                            value="{{ $purchase->purchase_by }}" class="form-control form-control-sm"
                                            placeholder="Purchase By">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Principal Name</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="principal_name" id="purchase_name"
                                            value="{{ $purchase->principal_name }}"
                                            class="form-control form-control-sm" placeholder="Purchase Name">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Principal Phone</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="principal_phone" id="principal_phone"
                                            value="{{ $purchase->principal_phone }}"
                                            class="form-control form-control-sm" placeholder="e.g: 0100 0000 000">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Principal Address</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="principal_address" id="principal_address"
                                            value="{{ $purchase->principal_address }}"
                                            class="form-control form-control-sm" placeholder="e.g: 0100 0000 000">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Principal Email </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="principal_email" id="principal_email"
                                            value="{{ $purchase->principal_email }}"
                                            class="form-control form-control-sm" placeholder="e.g: example@gmail.com">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Payable Account Number </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payable_account_number"
                                            value="{{ $purchase->payable_account_number }}"
                                            id="payable_account_number" placeholder="Payable Account Number"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Payable &
                                Billing Info
                            </p>
                            <div class="py-2 px-2 bg-light rounded">
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Payable Account Bank </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payable_account_bank" id="payable_account_bank"
                                            value="{{ $purchase->payable_account_bank }}"
                                            placeholder="Payable Account Bank" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Payable Account Swift </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payable_account_swift" id="payable_account_swift"
                                            value="{{ $purchase->payable_account_swift }}"
                                            placeholder="Payable Account Swift" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Payable Account Route</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="payable_account_route" id="payable_account_route"
                                            value="{{ $purchase->payable_account_route }}"
                                            placeholder="Payable Account Route" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Billing Name</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="billing_name" id="billing_name"
                                            value="{{ $purchase->billing_name }}" placeholder="Billing Name"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Billing Phone</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="billing_phone" id="billing_phone"
                                            value="{{ $purchase->billing_phone }}" placeholder="Billing Phone"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Billing Address </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="billing_address" id="billing_address"
                                            value="{{ $purchase->billing_address }}" placeholder="Billing Address"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6">
                            <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Billing Info
                            </p>
                            <div class="py-2 px-2 bg-light rounded">
                                <div class="row mb-1  d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-4 text-start">
                                        <span>Billing Email </span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="email" name="billing_email" id="billing_email"
                                            value="{{ $purchase->billing_email }}" placeholder="Billing Email"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="text-info mt-2 fw-bold" style="border-bottom: 1px solid #247297;">Edit Purchase
                                Product
                            </p>
                            <div class="py-2 px-2 bg-light rounded  d-flex align-items-center justify-content-center">
                                <div class="row">
                                    <div class="col-lg-12 selection:col-sm-12 selection:text-start">
                                        <button class="btn navigation_btn" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#add_product">
                                            <i class="ph-plus icons_design"></i> Edit Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item m-auto" style="width: 70%;">
                        <div id="add_product" class="accordion-collapse collapse"
                            data-bs-parent="#accordion_expanded">
                            <div class="accordion-body">
                                <h4 class="text-info fw-bold text-center mb-1 mt-2">Edit Product Table</h4>
                                <div class="table-responsive col-md-12">
                                    <table class="table table-bordered col-md-12 product text-center">
                                        <thead>
                                            <tr>
                                                <th style="padding:7px !important;"> Pricing Details </th>
                                                {{-- <th style="padding:7px !important;"> Qty </th>
                                                    <th style="padding:7px !important;"> Unit Price</th> --}}
                                                {{-- <th style="padding:7px !important;"> <a href="javascript:void(0)"
                                                            class="addRow p-1"><i
                                                                class="ph-plus icons_design text-white"></i></a>
                                                    </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="repeater">
                                            {{-- <tr>

                                                    <td> <input type="text" class="form-control form-control-sm"
                                                            name="item_name[]" required></td>
                                                    <td> <input type="text" class="form-control form-control-sm"
                                                            name="qty[]"></td>
                                                    <td> <input type="text" class="form-control form-control-sm"
                                                            name="unit_price[]">
                                                    </td>
                                                    <td class="text-center"> <a href="javascript:void(0)"
                                                            class=" removeRow p-1"><i
                                                                class="ph-minus icons_design"></i></a></td>
                                                </tr> --}}
                                        </tbody>
                                    </table>
                                    <table class="table border">
                                        <tr>
                                            <td width="62%" colspan="2" class="text-center text-info">
                                                <strong>Subtotal
                                                    <span class="text-danger"></span></strong> </td>
                                            <td width="30%">
                                                <div class="form-group">
                                                    <input type="text" name="subtotal" id="subtotal"
                                                        value="{{ $purchase->subtotal }}" placeholder="e.g: 00.00"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center text-info"><strong>Shipping <span
                                                        class="text-danger"></span></strong> </td>
                                            <td>
                                                <div class="form-group">


                                                    <input type="text" name="shipping" id="shipping"
                                                        value="{{ $purchase->shipping }}"
                                                        placeholder="e.g: 00"class="form-control form-control-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center text-info"><strong>Tax <span
                                                        class="text-danger"></span></strong> </td>
                                            <td>
                                                <div class="form-group">

                                                    <input type="text" name="tax" id="tax"
                                                        value="{{ $purchase->tax }}" placeholder="00"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center text-info"><strong>Others <span
                                                        class="text-danger"></span></strong> </td>
                                            <td>
                                                <div class="form-group">

                                                    <input type="text" name="others" id="others"
                                                        value="{{ $purchase->others }}" placeholder="Other's"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center text-info"><strong>Total <span
                                                        class="text-danger"></span></strong> </td>
                                            <td>
                                                <div class="form-group">

                                                    <input type="text" name="total" id="total"
                                                        value="{{ $purchase->total }}" placeholder="00.00"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-lg-12 text-end p-5">
                        <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                            style="padding: 5px;">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-admin-app-layout>
