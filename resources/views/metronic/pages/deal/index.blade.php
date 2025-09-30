<x-admin-app-layout :title="'Deals List'">
    <div class="card card-flush">
        <div class="card-header bg-info align-items-center">
            {{-- <h3 class="card-title text-white">Total Brand : &nbsp;&nbsp;<strong class="text-warning">
                    {{ $brands->count() }}</strong></h3> --}}
            <h2 class="card-title text-white">Deals List</h2>
            <div>
                <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('deal.create') }}">
                    Create Deal
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table my-datatable table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead class="text-center" align="center">
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
                <tbody class="text-center" align="center">
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
    </div>
    @push('scripts')
    @endpush
</x-admin-app-layout>
