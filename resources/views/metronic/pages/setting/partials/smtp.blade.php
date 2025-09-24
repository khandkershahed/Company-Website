<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h3 class="text-center mb-7">Application Email Settings</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.smtp.setting') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-6">
                <div class="col-lg-12">
                    <label class="form-label">App Debug</label><br>
                    <input type="checkbox" name="APP_DEBUG" value="true" {{ env('APP_DEBUG') ? 'checked' : '' }}>
                    <small class="text-muted">Enable to show detailed error messages (for development only).</small>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Driver <span class="text-danger">*</span></label>
                        <input type="text" id="MAIL_MAILER" name="MAIL_MAILER" value="{{ env('MAIL_MAILER') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="200"
                            placeholder="Enter Mailer (e.g., smtp)" required>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Host</label>
                        <input type="text" id="MAIL_HOST" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Host">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Port</label>
                        <input type="text" id="MAIL_PORT" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Port">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Username</label>
                        <input type="text" id="MAIL_USERNAME" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Username">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Password</label>
                        <input type="text" id="MAIL_PASSWORD" name="MAIL_PASSWORD" value="{{ env('MAIL_PASSWORD') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Password">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Encryption</label>
                        <input type="text" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION"
                            value="{{ env('MAIL_ENCRYPTION') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter Encryption (e.g., tls)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">From Address</label>
                        <input type="text" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS"
                            value="{{ env('MAIL_FROM_ADDRESS') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter From Address">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">From Name</label>
                        <input type="text" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME"
                            value="{{ env('MAIL_FROM_NAME') }}"
                            class="form-control form-control-solid maxlength-options" maxlength="100"
                            placeholder="Enter From Name">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-5">
                        <label class="form-label">Status</label>
                        <select name="status" id="select2" class="form-select"
                            data-minimum-results-for-search="Infinity" data-allow-clear="true" required>
                            <option disabled selected>--Select Status--</option>
                            <option value="active" {{ env('MAIL_STATUS') === 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ env('MAIL_STATUS') === 'inactive' ? 'selected' : '' }}>
                                Inactive</option>
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
