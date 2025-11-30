<x-admin-app-layout :title="'Ledger Book'">
    <div class="container-xl">
        <div class="card shadow-sm rounded-4">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">General Ledger</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Combined view of all financial transactions</span>
                </h3>
                
                {{-- Date Filter Form --}}
                <div class="card-toolbar">
                    <form action="{{ route('admin.accounts.ledger') }}" method="GET" class="d-flex align-items-center">
                        <div class="input-group input-group-sm me-2">
                            <span class="input-group-text">From</span>
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                        <div class="input-group input-group-sm me-2">
                            <span class="input-group-text">To</span>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                        <button type="submit" class="btn btn-sm btn-light-primary">Filter</button>
                        @if(request('start_date'))
                            <a href="{{ route('admin.accounts.ledger') }}" class="btn btn-sm btn-light-danger ms-2">Reset</a>
                        @endif
                    </form>
                </div>
            </div>
            
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-bordered table-hover align-middle gs-0 gy-4">
                        <thead class="bg-light">
                            <tr class="fw-bold text-muted">
                                <th class="ps-4 min-w-100px">Date</th>
                                <th class="min-w-100px">Type</th>
                                <th class="min-w-150px">Party / Client</th>
                                <th class="min-w-100px">Ref #</th>
                                <th class="min-w-250px">Particulars</th>
                                <th class="min-w-100px text-end text-success">Credit (In)</th>
                                <th class="min-w-100px text-end text-danger pe-4">Debit (Out)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $totalCredit = 0;
                                $totalDebit = 0;
                            @endphp
                            
                            @forelse($ledger as $row)
                                @php
                                    $isIncome = $row->txn_type === 'Income';
                                    $amount = $row->amount;
                                    if($isIncome) $totalCredit += $amount; else $totalDebit += $amount;
                                @endphp
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-gray-800">{{ $row->date->format('d M, Y') }}</div>
                                    </td>
                                    <td>
                                        @if($isIncome)
                                            <span class="badge badge-light-success">Income</span>
                                        @else
                                            <span class="badge badge-light-danger">Expense</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-dark fw-bold fs-6">{{ $row->client_name }}</div>
                                    </td>
                                    <td>
                                        <span class="text-muted fs-7">{{ Str::limit($row->ref, 15) }}</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-800">{{ Str::limit($row->desc, 50) }}</span>
                                    </td>
                                    <td class="text-end text-success fw-bold">
                                        {{ $isIncome ? number_format($amount, 2) : '-' }}
                                    </td>
                                    <td class="text-end text-danger fw-bold pe-4">
                                        {{ !$isIncome ? number_format($amount, 2) : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">No transactions found for this period.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-light fw-bold border-top-2 border-secondary">
                            <tr>
                                <td colspan="5" class="text-end pe-4 fs-6">Totals:</td>
                                <td class="text-end text-success fs-6">{{ number_format($totalCredit, 2) }}</td>
                                <td class="text-end text-danger pe-4 fs-6">{{ number_format($totalDebit, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end pe-4 fs-5 text-dark">Balance:</td>
                                <td colspan="2" class="text-center fs-5 {{ ($totalCredit - $totalDebit) >= 0 ? 'text-primary' : 'text-danger' }}">
                                    {{ number_format($totalCredit - $totalDebit, 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>