<x-admin-app-layout :title="'Purchase Details'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">Purchase Details</div>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <table class="tableCustomiceForPurchaseOrderHeader ">
                            <tr>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">PQ No :
                                </th>
                                <td style="border: 1px solid #247297 !important;">{{ $purchase->pq_number }} </td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">PQ Ref :
                                </th>
                                <td style="border: 1px solid #247297 !important;">{{ $purchase->pq_reference }} </td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">RFQ Code
                                    :
                                </th>
                                <td style="border: 1px solid #247297 !important;">RFQ #
                                    {{ optional($purchase->rfq)->rfq_code }}</td>
                            </tr>
                            {{-- <tr>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">PI Ref :
                                </th>
                                <td style="border: 1px solid #247297 !important;"> Md. Sumon khan</td>
                            </tr> --}}
                        </table>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">

                        <table class="tableCustomiceForPurchaseOrderHeader">
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->po_number }}</td>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">PO No :
                                </th>
                            </tr>
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->po_date }}
                                </td>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">PO Date
                                    :
                                </th>
                            </tr>
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->po_reference }}</td>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">PO Ref :
                                </th>
                            </tr>
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->purchase_by }}</td>
                                <th class="bg-primary text-white" style="border: 1px solid #247297 !important;">Ref. By
                                    :
                                </th>
                            </tr>
                        </table>

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-4 col-sm-12">
                        <span class="text-info"> Principal: </span>
                        <p>
                            <strong> {{ $purchase->principal_name }} </strong> <br>
                            {{ $purchase->principal_phone }} <br>
                            {{ $purchase->principal_email }} <br>
                            {{ $purchase->principal_address }} <br>
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <span class="text-info"> Bill To: </span>
                        <p>
                            <strong> {{ $purchase->billing_name }} </strong> <br>
                            {{ $purchase->billing_phone }} <br>
                            {{ $purchase->billing_email }} <br>
                            {{ $purchase->billing_address }} <br>
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-end">
                        <div>
                            <span class="text-info"> Ship To: End Customer </span>
                            <p>
                                <strong> {{ $purchase->shipping_name }}</strong> <br>
                                {{ $purchase->shipping_phone }} <br>
                                {{ $purchase->shipping_email }} <br>
                                {{ $purchase->shipping_address }} <br>

                            </p>
                        </div>
                    </div>
                </div>
                <!-- SHIPPING METHOD	 SHIPPING TERMS		DELIVERY DATE	-->
                <div class="row mt-3">
                    <div class="col-lg-4 col-sm-12">
                        <span class="text-info"> Shipping Method</span>
                        <p class="text-start">
                            {{ $purchase->shipping_method }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <span class="text-info"> Shipping Terms </span>
                        <p class="text-center">
                            {{ $purchase->shipping_terms }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-end">
                        <div>
                            <span class="text-info"> Delivery Date </span>
                            <p class="text-end">
                                {{ $purchase->delivery_date }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Order Description / details 	 -->
                <div class="col-lg-12 purchase-product-order-area float-start mt-2">
                    <h3 class="text-center mb-0"> Order Summuary </h3>
                    <table class="purchase-product-order-table">
                        <tr class="text-center text-info">
                            <th width="5%">Sl #</th>
                            <th width="25%">SKU#</th>
                            <th width="30%">DESCRIPTION </th>
                            <th width="10%">QTY</th>
                            <th width="12%">UNIT PRICE</th>
                            {{-- <th width="18%">AMOUNT</th> --}}
                        </tr>

                        @foreach ($purchase->purchaseProducts as $product)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->sku_code }} </td>
                                <td>{{ $product->product_name }} </td>
                                <td>{{ $product->qty }} </td>
                                <td>{{ $product->unit_price }} </td>
                                {{-- <td>{{ $product->sku_code }} </td> --}}
                            </tr>


                            @if (!empty($product->client_name))
                                <tr class="text-center text-info">
                                    <th colspan="3">
                                        <label style="padding: 0px; font-size: 12px;">Client :
                                            {{ $product->client_name }} </label>
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                        {{-- <tr class="text-center text-info">
                        <th colspan="3">
                            <label style="padding: 0px; font-size: 12px;">
                                VIP : CB4B0CDB4AFD7262D56A
                            </label>
                        </th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}



                        <tr>
                            <th colspan="5" class="text-end text-info"> Subtotal </th>
                            <td class="text-center">{{ $product->subtotal }}</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end text-info"> Shipping </th>
                            <td class="text-center">{{ $product->shipping }}</td>
                        </tr>

                        <tr>
                            <th colspan="5" class="text-end text-info"> TAX/Vat </th>
                            <td class="text-center">{{ $product->tax }}</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end text-info"> Other </th>
                            <td class="text-center">{{ $product->others }}</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end text-info"> Total </th>
                            <td class="text-center">{{ $product->total }}</td>
                        </tr>

                    </table>

                    <!-- Terms & Conditions ,Payable Account Details,Payment Details -->

                    <div class="row  mt-3">
                        <div class="col-lg-4 ">
                            <label class="vendor-bill-customer-title">Terms & Conditions</label>
                            <table class="purchase-product-order-table">
                                <tr>
                                    <td class="text-info"> Payment </td>
                                    <td>:{{ $purchase->payment }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Delivery </td>
                                    <td>:{{ $purchase->delivery }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> License </td>
                                    <td>:{{ $purchase->license }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Penalty </td>
                                    <td>:{{ $purchase->penalty }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Validity</td>
                                    <td>:{{ $purchase->validity }} </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-4 float-start">
                            <label class="vendor-bill-customer-title">Payable Account Details</label>
                            <table class="purchase-product-order-table">
                                <tr>
                                    <td class="text-info"> Acc No </td>
                                    <td>: {{ $purchase->payable_account_number }}</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Name </td>
                                    <td>: {{ $purchase->payable_account_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Bank </td>
                                    <td>: {{ $purchase->payable_account_bank }}</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> SWIFT </td>
                                    <td>: {{ $purchase->payable_account_swift }}</td>
                                </tr>

                                <tr>
                                    <td class="text-info"> Route </td>
                                    <td>: {{ $purchase->payable_account_route }}</td>
                                </tr>

                            </table>

                        </div>
                        <div class="col-lg-4 float-start">
                            <label class="vendor-bill-customer-title">Payment Details</label>
                            <table class="purchase-product-order-table">
                                <tr>
                                    <td class="text-info"> Status </td>
                                    <td>: {{ Str::limit($purchase->payment_status, 10) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Amount </td>
                                    <td>: {{ $purchase->payment_amount_reference }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Fee </td>
                                    <td>: {{ $purchase->payment_process_fee }}</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> PoP No </td>
                                    <td>: {{ $purchase->payment_pop_reference }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Date </td>
                                    <td>: {{ $purchase->payment_date }} </td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- footer-header -->
                    <div class="col-lg-12 float-start mb-3" style="margin-top: 80px;">
                        <div class="col-lg-3 float-start">
                            <b style="text-decoration: overline;">
                                <center class="text-info"> Director, Purchase </center>
                            </b>

                        </div>

                        <div class="col-lg-3 float-start">
                            <b style="text-decoration: overline;">
                                <center class="text-info"> Director, Finance </center>
                            </b>


                        </div>
                        <div class="col-lg-3 float-start">
                            <b style="text-decoration: overline;">
                                <center class="text-info"> Director, Sales </center>
                            </b>

                        </div>
                        <div class="col-lg-3 float-start">
                            <b style="text-decoration: overline;">
                                <center class="text-info"> Date</center>
                            </b>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
