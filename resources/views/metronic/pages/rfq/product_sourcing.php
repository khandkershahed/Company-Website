<x-admin-app-layout :title="'Products Dashboard'">

    {{-- ===== Top Info Cards ===== --}}
    <div class="mb-5 row g-4">
        {{-- Total Products --}}
        <div class="col-md-3">
            <div class="border-0 p-15 card" style="background-image: linear-gradient(to top, #296088, #003B65); border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-1 text-white">Total Products</h1>
                        <span class="text-white">All products</span>
                    </div>
                    <div class="text-white rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 35px;">
                        125
                    </div>
                </div>
            </div>
        </div>

        {{-- Approved Products --}}
        <div class="col-md-3">
            <div class="border-0 p-15 card" style="background-image: linear-gradient(to right, #ffff, #F2FFF8); border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-1 text-black">Approved</h1>
                        <span class="text-black">Approved Products</span>
                    </div>
                    <div class="text-dark rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 35px;">
                        60
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Products --}}
        <div class="col-md-3">
            <div class="border-0 p-15 card" style="background-image: linear-gradient(to right, #ffff, #FFFBF2); border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-1 text-black">Pending</h1>
                        <span class="text-black">Pending Approval</span>
                    </div>
                    <div class="text-dark rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 35px;">
                        45
                    </div>
                </div>
            </div>
        </div>

        {{-- Drafts --}}
        <div class="col-md-3">
            <div class="border-0 p-15 card" style="background-image: linear-gradient(to right, #ffff, #F2FFF8); border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-1 text-black">Drafts</h1>
                        <span class="text-black">Not Published</span>
                    </div>
                    <div class="text-dark rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 35px;">
                        20
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Tab Section with Table ===== --}}
    <div class="row">
        <div class="col-12">
            <div class="border-0 card">
                <div class="py-8 bg-white card-header rounded-4">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <h1 class="mb-0">Sourced Products</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- Tabs --}}
                            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="text-white nav-link me-1 rounded-1" id="drafts-tab" data-bs-toggle="tab" data-bs-target="#drafts"
                                        type="button" role="tab" aria-controls="drafts" aria-selected="true"
                                        style="background-color: #003B65;"><i class="text-white fas fa-bookmark"></i> Drafts</button> {{-- Gray --}}
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="text-white nav-link me-1 rounded-1" id="sourced-tab" data-bs-toggle="tab" data-bs-target="#sourced"
                                        type="button" role="tab" aria-controls="sourced" aria-selected="false"
                                        style="background-color: #003B65;"><i class="text-white fab fa-product-hunt"></i> Sourced Products</button> {{-- Blue --}}
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="text-white nav-link rounded-1" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved"
                                        type="button" role="tab" aria-controls="approved" aria-selected="false"
                                        style="background-color: #003B65;"><i class="text-white fas fa-check-to-slot"></i> Approved Products</button> {{-- Green --}}
                                </li>
                            </ul>
                            <div class="ms-1">
                                <a href="#" class="py-3 btn btn-sm btn-primary" style="background-color: #003B65;">+ Add Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mt-5 card">
                <div class="card-body">
                    <div class="tab-content">
                        @php
                        $sampleProducts = [
                        ['name' => 'Product 1', 'added_by' => 'Admin', 'price' => '$120', 'status' => 'Draft'],
                        ['name' => 'Product 2', 'added_by' => 'Admin', 'price' => '$150', 'status' => 'Pending'],
                        ['name' => 'Product 3', 'added_by' => 'Admin', 'price' => '$200', 'status' => 'Approved'],
                        ];
                        @endphp

                        {{-- Drafts --}}
                        <div class="pt-0 mt-0 tab-pane fade show active" id="drafts" role="tabpanel" aria-labelledby="drafts-tab">
                            <table class="table text-center align-middle border dataTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Added By</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th class="text-end pe-15">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sampleProducts as $index => $product)
                                    @if($product['status'] === 'Draft')
                                    <tr class="border-b">
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset('frontend/images/no-brand-img.png') }}" width="50" class="rounded" alt="Product"></td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['added_by'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td>
                                            <span class="badge bg-warning">{{ $product['status'] }}</span>
                                        </td>
                                        <td class="text-end pe-10">
                                            <a href="#" class="px-2 ps-3 btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="#" class="px-2 btn btn-sm ps-3 btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Sourced Products --}}
                        <div class="tab-pane fade" id="sourced" role="tabpanel" aria-labelledby="sourced-tab">
                            <table class="table text-center align-middle border dataTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Added By</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th class="text-end pe-15">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sampleProducts as $index => $product)
                                    @if($product['status'] === 'Pending')
                                    <tr class="border-b">
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset('frontend/images/no-brand-img.png') }}" width="50" class="rounded" alt="Product"></td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['added_by'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td>
                                            <span class="badge bg-warning">{{ $product['status'] }}</span>
                                        </td>
                                        <td class="text-end pe-10">
                                            <a href="#" class="px-2 ps-3 btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger">
                                                <i clas></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Approved Products --}}
                        <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                            <table class="table text-center align-middle border dataTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Added By</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th class="text-end pe-15">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sampleProducts as $index => $product)
                                    @if($product['status'] === 'Approved')
                                    <tr class="border-b">
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset('frontend/images/no-brand-img.png') }}" width="50" class="rounded" alt="Product"></td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['added_by'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ $product['status'] }}</span>
                                        </td>
                                        <td class="text-end pe-10">
                                            <a href="#" class="px-2 ps-3 btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger">
                                                <i clas></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- JS to ensure active tab triggers correctly --}}
    <script>
        // Change tab background on active
        document.querySelectorAll('#productTabs .nav-link').forEach(function(tab) {
            tab.addEventListener('shown.bs.tab', function(e) {
                // Reset all tabs to original colors
                document.querySelector('#drafts-tab').style.backgroundColor = '#003B65';
                document.querySelector('#sourced-tab').style.backgroundColor = '#003B65';
                document.querySelector('#approved-tab').style.backgroundColor = '#003B65';

                // Set active tab background to danger (red)
                e.target.style.backgroundColor = '#dc3545';
            });
        });

        // Set initial active tab to danger
        document.querySelector('#drafts-tab').style.backgroundColor = '#dc3545';
    </script>
    @endpush

</x-admin-app-layout>