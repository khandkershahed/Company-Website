@extends('admin.master')
@section('content')
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

        .fade-setting {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.5s ease, max-height 0.5s ease;
            display: none;
        }

        .fade-setting.show {
            opacity: 1;
            max-height: 500px;
            /* Adjust this value as needed */
        }

        .nav-link.actives {
            background-color: black;
        }

        .form-setting {
            padding: 9px 11px !important;
        }

        .form-setting:focus {
            border-radius: 0;
            border: 0;
            /* background-color: #e7e7e78c; */
            color: black;
            font-size: 11px;
            font-weight: 500;
            margin: 0px 0px;
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
    <!-- Inner content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content d-lg-flex border-top justify-content-between align-items-center shadow-sm">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">RFQ Management</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div class="d-lg-block d-sm-none">
                    <a href="{{ route('admin.rfq.list') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>RFQ List</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.deal.list') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>Deal List</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content p-0" style="overflow: hidden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-12 p-2">
                        <div class="d-lg-block d-sm-none">
                            {{-- For Large Device --}}
                            <ul class="nav nav-tabs flex-column border-0" id="myTabs" role="tablist">
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link active" id="tab0-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab0" type="button" role="tab" aria-controls="tab0"
                                        aria-selected="true">Status</button>
                                    {{-- <input type="radio" name="tabs" id="tab0-radio" class="nav-radio visually-hidden"
                                        data-bs-toggle="tab" data-bs-target="#tab0" role="tab" aria-controls="tab0"
                                        aria-selected="true">
                                    <label class="nav-link" for="tab0-radio" style="padding: 17px;">Status</label> --}}
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab1-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab1" type="button" role="tab" aria-controls="tab0"
                                        aria-selected="true">RFQ Details</button>

                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab2" type="button" role="tab" aria-controls="tab0"
                                        aria-selected="true">Regular Process</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab3-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab3" type="button" role="tab" aria-controls="tab0"
                                        aria-selected="true">Bypass Process</button>

                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab4-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab4" type="button" role="tab" aria-controls="tab0"
                                        aria-selected="true">Department Wise
                                        Actions</button>
                                </li>
                            </ul>
                        </div>
                        {{-- For Mobile Device --}}
                        <div class="d-lg-none d-sm-block">
                            <ul class="nav nav-tabs border-0 justify-content-center align-items-center" id="myTabs"
                                role="tablist">
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1"
                                        aria-selected="true">RFQ Details</button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                        type="button" role="tab" aria-controls="tab2" aria-selected="false"
                                        tabindex="-1">Regular Process</button>
                                </li>
                                <li class="nav-item me-2 mt-2" role="presentation">
                                    <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                        type="button" role="tab" aria-controls="tab3" aria-selected="false"
                                        tabindex="-1">Bypass Process</button>
                                </li>
                                <li class="nav-item me-2 mt-2" role="presentation">
                                    <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                                        type="button" role="tab" aria-controls="tab4" aria-selected="false"
                                        tabindex="-1">Department Wise Actions</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content bg-white mt-0 pt-0" id="myTabContent">
                                    <div class="tab-pane fade show active " id="tab0" role="tabpanel"
                                        aria-labelledby="tab1-tab">
                                        <div class="card rounded-0">
                                            <div class="card-header p-1 rounded-0" style="background-color: #247297;">
                                                <h4 class="text-center m-0 text-white fw-normal">
                                                    {{ $rfq_details->rfq_code }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive" style="height:10rem;">
                                                    <div class="track">
                                                        @if ($rfq_details->rfq_type == 'rfq')
                                                            <div
                                                                class="step
                                                                {{ $rfq_details->status == 'rfq_created' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'assigned' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'deal_created' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'sas_created' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'sas_approved' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'quoted' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                                ">
                                                                <span class="icon">
                                                                    @if ($rfq_details->status == 'rfq_created')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'assigned')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'deal_created')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'sas_created')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'sas_approved')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'quoted')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'invoice_sent')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                        <i class="fa fa-check"></i>
                                                                    @else
                                                                        <i class="fa fa-times"></i>
                                                                    @endif

                                                                </span>
                                                                <span class="text">RFQ Created</span>
                                                            </div>

                                                            <div
                                                                class="step
                                                                {{ $rfq_details->status == 'assigned' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'deal_created' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'sas_created' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'sas_approved' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'quoted' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                                {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                                ">
                                                                <span class="icon">
                                                                    @if ($rfq_details->status == 'assigned')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'deal_created')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'sas_created')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'sas_approved')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'quoted')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'invoice_sent')
                                                                        <i class="fa fa-check"></i>
                                                                    @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                        <i class="fa fa-check"></i>
                                                                    @else
                                                                        <i class="fa fa-times"></i>
                                                                    @endif
                                                                </span>
                                                                <span class="text"> Salesman Assigned</span>
                                                                <span class="text">
                                                                    @if ($rfq_details->status == 'rfq_created')
                                                                        <a href="javascript:void(0);"
                                                                            class="text-primary mx-3 mx-3"
                                                                            data-bs-toggle="modal"
                                                                            title="View & Assign Sales Manager"
                                                                            data-bs-target="#assign-manager-{{ $rfq_details->rfq_code }}">
                                                                            <i class="icon-user-check icon-1x"
                                                                                style="color: #247297;"></i>
                                                                        </a>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        @endif

                                                        <div
                                                            class="step
                                                            {{ $rfq_details->status == 'deal_created' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'sas_created' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'sas_approved' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'quoted' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                                ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'deal_created')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'sas_created')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'sas_approved')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'quoted')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'invoice_sent')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text"> Deal Created </span>
                                                            <span class="text">
                                                                @if ($rfq_details->status == 'assigned')
                                                                    <a href="{{ route('deal.convert', [$rfq_details->id]) }}"
                                                                        class="text-success mx-3 mx-3"
                                                                        title="Convert To Deal">
                                                                        <i class="icon-pen-plus icon-1x"></i>
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>

                                                        <div
                                                            class="step
                                                            {{ $rfq_details->status == 'sas_created' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'sas_approved' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'quoted' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                            ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'sas_created')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'sas_approved')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'quoted')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'invoice_sent')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text">SAS Created</span>
                                                            <span class="text">
                                                                @if ($rfq_details->status == 'deal_created')
                                                                    <a href="{{ route('deal-sas.show', $rfq_details->rfq_code) }}"
                                                                        class="text-success mx-3 mx-3" title="Create SAS">
                                                                        <i class="icon-file-plus2 icon-1x"></i>
                                                                    </a>
                                                                @endif
                                                            </span>

                                                        </div>

                                                        <div
                                                            class="step
                                                            {{ $rfq_details->status == 'sas_approved' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'quoted' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                            ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'sas_approved')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'quoted')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'invoice_sent')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text"> SAS Approved</span>
                                                            <span class="text">
                                                                @if ($rfq_details->status == 'sas_created')
                                                                    <a href="{{ route('deal-sas.edit', $rfq_details->rfq_code) }}"
                                                                        class="text-info mx-2" title="Edit Sas">
                                                                        <i class="icon-pencil icon-1x"></i>
                                                                    </a>
                                                                    <a href="{{ route('dealsasapprove', $rfq_details->rfq_code) }}"
                                                                        class="text-warning mx-3 mx-3"
                                                                        title="Approve Sas">
                                                                        <i class="mi-check-circle mi-1x"></i>
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>

                                                        <div
                                                            class="step
                                                            {{ $rfq_details->status == 'quoted' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                            ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'quoted')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'invoice_sent')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text"> Quotation Sent </span>
                                                            <span class="text">
                                                                @if ($rfq_details->status == 'sas_approved')
                                                                    <a href="javascript:void(0);"
                                                                        class="text-primary mx-3 mx-3"
                                                                        data-bs-toggle="modal" title="Send Quotation"
                                                                        data-bs-target="#quotation-send-{{ $rfq_details->rfq_code }}">
                                                                        <i class="icon-paperplane icon-1x"></i>
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>

                                                        <div
                                                            class="step
                                                            {{ $rfq_details->status == 'workorder_uploaded' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                            ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'workorder_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'invoice_sent')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text">Work Order Uploaded</span>
                                                            @if ($rfq_details->status == 'quoted')
                                                                <span class="text">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-primary mx-2" data-bs-toggle="modal"
                                                                        title="Upload Work order"
                                                                        data-bs-target="#Work-order-{{ $rfq_details->rfq_code }}">
                                                                        <i class="icon-file-plus2"></i>
                                                                    </a>

                                                                </span>
                                                            @endif
                                                        </div>



                                                        <div
                                                            class="step
                                                            {{ $rfq_details->status == 'invoice_sent' ? 'active' : '' }}
                                                            {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                            ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'invoice_sent')
                                                                    <i class="fa fa-check"></i>
                                                                @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text">Invoice Sent</span>
                                                            <span class="text">
                                                                @if ($rfq_details->status == 'workorder_uploaded')
                                                                    <a href="javascript:void(0);"
                                                                        class="text-primary mx-3 mx-3"
                                                                        data-bs-toggle="modal" title="Send Invoice"
                                                                        data-bs-target="#invoice-send-{{ $rfq_details->rfq_code }}">
                                                                        <i class="icon-paperplane icon-1x"></i>
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>

                                                        <div
                                                            class="step {{ $rfq_details->status == 'proof_of_payment_uploaded' ? 'active' : '' }}
                                                            ">
                                                            <span class="icon">
                                                                @if ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                    <i class="fa fa-check"></i>
                                                                @else
                                                                    <i class="fa fa-times"></i>
                                                                @endif
                                                            </span>
                                                            <span class="text">Proof of Payment Uploaded</span>
                                                            <span class="text">
                                                                @if ($rfq_details->status == 'invoice_sent')
                                                                    <a href="javascript:void(0);"
                                                                        class="text-primary mx-3 mx-3"
                                                                        data-bs-toggle="modal" title="Send Invoice"
                                                                        data-bs-target="#proofpayment-{{ $rfq_details->rfq_code }}">
                                                                        <i class="icon-file-plus2 icon-1x"></i>
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab1" role="tabpanel"
                                        aria-labelledby="tab1-tab">
                                        <div class="card rounded-0">
                                            <div class="card-header rounded-0 p-0">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-5">
                                                        <ul class="nav nav-tabs border-0 d-flex justify-content-start align-items-center"
                                                            style="padding-top: 0px;padding-bottom: 1px;">
                                                            <li class="nav-item mb-0 me-1">
                                                                <a href="#client_details"
                                                                    class=" nav-link active cat-tab1 p-1"
                                                                    data-bs-toggle="tab">
                                                                    <p class="m-0 p-1">
                                                                        Client Details</p>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item mb-0">
                                                                <a href="#product_details" class=" nav-link cat-tab2 p-1 "
                                                                    data-bs-toggle="tab">
                                                                    <p class="m-0 p-1">
                                                                        Product Details</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <h5 class="m-0 p-0 ps-5 fw-normal" style="color: #247297;">RFQ
                                                            Details</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="row rounded">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="client_details">
                                                            {{-- Save Table --}}
                                                            <table class="table table-bordered table-hover text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="10%">Client Type</th>
                                                                        <th width="20%">Name</th>
                                                                        <th width="20%">Company Name</th>
                                                                        <th width="15%">Phone Number</th>
                                                                        <th width="25%" class="text-center">Assigned
                                                                            Sales Manager
                                                                            (L1) </th>
                                                                        <th width="10%" class="text-center">Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            {{ ucfirst($rfq_details->client_type) }}</td>
                                                                        <td> {{ ucfirst($rfq_details->name) }}</td>
                                                                        <td> {{ ucfirst($rfq_details->company_name) }}</td>
                                                                        {{-- <td>
                                                                            @if ($rfq_details->rfqProducts->sum('qty') > 0)
                                                                                {{ $rfq_details->rfqProducts->sum('qty') }}
                                                                            @else
                                                                                {{ $rfq_details->qty }}
                                                                            @endif
                                                                        </td> --}}
                                                                        <td>{{ $rfq_details->phone }}</td>
                                                                        <td>{{ App\Models\User::where('id', $rfq_details->sales_man_id_L1)->value('name') }}
                                                                            <br>
                                                                            @if ($rfq_details->sales_man_id_T1)
                                                                                Assigned Sales Manager (T1) :
                                                                                {{ App\Models\User::where('id', $rfq_details->sales_man_id_T1)->value('name') }}
                                                                                <br>
                                                                            @endif
                                                                            @if ($rfq_details->sales_man_id_T2)
                                                                                Assigned Sales Manager (T2) :
                                                                                {{ App\Models\User::where('id', $rfq_details->sales_man_id_T2)->value('name') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ ucfirst($rfq_details->status) }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show" id="product_details">
                                                            <div class="table-responsive text-center">
                                                                <table class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> Product Name</th>
                                                                            <th> Quantity </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if ($rfq_details->rfqProducts->count() > 0)
                                                                            @foreach ($rfq_details->rfqProducts as $product)
                                                                                <tr class="text-black bg-white">
                                                                                    <td>{{ $product->product_name }}</td>
                                                                                    <td>{{ $product->qty }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr> No Data Available</tr>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                <!-- Product Details Table -->
                                                                {{-- @if (!empty($sourcing->grand_total))
                                                                    <table class="table table-bordered"
                                                                        style="width: 100%;height: auto;">
                                                                        <thead>
                                                                            <tr class="expand-switch1"
                                                                                style="padding-top: 8px;padding-bottom: 8px; background-color: #247297 !important;">
                                                                                <th width="86%" colspan="4" class="text-white"
                                                                                    style="border:none; font-size:18px !important; padding-top:8px !important;padding-bottom:8px !important;">
                                                                                    <i class="icon1 fa fa-minus mx-3"></i> Product
                                                                                    Details
                                                                                </th>
                                                                                <th width="14%" class="text-center"
                                                                                    style="border:none;">
                                                                                    @if ($rfq_details->status == 'rfq_created')
                                                                                    @elseif ($rfq_details->status == 'assigned')

                                                                                    @elseif ($rfq_details->status == 'deal_created')
                                                                                    @else
                                                                                        <a href="javascript:void(0);"
                                                                                            class="text-white" title="Show SAS"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#show-sas">
                                                                                            <i class="icon-eye"></i>
                                                                                        </a>
                                                                                    @endif
                                                                                </th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody class="expand-div1">
                                                                            <tr class="text-center"
                                                                                style="background-color: rgba(0,0,0,.03);">
                                                                                <th width="40%">Product Description</th>
                                                                                <th width="14%">Quantity</th>

                                                                                @if ($rfq_details->regular == '1')
                                                                                    <th width="10%" class="rg_discount d-none">
                                                                                        Discount </th>
                                                                                    <th width="10%" class="rg_discount d-none">
                                                                                        Disc. Unit </th>
                                                                                @else
                                                                                    <th width="10%" class="rg_unit">Unit Price
                                                                                    </th>
                                                                                @endif

                                                                                <th width="15%">Unit Total</th>
                                                                            </tr>

                                                                            @foreach ($deal_products as $key => $item)
                                                                                <tr>
                                                                                    <td>
                                                                                        {{ Str::words($item->item_name, 30) }}
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        {{ $item->qty }}
                                                                                    </td>
                                                                                    @if ($rfq_details->regular == '1')
                                                                                        <th width="10%" class="rg_discount d-none">
                                                                                            {{ $item->regular_discount }} %
                                                                                        </th>
                                                                                        <th width="10%" class="rg_discount d-none">
                                                                                            {{ number_format($item->sales_price / $item->qty, 2) }}
                                                                                        </th>
                                                                                    @else
                                                                                        <th width="10%" class="rg_unit">
                                                                                            {{ number_format($item->sales_price / $item->qty, 2) }}
                                                                                        </th>
                                                                                    @endif
                                                                                    <td class="text-center">$ {{ $item->sales_price }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                            <tr>
                                                                                <th> </th>
                                                                                @if ($rfq_details->regular == '1')
                                                                                    <th width="10%" class="rg_discount d-none">
                                                                                    </th>
                                                                                    <th width="10%" class="rg_discount d-none">
                                                                                    </th>
                                                                                @else
                                                                                    <th width="10%" class="rg_unit"></th>
                                                                                @endif
                                                                                <td class="text-center"> Sub Total </td>
                                                                                <td class="text-center">$
                                                                                    {{ $sourcing->sub_total_sales }}</td>
                                                                            </tr>
                                                                            @if ($rfq_details->special == '1')
                                                                                <tr class="special_discount">
                                                                                    <th> </th>
                                                                                    @if ($rfq_details->regular == '1')
                                                                                        <th width="10%" class="rg_discount d-none">
                                                                                        </th>
                                                                                        <th width="10%" class="rg_discount d-none">
                                                                                        </th>
                                                                                    @else
                                                                                        <th width="10%" class="rg_unit"></th>
                                                                                    @endif
                                                                                    <td class="text-center">Special discount </td>
                                                                                    <td class="text-center">
                                                                                        {{ $sourcing->special_discount }} %</td>
                                                                                    <td class="text-center">$
                                                                                        {{ $sourcing->special_discounted_sales }}</td>
                                                                                </tr>
                                                                            @endif

                                                                            <tr>
                                                                                <th> </th>
                                                                                @if ($rfq_details->regular == '1')
                                                                                    <th width="10%" class="rg_discount d-none">
                                                                                    </th>
                                                                                    <th width="10%" class="rg_discount d-none">
                                                                                    </th>
                                                                                @else
                                                                                    <th width="10%" class="rg_unit"></th>
                                                                                @endif
                                                                                <th class="text-center"> Total </th>
                                                                                <td class="text-center">$
                                                                                    {{ $sourcing->grand_total - $sourcing->tax_sales }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>

                                                                    </table>

                                                                    <!-- Tax / VAT Table -->
                                                                    @if ($rfq_details->tax_status == '1')
                                                                        <table class="table table-bordered mt-2 expand-div1">
                                                                            <th colspan="3" width="80%"> Tax / VAT</td>
                                                                            <td class="text-center" width="10%">
                                                                                {{ $sourcing->tax }}%</td>
                                                                            <td class="text-center" width="10%">$
                                                                                {{ $sourcing->tax_sales }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    @endif
                                                                @else
                                                                    <!-- Default Product Details Table -->
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr class="expand-switch"
                                                                                style="padding-top: 8px; padding-bottom: 8px; background-color: #247297;">
                                                                                <th width="100%" colspan="2" class="text-white"
                                                                                    style="border:none; font-size:18px !important; padding-top:8px !important;padding-bottom:8px !important;">
                                                                                    <i class="icon3 fa fa-plus mx-3"></i> Product
                                                                                    Details
                                                                                </th>
                                                                                <th width="100%" class="text-center"
                                                                                    style="border:none;">
                                                                                    @if ($rfq_details->status == 'rfq_created')
                                                                                    @elseif ($rfq_details->status == 'assigned')

                                                                                    @elseif ($rfq_details->status == 'deal_created')
                                                                                    @else
                                                                                        <a href="javascript:void(0);"
                                                                                            class="text-white" title="Show SAS"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#show-sas">
                                                                                            <i class="icon-eye"></i>
                                                                                        </a>
                                                                                    @endif
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="expand-div d-none">
                                                                            <tr class="text-center">
                                                                                <td width="60%"> Product Name</td>
                                                                                <td width="20%"> Quantity </td>
                                                                                <td width="20%"> Sale Price </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><a href="javascript:void(0);"
                                                                                        title="{{ App\Models\Admin\Product::where('id', $rfq_details->product_id)->value('name') }}">{{ Str::limit(App\Models\Admin\Product::where('id', $rfq_details->product_id)->value('name'), 28) }}</a>
                                                                                </th>
                                                                                <th>{{ $rfq_details->qty }}</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                @endif --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel"
                                        aria-labelledby="tab2-tab">
                                        <div class="card rounded-0 mb-0">
                                            <div class="card-header rounded-0 p-1" style="background-color: #247297;">
                                                <h4 class="m-0 p-0 text-center text-white fw-normal">Regular Process</h4>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="row gx-3 m-3">
                                                    <div class="col">
                                                        <div class="text-start main_bg text-white p-2">
                                                            <span>Sales</span>
                                                            @if ($rfq_details->rfq_type == 'accounts')
                                                                <span class="badge bg-success">Sale Completed</span>
                                                            @elseif ($rfq_details->rfq_type == 'purchase')
                                                                <span class="badge bg-success">Sale Completed</span>
                                                            @else
                                                                <span class="badge bg-warning">On Going</span>
                                                            @endif
                                                        </div>
                                                        <div class="bg-white shadow-sm p-2">
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border ">
                                                                    <div class="ps-2">
                                                                        <span>Deal</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_sale_profit_loss">
                                                                            <i class="ph-plus-circle ph-1x"></i> Edit
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border">
                                                                    <div class="ps-2">
                                                                        <span>Deal SAS</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_sale_forecast">
                                                                            <i class="ph-plus-circle ph-1x"></i> Add
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border">
                                                                    <div class="ps-2">
                                                                        <span>Quotation Send</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#quotation-send-{{ $rfq_details->rfq_code }}">
                                                                            <i class="ph-airplane-tilt ph-1x me-1"></i>
                                                                            @if ($rfq_details->status == 'assigned')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'deal_created')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'sas_created')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'sas_approved')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'quoted')
                                                                                Resend
                                                                            @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                                Resend
                                                                            @elseif ($rfq_details->status == 'invoice_sent')
                                                                                Resend
                                                                            @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                                Resend
                                                                            @else
                                                                                Send
                                                                            @endif
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border">
                                                                    <div class="ps-2">
                                                                        <span>Invoice Send</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#invoice-send-{{ $rfq_details->rfq_code }}">
                                                                            <i class="ph-airplane-tilt ph-1x me-1"></i>
                                                                            @if ($rfq_details->status == 'assigned')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'deal_created')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'sas_created')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'sas_approved')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'quoted')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'workorder_uploaded')
                                                                                Send
                                                                            @elseif ($rfq_details->status == 'invoice_sent')
                                                                                Resend
                                                                            @elseif ($rfq_details->status == 'proof_of_payment_uploaded')
                                                                                Resend
                                                                            @else
                                                                                Send
                                                                            @endif
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border">
                                                                    <div class="ps-2">
                                                                        <span>Commercial Documents</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_commercial_documents">
                                                                            <i class="ph-plus-circle ph-1x"></i> Add
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="text-start main_bg text-white p-2">
                                                            <span>Accounts</span>
                                                            &nbsp;
                                                            @if ($rfq_details->rfq_type == 'purchase')
                                                                <span class="badge bg-success">Accounts Completed</span>
                                                            @elseif ($rfq_details->rfq_type == 'accounts')
                                                                <span class="badge bg-warning">On Going</span>
                                                            @else
                                                            @endif
                                                        </div>
                                                        <div class="bg-white shadow-sm p-2">
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border ">
                                                                    <div class="ps-2">
                                                                        <span>Accounts Profit Loss</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_account_profitLoss">
                                                                            <i class="ph-plus-circle ph-1x"></i> Add
                                                                        </button>
                                                                        @include('admin.pages.singleRfq.accounts-modal')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border ">
                                                                    <div class="ps-2">
                                                                        <span>Payable</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_account_payable">
                                                                            <i class="ph-plus-circle ph-1x"></i> Add
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border ">
                                                                    <div class="ps-2">
                                                                        <span>Receivable</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_account_receivable">
                                                                            <i class="ph-plus-circle ph-1x"></i> Add
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="text-start main_bg text-white p-2">
                                                            <span>Purchase</span>
                                                        </div>
                                                        <div class="bg-white shadow-sm p-2">
                                                            <div class="pt-1 pb-1">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center border">
                                                                    <div class="ps-2">
                                                                        <span>Receivable</span>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn navigation_btn me-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modal_account_receivable">
                                                                            <i class="ph-plus-circle ph-1x"></i> Add
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade border-0 text-center" id="tab3"
                                        role="tabpanel" aria-labelledby="tab3-tab">
                                        <div class="card mt-4 w-50 mx-auto">
                                            <div class="card-header border-0 rounded-0 bg-transparent p-0">
                                                {{-- <img class="img-fluid" width="300px" src="https://i.ibb.co/GTfWfMB/quotation-marks-11721-removebg-preview.png" alt=""> --}}
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <h3>Exploring Direct Quotations without going step by step </h3>

                                                </div>
                                                <a href="{{ route('admin.single-rfq.quoation_mail', $rfq_details->rfq_code) }}"
                                                    target="_blank" class="text-center main_color fw-bolder py-3">Go to Direct
                                                    Quotation <i class="fa-solid fa-arrow-right ps-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel"
                                        aria-labelledby="tab4-tab">
                                        <div class="card rounded-0 mb-0">
                                            <div class="card-header rounded-0 p-1" style="background-color: #247297;">
                                                <h4 class="m-0 p-0 text-center text-white fw-normal">Department Wise
                                                    Actions</h4>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="card-body p-0">
                                                    <div class="row gx-3 m-3">
                                                        <div class="col">
                                                            <div class="text-start main_bg text-white p-2">
                                                                <span>Sales</span>
                                                                @if ($rfq_details->rfq_type == 'accounts')
                                                                    <span class="badge bg-success">Sale Completed</span>
                                                                @elseif ($rfq_details->rfq_type == 'purchase')
                                                                    <span class="badge bg-success">Sale Completed</span>
                                                                @else
                                                                    <span class="badge bg-warning">On Going</span>
                                                                @endif
                                                            </div>
                                                            <div class="bg-white shadow-sm p-2">
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border ">
                                                                        <div class="ps-2">
                                                                            <span>Sales Profit Loss</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_sale_profit_loss">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                            @include('admin.pages.singleRfq.sales-modal')
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border">
                                                                        <div class="ps-2">
                                                                            <span>Sales Forecast</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_sale_forecast">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border">
                                                                        <div class="ps-2">
                                                                            <span>Commercial Documents</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_commercial_documents">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border">
                                                                        <div class="ps-2">
                                                                            <span>Commercial Documents</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_commercial_documents">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-start main_bg text-white p-2">
                                                                <span>Accounts</span>
                                                                &nbsp;
                                                                @if ($rfq_details->rfq_type == 'purchase')
                                                                    <span class="badge bg-success">Accounts
                                                                        Completed</span>
                                                                @elseif ($rfq_details->rfq_type == 'accounts')
                                                                    <span class="badge bg-warning">On Going</span>
                                                                @else
                                                                @endif
                                                            </div>
                                                            <div class="bg-white shadow-sm p-2">
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border ">
                                                                        <div class="ps-2">
                                                                            <span>Accounts Profit Loss</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_account_profitLoss">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                            @include('admin.pages.singleRfq.accounts-modal')
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border ">
                                                                        <div class="ps-2">
                                                                            <span>Payable</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_account_payable">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border ">
                                                                        <div class="ps-2">
                                                                            <span>Receivable</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_account_receivable">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-start main_bg text-white p-2">
                                                                <span>Purchase</span>
                                                            </div>
                                                            <div class="bg-white shadow-sm p-2">
                                                                <div class="pt-1 pb-1">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center border">
                                                                        <div class="ps-2">
                                                                            <span>Receivable</span>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button"
                                                                                class="btn navigation_btn me-0"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modal_account_receivable">
                                                                                <i class="ph-plus-circle ph-1x"></i> Add
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->
    </div>
    <!-- /inner content -->

    @include('admin.pages.singleRfq.partials.rfq_manage_modals')
