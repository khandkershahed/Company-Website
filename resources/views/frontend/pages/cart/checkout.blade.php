@extends('frontend.master')
@section('content')
    <style>
        .accordion-item {
            border: none;
            color: var(--bs-accordion-color);
            background-color: var(--bs-accordion-bg);
            /* border: var(--bs-accordion-border-width) solid var(--bs-accordion-border-color); */
        }
        .accordion-button {
            border-bottom: 1px solid #eee;
            border-radius: 0px !important;
        }
    </style>
    <!-- header section -->
    <section class="mt-3 mb-5">
        <div class="container">
            <div class="row">
                <h1 class="text-center pb-3 primary_color">Checkout Page
                </h1>
            </div>
            <form action="{{ route('checkout.store') }}" class="p-4" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 shadow-lg">
                        <div class="">
                            <h4 class="primary_color pt-3 text-center" >Client Information</h4>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#billing" aria-expanded="true" aria-controls="billing">
                                        <span class="">Billing Information</span>
                                    </button>
                                </h2>
                                <div id="billing" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-1">
                                        <!-- First -->
                                        <input type="hidden" name="client_type" value="{{ $client_type }}">
                                        @if ($client_type == 'client')
                                            <input type="hidden" name="client_id" value="{{ $id }}">
                                        @else
                                            <input type="hidden" name="partner_id" value="{{ $id }}">
                                        @endif
                                        <div class=" p-1">
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-1" style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Full Name</label>
                                                    <input name="billing_name" type="text"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter Full Name" required>
                                                </div>
                                                <div class="form-group ml-1 "style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input name="billing_email" type="email"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter Email" required>
                                                </div>
                                                <div class="form-group ml-1 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input name="billing_phone" type="number"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter Phone" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-1" style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input name="billing_address" type="text"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter Address" required>
                                                </div>
                                                <div class="form-group ml-1 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">City</label>
                                                    <input name="billing_city" type="text"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter City" required>
                                                </div>
                                                <div class="form-group ml-1 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Zip Code </label>
                                                    <input name="billing_postal" type="number"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter Zip Code" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-1 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Company Name</label>
                                                    <input name="billing_company_name" type="text"
                                                        class="form-control form-control-sm rounded-0"
                                                        aria-describedby="emailHelp" placeholder="Enter Company Name"
                                                        required>
                                                </div>
                                                <div class="form-group ml-1" style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Country</label>
                                                    <select name="billing_country"
                                                        class="form-control form-control-sm rounded-0 select2"
                                                        aria-label="Searchable Select" data-placeholder="Choose Country"
                                                        required style="width: 100% !important;">
                                                        <option></option>
                                                        @foreach ($countries as $item)
                                                            <option value="{{ $item->country_name }}"
                                                                data-value1="{{ $item->region_id }}">
                                                                {{ $item->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ship-to-another" aria-expanded="false"
                                        aria-controls="ship-to-another">
                                        Ship To Another Address
                                    </button>
                                </h2>
                                <div id="ship-to-another" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-1">
                                        <!-- Second -->
                                        <div class=" p-1">
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-2" style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Full Name</label>
                                                    <input name="shipping_name" type="text" class="form-control"
                                                        aria-describedby="emailHelp" placeholder="Enter Full Name"
                                                        required>
                                                </div>
                                                <div class="form-group ml-2 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input name="shipping_phone" type="number" class="form-control"
                                                        aria-describedby="emailHelp" placeholder="Enter Phone" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-2 "style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input name="shipping_email" type="email" class="form-control"
                                                        aria-describedby="emailHelp" placeholder="Enter Email" required>
                                                </div>
                                                <div class="form-group ml-2 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input name="shipping_address" type="text" class="form-control"
                                                        aria-describedby="emailHelp" placeholder="Enter Address" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-2 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">City</label>
                                                    <input name="shipping_city" type="text" class="form-control"
                                                        aria-describedby="emailHelp" placeholder="Enter City" required>
                                                </div>
                                                <div class="form-group ml-2 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Company Name</label>
                                                    <input name="shipping_company_name" type="text"
                                                        class="form-control form-control-sm" aria-describedby="emailHelp"
                                                        placeholder="Enter Company Name" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group ml-2 " style="width: 100% !important;">
                                                    <label for="exampleInputEmail1">Zip Code </label>
                                                    <input name="shipping_postal" type="number" class="form-control"
                                                        aria-describedby="emailHelp" placeholder="Enter Zip Code"
                                                        required>
                                                </div>
                                                <div class="form-group ml-2 " style="width: 100% !important;">
                                                    <div>
                                                        <label for="country">Country</label>
                                                    </div>
                                                    <div>
                                                        <select id="country" name="shipping_country"
                                                            class="form-control form-control-sm select2 rounded-0"
                                                            aria-label="Searchable Select"
                                                            data-placeholder="Choose Country" required
                                                            style="height: 100% !important;
                                                    border-radius: 0px !important;">
                                                            <option></option>
                                                            @foreach ($countries as $item)
                                                                <option value="{{ $item->country_name }}"
                                                                    data-value2="{{ $item->region_id }}">
                                                                    {{ $item->country_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#aditional-notes" aria-expanded="false"
                                        aria-controls="aditional-notes">
                                        Aditional Notes?
                                    </button>
                                </h2>
                                <div id="aditional-notes" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-1">
                                        <div class=" p-1">
                                            <div class="form-outline">
                                                <label class="form-label" for="textAreaExample">Additional Notes</label>
                                                <textarea name="notes" class="form-control" id="textAreaExample1" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#order-methods" aria-expanded="false"
                                        aria-controls="order-methods">
                                        Order Methods
                                    </button>
                                </h2>
                                <div id="order-methods" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-1">
                                        <div class=" p-1">
                                            <p>Payment Methods</p>
                                            <input type="radio" id="html" name="payment_method" value="bank">
                                            <label for="html">
                                                <img src="{{ asset('frontend/images/work_order.png') }}" width="60px"
                                                    height="40px" style="cursor: pointer; margin-right:2rem;"
                                                    alt="" id="bankPay">
                                            </label>
                                            <input type="radio" id="css" name="payment_method" value="online">
                                            <label for="css">
                                                <img src="{{ asset('frontend/images/online_pay.png') }}" width="60px"
                                                    style="cursor: pointer; background:transparent" alt="">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 shadow-lg">
                        <div class="">
                            <h4 class="primary_color pt-3 text-center">Order Summary</h4>
                        </div>
                        <div class="row rounded">
                            <div class="col p-3 pb-0 ">
                                <table class="table no-border">
                                    <tbody>
                                        @foreach ($carts as $item)
                                            @php
                                                $slug = App\Models\Admin\Product::where('id', $item->id)->value('slug');
                                            @endphp
                                            <tr class="border-none" style="border: none;">
                                                <td width="70%" style="border: none; vertical-align:middle;">
                                                    <a class="text-muted" href="{{ route('product.details', $slug) }}"
                                                        title="{{ $item->name }}">
                                                        {{ Str::limit($item->name, 50) }}
                                                    </a>
                                                </td>
                                                <td class="text-center" width="10%"
                                                    style="border: none; vertical-align:middle;">
                                                    X {{ $item->qty }}
                                                </td>
                                                <td class="text-center" width="20%"
                                                    style="border: none; vertical-align:middle;">
                                                    ${{ $item->price }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <div class="summury_count pt-0">
                                <table class="table no-border">
                                    <tbody>
                                        <tr class="border-none " style="border: none;">
                                            <td width="40%" style="border: none;">
                                            </td>
                                            <td class="text-right" width="30%" style="border: none;">
                                                <h5>Subtotal :</h5>
                                            </td>
                                            <td class="text-center" width="30%"
                                                style="border: none; vertical-align: middle;">
                                                <h6 class="font-number" style="font-size: 14px;">
                                                    <small style="font-size:10px;">USD</small>
                                                    <strong>$ {{ number_format($cartsubTotal, 2) }}</strong>
                                                </h6>
                                            </td>
                                        </tr>
                                        <tr class="border-none text-center" style="border: none;">
                                            <td width="40%" style="border: none;">
                                            </td>
                                            <td class="text-right" width="30%" style="border: none;">
                                                <h5>GST :</h5>
                                            </td>
                                            <td class="text-center" width="30%"
                                                style="border: none; vertical-align: middle;">
                                                <h6 class="font-number" style="font-size: 14px;">
                                                    <small style="font-size:10px;">USD</small>
                                                    <strong>$ <span class="gst">0.00</span></strong>
                                                </h6>
                                            </td>
                                        </tr>
                                        <tr class="border-none text-center" style="border: none;">
                                            <td width="40%" style="border: none;">
                                            </td>
                                            <td class="text-right" width="30%" style="border: none;">
                                                <h5>Total :</h5>
                                            </td>
                                            <td class="text-center" width="30%"
                                                style="border: none; vertical-align: middle;">
                                                <h6 class="font-number" style="font-size: 14px;">
                                                    <small style="font-size:10px;">USD</small>
                                                    <strong>$ <input type="hidden" class="cart_total"
                                                            value="{{ number_format($cartTotal, 2) }}">
                                                        <input type="hidden" class="grand_total" name="cartTotal"
                                                            value="{{ number_format($cartTotal, 2) }}">
                                                        <span class="grandTotal">{{ number_format($cartTotal, 2) }}
                                                        </span>
                                                    </strong>
                                                </h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Button trigger modal -->
                                <div class="submit_button text-center col-lg-12"
                                    style="    display: flex;
                                justify-content: end;">
                                    <button class="btn-color" type="submit">Proceed</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="bankModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Payment Details
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Bank Name:</strong>
                                                <p> Dutch Bangla Bank</p><br>
                                                <strong>Account Title:</strong>
                                                <p> NGen IT</p><br>
                                                <strong>Account Number:</strong>
                                                <p> 234***********</p><br>
                                                <strong>Branch Title:</strong>
                                                <p>West Panthapath</p><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div id="bankPayment" class="d-none">
        <div class="card mt-2 border border-secondary">
            {{-- <div class="card-title pt-1 pl-2 border border-bottom border-secondary">
                Payment Information (Bank Account ( <span class="text-warning" data-bs-toggle="modal"
                    data-bs-target="#bankModal"><i class="fa fa-info-circle"></i></span> ))
            </div> --}}
            <div class=" col-12">
                <div class="row">
                    <!-- form item -->
                    <div class="check_form_inner col-6">
                        <label for="Email">Work Order </label>
                        <input type="file" name="work_order" class="form-control" id="workorder">
                        <span class="text-muted">* Accepts Pdf</span>
                    </div>
                    <br>
                    <!-- form item -->
                    <div class="check_form_inner col-6">
                        <label for="Email">Work Order Number </label>
                        <input type="text" name="work_order_no" class="form-control" id="payment">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Check Out Page Start --}}
    <!-- header section End -->
@endsection
@once
    @section('scripts')
        <script>
            $(document).ready(function() {
                $("input[name='payment_method']").on('change', function() {
                    if ($(".bankPay").is(':checked')) {
                        $("#bankPayment").removeClass('d-none');
                    } else {
                        $("#bankPayment").addClass('d-none');
                    }
                });
            });
            $(document).ready(function() {
                $(".shipAddress").on('change', function() {
                    if ($(".shipAddress").is(':checked')) {
                        $("#shipExpand").removeClass('d-none');
                    } else {
                        $("#shipExpand").addClass('d-none');
                    }
                });
            });
            $(document).ready(function() {
                $(".additionalNotes").on('click', function() {
                    //$("#additionalExpand").toggle();
                    if ($("#additionalExpand").hasClass('d-none')) {
                        $("#additionalExpand").removeClass('d-none');
                        $(".icon").removeClass('fa-plus');
                        $(".icon").addClass('fa-minus');
                    } else {
                        $("#additionalExpand").addClass('d-none');
                        $(".icon").removeClass('fa-minus');
                        $(".icon").addClass('fa-plus');
                    }
                });
            });
            $(document).ready(function() {
                $(".orderMethod").on('click', function() {
                    //$("#additionalExpand").toggle();
                    if ($("#orderExpand").hasClass('d-none')) {
                        $("#orderExpand").removeClass('d-none');
                        $(".iconOrder").removeClass('fa-plus');
                        $(".iconOrder").addClass('fa-minus');
                    } else {
                        $("#orderExpand").addClass('d-none');
                        $(".iconOrder").removeClass('fa-minus');
                        $(".iconOrder").addClass('fa-plus');
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".shipAddress").on('change', function() {
                    if ($(".shipAddress").is(':checked')) {
                        $("#shipExpand").removeClass('d-none');
                    } else {
                        $("#shipExpand").addClass('d-none');
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#bkash').onchange(function() {
                    $("#bkashExpand").toggle(this.checked);
                });
            });
            $('#nagad').click(function() {
                $("#nagadExpand").toggle(this.checked);
            });
            $('#rocket').click(function() {
                $("#rocketExpand").toggle(this.checked);
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="shipping_country"]').on('change', function() {
                    const billing_country = $('select[name="billing_country"] option:selected').data('value1');
                    const shipping_country = $(this).find('option:selected').data('value2');
                    const cart_total = $('.cart_total').val();
                    if (billing_country == shipping_country) {
                        $.ajax({
                            url: "{{ url('checkout/ajax') }}/" + billing_country,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                // alert(billing_country);
                                // alert(data.gst);
                                $('.gst').html(data.gst);
                                $grand_total = parseFloat(cart_total) + parseFloat(data.gst);
                                $('.grandTotal').html($grand_total);
                                $('.grand_total').val($grand_total);
                            },
                        });
                    } else {
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;
                var current = 1;
                var steps = $("fieldset").length;
                setProgressBar(current);
                $(".next").click(function() {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(++current);
                });
                $(".previous").click(function() {
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                    //Remove class active
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    //show the previous fieldset
                    previous_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            previous_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(--current);
                });
                function setProgressBar(curStep) {
                    var percent = parseFloat(100 / steps) * curStep;
                    percent = percent.toFixed();
                    $(".progress-bar")
                        .css("width", percent + "%")
                }
                $(".submit").click(function() {
                    return false;
                })
            });
        </script>
    @endsection
@endonce
