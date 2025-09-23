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
                        <h4 class="mb-3 text-center page_titles w-50">Evaluation Sheet ({{ $user->name }}) </h4>
                    </div>

                    <div class="row gx-1">
                        <div class="col-lg-8 col-sm-12">
                            <div class="row gx-1">
                                <div class="col-lg-6 col-sm-12">
                                    <table class="table table-responsive table-bordered border-tb-table"
                                        style="font-size: 10px">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-light fw-bold"> Dept. / Comp. : </th>
                                                <th scope="col">NGEN IT</th>
                                                <th scope="col" class="bg-light fw-bold"> Started Salary </th>
                                                <th scope="col">3,000.00</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">Emp. Name:</th>
                                                <td>{{ $user->name }}</td>
                                                <td class="bg-light fw-bold">Last Eval Date:</td>
                                                <td>31-Dec-22</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">Designation:</th>
                                                <td>{{ $user->designation }}</td>
                                                <td class="bg-light fw-bold">Last Eval Score :</td>
                                                <td>60%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold"> Joining Date : </th>
                                                <td>1-Sep-22</td>
                                                <td class="bg-light fw-bold">Last Salary</td>
                                                <td>3,000.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <table class="table table-responsive table-bordered border-tb-table"
                                        style="font-size: 10px">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-light fw-bold"> Evaluation Period : </th>
                                                <th scope="col">3 Month</th>
                                                <th scope="col" class="bg-light fw-bold"> Started Salary </th>
                                                <th scope="col">3,000.00</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold"> New Eval Score : </th>
                                                <td>32%</td>
                                                <td class="bg-light fw-bold">Last Eval Date:</td>
                                                <td>31-Dec-22</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">Increment</th>
                                                <td>32%</td>
                                                <td class="bg-light fw-bold">Last Eval Score :</td>
                                                <td>60%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">Promotion</th>
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
                            <table class="table table-responsive table-bordered border-tb-table" style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" class="main-color-th fw-bold text-white"> Effective From </th>
                                        <th scope="col" class="text-white" style="background-color: #ae0a46"> EMPLOYEE
                                            OFFICIALS </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="main-color-th fw-bold text-white"> 1 Apr 23 </th>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center px-4">
                                                <p class="p-0 m-0"> Any documents need to be submitted ? </p>
                                                <p class="p-0 m-0">N</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="main-color-th fw-bold text-white"> PROBATION </th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="main-color-th fw-bold" style="color: yellow"> 5,023.86
                                        </th>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center px-4">
                                                <p class="p-0 m-0">Any Agreements need to be signed ?</p>
                                                <p class="p-0 m-0">Y</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- New Row Start -->
                    <!-- Second Evaluation Start -->
                    <div class="row gx-1">
                        <div class="col-lg-7 col-sm-12">
                            <div class="row gx-1">
                                <div class="col-lg-6 col-sm-12">
                                    <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                        style="font-size: 10px">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="3"
                                                    class="evaluation-table text-white fw-bold text-center"> PERFORMANCE
                                                    FACTOR </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold"> PERFORMANCE FACTOR </th>
                                                <td class="text-center">3.0</td>
                                                <td class="bg-light fw-bold">Growing Pro</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold"> Behavioral Traits </th>
                                                <td class="text-center">0.0</td>
                                                <td class="bg-light fw-bold">Poor Performer</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold"> Supervisory Factors </th>
                                                <td class="text-center">0.0</td>
                                                <td class="bg-light fw-bold">Poor Performer</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold"> Objective Factors </th>
                                                <td class="text-center">0.0</td>
                                                <td class="bg-light fw-bold">Poor Performer</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                        style="font-size: 10px">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="4"
                                                    class="evaluation-table text-white fw-bold text-center"> ALL KPI
                                                    FACTORS </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">TASK KPI</th>
                                                <td class="text-center">95%</td>
                                                <td class="bg-light fw-bold">ATTENDANCE</td>
                                                <td class="bg-light fw-bold">0%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">PROJECT KPI</th>
                                                <td class="text-center">0%</td>
                                                <td class="bg-light fw-bold">Leave KPI</td>
                                                <td class="bg-light fw-bold">100%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">Q - PRO KPI</th>
                                                <td class="text-center">0%</td>
                                                <td class="bg-light fw-bold">Q - HR KPI</td>
                                                <td class="bg-light fw-bold">0%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="bg-light fw-bold">ATTITUDE KPI</th>
                                                <td class="text-center">0%</td>
                                                <td class="bg-light fw-bold">MANAGEMENT</td>
                                                <td class="bg-light fw-bold">0%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-12 text-center">
                            <table class="table table-responsive table-bordered border-lr-table border-tb-table"
                                style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th class="main-color-th fw-bold text-white">Performance</th>
                                    </tr>
                                    <tr>
                                        <th class="main-color-th fw-bold text-white" rowspan="8">
                                            <h3 class="special_table-ch" style="color: yellow">32%</h3>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table" style="font-size: 10px">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" colspan="4" class="main-color-th fw-bold text-white">
                                            SUGGESTIONS </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="bg-light fw-bold">PF</th>
                                        <th scope="row" class="fw-bold"></th>
                                        <th scope="row" class="bg-light fw-bold">Task</th>
                                        <th scope="row" class="fw-bold"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="bg-light fw-bold">BT</th>
                                        <th scope="row" class="fw-bold"></th>
                                        <th scope="row" class="bg-light fw-bold">Project</th>
                                        <th scope="row" class="fw-bold"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="bg-light fw-bold">SF</th>
                                        <th scope="row" class="fw-bold"></th>
                                        <th scope="row" class="bg-light fw-bold">Attitude</th>
                                        <th scope="row" class="fw-bold"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="bg-light fw-bold">OF</th>
                                        <th scope="row" class="fw-bold"></th>
                                        <th scope="row" class="bg-light fw-bold">Attendance</th>
                                        <th scope="row" class="fw-bold"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- New Row Start -->
                    <!-- Fourth Evaluation Start -->
                    <div class="row gx-1">
                        <div class="col-lg-8 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table" style="font-size: 10px">
                                <tbody>
                                    <tr class="">
                                        <th scope="row" class="main-color-th fw-bold text-white" rowspan="4">
                                            <p class="rotate-text">Score</p>
                                        </th>
                                        <td class="table-head-color">JOB</td>
                                        <td class="table-head-color">Score</td>
                                        <td class="table-head-color">Weight</td>
                                        <td class="table-head-color">Job KPI</td>
                                        <td class="table-head-color">HR KPI</td>
                                        <td class="table-head-color">PSI</td>
                                        <td class="table-head-color">Management</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3">Evaluation</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3"
                                            class="evaluation-table text-white fw-bold text-center"> SUGGESTION BY TEAM
                                            LEADER </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <p class="pt-2 pb-2 m-0"> Patience, Carefullness, Skill Development. Should set
                                                the career </p>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- New Row Start -->
                    <!-- Fourth Evaluation Start -->
                    <div class="row gx-1">
                        <div class="col-lg-8 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table" style="font-size: 10px">
                                <tbody>
                                    <tr class="bg-light text-center">
                                        <th scope="row" class="main-color-th fw-bold text-white" rowspan="4">
                                            <p class="rotate-text rotatable-text">Evaluation</p>
                                        </th>
                                        <td class="text-center table-head-color text-white fw-bold" rowspan="2">
                                            Current Value </td>
                                        <td class="table-head-color">Gross / Month</td>
                                        <td class="table-head-color">Basic</td>
                                        <td class="table-head-color">Facilities</td>
                                        <td class="table-head-color">HR KPI</td>
                                        <td class="table-head-color">Job KPI</td>
                                        <td class="table-head-color">PSI</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">Recommend Value</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="text-center table-head-color text-white fw-bold" rowspan="2">
                                            Recommend Value </td>
                                        <td class="table-head-color">Gross / Month</td>
                                        <td class="table-head-color">Basic</td>
                                        <td class="table-head-color">Facilities</td>
                                        <td class="table-head-color">HR KPI</td>
                                        <td class="table-head-color">Job KPI</td>
                                        <td class="table-head-color">PSI</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">Recommend Value</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3"
                                            class="evaluation-table text-white fw-bold text-center"> SUGGESTION BY
                                            SUPERVISOR </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <p class="pt-0 pb-1 mb-1" style="padding-top: 4px !important"> - Increase Work
                                                Quantity & Quality </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <p class="pt-0 pb-1 mb-1" style="padding-top: 4px !important"> - Understand
                                                our Business & Study more on those technologies </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <p class="pt-0 pb-1 mb-1" style="padding-top: 4px !important"> - Improve Team
                                                Work capacity </p>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- New Row Start -->
                    <!-- Fifth Evaluation Start -->
                    <div class="row gx-1">
                        <div class="col-lg-12 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                style="font-size: 10px">
                                <tbody>
                                    <tr class="bg-light text-center">
                                        <th scope="row" class="main-color-th fw-bold text-white" rowspan="10">
                                            <p class="rotate-text rotatables-text"> Additional Benefits </p>
                                        </th>
                                        <td class="table-head-color">Lunch / Meal</td>
                                        <td class="table-head-color">Mkt. Conv. Bill</td>
                                        <td class="table-head-color">Facilities</td>
                                        <td class="table-head-color">Mobile Bill</td>
                                        <td class="table-head-color">*Provid. Fund</td>
                                        <td class="table-head-color">*Gratuity</td>
                                        <td class="table-head-color">H. Incentive</td>
                                        <td class="table-head-color">Benefits</td>
                                        <th scope="row" class="main-color-th fw-bold text-white" rowspan="8">
                                            <p class="rotate-text rotatables-text">Tk. 5,653.86</p>
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3" rowspan="3">Tk. 0.00</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                    <tr class="bg-light text-center">
                                        <td class="table-head-color">Lunch / Meal</td>
                                        <td class="table-head-color">Mkt. Conv. Bill</td>
                                        <td class="table-head-color">Facilities</td>
                                        <td class="table-head-color">Mobile Bill</td>
                                        <td class="table-head-color">*Provid. Fund</td>
                                        <td class="table-head-color">*Gratuity</td>
                                        <td class="table-head-color">H. Incentive</td>
                                        <td class="table-head-color">Bouns</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3" rowspan="3">Tk. 0.00</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                        <td class="p-3">32%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" class="text-info py-3"> ** TB: Applic. only on 12 mos' conv.
                                            Achv. policy ; PB: Only applic. on Yrly Profit ; EB: Applic. on 1 Yrs Comp.; GT:
                                            Only after 5 Yrs comp. </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- New Row Start -->
                    <!-- Third Evaluation Start -->
                    <div class="row gx-1">
                        <div class="col-lg-8 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3"
                                            class="evaluation-table text-white fw-bold text-center"> REVIEW OF
                                            GOALS/OBJECTIVES/SPECIAL ASSIGNMENTS FOR THE PAST YEAR </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class=""> You have had been assigned for Site Requirement
                                            Analysis, Testing, Quality assuance, Eror Findings, Content Writting, Product
                                            Soucring & Updates. However, based on the </th>
                                        <th scope="row" class=""> volume of Works, Quantity and your professional
                                            integrity, the following evaluation has been done. Despite of efficiency or
                                            defficiancy the valuation may or may not slight errors </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3"
                                            class="evaluation-table text-white fw-bold text-center"> SUGGESTION BY HR ADMIN
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <p class="pt-2 pb-2 m-0"> - Improve Knowledge & Skill with understanding
                                                corporate culture </p>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- New Row Start -->
                    <!-- Six Evaluation Start -->
                    <div class="row gx-1">
                        <div class="col-lg-8 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table" style="font-size: 10px">
                                <tbody>
                                    <tr class="d-flex justify-content-between">
                                        <td class="table-head-color"> Justification of Evaluation : </td>
                                        <td class="table-head-color">By Admin/CEO/MD</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3"> POSETIVE:Dedication, Continuation of effort in the company NEED
                                            TO IMPROVE: Business & Industry Related knowledge for technology products </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table table-responsive table-bordered border-tb-table border-lr-table"
                                style="font-size: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3" class="text-white fw-bold text-center"
                                            style="background-color: #ae0a46"> JOB STATUS </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <h6 class="pt-2 pb-2 m-0">PROBATION / CONTINUE</h6>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="accordion mb-5" id="goalsExample">
                                <div class="accordion-item shadow-lg rounded-0">
                                    <h2 class="accordion-header rounded-0" id="goalsHeading">
                                        <button
                                            class="accordion-button rounded-0 evaluation-table text-white shadow-lg text-center p-2 rounded-0"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#goals"
                                            aria-expanded="true" aria-controls="goals"> Goals/Assignments for the coming
                                            duration </button>
                                    </h2>
                                    <div id="goals" class="accordion-collapse collapse"
                                        aria-labelledby="goalsHeading" data-bs-parent="#goalsExample">
                                        <div class="accordion-body">
                                            <table
                                                class="table table-responsive table-bordered border-tb-table border-lr-table"
                                                style="font-size: 10px">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" colspan="3"
                                                            class="evaluation-table text-white fw-bold text-center">
                                                            Goals/Assignments for the coming duration </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 1. Do or Correction of full NGEN IT Site
                                                                within Jun'23 </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 2. Complete 1000 Products uploading within
                                                                Sep'23 </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 3. Complete 360 Full Products Page with
                                                                full within Sep'23 </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 4. Compelte 10 Blogs, 20 features, 20
                                                                solutions within Sep'23 </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 5. Compelte - Site Documentation, User
                                                                Manual & Training </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0">
                                                                <span>Other Works - ( Time to Time )</span>
                                                            </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 6. Any Small & Medium Site Testing & QA (at
                                                                least 3) </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0"> 7. Any Small & Medium Site Contents Wrting
                                                                (at least 3) </p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="p-1 m-0">8. Other related Works</p>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
@endpush
