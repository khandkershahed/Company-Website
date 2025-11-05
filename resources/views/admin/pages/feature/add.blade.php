@extends('admin.master')
@section('content')
    <style>
        .label_style {
            width: 151px !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-flex justify-content-between align-items-center border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Features Management</a>
                        <a href="" class="breadcrumb-item">Add</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
                <div>
                    <a href="http://127.0.0.1:3000/admin/blog" class="btn navigation_btn">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-business-time me-1" style="font-size: 12px;"></i>
                            <span>Feature List</span>
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
        <div class="content pt-2 mx-auto">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    {{-- Headline --}}
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">
                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('feature.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Add Features </p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn" style="background-color: #ffffff; color: black">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('purchase.index') }}" class="btn navigation_btn ms-2" style="background-color: #ffffff; color: black">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                    <span>Solution</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <form id="myform" method="post" action="{{ route('feature.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!--Banner Section-->
                            <div class="container">
                                <div class="row p-1">
                                    <div class="col-lg-8 col-sm-12 bg-light rounded-2">
                                        <span class="mt-1 fw-bold text-info">Banner Section</span>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Badge</span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" id="badge" name="badge"
                                                            class="form-control form-control-sm" maxlength="255"
                                                            placeholder="Badge" required />
                                                    </div>
                                                </div>
                                                {{--  --}}
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Title</span>
                                                    </div>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <input type="text" name="title" class="form-control form-control-sm"
                                                            maxlength="255" placeholder="Feature Title" required />
                                                    </div>
                                                </div>
                                                {{--  --}}
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Logo</span>
                                                    </div>
                                                    <div class="col-lg-10 col-sm-12">
                                                        <input type="file" name="logo" class="form-control form-control-sm"
                                                            id="image" accept="image/*" />
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12 text-end">
                                                        <img id="showImage" height="25px" width="25px"
                                                            src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                {{--  --}}
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Banner Image</span>
                                                    </div>
                                                    <div class="col-lg-10 col-sm-12">
                                                        <input type="file" name="image" class="form-control form-control-sm"
                                                            id="image1" accept="image/*" />
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12 text-end">
                                                        <img id="showImage1" height="25px" width="25px"
                                                            src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Short Description</span>
                                                    </div>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <textarea name="header" class="form-control form-control-sm" rows="3"
                                                            style=" font-size: 12px; font-weight: 500;" placeholder="Short Description For Homepage"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Banner Button name</span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="banner_btn_name"
                                                            class="form-control form-control-sm" maxlength="255"
                                                            placeholder="Button name" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <span>Banner Button link</span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="banner_btn_link"
                                                            class="form-control form-control-sm" maxlength="255"
                                                            placeholder="Button link" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <span class="mt-1 fw-bold text-info">Description</span>
                                        <div class="px-2 py-2 rounded bg-light ">
                                            <div class="row mb-1">
                                                <div class="col-lg-4 d-flex align-items-center">
                                                    <span>Brands</span>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select name="brand_id[]" class="form-control-sm multiselect btn btn-sm"
                                                        id="select6" multiple="multiple" data-include-select-all-option="true"
                                                        data-enable-filtering="true" data-enable-case-insensitive-filtering="true">

                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->title }} </option>
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
                                                    <select name="category_id[]" class="form-control-sm multiselect btn btn-sm"
                                                        id="select6" multiple="multiple" data-include-select-all-option="true"
                                                        data-enable-filtering="true" data-enable-case-insensitive-filtering="true">

                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }} </option>
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
                                                    <select name="solution_id[]" class="form-control-sm multiselect btn btn-sm"
                                                        id="select6" multiple="multiple" data-include-select-all-option="true"
                                                        data-enable-filtering="true" data-enable-case-insensitive-filtering="true">

                                                        @foreach ($solutionDetails as $solutionDetail)
                                                            <option value="{{ $solutionDetail->id }}">{{ $solutionDetail->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-4 col-sm-12">
                                                    <span title="Row With List">List</span>
                                                </div>
                                                <div class="col-lg-8 col-sm-12">
                                                    <select name="row_one_id" data-placeholder="Select Row One.."
                                                        class="form-control select" style="width: 100%;">
                                                        @foreach ($rows as $row)
                                                            <option class="form-control" value="{{ $row->id }}">
                                                                {{ $row->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <span title="Row With Left Image">Left Image</span>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <select name="row_two_id" data-placeholder="Select Row Two.."
                                                            class="form-control select" style="width: 100%;">
                                                            @foreach ($rows as $row)
                                                                <option class="form-control" value="{{ $row->id }}">
                                                                    {{ $row->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <span class="mt-1 fw-bold text-info">Background Image Row</span>
                                        <div class="px-2 py-2 rounded bg-light">
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-4 col-sm-12">
                                                    <span>Title</span>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="row_four_title"
                                                        class="form-control form-control-sm" maxlength="255"
                                                        placeholder="Feature Title" required />
                                                </div>
                                            </div>

                                            {{--  --}}

                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Background Image(Row Three) </span>
                                                </div>
                                                <div class="col-lg-11 col-sm-12">
                                                    <input type="file" name="row_four_image"
                                                        class="form-control form-control-sm" id="image" accept="image/*" />
                                                </div>
                                                <div class="col-lg-1 col-sm-12 text-end">
                                                    <img id="showImage" height="25px" width="25px"
                                                        src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-lg-4 col-sm-12">
                                                    <span>Short Description</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="row_four_header" id="" class="form-control" cols="30" rows="8"
                                                        placeholder="Short Description for Contact"></textarea>
                                                </div>
                                            </div>

                                            {{--  --}}


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mt-2">
                                        <span class="mt-1 fw-bold text-info">Background Color Row</span>
                                        <div class="px-2 py-2 rounded bg-light">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Five Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="row_three_title"
                                                        class="form-control form-control-sm" maxlength="255"
                                                        placeholder="Row Three Title" />
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Five Short Description</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="row_three_header" id="" class="form-control" cols="30" rows="1"
                                                        placeholder="Row Three Short Description"></textarea>
                                                </div>
                                            </div>


                                        </div>
                                        <span class="mt-1 fw-bold text-info">More Feature Row</span>
                                        <div class="px-2 py-2 rounded bg-light">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Seven Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="row_five_title"
                                                        class="form-control form-control-sm maxlength" maxlength="255"
                                                        placeholder="Related Feature Row Title" />
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Seven Short Description</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="row_five_header" id="" class="form-control" cols="30" rows="1"
                                                        placeholder="Related Feature Row Short Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}

                                {{--  --}}

                                {{--  --}}
                                <div class="row">
                                    <div class="col">
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-sm-12">
                                                <span>Footer</span>
                                                <textarea class="form-control" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;"></textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pb-2 pe-3">
                                <button type="submit" class="submit_btn from-prevent-multiple-submits" id="submitbtn"
                                    style="padding: 4px 9px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
