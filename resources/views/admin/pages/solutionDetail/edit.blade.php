@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house me-2"></i> Home</a>
                        <a href="{{ route('site-content.index') }}" class="breadcrumb-item"> Site Content</a>
                        <a href="{{ route('solutionDetails.index') }}" class="breadcrumb-item">Solution Details</a>
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
        <div class="content pt-2 mx-auto" style="width:80%;">
            <div class="text-start">
                <div class="d-flex align-items-center justify-content-start main_bg py-1 rounded-1">
                    <div class="ms-2">
                        <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                            href="{{ route('solutionDetails.index') }}">
                            <i class="fa-solid fa-arrow-left main_color"></i>
                        </a>
                    </div>
                    <div class="me-2" style="margin-left: 15rem;">
                        <h6 class="text-white p-0 m-0 fw-bold"> Edit Solution Details</h6>
                    </div>
                    <div style="margin-left: 11rem;">
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

                    {{-- <div class="d-flex justify-content-between align-items-center p-0" style="margin-left: 13rem;">
                        <ul class="nav nav-tabs border-0">
                            <li class="nav-item ">
                                <a href="{{route('row.index')}}" class="btn nav-link active cat-tab1 p-1">
                                    <p class="m-0 p-1 text-white">
                                        <i class="ph-plus icons_design"></i> </span>
                                        Row Builder <span class="ms-2">|</span></p>
                                </a>

                            </li>

                            <li class="nav-item">
                                <a href="{{route('solutionCard.index')}}" class="btn nav-link cat-tab2 p-1">
                                    <p class="m-0 p-1 text-white">
                                        <i class="ph-plus icons_design"></i> </span>
                                        Solution Card </p>
                                </a>
                            </li>

                        </ul>
                    </div> --}}
                </div>
            </div>
            {{-- @if ($industrie->id == $industryPage->industry_id) selected @endif --}}
            <form method="post" action="{{ route('solutionDetails.update', $solutionDetail->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">

                        <div class="row mx-1 rounded bg-light">
                            <span class="mt-1 fw-bold text-info">Banner Section</span>
                            <div class="col mt-0">

                                <div class="px-2 py-2 ">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black">Industry
                                            Title</label>
                                        <select name="industry_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Industry Title" required>
                                            <option></option>
                                            @foreach ($industries as $industrie)
                                                <option @if ($industrie->id == $solutionDetail->industry_id) selected @endif
                                                    value="{{ $industrie->id }}">{{ $industrie->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Banner
                                            Image</label>
                                        <div class="input-group">
                                            <input name="banner_image" value="{{ $solutionDetail->banner_image }}"
                                                id="image" accept="image/*" type="file"
                                                class="form-control form-control-sm" placeholder="Enter Banner Image">
                                            {{-- <img id="showImage" height="87px" width="157px"
                                                src="{{ asset('storage/' . $solutionDetail->banner_image) }}"
                                                alt=""> --}}
                                        </div>
                                    </div>
                                    {{--  --}}

                                </div>

                            </div>
                            <div class="col mt-0">
                                <div class="d-flex align-items-center pt-1">
                                    <label
                                        class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                        Name</label>
                                    <div class="input-group">
                                        <input name="name" value="{{ $solutionDetail->name }}" type="text"
                                            maxlength="255" class="form-control form-control-sm"
                                            placeholder="Enter Solution Name" style="padding: 2px 10px 0px 10px;">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="d-flex align-items-center pt-1">
                                    <label
                                        class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                        Header</label>
                                    <div class="input-group">
                                        <textarea class="form-control form-control-sm" name="header" cols="60" rows="2"
                                            placeholder="Enter Solution Header">{{ $solutionDetail->header }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 p-1">

                            <div class="col">
                                <span class="mt-1 fw-bold text-info">Row One With List</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="col-form-label label_style col-lg-2 p-0 text-start text-black">Row
                                            With List ID</label>
                                        <select name="row_one_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Row One List Id" required>
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option class="form-control" value="{{ $row->id }}" @selected($row->id == $solutionDetail->row_one_id)>
                                                    {{ $row->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="px-2 py-2 rounded bg-light mt-2">
                                    {{--  --}}
                                    <span class="mt-1 fw-bold text-info">Row Two with Solution Card</span>
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                            Card Section Title</label>
                                        <div class="input-group">
                                            <input type="text" name="row_two_title" class="form-control form-control-sm"
                                                maxlength="255" placeholder="Enter Solution Card Section Title"
                                                value="{{ $solutionDetail->row_two_title }}" />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                            Card Section Header</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="row_two_header" rows="3"
                                                placeholder="Enter Solution Card Section Header">{{ $solutionDetail->row_two_header }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black">Solution
                                            Card One</label>
                                        <select name="solution_card_one_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm" data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card One" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_one_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black">Solution
                                            Card Two</label>
                                        <select name="solution_card_two_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card Two" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_two_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black">Solution
                                            Card Three</label>
                                        <select name="solution_card_three_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card Three" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_three_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black">Solution
                                            Card Four</label>
                                        <select name="solution_card_four_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card Four" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_four_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black">Solution
                                            Card Five</label>
                                        <select name="solution_card_five_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card Five" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_five_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col">
                                <span class="mt-1 fw-bold text-info">Row Three With Background Color</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Three Title</label>
                                        <div class="input-group">
                                            <input name="row_three_title" type="text" maxlength="255"
                                                class="form-control form-control-sm" placeholder="Enter Row Three Title"
                                                value="{{ $solutionDetail->row_three_title }}">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Three Header</label>
                                        <div class="input-group">
                                            <textarea class="form-control form-control-sm" name="row_three_header" cols="60" rows="2"
                                                placeholder="Enter Row Three Header">{{ $solutionDetail->row_three_header }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Row Four with Right side Image</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="col-form-label label_style col-lg-2 p-0 text-start text-black">Row
                                            With Image</label>
                                        <select name="row_four_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Row Four With List ID" required>
                                            <option></option>
                                            @foreach ($rows as $row)
                                                <option @if ($row->id == $solutionDetail->row_four_id) selected @endif
                                                    class="form-control" value="{{ $row->id }}">
                                                    {{ $row->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <span class="mt-1 fw-bold text-info">Row Five with Solution Card</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Title</label>
                                        <div class="input-group">
                                            <input name="row_five_title" type="text" maxlength="255"
                                                class="form-control form-control-sm" placeholder="Enter Row Five Title"
                                                style="padding: 2px 10px 0px 10px;"
                                                value="{{ $solutionDetail->row_five_title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                            Five Header</label>
                                        <div class="input-group">
                                            <textarea class="form-control form-control-sm" name="row_five_header" cols="60" rows="2"
                                                placeholder="Enter Row Five Header">{{ $solutionDetail->row_five_header }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                            Card Six</label>
                                        <select name="solution_card_six_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card One" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_six_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                            Card Seven</label>
                                        <select name="solution_card_seven_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card One" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_seven_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label
                                            class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Solution
                                            Card Eight</label>
                                        <select name="solution_card_eight_id" class="form-control form-select-sm select"
                                            data-container-css-class="select-sm"
                                            data-minimum-results-for-search="Infinity"
                                            data-placeholder="Chose Solution Card Eight" required>
                                            <option></option>
                                            @foreach ($solution_cards as $solution_card)
                                                <option @if ($solution_card->id == $solutionDetail->solution_card_eight_id) selected @endif
                                                    class="form-control" value="{{ $solution_card->id }}">
                                                    {{ $solution_card->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                {{-- Extra  If Need Then Comment Out The Box --}}
                                {{-- Box Start --}}
                                {{-- <!--Row six with Left side Image-->
                                        <div class="row border my-2 p-3">
                                            <div class="col-12 text-center">
                                                <h5 class="border-bottom pb-2">Row Six with Left Side Image</h5>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Title </h6>
                                                </div>
                                                <div class="form-group col-sm-8 text-secondary">
                                                    <input type="text" name="row_three_title"
                                                        class="form-control maxlength" maxlength="255" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Header</h6>
                                                </div>
                                                <div class="form-group col-sm-8 text-secondary">
                                                    <textarea name="row_three_header" id="" class="form-control" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Row six with Left side Image--> --}}
                                {{-- Box End --}}
                                <div class="modal-footer border-0 pb-0 pe-0 mt-3">
                                    <button type="submit" class="mx-3 submit_btn from-prevent-multiple-submits"
                                        style="padding: 4px 9px;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
