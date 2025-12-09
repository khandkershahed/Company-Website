<x-admin-app-layout :title="'Tender Access Passes'">
    <div class="p-4 container-fluid">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card rounded-4">
            <div class="p-5 text-black border card-header d-flex justify-content-between align-items-center"
                style="background: #f5ecec;">
                <div>
                    <h1 class="mb-0 text-info fw-semibold">Tender Access Passes</h1>
                </div>
                <button type="button" class="py-3 btn btn-outline btn-outline-info btn-active-light-info"
                    data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-plus-lg"></i> Add Access Pass
                </button>
            </div>

            <div class="p-5 pt-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle border dataTable table-hover rounded-4">
                        <thead class="table-light rounded-4">
                            <tr>
                                <th width="5%" class="ps-5">ID</th>
                                <th width="15%">Organization</th>
                                <th width="15%">Sector</th>
                                <th width="15%">Login URL</th>
                                <th width="15%">Username / Email</th>
                                <th width="15%">Password</th>
                                <th width="20%" class="text-end pe-5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tenderAccessPasses as $pass)
                                <tr>
                                    <td class="ps-5">{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $pass->organization }}</td>
                                    <td>
                                        @if ($pass->sector)
                                            <span
                                                class="badge badge-light-primary text-primary">{{ $pass->sector->name }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pass->login_url)
                                            <a href="{{ $pass->login_url }}" target="_blank"
                                                class="text-decoration-underline text-truncate d-inline-block"
                                                style="max-width: 150px;">
                                                Link <i class="bi bi-box-arrow-up-right small"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $pass->username ?? '-' }}</td>
                                    <td>
                                        <div class="input-group input-group-sm" style="width: 160px;">
                                            {{-- Hidden Password Field --}}
                                            <input type="password"
                                                class="form-control form-control-solid bg-transparent border-0 px-2"
                                                value="{{ $pass->password ?? '' }}" readonly
                                                id="pass-{{ $pass->id }}">

                                            {{-- Toggle Show/Hide --}}
                                            <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                type="button"
                                                onclick="togglePassword('pass-{{ $pass->id }}', this)">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                            {{-- Copy Button --}}
                                            <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                type="button" onclick="copyPassword('pass-{{ $pass->id }}', this)"
                                                title="Copy">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-end pe-5">
                                        <button type="button" class="btn btn-sm btn-light text-info me-5"
                                            data-bs-toggle="modal" data-bs-target="#showModal-{{ $pass->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button"
                                            class="px-3 btn btn-sm btn-light text-success edit-btn me-4"
                                            data-id="{{ $pass->id }}" data-org="{{ $pass->organization }}"
                                            data-sector="{{ $pass->sector_id }}" data-url="{{ $pass->login_url }}"
                                            data-username="{{ $pass->username }}"
                                            data-password="{{ $pass->password }}"
                                            data-verify="{{ $pass->verification_details }}"
                                            data-email="{{ $pass->recovery_email }}" data-notes="{{ $pass->notes }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a class="delete"
                                            href="{{ route('admin.tender-access-pass.destroy', $pass->id) }}">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>


                                        {{-- <form action="{{ route('admin.tender-access-pass.destroy', $pass->id) }}"
                                            method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 btn btn-sm btn-light text-danger">
                                                
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                                <div class="modal fade" id="showModal-{{ $pass->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content rounded-4">

                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">Access Pass Details</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row g-3">

                                                    <div class="col-md-6">
                                                        <label class="fw-semibold d-block mb-1">Organization</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            {{ $pass->organization }}</div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="fw-semibold d-block mb-1">Sector</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            {{ $pass->sector->name ?? '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="fw-semibold d-block mb-1">Login URL</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            @if ($pass->login_url)
                                                                <a href="{{ $pass->login_url }}" target="_blank">
                                                                    {{ $pass->login_url }}
                                                                </a>
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="fw-semibold d-block mb-1">Recovery Email</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            {{ $pass->recovery_email ?? '-' }}</div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="fw-semibold d-block mb-1">Username / ID</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            {{ $pass->username ?? '-' }}</div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="fw-semibold d-block mb-1">Password</label>
                                                        <div
                                                            class="p-3 border rounded bg-light d-flex align-items-center gap-2">

                                                            <input type="password"
                                                                class="form-control form-control-solid bg-transparent border-0 px-2"
                                                                value="{{ $pass->password ?? '' }}" readonly
                                                                id="modal-pass-{{ $pass->id }}">

                                                            {{-- Toggle Show/Hide --}}
                                                            <button
                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                                type="button"
                                                                onclick="togglePassword('modal-pass-{{ $pass->id }}', this)">
                                                                <i class="bi bi-eye"></i>
                                                            </button>

                                                            {{-- Copy Button --}}
                                                            <button
                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                                type="button"
                                                                onclick="copyPassword('modal-pass-{{ $pass->id }}', this)"
                                                                title="Copy">
                                                                <i class="bi bi-clipboard"></i>
                                                            </button>

                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <label class="fw-semibold d-block mb-1">Verification
                                                            Details</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            {{ $pass->verification_details ?? '-' }}</div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="fw-semibold d-block mb-1">Notes</label>
                                                        <div class="p-3 border rounded bg-light">
                                                            {{ $pass->notes ?? '-' }}</div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">No access passes found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $tenderAccessPasses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Access Pass</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tender-access-pass.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Organization Name <span class="text-danger">*</span></label>
                                <input type="text" name="organization" class="form-control form-control-solid"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Industrial Sector</label>
                                <select name="sector_id" class="form-select form-select-solid" data-control="select2"
                                    data-dropdown-parent="#createModal" data-placeholder="Select Sector">
                                    <option value=""></option>
                                    @foreach ($sectors as $sector)
                                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Login URL</label>
                                <input type="url" name="login_url" class="form-control form-control-solid"
                                    placeholder="https://...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Recovery Email</label>
                                <input type="email" name="recovery_email" class="form-control form-control-solid">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Username / ID</label>
                                <input type="text" name="username" class="form-control form-control-solid">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" class="form-control form-control-solid">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Verification Details</label>
                                <textarea name="verification_details" class="form-control form-control-solid" rows="2"
                                    placeholder="Secret questions, codes, etc."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control form-control-solid" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Pass</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Access Pass</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Organization Name <span class="text-danger">*</span></label>
                                <input type="text" name="organization" id="edit_organization"
                                    class="form-control form-control-solid" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Industrial Sector</label>
                                <select name="sector_id" id="edit_sector_id" class="form-select form-select-solid"
                                    data-control="select2" data-dropdown-parent="#editModal">
                                    <option value="">Select Sector</option>
                                    @foreach ($sectors as $sector)
                                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Login URL</label>
                                <input type="url" name="login_url" id="edit_login_url"
                                    class="form-control form-control-solid">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Recovery Email</label>
                                <input type="email" name="recovery_email" id="edit_recovery_email"
                                    class="form-control form-control-solid">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Username / ID</label>
                                <input type="text" name="username" id="edit_username"
                                    class="form-control form-control-solid">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" id="edit_password"
                                    class="form-control form-control-solid">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Verification Details</label>
                                <textarea name="verification_details" id="edit_verification_details" class="form-control form-control-solid"
                                    rows="2"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" id="edit_notes" class="form-control form-control-solid" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Pass</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Toggle Password Visibility
            function togglePassword(inputId, btn) {
                const input = document.getElementById(inputId);
                const icon = btn.querySelector('i');

                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                }
            }

            // Copy Password to Clipboard
            function copyPassword(inputId, btn) {
                const input = document.getElementById(inputId);

                // Use Navigator API for clipboard
                navigator.clipboard.writeText(input.value).then(() => {
                    // Visual feedback
                    const originalIcon = btn.innerHTML;
                    btn.innerHTML = '<i class="bi bi-check-lg text-success"></i>'; // Change to checkmark

                    setTimeout(() => {
                        btn.innerHTML = originalIcon; // Revert back after 1.5s
                    }, 1500);
                }).catch(err => {
                    console.error('Failed to copy text: ', err);
                });
            }

            document.addEventListener("DOMContentLoaded", function() {
                const editButtons = document.querySelectorAll('.edit-btn');
                const editForm = document.getElementById('editForm');

                // Inputs
                const eOrg = document.getElementById('edit_organization');
                const eSector = document.getElementById('edit_sector_id');
                const eUrl = document.getElementById('edit_login_url');
                const eUser = document.getElementById('edit_username');
                const ePass = document.getElementById('edit_password');
                const eVerify = document.getElementById('edit_verification_details');
                const eEmail = document.getElementById('edit_recovery_email');
                const eNotes = document.getElementById('edit_notes');

                editButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');

                        // Update Action URL (Ensuring route name matches controller)
                        let actionUrl = "{{ route('admin.tender-access-pass.update', ':id') }}";
                        editForm.action = actionUrl.replace(':id', id);

                        // Populate Fields
                        eOrg.value = this.getAttribute('data-org');
                        eUrl.value = this.getAttribute('data-url');
                        eUser.value = this.getAttribute('data-username');
                        ePass.value = this.getAttribute('data-password');
                        eVerify.value = this.getAttribute('data-verify');
                        eEmail.value = this.getAttribute('data-email');
                        eNotes.value = this.getAttribute('data-notes');

                        // Handle Select2
                        const sectorId = this.getAttribute('data-sector');
                        if ($(eSector).hasClass("select2-hidden-accessible")) {
                            $(eSector).val(sectorId).trigger('change');
                        } else {
                            eSector.value = sectorId;
                        }
                    });
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
