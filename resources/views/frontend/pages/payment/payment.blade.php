@extends('frontend.master')
@section('content')
    <style>
        /**
        * The CSS shown here will not be introduced in the Quickstart guide, but shows
        * how you can use CSS to style your Element's container.
        */
        #card-element {
            width: 25rem;
            margin: 1rem;
        }

        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid black;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #282829;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement::placeholder {
            color: black;
            font-weight: 600;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>



    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="cart_header" style="background: whitesmoke;border:none">
                <div class="cart_header_content text-center">
                    <!-- wrapper -->
                    <div class="cart_header_wrapper" style="display: inline-flex;">
                        <!-- title -->
                        <div class="cart_header_title">
                            <h4 class="text-center" style="color: #ae0a46">Payment Page</h4>
                        </div>
                        <!-- right -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-4 mb-3">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <div class="table-responsive w-60 m-auto">
                    <table class="table no-border">
                        <thead class="pb-2">
                            <tr class="border-bottom">
                                <th width="50%" style="border: none;">
                                    <h5 class="m-0 mb-2">
                                        Paying for Order No - {{ $order->order_number }}
                                    </h5>
                                </th>
                                <th width="20%" style="border: none;"></th>
                                <th width="30%" style="border: none; text-align:right;">
                                    <a href="{{ route('client.orders') }}">
                                        <h6 class="m-0 mb-2">Back To Your Order Details</h6>
                                    </a>
                                </th>
                            </tr>


                        </thead>


                    </table>
                </div>
            </div>

            <div class="col-lg-12 mb-2">
                <div class="row">
                    <div class="col-lg-5">
                        <h5 class="m-0 mt-3"><strong>Choose a Payment Option</strong></h5><br>
                        <p class="m-0">Select a Payment Option to Continue with Your Order</p><br>
                        <p class="m-0 mb-3">For Further Queries,
                            Please Contact with
                            <a href="{{ route('client.support') }}">Our Support Team</a>
                        </p>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header p-2">
                                <h5 class="text-center mb-0" style="color: #ae0a46">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                <table class="table no-border mb-1">
                                    <tbody>
                                        @foreach ($order_items as $item)
                                            <tr class="no-border border-bottom">
                                                <td style="border:none;" width="70%">
                                                    @php
                                                        $slug = App\Models\Admin\Product::where('id', $item->product_id)->value('slug');
                                                        $name = App\Models\Admin\Product::where('id', $item->product_id)->value('name');
                                                    @endphp
                                                    <p><a href="{{ route('product.details', $slug) }}"
                                                            class="text-heading">{{ $name }}</a></p></span>

                                                </td>
                                                <td style="border:none;" width="10%">
                                                    <p>x {{ $item->qty }}</p>
                                                </td>
                                                <td style="border:none;" width="20%">
                                                    <p>${{ $item->price }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr style="border:none;">
                                            <td style="border:none;" colspan="2">
                                                <h5 class="text-center mb-0"><strong>Total Amount to Pay :</strong></h5>
                                            </td>
                                            <td style="border:none;">
                                                <h5 class="text-center mb-0"><strong>$ {{ $order->amount }}</strong></h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row tabbar_wrapper" style="width:70%;margin:auto;">
            <div class="col-12 tabbar_header_title">Payment Options</div>

            <div class="col-4 m-0 p-0 text-center">

                <div class="data_tabs_button" data-tabs>
                    <button class="active">Credit Card</button>
                    <button>Bank</button>
                    <button>Paypal</button>
                    {{-- <button>Service</button> --}}
                    {{-- <button>Industry</button> --}}
                </div>
            </div>
            <div class="col-8 data_tabs_content" data-panes>
                <!--==// Tab Item //==-->

                <div class="sub_tabs_content" data-panes>
                    <!--Sub Item-->
                    <div class="active">
                        <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
                            @csrf
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Pay with Card</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row mx-4">
                                            <div id="card-element" class="StripeElement">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-sm-12">
                                                <h5>Total Amount (USD)</h5>
                                            </div>
                                            <div class="col-sm-12">
                                                <h3><strong>USD {{ $order->amount }}</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <button class=" p-2 mb-2 common_button2">Submit Payment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <!--==// Tab Item //==-->


                <div>
                    <!--Sub Button-->
                    <div>
                        <div class="col-lg-12 p-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-center">Pay Through Bank</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row my-2 text-center">
                                        <div class="col-sm-12">
                                            <h5>Total Amount (USD) : <strong>USD {{ $order->amount }}</strong></h5>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mx-3">
                                        <div class="col-sm-12">
                                            <h6 class="mb-1">Payment Slip</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="file" name="payment_slip" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-3">
                                        <div class="col-sm-12">
                                            <h6 class="mb-1">Payment Reference No</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="payment_slip" class="form-control"
                                                id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <button class=" p-2 mb-2 common_button2">Submit Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <!--Sub Button-->
                    <div>
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>

                <div>
                    <!--Sub Button-->
                    <div>
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-dark">
                                        <th width="80%">
                                            <h5 class="text-center text-white">Industry List For Softwares</h5>
                                        </th>
                                        <th width="20%"><input type="text" name="" id=""></th>
                                    </tr>
                                    <tr>
                                        <th width="80%">Product Name</th>
                                        <th width="20%">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="80%"></td>
                                        <td width="20%"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe(
            'pk_test_51MIhpNKWkQXfo4eQKRqV6aaB2nDyFN7TCYXzPZ9vdCOsybE637QvJRzadjCLCtMP5vQa1Zx4dfCSDierUo3L2mwG00J3XdT7A5'
            );
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>
@endsection
