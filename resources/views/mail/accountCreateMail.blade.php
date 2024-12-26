<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Account Registration</title>
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
                                        <td style="padding:10px 25px; text-align: left">
                                            <a href="https://ngenitltd.com" target="_blank">
                                                <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="Ngen IT"
                                                    title="Ngen IT"
                                                    style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width:90px;max-width: 180px;" />
                                            </a>
                                        </td>
                                        <td style="padding:10px 25px;text-align:right;color:#ffffff">

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
                                <tbody style="min-width: 320px;">
                                    <tr>
                                        <div style="text-align: left;padding: 15px;">
                                            <h4 style="text-align: left; font-size: 18px; color: #141414;">Dear
                                                {{ $data['name'] }}</h4>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div style="text-align: left;padding: 15px;">
                                            <p style="text-align: left; font-size: 18px; color: #141414;">
                                                Your account has been successfully created. Below the email and password
                                                are given, by which you can login to your
                                                @if ($data['user_type'] == 'client')
                                                    <a href="{{ route('client.login') }}"
                                                        style="color: #ae0a46; font-size:16px">
                                                        Client portal.
                                                    </a>
                                                @else
                                                    <a href="{{ route('showLoginForm') }}"
                                                        style="color: #ae0a46; font-size:16px">
                                                        Partner portal.
                                                    </a>
                                                @endif
                                            </p>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="overflow-x: auto; margin-bottom:20px; margin-top:20px,">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;margin: 0 auto;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px;border-left:1px solid #f1f1f1;">
                                    <tr style="">
                                        <th
                                            style="width: 30%;background-color:#f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            Email</th>
                                        <td
                                            style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            {{ $data['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <th
                                            style="border-bottom:1px solid #f1f1f1;width: 30%;background-color:#f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            Password</th>
                                        <td
                                            style="border-bottom:1px solid #f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:15px;text-align:left">
                                            {{ $data['password'] }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- Main Content End -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <td style="padding:15px;text-align:center;font-size:12px">
                                            <p style="text-align: center; font-size: 14px; color: #141414;">
                                                To login to your account @if ($data['user_type'] == 'client')
                                                    <a href="{{ route('client.login') }}"
                                                        style="color: #ae0a46; font-size:16px">
                                                        Click here..
                                                    </a>
                                                @else
                                                    <a href="{{ route('showLoginForm') }}"
                                                        style="color: #ae0a46; font-size:16px">
                                                        Click here..
                                                    </a>
                                                @endif
                                            </p>
                                        </td>
                                        <td style="padding:15px;text-align:center;font-size:12px">
                                            <p style="text-align: center; font-size: 14px; color: #141414;">
                                                To change password @if ($data['user_type'] == 'client')
                                                    <a href="{{ route('client.profile') }}"
                                                        style="color: #ae0a46; font-size:16px">
                                                        Click here..
                                                    </a>
                                                @else
                                                    <a href="{{ route('client.profile') }}"
                                                        style="color: #ae0a46; font-size:16px">
                                                        Click here..
                                                    </a>
                                                @endif
                                            </p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- Column Area -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;width: 100%;"
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <div style="text-align: left;padding: 15px;">
                                            <h4
                                                style="text-align: left; font-size: 17px; color: #141414; margin-bottom:8px;">
                                                Thank You</h4>
                                            <p style="text-align: left; font-size: 15px; color: #141414;">NGen IT
                                                Support Team</h4>
                                        </div>
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
