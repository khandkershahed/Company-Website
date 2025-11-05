@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Current Sales Order Status</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content w-50 mx-auto">
            <div class="text-start">
                <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">
                    <div class="col-lg-4 col-sm-12">
                        <div>
                            <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                href="{{ route('rfqOrderStatus.index') }}">
                                <i class="fa-solid fa-arrow-left main_color"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                        <p class="text-white p-0 m-0 fw-bold">Edit Current Sales Order Status</p>
                    </div>

                    <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                        <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                <span>Row</span>
                            </div>
                        </a>
                        <a href="{{ route('purchase.index') }}" class="btn navigation_btn ms-2">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                <span>Solution</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div id="table1" class="card cardTd">
                        <div class="card-body p-2">
                            <form method="post" action="{{ route('rfqOrderStatus.update', $rfqOrderStatus->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="container bg-light py-2 mb-2 rounded">
                                    <div class="row mb-1 ">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="form-group text-secondary col-sm-12">
                                                    <span>Choose Sale</span>
                                                    <select name="rfq_id" class="form-control select"
                                                        data-placeholder="Choose Sale ">
                                                        @foreach ($rfqs as $rfq)
                                                            <option @selected($rfq->id == $rfqOrderStatus->rfq_id)
                                                                value="{{ $rfq->id }}">Client Name:
                                                                {{ $rfq->name }}, <br> RFQ Code: {{ $rfq->rfq_code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row ">
                                                        <div class="form-group text-secondary col-sm-12">
                                                            <span>Client Price</span>
                                                            <select name="client_price_status"
                                                                class="form-select client_select"
                                                                data-placeholder="Chose year started "
                                                                style="    width: 265px;">
                                                                <option @selected($rfqOrderStatus->client_price_status == 'adv_received') value="adv_received">
                                                                    Advance Received</option>
                                                                <option @selected($rfqOrderStatus->client_price_status == 'not_received') value="not_received">
                                                                    Not Received</option>
                                                                <option @selected($rfqOrderStatus->client_price_status == 'half_received') value="half_received">
                                                                    Half Received</option>
                                                                <option @selected($rfqOrderStatus->client_price_status == 'received') value="received">
                                                                    Received</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Call To Action --}}
                                    <div class="row client_display d-none px-2 mb-2">
                                        <div class="col-sm-4 p-0 m-0 text-secondary">
                                            <span>Collected Price Status</span>
                                        </div>
                                        <div class="form-group col-sm-8 text-secondary">
                                            <input type="text" name="client_price" class="form-control form-control-sm"
                                                value="{{ $rfqOrderStatus->principles_name }}" maxlength="100" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-6 text-secondary">
                                            <span>Principal Name</span>
                                            <input type="text" name="principles_name"
                                                class="form-control form-control-sm maxlength" maxlength="100" />
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <span>Principal Price</span>
                                            <input type="text" name="principles_price"
                                                value="{{ $rfqOrderStatus->principles_price }}"
                                                class="form-control form-control-sm maxlength" maxlength="100" />
                                        </div>
                                    </div>
                                    <div class="border px-2 py-2 rounded mt-2">
                                        <div class="row mb-2">
                                            <div class="col-lg-4">
                                                <div class="row d-flex align-items-center">
                                                    <div class="text-secondary col-sm-8">
                                                        <span>Orders</span>
                                                        <select name="order_status"
                                                            class="form-control form-control-sm select"
                                                            data-placeholder="Chose year started"
                                                            style="width: 175px !important;">
                                                            <option @selected($rfqOrderStatus->order_status == 'high_priority') value="high_priority">High
                                                                Priority</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'standard_time') value="standard_time">
                                                                Standard
                                                                Time</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'client_submitted_bill')
                                                                value="client_submitted_bill">
                                                                Client - Submitted Bill
                                                            </option>
                                                            <option @selected($rfqOrderStatus->order_status == 'technical_error') value="technical_error">
                                                                Technical Issues/ Error</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'principal_order_processing')
                                                                value="principal_order_processing">Prncpl. - Order
                                                                Processing</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'principal_pmt_processing')
                                                                value="principal_pmt_processing">Prncpl. - Pmt Processing
                                                            </option>
                                                            <option @selected($rfqOrderStatus->order_status == 'client_cert_waiting')
                                                                value="client_cert_waiting">
                                                                Client - Cert Waiting</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'client_pmt_waiting')
                                                                value="client_pmt_waiting">
                                                                Client - Pmt Waiting</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'order_done') value="order_done">Order
                                                                -
                                                                Done
                                                            </option>
                                                            <option @selected($rfqOrderStatus->order_status == 'order_not_done') value="order_not_done">
                                                                Order -
                                                                Not Done</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'commercial_issue') value="commercial_issue">
                                                                Commercial Issue</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'product_issue') value="product_issue">
                                                                Product
                                                                Issue</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'sourcing_issue') value="sourcing_issue">
                                                                Sourcing Issue</option>
                                                            <option @selected($rfqOrderStatus->order_status == 'financial_issue') value="financial_issue">
                                                                Financial Issue</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row d-flex align-items-center">
                                                    <div class="form-group text-secondary col-sm-12">
                                                        <span>Processing</span>
                                                        <select name="processing_status" class="form-control select"
                                                            data-minimum-results-for-search="Infinity"
                                                            data-placeholder="Chose year started ">
                                                            <option @selected($rfqOrderStatus->processing_status == 'processed') value="processed">
                                                                Processed
                                                            </option>
                                                            <option @selected($rfqOrderStatus->processing_status == 'not_processed') value="not_processed">Not
                                                                Processed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row d-flex align-items-center">
                                                    <div class="form-group text-secondary col-sm-12 text-secondary">
                                                        <span>Delivery</span>
                                                        <select name="delivery_status" class="form-control select"
                                                            data-minimum-results-for-search="Infinity"
                                                            data-placeholder="Chose year started ">
                                                            <option @selected($rfqOrderStatus->delivery_status == 'delivered') value="delivered">
                                                                Delivered
                                                            </option>
                                                            <option @selected($rfqOrderStatus->delivery_status == 'not_delivered') value="not_delivered">Not
                                                                Delivered</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-group text-secondary col-sm-12">
                                                    <span>Principal Payment Status </span>
                                                    <select name="principles_payment_status"
                                                        class="form-select principle_select"
                                                        data-placeholder="Chose year started " style="width:175px;">
                                                        <option @selected($rfqOrderStatus->principles_payment_status == 'adv_paid') value="adv_paid">Advance paid
                                                        </option>
                                                        <option @selected($rfqOrderStatus->principles_payment_status == 'not_paid') value="not_paid"> Not paid
                                                        </option>
                                                        <option @selected($rfqOrderStatus->principles_payment_status == 'half_paid') value="half_paid">Half paid
                                                        </option>
                                                        <option @selected($rfqOrderStatus->principles_payment_status == 'paid') value="paid">Paid</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 principle_display d-none">
                                                <div class="form-group col-sm-12 text-secondary">
                                                    <span>Principal Payment</span>
                                                    <input type="text" name="principles_payment"
                                                        value="{{ $rfqOrderStatus->principles_payment }}"
                                                        class="form-control form-control-sm maxlength" maxlength="100" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-secondary d-flex justify-content-end">
                                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                            style="padding: 4px 9px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->
    </div>
@endsection
@once
    @push('scripts')
        <script>
            $('.client_select').on('change', function() {

                var client_value = $(this).find(":selected").val();

                if (client_value == 'adv_received') {
                    $(".client_display").removeClass("d-none");
                } else if (client_value == 'half_received') {
                    $(".client_display").removeClass("d-none");
                } else {
                    $(".client_display").addClass("d-none");
                }

            });
        </script>
        <script>
            $('.principle_select').on('change', function() {

                var principle_value = $(this).find(":selected").val();

                if (principle_value == 'adv_paid') {
                    $(".principle_display").removeClass("d-none");
                } else if (principle_value == 'half_paid') {
                    $(".principle_display").removeClass("d-none");
                } else {
                    $(".principle_display").addClass("d-none");
                }

            });
        </script>
    @endpush

@endonce
