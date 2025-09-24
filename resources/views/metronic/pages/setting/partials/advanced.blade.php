<form method="post" action="{{ route('admin.site.setting') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <h2 class="text-center mb-7">General Setting</h2>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="mb-5">
                <label class="form-label">Site Name</label>
                <input type="text" id="site_name" name="site_name" value="{{ optional($site)->site_name }}"
                    class="form-control form-control-solid maxlength-options" maxlength="200"
                    placeholder="Enter Site Name" required>
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
