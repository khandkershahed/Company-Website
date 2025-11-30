<x-admin-app-layout :title="'Edit Tender Site Information'">
    <div class="p-0 container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="p-4 shadow-none card rounded-4">
                    <div class="py-5 mb-4 bg-white card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="mb-1 fw-semibold">Edit Tender Site</h1>
                        </div>
                        <a href="{{ route('admin.tender-sites.index') }}" class="bg-transparent text-danger btn btn-primary">
                            <i class="bi bi-arrow-left text-danger"></i> Back to List
                        </a>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.tender-sites.update', $tenderSite->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label for="organization" class="form-label">Organization Name</label>
                                    <input type="text" name="organization" id="organization" value="{{ old('organization', $tenderSite->organization) }}" class="form-control form-control-solid" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="category" class="form-label">Industrial Sector</label>
                                    <select name="category" id="category" class="form-select form-select-solid" data-control="select2">
                                        <option value="">Select Sector</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}" {{ old('category', $tenderSite->category) == $sector->id ? 'selected' : '' }}>
                                                {{ $sector->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="site_url" class="form-label">Tender Site URL</label>
                                    <input type="url" name="site_url" id="site_url" value="{{ old('site_url', $tenderSite->site_url) }}" class="form-control form-control-solid">
                                </div>

                                <div class="col-md-4">
                                    <label for="site_contact" class="form-label">Site Contact</label>
                                    <input type="text" name="site_contact" id="site_contact" value="{{ old('site_contact', $tenderSite->site_contact) }}" class="form-control form-control-solid">
                                </div>

                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $tenderSite->email) }}" class="form-control form-control-solid">
                                </div>

                                <div class="col-md-4">
                                    <label for="enlisted" class="form-label">Enlisted?</label>
                                    <select name="enlisted" id="enlisted" class="form-select form-select-solid" data-control="select2" required>
                                        <option value="1" {{ old('enlisted', $tenderSite->enlisted) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !old('enlisted', $tenderSite->enlisted) ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="eprocure" class="form-label">eProcure?</label>
                                    <select name="eprocure" id="eprocure" class="form-select form-select-solid" data-control="select2" required>
                                        <option value="1" {{ old('eprocure', $tenderSite->eprocure) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !old('eprocure', $tenderSite->eprocure) ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="participated" class="form-label">Participated?</label>
                                    <select name="participated" id="participated" class="form-select form-select-solid" data-control="select2" required>
                                        <option value="1" {{ old('participated', $tenderSite->participated) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !old('participated', $tenderSite->participated) ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="contact_no" class="form-label">Contact No.</label>
                                    <input type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $tenderSite->contact_no) }}" class="form-control form-control-solid">
                                </div>

                                <div class="col-md-4">
                                    <label for="progress" class="form-label">Progress (%)</label>
                                    <input type="number" name="progress" id="progress" value="{{ old('progress', $tenderSite->progress) }}" class="form-control form-control-solid" min="0" max="100" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select form-select-solid" data-control="select2" required>
                                        <option value="Active" {{ old('status', $tenderSite->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Pending" {{ old('status', $tenderSite->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Completed" {{ old('status', $tenderSite->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="remarks" class="form-label">Remarks / Notes</label>
                                    <textarea name="remarks" id="remarks" rows="2" class="form-control form-control-solid">{{ old('remarks', $tenderSite->remarks) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" id="address" rows="2" class="form-control form-control-solid" required>{{ old('address', $tenderSite->address) }}</textarea>
                                </div>
                            </div>

                            <div class="mt-10 d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-check-lg"></i> Update Tender Site
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
