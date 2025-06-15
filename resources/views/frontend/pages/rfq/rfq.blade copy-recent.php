@extends('frontend.master')
@section('content')
    @include('frontend.pages.rfq.partials.rfq_css')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner" src="{{asset('frontend/images/rfq_banner.jpg')}}"
                alt="Requst For Quotation">
        </div>
    </section>
    <section>
        <div class="container">
            <h2 class="p-0 m-0 text-center pt-4">Select <span class="main_color rfq-text">RFQ</span> Options</h2>
            <div class="row gx-2">
                <div class="col-lg-8 offset-lg-2 mx-auto">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-rfq px-0 mt-5 d-flex justify-content-center align-items-center w-100"
                        id="myTab" role="tablist">
                        <li class="nav-item mb-3" role="presentation" style="width: 49%;">
                            <label class="nav-link active rounded-0 custom-radio" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">
                                <input type="radio" class="form-check-input me-2"
                                    aria-label="Select RFQ with Product Selection" name="rfqType" checked>
                                RFQ by Product Selection
                            </label>
                        </li>
                        <li class="nav-item mb-3" role="presentation" style="width: 49%">
                            <label class="nav-link rounded-0 custom-radio" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <input type="radio" class="form-check-input me-2"
                                    aria-label="Select Custom Request for Quote" name="rfqType">
                                RFQ by Case Scenario
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 col-offset-lg-2 m-auto">
                    <div class="row gx-3 my-2 rfq-triger">
                        <div class="col-lg-6 pe-0">
                            <div class="p-3 rfq_box1 text-start active-background me-2">
                                <div class="d-flex justify-content-between">
                                    <img width="120px" height="70px" src="https://i.ibb.co/zm36Ccz/Asset-6-5x-8.png"
                                        alt="">
                                    <div class="ps-4">
                                        <p class="" style="text-align: justify;">
                                            Easy Selection of Products & quantity by typing in
                                            the below input box. Supporting Information to make sure of quotation accuracy.
                                            Provide your information to give your further assistance
                                        </p>
                                    </div>
                                </div>
                                {{-- <a href="javascript:void()" class="custom_rfq">
                                </a> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 ps-0">
                            <div class="p-3 rfq_box2 text-start">
                                <div class="d-flex justify-content-between">
                                    <img width="120px" height="70px" src="https://i.ibb.co/Tc9HNjK/Asset-4-5x-8.png"
                                        alt="">
                                    <div class="ps-4">
                                        <p class="" style="text-align: justify;">
                                            You can create custom RFQ by providing your current scenario Or, project
                                            requirements. Based on your choice of Brand, Products we may talk to you further
                                            or directly quote you with a suggested solution.
                                        </p>
                                    </div>
                                </div>
                                {{-- <a href="javascript:void()" class="query_rfq" >
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="col-lg-10 offset-lg-1 mx-auto">
                    <div class="tab-content pt-2">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form id="repeater-form" action="{{ route('rfqCreate') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="multi_step_form">
                                    <div class="container p-0 mb-5 multi_step_form-box">
                                        <div id="multistep_nav">
                                            <div class="progress_holder progress_holder_custom">
                                                Product Query
                                            </div>
                                            <div class="progress_holder progress_holder_custom">
                                                Supporting Information
                                            </div>
                                            <div class="progress_holder progress_holder_custom">
                                                Contact Information
                                            </div>
                                        </div>
                                        <fieldset class="step" id="step1">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-10 offset-lg-1 mx-auto">
                                                        <div class="row p-4 px-0 align-items-center">
                                                            <div class="me-2">
                                                                <i
                                                                    class="fa-solid fa-circle-question main_color"style="font-size: 35px;"></i>
                                                            </div>
                                                            <div>
                                                                <p class="mb-0">Select right products by writing initials
                                                                    or full product
                                                                    name in the below box. Also, mention the quantity in
                                                                    right box. You can add as many as product input box by
                                                                    clicking in the left '+' symbol
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="repeater">
                                                                <div data-repeater-list="items">
                                                                    <div data-repeater-item class="mb-3">
                                                                        <div class="row gx-2">
                                                                            <div class="col-lg-8 productBox me-3">
                                                                                <div class="row searchInput">
                                                                                    <div class="col-12">
                                                                                        <input type="text"
                                                                                            name="product_name"
                                                                                            class="productInput form-control form-control-sm border-0 rounded-1"
                                                                                            placeholder="Product Title"
                                                                                            id="productSearchInput"
                                                                                            style="width: 95%;">
                                                                                    </div>
                                                                                    <div class="col-12 resultBox">
                                                                                        <ul class="suggestionList"
                                                                                            style="display: none;">
                                                                                            @foreach ($products as $product)
                                                                                                <li>{{ $product->name }}
                                                                                                </li>
                                                                                            @endforeach
                                                                                            <!-- Add other list items here -->
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3 d-flex qtyBox ms-4">
                                                                                <div class="qtyInput" style="width: 90%">
                                                                                    <input type="number" name="qty"
                                                                                        value=""
                                                                                        placeholder="Enter Product Qty"
                                                                                        class="form-control form-control-sm border-0" />
                                                                                </div>
                                                                                <div style="width: 10%" class="ms-2">
                                                                                    <button data-repeater-delete
                                                                                        type="button"
                                                                                        class="repeater-delete ps-2">
                                                                                        <img width="20px"
                                                                                            src="https://i.ibb.co/qr49zm6/Asset-1-2x-8.png"
                                                                                            alt="">
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button data-repeater-create type="button"
                                                                            class="repeater-add">
                                                                            <img width="15px"
                                                                                src="https://i.ibb.co/yQgJTTh/Asset-2-2x-8.png"
                                                                                alt="">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 pb-4 another-rfq-field">
                                                                <label for="message" class="control-label pb-1">Custom
                                                                    Message</label>
                                                                <textarea class="form-control" id="message" name="message" rows="1"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-8 offset-lg-2 mx-auto">
                                                                <button type="button"
                                                                    class="nextStep btn-color mb-2 me-4">Next</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <fieldset class="step" id="step2">
                                            <div class="prevStep btn-color mb-2 ms-3">Prev</div>
                                            <div class="container pb-4">
                                                <div class="row mb-4">
                                                    <div class="col-lg-10 offset-lg-1 mx-auto">
                                                        <div class="d-flex p-4 px-0">
                                                            <div class="me-2">
                                                                <i class="fa-solid fa-circle-question main_color"
                                                                    style="font-size: 35px;"></i>
                                                            </div>
                                                            <div>
                                                                <p>Provide your simple information that helps us to work
                                                                    with you a proper manner and help you in cost effective
                                                                    purchasing
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="budget" class="form-label">Tentative
                                                                        Budget</label>
                                                                    <input type="number" name="budget"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        id="budget"
                                                                        placeholder="Your Approximate Budget">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="delivery_location"
                                                                        class="form-label">Delivery Location <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="delivery_location"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        id="delivery_location"
                                                                        placeholder="Delivery Location">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="country" class="form-label">Your Country
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" name="country"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        id="country"
                                                                        placeholder="Your Country(Eg:USA, UK, Canada)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="project_status" class="form-label">Which
                                                                        stage is your project now
                                                                        ?</label>
                                                                    <select class="form-select form-select-sm"
                                                                        name="project_status"
                                                                        data-placeholder="Select Project Status"
                                                                        aria-label="Default select example"
                                                                        id="project_status">
                                                                        <option></option>
                                                                        <option value="budget_stage">Budget Stage</option>
                                                                        <option value="tor_stage">Tor Stage</option>
                                                                        <option value="rfq_stage">RFQ Stage</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="approximate_delivery_time"
                                                                        class="form-label">Approximate Delivery Time
                                                                        ?</label>
                                                                    <select class="form-select form-select-sm"
                                                                        name="approximate_delivery_time"
                                                                        data-placeholder="Select Delivery Time"
                                                                        aria-label="Default select example">
                                                                        <option value="">Approximate Delivery Time</option>
                                                                        <option value="less_one_month">Less Than One Month
                                                                        </option>
                                                                        <option value="two_month">Two Months</option>
                                                                        <option value="three_month">Three Months</option>
                                                                        <option value="six_month">Six Months</option>
                                                                        <option value="one_year">One Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="checkbox-wrapper-1">
                                                                    <input id="example-1" class="substituted"
                                                                        type="checkbox" aria-hidden="true" name="call"
                                                                        value="1" />
                                                                    <label for="example-1">Do you expect call from Us or
                                                                        Appointment?</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="nextStep btn-color mb-2">Next</button>
                                        </fieldset>
                                        <fieldset class="step" id="step3">
                                            <div class="prevStep btn-color mb-2 ms-3">Prev</div>
                                            <div class="container p-0 pb-4">
                                                <div class="row">
                                                    <div class="col-lg-10 offset-lg-1 mx-auto">
                                                        <div class="row m-1 pb-4">
                                                            <div class="col-lg-12 mx-auto">
                                                                <div class="d-flex p-4 px-0">
                                                                    <div class="me-2">
                                                                        <i class="fa-solid fa-circle-question main_color"
                                                                            style="font-size: 35px;"></i>
                                                                    </div>
                                                                    <div>
                                                                        <p>Please write your contact details for further
                                                                            communication needed !</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group pt-2">
                                                                    <label for="name" class="pb-1">Name <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" id="name" name="name"
                                                                        value="{{ optional(Auth::guard('client')->user())->name }}"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        placeholder="Input your full name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group pt-2">
                                                                    <label for="designation"
                                                                        class="pb-1">Designation</label>
                                                                    <input type="text" id="designation"
                                                                        name="designation"
                                                                        value="{{ optional(Auth::guard('client')->user())->designation }}"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        placeholder="Input your designation">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group pt-2">
                                                                    <label for="email" class="pb-1">Email Id <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="email" id="email" name="email"
                                                                        value="{{ optional(Auth::guard('client')->user())->email }}"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        placeholder="Input your official domain/email id"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group pt-2">
                                                                    <label for="phone" class="pb-1">Contact
                                                                        Number</label>
                                                                    <input type="number" id="phone" name="phone"
                                                                        value="{{ optional(Auth::guard('client')->user())->phone }}"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        placeholder="Input your mobile number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group pt-2">
                                                                    <label for="company_name" class="pb-1">Company
                                                                        Name</label>
                                                                    <input type="text" id="company_name"
                                                                        name="company_name"
                                                                        value="{{ optional(Auth::guard('client')->user())->company_name }}"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        placeholder="Your company name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group pt-2">
                                                                    <label for="address" class="pb-1">Company
                                                                        Address</label>
                                                                    <input type="text" id="address" name="address"
                                                                        value="{{ optional(Auth::guard('client')->user())->address }}"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        placeholder="Input company address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="submitbtn btn-color mb-2">Submit</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form id="yourFormIdss" action="{{ route('rfqCreate') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="multi_step_form">
                                    <div class="container p-0 mb-5">
                                        <div id="multistep_nav">
                                            <div class="progress_holder progress_holder_custom">
                                                Custom Query
                                            </div>
                                            <div class="progress_holder progress_holder_custom">
                                                Query Details
                                            </div>
                                            <div class="progress_holder progress_holder_custom">
                                                Company Details
                                            </div>
                                        </div>
                                        <fieldset class="step" id="step1">
                                            <div class="container">
                                                <div class="row mb-4">
                                                    <div class="col-lg-10 offset-lg-1 mx-auto">
                                                        <div class="d-flex p-4 px-0">
                                                            <div class="me-2">
                                                                <i class="fa-solid fa-circle-question main_color"
                                                                    style="font-size: 35px;"></i>
                                                            </div>
                                                            <div class="">
                                                                <h5>Create Custom Query
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10 offset-lg-1 mx-auto">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <label class="control-label pb-1">Choose Product
                                                                    Category</label> <br>
                                                                <select class="multiSelect" multiple="multiple"
                                                                    name="category[]" style="width: 100%;">
                                                                    @foreach ($categorys as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->title }}
                                                                        </option>
                                                                    @endforeach
                                                                    <!-- Add more options as needed -->
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label pb-1">Choose Preferred
                                                                    Brands</label> <br>
                                                                <select class="multiSelect" multiple="multiple"
                                                                    name="brand[]" style="width: 100%;">
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}">
                                                                            {{ $brand->name }}
                                                                        </option>
                                                                    @endforeach
                                                                    <!-- Add more options as needed -->
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label pb-1">Select Industry</label>
                                                                <br>
                                                                {{-- <select class="multiSelect" multiple="multiple"
                                                                    style="width: 100%;"> --}}
                                                                <select class="multiSelect" multiple="multiple"
                                                                    name="industry[]" style="width: 100%;">
                                                                    @foreach ($industrys as $industry)
                                                                        <option value="{{ $industry->id }}">
                                                                            {{ $industry->title }}
                                                                        </option>
                                                                    @endforeach
                                                                    <!-- Add more options as needed -->
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12 pt-4">
                                                                <label for="message" class="control-label pb-1">Write
                                                                    your Case Scenario
                                                                    / Project Requirements :</label>
                                                                <textarea class="form-control" id="message" name="message" rows="1"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="nextStep btn-color mb-2">Next</button>
                                        </fieldset>
                                        <fieldset class="step" id="step2">
                                            <div class="prevStep btn-color mb-2 ms-3">Prev</div>
                                            <div class="container pb-4">
                                                <div class="row mb-4">
                                                    <div class="col-lg-10 offset-lg-1 mx-auto">
                                                        <div class="d-flex p-4 px-0">
                                                            <div class="me-2">
                                                                <i class="fa-solid fa-circle-question main_color"
                                                                    style="font-size: 35px;"></i>
                                                            </div>
                                                            <div>
                                                                <p>Provide your simple information that helps us to work
                                                                    with you a proper manner and help you in cost effective
                                                                    purchasing
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="budget" class="form-label">Tentative
                                                                        Budget</label>
                                                                    <input type="number" name="budget"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        id="budget"
                                                                        placeholder="Your Approximate Budget">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="delivery_location"
                                                                        class="form-label">Delivery Location <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="delivery_location"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        id="delivery_location"
                                                                        placeholder="Delivery Location">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="country" class="form-label">Your Country
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" name="country"
                                                                        class="form-control form-control-sm border-0 rounded-1"
                                                                        id="country"
                                                                        placeholder="Your Country(Eg:USA, UK, Canada)">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="project_status" class="form-label">Which
                                                                        stage is your project now
                                                                        ?</label>
                                                                    <select class="form-select form-select-sm"
                                                                        name="project_status"
                                                                        data-placeholder="Select Project Status"
                                                                        aria-label="Default select example"
                                                                        id="project_status">
                                                                        <option></option>
                                                                        <option value="budget_stage">Budget Stage</option>
                                                                        <option value="tor_stage">Tor Stage</option>
                                                                        <option value="rfq_stage">RFQ Stage</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="approximate_delivery_time"
                                                                        class="form-label">Approximate Delivery Time
                                                                        ?</label>
                                                                    <select class="form-select form-select-sm"
                                                                        name="approximate_delivery_time"
                                                                        data-placeholder="Select Delivery Time"
                                                                        aria-label="Default select example">
                                                                        <option></option>
                                                                        <option value="less_one_month">Less Than One Month
                                                                        </option>
                                                                        <option value="two_month">Two Months</option>
                                                                        <option value="three_month">Three Months</option>
                                                                        <option value="six_month">Six Months</option>
                                                                        <option value="one_year">One Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="checkbox-wrapper-1">
                                                                    <input id="example-1" class="substituted"
                                                                        type="checkbox" aria-hidden="true" name="call"
                                                                        value="1" />
                                                                    <label for="example-1">Do you expect call from Us or
                                                                        Appointment?</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="nextStep btn-color mb-2">Next</button>
                                        </fieldset>
                                        <fieldset class="step" id="step3">
                                            <div class="prevStep btn-color mb-2 ms-3">Prev</div>
                                            <div class="container p-0 pb-4">
                                                <div class="col-lg-10 offset-lg-1 mx-auto">
                                                    <div class="row">
                                                        <div class="col-lg-10 offset-lg-1 mx-auto">
                                                            <div class="row m-1 pb-4">
                                                                <div class="col-lg-12 mx-auto">
                                                                    <div class="d-flex p-4 px-0">
                                                                        <div class="me-2">
                                                                            <i class="fa-solid fa-circle-question main_color"
                                                                                style="font-size: 35px;"></i>
                                                                        </div>
                                                                        <div>
                                                                            <p>Please write your contact details for further
                                                                                communication needed !</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group pt-2">
                                                                            <label for="name" class="pb-1">Name
                                                                                <span class="text-danger">*</span></label>
                                                                            <input type="text" id="name"
                                                                                name="name"
                                                                                value="{{ optional(Auth::guard('client')->user())->name }}"
                                                                                class="form-control form-control-sm border-0 rounded-1"
                                                                                placeholder="Input your full name"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group pt-2">
                                                                            <label for="designation"
                                                                                class="pb-1">Designation</label>
                                                                            <input type="text" id="designation"
                                                                                name="designation"
                                                                                value="{{ optional(Auth::guard('client')->user())->designation }}"
                                                                                class="form-control form-control-sm border-0 rounded-1"
                                                                                placeholder="Input your designation">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group pt-2">
                                                                            <label for="email" class="pb-1">Email Id
                                                                                <span class="text-danger">*</span></label>
                                                                            <input type="email" id="email"
                                                                                name="email"
                                                                                value="{{ optional(Auth::guard('client')->user())->email }}"
                                                                                class="form-control form-control-sm border-0 rounded-1"
                                                                                placeholder="Input your official domain/email id"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group pt-2">
                                                                            <label for="phone" class="pb-1">Contact
                                                                                Number</label>
                                                                            <input type="number" id="phone"
                                                                                name="phone"
                                                                                value="{{ optional(Auth::guard('client')->user())->phone }}"
                                                                                class="form-control form-control-sm border-0 rounded-1"
                                                                                placeholder="Input your mobile number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group pt-2">
                                                                            <label for="company_name"
                                                                                class="pb-1">Company
                                                                                Name</label>
                                                                            <input type="text" id="company_name"
                                                                                name="company_name"
                                                                                value="{{ optional(Auth::guard('client')->user())->company_name }}"
                                                                                class="form-control form-control-sm border-0 rounded-1"
                                                                                placeholder="Your company name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group pt-2">
                                                                            <label for="address" class="pb-1">Company
                                                                                Address</label>
                                                                            <input type="text" id="address"
                                                                                name="address"
                                                                                value="{{ optional(Auth::guard('client')->user())->address }}"
                                                                                class="form-control form-control-sm border-0 rounded-1"
                                                                                placeholder="Input company address">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="submitbtn btn-color mb-2">Submit</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@include('frontend.pages.rfq.partials.rfq_js')
@endsection

