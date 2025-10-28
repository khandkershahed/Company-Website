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
                        <th width="5%" class="ps-2">Sl.</th>
                        <th width="8%" class="ps-2">Date</th>
                        <th width="8%">Salesman</th>
                        <th width="8%">Partner/Client</th>
                        <th width="8%">Country</th>
                        <th width="35%">Product Description</th>
                        <th width="8%">Contact Person</th>
                        <th width="8%">Status</th>
                        <th width="8%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" align="center">
                    @forelse ($deals as $deal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="ps-2">{{ \Carbon\Carbon::parse($deal->create_date)->format('d-M-Y') }}
                            </td>
                            <td>{{ optional($deal->salesmanL1)->name ?? (optional($deal->salesmanT1)->name ?? optional($deal->salesmanT2)->name) }}
                            </td>
                            <td>{{ ucfirst($deal->client_type) ?? 'Unknown' }}</td>
                            <td>{{ ucfirst($deal->country) }}</td>
                            <td class="text-start">
                                @foreach ($deal->rfqProducts as $product)
                                    <span class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span>
                                    <br>
                                @endforeach
                            </td>
                            <td>{{ ucfirst($deal->name) }}</td>
                            <td>{{ Str::of($deal->status)->replace('_', ' ')->title() }}</td>
                            <td>
                                <a href="{{ route('deal.edit', $deal->id) }}"
                                    class="fs-3 me-3" style="width: 38px; height: 38px;"
                                    data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa-solid fa-pen text-primary ps-1"></i>
                                </a>

                                {{-- Delete Button --}}
                                <a href="{{ route('deal.destroy', $deal->id) }}"
                                    class="fs-3 delete"
                                    style="width: 38px; height: 38px;" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa-solid fa-trash-can text-danger ps-1"></i>
                                </a>
                            </td>
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
