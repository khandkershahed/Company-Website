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
                                        <span>Customer Type: {{ $rfq->customer_type ?? 'Anonymous' }}</span>
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
                                                value="{{ $quotationproduct->product_name }}" />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="text-center border-0 w-100" name="" type="text"
                                                value="{{ $quotationproduct->qty }}" />
                                        </td>
                                        <td style="text-align: end">
                                            <input class="border-0 w-100 text-end" name="" type="text"
                                                value="{{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}" />
                                        </td>
                                        <td style="text-align: end">
                                            {{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}
                                        </td>
                                    </tr>
                                @endforeach

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
                                                <div class="vat_display">
                                                    <input class="text-center border-0 w-100" name="vat_text"
                                                        type="text"
                                                        value="{{ !empty($quotation->vat_text) ? $quotation->vat_text : 'GST not included. It may apply.' }}" />
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0 border d-flex align-items-center"
                                                style="border: 0;padding: 0;text-align: start;font-weight: 500;padding: 5px;">
                                                <div class="px-3 py-2" style=" background-color: #f0f0f0; ">
                                                    <a href="javascript:;" data-repeater-create>
                                                        <i class="fas fa-plus"></i></a>
                                                </div>
                                                <input class="py-2 text-center border-0 w-100 fw-bold"
                                                    style=" background-color: #f0f0f0; " name="gst"
                                                    type="text" value="Terms & Conditions" />
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <table class="content-qt-table table-two" style="margin-top: 5px;border: 0px solid #eee;">
                                <tbody data-repeater-list="terms">
                                    <tr data-repeater-item style="border-bottom: 1px solid #eee;">
                                        <td class="border-0">
                                            <a href="javascript:;" data-repeater-delete><i
                                                    class="border-0 fa-regular fa-trash-can text-danger"></i></a>
                                        </td>
                                        <td style="width: 95%;font-size: 12px;padding: 5px;border: 0;">
                                            <input class="border-0 w-100 text-start" name="terms_info" type="text"
                                                value="Validity : Valid till 7 days from PQ. Offer may change on the bank forex rate or stock availability" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Additional Content-qt Table -->
                        <table class="content-qt-table table-two" style="margin-top: 15px">
                            <tbody>
                                <tr>
                                    <td colspan="6"
                                        style="padding: 0;border: 0;text-align: end;font-weight: 500;padding-bottom: 8px;">
                                        <input class="border-0 fw-bold w-100 text-end" name="authorized_brands"
                                            type="text" value="Authorized Brands" />
                                    </td>
                                </tr>
                            </tbody>
                            <tbody style="background-color: #f0f0f0;">
                                <tr style="padding: 7px">
                                    <td class="table-two-th-qt">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-left: 15px" />
                                    </td>
                                    <td class="table-two-th-qt">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: center;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
                                </tr>
                                <tr style="padding: 7px">
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
                                    <td class="table-two-th-qt" style="text-align: end;">
                                        <img class="p-2 img-fluid"
                                            src="https://i-p.rmcdn.net/5e60f30b6ad81200a9f638f5/2339077/upload-ea55cf9e-7dee-4f53-94b8-e6363b9ce32b.png?w=566&e=webp&nll=true"
                                            alt="" style="padding-right: 15px;" />
                                    </td>
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
