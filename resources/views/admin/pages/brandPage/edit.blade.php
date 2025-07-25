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
                        <a href="{{ route('site-content.index') }}" class="breadcrumb-item">Site Content</a>
                        <a href="{{ route('brandPage.index') }}" class="breadcrumb-item">Brand Page Management</a>
                        <span class="breadcrumb-item active">Edit</span>
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
        <div class="content pt-2 text-center">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-center">
                        <div class="text-start">
                            <div class="row main_bg py-1 rounded-1 d-flex align-items-center gx-0 px-2">
                                <div class="col-lg-4 col-sm-12">
                                    <div>
                                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn" href="">
                                            <i class="fa-solid fa-arrow-left main_color"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                                    <p class="text-white p-0 m-0 fw-bold"> Edit Brand Page Form </p>
                                </div>
                                <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('row.create') }}" class="btn navigation_btn">
                                        <div class="d-flex align-items-center ">
                                            <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                                            <span>Row</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('solutionCard.create') }}" class="btn navigation_btn ms-2">
                                        <div class="d-flex align-items-center ">
                                            <i class="fa-solid fa-money-check-dollar-pen me-1" style="font-size: 10px;"></i>
                                            <span>Solution Card</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <form method="post" action="{{ route('brandPage.update', $brandPage->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!--Banner Section-->
                            <div class="card-body">
                                <div class="row g-2 p-1">
                                    <div class="col-lg-6">
                                        <p class="text-center text-secondary pb-0 mb-0" style="border-bottom: 1px solid #247297;">
                                            Banner Row</p>
                                        <div class="px-2 bg-light p-2">
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Select Brand <span class="text-danger">*</span></span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">

                                                    <select data-allow-clear="true" name="brand_id"
                                                        data-placeholder="Select row_four.."
                                                        class="form-control form-control-sm select">
                                                        <option value="">Select...</option>
                                                        @foreach ($brands as $brand)
                                                            <option @if ($brand->id == $brandPage->brand_id) selected @endif
                                                                class="form-control" value="{{ $brand->id }}">
                                                                {{ $brand->title }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1 gx-0">
                                                <div class="col-sm-12">
                                                    <span>Brand Logo</span>
                                                </div>
                                                <div class="col-sm-11 text-secondary">
                                                    <input type="file" name="brand_logo" class="form-control form-select-sm"
                                                        id="image1" accept="image/*" />
                                                </div>
                                                <div class="col-sm-1">
                                                    <img class="ms-2" id="showImage1" height="30px" width="30px"
                                                        src="{{ asset('storage/' . $brandPage->brand_logo) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1 gx-0">
                                                <div class="col-sm-12">
                                                    <span>Banner Image</span>
                                                </div>
                                                <div class="col-sm-11 text-secondary">
                                                    <input type="file" name="banner_image" class="form-control form-select-sm"
                                                        id="image" accept="image/*" />
                                                </div>
                                                <div class="col-sm-1">
                                                    <img class="ms-2" id="showImage" height="30px" width="30px"
                                                        src="{{ asset('storage/' . $brandPage->banner_image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Banner Header <span class="text-danger">*</span></span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="header" id="" class="form-control" cols="30" rows="3" placeholder="Banner Header"
                                                        required>{{ $brandPage->header }}</textarea>
                                                </div>
                                            </div>
                                            {{--  --}}
                                        </div>
                                        <p class="text-center text-secondary pb-0 mb-0" style="border-bottom: 1px solid #247297;">
                                            Card Row</p>
                                        <div class="px-2 bg-light p-2">
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>One Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="row_one_title"
                                                        class="form-control form-control-sm maxlength" maxlength="255"
                                                        id="title" placeholder="Row One Title"
                                                        value="{{ $brandPage->row_one_title }}" />
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Card One</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="solution_card_one_id"
                                                        data-placeholder="Select card One.."
                                                        class="form-control form-control-sm select">

                                                        @foreach ($solution_cards as $solution_card)
                                                            <option class="form-control form-control-sm" value=""> Select..
                                                            </option>
                                                            <option class="form-control" value="{{ $solution_card->id }}"
                                                                @selected($solution_card->id == $brandPage->solution_card_one_id)>
                                                                {{ $solution_card->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Card Two</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="solution_card_two_id"
                                                        data-placeholder="Select Card two"
                                                        class="form-control form-control-sm select">
                                                        <option class="form-control form-control-sm" value=""> Select..
                                                        </option>
                                                        @foreach ($solution_cards as $solution_card)
                                                            <option class="form-control form-control-sm"
                                                                value="{{ $solution_card->id }}" @selected($solution_card->id == $brandPage->solution_card_two_id)>
                                                                {{ $solution_card->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Card Three</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="solution_card_three_id"
                                                        data-placeholder="Select Card Three.."
                                                        class="form-control form-control-sm select">
                                                        <option class="form-control form-control-sm" value=""> Select..
                                                        </option>
                                                        @foreach ($solution_cards as $solution_card)
                                                            <option class="form-control form-control-sm"
                                                                value="{{ $solution_card->id }}" @selected($solution_card->id == $brandPage->solution_card_three_id)>
                                                                {{ $solution_card->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>One Header</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="row_one_header" id="header" class="form-control" cols="30" rows="1">{{ $brandPage->row_one_header }}</textarea>
                                                </div>
                                            </div>
                                            {{--  --}}

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="text-center text-secondary pb-0 mb-0" style="border-bottom: 1px solid #247297;">
                                            Row Area</p>
                                        <div class="px-2 bg-light p-2">
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Four</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="row_four_id"
                                                        data-placeholder="Select row_four.."
                                                        class="form-control form-control-sm select">
                                                        <option value="">Select...</option>
                                                        @foreach ($rows as $row)
                                                            <option @if ($row->id == $brandPage->row_four_id) selected @endif
                                                                class="form-control" value="{{ $row->id }}">
                                                                {{ $row->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Five</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="row_five_id"
                                                        data-placeholder="Select Row Five.."
                                                        class="form-control form-control-sm select">
                                                        <option value="">Select...</option>
                                                        @foreach ($rows as $row)
                                                            <option @if ($row->id == $brandPage->row_five_id) selected @endif
                                                                class="form-control" value="{{ $row->id }}">
                                                                {{ $row->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1 gx-0">
                                                <div class="col-sm-12">
                                                    <span>Row Six Background Img <span class="text-danger">*</span></span>
                                                </div>
                                                <div class="col-sm-11 text-secondary">
                                                    <input type="file" name="row_six_image"
                                                        class="form-control form-control-sm" id="image2" accept="image/*" />
                                                </div>
                                                <div class="col-sm-1">
                                                    <img class="ms-2" id="showImage2" height="30px" width="30px"
                                                        src="{{ asset('storage/' . $brandPage->row_six_image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Six Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="row_six_title"
                                                        class="form-control form-control-sm maxlength" maxlength="255"
                                                        id="title" placeholder="Row Six Title"
                                                        value="{{ $brandPage->row_six_title }}" />
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Six header <span class="text-danger">*</span></span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="row_six_header" id="" class="form-control" cols="30" rows="2"
                                                        placeholder="Row Six header" required>{{ $brandPage->row_six_header }}</textarea>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Seven Id</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="row_seven_id"
                                                        data-placeholder="Select Row Seven.." class="form-control select">
                                                        <option value="">Select...</option>
                                                        @foreach ($rows as $row)
                                                            <option @if ($row->id == $brandPage->row_seven_id) selected @endif
                                                                class="form-control" value="{{ $row->id }}">
                                                                {{ $row->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Eight Id</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <select data-allow-clear="true" name="row_eight_id"
                                                        data-placeholder="Select Row Eight.." class="form-control select">
                                                        <option value="">Select...</option>
                                                        @foreach ($rows as $row)
                                                            <option @if ($row->id == $brandPage->row_eight_id) selected @endif
                                                                class="form-control" value="{{ $row->id }}">
                                                                {{ $row->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--  --}}

                                        </div>
                                        <p class="text-center text-secondary pb-0 mb-0" style="border-bottom: 1px solid #247297;">
                                            Row Nine</p>
                                        <div class="px-2 bg-light p-2">
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Nine Title</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <input type="text" name="row_nine_title"
                                                        class="form-control form-control-sm maxlength" maxlength="255"
                                                        id="title" placeholder="Row One Title"
                                                        value="{{ $brandPage->row_nine_title }}" />
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span>Row Nine header</span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <textarea name="row_nine_header" id="" class="form-control" cols="30" rows="2"
                                                        placeholder="Row Six header">{{ $brandPage->row_nine_header }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Status</h6>
                                                </div>
                                                <div class="form-group col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            value="active" id="active-status"
                                                            {{ $brandPage->status == 'active' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="active-status">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            value="inactive" id="inactive-status"
                                                            {{ $brandPage->status == 'inactive' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="inactive-status">
                                                            Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer border-0 pb-2 pe-3">
                                <button type="submit" class="btn btn-info rounded-0 submit_btn from-prevent-multiple-submits py-2 px-3"
                                    style="pEditing: 4px 9px;">Submit</button>
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
