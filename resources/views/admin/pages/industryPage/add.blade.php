@extends('admin.master')
@section('content')
   
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('industryPage.index') }}" class="breadcrumb-item">Industry Page Management</a>
                        <a href="" class="breadcrumb-item">Add</a>
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
        <div class="content pt-2">
            <div class="text-center">
                <div class="text-start">
                    <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">

                        <div class="col-lg-2 col-sm-12">
                            <div>
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('industryPage.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-7 col-sm-12 d-flex justify-content-center">
                            <p class="text-white p-0 m-0 fw-bold"> Add Industry Page Form </p>
                        </div>

                        <div class="col-lg-3 col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
                                <div class="d-flex align-items-center ">
                                    <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                    <span>Row</span>
                                </div>
                            </a>
                            <a href="{{ route('solution.index') }}" class="btn navigation_btn ms-2">
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
                <form method="post" action="{{ route('industryPage.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!--Banner Section-->
                    <div class="container-fluid">
                        <div class="area-container">
                            <span class="fw-bold area-title">Banner Section</span>
                        </div>
                        <div class="row my-1 gx-1 border p-3">
                            <div class="col-lg-2">
                                <label for="">Industry Name</label>
                                <select name="industry_id" class="form-control form-select-sm select"
                                    data-container-css-class="select-sm" data-placeholder="Chose Industry Id" required>
                                    @foreach ($industries as $industrie)
                                        <option class="form-control form-control-sm" value="{{ $industrie->id }}">
                                            {{ $industrie->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Button Name</label>
                                <input type="text" name="btn_one_name" placeholder="Button Name"
                                    class="form-control form-control-sm maxlength" maxlength="100" />
                            </div>
                            <div class="col-lg-3">
                                <label for="">Button link</label>
                                <input type="text" name="btn_one_link" placeholder="Button link"
                                    class="form-control form-control-sm maxlength" maxlength="100" />
                            </div>
                            <div class="col-lg-5">
                                <label for="">Header</label>
                                <textarea name="header" id="" class="form-control form-control-sm" placeholder="Header"
                                   rows="1"></textarea>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="area-container">
                            <span class="fw-bold area-title">Row With Column</span>
                        </div>
                        <div class="row my-1 gx-1 border p-3">
                            <div class="col-lg-5">
                                <div class="row mb-1 gx-1">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Row with Columns</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <select name="row_one_id" data-placeholder="Select Row One ID"
                                            class="form-control form-control-sm select">
                                            <option></option>
                                            @foreach ($row_with_cols as $row_with_col)
                                                <option class="form-control" value="{{ $row_with_col->id }}">
                                                    {{ $row_with_col->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row gx-1">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-sm-12">
                                                <span>Row Four Title</span>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="text" name="row_four_title"
                                                    class="form-control form-control-sm maxlength"
                                                    placeholder="Row Four title" maxlength="100" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-sm-12">
                                                <span>Row Four Column One Header</span>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <textarea name="row_four_col_one_header" id="" class="form-control form-control-sm"
                                                    placeholder="Row Four Column One Header" cols="30" rows="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="area-container">
                            <span class="fw-bold area-title">Solution Section</span>
                        </div>
                        <div class="row my-1 gx-1 border p-3">
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Solution One</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <select name="solution_one_id" data-placeholder="Select Solution One"
                                            class="form-control select">
                                            <option></option>

                                            @foreach ($clients as $item)
                                                <option class="form-control form-control-sm" value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-sm-12">
                                        <span class="area_title">Solution Two</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <select name="solution_two_id" data-placeholder="Select Solution Two"
                                            class="form-control select">
                                            <option></option>
                                            @foreach ($clients as $item)
                                                <option class="form-control form-control-sm" value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Solution Three</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <select name="solution_three_id" data-placeholder="Select Solution Three"
                                            class="form-control form-control-sm select">
                                            <option></option>
                                            @foreach ($clients as $item)
                                                <option class="form-control " value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Solution Four</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <select name="solution_four_id" data-placeholder="Select Solution Four"
                                            class="form-control form-control-sm select">
                                            <option></option>

                                            @foreach ($clients as $item)
                                                <option class="form-control " value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}

                        <div class="row mb-1 mt-3 ">
                                <div class="col-lg-6">
                                    <div class="p-3 pt-2  bg-light">
                                        <div class="area-container ">
                                            <span class="fw-bold area-title">Row Details</span>
                                        </div>
                                        <div class="row my-1 mt-1 gx-1 border p-3 ">
                                            <div class="col-lg-12 mb-1">
                                                <span for="">Row Three </span>
                                                <select name="row_three_id" data-placeholder="Select Row Three ID"
                                                    class="form-control select">
                                                    <option></option>
                                                    @foreach ($rows as $row)
                                                        <option class="form-control form-control-sm"
                                                            value="{{ $row->id }}">
                                                            {{ $row->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-1">
                                                <span>Row Four Column One Title</span>
                                                <input type="text" name="row_four_col_one_title"
                                                    class="form-control form-control-sm maxlength"
                                                    placeholder="Row Four Column One Title" maxlength="100" />
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-1">
                                                <span>Row Four Column Two Header</span>
                                                <textarea name="row_four_col_two_header" id="" class="form-control form-control-sm"
                                                    placeholder="Row Four Column Two Header" cols="30" rows="1"></textarea>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-1">
                                                <span>Row Four Column Two Title</span>
                                                <input type="text" name="row_four_col_two_title"
                                                    class="form-control form-control-sm maxlength"
                                                    placeholder="Row Four Column Two Title" maxlength="100" />
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-1">
                                                <span>Row Four Header</span>
                                                <textarea name="row_four_header" id="" class="form-control form-control-sm" placeholder="Row Four Header"
                                                    cols="30" rows="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 pt-2 bg-light">
                                        <div class="area-container ">
                                            <span class="fw-bold area-title">Footer Details</span>
                                        </div>
                                        <div class="row my-1 gx-1 border p-3 ">
                                            <div class="col-lg-12 mb-1">
                                                <label for="">Row Five</label>
                                                <select name="row_five_id" data-placeholder="Select Row Five Id"
                                                    class="form-control select">
                                                    <option></option>
                                                    @foreach ($rows as $row)
                                                        <option class="form-control form-control-sm"
                                                            value="{{ $row->id }}">
                                                            {{ $row->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-12 mb-1 col-sm-12">
                                                <span>Client Story</span>
                                                <select name="client_story_id" data-placeholder="Select Client Story"
                                                    class="form-control select">
                                                    <option></option>
                                                    @foreach ($clientstory as $item)
                                                        <option class="form-control form-control-sm"
                                                            value="{{ $item->id }}">
                                                            {{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-12 mb-1 col-sm-12">
                                                <span>Footer Title</span>
                                                <input type="text" name="footer_title" placeholder="Footer Title"
                                                    class="form-control form-control-sm maxlength" maxlength="100" />
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <span>Footer Header</span>
                                                <textarea name="footer_header" id="footer_header" class="form-control form-control-sm" placeholder="Footer Header" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-2 pt-1 pe-3">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
            </div>

            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
