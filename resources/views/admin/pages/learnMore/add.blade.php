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
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="text-start">
                        <div class="d-flex align-items-center justify-content-between main_bg py-1 rounded-1">
                            <div class="ms-2">
                                <a class="btn btn-primary btn-rounded rounded-circle btn-icon back-btn"
                                    href="{{ route('learnMore.index') }}">
                                    <i class="fa-solid fa-arrow-left main_color"></i>
                                </a>
                            </div>
                            <div class="me-2">
                                <p class="text-white p-0 m-0 fw-bold"> Add Learn More </p>
                            </div>
                            <div>
                                <a href="{{ route('admin.row.index') }}" class="btn navigation_btn">
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
                    <form id="myform" method="post" action="{{ route('learnMore.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <!--Banner Section-->
                            <div class="row g-2 p-1">
                                <div class="col-lg-6">
                                    <span class="mt-1 fw-bold text-info">Description</span>
                                    <div class="px-2 py-2 rounded bg-light">
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Badge</label>
                                            <div class="input-group">
                                                <input name="badge" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Learn More Badge"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Title</label>
                                            <div class="input-group">
                                                <input name="title" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Learn More Title"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Banner
                                                Image</label>
                                            <div class="d-flex">
                                                <div class="" style="width: 70%">
                                                    <input name="image_banner" id="image" accept="image/*" type="file"
                                                        class="form-control form-control-sm" placeholder="Enter Banner Image">
                                                </div>
                                                <div class=" ms-2" style="width: 10%">
                                                    <img class="img-fluid rounded-circle" id="showImage"
                                                        src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                        alt=""
                                                        style="width: 30px;
                                                            height: 30px;
                                                             margin-left: 2.5rem;">
                                                </div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Background
                                                Image</label>
                                            <div class="d-flex">
                                                <div class="" style="width: 70%">
                                                    <input name="background_image" id="image" accept="image/*"
                                                        type="file" class="form-control form-control-sm"
                                                        placeholder="Enter Background Image">
                                                </div>
                                                <div class=" ms-2" style="width: 10%">
                                                    <img class="img-fluid rounded-circle" id="showImage"
                                                        src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                        alt=""
                                                        style="width: 30px;
                                                            height: 30px;
                                                             margin-left: 2.5rem;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="mt-1 fw-bold text-info">Header</span>
                                    <div class="px-2 py-2 rounded bg-light">
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Header
                                                One</label>
                                            <div class="input-group">
                                                <input name="header_one" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Header One"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Header
                                                Two</label>
                                            <div class="input-group">
                                                <input name="header_two" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Header Two"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="mt-1 fw-bold text-info">Extra Area</span>
                                    <div class="px-2 py-2 rounded bg-light">
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Footer</label>
                                            <div class="input-group">
                                                <input name="footer" type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Footer" required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Consult
                                                Title </label>
                                            <div class="input-group">
                                                <input name="consult_title" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Consult Title"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Consult
                                                Short Description</label>
                                            <div class="input-group">
                                                <textarea name="consult_short_des" type="text" rows="1" class="form-control form-control-sm"
                                                    placeholder="Enter Consult Short Description"required></textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Industry
                                                Header</label>
                                            <div class="input-group">
                                                <textarea name="industry_header" type="text" rows="2" class="form-control "
                                                    placeholder="Enter Industry Header"required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <span class="mt-1 fw-bold text-info">Box Area</span>
                                    <div class="px-2 py-2 rounded bg-light mt-2">
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                One Title </label>
                                            <div class="input-group">
                                                <input name="box_one_title" maxlength="255" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Box One Title"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                One Short Description</label>
                                            <div class="input-group">
                                                <input name="box_one_short_des" type="text"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter Box One Short Description" required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                One link</label>
                                            <div class="input-group">
                                                <input name="box_one_link" type="url"
                                                    class="form-control form-control-sm" placeholder="Enter Box One link"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                Two Title</label>
                                            <div class="input-group">
                                                <input name="box_two_title" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Box Two Title"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                Two Short Description</label>
                                            <div class="input-group">
                                                <textarea name="box_two_short_des" type="text" rows="3" class="form-control form-control-sm"
                                                    placeholder="Enter Box Two Short Description" required></textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                Two link</label>
                                            <div class="input-group">
                                                <input name="box_two_link" type="url"
                                                    class="form-control form-control-sm" placeholder="Enter Box Two link"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}

                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                Three Title</label>
                                            <div class="input-group">
                                                <input name="box_three_title" type="text"
                                                    class="form-control form-control-sm" placeholder="Enter Box Two link"
                                                    required>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                Three Short Description</label>
                                            <div class="input-group">
                                                <textarea name="box_three_short_des" type="text" rows="3" class="form-control form-control-sm"
                                                    placeholder="Enter Box Two link" required></textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Box
                                                Three link</label>
                                            <div class="input-group">
                                                <textarea name="box_three_link" type="text" rows="3" class="form-control form-control-sm"
                                                    placeholder="Enter Box Three link" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                <div class="col-lg-12">
                                    <span class="mt-1 fw-bold text-info">Client Area</span>
                                    <div class="px-2 py-2 rounded bg-light">
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Success
                                                Story Title</label>
                                            <div class="input-group">
                                                <textarea name="success_story_title" type="text" rows="3" class="form-control form-control-sm"
                                                    placeholder="Enter Success Story Title" required></textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Client
                                                Story One</label>
                                            <div class="input-group">
                                                <select name="success_story_one_id" class="form-control form-control-sm"
                                                    id="select6">
                                                    <option></option>
                                                    @foreach ($storys as $item)
                                                        <option value="{{ $item->id }}">{{ $item->badge }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Client
                                                Story Two</label>
                                            <div class="input-group">
                                                <select name="success_story_two_id"
                                                    class="form-control form-control-sm select" id="select7">
                                                    <option></option>
                                                    @foreach ($storys as $item)
                                                        <option value="{{ $item->id }}">{{ $item->badge }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="d-flex align-items-center pt-1">
                                            <label
                                                class="text-black label_style">Client
                                                Story Three</label>
                                            <div class="input-group">
                                                <select name="success_story_three_id"
                                                    class="form-control form-control-sm select" id="select8">
                                                    <option></option>
                                                    @foreach ($storys as $item)
                                                        <option value="{{ $item->id }}">{{ $item->badge }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 p-2">
                                <button type="submit" class="submit_btn from-prevent-multiple-submits"
                                    style="padding: 4px 9px;">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /content area -->

    </div>
@endsection
