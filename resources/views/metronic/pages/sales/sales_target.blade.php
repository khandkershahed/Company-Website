<x-admin-app-layout :title="'Sales Target'">
    <div class="mb-5 row g-5">
        <div class="col-lg-12">
            <div class="border-0 shadow-none card bg-gr-b">
                <div class="flex-wrap p-2 card-body d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 h4 me-3">Summary KPIs - Sales</h2>
                    <div class="gap-5 d-flex align-items-center">
                        <select class="form-select form-select-solid form-select-sm" data-control="select2">
                            <option selected>Period</option>
                            <option value="Month">Month</option>
                            <option value="Quarter">Quarter</option>
                            <option value="Year">Year</option>
                        </select>

                        <select class="form-select form-select-solid form-select-sm" data-control="select2">
                            <option selected>Territory</option>
                            <option value="1">USA</option>
                            <option value="2">Bangladesh</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-primary border-3" style="background-color: #296088;">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 text-white bi bi-tag-fill kpi-icon"></i>
                    <h6 class="mb-1 text-white card-title text-uppercase">Total Target</h6>
                    <h3 class="my-2 text-white card-text fw-bold">$500,000</h3>
                    <div class="text-white card-text small">Q4 Goal</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-info border-3" style="background-color: #FFCD94;">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 text-black bi bi-currency-dollar kpi-icon"></i>
                    <h6 class="mb-1 text-black card-title text-uppercase">Achieved Sales Value</h6>
                    <h3 class="my-2 text-black card-text fw-bold">$485,500</h3>
                    <div class="text-black card-text small">As of today</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 border-black shadow-none card h-100 kpi-card border-bottom border-3" style="background-color: #CFC4FF;">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 text-black bi bi-graph-up-arrow kpi-icon"></i>
                    <h6 class="mb-1 text-black card-title text-uppercase">Achievement Rate (%)</h6>
                    <h3 class="my-2 text-black card-text fw-bold">97.1%</h3>
                    <div class="text-black card-text small">On track</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-danger border-3 bg-gr-g">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-exclamation-triangle-fill kpi-icon text-danger"></i>
                    <h6 class="mb-1 text-black fw-bold card-title text-uppercase">Deficiency (Shortfall)</h6>
                    <h3 class="my-2 card-text fw-bold text-danger">-$14,500</h3>
                    <div class="card-text text-muted small">Behind target</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-warning border-3 bg-gr-b">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-lightbulb-fill kpi-icon text-warning"></i>
                    <h6 class="mb-1 text-black fw-bold card-title text-uppercase">Forecast Accuracy (%)</h6>
                    <h3 class="my-2 card-text fw-bold">92.5%</h3>
                    <div class="card-text text-muted small">Last 30 days</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-success border-3 bg-gr-g">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-graph-up kpi-icon text-success"></i>
                    <h6 class="mb-1 text-black fw-bold card-title text-uppercase">Growth vs Prev. Period</h6>
                    <h3 class="my-2 card-text fw-bold text-success">+5.2%</h3>
                    <div class="card-text text-muted small">Compared to Q3</div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row g-5" style="overflow: hidden;">
        <div class="col-12">
            <div class="border-0 shadow-none card bg-gr-b">
                <div class="p-5 card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div>
                                <h1 class="mb-2">Target by </h1>
                                <span class="text-gray-600">See All Target List Information</span>
                            </div>

                            <ul class="border-0 nav nav-tabs ms-10" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="py-0 nav-link active"
                                        id="territory-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#territory-tab-pane"
                                        type="button"
                                        role="tab"
                                        style="border-right: 2px solid black !important;border-radius: 0;">
                                        Territory
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="py-0 nav-link"
                                        id="industry-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#industry-tab-pane"
                                        type="button"
                                        role="tab"
                                        style="border-right: 2px solid black !important;border-radius: 0;">
                                        Industry
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="py-0 nav-link"
                                        id="individual-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#individual-tab-pane"
                                        type="button"
                                        role="tab">
                                        Individual
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="gap-3 d-flex">
                            <form class="d-none d-lg-block w-100 mb-lg-0 position-relative" autocomplete="off">
                                <i class="text-gray-500 fab fa-sistrix fs-2 position-absolute top-50 translate-middle-y ms-4"></i>
                                <input type="text"
                                    class="border-gray-200 form-control form-control-sm form-control-solid ps-13 fs-7 pe-3"
                                    placeholder="Search...">
                            </form>

                            <div class="gap-3 d-flex">
                                <!-- Industry Filter -->
                                <select class="form-select form-select-solid form-select-sm w-100" data-control="select2">
                                    <option selected>Industry</option>
                                    <option value="it">Information Technology</option>
                                    <option value="finance">Finance & Banking</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="education">Education</option>
                                    <option value="retail">Retail & E-Commerce</option>
                                    <option value="manufacturing">Manufacturing</option>
                                </select>

                                <!-- Solution Filter -->
                                <select class="form-select form-select-solid form-select-sm w-100" data-control="select2">
                                    <option selected>Solution</option>
                                    <option value="crm">CRM Software</option>
                                    <option value="erp">ERP System</option>
                                    <option value="pos">POS Management</option>
                                    <option value="hrm">HRM Solution</option>
                                    <option value="inventory">Inventory System</option>
                                    <option value="ecommerce">E-Commerce Platform</option>
                                </select>

                                <!-- Salesman Filter -->
                                <select class="form-select form-select-solid form-select-sm w-100" data-control="select2">
                                    <option selected>Salesman</option>
                                    <option value="rahim">Rahim Uddin</option>
                                    <option value="karim">Karim Ahmed</option>
                                    <option value="nadia">Nadia Hasan</option>
                                    <option value="sabbir">Sabbir Chowdhury</option>
                                    <option value="tahmid">Tahmid Alam</option>
                                    <option value="tania">Tania Akter</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- TAB CONTENT START -->
                    <div class="pt-5 tab-content" id="myTabContent">

                        <!-- Territory TAB -->
                        <div class="tab-pane fade show active"
                            id="territory-tab-pane"
                            role="tabpanel">

                            <!-- Territory contents here (unchanged) -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <div class="rounded-3 table-responsive">
                                            <table class="table align-middle border table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="ps-5">Sl</th>
                                                        <th scope="col">Country</th>
                                                        <th scope="col">Quarterly Target</th>
                                                        <th scope="col">Achieved</th>
                                                        <th scope="col">Achievement (%)</th>
                                                        <th scope="col">Variance</th>
                                                        <th scope="col" class="pe-5">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border">
                                                        <td class="ps-5">1</td>
                                                        <td>Bangladesh</td>
                                                        <td>$250 K</td>
                                                        <td>$215 K</td>
                                                        <td>86%</td>
                                                        <td class="text-danger">- 35 K</td>
                                                        <td>
                                                            <span class="status-dot bg-warning"></span> On Track
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">2</td>
                                                        <td>Singapore</td>
                                                        <td>$300 K</td>
                                                        <td>$330 K</td>
                                                        <td>110%</td>
                                                        <td class="text-success">+ 35 K</td>
                                                        <td>
                                                            <span class="status-dot bg-success"></span> Achieved
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">1</td>
                                                        <td>Bangladesh</td>
                                                        <td>$250 K</td>
                                                        <td>$215 K</td>
                                                        <td>86%</td>
                                                        <td class="text-danger">- 35 K</td>
                                                        <td>
                                                            <span class="status-dot bg-warning"></span> On Track
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">2</td>
                                                        <td>Singapore</td>
                                                        <td>$300 K</td>
                                                        <td>$330 K</td>
                                                        <td>110%</td>
                                                        <td class="text-success">+ 35 K</td>
                                                        <td>
                                                            <span class="status-dot bg-success"></span> Achieved
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">1</td>
                                                        <td>Bangladesh</td>
                                                        <td>$250 K</td>
                                                        <td>$215 K</td>
                                                        <td>86%</td>
                                                        <td class="text-danger">- 35 K</td>
                                                        <td>
                                                            <span class="status-dot bg-warning"></span> On Track
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">2</td>
                                                        <td>Singapore</td>
                                                        <td>$300 K</td>
                                                        <td>$330 K</td>
                                                        <td>110%</td>
                                                        <td class="text-success">+ 35 K</td>
                                                        <td>
                                                            <span class="status-dot bg-success"></span> Achieved
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Pagination For Table-->
                                        <div class="d-flex justify-content-end">
                                            <ul class="pagination">
                                                <li class="page-item previous disabled">
                                                    <a href="#" class="page-link"><i class="previous"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">...</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">5</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">6</a>
                                                </li>
                                                <li class="page-item next">
                                                    <a href="#" class="page-link"><i class="next"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <h5 class="card-title">Territory Information</h5>
                                        <div class="chart-container">
                                            <div id="kt_charts_widget_2_chart" class="h-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Industry TAB -->
                        <div class="tab-pane fade"
                            id="industry-tab-pane"
                            role="tabpanel">

                            <!-- Industry contents here (unchanged) -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <div class="rounded-3 table-responsive">
                                            <table class="table align-middle border table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="ps-5">Sl</th>
                                                        <th scope="col">Industry Segment</th>
                                                        <th scope="col">Target</th>
                                                        <th scope="col">Achieved</th>
                                                        <th scope="col" class="pe-5">Achievement % Trend</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border">
                                                        <td class="ps-5">1</td>
                                                        <td>Telecom</td>
                                                        <td>$200 K</td>
                                                        <td>$210 K</td>
                                                        <td>
                                                            105% <i class="bi bi-graph-up text-success ps-3"></i>
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">2</td>
                                                        <td>Manufacturing</td>
                                                        <td>$180 K</td>
                                                        <td>$120 K</td>
                                                        <td>
                                                            67% <i class="bi bi-graph-down text-danger ps-3"></i>
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">3</td>
                                                        <td>Education</td>
                                                        <td>$90 K</td>
                                                        <td>$80 K</td>
                                                        <td>
                                                            89%
                                                            <i
                                                                class="bi bi-arrow-up-right-square text-primary ps-3"></i>
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">1</td>
                                                        <td>Telecom</td>
                                                        <td>$200 K</td>
                                                        <td>$210 K</td>
                                                        <td>
                                                            105% <i class="bi bi-graph-up text-success ps-3"></i>
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">2</td>
                                                        <td>Manufacturing</td>
                                                        <td>$180 K</td>
                                                        <td>$120 K</td>
                                                        <td>
                                                            67% <i class="bi bi-graph-down text-danger ps-3"></i>
                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td class="ps-5">3</td>
                                                        <td>Education</td>
                                                        <td>$90 K</td>
                                                        <td>$80 K</td>
                                                        <td>
                                                            89%
                                                            <i
                                                                class="bi bi-arrow-up-right-square text-primary ps-3"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <ul class="pagination">
                                                <li class="page-item previous disabled">
                                                    <a href="#" class="page-link"><i class="previous"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">...</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">5</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">6</a>
                                                </li>
                                                <li class="page-item next">
                                                    <a href="#" class="page-link"><i class="next"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <h5 class="card-title">Industry Information</h5>
                                        <div class="chart-container">
                                            <div id="kt_charts_widget_3" data-kt-chart-color="primary" class="h-300px"  style="min-height: 350px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Individual TAB -->
                        <div class="tab-pane fade"
                            id="individual-tab-pane"
                            role="tabpanel">
                            <!-- Individual contents here (unchanged) -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="rounded-3 table-responsive">
                                        <table class="table align-middle border table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="ps-5">Sl</th>
                                                    <th scope="col">Salesperson</th>
                                                    <th scope="col">Team</th>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Target</th>
                                                    <th scope="col">Achieved</th>
                                                    <th scope="col">Achievement %</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border">
                                                    <td class="ps-5">1</td>
                                                    <td>A. Rahman</td>
                                                    <td>Corporate Team</td>
                                                    <td>Bangladesh</td>
                                                    <td>$80 K</td>
                                                    <td>$60 K</td>
                                                    <td>75%</td>
                                                    <td>
                                                        <span class="status-dot bg-warning"></span> On Track
                                                    </td>
                                                </tr>
                                                <tr class="border">
                                                    <td class="ps-5">2</td>
                                                    <td>S. Mehta</td>
                                                    <td>APAC Team</td>
                                                    <td>Singapore</td>
                                                    <td>$100 K</td>
                                                    <td>$115 K</td>
                                                    <td>115%</td>
                                                    <td>
                                                        <span class="status-dot bg-success"></span> Achieved
                                                    </td>
                                                </tr>
                                                <tr class="border">
                                                    <td class="ps-5">1</td>
                                                    <td>A. Rahman</td>
                                                    <td>Corporate Team</td>
                                                    <td>Bangladesh</td>
                                                    <td>$80 K</td>
                                                    <td>$60 K</td>
                                                    <td>75%</td>
                                                    <td>
                                                        <span class="status-dot bg-warning"></span> On Track
                                                    </td>
                                                </tr>
                                                <tr class="border">
                                                    <td class="ps-5">2</td>
                                                    <td>S. Mehta</td>
                                                    <td>APAC Team</td>
                                                    <td>Singapore</td>
                                                    <td>$100 K</td>
                                                    <td>$115 K</td>
                                                    <td>115%</td>
                                                    <td>
                                                        <span class="status-dot bg-success"></span> Achieved
                                                    </td>
                                                </tr>
                                                <tr class="border">
                                                    <td class="ps-5">1</td>
                                                    <td>A. Rahman</td>
                                                    <td>Corporate Team</td>
                                                    <td>Bangladesh</td>
                                                    <td>$80 K</td>
                                                    <td>$60 K</td>
                                                    <td>75%</td>
                                                    <td>
                                                        <span class="status-dot bg-warning"></span> On Track
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="pagination">
                                            <li class="page-item previous disabled">
                                                <a href="#" class="page-link"><i class="previous"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">...</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">6</a>
                                            </li>
                                            <li class="page-item next">
                                                <a href="#" class="page-link"><i class="next"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex justify-content-between flex-column">
                                        <div class="flex-wrap gap-5 mb-10 d-flex d-grid">
                                            <div
                                                class="border-gray-300 border-end-dashed border-end pe-xxl-7 me-xxl-5">
                                                <div class="mb-2 d-flex">
                                                    <span class="text-gray-500 fs-4 fw-semibold me-1">$</span>
                                                    <span class="text-gray-800 fs-2hx fw-bold me-2 lh-1 ls-n2">8,035</span>
                                                </div>

                                                <span class="text-gray-500 fs-6 fw-semibold">Product</span>
                                            </div>

                                            <div class="m-0">
                                                <div class="mb-2 d-flex align-items-center">
                                                    <span class="text-gray-500 fs-4 fw-semibold align-self-start me-1">$</span>

                                                    <span class="text-gray-800 fs-2hx fw-bold me-2 lh-1 ls-n2">4,684</span>

                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>
                                                        4.5%
                                                    </span>
                                                </div>

                                                <span class="text-gray-500 fs-6 fw-semibold">Solution</span>
                                            </div>
                                        </div>

                                        <div id="kt_charts_widget_30_chart" class="w-100 h-200px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card quick-stat-card border-start border-info bg-gr-b">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 fa fa-globe-americas quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">USA</div>
                    <div class="mt-1 quick-stat-label">Top Performing Country</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card quick-stat-card border-start border-success bg-gr-g">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 fas fa-up-long quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">#1 S. Mehta</div>
                    <div class="text-primary">Individual Ranking Leaderboard</div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card quick-stat-card border-start border-primary bg-gr-b">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <svg width="100%" height="25" viewBox="0 0 100 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="sparkline-svg">
                        <path d="M0 5L20 15L40 0L60 20L80 10L100 15" stroke="black" stroke-width="2" />
                    </svg>
                    <div class="quick-stat-value text-primary">95%</div>
                    <div class="text-primary">Team Total Target
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card quick-stat-card border-start border-secondary lu bg-gr-g">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <svg width="100%" height="25" viewBox="0 0 100 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="sparkline-svg">
                        <path d="M0 20L20 5L40 10L60 0L80 15L100 10" stroke="black" stroke-width="2" />
                    </svg>
                    <div class="quick-stat-value text-primary">92%</div>
                    <div class="text-primary">Achievement Target</div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>