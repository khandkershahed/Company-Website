<x-admin-app-layout :title="'Sales Report'">

    <div class="px-0 pb-0 container-fluid">
        <div class="mb-5 row" style="overflow: hidden;">
            <div class="col-xl-3 ps-0">
                <div class="shadow-none card card-flush card-rounded bg-gr-blu">
                    <div class="p-0 card-body">
                        <div class="p-8 text-center me-3">
                            <h4 class="text-black" style="font-size: 38.108px;">Sales <br> Report</h4>
                            <p class="mb-0 text-black fs-6 fw-bold">Fiscal Year {{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                {{-- KPI Cards --}}
                <div class="row gx-3">
                    <div class="col-xl-3">
                        <div class="shadow-none card card-flush card-rounded bg-gr-b">
                            <div class="p-3 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 bg-white rounded-circle ms-10">
                                        <i class="bi bi-globe text-primary fs-2"></i>
                                    </div>
                                    <div class="text-start ms-5">
                                        <p class="mb-0 text-black fs-6 fw-bold">Total Countries</p>
                                        <h4 class="pt-3 text-black" style="font-size: 28px;">{{ $totalCountries }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="shadow-none card card-flush card-rounded bg-gr-g">
                            <div class="p-3 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 bg-white rounded-circle ms-10">
                                        <i class="bi bi-trophy-fill text-success fs-2"></i>
                                    </div>
                                    <div class="text-start ms-5">
                                        <p class="mb-0 text-black fs-6 fw-bold">Top Performer</p>
                                        <h5 class="pt-1 text-black fw-bolder">{{ $topPerformer['name'] ?? '-' }}</h5>
                                        <span class="text-muted small">{{ $topPerformer['country'] ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="shadow-none card card-flush card-rounded bg-gr-war">
                            <div class="p-3 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 bg-white rounded-circle ms-10">
                                        <i class="bi bi-emoji-frown-fill text-warning fs-2"></i>
                                    </div>
                                    <div class="text-start ms-5">
                                        <p class="mb-0 text-black fs-6 fw-bold">Lowest Performer</p>
                                        <h5 class="pt-1 text-black fw-bolder">{{ $lowestPerformer['name'] ?? '-' }}</h5>
                                        <span class="text-muted small">{{ $lowestPerformer['country'] ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="shadow-none card card-flush card-rounded bg-gr-blu">
                            <div class="p-3 card-body">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 bg-white rounded-circle ms-10">
                                        <i class="bi bi-clock-history text-info fs-2"></i>
                                    </div>
                                    <div class="text-start ms-5">
                                        <p class="mb-0 text-black fs-6 fw-bold">Avg. Sales Cycle</p>
                                        <h4 class="pt-3 text-black" style="font-size: 28px;">{{ number_format($avgSalesCycle, 0) }}</h4>
                                        <span class="text-muted small">Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filters & Table --}}
        <div class="mb-5 row" style="overflow: hidden;">
            <div class="shadow-none card card-flush">
                <div class="py-3 card-header ps-3 pe-1">
                    <div>
                        <h2 class="mb-0 fw-bold card-title">Sales Report List</h2>
                        <span class="text-muted">Sales Records</span>
                    </div>
                    <div class="card-toolbar d-flex align-items-center">
                        <form action="{{ route('admin.sales.report') }}" method="GET" class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="position-relative">
                                    <i class="text-gray-500 fab fa-sistrix fs-2 position-absolute top-50 translate-middle-y ms-4"></i>
                                    <input type="text" class="border-gray-200 form-control form-control-sm form-control-solid ps-13 fs-7 pe-3"
                                        name="search" value="{{ request('search') }}" placeholder="Search..." />
                                </div>
                            </div>
                            <div class="d-flex">
                                <input class="form-control form-control-sm form-control-solid" 
                                    name="date_range" value="{{ request('date_range') }}" 
                                    placeholder="Pick date range" id="kt_daterangepicker_3" style="width: 200px;"/>
                                
                                <div class="ms-3" style="width: 150px;">
                                    <select name="country" data-control="select2" class="form-select form-select-sm form-select-solid w-100">
                                        <option value="">All Countries</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary ms-3">Filter</button>
                                <a href="{{ route('admin.sales.report') }}" class="btn btn-sm btn-light ms-2">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="p-0 pb-3 card-body">
                    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
                        <table class="table mb-0 align-middle border rounded shadow-sm table-hover" style="width: 100%; table-layout: fixed;">
                            <thead class="py-3 text-black bg-light">
                                <tr class="fw-bold fs-7 text-gray-800">
                                    <th class="py-3 ps-3" style="width: 5%;">SL</th>
                                    <th class="py-3" style="width: 10%;">Date</th>
                                    <th class="py-3" style="width: 10%;">Country</th>
                                    <th class="py-3 text-start" style="width: 15%;">Salesperson</th>
                                    <th class="py-3" style="width: 15%;">Client</th>
                                    <th class="py-3 text-center" style="width: 10%;">Target (Budget)</th>
                                    <th class="py-3 text-center" style="width: 10%;">Sales</th>
                                    <th class="py-3 text-center" style="width: 10%;">Achv (%)</th>
                                    <th class="py-3 text-end pe-3" style="width: 9%;">Deficiency</th>
                                    <th class="py-3 text-end pe-3" style="width: 10%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sales as $sale)
                                    @php
                                        $target = $sale->budget ?? 0;
                                        $salesAmount = $sale->total_price ?? 0;
                                        $achieved = $target > 0 ? ($salesAmount / $target) * 100 : 0;
                                        $deficiency = max(0, $target - $salesAmount);
                                    @endphp
                                    <tr style="border-bottom: 1px solid #EAEAEA;">
                                        <td class="ps-3">{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d-M-Y') }}</td>
                                        <td>{{ $sale->country }}</td>
                                        <td class="text-start fw-bold">{{ $sale->salesManL1->name ?? 'N/A' }}</td>
                                        <td class="text-start">{{ Str::limit($sale->company_name, 20) }}</td>
                                        <td class="text-center">${{ number_format($target, 2) }}</td>
                                        <td class="text-center fw-semibold text-success">${{ number_format($salesAmount, 2) }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $achieved >= 100 ? 'bg-light-success text-success' : 'bg-light-warning text-warning' }}">
                                                {{ number_format($achieved, 1) }}%
                                            </span>
                                        </td>
                                        <td class="text-end pe-3 text-danger">{{ $deficiency > 0 ? '$'.number_format($deficiency) : '-' }}</td>
                                        <td class="text-end pe-3">
                                            @if($achieved >= 100)
                                                <span class="badge bg-success">Achieved 🟢</span>
                                            @elseif($achieved >= 80)
                                                <span class="badge bg-warning text-dark">On Track 🟡</span>
                                            @else
                                                <span class="badge bg-danger">Below 🔴</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-5 text-muted">No sales records found for the selected criteria.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Date Range Picker
            $("#kt_daterangepicker_3").daterangepicker({
                autoUpdateInput: false,
                locale: { cancelLabel: 'Clear' }
            });

            $("#kt_daterangepicker_3").on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $("#kt_daterangepicker_3").on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>
    @endpush
</x-admin-app-layout>