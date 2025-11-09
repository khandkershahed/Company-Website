<div class="mt-4 tab-pane fade active show" id="potentialTab" role="tabpanel">
    <!-- Jan Content -->
    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
        <table class="table border rounded table-row-bordered dataTable">
            <thead class="bg-light">
                <tr class="text-gray-800 fw-bold fs-6 px-7 text-center">
                    <th width="8%" class="ps-2">Date</th>
                    <th width="8%">Salesman</th>
                    <th width="8%">Partner/Client</th>
                    <th width="8%">Country</th>
                    <th width="8%">PQ#</th>
                    <th width="35%">Product Description</th>
                    <th width="8%">Deal Type</th>
                    <th width="8%">Contact Person</th>
                    <th width="8%">Status</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: #7B7B7B;">
                @foreach ($pendings as $pending)
                    <tr>
                        <td class="ps-2">{{ \Carbon\Carbon::parse($pending->create_date)->format('d-M-Y') }}
                        </td>
                        <td>{{ optional($pending->salesmanL1)->name ?? (optional($pending->salesmanT1)->name ?? optional($pending->salesmanT2)->name) }}
                        </td>
                        <td>{{ ucfirst($pending->client_type) ?? 'Unknown' }}</td>
                        <td>{{ ucfirst($pending->country) }}</td>
                        <td>N/A</td>
                        <td class="text-start">
                            @foreach ($pending->rfqProducts as $product)
                                <span class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span> <br>
                            @endforeach
                        </td>
                        <td>New</td>
                        <td>{{ ucfirst($pending->name) }}</td>
                        <td>{{ Str::of($pending->status)->replace('_', ' ')->title() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Jan Content End -->
</div>
<div class="mt-4 tab-pane fade" id="forecastTab" role="tabpanel">
    <!-- Jan Content -->
    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
        <table class="table border rounded table-row-bordered dataTable">
            <thead class="bg-light">
                <tr class="text-gray-800 fw-bold fs-6 px-7 text-center">
                    <th width="8%" class="ps-2">Date</th>
                    <th width="8%">Salesman</th>
                    <th width="8%">Partner/Client</th>
                    <th width="8%">Country</th>
                    <th width="8%">PQ#</th>
                    <th width="35%">Product Description</th>
                    <th width="8%">Deal Type</th>
                    <th width="8%">Contact Person</th>
                    <th width="8%">Status</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: #7B7B7B;">
                @forelse ($quoteds as $quoted)
                    <tr>
                        <td class="ps-2">{{ \Carbon\Carbon::parse($quoted->create_date)->format('d-M-Y') }}
                        </td>
                        <td>{{ optional($quoted->salesmanL1)->name ?? (optional($quoted->salesmanT1)->name ?? optional($quoted->salesmanT2)->name) }}
                        </td>
                        <td>{{ ucfirst($quoted->client_type) ?? 'Unknown' }}</td>
                        <td>{{ ucfirst($quoted->country) }}</td>
                        <td>N/A</td>
                        <td class="text-start">
                            @foreach ($quoted->rfqProducts as $product)
                                <span class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span>
                                <br>
                            @endforeach
                        </td>
                        <td>New</td>
                        <td>{{ ucfirst($quoted->name) }}</td>
                        <td>{{ Str::of($quoted->status)->replace('_', ' ')->title() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-warning fw-bold fs-3">No Forecast Available !</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Jan Content End -->
</div>
<div class="mt-4 tab-pane fade" id="dealsTab" role="tabpanel">
    <!-- Jan Content -->
    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
        <table class="table border rounded table-row-bordered dataTable">
            <thead class="bg-light">
                <tr class="text-gray-800 fw-bold fs-6 px-7 text-center">
                    <th width="8%" class="ps-2">Date</th>
                    <th width="8%">Salesman</th>
                    <th width="8%">Partner/Client</th>
                    <th width="8%">Country</th>
                    <th width="8%">PQ#</th>
                    <th width="35%">Product Description</th>
                    <th width="8%">Deal Type</th>
                    <th width="8%">Contact Person</th>
                    <th width="8%">Status</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: #7B7B7B;">
                @forelse ($deals as $deal)
                    <tr>
                        <td class="ps-2">{{ \Carbon\Carbon::parse($deal->create_date)->format('d-M-Y') }}
                        </td>
                        <td>{{ optional($deal->salesmanL1)->name ?? (optional($deal->salesmanT1)->name ?? optional($deal->salesmanT2)->name) }}
                        </td>
                        <td>{{ ucfirst($deal->client_type) ?? 'Unknown' }}</td>
                        <td>{{ ucfirst($deal->country) }}</td>
                        <td>N/A</td>
                        <td class="text-start">
                            @foreach ($deal->rfqProducts as $product)
                                <span class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span>
                                <br>
                            @endforeach
                        </td>
                        <td>New</td>
                        <td>{{ ucfirst($deal->name) }}</td>
                        <td>{{ Str::of($deal->status)->replace('_', ' ')->title() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-warning fw-bold fs-3">No Deals Available !</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Jan Content End -->
</div>
<div class="mt-4 tab-pane fade" id="closedTab" role="tabpanel">
    <!-- Jan Content -->
    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
        <table class="table border rounded table-row-bordered dataTable">
            <thead class="bg-light">
                <tr class="text-gray-800 fw-bold fs-6 px-7 text-center">
                    <th width="8%" class="ps-2">Date</th>
                    <th width="8%">Salesman</th>
                    <th width="8%">Partner/Client</th>
                    <th width="8%">Country</th>
                    <th width="8%">PQ#</th>
                    <th width="35%">Product Description</th>
                    <th width="8%">Deal Type</th>
                    <th width="8%">Contact Person</th>
                    <th width="8%">Status</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: #7B7B7B;">
                @forelse ($closeds as $closed)
                    <tr>
                        <td class="ps-2">{{ \Carbon\Carbon::parse($closed->create_date)->format('d-M-Y') }}
                        </td>
                        <td>{{ optional($closed->salesmanL1)->name ?? (optional($closed->salesmanT1)->name ?? optional($closed->salesmanT2)->name) }}
                        </td>
                        <td>{{ ucfirst($closed->client_type) ?? 'Unknown' }}</td>
                        <td>{{ ucfirst($closed->country) }}</td>
                        <td>N/A</td>
                        <td class="text-start">
                            @foreach ($closed->rfqProducts as $product)
                                <span class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span>
                                <br>
                            @endforeach
                        </td>
                        <td>New</td>
                        <td>{{ ucfirst($closed->name) }}</td>
                        <td>{{ Str::of($closed->status)->replace('_', ' ')->title() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-warning fw-bold fs-3">No Closed RFQs Available !</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Jan Content End -->
</div>
<div class="mt-4 tab-pane fade" id="lostTab" role="tabpanel">
    <!-- Jan Content -->
    <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
        <table class="table border rounded table-row-bordered dataTable">
            <thead class="bg-light">
                <tr class="text-gray-800 fw-bold fs-6 px-7 text-center">
                    <th width="10%" class="ps-2">Date</th>
                    <th width="8%">Salesman</th>
                    <th width="8%">Partner/Client</th>
                    <th width="8%">Country</th>
                    <th width="8%">PQ#</th>
                    <th width="34%">Product Description</th>
                    <th width="8%">Deal Type</th>
                    <th width="8%">Contact Person</th>
                    <th width="8%">Status</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: #7B7B7B;">
                @forelse ($losts as $lost)
                    <tr>
                        <td class="ps-2">{{ \Carbon\Carbon::parse($lost->create_date)->format('d-M-Y') }}
                        </td>
                        <td>{{ optional($lost->salesmanL1)->name ?? (optional($lost->salesmanT1)->name ?? optional($lost->salesmanT2)->name) }}
                        </td>
                        <td>{{ ucfirst($lost->client_type) ?? 'Unknown' }}</td>
                        <td>{{ ucfirst($lost->country) }}</td>
                        <td>N/A</td>
                        <td class="text-start">
                            @foreach ($lost->rfqProducts as $product)
                                <span class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span>
                                <br>
                            @endforeach
                        </td>
                        <td>New</td>
                        <td>{{ ucfirst($lost->name) }}</td>
                        <td>{{ Str::of($lost->status)->replace('_', ' ')->title() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-warning fw-bold fs-3">No Lost RFQs Available !</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Jan Content End -->
</div>
