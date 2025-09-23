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
                        <a href="{{ route('training-page.index') }}" class="breadcrumb-item">Training Page</a>
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
                <div class="d-flex align-items-center justify-content-start main_bg py-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('training-page.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 23rem;">
                        <p class="text-white p-0 m-0 fw-bold"> Edit Training Page Form</p>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('training-page.update', $trainingPage->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col-12">
                                <span class="mt-1 fw-bold text-info">Banner Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image </label>
                                        <div class="input-group">
                                            <input name="banner_image" type="file"
                                                class="form-control form-control-sm w-75"
                                                placeholder="Enter Software Banner Image"
                                                value="{{ $trainingPage->banner_image }}">
                                            <img class="px-1" id="showImage" height="30px" width="50px"
                                                src="{{ asset('storage/' . $trainingPage->banner_image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-3">
                                        <label class="col-form-label col-lg-3 p-0 text-start text-black">Row One </label>
                                        <select name="row_one_id" class="form-control select"
                                            data-placeholder="Chose Row One" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}" @selected($row->id == $trainingPage->row_one_id)>
                                                    {{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <span class="mt-1 fw-bold text-info">Row Two </span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Title</label>
                                        <div class="input-group">
                                            <input name="row_two_title" maxlength="100" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Software Card Title"
                                                value="{{ $trainingPage->row_two_title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Short Description </label>
                                        <textarea name="row_two_short_description" rows="5">{{ $trainingPage->row_two_short_description }}</textarea>

                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-3">
                                        <label class="col-form-label col-lg-3 p-0 text-start text-black">Row
                                            Two Btn Name</label>
                                        <div class="input-group">
                                            <input name="row_two_btn_name" type="text" value="{{ $trainingPage->row_two_btn_name }}"
                                                class="form-control form-control-sm" placeholder="Enter Row Two Btn Name"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-3">
                                        <label class="col-form-label col-lg-3 p-0 text-start text-black">Row
                                            Two Btn Link</label>
                                        <div class="input-group">
                                            <input name="row_two_btn_link" type="url" value="{{ $trainingPage->row_two_btn_link }}"
                                                class="form-control form-control-sm" placeholder="Enter Row Two Btn Link"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-3">
                                        <label class="col-form-label col-lg-3 p-0 text-start text-black">Row
                                            Two Image</label>
                                        <div class="input-group">
                                            <input name="row_two_image" type="file" class="form-control form-control-sm"
                                                placeholder="Enter Row Two Image">
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Tab One</label>
                                        <select name="row_two_tab_one_id" class="form-control select"
                                            data-placeholder="Chose Row Two Tab One" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}" @selected($row->id == $trainingPage->row_two_tab_one_id)>
                                                    {{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Tab Two</label>
                                        <select name="row_two_tab_two_id" class="form-control select"
                                            data-placeholder="Chose Row Two Tab Two" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}" @selected($row->id == $trainingPage->row_two_tab_two_id)>
                                                    {{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Tab Three</label>
                                        <select name="row_two_tab_three_id" class="form-control select"
                                            data-placeholder="Chose row five tab Three " data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}" @selected($row->id == $trainingPage->row_two_tab_three_id)>
                                                    {{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Tab Four</label>
                                        <select name="row_two_tab_four_id" class="form-control select"
                                            data-placeholder="Chose row five tab Four " data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}" @selected($row->id == $trainingPage->row_two_tab_four_id)>
                                                    {{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                </div>

                                <span class="mt-1 fw-bold text-info">Background Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Background
                                            Image </label>
                                        <div class="input-group">
                                            <input name="background_image" type="file"
                                                class="form-control form-control-sm w-75"
                                                placeholder="Enter Background Image"
                                                value="{{ $trainingPage->background_image }}">
                                            <img class="px-1" id="showImage" height="30px" width="50px"
                                                src="{{ asset('storage/' . $trainingPage->background_image) }}"
                                                alt="">
                                        </div>

                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Row Five Area</span>
                                <div class="px-2 py-2 rounded bg-light mb-4">
                                    <div class="d-flex align-items-center pt-3">
                                        <label class="col-form-label col-lg-3 p-0 text-start text-black">Row Five </label>
                                        <select name="row_five_id" class="form-control select"
                                            data-placeholder="Chose Row Five" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option value="{{ $row->id }}" @selected($row->id == $trainingPage->row_five_id)>
                                                    {{ $row->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Row Six Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Six Title</label>
                                        <div class="input-group">
                                            <input name="row_seven_title" type="text" maxlength="250"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Software Row Six Title"
                                                value="{{ $trainingPage->row_seven_title }}">
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
            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
