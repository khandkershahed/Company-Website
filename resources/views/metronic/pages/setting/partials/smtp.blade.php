<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h3 class="text-center mb-7">Simple Mail Transfer Protocol</h3>
        <form action="{{ route('admin.smtp.setting') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Driver <span class="text-danger">*</span></label>
                        <input type="text" id="driver" name="driver" value=""
                            class="form-control form-control-solid maxlength-options" maxlength="200"
                            placeholder="Enter Driver" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Host </label>
                        <input type="text" id="host" name="host" value=""
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Host">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Port </label>
                        <input type="text" id="port" name="port" value=""
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Port">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Username </label>
                        <input type="text" id="username" name="username"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter  Username">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Password </label>
                        <input type="text" id="password" name="password"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Your Password">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Encryption </label>
                        <input type="text" id="encryption" name="encryption"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Encryption">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">From Address</label>
                        <input type="text" id="from_address" name="from_address"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter From Address">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">From Name</label>
                        <input type="text" id="from_name" name="from_name"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter From Name">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label ">Status</label>
                        <select name="status" placeholder="Select a Status..." class="form-control select"
                            data-minimum-results-for-search="Infinity" required>
                            <option></option>
                            <option value="active">Active</option>
                            <option value="inactive">In Active</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <div class="separator mb-6"></div>
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
