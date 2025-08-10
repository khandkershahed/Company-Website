<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Price Quotation</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            /* font-family: "Sora", sans-serif; */
            /* font-family: "Roboto", sans-serif; */
            font-family: "Montserrat", sans-serif;
            font-size: 12px;
        }

        .footer-link {
            font-family: Sora;
            font-size: 14px;
            font-weight: 500;
            line-height: 22.68px;
            letter-spacing: 0.1em;
            text-align: left;
            color: white;
            text-decoration: none;
        }

        .pdf-container {
            width: 210mm;
            /* A4 width */
            height: 297mm;
            /* A4 height */
            margin: auto;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        .header {
            height: 61px;
            background-color: #ae0a46;
            text-align: center;
            vertical-align: middle;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            width: 100%;
            padding: 0 30px;
            color: white;
            height: 100%;
            box-sizing: border-box;
        }

        .content {
            padding: 30px;
            padding-top: 30px;
            flex: 1;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
        }

        table {
            border: 0;
        }

        th {
            border-right: 0;
        }

        table.content-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.content-table th,
        table.content-table td {
            border-bottom: 1px solid #eee;
            padding: 10px;
            text-align: left;
        }

        .footer {
            height: 45px;
            background-color: #ae0a46;
            text-align: center;
            color: white;
        }

        .table-two-th {
            font-size: 14px;
            font-weight: 500;
            line-height: 17.64px;
            text-align: left;
        }

        .table-two-td {
            font-family: Sora;
            font-size: 14px;
            font-weight: 400;
            line-height: 17.64px;
            text-align: left;
        }

        .bottom-section {
            padding: 30px;
            margin-top: auto;
            border-top: 1px solid #eee;
        }

        th {
            vertical-align: bottom;
        }

        @media print {
            .pdf-container {
                background-color: white;
                box-shadow: none;
                border: none;
                width: 100%;
                height: 100%;
            }

            .header,
            .footer,
            .bottom-section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <!-- Header -->
        <table style="width: 100%; border: 0; overflow-x: auto; background: #ae0a46; align-content: center;">
            <thead>
                <tr style="align-content: center; height: 100px;">
                    <th
                        style="border: 0; padding: 0; width: 64%; font-weight: 500; text-align: left; margin: 0px; vertical-align: middle;">
                        <img src="https://www.ngenitltd.com/frontend/images/white_logo.png" alt="Ngen IT" title="Ngen IT"
                            style="padding-left: 20px; width: 95px;" />
                    </th>
                    <th style="border: 0; padding: 0; vertical-align: middle;">
                        <div style="text-align: left;">
                            <p
                                style="font-size: 25px; padding: 0px; font-weight: 600; margin: 0px; margin-bottom: 0px; margin-top: 3px; color: #fff; text-align: left;">
                                {{ $quotation->quotation_title }}
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

        <!-- Content -->
        <div class="pb-0 content">
            <table class="content-table">
                <thead>
                    <tr>
                        <th style="border: 0; padding: 0; width: 65%; font-weight: 500">
                            {{ $quotation->company_name ?? 'N/A' }}
                        </th>
                        <th style="border: 0; padding: 0; font-weight: 500">
                            PQ: {{ $quotation->pq_code ?? 'N/A' }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0; padding: 0; padding-top: 5px; font-weight: normal;">
                            {{ $quotation->name ?? 'N/A' }} | {{ $quotation->designation ?? 'Sr. Manager' }}
                        </th>
                        <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                            Date: {{ $quotation->quotation_date ?? 'N/A' }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                            {{ $quotation->email ?? 'N/A' }} | {{ $quotation->phone ?? 'N/A' }}
                        </th>
                        <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                            PQR: {{ $quotation->pqr_code ?? 'N/A' }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                            {{ $quotation->address }}
                        </th>
                        <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                            Customer Type: {{ $rfq->client_type ?? 'N/A' }}
                        </th>
                    </tr>
                </thead>
            </table>

            <!-- Additional Content Table -->
            <table class="content-table table-two" style="margin-top: 40px; border: 1px solid #eee">
                <thead style="background-color: #f0f0f0">
                    <tr>
                        <th class="table-two-th">Sl</th>
                        <th class="table-two-th">PRODUCT DESCRIPTION</th>
                        <th class="table-two-th" style="text-align: center">QTY</th>
                        <th class="table-two-th" style="text-align: right">UNIT PRICE</th>
                        <th class="table-two-th" style="text-align: right">TOTAL ({{ $currency }})</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count() > 0)
                        @foreach ($products as $quotationproduct)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $quotationproduct->product_name }}</td>
                                <td style="text-align: center">{{ $quotationproduct->qty }}</td>
                                <td style="text-align: right">
                                    {{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr style="background-color: #eeeeee3d">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            SUBTOTAL
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->sub_total_final_total_price), 2) }}
                        </td>
                    </tr>
                    <tr style="display: {{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }};">
                        <td colspan="4" style="text-align: right; font-weight: 400; font-size: 12px">
                            VAT / TAX {{ optional($singleproduct)->vat_percentage }}%
                        </td>
                        <td style="text-align: right; font-weight: 400; font-size: 12px">
                            {{ number_format(round((float) optional($singleproduct)->vat_final_total_price), 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: 400; font-size: 12px">
                            SPECIAL DISCOUNT({{ optional($singleproduct)->special_discount_percentage }}%)
                        </td>
                        <td style="text-align: right; font-weight: 400; font-size: 12px">
                            {{ number_format(round((float) optional($singleproduct)->special_discount_final_total_price), 2) }}
                        </td>
                    </tr>
                    <tr style="background-color: #eee">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            GRANDTOTAL
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->total_final_total_price), 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="content"
                style="border: 0; padding-top: 10px; padding-bottom: 0px !important; padding-left: 0; padding-right: 0;">
                <table class="content-table">
                    <thead>
                        <tr style="display: {{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }};">
                            <th
                                style="border: 0; padding: 0; text-align: center; font-weight: 500; padding-bottom: 10px;">
                                {{ 'GST included. It may apply.' }}
                            </th>
                        </tr>
                        <tr>
                            <th
                                style="background-color: #f0f0f0; border: 0; padding: 0; text-align: start; font-weight: 500; padding: 5px;">
                                Terms & Conditions
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>

            <table class="content-table table-two" style="margin-top: 5px; border: 0px solid #eee">
                <tbody>
                    @foreach ($rfq_terms as $term)
                        <tr>
                            <td style="font-size: 12px; padding: 5px; border: 0; font-weight: 500;">
                                {{ $term->title ?? 'N/A' }}</td>
                            <td style="font-size: 12px; padding: 5px; border: 0; font-weight: 500;">:</td>
                            <td style="font-size: 12px; padding: 5px; border: 0;">{{ $term->description ?? 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Additional Content Table -->
            <table class="content-table table-two" style="margin-top: 15px">
                <tbody>
                    <tr>
                        <td colspan="6"
                            style="padding: 0; border: 0; text-align: right; font-weight: 500; padding-bottom: 8px;">
                            Authorized Brands
                        </td>
                    </tr>
                </tbody>
                <tbody style="background-color: #f0f0f0">
                    <tr style="padding: 10px">
                        @foreach ($brands as $brand)
                            <td class="table-two-th" style="padding: 0">
                                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->title }}"
                                    style="padding-left: 15px; width: 100px;" />
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <!-- Additional Content Table -->
            <div style="display: flex; align-items: center;">
                <table class="content-table" style="margin-top: 20px; width: 70%">
                    <thead>
                        <tr>
                            <th style="border: 0; padding: 0; font-weight: 600; padding-top: 5px;">
                                {{ $quotation->sender_name ?? 'Adan Mahmud' }}
                            </th>
                            <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                                {{ $quotation->ngen_email ?? 'sales@ngenitltd.com' }}
                            </th>
                        </tr>
                        <tr>
                            <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                                {{ $quotation->sender_designation ?? 'Sr. Manager' }}
                            </th>
                            <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                                {{ $quotation->ngen_whatsapp_number ?? '+8801714243446' }} (What’s App)
                            </th>
                        </tr>
                        <tr>
                            <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                                Partner & Business Development
                            </th>
                            <th style="border: 0; padding: 0; font-weight: normal; padding-top: 5px;">
                                {{ $quotation->ngen_number_two ?? '+1 917-720-3055' }} (Skype)
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="content-table" style="margin-top: 15px; width: 20%">
                    <thead>
                        <tr>
                            <th style="border: 0; padding: 0; font-weight: 500; padding-top: 5px;">
                                <div style="text-align: center">
                                    <h3 style="margin-bottom: 0; padding-bottom: 0; color: #ae0a46;">
                                        {{ $quotation->ngen_company_name ?? 'NGEN PTE. LTd.' }}
                                    </h3>
                                    <p style="margin: 0; padding-bottom: 0">
                                        Reg-no: {{ $quotation->ngen_company_registration_number ?? 'N/A' }}
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <table style="width: 100%;padding: 0px;margin: 0px;background-color: #ae0a46;text-align: center;">
            <tr>
                <td>
                    <p style="padding: 10px; margin: 0;">
                        <a class="footer-link" style="font-size:20px;"
                            href="https://www.ngenitltd.com">www.ngenitltd.com</a>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
