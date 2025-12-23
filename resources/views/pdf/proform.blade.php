<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NGENIT-Proforma Invoice | NGenIT</title>
    <link rel="stylesheet" type="text/css" href="quoation-css.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <style type="text/css">
        .padding {
            padding: 0px;
        }

        .quotation-header {
            min-height: 60px;
            background: whitesmoke;
        }


        .quotation-header-banner h3 {
            line-height: 50px;
            font-size: 30px !important;
            text-align: center;
            color: #FD1C03;
        }

        .header-to-contact-area {
            min-height: 150px;
            background: whitesmoke;
        }

        .tableCustomice {
            width: 100%;
            height: auto;
        }

        .tableCustomice th,
        td {
            padding: 2px 5px;
            border: 1px solid #ddd;
            font-size: 13px;
        }

        .header-referencebar {
            min-height: 20px;
            background: #ccc;
            line-height: 20px;
            margin-top: 5px;
        }

        .header-referencebar p {
            padding: 0px 5px;
            font-size: 14px;
        }

        .product-details-area {
            min-height: 120px;
            background: #fff;
            margin-top: 10px;
        }

        .terms-contditions {
            margin-top: 10px;
        }

        .terms-contditions-area {
            min-height: 120px;
            background: whitesmoke;
        }

        .footer-quotation-left ul {
            list-style: none;
        }

        .footer-quotation-left ul li {
            width: 50%;
            height: 30px;
            float: left;
            list-style: decimal;
        }

        .footer-quotation-blow {
            min-height: 40px;
            background: #222222;
            line-height: 40px;

        }
    </style>
