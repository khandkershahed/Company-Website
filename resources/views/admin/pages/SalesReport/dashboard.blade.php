@extends('admin.master')
@section('content')
    <style type="text/css">
        .padding {
            padding: 0px !important;
        }

        .quotaed-lbg {
            background: #659EC7 !important;
        }

        .quotaed-ltbg {
            background: #306754 !important;
        }

        .quotaed-rbg {
            background: #4C787E !important;
        }

        .quotaed-rtbg {
            background: #1F6357 !important;
        }

        .customicTable {
            width: 80%;
            margin: auto;
        }

        .customicTable th,
        td {
            border: 1px solid #ddd;
            padding: 3px 3px;
            font-size: 11px;
        }

        .customicTableForecastHead th,
        td {
            border: 1px solid #ddd;
            padding: 5px 5px;
            font-size: 13px;
        }

        .form-select-sm {
            width: 100%;
            height: 30px;
            color: #000;
            padding: 2px;

        }

        .form-control-sm {
            width: 100%;
            height: 30px;
            padding: 2px;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            background-color: #b51313 !important;
        }

        .bg-red {
            background-color: #b51313 !important;
        }
    </style>


    <div class="content-wrapper">
        <!-- Page header -->
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.business.index') }}" class="breadcrumb-item">Business</a>
                            <a href="" class="breadcrumb-item">Sales Report</a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
        </section>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">

            <!-- Table components -->
            <div class="row">


                <div class="row mb-2 text-center">
                    <h5 class="mb-0"> Sales Report
                        FY-{{ !empty($salesYearTarget->fiscal_year) ? $salesYearTarget->fiscal_year : '' }} </h5>

                    <div class="col-lg-8 m-auto" style="width:50%;">

                        <table class="table customicTableForecastHead table-responsive">

                            <tr>

                                <th class="quotaed-lbg"> <a href="#" class="text-white">Company Name </a> </th>
                                <td class="quotaed-ltbg text-white"> NGenIT LTD </td>
                                <th class="quotaed-rbg"> <a href="" class="text-white">Total Yearly Target</a>
                                </th>
                                <td class="quotaed-rtbg text-white">
                                    {{ !empty($salesYearTarget->year_target) ? $salesYearTarget->year_target : '' }} $</td>

                            </tr>

                            <tr>

                                <th class="quotaed-lbg"> <a href="#" class="text-white">Company Business </a>
                                </th>

                                <td class="quotaed-ltbg text-white">Sl. & Distributor</td>
                                <th class="quotaed-rbg"> <a href="" class="text-white">Sales Achieved</a> </th>
                                <td class="quotaed-rtbg text-white"> {{ number_format($sales_year) }} $</td>


                            </tr>
                            <tr>

                                <th class="quotaed-lbg"> <a href="#" class="text-white"> Team </a> </th>
                                <td class="quotaed-ltbg text-white"> {{ $salesman }} </td>
                                <th class="quotaed-rbg"> <a href="sales-forecast-lost.html" class="text-white">Achieved.
                                        Rate </a>
                                </th>
                                <td class="quotaed-rtbg text-white">
                                    @if (!empty($salesYearTarget->year_target))
                                        {{ number_format(($sales_year / $salesYearTarget->year_target) * 100, 3) }} %
                                    @endif
                                </td>


                            </tr>

                        </table>
                    </div>

                </div>




                <!-- tab month menu start-->
                <ul class="nav nav-tabs mb-3 bg-dark w-75 mx-auto" role="tablist" style="border-radius: 7px;">
                    <li class="nav-item" role="presentation">
                        <a href="#js-January-tab" class="nav-link text-white js-January-tab" data-bs-toggle="tab"
                            aria-selected="true" role="tab" tabindex="-1">
                            January
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-February-tab" class="nav-link text-white js-February-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            February
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-March-tab" class="nav-link text-white js-March-tab" data-bs-toggle="tab"
                            aria-selected="false" role="March" tabindex="-1">
                            March
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-April-tab" class="nav-link text-white js-April-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            April
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-May-tab" class="nav-link text-white js-May-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            May
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-June-tab" class="nav-link text-white js-June-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            June
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-July-tab" class="nav-link text-white js-July-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            July
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-August-tab" class="nav-link text-white js-August-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            August
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-September-tab" class="nav-link text-white js-September-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            September
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-October-tab" class="nav-link text-white js-October-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            October
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-November-tab" class="nav-link text-white js-November-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            November
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#js-December-tab" class="nav-link text-white js-December-tab" data-bs-toggle="tab"
                            aria-selected="false" role="tab" tabindex="-1">
                            December
                        </a>
                    </li>
                </ul>
                <!-- tab month menu end -->



                <div class="row ">

                    <div class="tab-content table-responsive">


                        <div class="tab-pane fade js-January-tab" id="js-January-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->january_target))
                                        <tr class="text-small">
                                            <td>january</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->january_target) }} $</td>
                                            <td>{{ number_format($sales_january) }}</td>
                                            <td>{{ number_format(($sales_january / $salesYearTarget->january_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_january / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->january_target - $sales_january, 2) }}
                                                $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>


                        </div>

                        <div class="tab-pane fade js-February-tab" id="js-February-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->february_target))
                                        <tr class="text-small">
                                            <td>february</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->february_target) }} $</td>
                                            <td>{{ number_format($sales_february) }}</td>
                                            <td>{{ number_format(($sales_february / $salesYearTarget->february_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_february / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->february_target - $sales_february, 2) }}
                                                $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-March-tab" id="js-March-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:15%;">Sales Target</th>
                                        <th style="width:10%;">Total Sales</th>
                                        <th style="width:15%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:15%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->march_target))
                                        <tr class="text-small">
                                            <td>March</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->march_target) }} $</td>
                                            <td>{{ number_format($sales_march) }}</td>
                                            <td>{{ number_format(($sales_march / $salesYearTarget->march_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_march / $salesYearTarget->year_target) * 100, 3) }} %
                                            </td>
                                            <td>{{ number_format($salesYearTarget->march_target - $sales_march, 2) }} $
                                            </td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif



                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade js-April-tab" id="js-April-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->april_target))
                                        <tr class="text-small">
                                            <td>April</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->april_target) }} $</td>
                                            <td>{{ number_format($sales_april) }}</td>
                                            <td>{{ number_format(($sales_april / $salesYearTarget->april_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_april / $salesYearTarget->year_target) * 100, 3) }} %
                                            </td>
                                            <td>{{ number_format($salesYearTarget->april_target - $sales_april, 2) }} $
                                            </td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-May-tab" id="js-May-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->may_target))
                                        <tr class="text-small">
                                            <td>may</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->may_target) }} $</td>
                                            <td>{{ number_format($sales_may) }}</td>
                                            <td>{{ number_format(($sales_may / $salesYearTarget->may_target) * 100, 2) }} %
                                            </td>
                                            <td>{{ number_format(($sales_may / $salesYearTarget->year_target) * 100, 3) }} %
                                            </td>
                                            <td>{{ number_format($salesYearTarget->may_target - $sales_may, 2) }} $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-June-tab" id="js-June-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->june_target))
                                        <tr class="text-small">
                                            <td>june</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->june_target) }} $</td>
                                            <td>{{ number_format($sales_june) }}</td>
                                            <td>{{ number_format(($sales_june / $salesYearTarget->june_target) * 100, 2) }} %
                                            </td>
                                            <td>{{ number_format(($sales_june / $salesYearTarget->year_target) * 100, 3) }} %
                                            </td>
                                            <td>{{ number_format($salesYearTarget->june_target - $sales_june, 2) }} $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>


                        <div class="tab-pane fade js-July-tab" id="js-July-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->july_target))
                                        <tr class="text-small">
                                            <td>july</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->july_target) }} $</td>
                                            <td>{{ number_format($sales_july) }}</td>
                                            <td>{{ number_format(($sales_july / $salesYearTarget->july_target) * 100, 2) }} %
                                            </td>
                                            <td>{{ number_format(($sales_july / $salesYearTarget->year_target) * 100, 3) }} %
                                            </td>
                                            <td>{{ number_format($salesYearTarget->july_target - $sales_july, 2) }} $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-August-tab" id="js-August-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->august_target))
                                        <tr class="text-small">
                                            <td>august</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->august_target) }} $</td>
                                            <td>{{ number_format($sales_august) }}</td>
                                            <td>{{ number_format(($sales_august / $salesYearTarget->august_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_august / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->august_target - $sales_august, 2) }} $
                                            </td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade js-September-tab" id="js-September-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->september_target))
                                        <tr class="text-small">
                                            <td>september</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->september_target) }} $</td>
                                            <td>{{ number_format($sales_september) }}</td>
                                            <td>{{ number_format(($sales_september / $salesYearTarget->september_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_september / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->september_target - $sales_september, 2) }}
                                                $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-October-tab" id="js-October-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->october_target))
                                        <tr class="text-small">
                                            <td>october</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->october_target) }} $</td>
                                            <td>{{ number_format($sales_october) }}</td>
                                            <td>{{ number_format(($sales_october / $salesYearTarget->october_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_october / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->october_target - $sales_october, 2) }}
                                                $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-November-tab" id="js-November-tab" role="tabpanel">
                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->november_target))
                                        <tr class="text-small">
                                            <td>november</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->november_target) }} $</td>
                                            <td>{{ number_format($sales_november) }}</td>
                                            <td>{{ number_format(($sales_november / $salesYearTarget->november_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_november / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->november_target - $sales_november, 2) }}
                                                $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade js-December-tab" id="js-December-tab" role="tabpanel">

                            <table class="table table-bordered table-hovered">

                                <thead>

                                    <tr class="bg-teal text-white text-small">
                                        <th style="width:10%;">Month</th>
                                        <th style="width:10%;">Total Salesman</th>
                                        <th style="width:10%;">Sales Target</th>
                                        <th style="width:15%;">Total Sales</th>
                                        <th style="width:20%;">Monthly AchV.(%)</th>
                                        <th style="width:15%;">Yearly AchV.(%)</th>
                                        <th style="width:10%">Difficiancies</th>
                                        <th style="width:10%">Status</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @if (!empty($salesYearTarget->december_target))
                                        <tr class="text-small">
                                            <td>december</td>
                                            <td>{{ $salesman }}</td>
                                            <td>{{ number_format($salesYearTarget->december_target) }} $</td>
                                            <td>{{ number_format($sales_december) }}</td>
                                            <td>{{ number_format(($sales_december / $salesYearTarget->december_target) * 100, 2) }}
                                                %</td>
                                            <td>{{ number_format(($sales_december / $salesYearTarget->year_target) * 100, 3) }}
                                                %</td>
                                            <td>{{ number_format($salesYearTarget->december_target - $sales_december, 2) }}
                                                $</td>
                                            <td>Poor</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8"><p class="text-center mb-0">No Data Available</p></td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>


                </div>
            </div>

        </div>

    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            var currentMonth = (new Date).getMonth() + 1;
            // alert(currentMonth);
            if (currentMonth == 1) {
                // alert(currentMonth);
                $("#js-January-tab").addClass("show");
                $(".js-January-tab").addClass("active");
                // $(".js-January-tab").addClass("bg-red");
            } else if (currentMonth == 2) {
                // alert(currentMonth);
                $("#js-February-tab").addClass("show");
                $(".js-February-tab").addClass("active");
                // $(".js-February-tab").addClass("bg-red");
            } else if (currentMonth == 3) {
                $("#js-March-tab").addClass("show");
                $(".js-March-tab").addClass("active");
                // $(".js-March-tab").addClass("bg-red");
            } else if (currentMonth == 4) {
                $("#js-April-tab").addClass("show");
                $(".js-April-tab").addClass("active");
                // $(".js-April-tab").addClass("bg-red");
            } else if (currentMonth == 5) {
                $("#js-May-tab").addClass("show");
                $(".js-May-tab").addClass("active");
                // $(".js-May-tab").addClass("bg-red");
            } else if (currentMonth == 6) {
                $("#js-June-tab").addClass("show");
                $(".js-June-tab").addClass("active");
                // $(".js-June-tab").addClass("bg-red");
            } else if (currentMonth == 7) {
                $("#js-July-tab").addClass("show");
                $(".js-July-tab").addClass("active");
                // $(".js-July-tab").addClass("bg-red");
            } else if (currentMonth == 8) {
                $("#js-August-tab").addClass("show");
                $(".js-August-tab").addClass("active");
                // $(".js-August-tab").addClass("bg-red");
            } else if (currentMonth == 9) {
                $("#js-September-tab").addClass("show");
                $(".js-September-tab").addClass("active");
                // $(".js-September-tab").addClass("bg-red");
            } else if (currentMonth == 10) {
                $("#js-October-tab").addClass("show");
                $(".js-October-tab").addClass("active");
                // $(".js-October-tab").addClass("bg-red");
            } else if (currentMonth == 11) {
                $("#js-November-tab").addClass("show");
                $(".js-November-tab").addClass("active");
                // $(".js-November-tab").addClass("bg-red");
            } else if (currentMonth == 12) {
                $("#js-December-tab").addClass("show");
                $(".js-December-tab").addClass("active");
                // $(".js-December-tab").addClass("bg-red");
            }

        });
    </script>
@endpush
