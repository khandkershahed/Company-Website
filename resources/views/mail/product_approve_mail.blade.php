<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Approve Notification</title>
</head>

<body>
    <!-- Main Area -->
    <div class="main" style="width:50vw; margin:0 auto;  padding: 5px 10px 10px 10px;">
        <table cellpadding="0" cellspacing="0" border="0"
            style="background:#fff;border-collapse:collapse;width:650px;margin:0px;border:1px solid rgb(224,224,224);padding:0px;color:#333;text-align:center;font-family:Arial,Helvetica,sans-serif;text-align:center">
            <tbody>
                <tr>
                    <td style="padding:5px 15px;border-bottom:1px solid #f1f1f1;text-align:left;">
                        <a href="https://www.ngenitltd.com/" target="_blank"
                            data-saferedirecturl="https://www.google.com/url?q=https://www.ngenitltd.com/&amp;source=gmail&amp;ust=1683110822015000&amp;usg=AOvVaw1oh2knrZ8dutUp_6pTWSeQ">
                            <img src="http://ngenitltd.com/upload/logoimage/1764773615798059.png"
                              height="70px" width="130px"  alt="" border="0" class="CToWUd" data-bit="iit">
                        </a>
                    </td>

                </tr>
                <tr>
                    <td style="text-align:center;padding:15px 15px 5px 15px;font-size:18px; margin-bottom:10px;">
                        <strong style="font-size:20px; color: #ae0a46;">"{{$data['name']}}"</strong>. is approved and displayed to our website
                    </td>
                </tr>

                <tr>
                    <td style="padding:0 15px">

                        <table cellpadding="0" cellspacing="0" border="0" style="width:620px">

                            <tbody>
                                <tr>
                                    <th
                                        style="min-width:100px;max-width:200px;background-color:#f1f1f1;
                                        padding:10px 15px;border-top:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        Created By</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;
                                        font-weight:700;font-size:15px;text-align:left">
                                        &nbsp; {{$data['added_by']}}</td>
                                </tr>
                                <tr>
                                    <th
                                        style="min-width:100px;max-width:200px;background-color:#f1f1f1;padding:10px 15px;border-top:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        Product Sku Code:</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        &nbsp; {{$data['sku_code']}}</td>
                                </tr>


                                <tr>
                                    <th
                                        style="background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                        Category</th>
                                    <td
                                        style="padding:10px 15px;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        &nbsp; {{$data['category']}}</td>
                                </tr>


                                <tr>
                                    <th
                                        style="background-color:#f1f1f1;padding:10px 15px;font-size:12px;text-align:left">
                                        Brand</th>
                                    <td
                                        style="padding:10px 15px;border-bottom:1px solid #f1f1f1;border-top:1px solid #f1f1f1;border-right:1px solid #f1f1f1;font-size:12px;text-align:left">
                                        &nbsp; {{$data['brand']}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:15px;text-align:center;font-size:12px">
                        <div style="padding-bottom:5px;margin-bottom:10px;margin-top:15px;font-size:14px !important;">
                            <strong>
                                <a href="{{route('product.details',$data['product_id'])}}" style="color: #FFF;
                                border: 1px solid #ae0a46;
                                background-color: #ae0a46;
                                transition: all 0.8s ease-in-out;padding: 10px 40px;
                                cursor: pointer;
                                font-size: 18px;
                                font-weight: 500;"> Check the Product</a>
                            </strong>
                        </div>

                    </td>
                </tr>

                <tr>
                    <td style="padding:15px 0;text-align:center;background-color:#eaeaea;font-size:14px">
                        Thank you, from Logistics Department
                        <strong><a href="{{route('homepage')}}" style="color: #ae0a46;">ngenitltd.com</a></strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
