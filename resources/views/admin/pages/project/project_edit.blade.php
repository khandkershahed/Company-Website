@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <a href="{{ route('admin.business.index') }}" class="breadcrumb-item">Business</a>
                        <a href="{{ route('project.index') }}" class="breadcrumb-item">Client Projects</a>
                        <span class="breadcrumb-item active">Add</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- /page header -->
        <div class="content">
            <div class="row mx-3">
                <div class="col-lg-12" style="background-color: #247297; color: white;">
                    <div class="row d-flex align-items-center">
                        <div>
                            <h5 class="text-center mb-0">Edit Project</h5>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('project.update', $project->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gx-2">
                                    <!-- Primary Information Area Here -->
                                    <div class="col-lg-12 mb-4">
                                        <div class="primary_info section_border border-dashed-section p-2">
                                            <p
                                                class="p-0 m-0 main_bg-title w-25 text-center text-white rounded-pill border-title">
                                                Primary Information
                                            </p>
                                            <div class="row gx-1">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <div
                                                            class="control-label d-flex align-items-center main_color fw-bold label_size">
                                                            <p class="p-0 m-0">Select Client</p>
                                                            <a class="ms-3 text-danger">Or</a>
                                                            <a href="javascript:void(0)" class="p-0 m-0 text-end ps-2"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">Create
                                                                Client</a>
                                                        </div>
                                                        <select name="client_id" class="form-select w-100 select-wizard"
                                                            data-allow-clear="true" data-placeholder="Select Client">
                                                            <option></option>
                                                            @foreach ($clients as $client)
                                                                <option @selected($client->id == $project->client_id)
                                                                    value="{{ $client->id }}">
                                                                    {{ $client->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <div
                                                            class="control-label d-flex align-items-center main_color fw-bold label_size">
                                                            <p class="p-0 m-0">Select Team</p>
                                                            <a class="ms-3 text-danger">Or</a>
                                                            <a href="javascript:void(0)" class="p-0 m-0 text-end ps-2"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">Create
                                                                Client</a>
                                                        </div>
                                                        @php
                                                            $teamIds = isset($project->team_id) ? json_decode($project->team_id, true) : [];
                                                        @endphp

                                                        <select class="form-control multiselect" multiple="multiple"
                                                            data-include-select-all-option="true"
                                                            data-enable-filtering="true"
                                                            data-enable-case-insensitive-filtering="true" name="team_id[]"
                                                            data-allow-clear="true" data-placeholder="Select Client">
                                                            @foreach ($clients as $client)
                                                                <option value="{{ $client->id }}"
                                                                    {{ is_array($teamIds) && in_array($client->id, $teamIds) ? 'selected' : '' }}>
                                                                    {{ $client->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Client
                                                            Name</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="client_name" value="{{ $project->client_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label
                                                            class="control-label main_color fw-bold label_size">Country</label>
                                                        <select name="country_id" class="form-select w-100 select-wizard"
                                                            data-allow-clear="true" data-placeholder="Select Country">
                                                            <option></option>
                                                            @foreach ($countrys as $country)
                                                                <option @selected($country->id == $project->country_id)
                                                                    value="{{ $country->id }}">
                                                                    {{ $country->country_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Client
                                                            Code</label>
                                                        <input maxlength="100" type="text" name="client_code"
                                                            value="{{ $project->client_code }}" class="form-control"
                                                            placeholder="Enter Client Code" id="client_code"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Status
                                                            <span class="text-danger"> * </span></label>
                                                        <select class="form-select w-100 select-wizard"
                                                            data-allow-clear="true" data-placeholder="Select Status"
                                                            name="status" required>
                                                            <option></option>
                                                            <option @selected($project->status == 'pending') value="pending">Pending
                                                            </option>
                                                            <option @selected($project->status == 'on_going') value="on_going">On Going
                                                            </option>
                                                            <option @selected($project->status == 'completed') value="completed">
                                                                Completed</option>
                                                            <option @selected($project->status == 'delaying') value="delaying">Delaying
                                                            </option>
                                                            <option @selected($project->status == 'partially_deployed')
                                                                value="partially_deployed">
                                                                Partially Deployed
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Project Information Area Here -->
                                    <div class="col-lg-12 mb-4">
                                        <div class="primary_info section_border border-dashed-section p-2">
                                            <p
                                                class="p-0 m-0 main_bg-title w-25 text-center text-white rounded-pill border-title">
                                                Project Information
                                            </p>
                                            <div class="row gx-1">
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Industry
                                                            Name
                                                            <span class="text-danger"> * </span></label>
                                                        <select class="form-select w-100 select-wizard"
                                                            data-allow-clear="true" data-placeholder="Select Industry"
                                                            name="sector_id" required>
                                                            <option></option>
                                                            @foreach ($industrys as $industry)
                                                                <option @selected($industry->id == $project->sector_id)
                                                                    value="{{ $industry->id }}">
                                                                    {{ $industry->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Project
                                                            ID (PID)</label>
                                                        <input maxlength="100" type="text" name="project_code"
                                                            value="{{ $project->project_code }}" class="form-control"
                                                            placeholder="Enter Project Code" id="project_code"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Project
                                                            Start Date
                                                            <span class="text-danger"> * </span></label>
                                                        <input type="date" name="create_time"
                                                            value="{{ $project->create_time }}" class="form-control"
                                                            placeholder="Enter Start Time" id="create_time" required
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Project
                                                            Close Date</label>
                                                        <input type="date" name="closed_time"
                                                            value="{{ $project->closed_time }}" class="form-control"
                                                            placeholder="Enter Close Time" id="closed_time"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Project
                                                            Duration</label>
                                                        <input maxlength="100" type="text" name="project_duration"
                                                            value="{{ $project->project_duration }}"
                                                            class="form-control allow_decimal"
                                                            placeholder="Enter Duration" id="firstName"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Project
                                                            Name
                                                            <span class="text-danger"> * </span></label>
                                                        <input maxlength="100" type="text" name="project_title"
                                                            value="{{ $project->project_title }}" class="form-control"
                                                            placeholder="Enter Your Project Name" id="project_title"
                                                            required
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>


                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Project
                                                            Description</label>
                                                        <textarea class="form-control" id="project_description" rows="1" name="project_description"
                                                            placeholder="Enter project Description">{{ $project->project_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Team
                                                            Member</label>
                                                        <input maxlength="100" type="number" name="team_member"
                                                            value="{{ $project->team_member }}" class="form-control"
                                                            placeholder="Enter Team Members Number" id="team_member"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Order Information Area Here -->
                                    <div class="col-lg-12 mb-4">
                                        <div class="primary_info section_border border-dashed-section p-2">
                                            <p
                                                class="p-0 m-0 main_bg-title w-25 text-center text-white rounded-pill border-title">
                                                Order Information
                                            </p>
                                            <div class="row gx-1">
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Order
                                                            Number</label>
                                                        <input maxlength="100" type="text" name="order_id"
                                                            value="{{ $project->order_id }}" class="form-control"
                                                            placeholder="Enter Order Number" id="order_id"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Order
                                                            Date
                                                            <span class="text-danger"> * </span></label>
                                                        <input maxlength="100" type="date" name="order_date"
                                                            value="{{ $project->order_date }}" class="form-control"
                                                            placeholder="Enter Start Time" id="order_date" required
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Contact
                                                            Agreement</label>
                                                        <input maxlength="100" type="file" name="contact_agreement"
                                                            value="{{ $project->contact_agreement }}"
                                                            class="form-control form-control-sm"
                                                            placeholder="Enter Contact Agreement"
                                                            id="contact_agreement" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Partner
                                                            Name</label>
                                                        <input maxlength="100" type="text" name="partner_name"
                                                            value="{{ $project->partner_name }}" class="form-control"
                                                            value="NGEN IT" placeholder="Enter Project Code"
                                                            id="partner_name"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Status
                                                            Description</label>
                                                        <textarea class="form-control" id="status_description" rows="1" name="status_description"
                                                            placeholder="Enter Status Description">{{ $project->status_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Client
                                                            Primary Contact</label>
                                                        <input maxlength="100" type="text"
                                                            name="client_primary_contact"
                                                            value="{{ $project->client_primary_contact }}"
                                                            class="form-control"
                                                            placeholder="Enter Client Primary Contact"
                                                            id="client_primary_contact"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Client
                                                            Secondary Contact</label>
                                                        <input maxlength="100" type="text"
                                                            name="client_secondary_contact"
                                                            value="{{ $project->client_secondary_contact }}"
                                                            class="form-control"
                                                            placeholder="Enter Client Secondary Contact"
                                                            id="client_secondary_contact"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Partner
                                                            Primary Contact</label>
                                                        <input maxlength="100" type="text"
                                                            name="partner_primary_contact"
                                                            value="{{ $project->partner_primary_contact }}"
                                                            class="form-control" placeholder="Enter Project Code"
                                                            id="partner_primary_contact"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label class="control-label main_color fw-bold label_size">Partner
                                                            Secondary Contact</label>
                                                        <input maxlength="100" type="text"
                                                            name="partner_secondary_contact"
                                                            value="{{ $project->partner_secondary_contact }}"
                                                            class="form-control"
                                                            placeholder="Enter Partner Secondary Contact"
                                                            id="partner_secondary_contact"
                                                            style="height: 26px !important;font-size: 12px !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form Field Start -->
                                <div class="d-flex justify-content-end">

                                    <button class="btn pull-right mt-3 bg-info rounded-0" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header p-1 px-3 shadow-lg main_bg text-white rounded-0">
                    <h5 class="modal-title" id="exampleModalLabel">Create Client</h5>
                    <button type="button" class="btn-close border rounded-circle bg-white text-white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myform" method="post" action="{{ route('client-database.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="container my-3 mx-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-firstname-input">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" maxlength="80" class="form-control form-control-sm"
                                            placeholder="Enter Client Name" name="name" value="{{ old('name') }}"
                                            required />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-firstname-input">User Name</label>
                                        <input type="text" maxlength="80" class="form-control form-control-sm"
                                            placeholder="Enter Client UserName" name="username"
                                            value="{{ old('username') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-email-input">Client ID</label>
                                        <input maxlength="50" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Client ID" name="client_id"
                                            value="{{ old('client_id') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                        <input maxlength="15" type="text"
                                            class="form-control form-control-sm allow_decimal"
                                            placeholder="Enter Phone Number" name="phone"
                                            value="{{ old('phone') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-email-input">Email</label>
                                        <input type="email" class="form-control form-control-sm"
                                            placeholder="Enter Email ID" name="email" value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-firstname-input">Company Name</label>
                                        <input type="text" maxlength="50" class="form-control form-control-sm"
                                            placeholder="Company Name" name="company_name"
                                            value="{{ old('company_name') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-firstname-input">Profile
                                            Picture</label>
                                        <div class="row"></div>
                                        <input id="image" type="file" class="form-control form-control-sm"
                                            id="basicpill-firstname-input" name="photo" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-firstname-input">Password</label>
                                        <input type="password" class="form-control form-control-sm" id="password"
                                            name="password">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-firstname-input">Confirm
                                            Password</label>
                                        <input type="password" class="form-control form-control-sm" id="confirm_password"
                                            name="confirm_password">
                                        <div id="message"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-label">Status
                                        <span class="text-danger"> * </span></label>
                                    <select class="form-select w-100 select-wizard" data-allow-clear="true"
                                        data-placeholder="Choose Status" name="status">
                                        <option></option>
                                        <option value="active">Active</option>
                                        <option value="inactive">In Active</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Create Client Modal End -->
@endsection
@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                //validation
                $("input, select").tooltipster({
                    trigger: "custom",
                    onlyOne: false,
                    position: "right",
                    theme: "tooltipster-light",
                });


                $("#form").validate({
                    errorPlacement: function(error, element) {
                        var lastError = $(element).data("lastError"),
                            newError = $(error).text();


                        $(element).data("lastError", newError);


                        if (newError !== "" && newError !== lastError) {
                            $(element).tooltipster("content", newError);
                            $(element).tooltipster("show");
                        }
                    },
                    success: function(label, element) {
                        $(element).tooltipster("hide");
                    },
                });


                var navListItems = $("div.setup-panel div a"),
                    allWells = $(".setup-content"),
                    allNextBtn = $(".nextBtn");


                allWells.hide();


                navListItems.click(function(e) {
                    e.preventDefault();
                    var $target = $($(this).attr("href")),
                        $item = $(this);


                    if (!$item.hasClass("disabled")) {
                        navListItems.removeClass("forms-active").addClass("btn-default");
                        $item.addClass("forms-active");
                        $("input, select").tooltipster("hide");
                        allWells.hide();
                        $target.show();
                        $target.find("input:eq(0)").focus();
                    }
                });


                /* Handles validating using jQuery validate.
                 */
                allNextBtn.click(function() {
                    var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $(
                            'div.setup-panel div a[href="#' + curStepBtn + '"]'
                        )
                        .parent()
                        .next()
                        .children("a"),
                        curInputs = curStep.find("input"),
                        isValid = true;


                    //Loop through all inputs in this form group and validate them.
                    for (var i = 0; i < curInputs.length; i++) {
                        if (!$(curInputs[i]).valid()) {
                            isValid = false;
                        }
                    }


                    if (isValid) {
                        //Progress to the next page.
                        nextStepWizard.removeClass("disabled").trigger("click");
                    }
                });


                $("div.setup-panel div a.forms-complete").trigger("click");
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".checkbox-toggle2").change(function() {
                    var targetId = $(this).data("target");
                    $(targetId).toggleClass("d-none", !this.checked);
                });


            });
            //CLient Details
        </script>
        <script>
            $(document).ready(function() {
                // Handle checkbox click event
                $(".checkbox-toggle").on("change", function() {
                    if ($(this).prop("checked")) {
                        // If any checkbox is checked, hide Submit and show Next
                        $(".btn-next").removeClass("d-none");
                        $(".btn-finish").addClass("d-none");
                    } else {
                        // If no checkbox is checked, hide Next and show Submit
                        $(".btn-next").addClass("d-none");
                        $(".btn-finish").removeClass("d-none");
                    }
                });

                $('.select-wizard').select2();
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
                                $('input[name="client_code"]').val(data.client_id);
                                $('input[name="client_primary_contact"]').val(data.name);
                                // $('input[name="phone"]').val(data.phone);
                                // $('input[name="address"]').val(data.address);

                            },

                        });
                    }
                });
            });
        </script>
    @endpush
@endonce
