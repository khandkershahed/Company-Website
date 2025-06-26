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
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Company Name </label>
                <input type="text" id="company_name" name="company_name" value="{{ optional($site)->company_name }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Company Name">
            </div>
        </div>
        <div class="col-lg-5">
            <div class="mb-5">
                <label class="form-label">Site Slogan</label>
                <input type="text" id="site_slogan" name="site_slogan" value="{{ optional($site)->site_slogan }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Product Site Slogan">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Favicon </label>
                <x-metronic.file-input class="form-control-solid" id="favicon" name="favicon" :source="asset('storage/' . optional($site)->favicon)"
                    :value="old('favicon', $site->favicon)"></x-metronic.file-input>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Logo </label>
                <x-metronic.file-input class="form-control-solid" id="logo" name="logo" :source="asset('storage/' . optional($site)->logo)"
                    :value="old('logo', $site->logo)"></x-metronic.file-input>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">OG Image </label>
                <x-metronic.file-input class="form-control-solid" id="og_image" name="og_image"
                    :source="asset('storage/' . optional($site)->og_image)"
                    :value="old('og_image', $site->og_image)"></x-metronic.file-input>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Phone One</label>
                <input type="text" class="form-control form-control-solid" placeholder="Enter your Phone"
                    name="phone_one" value="{{ optional($site)->phone_one }}">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Phone Two</label>
                <input type="text" class="form-control form-control-solid" placeholder="Enter your Phone"
                    name="phone_two" value="{{ optional($site)->phone_two }}">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Whatsapp Number</label>
                <input type="text" class="form-control form-control-solid" placeholder="Enter Your Whatsapp Number"
                    name="whatsapp_number" value="{{ optional($site)->whatsapp_number }}">
            </div>
        </div>


        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Currency</label>
                <input type="text" class="form-control form-control-solid" placeholder="Enter currency"
                    id="mask_currency" name="currency" value="{{ optional($site)->currency }}">
                <span class="form-text"></span>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Country Name</label>
                <select name="country_id" data-placeholder="Select a country..."
                    class="form-control form-control-solid select select-country-add"
                    data-container-css-class="select-sm">
                    <option></option>
                    @foreach ($countries as $countrie)
                        <option value="{{ $countrie->id }}">
                            {{ $countrie->country_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Service Time</label>
                <input type="time" id="service_time" name="service_time" value="{{ optional($site)->service_time }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Service Time">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Service Days</label>
                <input type="text" id="service_days" name="service_days"
                    value="{{ optional($site)->service_days }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Service Days">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Default Language</label>
                <input type="text" id="default_language" name="default_language"
                    value="{{ optional($site)->default_language }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Default Language">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Contact Email</label>
                <input type="email" id="contact_email" name="contact_email"
                    value="{{ optional($site)->contact_email }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Contact Email">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Support Email</label>
                <input type="email" id="support_email" name="support_email"
                    value="{{ optional($site)->support_email }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Support Email">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Info Email</label>
                <input type="email" id="info_email" name="info_email" value="{{ optional($site)->info_email }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Info Email">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-5">
                <label class="form-label">Sales Email</label>
                <input type="email" id="sales_email" name="sales_email"
                    value="{{ optional($site)->sales_email }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Sales Email">
            </div>
        </div>


        <div class="col-lg-4">
            <div class="mb-5">
                <label class="form-label">Service </label>
                <input type="text" id="service_days" name="service_days"
                    value="{{ optional($site)->service_days }}"
                    class="form-control form-control-solid maxlength-options" maxlength="100"
                    placeholder="Enter Service URL">
            </div>
        </div>
        <div class="col-lg-5">
            <div class="mb-5">
                <label class="form-label">Address</label>
                <textarea rows="1" cols="1" class="form-control form-control-solid" name="address"
                    value="{{ optional($site)->address }}" placeholder="Enter Address"></textarea>
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
