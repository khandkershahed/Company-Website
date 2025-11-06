<x-admin-app-layout :title="'Blog Edit'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Edit Blog</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.blog.index') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Back to the List</a>
                </div>
            </div>
            <div class="card-body">
                <form id="myform" method="post" action="{{ route('admin.blog.update', $blog->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <!--Banner Section-->
                        <div class="container py-2">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <span class="mt-1 fw-bold text-info">Description</span>
                                    <div class="px-2 py-2 rounded bg-active-info">
                                        {{-- Brands --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Brands</span>
                                            </div>
                                            <div class="col-lg-8">
                                                @php
                                                    $brandIds = [];

                                                    if (!empty($blog->brand_id)) {
                                                        if (is_array($blog->brand_id)) {
                                                            $brandIds = $blog->brand_id;
                                                        } elseif (is_string($blog->brand_id)) {
                                                            $brandIds = json_decode($blog->brand_id, true) ?? [];
                                                        }
                                                    }
                                                @endphp

                                                <select name="brand_id[]" class="form-select form-select-solid"
                                                    id="brand_id" multiple data-control="select2"
                                                    data-allow-clear="true" data-placeholder="Brand">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ in_array((string) $brand->id, $brandIds, true) ? 'selected' : '' }}>
                                                            {{ $brand->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Categories --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Categories</span>
                                            </div>
                                            <div class="col-lg-8">
                                                @php
                                                    $categoryIds = [];

                                                    if (!empty($blog->category_id)) {
                                                        if (is_array($blog->category_id)) {
                                                            $categoryIds = $blog->category_id;
                                                        } elseif (is_string($blog->category_id)) {
                                                            $categoryIds = json_decode($blog->category_id, true) ?? [];
                                                        }
                                                    }
                                                @endphp

                                                <select name="category_id[]" class="form-select form-select-solid"
                                                    id="category_id" multiple data-control="select2"
                                                    data-allow-clear="true" data-placeholder="Category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ in_array((string) $category->id, $categoryIds, true) ? 'selected' : '' }}>
                                                            {{ $category->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Industries --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Industries</span>
                                            </div>
                                            <div class="col-lg-8">
                                                @php
                                                    $industryIds = [];

                                                    if (!empty($blog->industry_id)) {
                                                        if (is_array($blog->industry_id)) {
                                                            $industryIds = $blog->industry_id;
                                                        } elseif (is_string($blog->industry_id)) {
                                                            $industryIds = json_decode($blog->industry_id, true) ?? [];
                                                        }
                                                    }
                                                @endphp

                                                <select name="industry_id[]" class="form-select form-select-solid"
                                                    id="industry_id" multiple data-control="select2"
                                                    data-allow-clear="true" data-placeholder="Industry">
                                                    @foreach ($industries as $industry)
                                                        <option value="{{ $industry->id }}"
                                                            {{ in_array((string) $industry->id, $industryIds, true) ? 'selected' : '' }}>
                                                            {{ $industry->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Solutions --}}
                                        <div class="row mb-5">
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <span>Solutions</span>
                                            </div>
                                            <div class="col-lg-8">
                                                @php
                                                    $solutionIds = [];

                                                    if (!empty($blog->solution_id)) {
                                                        if (is_array($blog->solution_id)) {
                                                            $solutionIds = $blog->solution_id;
                                                        } elseif (is_string($blog->solution_id)) {
                                                            $solutionIds = json_decode($blog->solution_id, true) ?? [];
                                                        }
                                                    }
                                                @endphp

                                                <select name="solution_id[]" class="form-select form-select-solid"
                                                    id="solution_id" multiple data-control="select2"
                                                    data-allow-clear="true" data-placeholder="Solution">
                                                    @foreach ($solutions as $solution)
                                                        <option value="{{ $solution->id }}"
                                                            {{ in_array((string) $solution->id, $solutionIds, true) ? 'selected' : '' }}>
                                                            {{ $solution->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <span class="mt-1 fw-bold text-info">Details</span>
                                    <div class="px-2 py-2 rounded bg-light mb-1">
                                        <div class="row mb-1">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <span>Title</span>
                                            </div>
                                            <div class="col-lg-9">
                                                <input name="title" maxlength="250" type="text"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Box One Title" value="{{ $blog->title }}">
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row">
                                            <div class="col-lg-12 mb-5">
                                                <x-metronic.label for="image" class="fw-bold fs-6">Banner
                                                    Image</x-metronic.label>
                                                <x-metronic.file-input id="image" name="image" :source="asset('storage/' . $blog->image)"
                                                    :value="old('image')"></x-metronic.file-input>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-1">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <span>Header</span>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea class="form-control maxlength" name="header" id="" maxlength="500" cols="30" rows="3"
                                                    placeholder="Enter Header">{{ $blog->header }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="px-2 py-2 rounded bg-light ">
                                        {{--  --}}
                                        <div class="row mb-1">
                                            <div class="col-lg-4 ">
                                                <span>Author</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <input name="created_by" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Author"
                                                    value="{{ $blog->created_by }}">
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-1">
                                            <div class="col-lg-4 ">
                                                <span>Badge
                                                    Name</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <input name="badge" maxlength="250" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Badge"
                                                    value="{{ $blog->badge }}">
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <label class="form-check-label" for="sc_r_secondary">Featured</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="checkbox" name="featured" value="1"
                                                        {{ $blog->featured == 1 ? 'checked' : '' }}
                                                        class="form-check-input form-check-input-secondary"
                                                        id="sc_r_secondary">
                                                </div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <span>Tags</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="tags"
                                                    class="form-control form-control-sm visually-hidden"
                                                    data-role="tagsinput" value="{{ $blog->tags }}"
                                                    maxlength="250">

                                            </div>
                                        </div>
                                        {{--  --}}
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <span class="mt-1 fw-bold text-info">Details</span>
                                    <div class="px-2 py-2 rounded bg-light">
                                        {{--  --}}
                                        <div class=" pt-1">
                                            <label
                                                class="col-form-label fw-bold label_style col-lg-2 p-0 text-start text-black "
                                                style="width: 120px !important;">Featured Description
                                            </label>
                                            <div class="input-group">
                                                <textarea class="form-control ckeditor" name="short_des" id="featured_desc"
                                                    style=" font-size: 12px; font-weight: 500;">{!! $blog->short_des !!}</textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class=" pt-1">
                                            <label
                                                class="col-form-label fw-bold label_style col-lg-2 p-0 text-start text-black label_style">Description
                                            </label>
                                            <div class="input-group">
                                                <textarea class="form-control ckeditor" name="long_des" id="long_desc" style=" font-size: 12px; font-weight: 500;">{!! $blog->long_des !!}</textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class=" pt-1">
                                            <label
                                                class="col-form-label fw-bold label_style col-lg-2 p-0 text-start text-black label_style">Footer
                                            </label>
                                            <div class="input-group">
                                                <textarea class="form-control ckeditor" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;">{!! $blog->footer !!}</textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                    </div>
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
