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
                        <a href="{{ route('what-we-do-page.index') }}" class="breadcrumb-item">What We Do Pages
                            Management</a>
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
                            href="{{ route('what-we-do-page.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 23rem;">
                        <p class="text-white p-0 m-0 fw-bold"> Add What We Do Page Form</p>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('what-we-do-page.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row g-2 p-1">
                            <div class="col-lg-6 col-sm-12">
                                <span class="mt-1 fw-bold text-info">Banner Area</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Title</label>
                                        <div class="input-group">
                                            <input name="bannner_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Banner Title"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}

                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Description</label>
                                        <div class="input-group">
                                            <input name="bannner_description" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Bannner Description"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Bannner Btn One</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Button One Name</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_one_name" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Button One Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn One Link</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_one_link" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Button One Link" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn One Icon</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_one_icon" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn One Icon" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Bannner Btn Two</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Two Name</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_two_name" type="text" maxlength="255"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn Two Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Two Link</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_two_link" type="url" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn Two Link" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Two Icon</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_two_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn Two Icon" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Bannner Btn Three</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Three Name</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_three_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn Three Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Three Link</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_three_link" type="url" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn Three Link" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Three Icon</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_three_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Button Three Icon" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Bannner Btn Four</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Four Name</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_four_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Btn Four Name" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Four Link</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_four_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Button Four Link" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Bannner
                                            Btn Four Icon</label>
                                        <div class="input-group">
                                            <input name="bannner_btn_four_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Bannner Button Four Icon" required>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Row One Area</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Header</label>
                                        <div class="input-group">
                                            <input name="row_one_header" type="text" maxlength="250"
                                                class="form-control form-control-sm" placeholder="Enter Row One Header"
                                                required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Short Description</label>
                                        <div class="input-group">
                                            <input name="row_one_short_description" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Short Description" required>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Image</label>
                                        <div class="input-group">
                                            <input name="row_one_image" type="file"
                                                class="form-control form-control-sm" placeholder="Enter Row One Image">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Sub Title</label>
                                        <div class="input-group">
                                            <input name="row_one_sub_title" type="text" maxlength="250"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Sub Title">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Sub Description</label>
                                        <div class="input-group">
                                            <input name="row_one_sub_description" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Sub Description">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Row One Btn One</span>
                                <div class="px-2 py-2 rounded bg-light mb-1">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn One Name</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_one_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn One Name">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn One Link</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_one_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn One Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn One Icon</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_one_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn One Icon">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <span class="mt-1 fw-bold text-info">Row One Btn Two</span>
                                <div class="px-2 py-2 rounded bg-light ">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Two Name</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_two_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Two Name">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Two Link</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_two_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Two Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Two Icon</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_two_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Two Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Row One Btn Three</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Three Name</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_three_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Three Name">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Three Link</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_three_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Three Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Three Icon</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_three_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Three Icon">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Row One Btn Four</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Four Name</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_four_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Four Name">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Four Link</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_four_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Four Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Four Icon</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_four_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Four Icon">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Row One Btn Five</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Five Name</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_five_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Five Name">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Five Link</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_five_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Five Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Five Icon</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_five_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Five Icon">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <span class="mt-1 fw-bold text-info">Row One Btn Six</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Six Name</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_six_name" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Six Name">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Six Link</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_six_link" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Six Link">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            One Btn Six Icon</label>
                                        <div class="input-group">
                                            <input name="row_one_btn_six_icon" type="text" maxlength="100"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Row One Btn Six Icon">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>

                                <span class="mt-1 fw-bold text-info">Row Id</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Three Id</label>
                                        <div class="input-group">
                                            <select name="row_three_id" class="form-control select"
                                                data-placeholder="Chose row three ">
                                                <option></option>
                                                @foreach ($rows as $row)
                                                    <option value="{{ $row->id }}">{{ $row->title }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Two Id</label>
                                        <div class="input-group">
                                            <select name="row_two_id" class="form-control select"
                                                data-placeholder="Chose row two ">
                                                <option></option>
                                                @foreach ($rows as $row)
                                                    <option value="{{ $row->id }}">{{ $row->title }} </option>
                                                @endforeach
                                            </select>
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
