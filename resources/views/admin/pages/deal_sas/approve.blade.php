@extends('admin.master')
@section('content')
    <div class="content-wrapper">

        <!-- Inner content -->


        <!-- Page header -->
        <div class="page-header page-header-light shadow">


            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">SAS</span>
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


        <!-- Content area -->
        <div class="content">
            <form action="{{ route('approve.deal-sas', $rfq->rfq_code) }}" method="post" class="calculate">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card rounded-0 shadow-sm m-0 p-2">
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="p-0 m-1"><span class="main_color fw-bold">RFQ Code :</span>
                                        {{ $rfq->rfq_code }}</p>
                                    <input type="hidden" name="rfq_code" value="{{ $rfq->rfq_code }}">
                                    <input type="hidden" name="rfq_id" value="{{ $rfq->id }}">
                                </div>
                                <div class="col-lg-2 text-lg-end text-sm-start">
                                    <p class="p-0 m-1"> <span class="main_color fw-bold">This Deal Is For Our :</span>
                                        @if ($rfq->client_type == 'partner')
                                            Partner
                                        @else
                                            Client
                                        @endif
                                    </p>

                                </div>
                                <div class="col-lg-3 text-lg-end text-sm-start">
                                    <p class="p-0 m-1"><span class="main_color fw-bold">SAS Create Date :</span>
                                        {{ \Carbon\Carbon::parse($rfq->create_date)->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-lg-5 text-lg-end text-sm-start">
                                    <div class="center pt-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="regular" value="1"
                                                id="flexRadioDefault1" {{ $rfq->regular == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Regular Discount
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="special" value="1"
                                                id="flexRadioDefault2" {{ $rfq->special == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Special Discount
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tax_status" value="1"
                                                id="flexRadioDefault3" {{ $rfq->tax_status == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Tax / VAT
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 table-responsive">
                        <table class="text-center table table-bordered table-hover table-striped shadow-sm">
                            <thead>
                                <tr class="bg-gray">
                                    <th width="40%">Item Name</th>
                                    <th width="5%">Quantity</th>
                                    <th width="8%">Unit Price</th>
                                    <th width="12%">Cost (Cog Price)</th>
                                    <th width="12%" class="rg_discount d-none">Regular Discount (%)</th>
                                    <th width="13%">Discounted Sales Price</th>
                                    <th width="10%">Unit Total</th>
                                </tr>
                            </thead>
                            <tbody class="border-bottom">
                                @foreach ($products as $item)
                                    <tr class="thd">
                                        <td class="border-none">
                                            {{ $item->item_name }}
                                            <input type="hidden" name="id[]" value="{{ $item->id }}">
                                            <input type="hidden" name="item_name[]" value="{{ $item->item_name }}">
                                        </td>

                                        <td class="border-none">
                                            <input type="text" class="allow_decimal" name="qty[]"
                                                value="{{ $item->qty }}" id="qty">
                                        </td>
                                        <td class="border-none">
                                            <input class="form-control form-control-sm" type="text" name="unit_price[]"
                                                id="unit_price" value="{{ $item->unit_price }}">
                                        </td>
                                        <td class="border-none">
                                            <input class="cog_price form-control form-control-sm" type="text"
                                                name="cog_price[]" value="{{ $item->cog_price }}">
                                        </td>
                                        <td class="rg_discount d-none border-none ">
                                            <input class="regular_discount form-control form-control-sm" type="text"
                                                name="regular_discount[]" value="{{ $item->regular_discount }}">
                                        </td>

                                        <td class="border-none"><input
                                                class="discounted_sales form-control form-control-sm" type="text"
                                                name="discounted_sales[]" value="{{ $item->discounted_sales }}" readonly>
                                        </td>
                                        <td class="border-none">
                                            <input class="sales_price form-control form-control-sm" type="text"
                                                name="sales_price[]" value="{{ $item->sales_price }}" readonly>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="border-none"></td>

                                    <td class="border-none" colspan="2">Sub Total</td>

                                    <td class="border-none"><input class="form-control form-control-sm" type="text"
                                            name="sub_total_cost" value="{{ $sourcing->sub_total_cost }}" readonly></td>
                                    <td class="rg_discount d-none border-none"></td>
                                    <td class="border-none"><input class="form-control form-control-sm" type="text"
                                            name="sub_total_discounted_sales"
                                            value="{{ $sourcing->sub_total_discounted_sales }}" readonly></td>

                                    <td class="border-none"><input class="form-control form-control-sm" type="text"
                                            name="sub_total_sales" value="{{ $sourcing->sub_total_sales }}" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-end">
                            <div class="card rounded-0 shadow-sm table-responsive w-lg-50 w-sm-100">
                                <table class="text-center table table-bordered table-hover rounded-0 shadow-sm">
                                    <thead class="rounded-0 shadow-sm">
                                        <tr class="special_discount d-none rounded-0">
                                            <th class="rounded-0">Special Discount</th>
                                            <td class="p-1 field-color">
                                                <input class="form-control form-control-sm" type="text"
                                                    name="special_discount" value="{{ $sourcing->special_discount }}">
                                            </td>
                                            <td class="p-1 field-color">
                                                <input class="form-control form-control-sm" type="text"
                                                    name="special_discounted_sales"
                                                    value="{{ $sourcing->special_discounted_sales }}" readonly>
                                            </td>
                                        </tr>
                                        <tr class="tax d-none">
                                            <th class="">Tax/VAT</th>
                                            <td class="p-1 field-color">
                                                <input class="form-control form-control-sm" type="text" name="tax"
                                                    value="{{ $sourcing->tax }}">
                                            </td>
                                            <td class="p-1 field-color">
                                                <input class="form-control form-control-sm" type="text"
                                                    name="tax_sales" value="{{ $sourcing->tax_sales }}" readonly>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <th class="">Grand Total (With Everything)</th>
                                            <td class="p-1 field-color">
                                            </td>
                                            <td class="p-1 field-color">
                                                <input class="form-control form-control-sm" type="text"
                                                    name="grand_total" value="{{ $sourcing->grand_total }}" readonly>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 table-responsive ">
                                <table class="datatable table table-bordered table-hover rounded-0 shadow-sm">
                                    <tbody class="tb rounded-0 shadow">
                                        <tr class="accordion_expense text-white rounded-0"
                                            style="background-color: #24729759;">
                                            <td class="text-white" colspan="3">
                                                <h6 class="mb-0" style="font-size: 13px; color:#11445c;">Expenses</h6>
                                            </td>
                                        </tr>
                                        <tr class="body_expense">
                                            <td class="border-none">Bank & Remittance Charge - (1.5%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="bank_charge" value="{{ $sourcing->bank_charge }}"></td>
                                            <td class="border-none"><input type="text"
                                                    class="result form-control form-control-sm" readonly value="">
                                            </td>
                                        </tr>
                                        <tr class="body_expense">
                                            <td class="border-none">Customs & Duty - (5.0%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="customs" value="{{ $sourcing->customs }}">
                                            </td>
                                            <td class="border-none"><input type="text"
                                                    class="result form-control form-control-sm" readonly value="">
                                            </td>
                                        </tr>
                                        <tr class="body_expense">
                                            <td class="border-none">HR , Office & Utility Cost- (5.0%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="utility_cost" value="{{ $sourcing->utility_cost }}">
                                            </td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" readonly value="">
                                            </td>
                                        </tr>
                                        <tr class="body_expense">
                                            <td class="border-none">Shipping & Handling Cost- (5.0%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="shiping_cost" value="{{ $sourcing->shiping_cost }}">
                                            </td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" readonly value="">
                                            </td>
                                        </tr>
                                        <tr class="body_expense">
                                            <td class="border-none">Sales / Consultancy Comission - (5.0%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="sales_comission" value="{{ $sourcing->sales_comission }}">
                                            </td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" readonly value="">
                                            </td>
                                        </tr>
                                        <tr class="body_expense">
                                            <td class="border-none">Bank Loan / Liability / Debt - (5.0%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="liability" value="{{ $sourcing->liability }}">
                                            </td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" readonly value="">
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 table-responsive">
                                <table class="datatable table table-bordered table-hover rounded-0 shadow-sm">
                                    <tbody class="tb rounded-0 shadow">

                                        <tr class="accordion_offer text-white rounded-0"
                                            style="background-color: #24729759;">
                                            <td class="text-white" colspan="3">
                                                <h6 class="mb-0" style="font-size: 13px; color:#11445c;">Offering Value
                                                    Adding</h6>
                                            </td>
                                        </tr>

                                        <tr class="body_offer">
                                            <td width="60%">Deal Closing / Rebates</td>
                                            <td width="20%"><input class="multiplyValue form-control form-control-sm"
                                                    type="text" name="rebates" value="{{ $sourcing->rebates }}"></td>
                                            <td width="20%"><input class="result form-control form-control-sm"
                                                    type="text" disabled="" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="datatable table table-bordered table-hover rounded-0 shadow-sm">
                                    <tbody class="tb rounded-0 shadow">
                                        <tr class="accordion_other text-white rounded-0"
                                            style="background-color: #24729759;">
                                            <td class="text-white" colspan="3">
                                                <h6 class="mb-0" style="font-size: 13px; color:#11445c;">Other Income
                                                </h6>
                                            </td>
                                        </tr>
                                        <tr class="body_other">
                                            <td class="border-none">Loan / Capital / Partner Share - (5%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="capital_share" value="{{ $sourcing->capital_share }}"></td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" readonly value=""></td>
                                        </tr>
                                        <tr class="body_other">
                                            <td class="border-none">Management Cost - (5%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="management_cost" value="{{ $sourcing->management_cost }}"></td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" readonly value=""></td>
                                        </tr>

                                        <tr>
                                            <td class="border-none">Gross Profit (%) between Sales and Cost</td>
                                            <td class="border-none"><input
                                                    class="gross_profit_subtotal form-control form-control-sm"
                                                    type="text" name="gross_profit_subtotal" readonly
                                                    value="{{ $sourcing->gross_profit_subtotal }}">
                                            </td>
                                            <td class="border-none">
                                                <input type="text"
                                                    class="additional_subtot form-control form-control-sm"
                                                    name="gross_profit_amount" readonly
                                                    value="{{ $sourcing->gross_profit_amount }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-none">Net Profit - (5%)</td>
                                            <td class="border-none"><input
                                                    class="multiplyValue form-control form-control-sm" type="text"
                                                    name="net_profit_percentage"
                                                    value="{{ $sourcing->net_profit_percentage }}"></td>
                                            <td class="border-none"><input class="result form-control form-control-sm"
                                                    type="text" name="net_profit_amount" readonly
                                                    value="{{ $sourcing->net_profit_amount }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card center bg-yellow py-2">
                    <div class="card-body p-1">

                        <div class="text-center mb-3">
                            <label for="approve-warning">
                                <input type="checkbox" id="approve-warning" class="mr-2">
                                Please Check the SAS Carefully and Give Approval.
                            </label>

                        </div>
                        <div class="text-center approve_btn d-none">
                            <button type="submit" class="btn btn-primary mr-2" id="submitbtn">
                                Approve SAS<i class="ph-paper-plane-tilt ml-2"></i></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection

@once
    @push('scripts')
        {{-- <!-- Special Discount and Tax calculation -->
        <script type="text/javascript">

            $("input[name='special_discount']").on('keyup change', function() {
                var discount = $(this).val();
                var subtotal_sales = $("input[name='sub_total_sales']").val();
                var grand_total = $("input[name='grand_total']").val();


                var special_discounted_sales = parseFloat(subtotal_sales) - parseFloat(((subtotal_sales * discount) / 100).toFixed(2));

                $("input[name='special_discounted_sales']").val(parseFloat((special_discounted_sales).toFixed(2)));
                $("input[name='grand_total']").val(parseFloat((special_discounted_sales).toFixed(2)));
            });

            $("input[name='tax']").on('keyup change', function() {
                var tax = $(this).val();
                if (isNaN($("input[name='special_discount']").val())) {
                    var subtotal_sales = $("input[name='sub_total_sales']").val();
                } else {
                    var subtotal_sales = parseFloat($("input[name='special_discounted_sales']").val()).toFixed(2)
                }


                var tax_sales = parseFloat(((subtotal_sales * tax) / 100).toFixed(2));
                var grand  =  parseFloat(subtotal_sales) + parseFloat(((subtotal_sales * tax) / 100).toFixed(2));

                $("input[name='tax_sales']").val(parseFloat((tax_sales).toFixed(2)));
                $("input[name='grand_total']").val(parseFloat((grand).toFixed(2)));
            });

            //*
        </script>
    <!-- Special Discount and Tax calculation -->


    <!-- Show Regula Tax and special discount radio -->
        <script>
            $("input[name='regular']").on('change', function() {

                if ($(this).is(":checked")) {
                    $(".rg_discount").removeClass("d-none");
                }

                else {
                    $(".rg_discount").addClass("d-none");
                }

            });
            $("input[name='special']").on('change', function() {

                if ($(this).is(":checked")) {
                    $(".special_discount").removeClass("d-none");
                }

                else {
                    $(".special_discount").addClass("d-none");
                }

            });
            $("input[name='tax_status']").on('change', function() {

                if ($(this).is(":checked")) {
                    $(".tax").removeClass("d-none");
                }

                else {
                    $(".tax").addClass("d-none");
                }

            });

        </script>
    <!-- Show Regula Tax and special discount radio -->

    <!-- Show Tax and special discount div -->
        <script>
            $(document).mouseover(function(event) {

                if ($("input[name='regular']").is(":checked")) {
                    $(".rg_discount").removeClass("d-none");
                }

                else {
                    $(".rg_discount").addClass("d-none");
                }

            });
            $(document).mouseover(function(event) {

                if ($("input[name='special']").is(":checked")) {
                    $(".special_discount").removeClass("d-none");
                }

                else {
                    $(".special_discount").addClass("d-none");
                }

            });
            $(document).mouseover(function(event) {

                if ($("input[name='tax_status']").is(":checked")) {
                    $(".tax").removeClass("d-none");
                }

                else {
                    $(".tax").addClass("d-none");
                }

            });

        </script>
    <!-- Show Tax and special discount div -->

    <!-- Unit Total calculation -->
        <script>
            $("input[name='unit_price[]']").on('keyup change', function() {


                var mult = 0;
                // for each row:
                $("tr.thd").each(function () {
                    // get the values from this row:
                    var unit_price = $("input[name='unit_price[]']" , this).val();
                    var $qty = $("input[name='qty[]']" , this).val();

                    var $total = ($qty * 1) * (unit_price * 1);
                    // set total for the row
                    $(this).find(".cog_price").val(($total).toFixed(2));
                    $(this).find("input[name='sales_price[]']").val(($total).toFixed(2));
                    mult += $total;
                });
                $("input[name='sub_total_cost']").val((mult).toFixed(2));
                $("input[name='sub_total_sales']").val((mult).toFixed(2));
                $("input[name='grand_total']").val((mult).toFixed(2));

            });
        </script>
    <!-- Unit Total calculation -->

    <!-- Regular Discount calculation -->
        <script>
            $("input[name='regular_discount[]']").on('keyup change', function() {
                var mult = 0;
                // for each row:
                $("tr.thd").each(function () {
                    // get the values from this row:
                    var unit_price = $("input[name='cog_price[]']" , this).val();
                    var regular_discount = $("input[name='regular_discount[]']" , this).val();
                    //var discount = $("input[name='qty[]']" , this).val();

                    // var sales_addition = parseFloat((cog_price)) + parseFloat((cog_addition)) ;
                    //     //alert(sales_addition);
                        if (isNaN($('.gross_profit_subtotal').val())) {
                            var sales_addition = 0;
                        } else {
                            var cog_price = $("input[name='cog_price[]']" , this).val();
                            var gross = $('.gross_profit_subtotal').val();
                            var cog_addition = parseFloat(((cog_price * gross) / 100).toFixed(3));
                            //var sales_addition = parseFloat((cog_price * regular_discount) / 100).toFixed(2);
                        }


                    var $total = parseFloat(unit_price) - parseFloat(((unit_price * regular_discount) / 100).toFixed(3));
                    var total = parseFloat($total) + parseFloat(cog_addition);
                    //alert(total);
                    // set discounted_sales for the row
                    $(this).find("input[name='discounted_sales[]']").val(($total).toFixed(2));
                    $(this).find("input[name='sales_price[]']").val((total).toFixed(2));
                    mult += total;
                });
                $("input[name='sub_total_discounted_sales']").val((mult).toFixed(2));
                $("input[name='sub_total_sales']").val((mult).toFixed(2));
                $("input[name='grand_total']").val((mult).toFixed(2));
            })
        </script>
    <!-- Regular Discount calculation -->

    <!-- Expenses calculation -->
        <script>
            $('.multiplyValue').on('keyup change', function() {

                var $price = $("input[name='sub_total_cost']").val();

                var profit = 0;
                var additional = 0;
                var $sales_price = 0;
                // for each row:
                $("tbody.tb tr").each(function() {
                    // get the values from this row:
                    var $value = $('.multiplyValue', this).val();

                    var $result = parseFloat((($price * $value) / 100).toFixed(3));
                    // set total for the row
                    $('.result', this).val($result);


                    var $mlval = parseFloat($('.multiplyValue', this).val());
                    profit += isNaN($mlval) ? 0 : $mlval;
                    var $result_value = parseFloat($('.result', this).val());
                    additional += isNaN($result_value) ? 0 : $result_value;

                });


                var profit = parseFloat(profit).toFixed(2);
                var $additional = parseFloat(additional).toFixed(2);

                    $('.gross_profit_subtotal').val(profit);
                    $("input[name='gross_profit_amount']").val($additional);
                    var sales_mult = 0;
                    $("tr.thd").each(function () {
                        // get the values from this row:

                        var cog_price = $("input[name='cog_price[]']" , this).val();
                        var gross = $('.gross_profit_subtotal').val();
                        var cog_addition = parseFloat(((cog_price * gross) / 100).toFixed(3));
                        var sales_addition = parseFloat((cog_price)) + parseFloat((cog_addition)) ;
                        //alert(sales_addition);
                        if (isNaN($("input[name='discounted_sales[]']" , this).val())) {
                            var regular_discount = 0;
                        } else {
                            var regulardiscount = $("input[name='regular_discount[]']" , this).val();
                            var regular_discount = parseFloat((cog_price * regulardiscount) / 100).toFixed(2);
                        }
                        // alert(cog_addition);
                        // alert(cog_price);
                        // alert(regular_discount);

                        // set total for the row

                        var sales_total = parseFloat(sales_addition).toFixed(2) - parseFloat(regular_discount).toFixed(2) ;
                        $(this).find("input[name='sales_price[]']").val((sales_total).toFixed(2));
                        sales_mult += sales_total;
                    });
                    $("input[name='sub_total_sales']").val((sales_mult).toFixed(2));
                    $("input[name='grand_total']").val((sales_mult).toFixed(2));

                });

        </script>
    <!-- Expenses calculation --> --}}

        <!-- expand table and calculate -->
        {{-- <script>
            $( ".accordion_expense" ).click(function() {
                $( ".body_expense" ).toggle();
            });
            $( ".accordion_offer" ).click(function() {
                $( ".body_offer" ).toggle();
            });
            $( ".accordion_other" ).click(function() {
                $( ".body_other" ).toggle();
            });
        </script> --}}


        <script>
            $("tbody.tb tr").click(function() {
                var $price = $("input[name='sub_total_cost']").val();

                var profit = 0;
                var additional = 0;
                var $sales_price = 0;
                // for each row:
                $("tbody.tb tr").each(function() {
                    // get the values from this row:
                    var $value = $('.multiplyValue', this).val();

                    var $result = parseFloat((($price * $value) / 100).toFixed(3));
                    // set total for the row
                    $('.result', this).val($result);


                    var $mlval = parseFloat($('.multiplyValue', this).val());
                    profit += isNaN($mlval) ? 0 : $mlval;
                    var $result_value = parseFloat($('.result', this).val());
                    additional += isNaN($result_value) ? 0 : $result_value;

                });


                var profit = parseFloat(profit).toFixed(2);
                var $additional = parseFloat(additional).toFixed(2);

                $('.gross_profit_subtotal').val(profit);
                $("input[name='gross_profit_amount']").val($additional);
                var sales_mult = 0;
                $("tr.thd").each(function() {
                    // get the values from this row:

                    var cog_price = $("input[name='cog_price[]']", this).val();
                    var gross = $('.gross_profit_subtotal').val();
                    var cog_addition = parseFloat(((cog_price * gross) / 100).toFixed(3));
                    var sales_addition = parseFloat((cog_price)) + parseFloat((cog_addition));
                    //alert(sales_addition);
                    if (isNaN($("input[name='discounted_sales[]']", this).val())) {
                        var regular_discount = 0;
                    } else {
                        var regulardiscount = $("input[name='regular_discount[]']", this).val();
                        var regular_discount = parseFloat((cog_price * regulardiscount) / 100).toFixed(2);
                    }
                    // alert(cog_addition);
                    // alert(cog_price);
                    // alert(regular_discount);

                    // set total for the row

                    var sales_total = parseFloat(sales_addition).toFixed(2) - parseFloat(regular_discount)
                        .toFixed(2);
                    $(this).find("input[name='sales_price[]']").val((sales_total).toFixed(2));
                    sales_mult += sales_total;
                });
                $("input[name='sub_total_sales']").val((sales_mult).toFixed(2));
                //$("input[name='grand_total']").val((sales_mult).toFixed(2));

            });
        </script>

        <!-- expand table and calculate -->

        <!--- SAS Approval Button -->
        <script>
            $("#approve-warning").on('change', function() {

                if ($(this).is(":checked")) {
                    $(".approve_btn").removeClass("d-none");
                } else {
                    $(".approve_btn").addClass("d-none");
                }

            });
        </script>
        <!--- SAS Approval Button -->
    @endpush
@endonce