@endsection
@once
    @push('scripts')
        <script>
            function toggleVisibility() {
                var settingShow = document.getElementById('setting-show');
                var button = document.getElementById('setting');
                if (settingShow.classList.contains('show')) {
                    settingShow.classList.remove('show');
                    // Delay setting display to 'none' to allow transition to complete
                    setTimeout(function() {
                        settingShow.style.display = 'none';
                        button.classList.remove('active');
                    }, 500); // Duration should match the transition time
                } else {
                    settingShow.style.display = 'block';
                    // Trigger reflow to ensure the transition occurs
                    settingShow.offsetHeight; // Force reflow
                    settingShow.classList.add('show');
                    button.classList.add('active');
                }
            }

            document.getElementById('setting').addEventListener('click', toggleVisibility);
        </script>
        <script>
            function AddTableRowTwoBottom() {
                var tableBodies = document.getElementsByClassName("table_bottom_area");
                var tableBody = tableBodies[tableBodies.length - 1]; // Select the last tbody
                var newRow = tableBody.insertRow(tableBody.rows.length);
                newRow.innerHTML =
                    `
            <tr class="">
                <td>
                    <button class="border-0 p-0 bg-transparent text-danger rounded-0" onclick="deleteTableRowTwo(this)" title="Delete List Amount"><i class="fa-regular fa-trash-can"></i></button>
                </td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="-"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Packing Charge"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="0"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="$0"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="$0"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="170 TK"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td class="text-center"><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td colspan="2" class="text-center"><input type="text"
                                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                                        value="Tk.30,480"
                                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
            </tr>
        `;
            }

            function deleteTableRowTwo(btn) {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        </script>
        <script>
            function addTableRow() {
                var table = document.getElementsByClassName("table-borderd")[0].getElementsByTagName('tbody')[0];
                var newRow = table.insertRow(table.rows.length);
                newRow.innerHTML =
                    `
                <td>
                    <button class="border-0 p-0 bg-transparent text-danger rounded-0" onclick="deleteTableRow(this)" title="Delete List Items"><i class="fa-regular fa-trash-can"></i></button>
                </td>
                <td>${table.rows.length}</td>
                <td>
                    <input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                <td><input type="text"
                                                                                        class="form-control form-control-sm bg-transparent text-start"
                                                                                        value="Remitance"
                                                                                        style="font-size: 10px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                `;
                    }

            function deleteTableRow(btn) {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        </script>

        <script>
            function addRow() {
                var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
                var newRow = table.insertRow(table.rows.length);
                newRow.innerHTML =
                    `<td style="border: 1px solid #eee;padding: 0.5rem;text-align: center;"><button class="btn btn-danger rounded-0" onclick="deleteRow(this)"><i class="fa-regular fa-trash-can"></i></button></td>
                                <td style="border: 1px solid #eee;padding: 0.5rem;text-align: center;">${table.rows.length}</td>
                                <td style="border: 1px solid #eee; padding: 8px; width: 40%"><input type="text" class="form-control form-control-sm bg-transparent" value="" style="font-size: 13px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                                <td style="border: 1px solid #eee;padding: 0.5rem;text-align: center;"><input type="text" class="form-control form-control-sm bg-transparent text-center" value="" style="font-size: 13px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                                <td style="border: 1px solid #eee;padding: 0.5rem;text-align: center;"><input type="text" class="form-control form-control-sm bg-transparent text-center" value="" style="font-size: 13px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>
                                <td style="border: 1px solid #eee;padding: 0.5rem;text-align: center;"><input type="text" class="form-control form-control-sm bg-transparent text-end" value="" style="font-size: 13px;font-family: 'Poppins', sans-serif;color: #3d3d3d;padding: 0px !important;"></td>`;
            }

            function deleteRow(btn) {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        </script>
        <script type="text/javascript">
            $('.rfqDT1').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [2, 4],
                }, ],
            });
            $('.rfqDT2').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [2, 4],
                }, ],
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".cat-tab1").click(function() {
                    $("#cat-tab2").addClass('d-none');
                    $("#cat-tab1").removeClass('d-none');
                    $(".saved_title").removeClass('d-none');
                    $(".completed_title").addClass('d-none');
                });
                $(".cat-tab2").click(function() {
                    $("#cat-tab1").addClass('d-none');
                    $("#cat-tab2").removeClass('d-none');
                    $(".saved_title").addClass('d-none');
                    $(".completed_title").removeClass('d-none');
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $('.editRfquser').click(function() {
                    $(".Rfquser").toggle(this.checked);
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $(".expand-switch").on('click', function() {
                    //$("#additionalExpand").toggle();
                    if ($(".expand-div").hasClass('d-none')) {
                        $(".expand-div").removeClass('d-none');
                        $(".icon3").removeClass('fa-plus');
                        $(".icon3").addClass('fa-minus');
                    } else {
                        $(".expand-div").addClass('d-none');
                        $(".icon3").removeClass('fa-minus');
                        $(".icon3").addClass('fa-plus');
                    }


                });


            });
        </script>

        <script>
            $(document).ready(function() {
                $(".expand-switch2").on('click', function() {
                    //$("#additionalExpand").toggle();
                    if ($(".expand-div2").hasClass('d-none')) {
                        $(".expand-div2").removeClass('d-none');
                        $(".icon2").removeClass('fa-plus');
                        $(".icon2").addClass('fa-minus');
                    } else {
                        $(".expand-div2").addClass('d-none');
                        $(".icon2").removeClass('fa-minus');
                        $(".icon2").addClass('fa-plus');
                    }


                });

                $(".expand-switch1").on('click', function() {
                    //$("#additionalExpand").toggle();
                    if ($(".expand-div1").hasClass('d-none')) {
                        $(".expand-div1").removeClass('d-none');
                        $(".icon1").removeClass('fa-plus');
                        $(".icon1").addClass('fa-minus');
                    } else {
                        $(".expand-div1").addClass('d-none');
                        $(".icon1").removeClass('fa-minus');
                        $(".icon1").addClass('fa-plus');
                    }


                });


            });
        </script>
    @endpush
@endonce
