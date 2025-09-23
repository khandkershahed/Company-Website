@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                            <a href="{{ route('document.index') }}" class="breadcrumb-item">Document PDF</a>
                            <a href="{{ route('document.create') }}" class="breadcrumb-item">Add<span
                                    class="breadcrumb-item active"></span></a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}

                <!-- Basic tabs -->
        </section>
        <!-- Content area -->
        <div class="content pt-2 w-75 mx-auto">
            <div class="text-start">
                <div class="d-flex align-items-center justify-content-start main_bg py-1 rounded-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('document.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 17rem;">
                        <p class="text-white p-0 m-0 fw-bold">Document PDF Upload</p>
                    </div>

                </div>
            </div>
            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <!--Banner Section-->
                    <div class="container py-2">
                        <div class="px-2 py-2 m-2 bg-light rounded">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <label for="category">Document Category</label>
                                    <select id="category" name="category"
                                        class="form-control form-control-sm select category_select"
                                        data-minimum-results-for-search="Infinity"
                                        data-placeholder="Choose Document category" required>
                                        <option></option>
                                        <option value="brand">Brand</option>
                                        <option value="product">Product</option>
                                        <option value="industry">Industry</option>
                                        <option value="solution">Solution</option>
                                        <option value="company">Company</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 brand_col d-none">
                                    <label for="brand">Select Brand</label>
                                    <select id="brand" name="brand_id" class="form-control form-control-sm select"
                                        data-placeholder="Choose Brand">
                                        <option></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6 product_col d-none">
                                    <label for="product">Select Product</label>
                                    <select id="product" name="product_id" class="form-control form-control-sm select"
                                        data-placeholder="Choose Product">
                                        <option></option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6 industry_col d-none">
                                    <label for="source">Select Industry</label>
                                    <select id="source" name="industry_id" class="form-control form-control-sm select"
                                        data-placeholder="Choose Industry">
                                        <option></option>
                                        @foreach ($industries as $industrie)
                                            <option value="{{ $industrie->id }}">{{ $industrie->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6 solution_col d-none">
                                    <label for="industry">Select Solution</label>
                                    <select id="industry" name="solution_id" class="form-control form-control-sm select"
                                        data-placeholder="Choose Solution">
                                        <option></option>
                                        @foreach ($solutions as $solution)
                                            <option value="{{ $solution->id }}">{{ $solution->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-8 company_col d-none">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6">
                                            <label for="btn_name">Button Name <span class="text-danger">*</span></label>
                                            <input name="button_name" type="text" class="form-control form-control-sm"
                                                id="btn_name" placeholder="Enter Button Name">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="btn_link">Button Link</label>
                                            <input name="button_link" type="url" class="form-control form-control-sm"
                                                id="btn_link" placeholder="Enter Button Link">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center">
                                <div class="col-lg-5">
                                    <div class="mb-2">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input name="title" type="text" class="form-control form-control-sm"
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="mb-2">
                                        <label class="form-label">Page Link</label>
                                        <input name="page_link" type="url" class="form-control form-control-sm"
                                            placeholder="Enter Page Link">
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label class="form-label">Document <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-sm" name="document"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
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
                                    <div class="row inputFieldWrapper">
                                        <div class="col-lg-4">
                                            <div class="mb-2">
                                                <label class="form-label">Page Description</label>
                                                <textarea class="form-control form-control-sm" rows="1" id="page_description" name="page_description[]"
                                                    placeholder="Enter your Page Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-2">
                                                <label class="form-label">Page Image</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control form-control-sm"
                                                        id="image" name="page_image[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-2">
                                                <a class="remove_field btn btn-sm btn-danger mt-3 me-2" disabled> <i
                                                        class="ph-minus"></i> </a>
                                                <a id="addInputField" class="btn btn-sm btn-success mt-3"> <i
                                                        class="ph-plus"></i> </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--  --}}

                        </div>


                        <div class="modal-footer border-0 p-1 pe-0 mt-3">
                            <button type="submit" class="mx-3 submit_btn from-prevent-multiple-submits rounded-0"
                                style="padding: 4px 9px;">Submit</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- /content area -->

    </div>
@endsection

@once
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
                            '" name="page_image[]"></div></div></div><div class="col-lg-2"><div class="mb-2"><a class="remove_field btn btn-sm btn-danger mt-3 me-2" disabled> <i class="ph-minus"></i> </a> <a id="addInputField" class="btn btn-sm btn-success mt-3"> <i class="ph-plus"></i> </a></div></div></div>'
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
@endonce
