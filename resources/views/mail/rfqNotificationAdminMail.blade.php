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
        style="
        border-collapse: collapse;
        width: 70%;
        max-width: 70%;
        margin: 0 auto;
        background-color: white;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
      ">
        <tr>
            <td>
                <!-- Your email content goes here -->
                <section
                    style="margin-top: 0rem; margin-bottom: 0rem; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                    <!-- Email Header Start -->
                    <div class="wrapper" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Email Header Start -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="
                    border-collapse: collapse;
                    table-layout: fixed;
                    border-spacing: 0;
                    vertical-align: top;
                    min-width: 320px;
                    margin: 0 auto;
                    width: 100%;
                    background-color: #ae0a46;
                  "
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr style="vertical-align: top">
                                        <td style="padding: 10px 30px; text-align: left">
                                            <a href="https://ngenitltd.com" target="_blank">
                                                <img src="https://i.ibb.co/qMMpQMj/Logo-White.png" alt="Ngen IT"
                                                    title="Ngen IT"
                                                    style="
                              outline: none;
                              text-decoration: none;
                              -ms-interpolation-mode: bicubic;
                              clear: both;
                              display: inline-block !important;
                              border: none;
                              height: auto;
                              float: none;
                              width: 100%;
                              max-width: 110px;
                            "
                                                    width="60" />
                                            </a>
                                        </td>
                                        <td
                                            style="
                          padding: 25px 30px 0px;
                          text-align: right;
                          color: #ffffff;
                        ">
                                            <p
                                                style="
                            font-size: 2.5em;
                            font-weight: 600;
                            margin-bottom: 0;
                          ">
                                                RFQ
                                            </p>
                                            <!-- <p style="font-size: 16px; margin-bottom: 3px">
                          REG.NO. <span style="color: #eee">20437861K</span>
                        </p> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Email Header End -->
                        <!-- Main Content Start -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">

                                    <tr>
                                        <div style="text-align: left; padding: 3rem 2rem;">
                                            <p style="text-align: left; font-size: 18px; color: #141414;">
                                                We have received a new query. We need to respond to the query as soon as
                                                possible.
                                            </p>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div style="overflow-x: auto; margin-bottom:10px;">
                            <hr class="m-0 p-0" style="padding-bottom:1rem; border: none; border-top: 1px solid #eee;">
                            <table id="u_body"
                                style="border: 1px solid #eee;border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 70%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">

                                    <tr>
                                        <th
                                            style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            Product Name</th>
                                        <td
                                            style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            {{ $data['name'] }}</td>
                                    </tr>
                                    @if (!empty($data['qty']))
                                        <tr>
                                            <th
                                                style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;font-size:15px;text-align:left">
                                                Quantity</th>
                                            <td
                                                style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                                {{ $data['qty'] }}</td>
                                        </tr>
                                    @endif

                                    @if (!empty($data['message']))
                                        <tr>
                                            <th
                                                style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;font-size:15px;text-align:left">
                                                Inquiry Details</th>
                                            <td
                                                style="padding:10px 15px;border-top:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                                {{ $data['message'] }}
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th
                                            style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;font-size:15px;text-align:left">
                                            Customer Name</th>
                                        <td
                                            style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            {{ $data['name'] }}</td>
                                    </tr>
                                    @if (!empty($data['company_name']))
                                        <tr>
                                            <th
                                                style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;font-size:15px;text-align:left">
                                                Customer Company</th>
                                            <td
                                                style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                                {{ $data['company_name'] }}</td>
                                        </tr>
                                    @endif

                                    @if (!empty($data['phone']))
                                        <tr>
                                            <th
                                                style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;font-size:15px;text-align:left">
                                                Customer Telephone</th>
                                            <td
                                                style="width: 30%;padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                               {{ $data['phone'] }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th
                                            style="border-bottom:1px solid #e7e7e7;width: 30%;background-color:#f1f1f1;padding:10px 15px;font-size:15px;text-align:left">
                                            Customer Email</th>
                                        <td
                                            style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            <a href="mailto:{{ $data['email'] }}"
                                                target="_blank">{{ $data['email'] }}</a></td>
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
                                    <tr>
                                        <div style="text-align: center;padding: 15px;padding-bottom: 5px;">
                                            <p style="text-align: center; font-size: 16px; color: #141414;">
                                                If you want to Bypass step by step Process. click here. <a
                                                    href="{{ route('single-rfq.quoation_mail', $data['rfq_code']) }}"
                                                    style="color: #ae0a46; font-size:18px">Bypass Process</a>
                                            </p>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div style="text-align: center;padding: 15px;padding-bottom: 15px;">
                                            <p style="text-align: center; font-size: 16px; color: #141414;">
                                                If you want to go step by step Process. click here. <a
                                                    href="{{ route('single-rfq.show', $data['rfq_code']) }}"
                                                    style="color: #ae0a46; font-size:18px">Details Process</a>
                                            </p>
                                        </div>
                                    </tr>
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
                                                                                Thank You
                                                                            </p>
                                                                            <p style="color: #ae0a46; margin: 0">
                                                                                NGEN IT SALES TEAM
                                                                            </p>
                                                                            <p
                                                                                style="color: #ae0a46;font-size: 15px;margin: 0;">
                                                                                Manager, Business
                                                                            </p>
                                                                        </td>
                                                                        <td style="text-align: end;color: #ffffff;">
                                                                            <div
                                                                                style="font-size: 15px;margin-bottom: 0.5rem;">
                                                                                <p style="margin: 0; color: #ae0a46">
                                                                                    sales@ngenitltd.com
                                                                                    <i
                                                                                        class="fa-solid fa-paper-plane"></i>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                style="font-size: 15px;margin-bottom: 0.5rem;">
                                                                                <p
                                                                                    style="margin: 0; padding: 0; color: #ae0a46">
                                                                                    (skype) +1 917-720-3055
                                                                                </p>
                                                                            </div>
                                                                            <div style="font-size: 15px">
                                                                                <p
                                                                                    style="margin: 0; padding: 0; color: #ae0a46">
                                                                                    (whats app) +880 1714 243446
                                                                                </p>
                                                                            </div>
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
                                style="
                    border-collapse: collapse;
                    table-layout: fixed;
                    border-spacing: 0;
                    vertical-align: top;
                    min-width: 320px;
                    margin: 0 auto;
                    width: 100%;
                  "
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <div
                                            style="
                          text-align: center;
                          background-color: #ae0a46;
                          padding: 15px;
                        ">
                                            <a class="" href="www.ngenitltd.com"
                                                style="
                            color: #ffff;
                            font-size: 18px;
                            text-align: center;
                            letter-spacing: 4px;
                          ">www.ngenitltd.com</a>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Email Footer End-->
                    </div>
                    <!-- ... -->
                </section>
            </td>
        </tr>
    </table>
</body>

</html>
