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
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('knowledge.index') }}" class="breadcrumb-item">Features Management</a>
                        <a href="" class="breadcrumb-item">Edit</a>
                    </div>
                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content pt-2 w-75 mx-auto">
            <div class="text-center">
                <div class="text-start">
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
                            <p class="text-white p-0 m-0 fw-bold"> Edit Features </p>
                        </div>

                        <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('purchase.index') }}" class="btn navigation_btn ms-2">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                    <span>Solution</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <form method="post" action="{{ route('feature.update', $feature->id) }}" enctype="multipart/form-data"
                    id="myform">
                    @csrf
                    @method('PUT')
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col-lg-6 col-sm-12">
                                <span class="m-0 p-0" style="border-bottom: 1px solid #247297;">Banner Section</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Badge</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" id="badge" name="badge"
                                                value="{{ $feature->badge }}" class="form-control form-control-sm"
                                                maxlength="255" placeholder="Badge" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Title</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="title" value="{{ $feature->title }}"
                                                class="form-control form-control-sm" maxlength="255"
                                                placeholder="Feature Title" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Logo</span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="file" name="logo"value="{{$feature->logo}}" class="form-control form-control-sm"
                                                id="image" accept="image/*" />
                                        </div>
                                        <div class="col-lg-2 col-sm-12 text-end">
                                            <img class="rounded-circle" id="showImage" height="25px" width="25px"
                                                src="{{ asset('storage/thumb/' . $feature->logo) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Image</span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="file" name="image" value="{{$feature->image}}" class="form-control form-control-sm"
                                                id="image1" accept="image/*" />
                                        </div>
                                        <div class="col-lg-2 col-sm-12 text-end">
                                            <img class="rounded-circle" id="showImage1" height="25px" width="25px"
                                                src="{{ asset('storage/thumb/' . $feature->image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Short Description For Homepage</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <textarea name="header" class="form-control form-control-sm" rows="3"
                                                style=" font-size: 12px; font-weight: 500;" placeholder="Short Description For Homepage">{{$feature->header}}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Row With List</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="row_one_id" data-placeholder="Select Row One.."
                                                class="form-select" style="width: 100%;">
                                                @foreach ($rows as $row)
                                                        <option class="form-control" value="{{ $row->id }}" {{ ($row->id == $feature->row_one_id) ? 'selected' : '' }}>
                                                            {{ $row->title }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <span class="m-0 p-0" style="border-bottom: 1px solid #247297;">Contact Row</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Title</span>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text"name="row_four_title" value="{{$feature->row_four_title}}"
                                                class="form-control form-control-sm" maxlength="255"
                                                placeholder="Contact Title" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Short Description</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <textarea name="row_four_header" id="" class="form-control" cols="30" rows="1"
                                                placeholder="Short Description for Contact">{!! $feature->row_four_header !!}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Row With Left Image</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <select name="row_two_id" data-placeholder="Select Row Two.."
                                                class="form-select" style="width: 100%;">
                                                @foreach ($rows as $row)
                                                        <option class="form-control" value="{{ $row->id }}" {{ ($row->id == $feature->row_two_id) ? 'selected' : '' }}>
                                                            {{ $row->title }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Row Three Title</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="row_three_title" value="{{$feature->row_three_title}}"
                                                class="form-control form-control-sm" maxlength="255"
                                                placeholder="Row Three Title" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Short Description</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <textarea name="row_three_header" id="" class="form-control" cols="30" rows="1"
                                                placeholder="Row Three Short Description">{{$feature->row_three_header}}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Feature Row Title</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="row_five_title" value="{{$feature->row_five_title}}"
                                                class="form-control form-control-sm maxlength" maxlength="255"
                                                placeholder="Related Feature Row Title" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-4 col-sm-12">
                                            <span>Short Description</span>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <textarea name="row_five_header" id="" class="form-control" cols="30" rows="1"
                                                placeholder="Related Feature Row Short Description">{{$feature->row_five_header}}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Footer</span>
                                        <textarea class="form-control" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;">{{$feature->footer}}</textarea>
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
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
