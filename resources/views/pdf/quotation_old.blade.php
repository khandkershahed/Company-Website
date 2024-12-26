<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Price Quotation</title>
    {{-- <link href="{{ asset('frontend/css/bootstrap/bootstrap@5.min.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" /> --}}
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            /* font-family: "Sora", sans-serif; */
            /* font-family: "Roboto", sans-serif; */
            /* font-family: "Montserrat", sans-serif; */
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

        {{-- <table style="width: 100%; border: 0; overflow-x: auto; background: #ae0a46;">
            <thead>
                <tr>
                    <th style="padding: 3px; width: 32%; text-align:left;">
                        <img src="{{ asset('frontend/images/white_logo.png') }}" alt="Logo"
                            style="height: 40px; margin-left:20px;" />
                    </th>
                    <th style="width: 36%;"></th>
                    <th style="padding: 3px; padding-top:0px; width: 32%;">
                        <h1 style="margin: 0;font-size: 24px;position: relative; color:white;">
                            {{ $quotation->quotation_title }}
                        </h1>
                    </th>
                </tr>
            </thead>
        </table> --}}

        <table style="width: 100%; border: 0; overflow-x: auto; background: #ae0a46;">
            <thead>
                <tr>
                    <th style="border: 0;padding: 3px;width: 64%;font-weight: 500;text-align:left;margin: 0px;">
                        <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="Ngen IT" title="Ngen IT"
                            style="padding-left: 20px;" {{-- style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; display: inline-block !important; border: none; height: auto; float: none; width: 5rem; padding-left: 20px;" --}} width="60" />
                    </th>
                    <th style="border: 0; padding: 0; align-content: center;">
                        <p style="font-size: 22px; font-weight: 600; margin: 0px; color: #fff; text-align: left;">
                            {{ $quotation->quotation_title }}
                        </p>
                    </th>
                </tr>
            </thead>
        </table>

        <!-- Content -->
        <div class="content pb-0" style>
            <table class="content-table" style="margin-top: 15px;margin-bottom: 40px;">
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
                        <th
                            style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->pqr_code }}
                        </th>
                    </tr>
                    <tr>
                        <th style="border: 0;padding: 0;font-weight: normal;padding-top: 5px;">
                            {{ $quotation->phone }}
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
                        <th class="table-two-th">Sl</th>
                        <th class="table-two-th">Product Description</th>
                        <th class="table-two-th" style="text-align: center">Qty</th>
                        <th class="table-two-th" style="text-align: right">
                            Unit Price(<span class="currency">{{ $currency }}</span>)
                        </th>
                        <th class="table-two-th" style="text-align: right">Total(<span
                                class="currency">{{ $currency }}</span>)</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count() > 0)
                        @foreach ($products as $quotationproduct)
                            <tr style="height: 115px;">
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $quotationproduct->product_name }}</td>
                                <td style="text-align: center">{{ $quotationproduct->qty }}</td>
                                <td style="text-align: right">
                                    {{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}
                                    {{ $currency }}.
                                </td>
                                <td style="text-align: right">
                                    {{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}
                                    {{ $currency }}.
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr style="background-color: #eeeeee3d">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            SubTotal
                        </td>
                        <td style="text-align: right; font-weight: 600">
                            {{ number_format(round((float) optional($singleproduct)->sub_total_final_total_price), 2) }}
                            <span class="currency">{{ $currency }}</span>.
                        </td>
                    </tr>
                    <tr
                        style="background-color: #eeeeee3d; display: {{ optional($quotation)->special_discount_display == '1' ? 'table-row' : 'none' }};">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            Special Discount ({{ optional($singleproduct)->special_discount_percentage }}%)
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->special_discount_final_total_price), 2) }}<span
                                class="currency">{{ $currency }}</span>.</td>
                    </tr>
                    <tr
                        style="background-color: #eeeeee3d; display: {{ optional($quotation)->vat_display == '1' ? 'table-row' : 'none' }};">
                        <td colspan="4" style="text-align: right; font-weight: 500">
                            Vat ({{ optional($singleproduct)->vat_percentage }}%)
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->vat_final_total_price), 2) }}
                            <span class="currency">{{ $currency }}</span>.
                        </td>
                    </tr>

                    <tr style="background-color: #eee">
                        <td colspan="4" style="text-align: right; font-weight: 600">
                            GrandTotal
                        </td>
                        <td style="text-align: right; font-weight: 500">
                            {{ number_format(round((float) optional($singleproduct)->total_final_total_price), 2) }}
                            <span class="currency">{{ $currency }}</span>.
                        </td>
                    </tr>
                </tbody>
            </table>
            @if (optional($quotation)->vat_display == '1')
                <div class="content" style="border: 0; padding-top: 29px; padding-bottom: 0px !important">
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

            <div style="margin-top: 3.5rem; margin-bottom: 3.5rem;">
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
                                <td style="font-size: 13px;width:17%; padding: 5px;border: 0;font-weight: 500;">
                                    {{ $term->title }}
                                </td>
                                <td style="font-size: 13px;width:83%; padding: 5px; border: 0">
                                    {{ $term->description }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div
            style="display: flex; align-items: center;padding: 1rem 2rem; margin-top:1rem;background-image: url('https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg'); background-size: cover;">
            <table style="width: 100%; border: 0; overflow-x: auto;">
                <thead>
                    <tr>
                        <th
                            style="text-align:left; font-size: 14px;padding-bottom: 13px;font-weight: bold;width: 15%;color: #ae0a46;">
                            {{ $quotation->thank_you_text }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td
                            style=" padding: 0;width: 25%;border-right: 1px solid #c2c1c1;">
                            {{ $quotation->sender_name }}
                        </td>
                        <td style="padding-left: 40px; width: 30%;">
                            {{ $quotation->ngen_email }}
                        </td>
                        <td rowspan="3" style="width: 30%; text-align: center;">
                            <div style="width:100%; margin: auto;">
                                <p
                                    style="font-weight: bold;color: #ae0a46;font-size: 1.35em;margin-bottom: 0;margin-top: 0.1rem;">
                                    {{ $quotation->ngen_company_name }}
                                </p>
                                <p style="padding: 5px; margin: 0; ">
                                    REG: {{ $quotation->ngen_company_registration_number }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="width: 15%; margin:0; padding:0;border-right: 1px solid #c2c1c1;">
                            {{ $quotation->sender_designation }}
                        </td>
                        <td style="  padding-left: 40px;width: 25%;">
                            <p style="margin: 0; ">
                                {{ $quotation->ngen_whatsapp_number }} (What's App)
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;border-right: 1px solid #c2c1c1;">
                            <p style="margin: 0; ">Business Team</p>
                        </td>
                        <td style=" padding-left: 40px;width: 15%; ">
                            <p style="margin: 0; ">
                                {{ $quotation->ngen_number_two }} (Skype)
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p style="padding: 10px; margin: 0px;">
                <a style="margin: 0px; font-size:15px;" class="footer-link"
                    href="https://www.ngenitltd.com">www.ngenitltd.com</a>
            </p>
        </div>
    </div>
    <!-- Second Page -->

</body>

</html>
