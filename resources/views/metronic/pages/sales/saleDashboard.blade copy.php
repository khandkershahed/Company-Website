<x-admin-app-layout :title="'Sales Dashboard'">
    <div class="px-0 container-fluid">
        <div class="row">
            <div class="col-xl-4 ps-0">
                <a href="#" class="text-decoration-none">
                    <div class="shadow-none card card-flush card-rounded">
                        <div class="p-10 card-body px-15">
                            <div class="d-flex flex-stack justify-content-between">
                                <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                    <div class="flex-grow-1">
                                        <p class="mb-0 text-black fw-bold" style="font-size: 20px;">
                                            Today’s Sales
                                        </p>
                                        <span
                                            class="pt-1 text-gray-500 fw-semibold d-block fs-6">{{ date('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="flex-column d-flex w-50">
                                    <div class="d-flex align-items-center justify-content-between pe-3">
                                        <span class="text-gray-500 fw-semibold"></span>
                                        <span
                                            class="px-2 ms-3 rounded-2 fs-1 fw-bold">${{ number_format($todaySales, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex flex-stack justify-content-between">
                                <div class="d-flex align-items-center w-50 rounded-3">
                                    <div class="flex-grow-1">
                                        <p class="mb-0 text-black fw-bold" style="font-size: 20px;">
                                            Total Sales
                                        </p>
                                        <span
                                            class="pt-1 text-gray-500 fw-semibold d-block fs-6">FY{{ date('Y') }}</span>
                                    </div>
                                </div>
                                <div class="flex-column d-flex w-50">
                                    <div class="d-flex align-items-center justify-content-between pe-3">
                                        <span class="text-gray-500 fw-semibold"></span>
                                        <span
                                            class="px-2 ms-3 rounded-2 fs-1 fw-bold">${{ number_format($currentYearSales, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="#" class="text-decoration-none">
                    <div class="shadow-none card card-flush card-rounded">
                        <div class="p-15 card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-9">
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <i class="bi bi-crosshair fs-1 text-primary"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">Target</span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span class="px-2 text-black ms-3 rounded-2 fs-1">$100k</span>
                                                {{-- Hardcoded Target --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <i class="bi bi-graph-up-arrow fs-1 text-success"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">Achievement</span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span
                                                    class="px-2 text-black ms-3 rounded-2 fs-1">${{ number_format($currentYearSales, 0) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex justify-content-end">
                                    <div class="w-70px h-70px rounded-circle d-flex justify-content-center align-items-center"
                                        style="background-color: #296088;">
                                        {{-- Calculate simple percentage --}}
                                        <p class="mb-0 text-white">
                                            {{ number_format(($currentYearSales / 100000) * 100, 0) }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4">
                <a href="{{ route('admin.rfq.index') }}" class="text-decoration-none">
                    <div class="shadow-none card card-flush card-rounded">
                        <div class="p-15 card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    {{-- Pending RFQs --}}
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <i class="bi bi-hourglass-split fs-1 text-warning"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">RFQ’s Pending</span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span
                                                    class="px-2 text-black ms-3 rounded-2 fs-1">{{ $pendings->count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Quoted RFQs --}}
                                    <div class="d-flex flex-stack justify-content-between">
                                        <div class="d-flex align-items-center me-3 w-50 rounded-3">
                                            <span class="p-3 rounded-3 me-3">
                                                <i class="bi bi-file-earmark-check fs-1 text-info"></i>
                                            </span>
                                            <div class="flex-grow-1">
                                                <span class="text-black w-100 fs-6">Quoted RFQs</span>
                                            </div>
                                        </div>
                                        <div class="flex-column d-flex w-50">
                                            <div class="d-flex align-items-center justify-content-between pe-3">
                                                <span
                                                    class="px-2 text-black ms-3 rounded-2 fs-1">{{ $quoteds->count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="mt-5 row">

            <div class="col-xl-4 ps-0">
                <div class="shadow-none card card-flush card-rounded h-100">
                    <div class="px-12 pt-8 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold main_text_color">Sales Overview</span>
                        </h3>
                    </div>
                    <div class="px-8 card-header align-items-center">
                        <ul class="border-0 nav nav-tabs nav-line-tabs fs-6 align-items-center">
                            <li class="nav-item">
                                <a class="bg-transparent border-0 nav-link active"
                                    style="border: 0; color: #296088 !important;" data-bs-toggle="tab"
                                    href="#currentMonthSales">Current Month</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-5 card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="currentMonthSales" role="tabpanel">
                                <div class="border table-responsive rounded-4">
                                    <table class="table my-0 align-middle table-row-dashed table-borderd gs-0 gy-3">
                                        <thead class="bg-light">
                                            <tr class="text-gray-500 fs-7 fw-bold">
                                                <th class="text-start ps-4">Sl</th>
                                                <th class="text-start">Date</th>
                                                <th class="text-center ps-4">Company</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-end pe-4">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($currentMonthSalesList as $index => $sale)
                                                <tr>
                                                    <td class="ps-4 text-gray-600 fw-bold fs-6">{{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-gray-600 fw-bold fs-6">
                                                        {{ $sale->sale_date ? $sale->sale_date->format('d M') : '-' }}
                                                    </td>
                                                    <td class="text-center">{{ Str::limit($sale->company_name, 10) }}
                                                    </td>
                                                    <td class="text-center fw-bold">
                                                        ${{ number_format($sale->total_price, 2) }}</td>
                                                    <td class="text-end pe-4">
                                                        <a href="#"
                                                            class="px-3 py-1 btn btn-outline-primary btn-sm">
                                                            <i class="fas fa-eye ps-0"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center text-muted" colspan="5">No Sales this
                                                        Month</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="shadow-none card card-flush card-rounded h-100">
                    <div class="px-12 pt-8 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold main_text_color">Sales By Country</span>
                        </h3>
                    </div>
                    <div class="py-10 card-body">
                        <div id="sales_country_chart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="shadow-none card card-flush card-rounded h-100">
                    <div class="card-body d-flex justify-content-between flex-column">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold main_text_color">Sales By Product</span>
                        </h3>

                        @foreach ($salesByProduct as $prod)
                            <div class="d-flex mb-4">
                                <div class="border-gray-300 border-end-dashed border-end pe-3 me-3">
                                    <div class="mb-2 d-flex">
                                        <span class="text-gray-500 fs-6 fw-semibold me-1">$</span>
                                        <span
                                            class="text-gray-800 fw-bold fs-5">{{ number_format($prod->total) }}</span>
                                    </div>
                                    <span
                                        class="text-gray-500 fs-7 fw-semibold">{{ $prod->brand_name ?? 'Unknown' }}</span>
                                </div>
                            </div>
                        @endforeach

                        <div class="py-5">
                            <div id="sales_product_chart" style="height: 200px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 row">
            <div class="col-xl-12 ps-0">
                <div class="shadow-none card card-flush card-rounded">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Recent Pending RFQs</span>
                        </h3>
                    </div>
                    <div class="py-5 card-body">
                        <div class="border table-responsive rounded-4">
                            <table class="table my-0 align-middle table-row-dashed table-borderd gs-0 gy-3">
                                <thead class="bg-light">
                                    <tr class="text-gray-500 fs-7 fw-bold">
                                        <th class="text-start ps-4">Sl</th>
                                        <th class="text-start">RFQ Code</th>
                                        <th class="text-center ps-4">Company</th>
                                        <th class="text-center">Create Date</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentRfqs as $rfq)
                                        <tr>
                                            <td class="ps-4">{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="fw-bold text-primary">{{ $rfq->rfq_code }}</span>
                                            </td>
                                            <td class="text-center">{{ $rfq->company_name }}</td>
                                            <td class="text-center">
                                                {{ $rfq->create_date ? \Carbon\Carbon::parse($rfq->create_date)->format('d M Y') : '-' }}
                                                <br>
                                                <span class="text-muted fs-8">
                                                    {{ $rfq->create_date ? \Carbon\Carbon::parse($rfq->create_date)->diffForHumans() : '' }}
                                                </span>
                                            </td>

                                            <td class="text-end pe-4">
                                                <a href="#" class="btn btn-icon btn-sm btn-light-primary"><i
                                                        class="fas fa-arrow-right"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No pending RFQs</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{-- ApexCharts Logic --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (typeof ApexCharts === 'undefined') {
                    return;
                }

                // 1. Sales By Country (Bar Chart)
                const countryData = @json($salesByCountry);
                const countryLabels = countryData.map(item => item.country ? item.country : 'Unknown');
                const countryTotals = countryData.map(item => item.total);

                if (document.querySelector("#sales_country_chart")) {
                    new ApexCharts(document.querySelector("#sales_country_chart"), {
                        series: [{
                            name: 'Sales',
                            data: countryTotals
                        }],
                        chart: {
                            type: 'bar',
                            height: 250,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: countryLabels
                        },
                        colors: ['#009ef7'],
                        tooltip: {
                            y: {
                                formatter: val => "$" + val
                            }
                        }
                    }).render();
                }

                // 2. Sales By Product (Donut Chart)
                const prodData = @json($salesByProduct);
                const prodLabels = prodData.map(item => item.brand_name ? item.brand_name : 'General');
                const prodTotals = prodData.map(item => parseFloat(item.total));

                if (document.querySelector("#sales_product_chart") && prodTotals.length > 0) {
                    new ApexCharts(document.querySelector("#sales_product_chart"), {
                        series: prodTotals,
                        chart: {
                            type: 'donut',
                            height: 200
                        },
                        labels: prodLabels,
                        legend: {
                            position: 'bottom'
                        },
                        colors: ['#7239ea', '#50cd89', '#f1416c', '#ffc700', '#009ef7'],
                        tooltip: {
                            y: {
                                formatter: val => "$" + val
                            }
                        }
                    }).render();
                }
            });
        </script>
    @endpush
</x-admin-app-layout>
