@extends('admin.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <!-- Inner content -->
        <!-- Page header -->
        <div class="shadow page-header page-header-light">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="py-2 breadcrumb">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Sales Forcast Management</span>
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
        <div class="content">

            <!-- Table components -->
            <div class="card">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <table class="table table-xs table-bordered table-responsive">

                            <tr>

                                <th class="quotaed-lbg"> <a href="#" class="text-white">Quoted </a> </th>
                                <td class="text-white quotaed-ltbg"> 65788552.00</td>
                                <th class="quotaed-rbg"> <a href="#" class="text-white">Target</a> </th>
                                <td class="text-white quotaed-rtbg"> 600008552.00 </td>

                            </tr>

                            <tr>

                                <th class="quotaed-lbg"> <a href="#" class="text-white">Closed</a> </th>
                                <td class="text-white quotaed-ltbg"> 45788552.00</td>
                                <th class="quotaed-rbg"> <a href="" class="text-white">Forecast</a> </th>
                                <td class="text-white quotaed-rtbg"> 3308552.00 </td>

                            </tr>
                            <tr>

                                <th class="quotaed-lbg"> <a href="#" class="text-white"> Performance </a> </th>
                                <td class="text-white quotaed-ltbg"> 7808552.00</td>
                                <th class="quotaed-rbg"> <a href="#" class="text-white">Lost</a> </th>
                                <td class="text-white quotaed-rtbg"> 2208552.00 </td>

                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <ul class="mb-3 nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#js-closed-tab1" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                        role="tab" tabindex="-1">
                        Closed (20)
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a href="#js-promising-tab" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                        tabindex="-1">
                        Promising (10)
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#js-Quotation-tab" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                        tabindex="-1">
                        Quoted (30)
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#js-lost-tab" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                        tabindex="-1">
                        Lost (10)
                    </a>
                </li>


            </ul>
            <div class="card">
                <!-- Tab start -->

                <div class="card-body">

                    <div class="tab-content table-responsive">
                        <!-- ==========Closed Tab start======== -->
                        @include('admin.pages.salesforcast.par.sales-forecast-closed')

                        <!-- ==========Closed Tab End======== -->

                        <!--========== promising 2------------ -->

                        @include('admin.pages.salesforcast.par.sales-forecast-promising')

                        <!--========== promising 2------------ -->

                        <!--==========Quotation 3-------------------- -->

                        @include('admin.pages.salesforcast.par.sales-forecast-quotation')

                        <!--==========Quotation 3-------------------- -->


                        <!--==========lost 4------------------------- -->


                        @include('admin.pages.salesforcast.par.sales-forecast-lost')

                        <!--==========lost 4------------------------- -->





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
        <script type="text/javascript">
            $('.policyDT').DataTable({
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                "iDisplayLength": 10,
                "lengthMenu": [10, 26, 30, 50],
                columnDefs: [{
                    orderable: false,
                    targets: [3],
                }, ],
            });
        </script>
        <script>
            // Initialize ==========Closed Form valitation
            const validator = $('.form-validate-jquery-Closed').validate({
                ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                errorClass: 'validation-invalid-label',
                successClass: 'validation-valid-label',
                validClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                success: function(label) {
                    label.addClass('validation-valid-label').text('Success.'); // remove to hide Success message
                },

                // Different components require proper error label placement
                errorPlacement: function(error, element) {

                    // Input with icons and Select2
                    if (element.hasClass('select2-hidden-accessible')) {
                        error.appendTo(element.parent());
                    }

                    // Input group, form checks and custom controls
                    else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass(
                            'form-check') || element.parents().hasClass('input-group')) {
                        error.appendTo(element.parent().parent());
                    }

                    // Other elements
                    else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    password: {
                        minlength: 5
                    },
                    repeat_password: {
                        equalTo: '#password'
                    },
                    email: {
                        email: true
                    },
                    repeat_email: {
                        equalTo: '#email'
                    },
                    minimum_characters: {
                        minlength: 10
                    },
                    maximum_characters: {
                        maxlength: 10
                    },
                    minimum_number: {
                        min: 10
                    },
                    maximum_number: {
                        max: 10
                    },
                    number_range: {
                        range: [10, 20]
                    },
                    url: {
                        url: true
                    },
                    date: {
                        date: true
                    },
                    date_iso: {
                        dateISO: true
                    },
                    numbers: {
                        number: true
                    },

                    ordervalue: {
                        number: true

                    },


                    digits: {
                        digits: true
                    },
                    creditcard: {
                        creditcard: true
                    },
                    basic_checkbox: {
                        minlength: 2
                    },
                    styled_checkbox: {
                        minlength: 2
                    },
                    switch_group: {
                        minlength: 2
                    }


                },
                messages: {
                    custom: {
                        required: 'This is a custom error message'
                    },
                    basic_checkbox: {
                        minlength: 'Please select at least {0} checkboxes'
                    },
                    styled_checkbox: {
                        minlength: 'Please select at least {0} checkboxes'
                    },
                    switch_group: {
                        minlength: 'Please select at least {0} switches'
                    },
                    agree: 'Please accept our policy'
                }
            });

            // Initialize ==========promising ==============

            $(document).ready(function() {
                $('.form-validate-jquery-promising').validate({

                    // ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                    errorClass: 'validation-invalid-label',
                    successClass: 'validation-valid-label',
                    validClass: 'validation-valid-label',
                    highlight: function(element, errorClass) {
                        $(element).removeClass(errorClass);
                    },
                    unhighlight: function(element, errorClass) {
                        $(element).removeClass(errorClass);
                    },
                    success: function(label) {
                        label.addClass('validation-valid-label').text(
                        'Success.'); // remove to hide Success message
                    },

                    // Different components require proper error label placement
                    errorPlacement: function(error, element) {

                        // Input with icons and Select2
                        if (element.hasClass('select2-hidden-accessible')) {
                            error.appendTo(element.parent());
                        }

                        // Input group, form checks and custom controls
                        else if (element.parents().hasClass('form-control-feedback') || element.parents()
                            .hasClass('form-check') || element.parents().hasClass('input-group')) {
                            error.appendTo(element.parent().parent());
                        }

                        // Other elements
                        else {
                            error.insertAfter(element);
                        }
                    },
                    rules: {
                        password: {
                            minlength: 5
                        },
                        repeat_password: {
                            equalTo: '#password'
                        },
                        email: {
                            email: true
                        },
                        repeat_email: {
                            equalTo: '#email'
                        },
                        minimum_characters: {
                            minlength: 10
                        },
                        maximum_characters: {
                            maxlength: 10
                        },
                        minimum_number: {
                            min: 10
                        },
                        maximum_number: {
                            max: 10
                        },
                        number_range: {
                            range: [10, 20]
                        },
                        url: {
                            url: true
                        },
                        date: {
                            date: true
                        },
                        date_iso: {
                            dateISO: true
                        },
                        numbers: {
                            number: true
                        },
                        contactPerson: {
                            text: true
                        },
                        ContactNo: {
                            number: true
                        },

                        orderValue: {
                            number: true
                        },

                        closingValue: {
                            number: true
                        },

                        digits: {
                            digits: true
                        },
                        creditcard: {
                            creditcard: true
                        },
                        basic_checkbox: {
                            minlength: 2
                        },
                        styled_checkbox: {
                            minlength: 2
                        },
                        switch_group: {
                            minlength: 2
                        }
                    },
                    messages: {
                        custom: {
                            required: 'This is a custom error message'
                        },
                        basic_checkbox: {
                            minlength: 'Please select at least {0} checkboxes'
                        },
                        styled_checkbox: {
                            minlength: 'Please select at least {0} checkboxes'
                        },
                        switch_group: {
                            minlength: 'Please select at least {0} switches'
                        },
                        agree: 'Please accept our policy'
                    }

                });

            });
            // Initialize ==========@Quotation ==============
            $(document).ready(function() {
                $('.form-validate-jquery-quotation').validate({

                    // ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                    errorClass: 'validation-invalid-label',
                    successClass: 'validation-valid-label',
                    validClass: 'validation-valid-label',
                    highlight: function(element, errorClass) {
                        $(element).removeClass(errorClass);
                    },
                    unhighlight: function(element, errorClass) {
                        $(element).removeClass(errorClass);
                    },
                    success: function(label) {
                        label.addClass('validation-valid-label').text(
                        'Success.'); // remove to hide Success message
                    },

                    // Different components require proper error label placement
                    errorPlacement: function(error, element) {

                        // Input with icons and Select2
                        if (element.hasClass('select2-hidden-accessible')) {
                            error.appendTo(element.parent());
                        }

                        // Input group, form checks and custom controls
                        else if (element.parents().hasClass('form-control-feedback') || element.parents()
                            .hasClass('form-check') || element.parents().hasClass('input-group')) {
                            error.appendTo(element.parent().parent());
                        }

                        // Other elements
                        else {
                            error.insertAfter(element);
                        }
                    },
                    rules: {
                        password: {
                            minlength: 5
                        },
                        repeat_password: {
                            equalTo: '#password'
                        },
                        email: {
                            email: true
                        },
                        repeat_email: {
                            equalTo: '#email'
                        },
                        minimum_characters: {
                            minlength: 10
                        },
                        maximum_characters: {
                            maxlength: 10
                        },
                        minimum_number: {
                            min: 10
                        },
                        maximum_number: {
                            max: 10
                        },
                        number_range: {
                            range: [10, 20]
                        },
                        url: {
                            url: true
                        },
                        date: {
                            date: true
                        },
                        date_iso: {
                            dateISO: true
                        },
                        numbers: {
                            number: true
                        },
                        contactPerson: {
                            text: true
                        },
                        ContactNo: {
                            number: true
                        },

                        quotedValue: {
                            number: true
                        },


                        digits: {
                            digits: true
                        },
                        creditcard: {
                            creditcard: true
                        },
                        basic_checkbox: {
                            minlength: 2
                        },
                        styled_checkbox: {
                            minlength: 2
                        },
                        switch_group: {
                            minlength: 2
                        }
                    },
                    messages: {
                        custom: {
                            required: 'This is a custom error message'
                        },
                        basic_checkbox: {
                            minlength: 'Please select at least {0} checkboxes'
                        },
                        styled_checkbox: {
                            minlength: 'Please select at least {0} checkboxes'
                        },
                        switch_group: {
                            minlength: 'Please select at least {0} switches'
                        },
                        agree: 'Please accept our policy'
                    }

                });

            });
            // Initialize ==========@Lost ==============
            $(document).ready(function() {
                $('.form-validate-jquery-lost').validate({

                    // ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                    errorClass: 'validation-invalid-label',
                    successClass: 'validation-valid-label',
                    validClass: 'validation-valid-label',
                    highlight: function(element, errorClass) {
                        $(element).removeClass(errorClass);
                    },
                    unhighlight: function(element, errorClass) {
                        $(element).removeClass(errorClass);
                    },
                    success: function(label) {
                        label.addClass('validation-valid-label').text(
                        'Success.'); // remove to hide Success message
                    },

                    // Different components require proper error label placement
                    errorPlacement: function(error, element) {

                        // Input with icons and Select2
                        if (element.hasClass('select2-hidden-accessible')) {
                            error.appendTo(element.parent());
                        }

                        // Input group, form checks and custom controls
                        else if (element.parents().hasClass('form-control-feedback') || element.parents()
                            .hasClass('form-check') || element.parents().hasClass('input-group')) {
                            error.appendTo(element.parent().parent());
                        }

                        // Other elements
                        else {
                            error.insertAfter(element);
                        }
                    },
                    rules: {
                        password: {
                            minlength: 5
                        },
                        repeat_password: {
                            equalTo: '#password'
                        },
                        email: {
                            email: true
                        },
                        repeat_email: {
                            equalTo: '#email'
                        },
                        minimum_characters: {
                            minlength: 10
                        },
                        maximum_characters: {
                            maxlength: 10
                        },
                        minimum_number: {
                            min: 10
                        },
                        maximum_number: {
                            max: 10
                        },
                        number_range: {
                            range: [10, 20]
                        },
                        url: {
                            url: true
                        },
                        date: {
                            date: true
                        },
                        date_iso: {
                            dateISO: true
                        },
                        numbers: {
                            number: true
                        },

                        ContactPerson: {
                            text: true
                        },
                        ContactNo: {
                            number: true
                        },

                        quotedValue: {
                            number: true
                        },


                        digits: {
                            digits: true
                        },
                        creditcard: {
                            creditcard: true
                        },
                        basic_checkbox: {
                            minlength: 2
                        },
                        styled_checkbox: {
                            minlength: 2
                        },
                        switch_group: {
                            minlength: 2
                        }
                    },
                    messages: {
                        custom: {
                            required: 'This is a custom error message'
                        },
                        basic_checkbox: {
                            minlength: 'Please select at least {0} checkboxes'
                        },
                        styled_checkbox: {
                            minlength: 'Please select at least {0} checkboxes'
                        },
                        switch_group: {
                            minlength: 'Please select at least {0} switches'
                        },
                        agree: 'Please accept our policy'
                    }

                });

            });
        </script>
        <script>
            $(document).ready(function() {
                var currentMonth = (new Date).getMonth() + 1;
                if (currentMonth == 1) {
                    // alert(currentMonth);
                    $("#closed_January_item1").addClass("show");
                    $("#PromisingJanuary_item1").addClass("show");
                    $("#QuotedJanuary_item1").addClass("show");
                    $("#LostJanuary_item1").addClass("show");
                }else if (currentMonth == 2) {
                    // alert(currentMonth);
                    $("#closed_Feb_Item").addClass("show");
                    $("#Promising_Feb_Item").addClass("show");
                    $("#Quoted_Feb_item").addClass("show");
                    $("#Lost_Feb_item").addClass("show");
                }else if (currentMonth == 3) {
                    $("#closed_March_item").addClass("show");
                    $("#Promising_March_item").addClass("show");
                    $("#Quoted_March_item").addClass("show");
                    $("#Lost_March_item").addClass("show");
                }else if (currentMonth == 4) {
                        $("#closed_April_item").addClass("show");
                    $("#Promising_April_item").addClass("show");
                    $("#Quoted_April_item").addClass("show");
                    $("#Lost_April_item").addClass("show");
                }else if (currentMonth == 5) {
                        $("#closed_May_item").addClass("show");
                    $("#Promising_May_item").addClass("show");
                    $("#Quoted_May_item").addClass("show");
                    $("#Lost_May_item").addClass("show");
                }else if (currentMonth == 6) {
                        $("#closed_June_item").addClass("show");
                    $("#Promising_June_item").addClass("show");
                    $("#Quoted_June_item").addClass("show");
                    $("#Lost_June_item").addClass("show");
                }else if (currentMonth == 7) {
                        $("#closed_July_item").addClass("show");
                    $("#Promising_July_item").addClass("show");
                    $("#Quoted_July_item").addClass("show");
                    $("#Lost_July_item").addClass("show");
                }else if (currentMonth == 8) {
                        $("#closed_August_item").addClass("show");
                    $("#Promising_August_item").addClass("show");
                    $("#Quoted_August_item").addClass("show");
                    $("#Lost_August_item").addClass("show");
                }else if (currentMonth == 9) {
                        $("#closed_September_item").addClass("show");
                    $("#Promising_September_item").addClass("show");
                    $("#Quoted_September_item").addClass("show");
                    $("#Lost_September_item").addClass("show");
                }else if (currentMonth == 10) {
                        $("#closed_October_item").addClass("show");
                    $("#PromisingOctober_item").addClass("show");
                    $("#QuotedOctober_item").addClass("show");
                    $("#LostOctober_item").addClass("show");
                }else if (currentMonth == 11) {
                        $("#closed_November_item").addClass("show");
                    $("#Promising_November_item").addClass("show");
                    $("#Quoted_November_item").addClass("show");
                    $("#Lost_November_item").addClass("show");
                }else if (currentMonth == 12) {
                        $("#closed_December_item").addClass("show");
                    $("#promising_December_item").addClass("show");
                    $("#Quoted_December_item").addClass("show");
                    $("#Lost_December_item").addClass("show");
                }

            });
        </script>
    @endpush
@endonce
