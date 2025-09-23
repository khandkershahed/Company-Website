@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <section class="shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Page Destination/ BreadCrumb --}}
                <div class="page-header-content d-lg-flex ">
                    <div class="d-flex px-2">
                        <div class="breadcrumb py-2">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                            <a href="{{ route('admin.site-content.index') }}" class="breadcrumb-item">Site Contents</a>
                            <a href="{{ route('about-us.index') }}" class="breadcrumb-item">About Us Page</a>
                            <a href="" class="breadcrumb-item">Edit<span class="breadcrumb-item active"></span></a>
                        </div>
                        <a href="#breadcrumb_elements"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
                {{-- Inner Page Tab --}}

                <!-- Basic tabs -->
        </section>
        <!-- Content area -->
        <div class="container content pt-2 ">
            <div class="text-start">
                <div class="d-flex align-items-center justify-content-between main_bg py-1 rounded-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('about-us.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 17rem;">
                        <p class="text-white p-0 m-0 fw-bold">Edit About Us Page</p>
                    </div>
                    <div style="margin-left: 14rem; margin-right: 2rem;">
                        <a href="{{ route('row.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                <span>Row Builder</span>
                            </div>
                        </a>
                        <a href="{{ route('solutionCard.index') }}" class="btn navigation_btn">
                            <div class="d-flex align-items-center ">
                                <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                <span>Solution Card</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <form action="{{ route('about-us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <!--Banner Section-->
                    <div class="container py-2">
                        <div class="row mx-1 mt-1 rounded bg-light">
                            <span class="mt-1 fw-bold text-info">Banner Section</span>
                            <div class="row mt-0 pb-2">

                                <div class="col-lg-6 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Banner
                                        Image</label>
                                    <div class="input-group">
                                        <input name="banner_image" value="{{ $aboutUs->banner_image }}" id="image"
                                            accept="image/*" type="file" class="form-control form-control-sm"
                                            placeholder="Enter Banner Image">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mx-1 mt-1 rounded bg-light">
                            <span class="mt-1 fw-bold text-info">Row Section</span>
                            <div class="row mt-0 pb-2">
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-form-label label_style col-lg-2 p-0 text-start text-black">
                                        Row One</label>
                                    <select name="row_one_id" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose Row One" required>
                                        <option></option>
                                        @foreach ($rows as $row)
                                            <option class="form-control" value="{{ $row->id }}"
                                                @selected($row->id == $aboutUs->row_one_id)>
                                                {{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-form-label label_style col-lg-2 p-0 text-start text-black">
                                        Row Two</label>
                                    <select name="row_two_id" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose Row Two" required>
                                        <option></option>
                                        @foreach ($rows as $row)
                                            <option class="form-control" value="{{ $row->id }}"
                                                @selected($row->id == $aboutUs->row_two_id)>
                                                {{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-form-label label_style col-lg-2 p-0 text-start text-black">
                                        Row Three</label>
                                    <select name="row_three_id" class="form-control form-select-sm select"
                                        data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                        data-placeholder="Chose Row Three" required>
                                        <option></option>
                                        @foreach ($rows as $row)
                                            <option class="form-control" value="{{ $row->id }}"
                                                @selected($row->id == $aboutUs->row_three_id)>
                                                {{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-1 mt-1 rounded bg-light">
                            <span class="mt-1 fw-bold text-info">Video Row Section</span>
                            <div class="row mt-0 pb-2">
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Vide Section Title</label>
                                    <div class="input-group">
                                        <input name="video_section_title" value="{{ $aboutUs->video_section_title }}"
                                            type="text" maxlength="255" class="form-control form-control-sm"
                                            placeholder="Enter...." style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Video Row Title</label>
                                    <div class="input-group">
                                        <input name="video_row_title" value="{{ $aboutUs->video_row_title }}"
                                            type="text" maxlength="255" class="form-control form-control-sm"
                                            placeholder="Enter...." style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 text-start text-black">Video Row Short Description</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="video_row_short_description" rows="1"
                                            placeholder="Enter Solution Card Section Header">{!! $aboutUs->video_row_short_description !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Video Link</label>
                                    <div class="input-group">
                                        <input name="video_link" value="{{ $aboutUs->video_link }}" type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Enter....">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mx-1 mt-1 rounded bg-light">
                            <span class="mt-1 fw-bold text-info">Ceo Section</span>
                            <div class="row mt-0 pb-2">
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Ceo Row Image</label>
                                    <div class="input-group">
                                        <input name="ceo_image" value="{{ $aboutUs->ceo_image }}" id="image"
                                            accept="image/*" type="file" class="form-control form-control-sm"
                                            placeholder="Enter Banner Image">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Ceo Row Title</label>
                                    <div class="input-group">
                                        <input name="ceo_title" value="{{ $aboutUs->ceo_title }}" type="text"
                                            maxlength="255" class="form-control form-control-sm"
                                            placeholder="Enter " style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 text-start text-black">Ceo Row Short Description</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="ceo_short_description" rows="1"
                                            placeholder="Enter">{!! $aboutUs->ceo_short_description !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 px-2 text-start text-black">Button Name</label>
                                    <div class="input-group">
                                        <input name="ceo_button_name" value="{{ $aboutUs->ceo_button_name }}"
                                            type="text" maxlength="255" class="form-control form-control-sm"
                                            placeholder="Enter Button Name" style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label class="col-lg-12 p-0 text-start text-black">Button Link</label>
                                    <div class="input-group">
                                        <input name="ceo_button_link" value="{{ $aboutUs->ceo_button_link }}"
                                            type="text" maxlength="255" class="form-control form-control-sm"
                                            placeholder="Enter Button Link">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer border-0 pb-0 pe-0 mt-3">
                            <button type="submit" class="mx-3 submit_btn from-prevent-multiple-submits"
                                style="padding: 4px 9px;">Submit</button>
                        </div>

                    </div>
                </div>

        </div>
        </form>
    </div>
    <!-- /content area -->

    </div>
@endsection
