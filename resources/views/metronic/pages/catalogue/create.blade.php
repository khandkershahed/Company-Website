<x-admin-app-layout :title="'Catalogue Create'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Add Catalogue</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.catalogues.index') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Back to the List</a>
                </div>
            </div>
            <div class="card-body">
                <form id="myform" method="post" action="{{ route('admin.catalogues.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="container py-2">
                        <div class="px-5 py-5 m-2 bg-light rounded">
                            <div class="row mb-5">
                                <div class="col-lg-4 mb-5">
                                    <label class="form-label" for="category">Document Category</label>
                                    <select id="category" name="category"
                                        class="form-select form-select-sm category_select"
                                        data-minimum-results-for-search="Infinity" data-control="select2" data-allow-clear="true"
                                        data-placeholder="Choose Document category" required>
                                        <option></option>
                                        <option value="brand">Brand</option>
                                        <option value="product">Product</option>
                                        <option value="industry">Industry</option>
                                        <option value="solution">Solution</option>
                                        <option value="company">Company</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-5 brand_col d-none">
                                    <label class="form-label" for="brand">Select Brand</label>
                                    <select id="brand" name="brand_id" class="form-select form-select-sm"
                                        data-placeholder="Choose Brand" data-control="select2" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-5 product_col d-none">
                                    <label class="form-label" for="product">Select Product</label>
                                    <select id="product" name="product_id" class="form-select form-select-sm"
                                        data-placeholder="Choose Product" data-control="select2" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6 mb-5 industry_col d-none">
                                    <label class="form-label" for="source">Select Industry</label>
                                    <select id="source" name="industry_id" data-control="select2" data-allow-clear="true"
                                        class="form-select form-select-sm" data-placeholder="Choose Industry">
                                        <option></option>
                                        @foreach ($industries as $industrie)
                                            <option value="{{ $industrie->id }}">{{ $industrie->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6 mb-5 solution_col d-none">
                                    <label class="form-label" for="industry">Select Solution</label>
                                    <select id="industry" name="solution_id" data-control="select2" data-allow-clear="true"
                                        class="form-select form-select-sm" data-placeholder="Choose Solution">
                                        <option></option>
                                        @foreach ($solutions as $solution)
                                            <option value="{{ $solution->id }}">{{ $solution->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-8 mb-5 company_col d-none">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6">
                                            <label class="form-label" for="btn_name">Button Name <span class="text-danger">*</span></label>
                                            <input name="button_name" type="text"
                                                class="form-control form-control-sm" id="btn_name"
                                                placeholder="Enter Button Name">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label" for="btn_link">Button Link</label>
                                            <input name="button_link" type="url"
                                                class="form-control form-control-sm" id="btn_link"
                                                placeholder="Enter Button Link">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center mb-5">
                                <div class="col-lg-5 mb-5">
                                    <div class="mb-2">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input name="title" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-5 mb-5">
                                    <div class="mb-2">
                                        <label class="form-label">Page Link</label>
                                        <input name="page_link" type="url" class="form-control form-control-sm"
                                            placeholder="Enter Page Link">
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center mb-5">
                                <div class="col-lg-4 mb-5">
                                    <div class="mb-2">
                                        <label class="form-label">Document <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-sm" name="document"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 mb-5">
                                    <div class="mb-2">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control form-control-sm" rows="1" id="description" name="description"
                                            placeholder="Enter your Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row offset-1 mt-2">
                                <h6 class="text-center">PDF Page Information</h6>
                                <div id="inputFieldArea">
                                    <div class="row inputFieldWrapper mb-5">
                                        <div class="col-lg-4 mb-5">
                                            <div class="mb-2">
                                                <label class="form-label">Page Description</label>
                                                <textarea class="form-control form-control-sm" rows="1" id="page_description" name="page_description[]"
                                                    placeholder="Enter your Page Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-5">
                                            <div class="mb-2">
                                                <label class="form-label">Page Image</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control form-control-sm"
                                                        id="image" name="page_image[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 mb-5">
                                            <div class="mb-2">
                                                <a class="remove_field btn btn-sm btn-danger mt-3 me-2" disabled> <i
                                                        class="fas fa-minus"></i> </a>
                                                <a id="addInputField" class="btn btn-sm btn-success mt-3"> <i
                                                        class="fas fa-plus"></i> </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--  --}}

                        </div>


                        <div class="border-0 p-1 pe-0 mt-5">
                            <button type="submit" class="btn btn-primary py-3 float-end from-prevent-multiple-submits"
                                style="padding: 4px 9px;">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.category_select').on('change', function() {

                    var value = $(this).find(":selected").val();
                    if (value == 'brand') {
                        // alert(value);
                        $(".brand_col").removeClass("d-none");
                        $(".product_col").addClass("d-none");
                        $(".industry_col").addClass("d-none");
                        $(".solution_col").addClass("d-none");
                        $(".company_col").addClass("d-none");
                    } else if (value == 'product') {
                        $(".brand_col").addClass("d-none");
                        $(".product_col").removeClass("d-none");
                        $(".industry_col").addClass("d-none");
                        $(".solution_col").addClass("d-none");
                        $(".company_col").addClass("d-none");

                    } else if (value == 'industry') {
                        $(".brand_col").addClass("d-none");
                        $(".product_col").addClass("d-none");
                        $(".industry_col").removeClass("d-none");
                        $(".solution_col").addClass("d-none");
                        $(".company_col").addClass("d-none");

                    } else if (value == 'solution') {
                        $(".brand_col").addClass("d-none");
                        $(".product_col").addClass("d-none");
                        $(".industry_col").addClass("d-none");
                        $(".solution_col").removeClass("d-none");
                        $(".company_col").addClass("d-none");
                    } else if (value == 'company') {
                        $(".brand_col").addClass("d-none");
                        $(".product_col").addClass("d-none");
                        $(".industry_col").addClass("d-none");
                        $(".solution_col").addClass("d-none");
                        $(".company_col").removeClass("d-none");
                    } else {
                        $(".brand_col").addClass("d-none");
                        $(".product_col").addClass("d-none");
                        $(".industry_col").addClass("d-none");
                        $(".solution_col").addClass("d-none");
                        $(".company_col").addClass("d-none");
                    }

                });
            });
        </script>
        <script>
            $(document).ready(function() {
                var max_fields = 10;
                var wrapper = $("#inputFieldArea");
                var x = 1;
                $(wrapper).on("click", "#addInputField", function(e) {
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append(
                            '<div class="row inputFieldWrapper"><div class="col-lg-4"><div class="mb-2"><label class="form-label">Page Description</label><textarea class="form-control form-control-sm" rows="1" id="page_description_' +
                            x +
                            '" name="page_description[]" placeholder="Enter your Page Description"></textarea></div></div><div class="col-lg-4"><div class="mb-2"><label class="form-label">Page Image</label><div class="input-group"><input type="file" class="form-control form-control-sm" id="image_' +
                            x +
                            '" name="page_image[]"></div></div></div><div class="col-lg-2"><div class="mb-2"><a class="remove_field btn btn-sm btn-danger mt-3 me-2" disabled> <i class="fas fa-minus"></i> </a> <a id="addInputField" class="btn btn-sm btn-success mt-3"> <i class="fas fa-plus"></i> </a></div></div></div>'
                        );
                    }
                    checkRemoveButton();
                });
                $(wrapper).on("click", ".remove_field", function(e) {
                    e.preventDefault();
                    $(this).closest('.inputFieldWrapper').remove();
                    x--;
                    checkRemoveButton();
                });

                function checkRemoveButton() {
                    if ($('.inputFieldWrapper').length > 1) {
                        $('.remove_field').prop('disabled', false);
                    } else {
                        $('.remove_field').prop('disabled', true);
                    }
                }
            });
        </script>
    @endpush
</x-admin-app-layout>
