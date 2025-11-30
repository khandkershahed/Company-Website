<x-admin-app-layout :title="'Incomes'">
    <div class="container-xl">
        <div class="card shadow-sm rounded-4">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Income List</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Track all revenue and payments</span>
                </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-light-success" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="ki-duotone ki-plus fs-2"></i> Add Income
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
                                <th class="min-w-150px">Client / RFQ</th>
                                <th class="min-w-150px">Type / PO Ref</th>
                                <th class="min-w-100px text-end">Amount</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($incomes as $income)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-bold text-gray-800">{{ $income->date ? $income->date->format('d M, Y') : '-' }}</div>
                                    <div class="text-muted fs-7">{{ $income->month }}</div>
                                </td>
                                <td>
                                    <div class="text-dark fw-bold text-hover-primary fs-6">{{ $income->client_name ?? 'N/A' }}</div>
                                    @if($income->rfq)
                                        <span class="badge badge-light-primary fw-bold">{{ $income->rfq->rfq_code }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-gray-800 fw-bold">{{ ucfirst($income->type) }}</div>
                                    <div class="text-muted fs-7">{{ $income->po_reference }}</div>
                                </td>
                                <td class="text-end">
                                    <span class="text-success fw-bold d-block fs-6">+ {{ number_format($income->amount, 2) }}</span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn"
                                        data-id="{{ $income->id }}"
                                        data-date="{{ $income->date ? $income->date->format('Y-m-d') : '' }}"
                                        data-rfq="{{ $income->rfq_id }}"
                                        data-client="{{ $income->client_name }}"
                                        data-type="{{ $income->type }}"
                                        data-po="{{ $income->po_reference }}"
                                        data-amount="{{ $income->amount }}"
                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="ki-duotone ki-pencil fs-2">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i>
                                    </button>
                                    
                                    <form action="{{ route('admin.incomes.destroy', $income->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                            <i class="ki-duotone ki-trash fs-2">
                                                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                            </i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted fw-bold fs-6 py-5">No income records found</td>
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
                    <form action="{{ route('admin.incomes.store') }}" method="POST">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Add Income</h1>
                        </div>
                        
                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Date</label>
                                <input type="date" class="form-control form-control-solid" name="date" required value="{{ date('Y-m-d') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Related RFQ</label>
                                <select class="form-select form-select-solid rfq-select" data-control="select2" data-dropdown-parent="#createModal" name="rfq_id" data-placeholder="Select RFQ">
                                    <option value="">None (Independent Income)</option>
                                    @foreach($rfqs as $rfq)
                                        <option value="{{ $rfq->id }}">
                                            {{ $rfq->rfq_code }} - {{ $rfq->name }} ({{ $rfq->company_name ?? 'No Company' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Client Name</label>
                                <input type="text" class="form-control form-control-solid client-name-input" name="client_name" placeholder="Client Name" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Amount</label>
                                <input type="number" step="0.01" class="form-control form-control-solid" name="amount" placeholder="0.00" required />
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Type</label>
                                <select class="form-select form-select-solid" name="type">
                                    <option value="corporate">Corporate</option>
                                    <option value="online">Online</option>
                                    <option value="government">Government</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">PO Reference</label>
                                <input type="text" class="form-control form-control-solid" name="po_reference" placeholder="PO-12345" />
                            </div>
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
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Edit Income</h1>
                        </div>
                        
                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Date</label>
                                <input type="date" class="form-control form-control-solid" name="date" id="e_date" required />
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Related RFQ</label>
                                <select class="form-select form-select-solid rfq-select" data-control="select2" data-dropdown-parent="#editModal" name="rfq_id" id="e_rfq" data-placeholder="Select RFQ">
                                    <option value="">None (Independent Income)</option>
                                    @foreach($rfqs as $rfq)
                                        <option value="{{ $rfq->id }}">
                                            {{ $rfq->rfq_code }} - {{ $rfq->name }} ({{ $rfq->company_name ?? 'No Company' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Client Name</label>
                                <input type="text" class="form-control form-control-solid client-name-input" name="client_name" id="e_client" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Amount</label>
                                <input type="number" step="0.01" class="form-control form-control-solid" name="amount" id="e_amount" required />
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Type</label>
                                <select class="form-select form-select-solid" name="type" id="e_type">
                                    <option value="corporate">Corporate</option>
                                    <option value="online">Online</option>
                                    <option value="government">Government</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">PO Reference</label>
                                <input type="text" class="form-control form-control-solid" name="po_reference" id="e_po" />
                            </div>
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
            // Function to handle RFQ change and autofill
            function handleRfqChange(selectElement, clientInputSelector) {
                const rfqId = $(selectElement).val();
                if (rfqId) {
                    $.ajax({
                        url: "{{ url('admin/incomes/get-rfq-details') }}/" + rfqId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                // Auto-fill Client Name
                                const name = response.company_name ? response.company_name : response.client_name;
                                $(clientInputSelector).val(name);
                            }
                        }
                    });
                }
            }

            // Bind change events to RFQ Selects
            $('#createModal .rfq-select').on('change', function() {
                handleRfqChange(this, '#createModal .client-name-input');
            });

            $('#editModal .rfq-select').on('change', function() {
                handleRfqChange(this, '#editModal .client-name-input');
            });

            // Edit Button Logic
            const editButtons = document.querySelectorAll('.edit-btn');
            const editForm = document.getElementById('editForm');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const actionUrl = "{{ route('admin.incomes.update', ':id') }}".replace(':id', id);
                    editForm.action = actionUrl;

                    document.getElementById('e_date').value = this.dataset.date;
                    document.getElementById('e_client').value = this.dataset.client;
                    document.getElementById('e_amount').value = this.dataset.amount;
                    document.getElementById('e_type').value = this.dataset.type;
                    document.getElementById('e_po').value = this.dataset.po;

                    // Update Select2 for RFQ
                    $('#e_rfq').val(this.dataset.rfq).trigger('change');
                });
            });
        });
    </script>
    @endpush
</x-admin-app-layout>