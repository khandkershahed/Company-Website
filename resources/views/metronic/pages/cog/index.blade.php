{{-- <x-admin-app-layout :title="'Quotation :-' . $rfq_details->rfq_code"> --}}
<x-admin-app-layout>
    <div class="bg-white d-flex align-items-center justify-content-center">
        <div class="px-0 container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="my-10 mt-5 text-start">
                        <h1 class="mb-0 rfq-title fw-bold text-primary">
                            RFQ-280525-2
                        </h1>
                        <div class="mt-2 text-primary">
                            <p class="mb-0">Akash Mirza | Sales Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="my-10 mt-5 text-end">
                        <span class="fw-bold">Client Type:
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#clientTYpe"
                                class="p-2 text-center btn btn-secondary">
                                <i class="fas fa-user-tie fs-3 ps-1"></i>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="my-4 col-lg-4">
                    <div class="row g-2 rounded-3">
                        <div class="mt-0 col-lg-3">
                            <select class="bg-white form-select form-select-sm" data-control="select2"
                                data-placeholder="Country" style="font-size: 12px">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div>
                        <div class="mt-0 col-lg-3">
                            <select class="bg-white form-select form-select-sm" data-control="select2"
                                data-placeholder="Region">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div>
                        <div class="mt-0 col-lg-3">
                            <select class="bg-white form-select form-select-sm" data-control="select2"
                                data-placeholder="Currency">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div>
                        <div class="mt-0 col-lg-3">
                            <div>
                                <input type="email" class="bg-white border form-control form-control-sm"
                                    placeholder="Currency Ratio"
                                    style="
                                  font-size: 12px;
                                  border: 1px solid #e4e6ef !important;
                                " />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Empty Column Start-->
                {{-- <div class="col-lg-4"></div>
                <div class="col-lg-1"></div>
                <div class="mt-4 col-lg-3 text-end"></div>
                <div class="mt-0 col-lg-4"></div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4"></div> --}}
                <!-- Empty Column End-->
                <div class="mt-8 col-lg-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <ul class="border-0 nav nav-tabs nav-line-tabs nav-stretch fs-6 justify-content-start">
                            <li class="nav-item">
                                <a class="nav-link bypass-nav active" data-bs-toggle="tab" href="#costGood">Cost Of
                                    Good</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bypass-nav" data-bs-toggle="tab" href="#quotation">Quotation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bypass-nav" data-bs-toggle="tab" href="#source">Source</a>
                            </li>
                        </ul>
                        <div>
                            <div class="text-end d-flex align-items-center justify-content-end">
                                <div class="form-check d-flex justify-content-end align-items-center">
                                    <label class="form-check-label me-10 text-danger" for="flexCheckVAT">
                                        VAT/GST
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckVAT" />
                                </div>

                                <div class="form-check d-flex justify-content-end align-items-center">
                                    <label class="form-check-label me-10 pe-2 text-danger" for="flexCheckDiscount">
                                        <span title="Special Discount">Special Discount</span>
                                    </label>
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDiscount" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-0 shadow-none card rounded-0">
                        <div class="p-0 card-body">
                            <div class="tab-content" id="myTabContent">
                                <!-- COG Start -->
                                <div class="tab-pane fade show active" id="costGood" role="tabpanel">
                                    <div id="kt_docs_repeater_basic">
                                        <div class="border table-responsive">
                                            <table class="table mb-0 table-bordered">
                                                <thead class="">
                                                    <tr class="text-center text-white fw-bold fs-6">
                                                        <th width="3%" style="background-color: #0b6476">
                                                            <a href="javascript:;" data-repeater-create><i
                                                                    class="text-white fas fa-plus"></i></a>
                                                        </th>
                                                        <th width="3%" class="text-white"
                                                            style="
                                              background-color: #0b6476;
                                              border-right: 1px solid #0b6476;
                                            ">
                                                            Sl
                                                        </th>
                                                        <th width="14%" class="text-white text-start"
                                                            style="background-color: #0b6476d7">
                                                            Item
                                                        </th>
                                                        <th width="4%" class="text-white"
                                                            style="background-color: #0b6476d7">
                                                            Qty
                                                        </th>
                                                        <th width="7%" class="text-white"
                                                            style="background-color: #0b6476d7">
                                                            Pr. Cost
                                                        </th>
                                                        <th width="7%" class="text-white"
                                                            style="background-color: #0b6476d7;border-right: 1px solid #0b6476;">
                                                            Total
                                                        </th>
                                                        <th width="6%" class="text-white"
                                                            style="background-color: #0b6476d7">
                                                            Office
                                                        </th>
                                                        <th width="6%" class="text-white"
                                                            style="background-color: #0b6476d7">
                                                            Profit
                                                        </th>
                                                        <th width="6%" class="text-white"
                                                            style="background-color: #0b6476d7;border-right: 1px solid #0b6476;">
                                                            Others
                                                        </th>
                                                        <th width="6%" class="text-white"
                                                            style="background-color: #0b6476d7">
                                                            Remittance
                                                        </th>
                                                        <th width="6%" class="text-white"
                                                            style="background-color: #0b6476d7">
                                                            Packing
                                                        </th>
                                                        <th width="6%" class="text-white"
                                                            style="background-color: #0b6476d7">
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
                                                        <th width="12%" class="text-white" colspan="2"
                                                            style="background-color: #0b6476">
                                                            Grand Total (In TK)
                                                        </th>
                                                    </tr>
                                                    <tr style="background-color: #f8fafb;border: 0;">
                                                        <th colspan="2" class="p-1 py-1 text-center vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                        </th>
                                                        <th class="text-center"
                                                            style="border-right: 1px solid #0b64763d;" colspan="4">
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 office_cost_percentage percentage"
                                                                    name="office_cost_percentage" type="text"
                                                                    step="0.01" value="10" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 profit_percentage percentage"
                                                                    name="profit_percentage" type="text"
                                                                    step="0.01" value="10" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 others_cost_percentage percentage"
                                                                    name="others_cost_percentage" type="text"
                                                                    step="0.01" value="10" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 remittence_percentage percentage"
                                                                    name="remittance_percentage" type="text"
                                                                    step="0.01" value="1" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 packing_percentage percentage"
                                                                    name="packing_percentage" type="text"
                                                                    step="0.01" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 custom_percentage percentage"
                                                                    name="custom_percentage" type="text"
                                                                    step="0.01" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm"
                                                            style=" border-right: 1px solid #0b64763d;">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center">
                                                                <input
                                                                    class="p-1 text-center bg-transparent border-0 form-control form-control-sm w-50 tax_vat_percentage percentage"
                                                                    name="tax_vat_percentage" type="text"
                                                                    step="0.01" value="8" placeholder="0" />
                                                                <p class="m-0 ms-1">%</p>
                                                            </div>
                                                        </th>
                                                        <th class="p-1 py-1 text-center border-b vm"
                                                            style="border-left: 1px solid #0b64763d;">
                                                            Tk
                                                        </th>
                                                        <th class="p-1 py-1 text-center border-b vm"
                                                            style="border-left: 1px solid #0b64763d;">
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
                                                        <td class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
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
                                                        <td class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
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
                                                        <td class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
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
                                                        <td class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <input type="text" name="unit_tax_vat"
                                                                class="text-center bg-white border-0 form-control form-control-sm table-inp rfqcalculationinput"
                                                                value="0" placeholder="0" />
                                                        </td>
                                                        <td class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
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
                                                        <th colspan="2" class="p-1 py-1 text-center vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <!-- Empty Table Col -->
                                                        </th>
                                                        <th class="p-1 px-4 py-1 vm text-start" colspan="3">
                                                            Grand Total:
                                                        </th>
                                                        <th class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <input type="text" name="total_principal_amount"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm">
                                                            <input type="text" name="total_office_cost"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm">
                                                            <input type="text" name="total_profit"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <input type="text" name="total_others_cost"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm">
                                                            <input type="text" name="total_remittance"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm">
                                                            <input type="text" name="total_packing"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm">
                                                            <input type="text" name="total_customs"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <input type="text" name="total_tax"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 vm"
                                                            style="border-right: 1px solid #0b64763d;">
                                                            <input type="text" name="total_subtotal"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                        <th class="p-1 py-1 text-center vm">
                                                            <span class="text-center">-</span>
                                                        </th>
                                                        <th class="p-1 py-1 vm" colspan="2">
                                                            <input type="text" name="total_final_total_price"
                                                                style="background-color: #ebebeb"
                                                                class="text-center form-control form-control-sm rfqcalculationinput"
                                                                value="0" />
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- COG end -->
                                <!-- Quotation Start -->
                                <div class="shadow-none tab-pane fade" id="quotation" role="tabpanel">
                                    <div class="mt-0">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="border d-flex justify-content-center">
                                                    <div class="pdf-container-qt">
                                                        <!-- Header-qt -->
                                                        <div class="header-qt">
                                                            <div class="header-qt-content">
                                                                <div>
                                                                    <img src="{{ asset('frontend/images/logo_black.png') }}"
                                                                        alt="Logo" style="height: 40px" />
                                                                </div>
                                                                <div>
                                                                    <h1 class="text-white price_title">
                                                                        Price Quotation
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Content-qt -->
                                                        <div class="pb-0 content-qt">
                                                            <table class="content-qt-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="border-bottom: 0;padding:0;"
                                                                            class="w-65">
                                                                            <input class="p-0 border-0 w-100 fw-bold"
                                                                                name="company_name" type="text"
                                                                                value="NGen IT" />
                                                                        </th>
                                                                        <th
                                                                            style="border: 0;padding: 0;font-weight: 500;">
                                                                            <input class="border-0 w-100"
                                                                                name="pq_code" type="text"
                                                                                value="PQ#: NG-BD/Genexis/RV/231021" />
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            style="border: 0;padding: 0;padding-top: 5px;font-weight: normal;">
                                                                            <input class="border-0 w-100"
                                                                                name="name" type="text"
                                                                                value="Akash Mirza" />
                                                                        </th>
                                                                        <th
                                                                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            <input class="border-0 w-100"
                                                                                name="date" type="text"
                                                                                value="Date: 16 / 08 / 24" />
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            <input class="border-0 w-100"
                                                                                name="email" type="text"
                                                                                value="henry.lester28@gmail.com" />
                                                                        </th>
                                                                        <th
                                                                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            <input class="border-0 w-100"
                                                                                name="pqr_code" type="text"
                                                                                value="PQR#: MEO-P021(T10)-W(L1)" />
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            <input class="border-0 w-100"
                                                                                name="phone" type="text"
                                                                                value="+018515-912415" />
                                                                        </th>
                                                                        <th
                                                                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            <input class="border-0 w-100"
                                                                                name="customer_type" type="text"
                                                                                value="Customer Type: Anonymous" />
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <!-- Additional Content-qt Table -->
                                                            <table class="content-qt-table table-two"
                                                                style="margin-top: 40px;border: 1px solid #eee;">
                                                                <thead style="background-color: #f0f0f0;">
                                                                    <tr>
                                                                        <th class="table-two-th-qt">
                                                                            Sl
                                                                        </th>
                                                                        <th class="table-two-th-qt">
                                                                            PRODUCT NAME
                                                                        </th>
                                                                        <th class="table-two-th-qt"
                                                                            style="text-align: center">
                                                                            QTY
                                                                        </th>
                                                                        <th class="table-two-th-qt"
                                                                            style="text-align: end">
                                                                            UNIT PRICE
                                                                        </th>
                                                                        <th class="table-two-th-qt"
                                                                            style="text-align: end">
                                                                            (TK) TOTAL
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>
                                                                            <input class="border-0 w-100"
                                                                                name="product_name" type="text"
                                                                                value="Honeywell ML8824 Linear Valve Actuator" />
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <input class="text-center border-0 w-100"
                                                                                name="product_qty" type="text"
                                                                                value="0" />
                                                                        </td>
                                                                        <td style="text-align: end">
                                                                            <input class="border-0 w-100 text-end"
                                                                                name="product_price" type="text"
                                                                                value="0.00" />
                                                                        </td>
                                                                        <td style="text-align: end">
                                                                            Tk. 0.00
                                                                        </td>
                                                                    </tr>
                                                                    {{-- Extra Row Start --}}
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>
                                                                            <input class="border-0 w-100"
                                                                                name="product_name" type="text"
                                                                                value="Honeywell ML8824 Linear Valve Actuator" />
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <input class="text-center border-0 w-100"
                                                                                name="product_qty" type="text"
                                                                                value="0" />
                                                                        </td>
                                                                        <td style="text-align: end">
                                                                            <input class="border-0 w-100 text-end"
                                                                                name="product_price" type="text"
                                                                                value="0.00" />
                                                                        </td>
                                                                        <td style="text-align: end">
                                                                            Tk. 0.00
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>
                                                                            <input class="border-0 w-100"
                                                                                name="product_name" type="text"
                                                                                value="Honeywell ML8824 Linear Valve Actuator" />
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <input class="text-center border-0 w-100"
                                                                                name="product_qty" type="text"
                                                                                value="0" />
                                                                        </td>
                                                                        <td style="text-align: end">
                                                                            <input class="border-0 w-100 text-end"
                                                                                name="product_price" type="text"
                                                                                value="0.00" />
                                                                        </td>
                                                                        <td style="text-align: end">
                                                                            Tk. 0.00
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            style="text-align: end;font-weight: 400;font-size: 12px;">
                                                                            SPECIAL DISCOUNT
                                                                        </td>
                                                                        <td
                                                                            style="text-align: end;font-weight: 400;font-size: 12px;">
                                                                            Tk. 0.00
                                                                        </td>
                                                                    </tr>
                                                                    {{-- Extra Row End --}}
                                                                    <tr style="background-color: #eee">
                                                                        <td colspan="4"
                                                                            style="text-align: end;font-weight: 500;">
                                                                            GRAND TOTAL
                                                                        </td>
                                                                        <td style="text-align: end;font-weight: 500;">
                                                                            Tk. 0.00
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <div id="terms">
                                                                <div class="content-qt"
                                                                    style="border: 0;padding-top: 10px;padding-bottom: 0px !important;padding-left: 0;padding-right: 0;">
                                                                    <table class="content-qt-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    style="border: 0;padding: 0;text-align: center;font-weight: 500;padding-bottom: 10px;">
                                                                                    <input
                                                                                        class="text-center border-0 w-100"
                                                                                        name="gst" type="text"
                                                                                        value="GST - 8% Not included. It may apply." />
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="p-0 border d-flex align-items-center"
                                                                                    style="border: 0;padding: 0;text-align: start;font-weight: 500;padding: 5px;">
                                                                                    <div class="px-3 py-2"
                                                                                        style=" background-color: #f0f0f0; ">
                                                                                        <a href="javascript:;"
                                                                                            data-repeater-create>
                                                                                            <i
                                                                                                class="fas fa-plus"></i></a>
                                                                                    </div>
                                                                                    <input
                                                                                        class="py-2 text-center border-0 w-100 fw-bold"
                                                                                        style=" background-color: #f0f0f0; "
                                                                                        name="gst" type="text"
                                                                                        value="Terms & Conditions" />
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <table class="content-qt-table table-two"
                                                                    style="margin-top: 5px;border: 0px solid #eee;">
                                                                    <tbody data-repeater-list="terms">
                                                                        <tr data-repeater-item
                                                                            style="border-bottom: 1px solid #eee;">
                                                                            <td class="border-0">
                                                                                <a href="javascript:;"
                                                                                    data-repeater-delete><i
                                                                                        class="border-0 fa-regular fa-trash-can text-danger"></i></a>
                                                                            </td>
                                                                            <td
                                                                                style="width: 95%;font-size: 12px;padding: 5px;border: 0;">
                                                                                <input
                                                                                    class="border-0 w-100 text-start"
                                                                                    name="terms_info" type="text"
                                                                                    value="Validity : Valid till 7 days from PQ. Offer may change on the bank forex rate or stock availability" />
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- Additional Content-qt Table -->
                                                            <table class="content-qt-table table-two"
                                                                style="margin-top: 15px">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="6"
                                                                            style="padding: 0;border: 0;text-align: end;font-weight: 500;padding-bottom: 8px;">
                                                                            <input
                                                                                class="border-0 fw-bold w-100 text-end"
                                                                                name="authorized_brands"
                                                                                type="text"
                                                                                value="Authorized Brands" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tbody style="background-color: #f0f0f0;">
                                                                    <tr style="padding: 7px">
                                                                        <td class="table-two-th-qt">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-left: 15px" />
                                                                        </td>
                                                                        <td class="table-two-th-qt">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt="" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: center;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt="" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt="" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt="" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="padding: 7px">
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                        <td class="table-two-th-qt"
                                                                            style="text-align: end;">
                                                                            <img class="p-2 img-fluid"
                                                                                src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                                                                alt=""
                                                                                style="padding-right: 15px;" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- Additional Content-qt Table -->
                                                            <div style="display: flex;align-items: center;">
                                                                <table class="content-qt-table"
                                                                    style="margin-top: 25px;width: 75%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: 600;padding-top: 5px;">
                                                                                <input class="border-0 w-100 fw-bold"
                                                                                    name="sales_manager"
                                                                                    type="text"
                                                                                    value="Adan Mahmud | Sr. Manager" />
                                                                            </th>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                                <input class="border-0 w-100 fw-bold"
                                                                                    name="sales_manager_email"
                                                                                    type="text"
                                                                                    value="sales@ngenitltd.com, (Business)" />
                                                                            </th>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                                <input class="border-0 w-100 fw-bold"
                                                                                    name="sales_manager_email"
                                                                                    type="text"
                                                                                    value="+10917-720-3065" />
                                                                            </th>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                                                                <!-- Empty Table Head -->
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                                <table class="content-qt-table"
                                                                    style="margin-top: 15px;width: 25%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                style="border: 0;padding: 0;font-weight: 500;padding-top: 5px;">
                                                                                <div style="text-align: center;">
                                                                                    <h3
                                                                                        style="margin-bottom: 0;padding-bottom: 0;">
                                                                                        <input
                                                                                            class="border-0 w-100 fw-bold"
                                                                                            style="color: #ae0a46;"
                                                                                            name="company_name"
                                                                                            type="text"
                                                                                            value="NGEN PTE. LTd." />
                                                                                    </h3>
                                                                                    <p
                                                                                        style="margin: 0;padding-bottom: 0;">
                                                                                        <input
                                                                                            class="border-0 w-100 fw-bold"
                                                                                            name="company_reg_no"
                                                                                            type="text"
                                                                                            value="Reg-No: 20434861K" />
                                                                                    </p>
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <!-- Footer-qt -->
                                                        <div class="footer-qt">
                                                            <p style="padding: 0; margin: 10px">
                                                                <a class="footer-qt-link-qt" href="javascript:;">
                                                                    <input
                                                                        class="text-center text-white bg-transparent border-0 w-100 fw-bold"
                                                                        name="company_address" type="text"
                                                                        value="10, Anson Road, #21-07, International Plaza, Singapore 079903 | www. ngenitltd.com" />
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div class="mt-10 d-flex justify-content-center">
                                                            <div>
                                                                <div class="form-check d-flex justify-content-center">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="checkDefault" />
                                                                    <label class="form-check-label ps-3"
                                                                        for="checkDefault">
                                                                        Send Quotation With Attachment
                                                                    </label>
                                                                </div>
                                                                <div class="mt-5">
                                                                    <a href=""
                                                                        class="btn btn-sm fw-bold btn-primary"><i
                                                                            class="fas fa-file-lines"></i>
                                                                        Send Quotation</a>
                                                                    <a href=""
                                                                        class="btn btn-sm fw-bold btn-primary"><i
                                                                            class="fab fa-whatsapp"></i>
                                                                        Share On What's App</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Quotation End -->
                                    </div>
                                </div>
                                <!-- Quotation End -->
                                <!-- Source Start -->
                                <div class="tab-pane fade" id="source" role="tabpanel">
                                    <div class="border table-responsive">
                                        <table class="table mb-0">
                                            <thead class="bg-primary">
                                                <tr class="text-center text-white fw-bold fs-6">
                                                    <th scope="col">Sl</th>
                                                    <th class="text-start">Item</th>
                                                    <th>Source One</th>
                                                    <th>Source One Price</th>
                                                    <th>One Price Status</th>
                                                    <th>Source Two</th>
                                                    <th>Source Two Price</th>
                                                    <th>Two Price Status</th>
                                                    <!-- New Column -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>1</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Honeywell
                                                            ML8824 Linear Valve
                                                            Actuator</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                    <!-- Difference -->
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>2</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Siemens
                                                            GND121.1A Damper
                                                            Actuator</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>3</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>4</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>5</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>6</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>7</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>8</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>9</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                                <tr class="text-center tb-b-bottom">
                                                    <td>10</td>
                                                    <td class="text-start">
                                                        <a href="#" title="Belimo R2025-3P Ball Valve">Belimo
                                                            R2025-3P Ball Valve</a>
                                                    </td>
                                                    <td>Supplier A</td>
                                                    <td>$320</td>
                                                    <td>
                                                        $320
                                                        <i class="text-danger fas fa-arrow-down-short-wide"></i>
                                                    </td>
                                                    <td>Supplier B</td>
                                                    <td>$315</td>
                                                    <td>
                                                        $320
                                                        <i class="text-success fas fa-arrow-up-short-wide"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Source end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Type Modal Start -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="clientTYpe" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="text-white modal-title" id="modalTitleId">
                        Account Create For Partner Or Client
                    </h5>
                    <button type="button" class="text-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-4 col-lg-12">
                            <p for="" class="text-primary">Register account as :</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="" id="create_client"
                                    name="radio2" />
                                <label class="form-check-label" for="create_client">
                                    Create As Client.
                                </label>
                            </div>
                            <div class="mt-4 form-check">
                                <input class="form-check-input" type="radio" value="" id="create_partner"
                                    name="radio2" checked="" />
                                <label class="form-check-label" for="create_partner">
                                    Create As Partner.
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-4">
                                <input type="text" class="bg-white border fs-12 form-control form-control-sm"
                                    placeholder="Name" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-4">
                                <input type="email" class="bg-white border fs-12 form-control form-control-sm"
                                    placeholder="Email" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-4">
                                <input type="text" class="bg-white border fs-12 form-control form-control-sm"
                                    placeholder="Phone" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-4">
                                <input type="company_name" class="bg-white border fs-12 form-control form-control-sm"
                                    placeholder="Company Name" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-5 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Type Modal End -->

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
    </div>
</x-admin-app-layout>
