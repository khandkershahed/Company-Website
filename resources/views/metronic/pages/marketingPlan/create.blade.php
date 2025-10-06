<x-admin-app-layout :title="'Add Your Marketing Plan'">
    <div class="border shadow-none card card-flash">
        <div class="py-3 border-0 card-header bg-light-primary">
            <div class="card-title">
                <h4 class="mb-0 text-gray-800">Add Your Marketing Plans</h4>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.marketing-plan.index') }}" class="btn btn-light-info">
                    <span class="svg-icon svg-icon-3">
                        <!-- SVG content -->
                    </span>
                    Back to the list
                </a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.marketing-plan.store') }}" method="post">
                @csrf
                <div id="maketingPlans">
                    <!-- Repeater List -->
                    @php
                        $oldRepeaterData = old('maketingPlans', [[]]); // Fallback to one empty item
                    @endphp

                    <div data-repeater-list="maketingPlans">
                        @foreach ($oldRepeaterData as $index => $row)
                            <div data-repeater-item>
                                <div class="mb-4 border shadow-none card">
                                    <div class="card-body">
                                        <div class="row g-3">

                                            <div class="col-md-2">
                                                <label class="form-label">Month</label>
                                                <select class="form-select repeater-select2" name="month" data-placeholder="Select Type" data-allow-clear="true">
                                                    @foreach ($months as $month)
                                                        <option value="{{ $month }}"
                                                            @selected($row['month'] ?? now()->format('F') ?? '' === $month)>
                                                            {{ $month }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">Date</label>
                                                <input class="form-control repeater-daterangepicker" name="date"
                                                    value="{{ $row['date'] ?? '' }}" placeholder="Pick date" />
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">Marketing Type</label>
                                                <select class="form-select repeater-select2" name="marketing_type" data-placeholder="Select Type" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="site_visit" @selected($row['marketing_type'] ?? '' === 'site_visit')>Site Visit
                                                    </option>
                                                    <option value="client_visit" @selected($row['marketing_type'] ?? '' === 'client_visit')>Client
                                                        Visit</option>
                                                    <option value="telephone" @selected($row['marketing_type'] ?? '' === 'telephone')>Telephone
                                                    </option>
                                                    <option value="email" @selected($row['marketing_type'] ?? '' === 'email')>Email</option>
                                                    <option value="social" @selected($row['marketing_type'] ?? '' === 'social')>Social</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $row['title'] ?? '' }}" placeholder="Title" />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Contact Name</label>
                                                <input type="text" class="form-control" name="contact_name"
                                                    value="{{ $row['contact_name'] ?? '' }}" placeholder="Name" />
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Contact Number</label>
                                                <input type="text" class="form-control" name="contact_number"
                                                    value="{{ $row['contact_number'] ?? '' }}" placeholder="Phone" />
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Contact Email</label>
                                                <input type="email" class="form-control" name="contact_email"
                                                    value="{{ $row['contact_email'] ?? '' }}" placeholder="Email" />
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Contact Address</label>
                                                <textarea class="form-control" name="contact_address" rows="1" placeholder="Address">{{ $row['contact_address'] ?? '' }}</textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Website</label>
                                                <textarea class="form-control" name="contact_website" rows="1" placeholder="Website">{{ $row['contact_website'] ?? '' }}</textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Social</label>
                                                <textarea class="form-control" name="contact_social" rows="1" placeholder="Social">{{ $row['contact_social'] ?? '' }}</textarea>
                                            </div>

                                            <div class="col-12 text-end">
                                                <a href="javascript:;" data-repeater-delete
                                                    class="btn btn-sm btn-light-danger">
                                                    Delete <i class="fa fa-solid fa-trash fs-6"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!-- Add Button -->
                    <div class="form-group">
                        <a href="javascript:;" data-repeater-create
                            style="text-decoration: underline; font-weight: 400;">
                            Add Row
                        </a>
                    </div>

                </div>
                <div class="mt-3 text-end">
                    <button class="btn btn-primary">Add Plan</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {

                function initRepeaterElements(item) {
                    // Init select2
                    $(item).find('.repeater-select2').select2();

                    // Init daterangepicker
                    $(item).find('.repeater-daterangepicker').daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minYear: 1901,
                        maxYear: parseInt(moment().format("YYYY"), 12)
                    });

                    // Init Tagify if needed
                    $(item).find('[data-kt-repeater="tagify"]').each(function() {
                        new Tagify(this);
                    });
                }

                $('#maketingPlans').repeater({
                    initEmpty: false,
                    show: function() {
                        $(this).slideDown();
                        initRepeaterElements(this); // Initialize new item
                    },
                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });

                // Initialize **all existing items on page load** (including the first one)
                $('#maketingPlans [data-repeater-item]').each(function() {
                    initRepeaterElements(this);
                });

            });
        </script>
    @endpush
</x-admin-app-layout>
