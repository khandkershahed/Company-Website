<x-admin-app-layout :title="'Tender Security'">
    <div class="p-4 container-fluid">

        <!-- Top Stats Cards -->
        <div class="mb-4 row g-4">
            <!-- Total Securities -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center"
                     style="background: linear-gradient(90deg, #fff, #6366f1);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Total Securities</h2>
                            <span class="text-black"><i class="bi bi-shield-lock"></i> Overall submissions</span>
                        </div>
                        <div class="text-indigo-600 bg-white rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            142
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verified Securities -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center"
                     style="background: linear-gradient(90deg, #fff, #10b981);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Verified</h2>
                            <span class="text-black"><i class="bi bi-check-circle"></i> Security cleared</span>
                        </div>
                        <div class="text-green-600 bg-white rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            97
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Verification -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center"
                     style="background: linear-gradient(90deg, #fff, #f59e0b);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Pending</h2>
                            <span class="text-black"><i class="bi bi-hourglass-split"></i> Awaiting approval</span>
                        </div>
                        <div class="text-yellow-600 bg-white rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            34
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rejected / Expired -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center"
                     style="background: linear-gradient(90deg, #fff, #ef4444);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black">Rejected / Expired</h2>
                            <span class="text-black"><i class="bi bi-x-circle"></i> Not accepted</span>
                        </div>
                        <div class="text-red-600 bg-white rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            11
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tender Security Table -->
        <div class="card rounded-4">
            <div class="p-5 text-white border card-header d-flex justify-content-between align-items-center"
                 style="background: linear-gradient(90deg, #6366f1, #4338ca);">
                <div>
                    <h1 class="mb-0 text-white fw-semibold">Tender Security List</h1>
                    <span class="">Track verification and expiry of tender security details</span>
                </div>
                <div class="d-flex align-items-center">
                    <select class="py-3 w-150px form-select form-select-sm form-select-solid" data-control="select2"
                            data-placeholder="Filter by Status" data-allow-clear="true" id="filterStatus" name="status">
                        <option></option>
                        <option>Verified</option>
                        <option>Pending</option>
                        <option>Rejected</option>
                        <option>Expired</option>
                    </select>
                    <button class="py-4 btn btn-primary btn-sm ms-3 w-100" data-bs-toggle="modal" data-bs-target="#addSecurityModal">
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
                                <th width="15%">Tender ID</th>
                                <th width="15%">Company</th>
                                <th width="10%">Amount</th>
                                <th width="10%">Issued Date</th>
                                <th width="10%">Expiry Date</th>
                                <th width="8%">Status</th>
                                <th width="8%">Type</th>
                                <th width="11%" class="text-end pe-10">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="ps-5">1</td>
                                <td>TND-2025-001</td>
                                <td>BlueTech Ltd</td>
                                <td>$5,000</td>
                                <td>2025-09-15</td>
                                <td>2025-12-15</td>
                                <td><span class="badge bg-success">Verified</span></td>
                                <td>Bank Guarantee</td>
                                <td class="text-end pe-4">
                                    <button class="px-3 btn btn-sm btn-light text-primary"><i class="bi bi-eye"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-success"><i class="bi bi-pencil"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="ps-5">2</td>
                                <td>TND-2025-014</td>
                                <td>Nova Builders</td>
                                <td>$2,500</td>
                                <td>2025-10-01</td>
                                <td>2026-01-01</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>Pay Order</td>
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

        <!-- Modal: Add Tender Security -->
        <div class="modal fade" id="addSecurityModal" tabindex="-1" aria-labelledby="addSecurityModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="shadow modal-content rounded-4">
                    <div class="text-white border-0 modal-header bg-light rounded-top-4">
                        <h5 class="modal-title fw-semibold" id="addSecurityModalLabel">Add Tender Security</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="p-4 modal-body">
                        <form id="addSecurityForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tender ID</label>
                                    <input type="text" class="form-control" placeholder="Enter Tender ID">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Company Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Amount</label>
                                    <input type="number" class="form-control" placeholder="Enter Security Amount">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Type</label>
                                    <select class="form-select" data-control="select2">
                                        <option>Bank Guarantee</option>
                                        <option>Pay Order</option>
                                        <option>Demand Draft</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Issued Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Expiry Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Remarks</label>
                                    <textarea class="form-control" rows="2" placeholder="Enter remarks (optional)"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="p-3 border-0 modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Security</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-admin-app-layout>
