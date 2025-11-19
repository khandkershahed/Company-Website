<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="x-apple-disable-message-reformatting" />
    <title>RFQ Reminder</title>

    <style>
        @media only screen and (max-width: 620px) {
            .u-row {
                width: 100% !important;
            }

            .u-col {
                display: block !important;
                width: 100% !important;
            }

            .mail-footers {
                font-size: 12px !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; background:#f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;">
        <tr>
            <td align="center">

                <table cellpadding="0" cellspacing="0"
                    style="width:100%; max-width:620px; background:#fff; margin:0 auto;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#ae0a46; padding:15px;">
                            <table width="100%">
                                <tr>
                                    <td align="left">
                                        <a href="https://ngenitltd.com" target="_blank">
                                            <img src="{{ asset('images/NGen-Logo-white.png') }}"
                                                style="max-width:110px; height:auto;">
                                        </a>
                                    </td>

                                    <td align="right" style="color:#fff;">
                                        <p style="font-size:2em; font-weight:600; margin:0;">RFQ</p>
                                        <p style="font-size:1.18em; font-weight:600; margin:0;">Reminder</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px;">

                            <h2 style="color:#2c3e50;">⏰ {{ $hours }}-Hour RFQ Reminder</h2>

                            <p style="color:#555;">
                                Hello Admin,<br><br>
                                This is a friendly reminder that the following RFQ has been pending for more than
                                <strong>{{ $hours }} hours</strong>
                                without a quotation response:
                            </p>

                            <table style="width:100%; border-collapse:collapse; margin-top:20px;">
                                <tr>
                                    <td style="border:1px solid #eee; padding:8px;"><strong>RFQ Code</strong></td>
                                    <td style="border:1px solid #eee; padding:8px;">{{ $rfq->rfq_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid #eee; padding:8px;"><strong>Customer Name</strong></td>
                                    <td style="border:1px solid #eee; padding:8px;">{{ $rfq->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid #eee; padding:8px;"><strong>Email</strong></td>
                                    <td style="border:1px solid #eee; padding:8px;">{{ $rfq->email }}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid #eee; padding:8px;"><strong>Submitted On</strong></td>
                                    <td style="border:1px solid #eee; padding:8px;">
                                        {{ $rfq->created_at->format('d M Y, h:i A') }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Button -->
                            <div style="text-align:center; margin-top:30px;">
                                <a href="{{ route('admin.single-rfq.quoation_mail', $rfq->rfq_code) }}"
                                    style="background:#ae0a46; color:#fff; padding:12px 35px; font-size:16px; text-decoration:none; border-radius:4px; display:inline-block;">
                                    Send Quotation
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f9f9f9; padding:20px 30px;">
                            <table width="100%">
                                <tr>
                                    <td style="font-size:14px; color:#333;">
                                        <p style="margin:0 0 10px;"><strong>Thank You</strong></p>
                                        <p style="margin:0; color:#ae0a46;">NGEN IT SALES TEAM</p>
                                        <p style="margin:0;">Manager, Business</p>
                                    </td>

                                    <td style="font-size:14px; text-align:right;">
                                        <p style="margin:0;">
                                            <a href="tel:+19177203055" style="color:#ae0a46;">(☏) +1 917-720-3055</a>
                                        </p>
                                        <p style="margin:0;">
                                            <a href="tel:+8801714243446" style="color:#ae0a46;">(✆) +880 1714 243446</a>
                                        </p>
                                        <p style="margin:0;">
                                            <a href="mailto:sales@ngenitltd.com" style="color:#ae0a46;">(✉)
                                                sales@ngenitltd.com</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="background:#ae0a46; text-align:center; padding:15px;">
                            <a href="https://www.ngenitltd.com"
                                style="color:#fff; font-size:18px; text-decoration:none;">
                                www.ngenitltd.com
                            </a>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
</body>

</html>
