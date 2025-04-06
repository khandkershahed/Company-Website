<x-admin-app-layout :title="'Category Management'">
    <style>
        .btn-check:active+.btn.btn-primary,
        .btn-check:checked+.btn.btn-primary,
        .btn.btn-primary.active,
        .btn.btn-primary.show,
        .btn.btn-primary:active:not(.btn-active),
        .btn.btn-primary:focus:not(.btn-active),
        .btn.btn-primary:hover:not(.btn-active),
        .show>.btn.btn-primary {
            color: #500066;
            border-color: #d1d1d1;
            background-color: #d1d1d1 !important;
        }
    </style>
    <div class="card card-flush">
        <div class="card-header bg-info align-items-center">
            <h3 class="card-title text-white">Total Category : &nbsp;&nbsp;<strong class="text-warning">
                    {{ $categorys->count() }}</strong></h3>
            <h2 class="card-title text-white">Category List</h2>
            <div>
                <ul class="nav nav-tabs border-bottom-0">
                    <li class="nav-item d-flex align-items-center">
                        <a href="#category" class="btn btn-primary m-2 active" data-bs-toggle="tab">
                            <p class="p-1 mb-0">
                                Category</p>
                        </a>
                    </li>

                    <li class="nav-item d-flex align-items-center">
                        <a href="#sub_category" class="btn btn-primary m-2" data-bs-toggle="tab">
                            <p class="p-1 mb-0">
                                Sub Category</p>
                        </a>
                    </li>

                    <li class="nav-item d-flex align-items-center">
                        <a href="#sub_sub_category" class="btn btn-primary m-2" data-bs-toggle="tab">
                            <p class="p-1 mb-0">
                                Sub Sub Category</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="#sub_sub_sub_category" class="btn btn-primary m-2" data-bs-toggle="tab">
                            <p class="p-1 mb-0">
                                Sub Sub Sub Category</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table my-datatable table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead class="text-center" align="center">
                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                        <th width="10%">SL No.</th>
                        <th width="20%">Image</th>
                        <th width="25%">Name</th>
                        <th width="20%">Category</th>
                        <th width="10%">Status</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" align="center">
                    @foreach ($categorys as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="w-65px"
                                    src="{{ !empty($category->image) && file_exists(public_path('storage/' . $category->image)) ? asset('storage/' . $category->image) : asset('frontend/images/no-brand-img.png') }}"
                                    alt="{{ $category->title }}">
                            </td>
                            <td>{{ ucfirst($category->title) }}</td>
                            <td>
                                {{ ucfirst($category->category) }}
                            </td>
                            <td>
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid justify-content-center">
                                    <input class="form-check-input status-toggle" type="checkbox"
                                        id="status_toggle_{{ $category->id }}" @checked($category->status == 'active')
                                        data-id="{{ $category->id }}" />
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.category.destroy', $category->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 delete"
                                    data-kt-docs-table-filter="delete_row">
                                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).on('change', '.status-toggle', function() {
                const id = $(this).data('id');
                const route = "{{ route('admin.category.toggle-status', ':id') }}".replace(':id', id);
                toggleStatus(route, id);
            });

            function toggleStatus(route, id) {
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Status updated successfully!');
                            table.ajax.reload(null, false); // Reload the DataTable
                        } else {
                            alert('Failed to update status.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while updating the status.');
                    }
                });
            }
        </script>
    @endpush
</x-admin-app-layout>
