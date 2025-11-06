@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top justify-content-between align-items-center">
                <div class="d-flex ">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <a href="{{ route('techglossy.index') }}" class="breadcrumb-item">Tech Glossy Management</a>
                        <a href="" class="breadcrumb-item">Add</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1 "></i>
                    </a>
                </div>
                <div>
                    <a href="{{ route('admin.blog.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>Blog</span>
                        </div>
                    </a>

                    <a href="{{ route('techglossy.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-calculator me-1" style="font-size: 12px;"></i>
                            <span>Techglossy</span>
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
        <div class="content pt-2 w-75 mx-auto">
            <div class="text-start">
                <div class="row main_bg py-1 m-0 rounded-1 d-flex align-items-center justify-content-end">
                    <div class="col-lg-12 col-sm-12 d-flex justify-content-between align-items-center px-2">
                        <div class="">
                            <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                href="{{ route('techglossy.index') }}">
                                <i class="fa-solid fa-arrow-left main_color"></i>
                            </a>
                        </div>
                        <p class="text-white p-0 m-0 fw-bold"> Add Techglossy </p>
                    </div>
                </div>
            </div>

            <form id="myform" method="post" action="{{ route('techglossy.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card rounded-0">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col-lg-6">
                                <div class="px-2 py-2 rounded bg-light ">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Author</label>
                                        <div class="input-group">
                                            <input name="created_by" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Author" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Badge
                                            Name</label>
                                        <div class="input-group">
                                            <input name="badge" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Author Badge"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1 form-switch">
                                        <label class="form-check-label" for="sc_r_secondary">Featured</label>
                                        <div class="input-group" style="margin-left: 6.5rem !important;">
                                            <input type="checkbox" name="featured" value="1"
                                                class="form-check-input form-check-input-secondary" id="sc_r_secondary">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Related To</span>
                                <div class="px-2 py-2 rounded bg-light ">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Brands</label>
                                        <div class="input-group">
                                            <select name="brand_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true"
                                                data-enable-case-insensitive-filtering="true">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Categories</label>
                                        <div class="input-group">
                                            <select name="category_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true"
                                                data-enable-case-insensitive-filtering="true">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Industries</label>
                                        <div class="input-group">
                                            <select name="industry_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true"
                                                data-enable-case-insensitive-filtering="true">
                                                <option></option>
                                                @foreach ($industries as $industrie)
                                                    <option value="{{ $industrie->id }}">{{ $industrie->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solutions</label>
                                        <div class="input-group">
                                            <select name="solution_id[]" class="form-control-sm multiselect btn btn-sm"
                                                id="select6" multiple="multiple" data-include-select-all-option="true"
                                                data-enable-filtering="true"
                                                data-enable-case-insensitive-filtering="true">
                                                <option></option>
                                                @foreach ($solutionDetails as $solutionDetail)
                                                    <option value="{{ $solutionDetail->id }}">{{ $solutionDetail->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Details</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Title
                                        </label>
                                        <div class="input-group">
                                            <input name="title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Box One Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 70%">
                                                <input name="image" id="image" accept="image/*" type="file"
                                                    class="form-control form-control-sm" placeholder="Enter Banner Image">
                                            </div>
                                            <div class=" ms-2" style="width: 10%">
                                                <img class="img-fluid rounded-circle" id="showImage"
                                                    src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                    alt=""
                                                    style="width: 30px;
                                                        height: 30px;
                                                         margin-left: 2.5rem;">
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Header</label>
                                        <div class="input-group">
                                            <textarea class="form-control maxlength" name="header" id="" maxlength="500" cols="30"
                                                rows="3" placeholder="Enter Header"></textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <span class="mt-1 fw-bold text-info">Featured
                                    Description</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Tags
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="tags"
                                                class="form-control form-control-sm visually-hidden" data-role="tagsinput"
                                                placeholder="Related Tags" maxlength="250">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                {{--  --}}
                                <div class=" pt-1">
                                    <div class="">
                                        <textarea class="form-control w-100" name="short_des" id="featured_desc"
                                            style=" font-size: 12px; font-weight: 500;"></textarea>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="row">
                            {{--  --}}
                            <div class="col-lg-6 pt-1">
                                <label
                                    class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Description
                                </label>
                                <div class="">
                                    <textarea class="form-control" name="long_des" id="long_desc" style=" font-size: 12px; font-weight: 500;"></textarea>
                                </div>
                            </div>
                            {{--  --}}
                            {{--  --}}
                            <div class="col-lg-6 pt-1">
                                <label
                                    class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Footer
                                </label>
                                <div class="">
                                    <textarea class="form-control" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;"></textarea>
                                </div>
                            </div>
                            {{--  --}}
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
