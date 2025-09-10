@extends('admin.master')
@section('content')
    <style>
        thead {
            background-color: rgb(255, 255, 255) !important;
            color: #000000 !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="shadow page-header page-header-light">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="py-2 breadcrumb">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('product-sourcing.index') }}" class="breadcrumb-item">Deal</a>
                        <span class="breadcrumb-item active">Deal Add</span>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="p-0 border-transparent btn btn-light align-self-center collapsed d-lg-none rounded-pill ms-auto"
                        data-bs-toggle="collapse">
                        <i class="m-1 ph-caret-down collapsible-indicator ph-sm"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="pt-1 content">
            <div class="my-2 row">
                <div class="col-lg-8 offset-lg-2">
                    @include('admin.pages.rfq-manage.partial.rfq_sidebar')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="px-0 card">
                        <div class="text-start">
                            <div class="px-2 py-1 row main_bg rounded-1 d-flex align-items-center justify-content-center gx-0">
                                <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
                                    <h5 class="p-0 m-0 text-white fw-bold">Deal Create</h5>
                                </div>
                            </div>
                        </div>
                        <div class="px-0 py-0 card-body">
                            <div class="row gx-0">
                                <div class="pt-1 col-lg-2 bg-light">
                                    <ul class="nav nav-tabs flex-column" id="myTabs" role="tablist" style="border-bottom: 0px;">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                                data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1"
                                                aria-selected="true">Assigned SM</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                                type="button" role="tab" aria-controls="tab2" aria-selected="false">Client
                                                Details</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                                type="button" role="tab" aria-controls="tab3" aria-selected="false">Add
                                                Product</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                                                type="button" role="tab" aria-controls="tab4" aria-selected="false">Terms &
                                                Condition</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-10">
                                    <form method="post" action="{{ route('deal.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="p-2 pt-0 bg-white tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                                aria-labelledby="tab1-tab">
                                                <h6 class="mb-0 text-info">Assigned Sales Manager</h6>
                                                <div class="mb-3 border row gx-0 border-secondary bg-light">
                                                    <div class="p-2 col-lg-12">
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="sales_man_id_L1" class="mb-0 form-label">Sales
                                                                        Manager Name(Leader - L1) <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="sales_man_id_L1"
                                                                        data-placeholder="Select Sales Manager(L1).."
                                                                        id="sales_man_id_L1" data-allow-clear="true"
                                                                        class="form-select w-100 select-wizard" required>
                                                                        <option></option>
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="sales_man_id_T1" class="mb-0 form-label">Sales
                                                                        Manager Name (Team - T1)</label>
                                                                    <select class="form-select w-100 select-wizard"
                                                                        name="sales_man_id_T1" data-allow-clear="true"
                                                                        data-placeholder="Select Sales Manager(T1)...">
                                                                        <option></option>
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="sales_man_id_T2" class="mb-0 form-label">Sales
                                                                        Manager Name (Team - T2)</label>
                                                                    <select class="form-select w-100 select-wizard"
                                                                        name="sales_man_id_T2" data-allow-clear="true"
                                                                        data-placeholder="Select Sales Manager(T1)...">
                                                                        <option></option>
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="close_date"
                                                                        class="mb-0 form-label form-label-sm">Closed
                                                                        date</label>
                                                                    <input type="date" name="close_date"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="deal_type" class="mb-0 form-label">Deal Type
                                                                    </label>
                                                                    <select name="deal_type" data-allow-clear="true"
                                                                        class="form-select w-100 select-wizard "
                                                                        data-minimum-results-for-search="Infinity"
                                                                        data-placeholder="Chose Deal Type">
                                                                        <option></option>
                                                                        <option class="form-select" value="new">
                                                                            New
                                                                        </option>
                                                                        <option class="form-select" value="renew">
                                                                            Renew</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-end">
                                                        <button type="submit" class="btn btn-success" name="action"
                                                            id="submitbtn" value="save">Save<i
                                                                class="ph-paper-plane-tilt "></i></button>
                                                        <a href="javascript:void(0);" class="p-2 px-2 btn btn-info rounded-0"
                                                            id="nextTabButton">Next
                                                            <i class="ph-arrow-circle-right "></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel"
                                                aria-labelledby="tab2-tab">
                                                <h6 class="mb-0 ms-1 text-info">Client Details</h6>

                                                <div class="p-3 mx-1 mb-3 border row border-secondary bg-light">
                                                    <div class="row offset-lg-2">
                                                        <div class="col-lg-8 d-flex justify-content-end align-items-center">
                                                            <div
                                                                class="p-1 text-center center bg-gray d-flex align-items-baseline">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" name="regular" id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Regular Discount
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" name="special" id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Special Discount
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" name="tax_status"
                                                                        id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Tax / VAT
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-2 col-lg-3">
                                                            <div class="form-group">
                                                                <label for="sales_man_id_L1" class="mb-0 form-label">Client
                                                                    Type<span class="text-danger">*</span></label>
                                                                <select name="client_type"
                                                                    class="form-select w-100 select-wizard client_select"
                                                                    data-minimum-results-for-search="Infinity"
                                                                    data-allow-clear="true"
                                                                    data-placeholder="Chose client Type">
                                                                    <option></option>
                                                                    <option class="form-select" value="client">
                                                                        Client
                                                                    </option>
                                                                    <option class="form-select" value="partner">
                                                                        Partner</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 col-lg-3 partner_display d-none">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Partner
                                                                Type<span class="text-danger">*</span></label>
                                                            <select name="partner_id"
                                                                class="form-select w-100 select-wizard partnerID"
                                                                data-placeholder="Choose Partner" data-allow-clear="true">
                                                                <option class="common_partner"></option>
                                                                @foreach ($partners as $partner)
                                                                    <option value="{{ $partner->id }}">Name :
                                                                        {{ $partner->name }}; Company Name :
                                                                        {{ $partner->company_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-2 col-lg-3 client_display d-none">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Search Client<span class="text-danger">*</span></label>
                                                            <select name="client_id"
                                                                class="form-select w-100 select-wizard clientID"
                                                                data-allow-clear="true" data-placeholder="Choose Client">
                                                                <option class="common_client"></option>
                                                                @foreach ($clients as $client)
                                                                    <option value="{{ $client->id }}">Name :
                                                                        {{ $client->name }}; Company Name :
                                                                        {{ $client->company_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mt-3 col-lg-4 partner_account d-none text-warning">
                                                            <div class="form-check">
                                                                <input class="form-check-input account" type="checkbox"
                                                                    value="partner" name="account" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Create Partner Account
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 col-lg-4 client_account d-none text-warning">
                                                            <div class="form-check">
                                                                <input class="form-check-input account" type="checkbox"
                                                                    value="client" name="account" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Create Client Account
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mb-2 col-lg-3">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Name<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="name"
                                                                class="form-control form-control-sm maxlength"
                                                                maxlength="100" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-3">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Email<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" name="email"
                                                                class="form-control form-control-sm maxlength"
                                                                maxlength="100" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-3">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Phone<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="phone"
                                                                class="form-control form-control-sm maxlength" maxlength="100"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-3">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Company
                                                                Name<span class="text-danger">*</span></label>
                                                            <input type="text" name="company_name"
                                                                class="form-control form-control-sm maxlength"
                                                                maxlength="200" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1"
                                                                class="mb-0 form-label">Designation<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="designation"
                                                                class="form-control form-control-sm maxlength"
                                                                maxlength="100" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">Address<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="address"
                                                                class="form-control form-control-sm maxlength"
                                                                maxlength="200" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-4 user_password d-none">
                                                        <div class="form-group">
                                                            <label for="sales_man_id_L1" class="mb-0 form-label">User
                                                                Password<span class="text-danger">*</span></label>
                                                            <input type="password" name="password"
                                                                class="form-control form-control-sm maxlength"
                                                                maxlength="100" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-end">
                                                        <button type="submit" class="btn btn-success" name="action"
                                                            id="submitbtn" value="save">Save<i
                                                                class="ph-paper-plane-tilt"></i></button>
                                                        <a href="javascript:void(0);" class="p-2 px-2 btn btn-info rounded-0"
                                                            id="nextTabButton2">Next
                                                            <i class="ph-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel"
                                                aria-labelledby="tab3-tab">
                                                <h6 class="mb-0 text-info">Product Description</h6>
                                                <div class="pt-2 border row gx-0 border-secondary bg-light">
                                                    <div class="p-2 col-lg-12">
                                                        <div class="table-responsive col-md-12">
                                                            <table class="table table-bordered col-md-12" style="width:100%">

                                                                <thead>
                                                                    <tr>
                                                                        <th style="padding:7px !important;">
                                                                            Product Name <span class="text-danger">*</span>
                                                                        </th>
                                                                        <th style="padding:7px !important;"> Qty </th>
                                                                        <th style="padding:7px !important;"> Unit Price</th>
                                                                        <th style="padding:7px !important;"> Regular Discount
                                                                        </th>
                                                                        <th style="padding:7px !important;">
                                                                            <a href="javascript:void(0)"
                                                                                class="btn btn-primary addRow">
                                                                                <i class="ph-plus"></i>
                                                                            </a>
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody class="repeater">
                                                                    <tr>
                                                                        <td> <input type="text" class="form-control"
                                                                                name="item_name[]" placeholder='Product Name*'
                                                                                required></td>
                                                                        <td> <input type="text" class="form-control"
                                                                                name="qty[]" placeholder='Quantity'></td>
                                                                        <td> <input type="text" class="form-control"
                                                                                name="unit_price[]"></td>
                                                                        <td> <input type="text" class="form-control"
                                                                                name="regular_discount[]"></td>


                                                                        <td class="text-center"> <a href="javascript:void(0)"
                                                                                class=" removeRow"><i
                                                                                    class="ph-minus"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            {{-- <div class="mt-3 col-md-11">
                                                                <button type="submit" class="text-right btn btn-primary">Submit</button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mt-3 col-lg-12 text-end">
                                                        <button type="submit" class="btn btn-success" name="action"
                                                            id="submitbtn" value="save">Save<i
                                                                class="ph-paper-plane-tilt"></i></button>
                                                        <a href="javascript:void(0);" class="p-2 px-2 btn btn-info rounded-0"
                                                            id="nextTabButton3">Next
                                                            <i class="ph-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel"
                                                aria-labelledby="tab4-tab">
                                                {{-- <h5>Tab 3 Content</h5> --}}
                                                <h6 class="mb-0 ms-1 text-info">Source Details</h6>
                                                <div class="mb-3 border row gx-0 border-secondary bg-light">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%">Validity </th>
                                                                <td width="22%">
                                                                    <input type="text" name="validity"
                                                                        class="form-control maxlength" form-control-sm
                                                                        maxlength="200"
                                                                        value="7 Days from the PQ date.Offer may change on the bank forex rate or stock availability" />
                                                                </td>
                                                                <th width="10%">Payment </th>
                                                                <td width="22%">
                                                                    <input type="text" name="payment"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="100% advanced payment with Work Order for Renewal order Excuation" />
                                                                </td>
                                                                <th width="10%">Payment Mode </th>
                                                                <td width="22%">
                                                                    <input type="text" name="payment_mode"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="Payment must be through Cheque/EFTN/WT & hit in the NGen IT account" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="10%">Delivery </th>
                                                                <td width="22%">
                                                                    <input type="text" name="delivery"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="3 business wks upon receiving of WO & Payment.Extended time may require for disaster issues" />
                                                                </td>
                                                                <th width="10%">Delivery Location </th>
                                                                <td width="22%">
                                                                    <input type="text" name="delivery_location"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="Automatice Renewal Activation to the Licenses & Client's Console Panel" />
                                                                </td>
                                                                <th width="10%">Product & Order </th>
                                                                <td width="22%">
                                                                    <input type="text" name="product_order"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="May reject/modify order on any dispute in pr. price or product non-availability during execuation" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="10%">Installation Support </th>
                                                                <td width="22%">
                                                                    <input type="text" name="installation_support"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="Not Applicable. Local Support is Not Included with this Cost as per requirements" />
                                                                </td>
                                                                <th width="10%">Pmt Condition </th>
                                                                <td width="22%">
                                                                    <input type="text" name="pmt_condition"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200"
                                                                        value="1.5% penalty per week on late from 7 days of / Payment Date" />
                                                                </td>
                                                                <th width="10%">Terms Nine </th>
                                                                <td width="22%">
                                                                    <input type="text" name="terms_nine"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="10%">Terms Ten </th>
                                                                <td width="22%">
                                                                    <input type="text" name="terms_ten"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200" value="" />
                                                                </td>
                                                                <th width="10%">Terms Eleven </th>
                                                                <td width="22%">
                                                                    <input type="text" name="terms_eleven"
                                                                        class="form-control form-control-sm maxlength"
                                                                        maxlength="200" value="" />
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="mt-5 row text-end">
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-8">
                                                        <button type="submit" class="btn btn-success" name="action"
                                                            id="submitbtn" value="save">Save<i
                                                                class="ph-paper-plane-tilt"></i></button>
                                                        <button type="submit" class="btn btn-primary " name="action"
                                                            id="submitbtn" value="approval"> Submit
                                                            <i class="ph-paper-plane-tilt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->
    </div>
@endsection
@once
    @push('scripts')
        <script>
            // Get the next tab button for Tab 1
            const nextTabButton = document.getElementById('nextTabButton');
            // Add a click event listener to the button
            nextTabButton.addEventListener('click', function() {
                // Activate Tab 2
                const tab2Button = document.getElementById('tab2-tab');
                tab2Button.classList.add('active');
                tab2Button.setAttribute('aria-selected', 'true');
                // Show Tab 2's content
                const tab2Content = document.getElementById('tab2');
                tab2Content.classList.add('active', 'show');
                // Deactivate Tab 1
                const tab1Button = document.getElementById('tab1-tab');
                tab1Button.classList.remove('active');
                tab1Button.setAttribute('aria-selected', 'false');
                // Hide Tab 1's content
                const tab1Content = document.getElementById('tab1');
                tab1Content.classList.remove('active', 'show');
            });
            // Get the next tab button for Tab 2
            const nextTabButton2 = document.getElementById('nextTabButton2');
            // Add a click event listener to the button
            nextTabButton2.addEventListener('click', function() {
                // Activate Tab 3
                const tab3Button = document.getElementById('tab3-tab');
                tab3Button.classList.add('active');
                tab3Button.setAttribute('aria-selected', 'true');
                // Show Tab 3's content
                const tab3Content = document.getElementById('tab3');
                tab3Content.classList.add('active', 'show');
                // Deactivate Tab 2
                const tab2Button = document.getElementById('tab2-tab');
                tab2Button.classList.remove('active');
                tab2Button.setAttribute('aria-selected', 'false');
                // Hide Tab 2's content
                const tab2Content = document.getElementById('tab2');
                tab2Content.classList.remove('active', 'show');
            });
            // Get the next tab button for Tab 3
            const nextTabButton3 = document.getElementById('nextTabButton3');
            // Add a click event listener to the button
            nextTabButton3.addEventListener('click', function() {
                // Activate Tab 4
                const tab4Button = document.getElementById('tab4-tab');
                tab4Button.classList.add('active');
                tab4Button.setAttribute('aria-selected', 'true');
                // Show Tab 4's content
                const tab4Content = document.getElementById('tab4');
                tab4Content.classList.add('active', 'show');
                // Deactivate Tab 3
                const tab3Button = document.getElementById('tab3-tab');
                tab3Button.classList.remove('active');
                tab3Button.setAttribute('aria-selected', 'false');
                // Hide Tab 3's content
                const tab3Content = document.getElementById('tab3');
                tab3Content.classList.remove('active', 'show');
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.client_select').on('change', function() {
                    var client_value = $(this).find(":selected").val();

                    if (client_value == 'client') {
                        $(".client_display").removeClass("d-none");
                        $(".partner_display").addClass("d-none");

                    } else if (client_value == 'partner') {
                        $(".partner_display").removeClass("d-none");
                        $(".client_display").addClass("d-none");

                    } else {
                        $(".partner_display").addClass("d-none");
                        $(".client_display").addClass("d-none");
                    }
                });
                $('.client_select').on('change', function() {
                    var client_value = $(this).find(":selected").val();

                    if (client_value == 'client') {
                        $(".client_display").removeClass("d-none");
                        $(".partner_display").addClass("d-none");

                    } else if (client_value == 'partner') {
                        $(".partner_display").removeClass("d-none");
                        $(".client_display").addClass("d-none");

                    } else {
                        $(".partner_display").addClass("d-none");
                        $(".client_display").addClass("d-none");
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('thead').on('click', '.addRow', function() {

                    var tr = "<tr>" +
                        "<td> <input type='text' class='form-control' name='item_name[]' placeholder='Product Name*' required></td>" +
                        "<td> <input type='text' class='form-control' name='qty[]' placeholder='Quantity' required></td>" +
                        "<td> <input type='text' class='form-control' name='unit_price[]' ></td>" +
                        "<td> <input type='text' class='form-control' name='regular_discount[]' ></td>" +
                        "<td> <a href='javascript:void(0)' class='btn btn-danger removeRow'><i class='ph-minus'></i></a></td>" +
                        "</tr>"
                    $('.repeater').append(tr);
                });

                $('tbody').on('click', '.removeRow', function() {
                    $(this).parent().parent().remove();
                });
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="partner_id"]').on('change', function() {
                    var partner_id = $(this).val();
                    if (partner_id) {
                        $.ajax({
                            url: "{{ url('admin/partner/ajax') }}/" + partner_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('input[name="name"]').val(data.name);
                                $('input[name="email"]').val(data.email);
                                $('input[name="company_name"]').val(data.company_name);
                                $('input[name="address"]').val(data.address);
                                $('input[name="phone"]').val(data.phone);
                            },

                        });
                    }

                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="client_id"]').on('change', function() {
                    var client_id = $(this).val();
                    if (client_id) {
                        $.ajax({
                            url: "{{ url('admin/client/ajax') }}/" + client_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('input[name="name"]').val(data.name);
                                $('input[name="email"]').val(data.email);
                                $('input[name="phone"]').val(data.phone);
                                $('input[name="address"]').val(data.address);

                            },

                        });
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('select[name="client_type"]').on('change', function() {
                    var client_type = $(this).val();
                    if (client_type == 'partner') {
                        $('select[name="client_id"]').val('').change();
                    } else if (client_type == 'client') {
                        $('select[name="partner_id"]').val('').change();
                    } else {
                        $('select[name="client_id"]').val('').change();
                        $('select[name="partner_id"]').val('').change();
                    }

                });


                $('select[name="client_type"]').on('change', function() {
                    var client_type = $(this).find(":selected").val();

                    if (client_type) {

                        if (client_type == 'partner') {
                            $('.partner_account').removeClass('d-none');
                            $('.client_account').addClass('d-none');
                            $('select[name="partner_id"]').on('change', function() {
                                var partner = $('select[name="partner_id"]').find(":selected").val();
                                if (partner) {
                                    $('.partner_account').addClass('d-none');
                                    $('input[name="password"]').val('');
                                } else {
                                    $('.partner_account').removeClass('d-none');
                                }
                            });
                        }
                        if (client_type == 'client') {
                            $('.client_account').removeClass('d-none');
                            $('.partner_account').addClass('d-none');
                            $('select[name="client_id"]').on('change', function() {
                                var client = $('select[name="client_id"]').find(":selected").val();
                                if (client) {
                                    $('.client_account').addClass('d-none');
                                    $('input[name="password"]').val('');
                                } else {
                                    $('.client_account').removeClass('d-none');
                                }
                            });
                        }
                    } else {
                        $('.client_account').addClass('d-none');
                        $('.partner_account').addClass('d-none');
                    }
                });

                $('.account').on('click', function() {
                    if ($('.account').is(':checked')) {
                        $('.user_password').removeClass('d-none');
                    } else {
                        $('.user_password').addClass('d-none');
                    }
                });


                $("input[name='phone']").on('keyup change', function() {
                    var password = $("input[name='phone']").val();
                    $("input[name='password']").val(password);
                });

                $('.client_select').on('change', function() {

                    $('input[name="name"]').val('');
                    $('input[name="email"]').val('');
                    $('input[name="company_name"]').val('');
                    $('input[name="address"]').val('');
                    $('input[name="phone"]').val('');


                });


            });
        </script>
        <script>
            $(document).ready(function() {

                $('.select-wizard').select2();
            });
        </script>
    @endpush
@endonce
