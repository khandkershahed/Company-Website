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
                        <a href="{{ route('client-support.index') }}" class="breadcrumb-item">Client Support</a>
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
                            <h5 class="text-center mb-0">Add Support</h5>
                        </div>
                    </div>

                </div>
                <div class="col-12 p-0">
                    <div class="card p-0 px-3 pt-2 shadow-lg border-0">
                        <div class="row">
                            <form method="POST" action="{{ route('client-support.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 border p-3">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="validationCustom01" class="form-label">
                                                Select Project &nbsp; &nbsp;
                                                <a href="{{route('project.create')}}" class="p-0 m-0 text-end text-primary ps-2">(Create
                                                Project)</a>
                                            </label>
                                            <select class="form-select w-100 select-wizard"
                                                name="project_id" data-placeholder="Select Project" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->project_title }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid Phase.
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="validationCustom01" class="form-label">
                                                Select Phase
                                            </label>
                                            <select class="form-select w-100 select-wizard"
                                                name="phase_id" data-placeholder="Select The Phase" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($phases as $phase)
                                                    <option value="{{ $phase->id }}">{{ $phase->phase }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid Phase.
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="validationCustom01" class="form-label">
                                                Select Client &nbsp; &nbsp;
                                                <a href="javascript:void(0)" class="p-0 m-0 text-end text-primary ps-2" data-bs-toggle="modal"
                                                data-bs-target="#clientADD">(Create Client)</a>
                                            </label>
                                            <select class="form-select w-100 select-wizard" id="validationCustom01"
                                                name="client_id" aria-label="form-select-sm example"
                                                data-placeholder="Select The Client" data-allow-clear="true" required>
                                                <option></option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid Client.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @include('admin.pages.project.partial.support_add')

                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-end my-3 me-3">
                                <button class="btn btn-finish pull-right" type="submit">
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
    <div class="modal fade" id="clientADD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            placeholder="Enter Client ID" name="client_id" value="{{ old('client_id') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                        <input maxlength="15" type="text"
                                            class="form-control form-control-sm allow_decimal"
                                            placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}" />
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
