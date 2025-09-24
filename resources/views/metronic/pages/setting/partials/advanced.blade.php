<div class="card card-flash">
    <div class="card-header">
        <h2 class="card-title text-center mb-7">Website commands</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tools.run') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-4">

                <div class="col-md-4">
                    <button name="action" value="link" class="btn btn-outline-primary w-100">
                        🔗 Create Storage Link
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="cache:clear" class="btn btn-outline-warning w-100">
                        🚮 Clear Cache
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="optimize:clear" class="btn btn-outline-secondary w-100">
                        ⚙️ Clear Optimize
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="route:cache" class="btn btn-outline-success w-100">
                        🧭 Route Cache
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="route:clear" class="btn btn-outline-danger w-100">
                        🚫 Clear Routes
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="view:clear" class="btn btn-outline-info w-100">
                        🧹 Clear Views
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="config:cache" class="btn btn-outline-dark w-100">
                        📦 Config Cache
                    </button>
                </div>

                <div class="col-md-4">
                    <button name="action" value="migrate" class="btn btn-outline-danger w-100">
                        🛠 Run Migrations
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>


{{-- <div class="row">
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
</div> --}}
