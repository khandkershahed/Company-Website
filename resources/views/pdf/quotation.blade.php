<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Price Quotation</title>
    <style>
        /* Basic reset for Dompdf */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Montserrat, sans-serif;
            font-size: 14px;
            height: 100%;
            width: 210mm;
            box-sizing: border-box;
        }
    </style>
</head>

<body style="margin:0; padding:0; width:210mm; font-family: Montserrat, sans-serif; font-size: 14px;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
        style="border-collapse: collapse; width: 210mm; height: 297mm;">
        <!-- Header -->
        <tr>
            <td style="background-color: #ae0a46; height: 61px; padding: 0 30px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                    style="border-collapse: collapse;">
                    <tr>
                        <td style="vertical-align: middle;">
                            <img src="https://www.ngenitltd.com/frontend/images/white_logo.png" alt="Logo"
                                style="height: 40px; display: block;" />
                        </td>
                        <td
                            style="color: white; font-weight: 700; font-size: 24px; text-align: center; vertical-align: middle; position: relative; left: -65px;">
                            Price Quotation
                        </td>
                        <td style="width: 40px;"></td> <!-- Empty cell for spacing -->
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Content -->
        <tr>
            <td
                style="padding: 30px 30px 0 30px; border-left: 1px solid #eee; border-right: 1px solid #eee; vertical-align: top;">

                <!-- Company Info Table -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                    style="border-collapse: collapse;">
                    <tr>
                        <td style="font-weight: 500; width: 65%; border: none; padding: 0;">Acme Corporation</td>
                        <td style="font-weight: 500; border: none; padding: 0;">PQ: NG-BD/Genexis/RV/231021</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal; padding-top: 5px; border: none;">John Doe | Designation</td>
                        <td style="font-weight: normal; padding-top: 5px; border: none;">Date: 16 / 08 / 24</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal; padding-top: 5px; border: none;">john.doe@example.com |
                            123456789</td>
                        <td style="font-weight: normal; padding-top: 5px; border: none;">PQR: MEO-P021(T10)-W(L1)</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal; padding-top: 5px; border: none;">123 Main Street, City, Country
                        </td>
                        <td style="font-weight: normal; padding-top: 5px; border: none;">Customer Type: Regular</td>
                    </tr>
                </table>

                <!-- Products Table -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="10"
                    style="border-collapse: collapse; margin-top: 40px; border: 1px solid #eee; font-size: 14px;">
                    <thead>
                        <tr style="background-color: #f0f0f0;">
                            <th style="font-weight: 500; text-align: left; border-bottom: 1px solid #eee;">Sl</th>
                            <th style="font-weight: 500; text-align: left; border-bottom: 1px solid #eee;">PRODUCT
                                DESCRIPTION</th>
                            <th style="font-weight: 500; text-align: center; border-bottom: 1px solid #eee;">QTY</th>
                            <th style="font-weight: 500; text-align: right; border-bottom: 1px solid #eee;">UNIT PRICE
                            </th>
                            <th style="font-weight: 500; text-align: right; border-bottom: 1px solid #eee;">TOTAL (USD)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: left; border-bottom: 1px solid #eee;">1</td>
                            <td style="text-align: left; border-bottom: 1px solid #eee;">Product A</td>
                            <td style="text-align: center; border-bottom: 1px solid #eee;">10</td>
                            <td style="text-align: right; border-bottom: 1px solid #eee;">15.00</td>
                            <td style="text-align: right; border-bottom: 1px solid #eee;">150.00</td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border-bottom: 1px solid #eee;">2</td>
                            <td style="text-align: left; border-bottom: 1px solid #eee;">Product B</td>
                            <td style="text-align: center; border-bottom: 1px solid #eee;">5</td>
                            <td style="text-align: right; border-bottom: 1px solid #eee;">20.00</td>
                            <td style="text-align: right; border-bottom: 1px solid #eee;">100.00</td>
                        </tr>
                        <tr style="background-color: #eeeeee3d;">
                            <td colspan="4"
                                style="text-align: right; font-weight: 700; border-bottom: 1px solid #eee;">SUBTOTAL
                            </td>
                            <td style="text-align: right; font-weight: 700; border-bottom: 1px solid #eee;">250.00</td>
                        </tr>
                        <tr>
                            <td colspan="4"
                                style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                                VAT / TAX
                                5%</td>
                            <td
                                style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                                12.50
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"
                                style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                                SPECIAL
                                DISCOUNT(10%)</td>
                            <td
                                style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                                -25.00
                            </td>
                        </tr>
                        <tr style="background-color: #eee;">
                            <td colspan="4" style="text-align: right; font-weight: 700;">GRANDTOTAL</td>
                            <td style="text-align: right; font-weight: 700;">237.50</td>
                        </tr>
                    </tbody>
                </table>

                <!-- GST & Terms -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                    style="border-collapse: collapse; margin-top: 10px;">
                    <tr>
                        <td style="text-align: center; font-weight: 700; padding-bottom: 10px; border: none;">
                            GST - Not included. It may apply.
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="background-color: #f0f0f0; font-weight: 700; padding: 5px; border: none; text-align: left;">
                            Terms & Conditions
                        </td>
                    </tr>
                </table>

                <!-- Terms & Conditions Table -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                    style="border-collapse: collapse; margin-top: 5px; font-size: 12px;">
                    <tbody>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none; width: 150px;">Payment Terms</td>
                            <td style="font-weight: 700; padding: 5px; border: none; width: 10px;">:</td>
                            <td style="padding: 5px; border: none;">Payment to be made within 30 days.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Delivery Time</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">Delivery within 2 weeks.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding: 5px; border: none;">Warranty</td>
                            <td style="font-weight: 700; padding: 5px; border: none;">:</td>
                            <td style="padding: 5px; border: none;">One year warranty on all products.</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Authorized Brands -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                    style="border-collapse: collapse; margin-top: 15px;">
                    <tbody>
                        <tr>
                            <td colspan="6"
                                style="text-align: right; font-weight: 700; padding-bottom: 8px; border: none;">
                                Authorized
                                Brands</td>
                        </tr>
                    </tbody>
                    <tbody style="background-color: #f0f0f0;">
                        <tr>
                            <td style="padding: 0;">
                                <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png"
                                    alt="Acronis Logo" style="padding-left: 15px; width: 100px; display: block;" />
                            </td>
                            <td style="padding: 0;">
                                <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png"
                                    alt="Acronis Logo" style="padding-left: 15px; width: 100px; display: block;" />
                            </td>
                            <td style="padding: 0; text-align: center;">
                                <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png"
                                    alt="Acronis Logo" style="padding-left: 15px; width: 100px; display: block;" />
                            </td>
                            <td style="padding: 0; text-align: right;">
                                <img src="https://www.ngenitltd.com/storage/6Zf41FFqUVa1Cjs51744536698.png"
                                    alt="Logo" style="padding-left: 15px; width: 100px; display: block;" />
                            </td>
                            <td style="padding: 0; text-align: right;">
                                <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png"
                                    alt="Acronis Logo" style="padding-left: 15px; width: 100px; display: block;" />
                            </td>
                            <td style="padding: 0; text-align: right;">
                                <img src="https://download.logo.wine/logo/Acronis/Acronis-Logo.wine.png"
                                    alt="Acronis Logo" style="padding-left: 15px; width: 100px; display: block;" />
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Footer Content Info -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                    style="border-collapse: collapse; margin-top: 20px;">
                    <tr>
                        <td style="width: 75%; vertical-align: top; padding-right: 10px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                                style="border-collapse: collapse;">
                                <tr>
                                    <td style="font-weight: 600; padding: 0;">Adam Mahmud</td>
                                    <td style="font-weight: normal; padding: 0;">sales@ngenitltd.com</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: normal; padding: 0;">Sr. Manager</td>
                                    <td style="font-weight: normal; padding: 0;">+880123456789 (What’s App)</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: normal; padding: 0;">Partner & Business Development</td>
                                    <td style="font-weight: normal; padding: 0;">skype_id_here (Skype)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 25%; vertical-align: top;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                                style="border-collapse: collapse; text-align: center;">
                                <tr>
                                    <td style="font-weight: 500; padding: 0;">
                                        <h3 style="margin: 0; padding: 0; color: #ae0a46;">NGEN PTE. Ltd.</h3>
                                        <p style="margin: 0; padding: 0;">Reg-no: 123456789</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background-color: #ae0a46; height: 45px; text-align: center; color: white;">
                <a href="https://www.ngenitltd.com"
                    style="font-family: Sora, sans-serif; font-size: 14px; font-weight: 500; line-height: 22.68px; letter-spacing: 0.1em; color: white; text-decoration: none;">
                    www.ngenitltd.com
                </a>
            </td>
        </tr>
    </table>

</body>

</html>
