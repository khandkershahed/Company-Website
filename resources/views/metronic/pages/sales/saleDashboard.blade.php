<x-admin-app-layout :title="'Sales Dashboard'">
    <div class="p-0 container-fluid">
        <!-- Dashboard Header & Top Bar Filters -->
        <header class="p-3 mb-4 bg-white shadow-sm rounded-3 d-flex flex-column flex-md-row justify-content-between align-items-center bg-gr-b">
            <h1 class="mb-3 h4 fw-semibold text-dark mb-md-0">Sales Dashboard</h1>

            <!-- Filters, Exchange Rate Info, Refresh, Export, Target -->
            <div class="flex-wrap gap-2 text-sm d-flex align-items-center ">
                <div class="gap-3 d-flex">
                    <!-- Filters -->
                    <select data-control="select2" id="filterCountry" class="shadow-sm form-select form-select-sm">
                        <option>Country: Bangladesh</option>
                        <option>Country: Singapore</option>
                        <option>Country: India</option>
                    </select>
                    <select data-control="select2" id="filterCurrency" class="shadow-sm form-select form-select-sm">
                        <option>Currency: TK</option>
                        <option>Currency: USD</option>
                        <option>Currency: EUR</option>
                        <option>Currency: BDT</option>
                    </select>
                    <select data-control="select2" id="filterTimePeriod" class="shadow-sm form-select form-select-sm">
                        <option>Time Period: Q1</option>
                        <option>Time Period: Q2</option>
                        <option>Time Period: Last 12 Months</option>
                    </select>
                </div>

                <!-- Actions -->
                <a href="#" class="transition btn btn-sm btn-info hover-primary d-flex align-items-center">Exchange Rate Info</a>

                <button class="transition btn btn-sm btn-warning hover-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 me-1" style="width: 1.25rem; height: 1.25rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181-3.183a8.28 8.28 0 0 0 13.973 4.359.75.75 0 0 0 .57-1.391v-.001c-2.872-4.14-7.414-7.054-12.203-7.589a10.024 10.024 0 0 0-4.375 7.02c.088 1.096-.135 2.19-.6 3.167-.282.616-.688 1.18-1.22 1.621l-.248.203a.5.5 0 0 0-.166.429c.003.111.045.205.111.282.35.39.81.659 1.305.748l.19.034a.75.75 0 0 0 .167.017c.073-.004.145-.022.215-.052z" />
                    </svg>
                    Refresh
                </button>

                <button class="transition btn btn-sm btn-primary hover-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 me-1" style="width: 1.25rem; height: 1.25rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                    Export
                </button>
            </div>
        </header>

        <!-- ROW 1: KEY PERFORMANCE INDICATORS (KPIs) -->
        <div class="mb-4 row g-4">

            <!-- KPI 1: Today's Sales / Total Sales (YTD) -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 shadow-sm card rounded-3 kpi-border-top bg-gr-g">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-black fw-bold fs-5">Today's Sales</p>
                            <p class="text-xs text-black">As of today</p>
                        </div>
                        <p class="mt-1 h3 fw-bold text-dark">45,000 TK</p>
                    </div>
                    <hr>
                    <div class="pt-4 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-black fw-bold fs-5">Total Sales (YTD)</p>
                            <p class="text-xs text-black">As of today</p>
                        </div>
                        <p class="mt-1 h3 fw-bold text-dark">5,800,000 TK</p>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Sales Target / Achievement -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 shadow-sm card rounded-3 kpi-border-top-secondary bg-gr-b">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-black fw-bold fs-5">Sales Target</p>
                            <p class="text-xs text-black">As of today</p>
                        </div>
                        <p class="mb-0 text-xs text-black">6,500,000 TK</p>
                    </div>
                    <hr>
                    <div class=" d-flex align-items-center justify-content-between">
                        <div class="flex-grow-1">
                            <p class="text-xs text-info">Sales Achievement</p>
                            <p class="fs-5 fw-semibold text-success">5,800,000 TK</p>
                        </div>
                        <!-- Mini Progress Circle -->
                        <div class="mt-0 w-25 d-flex" style="max-width: 50px; max-height: 50px;">
                            <canvas id="achievementDonut">10% Left</canvas> <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 3: RFQs Pending / Quoted -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 shadow-sm card rounded-3 kpi-border-top-warning bg-gr-g">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 fs-2 fw-medium text-primary">RFQs Pending</p>
                            <p class="text-xs text-black">01 Dec 2025</p>
                        </div>
                        <div class="text-white rounded-pill bg-primary d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">127</div>
                    </div>
                    <div class="mt-8 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 fs-2 fw-medium text-primary">RFQs Quoted</p>
                            <p class="text-xs text-black">01 Dec 2025</p>
                        </div>

                        <div class="text-white rounded-pill bg-primary d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">540</div>
                    </div>
                </div>
            </div>

            <!-- KPI 4: RFQs Quoted Value / Close Rate -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 shadow-sm card rounded-3 kpi-border-top-danger bg-gr-b">
                    <p class="mb-0 fs-2 fw-medium text-primary">RFQs Quoted Value</p>
                    <p class="mt-1 h3 fw-bold text-dark">12,500,000 TK</p>
                    <div class="mt-3 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 fs-2 fw-medium text-primary">Close Rate (Potential)</p>
                            <p class="mt-5 fs-5 fw-semibold text-danger">45%</p>
                        </div>
                        <!-- Trend Indicator -->
                        <div class="mt-5 d-flex align-items-center text-success fs-6 fw-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 me-1" style="width: 1.25rem; height: 1.25rem;">
                                <path fill-rule="evenodd" d="M10 17a.75.75 0 0 1-.75-.75V5.612L5.29 9.352a.75.75 0 0 1-1.08-1.04l5.25-5.5a.75.75 0 0 1 1.08 0l5.25 5.5a.75.75 0 0 1-1.08 1.04l-3.96-3.74V16.25c0 .414-.336.75-.75.75Z" clip-rule="evenodd" />
                            </svg>
                            +3.2%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ROW 2: SALES ANALYSIS - CHARTS -->
        <div class="mb-4 row g-4">

            <!-- Sales by Country (Interactive Map or Chart) -->
            <div class="col-12 col-lg-8">
                <div class="p-4 shadow-sm card rounded-3 bg-gr-b">
                    <h2 class="card-label fw-bold main_text_color">Sales by Country (Interactive Chart)</h2>
                    <!-- Placeholder for Interactive Map or Chart -->
                    <div class="p-3 position-relative" style="height: 300px;">
                        <canvas id="salesByCountryChart"></canvas>
                    </div>
                    <small class="mt-3 text-primary d-block">
                        Click on a bar to see individual sales data for that country.
                    </small>
                </div>
            </div>

            <!-- Sales by Product / Industry (Dynamic Donut Chart) -->
            <div class="col-12 col-lg-4">
                <div class="p-4 shadow-sm card rounded-3 bg-gr-g">
                    <h2 class="card-label fw-bold main-text-color">Sales by Product vs. Industry</h2>
                    <div class="py-5 position-relative d-flex align-items-center justify-content-center" style="height: 325px;">
                        <canvas id="productIndustryDonut"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- ROW 3: PIPELINE AND OPPORTUNITIES -->
        <div class="mb-4 row g-4">

            <!-- Sales Overview Table (RFQ → Forecast → Lost) -->
            <div class="col-12 col-lg-6">
                <div class="p-4 shadow-sm card rounded-3">

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="card-label fw-bold main_text_color">Sales Overview (Pipeline Stages)</h2>
                            <!-- Pipeline Stages Tabs -->
                            <div class="gap-3 mb-2 d-flex fw-medium">
                                <span class="pb-1 border-2 cursor-pointer text-primary border-bottom border-primary">Pipeline Stages</span>
                                <span class="text-black cursor-pointer hover-primary">Value vs Quantity</span>
                            </div>
                        </div>
                        <div>
                            <!-- Updated: Time Period Filter Buttons/Tabs -->
                            <select data-control="select2" id="filterCountry" class="shadow-sm form-select form-select-sm">
                                <option>Country: Bangladesh</option>
                                <option>Country: Singapore</option>
                                <option>Country: India</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-2 table-responsive custom-scrollbar">
                        <table class="table mb-0 table-striped table-hover ">
                            <thead class="bg-light-primary">
                                <tr class="text-black text-uppercase">
                                    <th scope="col" class="px-3 py-2 text-black text-start fw-medium">Items</th>
                                    <th scope="col" class="px-3 py-2 text-black text-start fw-medium">Qty</th>
                                    <th scope="col" class="px-3 py-2 text-black text-start fw-medium">Value</th>
                                    <th scope="col" class="px-3 py-2 text-black text-start fw-medium">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-3 py-2 ">Closed</td>
                                    <td class="px-3 py-2 ">5</td>
                                    <td class="px-3 py-2 ">5,00,000 Tk</td>
                                    <td class="px-3 py-2 text-success d-flex align-items-center">Up
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ms-1" style="width: 1rem; height: 1rem;">
                                            <path fill-rule="evenodd" d="M10 17a.75.75 0 0 1-.75-.75V5.612L5.29 9.352a.75.75 0 0 1-1.08-1.04l5.25-5.5a.75.75 0 0 1 1.08 0l5.25 5.5a.75.75 0 0 1-1.08 1.04l-3.96-3.74V16.25c0 .414-.336.75-.75.75Z" clip-rule="evenodd" />
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 ">Potentials</td>
                                    <td class="px-3 py-2 ">8</td>
                                    <td class="px-3 py-2 ">1,20,000 Tk</td>
                                    <td class="px-3 py-2 text-black ">Steady</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 ">RFQs</td>
                                    <td class="px-3 py-2 ">15</td>
                                    <td class="px-3 py-2 ">5,50,000 Tk</td>
                                    <td class="px-3 py-2 text-danger d-flex align-items-center">Down
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ms-1" style="width: 1rem; height: 1rem;">
                                            <path fill-rule="evenodd" d="M10 3a.75.75 0 0 1 .75.75v10.638l3.96-3.74a.75.75 0 1 1 1.08 1.04l-5.25 5.5a.75.75 0 0 1-1.08 0l-5.25-5.5a.75.75 0 1 1 1.08-1.04l3.96 3.74V3.75A.75.75 0 0 1 10 3Z" clip-rule="evenodd" />
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 ">Tenders</td>
                                    <td class="px-3 py-2 ">3</td>
                                    <td class="px-3 py-2 ">90,000 Tk</td>
                                    <td class="px-3 py-2 text-black ">Steady</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 ">Lost</td>
                                    <td class="px-3 py-2 ">2</td>
                                    <td class="px-3 py-2 ">15,000 Tk</td>
                                    <td class="px-3 py-2 text-black ">Steady</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Upcoming Opportunities (Sortable List) -->
            <div class="col-12 col-lg-6">
                <div class="p-4 shadow-sm card rounded-3">
                    <div class="mb-3 d-flex justify-content-between w-100">
                        <h2 class="card-label fw-bold main_text_color">Upcoming Opportunities</h2>
                        <div>
                            <select name="timezone" aria-label="Select Month" data-control="select2" data-placeholder="date_period"
                                class="form-select form-select-sm form-select-solid w-200px ms-3" data-select2-id="select2-data-1-0u1f" tabindex="-1" aria-hidden="true">
                                <option value="next" data-select2-id="select2-data-3-fosu">Short by Closing Date</option>
                                <option value="last">Within the last</option>
                                <option value="between">Between</option>
                                <option value="on">On</option>
                            </select>
                        </div>
                    </div>
                    <ul class="space-y-3 overflow-scroll overflow-y-auto list-unstyled" style="height: 205px;">
                        <li class="p-3 mb-3 transition border border-gray-100 cursor-pointer rounded-3 hover-bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 fw-medium text-dark">25112-1 (Bangladeshi-Ind...)</p>
                                <span class="badge bg-success-subtle text-success fw-semibold">High Priority (90%)</span>
                            </div>
                            <p class="mt-1 mb-0 text-black ">Company: Acme Corp</p>
                            <p class="mt-1 mb-0 text-xs text-black">Closing in 1 Week (12,000 TK)</p>
                        </li>
                        <li class="p-3 mb-3 transition border border-gray-100 cursor-pointer rounded-3 hover-bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 fw-medium text-dark">25009-1 (World Universit...)</p>
                                <span class="badge bg-primary-subtle text-primary fw-semibold">Medium Priority (65%)</span>
                            </div>
                            <p class="mt-1 mb-0 text-black ">Company: Global Ed-Tech</p>
                            <p class="mt-1 mb-0 text-xs text-black">Closing in 3 Weeks (5,000 TK)</p>
                        </li>
                        <li class="p-3 mb-3 transition border border-gray-100 cursor-pointer rounded-3 hover-bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 fw-medium text-dark">25107-1 (Bradford Space)</p>
                                <span class="badge bg-warning-subtle text-warning fw-semibold">Low Priority (30%)</span>
                            </div>
                            <p class="mt-1 mb-0 text-black ">Company: Space Logistics</p>
                            <p class="mt-1 mb-0 text-xs text-black">Closing in 5 Weeks (8,000 TK)</p>
                        </li>
                        <li class="p-3 mb-3 transition border border-gray-100 cursor-pointer rounded-3 hover-bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 fw-medium text-dark">25112-2 (Silver Network)</p>
                                <span class="badge bg-success-subtle text-success fw-semibold">High Priority (85%)</span>
                            </div>
                            <p class="mt-1 mb-0 text-black ">Company: Silver Network</p>
                            <p class="mt-1 mb-0 text-xs text-black">Closing in 2 Weeks (15,000 TK)</p>
                        </li>
                        <li class="p-3 mb-3 transition border border-gray-100 cursor-pointer rounded-3 hover-bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 fw-medium text-dark">25010-1 (ROMA ENERGY)</p>
                                <span class="badge bg-primary-subtle text-primary fw-semibold">Medium Priority (50%)</span>
                            </div>
                            <p class="mt-1 mb-0 text-black ">Company: ROMA ENERGY SUP...</p>
                            <p class="mt-1 mb-0 text-xs text-black">Closing in 4 Weeks (4,000 TK)</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ROW 4: SALES REPORTS & TRENDS -->
        <div class="row g-4">

            <!-- Sales Report Summary (Actual vs Target) - Bar Chart -->
            <div class="col-12 col-lg-6">
                <div class="p-4 shadow-sm card rounded-3">
                    <h2 class="mb-3 h5 fw-semibold text-dark">Row 4: Sales Report Summary (Actual vs Target)</h2>
                    <div class="position-relative" style="height: 320px;">
                        <canvas id="actualVsTargetBarChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Revenue Trend (Last 12 months) - Line Graph -->
            <div class="col-12 col-lg-6">
                <div class="p-4 shadow-sm card rounded-3">
                    <h2 class="mb-3 h5 fw-semibold text-dark">Revenue Trend (Last 12 Months)</h2>
                    <div class="position-relative" style="height: 320px;">
                        <canvas id="revenueTrendLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <!-- Chart.js Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- Chart Data & Colors (Hardcoded based on the Tailwind config) ---
            const primaryColor = '#4f46e5'; // Primary / Indigo
            const secondaryColor = '#10b981'; // Success / Emerald
            const dangerColor = '#ef4444'; // Danger / Red
            const warningColor = '#f59e0b'; // Warning / Amber

            // Data for Sales by Country Chart
            const salesByCountryData = {
                labels: ['Bangladesh', 'Singapore', 'India', 'USA', 'Germany'],
                datasets: [{
                    label: 'Sales Value (TK)',
                    data: [1200000, 950000, 700000, 450000, 300000],
                    backgroundColor: [primaryColor, secondaryColor, warningColor, dangerColor, '#9ca3af'],
                    borderRadius: 6,
                }]
            };

            // Data for Product/Industry Donut Chart
            const productIndustryData = {
                labels: ['Telecom (35%)', 'Manufacturing (30%)', 'Education (20%)', 'Other (15%)'],
                datasets: [{
                    data: [35, 30, 20, 15],
                    backgroundColor: [primaryColor, secondaryColor, warningColor, '#d1d5db'],
                    hoverOffset: 8
                }]
            };

            // Data for Actual vs Target Bar Chart
            const actualVsTargetData = {
                labels: ['Q1 Target', 'Q1 Actual', 'Q2 Target', 'Q2 Actual', 'Q3 Target', 'Q3 Actual'],
                datasets: [{
                        label: 'Target',
                        data: [1500000, 0, 1600000, 0, 1700000, 0],
                        backgroundColor: primaryColor + '90', // Slightly transparent primary
                        borderRadius: 6,
                    },
                    {
                        label: 'Actual',
                        data: [0, 1450000, 0, 1550000, 0, 1680000],
                        backgroundColor: secondaryColor,
                        borderRadius: 6,
                    }
                ]
            };

            // Data for Revenue Trend Line Chart
            const revenueTrendData = {
                labels: ['Dec 24', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov 25'],
                datasets: [{
                    label: 'Revenue (TK)',
                    data: [500, 650, 800, 750, 900, 1100, 1050, 1200, 1400, 1350, 1500, 1650],
                    borderColor: primaryColor,
                    backgroundColor: primaryColor + '20',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointBackgroundColor: primaryColor
                }]
            };

            // --- Chart Configurations ---

            // 1. Achievement Donut (Mini KPI)
            new Chart(document.getElementById('achievementDonut'), {
                type: 'doughnut',
                data: {
                    labels: ['Achieved', 'Remaining'],
                    datasets: [{
                        data: [89.2, 10.8], // 5,800,000 / 6,500,000 = 89.2%
                        backgroundColor: [secondaryColor, '#e5e7eb'],
                        borderWidth: 0,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    }
                }
            });

            // 2. Sales by Country Bar Chart (Row 2, Left)
            new Chart(document.getElementById('salesByCountryChart'), {
                type: 'bar',
                data: salesByCountryData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            },
                            ticks: {
                                callback: function(value) {
                                    return value / 1000 + 'K';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // 3. Product/Industry Donut Chart (Row 2, Right)
            new Chart(document.getElementById('productIndustryDonut'), {
                type: 'doughnut',
                data: productIndustryData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: false
                        }
                    },
                    cutout: '60%',
                }
            });

            // 4. Actual vs Target Bar Chart (Row 4, Left)
            new Chart(document.getElementById('actualVsTargetBarChart'), {
                type: 'bar',
                data: actualVsTargetData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            stacked: false,
                            ticks: {
                                callback: function(value) {
                                    return value / 1000 + 'K';
                                }
                            }
                        },
                        x: {
                            stacked: false
                        }
                    }
                }
            });

            // 5. Revenue Trend Line Chart (Row 4, Right)
            new Chart(document.getElementById('revenueTrendLineChart'), {
                type: 'line',
                data: revenueTrendData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                drawBorder: false
                            },
                            ticks: {
                                callback: function(value) {
                                    return value / 1000 + 'K';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-admin-app-layout>