<div class="tab-pane fade show active" id="quotesDeals" role="tabpanel">
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>Date</th>
                    <th>RFQ Code</th>
                    <th>Client</th>
                    <th>Company</th>
                    <th class="text-end">Amount</th>
                    <th class="text-end">Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quoteds as $rfq)
                <tr>
                    <td>{{ $rfq->create_date ? \Carbon\Carbon::parse($rfq->create_date)->format('d M, Y') : '-' }}</td>
                    <td><a href="#" class="text-gray-800 text-hover-primary fw-bold">{{ $rfq->rfq_code }}</a></td>
                    <td>{{ $rfq->name }}</td>
                    <td>{{ $rfq->company_name }}</td>
                    <td class="text-end">${{ number_format($rfq->quoted_price ?? 0, 2) }}</td>
                    <td class="text-end"><span class="badge badge-light-info">Quoted</span></td>
                    <td class="text-end">
                        @include('metronic.pages.sales.partials.action_buttons', ['rfq' => $rfq])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="tab-pane fade" id="mainDeals" role="tabpanel">
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>Sale Date</th>
                    <th>RFQ Code</th>
                    <th>Client</th>
                    <th>Company</th>
                    <th class="text-end">Total Price</th>
                    <th class="text-end">Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deals as $deal)
                <tr>
                    <td>{{ $deal->sale_date ? \Carbon\Carbon::parse($deal->sale_date)->format('d M, Y') : '-' }}</td>
                    <td><a href="#" class="text-gray-800 text-hover-primary fw-bold">{{ $deal->rfq_code }}</a></td>
                    <td>{{ $deal->name }}</td>
                    <td>{{ $deal->company_name }}</td>
                    <td class="text-end text-success fw-bold">${{ number_format($deal->total_price, 2) }}</td>
                    <td class="text-end"><span class="badge badge-light-success">Won</span></td>
                    <td class="text-end">
                        @include('metronic.pages.sales.partials.action_buttons', ['rfq' => $deal])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="tab-pane fade" id="lostDeals" role="tabpanel">
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>Date</th>
                    <th>RFQ Code</th>
                    <th>Client</th>
                    <th>Company</th>
                    <th class="text-end">Est. Value</th>
                    <th class="text-end">Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($losts as $lost)
                <tr>
                    <td>{{ $lost->create_date ? \Carbon\Carbon::parse($lost->create_date)->format('d M, Y') : '-' }}</td>
                    <td>{{ $lost->rfq_code }}</td>
                    <td>{{ $lost->name }}</td>
                    <td>{{ $lost->company_name }}</td>
                    <td class="text-end">${{ number_format($lost->quoted_price ?? 0, 2) }}</td>
                    <td class="text-end"><span class="badge badge-light-danger">Lost</span></td>
                    <td class="text-end">
                        @include('metronic.pages.sales.partials.action_buttons', ['rfq' => $lost])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>