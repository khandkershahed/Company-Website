<x-admin-app-layout :title="'Category Management'">
    {{-- ===== Info Cards ===== --}}
    <div class="mb-5 row gx-5">
        <div class="col-md-3">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to top, #296088, #003B65);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1 text-white">Total Categories</h1>
                        <span class="text-white">All categories</span>
                    </div>
                    <div class="text-black bg-white rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $categorys->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to top, #296088, #003B65);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1 text-white">Active Categories</h1>
                        <span class="text-white">Currently active</span>
                    </div>
                    <div class="text-black bg-white rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $categorys->where('status', 'active')->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to top, #296088, #003B65);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1 text-white">Inactive Categories</h1>
                        <span class="text-white">Currently inactive</span>
                    </div>
                    <div class="text-black bg-white rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $categorys->where('status', 'inactive')->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="p-3 border-0 shadow-sm card" style="background-image: linear-gradient(to top, #296088, #003B65);">
                <div class="p-10 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="mb-1 text-white">Total Products</h1>
                        <span class="text-white">All products</span>
                    </div>
                    <div class="text-black bg-white rounded-circle fw-bold d-flex align-items-center justify-content-center"
                        style="width: 55px; height: 55px; font-size: 22px;">
                        {{ $categorys->sum('products_count') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ===== Category Table ===== --}}


    <div class="card card-flush">
        <div class="py-5 pt-10 pb-0 card-header align-items-center d-flex justify-content-between">
            <h1 class="mb-0 text-black">
                All Categories List
            </h1>
            <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('admin.category.create') }}">
                <i class="fa-solid fa-plus me-1"></i> Add New
            </a>
        </div>

        <div class="pt-0 card-body table-responsive">
            <table class="table border table-bordered my-datatable">
                <thead class="text-center bg-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Parent Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($categorys as $category)
                    <tr class="border-b">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img class="rounded-circle w-50px"
                                src="{{ !empty($category->image) && file_exists(public_path('storage/' . $category->image)) ? asset('storage/' . $category->image) : asset('frontend/images/no-brand-img.png') }}"
                                alt="{{ $category->title ?? 'N/A' }}">
                        </td>
                        <td>{{ ucfirst($category->title) ?? 'N/A' }}</td>
                        <td>{{ ucfirst($category->category) ?? 'N/A' }}</td>
                        <td>
                            <div class="form-check form-switch d-flex justify-content-center">
                                <input class="form-check-input status-toggle" type="checkbox"
                                    data-id="{{ $category->id ?? 'N/A' }}" @checked($category->status == 'active') />
                            </div>
                        </td>
                        <td>
                            <!-- <a href="{{ route('admin.category.edit', $category->id) }}"
                                class="btn btn-sm btn-outline-primary me-1">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="{{ route('admin.category.destroy', $category->id) }}"
                                class="btn btn-sm btn-outline-danger delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </a> -->


                            <div class="gap-2 d-flex justify-content-center">
                                {{-- Edit Button --}}
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="btn btn-light btn-sm d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 38px; height: 38px;" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa-solid fa-pen text-primary ps-1"></i>
                                </a>

                                {{-- Delete Button --}}
                                <a href="{{ route('admin.category.destroy', $category->id) }}"
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

    @push('scripts')
    <script>
        // Pure JS toggle without named route
        document.querySelectorAll('.status-toggle').forEach(function(toggle) {
            toggle.addEventListener('change', function() {
                const id = this.dataset.id;
                const isActive = this.checked ? 'active' : 'inactive';
                const url = `/admin/category/${id}/status-toggle`; // Adjust controller method to accept POST

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            status: isActive
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) alert('Status updated!');
                        else alert('Failed to update status');
                    })
                    .catch(err => alert('Error updating status'));
            });
        });
    </script>
    @endpush
</x-admin-app-layout>