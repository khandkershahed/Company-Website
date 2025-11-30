<x-admin-app-layout :title="'Accounts Overview'">
    <div class="container-xl">
        
        <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
            <div class="col-xl-4">
                <div class="card bg-light-success card-xl-stretch mb-xl-8">
                    <div class="card-body my-3">
                        <span class="fw-bold fs-2 text-gray-800 d-block lh-1 mb-2">Total Income</span>
                        <div class="d-flex align-items-center">
                            <span class="fw-bold fs-3x text-gray-800 me-2">{{ number_format($totalIncome, 2) }}</span>
                            <span class="fw-bold fs-4 text-success">BDT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card bg-light-danger card-xl-stretch mb-xl-8">
                    <div class="card-body my-3">
                        <span class="fw-bold fs-2 text-gray-800 d-block lh-1 mb-2">Total Expense</span>
                        <div class="d-flex align-items-center">
                            <span class="fw-bold fs-3x text-gray-800 me-2">{{ number_format($totalExpense, 2) }}</span>
                            <span class="fw-bold fs-4 text-danger">BDT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card {{ $netProfit >= 0 ? 'bg-light-primary' : 'bg-light-warning' }} card-xl-stretch mb-xl-8">
                    <div class="card-body my-3">
                        <span class="fw-bold fs-2 text-gray-800 d-block lh-1 mb-2">Net Profit</span>
                        <div class="d-flex align-items-center">
                            <span class="fw-bold fs-3x text-gray-800 me-2">{{ number_format($netProfit, 2) }}</span>
                            <span class="fw-bold fs-4 {{ $netProfit >= 0 ? 'text-primary' : 'text-warning' }}">BDT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 g-xl-8">
            <div class="col-xl-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Income vs Expense</span>
                            <span class="text-muted fw-semibold fs-7">Monthly Comparison</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="income_expense_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Net Profit Trend</span>
                            <span class="text-muted fw-semibold fs-7">Last 12 Months Performance</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="profit_trend_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 g-xl-8 mt-5">
            <div class="col-xl-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Expense Breakdown</span>
                            <span class="text-muted fw-semibold fs-7">By Category</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="expense_category_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Income Sources</span>
                            <span class="text-muted fw-semibold fs-7">By Type</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="income_type_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 g-xl-8 mt-5">
            <div class="col-xl-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Top 5 Clients</span>
                            <span class="text-muted fw-semibold fs-7">By Revenue</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="top_clients_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Top 5 Expenses</span>
                            <span class="text-muted fw-semibold fs-7">By Expense Type</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="top_expenses_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof ApexCharts === 'undefined') {
                console.error('ApexCharts not loaded.');
                return;
            }

            const months = @json($months);
            const formatter = (val) => "BDT " + val.toLocaleString("en-US");

            // 1. Income vs Expense Bar Chart
            if (document.querySelector("#income_expense_chart")) {
                new ApexCharts(document.querySelector("#income_expense_chart"), {
                    series: [
                        { name: 'Income', data: @json($incomeData) }, 
                        { name: 'Expense', data: @json($expenseData) }
                    ],
                    chart: { type: 'bar', height: 350, toolbar: { show: false }, fontFamily: 'inherit' },
                    plotOptions: { bar: { horizontal: false, columnWidth: '55%', borderRadius: 4 } },
                    dataLabels: { enabled: false },
                    stroke: { show: true, width: 2, colors: ['transparent'] },
                    xaxis: { categories: months, axisBorder: {show:false}, axisTicks: {show:false} },
                    colors: ['#50cd89', '#f1416c'],
                    tooltip: { y: { formatter: formatter } }
                }).render();
            }

            // 2. Net Profit Trend Area Chart (NEW)
            if (document.querySelector("#profit_trend_chart")) {
                new ApexCharts(document.querySelector("#profit_trend_chart"), {
                    series: [{ name: 'Net Profit', data: @json($netProfitData) }],
                    chart: { type: 'area', height: 350, toolbar: { show: false }, fontFamily: 'inherit' },
                    dataLabels: { enabled: false },
                    stroke: { curve: 'smooth', width: 2 },
                    xaxis: { categories: months, axisBorder: {show:false}, axisTicks: {show:false} },
                    colors: ['#7239ea'],
                    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.3, stops: [0, 90, 100] } },
                    tooltip: { y: { formatter: formatter } }
                }).render();
            }

            // 3. Expense Breakdown Pie Chart
            const catData = @json($catData);
            if (document.querySelector("#expense_category_chart") && catData.length > 0) {
                new ApexCharts(document.querySelector("#expense_category_chart"), {
                    series: catData,
                    chart: { width: '100%', height: 350, type: 'pie', fontFamily: 'inherit' },
                    labels: @json($catLabels),
                    legend: { position: 'bottom' },
                    colors: ['#009ef7', '#50cd89', '#f1416c', '#ffc700', '#7239ea'],
                    tooltip: { y: { formatter: formatter } }
                }).render();
            } else if(document.querySelector("#expense_category_chart")) {
                document.querySelector("#expense_category_chart").innerHTML = "<div class='d-flex flex-center h-100 text-muted'>No Data</div>";
            }

            // 4. Income Sources Donut Chart
            const typeData = @json($typeData);
            if (document.querySelector("#income_type_chart") && typeData.length > 0) {
                new ApexCharts(document.querySelector("#income_type_chart"), {
                    series: typeData,
                    chart: { width: '100%', height: 350, type: 'donut', fontFamily: 'inherit' },
                    labels: @json($typeLabels),
                    colors: ['#f1416c', '#009ef7', '#ffc700', '#50cd89'],
                    legend: { position: 'bottom' },
                    tooltip: { y: { formatter: formatter } }
                }).render();
            } else if(document.querySelector("#income_type_chart")) {
                document.querySelector("#income_type_chart").innerHTML = "<div class='d-flex flex-center h-100 text-muted'>No Data</div>";
            }

            // 5. Top 5 Clients Horizontal Bar Chart (NEW)
            const clientData = @json($clientData);
            if (document.querySelector("#top_clients_chart") && clientData.length > 0) {
                new ApexCharts(document.querySelector("#top_clients_chart"), {
                    series: [{ name: 'Revenue', data: clientData }],
                    chart: { type: 'bar', height: 350, toolbar: { show: false }, fontFamily: 'inherit' },
                    plotOptions: { bar: { horizontal: true, borderRadius: 4, barHeight: '50%' } },
                    dataLabels: { enabled: false },
                    xaxis: { categories: @json($clientLabels) },
                    colors: ['#009ef7'],
                    tooltip: { y: { formatter: formatter } }
                }).render();
            } else if(document.querySelector("#top_clients_chart")) {
                document.querySelector("#top_clients_chart").innerHTML = "<div class='d-flex flex-center h-100 text-muted'>No Data</div>";
            }

            // 6. Top 5 Expenses Horizontal Bar Chart (NEW)
            const expTypeData = @json($topExpData);
            if (document.querySelector("#top_expenses_chart") && expTypeData.length > 0) {
                new ApexCharts(document.querySelector("#top_expenses_chart"), {
                    series: [{ name: 'Cost', data: expTypeData }],
                    chart: { type: 'bar', height: 350, toolbar: { show: false }, fontFamily: 'inherit' },
                    plotOptions: { bar: { horizontal: true, borderRadius: 4, barHeight: '50%' } },
                    dataLabels: { enabled: false },
                    xaxis: { categories: @json($topExpLabels) },
                    colors: ['#f1416c'],
                    tooltip: { y: { formatter: formatter } }
                }).render();
            } else if(document.querySelector("#top_expenses_chart")) {
                document.querySelector("#top_expenses_chart").innerHTML = "<div class='d-flex flex-center h-100 text-muted'>No Data</div>";
            }
        });
    </script>
    @endpush
</x-admin-app-layout>