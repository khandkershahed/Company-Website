<x-admin-app-layout :title="'Brand Management'">

    <div class="card card-flush">
        <div class="card-header bg-info align-items-center">
            <h3 class="card-title text-white">Total Brand : &nbsp;&nbsp;<strong class="text-warning">
                    {{ $brands->count() }}</strong></h3>
            <h3 class="card-title text-white">Brands List</h3>
            <div>
                <a class="btn btn-sm btn-light-primary rounded-0" href="{{ route('brand.create') }}">
                    Add New
                </a>
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
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="w-65px" src="{{ asset('storage/' . $brand->image) }}"
                                    alt="{{ $brand->title }}"></td>
                            <td>{{ ucfirst($brand->title) }}</td>
                            <td>
                                {{ ucfirst($brand->category) }}
                            </td>
                            <td>
                                <div class="form-check form-switch form-check-custom form-check-solid text-center">
                                    <input class="form-check-input status-toggle" type="checkbox"
                                        id="status_toggle_{{ $brand->id }}" @checked($brand->status == 'active')
                                        data-id="{{ $brand->id }}" />
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('brand.edit', $brand->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="{{ route('brand.destroy', $brand->id) }}"
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
                const route = "{{ route('admin.brands.toggle-status', ':id') }}".replace(':id', id);
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
