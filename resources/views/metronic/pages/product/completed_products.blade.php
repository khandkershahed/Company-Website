<x-admin-app-layout :title="'Draft Products (Not Completed)'">
    {{-- ===== Top Info Cards ===== --}}
    <div class="mb-5 row gx-4">
        @php
        $cards = [
        [
        'title' => 'Total Products',
        'subtitle' => 'All Products',
        'count' => $real_products->count(),
        'bg' => 'linear-gradient(to top, #296088, #003B65)',
        'textColor' => 'text-white',
        ],
        [
        'title' => 'Pending',
        'subtitle' => 'Pending Approval',
        'count' => $real_products->where('action_status', 'pending')->count(),
        'bg' => 'linear-gradient(to right, #FFFFE0, #FFD700)',
        'textColor' => 'text-dark',
        ],
        [
        'title' => 'Approved',
        'subtitle' => 'Listed Products',
        'count' => $real_products->where('action_status', 'listed')->count(),
        'bg' => 'linear-gradient(to right, #E0FFE0, #00A65A)',
        'textColor' => 'text-dark',
        ],
        [
        'title' => 'Rejected',
        'subtitle' => 'Rejected Products',
        'count' => $real_products->where('action_status', 'rejected')->count(),
        'bg' => 'linear-gradient(to right, #FFE0E0, #FF3B30)',
        'textColor' => 'text-dark',
        ],
        ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-md-3">
            <div class="border-0 p-15 card" style="background-image: {{ $card['bg'] }}; border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-1 {{ $card['textColor'] }}">{{ $card['title'] }}</h1>
                        <span class="{{ $card['textColor'] }}">{{ $card['subtitle'] }}</span>
                    </div>
                    <div class="{{ $card['textColor'] }} rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 35px;">
                        {{ $card['count'] }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- ===== Pending Products Table ===== --}}
    <div class="row gx-4">
        <div class="col-lg-12">
            <div class="card card-flash">
                <div class="pt-10 border-0 card-header d-flex justify-content-between align-items-center">
                    <div>
                        <span class="card-title">Sourced Products <small>
                                (Draft)
                            </small>
                        </span>
                    </div>
                    <a href="{{ route('product-sourcing.create') }}" class="btn btn-info d-flex align-items-center rounded-pill">
                        <i class="fas fa-plus"></i>
                        Add Product
                    </a>
                </div>
                <div class="pt-0 card-body">
                    <table class="table text-center border dataTable table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th width="5%">Sl</th>
                                <th width="10%">Thumbnail</th>
                                <th width="40%" class="text-start">Name</th>
                                <th width="15%" class="text-start">Added By</th>
                                <th width="10%">Price Status</th>
                                <th width="10%">Action Status</th>
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($real_products as $product)
                            <tr class="border-b">
                                <td>{{ $loop->iteration }}</td>
                                <td> <img src="{{ $product->thumbnail && file_exists(public_path($product->thumbnail)) ? asset($product->thumbnail) : url('upload/no_image.jpg') }}" width="40" height="40" style="border-radius: 50%;"> </td>
                                <td class="text-start">{{ $product->name }}</td>
                                <td class="text-start">{{ $product->added_by }}</td>
                                <td> <span class="{{ $product->price_status === 'rfq' ? 'text-black' : '' }}"> {{ ucfirst($product->price_status) }} </span> </td>
                                <td> @php $statusClass = match(strtolower($product->action_status)) { 'listed' => 'text-success', 'rejected' => 'text-danger', 'pending' => 'text-warning', default => '', }; @endphp <span class="{{ $statusClass }}">{{ ucfirst($product->action_status) }}</span> </td>
                                <td> <a href="{{ route('product-sourcing.edit', $product->id) }}" class="text-primary me-4"> <i class="fa-solid fa-pen-to-square dash-icons"></i> </a> <a href="{{ route('product-sourcing.destroy', $product->id) }}" class="text-danger delete"> <i class="fa-solid fa-trash dash-icons text-danger"></i> </a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>