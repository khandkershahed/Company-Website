@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <!-- Breadcrumb Links -->
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="" class="breadcrumb-item"><span class="breadcrumb-item active">Sales Dashboard</span></a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}
                <div>
                    <a href="{{ route('salesYearTarget.index') }}" class="btn navigation_btn" style="margin-right: 2px">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-users-viewfinder pe-1" style="font-size: 12px;"></i>
                            <span>Year Target</span>
                        </div>
                    </a>
                    <a href="{{route('salesTeamTarget.index')}}" class="btn navigation_btn" style="margin-right: 2px">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-bullseye pe-1" style="font-size: 12px;"></i>
                            <span>Individual Target</span>
                        </div>
                    </a>
                    <a href="{{ route('industry.index') }}" class="btn navigation_btn" style="margin-right: 2px">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-clipboard-list pe-1" style="font-size: 12px;"></i>
                            <span> Achievement Summary</span>
                        </div>
                    </a>
                    <a href="{{ route('sales-profit-loss.index') }}" class="btn navigation_btn"
                        style="margin-right: 2px">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-clipboard-check pe-1" style="font-size: 12px;"></i>
                            <span>Sales Profit Loss</span>
                        </div>
                    </a>
                    <a href="{{ route('rfqOrderStatus.index') }}" class="btn navigation_btn" style="margin-right: 2px">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-cart-flatbed pe-1" style="font-size: 12px;"></i>
                            <span>Order Status</span>
                        </div>
                    </a>
                </div>
        </section>
        <!-- /page header -->

        <!-- Sales Chain Page -->
        <div class="content pt-0">
            <div class="container-fluid ">
                <div class="row mt-2 mb-2">
                    <h1 class="m-0 text-center w-25 mx-auto text-info">Sales Dashboard</h1>
                </div>
                {{-- Extra Area --}}
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4">
                        <div class="">
                            <h6  class="m-0 p-1 text-center" style="color: #fff; border-bottom: 1px solid #247297;background: #247297;"> Sales Info</h6>
                            <div class="card rounded-0">
                                <div class="card-body rounded-0">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div>
                                                <a href="http://127.0.0.1:8000/admin/expense">
                                                    <h6 class="mb-0 text-black">Total Sales</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="http://127.0.0.1:8000/admin/expense" class="text-muted"> 5,000TK</span></a>
                                                    <i class="ph-trend-down me-2 text-danger"></i>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg
                                                        bg-secondary dashboard_btn chart_btn"
                                                        style="width: 30px; height: 30px; font-size: 14px;">
                                                        <span class="mb-0">18%</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="bg-light" data-bs-toggle="modal" data-bs-target="#chart1" style="cursor: pointer;">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2 text-info">Current Month <span class="text-black">(Jan)</span></p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-info small-font-size m-0 p-1">QTY</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-info small-font-size m-0 p-1">Target</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-info small-font-size m-0 p-1">Achiev</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-end text-info small-font-size m-0 pe-2 p-1">Ration</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Solution --}}
                                        <div class="">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Sales Solution</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">20</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">5</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">15^</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-down pe-1 text-danger"></i>18%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Web --}}
                                        <div class="bg-light" data-bs-toggle="modal" data-bs-target="#chart1" style="cursor: pointer;">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Sales Web</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">20</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">5</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">15^</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-up pe-1 text-succsess"></i>23%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Training --}}
                                        <div class="">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Sales Training</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">20</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">5</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">15^</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-up pe-1 text-succsess"></i>18%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Software development --}}
                                        <div class="bg-light" data-bs-toggle="modal" data-bs-target="#chart1" style="cursor: pointer;">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Sales Development</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">20</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">5</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">15^</p>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-down pe-1 text-danger"></i>22%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Chart --}}
                    <div class="col-lg-4">
                        <h6 class="m-0 p-1 text-center"
                            style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Monthly Salses Query
                        </h6>
                        <div class="chart-container">
                            <canvas class="chartjs-line-chart"></canvas>
                        </div>
                    </div>
                    <!-- RFQ Details Section -->
                    <div class="col-lg-4">
                        <div class="">
                            <h6  class="m-0 p-1 text-center" style="color: #fff; border-bottom: 1px solid #247297;background: #247297;">Client RFQ</h6>
                            <div class="card rounded-0">
                                <div class="card-body rounded-0">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div>
                                                <a href="http://127.0.0.1:8000/admin/expense">
                                                    <h6 class="mb-0 text-black">Total RFQ</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="http://127.0.0.1:8000/admin/expense" class="text-muted"> 58%</span></a>
                                                    <i class="ph-trend-up me-2 text-success"></i>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn rounded-circle p-3 text-white shadow-lg
                                                        bg-secondary dashboard_btn chart_btn"
                                                        style="width: 30px; height: 30px; font-size: 14px;">
                                                        <span class="mb-0">88%</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="bg-light">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2 text-info">Current Month <span class="text-black">(Jan)</span></p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-info small-font-size m-0 p-1">Pending</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-info small-font-size m-0 p-1">Done</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-end text-info small-font-size m-0 p-1">Win/Lose</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Solution --}}
                                        <div class="">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Total RFQ</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">{{ App\Models\Admin\Rfq::where('rfq_type', 'rfq')->count() }}</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">{{ App\Models\Admin\Rfq::where('rfq_type', 'rfq')->whereMonth('create_date', Carbon\Carbon::now()->month)->count() }}</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-up pe-1 text-succsess"></i>100%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Web --}}
                                        <div class="bg-light">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Total Deals</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">{{ App\Models\Admin\Rfq::where('rfq_type', 'deal')->whereMonth('create_date', Carbon\Carbon::now()->month)->count() }}</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1"> {{ App\Models\Admin\Rfq::where('rfq_type', 'deal')->count() }}</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-down pe-1 text-danger"></i>125%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales Training --}}
                                        <div class="pb-4">
                                            <div class="box_details">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <p class="m-0 ps-2">Close By</p>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">5</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-center text-secondary small-font-size m-0 p-1">4</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="text-end text-secondary small-font-size m-0 pe-2 p-1"><i class="ph ph-arrow-down pe-1 text-danger"></i>165%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="chart1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header px-3 py-2">
                <h5 class="modal-title m-0" id="modalTitleId">
                    Sales Query
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chart-container">
                                <canvas class="chartjs-line-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @push('scripts')
    <script>
        // Chart data
        var data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ],
            datasets: [{
                    label: 'Target',
                    data: [10, 15, 20, 25, 30, 35, 40, 45, 40, 35, 30, 25],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false,
                    pointStyle: 'rect', // Point style for Data 1
                    pointRadius: 6,
                    pointBackgroundColor: 'rgba(255, 99, 132, 0.7)', // Color of the point for Data 1
                    pointBorderColor: 'rgba(255, 99, 132, 1)', // Border color of the point for Data 1
                    pointBorderWidth: 1 // Border width of the point for Data 1
                },
                {
                    label: 'Achievement',
                    data: [30, 40, 50, 60, 70, 80, 90, 100, 90, 80, 70, 60],
                    borderColor: 'rgba(255, 206, 86, 1)', // Change color for 'Ratio'
                    borderWidth: 2,
                    fill: false,
                    pointStyle: 'rect', // Point style for Data 2
                    pointRadius: 6,
                    pointBackgroundColor: 'rgba(255, 206, 86, 0.7)', // Color of the point for Data 2
                    pointBorderColor: 'rgba(255, 206, 86, 1)', // Border color of the point for Data 2
                    pointBorderWidth: 1 // Border width of the point for Data 2
                }
            ]
        };

        // Chart configuration
        var config = {
            type: 'bar', // Change chart type to 'bar'
            data: data,
            options: {
                scales: {
                    x: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Months'
                        },
                        ticks: {
                            beginAtZero: false
                        }
                    }],
                    y: [{
                        type: 'linear',
                        position: 'left'
                    }]
                }
            }
        };

        // Chart initialization code using Chart.js
        document.addEventListener('DOMContentLoaded', function() {
            var chartContainers = document.getElementsByClassName('chartjs-line-chart');

            for (var i = 0; i < chartContainers.length; i++) {
                var ctx = chartContainers[i].getContext('2d');
                new Chart(ctx, config);
            }
        });
    </script>
@endpush
