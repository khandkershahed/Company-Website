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
                        <a href="{{ route('admin.sales-dashboard.index') }}" class="breadcrumb-item">Sales Dashboard</a>
                        <a href="{{ route('salesYearTarget.index') }}" class="breadcrumb-item">Sales Year Target</a>
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
        <div class="content pt-2 w-lg-75 w-sm-100 mx-auto">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('salesYearTarget.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Edit Sales Year Target</p>
                        </div>


                    </div>
                </div>
            </div>

            <div class="card">
                <form method="post" action="{{ route('salesYearTarget.update', $salesYearTarget->id) }}">
                    @csrf
                    @method('PUT')
                    <!--Banner Section-->
                    <div class="container">
                        <p class=" fw-bold mt-2" style="border-bottom: 1px solid #257196; color: #257196;"> Sales Info
                        </p>
                        <div class="px-2 py-2 rounded bg-light mt-1">
                            <div class="row mb-1">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>Country Name</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="country_id" class="form-control select"
                                                data-placeholder="Chose country name ">
                                                <option></option>
                                                @foreach ($country as $item)
                                                    <option @selected($item->id == $salesYearTarget->country_id) value="{{ $item->id }}">
                                                        {{ $item->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>Fiscal Year</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="{{ $salesYearTarget->fiscal_year }}"
                                                name="fiscal_year" id="datepicker" class="form-control form-control-sm maxlength"
                                                maxlength="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>Year Target</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="{{ $salesYearTarget->year_target }}"
                                                name="year_target" class="form-control form-control-sm maxlength" maxlength="100" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>Year Started</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="year_started" class="form-control form-control-sm select"
                                                data-minimum-results-for-search="Infinity"
                                                data-placeholder="Chose year started ">
                                                <option></option>
                                                <option @selected($salesYearTarget->year_started == 'january') value="january">January</option>
                                                <option @selected($salesYearTarget->year_started == 'june') value="june">June</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class=" fw-bold mt-2" style="border-bottom: 1px solid #257196; color: #257196;"> Quarter Info
                        </p>
                        <div class="px-2 py-2 rounded bg-light mt-1">
                            <div class="row mb-1">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span>Quarter One Target</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="quarter_one_target"
                                                class="form-control form-control-sm maxlength"
                                                placeholder="Quarter One Target" maxlength="100" value="{{$salesYearTarget->quarter_one_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span>Quarter Two Target</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="quarter_two_target"
                                                class="form-control form-control-sm maxlength"
                                                placeholder="Quarter Two Target" maxlength="100" value="{{$salesYearTarget->quarter_two_target}}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span>Quarter Three Target</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="quarter_three_target"
                                                class="form-control form-control-sm maxlength"
                                                placeholder="Quarter Three Target" maxlength="100" value="{{$salesYearTarget->quarter_three_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span>Quarter Four Target</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="quarter_four_target"
                                                class="form-control form-control-sm maxlength"
                                                placeholder="Quarter Four Target" maxlength="100" value="{{$salesYearTarget->quarter_four_target}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <p class=" fw-bold mt-2" style="border-bottom: 1px solid #257196; color: #257196;"> Monthly Target
                        </p>
                        <div class="px-2 py-2 rounded bg-light mt-1">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>January </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="january_target"
                                                class="form-control form-control-sm maxlength" placeholder="January Target" maxlength="100" value="{{$salesYearTarget->january_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>February </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="february_target"
                                                class="form-control form-control-sm maxlength" placeholder="February Target" maxlength="100" value="{{$salesYearTarget->february_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>March </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="march_target"
                                                class="form-control form-control-sm maxlength" placeholder="March Target" maxlength="100" value="{{$salesYearTarget->march_target}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mb-1">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>April </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="april_target"
                                                class="form-control form-control-sm maxlength" placeholder="April Target" maxlength="100" value="{{$salesYearTarget->april_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>May </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="may_target"
                                                class="form-control form-control-sm maxlength" placeholder="May Target" maxlength="100" value="{{$salesYearTarget->may_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>June </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="june_target"
                                                class="form-control form-control-sm maxlength" placeholder="June Target" maxlength="100" value="{{$salesYearTarget->june_target}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mb-1">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>July </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="july_target"
                                                class="form-control form-control-sm maxlength" placeholder="July Target" maxlength="100" value="{{$salesYearTarget->july_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>August </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="august_target"
                                                class="form-control form-control-sm maxlength" placeholder="August Target" maxlength="100" value="{{$salesYearTarget->august_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>September </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="september_target"
                                                class="form-control form-control-sm maxlength" placeholder="September Target" maxlength="100" value="{{$salesYearTarget->september_target}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mb-1">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>October </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="october_target"
                                                class="form-control form-control-sm maxlength" placeholder="October Target" maxlength="100" value="{{$salesYearTarget->october_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>November </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="november_target"
                                                class="form-control form-control-sm maxlength" placeholder="November Target" maxlength="100" value="{{$salesYearTarget->november_target}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span>December </span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="december_target"
                                                class="form-control form-control-sm maxlength" placeholder="December Target" maxlength="100" value="{{$salesYearTarget->december_target}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer border-0 pb-2 pe-3 mt-2">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
            </div>

            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection

@once
    @push('scripts')
        <script type="text/javascript">
            $("input[name='year_target']").on('keyup change', function() {


                var year_target = parseFloat($("input[name='year_target']").val());
                var quarter_target = parseFloat(((year_target) / 4).toFixed(3));
                var month_target = parseFloat(((year_target) / 12).toFixed(3));
                $("input[name='quarter_one_target']").val(quarter_target);
                $("input[name='quarter_two_target']").val(quarter_target);
                $("input[name='quarter_three_target']").val(quarter_target);
                $("input[name='quarter_four_target']").val(quarter_target);


                $("input[name='january_target']").val(month_target);
                $("input[name='february_target']").val(month_target);
                $("input[name='march_target']").val(month_target);
                $("input[name='april_target']").val(month_target);
                $("input[name='may_target']").val(month_target);
                $("input[name='june_target']").val(month_target);
                $("input[name='july_target']").val(month_target);
                $("input[name='august_target']").val(month_target);
                $("input[name='september_target']").val(month_target);
                $("input[name='october_target']").val(month_target);
                $("input[name='november_target']").val(month_target);
                $("input[name='december_target']").val(month_target);


            });


            $("input[name='quarter_one_target']").on('keyup change', function() {
                var year_target = parseFloat($("input[name='year_target']").val());
                quarter_sum = parseFloat($("input[name='quarter_one_target']").val()) +
                    parseFloat($("input[name='quarter_two_target']").val()) +
                    parseFloat($("input[name='quarter_three_target']").val()) +
                    parseFloat($("input[name='quarter_four_target']").val())

                if (((quarter_sum) - (year_target)) > 0) {
                    alert('Quarter one Target is exceeded your Year Target.');
                    $(this).css("border", "2px dashed red");
                    $('#submitbtn').addClass("d-none");

                } else {
                    $(this).css("border", "gray 1px solid");
                    $('#submitbtn').removeClass("d-none");

                }
            });

            $("input[name='quarter_two_target']").on('keyup change', function() {
                var year_target = parseFloat($("input[name='year_target']").val());
                quarter_sum = parseFloat($("input[name='quarter_one_target']").val()) +
                    parseFloat($("input[name='quarter_two_target']").val()) +
                    parseFloat($("input[name='quarter_three_target']").val()) +
                    parseFloat($("input[name='quarter_four_target']").val())

                if (((quarter_sum) - (year_target)) > 0) {
                    alert('Quarter two Target is exceeded your Year Target.');
                    $(this).css("border", "2px dashed red");
                    $('#submitbtn').addClass("d-none");
                } else {
                    $(this).css("border", "gray 1px solid");
                    $('#submitbtn').removeClass("d-none");

                }
            });

            $("input[name='quarter_three_target']").on('keyup change', function() {
                var year_target = parseFloat($("input[name='year_target']").val());
                quarter_sum = parseFloat($("input[name='quarter_one_target']").val()) +
                    parseFloat($("input[name='quarter_two_target']").val()) +
                    parseFloat($("input[name='quarter_three_target']").val()) +
                    parseFloat($("input[name='quarter_four_target']").val())

                if (((quarter_sum) - (year_target)) > 0) {
                    alert('Quarter three Target is exceeded your Year Target.');
                    $(this).css("border", "2px dashed red");
                    $('#submitbtn').addClass("d-none");
                } else {
                    $(this).css("border", "gray 1px solid");
                    $('#submitbtn').removeClass("d-none");

                }
            });

            $("input[name='quarter_four_target']").on('keyup change', function() {
                var year_target = parseFloat($("input[name='year_target']").val());
                quarter_sum = parseFloat($("input[name='quarter_one_target']").val()) +
                    parseFloat($("input[name='quarter_two_target']").val()) +
                    parseFloat($("input[name='quarter_three_target']").val()) +
                    parseFloat($("input[name='quarter_four_target']").val())

                if (((quarter_sum) - (year_target)) > 0) {
                    alert('Quarter four Target is exceeded your Year Target.');
                    $(this).css("border", "2px dashed red");
                    $('#submitbtn').addClass("d-none");
                } else {
                    $(this).css("border", "gray 1px solid");
                    $('#submitbtn').removeClass("d-none");

                }
            });



            //*
        </script>

        <script>
            $('.yearselect').yearselect({
                start: 2019,
                end: 2040
            });
        </script>
    @endpush
@endonce
