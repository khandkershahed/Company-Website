<x-admin-app-layout :title="'Brand Management'">
    {{-- ==== Summary Cards Section ==== --}}
    <div class="mb-5 row g-4">
        {{-- Total Brands --}}
        <div class="col-md-3 col-sm-6">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to right, #ffff, #2472977a);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1">Total Brands</h1>
                        <span class="text-black">All registered brands</span>
                    </div>
                    <div class="text-white rounded-circle bg-info fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $brands->count() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- Total Categories --}}
        <div class="col-md-3 col-sm-6">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to right, #ffff, #50cd898c);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1">Total Categories</h6>
                            <span class="text-black">Unique brand categories</span>
                    </div>
                    <div class="text-white rounded-circle bg-success fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px;font-size: 22px;">
                        {{ $brands->pluck('category')->filter()->unique()->count() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- Active Brands --}}
        <div class="col-md-3 col-sm-6">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to right, #ffff, #ffc7004d);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1">Active Brands</h6>
                            <span class="text-black">Currently visible brands</span>
                    </div>
                    <div class="text-white rounded-circle bg-warning fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $brands->where('status', 'active')->count() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- Inactive Brands --}}
        <div class="col-md-3 col-sm-6">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to right, #ffff, #f1416c73);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1">Inactive Brands</h6>
                            <span class="text-black">All inactive or hidden brands</span>
                    </div>
                    <div class="text-white rounded-circle bg-danger fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $brands->where('status', 'inactive')->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ==== Table Section ==== --}}
    <div class="card card-flush">
        <div class="py-5 pb-0 card-header align-items-center d-flex justify-content-between">
            <h1 class="mb-0 text-black">
                All Brands List
            </h1>
            <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('admin.brand.create') }}">
                <i class="fa-solid fa-plus me-1"></i> Add New
            </a>
        </div>

        <div class="pt-0 card-body table-responsive">
            <table class="table mb-0 text-center align-middle border dataTable table-rounded">
                <thead class="bg-light">
                    <tr class="text-gray-800 fw-bold fs-6 text-uppercase">
                        <th class="py-5">SL No.</th>
                        <th class="py-5">Image</th>
                        <th class="py-5">Brand Id</th>
                        <th class="py-5">Name</th>
                        <th class="py-5">Slug</th>
                        <th class="py-5">Category</th>
                        <th class="py-5">Status</th>
                        <th class="py-5">Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($brands as $brand)
                    <tr class="border-bottom">
                        {{-- Serial --}}
                        <td class="text-gray-700 fw-semibold">{{ $loop->iteration }}</td>

                        {{-- Brand Image --}}
                        <td>
                            <div class="mx-auto overflow-hidden border symbol symbol-40px symbol-circle">
                                <img class="object-fit-cover"
                                    src="{{ !empty($brand->image) && file_exists(public_path('storage/' . $brand->image))
                                 ? asset('storage/' . $brand->image)
                                 : asset('frontend/images/no-brand-img.png') }}"
                                    alt="{{ $brand->title }}">
                            </div>
                        </td>

                        {{-- Brand Name --}}
                        <td class="text-gray-800 fw-bold">
                            <span class="text-muted small">{{ $brand->slug }}</span>
                        </td>
                        <td class="text-gray-800 fw-bold">
                            <span class="text-muted small">#{{ $brand->id }}</span>
                        </td>
                        <td class="text-gray-800 fw-bold">
                            {{ ucfirst($brand->title) }}
                        </td>

                        {{-- Category --}}
                        <td class="text-gray-700 fw-semibold">
                            <span class="border badge bg-light text-dark">
                                {{ ucfirst($brand->category) }}
                            </span>
                        </td>

                        {{-- Status Toggle --}}
                        <td>
                            <div class="form-check form-switch d-flex justify-content-center">
                                <input type="checkbox"
                                    class="shadow-sm form-check-input status-toggle"
                                    id="status_toggle_{{ $brand->id }}"
                                    @checked($brand->status == 'active')
                                data-id="{{ $brand->id }}"
                                style="cursor: pointer; width: 3rem; height: 1.5rem;">
                            </div>
                            <small class="text-muted">
                                {{ ucfirst($brand->status) }}
                            </small>
                        </td>

                        {{-- Action Buttons --}}
                        <td>
                            <div class="gap-2 d-flex justify-content-center">
                                {{-- Edit Button --}}
                                <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                    class="btn btn-light btn-sm d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 38px; height: 38px;" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa-solid fa-pen text-primary ps-1"></i>
                                </a>

                                {{-- Delete Button --}}
                                <a href="{{ route('admin.brand.destroy', $brand->id) }}"
                                    class="btn btn-light btn-sm d-flex align-items-center justify-content-center rounded-circle delete"
                                    style="width: 38px; height: 38px;" data-kt-docs-table-filter="delete_row"
                                    data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa-solid fa-trash-can text-danger ps-1"></i>
                                </a>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{-- ==== Script Section ==== --}}
    @push('scripts')
    <script>
        $(document).on('change', '.status-toggle', function() {
            const id = $(this).data('id');
            const route = "{{ route('admin.brands.toggle-status', ':id') }}".replace(':id', id);
            toggleStatus(route);
        });

        function toggleStatus(route) {
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Status updated successfully!');
                    } else {
                        toastr.error('Failed to update status.');
                    }
                },
                error: function() {
                    toastr.error('An error occurred while updating the status.');
                }
            });
        }
    </script>
    @endpush

</x-admin-app-layout>