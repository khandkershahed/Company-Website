<div class="cog-calculation">
    <div class="border table-responsive">
        <table id="myTable" class="table mb-0 table-bordered">
            <thead class="">
                <tr class="text-center text-white fw-bold fs-6">
                    <th width="3%" style="background-color: #0b6476">
                        <a href="javascript:;" onclick="addRfqCalculationTableRow()"><i
                                class="text-white fas fa-plus"></i></a>
                    </th>
                    <th width="3%" class="text-white"
                        style="background-color: #0b6476;border-right: 1px solid #0b6476;">
                        Sl
                    </th>
                    <th width="14%" class="text-white text-start" style="background-color: #0b6476d7">
                        Item
                    </th>
                    <th width="4%" class="text-white" style="background-color: #0b6476d7">
                        Qty
                    </th>
                    <th width="7%" class="text-white" style="background-color: #0b6476d7">
                        Pr. Cost
                    </th>
                    <th width="7%" class="text-white"
                        style="background-color: #0b6476d7;border-right: 1px solid #0b6476;">
                        Total
                    </th>
                    <th width="6%" class="text-white" style="background-color: #0b6476d7">
                        Office
                    </th>
                    <th width="6%" class="text-white" style="background-color: #0b6476d7">
                        Profit
                    </th>
                    <th width="6%" class="text-white"
                        style="background-color: #0b6476d7;border-right: 1px solid #0b6476;">
                        Others
                    </th>
                    <th width="6%" class="text-white" style="background-color: #0b6476d7">
                        Remittance
                    </th>
                    <th width="6%" class="text-white" style="background-color: #0b6476d7">
                        Packing
                    </th>
                    <th width="6%" class="text-white" style="background-color: #0b6476d7">
                        Customs
                    </th>
                    <th width="7%" class="text-white"
                        style="background-color: #0b6476d7;border-right: 1px solid #0b6476;">
                        Tax
                    </th>
                    <th width="7%" class="text-white"
                        style="background-color: #0b6476d7;border-right: 1px solid #0b6476;">
                        SubTotal
                    </th>
                    <th width="12%" class="text-white" colspan="2" style="background-color: #0b6476">
                        Grand Total (In <span class="currency">TK</span> )
                    </th>
                </tr>
                <tr style="background-color: #f8fafb;border: 0;">
                    <th colspan="2" class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                    </th>
                    <th class="text-center" style="border-right: 1px solid #0b64763d;" colspan="4">
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 office_cost_percentage percentage"
                                name="office_cost_percentage" type="text" step="0.01"
                                value="{{ optional($quotation)->office_cost_percentage ?? 10 }}" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 profit_percentage percentage"
                                name="profit_percentage" type="text" step="0.01"
                                value="{{ optional($quotation)->profit_percentage ?? 10 }}" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 others_cost_percentage percentage"
                                name="others_cost_percentage" type="text" step="0.01"
                                value="{{ optional($quotation)->others_cost_percentage ?? 10 }}" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 remittence_percentage percentage"
                                name="remittence_percentage" type="text" step="0.01"
                                value="{{ optional($quotation)->remittence_percentage ?? 1 }}" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 packing_percentage percentage"
                                name="packing_percentage" type="text" step="0.01"
                                placeholder="{{ optional($quotation)->packing_percentage ?? 0 }}" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 custom_percentage percentage"
                                name="custom_percentage" type="text" step="0.01"
                                placeholder="{{ optional($quotation)->custom_percentage ?? 0 }}" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm" style=" border-right: 1px solid #0b64763d;">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 tax_vat_percentage percentage"
                                name="tax_vat_percentage" type="text" step="0.01"
                                value="{{ optional($quotation)->tax_vat_percentage ?? 8 }}" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center border-b vm" style="border-left: 1px solid #0b64763d;">
                        <span class="currency">TK</span>
                    </th>
                    <th class="p-1 py-1 text-center border-b vm" style="border-left: 1px solid #0b64763d;">
                        Per Unit
                    </th>
                    <th class="p-1 py-1 text-center border-b vm">
                        Unit Total
                    </th>
                </tr>
            </thead>

            <tbody class="table_bottom_area">
                @if ($rfq->quotationProducts->count() > 0)
                    @foreach ($rfq->quotationProducts as $product)
                        <tr class="text-center border-b thd">
                            <td class="vm">
                                <a href="javascript:void(0)"
                                    onclick="deleteRfqCalculationRow(this, {{ $product->id }})">
                                    <i class="fa-regular fa-trash-can text-danger"></i>
                                </a>
                            </td>
                            <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                                <span>{{ $loop->iteration }}</span>
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                <input type="text" name="product_name[]"
                                    class="bg-white border-0 form-control form-control-sm text-start table-inp"
                                    value="{{ $product->product_name }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="qty[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->qty }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="principal_cost[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput principal_cost"
                                    value="{{ $product->principal_cost ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                                <input type="text" name="principal_unit_total_amount[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput principal_unit_total_amount"
                                    value="{{ $product->principal_unit_total_amount ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_office_cost[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_office_cost ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_profit[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_profit ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                                <input type="text" name="unit_others_cost[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_others_cost ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_remittance[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_remittance ?? 0 }}" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_packing[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_packing ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_customs[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_customs ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                                <input type="text" name="unit_tax_vat[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_tax_vat ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                                <input type="text" name="unit_subtotal[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_subtotal ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_final_price[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_final_price ?? 0 }}" placeholder="0" />
                            </td>
                            <td class="p-1 py-1 vm">
                                <input type="text" name="unit_final_total_price[]"
                                    class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                    value="{{ $product->unit_final_total_price ?? 0 }}" placeholder="0" />
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr> No Data Available</tr>
                @endif
            </tbody>

            <tfoot>

                {{-- Nothing break or edit just adding  those three tr in footer start --}}
                <tr class="text-black vat_display special_discount w-100"
                    style="background-color:#ebebeb;display:{{ optional($quotation)->special_discount_display == '1' || optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }}">
                    <th colspan="2" class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <!-- Empty Table Col -->
                    </th>
                    <th class="p-1 px-4 py-1 vm text-start" colspan="3">
                        Sub Total:
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="sub_total_principal_amount" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_principal_amount }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="sub_total_office_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_office_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="sub_total_profit" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_profit }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="sub_total_others_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_others_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="sub_total_remittance" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_remittance }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="sub_total_packing" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_packing }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="sub_total_customs" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_customs }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="sub_total_tax" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_tax }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="sub_total_subtotal" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_subtotal }}" />
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <span class="text-center">-</span>
                    </th>
                    <th class="p-1 py-1 vm" colspan="2">
                        <input type="text" name="sub_total_final_total_price" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->sub_total_final_total_price }}" />
                    </th>
                </tr>
                <!-- Special Discount Row -->
                <tr class="special_discount"
                    style="display:{{ optional($quotation)->special_discount_display == '1' ? 'table-row' : 'none' }}; background-color: #ebebeb; border-bottom: 1px solid #0b64763d; border-top: 1px solid #0b64763d">
                    <th colspan="2" class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <!-- Empty Table Col -->
                    </th>
                    <th class="p-1 px-4 py-1 vm text-start" colspan="2">
                        Special Discount:
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 rfqcalculationinput"
                                name="special_discount_percentage" type="text" step="0.01" value="{{ optional($quotation)->special_discount_display == '1' ? optional($singleproduct)->special_discount_percentage : 0 }}"
                                placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="special_discount_principal_amount" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_principal_amount }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="special_discount_office_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_office_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="special_discount_profit" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_profit }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="special_discount_others_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_others_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="special_discount_remittance" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_remittance }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="special_discount_packing" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_packing }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="special_discount_customs" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_customs }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="special_discount_tax" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_tax }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="special_discount_subtotal" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_subtotal }}" />
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <span class="text-center">-</span>
                    </th>
                    <th class="p-1 py-1 vm" colspan="2">
                        <input type="text" name="special_discount_final_total_price" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->special_discount_final_total_price }}" />
                    </th>
                </tr>
                <!-- VAT Row -->
                <tr class="vat_display"
                    style="display:{{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }}; background-color: #ebebeb; border-bottom: 1px solid #0b64763d; border-top: 1px solid #0b64763d">
                    <th colspan="2" class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <!-- Empty Table Col -->
                    </th>
                    <th class="p-1 px-4 py-1 vm text-start" colspan="2">
                        VAT/GST:
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 rfqcalculationinput"
                                name="vat_percentage" type="text" step="0.01" value="{{ optional($quotation)->vat_display == '1' ? optional($singleproduct)->vat_percentage : 0 }}"
                                placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="vat_principal_amount" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_principal_amount }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-left: 1px solid #0b64763d;">
                        <input type="text" name="vat_office_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_office_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="vat_profit" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_profit }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="vat_others_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_others_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-left: 1px solid #0b64763d;">
                        <input type="text" name="vat_remittance" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_remittance }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="vat_packing" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_packing }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="vat_customs" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_customs }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="vat_tax" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_tax }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-left: 1px solid #0b64763d;">
                        <input type="text" name="vat_subtotal" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_subtotal }}" />
                    </th>
                    <th class="p-1 py-1 text-center vm" style="border-left: 1px solid #0b64763d;">
                        <span class="text-center">-</span>
                    </th>
                    <th class="p-1 py-1 vm" colspan="2">
                        <input type="text" name="vat_final_total_price" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="{{ optional($singleproduct)->vat_final_total_price }}" />
                    </th>
                </tr>
                {{-- Nothing break or edit just adding  those three tr in footer End --}}


                <tr style="background-color: #ebebeb" class="text-black">
                    <th colspan="2" class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <!-- Empty Table Col -->
                    </th>
                    <th class="p-1 px-4 py-1 vm text-start" colspan="3">
                        Grand Total:
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_principal_amount" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_principal_amount }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_office_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_office_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_profit" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_profit }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_others_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_others_cost }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_remittance" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_remittance }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_packing" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_packing }}" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_customs" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_customs }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_tax" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_tax }}" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_subtotal" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_subtotal }}" />
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <span class="text-center">-</span>
                    </th>
                    <th class="p-1 py-1 vm" colspan="2">
                        <input type="text" name="total_final_total_price" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput"
                            value="{{ optional($singleproduct)->total_final_total_price }}" />
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
