<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Price Quotation</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            /* font-family: "Sora", sans-serif; */
            /* font-family: "Roboto", sans-serif; */
            font-family: "Montserrat", sans-serif;
            font-size: 14px;
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
        <div class="header">
            <div class="header-content">
                <div>
                    <img src="https://www.ngenitltd.com/frontend/images/white_logo.png" alt="Logo" style="height: 40px" />
                </div>
                <div>
                    <h1
                        style="margin: 0;font-size: 24px;position: relative;left: -65px;">
                        Price Quotation
                    </h1>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content pb-0">
            <table class="content-table">
                <thead>
                    <tr>
                        <th style="border: 0; padding: 0; width: 65%; font-weight: 500">
                            {{ $quotation->name ?? 'N/A'}}
                        </th>
                        <th style="border: 0; padding: 0; font-weight: 500">
                            PQ#: NG-BD/Genexis/RV/231021
                            {{ $quotation->pq_code ?? 'N/A'}}
                        </th>
                    </tr>
                    <tr>
                        <th
                            style="border: 0;padding: 0;padding-top: 5px;font-weight: normal;">
                            {{ $quotation->company_name ?? 'N/A'}}
                        </th>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            Date: {{ $quotation->quotation_date ?? 'N/A'}}
                        </th>
                    </tr>
                    <tr>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->email ?? 'N/A'}}
                        </th>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->pqr_code ?? 'N/A'}}
                        </th>
                    </tr>
                    <tr>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->phone ?? 'N/A'}}
                        </th>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{$quotation->ngen_company_registration_number ?? 'N/A'}}
                        </th>
                    </tr>
                    <tr>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->address }}
                        </th>
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            Customer Type: {{ $rfq->client_type ?? 'N/A'}}
                        </th>
                    </tr>
                </thead>
            </table>
            <!-- Additional Content Table -->
            <table
                class="content-table table-two"
                style="margin-top: 40px; border: 1px solid #eee">
                <thead style="background-color: #f0f0f0">
                    <tr>
                        <th class="table-two-th">Sl</th>
                        <th class="table-two-th">PRODUCT DESCRIPTION</th>
                        <th class="table-two-th" style="text-align: center">QTY</th>
                        <th class="table-two-th" style="text-align: end">UNIT PRICE</th>
                        <th class="table-two-th" style="text-align: end">TOTAL ({{ $currency }})</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count() > 0)
                    @foreach ($products as $quotationproduct)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $quotationproduct->product_name }}</td>
                        <td style="text-align: center">{{ $quotationproduct->qty }}</td>
                        <td style="text-align: end">{{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}</td>
                        <td style="text-align: end">{{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr style="background-color: #eeeeee3d">
                        <td colspan="4" style="text-align: end; font-weight: 500">
                            SUBTOTAL
                        </td>
                        <td style="text-align: end; font-weight: 500">{{ number_format(round((float) optional($singleproduct)->sub_total_final_total_price), 2) }}</td>
                    </tr>
                    <tr style="display: {{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }};">
                        <td
                            colspan="4"
                            style="text-align: end; font-weight: 400; font-size: 12px">
                            VAT / TAX {{ optional($singleproduct)->vat_percentage }}%
                        </td>
                        <td style="text-align: end; font-weight: 400; font-size: 12px">
                            {{ number_format(round((float) optional($singleproduct)->vat_final_total_price), 2) }}
                        </td>
                    </tr>
                    <tr style="">
                        <td
                            colspan="4"
                            style="text-align: end; font-weight: 400; font-size: 12px">
                            SPECIAL DISCOUNT({{ optional($singleproduct)->special_discount_percentage }}%)
                        </td>
                        <td style="text-align: end; font-weight: 400; font-size: 12px">
                            {{ number_format(round((float) optional($singleproduct)->special_discount_final_total_price), 2) }}
                        </td>
                    </tr>
                    <tr style="background-color: #eee">
                        <td colspan="4" style="text-align: end; font-weight: 500">
                            GRANDTOTAL
                        </td>
                        <td style="text-align: end; font-weight: 500">{{ number_format(round((float) optional($singleproduct)->total_final_total_price), 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <div
                class="content"
                style="border: 0;padding-top: 10px;padding-bottom: 0px !important;padding-left: 0;padding-right: 0;">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th style="border: 0; padding: 0; text-align: center; font-weight: 500; padding-bottom: 10px;">
                                {{ $quotation->vat_text ?? 'GST - Not included. It may apply.' }}
                            </th>
                        </tr>
                        <tr>
                            <th
                                style="background-color: #f0f0f0;border: 0;padding: 0;text-align: start;font-weight: 500;padding: 5px;">
                                Terms & Conditions
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <table
                class="content-table table-two"
                style="margin-top: 5px; border: 0px solid #eee">
                <tbody>
                    @foreach ($rfq_terms as $term)
                    <tr>
                        <td
                            style="font-size: 12px;padding: 5px;border: 0;font-weight: 500;">
                            {{ $term->title ?? 'N/A'}}
                        </td>
                        <td
                            style="font-size: 12px;padding: 5px;border: 0;font-weight: 500;">
                            :
                        </td>
                        <td style="font-size: 12px; padding: 5px; border: 0">
                            {{ $term->description ?? 'N/A'}}
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
            <!-- Additional Content Table -->
            <table class="content-table table-two" style="margin-top: 15px">
                <tbody>
                    <tr>
                        <td
                            colspan="6"
                            style="padding: 0;border: 0;text-align: end;font-weight: 500;padding-bottom: 8px;">
                            Authorized Brands
                        </td>
                    </tr>
                </tbody>
                <tbody style="background-color: #f0f0f0">
                    <tr style="padding: 10px">
                        <td class="table-two-th" style="padding: 0">
                            <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png" alt="" style="padding-left: 15px; width: 100px" />
                        </td>
                        <td class="table-two-th" style="padding: 0">
                            <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png" alt="" style="padding-left: 15px; width: 100px" />
                        </td>
                        <td class="table-two-th" style="text-align: center; padding: 0">
                            <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png" alt="" style="padding-left: 15px; width: 100px" />
                        </td>
                        <td class="table-two-th" style="text-align: end; padding: 0">
                            <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png" alt="" style="padding-left: 15px; width: 100px" />
                        </td>
                        <td class="table-two-th" style="text-align: end; padding: 0">
                            <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png" alt="" style="padding-left: 15px; width: 100px" />
                        </td>
                        <td class="table-two-th" style="text-align: end; padding: 0">
                            <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png" alt="" style="padding-left: 15px; width: 100px" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Additional Content Table -->
            <div style="display: flex; align-items: center">
                <table class="content-table" style="margin-top: 20px; width: 75%">
                    <thead>
                        <tr>
                            <th
                                style="border: 0;padding: 0;font-weight: 600;padding-top: 5px;">
                                {{ $quotation->sender_name ?? 'Adan Mahmud' }}
                            </th>
                            <th
                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                {{ $quotation->ngen_email ?? 'sales@ngenitltd.com' }}
                            </th>
                        </tr>
                        <tr>
                            <th
                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                {{ $quotation->sender_designation ?? 'Sr. Manager' }}
                            </th>
                            <th
                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                {{ $quotation->ngen_whatsapp_number ?? 'N/A' }} (What’s App)
                            </th>
                        </tr>
                        <tr>
                            <th
                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                Partner & Business Development
                            </th>
                            <th
                                style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                                {{ $quotation->ngen_number_two ?? 'N/A'}} (Skype)
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="content-table" style="margin-top: 15px; width: 25%">
                    <thead>
                        <tr>
                            <th
                                style="border: 0;padding: 0;font-weight: 500;padding-top: 5px;">
                                <div style="text-align: center">
                                    <h3
                                        style="margin-bottom: 0;padding-bottom: 0;color: #ae0a46;">
                                        {{ $quotation->ngen_company_name ?? 'NGEN PTE. LTd.'}}
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
        <div class="footer">
            <p style="padding: 0; margin: 10px">
                <a class="footer-link" href="https://www.ngenitltd.com">www.ngenitltd.com</a>
            </p>
        </div>
    </div>
</body>

</html>