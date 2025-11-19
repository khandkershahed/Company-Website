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
                                        <p style="font-size:2em; font-weight:600; margin:0;">RFQ</p>
                                        <p style="font-size:1.18em; font-weight:600; margin:0;">Reminder</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:30px;">
                            <div>
                                <h2 style="color: #2c3e50;">⏰ RFQ Reminder: {{ $rfq->rfq_code }}</h2>

                                <p style="color: #555;">
                                    Hello Admin,<br><br>
                                    This is a friendly reminder that the following RFQ has been pending for more than
                                    <strong>24 hours</strong>
                                    without response:
                                </p>
                            </div>


                            <table style="width:100%; border-collapse: collapse; margin: 20px 0;">
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #eee;"><strong>RFQ Code</strong></td>
                                    <td style="padding: 8px; border: 1px solid #eee;">{{ $rfq->rfq_code }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #eee;"><strong>Customer Name</strong>
                                    </td>
                                    <td style="padding: 8px; border: 1px solid #eee;">{{ $rfq->name }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #eee;"><strong>Email</strong></td>
                                    <td style="padding: 8px; border: 1px solid #eee;">{{ $rfq->email }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #eee;"><strong>Submitted On</strong></td>
                                    <td style="padding: 8px; border: 1px solid #eee;">
                                        {{ $rfq->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </table>


                            <!-- Button -->
                            <div style="text-align:center; margin-top:30px;">
                                <a href="{{ route('admin.single-rfq.quoation_mail', $data['rfq_code']) }}"
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
                                                style="color:#ae0a46; text-decoration: none">(✆) +880
                                                1714
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
