@extends('admin.master')

@section('content')
    <style>
        .table>:not(caption)>*>* {
            padding: 5px;
        }

        @media only screen and (max-width: 767px) {
            .table>:not(caption)>*>* {
                padding: 5px;
                font-size: 9px;
            }


            .rfq-tabs-link {
                font-size: 10px;
            }

            .fa-gear {
                font-size: 10.1px !important;
                padding: 3px;
            }

            .form-control-sm {
                padding: 0px 0px !important;
                font-size: 10px;
            }

            .rfqcalculationinput {
                font-size: 10px;
            }

            .form-setting {
                padding: 0px 40px !important;
            }

            .form-select {
                font-size: 12px !important;
                height: 25px !important;
                padding: 0px 0px 0px 20px !important;
                border-radius: 2px !important;
                width: 130px;
            }

            .qutatation-form {
                border-collapse: collapse !important;
                width: 100% !important;
                margin: auto !important;
                background-color: #f4f4f4 !important;
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px !important;
            }

            .table-title-font {
                font-size: 10px;
            }

        }

        .content-table {
            width: 22rem;
        }

        @media only screen and (max-width: 768px) {

            html,
            body {
                width: 100%;
                overflow-x: hidden;
            }

            .content-table {
                width: 0 !important;
            }

            .icons-area {
                width: 55%;
            }

            .icons-input {
                width: auto;
            }
            .rfqs-btns{
                font-size: 8px !important;
            }
        }
    </style>
    <div class="card-body p-lg-4 p-0" style="overflow: hidden">
        <!-- Nav tabs -->
        <div class="text-center">
            <h3 class="mb-0 py-2">Bypass Process</h3>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-center align-items-center border-0" id="myTab" role="tablist">
            <li class="nav-item mb-0" role="presentation">
                <button class="nav-link rfq-tabs-link" id="quotation-tab" data-bs-toggle="tab" data-bs-target="#quotation"
                    type="button" role="tab" aria-controls="quotation" aria-selected="true">
                    Quotation
                </button>
            </li>
            <li class="nav-item mb-0" role="presentation">
                <button class="nav-link rfq-tabs-link active" id="cog-tab" data-bs-toggle="tab" data-bs-target="#cog"
                    type="button" role="tab" aria-controls="cog" aria-selected="false">
                    Cost Of Goods
                </button>
            </li>
            <li class="nav-item mb-0" role="presentation">
                <button class="nav-link rfq-tabs-link" id="source-tab" data-bs-toggle="tab" data-bs-target="#source"
                    type="button" role="tab" aria-controls="source" aria-selected="false">
                    Source
                </button>
            </li>
            <li class="nav-item mb-0 ms-2" role="presentation">
                <button class="nav-link rfq-tabs-link bg-black" id="setting">
                    <i class="fa-solid fa-gear" style="font-size: 23.6px;"></i>
                </button>
            </li>
        </ul>
        <form id="quotationForm" action="{{route('rfq-manage.store')}}" method="POST" enctype="multipart/form-data" style="overflow-x: none">
            @csrf
            <input type="hidden" name="rfq_id" value="{{ $rfq_details->id }}">
            <input type="hidden" name="rfq_code" value="{{ $rfq_details->rfq_code }}">
            <div id="mysetting">
                @include('admin.pages.singleRfq.partials.bypass_setting')
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
                    @include('admin.pages.singleRfq.partials.bypass_quotation')
                </div>
                <div class="tab-pane show active" id="cog" role="tabpanel" aria-labelledby="cog-tab">
                    @include('admin.pages.singleRfq.partials.bypass_cog')
                </div>
        </form>
        <div class="tab-pane" id="source" role="tabpanel" aria-labelledby="source-tab">
            @include('admin.pages.singleRfq.partials.bypass_source')
        </div>
    </div>

    </div>
