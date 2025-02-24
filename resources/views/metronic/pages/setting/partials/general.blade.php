<form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
    <div class="row">
        <h2 class="text-center mb-7">General Setting</h2>
    </div>
    <div class="row fv-row mb-7 fv-plugins-icon-container">
        <div class="col-md-3 text-md-end">

            <label class="fs-6 fw-bold form-label mt-3">
                <span class="required">Meta Title</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Set the title of the store for SEO."
                    aria-label="Set the title of the store for SEO."></i>
            </label>

        </div>
        <div class="col-md-9">

            <input type="text" class="form-control form-control-solid" name="meta_title" value="">

            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>


    <div class="row fv-row mb-7">
        <div class="col-md-3 text-md-end">

            <label class="fs-6 fw-bold form-label mt-3">
                <span>Meta Tag Description</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Set the description of the store for SEO."
                    aria-label="Set the description of the store for SEO."></i>
            </label>

        </div>
        <div class="col-md-9">

            <textarea class="form-control form-control-solid" name="meta_description"></textarea>

        </div>
    </div>


    <div class="row fv-row mb-7">
        <div class="col-md-3 text-md-end">

            <label class="fs-6 fw-bold form-label mt-3">
                <span>Meta Keywords</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Set keywords for the store separated by a comma."
                    aria-label="Set keywords for the store separated by a comma."></i>
            </label>

        </div>
        <div class="col-md-9">

            <tags class="tagify form-control form-control-solid tagify--noTags tagify--empty" tabindex="-1">
                <span contenteditable="" tabindex="0" data-placeholder="​" aria-placeholder="" class="tagify__input"
                    role="textbox" aria-autocomplete="both" aria-multiline="false"></span>

            </tags><input type="text" class="form-control form-control-solid" name="meta_keywords" value=""
                data-kt-ecommerce-settings-type="tagify">

        </div>
    </div>


    <div class="row fv-row mb-7">
        <div class="col-md-3 text-md-end">

            <label class="fs-6 fw-bold form-label mt-3">
                <span>Theme</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Set theme style for the store."
                    aria-label="Set theme style for the store."></i>
            </label>

        </div>
        <div class="col-md-9">
            <div class="w-100">
                <select class="form-select form-select-solid select2-hidden-accessible" name="theme"
                    data-control="select2" data-hide-search="true" data-placeholder="Select a layout"
                    data-select2-id="select2-data-10-r7rp" tabindex="-1" aria-hidden="true">
                    <option></option>
                    <option value="Default" selected="selected" data-select2-id="select2-data-12-z1bf">Default</option>
                    <option value="Minimalist">Minimalist</option>
                    <option value="Dark">Dark</option>
                    <option value="High_Contrast">High Contrast</option>
                </select>
            </div>
        </div>
    </div>


    <div class="row fv-row mb-7">
        <div class="col-md-3 text-md-end">

            <label class="fs-6 fw-bold form-label mt-3">
                <span>Default Layout</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Set default layout style for the store."
                    aria-label="Set default layout style for the store."></i>
            </label>

        </div>
        <div class="col-md-9">
            <div class="w-100">
                <select class="form-select form-select-solid select2-hidden-accessible" name="layout"
                    data-control="select2" data-hide-search="true" data-placeholder="Select a layout"
                    data-select2-id="select2-data-13-7qh2" tabindex="-1" aria-hidden="true">
                    <option></option>
                    <option value="Default" selected="selected" data-select2-id="select2-data-15-npzz">Default</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Home">Home</option>
                    <option value="Dining">Dining</option>
                    <option value="Interior">Interior</option>
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
