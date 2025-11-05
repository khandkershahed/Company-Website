@extends('admin.master')
@section('content')
    <style>
        .label_style {
            width: 151px !important;
        }
        .form-control-sm {
            width: 100%;
            height: 25px;
            padding: 2px;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Sales Team Target</a>
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
        <div class="content pt-2 w-50 mx-auto mt-3">
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
                            <p class="text-white p-0 m-0 fw-bold">Edit Sales Team Target</p>
                        </div>
                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('solution.index') }}" class="btn navigation_btn ms-2">
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
                <form action="{{ route('salesTeamTarget.store') }}" method="POST">
                    @csrf
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">
                                <p class=" fw-bold mt-2" style="border-bottom: 1px solid #257196; color: #257196;"> Sales Area</p>
                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Sales Manager Name</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="sales_man_id" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose Type" required>
                                                @foreach ($users as $user)
                                                    <option @selected($user->id == $salesTeamTarget->sales_man_id) value="{{ $user->id }}">
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-4 col-sm-12">
                                                    <span>Fiscal Year</span>
                                                </div>
                                                <div class="col-lg-8 col-sm-12">
                                                    <input type="text" class="yearselect form-control form-control-sm"
                                                        @selected($salesTeamTarget->fiscal_year == $salesTeamTarget->fiscal_year)
                                                        value="{{ $salesTeamTarget->fiscal_year }}" name="fiscal_year" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-1">
                                                <div class="col-lg-4 col-sm-12">
                                                    <span>Total Target</span>
                                                </div>
                                                <div class="col-lg-8 col-sm-12">
                                                    <input type="text" value="{{ $salesTeamTarget->year_target }}"
                                                        name="year_target" class="form-control form-control-sm maxlength"
                                                        maxlength="100" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1 d-flex align-items-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Year Started</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="year_started" class="form-control form-select-sm select"
                                                data-container-css-class="select-sm" data-placeholder="Chose year started "
                                                required>
                                                <option></option>
                                                <option @selected($salesTeamTarget->year_started == 'january') value="january">January</option>
                                                <option @selected($salesTeamTarget->year_started == 'june') value="june">June</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class=" fw-bold mt-2" style="border-bottom: 1px solid #257196; color: #257196;"> Quarter Area
                                </p>
                                <div class="px-2 py-2 rounded bg-light mt-1">
                                    <div>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-6">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <span>Quarter One</span>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <input type="text"
                                                            value="{{ $salesTeamTarget->quarter_one_target }}"
                                                            name="quarter_one_target"
                                                            class="form-control form-control-sm maxlength"
                                                            maxlength="100" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <span>Quarter Two</span>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <input type="text"
                                                            value="{{ $salesTeamTarget->quarter_two_target }}"
                                                            name="quarter_two_target"
                                                            class="form-control form-control-sm maxlength"
                                                            maxlength="100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-6">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <span>Quarter Three</span>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <input type="text"
                                                            value="{{ $salesTeamTarget->quarter_three_target }}"
                                                            name="quarter_three_target"
                                                            class="form-control form-control-sm maxlength"
                                                            maxlength="100" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <span>Quarter Four</span>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <input type="text"
                                                            value="{{ $salesTeamTarget->quarter_four_target }}"
                                                            name="quarter_four_target"
                                                            class="form-control form-control-sm maxlength"
                                                            maxlength="100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-2 pe-3 pt-1">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /content area -->
        <!-- /inner content -->
    </div>
@endsection
