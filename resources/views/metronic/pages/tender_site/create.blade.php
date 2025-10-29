<x-admin-app-layout :title="'Tender Information'">
    <div class="p-0 container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="p-4 shadow-none card rounded-4">
                    <div class="py-5 mb-4 bg-white card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="mb-1 fw-semibold">Create Tender Site</h1>
                        </div>
                        <a href="{{ route('tender-sites.index') }}" class="bg-transparent text-danger btn btn-primary">
                            <i class="bi bi-arrow-left text-danger"></i> Back to List
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tender-sites.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Organization Name -->
                                <div class="col-md-12">
                                    <label for="organization" class="form-label">Organization Name</label>
                                    <input type="text" name="organization" id="organization" class="form-control form-control-solid" placeholder="Organization Name" required>
                                </div>

                                <!-- Tender Site URL -->
                                <div class="col-md-4">
                                    <label for="site_url" class="form-label">Tender Site URL</label>
                                    <input type="url" name="site_url" id="site_url" class="form-control form-control-solid" placeholder="https://example.com" required>
                                </div>

                                <!-- Site Contact -->
                                <div class="col-md-4">
                                    <label for="site_contact" class="form-label">Site Contact</label>
                                    <input type="text" name="site_contact" id="site_contact" class="form-control form-control-solid" placeholder="Contact Person Name" required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-solid" placeholder="contact@example.com">
                                </div>

                                <!-- Enlisted? -->
                                <div class="col-md-4">
                                    <label for="enlisted" class="form-label">Enlisted?</label>
                                    <select name="enlisted" id="enlisted" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Select Type" data-allow-clear="true" required>
                                        <option></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <!-- eProcure? -->
                                <div class="col-md-4">
                                    <label for="eprocure" class="form-label">eProcure?</label>
                                    <select name="eprocure" id="eprocure" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Select Type" data-allow-clear="true" required>
                                        <option></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <!-- Participated? -->
                                <div class="col-md-4">
                                    <label for="participated" class="form-label">Participated?</label>
                                    <select name="participated" id="participated" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Select Type" data-allow-clear="true" required>
                                        <option></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <!-- Contact No -->
                                <div class="col-md-4">
                                    <label for="contact_no" class="form-label">Contact No.</label>
                                    <input type="text" name="contact_no" id="contact_no" class="form-control form-control-solid" placeholder="+880 123 456 789" required>
                                </div>

                                <!-- Progress -->
                                <div class="col-md-4">
                                    <label for="progress" class="form-label">Progress (%)</label>
                                    <input type="number" name="progress" id="progress" class="form-control form-control-solid" min="0" max="100" placeholder="0-100" required>
                                </div>

                                <!-- Status -->
                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Select Type" data-allow-clear="true" required>
                                        <option></option>
                                        <option value="Active">Active</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>

                                <!-- Remarks / Notes -->
                                <div class="col-6">
                                    <label for="remarks" class="form-label">Remarks / Notes</label>
                                    <textarea name="remarks" id="remarks" rows="2" class="form-control form-control-solid" placeholder="Optional notes or comments"></textarea>
                                </div>
                                <!-- Address -->
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" id="address" rows="2" class="form-control form-control-solid" placeholder="Full Address" required></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-10 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-danger">
                                        <i class="bi bi-exclamation-triangle-fill text-danger"></i> Fill in the details below
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-check-lg"></i> Save Tender Site
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-admin-app-layout>