<div class="cogCalculation">
    <div class="table-responsive">
        <table id="myTable" class="table table-borderd" style="font-size: 13px !important">
            <thead>
                <tr style="background-color: #f5f5f;color: black;font-size: 15px;">
                    <th width="3%" class="text-center table-title-font">
                        <a class="border-0 p-0 bg-transparent text-primary fa-solid fa-plus"
                            onclick="addRfqCalculationTableRow()">
                            {{-- <i class="fa-solid fa-plus"></i> --}}
                        </a>
                    </th>
                    <th width="3%" class="text-center table-title-font" style="font-size: 13px;">Sl </th>
                    <th width="14%" class="text-center table-title-font" style="font-size: 13px;">Item</th>
                    <th width="4%" class="text-center table-title-font" style="font-size: 13px;">Qty</th>
                    <th width="7%" class="text-center table-title-font" style="font-size: 13px;">Pr. Cost</th>
                    <th width="7%" class="text-center table-title-font" style="font-size: 13px;">Total
                        {{-- (<span class="currency">TK</span> ) --}}
                    </th>
                    <th width="6%" class="text-center table-title-font" style="font-size: 13px;">Office</th>
                    <th width="6%" class="text-center table-title-font" style="font-size: 13px;">Profit</th>
                    <th width="6%" class="text-center table-title-font" style="font-size: 13px;">Others</th>
                    <th width="6%" class="text-center table-title-font" style="font-size: 13px;">Remittence</th>
                    <th width="6%" class="text-center table-title-font" style="font-size: 13px;">Packing</th>
                    <th width="6%" class="text-center table-title-font" style="font-size: 13px;">Customs</th>
                    {{-- <th width="7%" rowspan="2" class="text-center table-title-font" style="font-size: 13px;">Subtotal
                    </th> --}}
                    <th width="7%" class="text-center table-title-font" style="font-size: 13px;">Tax
                    </th>
                    <th width="7%" rowspan="2" class="text-center table-title-font" style="font-size: 13px;">
                        SubTotal
                        {{-- (<span class="currency">TK</span> ) --}}

                    </th>
                    {{-- EU Price --}}
                    <th width="12%" colspan="2" class="text-center table-title-font" style="font-size: 13px;">
                        Grand Total (In <span class="currency">TK</span> )
                    </th>
                </tr>
                <tr style="background-color: #EAF1DD">
                    <th class="text-center" colspan="6"></th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input
                                    class="form-control form-control-sm text-center office_cost_percentage percentage"
                                    name="office_cost_percentage" type="number" step="0.01"
                                    value="{{ optional($quotation)->office_cost_percentage ?? 10 }}" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input class="form-control form-control-sm text-center profit_percentage percentage"
                                    name="profit_percentage" type="number" step="0.01"
                                    value="{{ optional($quotation)->profit_percentage ?? 10 }}" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input
                                    class="form-control form-control-sm text-center others_cost_percentage percentage"
                                    name="others_cost_percentage" type="number" step="0.01"
                                    value="{{ optional($quotation)->others_cost_percentage ?? 10 }}" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input class="form-control form-control-sm text-center remittence_percentage percentage"
                                    name="remittence_percentage" type="number" step="0.01"
                                    value="{{ optional($quotation)->remittence_percentage ?? 1 }}" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input class="form-control form-control-sm text-center packing_percentage percentage"
                                    name="packing_percentage" type="number" step="0.01"
                                    value="{{ optional($quotation)->packing_percentage }}" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input class="form-control form-control-sm text-center custom_percentage percentage"
                                    name="custom_percentage" type="number" step="0.01"
                                    value="{{ optional($quotation)->custom_percentage }}" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    <th class="text-center">
                        <div class="text-center d-flex align-items-center">
                            <div>
                                <input class="form-control form-control-sm text-center tax_vat_percentage percentage"
                                    type="number" step="0.01"
                                    value="{{ optional($quotation)->tax_vat_percentage ?? 8 }}"
                                    name="tax_vat_percentage" placeholder="0%">
                            </div>
                            <div><p class="m-0 ms-1">%</p></div>
                        </div>
                    </th>
                    {{-- <th class="text-center">Dis%</th> --}}
                    <th class="text-center">Per Unit</th>
                    <th class="text-center">Unit Total</th>
                </tr>
            </thead>
            <tbody class="table_bottom_area text-center">
                @if ($rfq_details->quotationProducts->count() > 0)
                    @foreach ($rfq_details->quotationProducts as $product)
                        <tr class="thd">
                            <td style="padding: 10px;">
                                <a class="border-0 p-0 text-danger bg-transparent fa-regular fa-trash-can"
                                    onclick="deleteRfqCalculationRow(this, {{ $product->id }})"
                                    title="Add List Items">
                                    {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                </a>
                            </td>
                            <td style="padding: 10px;">
                                {{ $loop->iteration }}
                            </td>
                            <td style="padding: 10px;">
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                <input type="text" name="product_name[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput text-start"
                                    value="{{ $product->product_name }}" style="">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="qty[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->qty }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="principal_cost[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput principal_cost"
                                    value="{{ $product->principal_cost ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="principal_unit_total_amount[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput principal_unit_total_amount"
                                    value="{{ $product->principal_unit_total_amount ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_office_cost[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_office_cost ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_profit[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_profit ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_others_cost[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_others_cost ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_remittance[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_remittance ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_packing[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_packing ?? 0 }}">
                            </td>

                            <td style="padding: 10px;"><input type="text" name="unit_customs[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_customs ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_tax_vat[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_tax_vat ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_subtotal[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_subtotal ?? 0 }}">
                            </td>
                            <td style="padding: 10px;"><input type="text" name="unit_final_price[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_final_price ?? 0 }}">
                            </td>
                            <td class="text-center"><input type="text" name="unit_final_total_price[]"
                                    class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                    value="{{ $product->unit_final_total_price ?? 0 }}">
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr> No Data Available</tr>
                @endif

            </tbody>

            <tfoot>


                <tr class="text-black vat_display special_discount w-100"
                    style="font-size: 13px;display:{{ optional($quotation)->special_discount_display == '1' || optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }}">
                    <th class="text-end pe-5" colspan="5"
                        style="font-size: 15px;background-color: #e2e1e1; color: #343434">
                        Sub Total:</th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_principal_amount"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_principal_amount }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #983c3c">
                        <input type="text" name="sub_total_office_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_office_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_profit"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_profit }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_others_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_others_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_remittance"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_remittance }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_packing"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_packing }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_customs"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_customs }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_tax"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_tax }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_subtotal"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_subtotal }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        ---
                    </th>
                    <th class="text-center" colspan="2"
                        style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="sub_total_final_total_price"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->sub_total_final_total_price }}">
                    </th>
                </tr>

                <tr class="special_discount"
                    style="font-size: 13px;display:{{ optional($quotation)->special_discount_display == '1' ? 'table-row' : 'none' }}">
                    <th class="text-end pe-5" colspan="5"
                        style="font-size: 13px;background-color: #e2e1e1; color: #343434">
                        <div class="d-flex align-items-center justify-content-end">
                            Special Discount: <input type="text" name="special_discount_percentage"
                                style="width: 5%;border-bottom: 1px solid rgb(218, 201, 201);margin: 0px 19px;"
                                class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                value="{{ optional($quotation)->special_discount_display == '1' ? optional($singleproduct)->special_discount_percentage : 0 }}">
                            %
                        </div>
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_principal_amount"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_principal_amount }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #983c3c">
                        <input type="text" name="special_discount_office_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_office_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_profit"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_profit }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_others_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_others_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_remittance"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_remittance }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_packing"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_packing }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_customs"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_customs }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_tax"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_tax }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_subtotal"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_subtotal }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        ---
                    </th>
                    <th class="text-center" colspan="2"
                        style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="special_discount_final_total_price"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->special_discount_final_total_price }}">
                    </th>
                </tr>

                <tr class="vat_display"
                    style="font-size: 13px;display:{{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }}">
                    <th class="text-end pe-5" colspan="5"
                        style="font-size: 13px;background-color: #e2e1e1; color: #343434">
                        <div class="d-flex align-items-center justify-content-end">
                            VAT / GST: <input type="text" name="vat_percentage" placeholder="0"
                                style="width: 5%;border-bottom: 1px solid rgb(218, 201, 201);margin: 0px 19px;"
                                class="form-control form-control-sm bg-transparent rfqcalculationinput"
                                value="{{ optional($quotation)->vat_display == '1' ? optional($singleproduct)->vat_percentage : 0 }}">
                            %
                        </div>
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_principal_amount"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_principal_amount }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #983c3c">
                        <input type="text" name="vat_office_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_office_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_profit"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_profit }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_others_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_others_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_remittance"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_remittance }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_packing"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_packing }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_customs"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_customs }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_tax"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_tax }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_subtotal"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_subtotal }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        ---
                    </th>
                    <th class="text-center" colspan="2"
                        style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="vat_final_total_price"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->vat_final_total_price }}">
                    </th>
                </tr>
                <tr class="text-black" style="font-size: 13px;">
                    <th class="text-end pe-5" colspan="5"
                        style="font-size: 15px;background-color: #e2e1e1; color: #343434">
                        Grand Total:</th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_principal_amount"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_principal_amount }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #983c3c">
                        <input type="text" name="total_office_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_office_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_profit"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_profit }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_others_cost"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_others_cost }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_remittance"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_remittance }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_packing"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_packing }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_customs"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_customs }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_tax"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_tax }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_subtotal"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_subtotal }}">
                    </th>
                    <th class="text-center" style="background-color: #e2e1e1; color: #fff">
                        ----
                    </th>
                    <th class="text-center" colspan="2"
                        style="background-color: #e2e1e1; color: #fff">
                        <input type="text" name="total_final_total_price"
                            class="form-control form-control-sm bg-transparent rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_final_total_price }}">
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