@endsection
@once
    @push('scripts')
        <script>
            $(document).ready(function() {
                var quotationForm = $('#quotationForm');

                // Function to update currency field
                function updateCurrency(currencyValue) {
                    var currencyMap = {
                        'taka': 'TK',
                        'dollar': '$',
                        'euro': '&euro;',
                        'pound': '&pound;'
                    };
                    var currency = currencyMap[currencyValue] || 'TK';
                    $('.currency').html(currency); // Update the currency input field
                }

                // Update currency on currency select change
                quotationForm.find('select[name="currency"]').on('change', function() {
                    updateCurrency($(this).val());
                });

                // Initially set currency
                updateCurrency($('select[name="currency"]').val());

                // Function to update pq_code field
                function updatePQCode(countryValue) {
                    var pq_code = countryValue ? "PQ#: NG-" + countryValue : "PQ#: NG-";
                    $('input[name="pq_code"]').val(pq_code); // Update the pq_code input field
                }

                // Update pq_code on country select change
                quotationForm.find('select[name="country"]').on('change', function() {
                    updatePQCode($(this).val());
                });

                // Initially set pq_code
                updatePQCode($('select[name="country"]').val());

                // Show/hide VAT display if already checked


                // // Toggle VAT display
                // quotationForm.find('input[name="vat_display"]').on('click', function() {
                //     $('.vat_display').toggle($(this).is(":checked"));
                // }).trigger('click'); // Trigger click event on page load

                // // Toggle special discount display
                // quotationForm.find('input[name="special_discount_display"]').on('click', function() {
                //     $('.special_discount').toggle($(this).is(":checked"));
                // }).trigger('click'); // Trigger click event on page load

                // Update company name and registration number based on region
                quotationForm.find('select[name="region"]').on('change', function() {
                    var regionValue = $(this).val();
                    var companyInfoMap = {
                        'bangladesh': {
                            name: "NGEN IT LTD.",
                            registration_number: "C-193116/2024"
                        },
                        'singapore': {
                            name: "NGEN IT PTE. LTD.",
                            registration_number: "REG-NO: 20437861K"
                        }
                    };
                    var companyInfo = companyInfoMap[regionValue] || {
                        name: "NGEN IT LTD.",
                        registration_number: "C-193116/2024"
                    };
                    $('input[name="ngen_company_name"]').val(companyInfo.name);
                    $('input[name="ngen_company_registration_number"]').val(companyInfo.registration_number);
                });
            });
        </script>

        <script>
            function toggleVisibility() {
                var settingShow = document.getElementById('setting-show');
                var button = document.getElementById('setting');
                if (settingShow.classList.contains('show')) {
                    settingShow.classList.remove('show');
                    // Delay setting display to 'none' to allow transition to complete
                    setTimeout(function() {
                        settingShow.style.display = 'none';
                        button.classList.remove('active');
                    }, 500); // Duration should match the transition time
                } else {
                    settingShow.style.display = 'block';
                    // Trigger reflow to ensure the transition occurs
                    settingShow.offsetHeight; // Force reflow
                    settingShow.classList.add('show');
                    button.classList.add('active');
                }
            }

            document.getElementById('setting').addEventListener('click', toggleVisibility);
        </script>

        <script>
            $(document).ready(function() {
                var quotationForm = $('#quotationForm');

                function calculateTotals() {
                    var currency_rate = $("input[name='currency_rate']").val() || 1;
                    var office_cost_percentage = $("input[name='office_cost_percentage']").val();
                    var profit_percentage = $("input[name='profit_percentage']").val();
                    var others_cost_percentage = $("input[name='others_cost_percentage']").val();
                    var remittence_percentage = $("input[name='remittence_percentage']").val();
                    var packing_percentage = $("input[name='packing_percentage']").val();
                    var custom_percentage = $("input[name='custom_percentage']").val();
                    var tax_vat_percentage = $("input[name='tax_vat_percentage']").val() / 100 || 0;
                    var vat_percentage = $("input[name='vat_percentage']").val();
                    var special_discount_percentage = $("input[name='special_discount_percentage']").val();

                    var sub_total_principal_amount = 0;
                    var sub_total_office_cost = 0;
                    var sub_total_profit = 0;
                    var sub_total_others_cost = 0;
                    var sub_total_remittance = 0;
                    var sub_total_packing = 0;
                    var sub_total_customs = 0;
                    var sub_total_tax = 0;
                    var sub_total_subtotal = 0;
                    var sub_total_final_total_price = 0;

                    $('tbody.table_bottom_area tr.thd').each(function(index) {
                        var product_name = $("input[name='product_name[]']", this).val();
                        var principal_cost = $("input[name='principal_cost[]']", this).val();
                        var qty = $("input[name='qty[]']", this).val();

                        var unit_cost_total = (qty * 1) * (principal_cost * 1);
                        var principal_unit_total_amount = unit_cost_total * currency_rate;
                        var office_cost = principal_unit_total_amount * (office_cost_percentage / 100);
                        var profit = principal_unit_total_amount * (profit_percentage / 100);
                        var others_cost = principal_unit_total_amount * (others_cost_percentage / 100);
                        var unit_remittance = principal_unit_total_amount * (remittence_percentage / 100);
                        var unit_packing = principal_unit_total_amount * (packing_percentage / 100);
                        var unit_customs = principal_unit_total_amount * (custom_percentage / 100);
                        var eu_total = principal_unit_total_amount + office_cost + profit + others_cost +
                            unit_remittance + unit_packing + unit_customs;
                        var unit_tax_vat = eu_total * tax_vat_percentage;

                        var unit_subtotal = principal_unit_total_amount + office_cost + profit +
                            others_cost + unit_remittance + unit_packing + unit_customs + unit_tax_vat;

                        var unit_final_price = unit_subtotal / qty;
                        var unit_final_total_price = unit_subtotal;

                        sub_total_principal_amount += isNaN(principal_unit_total_amount) ? 0 :
                            principal_unit_total_amount;
                        sub_total_office_cost += isNaN(office_cost) ? 0 : office_cost;
                        sub_total_profit += isNaN(profit) ? 0 : profit;
                        sub_total_others_cost += isNaN(others_cost) ? 0 : others_cost;
                        sub_total_remittance += isNaN(unit_remittance) ? 0 : unit_remittance;
                        sub_total_packing += isNaN(unit_packing) ? 0 : unit_packing;
                        sub_total_customs += isNaN(unit_customs) ? 0 : unit_customs;
                        sub_total_tax += isNaN(unit_tax_vat) ? 0 : unit_tax_vat;
                        sub_total_subtotal += isNaN(unit_subtotal) ? 0 : unit_subtotal;
                        sub_total_final_total_price += isNaN(unit_subtotal) ? 0 : unit_subtotal;

                        $('input[name="unit_final_price[]"]').eq(index).val(unit_final_price.toFixed(2));
                        $('input[name="unit_final_total_price[]"]').eq(index).val(unit_final_price.toFixed(2));

                        $(this).find("input[name='principal_unit_total_amount[]']").val(Math.round(
                            principal_unit_total_amount));
                        $(this).find("input[name='unit_office_cost[]']").val(Math.round(office_cost));
                        $(this).find("input[name='unit_profit[]']").val(Math.round(profit));
                        $(this).find("input[name='unit_others_cost[]']").val(Math.round(others_cost));
                        $(this).find("input[name='unit_remittance[]']").val(Math.round(unit_remittance));
                        $(this).find("input[name='unit_packing[]']").val(Math.round(unit_packing));
                        $(this).find("input[name='unit_customs[]']").val(Math.round(unit_customs));
                        $(this).find("input[name='unit_tax_vat[]']").val(Math.round(unit_tax_vat));
                        $(this).find("input[name='unit_subtotal[]']").val(Math.round(unit_subtotal));
                        $(this).find("input[name='unit_final_price[]']").val(Math.round(unit_final_price));
                        $(this).find("input[name='unit_final_total_price[]']").val(Math.round(
                            unit_final_total_price));

                        var displayTableRow = $('#quotationTable tbody.quotationTable_area tr.tdsp').eq(index);
                        displayTableRow.find('input[name="quotation_product_name[]"]').val(product_name);
                        displayTableRow.find('input[name="quotation_qty[]"]').val(qty);
                        displayTableRow.find('input[name="quotation_unit_final_price[]"]').val(unit_final_price
                            .toFixed(2));
                        displayTableRow.find('input[name="quotation_unit_final_total_price[]"]').val(
                            unit_final_total_price.toFixed(2));
                    });

                    var special_discount_principal_amount = sub_total_principal_amount * (special_discount_percentage /
                        100);
                    var special_discount_office_cost = sub_total_office_cost * (special_discount_percentage / 100);
                    var special_discount_profit = sub_total_profit * (special_discount_percentage / 100);
                    var special_discount_others_cost = sub_total_others_cost * (special_discount_percentage / 100);
                    var special_discount_remittance = sub_total_remittance * (special_discount_percentage / 100);
                    var special_discount_packing = sub_total_packing * (special_discount_percentage / 100);
                    var special_discount_customs = sub_total_customs * (special_discount_percentage / 100);
                    var special_discount_tax = sub_total_tax * (special_discount_percentage / 100);
                    var special_discount_subtotal = sub_total_subtotal * (special_discount_percentage / 100);
                    var special_discount_final_total_price = sub_total_final_total_price * (
                        special_discount_percentage / 100);

                    var vat_principal_amount = special_discount_percentage > 0 ? special_discount_principal_amount * (
                        vat_percentage / 100) : sub_total_principal_amount * (vat_percentage / 100);
                    var vat_office_cost = special_discount_percentage > 0 ? special_discount_office_cost * (
                        vat_percentage / 100) : sub_total_office_cost * (vat_percentage / 100);
                    var vat_profit = special_discount_percentage > 0 ? special_discount_profit * (vat_percentage /
                        100) : sub_total_profit * (vat_percentage / 100);
                    var vat_others_cost = special_discount_percentage > 0 ? special_discount_others_cost * (
                        vat_percentage / 100) : sub_total_others_cost * (vat_percentage / 100);
                    var vat_remittance = special_discount_percentage > 0 ? special_discount_remittance * (
                        vat_percentage / 100) : sub_total_remittance * (vat_percentage / 100);
                    var vat_packing = special_discount_percentage > 0 ? special_discount_packing * (vat_percentage /
                        100) : sub_total_packing * (vat_percentage / 100);
                    var vat_customs = special_discount_percentage > 0 ? special_discount_customs * (vat_percentage /
                        100) : sub_total_customs * (vat_percentage / 100);
                    var vat_tax = special_discount_percentage > 0 ? special_discount_tax * (vat_percentage / 100) :
                        sub_total_tax * (vat_percentage / 100);
                    var vat_subtotal = special_discount_percentage > 0 ? special_discount_subtotal * (vat_percentage /
                        100) : sub_total_subtotal * (vat_percentage / 100);
                    var vat_final_total_price = special_discount_percentage > 0 ? special_discount_final_total_price * (
                        vat_percentage / 100) : sub_total_final_total_price * (vat_percentage / 100);

                    var total_principal_amount = sub_total_principal_amount + vat_principal_amount -
                        special_discount_principal_amount;
                    var total_office_cost = sub_total_office_cost + vat_office_cost - special_discount_office_cost;
                    var total_profit = sub_total_profit + vat_profit - special_discount_profit;
                    var total_others_cost = sub_total_others_cost + vat_others_cost - special_discount_others_cost;
                    var total_remittance = sub_total_remittance + vat_remittance - special_discount_remittance;
                    var total_packing = sub_total_packing + vat_packing - special_discount_packing;
                    var total_customs = sub_total_customs + vat_customs - special_discount_customs;
                    var total_tax = sub_total_tax + vat_tax - special_discount_tax;
                    var total_subtotal = sub_total_subtotal + vat_subtotal - special_discount_subtotal;
                    var total_final_total_price = sub_total_final_total_price + vat_final_total_price -
                        special_discount_final_total_price;

                    $('.special_discount_value').html(special_discount_percentage);
                    $('.vat_tax_value').html(vat_percentage);

                    $("input[name='sub_total_principal_amount']").val(Math.round(sub_total_principal_amount));
                    $("input[name='sub_total_office_cost']").val(Math.round(sub_total_office_cost));
                    $("input[name='sub_total_profit']").val(Math.round(sub_total_profit));
                    $("input[name='sub_total_others_cost']").val(Math.round(sub_total_others_cost));
                    $("input[name='sub_total_remittance']").val(Math.round(sub_total_remittance));
                    $("input[name='sub_total_packing']").val(Math.round(sub_total_packing));
                    $("input[name='sub_total_customs']").val(Math.round(sub_total_customs));
                    $("input[name='sub_total_tax']").val(Math.round(sub_total_tax));
                    $("input[name='sub_total_subtotal']").val(Math.round(sub_total_subtotal));
                    $("input[name='sub_total_final_total_price']").val(Math.round(sub_total_final_total_price));

                    $("input[name='special_discount_principal_amount']").val(Math.round(special_discount_principal_amount));
                    $("input[name='special_discount_office_cost']").val(Math.round(special_discount_office_cost));
                    $("input[name='special_discount_profit']").val(Math.round(special_discount_profit));
                    $("input[name='special_discount_others_cost']").val(Math.round(special_discount_others_cost));
                    $("input[name='special_discount_remittance']").val(Math.round(special_discount_remittance));
                    $("input[name='special_discount_packing']").val(Math.round(special_discount_packing));
                    $("input[name='special_discount_customs']").val(Math.round(special_discount_customs));
                    $("input[name='special_discount_tax']").val(Math.round(special_discount_tax));
                    $("input[name='special_discount_subtotal']").val(Math.round(special_discount_subtotal));
                    $("input[name='special_discount_final_total_price']").val(Math.round(
                        special_discount_final_total_price));

                    $("input[name='vat_principal_amount']").val(Math.round(vat_principal_amount));
                    $("input[name='vat_office_cost']").val(Math.round(vat_office_cost));
                    $("input[name='vat_profit']").val(Math.round(vat_profit));
                    $("input[name='vat_others_cost']").val(Math.round(vat_others_cost));
                    $("input[name='vat_remittance']").val(Math.round(vat_remittance));
                    $("input[name='vat_packing']").val(Math.round(vat_packing));
                    $("input[name='vat_customs']").val(Math.round(vat_customs));
                    $("input[name='vat_tax']").val(Math.round(vat_tax));
                    $("input[name='vat_subtotal']").val(Math.round(vat_subtotal));
                    $("input[name='vat_final_total_price']").val(Math.round(vat_final_total_price));

                    $("input[name='total_principal_amount']").val(Math.round(total_principal_amount));
                    $("input[name='total_office_cost']").val(Math.round(total_office_cost));
                    $("input[name='total_profit']").val(Math.round(total_profit));
                    $("input[name='total_others_cost']").val(Math.round(total_others_cost));
                    $("input[name='total_remittance']").val(Math.round(total_remittance));
                    $("input[name='total_packing']").val(Math.round(total_packing));
                    $("input[name='total_customs']").val(Math.round(total_customs));
                    $("input[name='total_tax']").val(Math.round(total_tax));
                    $("input[name='total_subtotal']").val(Math.round(total_subtotal));
                    $("input[name='total_final_total_price']").val(Math.round(total_final_total_price));
                }

                // Bind the event handler to the document and delegate to input fields
                $(document).on('keyup change', '#quotationForm input', function(event) {
                    calculateTotals();
                });
                document.querySelector('#quotationForm').addEventListener('keydown', function(event) {
                    if (event.keyCode === 13) {
                        event.preventDefault();
                    }
                });
                // Initial calculation on page load
                calculateTotals();
            });
        </script>



        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function addRfqCalculationTableRow() {
                const tableBody = document.querySelector('#myTable tbody.table_bottom_area');
                const tableBody2 = document.querySelector('#quotationTable tbody.quotationTable_area');

                const newRow = document.createElement('tr');
                const newRow2 = document.createElement('tr');
                newRow.classList.add('thd');
                newRow2.classList.add('tdsp');

                newRow.innerHTML = `
                    <td>
                        <a class="border-0 p-0 text-danger bg-transparent" onclick="deleteRfqCalculationRow(this)" title="Delete Row"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                    <td></td>
                    <td><input type="hidden" name="product_id[]" value="">
                        <input type="text" name="product_name[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" placeholder="Product Name" value=""></td>
                    <td><input type="text" name="qty[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="principal_cost[]" class="form-control form-control-sm bg-transparent rfqcalculationinput principal_cost" value="0"></td>
                    <td><input type="text" name="principal_unit_total_amount[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="unit_office_cost[]" class="form-control form-control-sm bg-transparent rfqcalculationinput principal_discount_amount" value="0"></td>
                    <td><input type="text" name="unit_profit[]" class="form-control form-control-sm bg-transparent rfqcalculationinput principal_unit_total_amount_taka" value="0"></td>
                    <td><input type="text" name="unit_others_cost[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="unit_remittance[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="unit_packing[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="unit_customs[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="unit_tax_vat[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td><input type="text" name="unit_subtotal[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td class="text-center"><input type="text" name="unit_final_price[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    <td class="text-center"><input type="text" name="unit_final_total_price[]" class="form-control form-control-sm bg-transparent rfqcalculationinput" value="0"></td>
                    `;

                newRow2.innerHTML = `
                    <td></td>
                    <td><input type="text" name="quotation_product_name[]" class="form-control form-control-sm bg-transparent text-start" placeholder="Product Name" value=""></td>
                    <td><input type="text" name="quotation_qty[]" class="form-control form-control-sm bg-transparent text-center" value="0"></td>
                    <td class="text-center"><input type="text" name="quotation_unit_final_price[]" class="form-control form-control-sm bg-transparent text-center" value="0"></td>
                    <td class="text-center"><input type="text" name="quotation_unit_final_total_price[]" class="form-control form-control-sm bg-transparent text-center" value="0"></td>
                    `;

                tableBody.appendChild(newRow);
                tableBody2.appendChild(newRow2);

                updateSerialNumbers();
            }

            function deleteRfqCalculationRow(element, productId) {
                $.ajax({
                    url: '{{ route('delete.quotationProduct', ':productId') }}'.replace(':productId', productId),
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Remove the row from the HTML table
                            const row = element.closest('tr');
                            row.remove();
                            updateSerialNumbers();
                        } else {
                            console.error('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                    }
                });
            }

            function updateSerialNumbers() {
                // Implement the logic to update the serial numbers if needed.
            }



            function updateSerialNumbers() {
                const rows = document.querySelectorAll('#myTable tbody.table_bottom_area tr.thd');
                const rows2 = document.querySelectorAll('#quotationTable tbody.quotationTable_area tr.tdsp');

                rows.forEach((row, index) => {
                    row.querySelector('td:nth-child(2)').textContent = index + 1;
                });

                rows2.forEach((row2, index) => {
                    row2.querySelector('td:nth-child(1)').textContent = index + 1;
                });
            }

            $(document).ready(function() {
                // Add new row to terms table
                $('.terms_table').on('click', '.add-terms-row', function(e) {
                    e.preventDefault();
                    let termsRow = `
                    <tr>
                        <td style="text-align: center;">
                            <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <td style="width: 10%">
                            <input type="hidden" name="terms_id[]" value="">
                            <input type="text" name="terms_title[]" class="form-control form-control-sm bg-transparent text-start" value="" placeholder="Terms title">
                        </td>
                        <td>
                            <input type="text" name="terms_description[]" class="form-control form-control-sm bg-transparent" value="" placeholder="Terms description">
                        </td>
                    </tr>`;
                    $(this).closest('table').find('.terms_tbody').append(termsRow);
                });

                // Delete row from terms table
                $('.terms_table').on('click', '.delete-terms-row', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').remove();
                    termsId = $(this).data('id');
                    $.ajax({
                        url: '{{ route('delete.quotationTerms', ':termsId') }}'.replace(
                            ':termsId', termsId),
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                // Remove the row from the HTML table
                                const row = element.closest('tr');
                                row.remove();
                                updateSerialNumbers();
                            } else {
                                console.error('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                        }
                    });
                });
                updateSerialNumbers();
            });
        </script>

        {{-- <script>
            // $(document).on('keyup change', '#quotationForm input, #quotationForm select, #quotationForm textarea', function(e) {
            //     e.preventDefault();
            $(document).on('blur', '#quotationForm input, #quotationForm select, #quotationForm textarea', function(e) {
                e.preventDefault();

                var formElement = document.getElementById('quotationForm');
                var formData = new FormData(formElement);

                $.ajax({
                    url: '{{ route('rfq-manage.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            $('#mysetting').html(response.mysetting);
                            $('#quotation').html(response.quotation);
                            $('#cog').html(response.cog);
                        } else {
                            console.error('Quotation not saved.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        </script> --}}
        <script>
            var debounceTimer;

            $(document).on('input', '#quotationForm input, #quotationForm select, #quotationForm textarea', function() {
                clearTimeout(debounceTimer);
            });

            $(document).on('change', '#quotationForm input, #quotationForm select, #quotationForm textarea', function() {
                var currentElement = this;
                var focusedElementId = currentElement.id;
                var cursorPosition = currentElement.selectionStart;

                debounceTimer = setTimeout(function() {
                    submitQuotationForm(focusedElementId, cursorPosition);
                }, 500); // Adjust the delay as needed
            });

            function submitQuotationForm(focusedElementId, cursorPosition) {
                var formElement = document.getElementById('quotationForm');
                var formData = new FormData(formElement);

                $.ajax({
                    url: '{{ route('rfq-manage.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            $('#mysetting').html(response.mysetting);
                            $('#quotation').html(response.quotation);
                            $('#cog').html(response.cog);


                            updateVatDisplay();
                            updateSpecialDiscountDisplay();
                            // Use setTimeout to ensure the DOM is fully updated before restoring focus
                            setTimeout(function() {
                                var newElement = document.getElementById(focusedElementId);
                                if (newElement) {
                                    newElement.focus();
                                    newElement.setSelectionRange(cursorPosition, cursorPosition);
                                }
                            }, 0);
                        } else {
                            console.error('Quotation not saved.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        </script>
    @endpush
@endonce
