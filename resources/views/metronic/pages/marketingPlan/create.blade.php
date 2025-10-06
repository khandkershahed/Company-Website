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
            <form action="" method="post">
                <div id="kt_docs_repeater_advanced">

                    <!-- Repeater List -->
                    <div data-repeater-list="kt_docs_repeater_advanced">

                        <!-- Repeater Item -->
                        <div data-repeater-item>
                            <div class="mb-4 border shadow-none card">
                                <div class="card-body">

                                    <div class="row g-3">

                                        <div class="col-md-2">
                                            <label class="form-label">Month</label>
                                            <select class="form-select repeater-select2" data-placeholder="Select an option">
                                                <option></option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label">Date</label>
                                            <input class="form-control repeater-daterangepicker" placeholder="Pick date" />
                                        </div>



                                        <div class="col-md-2">
                                            <label class="form-label">Marketing Type</label>
                                            <select class="form-select repeater-select2" name="marketing_type" data-placeholder="Select an option">
                                                <option ></option>
                                                <option value="email">Email</option>
                                                <option value="call">Call</option>
                                                <option value="social">Social</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" placeholder="Phone" />
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Contact Email</label>
                                            <input type="email" class="form-control" name="contact_email" placeholder="Email" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Contact Name</label>
                                            <input type="text" class="form-control" name="contact_name" placeholder="Name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title" />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Contact Address</label>
                                            <textarea class="form-control" name="contact_address" rows="4" placeholder="Address"></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Website</label>
                                            <textarea class="form-control" name="contact_website" rows="4" placeholder="Website"></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Social</label>
                                            <textarea class="form-control" name="contact_social" rows="4" placeholder="Social"></textarea>
                                        </div>


                                        <div class="col-12 text-end">
                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                Delete <i class="fa fa-solid fa-trash fs-6"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Button -->
                    <div class="form-group">
                        <a href="javascript:;" data-repeater-create style="text-decoration: underline; font-weight: 400;">
                         Add Row
                        </a>
                    </div>

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

            $('#kt_docs_repeater_advanced').repeater({
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
            $('#kt_docs_repeater_advanced [data-repeater-item]').each(function() {
                initRepeaterElements(this);
            });

        });
    </script>
    @endpush
</x-admin-app-layout>