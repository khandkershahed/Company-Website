@extends('admin.master')
@section('content')
    <style>
        /* Evaluation  Design Start*/
        .main-color-th {
            background-color: #307a9d !important;
            border-left: 1px solid #307a9d !important;
            border-bottom: 1px solid white !important;
        }

        .page_titles {
            background-color: #307a9d;
            width: 20%;
            border-radius: 20px;
            color: white;
            margin: auto;
            font-size: 20px;
            padding-bottom: 3px;
        }

        .border-tb-table {
            border-top: 3px solid #307a9d;
            border-bottom: 3px solid #307a9d;
        }

        .border-lr-table {
            border-left: 1px solid #307a9d;
            border-right: 1px solid #307a9d;
        }

        .evaluation-table {
            background-color: #307a9d !important;
        }

        .special_table-ch {
            padding-top: 35px;
            padding-bottom: 35px;
        }

        .rotate-text {
            transform: rotate(-90deg);
            font-size: 14px;
            padding: 0;
        }

        .table-head-color {
            background: #24729759 !important;
        }

        .rotatable-text {
            position: relative;
            top: 55px;
        }

        .rotatables-text {
            position: relative;
            top: 160px;
        }

        .accordion-button:not(.collapsed) {
            color: #f2f4f5 !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="content p-0">


            <!-- Page header -->
            <section class="shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- Page Destination/ BreadCrumb --}}
                    <div class="page-header-content d-lg-flex ">
                        <div class="d-flex px-2">
                            <div class="breadcrumb py-2">
                                <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                                <a href="{{ route('admin.hr-and-admin.index') }}" class="breadcrumb-item"><span
                                        class="breadcrumb-item active">Hr and Admin</span></a>
                            </div>
                            <a href="#breadcrumb_elements"
                                class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                                data-bs-toggle="collapse">
                                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                            </a>
                        </div>
                    </div>
                    {{-- Inner Page Tab --}}

                    <!-- Basic tabs -->
                    <div class="px-3">
                        <a href="{{ route('employee.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Employees</span>
                            </div>

                        </a>
                        <a href="{{ route('leaveApplications') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Leave Applications</span>
                            </div>

                        </a>
                        <a href="{{ route('admin.job-post.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Job Post</span>
                            </div>

                        </a>
                        <a href="{{ route('job.regiserUser') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-users me-1" style="font-size: 12px;"></i>
                                <span>Job Applier's List</span>
                            </div>

                        </a>
                        {{-- <a href="{{ route('admin.marketing-dashboard.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                                    <span> Business</span>
                                </div>
                            </a> --}}
                    </div>
            </section>
            <!-- /page header -->

            <!-- Sales Chain Page -->
            <div class="content pt-2">
                <div class="container-fluid ">
                    <div class="col-lg-12">
                        <h4 class="mb-3 text-center page_titles w-50">Salary Sheet ({{ $user->name }}) </h4>
                    </div>
                    <!-- Row End -->

                    <form id="sourcing-sas" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row gx-1">
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="row gx-1">
                                            <div class="col-lg-6 col-sm-12">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="bg-light fw-bold"> Dept. / Comp. :
                                                            </th>
                                                            <th scope="col">NGEN IT</th>
                                                            <th scope="col" class="bg-light fw-bold"> Started Salary
                                                            </th>
                                                            <th scope="col">
                                                                <input class="allow_decimal form-control form-control-sm"
                                                                    type="text" value="3,000.00" name="">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Emp. Name: </th>
                                                            <td>{{ $user->name }}</td>
                                                            <td class="bg-light fw-bold">Last Eval Date:</td>
                                                            <td>31-Dec-22</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Designation: </th>
                                                            <td>{{ $user->designation }}</td>
                                                            <td class="bg-light fw-bold">Last Eval Score :</td>
                                                            <td>60%</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Joining Date :
                                                            </th>
                                                            <td>1-Sep-22</td>
                                                            <td class="bg-light fw-bold">Last Salary</td>
                                                            <td>3,000.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="bg-light fw-bold"> Evaluation Period :
                                                            </th>
                                                            <th scope="col">3 Month</th>
                                                            <th scope="col" class="bg-light fw-bold"> Started Salary
                                                            </th>
                                                            <th scope="col">3,000.00</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> New Eval Score :
                                                            </th>
                                                            <td>32%</td>
                                                            <td class="bg-light fw-bold">Last Eval Date:</td>
                                                            <td>31-Dec-22</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Increment </th>
                                                            <td>32%</td>
                                                            <td class="bg-light fw-bold">Last Eval Score :</td>
                                                            <td>60%</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Promotion </th>
                                                            <td>N/A</td>
                                                            <td class="bg-light fw-bold">Last Salary</td>
                                                            <td>3,000.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <table class="table table-responsive table-bordered border-tb-table mb-0"
                                            style="font-size: 10px">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="main-color-th fw-bold text-white"> Effective
                                                        From
                                                    </th>
                                                    <th scope="col" class="text-white" style="background-color: #ae0a46">
                                                        EMPLOYEE OFFICIALS </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="main-color-th fw-bold text-white"> 1 Apr 23
                                                    </th>
                                                    <td>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center px-4">
                                                            <p class="p-0 m-0"> Any documents need to be submitted ? </p>
                                                            <p class="p-0 m-0">N</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="main-color-th fw-bold text-white"> PROBATION
                                                    </th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="main-color-th fw-bold"
                                                        style="color: yellow">
                                                        5,023.86 </th>
                                                    <td>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center px-4">
                                                            <p class="p-0 m-0"> Any Agreements need to be signed ? </p>
                                                            <p class="p-0 m-0">Y</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="my-3 text-center page_titles">Evaluation Sheet</h4>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="workingdaysExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="workingdaysHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#workingdays"
                                                aria-expanded="true" aria-controls="workingdays"> Working Days </button>
                                        </h2>
                                        <div id="workingdays" class="accordion-collapse collapse show"
                                            aria-labelledby="workingdaysHeading" data-bs-parent="#workingdaysExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col" class="table-head-color text-white"> Value
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Net Salary</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="cog_price" value="0.00" id="cog_price"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> WDays</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="" value="0.00" id=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">TMD*</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="" value="0.00"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">UAA*</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="" value="0.00"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">NPL/OL*</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="" value="0.00"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">POL*</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="" value="0.00"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">EL/LA*</th>
                                                            <td><input class="form-control form-control-sm" type="text"
                                                                    name="" value="0.00"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="salaryRumationExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="salaryRumationHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#salaryRumation"
                                                aria-expanded="true" aria-controls="salaryRumation"> Salary /Remuneration
                                            </button>
                                        </h2>
                                        <div id="salaryRumation" class="accordion-collapse collapse show"
                                            aria-labelledby="salaryRumationHeading"
                                            data-bs-parent="#salaryRumationExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>

                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="tb rounded-0 shadow">
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Basic</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Food</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">House</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Medical</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Trnsprt</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Othr</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="basicExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="basicHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#basicFacility"
                                                aria-expanded="true" aria-controls="basicFacility"> Basic Facility
                                            </button>
                                        </h2>
                                        <div id="basicFacility" class="accordion-collapse collapse show"
                                            aria-labelledby="basicHeading" data-bs-parent="#basicExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tb rounded-0 shadow">
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Health</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Providient </th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="bonusExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="bonusHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#bonusAccordion"
                                                aria-expanded="true" aria-controls="bonusAccordion"> Bonus </button>
                                        </h2>
                                        <div id="bonusAccordion" class="accordion-collapse collapse show"
                                            aria-labelledby="bonusHeading" data-bs-parent="#bonusExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="tb rounded-0 shadow">

                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Incentive/Profit
                                                            </th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Festival</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Second Row Start -->
                        <div class="row gx-3 mt-3">
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="kpiExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="kpiHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#kpiFacility"
                                                aria-expanded="true" aria-controls="kpiFacility"> KPI </button>
                                        </h2>
                                        <div id="kpiFacility" class="accordion-collapse collapse show"
                                            aria-labelledby="kpiHeading" data-bs-parent="#kpiExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>

                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tb rounded-0 shadow">
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">HR</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Job </th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="additionalExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="additionalHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#additional"
                                                aria-expanded="true" aria-controls="additional"> Additional </button>
                                        </h2>
                                        <div id="additional" class="accordion-collapse collapse show"
                                            aria-labelledby="additionalHeading" data-bs-parent="#additionalExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="tb rounded-0 shadow">
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Lunch</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Conveyance </th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Mobile</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="deductionExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="deductionHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#deduction"
                                                aria-expanded="true" aria-controls="deduction"> Deduction </button>
                                        </h2>
                                        <div id="deduction" class="accordion-collapse collapse show"
                                            aria-labelledby="deductionHeading" data-bs-parent="#deductionExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tb rounded-0 shadow">
                                                        <tr>

                                                            <th scope="row" class="bg-light fw-bold">PbM*</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">AiM*</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">ETF*</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">*DFOB</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Advanced Taken</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Total Deduct</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="accordion rounded-0 mb-2" id="netPayableExample">
                                    <div class="accordion-item shadow-lg rounded-0">
                                        <h2 class="accordion-header" id="additionalHeading">
                                            <button
                                                class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#netpayable"
                                                aria-expanded="true" aria-controls="netpayable"> Net Payable </button>
                                        </h2>
                                        <div id="netpayable" class="accordion-collapse collapse show"
                                            aria-labelledby="additionalHeading" data-bs-parent="#netPayableExample">
                                            <div class="accordion-body p-1 table-responsive">
                                                <table class="table table-responsive table-bordered border-tb-table mb-0"
                                                    style="font-size: 10px">
                                                    <thead>
                                                        <tr class="">
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Name </th>
                                                            <th scope="col"
                                                                class="table-head-color text-center text-white fw-bold">
                                                                Percentage </th>
                                                            <th scope="col"
                                                                class="table-head-color text-white fw-bold">
                                                                Value </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tb rounded-0 shadow">
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Basic</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold"> Food Meal </th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="bg-light fw-bold">Extra</th>
                                                            <td class="table-head-color text-center">
                                                                <input class="multiplyValue form-control form-control-sm"
                                                                    type="text" name="bank_charge">
                                                            </td>
                                                            <td><input type="text"
                                                                    class="result form-control form-control-sm" disabled
                                                                    value=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Sales Chain Page -->



        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // public/js/events.js
        $(document).ready(function() {
            $('#category_filter').change(function() {
                var categoryId = $(this).val();
                $.ajax({
                    url: '/filter-events',
                    type: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    success: function(data) {
                        $('#events-table').html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $("#sourcing-sas").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
        var myForm = $('#sourcing-sas');
        myForm.find('input').on('keyup change', function() {
            // if ($('#source_price').val() == 1) {
            //     var $price = $('#price1').val();
            //     alert($price);
            // } else {
            //     var $price = $('#price2').val();
            // }
            var $price = $('input[name="cog_price"]').val();
            var profit = 0;
            var additional = 0;
            var $sales_price = 0;
            var netProfit = $('input[name="management_cost"]').val();
            // alert(netProfit);
            $('input[name="net_profit"]').val(netProfit);
            // for each row:
            $("tbody.tb tr").each(function() {
                // get the values from this row:
                var $value = $('.multiplyValue', this).val();


                var $result = parseFloat((($price * $value) / 100).toFixed(3));
                // set total for the row
                $('.result', this).val($result);




                var $mlval = parseFloat($('.multiplyValue', this).val());
                profit += isNaN($mlval) ? 0 : $mlval;
                var $stval = parseFloat($result);
                additional += isNaN($stval) ? 0 : $stval;


                //mult += $total;




            });
            var $additional = additional;
            var $sales_price = parseFloat($price) + parseFloat($additional);
            var difference1 = parseFloat($sales_price) - parseFloat($('#competetor_price1').val());
            var difference2 = parseFloat($sales_price) - parseFloat($('#competetor_price2').val());


            var profit = parseFloat((profit).toFixed(2));
            var additional = parseFloat((additional).toFixed(2));
            var $sales_price = parseFloat(($sales_price).toFixed(2));
            var difference1 = parseFloat((difference1).toFixed(2));
            var difference2 = parseFloat((difference2).toFixed(2));




            //alert($sales_price);
            $('.gross_profit_subtot').val(profit);
            $('.additional_subtot').val(additional);
            $('.sales_price').val($sales_price);
            $('#ourprice1').html($sales_price);
            $('#ourprice2').html($sales_price);
            $('#difference1').html(difference1);
            $('#difference2').html(difference2);
            $('input[name="net_profit_amount"]').val($('.management_cost').val());

        });
    </script>
@endpush
