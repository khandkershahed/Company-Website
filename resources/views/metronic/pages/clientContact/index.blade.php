<x-admin-app-layout :title="'Client Contacts'">
    <div class="content d-flex flex-column flex-column-fluid py-0" style="background-color: white" id="kt_content">
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="app-container container-fluid py-10">
                
                <div class="card shadow-sm mb-6">
                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_filter_collapsible">
                        <h3 class="card-title">Advanced Filters</h3>
                        <div class="card-toolbar rotate-180">
                            <i class="bi bi-chevron-down fs-1"></i>
                        </div>
                    </div>
                    <div id="kt_filter_collapsible" class="collapse show">
                        <div class="card-body">
                            <form action="{{ route('admin.client-contact.index') }}" method="GET">
                                <div class="row g-5">
                                    <div class="col-md-3">
                                        <label class="form-label">Sector</label>
                                        <select name="sector_id" id="f_sector_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Sector" data-allow-clear="true">
                                            <option></option>
                                            @foreach($sectors as $s)
                                                <option value="{{ $s->id }}" {{ request('sector_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Sub Sector</label>
                                        <select name="sub_sector_id" id="f_sub_sector_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Sub Sector" data-allow-clear="true">
                                            <option></option>
                                            @foreach($subSectors as $sub)
                                                <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}" {{ request('sub_sector_id') == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" name="company_name" class="form-control form-control-solid" placeholder="Search Company" value="{{ request('company_name') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Client Name</label>
                                        <input type="text" name="contact_person" class="form-control form-control-solid" placeholder="Contact Person" value="{{ request('contact_person') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control form-control-solid" placeholder="Official or Personal" value="{{ request('phone') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designation" class="form-control form-control-solid" placeholder="Designation" value="{{ request('designation') }}">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                                        <a href="{{ route('admin.client-contact.index') }}" class="btn btn-light me-3">Reset</a>
                                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="card h-lg-100 shadow-sm">
                            <div class="card-body text-center">
                                <div class="m-0"><i class="fa-solid fa-users fs-2hx text-gray-600"></i></div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-semibold fs-5x text-gray-800 lh-1 ls-n2">{{ $totalClients }}</span>
                                    <div class="m-0"><span class="fw-semibold fs-6 text-gray-500">Filtered Contacts</span></div>
                                    <span class="small text-muted">({{ $totalCompanies }} Companies)</span>
                                </div>
                                <span class="badge badge-light-success fs-base"><i class="fa-solid fa-arrow-up fs-5 text-success ms-n1"></i> Active</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="card mt-6 shadow-sm mt-lg-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="p-5">
                                    <h1 class="my-0 text-primary">Client Contact Information</h1>
                                    <p class="my-0 pt-2">Grouped by Company & Sector</p>
                                </div>
                                <div class="pe-5">
                                    <button type="button" class="btn btn-color-black btn-sm bg-primary bg-opacity-15 bg-hover-opacity-25 fw-semibold" 
                                            data-bs-toggle="modal" data-bs-target="#createModal">
                                        <i class="fa-solid fa-plus"></i> Add Client
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped border mb-0">
                                        <thead>
                                            <tr class="fw-bold fs-5">
                                                <th class="ps-3">Sector</th> <th class="text-center">Total</th>
                                                <th>Sector</th> <th class="text-center">Total</th>
                                                <th>Sector</th> <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sectors->chunk(3) as $chunk)
                                            <tr>
                                                @foreach($chunk as $sector)
                                                    <td class="ps-3">{{ $sector->name }}</td>
                                                    <td class="text-center fw-bold">{{ $sectorStats[$sector->id] ?? 0 }}</td>
                                                @endforeach
                                                @for($i = count($chunk); $i < 3; $i++) <td></td><td></td> @endfor
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-6 shadow-sm">
                            <div class="card-body p-2">
                                <div class="table-responsive">
                                    <table class="table table-row-bordered gy-5 gs-7 border rounded align-middle">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800 bg-light">
                                                <th width="5%">Sl</th>
                                                <th width="20%">Contact Person</th>
                                                <th width="15%">Designation</th>
                                                <th width="15%">Phone/Email</th>
                                                <th width="10%">Dept.</th>
                                                <th width="10%">Status</th>
                                                @if($isSuperAdmin) <th>Access</th> @endif
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($groupedContacts as $companyName => $contacts)
                                                <tr class="bg-light-primary border-bottom-2 border-primary">
                                                    <td colspan="{{ $isSuperAdmin ? 8 : 7 }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-35px me-3">
                                                                <span class="symbol-label bg-primary text-white fw-bold fs-5">{{ substr($companyName, 0, 1) }}</span>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span class="fs-4 fw-bold text-dark">{{ $companyName }}</span>
                                                                <span class="fs-7 text-muted">
                                                                    {{ $contacts->first()->sector->name ?? 'No Sector' }} 
                                                                    @if($contacts->first()->subSector)
                                                                        <i class="bi bi-arrow-right mx-1 small"></i> {{ $contacts->first()->subSector->name }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @foreach($contacts as $contact)
                                                <tr class="hover-elevate-up">
                                                    <td class="ps-5">{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span class="fw-bold text-dark">{{ $contact->contact_person }}</span>
                                                        <div class="text-muted fs-8">{{ $contact->area ?? 'No Area' }}</div>
                                                    </td>
                                                    <td>{{ $contact->designation }}</td>
                                                    <td>
                                                        @if($contact->official_phone)<div class="fs-7"><i class="bi bi-telephone me-1"></i> {{ $contact->official_phone }}</div>@endif
                                                        @if($contact->email)<div class="fs-7 text-primary"><i class="bi bi-envelope me-1"></i> {{ $contact->email }}</div>@endif
                                                    </td>
                                                    <td>{{ $contact->department }}</td>
                                                    <td>
                                                        <span class="badge {{ $contact->status == 'Active' ? 'badge-light-success' : 'badge-light-danger' }}">
                                                            {{ $contact->status }}
                                                        </span>
                                                    </td>
                                                    
                                                    @if($isSuperAdmin)
                                                    <td>
                                                        <div class="symbol-group symbol-hover">
                                                            @foreach($contact->permittedUsers as $u)
                                                                <div class="symbol symbol-25px circle" data-bs-toggle="tooltip" title="{{ $u->name }}">
                                                                    <div class="symbol-label bg-light-info text-info fs-8 fw-bold">{{ substr($u->name, 0, 1) }}</div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    @endif

                                                    <td class="text-end">
                                                        <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn"
                                                            data-id="{{ $contact->id }}"
                                                            data-company="{{ $contact->company_name }}"
                                                            data-sector="{{ $contact->sector_id }}"
                                                            data-subsector="{{ $contact->sub_sector_id }}"
                                                            data-person="{{ $contact->contact_person }}"
                                                            data-designation="{{ $contact->designation }}"
                                                            data-department="{{ $contact->department }}"
                                                            data-ophone="{{ $contact->official_phone }}"
                                                            data-pphone="{{ $contact->personal_phone }}"
                                                            data-email="{{ $contact->email }}"
                                                            data-area="{{ $contact->area }}"
                                                            data-status="{{ $contact->status }}"
                                                            data-tier="{{ $contact->tier }}"
                                                            data-address="{{ $contact->address }}"
                                                            data-comments="{{ $contact->comments }}"
                                                            data-users="{{ $contact->permittedUsers->pluck('id') }}"
                                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </button>
                                                        <form action="{{ route('admin.client-contact.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                            @csrf @method('DELETE')
                                                            <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @empty
                                                <tr><td colspan="8" class="text-center py-5">No contacts found matching criteria.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header"><h5 class="modal-title fw-bold">Add Client Contact</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form action="{{ route('admin.client-contact.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label required">Company Name</label>
                                <select name="company_name" class="form-select form-select-solid company-ajax" data-dropdown-parent="#createModal" required>
                                    <option></option>
                                </select>
                                <div class="form-text">Type to search existing or add new.</div>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Sector</label>
                                <select name="sector_id" id="c_sector_id" class="form-select form-select-solid sector-select" data-control="select2" data-dropdown-parent="#createModal" data-placeholder="Select Sector">
                                    <option></option>
                                    @foreach($sectors as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sub Sector</label>
                                <select name="sub_sector_id" id="c_sub_sector_id" class="form-select form-select-solid sub-sector-select" data-control="select2" data-dropdown-parent="#createModal" data-placeholder="Select Sub Sector">
                                    <option></option>
                                    @foreach($subSectors as $sub)
                                        <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6"><label class="form-label">Contact Person</label><input type="text" name="contact_person" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Designation</label><input type="text" name="designation" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Department</label><input type="text" name="department" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Official Phone</label><input type="text" name="official_phone" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Personal Phone</label><input type="text" name="personal_phone" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Area</label><input type="text" name="area" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Status</label><select name="status" class="form-select form-select-solid"><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div>
                            <div class="col-md-6"><label class="form-label">Tier</label><input type="text" name="tier" class="form-control form-control-solid"></div>
                            <div class="col-12"><label class="form-label">Address</label><textarea name="address" class="form-control form-control-solid" rows="2"></textarea></div>
                            <div class="col-12"><label class="form-label">Comments</label><textarea name="comments" class="form-control form-control-solid" rows="2"></textarea></div>

                            @if($isSuperAdmin)
                                <div class="col-12"><div class="separator my-5"></div><h6 class="text-dark">Access (Super Admin)</h6>
                                <select name="permitted_users[]" class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#createModal" multiple data-placeholder="Select Users">
                                    @foreach($users as $u) <option value="{{ $u->id }}">{{ $u->name }}</option> @endforeach
                                </select></div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button><button type="submit" class="btn btn-primary">Save</button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header"><h5 class="modal-title fw-bold">Edit Client Contact</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form id="editForm" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label required">Company Name</label>
                                <select name="company_name" id="e_company_name" class="form-select form-select-solid company-ajax" data-dropdown-parent="#editModal" required>
                                    <option></option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Sector</label>
                                <select name="sector_id" id="e_sector_id" class="form-select form-select-solid sector-select" data-control="select2" data-dropdown-parent="#editModal">
                                    <option></option>
                                    @foreach($sectors as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sub Sector</label>
                                <select name="sub_sector_id" id="e_sub_sector_id" class="form-select form-select-solid sub-sector-select" data-control="select2" data-dropdown-parent="#editModal">
                                    <option></option>
                                    @foreach($subSectors as $sub)
                                        <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6"><label class="form-label">Contact Person</label><input type="text" name="contact_person" id="e_contact_person" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Designation</label><input type="text" name="designation" id="e_designation" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Department</label><input type="text" name="department" id="e_department" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Official Phone</label><input type="text" name="official_phone" id="e_official_phone" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Personal Phone</label><input type="text" name="personal_phone" id="e_personal_phone" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" id="e_email" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Area</label><input type="text" name="area" id="e_area" class="form-control form-control-solid"></div>
                            <div class="col-md-6"><label class="form-label">Status</label><select name="status" id="e_status" class="form-select form-select-solid"><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div>
                            <div class="col-md-6"><label class="form-label">Tier</label><input type="text" name="tier" id="e_tier" class="form-control form-control-solid"></div>
                            <div class="col-12"><label class="form-label">Address</label><textarea name="address" id="e_address" class="form-control form-control-solid" rows="2"></textarea></div>
                            <div class="col-12"><label class="form-label">Comments</label><textarea name="comments" id="e_comments" class="form-control form-control-solid" rows="2"></textarea></div>

                            @if($isSuperAdmin)
                                <div class="col-12"><div class="separator my-5"></div><h6 class="text-dark">Access (Super Admin)</h6>
                                <select name="permitted_users[]" id="e_permitted_users" class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#editModal" multiple>
                                    @foreach($users as $u) <option value="{{ $u->id }}">{{ $u->name }}</option> @endforeach
                                </select></div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button><button type="submit" class="btn btn-primary">Update</button></div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Company AJAX Search (Select2)
            $('.company-ajax').select2({
                tags: true, placeholder: "Search or type new Company", minimumInputLength: 1,
                ajax: {
                    url: "{{ route('admin.client-contact.search') }}", dataType: 'json', delay: 250,
                    data: function (params) { return { term: params.term }; },
                    processResults: function (data) { return { results: data.results }; }
                }
            });

            // 2. Dependent Dropdown Logic (Sector -> Sub Sector)
            function filterSubSectors(sectorSelect, subSectorSelect) {
                const selectedSectorId = $(sectorSelect).val();
                const $subOptions = $(subSectorSelect).find('option');
                $(subSectorSelect).val(null).trigger('change');
                if (!selectedSectorId) { $subOptions.prop('disabled', true); return; }
                $subOptions.each(function() {
                    const parentId = $(this).data('parent');
                    $(this).prop('disabled', !(parentId == selectedSectorId || $(this).val() == ""));
                });
                const dropdownParent = $(sectorSelect).closest('.modal').length ? $(sectorSelect).closest('.modal') : null;
                $(subSectorSelect).select2({ dropdownParent: dropdownParent, placeholder: "Select Sub Sector" });
            }

            $('#c_sector_id').on('change', function() { filterSubSectors(this, '#c_sub_sector_id'); });
            $('#e_sector_id').on('change', function() { filterSubSectors(this, '#e_sub_sector_id'); });
            $('#f_sector_id').on('change', function() { filterSubSectors(this, '#f_sub_sector_id'); });

            // 3. Edit Modal Populating
            $('.edit-btn').on('click', function() {
                const id = this.dataset.id;
                $('#editForm').attr('action', "{{ route('admin.client-contact.update', ':id') }}".replace(':id', id));

                // Populate Company
                const companyName = this.dataset.company;
                if ($('#e_company_name').find("option[value='" + companyName + "']").length) {
                    $('#e_company_name').val(companyName).trigger('change');
                } else { 
                    const newOption = new Option(companyName, companyName, true, true);
                    $('#e_company_name').append(newOption).trigger('change');
                }

                $('#e_contact_person').val(this.dataset.person);
                $('#e_designation').val(this.dataset.designation);
                $('#e_department').val(this.dataset.department);
                $('#e_official_phone').val(this.dataset.ophone);
                $('#e_personal_phone').val(this.dataset.pphone);
                $('#e_email').val(this.dataset.email);
                $('#e_area').val(this.dataset.area);
                $('#e_status').val(this.dataset.status);
                $('#e_tier').val(this.dataset.tier);
                $('#e_address').val(this.dataset.address);
                $('#e_comments').val(this.dataset.comments);

                $('#e_sector_id').val(this.dataset.sector).trigger('change');
                setTimeout(() => { $('#e_sub_sector_id').val(this.dataset.subsector).trigger('change'); }, 100);

                @if($isSuperAdmin)
                    const users = JSON.parse(this.dataset.users);
                    $('#e_permitted_users').val(users).trigger('change');
                @endif
            });
        });
    </script>
    @endpush
</x-admin-app-layout>