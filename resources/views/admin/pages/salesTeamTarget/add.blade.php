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
                        <a href="{{ route('salesTeamTarget.index') }}" class="breadcrumb-item">Sales Individual Target</a>
                        <a href="" class="breadcrumb-item">Add</a>
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
                                    href="{{ route('salesTeamTarget.store') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold">Add Sales Individual Target</p>
                        </div>


                    </div>
                </div>
            </div>

            <div class="card">
                <form action="{{ route('salesTeamTarget.store') }}" method="POST">
                    @csrf
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Sales Manager Name</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select name="sales_man_id" class="form-control form-select-sm select"
                                                        data-container-css-class="select-sm"
                                                        data-placeholder="Chose Sales Manager" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Country Name</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select name="country_id" class="form-control form-select-sm select"
                                                        data-container-css-class="select-sm"
                                                        data-placeholder="Chose Category Name" required>
                                                        @foreach ($country as $item)
                                                            <option value="{{ $item->id }}">{{ $item->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Fiscal Year</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select class="yearselect form-select" name="fiscal_year"
                                                        style="width: 100%;"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Year Started</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select name="year_started" class="form-control form-select-sm select"
                                                        data-container-css-class="select-sm"
                                                        data-placeholder="Chose year started " required>
                                                        <option></option>
                                                        <option value="january">January</option>
                                                        <option value="june">June</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Total Target</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="year_target"
                                                        class="form-control form-control-sm maxlength" maxlength="100"
                                                        id="brochure" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Quarter One</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="quarter_one_target"
                                                        class="form-control form-control-sm maxlength" maxlength="100"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Quarter Two</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="quarter_two_target"
                                                        class="form-control form-control-sm maxlength" maxlength="100"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Quarter Three</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="quarter_three_target"
                                                        class="form-control form-control-sm maxlength" maxlength="100"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Quarter Four</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="quarter_four_target"
                                                        class="form-control form-control-sm maxlength" maxlength="100"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-2 pe-3">
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

@push('scripts')
    <script>
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
    </script>
@endpush
