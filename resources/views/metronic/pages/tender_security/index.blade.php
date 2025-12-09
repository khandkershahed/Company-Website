<x-admin-app-layout :title="'Tender Security'">
    <div class="p-4 container-fluid">

        {{-- Success & Error Messages --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4 row g-4">

            {{-- Total Securities --}}
            <div class="col-12 col-md-6 col-xl-4">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center"
                    style="background: linear-gradient(90deg, #fff, #6366f1); min-height:140px;">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Total Securities</h2>
                            <span class="text-black"><i class="bi bi-shield-lock"></i> Overall submissions</span>
                        </div>
                        <div class="text-indigo-600 bg-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            {{ $totalSecurities }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pending Summary (Total + Month Wise) --}}
            <div class="col-12 col-md-6 col-xl-4">
                <div class="p-10 shadow-sm card rounded-4"
                    style="background: linear-gradient(90deg, #fff, #f59e0b); min-height:140px;">
                    <div class="d-flex justify-content-between align-items-start w-100">

                        <div>
                            <h2 class="text-black">Pending</h2>
                            <div class="mt-2">
                                <div class="fw-semibold text-black small">This Month : <span
                                        class="text-dark fw-bold mb-2 fs-4">{{ number_format($thisMonthPending, 2) }}
                                        Tk</span></div>
                                <div class="fw-semibold text-black small">Next Month : <span
                                        class="text-dark fw-bold mb-2 fs-4">{{ number_format($nextMonthPending, 2) }}
                                        Tk</span></div>
                            </div>
                        </div>

                        <div class="text-yellow-600 bg-white rounded-4 d-flex justify-content-center align-items-center"
                            style="width:170px; height:70px; font-size:1.4rem; font-weight:bold;">
                            {{ number_format($totalValue, 2) }} Tk
                        </div>

                    </div>
                </div>
            </div>

            {{-- Returned Summary (Total + Month Wise) --}}
            <div class="col-12 col-md-6 col-xl-4">
                <div class="p-10 shadow-sm card rounded-4"
                    style="background: linear-gradient(90deg, #fff, #10b981); min-height:140px;">
                    <div class="d-flex justify-content-between align-items-start w-100">

                        <div>
                            <h2 class="text-black">Returned</h2>
                            <div class="mt-2">
                                <div class="fw-semibold text-black small">This Month : <span
                                        class="text-dark fw-bold mb-2 fs-4">{{ number_format($thisMonthReturned, 2) }}
                                        Tk</span></div>
                                <div class="fw-semibold text-black small">Next Month : <span
                                        class="text-dark fw-bold mb-2 fs-4">{{ number_format($nextMonthReturned, 2) }}
                                        Tk</span></div>
                            </div>
                        </div>

                        <div class="text-green-600 bg-white rounded-4 d-flex justify-content-center align-items-center"
                            style="width:170px; height:70px; font-size:1.4rem; font-weight:bold;">
                            {{ number_format($returnedSecurities, 2) }} Tk
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div class="card rounded-4">
            <div class="p-5 text-white border card-header d-flex justify-content-between align-items-center"
                style="background: linear-gradient(90deg, #6366f1, #4338ca);">
                <div>
                    <h1 class="mb-0 text-white fw-semibold">Tender Security List</h1>
                    <span class="">Track tender security details and return status</span>
                </div>
                <div class="d-flex align-items-center">
                    {{-- Filter Form --}}
                    <form action="{{ route('admin.tender-security.index') }}" method="GET"
                        class="d-flex align-items-center">
                        <select class="py-3 w-140px form-select form-select-sm form-select-solid" data-control="select2"
                            data-placeholder="Filter Status" data-allow-clear="true" name="status"
                            onchange="this.form.submit()">
                            <option></option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="Returned" {{ request('status') == 'Returned' ? 'selected' : '' }}>Returned
                            </option>
                        </select>
                        @if (request('status'))
                            <a href="{{ route('admin.tender-security.index') }}"
                                class="btn btn-sm btn-white ms-2 bg-white text-danger"><i class="bi bi-x-lg"></i></a>
                        @endif
                    </form>

                    <button class="py-4 btn btn-primary btn-sm ms-3 w-100" data-bs-toggle="modal"
                        data-bs-target="#createModal">
                        <i class="bi bi-plus-lg"></i> Add
                    </button>
                </div>
            </div>

            <div class="p-5 pt-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle border dataTable table-hover rounded-4">
                        <thead class="table-light rounded-4">
                            <tr>
                                <th width="3%" class="ps-5">Sl</th>
                                <th width="12%">Reference/Tender</th>
                                <th width="15%">Tenderer/Company</th>
                                <th width="10%">Amount</th>
                                <th width="10%">Type/PO#</th>
                                <th width="10%">Issued Date</th>
                                <th width="10%">Return Date</th>
                                <th width="8%">Status</th>
                                <th width="10%" class="text-end pe-5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tenderSecurities as $index => $security)
                                <tr class="border-b">
                                    <td class="ps-5">{{ $tenderSecurities->firstItem() + $index }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span
                                                class="fw-bold text-gray-800">{{ $security->reference_no ?? '-' }}</span>
                                            <span
                                                class="text-muted small">{{ Str::limit($security->tender_description, 20) }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">{{ $security->tenderer_name }}</span>
                                            <span
                                                class="text-muted small">{{ Str::limit($security->bank_name, 20) }}</span>
                                        </div>
                                    </td>
                                    <td>{{ number_format($security->amount, 2) }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span
                                                class="badge badge-light-primary">{{ $security->security_type }}</span>
                                            <span
                                                class="text-muted small mt-1">{{ $security->pay_order_number }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $security->issue_date ? $security->issue_date->format('d M, Y') : '-' }}
                                    </td>
                                    <td>
                                        @if ($security->return_date)
                                            {{ $security->return_date->format('d M, Y') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($security->status == 'Returned')
                                            <span class="badge bg-success">Returned</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <button type="button"
                                            class="px-3 me-4 btn btn-sm btn-light text-success edit-btn"
                                            data-id="{{ $security->id }}"
                                            data-tenderer="{{ $security->tenderer_name }}"
                                            data-desc="{{ $security->tender_description }}"
                                            data-amount="{{ $security->amount }}"
                                            data-po="{{ $security->pay_order_number }}"
                                            data-issue="{{ $security->issue_date ? $security->issue_date->format('Y-m-d') : '' }}"
                                            data-return="{{ $security->return_date ? $security->return_date->format('Y-m-d') : '' }}"
                                            data-bank="{{ $security->bank_name }}"
                                            data-type="{{ $security->security_type }}"
                                            data-ref="{{ $security->reference_no }}"
                                            data-contact="{{ $security->contact_person_details }}"
                                            data-status="{{ $security->status }}" data-bs-toggle="modal"
                                            data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a class="delete px-3 btn btn-sm btn-light"
                                            href="{{ route('admin.tender-security.destroy', $security->id) }}">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                        {{-- <form action="{{ route('admin.tender-security.destroy', $security->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">No tender securities found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $tenderSecurities->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="shadow modal-content rounded-4">
                    <div class="text-white border-0 modal-header bg-primary rounded-top-4">
                        <h5 class="modal-title fw-semibold">Add Tender Security</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.tender-security.store') }}" method="POST">
                        @csrf
                        <div class="p-4 modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tenderer Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tenderer_name" class="form-control"
                                        placeholder="Company Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tender Ref / eGP ID</label>
                                    <input type="text" name="reference_no" class="form-control"
                                        placeholder="e.g. eGP Id: 876323">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control"
                                        placeholder="e.g. Pubali Bank Ltd.">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Security Type</label>
                                    <select name="security_type" class="form-select" data-control="select2"
                                        data-dropdown-parent="#createModal">
                                        <option value="">Select Type</option>
                                        <option value="Tender Security">Tender Security</option>
                                        <option value="Tender Security (eGP)">Tender Security (eGP)</option>
                                        <option value="Performance Security">Performance Security</option>
                                        <option value="Pay Order">Pay Order</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Pay Order Number</label>
                                    <input type="text" name="pay_order_number" class="form-control"
                                        placeholder="PO Number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Amount <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="amount" class="form-control"
                                        placeholder="0.00" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Issued Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="issue_date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Return Date</label>
                                    <input type="date" name="return_date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-select" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Returned">Returned</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Contact Details</label>
                                    <textarea name="contact_person_details" class="form-control" rows="1" placeholder="Contact Person"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Tender Description</label>
                                    <textarea name="tender_description" class="form-control" rows="2" placeholder="Description of items/service"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-0 modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Security</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="shadow modal-content rounded-4">
                    <div class="text-white border-0 modal-header bg-primary rounded-top-4">
                        <h5 class="modal-title fw-semibold">Edit Tender Security</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-4 modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tenderer Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tenderer_name" id="edit_tenderer_name"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tender Ref / eGP ID</label>
                                    <input type="text" name="reference_no" id="edit_reference_no"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Bank Name</label>
                                    <input type="text" name="bank_name" id="edit_bank_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Security Type</label>
                                    <select name="security_type" id="edit_security_type" class="form-select"
                                        data-control="select2" data-dropdown-parent="#editModal">
                                        <option value="">Select Type</option>
                                        <option value="Tender Security">Tender Security</option>
                                        <option value="Tender Security (eGP)">Tender Security (eGP)</option>
                                        <option value="Performance Security">Performance Security</option>
                                        <option value="Pay Order">Pay Order</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Pay Order Number</label>
                                    <input type="text" name="pay_order_number" id="edit_pay_order_number"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Amount <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="amount" id="edit_amount"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Issued Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="issue_date" id="edit_issue_date"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Return Date</label>
                                    <input type="date" name="return_date" id="edit_return_date"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" id="edit_status" class="form-select" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Returned">Returned</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Contact Details</label>
                                    <textarea name="contact_person_details" id="edit_contact_person_details" class="form-control" rows="1"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Tender Description</label>
                                    <textarea name="tender_description" id="edit_tender_description" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-0 modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Security</button>
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

                // Edit Inputs
                const eName = document.getElementById('edit_tenderer_name');
                const eRef = document.getElementById('edit_reference_no');
                const eBank = document.getElementById('edit_bank_name');
                const eType = document.getElementById('edit_security_type');
                const ePO = document.getElementById('edit_pay_order_number');
                const eAmt = document.getElementById('edit_amount');
                const eIssue = document.getElementById('edit_issue_date');
                const eReturn = document.getElementById('edit_return_date');
                const eStatus = document.getElementById('edit_status');
                const eContact = document.getElementById('edit_contact_person_details');
                const eDesc = document.getElementById('edit_tender_description');

                editButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');

                        // Update Action URL
                        let actionUrl = "{{ route('admin.tender-security.update', ':id') }}";
                        editForm.action = actionUrl.replace(':id', id);

                        // Populate Fields
                        eName.value = this.getAttribute('data-tenderer');
                        eRef.value = this.getAttribute('data-ref');
                        eBank.value = this.getAttribute('data-bank');
                        ePO.value = this.getAttribute('data-po');
                        eAmt.value = this.getAttribute('data-amount');
                        eIssue.value = this.getAttribute('data-issue');
                        eReturn.value = this.getAttribute('data-return');
                        eStatus.value = this.getAttribute('data-status');
                        eContact.value = this.getAttribute('data-contact');
                        eDesc.value = this.getAttribute('data-desc');

                        // Handle Select2 for Security Type
                        const typeVal = this.getAttribute('data-type');
                        if ($(eType).hasClass("select2-hidden-accessible")) {
                            $(eType).val(typeVal).trigger('change');
                        } else {
                            eType.value = typeVal;
                        }
                    });
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
