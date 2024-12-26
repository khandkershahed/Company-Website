<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Invoice PDF</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/bootstrap/bootstrap@5.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Google Fonts -->
    <!-- <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />  -->

    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            /* font-family: "Raleway", sans-serif; */
            margin: 0;
        }

        /* Resetting some default styles for consistency */
        a,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            text-decoration: none;
            padding: 0;
            margin: 0;
        }

        /* Table Styles */
        .quotation-header {
            padding-left: 20px;
            padding-right: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Flexbox for Logo Column */
        .logo-column {
            display: flex;
        }

        /* Text Column Styles */
        .text-column {
            color: white;
            text-align: end;
        }

        /* Responsive Image Styles */
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Quotation Header Styles */
        .quotation-header {
            background-color: #ae0a46;
            border: 0;
        }

        .quotation-header td {
            border: 0;
        }

        /* Brand Logo Styles */
        .brand-logo {
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .qutation-client-details {
            padding-bottom: 1.5rem;
            padding-left: 10px;
        }

        .qutation-client-details h3,
        .qutation-details h3 {
            color: #ae0a46;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .qutation-details {
            padding-bottom: 1.5rem;
            padding-right: 5px;
        }

        .qutation-details {
            text-align: end;
        }

        .quotation-info-table td {
            border: 0;
        }

        .company-name {
            font-weight: 600;
            color: #ae0a46;
        }

        .table-border {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .table-border th {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .amount-container .sub-total {
            text-align: right;
        }

        .amount-container .special-discount {
            text-align: right;
        }

        .terms-condition tr td {
            font-size: 13px;
        }

        p {
            font-size: 13px;
        }

        .footer-footer {
            border: 0;
        }

        .footer-table td {
            border: 0;
        }

        .footer-footer-top-info {
            background-image: url(https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg);
            background-size: cover;
            border: 0;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .footer-footer-top-info tr td {
            border: 0;
            padding-top: 3px;
            padding-bottom: 3px;
        }
    </style>
</head>

<body>
    <div class="container px-0">
        <!-- Quotation Header Table -->
        <table width="100%" class="table-responsive border-0 quotation-header-table">
            <tr class="quotation-header">
                <!-- Logo Column -->
                <td class="logo-column">
                    <div class="brand-logo">
                        <!-- NGen IT Logo -->
                        <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="NGen IT"
                            style="height: 51px" />
                    </div>
                </td>

                <!-- Text Column -->
                <td class="text-column">
                    <div class="header-register" style="text-align: right">
                        <!-- Company Details -->
                        <h2>NGEN IT LTD.</h2>
                        <p>REG-NO: 20437861K</p>
                    </div>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </table>
        <!-- Qutation Info -->
        <table width="100%" class="table-responsive border-0 quotation-info-table">
            <tr class="">
                <!-- Logo Column -->
                <td class="qutation-client-details">
                    <div>
                        <h3>{{ $rfq->company_name }}</h3>
                        @if (!empty($rfq->address))
                            <p>{{ $rfq->address }}</p>
                        @endif
                        <p class="company-name">{{ $rfq->name }}</p>
                        <p>
                            <span>{{ $rfq->email }}</span> | <span> {{ $rfq->phone }}</span>
                        </p>
                    </div>
                </td>

                <!-- Text Column -->
                <td class="" style="text-align: right;">
                    <div class="qutation-details" style="text-align: right">
                        <!-- Company Details -->
                        <h2>INVOICE</h2>
                        <p>Date : {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                        <p>PQ#:# {{ $pq_code }}</p>
                        <p>PQR#: {{ $pqr_code_one }}</p>
                    </div>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </table>
        <!-- Qutation Main content Table -->
        <table width="100%" class="table-responsive table-border pricing-details-table">
            <thead>
                <tr style="background-color: #ddd;">
                    <th>Sl</th>
                    <th>Product Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total ({{ $currency === 'taka' ? 'TK' : '$' }})</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->qty }}
                        </td>
                        <td>
                            {{ $currency === 'taka' ? 'TK' : '$' }}
                            {{ number_format($item->sales_price / $item->qty, 2) }}
                        </td>
                        <td>{{ $currency === 'taka' ? 'TK' : '$' }} {{ $item->sales_price }}</td>
                    </tr>
                @endforeach
                <tr class="amount-container" style="background-color: #ddd;">
                    <td colspan="4" class="sub-total">Sub Total</td>
                    <td>{{ $currency === 'taka' ? 'TK' : '$' }} {{ $deal_sas->sub_total_sales }}</td>
                </tr>
                @if ($rfq->special == '1')
                    <tr class="amount-container">
                        <td colspan="4" class="special-discount">Special Discount
                            {{ $deal_sas->special_discount }}</td>
                        <td>{{ $currency === 'taka' ? 'TK' : '$' }}
                            {{ $deal_sas->sub_total_sales - $deal_sas->special_discounted_sales }}
                        </td>
                    </tr>
                @endif
                <tr class="amount-container" style="background-color: #ddd;">
                    <td colspan="4" class="special-discount">Grand Total</td>
                    <td>{{ $currency === 'taka' ? 'TK' : '$' }} {{ $deal_sas->grand_total }}</td>
                </tr>
            </tbody>
            <!-- Add more rows as needed -->
        </table>
        {{-- GST --}}

        <table class="table-responsive table-border pricing-details-table" style="width:50%; margin: auto;">
            <thead>
                <tr style="background-color: #ddd;">
                    <th colspan="2"><strong>GST - 8%</strong> Not included. It may apply.
                </tr>
            </thead>
            {{-- <thead>
                @if ($rfq->tax_status == '1')
                    <tr>
                        <th colspan="2"><strong>GST - 8%</strong> Not included. It may apply.
                    </tr>
                @endif
            </thead> --}}
        </table>
        {{-- Terms & Condition --}}
        <table width="100%" class="table-responsive table-border pricing-details-table">
            <thead>
                <tr class="quotation-header">
                    <th colspan="2" style="color: white;">Terms & Conditions</th>
                </tr>
            </thead>
            <tbody class="terms-condition">
                @if (!empty($rfq->validity))
                    <tr>
                        <td>Validity :</td>
                        <td>{{ $rfq->validity }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->payment))
                    <tr>
                        <td>Payment :</td>
                        <td>{{ $rfq->payment }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->validity))
                    <tr>
                        <td>Payment Mode:</td>
                        <td>{{ $rfq->payment_mode }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->delivery))
                    <tr>
                        <td>Delivery :</td>
                        <td> {{ $rfq->delivery }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->delivery_location))
                    <tr>
                        <td>Delivery Location :</td>
                        <td>{{ $rfq->delivery_location }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->product_order))
                    <tr>
                        <td>Product Order :</td>
                        <td>{{ $rfq->product_order }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->installation_support))
                    <tr>
                        <td>Installation Support:</td>
                        <td>{{ $rfq->installation_support }}</td>
                    </tr>
                @endif
                @if (!empty($rfq->pmt_condition))
                    <tr>
                        <td>Pmt Condition :</td>
                        <td>{{ $rfq->pmt_condition }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- Qutation Footer --}}
        <table width="100%" class="table-responsive table-border pricing-details-table footer-footer"
            style="margin: 0px; padding-left:0; padding-right:0; padding-bottom: 0px; margin-top: 2.5px;">
            <tbody style="border: 0;" class="footer-footer-top-info">
                <tr>
                    <td style="text-align: left; font-weight: bold; padding-top: 2rem; padding-left: 2rem;">Thank You
                    </td>
                    <td style="text-align: right; color: #ae0a46; padding-top: 2rem; padding-right: 2rem;">
                        sales@ngenitltd.com</td>
                </tr>
                <tr>
                    <td style="text-align: left; color: #ae0a46;padding-left: 2rem;">NGen IT Sales Team</td>
                    <td style="text-align: right; color: #ae0a46;padding-right: 2rem;">(skype) +1 917-720-3055</td>
                </tr>
                <tr>
                    <td style="text-align: left; color: #ae0a46; padding-bottom: 2rem;padding-left: 2rem;">Manager,
                        Business</td>
                    <td style="text-align: right; color: #ae0a46; padding-bottom: 2rem;padding-right: 2rem;">(whats app)
                        +880 1714 243446</td>
                </tr>
            </tbody>
        </table>
        <!-- Quotation Header Table -->
        <table width="100%" class="table-responsive border-0 quotation-header-table footer-table" style="">
            <tr class="quotation-header">
                <!-- Text Column -->
                <td class="text-column" style="text-align: center;padding: 30px;">
                    <div class="header-register" style="text-align: center">
                        <!-- Company Details -->
                        <h2 class="">www.ngenitltd.com</h2>
                    </div>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </table>

        <!-- Additional details or content can be added here -->
    </div>
</body>

</html>
