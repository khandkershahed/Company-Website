@extends('admin.master')
@section('content')
    <style>
        .purchase-product-order-area h3 {
            background: #247297;
            min-height: 20px;
            font-size: 15px;
            color: white;
            line-height: 25px;
        }

        .vendor-bill-customer-title {
            border-bottom: 1px solid #fff;
            width: 100%;
            background: #247297;
            padding: 0px;
            text-align: center;
            font-weight: 300;
            font-size: 12px;
            color: white;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow sticky-top">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Purchase Order</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <div class="content ">
            <div class="row w-75 mx-auto card p-3">
                <div class="col-lg-12 d-flex justify-content-center flex-column align-items-center">
                    <img src="https://www.ngenitltd.com/upload/logoimage/1764773615798059.png" width="70"
                        height="50" alt="" class=" img-fluid"> <br>
                    <h4 class="text-end" style="color: #247297; border-bottom: 2px solid #247297;">Purchase Order</h4>
                </div>
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <table class="tableCustomiceForPurchaseOrderHeader ">
                            <tr>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PQ No :</th>
                                <td style="border: 1px solid #247297 !important;">{{ $purchase->pq_number }} </td>
                            </tr>
                            <tr>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PQ Ref :</th>
                                <td style="border: 1px solid #247297 !important;">{{ $purchase->pq_reference }} </td>
                            </tr>
                            <tr>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PI Date :</th>
                                <td style="border: 1px solid #247297 !important;">22-Jan-23</td>
                            </tr>
                            <tr>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PI Ref :</th>
                                <td style="border: 1px solid #247297 !important;"> Md. Sumon khan</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">

                        <table class="tableCustomiceForPurchaseOrderHeader" style="margin-right: -20px;">
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->po_number }}</td>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PO No : </th>
                            </tr>
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;"> {{ $purchase->po_date }}
                                </td>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PO Date : </th>
                            </tr>
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->po_reference }}</td>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">PO Ref : </th>
                            </tr>
                            <tr>
                                <td class="text-end" style="border: 1px solid #247297 !important;">
                                    {{ $purchase->purchase_by }}</td>
                                <th class="main_bg text-white" style="border: 1px solid #247297 !important;">Ref. By : </th>
                            </tr>
                        </table>

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-4 col-sm-12">
                        <span class="text-info"> Vendor: </span>
                        <p>
                            <strong> Ingram Micro India Pvt Ltd </strong> <br>
                            {{ $purchase->principal_address }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <span class="text-info"> Bill To: </span>
                        <p>
                            <strong> NGen IT Pte. Ltd. </strong> <br>
                            {{ $purchase->billing_address }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-end">
                        <div style="margin-right: -20px;">
                            <span class="text-info"> Ship To: End Customer </span>
                            <p>
                                <strong> NGEN IT </strong> <br>
                                {{ $purchase->shipping_address }}
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
                        <div style="margin-right: -20px;">
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
                            <th width="18%">AMOUNT</th>
                        </tr>

                        {{-- @foreach ($collection as $item) --}}
                        <tr class="text-center">
                            <td>01</td>
                            <td>65297929BA01A12 </td>
                            <td>Acrobat Pro for teams - 12 months</td>
                            <td>3</td>
                            <td>180.00</td>
                            <td>$ 540.00</td>
                        </tr>
                        {{-- @endforeach --}}

                        <tr class="text-center text-info">
                            <th colspan="3">
                                <label style="padding: 0px; font-size: 12px;">Client : UNDP PTIB Project </label>
                            </th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-center text-info">
                            <th colspan="3">
                                <label style="padding: 0px; font-size: 12px;">
                                    VIP : CB4B0CDB4AFD7262D56A
                                </label>
                            </th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>



                        <tr>
                            <th colspan="5" class="text-end text-info"> Subtotal </th>
                            <td class="text-center">$ 540.00</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end text-info"> Shipping </th>
                            <td class="text-center">$ 0.00</td>
                        </tr>

                        <tr>
                            <th colspan="5" class="text-end text-info"> TAX/Vat </th>
                            <td class="text-center">$ 0.00</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end text-info"> Other </th>
                            <td class="text-center">$ 0.00</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end text-info"> Total </th>
                            <td class="text-center">$ 540.00</td>
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
                                    <td class="text-info"> </td>
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
                                    <td>: {{ Str::limit($purchase->payment_status, 10) }} Will be Paid in Advance</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Amount </td>
                                    <td>: {{ $purchase->payment_amount_reference }} - </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Fee </td>
                                    <td>: {{ $purchase->payment_process_fee }} Applicant</td>
                                </tr>
                                <tr>
                                    <td class="text-info"> PoP No </td>
                                    <td>: {{ $purchase->payment_pop_reference }} </td>
                                </tr>
                                <tr>
                                    <td class="text-info"> Date </td>
                                    <td>: {{ $purchase->payment_date }} 17-Jan-2023 </td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- footer-header -->
                    <div class="col-lg-12 float-start mb-3" style="margin-top: 80px;">
                        <div class="col-lg-3 float-start">
                            <b style="text-decoration: overline; ">
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
@endsection