</head>
<body>
    <div class="container mt-5" style=" width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;margin-top: 1rem!important;">
        <div class="card" style="display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;
            -webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;
            word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0,0,0,.125);
            border-radius: 0.25rem;">
            <div class="card-header" style="padding: 0.25rem 0.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);">
                <div class="col-lg-12 float-left quotation-header-banner padding"
                style="min-height: 40px; background: whitesmoke;">

                      <h4 style="text-align:center;font-size: 20px; margin:auto; padding: 7px;">
                    PROFORMA INVOICE</h4>

                </div>
            </div>

            <div class="card-body" style="width:90%; margin:auto;min-height:120px;">

                <div class="col-lg-6 float-left headerto padding" style="float: left; margin-top:10px;">

                    <div class="col-lg-12 padding">
                        <img src="https://www.ngenitltd.com/upload/logoimage/1755708668937189.png"
                        alt="" class="img-responsive" style="height:50px;width: 120px;">
                        <p style="padding:5px; padding-top:0px;font-size: 14px;text-align: left;font-weight: 600;
                            font-size: 14px;">
                            89/2, Haque Chamber, Panthapath, Dhaka 1205</p>
                    </div>




                </div>

                <div class="col-lg-2 float-left" style="float: left;"></div>

                <div class="col-lg-4 float-left headertocontact padding" style="float:right;">

                    <p style="padding: 10px;font-size: 14px;float: left;font-weight: 600;">
                        <label>Phone &nbsp;&nbsp;&nbsp;: 65 6424 8442</label> <br>
                            <label>Fax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ----</label> <br>
                                <label>Email &nbsp;&nbsp; :
                                    ngenit@gmail.com</label>
                                    <br>
                                    <label>URL &nbsp;&nbsp;&nbsp;&nbsp; :
                                        www.ngenit.com </label>
                                        <br>
                                        <label>GST &nbsp;&nbsp;&nbsp;&nbsp; :
                                            201118027W </label>

                    </p>


                </div>


            </div>

            <div class="col-lg-12 table-responsive" style="margin:auto; width: 100%; height: 100px;
                background-color: #fff;background-clip: border-box;border: 1px solid rgba(0,0,0,.125);
                border-radius: 0.25rem;">
                <table style="width:100%;">
                    <tr style="width:100%;">
                        <td class="text-center" style="border:none; width:40%;">
                            <p style="font-size: 15px;font-weight: 600;">
                                <label>Invoice No &nbsp;&nbsp;&nbsp;: {{ $invoice_no }}</label> <br>
                                    <label>Invoice Date : {{ \Carbon\Carbon::now()->format('d F Y') }}</label>
                            </p>

                        </td>
                        <td class="text-center" style="border:none;width:10%;">


                        </td>
                        <td class="text-center" style="border:none;width:50%;">
                            <p style="font-weight: 600;font-size: 14px;">
                                <label>Customer &nbsp;&nbsp;&nbsp;: {{ $billing_name }}</label> <br>
                                    <label>Contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 02-Feb-23</label> <br>
                                        <label>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                            {{ $billing_email }}</label>
                                            <br>
                                            <label>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                {{ $billing_address }}</label>
                                                <br>
                            </p>

                        </td>
                    </tr>
                </table>
            </div>

        </div>



        {{-- <div class="card" style="display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0,0,0,.125);border-radius: 0.25rem;">
            <div class="card-body" style="width:90%; margin:auto;min-height:80px;">


                <div class="col-lg-6 float-left headerto padding" style="float: left;">

                    <div class="col-lg-12 padding">

                        <p style="float: left;padding: 5px;font-size: 15px;font-weight: 600;">
                            <label>Invoice No &nbsp;&nbsp;&nbsp;: {{ $invoice_no }}</label> <br>
                                <label>Invoice Date : {{ \Carbon\Carbon::now()->format('d F Y') }}</label>
                        </p>
                    </div>




                </div>

                <div class="col-lg-2 float-left" style="float: left;"></div>

                <div class="col-lg-4 float-left headertocontact padding" style="float: right;">

                    <p style="font-weight: 600;font-size: 14px;float: left;padding: 5px;">
                        <label>Customer &nbsp;&nbsp;&nbsp;: {{ $name }}</label> <br>
                            <label>Contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 02-Feb-23</label> <br>
                                <label>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                    {{ $email }}</label>
                                    <br>
                                    <label>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                        {{ $address }}</label>
                                        <br>
                    </p>


                </div>


            </div>
        </div> --}}


        <div class="col-lg-12 product-details-area float-left padding table-responsive"
             style="min-height: 120px;background: #fff; width:90%; margin:auto; margin-top: 20px;">

            <table class="tableCustomice" style="width: 100%;height: auto;">
                <thead>
                    <tr style="text-align: center;">
                        <th width="10%" style="padding: 5px;border: 1px solid #ddd;font-size: 12px;"> SL. No. </th>
                        <th width="40%" style="padding: 5px;border: 1px solid #ddd;font-size: 12px;">Item Name </th>
                        <th width="10%" style="padding: 5px;border: 1px solid #ddd;font-size: 12px;"> Quantity </th>
                        <th width="15%" style="padding: 5px;border: 1px solid #ddd;font-size: 12px;">Unit Price </th>
                        <th width="25%" style="padding: 5px;border: 1px solid #ddd;font-size: 12px;">Amount </th>
                    </tr>
                </thead>
                <tbody>




                    @foreach ($carts as $key => $item)
                        <tr>
                            <td style="padding: 5px;border: 1px solid #ddd;font-size: 12px;text-align: center;">
                                {{$loop->iteration}}
                            </td>
                            <td style="padding: 5px;border: 1px solid #ddd;font-size: 12px;text-align: left;">
                                {{ $item->name }}
                            </td>
                            <td style="padding: 5px;border: 1px solid #ddd;font-size: 12px;text-align: center;">
                                {{ $item->qty }}
                            </td>
                            <td style="padding: 5px;border: 1px solid #ddd;font-size: 12px;text-align: center;"> $
                                {{ $item->price }}</td>
                            <td style="padding: 5px;border: 1px solid #ddd;font-size: 12px;text-align: center;"> $
                                {{ $item->subtotal}} </td>
                        </tr>
                    @endforeach

                    <tr>

                        <td colspan="2" style="text-align:center;padding: 5px;border: 1px solid #ddd;font-size: 12px;text-transform:capitalize">
                        </td>
                        <td colspan="2" style="text-align:center;padding: 5px;border: 1px solid #ddd;font-size: 12px;text-transform:capitalize">
                            <b>Total Amount : </b>
                        </td>
                        <td style="text-align:center;padding: 5px;border: 1px solid #ddd;font-size: 15px;text-transform:capitalize">
                            <b> {{ $cartTotal }}</b>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="5" style="text-align:center;padding: 5px;border: 1px solid #ddd;font-size: 12px;text-transform:capitalize"><b>In Word : {{ $total_amount }}</b>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-12 table-responsive" style="width: 100%; margin-top:80px; height: 70px; float: left;background-color: #fff;">


                <table style="width:100%;">
                    <tr style="width:100%;">
                        <td class="text-center" style="border:none;">
                                <center> {{ $billing_name }}</center>
                                <b style="text-decoration: overline;">
                                    <center> Customer, Purchase </center>
                                </b>

                        </td>
                        <td class="text-center" style="border:none;">
                                <center> NGenIT</center>
                                <b style="text-decoration: overline;">
                                    <center> Director, Finance </center>
                                </b>

                        </td>
                        <td class="text-center" style="border:none;">
                                <center>{{ \Carbon\Carbon::now()->format('d F Y') }}</center>
                                <b style="text-decoration: overline;">
                                    <center> Date </center>
                                </b>

                        </td>
                    </tr>
                </table>

            {{-- <div style="float: left;width: 37%;">
                 <center> {{ $name }}</center>
                <b style="text-decoration: overline;">
                    <center> Customer, Purchase </center>
                </b>
            </div>
            <div style="float: left;width: 30%;">
                <center> NGenIT</center>
                <b style="text-decoration: overline;">
                    <center> Director, Finance </center>
                </b>
            </div>
            <div style="float: right;width: 30%;">
                <center>{{ \Carbon\Carbon::now()->format('d F Y') }}</center>
                <b style="text-decoration: overline;">
                    <center> Date </center>
                </b>
            </div> --}}
        </div>



    </div>
</body>

</html>
