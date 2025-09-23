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
                        <a href="{{ route('learnMore.index') }}" class="breadcrumb-item">LearnMore Page</a>
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
        <div class="content w-100 w-lg-75 mx-auto">
            <div class="d-flex align-items-center justify-content-between p-1" style="background-color: #247297">
                <div>
                    <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                        href="{{ route('learnMore.index') }}">
                        <i class="fa-solid fa-arrow-left main_color"></i>
                    </a>
                </div>
                <div>
                    <p class="text-white p-0 m-0 fw-bold"> Edit Learn More </p>
                </div>
                <div>
                    <a href="{{ route('row.index') }}" class="btn navigation_btn">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-nfc-magnifying-glass me-1" style="font-size: 10px;"></i>
                            <span>Row Builder</span>
                        </div>
                    </a>
                    <a href="{{ route('solutionCard.index') }}" class="btn navigation_btn me-0">
                        <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-money-check-dollar-pen" style="font-size: 10px;"></i>
                            <span>Solution Card</span>
                        </div>
                    </a>
                </div>
            </div>
            <form method="post" action="{{ route('learnMore.update', $learnMore->id) }}" enctype="multipart/form-data"
                id="myform">
                @csrf
                @method('PUT')
                <div class="card">
                    <!--Banner Section-->
                    <div class="container">
                        <div class="row py-3">
                            <div class="col-lg-6 col-sm-12">
                                <span class="mt-1 fw-bold text-info">Description</span>
                                <div class="px-2 py-2 rounded bg-light mb-2">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Badge</label>
                                        <div class="input-group">
                                            <input name="badge" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Learn More Badge"
                                                value="{{ $learnMore->badge }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Title</label>
                                        <div class="input-group">
                                            <input name="title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Learn More Title"
                                                value="{{ $learnMore->title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Banner
                                            Image</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 70%">
                                                <input name="image_banner" id="image" accept="image/*" type="file"
                                                    class="form-control form-control-sm" placeholder="Enter Banner Image">
                                            </div>
                                            <div class=" ms-2" style="width: 10%">
                                                <img class="img-fluid rounded-circle" id="showImage"
                                                    src="{{ asset('storage/thumb/' . $learnMore->image_banner) }}"
                                                    alt=""
                                                    style="width: 30px;
                                                        height: 30px;
                                                         margin-left: 2.5rem;">
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Background
                                            Image</label>
                                        <div class="d-flex">
                                            <div class="" style="width: 70%">
                                                <input name="background_image" id="image" accept="image/*"
                                                    type="file" class="form-control form-control-sm"
                                                    placeholder="Enter Background Image">
                                            </div>
                                            <div class=" ms-2" style="width: 10%">
                                                <img class="img-fluid rounded-circle" id="showImage"
                                                    src="{{ asset('storage/thumb/' . $learnMore->background_image) }}"
                                                    alt=""
                                                    style="width: 30px;
                                                        height: 30px;
                                                         margin-left: 2.5rem;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Header</span>
                                <div class="px-2 py-2 rounded bg-light mb-2">
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Header
                                            One</label>
                                        <div class="input-group">
                                            <input name="header_one" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Header One"
                                                value="{{ $learnMore->header_one }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Header
                                            Two</label>
                                        <div class="input-group">
                                            <input name="header_two" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Header Two"
                                                value="{{ $learnMore->header_two }}">
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-1 fw-bold text-info">Extra Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Footer</label>
                                        <div class="input-group">
                                            <textarea name="footer" class="form-control form-control-sm" rows="1"
                                                style=" font-size: 12px; font-weight: 500;">{{ $learnMore->footer }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Consult
                                            Title </label>
                                        <div class="input-group">
                                            <input name="consult_title" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Consult Title"
                                                value="{{ $learnMore->consult_title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Consult
                                            Short Description</label>
                                        <div class="input-group">
                                            <textarea name="consult_short_des" type="text" rows="1" class="form-control form-control-sm"
                                                placeholder="Enter Consult Short Description"required>{{ $learnMore->consult_short_des }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Industry
                                            Header</label>
                                        <div class="input-group">
                                            <input type="text" value="{{ $learnMore->industry_header }}"
                                                name="industry_header" class="form-control form-control-sm"
                                                maxlength="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <span class="mt-1 fw-bold text-info">Box Area</span>
                                <div class="px-2 py-2 rounded bg-light mt-4">
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            One Title </label>
                                        <div class="input-group">
                                            <input name="box_one_title" maxlength="255" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Box One Title"
                                                value="{{ $learnMore->box_one_title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            One Short Description</label>
                                        <div class="input-group">
                                            <input name="box_one_short_des" type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Enter Box One Short Description"
                                                value="{{ $learnMore->box_one_short_des }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            One link</label>
                                        <div class="input-group">
                                            <input name="box_one_link" type="url"
                                                class="form-control form-control-sm" placeholder="Enter Box One link"
                                                value="{{ $learnMore->box_one_link }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            Two Title</label>
                                        <div class="input-group">
                                            <input name="box_two_title" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Box Two Title"
                                                value="{{ $learnMore->box_two_title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            Two Short Description</label>
                                        <div class="input-group">
                                            <textarea name="box_two_short_des" type="text" rows="3" class="form-control form-control-sm"
                                                placeholder="Enter Box Two Short Description">{{ $learnMore->box_two_short_des }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            Two link</label>
                                        <div class="input-group">
                                            <input name="box_two_link" type="url"
                                                class="form-control form-control-sm" placeholder="Enter Box Two link"
                                                value="{{ $learnMore->box_two_link }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            Three Title</label>
                                        <div class="input-group">
                                            <input name="box_three_title" type="text"
                                                class="form-control form-control-sm" placeholder="Enter Box Two link"
                                                value="{{ $learnMore->box_three_title }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            Three Short Description</label>
                                        <div class="input-group">
                                            <textarea name="box_three_short_des" type="text" rows="3" class="form-control form-control-sm"
                                                placeholder="Enter Box Two link">{{ $learnMore->box_three_short_des }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="d-flex align-items-center pt-1">
                                        <label class="p-0 text-start text-black label_style">Box
                                            Three link</label>
                                        <div class="input-group">
                                            <textarea name="box_three_link" type="text" rows="3" class="form-control form-control-sm"
                                                placeholder="Enter Box Three link">{{ $learnMore->box_three_link }}"</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                            <div class="col-lg-12">
                                <span class="mt-1 fw-bold text-info">Client Area</span>
                                <div class="px-2 py-2 rounded bg-light">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="p-0 text-start text-black label_style">Success
                                                Story Title</label>
                                            <div class="input-group">
                                                <textarea name="success_story_title" type="text" rows="3" class="form-control form-control-sm"
                                                    placeholder="Enter Success Story Title" value="{{ $learnMore->success_story_title }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label class="p-0 text-start text-black label_style">Client
                                                    Story One</label>
                                                <div class="input-group">
                                                    <select name="success_story_one_id"
                                                        class="form-control form-control-sm" id="select6">
                                                        <option></option>
                                                        @foreach ($storys as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $learnMore->success_story_one_id ? 'selected' : '' }}>
                                                                {{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label class="p-0 text-start text-black label_style">Client
                                                    Story Two</label>
                                                <div class="input-group">
                                                    <select name="success_story_two_id"
                                                        class="form-select form-select-sm select" id="select7">
                                                        <option></option>
                                                        @foreach ($storys as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $learnMore->success_story_two_id ? 'selected' : '' }}>
                                                                {{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label class="p-0 text-start text-black label_style">Client Story Three</label>
                                                <div class="input-group">
                                                    <select name="success_story_three_id"
                                                        class="form-select form-select-sm select" id="select8">
                                                        <option></option>
                                                        @foreach ($storys as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $learnMore->success_story_three_id ? 'selected' : '' }}>
                                                                {{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 p-2">
                            <button type="submit" class="submit_btn from-prevent-multiple-submits px-3">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
        <!-- /content area -->
        <!-- /inner content -->

    </div>
@endsection
