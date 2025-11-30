<x-admin-app-layout :title="'Expenses'">
    <div class="container-xl">
        <div class="card shadow-sm rounded-4">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Expense List</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Manage daily expenses</span>
                </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="ki-duotone ki-plus fs-2"></i> Add Expense
                    </button>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="w-25px">#</th>
                                <th class="min-w-100px">Date</th>
                                <th class="min-w-150px">Category / Type</th>
                                <th class="min-w-200px">Particulars</th>
                                <th class="min-w-100px text-end">Amount</th>
                                <th class="min-w-100px text-center">Voucher</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expenses as $expense)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-bold text-gray-800">{{ $expense->date->format('d M, Y') }}</div>
                                    <div class="text-muted fs-7">{{ $expense->month }}</div>
                                </td>
                                <td>
                                    {{-- Use relationship or fallback to string column --}}
                                    <div class="text-dark fw-bold text-hover-primary fs-6">
                                        {{ $expense->expenseCategoryRelation->name ?? $expense->category }}
                                    </div>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">
                                        {{ $expense->expenseTypeRelation->name ?? $expense->type }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-gray-800 fw-bold d-block fs-6">{{ Str::limit($expense->particulars, 30) }}</span>
                                    <span class="text-muted fw-semibold d-block fs-7">{{ Str::limit($expense->comment, 30) }}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-dark fw-bold d-block fs-6">{{ number_format($expense->amount, 2) }}</span>
                                </td>
                                <td class="text-center">
                                    @if($expense->voucher)
                                        <a href="{{ asset('storage/files/' . $expense->voucher) }}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="fa-solid fa-file-pdf fs-3 text-danger"></i>
                                        </a>
                                    @else
                                        <span class="badge badge-light">No File</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn"
                                        data-id="{{ $expense->id }}"
                                        data-date="{{ $expense->date->format('Y-m-d') }}"
                                        data-category="{{ $expense->expense_category }}" 
                                        data-type="{{ $expense->expense_type }}"
                                        data-particulars="{{ $expense->particulars }}"
                                        data-amount="{{ $expense->amount }}"
                                        data-comment="{{ $expense->comment }}"
                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fas fa-pencil-alt fs-2">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i>
                                    </button>
                                    
                                    {{-- <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                            <i class="ki-duotone ki-trash fs-2">
                                                <span class="path1"></span><span class="path2"></span>
                                            </i>
                                        </button>
                                    </form> --}}
                                    <a href="{{ route('admin.expenses.destroy', $expense->id) }}" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted fw-bold fs-6 py-5">No expenses found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form action="{{ route('admin.expenses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Add Expense</h1>
                        </div>
                        
                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Date</label>
                                <input type="date" class="form-control form-control-solid" name="date" required value="{{ date('Y-m-d') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Category</label>
                                <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#createModal" name="expense_category" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Expense Type</label>
                                <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#createModal" name="expense_type">
                                    <option value="">Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Amount</label>
                                <input type="number" step="0.01" class="form-control form-control-solid" name="amount" placeholder="0.00" required />
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Particulars</label>
                            <textarea class="form-control form-control-solid" rows="2" name="particulars" placeholder="Short description"></textarea>
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Upload Voucher</label>
                            <input type="file" class="form-control form-control-solid" name="voucher" accept=".pdf,.png,.jpg,.jpeg" />
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Comments</label>
                            <textarea class="form-control form-control-solid" rows="2" name="comment"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Edit Expense</h1>
                        </div>
                        
                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Date</label>
                                <input type="date" class="form-control form-control-solid" name="date" id="e_date" required />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Category</label>
                                <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#editModal" name="expense_category" id="e_category" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Expense Type</label>
                                <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#editModal" name="expense_type" id="e_type">
                                    <option value="">Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Amount</label>
                                <input type="number" step="0.01" class="form-control form-control-solid" name="amount" id="e_amount" required />
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Particulars</label>
                            <textarea class="form-control form-control-solid" rows="2" name="particulars" id="e_particulars"></textarea>
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">New Voucher (Optional)</label>
                            <input type="file" class="form-control form-control-solid" name="voucher" accept=".pdf,.png,.jpg,.jpeg" />
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Comments</label>
                            <textarea class="form-control form-control-solid" rows="2" name="comment" id="e_comment"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            const editForm = document.getElementById('editForm');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const actionUrl = "{{ route('admin.expenses.update', ':id') }}".replace(':id', id);
                    editForm.action = actionUrl;

                    document.getElementById('e_date').value = this.dataset.date;
                    document.getElementById('e_amount').value = this.dataset.amount;
                    document.getElementById('e_particulars').value = this.dataset.particulars;
                    document.getElementById('e_comment').value = this.dataset.comment;

                    // Trigger Select2 updates
                    $('#e_category').val(this.dataset.category).trigger('change');
                    $('#e_type').val(this.dataset.type).trigger('change');
                });
            });
        });
    </script>
    @endpush
</x-admin-app-layout>