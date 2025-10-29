<x-admin-app-layout :title="'Tender Access Pass'">
    <div class="p-4 container-fluid">

        <!-- Top Stats Cards -->
        <div class="mb-4 row g-4">
            <!-- Total Passes -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-none card rounded-4 d-flex align-items-center"
                    style="background: linear-gradient(90deg, #fff, #6366f1);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Total Passes</h2>
                            <span class="text-black"><i class="bi bi-graph-up"></i> +8% this month</span>
                        </div>
                        <div class="text-indigo-700 bg-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            240
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Passes -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-none card rounded-4 d-flex align-items-center"
                    style="background: linear-gradient(90deg, #fff, #10b981);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Active Passes</h2>
                            <span class="text-black"><i class="bi bi-check-circle"></i> Currently valid</span>
                        </div>
                        <div class="bg-white text-emerald-600 rounded-circle d-flex justify-content-center align-items-center"
                            style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            182
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expiring Soon -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-none card rounded-4 d-flex align-items-center"
                    style="background: linear-gradient(90deg, #fff, #f59e0b);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Expiring Soon</h2>
                            <span class="text-black"><i class="bi bi-exclamation-triangle"></i> Within 7 days</span>
                        </div>
                        <div class="bg-white text-amber-600 rounded-circle d-flex justify-content-center align-items-center"
                            style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            27
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revoked / Expired -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-none card rounded-4 d-flex align-items-center"
                    style="background: linear-gradient(90deg, #fff, #ef4444);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Revoked / Expired</h2>
                            <span class="text-black"><i class="bi bi-x-circle"></i> No longer valid</span>
                        </div>
                        <div class="text-red-600 bg-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            31
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tender Access Pass Table -->
        <div class="card rounded-4">
            <div class="p-5 text-white border card-header d-flex justify-content-between align-items-center"
                style="background: linear-gradient(90deg, #ef4444, #ef4444);">
                <div>
                    <h1 class="mb-0 text-white fw-semibold">Tender Access Pass List</h1>
                    <span class="">Manage user access and pass validity for tender platforms</span>
                </div>
                <div class="d-flex align-items-center">
                    <select class="py-3 w-150px form-select form-select-sm form-select-solid" data-control="select2"
                        data-placeholder="Filter by Status" data-allow-clear="true" id="filterStatus" name="status">
                        <option></option>
                        <option>Active</option>
                        <option>Pending</option>
                        <option>Expired</option>
                        <option>Revoked</option>
                    </select>
                    <button class="py-4 btn btn-light btn-sm text-dark fw-semibold w-100 ms-3"
                        data-bs-toggle="modal" data-bs-target="#addAccessPassModal">
                        <i class="bi bi-plus-lg"></i> Add New Pass
                    </button>
                </div>
            </div>

            <div class="p-5 pt-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle border dataTable table-hover rounded-4">
                        <thead class="table-light rounded-4">
                            <tr>
                                <th width="3%" class="ps-5">Sl</th>
                                <th width="13%">User Name</th>
                                <th width="12%">Email</th>
                                <th width="12%">Phone</th>
                                <th width="10%">Access Level</th>
                                <th width="10%">Pass Code</th>
                                <th width="10%">Issued Date</th>
                                <th width="10%">Expiry Date</th>
                                <th width="10%">Status</th>
                                <th width="10%" class="text-end pe-10">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="ps-5">1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>0168554644</td>
                                <td><span class="badge bg-info text-dark">Full Access</span></td>
                                <td>AP-1245</td>
                                <td>2025-09-12</td>
                                <td>2025-12-12</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="text-end pe-4">
                                    <button class="px-3 btn btn-sm btn-light text-primary"><i class="bi bi-eye"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-success"><i class="bi bi-pencil"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="ps-5">2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>0168554644</td>
                                <td><span class="badge bg-warning text-dark">Limited</span></td>
                                <td>AP-0987</td>
                                <td>2025-08-20</td>
                                <td>2025-10-30</td>
                                <td><span class="badge bg-warning text-dark">Expiring Soon</span></td>
                                <td class="text-end pe-4">
                                    <button class="px-3 btn btn-sm btn-light text-primary"><i class="bi bi-eye"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-success"><i class="bi bi-pencil"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Access Pass Modal -->
    <div class="modal fade" id="addAccessPassModal" tabindex="-1" aria-labelledby="addAccessPassLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="border-0 shadow-lg modal-content rounded-4">
                <div class="modal-header bg-light">
                    <h5 class="text-black modal-title fw-semibold" id="addAccessPassLabel">
                        <i class="bi bi-plus-circle me-2"></i>Add Tender Access Pass
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form>
                    <div class="p-5 modal-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">User Name</label>
                                <input type="text" class="form-control" placeholder="Enter user name">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" placeholder="Enter email address">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="number" class="form-control" placeholder="Enter phone number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Access Level</label>
                                <select class="form-select" data-control="select2">
                                    <option value="">Select Access</option>
                                    <option>Full Access</option>
                                    <option>Limited</option>
                                    <option>Viewer Only</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pass Code</label>
                                <input type="text" class="form-control" placeholder="Enter unique pass code">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Issued Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Expiry Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Status</label>
                                <select class="form-select">
                                    <option>Active</option>
                                    <option>Pending</option>
                                    <option>Expired</option>
                                    <option>Revoked</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-0 modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="px-4 btn btn-primary">Save Pass</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-admin-app-layout>
