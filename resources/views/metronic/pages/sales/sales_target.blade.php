<x-admin-app-layout :title="'Sales Target'">
    <div class="mb-5 row g-5">
        <div class="col-lg-12">
            <div class="border-0 shadow-none card bg-gr-b">
                <div class="flex-wrap p-2 card-body d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 h4 me-3">Summary KPIs - Sales</h2>
                    <div class="gap-5 d-flex align-items-center">
                        <select class="form-select form-select-sm" data-control="select2">
                            <option selected>Period</option>
                            <option value="Month">Month</option>
                            <option value="Quarter">Quarter</option>
                            <option value="Year">Year</option>
                        </select>
                        <select class="form-select form-select-sm" data-control="select2">
                            <option selected>Currency</option>
                            <option value="USD">USD</option>
                            <option value="BDT">BDT</option>
                            <option value="EUR">EUR</option>
                        </select>

                        <select class="form-select form-select-sm" data-control="select2">
                            <option selected>Country / Territory</option>
                            <option value="1">USA</option>
                            <option value="2">Bangladesh</option>
                        </select>

                        <select class="form-select form-select-sm" data-control="select2">
                            <option selected>Sales Team</option>
                            <option value="1">Team Alpha</option>
                            <option value="2">Team Beta</option>
                        </select>

                        <select class="form-select form-select-sm" data-control="select2">
                            <option selected>Individual</option>
                            <option value="1">Saju</option>
                            <option value="2">Rahim</option>
                        </select>

                        <select class="form-select form-select-sm" data-control="select2">
                            <option selected>Product Category</option>
                            <option value="1">Electronics</option>
                            <option value="2">Apparel</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-primary border-3 bg-gr-b">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-tag-fill kpi-icon text-primary"></i>
                    <h6 class="mb-1 card-title text-muted text-uppercase">Total Target</h6>
                    <h3 class="my-2 card-text fw-bold">$500,000</h3>
                    <div class="card-text text-muted small">Q4 Goal</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-info border-3 bg-gr-g">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-currency-dollar kpi-icon text-info"></i>
                    <h6 class="mb-1 card-title text-muted text-uppercase">Achieved Sales Value</h6>
                    <h3 class="my-2 card-text fw-bold">$485,500</h3>
                    <div class="card-text text-muted small">As of today</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-success border-3 bg-gr-b">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-graph-up-arrow kpi-icon text-success"></i>
                    <h6 class="mb-1 card-title text-muted text-uppercase">Achievement Rate (%)</h6>
                    <h3 class="my-2 card-text fw-bold text-success">97.1%</h3>
                    <div class="card-text text-muted small">On track</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-danger border-3 bg-gr-g">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-exclamation-triangle-fill kpi-icon text-danger"></i>
                    <h6 class="mb-1 card-title text-muted text-uppercase">Deficiency (Shortfall)</h6>
                    <h3 class="my-2 card-text fw-bold text-danger">-$14,500</h3>
                    <div class="card-text text-muted small">Behind target</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-warning border-3 bg-gr-b">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-lightbulb-fill kpi-icon text-warning"></i>
                    <h6 class="mb-1 card-title text-muted text-uppercase">Forecast Accuracy (%)</h6>
                    <h3 class="my-2 card-text fw-bold">92.5%</h3>
                    <div class="card-text text-muted small">Last 30 days</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="border-0 shadow-none card h-100 kpi-card border-bottom border-success border-3 bg-gr-g">
                <div class="text-center card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="mb-2 bi bi-graph-up kpi-icon text-success"></i>
                    <h6 class="mb-1 card-title text-muted text-uppercase">Growth vs Prev. Period</h6>
                    <h3 class="my-2 card-text fw-bold text-success">+5.2%</h3>
                    <div class="card-text text-muted small">Compared to Q3</div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row g-5">
        <div class="col-12">
            <div class="border-0 shadow-none card bg-gr-b">
                <div class="p-5 card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex ">
                            <div>
                                <h1 class="mb-2">Target by </h1>
                                <span>See All Target List Information</span>
                            </div>
                            <ul class="border-0 nav nav-tabs nav-line-tabs ms-10" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation" style="border-right: 2px solid black;height: 35px;">
                                    <button
                                        class="nav-link show active"
                                        id="territory-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#territory-tab-pane"
                                        type="button"
                                        role="tab"
                                        aria-controls="territory-tab-pane"
                                        aria-selected="true">
                                        Territory / Country
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link show"
                                        id="industry-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#industry-tab-pane"
                                        type="button"
                                        role="tab"
                                        aria-controls="industry-tab-pane"
                                        aria-selected="false">
                                        Industry
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <form class="d-none d-lg-block w-100 mb-lg-0 position-relative" autocomplete="off">
                                <i class="text-gray-500 fab fa-sistrix fs-2 position-absolute top-50 translate-middle-y ms-4"></i>
                                <input type="text" class="border-gray-200 form-control form-control-sm form-control-solid ps-13 fs-7 pe-3" name="search" value="" placeholder="Search..." data-kt-search-element="input">
                            </form>
                        </div>
                    </div>
                    <div class="pt-5 tab-content" id="myTabContent">
                        <div
                            class="tab-pane fade show active"
                            id="territory-tab-pane"
                            role="tabpanel"
                            aria-labelledby="territory-tab"
                            tabindex="0">
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
                                    <li class="page-item previous disabled"><a href="#" class="page-link"><i class="previous"></i></a></li>
                                    <li class="page-item "><a href="#" class="page-link">1</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                                    <li class="page-item "><a href="#" class="page-link">...</a></li>
                                    <li class="page-item "><a href="#" class="page-link">5</a></li>
                                    <li class="page-item "><a href="#" class="page-link">6</a></li>
                                    <li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="tab-pane fade"
                            id="industry-tab-pane"
                            role="tabpanel"
                            aria-labelledby="industry-tab"
                            tabindex="0">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row g-5">
        <div class="col-12">
            <div class="border-0 shadow-none card bg-gr-b">
                <div class="card-body">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h5 class="mb-3 card-title">Row 3 – Individual & Team Targets</h5>
                        <div class="card-toolbox">
                            <form class="d-none d-lg-block w-100 mb-lg-0 position-relative" autocomplete="off">
                                <i class="text-gray-500 fab fa-sistrix fs-2 position-absolute top-50 translate-middle-y ms-4"></i>
                                <input type="text" class="border-gray-200 form-control form-control-sm form-control-solid ps-13 fs-7 pe-3" name="search" value="" placeholder="Search..." data-kt-search-element="input">
                            </form>
                        </div>
                    </div>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="border-0 card h-100 modern-metric-card metric-card-bg-blue">
                <div class="p-4 card-body d-flex flex-column justify-content-between align-items-center">
                    <div class="mb-3 d-flex align-items-center justify-content-center modern-metric-icon-wrapper">
                        <i class="text-white bi bi-bullseye modern-metric-icon"></i>
                    </div>
                    <div class="text-center">
                        <div class="text-white modern-metric-value">95%</div>
                        <div class="mt-1 modern-metric-label text-white-75">Team Total Target vs Team Achieved</div>
                    </div>
                    <div class="mt-3 w-100 d-flex justify-content-center">
                        <svg width="100%" height="25" viewBox="0 0 100 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="sparkline-svg">
                            <path d="M0 20L20 5L40 10L60 0L80 15L100 10" stroke="white" stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="border-0 card h-100 modern-metric-card metric-card-bg-purple">
                <div class="p-4 card-body d-flex flex-column justify-content-between align-items-center">
                    <div class="mb-3 d-flex align-items-center justify-content-center modern-metric-icon-wrapper">
                        <i class="text-white bi bi-trophy modern-metric-icon"></i>
                    </div>
                    <div class="text-center">
                        <div class="text-white modern-metric-value">#1 S. Mehta</div>
                        <div class="mt-1 modern-metric-label text-white-75">Individual Ranking Leaderboard</div>
                    </div>
                    <div class="mt-3 w-100 d-flex justify-content-center text-white-75 small">
                        Next: A. Rahman (90%)
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="border-0 card h-100 modern-metric-card metric-card-bg-green">
                <div class="p-4 card-body d-flex flex-column justify-content-between align-items-center">
                    <div class="mb-3 d-flex align-items-center justify-content-center modern-metric-icon-wrapper">
                        <i class="text-white bi bi-people-fill modern-metric-icon"></i>
                    </div>
                    <div class="text-center">
                        <div class="text-white modern-metric-value">92%</div>
                        <div class="mt-1 modern-metric-label text-white-75">Avg. Achievement per Rep</div>
                    </div>
                    <div class="mt-3 w-100 d-flex justify-content-center">
                        <svg width="100%" height="25" viewBox="0 0 100 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="sparkline-svg">
                            <path d="M0 5L20 15L40 0L60 20L80 10L100 15" stroke="white" stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="col-12">
            <h1 class="my-3">Periodical Target Tracking</h1>
        </div>
        <div class="col-lg-4">
            <div class="border-0 shadow-none card h-100 bg-gr-g">
                <div class="card-body">
                    <h5 class="card-title">Monthly Sales vs Target (Bar Chart)</h5>
                    <div class="chart-container">
                        <div id="kt_charts_widget_2_chart" class="h-100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="border-0 shadow-none card h-100 bg-gr-b">
                <div class="card-body">
                    <h5 class="card-title">Quarterly Achievement Trend (Line Chart)</h5>
                    <div class="chart-container">
                        <div id="kt_charts_widget_28" style="min-height: 315px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="border-0 shadow-none card h-100 bg-gr-g">
                <div class="card-body">
                    <h5 class="card-title">Target vs Forecast Accuracy (Combo Chart)</h5>
                    <div class="chart-container">
                        <div id="kt_charts_widget_1_chart" class="h-100">
                            </d>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 row g-4">
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-primary ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 fa fa-globe-americas quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">USA</div>
                    <div class="mt-1 quick-stat-label">Top Performing Country</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-warning ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 fas fa-up-long quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">S. Mehta</div>
                    <div class="mt-1 quick-stat-label">Top Performing Salesperson</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-info lu">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 fas fa-box-tissue quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">Gadgets</div>
                    <div class="mt-1 quick-stat-label">Top Performing Product</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-warning ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 fas fa-down-long quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">B. Khan</div>
                    <div class="mt-1 quick-stat-label">Lowest Performer</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-warning ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 bi bi-graph-up-arrow quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">91.5%</div>
                    <div class="mt-1 quick-stat-label">Average Achievement Rate (%)</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-success ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 bi bi-funnel-fill quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">1.2x</div>
                    <div class="mt-1 quick-stat-label">Overall Pipeline to Target Ratio</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-warning ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 bi bi-calendar-range-fill quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">35 Days</div>
                    <div class="mt-1 quick-stat-label">Average Sales Cycle (Days)</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="border-4 shadow-none card h-100 quick-stat-card border-start border-success ">
                <div class="text-center card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mb-2 bi bi-graph-up quick-stat-icon text-primary"></i>
                    <div class="quick-stat-value text-primary">+8.2%</div>
                    <div class="mt-1 quick-stat-label">YoY Target Growth %</div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>