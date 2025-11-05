@extends('admin.master')
@section('content')
    <style>
        .label_style {
            width: 151px !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Contact Management</a>
                        <a href="" class="breadcrumb-item">Edit</a>
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
        <div class="content pt-2 w-50 mx-auto">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('contact.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Edit Contact Form </p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('solutionDetails.index') }}" class="btn navigation_btn ms-2">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                    <span>Solution</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <form method="post" action="{{ route('contact.update', $contact->id) }}">
                    @csrf
                    @method('PUT')
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row mb-1 g-2 p-1">
                            <div class="col">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>First Name</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="fname" value="{{ $contact->fname }}" class="form-control form-control-sm"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Last Name </span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="lname" value="{{ $contact->lname }}" class="form-control form-control-sm"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Phone</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control form-control-sm"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>State</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="state" value="{{ $contact->state }}" class="form-control form-control-sm"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Country</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="country" value="{{ $contact->country }}" class="form-control form-control-sm"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Email</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="email" name="email" value="{{ $contact->email }}" class="form-control form-control-sm"
                                                maxlength="100" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Message Type</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="msg_type" value="{{ $contact->msg_type }}" class="form-control select"
                                                data-placeholder="Chose msg_type ">
                                                <option value="Account creation problem">Account creation problem
                                                </option>
                                                <option value="Cannot login">Cannot login</option>
                                                <option value="Client feedback entry">Client feedback entry</option>
                                                <option value="General web issue">General web issue</option>
                                                <option value="Order return request">Order return request</option>
                                                <option value="Order tracking/history">Order tracking/history</option>
                                                <option value="Product information request">Product information request
                                                </option>
                                                <option value="Update my account/email information">Update my
                                                    account/email information</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Message</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <textarea name="message" value="{{ $contact->message }}" id="" class="form-control" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end mb-2 mx-2">
                            <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->
    </div>
@endsection
