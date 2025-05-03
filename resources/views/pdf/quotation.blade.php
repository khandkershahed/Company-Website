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
            font-size: 11px;
        }

        .footer-link {
            font-family: Sora;
            font-size: 11px;
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
            font-size: 11px;
            font-weight: 500;
            line-height: 17.64px;
            text-align: left;
        }

        .table-two-td {
            font-family: Sora;
            font-size: 11px;
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

        .footer {
            height: 45px;
            background-color: #ae0a46;
            text-align: center;
            color: white;
            width: 100%;
        }

        .footer-link {
            font-size: 15px;
            color: white;
            text-decoration: none;
        }

        .thank-you-section {
            /* display: flex;
            align-items: center; */
            width: 210mm;
            padding: 0px;
            margin: 0px;
            background-image: url('https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg');
            background-size: cover;
            position: fixed;
            bottom: 0;
        }

        @media print {
            .pdf-container {
                background-color: white;
                box-shadow: none;
                border: none;
                width: 100%;
                height: 100%;
            }

            /* .footer {
                position: fixed;
                bottom: 0;
            } */
            .table-two tbody td {
                padding: 20px;
            }

            .table-two tbody tr {
                height: 115px;
                /* Allow height to adjust */
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
        <!-- Your main content here -->
        <table style="width: 100%; border: 0; overflow-x: auto; background: #ae0a46; align-content: center;">
            <thead>
                <tr style="align-content: center; height: 100px;">
                    <th style="border: 0; padding: 0; width: 64%; font-weight: 500; text-align: left; margin: 0px; vertical-align: middle;">
                        <img src="https://www.ngenitltd.com/frontend/images/white_logo.png" alt="Ngen IT" title="Ngen IT"
                            style="padding-left: 20px; width: 95px;" />
                    </th>
                    <th style="border: 0; padding: 0; vertical-align: middle;">
                        <div style="text-align: left;">
                            <p style="font-size: 25px; padding: 0px; font-weight: 600; margin: 0px; margin-bottom: 0px; margin-top: 3px; color: #fff; text-align: left;">
                                {{ $quotation->quotation_title }}
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

        <div class="content">
            <table class="content-table" style="margin-top: 15px;margin-bottom: 43px;">
                <thead>
                    <tr>
                        <th style="border: 0; padding: 0; width: 65%; font-weight: 500">
                            {{ $quotation->name }}
                        </th>
                        <th style="border: 0; padding: 0; font-weight: 500">
                            {{ $quotation->pq_code }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0;padding: 0;padding-top: 5px;font-weight: normal;">
                            {{ $quotation->company_name }}
                        </th>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            Date: {{ $quotation->quotation_date }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->email }}
                        </th>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->pqr_code }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->phone }}
                        </th>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{$quotation->ngen_company_registration_number}}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->address }}
                        </th>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            Customer Type: {{ $rfq->client_type }}
                        </th>
                    </tr>
                </thead>
            </table>
            <!-- Additional Content Table -->
            <table class="content-table table-two" style="margin-top: 40px; border: 1px solid #eee">
                <thead style="background-color: #f0f0f0">
                    <tr>
                        <th width="5%" class="table-two-th">Sl</th>
                        <th width="45%" class="table-two-th">Product Description</th>
                        <th width="10%" class="table-two-th" style="text-align: center">Qty</th>
                        <th width="20%" class="table-two-th" style="text-align: right">
                            Unit Price(<span class="currency">{{ $currency }}</span>)
                        </th>
                        <th width="20%" class="table-two-th" style="text-align: right;padding-right: 20px;">Total(<span
                                class="currency">{{ $currency }}</span>)</th>
                    </tr>
                </thead>
                <tbody style="vertical-align: middle">
                    @if ($products->count() > 0)
                        @foreach ($products as $quotationproduct)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td style="display: flex;align-items: center;">
                                    <p style="display: flex;align-items: center; margin-bottom: 0px;">{{ $quotationproduct->product_name }}</p>
                                </td>
                                <td style="text-align: center">{{ $quotationproduct->qty }}</td>
                                <td style="text-align: right">
                                    {{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}
                                    {{-- {{ $currency }} --}}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}
                                    {{-- {{ $currency }} --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr style="background-color: #eeeeee3d">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            SubTotal
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->sub_total_final_total_price), 2) }}
                            {{-- <span class="currency">{{ $currency }}</span> --}}
                        </td>
                    </tr>
                    <tr
                        style="background-color: #eeeeee3d; display: {{ optional($quotation)->special_discount_display == '1' ? 'table-row' : 'none' }};">
                        <td colspan="4" style="text-align: right; font-weight: 400">
                            Special Discount ({{ optional($singleproduct)->special_discount_percentage }}%)
                        </td>
                        <td style="text-align: right; font-weight: 400">
                            {{ number_format(round((float) optional($singleproduct)->special_discount_final_total_price), 2) }}
                            {{-- <span class="currency">{{ $currency }}</span></td> --}}
                    </tr>
                    <tr
                        style="background-color: #eeeeee3d; display: {{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }};">
                        <td colspan="4" style="text-align: right; font-weight: 400">
                            Vat ({{ optional($singleproduct)->vat_percentage }}%)
                        </td>
                        <td style="text-align: right; font-weight: 400">
                            {{ number_format(round((float) optional($singleproduct)->vat_final_total_price), 2) }}
                            {{-- <span class="currency">{{ $currency }}</span> --}}
                        </td>
                    </tr>

                    <tr style="background-color: #eee">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            GrandTotal
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->total_final_total_price), 2) }}
                            {{-- <span class="currency">{{ $currency }}</span> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
            @if (optional($quotation)->vat_display == '1')
                <div class="" style="border: 0; padding-top: 15px;">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th style="border: 0;padding: 0;text-align: center;font-weight: 500;">
                                    {{ $quotation->vat_text }}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            @endif

            <div style="margin-top: 2.5rem; margin-bottom: 3.5rem;">
                <table style="width: 100%; overflow-x: auto; margin-top: 0.8rem;">
                    <thead style="background-color: #eeeeee;">
                        <tr>
                            <th colspan="2"
                                style="text-align: left;font-size: 15px;font-weight: bold;color: #3e3d3d;padding: 11px 5px;">
                                Terms & Conditions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rfq_terms as $term)
                            <tr>
                                <td style="font-size: 11px;width:17%; padding: 5px;border: 0;font-weight: 500;">
                                    {{ $term->title }}
                                </td>
                                <td style="font-size: 11px;width:83%; padding: 5px; border: 0">
                                    {{ $term->description }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="thank-you-section">
            <table style="width: 100%; padding:2rem;">
                <thead>
                    <tr>
                        <th style="text-align: left;padding-bottom:10px;">{{ $quotation->thank_you_text }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 25%; border-right: 1px solid #c2c1c1;">{{ $quotation->sender_name }}</td>
                        <td style="padding-left: 40px; width: 30%;">{{ $quotation->ngen_email }}</td>
                        <td rowspan="3" style="width: 30%; text-align: center;">
                            <div style="margin: auto;">
                                <p style="font-weight: bold; color: #ae0a46; font-size: 1.35em; margin: 0;">
                                    {{ $quotation->ngen_company_name }}
                                </p>
                                <p style="margin: 0;">REG: {{ $quotation->ngen_company_registration_number }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #c2c1c1;">{{ $quotation->sender_designation }}</td>
                        <td style="padding-left: 40px;">{{ $quotation->ngen_whatsapp_number }} (WhatsApp)</td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #c2c1c1;">Business Team</td>
                        <td style="padding-left: 40px;">{{ $quotation->ngen_number_two }} (Skype)</td>
                    </tr>
                </tbody>
            </table>
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

        <!-- Footer -->

    </div>
</body>

</html>
