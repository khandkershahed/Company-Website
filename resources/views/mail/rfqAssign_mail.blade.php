<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFQ Notification</title>
</head>

<body>
    <!-- Main Area -->
    <div class="main" style="width:50vw; margin:0 auto;  padding: 5px 10px 10px 10px;">
        <table cellpadding="0" cellspacing="0" border="0"
            style="background:#fff;border-collapse:collapse;width:650px;margin:0px;border:1px solid rgb(224,224,224);padding:0px;color:#333;text-align:center;font-family:Arial,Helvetica,sans-serif;text-align:center">
            <tbody>
                <tr>
                    <td style="background-color:#ae0a46; padding:15px;">
                        <table width="100%">
                            <tr>
                                <td align="left" style="vertical-align:top;">
                                    <a href="https://ngenitltd.com" target="_blank">
                                        <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="NGen IT Logo"
                                            style="display:block; max-width:110px; height:auto;">
                                    </a>
                                </td>
                                <td align="right" style="color:#ffffff;">
                                    {{-- <p style="font-size:2em; font-weight:600; margin:0;">Sales</p> --}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;padding:15px 15px 5px 15px;font-size:18px">
                        Hello,
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;padding:0 15px 15px 15px;font-size:12px;color:#666;line-height:1.5">
                        We have received a new RFQ and it is assigned to you by Admin.
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 15px">
                        <p>The following is your short Details of the RFQ:</p>

                        <table cellpadding="0" cellspacing="0" border="0" style="width:620px">

                            <tbody>
                                <tr>
                                    <th
                                        style="min-width:100px;max-width:200px;background-color:#f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        Product Name</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        &nbsp; {{ $data['product_name'] }}</td>
                                </tr>


                                <tr>
                                    <th
                                        style="min-width:100px;max-width:200px;background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                        Client Name</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        &nbsp; {{ $data['name'] }}</td>
                                </tr>

                                <tr>
                                    <th
                                        style="background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                        Client Email</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        &nbsp; <a href="mailto:{{ $data['email'] }}"
                                            target="_blank">{{ $data['email'] }}</a></td>
                                </tr>


                                @if (!empty($data['company_name']))
                                    <tr>
                                        <th
                                            style="background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                            Company</th>
                                        <td
                                            style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                            &nbsp; {{ $data['company_name'] }}</td>
                                    </tr>
                                @endif

                                @if (!empty($data['phone']))
                                    <tr>
                                        <th
                                            style="background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                            Telephone</th>
                                        <td
                                            style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                            &nbsp; {{ $data['phone'] }}</td>
                                    </tr>
                                @endif



                                <tr>
                                    <th
                                        style="background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                        Inquiry Details</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">

                                        {{ $data['message'] }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:15px;text-align:center;font-size:12px">
                        <div style="padding-bottom:5px;margin-bottom:10px;margin-top:15px;font-size:14px !important;">
                            <strong>
                                <a href="{{ route('single-rfq.quoation_mail', $data['rfq_code']) }}"
                                    style="color: #FFF;
                                border: 1px solid #ae0a46;
                                background-color: #ae0a46;
                                transition: all 0.8s ease-in-out;padding: 10px 40px;
                                cursor: pointer;
                                font-size: 18px;
                                font-weight: 500;">
                                    Check the RFQ</a>
                            </strong>
                        </div>

                    </td>
                </tr>


                <tr>
                    <td style="padding:15px 0;text-align:center;background-color:#eaeaea;font-size:14px">
                        Thank you, from <strong>ngenitltd.com</strong> Admin team.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
