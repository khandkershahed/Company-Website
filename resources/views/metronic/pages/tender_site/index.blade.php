<x-admin-app-layout :title="'Tender Sites'">
    <div class="p-4 container-fluid">

        <!-- Top Stats Cards with Gradient -->
        <div class="mb-4 row g-4">
            <!-- Total Sites -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center" style="background: linear-gradient(90deg, #fff, #8b5cf6);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <!-- Left: Description -->
                        <div>
                            <h2 class="text-black ">Total Sites</h2>
                            <span class="text-black"><i class="bi bi-graph-up"></i> +12% from last month</span>
                        </div>
                        <!-- Right: Circle with big number -->
                        <div class="text-purple-700 bg-white rounded-circle d-flex justify-content-center align-items-center" style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            120
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Tenders -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center" style="background: linear-gradient(90deg, #fff, #14b8a6);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black ">Active Tenders</h2>
                            <span class="text-black"><i class="bi bi-arrow-down"></i> -4% this week</span>
                        </div>
                        <div class="text-green-600 bg-white rounded-circle d-flex justify-content-center align-items-center" style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            54
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center" style="background: linear-gradient(90deg, #fff, #f59e0b);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black ">Pending Approvals</h2>
                            <span class="text-black"><i class="bi bi-clock-history"></i> Waiting review</span>
                        </div>
                        <div class="text-orange-600 bg-white rounded-circle d-flex justify-content-center align-items-center" style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            23
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Projects -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="p-10 shadow-sm card rounded-4 d-flex align-items-center" style="background: linear-gradient(90deg, #fff, #3b82f6);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h2 class="text-black ">Completed Projects</h2>
                            <span class="text-black"><i class="bi bi-check-circle"></i> Completed successfully</span>
                        </div>
                        <div class="text-blue-600 bg-white rounded-circle d-flex justify-content-center align-items-center" style="width:70px; height:70px; font-size:1.75rem; font-weight:bold;">
                            43
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card rounded-4">
            <div class="p-5 text-white border card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #3b82f6, #3b82f6);">
                <div>
                    <h1 class="mb-0 text-white fw-semibold">Tender Site List</h1>
                    <span class="">List of all tender sites with detailed info</span>
                </div>
                <div class="d-flex align-items-center">
                    <select class="py-3 w-150px form-select filterCountry form-select-sm form-select-solid" data-control="select2"
                        data-placeholder="Select Site Type" data-allow-clear="true" id="filterCountry"
                        name="country">
                        <option></option>
                        <option>Power & Energy</option>
                        <option>Bank</option>
                        <option>Academic</option>
                        <option>Armed Forces</option>
                        <option>Oil & Gas</option>
                        <option>Gov.</option>
                        <option>MNC</option>
                        <option>Industries</option>
                        <option>NGO</option>
                        <option>International NGOs</option>
                    </select>
                    <a href="{{ route('admin.tender-sites.create') }}" class="py-4 btn btn-primary btn-sm w-100 ms-3">
                        <i class="bi bi-plus-lg"></i> Add Site
                    </a>
                </div>
            </div>
            <div class="p-5 pt-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle border dataTable table-hover rounded-4">
                        <thead class="table-light rounded-4">
                            <tr class="rounded-4">
                                <th width="3%" class="ps-5">Sl</th>
                                <th width="10%">Organization</th>
                                <th width="10%">Site URL</th>
                                <th width="10%">Site Contact</th>
                                <th width="6%">Enlisted ?</th>
                                <th width="6%">eProcure ?</th>
                                <th width="8%">Participated ?</th>
                                <th width="12%">Address</th>
                                <th width="10%">Contact No.</th>
                                <th width="10%">Progress</th>
                                <th width="5%">Status</th>
                                <th width="11%" class="text-end pe-10">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="ps-5">1</td>
                                <td>Organization A</td>
                                <td>
                                    <a href="http://www.tendersiteA.com" target="_blank" class="text-decoration-underline">
                                        www.tendersiteA.com
                                    </a>
                                </td>
                                <td>John Doe</td>
                                <td class="text-center"><span class="badge bg-success">Yes</span></td>
                                <td class="text-center"><span class="badge bg-success">Yes</span></td>
                                <td class="text-center"><span class="badge bg-warning text-dark">No</span></td>
                                <td>123 Main Street, Dhaka</td>
                                <td>
                                    <a href="tel:+880 123 456 789" class="text-decoration-underline">
                                        +880 123 456 789
                                    </a>
                                </td>
                                <td>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%;"></div>
                                    </div>
                                    <small class="text-muted">70%</small>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="text-end pe-4">
                                    <button class="px-3 btn btn-sm btn-light text-primary"><i class="bi bi-eye"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-success"><i class="bi bi-pencil"></i></button>
                                    <button class="px-3 btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="ps-5">2</td>
                                <td>Organization B</td>
                                <td>
                                    <a href="http://www.tendersiteB.com" target="_blank" class="text-decoration-underline">
                                        www.tendersiteB.com
                                    </a>
                                </td>
                                <td>Jane Smith</td>
                                <td class="text-center"><span class="badge bg-warning text-dark">No</span></td>
                                <td class="text-center"><span class="badge bg-success">Yes</span></td>
                                <td class="text-center"><span class="badge bg-success">Yes</span></td>
                                <td>45/A, Chittagong</td>
                                <td>
                                    <a href="tel:+880 987 654 321" class="text-decoration-underline">
                                        +880 987 654 321
                                    </a>
                                </td>
                                <td>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%;"></div>
                                    </div>
                                    <small class="text-muted">45%</small>
                                </td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
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

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Tender site dashboard ready.");
        });
    </script>
    @endpush
</x-admin-app-layout>
