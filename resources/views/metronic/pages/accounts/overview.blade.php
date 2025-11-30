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
            <div class="col-xl-12">
                <div class="card shadow-sm">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Income vs Expense (Last 12 Months)</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="income_expense_chart" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 g-xl-8 mt-5">
            <div class="col-xl-6">
                <div class="card shadow-sm">
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
                <div class="card shadow-sm">
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
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Income vs Expense Bar Chart
            var optionsBar = {
                series: [{
                    name: 'Income',
                    data: @json($incomeData)
                }, {
                    name: 'Expense',
                    data: @json($expenseData)
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: { show: false }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: { enabled: false },
                stroke: { show: true, width: 2, colors: ['transparent'] },
                xaxis: {
                    categories: @json($months),
                },
                yaxis: { title: { text: 'Amount (BDT)' } },
                fill: { opacity: 1 },
                colors: ['#50cd89', '#f1416c'],
                tooltip: {
                    y: {
                        formatter: function (val) { return "BDT " + val }
                    }
                }
            };
            new ApexCharts(document.querySelector("#income_expense_chart"), optionsBar).render();

            // 2. Expense Category Pie Chart
            var optionsPie = {
                series: @json($catData),
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: @json($catLabels),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: { width: 200 },
                        legend: { position: 'bottom' }
                    }
                }]
            };
            new ApexCharts(document.querySelector("#expense_category_chart"), optionsPie).render();

            // 3. Income Type Donut Chart
            var optionsDonut = {
                series: @json($typeData),
                chart: {
                    width: 380,
                    type: 'donut',
                },
                labels: @json($typeLabels),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: { width: 200 },
                        legend: { position: 'bottom' }
                    }
                }]
            };
            new ApexCharts(document.querySelector("#income_type_chart"), optionsDonut).render();
        });
    </script>
    @endpush
</x-admin-app-layout>