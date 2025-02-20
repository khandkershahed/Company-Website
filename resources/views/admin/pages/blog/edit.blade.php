@extends('admin.master')
@section('content')
    <style>
        .label_style {
            width: 80px !important;
        }
        .note-editor{
            width: 100% !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <a href="{{ route('blog.index') }}" class="breadcrumb-item">Blog Management</a>
                        <a href="" class="breadcrumb-item">Edit</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1 "></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content pt-2 w-75 mx-auto">
            <div class="text-start">
                <div class="row main_bg py-1 m-0 rounded-1 d-flex align-items-center justify-content-end">
                    <div class="col-lg-4 col-sm-12">
                        <div class="ms-2">
                            <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                href="{{ route('blog.index') }}">
                                <i class="fa-solid fa-arrow-left main_color"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <p class="text-white p-0 m-0 fw-bold"> Edit Blog </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">

                    </div>

                </div>
            </div>
            <form id="myform" method="post" action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <!--Banner Section-->
                    <div class="container py-2">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <span class="mt-1 fw-bold text-info">Related To</span>
                                <div class="px-2 py-2 rounded bg-light ">
                                    <div class="row mb-1">
                                        <div class="col-lg-4 d-flex align-items-center">
                                            <span>Brands</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="brand_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true" data-enable-case-insensitive-filtering="true">
                                                @php
                                                    $brandIds = isset($blog->brand_id) ? json_decode($blog->brand_id, true) : [];
                                                    $brands = App\Models\Admin\Brand::pluck('title', 'id')->toArray();
                                                @endphp
                                                @foreach ($brands as $id => $title)
                                                    <option value="{{ $id }}"
                                                        {{ is_array($brandIds) && in_array($id, $brandIds) ? 'selected' : '' }}>
                                                        {{ $title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 d-flex align-items-center">
                                            <span>Categories</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="category_id[]" class="form-control multiselect" id="select6"
                                                multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true" data-enable-case-insensitive-filtering="true">
                                                @php
                                                    $categoryIds = isset($blog->category_id) ? json_decode($blog->category_id, true) : [];
                                                    $categories = App\Models\Admin\Category::pluck('title', 'id')->toArray();
                                                @endphp
                                                @foreach ($categories as $id => $title)
                                                    <option value="{{ $id }}"
                                                        {{ is_array($categoryIds) && in_array($id, $categoryIds) ? 'selected' : '' }}>
                                                        {{ $title }}
                                                    </option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 d-flex align-items-center">
                                            <span>Industries</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="industry_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true" data-enable-case-insensitive-filtering="true">
                                                @php
                                                    $industryIds = isset($blog->industry_id) ? json_decode($blog->industry_id, true) : [];
                                                    $industries = App\Models\Admin\Industry::pluck('title', 'id')->toArray();
                                                @endphp

                                                @foreach ($industries as $id => $title)
                                                    <option value="{{ $id }}"
                                                        {{ is_array($industryIds) && in_array($id, $industryIds) ? 'selected' : '' }}>
                                                        {{ $title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 d-flex align-items-center">
                                            <span>Solutions</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="solution_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true" data-enable-case-insensitive-filtering="true">
                                                @php
                                                    $solutionIds = isset($blog->solution_id) ? json_decode($blog->solution_id, true) : [];
                                                    $solutions = App\Models\Admin\SolutionDetail::pluck('name', 'id')->toArray();
                                                @endphp

                                                @foreach ($solutions as $id => $title)
                                                    <option value="{{ $id }}"
                                                        {{ is_array($solutionIds) && in_array($id, $solutionIds) ? 'selected' : '' }}>
                                                        {{ $title }}
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
                                                class="form-control form-control-sm" placeholder="Enter Box One Title"
                                                value="{{ $blog->title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row">
                                        <div class="col-lg-3 d-flex align-items-center">
                                            <span>Banner Image</span>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <input name="image" id="image" accept="image/*" type="file"
                                                        class="form-control form-control-sm"
                                                        placeholder="Enter Banner Image">
                                                </div>
                                                <div class="col-lg-4">
                                                    <img class="img-fluid rounded-circle" id="showImage"
                                                        src="{{ asset('storage/thumb/' . $blog->image) }}" alt=""
                                                        style="width: 30px;
                                                        height: 30px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-3 d-flex align-items-center">
                                            <span>Header</span>
                                        </div>
                                        <div class="col-lg-9">
                                            <textarea class="form-control maxlength" name="header" id="" maxlength="500" cols="30"
                                                rows="3" placeholder="Enter Header">{{ $blog->header }}</textarea>
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
                                            <input type="text" name="tags" class="form-control form-control-sm visually-hidden"
                                              data-role="tagsinput" value="{{ $blog->tags }}" maxlength="250">

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
                                            <textarea class="form-control" name="short_des" id="featured_desc" style=" font-size: 12px; font-weight: 500;">{!! $blog->short_des !!}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class=" pt-1">
                                        <label
                                            class="col-form-label fw-bold label_style col-lg-2 p-0 text-start text-black label_style">Description
                                        </label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="long_des" id="long_desc" style=" font-size: 12px; font-weight: 500;">{!! $blog->long_des !!}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class=" pt-1">
                                        <label
                                            class="col-form-label fw-bold label_style col-lg-2 p-0 text-start text-black label_style">Footer
                                        </label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;">{!! $blog->footer !!}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-2">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits" id="submitbtn"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
                </div>
        </form>
    </div>
    <!-- /content area -->


    </div>
@endsection
