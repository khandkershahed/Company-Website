<x-admin-app-layout :title="'All Expense Categories'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Expense Category List</h3>
                <div class="card-toolbar">
                    {{-- Trigger Create Modal --}}
                    <button type="button" class="btn btn-outline btn-outline-info btn-active-light-info" 
                            data-bs-toggle="modal" data-bs-target="#createExpenseCategoryModal">
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
                                <th width="20%">Name</th>
                                <th width="10%">Status</th>
                                {{-- <th width="20%">Comments</th> --}}
                                {{-- <th width="15%">Custom Field</th> --}}
                                <th width="20%">Notes</th>
                                <th width="10%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($expenseCategories->count() > 0)
                                @foreach ($expenseCategories as $key => $expenseCategorie)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $expenseCategorie->name }}</td>
                                        <td>
                                            @if($expenseCategorie->status == 'active')
                                                <span class="badge badge-light-success">Active</span>
                                            @else
                                                <span class="badge badge-light-danger">In Active</span>
                                            @endif
                                        </td>
                                        {{-- <td>{{ $expenseCategorie->comments ?? '-' }}</td> --}}
                                        {{-- <td>{{ $expenseCategorie->custom ?? '-' }}</td> --}}
                                        <td><span class="text-success">{{ $expenseCategorie->notes ?? '-' }}</span></td>
                                        
                                        <td class="text-center">
                                            {{-- Edit Trigger --}}
                                            <a class="text-primary me-2 cursor-pointer" data-bs-toggle="modal"
                                                data-bs-target="#expenceCategory_{{ $expenseCategorie->id }}">
                                                <i class="fa-solid fa-pen-to-square p-1 rounded-circle text-white"
                                                    style="background-color: #247297;"></i>
                                            </a>

                                            {{-- Delete Link --}}
                                            <a href="{{ route('admin.expense-categories.destroy', $expenseCategorie->id) }}"
                                                class="text-danger delete">
                                                <i class="fa-solid fa-trash p-1 rounded-circle text-white"
                                                    style="background-color: #dc3545;"></i>
                                            </a>

                                            {{-- Edit Expense Modal --}}
                                            <div id="expenceCategory_{{ $expenseCategorie->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title text-white">Edit Expense Category</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('admin.expense-categories.update', $expenseCategorie->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body text-start">
                                                                <div class="mb-3">
                                                                    <label class="form-label required">Name</label>
                                                                    <input name="name" value="{{ $expenseCategorie->name }}" type="text" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label required">Status</label>
                                                                    <select name="status" class="form-select" required>
                                                                        <option value="active" {{ $expenseCategorie->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="in_active" {{ $expenseCategorie->status == 'in_active' ? 'selected' : '' }}>In Active</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Comments</label>
                                                                    <input name="comments" value="{{ $expenseCategorie->comments }}" type="text" class="form-control" placeholder="Comments">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Custom Field</label>
                                                                    <input name="custom" value="{{ $expenseCategorie->custom }}" type="text" class="form-control" placeholder="Custom Data">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Notes</label>
                                                                    <textarea name="notes" class="form-control" rows="2">{{ $expenseCategorie->notes }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-info text-white">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Edit Modal --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No expense categories found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Expense Modal --}}
    <div class="modal fade" id="createExpenseCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Add New Expense Category</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.expense-categories.store') }}" method="post">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Category Name" required>
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
                            <input name="comments" type="text" class="form-control" placeholder="Enter Comments">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Custom Field</label>
                            <input name="custom" type="text" class="form-control" placeholder="Enter Custom Data">
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