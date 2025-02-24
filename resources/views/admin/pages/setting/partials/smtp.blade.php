<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h5 class="text-center">Simple Mail Transfer Protocol</h5>
        <form action="{{ route('admin.smtp.setting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card border border-secondary">
                <div class="card-header bg-secondary text-white">
                    <h6 class="mb-0">SMTP</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">Driver <span class="text-danger">*</span></label>
                                <input type="text" id="driver" name="driver" value=""
                                    class="form-control form-control-solid maxlength-options" maxlength="200"
                                    placeholder="Enter Driver" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">Host </label>
                                <input type="text" id="host" name="host" value=""
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter Host">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">Port </label>
                                <input type="text" id="port" name="port" value=""
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter Port">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">Username </label>
                                <input type="text" id="username" name="username"
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter  Username">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">Password </label>
                                <input type="text" id="password" name="password"
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter Your Password">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">Encryption </label>
                                <input type="text" id="encryption" name="encryption"
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter Encryption">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">From Address</label>
                                <input type="text" id="from_address" name="from_address"
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter From Address">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label">From Name</label>
                                <input type="text" id="from_name" name="from_name"
                                    class="form-control form-control-solid maxlength-options" maxlength="100"
                                    placeholder="Enter From Name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label class="form-label ">Status</label>
                                <select name="status" data-placeholder="Select a Status..." class="form-control select"
                                    data-minimum-results-for-search="Infinity">
                                    <option></option>
                                    <option value="active">Active</option>
                                    <option value="inactive">In Active</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Form Submit Button Start-->
                <div class="text-end mb-3 mx-3">
                    <button type="submit" class="btn btn-primary ">Submit
                        <i class="ph-paper-plane-tilt ms-2"></i>
                    </button>
                </div>
                <!-- Form Submit Button End-->
            </div>
        </form>
    </div>
</div>
