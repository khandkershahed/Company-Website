<x-admin-app-layout :title="'Blog Create'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Add Blog</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.blog.index') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Back to the List</a>
                </div>
            </div>
            <div class="card-body">
                <form id="myform" method="post" action="{{ route('admin.blog.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <!--Banner Section-->
                        <div class="container py-2">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <span class="mt-1 fw-bold text-info">Description</span>
                                    <div class="px-2 py-2 rounded bg-active-info">
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Brands</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="brand_id[]" class="form-select form-select-solid"
                                                    id="brand_id" multiple="multiple" data-control="select2"
                                                    data-allow-clear="true" data-include-select-all-option="true"
                                                    data-enable-filtering="true"
                                                    data-enable-case-insensitive-filtering="true"
                                                    data-placeholder="Brand">

                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Categories</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="category_id[]" class="form-select form-select-solid"
                                                    id="category_id" multiple="multiple" data-control="select2"
                                                    data-allow-clear="true" data-include-select-all-option="true"
                                                    data-enable-filtering="true" data-placeholder="Category"
                                                    data-enable-case-insensitive-filtering="true">

                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Industries</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="industry_id[]" class="form-select form-select-solid"
                                                    id="industry_id" multiple="multiple" data-control="select2"
                                                    data-allow-clear="true" data-include-select-all-option="true"
                                                    data-enable-filtering="true" data-placeholder="Industry"
                                                    data-enable-case-insensitive-filtering="true">

                                                    @foreach ($industries as $industrie)
                                                        <option value="{{ $industrie->id }}">{{ $industrie->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Solutions</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="solution_id[]" class="form-select form-select-solid"
                                                    id="solution_id" multiple="multiple" data-control="select2"
                                                    data-allow-clear="true" data-include-select-all-option="true"
                                                    data-enable-filtering="true" data-placeholder="Solution"
                                                    data-enable-case-insensitive-filtering="true">

                                                    @foreach ($solutionDetails as $solutionDetail)
                                                        <option value="{{ $solutionDetail->id }}">
                                                            {{ $solutionDetail->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <span class="mt-1 fw-bold text-info">Blog Details</span>
                                    <div class="px-2 py-2 rounded bg-light mb-5">
                                        <div class="row mb-5">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <span>Title <span class="text-danger">*</span></span>
                                            </div>
                                            <div class="col-lg-9">
                                                <input name="title" maxlength="250" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Blog Title"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row">
                                            <div class="col-lg-12 mb-5">
                                                <x-metronic.label for="image" class="fw-bold fs-6">Banner Image</x-metronic.label>
                                                <x-metronic.file-input id="image" name="image"
                                                    :value="old('image')"></x-metronic.file-input>
                                            </div>
                                           
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <span>Header</span>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea class="form-control maxlength" name="header" id="" maxlength="500" cols="30"
                                                    rows="3" placeholder="Enter Header"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <span class="mt-1 fw-bold text-info">Writer</span>
                                    <div class="px-2 py-2 rounded bg-light ">
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 ">
                                                <span>Author</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <input name="created_by" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Author">
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 ">
                                                <span>Badge
                                                    Name <span class="text-danger">*</span></span>
                                            </div>
                                            <div class="col-lg-8">
                                                <input name="badge" maxlength="200" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Badge"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4">
                                                <label class="form-check-label" for="sc_r_secondary">Featured</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="checkbox" name="featured" value="1"
                                                        class="form-check-input form-check-input-secondary"
                                                        id="sc_r_secondary">
                                                </div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <span>Tags <span class="text-danger">*</span></span>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="tags"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" placeholder="Related Tags" maxlength="250"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <span class="mt-1 fw-bold text-info">Blog Details</span>
                                <div class="col-lg-12 mb-5">
                                    <div class=" pt-1">
                                        <label class="">Featured Description </label>
                                        <div class="">
                                            <textarea class="form-control ckeditor" name="short_des" id="featured_desc"
                                                style=" font-size: 12px; font-weight: 500;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    {{--  --}}
                                    <div class=" pt-1">
                                        <label class="">Description </label>
                                        <div class="">
                                            <textarea class="form-control ckeditor" name="long_des" id="long_desc" style=" font-size: 12px; font-weight: 500;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    {{--  --}}
                                    <div class=" pt-1">
                                        <label class="">Footer
                                        </label>
                                        <div class="">
                                            <textarea class="form-control ckeditor" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                            <div class="p-2 float-end">
                                <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                                    id="submitbtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>
