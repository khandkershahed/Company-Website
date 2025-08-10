<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Price Quotation</title>
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        a {
            color: #3d3d3d;
            text-decoration: none;
        }

        p {
            font-family: "Poppins", sans-serif;
        }

        @media only screen and (min-width: 620px) {
            .u-row {
                width: 600px !important;
            }

            @media print {
                body {
                    background: none;
                }
            }
        }
    </style>
</head>

<body class="clean-body u_body" style="margin: 0; padding: 0; background-color: #f4f4f4">
    <table cellpadding="0" cellspacing="0"
        style="border-collapse: collapse;width: 70%;max-width: 70%;margin: 0 auto;background-color: white;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
        <tr>
            <td>
                <!-- Your email content goes here -->
                <section
                    tyle="margin-top: 0rem; margin-bottom: 0rem; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                    <!-- Email Header Start -->
                    <div class="wrapper" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Email Header Start -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;background-color: #ae0a46; "
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr style="vertical-align: top">
                                        <td style="padding: 15px 30px 10px; text-align: left">
                                            <a href="https://ngenitltd.com" target="_blank">
                                                <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="Ngen IT"
                                                    title="Ngen IT"
                                                    style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 110px;"
                                                    width="60" />
                                            </a>
                                        </td>
                                        <td style="padding: 35px 30px 25px;text-align:right;color:#ffffff">
                                            <p style="font-size: 2em;font-weight: 600;margin-bottom: 0; ">
                                                {{$data['quotation_title']}}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Main Content Start -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <div style="text-align: left;padding: 15px;">
                                            <h4 style="text-align: left; font-size: 18px; color: #141414;">Hello {{$data['name']}},</h4>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div style="text-align: left;padding: 15px;">
                                            <p style="text-align: left; font-size: 18px; color: #141414;">
                                                We have generated a Quotation ({{$data['rfq_code']}}) against your query. To see the price quotation click here.
                                            </p>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Main Content End -->
                        <div style="overflow-x: auto">
                            <hr class="m-0 p-0" style="border-top: 1px solid #eee;">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    {{-- <tr>
                                        <div style="text-align: center;padding: 15px; padding-bottom: 5px;">
                                            <p style="text-align: center; font-size: 16px; color: #141414;">
                                                See Price Quotation.
                                            </p>
                                        </div>
                                    </tr> --}}
                                    <tr>
                                        <div
                                            style="text-align: center;padding: 15px; padding-bottom: 5px; padding-top: 30px">
                                            <strong>
                                                <a href="{{ route('quotation.link', $data['rfq_code']) }}"
                                                    style="color: #FFF;border: 1px solid #ae0a46;background-color: #ae0a46;transition: all 0.8s ease-in-out;padding: 10px 40px;                                cursor: pointer;                                font-size: 18px;                                font-weight: 500;">
                                                    Price Quotation</a>
                                            </strong>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div style="text-align: center;padding: 30px; width: 70%; margin: auto">
                                            <strong>NB:</strong> Your Quotation link will expire within 14 days. Thanks for being attached with us.
                                        </div>
                                    </tr>
                                    {{-- <tr>
                                        <div
                                            style="text-align: center;padding: 15px; padding-bottom: 15px; width: 70%; margin: auto">
                                            <p
                                                style="text-align: center; font-size: 14px; color: #141414; padding-bottom: 15px;">
                                                If you are having trouble with "Price Quotation" button, please copy and
                                                paste the below URL into your web browser:
                                            </p>


                                            <a href="{{ route('quotation.link', $data['rfq_code']) }}"
                                                style="color: #ae0a46; font-size:16px; padding-top: 10px">https://ngenitltd.com/quotation/link/{{ $data['rfq_code'] }}</a>
                                        </div>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <hr class="m-0 p-0" style="border:none; border-bottom: 1px solid #d3d3d3;">
                        </div>
                        <!-- Column Area -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <td style="padding: 0">
                                            <table style="width: 100%; border-collapse: collapse">
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="padding: 15px;padding-left: 30px;padding-right: 30px;background-image: url(https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg);background-size: cover;">
                                                            <table style="width: 100%;border-collapse: collapse;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="text-align: start;color: #ffffff;">
                                                                            <p
                                                                                style="font-size: 15px;font-weight: 600;padding-bottom: 0.5rem;margin: 0;color: #000;">
                                                                                {{ $data['quotation']->thank_you_text }}
                                                                            </p>
                                                                            <p style="color: #ae0a46; margin: 0">
                                                                                {{ $data['quotation']->sender_name }}
                                                                            </p>
                                                                            <p
                                                                                style="color: #ae0a46;font-size: 15px;margin: 0;">
                                                                                {{ $data['quotation']->sender_designation }}
                                                                            </p>
                                                                        </td>
                                                                        <td style="text-align: end;color: #ffffff;">
                                                                            <div
                                                                                style="font-size: 15px;margin-bottom: 0.5rem;">
                                                                                <p style="margin: 0; color: #ae0a46">
                                                                                    sales@ngenitltd.com
                                                                                    <i class="fa-solid fa-paper-plane"></i>
                                                                                </p>
                                                                            </div>
                                                                            @if (!empty($data['quotation']->ngen_number_two))
                                                                                <div
                                                                                    style="font-size: 15px;margin-bottom: 0.5rem;">
                                                                                    <p
                                                                                        style="margin: 0; padding: 0; color: #ae0a46">
                                                                                         {{ $data['quotation']->ngen_number_two }}
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (!empty($data['quotation']->ngen_whatsapp_number))
                                                                                <div style="font-size: 15px">
                                                                                    <p
                                                                                        style="margin: 0; padding: 0; color: #ae0a46">
                                                                                        <a href="https://wa.me/{{ $data['quotation']->ngen_whatsapp_number }}"
                                                                                            style="color: inherit; text-decoration: none;">
                                                                                             {{ $data['quotation']->ngen_whatsapp_number }}
                                                                                        </a>
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Column Area End -->
                        <!-- Email Footer -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <div style="text-align: center;background-color: #ae0a46;padding: 15px;">
                                            <a class="" href="www.ngenitltd.com"
                                                style="color: #ffff;font-size: 18px;text-align: center;letter-spacing: 4px;">www.ngenitltd.com</a>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Email Footer End-->
                    </div>
                </section>
                <!-- Your email content goes here -->
            </td>
        </tr>
    </table>
</body>

</html>
