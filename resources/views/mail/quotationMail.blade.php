<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Price Quotation</title>
</head>

<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,sans-serif;">
    <table role="presentation" style="border-collapse:collapse;width:100%;max-width:700px;margin:auto;background:white;">
        <!-- Header -->
        <tr>
            <td style="background-color:#ae0a46;color:#fff;padding:20px;">
                <table width="100%" style="border-collapse:collapse;">
                    <tr>
                        <td>
                            <a href="https://ngenitltd.com">
                                <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="Ngen IT" style="max-width:110px;height:auto;display:block;">
                            </a>
                        </td>
                        <td style="font-size:24px;font-weight:bold;text-align:right;">{{$data['quotation_title']}}</td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Content -->
        <tr>
            <td style="padding:20px;font-size:16px;color:#141414;">
                <h4 style="margin-top:0;">Hello {{$data['name']}},</h4>
                <p> We have generated a Quotation ({{$data['rfq_code']}}) against your query. To see the price quotation click here.</p>
                <p style="text-align:center;">
                    <a href="{{ route('quotation.link', $data['rfq_code']) }}" style="display:inline-block;padding:12px 30px;background-color:#ae0a46;color:#fff !important;text-decoration:none;font-weight:500;margin:20px 0;">Price Quotation</a>
                </p>
                <p style="text-align:center;font-size:14px;">
                    <strong>NB:</strong> Your Quotation link will expire within 14 days. Thanks for being attached with us.
                </p>
            </td>
        </tr>

        <!-- Footer Contact -->
        <tr>
            <td style="background-image:url(https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg);background-size:cover;padding:20px;font-size:14px;color:#000;">
                <table width="100%" style="border-collapse:collapse;">
                    <tr>
                        <td style="vertical-align:top;">
                            <p style="font-weight:600;margin:5px 0;">{{ $data['quotation']->sender_name ?? 'Adan Mahmud' }}</p>
                            <p style="color:#000;margin:5px 0;">{{ $data['quotation']->sender_designation ?? 'Sr. Manager'}}</p>
                            <p style="color:#000;margin:5px 0;">Partner &amp; Business Development</p>
                        </td>
                        <td style="vertical-align:top;">
                            <p style="margin:5px 0;">sales@ngenitltd.com</p>
                            @if (!empty($data['quotation']->ngen_whatsapp_number))
                            <p style="margin:5px 0;">
                                <a href="https://wa.me/{{ $data['quotation']->ngen_whatsapp_number }}" style="text-decoration:none;color:#000;">
                                    {{ $data['quotation']->ngen_whatsapp_number }} (WhatsApp)</a>
                            </p>
                            @endif
                            @if (!empty($data['quotation']->ngen_number_two))
                            <p style="margin:5px 0;">{{ $data['quotation']->ngen_number_two }} (Skype)</p>
                            @endif
                        </td>
                        <td style="color:#ae0a46;vertical-align:top;">
                            <p style="font-weight:600;margin:5px 0;">NGEN PTE. Ltd.</p>
                            <p style="margin:5px 0;">Reg-no: 20434861K</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Footer Site -->
        <tr>
            <td style="background-color:#ae0a46;color:#fff;padding:15px;text-align:center;font-size:16px;letter-spacing:2px;">
                <a href="https://www.ngenitltd.com" style="color:#fff;text-decoration:none;">www.ngenitltd.com</a>
            </td>
        </tr>
    </table>
</body>

</html>