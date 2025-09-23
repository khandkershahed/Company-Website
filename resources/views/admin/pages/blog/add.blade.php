@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <a href="{{ route('blog.index') }}" class="breadcrumb-item">Blog Management</a>
                        <a href="" class="breadcrumb-item">Add</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1 "></i>
                    </a>
                </div>
                <div>
                    <a href="http://127.0.0.1:3000/admin/blog" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>Blog List</span>
                        </div>
                    </a>

                    <a href="#" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-calculator me-1" style="font-size: 12px;"></i>
                            <span>Site Content</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content pt-2">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row main_bg py-1 m-0 rounded-1 d-flex align-items-center justify-content-end">
                        <div class="col-lg-12 col-sm-12 px-3 d-flex justify-content-between align-items-center">
                            <div class="">
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('blog.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                            <p class="text-white p-0 m-0 fw-bold"> Add Blog </p>
                        </div>
                    </div>
                    <form id="myform" method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <!--Banner Section-->
                            <div class="container py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6">
                                        <span class="mt-1 fw-bold text-info">Description</span>
                                        <div class="px-2 py-2 rounded bg-light ">
                                            <div class="row mb-1">
                                                <div class="col-lg-4 d-flex align-items-center">
                                                    <span>Brands</span>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select name="brand_id[]" class="form-control-sm multiselect btn btn-sm"
                                                        id="select6" multiple="multiple"
                                                        data-include-select-all-option="true" data-enable-filtering="true"
                                                        data-enable-case-insensitive-filtering="true">

                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->title }}
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
                                                    <select name="category_id[]"
                                                        class="form-control-sm multiselect btn btn-sm" id="select6"
                                                        multiple="multiple" data-include-select-all-option="true"
                                                        data-enable-filtering="true"
                                                        data-enable-case-insensitive-filtering="true">

                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}
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
                                                    <select name="industry_id[]"
                                                        class="form-control-sm multiselect btn btn-sm" id="select6"
                                                        multiple="multiple" data-include-select-all-option="true"
                                                        data-enable-filtering="true"
                                                        data-enable-case-insensitive-filtering="true">

                                                        @foreach ($industries as $industrie)
                                                            <option value="{{ $industrie->id }}">{{ $industrie->title }}
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
                                                    <select name="solution_id[]"
                                                        class="form-control-sm multiselect btn btn-sm" id="select6"
                                                        multiple="multiple" data-include-select-all-option="true"
                                                        data-enable-filtering="true"
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
                                        <div class="px-2 py-2 rounded bg-light mb-1">
                                            <div class="row mb-1">
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
                                                <div class="col-lg-3 d-flex align-items-center">
                                                    <span>Banner Image</span>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <input name="image" id="image" accept="image/*"
                                                                type="file" class="form-control form-control-sm"
                                                                placeholder="Enter Banner Image">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <img class="img-fluid rounded-circle" id="showImage"
                                                                src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                                alt=""
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
                                                        rows="3" placeholder="Enter Header"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <span class="mt-1 fw-bold text-info">Writer</span>
                                        <div class="px-2 py-2 rounded bg-light ">
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-4 ">
                                                    <span>Author</span>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input name="created_by" maxlength="255" type="text"
                                                        class="form-control form-control-sm" placeholder="Enter Author">
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
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
                                            <div class="row mb-1">
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
                                    <div class="col-lg-4">
                                        <div class=" pt-1">
                                            <label class="">Featured Description </label>
                                            <div class="">
                                                <textarea class="form-control" name="short_des" id="featured_desc" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        {{--  --}}
                                        <div class=" pt-1">
                                            <label class="">Description </label>
                                            <div class="">
                                                <textarea class="form-control" name="long_des" id="long_desc" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        {{--  --}}
                                        <div class=" pt-1">
                                            <label
                                                class="">Footer
                                            </label>
                                            <div class="">
                                                <textarea class="form-control" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
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
            </div>
        </div>
        <!-- /content area -->


    </div>
@endsection
