<x-admin-app-layout :title="'All Expense Types'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Expense Types List</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-outline btn-outline-info btn-active-light-info"
                        data-bs-toggle="modal" data-bs-target="#createExpenseTypeModal">
                        Add New
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                <th width="5%" class="text-center">#</th>
                                <th width="15%">Category</th>
                                <th width="15%">Name</th>
                                <th width="10%">Status</th>
                                <th width="15%">Comments</th>
                                <th width="15%">Custom</th>
                                <th width="15%">Notes</th>
                                <th width="10%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expenseTypes as $key => $type)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td>
                                        <span class="badge badge-light-primary">
                                            {{ $type->expenseCategory->name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        @if ($type->status == 'active')
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">In Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $type->comments ?? '-' }}</td>
                                    <td>{{ $type->custom ?? '-' }}</td>
                                    <td><span class="text-success">{{ $type->notes ?? '-' }}</span></td>

                                    <td class="text-center">
                                        <a class="text-primary me-2 cursor-pointer" data-bs-toggle="modal"
                                            data-bs-target="#editExpenseType_{{ $type->id }}">
                                            <i class="fa-solid fa-pen-to-square p-1 rounded-circle text-white"
                                                style="background-color: #247297;"></i>
                                        </a>

                                        <a href="{{ route('admin.expense-types.destroy', $type->id) }}"
                                            class="text-danger delete">
                                            <i class="fa-solid fa-trash p-1 rounded-circle text-white"
                                                style="background-color: #dc3545;"></i>
                                        </a>

                                        {{-- Edit Modal --}}
                                        <div id="editExpenseType_{{ $type->id }}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title text-white">Edit Expense Type</h5>
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('admin.expense-types.update', $type->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body text-start">
                                                            <div class="mb-3">
                                                                <label class="form-label required">Category</label>
                                                                <select name="expense_category_id" class="form-select"
                                                                    data-control="select2"
                                                                    data-dropdown-parent="#editExpenseType_{{ $type->id }}"
                                                                    required>
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($expenseCategorys as $cat)
                                                                        <option value="{{ $cat->id }}"
                                                                            {{ $type->expense_category_id == $cat->id ? 'selected' : '' }}>
                                                                            {{ $cat->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label required">Name</label>
                                                                <input name="name" value="{{ $type->name }}"
                                                                    type="text" class="form-control" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label required">Status</label>
                                                                <select name="status" class="form-select" required>
                                                                    <option value="active"
                                                                        {{ $type->status == 'active' ? 'selected' : '' }}>
                                                                        Active</option>
                                                                    <option value="in_active"
                                                                        {{ $type->status == 'in_active' ? 'selected' : '' }}>
                                                                        In Active</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Comments</label>
                                                                <input name="comments" value="{{ $type->comments }}"
                                                                    type="text" class="form-control">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Custom Field</label>
                                                                <input name="custom" value="{{ $type->custom }}"
                                                                    type="text" class="form-control">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Notes</label>
                                                                <textarea name="notes" class="form-control" rows="2">{{ $type->notes }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-info text-white">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Edit Modal --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No expense types found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <div class="modal fade" id="createExpenseTypeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Add New Expense Type</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.expense-types.store') }}" method="post">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label required">Category</label>
                            <select name="expense_category_id" class="form-select" data-control="select2"
                                data-dropdown-parent="#createExpenseTypeModal" required>
                                <option value="">Select Category</option>
                                @foreach ($expenseCategorys as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Type Name"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="active" selected>Active</option>
                                <option value="in_active">In Active</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comments</label>
                            <input name="comments" type="text" class="form-control" placeholder="Comments">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Custom Field</label>
                            <input name="custom" type="text" class="form-control" placeholder="Custom Data">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="Enter Notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>
