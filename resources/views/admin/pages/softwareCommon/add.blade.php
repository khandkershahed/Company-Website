@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <a href="{{ route('software-common-page.index') }}" class="breadcrumb-item">Sofware Common Page</a>
                        <a href="" class="breadcrumb-item">Add</a>
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
                <div class="d-flex align-items-center justify-content-start main_bg py-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('software-common-page.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 23rem;">
                        <p class="text-white p-0 m-0 fw-bold"> Add Sofware Common Page Form</p>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('software-common-page.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col">
                                <span class="mt-1 fw-bold text-info">Banner Area</span>
                                <div class="px-2 py-2 rounded bg-light mb-3">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image </label>
                                        <div class="input-group">
                                            <input name="banner_image" type="file" class="form-control form-control-sm"
                                                placeholder="Enter Banner Image" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Title </label>
                                        <div class="input-group">
                                            <input name="banner_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Banner Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Short Description </label>
                                        <div class="input-group">
                                            <input name="banner_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Banner Short Description " required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Btn Name</label>
                                        <div class="input-group">
                                            <input name="banner_btn_name" type="text" maxlength="255"
                                                class="form-control form-control-sm" placeholder="Enter Banner Btn Name"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Btn Link</label>
                                        <div class="input-group">
                                            <input name="banner_btn_link" type="url" maxlength="100"
                                                class="form-control form-control-sm" placeholder="Enter Banner Btn Link"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Row Two </span>
                                <div class="px-2 py-2 rounded bg-light mb-4">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Title</label>
                                        <div class="input-group">
                                            <input name="row_two_title" maxlength="100" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Card Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Short Description </label>
                                        <div class="input-group">
                                            <input name="row_two_short_description" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Card Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Row Four Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Four Title </label>
                                        <div class="input-group">
                                            <input name="row_four_title" type="text" maxlength="255"
                                                class="form-control form-control-sm" placeholder="Enter Row Four Title "
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Four Sub Title </label>
                                        <div class="input-group">
                                            <input name="row_four_sub_title" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row Four Sub Title " required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Four Short Description </label>
                                        <div class="input-group">
                                            <input name="row_four_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row Four Short Description " required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Four Video Link </label>
                                        <div class="input-group">
                                            <input name="row_four_video_link" type="url" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row Four Video Link" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Four Btn Name </label>
                                        <div class="input-group">
                                            <input name="row_four_btn_name" type="text" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row Four Btn Name"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Four Btn Link </label>
                                        <div class="input-group">
                                            <input name="row_four_btn_link" type="url" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row Four Btn Link"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>

                            </div>
                            <div class="col">
                                <span class="mt-1 fw-bold text-info">Row Five Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Tab One</label>
                                        <select name="row_five_tab_one_id" class="form-control select"
                                            data-placeholder="Chose Row Five Tab One" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}">{{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Tab Two</label>
                                        <select name="row_five_tab_two_id" class="form-control select"
                                            data-placeholder="Chose Row Five Tab Two" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}">{{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Tab Three</label>
                                        <select name="row_five_tab_three_id" class="form-control select"
                                            data-placeholder="Chose row five tab Three " data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}">{{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Tab Four</label>
                                        <select name="row_five_tab_four_id" class="form-control select"
                                            data-placeholder="Chose row five tab Four " data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}">{{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Title</label>
                                        <div class="input-group">
                                            <input name="row_five_title" type="text" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row Five Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Short Description</label>
                                        <div class="input-group">
                                            <input name="row_five_short_description" type="text" maxlength="250"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row Five Short Description" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>

                                <span class="mt-1 fw-bold text-info">Row Six Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Six Title</label>
                                        <div class="input-group">
                                            <input name="row_six_title" type="text" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row Six Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Six Short Description</label>
                                        <div class="input-group">
                                            <input name="row_six_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row Six Short Description" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Six Btn Name</label>
                                        <div class="input-group">
                                            <input name="row_six_btn_name" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Row Six Btn Name"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Six Btn Link</label>
                                        <div class="input-group">
                                            <input name="row_six_btn_link" type="url"
                                                class="form-control form-control-sm" placeholder="Enter Row Six Btn Link"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Six Image</label>
                                        <div class="input-group">
                                            <input name="row_six_image" type="file"
                                                class="form-control form-control-sm" placeholder="Enter Row Six Image"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <span class="mt-1 fw-bold text-info">Row Seven Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Seven Title</label>
                                        <div class="input-group">
                                            <input name="row_seven_title" type="text" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row Seven Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>

                                <span class="fw-bold text-info">Row Eight Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Eight Title </label>
                                        <div class="input-group">
                                            <input name="row_eight_title" type="text" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row Eight Title "
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Eight Short Description </label>
                                        <div class="input-group">
                                            <input name="row_eight_short_description" type="text" maxlength="250"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row Eight Short Description" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-2">
                        <button type="button" class="submit_close_btn " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="submit_btn from-prevent-multiple-submits"
                            style="padding: 4px 9px;">Submit</button>
                    </div>
                </div>
            </form>
        <!-- /content area -->
        <!-- /inner content -->
    </div>
@endsection
