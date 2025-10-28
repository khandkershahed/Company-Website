<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>RFQ Notification</title>
    <style>
        @media only screen and (max-width: 620px) {
            .u-row {
                width: 100% !important;
            }

            .u-col {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
            }

            .mail-footers {
                font-size: 12px !important;
            }

            .u-col td {
                display: block !important;
                width: 100% !important;
            }

            .u-full-width {
                width: 100% !important;
                max-width: 100% !important;
            }

            .stack-table td {
                display: block;
                width: 100% !important;
                padding-right: 0px !important;
                padding-left: 0px !important;

            }

            .u-col tr td {
                padding-left: 10px !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; background:#f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f4f4f4;">
        <tr>
            <td align="center">
                <table class="u-row" cellpadding="0" cellspacing="0" border="0"
                    style="width:100%; max-width:620px; margin:0 auto; background:#fff;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color:#ae0a46; padding:15px;">
                            <table width="100%">
                                <tr>
                                    <td align="left" style="vertical-align:top;">
                                        <a href="https://ngenitltd.com" target="_blank">
                                            <img src="{{ asset('images/NGen-Logo-white.png') }}" alt=""
                                                style="display:block; max-width:110px; height:auto;">
                                        </a>
                                    </td>
                                    <td align="right" style="color:#ffffff;">
                                        <p style="font-size:2em; font-weight:600; margin:0;">Deal</p>
                                        <p style="font-size:1.18em; font-weight:600; margin:0;">Created</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:30px;">
                            <div>
                                <p style="font-size:16px; margin-bottom:10px;">
                                    Dear <strong>Sales Manager</strong>,
                                </p>
                                <p style="font-size:16px; margin-top:0;">
                                   {{ $data['deal_creator']}} has created a deal right now. Please respond immediately for best customer service and
                                    reputation.
                                </p>
                            </div>

                            <!-- Product Table -->
                            <table class="u-full-width" width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="margin-top:30px; margin-bottom:30px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px; font-size: 12px;">
                                <tr style="background-color:#d3d3d3;">
                                    <th style="padding:10px; text-align:center;">Sl.</th>
                                    <th style="padding:10px; text-align:left;">Product Name</th>
                                    <th style="padding:10px; text-align:center;">Qty</th>
                                </tr>
                                @foreach ($data['product_names'] as $product_name)
                                    <tr>
                                        <td style="padding:10px; border:1px solid #eee;text-align:center">
                                            {{ $loop->iteration }}</td>
                                        <td style="padding:10px; border:1px solid #eee;">
                                            {{ $product_name->product_name }}
                                        </td>
                                        <td style="padding:10px; border:1px solid #eee; text-align:center">
                                            {{ $product_name->qty }}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <!-- First row: Company & Shipping -->
                            <table class="stack-table" width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="margin-top:10px; table-layout:fixed;">
                                <tr>
                                    <!-- Company Info -->
                                    <td class="u-col" valign="top" width="50%"
                                        style="padding-right:10px; font-size: 12px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px;">
                                            <tr>
                                                <th colspan="2"
                                                    style="background-color:#d3d3d3; padding:10px; font-size:14px; text-align:center;">
                                                    Company Info
                                                </th>
                                            </tr>
                                            @if (!empty($data['company_name']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">
                                                        Company</th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['company_name'] }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if (!empty($data['phone']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">
                                                        Telephone</th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['phone'] }}
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                    class="mb-content">Email
                                                </th>
                                                <td style="padding:10px;border-bottom:1px solid #eee;"><a
                                                        href="mailto:{{ $data['email'] }}" target="_blank"
                                                        style="color:#ae0a46;">{{ $data['email'] }}</a></td>
                                            </tr>
                                            {{-- <tr>
                                                <th
                                                    style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400; ">
                                                    Reseller</th>
                                                <td style="padding:10px;border-bottom:1px solid #eee;">No</td>
                                            </tr> --}}
                                        </table>
                                    </td>
                                    <!-- Shipping Info -->
                                    <td class="u-col" valign="top" width="50%"
                                        style="padding-left:10px; font-size: 12px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px;">
                                            <tr>
                                                <th colspan="2"
                                                    style="background-color:#d3d3d3; padding:10px; font-size:14px; text-align:center;">
                                                    Shipping Info
                                                </th>
                                            </tr>
                                            @if (isset($data['shipping_country']) && !empty($data['shipping_country']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">
                                                        Country</th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['shipping_country'] }}</td>
                                                </tr>
                                            @endif
                                            @if (isset($data['shipping_city']) && !empty($data['shipping_city']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">City
                                                    </th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['shipping_city'] }}</td>
                                                </tr>
                                            @endif
                                            @if (isset($data['shipping_zip_code']) && !empty($data['shipping_zip_code']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">Zip
                                                    </th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['shipping_zip_code'] }}</td>
                                                </tr>
                                            @endif
                                            @if (isset($data['shipping_address']) && !empty($data['shipping_address']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">
                                                        Address</th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['shipping_address'] }}</td>
                                                </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Second row: End-Us & Additional -->
                            <table class="stack-table" width="100%" cellpadding="0" cellspacing="0"
                                border="0" style="margin-top:10px; table-layout:fixed;">
                                <tr>
                                    <!-- End-Us Info -->
                                    <td class="u-col" valign="top" width="50%"
                                        style="padding-right:10px; font-size: 12px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px;">
                                            <tr>
                                                <th colspan="2"
                                                    style="background-color:#d3d3d3; padding:10px; font-size:14px; text-align:center;">
                                                    End User Info
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                    class="mb-content">Name
                                                </th>
                                                <td style="padding:10px;border-bottom:1px solid #eee;">
                                                    {{ $data['end_user_name'] }}
                                                </td>
                                            </tr>
                                            @if (!empty($data['end_user_phone']))
                                                <tr>
                                                    <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                        class="mb-content">
                                                        Telephone</th>
                                                    <td style="padding:10px;border-bottom:1px solid #eee;">
                                                        {{ $data['end_user_phone'] }}
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;width:90px;"
                                                    class="mb-content">Email
                                                </th>
                                                <td style="padding:10px;"><a href="mailto:{{ $data['end_user_email'] }}"
                                                        target="_blank"
                                                        style="color:#ae0a46;border-bottom:1px solid #eee;">{{ $data['end_user_email'] }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background:#f1f1f1;padding:10px; text-align:left; font-weight:400;">
                                                    Designation</th>
                                                <td style="padding:10px;border-bottom:1px solid #eee;">{{ $data['end_user_designation'] }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!-- Additional Info -->
                                    <td class="u-col" valign="top" width="50%"
                                        style="padding-left:10px; font-size: 12px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px;">
                                            <tr>
                                                <th colspan="2"
                                                    style="background-color:#d3d3d3; padding:10px; font-size:14px; text-align:center;">
                                                    Additional Info
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="background:#f1f1f1; padding:10px; text-align:left; font-weight:400; width:90px;"
                                                    class="mb-content">
                                                    Project</th>
                                                <td style="padding:10px; border-bottom:1px solid #eee;">{{ $data['project_name'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="background:#f1f1f1; padding:10px; text-align:left; font-weight:400; width:90px;"
                                                    class="mb-content">
                                                    Status</th>
                                                <td style="padding:10px; border-bottom:1px solid #eee;">{{ $data['project_status'] }}</td>
                                            </tr>
                                            <tr>
                                                <th style="background:#f1f1f1; padding:10px; text-align:left; font-weight:400; width:90px;"
                                                    class="mb-content">
                                                    Budget</th>
                                                <td style="padding:10px; border-bottom:1px solid #eee;">{{ $data['budget'] }}</td>
                                            </tr>
                                            <tr>
                                                <th style="background:#f1f1f1; padding:10px; text-align:left; font-weight:400; width:90px;"
                                                    class="mb-content">
                                                    Purchase</th>
                                                <td style="padding:10px; border-bottom:1px solid #eee;">{{ $data['approximate_delivery_time'] }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Button -->
                            <div style="text-align:center; margin-top:30px;">
                                <a href="{{ route('single-rfq.quoation_mail', $data['rfq_code']) }}"
                                    style="background-color:#ae0a46; color:#fff; padding:12px 35px; font-size:16px; display:inline-block; border-radius:4px; text-decoration:none;">
                                    Quote
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f9f9f9; padding:20px 30px;">
                            <table width="100%">
                                <tr>
                                    <td class="mail-footers" style="font-size:14px; width:50%; vertical-align:top;">
                                        <p style="margin:0 0 10px;"><strong>Thank You</strong></p>
                                        <p style="margin:0;color:#ae0a46;">NGEN IT SALES TEAM<br>Manager, Business</p>
                                    </td>
                                    <td class="mail-footers"
                                        style="text-align:right; font-size:14px; width:50%; vertical-align:top;">

                                        <p style="margin:0;">
                                            <a href="tel:+19177203055" target="_blank"
                                                style="color:#ae0a46; text-decoration: none">(☏) +1
                                                917-720-3055</a>
                                        </p>
                                        <p style="margin:0;">
                                            <a href="tel:+8801714243446" target="_blank"
                                                style="color:#ae0a46; text-decoration: none">(✆) +880 1714
                                                243446</a>
                                        </p>
                                        <p style="margin:0;">
                                            <a href="mailto:sales@ngenitltd.com" target="_blank"
                                                style="color:#ae0a46; text-decoration: none">
                                                (✉) sales@ngenitltd.com
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>

                    <!-- Website -->
                    <tr>
                        <td style="background-color:#ae0a46; text-align:center; padding:15px;">
                            <a href="http://www.ngenitltd.com"
                                style="color:#fff; font-size:18px; text-decoration:none;">www.ngenitltd.com</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
