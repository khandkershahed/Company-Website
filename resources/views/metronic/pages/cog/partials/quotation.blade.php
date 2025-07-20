<div class="mt-0" class="qutatation-form">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="border d-flex justify-content-center">
                <div class="pdf-container-qt mt-10">
                    <!-- Header-qt -->
                    <div class="header-qt">
                        <div class="header-qt-content">
                            <div>
                                <img src="{{ asset('frontend/images/logo_black.png') }}" alt="Logo"
                                    style="height: 40px" />
                            </div>
                            <div class="text-center">
                                <h1 class="text-white price_title">
                                    <input type="text" name="quotation_title"
                                        class="text-center bg-transparent border-0 w-200px text-white"
                                        value="{{ $quotation->quotation_title ?? 'Price Quotation' }}">
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!-- Content-qt -->
                    <div class="pb-0 content-qt">
                        <table class="content-qt-table">
                            <thead>
                                <tr>
                                    <th style="border-bottom: 0;padding:0;" class="w-65">
                                        <input class="p-0 border-0 w-100 fw-bold" name="company_name" type="text"
                                            value="{{ $quotation->company_name ?? $rfq->company_name }}" />
                                    </th>
                                    <th style="border: 0;padding: 0;font-weight: 500;">
                                        <input class="border-0 w-100 pq_code" name="pq_code" type="text"
                                            value="{{ $quotation->pq_code ?? 'PQ#: NG-BD/Genexis/RV/231021' }}" />
                                    </th>
                                </tr>
                                <tr>
                                    <th style="border: 0;padding: 0;padding-top: 5px;font-weight: normal;">
                                        <input class="border-0 w-100" name="name" type="text"
                                            value="{{ $quotation->name ?? $rfq->name }}" />
                                    </th>
                                    <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        <input class="border-0 w-100" name="quotation_date" type="text"
                                            value="{{ $quotation->quotation_date ?? now()->format('d F Y') }}" />
                                    </th>
                                </tr>
                                <tr>
                                    <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        <input class="border-0 w-100" name="email" type="text"
                                            value="{{ $quotation->email ?? $rfq->email }}" />
                                    </th>
                                    <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        <input class="border-0 w-100" name="pqr_code" type="text"
                                            value="{{ $quotation->pqr_code ?? 'PQR#: MEO-P021(T10)-W(L1)' }}" />
                                    </th>
                                </tr>
                                <tr>
                                    <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        <input class="border-0 w-100" name="phone" type="text"
                                            value="{{ $quotation->phone ?? $rfq->phone }}" />
                                    </th>
                                    <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        {{-- C<input class="border-0 w-100" name="customer_type" type="text"
                                            value="Customer Type: Anonymous" /> --}}
                                        <span>Customer Type: {{ $rfq->client_type ?? 'Anonymous' }}</span>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <!-- Additional Content-qt Table -->
                        <table class="content-qt-table table-two" id="quotationTable"
                            style="margin-top: 40px;border: 1px solid #eee;">
                            <thead style="background-color: #f0f0f0;">
                                <tr>
                                    <th width="4%" class="table-two-th-qt">
                                        Sl
                                    </th>
                                    <th width="52%" class="table-two-th-qt">
                                        PRODUCT NAME
                                    </th>
                                    <th width="13%" class="table-two-th-qt" style="text-align: center">
                                        QTY
                                    </th>
                                    <th width="13%" class="table-two-th-qt" style="text-align: end">
                                        UNIT PRICE
                                    </th>
                                    <th width="20%" class="table-two-th-qt" style="text-align: end">
                                        (TK) TOTAL
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="quotationTable_area">
                                @foreach ($rfq->quotationProducts as $quotationproduct)
                                    <tr class="tdsp text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <input class="border-0 w-100" name="" type="text"
                                                value="{{ $quotationproduct->product_name }}" readonly/>
                                        </td>
                                        <td style="text-align: center">
                                            <input class="text-center border-0 w-100" name="" type="text"
                                                value="{{ $quotationproduct->qty }}" readonly/>
                                        </td>
                                        <td style="text-align: end">
                                            <input class="border-0 w-100 text-end" name="" type="text" readonly
                                                value="{{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}" />
                                        </td>
                                        <td style="text-align: end">
                                            {{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: end;font-weight: 400;font-size: 12px;">
                                        Sub Total
                                    </td>
                                    <td style="text-align: end;font-weight: 400;font-size: 12px;">
                                        <span class="currency"></span>
                                        {{ number_format(round((float) optional($quotation)->sub_total_final_total_price), 2) }}
                                    </td>
                                </tr>
                                @if (optional($quotation)->special_discount_display == '1')
                                    <tr>
                                        <td colspan="4" style="text-align: end;font-weight: 400;font-size: 12px;">
                                            SPECIAL DISCOUNT (<span
                                                class="special_discount_value">{{ optional($singleproduct)->special_discount_percentage }}</span>%)
                                        </td>
                                        <td style="text-align: end;font-weight: 400;font-size: 12px;">
                                            <span class="currency"></span>
                                            {{ round((float) optional($singleproduct)->special_discount_final_total_price) }}
                                        </td>
                                    </tr>
                                @endif
                                @if (optional($quotation)->vat_display == '1')
                                    <tr>
                                        <td colspan="4" style="text-align: end;font-weight: 400;font-size: 12px;">
                                            VAT/GST (<span
                                                class="vat_tax_value">{{ optional($singleproduct)->vat_percentage }}</span>
                                            %)
                                        </td>
                                        <td style="text-align: end;font-weight: 400;font-size: 12px;">
                                            <span class="currency"></span>
                                            {{ round((float) optional($singleproduct)->vat_final_total_price) }}
                                        </td>
                                    </tr>
                                @endif
                                {{-- @dd($quotation) --}}
                                {{-- Extra Row End --}}
                                <tr style="background-color: #eee">
                                    <td colspan="4" style="text-align: end;font-weight: 500;">
                                        GRAND TOTAL
                                    </td>
                                    <td style="text-align: end;font-weight: 500;">
                                        <span class="currency"></span>
                                        {{ number_format(round((float) optional($singleproduct)->total_final_total_price), 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div>
                            <div class="content-qt"
                                style="border: 0;padding-top: 10px;padding-bottom: 0px !important;padding-left: 0;padding-right: 0;">
                                <table class="w-100 text-center">
                                    <thead>
                                        <tr>
                                            <th
                                                style="border: 0;padding: 0;text-align: center;font-weight: 500;padding-bottom: 10px;">
                                                <div class="vat_display">
                                                    <input class="text-center border-0 w-100" name="vat_text"
                                                        type="text" placeholder="GST not included. It may apply."
                                                        value="{{ !empty($quotation->vat_text) ? $quotation->vat_text }}" />
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div id="terms">
                            <div class="content-qt"
                                style="border: 0;padding-top: 10px;padding-bottom: 0px !important;padding-left: 0;padding-right: 0;">
                                <table class="terms_table w-100">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">
                                                <a class="border-0 p-0 bg-transparent text-primary fa-solid fa-plus add-terms-row"
                                                    onclick="addTermsRow()"></a>
                                            </th>
                                            <th colspan="2" style="text-align: center;">
                                                <p class="mb-0 p-2">Terms & Conditions</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="terms_tbody">
                                        @if ($rfq_terms->isEmpty())
                                            <!-- Default rows -->
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Validity :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="Valid till 7 days from PQ. Offer may change on the bank forex rate or stock availability">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Payment :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="100% payment through EFTN/WT & hit in the NGen IT Limited account within 30 days of Delivery">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Product Mode :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="Product may take a certain time for Payment, Shipment, Delivery. In exception it may differ">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Delivery :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="4 business weeks upon receiving of WO. Extended time may require in any disaster issues">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Delivery Location :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="Via Email / Console Panel">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Product & Order :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="No Partial or Less volume Order is accepted. Order may reject or ask for alternative / changes if not available from mnfg.">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Warranty :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="Principal Standard Warranty for respective product">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                        onclick="deleteTermsRow(this)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="hidden" name="terms_id[]" value="">
                                                    <input type="text" name="terms_title[]"
                                                        class="form-control form-control-sm bg-transparent text-start"
                                                        value="Installation :">
                                                </td>
                                                <td>
                                                    <input type="text" name="terms_description[]"
                                                        class="form-control form-control-sm bg-transparent"
                                                        value="No Installation or Maintenance is applicable with this price quote.">
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($rfq_terms as $term)
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <a class="text-danger rounded-0 btn-sm p-1 delete-terms-row"
                                                            data-id="{{ $term->id }}"
                                                            onclick="deleteTermsRow(this)">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                    <td style="width: 15%">
                                                        <input type="hidden" name="terms_id[]"
                                                            value="{{ $term->id }}">
                                                        <input type="text" name="terms_title[]"
                                                            class="form-control form-control-sm bg-transparent text-start"
                                                            value="{{ $term->title }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="terms_description[]"
                                                            class="form-control form-control-sm bg-transparent"
                                                            value="{{ $term->description }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Additional Content-qt Table -->
                        <table class="content-qt-table table-two" style="margin-top: 15px">
                            <tbody>
                                <tr>
                                    <td colspan="6"
                                        style="padding: 0;border: 0;text-align: end;font-weight: 500;padding-bottom: 8px;">
                                        <input readonly class="border-0 fw-bold w-100 text-end"
                                            name="authorized_brands" type="text" value="Authorized Brands" />
                                    </td>
                                </tr>
                            </tbody>
                            {{-- @php
                                $brandsCollection = collect($brands);
                                $brandsPart1 = $brandsCollection->slice(0, 5);
                                $brandsPart2 = $brandsCollection->slice(5, 5);
                            @endphp --}}
                            <tbody style="background-color: #f0f0f0;">
                                <tr style="padding: 7px">
                                    @foreach ($brands as $brand1)
                                        <td class="table-two-th-qt">
                                            <img class="p-2 img-fluid" src="{{ asset('storage/' . $brand1->image) }}"
                                                alt="" style="padding-left: 15px" />
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <!-- Additional Content-qt Table -->
                        <div style="display: flex;align-items: center;">
                            <table class="content-qt-table" style="margin-top: 25px;width: 75%;">
                                <thead>
                                    <tr>
                                        <th style="border: 0;padding: 0;font-weight: 600;padding-top: 5px;">
                                            <input class="border-0 w-100 fw-bold" name="sender_name" type="text"
                                                value="{{ $quotation->sender_name ?? 'Adan Mahmud | Sr. Manager' }}" />
                                        </th>
                                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                            <input class="border-0 w-100 fw-bold" name="ngen_email" type="text"
                                                value="{{ $quotation->ngen_email ?? 'sales@ngenitltd.com' }}" />
                                        </th>
                                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                            <input class="border-0 w-100 fw-bold" name="ngen_number_two"
                                                type="text"
                                                value="{{ $quotation->ngen_number_two ?? ' +1 917-720-3055' }}" />
                                        </th>
                                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                            <!-- Empty Table Head -->
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="content-qt-table" style="margin-top: 15px;width: 25%;">
                                <thead>
                                    <tr>
                                        <th style="border: 0;padding: 0;font-weight: 500;padding-top: 5px;">
                                            <div style="text-align: center;">
                                                <h3 style="margin-bottom: 0;padding-bottom: 0;">
                                                    <input class="border-0 w-100 fw-bold" style="color: #ae0a46;"
                                                        name="ngen_company_name" type="text"
                                                        value="{{ $quotation->ngen_company_name ?? 'NGEN PTE. LTd.' }}" />
                                                </h3>
                                                <p style="margin: 0;padding-bottom: 0;">
                                                    <input class="border-0 w-100 fw-bold"
                                                        name="ngen_company_registration_number" type="text"
                                                        value="{{ $quotation->ngen_company_registration_number ?? '20437861K' }}" />
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
                                <input class="text-center text-white bg-transparent border-0 w-100 fw-bold"
                                    name="company_address" type="text"
                                    value="10, Anson Road, #21-07, International Plaza, Singapore 079903 | www. ngenitltd.com" />
                            </a>
                        </p>
                    </div>
                    <div class="mt-10 mb-10 d-flex justify-content-center">
                        <div>
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" name="attachment" value="1"
                                    id="attachment" @checked(optional($quotation)->attachment == '1') />
                                <label class="form-check-label ps-3" for="attachment">
                                    Send Quotation With Attachment
                                </label>
                            </div>
                            <div class="mt-5">
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#quotationMail"
                                    value="submit" name="action" class="btn btn-sm fw-bold btn-primary"><i
                                        class="fa-regular fa-circle-check pe-2"></i>Send
                                    Quotation</a>

                                @include('admin.pages.singleRfq.partials.whatsapp_share')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quotation End -->
</div>
