<div id="kt_docs_repeater_basic">
    <div class="border table-responsive">
        <table class="table mb-0 table-bordered">
            <thead class="">
                <tr class="text-center text-white fw-bold fs-6">
                    <th width="3%" style="background-color: #0b6476">
                        <a href="javascript:;" data-repeater-create><i class="text-white fas fa-plus"></i></a>
                    </th>
                    <th width="3%" class="text-white"
                        style="
                                              background-color: #0b6476;
                                              border-right: 1px solid #0b6476;
                                            ">
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
                        Grand Total (In TK)
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
                                name="office_cost_percentage" type="text" step="0.01" value="10"
                                placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 profit_percentage percentage"
                                name="profit_percentage" type="text" step="0.01" value="10" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 others_cost_percentage percentage"
                                name="others_cost_percentage" type="text" step="0.01" value="10"
                                placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 remittence_percentage percentage"
                                name="remittance_percentage" type="text" step="0.01" value="1"
                                placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 packing_percentage percentage"
                                name="packing_percentage" type="text" step="0.01" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 custom_percentage percentage"
                                name="custom_percentage" type="text" step="0.01" placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center vm" style=" border-right: 1px solid #0b64763d;">
                        <div class="d-flex align-items-center justify-content-center">
                            <input
                                class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 tax_vat_percentage percentage"
                                name="tax_vat_percentage" type="text" step="0.01" value="8"
                                placeholder="0" />
                            <p class="m-0 ms-1">%</p>
                        </div>
                    </th>
                    <th class="p-1 py-1 text-center border-b vm" style="border-left: 1px solid #0b64763d;">
                        Tk
                    </th>
                    <th class="p-1 py-1 text-center border-b vm" style="border-left: 1px solid #0b64763d;">
                        Per Unit
                    </th>
                    <th class="p-1 py-1 text-center border-b vm">
                        Unit Total
                    </th>
                </tr>
            </thead>

            <tbody data-repeater-list="kt_docs_repeater_basic">
                <tr class="text-center border-b" data-repeater-item>
                    <td class="vm">
                        <a href="javascript:;" data-repeater-delete><i
                                class="fa-regular fa-trash-can text-danger"></i></a>
                    </td>
                    <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <span>1</span>
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="product_name"
                            class="bg-white border-0 form-control form-control-sm text-start table-inp rfqcalculationinput"
                            value="Honeywell ML8824" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="qty"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="principal_cost"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput principal_cost"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="principal_unit_total_amount"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput principal_unit_total_amount"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_office_cost"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_profit"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="unit_others_cost"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_remittance"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_packing"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_customs"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="unit_tax_vat"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="unit_subtotal"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_final_price"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                    <td class="p-1 py-1 vm">
                        <input type="text" name="unit_final_total_price"
                            class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                            value="0" placeholder="0" />
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr style="background-color: #ebebeb" class="text-black">
                    <th colspan="2" class="p-1 py-1 text-center vm" style="border-right: 1px solid #0b64763d;">
                        <!-- Empty Table Col -->
                    </th>
                    <th class="p-1 px-4 py-1 vm text-start" colspan="3">
                        Grand Total:
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_principal_amount" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_office_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_profit" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_others_cost" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_remittance" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_packing" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm">
                        <input type="text" name="total_customs" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_tax" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 vm" style="border-right: 1px solid #0b64763d;">
                        <input type="text" name="total_subtotal" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                    <th class="p-1 py-1 text-center vm">
                        <span class="text-center">-</span>
                    </th>
                    <th class="p-1 py-1 vm" colspan="2">
                        <input type="text" name="total_final_total_price" style="background-color: #ebebeb"
                            class="text-center form-control form-control-sm rfqcalculationinput" value="0" />
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
